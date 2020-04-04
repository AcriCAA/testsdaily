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


Auth::routes(['register' => false]);


Route::get('/', 'FeedController@index'); 

Route::post('/store', 'FeedController@comparePage'); 

Route::get('/dates', 'FeedController@generateDateSelectBox'); 

Route::get('/compare/{feed}','FeedController@show')->name('compare');
