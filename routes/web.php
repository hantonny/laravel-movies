<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index');
Route::view('/favorito', 'favorito');
Route::view('/movie', 'show');
