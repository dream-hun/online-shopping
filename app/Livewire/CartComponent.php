<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Shopping Cart - Garden of Eden Produce')]

class CartComponent extends Component
{
    public $cartItems = [];

    public $cartTotal;

    public function mount()
    {
        $this->cartItems = CartManagement::getCartItems();
        $this->cartTotal = CartManagement::grandTotal($this->cartItems);
    }

    public function removeItem($product_id)
    {
        $this->cartItems = CartManagement::removeCartItem($product_id);
        $this->cartTotal = CartManagement::grandTotal($this->cartItems);
        $this->dispatch('update-cart', total_products: count($this->cartItems))->to(CartCounterComponent::class);
    }

    public function increaseQuantity($product_id)
    {
        $this->cartItems = CartManagement::increaseQuantity($product_id);
        $this->cartTotal = CartManagement::grandTotal($this->cartItems);
        $this->dispatch('update-cart', total_products: count($this->cartItems))->to(CartCounterComponent::class);

    }

    public function decreaseQuantity($product_id)
    {
        $this->cartItems = CartManagement::decreaseQuantity($product_id);
        $this->cartTotal = CartManagement::grandTotal($this->cartItems);
        $this->dispatch('update-cart', total_products: count($this->cartItems))->to(CartCounterComponent::class);
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
