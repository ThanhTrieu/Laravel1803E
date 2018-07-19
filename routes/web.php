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
    return redirect()->route('samsung');
});

Route::view('/view','welcome');

// truyen tham so bat buoc vao routing
Route::get('book/{name}/{id}',function($nameBook, $id){
    return $nameBook .'---'. $id;
})->where(['name'=>'[A-Za-z]+','id'=>'[0-9]+']);

// truyen tham so khong bat buoc vao routing
Route::get('phim-truyen/{name?}/{id?}', function($name = null, $id = null){
    return $name .'---'. $id;
})->where(['name'=>'[A-Za-z]+','id'=>'[0-9]+']);

Route::get('football',function(){
    return "Phap";
})->name('wordcup');

Route::redirect('hello','football',301);
Route::get('watch-football',function(){
    //return redirect()->route('wordcup');
    return redirect('football');
});



Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
],
function(){
    Route::get('home',function(){
    return "Admin - Home";
    })->name('home');
    Route::get('product',function(){
        return "Admin - Product";
    })->name('product');
});

Route::get('login',function(){
    //return redirect()->route('admin.home');
    //$route = Route::current();
    // die + var_dump
    //dd($route);
    //$name = Route::currentRouteName();
    //dd($name);
    $action = Route::currentRouteAction();
    dd($action);
})->name('login');

// Route::domain('kpop.myweb.com')->group(function(){
//     Route::get('user/{id}', function ($id) {
//         return "Sub-domain {$account} - {$id}";
//     });
// });



Route::group([
    'middleware' => ['check_age:admin','web']
],function(){
    Route::get('watch-film/{age}',function($ages){
        return "OKie - bank dc xem";
    });

    Route::get('shopping/{age}',function($ages){
        return "OKie - ban duoc mua hang";
    });
});

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

Route::get('test','TestController@show')->name('test');
Route::get('demo','TestController@check')->name('check');

route::get('login',function(){
    return "ban hay login";
})->name('login');
