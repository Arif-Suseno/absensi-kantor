<?php

namespace App\Http\Controllers;

use App\Models\IzinCuti;
use App\Models\CutiIzin;
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

        return redirect()->route('karyawan.pengajuan_cutiizin')
                         ->with('success', 'Pengajuan cuti/izin berhasil dikirim.');
    }
    public function persetujuanIzinIndex()
{
    $title = 'Persetujuan Izin dan Cuti';
    $pengajuan = CutiIzin::with('user')->where('status', 'Pending')->get();
    return view('admin.persetujuan_izin&cuti', compact('title','pengajuan'));
}

public function persetujuanIzinUpdate(Request $request, $id)
{
    $izin = CutiIzin::findOrFail($id);
    $izin->status = $request->status;
    $izin->save();

    return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui.');
}


}
