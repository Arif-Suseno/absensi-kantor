<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\User;
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
    public function index_manajemen()
    {
        $manajemen = Absensi::with('user')->get();
        return view('admin.manajemen_absensi', ["title" => "Manajemen Absensi"], compact('manajemen'));
    }


    public function create()
    {
        $users = User::all();
        return view('admin.manajemen_create', ["title" => "Manajemen Create"], compact('users'));
    }


    public function store_manajemen(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required'
        ]);

        // Absensi::create($request->all());
        $manajemen = new Absensi;
        $manajemen->user_id = $request->user_id;
        $manajemen->tanggal = $request->tanggal;
        $manajemen->status = $request->status;

        // Menambahkan waktu_masuk saat absensi dibuat
        $manajemen->waktu_masuk = now(); // `now()` mengambil waktu saat ini

        $manajemen = Absensi::with('user')->get(); // Mengambil data absensi beserta data user

        $manajemen->save();

        return redirect()->route('manajemen.index')->with('success', 'Absensi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $manajemen = Absensi::findOrFail($id);
        $users = User::all();
        return view('admin.manajemen_edit', ["title" => "Manajemen Edit"], compact('manajemen', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required'
        ]);

        $manajemen = Absensi::findOrFail($id);
        $manajemen->update($request->all());
        return redirect()->route('admin.manajemen_absensi')->with('success', 'Absensi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $manajemen = Absensi::findOrFail($id);
        $manajemen->delete();
        return redirect()->back()->with('success', 'Absensi berhasil dihapus!');
    }

}
