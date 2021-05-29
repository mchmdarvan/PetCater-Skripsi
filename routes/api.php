<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('category', 'API\StuffController@index')->name('categories');
Route::get('category/{id}', 'API\StuffController@productOfCategory')->name('categories.product');
Route::get('product', 'API\StuffController@product')->name('products');
Route::get('product/{id}', 'API\StuffController@showProduct')->name('show.products');
