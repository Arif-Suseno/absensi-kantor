<?php

namespace App\Http\Controllers;

use App\Models\CutiIzin;
use Illuminate\Http\Request;

class CutiIzinController extends Controller
{
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
