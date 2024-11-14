<?php

use App\Http\Controllers\AbsensiController;
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
