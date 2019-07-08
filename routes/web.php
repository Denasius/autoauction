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

    //Бренды Авто
    Route::resource('/brands', 'BrandsController');

    //Модели Авто
    Route::resource('/models', 'ModelsController');

	//Категории
    Route::resource('/categories', 'CategoryController');
	
	//Коменты
    Route::resource('/comments', 'PageCommentsController');

    //Ставки
    Route::resource('/bets', 'BetsController');

    //Подписки
    Route::resource('/subscribtions', 'SubscribeController');
    Route::get('/subscribtions/{id}/active_subscribe', 'SubscribeController@active_subscribe')->name('subscribtions.active_subscribe');

    //Настройки
    Route::resource('/settings', 'SettingController');

    //ЧПУ урлы
    Route::resource('/aliases', 'AliasController');

    //Слайдер
    Route::resource('/sliders', 'SlidersController');

    //Профиль
	Route::get('/profile', 'ProfileController@index');
	Route::post('/profile', 'ProfileController@update');

	//Поиск
	Route::post('/search', 'SearchController@get');


	Route::get('/showcars', 'LotsController@show')->name('showmodels');
});

//Загрузка изображения для профиля
Route::post('/upload_image_profile', 'ImagesController@upload_image_profile')->name('upload_image_profile');

//Типа универсальная загрузка...
Route::post('/upload_image', 'ImagesController@upload_image')->name('upload_image');

//Если не авторизирован
Route::group(['middleware'=>'guest'], function () {
	Route::get('/register', 'AuthController@registerForm')->name('registerView');
	Route::post('/register', 'AuthController@register')->name('register');
	Route::get('/login', 'AuthController@loginForm')->name('login');
	Route::post('/login', 'AuthController@login');
});

//Если вторизирован
Route::group(['middleware'=>'auth'], function () {
	Route::get('/logout', 'AuthController@logout')->name('logout');

	//Профиль пользователя
    Route::get('/profile', 'ProfilesController@index');
});

Route::get('/search', 'HomeController@search')->name('searching');
Route::get('/', 'HomeController@index')->name('home');
Route::post('/callback', 'HomeController@callback')->name('callback');

Route::post('/subscribe', 'SubscribeController@subscribe')->name('subscribe');
Route::get('/verify/{token}', 'SubscribeController@verify');

//Фильтр на аукционах
Route::post('/filter', 'AuctionController@filter')->name('filter');
Route::post('/advanced-search', 'AuctionController@search_filter')->name('search-filter');
Route::post('/global-search', 'AuctionController@global_search')->name('global-search');
// Роутинг для отслеживания страниц по URL
Route::get('/{path}', 'AliasController@alias')->where('path', '.+')->name('aliases');
