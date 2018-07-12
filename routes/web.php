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

Route::get('hello',function(){
    return "Hello word";
});

Route::get('sam-sung/galaxys123',function(){
    return "Galaxy S9+";
})->name('samsung');

Route::post('apple/iphone',function(){
    return "Iphone X";
});

Route::match(['get','post'],'apple/macbook',function(){
    return "Macbook 2018";
});

Route::any('sony/sonyz', function(){
    //return "Sony Experia Z";
    //return Redirect('sam-sung/galaxys');
    return redirect()->route('samsung');
});

Route::view('/view','welcome');
