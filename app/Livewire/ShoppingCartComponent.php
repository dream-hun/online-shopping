<?php

namespace App\Livewire;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Component;

class ShoppingCartComponent extends Component
{
    protected $listeners = ['productRemoved' => 'noop', 'productAdded' => 'noop'];

    public function noop() {}

    public function clearCart()
    {
        Cart::clear();
        $this->dispatch('cartCleared');
    }

    public function render()
    {
        $cart = Cart::getContent();

        return view('livewire.shopping-cart-component', ['cart' => $cart]);
    }
}
