<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.app')]
#[Title('Shop - Garden of Eden Produce')]
final class ShoppingComponent extends Component
{
    use WithPagination;

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

        LivewireAlert::title($product->name.' is added to cart successfully!')
            ->success()
            ->toast()
            ->position('top-end')
            ->timer(3000)
            ->show();
    }

    public function removeFromCart($productId): void
    {
        $product = Product::findOrFail($productId);
        Cart::remove($productId);
        $this->dispatch('update-cart');
        LivewireAlert::title($product->name.' is removed from cart successfully!')
            ->error()
            ->toast()
            ->position('top-end')
            ->timer(3000)
            ->show();
    }

    public function render(): View|Factory|Application
    {
        $products = Product::with(['category', 'media']);
        if (! empty($this->selected_categories)) {
            $products->whereIn('category_id', $this->selected_categories);
        }
        match ($this->sort) {
            'high_price' => $products->orderBy('price', 'desc'),
            'low_price' => $products->orderBy('price', 'asc'),
            default => $products->latest(),
        };

        $products = $products->paginate(12);

        $products->getCollection()->transform(function ($product) {
            $product->inCart = Cart::get($product->id) !== null;

            return $product;
        });

        return view('livewire.shopping-component', [
            'products' => $products,
        ]);
    }
}
