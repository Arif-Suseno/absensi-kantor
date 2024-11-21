<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\JabatanController;

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

Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan.index');
Route::get('/admin/create_jabatan', [JabatanController::class, 'create'])->name('jabatan.create');
// Route::post('/jabatan', [JabatanController::class, 'store'])->name('jabatan.store');
Route::get('/admin/{id}/edit_jabatan', [JabatanController::class, 'edit'])->name('jabatan.edit');
// Route::put('/jabatan/{id}', [JabatanController::class, 'update'])->name('jabatan.update');
// Route::delete('/jabatan/{id}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');

