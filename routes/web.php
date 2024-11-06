<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dasboard', function () {
    return view('admin.dasboard');
});

Route::get('/login', function () {
    return view('login');
});
