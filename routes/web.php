<?php
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\CutiIzinController;

Route::middleware('auth')->group(function(){
    // Data Karyawan start
    Route::resource('data_karyawan', UserController::class);
    // Data Karyawan end
    //Jabatan start
    Route::resource('jabatan', JabatanController::class);
    //Jabatan end
    // kontrak start
    Route::resource('kontrak', KontrakController::class);
    // kontrak end    
    // Dashboard Admin start
    Route::get('/dashboard_admin', [Controller::class, 'showDashboard'])->name('admin.dashboard_admin');
    // Dashboard Admin end
    // Manajemen absensi start
    Route::get('/manajemen_absensi', [AbsensiController::class, 'index_manajemen'])->name('admin.manajemen_absensi');
    Route::resource('manajemen', AbsensiController::class);
    // Manajemen absensi end
    // Persetujuan izin cuti start
    Route::get('/persetujuan_izin&cuti', [CutiIzinController::class, 'persetujuanIzinIndex'])->name('admin.persetujuan_izin&cuti');
    Route::patch('/persetujuan_izin&cuti/{id}', [CutiIzinController::class, 'persetujuanIzinUpdate'])->name('admin.persetujuan.izin');
    // Persetujuan izin cuti end
    // Absensi
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('karyawan.absensi');
    Route::post('/absensi', [AbsensiController::class, 'store'])->name('karyawan.absensi.submit');
    Route::get('/riwayat', [AbsensiController::class, 'riwayat'])->name('karyawan.riwayat');
    //EndAbsensi
    // Profile start
    Route::get('/profile', [UserController::class, 'editProfile'])->name('profil');
    Route::patch('/profile', [UserController::class, 'updateProfile'])->name('fitur-update-profile');
    // Profile end
    // Pengajuan izin cuti start
    Route::get('/pengajuan_cutiizin', [CutiIzinController::class, 'create'])->name('karyawan.pengajuan_cutiizin');
    Route::post('/pengajuan_cutiizin', [CutiIzinController::class, 'store'])->name('pengajuan_cutiizin.create');
    // Pengajuan izin cuti end
    // Logout start
    Route::get('/logout',[AuthController::class, 'logout']);
    // Logout end
    // Dashboard start
    // Karyawan
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('karyawan.dashboard');
    // Admin
    Route::get('/dashboard_admin', [Controller::class, 'showDashboard'])->name('admin.dashboard_admin')->middleware('auth')->middleware('auth');
    Route::get('/dashboard_admin', [Controller::class, 'dashboard_admin'])->name('admin.dashboard_admin');
    // Dashboard end
    
});

Route::middleware('guest')->group(function(){
    // Login start
    Route::get('/login',[AuthController::class, 'login'])->name('login');
    Route::post('/login',[AuthController::class, 'autentication']);
    // Login end
});
