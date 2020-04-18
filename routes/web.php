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

//Equipment
Route::resource('equipments', 'EquipmentController');
Route::apiResource('equipments', 'EquipmentController');

//Flower
Route::resource('flowers', 'FlowerController');
Route::apiResource('flowers', 'FlowerController');

//Food
Route::resource('foods', 'FoodController');
Route::apiResource('foods', 'FoodController');

//Light
Route::resource('lights', 'LightController');
Route::apiResource('lights', 'LightController');


//Venue
Route::resource('venues', 'VenueController');
Route::apiResource('venues', 'VenueController');

//BookVenue
Route::resource('bookvenues', 'BookVenueController');
Route::apiResource('bookvenues', 'BookVenueController');

//VenueData
Route::get('/cart/venuedata', 'VenueDataController@index')->name('venuedata.cart');
Route::post('/cart', 'VenueDataController@store')->name('venuedata.cart');

//Booking
Route::resource('books', 'BookingController');
Route::apiResource('books', 'BookingController');
Route::delete('/cart/{id}', 'BookingController@destroy');

//Book
Route::resource('books', 'BookController');
Route::apiResource('books', 'BookController');

//CartEquipment
Route::resource('cartequipments', 'CartEquipmentController');
Route::apiResource('cartequipments', 'CartEquipmentController');
Route::get('/cart/cartequipment', 'CartEquipmentController@index')->name('cartequipment.cart');
Route::post('/cart/cartequipment', 'CartEquipmentController@store')->name('cartequipment.cart');

//CartLight
Route::resource('cartlights', 'CartLightController');
Route::apiResource('cartlights', 'CartLightController');
Route::get('/cart/cartlights', 'CartLightController@index')->name('cartlights.cart');
Route::post('/cart/cartlights', 'CartLightController@store')->name('cartlights.cart');

//Cartflower
Route::resource('cartflowers', 'CartFlowerController');
Route::apiResource('cartflowers', 'CartFlowerController');
Route::get('/cart/cartflowers', 'CartFlowerController@index')->name('cartflowers.cart');
Route::post('/cart/cartflowers', 'CartFlowerController@store')->name('cartflowers.cart');

//Service
Route::resource('services', 'ServiceController');
Route::apiResource('services', 'ServiceController');