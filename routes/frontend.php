<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', 'FrontendController@home')->name('home');
Route::get('/company', 'FrontendController@company')->name('company');