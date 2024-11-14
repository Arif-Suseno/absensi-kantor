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
    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|in:Hadir,Sakit,Cuti,Alpa,Izin',
        ]);

        Absensi::create([
            'user_id' => Auth::id(),
            'tanggal' => Carbon::now()->toDateString(),
            'waktu_masuk' => Carbon::now()->format('H:i:s'),
            'waktu_keluar' =>  null,  // atau '00:00:00',
            'status' => $request->status,
        ]);

        return redirect()->route('karyawan.riwayat')->with('success', 'Absensi berhasil disimpan!');
    }

    // Tampilkan riwayat absensi karyawan
    // public function riwayat()
    // {
    //     $absensi = Absensi::where('user_id', Auth::id())->orderBy('tanggal', 'desc')->get();
    //     return view('karyawan.riwayat', compact('absensi'), ['title' => 'Riwayat Absensi']);
    // }

}
