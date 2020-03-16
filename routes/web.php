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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//User
Route::resource('users', 'UserController');
Route::apiresource('users', 'UserController');
Route::get('/list', 'UserController@list')->name('users.list');

//Event
Route::resource('events', 'EventController');
Route::apiresource('events', 'EventController');
Route::delete('events/destroy', 'EventsController@massDestroy')->name('events.massDestroy');

//Food
Route::resource('foods', 'FoodController');
Route::apiresource('foods', 'FoodController');
Route::get('/food/list', 'FoodController@getIndex')->name('foods.getIndex');
Route::get('/add-to-cart/{id}', 'FoodController@getAddCart')->name('foods.getAddCart');
Route::get('/shopping-cart', 'FoodController@getShopCart')->name('foods.getShopCart');
//Venue
Route::resource('venues', 'VenueController');
Route::get('/venue/search', 'VenueController@search')->name('venues.search');