<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\CutiIzinController;
use App\Http\Controllers\AbsensiController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard_admin', function () {
//     return view('admin.dashboard_admin', ["title"=> "Dashboard"]);
// });
// Route::get('/data_karyawan', function () {
//     return view('admin.data_karyawan', ["title"=> "Data Karyawan"]);
// });

Route::get('/data_karyawan',[UserController::class,'show'])->name('data_karyawan');
    

Route::get('/login', function () {
    return view('login');
});

// Route::get('/admin/dashboard', [Controller::class, 'showDashboard'])->name('admin.dashboard');

Route::get('/dashboard_admin', [Controller::class, 'showDashboard'])->name('admin.dashboard_admin');

Route::resource('users', UserController::class);
// Route::resource('cuti-izin', CutiIzinController::class);
// Route::resource('absensi', AbsensiController::class);

Route::get('/manajemen_absensi', [AbsensiController::class, 'index'])->name('admin.manajemen_absensi');

Route::resource('manajemen', AbsensiController::class);

// Route::get('/profile_admin', function () {
//     return view('profile_admin');
// });

Route::get('/profile_admin', [UserController::class, 'profile'])->name('admin.profile_admin');