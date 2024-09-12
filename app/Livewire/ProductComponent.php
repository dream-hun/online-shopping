<?php

namespace App\Livewire;

use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
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

    public $product;

    protected $rules = [
        'quantity' => 'required|numeric|min:0.5',
    ];

    public function mount($slug): void
    {
        $this->slug = $slug;
        $this->product = Product::where('slug', $this->slug)->firstOrFail();
    }

    public function increaseQuantity(): void
    {
        $this->quantity++;
        $this->validateOnly('quantity');
    }

    public function decreaseQuantity(): void
    {
        if ($this->quantity > 0.5) {
            $this->quantity--;
        }
        $this->validateOnly('quantity');
    }

    public function updatedQuantity()
    {
        $this->validateOnly('quantity');
    }

    public function addToCart(): void
    {
        $this->validate();

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

        $this->quantity = 1;
    }

    public function removeFromCart(): void
    {
        Cart::remove($this->product->id);
        $this->dispatch('update-cart');
        $this->alert('error', $this->product->name.' is removed from cart successfully!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function render(): View|Factory|Application
    {
        $inCart = Cart::get($this->product->id) !== null;

        return view('livewire.product-component', [
            'inCart' => $inCart,
        ]);
    }
}
