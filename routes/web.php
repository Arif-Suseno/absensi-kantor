<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard_admin', function () {
    return view('admin.dashboard_admin', ["title"=> "Dashboard"]);
});

Route::get('/login', function () {
    return view('login');
});
