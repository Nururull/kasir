<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/products', [HomeController::class, 'index'])->name('products.search');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update/{index}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{index}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('user', UserController::class);

    Route::get('/search', [ProductController::class, 'search'])->name('products.search');

    Route::get('/order/history', [CartController::class, 'history'])->name('order.history');
    Route::delete('/order/{id}', [CartController::class, 'destroy'])->name('order.destroy');
    Route::get('/histori/{id}/pdf', [CartController::class, 'pdf'])->name('history.pdf');
});