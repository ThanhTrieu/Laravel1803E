<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('photo','API\PhotoController');
//Route::resource('photo/delete','API\PhotoController');
Route::resource('photo/action','API\PhotoController');
Route::resource('user','API\UsersController');
Route::resource('user/delete','API\UsersController');
