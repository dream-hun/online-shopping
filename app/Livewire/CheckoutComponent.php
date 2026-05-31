<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Enums\DeliveryMethod;
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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mail;

#[Layout('components.layouts.app')]
final class CheckoutComponent extends Component
{
    public CheckoutForm $form;

    public function mount()
    {
        if (Cart::isEmpty()) {
            return redirect()->route('shop');
        }
    }

    public function placeOrder()
    {
        $this->form->validate();

        if (Cart::isEmpty()) {
            $this->toastError('Your cart is empty!');

            return $this->redirect('checkout');
        }

        $order = null;

        try {
            DB::beginTransaction();

            $cartContent = Cart::getContent();
            $productIds = $cartContent->pluck('id')->toArray();
            $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

            foreach ($cartContent as $cartItem) {
                if (! $products->has($cartItem->id)) {
                    throw new Exception('One or more products in your cart are no longer available.');
                }
            }

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

            foreach ($cartContent as $cartItem) {
                $product = $products->get($cartItem->id);
                $order->orderItems()->create([
                    'product_id' => $product->id,
                    'price' => $cartItem->price,
                    'quantity' => $cartItem->quantity,
                    'subtotal' => $cartItem->price * $cartItem->quantity,
                ]);
            }

            $order->setOrderNo('ORD');

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            report($e);

            $message = 'An error occurred while placing your order. Please try again.';
            if (app()->environment('local')) {
                $message .= ' Error: '.$e->getMessage();
            }

            $this->toastError($message);

            return null;
        }

        try {
            Mail::to($order->email)->send(new OrderPlaced($order));
            $users = User::whereHas('roles', function ($q) {
                return $q->where('title', 'Admin');
            })->get();
            Notification::send($users, new NewOrderNotification($order));
        } catch (Exception $e) {
            report($e);
        }

        Cart::clear();
        $this->dispatch('update-cart');
        $this->form->reset();

        $this->toastSuccess('Your order has been placed successfully!');

        return redirect()->route('order-success', ['id' => $order->uuid]);
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

    private function toastSuccess(string $message): void
    {
        LivewireAlert::title($message)->success()->toast()->position('top-end')->timer(3000)->show();
    }

    private function toastError(string $message): void
    {
        LivewireAlert::title($message)->error()->toast()->position('top-end')->timer(3000)->show();
    }
}
