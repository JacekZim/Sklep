<?php

use App\Http\Controllers\Products;
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

Route::get('/', function() {
    return view('welcome');
});

Route::get('/dashboard', function() {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/product/{id}', [Products::class, 'show'])->name('product_link');
Route::get('/products', [Products::class, 'list'])->name('products');
Route::post('/products', [Products::class, 'list'])->name('search_link');
Route::get('/cart/{id}', [\App\Http\Controllers\Cart::class, 'add'])->name('cart_add');
Route::get('/cart', [\App\Http\Controllers\Cart::class, 'show'])->name('cart');
Route::get('/cart_delete/{id}', [\App\Http\Controllers\Cart::class, 'delete'])->name('cart_delete');
Route::get('/cart_incrementation/{id}', [\App\Http\Controllers\Cart::class, 'incrementation'])->name('cart_incrementation');
Route::get('/cart_decrementation/{id}', [\App\Http\Controllers\Cart::class, 'decrementation'])->name('cart_decrementation');
Route::post('/order', [\App\Http\Controllers\Order::class, 'add'])->name('order');

require __DIR__ . '/auth.php';
