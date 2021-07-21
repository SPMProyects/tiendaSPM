<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', 'FrontendController@home')->name('home');
Route::get('/company', 'FrontendController@company')->name('company');
Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::get('/store', 'FrontendController@store')->name('store');
Route::get('/store/product/{product}', 'FrontendController@getProduct')->name('store.product');
Route::get('/store/category/{category}', 'FrontendController@getCategory')->name('store.category');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/cart/{product}', 'CartController@addProduct')->name('cart.add');
Route::post('/cart/updateQuantity', 'CartController@updateQuantity')->name('cart.update');
Route::get('/cart/remove/{product}', 'CartController@removeProduct')->name('cart.remove');

