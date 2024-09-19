<?php

namespace App\View\Components;

use App\Models\Order;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RecentOrdersComponent extends Component
{
    public $orders;

    /**
     * Create a new component instance.
     */
    public function __construct($limit = 10)
    {
        $this->orders = Order::latest()->limit($limit)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.recent-orders-component');
    }
}
