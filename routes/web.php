<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return redirect('/');
});

Route::get('/management', function () {
    return view('gestion');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/graduates', function () {
    return view('graduates');
});
