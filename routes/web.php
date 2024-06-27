<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user',UserController::class);



Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

Route::resource('product', \App\Http\Controllers\ProductController::class);
Route::resource('category', \App\Http\Controllers\CategoryController::class);


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
