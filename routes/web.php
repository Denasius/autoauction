<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function () {	
	Route::get('/', 'DashboardController@index')->name('admin');
	Route::resource('/categories', 'CategoriesController');
	Route::resource('/tags', 'TagsController');
	Route::resource('/brands', 'CarbrandsController'); 					
	Route::resource('/cylinders', 'CarcylindersController');		
	Route::resource('/disks', 'CardisksController');					
	Route::resource('/drives', 'CardrivesController');					
	Route::resource('/fuels', 'CardfuelsController');					
	Route::resource('/potencias', 'CarpotenciasController');
	Route::resource('/transmissions', 'CartransmissionsController');	
	Route::resource('/users', 'UsersController');	
});