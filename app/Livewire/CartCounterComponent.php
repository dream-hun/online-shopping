<?php

namespace App\Livewire;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class CartCounterComponent extends Component
{
    public $count = 0;

    public function mount()
    {
        $this->updateCartCount();
    }

    #[On('update-cart')]
    public function updateCartCount()
    {
        $this->count = Cart::getTotalQuantity();
    }

    public function render()
    {
        return view('livewire.cart-counter-component');
    }
}
