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
    //return view('welcome');
    return "AAAA";
})->name('welcome');


Route::group([
    'namespace' => 'Backend',
    'as' => 'admin.',
    'prefix' => 'admin'
],function(){
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('demo/{id}','DashboardController@demo')->name('demo');
    Route::get('login','LoginController@login')->name('showForm');
    Route::post('hanlde-login','LoginController@handleLogin')->name('hanldeLogin');

    Route::post('sum-number','DashboardController@sum')->name('sum');
});

