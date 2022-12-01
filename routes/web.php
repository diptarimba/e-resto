<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/category/{categoryId}', [HomeController::class, 'categoryExpand'])->name('category.expand');
Route::get('/product/{productId}', [ProductController::class, 'show'])->name('product.detail');

Route::get('/wishlist', [HomeController::class, 'wishlist'])->name('home.wishlist');
Route::get('/cart', [HomeController::class, 'cart'])->name('home.cart');
