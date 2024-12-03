<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return redirect('/');
});

Route::get('/gestion', function () {
    return view('gestion');
});

/* Route::get('/about', function () {
    return view('about');
}); */
