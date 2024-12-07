<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\CutiIzinController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\JabatanController;



// Route::get('/dashboard_admin', function () {
//     return view('admin.dashboard_admin', ["title"=> "Dashboard"]);
// });
// Route::get('/data_karyawan', function () {
//     return view('admin.data_karyawan', ["title"=> "Data Karyawan"]);
// });

Route::get('/data_karyawan',[UserController::class,'show'])->name('data_karyawan');
    

// Data Karyawan start
Route::get('/data_karyawan',[UserController::class,'indexDataKaryawan'])->name('Data Karyawan');
Route::get('/data_karyawan/{id}/detail', [UserController::class, 'showDetailKaryawan'])->name(name: 'Detail {ID} Karyawan');
Route::get('/tambah_karyawan', [UserController::class, 'indexTambahKaryawan'])->name('Tambah Karyawan');
Route::post('/tambah_karyawan', [UserController::class, 'storeTambahKaryawan']);
Route::get('/data_karyawan/{id}/edit', [UserController::class, 'showEditKaryawan']);
Route::patch('/data_karyawan/{id}/update', [UserController::class, 'updateDataKaryawan']);
Route::get('/data_karyawan/{id}/delete', [UserController::class, 'deleteDataKaryawan']);
// Data Karyawan end

//Absensi
Route::get('/absensi',  function (){
    return view('karyawan.absensi', ["title" => "Absensi"]);
})->middleware('auth');
Route::get('/absensi', [AbsensiController::class, 'index'])->name('karyawan.absensi')->middleware('auth');
Route::post('/absensi', [AbsensiController::class, 'store'])->name('karyawan.absensi.submit')->middleware('auth');
Route::get('/riwayat', [AbsensiController::class, 'riwayat'])->name('karyawan.riwayat')->middleware('auth');
//EndAbsensi

//Jabatan
Route::get('/jabatan', [JabatanController::class, 'index'])->name('admin.jabatan')->middleware('auth');
Route::get('/admin/create_jabatan', [JabatanController::class, 'create'])->name('jabatan.create')->middleware('auth');
Route::post('/jabatan', [JabatanController::class, 'store'])->name('jabatan.store')->middleware('auth');
Route::get('/admin/{id}/edit_jabatan', [JabatanController::class, 'edit'])->name('jabatan.edit')->middleware('auth');
Route::put('/jabatan/{id}', [JabatanController::class, 'update'])->name('jabatan.update')->middleware('auth');
Route::delete('/jabatan/{id}', [JabatanController::class, 'destroy'])->name('jabatan.destroy')->middleware('auth');
//EndJabatan

Route::get('/profile', [UserController::class, 'index'])->name('karyawan.profil')->middleware('auth');

Route::resource('kontrak', KontrakController::class);

// Route::get('/pengajuan_izincuti', [CutiIzinController::class, 'create'])->name('karyawan.pengajuan_izincuti');

Route::get('/pengajuan_izincuti', function () {
    return view('karyawan.pengajuan_izincuti');
});


Route::get('/pengajuan_cutiizin', [CutiIzinController::class, 'create'])->name('karyawan.pengajuan_cutiizin');
Route::post('/pengajuan_cutiizin', [CutiIzinController::class, 'store'])->name('pengajuan_cutiizin.create');

// Route::get('/admin/dashboard', [Controller::class, 'showDashboard'])->name('admin.dashboard');

Route::get('/dashboard_admin', [Controller::class, 'showDashboard'])->name('admin.dashboard_admin')->middleware('auth')->middleware('auth');
Route::get('/dashboard', [Controller::class, 'dashboard'])->name('karyawan.dashboard');


Route::resource('users', UserController::class)->middleware('auth');

Route::get('/manajemen_absensi', [AbsensiController::class, 'index_manajemen'])->name('admin.manajemen_absensi')->middleware('auth');
Route::resource('manajemen', AbsensiController::class)->middleware('auth');

Route::get('/profile_admin', [UserController::class, 'profile'])->name('admin.profile_admin')->middleware('auth');

Route::get('/persetujuan_izin&cuti', [CutiIzinController::class, 'persetujuanIzinIndex'])->name('admin.persetujuan_izin&cuti');
Route::patch('/persetujuan_izin&cuti/{id}', [CutiIzinController::class, 'persetujuanIzinUpdate'])->name('admin.persetujuan.izin');

// Login start
Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login',[AuthController::class, 'autentication']);
Route::get('/logout',[AuthController::class, 'logout']);
// Login end
