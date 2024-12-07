<?php

// namespace App\Http\Controllers;
// app/Http/Controllers/Controller.php

// app/Http/Controllers/Controller.php

// app/Http/Controllers/Controller.php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\IzinCuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller
{
    public function showDashboard()
    {
        // Menampilkan data karyawan (nama dan alamat)
        $karyawan = DB::table('users')->get(['nama', 'alamat']);

        // Menampilkan data izin/cuti terbaru
        $cutiLogs = DB::table('cuti_izin')->join('users', 'cuti_izin.user_id', '=', 'users.id')
            ->select('users.nama', 'cuti_izin.tanggal_mulai', 'cuti_izin.tanggal_selesai')
            ->orderBy('cuti_izin.created_at', 'desc')
            ->get();

        // Menampilkan data absensi
        $absensiLogs = DB::table('absensi')->join('users', 'absensi.user_id', '=', 'users.id')
            ->select('users.nama', 'absensi.tanggal', 'absensi.status')
            ->orderBy('absensi.tanggal', 'desc')
            ->get();

        // Return view dengan data
        return view('admin.dashboard_admin', compact('karyawan', 'cutiLogs', 'absensiLogs'))->with('title', 'Dashboard Admin');
    }


    public function dashboard()
    {
        $userId = auth()->user()->id;

        // Data absensi
        $totalHadir = Absensi::where('user_id', $userId)
            ->where('status', 'Hadir')->count();
        $totalIzin = IzinCuti::where('user_id', $userId)
            ->whereIn('jenis', ['Izin', 'Cuti'])
            ->where('status', 'Disetujui')->count();
        $totalTidakHadir = \App\Models\Absensi::where('user_id', $userId)
            ->where('status', 'Alpa')->count();

        $absensiTerbaru = \App\Models\Absensi::where('user_id', $userId)
            ->orderBy('tanggal', 'desc')
            ->take(7)
            ->get();

        // Pengajuan izin/cuti belum disetujui
        $pengajuanPending = \App\Models\IzinCuti::where('user_id', $userId)
            ->where('status', 'Diajukan') // Status 'Pending' berarti belum disetujui
            ->orderBy('created_at', 'desc')
            ->get();

        return view('karyawan.dashboard', [
            'title' => 'Dashboard Karyawan',
            'totalHadir' => $totalHadir,
            'totalIzin' => $totalIzin,
            'totalTidakHadir' => $totalTidakHadir,
            'absensiTerbaru' => $absensiTerbaru,
            'pengajuanPending' => $pengajuanPending,
        ]);
    }
}
