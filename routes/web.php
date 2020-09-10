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


Route::get('/','ProductController@index')->name('frontend.products.index');


Route::get('cart','CartController@index')->name('cart.index');

Route::post('cart/{product}','CartController@addToCart')->name('cart.add');

Route::post('cart','CartController@clearCart')->name('cart.clear');


Route::post('cart/{id}/clear','CartController@clearItem')->name('cart.clear-item');


Auth::routes();



