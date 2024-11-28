<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsensiController;

Route::get('/dashboard_admin', function () {
    return view('admin.dashboard_admin', ["title"=> "Dashboard"]);
});

// Data Karyawan start
Route::get('/data_karyawan',[UserController::class,'indexDataKaryawan'])->name('Data Karyawan');
Route::get('/data_karyawan/{id}/detail', [UserController::class, 'showDetailKaryawan'])->name('Detail {ID} Karyawan'); 
Route::get('/tambah_karyawan', [UserController::class, 'indexTambahKaryawan'])->name('Tambah Karyawan');
Route::post('/tambah_karyawan', [UserController::class, 'storeTambahKaryawan']);
Route::get('/data_karyawan/{id}/edit', [UserController::class, 'showEditKaryawan']);
Route::patch('/data_karyawan/{id}/update', [UserController::class, 'updateDataKaryawan']);
Route::get('/data_karyawan/{id}/delete', [UserController::class, 'deleteDataKaryawan'])->name('Hapus Data Karyawan (id)');
// Data Karyawan end

Route::get('/login', function () {
    return view('login');
});

Route::get('/absensi',  function (){
    return view('karyawan.absensi', ["title" => "Absensi"]);
});
Route::get('/absensi', [AbsensiController::class, 'index'])->name('karyawan.absensi');
Route::post('/absensi', [AbsensiController::class, 'store'])->name('karyawan.absensi.submit');

Route::get('/profile', [UserController::class, 'index'])->name('karyawan.profil');