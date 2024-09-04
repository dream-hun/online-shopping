<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        return view('shop.cart');
    }

    public function updateCart(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        // Ensure the product exists
        $product = Product::findOrFail($id);

        // Remove the existing item from the cart
        Cart::remove($id);

        // Add the updated item to the cart
        $cartItem = Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'quantity' => $request->input('qty'),
            'price' => $product->price,
        ]);

        // Associate the cart item with the product model
        $cartItem->associate($product);

        // Redirect back to the cart
        return redirect()->route('cart');
    }
}
