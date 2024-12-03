<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\CutiIzinController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard_admin', function () {
    return view('admin.dashboard_admin', ["title"=> "Dashboard"]);
});

Route::get('/data_karyawan',[UserController::class,'show'])->name('data_karyawan');
    

Route::get('/login', function () {
    return view('login');
});

Route::get('/absensi',  function (){
    return view('karyawan.absensi', ["title" => "Absensi"]);
});
Route::get('/absensi', [AbsensiController::class, 'index'])->name('karyawan.absensi');
Route::post('/absensi', [AbsensiController::class, 'store'])->name('karyawan.absensi.submit');

Route::get('/profile', [UserController::class, 'index'])->name('karyawan.profil');

Route::resource('kontrak', KontrakController::class);

// Route::get('/pengajuan_izincuti', [CutiIzinController::class, 'create'])->name('karyawan.pengajuan_izincuti');

Route::get('/pengajuan_izincuti', function () {
    return view('karyawan.pengajuan_izincuti');
});

// Route::middleware('auth')->group(function () {
    Route::get('karyawan/pengajuan-cutiizin', [CutiIzinController::class, 'create'])->name('pengajuan_cutiizin.create');
    Route::post('karyawan/pengajuan-cutiizin', [CutiIzinController::class, 'store'])->name('pengajuan_cutiizin.store');
// });