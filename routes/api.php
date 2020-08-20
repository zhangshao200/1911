<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('geturlparam',function (){
    dump($_GET);
});
Route::post('posturlparam',function (){
    dump($_POST);
});
Route::post('upload',function (){
    dump($_FILES);
    dump($_POST);
   dd(\request()->all());
});
Route::post('getjson',function (){
    $data=file_get_contents('php://input');
    dump($data);
});
Route::get('/brand','Api\TextController@brand');

Route::get('/add','Api\TextController@login');
Route::any('/user/login','Api\TextController@add');
