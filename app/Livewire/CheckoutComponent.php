<?php

namespace App\Livewire;

use App\Enums\DeliveryMethod;
use App\Helpers\Garden;
use App\Livewire\Forms\CheckoutForm;
use App\Mail\OrderPlaced;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Notifications\NewOrderNotification;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CheckoutComponent extends Component
{
    use LivewireAlert;

    public CheckoutForm $form;

    public function placeOrder()
    {
        $this->form->validate();

        DB::beginTransaction();
        // try {
        $order = new Order;
        $order->client_phone = $this->form->client_phone;
        $order->email = $this->form->email;
        $order->client_name = $this->form->client_name;
        $order->shipping_address = $this->form->shipping_address;
        $order->payment_type = $this->form->payment_type;
        $order->delivery_method = $this->form->delivery_method;
        $order->notes = $this->form->notes;
        $order->status = 'Pending';
        $order->save();

        $cartItems = Cart::getContent();
        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->id);
            if ($product) {
                $orderItem = new OrderItem;
                $orderItem->product_id = $product->id;
                $orderItem->price = $cartItem->price;
                $orderItem->quantity = $cartItem->quantity;
                $orderItem->subtotal = $cartItem->price * $cartItem->quantity;
                $order->orderItems()->save($orderItem);
            }
        }
        $order->setOrderNo('ORD');
        DB::commit();
        Mail::to($order->email)->send(new OrderPlaced($order));
        $users = User::whereHas('roles', function ($query) {
            return $query->where('title', 'Admin');
        })->get();
        Notification::send($users, new NewOrderNotification($order));

        Cart::clear(); // Clear the cart after successful order placement
        $this->dispatch('update-cart');
        $this->alert('success', 'Your order is placed successfully!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->form->reset();

        return redirect()->route('order-success', ['id' => Garden::encryptId($order->id)]);
        // } catch (\Exception $e) {
        DB::rollBack();
        $this->alert('error', 'An error occurred while placing your order. Please try again.', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);
        // }
    }

    public function render(): View|Factory|Application
    {
        $cartItems = Cart::getContent();
        $cartItemsWithDetails = $cartItems->map(function ($item) {
            $product = Product::find($item->id);
            if ($product) {
                $imageUrl = $product->getFirstMediaUrl('image', 'thumb');

                return array_merge($item->toArray(), [
                    'image_url' => $imageUrl,
                    'measurement' => $product->measurement,
                ]);
            }

            return $item;
        });
        $deliveryMethods = DeliveryMethod::cases();
        seo()
            ->title('Checkout', 'Garden of Eden Produce Ltd')
            ->description('Complete your purchase and finalize your order at our secure checkout page.')
            ->canonicalEnabled(true)
            ->keywords('checkout, order, purchase, secure payment,garden of eden produce,Rwanda, kigali, online shopping groceries in kigali')
            ->images(
                'https://mywebsite.com/images/blog-1/cover-image.webp',
                'https://mywebsite.com/images/blog-1/another-image.webp',
            );

        return view('livewire.checkout-component', [
            'cartItems' => $cartItemsWithDetails,
            'deliveryMethods' => $deliveryMethods,
        ]);
    }
}
