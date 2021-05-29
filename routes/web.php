<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/categories', 'CategoriesController@index')->name('category');

Route::get('/details/{id}', 'DetailsController@index')->name('detail');

Route::get('/cart', 'CartsController@index')->name('cart');
Route::delete('/cart/{id}', 'CartsController@delete')->name('cart-delete');
Route::get('/success', 'CartsController@success')->name('success');

Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('/transactions', 'DashboardTransactionController@index')
        ->name('dashboard-transaction');
    Route::get('/transactions/{id}', 'DashboardTransactionController@details')
        ->name('dashboard-transaction-details');

    Route::get('/account', 'DashboardSettingController@account')
        ->name('dashboard-setting-account');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Admin\DashboardController@index')->name('admin-dashboard');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('product', 'Admin\ProductController');
});

Auth::routes();
