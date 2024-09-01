<?php

namespace App\Livewire;

use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Livewire\Component;

class CartItemComponent extends Component
{
    public $cartItem;

    public $quantity;

    public $product;

    public function mount(Product $product, $cartItem)
    {
        $this->quantity = $cartItem->quantity;
        $this->product = $product;
    }

    public function update()
    {
        $this->skipRender();

        $product = $this->product;
        $quantity = $this->quantity;
        if ($product->status !== 'Available') {
            session()->flash('error', 'Product not available');
        }

        $id = $product->id;
        Cart::remove($id);

        $cartItem = Cart::add([
            'id' => $id,
            'name' => $product->name,
            'quantity' => $quantity,
            'price' => $product->price,
        ]);
        $cartItem->associate($product);

        $this->dispatch('productAdded');
        session()->flash('success', $product->name.' Successfully added to cart');
    }

    public function remove()
    {
        $this->skipRender();

        $product = $this->product;
        Cart::remove($product->id);
        $this->dispatch('productRemoved');

        session()->flash('success', $product->name.' Successfully removed to cart');
    }

    public function render()
    {
        return view('livewire.cart-item-component', ['cartItem' => $this->cartItem, 'product' => $this->product]);
    }
}
