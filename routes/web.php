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

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
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
Route::group(['prefix' => 'admin'], function() {
    Route::get('profile/create','ProfileController@add');
    Route::get('profile/edit','ProfileController@edit');
});
