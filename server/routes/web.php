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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'api'], function(){
    Route::get('Rocket', 'APIControllers\RocketController@index');
});

Route::group(['prefix' => 'api'], function(){
    // Route::get('Hotel', 'APIControllers\HotelController@index');
    // Route::get('get/{id}', 'APIControllers\HotelController@getID');
    Route::resource('hotel', 'API\HotelController');
});
