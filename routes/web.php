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
    return view('welcome');
});

Route::prefix("admin")->group(function(){
    Route::get('/', 'SiswaController@index');
    Route::post('/create', 'SiswaController@store');
    Route::post('/update/{id}', 'SiswaController@update');
    Route::get('/delete/{id}', 'SiswaController@destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
