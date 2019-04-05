<?php

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

Route::get('/', 'ShopController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/add', 'ShopController@addToCart')->name('add.product');
Route::post('/edit', 'ShopController@editProduct')->name('edit.product');
Route::post('/remove', 'ShopController@removeProduct')->name('remove.product');
Route::post('/reserve', 'ShopController@reserveProduct')->name('reserve.product');
Route::post('/edit_user', 'AdminController@editUser')->name('edit.user');
