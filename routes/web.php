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

Route::get('/','ProductController@index')->name('product.index');
Route::get('add-cart/{id}', 'CartController@add')->name('addcart');
Route::get('cart','CartController@showCart')->name('show.cart');
Route::get('delete-cart/{id}','CartController@delete')->name('cart.delete');
Route::get('destroy-cart','CartController@remove')->name('cart.removeall');
Route::post('update-cart','CartController@update')->name('cart.update');

Route::group([
    'namespace' => 'Backend',
    'as' => 'admin.',
    'prefix' => 'admin'
],function(){
    Route::get('login','LoginController@login')->name('showForm');
    Route::post('hanlde-login','LoginController@handleLogin')->name('hanldeLogin');
    Route::get('logout','LoginController@logout')->name('logout');
});

Route::group([
    'namespace' => 'Backend',
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware' => ['web','adminLogin']
],function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('demo/{id}','DashboardController@demo')->name('demo');

    Route::post('sum-number','DashboardController@sum')->name('sum');

    Route::get('orm','DashboardController@orm')->name('orm');
    Route::get('join','DashboardController@join')->name('join');

    Route::get('product','ProductController@index')->name('product');
    Route::get('add-product','ProductController@add')->name('addproduct');
    Route::post('add','ProductController@handleadd')->name('product.handleadd');
    Route::post('delete','ProductController@delete')->name('product.delete');
    Route::get('produtc-detail/{id}','ProductController@detail')->name('product.detail');
});

