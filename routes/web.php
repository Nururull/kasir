<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.user');
});

Auth::routes();


Route::get('/products', [HomeController::class, 'index'])->name('products.search');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/pesan', [HomeController::class, 'index'])->name('pesan');

// Route::get('/user', UserController::class, 'index']);
// Route::get('/pesanan/{id}', UserController::class, 'show']);
// Route::post('/pesanan/store', UserController::class, 'store']);

Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{index}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('/order/history', [CartController::class, 'history'])->name('order.history');
Route::delete('/order/{id}', [cartController::class, 'destroy'])->name('order.destroy');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
});