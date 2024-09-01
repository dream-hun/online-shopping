<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($slug, Request $request)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('product.show', ['product' => $product]);
    }
}
