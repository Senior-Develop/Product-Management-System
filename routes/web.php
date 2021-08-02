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

//Auth
Route::get('admin/login', 'Auth\LoginController@index');
Route::post('admin/login', 'Auth\LoginController@login')->name('login');
Route::get('admin/logout', 'Auth\LoginController@logout');
Route::get('admin/signup', 'Auth\RegisterController@index');
Route::post('admin/signup', 'Auth\RegisterController@create');

/**
 * Backend routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    
    // Products
    Route::get('/', 'ProductController@index');
    Route::post('/product/create', 'ProductController@create');
    Route::get('/product/getItem', 'ProductController@getItem');
    Route::post('/product/edit', 'ProductController@edit');
    Route::delete('/product/delete', 'ProductController@delete');

    Route::get('/configuration', 'ConfigurationController@index');
    Route::post('/configuration/create', 'ConfigurationController@create');
    Route::get('/configuration/getItem', 'ConfigurationController@getItem');
    Route::post('/configuration/edit', 'ConfigurationController@edit');
    Route::delete('/configuration/delete', 'ConfigurationController@delete');

    Route::get('/location', 'LocationController@index');
    Route::post('/location/create', 'LocationController@create');
    Route::get('/location/getItem', 'LocationController@getItem');
    Route::post('/location/edit', 'LocationController@edit');
    Route::delete('/location/delete', 'LocationController@delete');

    Route::get('/module', 'ModuleController@index');
    Route::post('/module/create', 'ModuleController@create');
    Route::get('/module/getItem', 'ModuleController@getItem');
    Route::post('/module/edit', 'ModuleController@edit');
    Route::delete('/module/delete', 'ModuleController@delete');

    Route::get('/cell', 'CellController@index');

    Route::get('/customer', 'CustomerController@index');
    Route::post('/customer/create', 'CustomerController@create');
    Route::get('/customer/getItem', 'CustomerController@getItem');
    Route::post('/customer/edit', 'CustomerController@edit');
    Route::delete('/customer/delete', 'CustomerController@delete');

});

?>