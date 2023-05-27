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
Route::resource('provinces', 'ProvinceController');
Route::resource('cities', 'CityController');
Route::resource('residents', 'ResidentController');

Route::get('/provinces/getData/count', 'ProvinceController@countAll');
Route::get('/cities/getData/count', 'CityController@countAll');
Route::get('/residents/getData/count', 'ResidentController@countAll');

Route::get('/', function () {
    return view('welcome');
});
