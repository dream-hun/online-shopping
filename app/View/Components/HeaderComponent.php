<?php

declare(strict_types=1);

namespace App\View\Components;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class HeaderComponent extends Component
{
    public Setting $setting;

    public function __construct()
    {
        $this->setting = Setting::first() ?? new Setting;
    }

    public function render(): View|Closure|string
    {
        return view('components.header-component');
    }
}
