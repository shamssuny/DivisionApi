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

Route::get('/alldata/{token}','ApiController@getAll');
Route::get('/divisionlist/{token}','ApiController@getDivision');
Route::get('/division/{division}/{token}','ApiController@getDistrict');
Route::get('/district/{district}/{token}','ApiController@getUpazila');
