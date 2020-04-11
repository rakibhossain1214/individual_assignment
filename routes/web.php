<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/buses', 'BusController@index');
Route::post('/buses', 'BusController@action')->name('live_search.action');

Route::get('/buses/edit/{id}', 'BusController@edit');
Route::get('/buses/show/{id}', 'BusController@show');
Route::get('/buses/add', 'BusController@create');
Route::post('/buses/store', 'BusController@store');
Route::get('/buses/update/{id}', 'BusController@update');
Route::post('/buses/delete/{id}', 'BusController@destroy');

Route::get('/schedules', 'ScheduleController@index');
Route::get('/schedules/edit/{id}', 'ScheduleController@edit');
Route::get('/schedules/show/{id}', 'ScheduleController@show');
Route::get('/schedules/add', 'ScheduleController@create');
Route::post('/schedules/store', 'ScheduleController@store');
Route::get('/schedules/update/{id}', 'ScheduleController@update');
Route::post('/schedules/delete/{id}', 'ScheduleController@destroy');