<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Shop - Garden of Eden Produce')]
class ShoppingComponent extends Component
{
    use LivewireAlert, WithPagination;

    #[Url()]
    public $selected_categories = [];

    #[Url()]
    public $sort = 'latest';

    public function addToCart($productId): void
    {
        $product = Product::findOrFail($productId);
        $item = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'quantity' => 1,
            'price' => $product->price,
        ]);

        $item->associate(Product::class);

        $this->dispatch('update-cart');

        $this->alert('success', $product->name.' is added to cart successfully!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function removeFromCart($productId): void
    {
        $product = Product::findOrFail($productId);
        Cart::remove($productId);
        $this->dispatch('update-cart');
        $this->alert('error', $product->name.' is removed from cart successfully!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function render(): View|Factory|Application
    {
        $categories = Category::all();

        $products = Product::with(['category', 'media']);
        if (! empty($this->selected_categories)) {
            $products->whereIn('category_id', $this->selected_categories);
        }
        if ($this->sort == 'latest') {
            $products->latest();
        }
        if ($this->sort == 'high_price') {
            $products->orderBy('price', 'desc');
        }
        if ($this->sort == 'low_price') {
            $products->orderBy('price', 'asc');
        }

        $products = $products->paginate(12);

        // Add a 'inCart' property to each product
        $products->getCollection()->transform(function ($product) {
            $product->inCart = Cart::get($product->id) !== null;

            return $product;
        });

        return view('livewire.shopping-component', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
