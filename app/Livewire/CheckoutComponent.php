<?php

namespace App\Livewire;

use App\Livewire\Forms\CheckoutForm;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
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
        DB::beginTransaction();
        $order = new Order;
        $order->client_phone = $this->form->client_phone;
        $order->email = $this->form->email;
        $order->client_name = $this->form->client_name;
        $order->shipping_address = $this->form->shipping_address;
        $order->payment_type = $this->form->payment_type;
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

        Cart::clear(); // Clear the cart after successful order placement
        $this->dispatch('update-cart');
        $this->alert('success', 'Your order is placed successfully!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);
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

        return view('livewire.checkout-component', ['cartItems' => $cartItemsWithDetails]);
    }
}
