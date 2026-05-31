<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    public function boot(): void
    {
        Schema::defaultStringLength(191);

        if (! $this->app->runningInConsole()) {
            View::share('setting', Setting::first());
            View::share('categories', Category::withCount('products')->latest()->get(['id', 'name', 'slug']));
        }
    }
}
