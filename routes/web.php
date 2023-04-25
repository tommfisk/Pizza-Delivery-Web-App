<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\PagesController::class, 'index'])->name('home');

Auth::routes();

Route::get('/order_history', [App\Http\Controllers\PagesController::class, 'orderHistory'])->name('order_history');

Auth::routes();

Route::get('/deals', [App\Http\Controllers\PagesController::class, 'deals'])->name('deals');

Auth::routes();

Route::get('/checkout', [App\Http\Controllers\PagesController::class, 'checkout'])->name('checkout');

Auth::routes();

Route::get('/order_history_details', [App\Http\Controllers\PagesController::class, 'orderHistoryDetails'])->name('order_history_details');

Auth::routes();

Route::post('/details', [App\Http\Controllers\PagesController::class, 'details'])->name('details');

Auth::routes();

Route::post('/add_to_order', [App\Http\Controllers\OrderController::class, 'addToOrder'])->name('add_to_order');

Auth::routes();

Route::post('/via', [App\Http\Controllers\DealController::class, 'via'])->name('via');

Auth::routes();

Route::post('/check_deal', [App\Http\Controllers\DealController::class, 'checkDeal'])->name('check_deal');

Auth::routes();

Route::post('/store', [App\Http\Controllers\OrderController::class, 'store'])->name('store');

