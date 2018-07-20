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

//Route::get('/', function () {
//    return view('login/login');
//});
Route::get('/','SessionsController@login');

Route::resource('shop_categories','Shop_categoriesController');

Route::resource('shops','ShopsController');

//重置密码

Route::resource('shopusers','ShopUsersController');
Route::resource('admins','AdminsController');
//点重置按钮会匹配到控制器的show方法
Route::get('shopusers/{reset}','ShopUsersController@reset')->name('shopusers.reset');


//登录验证
Route::get('login', 'SessionsController@login');
Route::post('login', 'SessionsController@store')->name('login');
//退出
Route::delete('logout', 'SessionsController@destroy')->name('logout');

