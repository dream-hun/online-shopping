<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Shopping Cart - Garden of Eden Produce')]
final class CartComponent extends Component
{
    public function removeItem($rowId): void
    {
        $item = Cart::get($rowId);
        if ($item) {
            Cart::remove($rowId);
            $this->dispatch('update-cart');
            $this->toastSuccess($item->name.' has been removed from the cart.');
        }
    }

    public function increaseQuantity($rowId): void
    {
        $item = Cart::get($rowId);
        if ($item) {
            Cart::update($rowId, [
                'quantity' => 1,
            ]);
            $this->dispatch('update-cart');
            $this->toastSuccess($item->name.' quantity has been increased.');
        }
    }

    public function decreaseQuantity($rowId): void
    {
        $item = Cart::get($rowId);
        if ($item && $item->quantity > 1) {
            Cart::update($rowId, [
                'quantity' => -1,
            ]);
            $this->dispatch('update-cart');
            $this->toastSuccess($item->name.' quantity has been decreased.');
        } elseif ($item && $item->quantity === 1) {
            $this->toastWarning('Quantity cannot be less than 1. Use remove button to delete the item.');
        }
    }

    public function render(): View|Application|Factory|\Illuminate\View\View
    {
        $cartItems = Cart::getContent();

        $cartItemsWithImages = $cartItems->map(function ($item) {
            $product = Product::find($item->id);
            if ($product) {
                $imageUrl = $product->getFirstMediaUrl('image', 'thumb');

                return array_merge($item->toArray(), ['image_url' => $imageUrl]);
            }

            return $item;
        });

        return view('livewire.cart-component', ['cartItems' => $cartItemsWithImages, 'cart' => $cartItems]);
    }

    private function toastSuccess(string $message): void
    {
        LivewireAlert::title($message)->success()->toast()->position('top-end')->timer(3000)->show();
    }

    private function toastWarning(string $message): void
    {
        LivewireAlert::title($message)->warning()->toast()->position('top-end')->timer(3000)->show();
    }
}
