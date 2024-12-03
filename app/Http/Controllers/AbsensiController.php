<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    // Tampilkan halaman absensi dengan formulir
    public function index()
    {
        return view('karyawan.absensi', ['title' => 'Formulir Absensi']);
    }

    // Simpan data absensi
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'status' => 'required|in:Hadir,Sakit,Cuti,Alpa,Izin',
    //     ]);

    //     Absensi::create([
    //         'user_id' => Auth::id(),
    //         'tanggal' => Carbon::now()->toDateString(),
    //         'waktu_masuk' => Carbon::now()->format('H:i:s'),
    //         'waktu_keluar' =>  null,  // atau '00:00:00',
    //         'status' => $request->status,
    //     ]);

    //     return redirect()->route('karyawan.riwayat')->with('success', 'Absensi berhasil disimpan!');
    // }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id', // Validasi bahwa user_id ada di tabel users
            'status' => 'required|in:Hadir,Sakit,Cuti,Alpa,Izin',
        ]);

        Absensi::create([
            'user_id' => $request->user_id,  // user_id dikirim dari permintaan
            'tanggal' => Carbon::now()->toDateString(),
            'waktu_masuk' => Carbon::now()->format('H:i:s'),
            'waktu_keluar' => null,  // atau '00:00:00'
            'status' => $request->status,
        ]);

        return redirect()->route('karyawan.riwayat')->with('success', 'Absensi berhasil disimpan!');
    }

    
    //Tampilkan riwayat absensi karyawan
    public function riwayat(Request $request)
    {
        // Ambil user_id dari request, default ke ID user login (jika menggunakan autentikasi)
        $userId = $request->user_id ?? auth()->id();

        // Ambil data absensi
        $absensi = Absensi::where('user_id', $userId)
            ->orderBy('tanggal', 'desc')
            ->get();

        // Jika absensi kosong, tampilkan pesan tanpa error
        if ($absensi->isEmpty()) {
            return view('karyawan.riwayat', compact('absensi'), ['title' => 'Riwayat Absensi']);
        }

        return view('karyawan.riwayat', compact('absensi'), ['title' => 'Riwayat Absensi']);
    }
}
