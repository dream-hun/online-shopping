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
    public $relatedProducts;
    public $cartItems = [];

    protected $rules = [
        'quantity' => 'required|numeric|min:1',
    ];

    public function mount($slug): void
    {
        $this->slug = $slug;
        $this->product = Product::where('slug', $this->slug)->firstOrFail();
        $this->updateCartItems();
    }

    private function updateCartItems(): void
    {
        $this->cartItems = collect(Cart::getContent())->pluck('id')->toArray();
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

    public function addToCart($productId = null): void
    {
        $this->validate();

        $productToAdd = $productId ? Product::findOrFail($productId) : $this->product;

        Cart::add([
            'id' => $productToAdd->id,
            'name' => $productToAdd->name,
            'quantity' => $productId ? 1 : $this->quantity,
            'price' => $productToAdd->price,
        ])->associate(Product::class);

        $this->dispatch('update-cart');
        $this->updateCartItems();

        $this->alert('success', "{$productToAdd->name} has been added to cart successfully!", [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);

        if (!$productId) {
            $this->quantity = 1;
        }
    }

    public function removeFromCart($productId = null): void
    {
        $productToRemove = $productId ? Product::findOrFail($productId) : $this->product;

        Cart::remove($productToRemove->id);
        $this->dispatch('update-cart');
        $this->updateCartItems();

        $this->alert('error', "{$productToRemove->name} has been removed from cart successfully!", [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function isInCart($productId): bool
    {
        return in_array($productId, $this->cartItems);
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

        $inCart = $this->isInCart($this->product->id);

        $this->relatedProducts = Product::where('category_id', $this->product->category_id)
            ->where('id', '!=', $this->product->id)
            ->limit(3)
            ->get();

        return view('livewire.product-component', [
            'inCart' => $inCart
        ]);
    }
}
