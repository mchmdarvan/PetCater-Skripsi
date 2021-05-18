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

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/dashboard/product', 'DashboardProductController@index')
    ->name('dashboard-product');
Route::get('/dashboard/product/add', 'DashboardProductController@create')
    ->name('dashboard-product-create');
Route::get('/dashboard/product/{id}', 'DashboardProductController@details')
    ->name('dashboard-product-details');

Route::get('/dashboard/transactions', 'DashboardTransactionController@index')
    ->name('dashboard-transaction');
Route::get('/dashboard/transactions/{id}', 'DashboardTransactionController@details')
    ->name('dashboard-transaction-details');

Route::get('/dashboard/setting', 'DashboardSettingController@store')
    ->name('dashboard-setting-store');
Route::get('/dashboard/account', 'DashboardSettingController@account')
    ->name('dashboard-setting-account');
Auth::routes();
