<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['admin',])->group(function () {
    Route::get('/', 'BackendController@index')->name('backend.index');

    //Principal Routes
    Route::resource('users', 'UserController');
    Route::get('user/export-import','UserController@exportImport')->name('users.export-import');
    Route::get('user/export','UserController@export')->name('users.export');
    Route::post('user/import','UserController@import')->name('users.import');

    Route::resource('currencies', 'CurrencyController');
    Route::get('currency/export-import','CurrencyController@exportImport')->name('currencies.export-import');
    Route::get('currency/export','CurrencyController@export')->name('currencies.export');
    Route::post('currency/import','CurrencyController@import')->name('currencies.import');

    Route::resource('categories', 'CategoryController');
    Route::get('category/export-import','CategoryController@exportImport')->name('categories.export-import');
    Route::get('category/export','CategoryController@export')->name('categories.export');
    Route::post('category/import','CategoryController@import')->name('categories.import');

    Route::resource('products', 'ProductController');
    Route::get('product/export-import','ProductController@exportImport')->name('products.export-import');
    Route::get('product/export','ProductController@export')->name('products.export');
    Route::post('product/import','ProductController@import')->name('products.import');

    Route::resource('images', 'ImageController');
    Route::get('image/export-import','ImageController@exportImport')->name('images.export-import');
    Route::get('image/export','ImageController@export')->name('images.export');
    Route::post('image/import','ImageController@import')->name('images.import');

    //Order Routes
    Route::resource('orders', 'OrderController');
    Route::post('order/products-add', 'OrderController@productsAdd')->name('orders.products-add');
    Route::post('order/products-remove', 'OrderController@productsRemove')->name('orders.products-remove');
    Route::post('order/quantity-change', 'OrderController@quantityChange')->name('orders.quantity-change');
    Route::post('order/delete-all-products', 'OrderController@delete_all_products')->name('orders.delete-all-products');
    Route::get('order/export-import','OrderController@exportImport')->name('orders.export-import');
    Route::get('order/export','OrderController@export')->name('orders.export');
    Route::post('order/import','OrderController@import')->name('orders.import');

    //Config Routes
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
    Route::get('config/export-import','ConfigurationController@exportImport')->name('config.export-import');
    Route::get('config/export','ConfigurationController@export')->name('config.export');
    Route::post('config/import','ConfigurationController@import')->name('config.import');
});