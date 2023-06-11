<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderDetailController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\SliderController;
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

Route::get('/category/{categoryId}', [CategoryController::class, 'index'])->name('category.expand');
Route::get('/product/{productId}', [ProductController::class, 'show'])->name('product.detail');

Route::get('/wishlist', [HomeController::class, 'wishlist'])->name('home.wishlist');
Route::get('/cart', [HomeController::class, 'cart'])->name('home.cart');
Route::get('/account/{token}', [AccountController::class, 'index'])->name('home.profile');
Route::post('/account/update', [AccountController::class, 'update_profile'])->name('post.profile');
Route::post('/account/upload', [AccountController::class, 'upload_photo'])->name('upload.profile');

Route::get('/order/{id}/detail', [HomeController::class, 'order_detail'])->name('order.detail');
Route::get('/order/{token}', [HomeController::class, 'order'])->name('home.order');
Route::post('/order',[HomeController::class, 'place_order'])->name('post.order');


Route::get('/auth/login', [LoginController::class, 'index'])->name('auth.index');
Route::post('/auth/login', [LoginController::class, 'authenticate'])->name('auth.post');


Route::name('admin.')->prefix('a')->middleware(['auth:web'])->group(function(){
    Route::get('/', [AdminHomeController::class, 'index'])->name('home.index');
    Route::post('/order/change_status/{order}', [OrderController::class, 'change_status'])->name('order.change');
    Route::post('/order/change_payment/{order}', [OrderController::class, 'change_payment'])->name('order.payment');
    Route::post('/order/change_table/{order}', [OrderController::class, 'change_table'])->name('order.table');
    Route::get('/me', [UserController::class, 'me'])->name('me');
    Route::resource('product.size.option', ProductOptionController::class);
    Route::resource('product.size', ProductSizeController::class);
    Route::resource('category', AdminCategoryController::class);
    Route::resource('product', AdminProductController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('order.detail', OrderDetailController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('order', OrderController::class);
    Route::resource('table', TableController::class);
    Route::resource('user', UserController::class);

    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});
