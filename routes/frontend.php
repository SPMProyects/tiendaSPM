<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', 'FrontendController@home')->name('home');
Route::get('/company', 'FrontendController@company')->name('company');
Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::get('/store', 'FrontendController@store')->name('store');