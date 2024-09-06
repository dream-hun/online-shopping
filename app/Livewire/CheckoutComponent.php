<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use App\Livewire\Forms\CheckoutForm;
use App\Models\Order;
use App\Models\OrderItem;
use DB;
use Livewire\Component;

class CheckoutComponent extends Component
{
    #[Title('Checkout - Garden of Eden Produce')]

    public CheckoutForm $form;

    public function placeOrder()

    {
        DB::beginTransaction();
        $order = new Order();
        $order->client_phone = $this->form->client_phone;
        $order->email = $this->form->email;
        $order->client_name = $this->form->client_name;
        $order->shipping_address = $this->form->shipping_address;
        $order->payment_type = $this->form->payment_type;
        $order->notes = $this->form->notes;
        $order->status = 'Pending';
        $order->save();
        $cartItems=CartManagement::getCartItems();
        foreach($cartItems as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $cartItem['product_id'];
            $orderItem->price = $cartItem->['price'];
            $orderItem->quantity = $cartItem->['quantity'];
            $orderItem->sub_total = $cartItem->['price'] * $cartItem['quantity'];
            $order->orderItems()->save($orderItem);
        }
         $order->setOrderNo('ORD');
         DB::commit();
    }


    public function render()
    {
        $cartItems = CartManagement::getCartItems();
        $grandTotal = CartManagement::grandTotal($cartItems);

        return view('livewire.checkout-component', ['cartItems' => $cartItems, 'grandTotal' => $grandTotal]);
    }
}
