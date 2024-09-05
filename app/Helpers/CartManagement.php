<?php

namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class CartManagement
{
    //add item into the cart
    public static function addCartItem($product_id)
    {
        $cartItems = self::getCartItems();
        $existing_item = null;
        foreach ($cartItems as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $existing_item = $key;
                break;
            }
        }
        if ($existing_item != null) {
            $cartItems[$existing_item]['quantity'] += 1;
            $cartItems[$existing_item]['total'] = $cartItems[$existing_item]['quantity'] * $cartItems[$existing_item]['price'];
        } else {
            $product = Product::with('media')->where('id', $product_id)->first(['id', 'name', 'price','slug', 'measurement']);
            if ($product) {
                $cartItems[] = [
                    'product_id' => $product_id,
                    'name' => $product->name,
                    'slug' => $product->slug,
                    'price' => $product->price,
                    'measurement' => $product->measurement,
                    'quantity' => 1,
                    'unit_amount' => $product->price,
                    'total_amount' => $product->price,
                ];
            }
        }
        self::addCartItemsToCookie($cartItems);

        return count($cartItems);
    }

    //add item into the cart with quantity
    public static function addCartItemWithQuantity($product_id, $quantity = 1)
    {
        $cartItems = self::getCartItems();
        $existing_item = null;
        foreach ($cartItems as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $existing_item = $key;
                break;
            }
        }
        if ($existing_item != null) {
            $cartItems[$existing_item]['quantity'] = $quantity;
            $cartItems[$existing_item]['total'] = $cartItems[$existing_item]['quantity'] * $cartItems[$existing_item]['price'];
        } else {
            $product = Product::with('media')->where('id', $product_id)->first(['id', 'name', 'price','slug', 'measurement']);
            if ($product) {
                $cartItems[] = [
                    'product_id' => $product_id,
                    'name' => $product->name,
                    'slug' => $product->slug,
                    'price' => $product->price,
                    'measurement' => $product->measurement,
                    'quantity' => $quantity,
                    'unit_amount' => $product->price,
                    'total_amount' => $product->price,
                ];
            }
        }
        self::addCartItemsToCookie($cartItems);

        return count($cartItems);
    }

    //remove item into cart
    public static function removeCartItem($product_id)
    {
        $cartItems = self::getCartItems();
        $existing_item = null;
        foreach ($cartItems as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $existing_item = $key;
                break;
            }
        }
        if ($existing_item != null) {
            unset($cartItems[$existing_item]);
            // Re-index the array to prevent gaps in indices
            $cartItems = array_values($cartItems);
        }
        self::addCartItemsToCookie($cartItems);

        return $cartItems;
    }

    //add items into cookie
    public static function addCartItemsToCookie($cartItems)
    {
        Cookie::queue('cartItems', json_encode($cartItems), 60 * 24 * 30);

    }

    //clear shopping cart
    public static function clearCartItems()
    {
        Cookie::queue(Cookie::forget('cartItems'));
    }

    //get cart items
    public static function getCartItems()
    {
        $cartItems = json_decode(Cookie::get('cartItems'), true);
        if (! $cartItems) {
            $cartItems = [];
        }

        return $cartItems;
    }

    //increase quantity
    public static function increaseQuantity($product_id)
    {
        $cartItems = self::getCartItems();
        foreach ($cartItems as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $cartItems[$key]['quantity'] += 1;
                $cartItems[$key]['total_amount'] = $cartItems[$key]['quantity'] * $cartItems[$key]['price'];
                break;
            }
        }
        self::addCartItemsToCookie($cartItems);

        return $cartItems;
    }

    //decrease quantity
    public static function decreaseQuantity($product_id)
    {
        $cartItems = self::getCartItems();
        foreach ($cartItems as $key => $item) {
            if ($item['product_id'] == $product_id) {
                if ($cartItems[$key]['quantity'] == 1) {
                    $cartItems[$key]['quantity'] -= 1;
                    $cartItems[$key]['total_amount'] = $cartItems[$key]['quantity'] * $cartItems[$key]['unit_amount'];
                    break;
                }
            }
        }
        self::addCartItemsToCookie($cartItems);

        return $cartItems;
    }

    public static function grandTotal($items)
    {
        return array_sum(array_column($items, 'total_amount'));

    }
}
