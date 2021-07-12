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

Route::get('config/general', 'ConfigurationController@general')->name('config.general');
Route::get('config/home', 'ConfigurationController@home')->name('config.home');
Route::get('config/company', 'ConfigurationController@company')->name('config.company');
Route::get('config/chat-rrss-contact', 'ConfigurationController@chatRRSScontact')->name('config.chat-rrss-contact');
Route::get('config/email', 'ConfigurationController@email')->name('config.email');
Route::get('config/popup', 'ConfigurationController@popup')->name('config.popup');
Route::post('config/updategeneral', 'ConfigurationController@updateGeneral')->name('config.updategeneral');
Route::post('config/updatehome', 'ConfigurationController@updateHome')->name('config.updatehome');
Route::post('config/updatecompany', 'ConfigurationController@updateCompany')->name('config.updatecompany');
Route::post('config/updatechat-rrss-contact', 'ConfigurationController@updateChatRRSSContact')->name('config.updatechat-rsss-contact');
Route::post('config/updateemail', 'ConfigurationController@updateEmail')->name('config.updateemail');
Route::post('config/updatepopup', 'ConfigurationController@updatePopup')->name('config.updatepopup');