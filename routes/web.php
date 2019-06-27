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
	Route::resource('/attribute-category', 'AttributeCategoryController');

	//Категории
    Route::resource('/categories', 'CategoryController');
	
	//Коменты
    Route::resource('/comments', 'PageCommentsController');

    //Ставки
    Route::resource('/bets', 'BetsController');

    //Настройки
    Route::resource('/settings', 'SettingController');

	Route::get('/profile', 'ProfileController@index');
	Route::post('/profile', 'ProfileController@update');


	Route::post('/search', 'SearchController@get');

});

Route::group([
	'middleware'=>'guest'
], function () {
	Route::get('/register', 'AuthController@registerForm')->name('registerView');
	Route::post('/register', 'AuthController@register')->name('register');
	Route::get('/login', 'AuthController@loginForm')->name('login');
	Route::post('/login', 'AuthController@login');
});

Route::group([
	'middleware'=>'auth'
], function () {
	Route::get('/logout', 'AuthController@logout')->name('logout');
});

Route::get('/search', 'HomeController@search')->name('searching');
Route::get('/', 'HomeController@index')->name('home');
Route::post('/callback', 'HomeController@callback')->name('callback');


Route::post('/subscribe', 'SubscribeController@subscribe')->name('subscribe');
Route::get('/verify/{token}', 'SubscribeController@verify');