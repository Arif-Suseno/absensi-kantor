<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard_admin', function () {
    return view('admin.dashboard_admin', ["title"=> "Dashboard"]);
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/absensi',  function (){
    return view('karyawan.absensi', ["title" => "Absensi"]);
});

Route::post('/karyawan/absensi/submit', function (Request $request) {
    // Contoh: Logika penyimpanan absensi (bisa disesuaikan dengan kebutuhan)
    
    // Misalnya kita menyimpan informasi absensi ke dalam sesi sebagai contoh sederhana
    session()->flash('status', 'Absensi berhasil dilakukan.');

    // Redirect kembali ke halaman absensi dengan pesan status
    return redirect()->route('karyawan.absensi');
})->name('karyawan.absensi.submit');