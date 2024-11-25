<?php

namespace App\Livewire;

use App\Enums\DeliveryMethod;
use App\Helpers\Garden;
use App\Livewire\Forms\CheckoutForm;
use App\Mail\OrderPlaced;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Notifications\NewOrderNotification;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Mail;

class CheckoutComponent extends Component
{
    use LivewireAlert;

    public CheckoutForm $form;

    public function mount()
    {
        if (Cart::isEmpty()) {
            return redirect()->route('shop');
        }
    }

    public function placeOrder()
    {
        try {
            $this->form->validate();

            if (Cart::isEmpty()) {
                $this->alert('error', 'Your cart is empty!', [
                    'position' => 'top-end',
                    'timer' => 3000,
                    'toast' => true,
                ]);

                return $this->redirect('checkout');
            }

            DB::beginTransaction();

            // Validate cart items exist in products
            foreach (Cart::getContent() as $cartItem) {
                $product = Product::find($cartItem->id);
                if (! $product) {
                    throw new Exception('One or more products in your cart are no longer available.');
                }
            }

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
                'total_amount' => Cart::getTotal(),
            ]);

            if (! $order) {
                throw new Exception('Failed to create order.');
            }

            // Create order items
            foreach (Cart::getContent() as $cartItem) {
                $product = Product::find($cartItem->id);
                if ($product) {
                    $orderItem = $order->orderItems()->create([
                        'product_id' => $product->id,
                        'price' => $cartItem->price,
                        'quantity' => $cartItem->quantity,
                        'subtotal' => $cartItem->price * $cartItem->quantity,
                    ]);

                    if (! $orderItem) {
                        throw new Exception('Failed to create order item.');
                    }
                }
            }

            $order->setOrderNo('ORD');

            DB::commit();

            Mail::to($order->email)->send(new OrderPlaced($order));
            $users = User::whereHas('roles', function ($q) {
                return $q->where('title', 'Admin');
            })->get();
            Notification::send($users, new NewOrderNotification($order));

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
                $message .= ' Error: '.$e->getMessage();
            }

            $this->alert('error', $message, [
                'position' => 'top-end',
                'timer' => 3000,
                'toast' => true,
            ]);

            return null;
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
        })->filter(); // Remove null values

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
            'total' => Cart::getTotal(),
        ]);
    }
}
