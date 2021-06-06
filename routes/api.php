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

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

Route::get('register/check', 'Auth\RegisterController@check')->name('api-register-check');
Route::get('provinces', 'API\LocationController@provinces')->name('api-provinces');
Route::get('regencies/{provinces_id}', 'API\LocationController@regencies')->name('api-regencies');
Route::get('category', 'API\StuffController@index')->name('categories')->middleware('jwt.verify');
Route::get('category/{id}', 'API\StuffController@productOfCategory')->name('categories.product')->middleware('jwt.verify');
Route::get('product', 'API\StuffController@product')->name('products')->middleware('jwt.verify');
Route::get('product/{id}', 'API\StuffController@showProduct')->name('show.products')->middleware('jwt.verify');
Route::post('cart', 'API\CartController@postToCart')->name('add-to-cart')->middleware('jwt.verify');
Route::get('cart', 'API\CartController@getCart')->name('get-cart')->middleware('jwt.verify');
