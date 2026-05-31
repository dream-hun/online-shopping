<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

final class FrontProductComponent extends Component
{
    public $product;

    public $quantity = 1;

    public function mount(Product $product): void
    {
        $this->product = $product;
    }

    public function addToCart(): void
    {
        $item = Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'quantity' => $this->quantity,
            'price' => $this->product->price,
        ]);

        $item->associate(Product::class);

        $this->dispatch('update-cart');

        LivewireAlert::title($this->product->name.' is added to cart successfully!')
            ->success()
            ->toast()
            ->position('top-end')
            ->timer(3000)
            ->show();
    }

    public function remove(): void
    {
        Cart::remove($this->product->id);
        $this->dispatch('update-cart');
        LivewireAlert::title($this->product->name.' is removed from cart successfully!')
            ->error()
            ->toast()
            ->position('top-end')
            ->timer(3000)
            ->show();
    }

    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        $latestProducts = Product::latest()->take(9)->get();

        return view('livewire.front-product-component', [
            'products' => $latestProducts,
            'added' => Cart::get($this->product->id),
        ]);
    }
}
