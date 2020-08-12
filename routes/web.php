<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('home');
});

Route::get('/listmovie', 'MoviesController@index')->name('movies.index')->middleware('auth');
Route::post('/movies/{movie}', 'MoviesController@store')->middleware('auth');

Route::get('/movies/{movie}', 'MoviesController@show')->name('movies.show')->middleware('auth');
Route::get('/favorito', 'MoviesController@create')->name('movies.create')->middleware('auth');

Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@authenticate');

Route::get('register', 'Auth\RegisterController@index')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::post('logout', 'Auth\LoginController@logout')->name('logout');

