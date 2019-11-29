<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('users/login', 'API\AuthController@login');
Route::post('users', 'API\AuthController@register');

// Route::get('user', 'UserController@index');
// Route::match(['put', 'patch'], 'user', 'UserController@update');

// Route::get('profiles/{user}', 'ProfileController@show');
// Route::post('profiles/{user}/follow', 'ProfileController@follow');
// Route::delete('profiles/{user}/follow', 'ProfileController@unFollow');

Route::group(['prefix' => 'v1'], function(){
    // Route::get('Hotel', 'APIControllers\HotelController@index');
    // Route::get('get/{id}', 'APIControllers\HotelController@getID');
    Route::resource('hotel', 'API\HotelController')->except(['show']);
    Route::get('hotel/{slug}', 'API\HotelController@findSlug');
});