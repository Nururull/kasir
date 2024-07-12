<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.user');
});

Auth::routes();


Route::get('/products', [App\Http\Controllers\HomeController::class, 'index'])->name('products.search');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pesan', [App\Http\Controllers\HomeController::class, 'index'])->name('pesan');

Route::get('/user', [App\Http\Controllers\Admin\UserController::class, 'index']);
Route::get('/pesanan/{id}', [App\Http\Controllers\Admin\UserController::class, 'show']);
Route::post('/pesanan/store', [App\Http\Controllers\Admin\UserController::class, 'store']);


Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);
    Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
});

Route::get('/a', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('products.index');
Route::get('/cart', [\App\Http\Controllers\Admin\CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{product}', [\App\Http\Controllers\Admin\CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{index}', [\App\Http\Controllers\Admin\CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/checkout', [\App\Http\Controllers\Admin\CartController::class, 'checkout'])->name('cart.checkout');



