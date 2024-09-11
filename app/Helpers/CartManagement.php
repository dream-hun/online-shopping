<?php

namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class CartManagement
{
    //add item into the cart
    static public function addItemToCart($product_id): int
    {
        $items = self::getCartItems();
        $existing_item = null;
        foreach ($items as $item) {
            if ($item['product_id'] == $product_id) {
                $existing_item = $item;
                break;
            }
        }
        if ($existing_item !== null) {
            $items[$existing_item]['quantity']++;
            $items[$existing_item]['total_amount'] = $items[$existing_item]['quantity'] * $items[$existing_item]['unit_price'];
        } else {
            $product = Product::where('id',$product_id)->first(['id', 'name', 'price', 'image', 'measurement', 'slug']);
            if ($product !== null) {
                $items[] = [
                    'product_id' => $product->id,
                    'quantity' => 1,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->image,
                    'unit_price' => $product->price,
                    'total_amount' => $product->price,
                ];
            }
        }
        self::addItemsToCookie($items);
        return count($items);
    }

    //add item into the cart with quantity
    public static function addCartItemWithQuantity($product_id, $quantity = 1): int
    {
        $items = self::getCartItems();
        $existing_item = null;
        foreach ($items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $existing_item = $key;
                break;
            }
        }
        if ($existing_item != null) {
            $items[$existing_item]['quantity'] = $quantity;
            $items[$existing_item]['total'] = $items[$existing_item]['quantity'] * $items[$existing_item]['price'];
        } else {
            $product = Product::where('id', $product_id)->first(['id', 'name', 'price', 'slug', 'measurement']);
            if ($product) {
                $items[] = [
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
        self::addItemToCart($items);

        return count($items);
    }

    //remove item into cart
    static public function removeItemFromCart($product_id): array
    {
        $items = self::getCartItems();
        foreach ($items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                unset($items[$key]);
            }
        }
        self::addItemsToCookie($items);
        return $items;
    }

    //add items into cookie
    static public function addItemsToCookie($items): void
    {
        Cookie::queue('items', json_encode($items), 60 * 24 * 30);
    }

    //clear shopping cart
    static public function clearItems(): void
    {
        Cookie::queue(Cookie::forget('items'));
    }

    //get cart items
    static public function getCartItems(): array
    {
        $items = json_decode(Cookie::get('items'), true);
        if (!$items) {
            $items = [];
        }

        return $items;
    }

    //increase quantity
    static public function increaseQuantity($product_id): void
    {
        $items = self::getCartItems();
        foreach ($items as $key=> $item) {
            if ($item['product_id'] == $product_id) {
                $items[$key]['quantity']++;
                $items[$key]['total_amount'] = $items[$key]['quantity'] * $items[$key]['unit_price'];
                break;
            }
        }
        self::addItemsToCookie($items);
    }

    //decrease quantity
    static public function decreaseQuantity($product_id): array
    {
        $items = self::getCartItems();
        foreach ($items as $key => $item) {
            if ($item['product_id'] == $product_id) {
               if ($item['quantity'] > 1) {
                   $items[$key]['quantity']--;
                   $items[$key]['total_amount'] = $items[$key]['quantity'] * $items[$key]['unit_price'];
               }
            }
        }
        self::addItemsToCookie($items);
        return $items;
    }
    static public function calculateGrandTotal($items): float|int

    {
        return array_sum(array_column($items, 'total_amount'));

    }

}
