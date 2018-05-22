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
//    return view('welcome');
//});
//用户注册
Route::get('/register','RegisterController@index');
Route::post('/register','RegisterController@register');
//用户登录
Route::get('/login', 'LoginController@index');
Route::post('/login','LoginController@login');
Route::get('/logout','LoginController@logout');

//个人设置
Route::get('/user/me/setting','UserController@setting');
Route::post('/user/me/setting','UserController@settingstore');




//文章列表
Route::get('posts', 'PostController@index');

//文章详情
Route::get('posts/{post}', 'PostController@show')->where('post','\d+');

//创建文章
Route::get('posts/create', 'PostController@create');
Route::post('posts', 'PostController@store');

//编辑文章
Route::get('posts/{post}/edit', 'PostController@edit');
Route::put('posts/{post}', 'PostController@update');


//删除文章
Route::get('posts/{post}/delete', 'PostController@delete');


//图片上传
Route::post('posts/image/upload','PostController@imgUpLoad');