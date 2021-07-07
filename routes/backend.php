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

Route::get('/', 'BackendController@index')->name('backend.index');

Route::resource('users', 'UserController');
Route::resource('currencies', 'CurrencyController');
Route::resource('categories', 'CategoryController');
Route::resource('products', 'ProductController');
Route::resource('images', 'ImageController');

Route::resource('orders', 'OrderController');
Route::post('order/products-add', 'OrderController@productsAdd')->name('orders.products-add');
Route::post('order/products-remove', 'OrderController@productsRemove')->name('orders.products-remove');
Route::post('order/quantity-change', 'OrderController@quantityChange')->name('orders.quantity-change');
Route::post('order/delete-all-products', 'OrderController@delete_all_products')->name('orders.delete-all-products');