<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Shopping Cart - Garden of Eden Produce')]

class CartComponent extends Component
{
    public $items = [];

    public $cartTotal;

    public function mount(): void
    {
        $this->items = CartManagement::getCartItems();
        $this->cartTotal = CartManagement::calculateGrandTotal($this->items);
    }

    public function removeItem($product_id): void
    {
        $this->items = CartManagement::removeItemFromCart($product_id);
        $this->cartTotal = CartManagement::calculateGrandTotal($this->items);
        $this->dispatch('update-cart', total_products: count($this->items))->to(CartCounterComponent::class);
    }

    public function increaseQuantity($product_id): void
    {
        $this->items = CartManagement::increaseQuantity($product_id);
        $this->cartTotal = CartManagement::calculateGrandTotal($this->items);
        $this->dispatch('update-cart', total_products: count($this->items))->to(CartCounterComponent::class);

    }

    public function decreaseQuantity($product_id): void
    {
        $this->items = CartManagement::decreaseQuantity($product_id);
        $this->cartTotal = CartManagement::calculateGrandTotal($this->items);
        $this->dispatch('update-cart', total_products: count($this->items))->to(CartCounterComponent::class);
    }

    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.cart-component');
    }
}
