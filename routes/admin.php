<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/


 Route::group(['middleware'=>'admin'],function () {
    Route::get('/','Admin\DashboardController@index')->name('dashboard');
    Route::get('/book','Admin\DashboardController@indexb')->name('dashboardb');
    Route::resource('users','Admin\UsersController');
    Route::post('/oner/approve/{oner}	','Admin\OnersController@approve')->name('approve-oner');
    Route::post('/CEVENT/approve/{cevent}	','Admin\CeventsController@approve')->name('approve-cevent');
    Route::resource('Oners','Admin\OnersController'); 
    Route::resource('CreatorEvents','Admin\CeventsController'); 
   
 




});
