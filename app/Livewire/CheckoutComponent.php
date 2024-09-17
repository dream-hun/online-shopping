<?php

namespace App\Livewire;

use App\Enums\DeliveryMethod;
use App\Livewire\Forms\CheckoutForm;
use App\Mail\ClientOrderNotification;
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
use Livewire\Attributes\Title;
use Livewire\Component;

class CheckoutComponent extends Component
{
    use LivewireAlert;

    #[Title('Checkout - Garden of Eden Produce')]
    public CheckoutForm $form;

    public function placeOrder(): void
    {
        $this->form->validate();

        DB::beginTransaction();
        try {
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
            Mail::to($order->email)->send(new ClientOrderNotification($order));
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
        } catch (\Exception $e) {
            DB::rollBack();
            $this->alert('error', 'An error occurred while placing your order. Please try again.', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
            ]);
        }
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

        return view('livewire.checkout-component', [
            'cartItems' => $cartItemsWithDetails,
            'deliveryMethods' => $deliveryMethods,
        ]);
    }
}
