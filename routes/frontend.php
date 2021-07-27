<?php

use Illuminate\Support\Facades\Route;

//General Routes
Route::get('/home', 'FrontendController@home')->name('home');
Route::get('/company', 'FrontendController@company')->name('company');
Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::post('/contact/send','FrontendController@sendMessage')->name('contact.send');
Route::get('/store', 'FrontendController@store')->name('store');
Route::get('/store/product/{product}', 'FrontendController@getProduct')->name('store.product');
Route::get('/store/category/{category}', 'FrontendController@getCategory')->name('store.category');


//Need autentication Routes
Route::middleware(['auth',])->group(function () {
    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::get('/cart/{product}', 'CartController@addProduct')->name('cart.add');
    Route::post('/cart/updateQuantity', 'CartController@updateQuantity')->name('cart.update');
    Route::get('/cart/remove/{product}', 'CartController@removeProduct')->name('cart.remove');

    Route::get('/user','UserController@personalInformation')->name('user.information');
    Route::post('/user/edit','UserController@editPersonalInformation')->name('user.information.edit');
    Route::get('/user/orders','UserController@myOrders')->name('user.orders');
    Route::get('/user/order/{order}','UserController@orderDetails')->name('user.order.detail');
});

