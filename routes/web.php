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

Route::get('/', 'HomeController@index')->name('root');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/product/{id}', 'ProductController@show')->name('show_product');

Route::group(['prefix' => 'checkout'], function () {
    Route::get('/', 'OrderController@index')->name('checkout');
    Route::post('/', 'OrderController@store')->name('checkout_post');
});

Route::group(['prefix' => 'store'], function () {
    Route::get('/', 'ProductController@showList')->name('show_store');
    Route::get('/{id}', 'ProductController@showListByCategoryId')->name('show_store_by_category');
});

Auth::routes();

Route::group(['prefix' => 'cart'], function () {
    Route::get('/', 'CartController@index')->name('cart');
    Route::get('/show', 'CartController@show')->name('cart_show');
    Route::post('/add/{product_id}', 'CartController@add')->name('cart_add');
    Route::post('/remove/{id}', 'CartController@destroy')->name('cart_remove');
    Route::post('/update', 'CartController@update')->name('cart_update');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'CheckPermission'], function () {
    Route::get('/', 'DashBoardController@index')->name('dashboard');

    Route::group(['prefix' => '/product'], function () {
        Route::get('/', 'ProductController@index')->name('product');
        Route::get('/create', 'ProductController@create')->name('add_product');
        Route::post('/save', 'ProductController@store')->name('save_product');
        Route::post('/remove', 'ProductController@destroy')->name('remove_product');
    });

    Route::group(['prefix' => '/category'], function () {
        Route::get('/', 'ProductKindController@index')->name('category');
        Route::get('/create', 'ProductKindController@create')->name('add_category');
        Route::post('/save', 'ProductKindController@store')->name('save_category');
        Route::post('/remove', 'ProductKindController@destroy')->name('remove_category');
    });
});
