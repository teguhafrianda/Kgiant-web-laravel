<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SettingsController;

// Redirect ke login jika belum login
Route::get('/', function () {
    return redirect()->route('login');
});

// Group Middleware untuk autentikasi
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('reports', ReportsController::class);
    Route::resource('settings', SettingsController::class);
    Route::resource('customers', CustomersController::class)->except(['edit', 'update']);

    // Routes untuk orders dan cart
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::post('/orders/add-to-cart', [OrdersController::class, 'addToCart'])->name('cart.add');
    Route::delete('/orders/remove-from-cart/{id}', [OrdersController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/orders/store', [OrdersController::class, 'store'])->name('orders.store');
    Route::delete('/orders/{id}', [OrdersController::class, 'destroy'])->name('orders.destroy');
});

// Menyediakan route autentikasi default dari Laravel Breeze
// Deploy
require __DIR__.'/auth.php';
