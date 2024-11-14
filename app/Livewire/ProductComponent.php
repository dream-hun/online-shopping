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
        'quantity' => 'required|numeric|min:1', // Changed min value to 1
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
        if ($this->quantity > 1) {
            $this->quantity--;
        }
        $this->validateOnly('quantity');
    }

    public function updatedQuantity(): void
    {
        $this->validateOnly('quantity');
    }

    public function addToCart(): void
    {
        $this->validate();

        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'quantity' => $this->quantity,
            'price' => $this->product->price,
        ])->associate(Product::class);

        $this->dispatch('update-cart');

        $this->alert('success', "{$this->product->name} has been added to cart successfully!", [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->quantity = 1; // Reset quantity after adding to cart
    }

    public function removeFromCart(): void
    {
        Cart::remove($this->product->id);
        $this->dispatch('update-cart');

        $this->alert('error', "{$this->product->name} has been removed from cart successfully!", [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function render(): View|Factory|Application
    {
        seo()->title($this->product->name)
            ->description($this->product->description)
            ->keywords(
                $this->product->name,
                'online shopping in rwanda',
                'online shopping sites in rwanda',
                'kigali',
                'grocery store kigali',
                'organic produce rwanda',
                'fresh groceries kigali',
                'Garden of Eden Produce',
                'rwandan organic company'
            )
            ->url(url()->current())
            ->canonical(url()->current())
            ->canonicalEnabled(true)
            ->images(asset('images/garden-of-eden-produce.webp'))
            ->twitterCard('summary_large_image')
            ->twitterSite('@GardenofEdenPr')
            ->twitterCreator('@GardenofEdenPr')
            ->robots('index', 'follow');

        $inCart = Cart::get($this->product->id) !== null;

        $relatedProducts = Product::where('category_id', $this->product->category_id)
            ->where('id', '!=', $this->product->id)
            ->limit(3)->get();

        return view('livewire.product-component', [
            'inCart' => $inCart,'relatedProducts' => $relatedProducts
        ]);
    }
}
