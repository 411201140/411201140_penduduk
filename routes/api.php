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

Route::resource('provinces', 'ProvinceController');
Route::resource('cities', 'CityController');
Route::resource('residents', 'ResidentController');

Route::get('/provinces/getData/count', 'ProvinceController@countAll');
Route::get('/cities/getData/count', 'CityController@countAll');
Route::get('/residents/getData/count', 'ResidentController@countAll');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

