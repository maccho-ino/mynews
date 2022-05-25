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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
     Route::get('news/create', 'Admin\NewsController@add');
     Route::post('news/create', 'Admin\NewsController@create'); 
     Route::get('news','Admin\NewsController@index');
     Route::get('news/edit', 'Admin\NewsController@edit');
     Route::post('news/edit', 'Admin\NewsController@update');
     Route::get('news/delete', 'Admin\NewsController@delete');
});

/*「http://XXXXXX.jp/XXX というアクセスが来たときに、 
AAAControllerのbbbというAction に渡すRoutingの設定」を
書いてみてください*/

Route::get('xxx', 'AAAController@bbb');

/*admin/profile/create にアクセスしたら
ProfileController の add Action に、
admin/profile/edit にアクセスしたら
ProfileController の edit Action に
割り当てるように設定してください*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('profile/create','Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::get('profile/edit','Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','NewsController@index');

Route::get('/profile','ProfileController@index');