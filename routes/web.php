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
Route::get('/categories/{id}', 'CategoriesController@details')->name('categories-details');

Route::get('/details/{id}', 'DetailsController@index')->name('details');
Route::post('/details-add/{id}', 'DetailsController@add')->name('details-add');

Route::get('/cart', 'CartsController@index')->name('cart')->middleware('auth');
Route::delete('/cart/{id}', 'CartsController@destroy')->name('cart-delete')->middleware('auth');

Route::post('/checkout', 'CheckoutController@process')->name('checkout');

Route::get('/success', 'CartsController@success')->name('success');

Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('/transactions', 'DashboardTransactionController@index')
        ->name('dashboard-transaction');
    Route::get('/transactions/{id}', 'DashboardTransactionController@details')
        ->name('dashboard-transaction-details');

    Route::get('/account', 'DashboardSettingController@account')
        ->name('dashboard-setting-account');
    Route::post('/account/{redirect}', 'DashboardSettingController@update')
        ->name('dashboard-setting-redirect');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'middleware' => 'admin'], function () {
    Route::get('/', 'Admin\DashboardController@index')->name('admin-dashboard');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('product', 'Admin\ProductController');
    Route::resource('product-gallery', 'Admin\ProductGalleryController');
    Route::resource('transaction', 'Admin\TransactionController');
    Route::resource('user', 'Admin\UserController');
    Route::get('change-role/{id}', 'Admin\UserController@changeRole')->name('user.changeRole');
});

Auth::routes();
