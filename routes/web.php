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

//平台活动
Route::resource('activies','ActiviesController');

//接受文件上传
Route::post('upload',function (){
    $storage = \Illuminate\Support\Facades\Storage::disk('oss');
    $fileName =  $storage->putFile('shop_cate_img', request()->file('file'));
    return [
        'fileName'=>$storage->url($fileName)
    ];
})->name('upload');
//订单统计
Route::get('/orders','OrdersController@index')->name('orders.index');

//菜品统计
Route::get('/menus','MenusController@index')->name('menus.index');
//会员管理
Route::get('/members','MembersController@index')->name('members.index');
Route::get('/members/{member}/edit','MembersController@edit')->name('members.edit');
Route::get('/members/{member}','MembersController@show')->name('members.show');

//权限管理
Route::resource('rbacs','RbacsController');
//角色管理
Route::resource('roles','RolesController');

