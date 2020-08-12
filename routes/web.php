<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('home');
});

Route::get('/listmovie', 'MoviesController@index')->name('movies.index');
Route::post('/movies/{movie}', 'MoviesController@store');

Route::get('/movies/{movie}', 'MoviesController@show')->name('movies.show');
Route::get('/favorito', 'MoviesController@create')->name('movies.create');

