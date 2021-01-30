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

Route::get('/', 'RegisterUserController@index');

Route::post('/Money-Wallet/Register', 'RegisterUserController@store');
Route::get('/Money-Wallet/Register', 'RegisterUserController@index');

Route::group(['middleware' => 'user'], function () {
    Route::post('/userdshboard/managecategory', 'UserCategoryController@store');
    Route::get('/userdshboard/managecategory', 'UserCategoryController@index');

    Route::post('/userdshboard/manageincomes', 'TransactionController@store');
    Route::get('/userdshboard/manageincomes', 'TransactionController@index');

    Route::post('/userdshboard/manageexpenses', 'TransactionController@storeexpenses');
    Route::get('/userdshboard/manageexpenses', 'TransactionController@indexexpenses');

    Route::get('/userdshboard/summarypage', 'TransactionController@indexsummry');
});

Route::get('/admindashboard', 'AdminController@index')->middleware('admin');


Route::post('/Money-Wallet/login', 'LoginController@check');
Route::get('/Money-Wallet/login', 'LoginController@index');
Route::get('/Money-Wallet/logout', 'LoginController@logout');



Route::post('/Money-Wallet/adminlogin', 'AdminController@check');
Route::get('/Money-Wallet/adminlogin', 'AdminController@login');
