<?php

namespace App\Livewire;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Component;

class CartCounterComponent extends Component
{
    protected $listeners = ['productAdded' => 'update', 'productRemoved' => 'update'];

    public function update()
    {
        $this->dispatch('updateCartCount');  // Emit an event to the parent component to update the cart count
    }

    public function render()
    {
        return view('livewire.cart-counter-component', ['count' => Cart::getTotalQuantity()]);
    }
}
