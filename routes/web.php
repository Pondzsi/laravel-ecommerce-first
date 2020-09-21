<?php

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

Auth::routes();

//view
Route::get('/', 'IndexController@index')->name('index');
Route::get('/search', 'IndexController@search')->name('index.search');


//api
Route::get('/add-to-cart/{product}', 'CartController@add')->name('cart.add')->middleware('auth');

//cart
Route::get('/cart', 'CartController@index')->name('cart.index')->middleware('auth');
Route::get('/cart/destroy/{itemId}', 'CartController@destroy')->name('cart.destroy')->middleware('auth');

//quantity dropdown
Route::post('/cart/update/{itemId}', 'CartController@update')->name('cart.update')->middleware('auth');

//checkout
Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout')->middleware('auth');

Route::resource('orders', 'OrderController')->middleware('auth');