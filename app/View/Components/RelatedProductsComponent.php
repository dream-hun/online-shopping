<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RelatedProductsComponent extends Component
{
    public $product;

    /**
     * Create a new component instance.
     */
    public function __construct($product)
    {
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $relatedProducts = Product::where('category_id', $this->product->category_id)
            ->where('id', '!=', $this->product->id)
            ->limit(3)->get();

        return view('components.related-products-component', ['relatedProducts' => $relatedProducts]);
    }
}
