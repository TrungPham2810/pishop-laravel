<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('products', 'Api\ProductController@index');
Route::get('products/filter/{filter}', 'Api\ProductController@filter');
Route::get('products/{id}', 'Api\ProductController@show');
Route::post('products', 'Api\ProductController@store');
Route::put('products/{id}', 'Api\ProductController@update');
Route::delete('products/{id}', 'Api\ProductController@delete');

Route::get('category', 'Api\CategoryController@index');
Route::get('category/{id}', 'Api\CategoryController@show');
Route::post('category', 'Api\CategoryController@store');
Route::put('category/{id}', 'Api\CategoryController@update');
Route::delete('category/{id}', 'Api\CategoryController@delete');
