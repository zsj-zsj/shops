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
Route::get('goodssecrch','IndexController@goodsSecrch');  //商品搜索
Route::get('collect','IndexController@collect')->middleware('user');  //商品收藏
Route::get('mycollect','IndexController@myCollect')->middleware('user');  //我的收藏
Route::get('delcollect','IndexController@delCollect')->middleware('user');  //取消收藏
Route::post('comment','IndexController@comment')->middleware('user');  //商品评论
Route::get('commentlist','IndexController@commentList');  //商品评论列表
Route::post('addcart','CartController@addCart');  //加入购物车
Route::get('cartlist','CartController@cartList')->middleware('user');   //购物车列表
Route::post('delcart','CartController@delcart');  //删除购物车

//收货地址
Route::prefix('/address')->middleware('user')->group(function(){
    Route::get('index','AddressController@index');
    Route::get('area','AddressController@area');  //城市信息
    Route::get('create','AddressController@create');
    Route::post('create','AddressController@docreate');
    Route::post('delete','AddressController@delete');
    Route::get('edit','AddressController@edit');
    Route::post('update','AddressController@update');
    Route::get('detailed','AddressController@detailed');
});