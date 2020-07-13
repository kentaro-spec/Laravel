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

// Route::get('/', function () {
//     return view('welcome');
// });

// トップページ
Route::get('/', 'ShopController@index');


Route::group(['middleware' => ['auth']], function(){
    Route::get('/mycart', 'ShopController@myCart');
    Route::post('/mycart', 'ShopController@addMyCart');
    Route::post('/cartdelete', 'ShopController@deleteCart');
    Route::post('/checkout', 'ShopController@checkout');
    Route::post('/item_info', 'ShopController@item_info');
    // レビュー機能
    Route::get('/item_review/{id}','ShopController@item_review')->name('review');
    Route::get('/post_review','ShopController@post_review')->name('post_review');
    Route::post('/item_review','ShopController@review');
});

// 新規商品追加ページへ
Route::get('/post_item', 'ShopController@post_item');
// ページを更新
Route::post('/', 'ShopController@update_item');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');




// Route::group(['prefix' => 'admin'], function() {
//     Route::get('/',         function () { return redirect('/admin/home'); });
//     Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
//     Route::post('login',    'Admin\LoginController@login');
// });

// Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
//     Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
//     Route::get('home',      'Admin\HomeController@index')->name('admin.home');
// });