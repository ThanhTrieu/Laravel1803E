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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect','localizationRedirect','localeViewPath']
],function(){

    Route::get('/','ProductController@index')->name('product.index');
    Route::get('/','ProductController@index')->name('product.index');
    Route::get('add-cart/{id}', 'CartController@add')->name('addcart');
    Route::get('cart','CartController@showCart')->name('show.cart');
    Route::get('delete-cart/{id}','CartController@delete')->name('cart.delete');
    Route::get('destroy-cart','CartController@remove')->name('cart.removeall');
    Route::post('update-cart','CartController@update')->name('cart.update');
});

Route::get('switch-language/{lang}',function($lang = null){
    // xet ngon ngu cho toan bo ung dung
    App::setlocale($lang);
    // luu ngon ngu vao session de cho cac phien lam viec khac nhau xu ly
    Session::put('locale',$lang);
    // dung thu vien LaravelLocalization xet lai ngon ngu 1 lan nua - de no co the tu hieu va chuyen doi ngon ngu dua vao tham so tren url ma cac em truyen
    LaravelLocalization::setLocale($lang);
    // dieu huong ve trang ma nguoi dung dang dung truoc khi ho bam vao nut chuyen doi ngon ngu
    $url =  LaravelLocalization::getLocalizedURL(App::getLocale(), \URL::previous() );
    return  Redirect::to($url);

})->name('language');

Route::group([
    'namespace' => 'Backend',
    'as' => 'admin.',
    'prefix' => LaravelLocalization::setLocale() . '/admin',
    'middleware' => ['localeSessionRedirect','localizationRedirect','localeViewPath']
],function(){
    Route::get('login','LoginController@login')->name('showForm');
    Route::post('hanlde-login','LoginController@handleLogin')->name('hanldeLogin');
    Route::get('logout','LoginController@logout')->name('logout');
});

Route::group([
    'namespace' => 'Backend',
    'as' => 'admin.',
    'prefix' => LaravelLocalization::setLocale() . '/admin',
    'middleware' => ['web','adminLogin','localeSessionRedirect','localizationRedirect','localeViewPath']
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

/* dinh nghia cac route lam viec voi API */
Route::group([
    'namespace' => 'API',
    'prefix' => 'api'
],function(){
    Route::resource('football','FootballController')->only(
        ['index', 'show']
    );
    Route::resource('create-product','FootballController')->only('store');
    Route::resource('delete-product','FootballController')->only('destroy');
});



