<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\CutiIzinController;

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
    

// Data Karyawan start
Route::get('/data_karyawan',[UserController::class,'indexDataKaryawan'])->name('Data Karyawan')->middleware('auth');
Route::get('/data_karyawan/{id}/detail', [UserController::class, 'showDetailKaryawan'])->name('Detail {ID} Karyawan')->middleware('auth'); 
Route::get('/tambah_karyawan', [UserController::class, 'indexTambahKaryawan'])->name('Tambah Karyawan')->middleware('auth');
Route::post('/tambah_karyawan', [UserController::class, 'storeTambahKaryawan'])->middleware('auth');
Route::get('/data_karyawan/{id}/edit', [UserController::class, 'showEditKaryawan'])->middleware('auth');
Route::patch('/data_karyawan/{id}/update', [UserController::class, 'updateDataKaryawan'])->middleware('auth');
Route::get('/data_karyawan/{id}/delete', [UserController::class, 'deleteDataKaryawan'])->middleware('auth');
// Data Karyawan end


Route::get('/absensi',  function (){
    return view('karyawan.absensi', ["title" => "Absensi"]);
});
Route::get('/absensi', [AbsensiController::class, 'index'])->name('karyawan.absensi');
Route::post('/absensi', [AbsensiController::class, 'store'])->name('karyawan.absensi.submit');

Route::get('/profile', [UserController::class, 'index'])->name('karyawan.profil');

// Route::get('/admin/dashboard', [Controller::class, 'showDashboard'])->name('admin.dashboard');

Route::get('/dashboard', [Controller::class, 'showDashboard'])->name('admin.dashboard');

Route::resource('users', UserController::class);

Route::get('/manajemen_absensi', [AbsensiController::class, 'index_manajemen'])->name('admin.manajemen_absensi');

Route::resource('manajemen', AbsensiController::class);

Route::get('/profile_admin', [UserController::class, 'profile'])->name('admin.profile_admin');

// Login start
Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login',[AuthController::class, 'autentication']);
Route::get('/logout',[AuthController::class, 'logout']);
// Login end
