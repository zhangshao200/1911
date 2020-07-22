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
