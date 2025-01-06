<?php
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\CutiIzinController;
use App\Http\Middleware\RoleMiddleware;

Route::middleware(['auth', RoleMiddleware::class. ':Admin'])->group(function(){
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
    // Admin
    Route::get('/dashboard_admin', [Controller::class, 'showDashboard'])->name('admin.dashboard_admin')->middleware('auth')->middleware('auth');
    // Route::get('/dashboard_admin', [Controller::class, 'dashboard_admin'])->name('admin.dashboard_admin');
    // Dashboard end
});
Route::middleware(['auth', RoleMiddleware::class. ':Karyawan'])->group(function(){
    // Absensi
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('karyawan.absensi');
    Route::post('/absensi', [AbsensiController::class, 'store'])->name('karyawan.absensi.submit');

    Route::get('/riwayat', [AbsensiController::class, 'riwayat'])->name('karyawan.riwayat');
    //EndAbsensi
    // Pengajuan izin cuti start
    Route::get('/pengajuan_cutiizin', [CutiIzinController::class, 'index'])->name('karyawan.pengajuan_cutiizin');
    Route::post('/pengajuan_cutiizin', [CutiIzinController::class, 'store'])->name('pengajuan_cutiizin.create');
    Route::delete('/pengajuan_cutiizin/{id}', [CutiIzinController::class, 'destroy'])->name('pengajuan_cutiizin.destroy');
    // Pengajuan izin cuti end
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('karyawan.dashboard');
});
Route::middleware('auth')->group(function(){

    // Logout start
    Route::get('/logout',[AuthController::class, 'logout']);
    // Logout end
    // Profile start
    Route::get('/profile', [UserController::class, 'editProfile'])->name('profil');
    Route::patch('/profile', [UserController::class, 'updateProfile'])->name('fitur-update-profile');
    // Profile end
});

Route::middleware('guest')->group(function(){
    // Login start
    Route::get('/login',[AuthController::class, 'login'])->name('login');
    Route::post('/login',[AuthController::class, 'autentication']);
    // Login end
});
