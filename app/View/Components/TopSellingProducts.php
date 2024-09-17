<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class TopSellingProducts extends Component
{
    public Collection $products;

    public function __construct()
    {
        $this->products = $this->topSellingProducts();
    }

    public function render()
    {
        return view('components.top-selling-products');
    }

    private function topSellingProducts(): Collection
    {
        return DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->select(DB::raw('products.name, count(products.id) AS total'))
            ->where('orders.status', '=', 'Pending')
            ->groupBy('products.id')
            ->groupBy('products.name')
            ->orderByDesc('total')
            ->orderBy('products.name')
            ->limit(6)->get();
    }
}
