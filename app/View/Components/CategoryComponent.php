<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class CategoryComponent extends Component
{
    public function __construct() {}

    public function render(): View|Closure|string
    {
        return view('components.category-component', [
            'categories' => Category::with('media')->latest()->get(),
        ]);
    }
}
