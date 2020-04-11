<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/buses', 'BusController@index');
Route::get('/buses/edit/{id}', 'BusController@edit');
Route::get('/buses/show/{id}', 'BusController@show');
Route::get('/buses/add', 'BusController@create');
Route::post('/buses/store', 'BusController@store');
Route::post('/buses/update/{id}', 'BusController@update');
Route::post('/buses/delete/{id}', 'BusController@destroy');