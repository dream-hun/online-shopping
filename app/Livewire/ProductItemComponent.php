<?php

namespace App\Livewire;

use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Component;

class ProductItemComponent extends Component
{
    public $product;

    public $quantity;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->quantity = 1;
    }

    public function render()
    {
        return view('livewire.product-item-component', ['added' => Cart::get($this->product->id)]);
    }

    public function removeFromCart()
    {
        Cart::remove($this->product->id);
        $this->emit('productRemoved');
        session()->flash('success', $this->product->name.' Successfully removed to cart');
    }

    public function addToCart()
    {
        $product = $this->product;
        $quantity = $this->quantity;
        if ($product->status !== 'available') {
            session()->flash('error', $this->product->name.' is not available');

            return back();
        }
        $id = $product->id;
        Cart::remove($id);
        $cartItem = Cart::add(['id' => $id, 'name' => $product->name, 'quantity' => $quantity, 'price' => $product->price]);
        $cartItem->associate($product);
        $this->emit('productAdded');
        session()->flash('success', $product->name.' Successfully added to cart');

        return back();

    }
}
