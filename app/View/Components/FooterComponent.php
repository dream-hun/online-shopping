<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

final class FooterComponent extends Component
{
    public Collection $categories;

    public function __construct()
    {
        $this->categories = Category::withoutGlobalScopes()->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.footer-component');
    }
}
