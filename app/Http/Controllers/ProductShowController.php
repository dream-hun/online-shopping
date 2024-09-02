<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;

class ProductShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index($slug, Request $request)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('product.show', ['product' => $product]);
    }
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        if (is_null($product) || $product->status !== 'Available') {
            return redirect()->back();
        }

        $qty = $request->input('qty');
        if (! $qty) {
            $qty = 1;
        }

        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'quantity' => $qty,
            'price' => $product->price,
        ]);
        $cartItem->associate($product);

        return redirect()->back();
    }
}
