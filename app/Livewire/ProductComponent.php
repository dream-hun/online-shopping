<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ProductComponent extends Component
{
    use LivewireAlert;

    public $slug;

    public $quantity = 1;

    public function mount($slug): void
    {
        $this->slug = $slug;
    }

    public function increaseQuantity(): void
    {
        $this->quantity++;
    }

    public function decreaseQuantity(): void
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    //add product into cart
    public function addToCart($product_id): void
    {
        $total_products = CartManagement::addCartItemWithQuantity($product_id, $this->quantity);
        $this->dispatch('update-cart', total_products: $total_products)->to(CartCounterComponent::class);
        $this->alert('success', 'Product is added to cart successfully!!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        $product = Product::where('slug', $this->slug)->firstOrFail();

        return view('livewire.product-component', ['product' => $product]);
    }
}
