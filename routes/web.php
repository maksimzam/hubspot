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

Route::get('/', 'App\Http\Controllers\AuthController@login')->name('login');


Route::post('/login_process', 'App\Http\Controllers\AuthController@login_process')->name('login_process');


Route::middleware('auth')->group(function () {
    Route::get('/customers', 'App\Http\Controllers\CustomerController@list')->name('customers');
    Route::get('/customer_add', 'App\Http\Controllers\CustomerController@add')->name('customer_add');
    Route::post('/customer_add_process', 'App\Http\Controllers\CustomerController@add_process')->name('customer_add_process');
    Route::get('/customer_edit/{customer_id}', 'App\Http\Controllers\CustomerController@edit')->name('customer_edit');
    Route::post('/customer_edit_process/{customer_id}', 'App\Http\Controllers\CustomerController@edit_process')->name('customer_edit_process');
    Route::get('/customer_delete/{customer_id}', 'App\Http\Controllers\CustomerController@delete')->name('customer_delete');
    Route::get('/customers_export', 'App\Http\Controllers\CustomerController@export')->name('customers_export');
     
    Route::get('/properties', 'App\Http\Controllers\PropertyController@list')->name('properties');
    Route::get('/property_add', 'App\Http\Controllers\PropertyController@add')->name('property_add');
    Route::post('/property_add_process', 'App\Http\Controllers\PropertyController@add_process')->name('property_add_process');
    Route::get('/property_edit/{property_id}', 'App\Http\Controllers\PropertyController@edit')->name('property_edit');
    Route::post('/property_edit_process/{property_id}', 'App\Http\Controllers\PropertyController@edit_process')->name('property_edit_process');
    Route::get('/property_delete/{property_id}', 'App\Http\Controllers\PropertyController@delete')->name('property_delete');
     

    Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
});
