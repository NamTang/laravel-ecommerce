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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'dashboard', 'middleware' => 'CheckPermission'], function() {
  Route::get('/', 'DashBoardController@index')->name('dashboard');

  Route::group(['prefix' => '/product'], function() {
    Route::get('/', 'ProductController@index')->name('product');
    Route::get('/create', 'ProductController@create')->name('add_product');
    Route::post('/save', 'ProductController@store')->name('save_product');
    Route::post('/remove', 'ProductController@destroy')->name('remove_product');
  });

  Route::group(['prefix' => '/category'], function() {
    Route::get('/', 'ProductKindController@index')->name('category');
    Route::get('/create', 'ProductKindController@create')->name('add_category');
    Route::post('/save', 'ProductKindController@store')->name('save_category');
    Route::post('/remove', 'ProductKindController@destroy')->name('remove_category');
  });
});
