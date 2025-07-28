<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SettingsController;

// Redirect ke login jika belum login (kalau tidak pakai auth, ini bisa diubah juga)
Route::get('/', function () {
    return redirect()->route('dashboard.index'); // Ubah ke dashboard atau halaman utama langsung
});

// Group Middleware untuk autentikasi
// Jika tidak pakai auth, middleware ini juga harus dihapus
// Route::middleware('auth')->group(function () {
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
// });

// Laravel Breeze
// require __DIR__.'/auth.php';
