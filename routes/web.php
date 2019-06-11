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
Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware' => 'admin'], function () {	
	Route::get('/', 'DashboardController@index')->name('admin');
	Route::resource('/categories', 'CategoriesController');
	Route::resource('/lots', 'LotsController');
	Route::resource('/tags', 'TagsController');
	Route::resource('/brands', 'CarbrandsController'); 					
	Route::resource('/cylinders', 'CarcylindersController');		
	Route::resource('/disks', 'CardisksController');					
	Route::resource('/drives', 'CardrivesController');					
	Route::resource('/fuels', 'CardfuelsController');					
	Route::resource('/potencias', 'CarpotenciasController');
	Route::resource('/transmissions', 'CartransmissionsController');	
	Route::resource('/users', 'UsersController');
	Route::resource('/pages', 'PagesController');
	//Атрибуты
	Route::resource('/attributes', 'AttributeController');
	Route::resource('/attribute_types', 'AttributeTypeController');

	//Категории
    Route::resource('/categories', 'CategoryController');

	Route::get('/profile', 'ProfileController@index');
	Route::post('/profile', 'ProfileController@update');
});

Route::get('/register', 'AuthController@registerForm')->name('registerView');
Route::post('/register', 'AuthController@register')->name('register');
Route::get('/login', 'AuthController@loginForm')->name('login');
Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');