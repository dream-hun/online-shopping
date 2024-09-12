<?php

namespace App\Livewire;

use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class FrontProductComponent extends Component
{
    use LivewireAlert;

    public $product;

    public $quantity = 1;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function addToCart()
    {

        $item = Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'quantity' => $this->quantity,
            'price' => $this->product->price,
        ]);

        $item->associate(Product::class);

        $this->dispatch('update-cart');

        $this->alert('success', $this->product->name.' is added to cart successfully!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function remove()
    {
        Cart::remove($this->product->id);
        $this->dispatch('update-cart');
        $this->alert('error', $this->product->name.' is remove from cart successfully!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function render()
    {
        $latestProducts = Product::latest()->take(8)->get();

        return view('livewire.front-product-component', [
            'products' => $latestProducts,
            'added' => Cart::get($this->product->id),
        ]);
    }
}
