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

Route::get('/home', [App\Http\Controllers\Controller::class, 'index'])->name('home');

Auth::routes();

Route::post('/add_to_order', [App\Http\Controllers\OrderController::class, 'addToOrder'])->name('add_to_order');

Auth::routes();

Route::get('/order', [App\Http\Controllers\OrderController::class, 'getOrder'])->name('get_order');

Auth::routes();

Route::post('/order', [App\Http\Controllers\OrderController::class, 'postOrder'])->name('post_order');

