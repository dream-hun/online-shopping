<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use Livewire\Attributes\On;
use Livewire\Component;

class CartCounterComponent extends Component
{
    public $total_products = 0;

    public function mount()
    {
        $this->total_products = count(CartManagement::getCartItems());
    }

    #[On('update-cart')]
    public function updateCart($total_products)
    {
        $this->total_products = $total_products;
    }

    public function render()
    {
        return view('livewire.cart-counter-component');
    }
}
