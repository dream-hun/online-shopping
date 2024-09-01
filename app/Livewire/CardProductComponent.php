<?php

namespace App\Livewire;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Component;

class CardProductComponent extends Component
{
    public $product;

    public $quantity;

    public function mount()
    {
        $this->quantity = 1;
    }

    public function render()
    {
        return view('livewire.card-product-component', [
            'added' => Cart::get($this->product->id),
        ]);

    }

    public function add()
    {
        $product = $this->product;
        if ($product->status !== 'Available') {
            session()->flash('error', 'Product not available');
        }
        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'quantity' => $this->quantity,
            'price' => $product->price,
        ]);
        $cartItem->associate($product);

        $this->dispatch('productAdded');

        session()->flash('success', $product->name.' Successfully added to cart');
    }

    public function remove()
    {
        Cart::remove($this->product->id);
        $this->dispatch('productRemoved');

        session()->flash('success', $this->product->name.' Successfully removed to cart');
    }
}
