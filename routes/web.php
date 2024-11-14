<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProductShowController;
use App\Http\Controllers\SuccessfulOrderController;
use App\Livewire\AboutComponent;
use App\Livewire\CartComponent;
use App\Livewire\CheckoutComponent;
use App\Livewire\ContactComponent;
use App\Livewire\NoticesComponent;
use App\Livewire\ProductComponent;
use App\Livewire\ShoppingComponent;
use App\Livewire\WelcomeComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeComponent::class)->name('landing');
Route::get('/about-us', AboutComponent::class)->name('about-us');
Route::get('/contact-us', ContactComponent::class)->name('contact');
Route::get('/shopping-cart', CartComponent::class)->name('cart');
Route::get('/shop', ShoppingComponent::class)->name('shop');
Route::get('/shop/products/{slug}', ProductComponent::class)->name('product');
Route::get('/shop/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/order-confirmation/{id}', SuccessfulOrderController::class)->name('order-success');
Route::get('/notice-board', NoticesComponent::class)->name('notices');
Route::get('/shop/product/{slug}', ProductShowController::class)->name('product-show');

//Route to subscribe to newsletter
Route::post('/subscribe', NewsletterController::class)->name('subscribe');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    // Permissions
    Route::delete('permissions/destroy', [PermissionsController::class, 'massDestroy'])->name('permissions.massDestroy');
    Route::resource('permissions', PermissionsController::class);

    // Roles
    Route::delete('roles/destroy', [RolesController::class, 'massDestroy'])->name('roles.massDestroy');
    Route::resource('roles', RolesController::class);

    // Users
    Route::delete('users/destroy', [UsersController::class, 'massDestroy'])->name('users.massDestroy');
    Route::resource('users', UsersController::class);

    // Category
    Route::delete('categories/destroy', [CategoryController::class, 'massDestroy'])->name('categories.massDestroy');
    Route::post('categories/media', [CategoryController::class, 'storeMedia'])->name('categories.storeMedia');
    Route::post('categories/ckmedia', [CategoryController::class, 'storeCKEditorImages'])->name('categories.storeCKEditorImages');
    Route::resource('categories', CategoryController::class);

    // Product
    Route::delete('products/destroy', [ProductController::class, 'massDestroy'])->name('products.massDestroy');
    Route::post('products/media', [ProductController::class, 'storeMedia'])->name('products.storeMedia');
    Route::post('products/ckmedia', [ProductController::class, 'storeCKEditorImages'])->name('products.storeCKEditorImages');
    Route::resource('products', ProductController::class, ['except' => ['show']]);

    // Event
    Route::delete('events/destroy', [EventController::class, 'massDestroy'])->name('events.massDestroy');
    Route::resource('events', EventController::class);

    // Newsletter
    Route::delete('newsletters/destroy', [\App\Http\Controllers\Admin\NewsletterController::class, 'massDestroy'])->name('newsletters.massDestroy');
    Route::resource('newsletters', \App\Http\Controllers\Admin\NewsletterController::class, ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Shop
    Route::delete('settings/destroy', [SettingController::class, 'massDestroy'])->name('settings.massDestroy');
    Route::resource('settings', SettingController::class);

    // Order
    Route::resource('orders', \App\Http\Controllers\Admin\OrderController::class, ['except' => ['create', 'store', 'destroy']]);
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', [ChangePasswordController::class, 'edit'])->name('password.edit');
        Route::post('password', [ChangePasswordController::class, 'update'])->name('password.update');
        Route::post('profile', [ChangePasswordController::class, 'updateProfile'])->name('password.updateProfile');
        Route::post('profile/destroy', [ChangePasswordController::class, 'destroy'])->name('password.destroyProfile');
    }
});

Auth::routes();
