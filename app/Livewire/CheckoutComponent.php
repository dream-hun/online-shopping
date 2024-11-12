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
use Exception;
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

    public function mount()
    {
        if (Cart::isEmpty()) {
            return redirect()->route('products');
        }
    }

    public function placeOrder()
    {
        $this->form->validate();

        if (Cart::isEmpty()) {
            $this->alert('error', 'Your cart is empty!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
            ]);
            return;
        }

        DB::beginTransaction();
        try {
            // Create order
            $order = Order::create([
                'client_phone' => $this->form->client_phone,
                'email' => $this->form->email,
                'client_name' => $this->form->client_name,
                'shipping_address' => $this->form->shipping_address,
                'payment_type' => $this->form->payment_type,
                'delivery_method' => $this->form->delivery_method,
                'notes' => $this->form->notes,
                'status' => 'Pending',
                'total_amount' => Cart::getTotal()
            ]);

            // Create order items
            foreach (Cart::getContent() as $cartItem) {
                $product = Product::find($cartItem->id);
                if ($product) {
                    $order->orderItems()->create([
                        'product_id' => $product->id,
                        'price' => $cartItem->price,
                        'quantity' => $cartItem->quantity,
                        'subtotal' => $cartItem->price * $cartItem->quantity
                    ]);
                }
            }

            $order->setOrderNo('ORD');

            // Send notifications
            try {
                Mail::to($order->email)->send(new OrderPlaced($order));
                $admins = User::role('Admin')->get();
                Notification::send($admins, new NewOrderNotification($order));
            } catch (Exception $e) {
                // Log notification error but don't roll back transaction
                report($e);
            }

            DB::commit();

            // Clear cart and reset form
            Cart::clear();
            $this->dispatch('update-cart');
            $this->form->reset();

            $this->alert('success', 'Your order has been placed successfully!', [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
            ]);

            return redirect()->route('order-success', ['id' => Garden::encryptId($order->id)]);
        } catch (Exception $e) {
            DB::rollBack();
            report($e);  // Log the error

            $message = 'An error occurred while placing your order. Please try again.';
            if (app()->environment('local')) {
                $message .= ' Error: ' . $e->getMessage();
            }

            $this->alert('error', $message, [
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
            $product = Product::with('media')->find($item->id);
            if ($product) {
                return array_merge($item->toArray(), [
                    'image_url' => $product->getFirstMediaUrl('image', 'thumb'),
                    'measurement' => $product->measurement,
                ]);
            }
            return $item;
        });

        $deliveryMethods = DeliveryMethod::cases();

        seo()
            ->title('Checkout | Garden of Eden Produce Ltd')
            ->description('Complete your purchase and finalize your order at our secure checkout page.')
            ->canonicalEnabled(true)
            ->keywords('checkout, order, purchase, secure payment, garden of eden produce, Rwanda, kigali, online shopping groceries in kigali');

        return view('livewire.checkout-component', [
            'cartItems' => $cartItemsWithDetails,
            'deliveryMethods' => $deliveryMethods,
            'subtotal' => Cart::getSubTotal(),
            'total' => Cart::getTotal()
        ]);
    }
}
