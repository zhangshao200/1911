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
Route::middleware('count')->get("/a/add","A\AddController@add");
Route::get("/user/index","A\AddController@index");
Route::get("/user/app","A\AddController@app");
Route::get("/user/add","A\AddController@add");
Route::get("/user/m","A\AddController@m");
Route::get("/user/ll","A\AddController@ll");
Route::get("/user/goods","A\AddController@goods");
Route::get("/add/add","A\BController@add");


/**
 * 签名加密
 */
Route::get("/test/status","A\BController@status");

/**
 * 非对称加密
 */
Route::get("/add/ras","A\BController@ras");

Route::get("/test/add","A\BController@ccontent");

//登录
Route::prefix('/user')->group(function (){
    Route::post("/index","Admin\AdminController@index");
    Route::post("/reg","Admin\AdminController@reg");

});
