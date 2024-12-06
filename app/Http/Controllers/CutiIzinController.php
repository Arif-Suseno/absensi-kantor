<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\IzinCuti;

class CutiIzinController extends Controller
{
    // Menampilkan form pengajuan
    public function index()
    {
        return view('karyawan.pengajuan_cutiizin', ['title' => 'Pengajuan Izin']);
    }
    public function create()
    {
        return view('karyawan.pengajuan_cutiizin'); // Update ke halaman pengajuan_cutiizin
    }

    // Menyimpan data pengajuan

    public function store(Request $request)
    {
        Log::info('Data diterima:', $request->all()); // Logging data yang diterima
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'jenis' => 'required|string',
            'alasan' => 'required|string',
        ]);

        $izin = IzinCuti::create([
            'user_id' => auth()->id(),
            'jenis' => $request->jenis,
            'alasan' => $request->alasan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'status' => 'Diajukan', // Default status
        ]);

        Log::info('Data berhasil disimpan:', $izin->toArray()); // Logging data yang disimpan
        return redirect()->route('pengajuan_cutiizin.create')->with('success', 'Pengajuan cuti/izin berhasil diajukan.');
    }

    public function persetujuanIzinIndex()
    {
        $title = 'Persetujuan Izin dan Cuti';
        $pengajuan = IzinCuti::where('status', 'Diajukan')->with('user')->get();
        Log::info('Pengajuan izin yang ditampilkan:', $pengajuan->toArray()); // Debug data
        return view('admin.persetujuan_izin&cuti', compact('pengajuan', 'title'));
    }

    public function persetujuanIzinUpdate(Request $request, $id)
    {
        $izin = IzinCuti::findOrFail($id);
        $izin->status = $request->status;
        $izin->save();

        return redirect()->back()->with('success', 'Status pengajuan berhasil diperbarui.');
    }
}
