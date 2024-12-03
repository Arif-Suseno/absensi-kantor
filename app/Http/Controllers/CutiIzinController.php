<?php
// app/Http/Controllers/CutiIzinController.php

namespace App\Http\Controllers;

use App\Models\IzinCuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CutiIzinController extends Controller
{
    // Menampilkan form pengajuan
    public function create()
    {
        return view('karyawan.pengajuan_cutiizin'); // Update ke halaman pengajuan_cutiizin
    }

    // Menyimpan data pengajuan
    public function store(Request $request)
    {
        // Validasi inputan
        $validated = $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'jenis' => 'required|in:Cuti,Izin',
            'alasan' => 'nullable|string',
        ]);

        // Menambahkan user_id yang sedang login
        $validated['user_id'] = Auth::id();
        $validated['status'] = 'Diajukan'; // Status default adalah "Diajukan"

        // Menyimpan pengajuan
        IzinCuti::create($validated);

        return redirect()->route('pengajuan_cutiizin.create')
                         ->with('success', 'Pengajuan cuti/izin berhasil dikirim.');
    }
}
