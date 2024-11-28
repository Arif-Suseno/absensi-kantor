<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    
    public function index()
    {
        $manajemen = Absensi::with('user')->get();
        return view('admin.manajemen_absensi', ["title" => "Manajemen Absensi"], compact('manajemen'));
    }


    public function create()
    {
        $users = User::all();
        return view('admin.manajemen_create', ["title" => "Manajemen Create"], compact('users'));
    }


    public function store(Request $request)
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
        return redirect()->route('manajemen.index')->with('success', 'Absensi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $manajemen = Absensi::findOrFail($id);
        $manajemen->delete();
        return redirect()->route('manajemen.index')->with('success', 'Absensi berhasil dihapus!');
    }
}
