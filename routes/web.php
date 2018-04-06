<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login','LoginController@index')->name('login');
Route::post('/login','LoginController@login');
Route::get('/logout','LoginController@logout');
Route::get('/register','RegisterController@index');
Route::post('/register','RegisterController@register');
Route::get('/dashboard','DashboardController@index')->middleware(['auth','verify']);
Route::post('/dashboard','DashboardController@generateToken')->middleware(['auth','verify']);
Route::get('/dashboard/{token}/delete','DashboardController@deleteToken')->middleware(['auth','verify']);
Route::get('/checkpoint','CheckpointController@index')->middleware('auth');
Route::post('/checkpoint','CheckpointController@checkCode')->middleware('auth');
Route::get('/checkpoint/{id}/resend','CheckpointController@resend')->middleware('auth');
