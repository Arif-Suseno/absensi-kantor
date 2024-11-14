<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard_admin', function () {
//     return view('admin.dashboard_admin', ["title"=> "Dashboard"]);
// });
// Route::get('/data_karyawan', function () {
//     return view('admin.data_karyawan', ["title"=> "Data Karyawan"]);
// });

Route::get('/login', function () {
    return view('login');
});

// Route::get('/admin/dashboard', [Controller::class, 'showDashboard'])->name('admin.dashboard');

Route::get('/admin/dashboard', [Controller::class, 'showDashboard'])->name('admin.dashboard');
