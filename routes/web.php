<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

Route::get('/', [MenuController::class, 'categories'])->name('categories');
Route::get('/menu/{category}', [MenuController::class, 'categoryMenu'])->name('menu.category');
Route::get('/menu/item/{menuItem}', [MenuController::class, 'showItem'])->name('menu.item');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/address/create', [AddressController::class, 'create'])->name('address.create');
    Route::post('/profile/address', [AddressController::class, 'store'])->name('address.store');
    Route::delete('/profile/address/{address}', [AddressController::class, 'destroy'])->name('address.destroy');
    Route::get('/order', [CartController::class, 'orderForm'])->name('order.form');
    Route::post('/order', [CartController::class, 'placeOrder'])->name('order.place');
    Route::get('/orders/active', [OrderController::class, 'active'])->name('orders.active');
    Route::get('/orders/history', [OrderController::class, 'history'])->name('orders.history');
    Route::post('/orders/{order}/complete', [OrderController::class, 'complete'])->name('orders.complete');
});

Route::post('/cart/add/{menuItem}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{menuItem}', [CartController::class, 'remove'])->name('cart.remove');
