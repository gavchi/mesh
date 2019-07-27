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

//Категории
Route::get('/category', 'CategoryController@index');
Route::post('/category', 'CategoryController@store');
Route::get('/category/{id}', 'CategoryController@show');
Route::put('/category/{id}', 'CategoryController@update');
Route::delete('/category/{id}', 'CategoryController@destroy');
Route::get('/category/{id}/products', 'CategoryController@products');
//Продукты
Route::post('/category/{id}/product', 'ProductController@store');
Route::get('/product/{id}', 'ProductController@show');
Route::put('/product/{id}', 'ProductController@update');
Route::delete('/product/{id}', 'ProductController@destroy');
