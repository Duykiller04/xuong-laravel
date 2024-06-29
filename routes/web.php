<?php

use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomePageController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/', [HomePageController::class, 'index'])->name('home');

//Mua bán hàng

Route::get('product/{slug}', [ProductController::class, 'detail'])->name('product.detail');


Route::get('cart/list', [CartController::class, 'list'])->name('cart.list');

Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');

Route::post('order/save', [OrderController::class, 'save'])->name('order.save');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/nha', [App\Http\Controllers\HomeController::class, 'nha'])->name('nha')->middleware('auth');
