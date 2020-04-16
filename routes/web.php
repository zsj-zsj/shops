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
Route::get('center','IndexController@center')->middleware('user');  //个人中心
Route::get('/','IndexController@indexList'); //展示主页
Route::get('goodsdetails','IndexController@goodsDetails');  //商品详情
Route::get('collect','IndexController@collect')->middleware('user');  //商品收藏