<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($slug)
    {
        // Fetch the product based on slug
        $product = Product::where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4) // Limit the number of related products
            ->get();

        // Return a view with the product
        return view('product.index', compact('product', 'relatedProducts'));

    }
}
