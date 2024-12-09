<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::all();
        $title = 'Daftar Jabatan'; // Judul halaman
        return view('admin.jabatan', compact('jabatans', 'title'));
    }

    // Menampilkan form untuk menambah jabatan
    public function create()
    {
        $title = 'Tambah Jabatan';
        return view('admin.create_jabatan', compact('title'));
    }

    // Menyimpan jabatan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Jabatan::create($request->all());
        return redirect()->route('admin.jabatan')->with('success', 'Jabatan berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit jabatan
    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $title = 'Edit Jabatan';
        return view('admin.edit_jabatan', compact('jabatan', 'title'));
    }

    // Memperbarui jabatan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $jabatan = Jabatan::findOrFail($id);
        $jabatan->update($request->all());
        return redirect()->route('admin.jabatan')->with('success', 'Jabatan berhasil diperbarui');
    }

    // Menghapus jabatan
    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();
        return redirect()->route('admin.jabatan')->with('success', 'Jabatan berhasil dihapus');
    }
    public function dashboard_admin()
{
    // Ambil 5 data karyawan terbaru
    $karyawan = \App\Models\User::latest()->take(5)->get();
    
    // Ambil maksimal 3 data jabatan
    $jabatans = Jabatan::latest()->take(3)->get();
    
    $title = 'Dashboard Admin'; // Judul halaman
    return view('admin.dashboard_admin', compact('karyawan', 'jabatans', 'title'));
}
}

