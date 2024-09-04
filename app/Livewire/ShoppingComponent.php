<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Shop - Garden of Eden Produce')]
class ShoppingComponent extends Component
{
    use LivewireAlert,WithPagination;

    #[Url()]
    public $selected_categories = [];

    #[Url()]
    public $sort = 'latest';

    //add product into cart
    public function addToCart($product_id)
    {
        $total_products = CartManagement::addCartItem($product_id);
        $this->dispatch('update-cart', total_products: $total_products)->to(CartCounterComponent::class);
        $this->alert('success', 'Product is added to cart successfully!!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function render()
    {
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

        return view('livewire.shopping-component', ['products' => $products->paginate(6)]);
    }
}
