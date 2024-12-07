<?php

// namespace App\Http\Controllers;
// app/Http/Controllers/Controller.php

// app/Http/Controllers/Controller.php

// app/Http/Controllers/Controller.php

namespace App\Http\Controllers;

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
        $title = 'Dashboard';
        $userId = auth()->user()->id;

        $absensiTerbaru = \App\Models\Absensi::where('user_id', $userId)
            ->orderBy('tanggal', 'desc')
            ->take(5)
            ->with('user')
            ->get();

        $totalHadir = \App\Models\Absensi::where('user_id', $userId)->where('status', 'Hadir')->count();
        $totalIzin = \App\Models\IzinCuti::where('user_id', $userId)->whereIn('jenis', ['Izin', 'Cuti'])->count();
        $totalTidakHadir = \App\Models\Absensi::where('user_id', $userId)->where('status', 'Alpa')->count();

        return view('karyawan.dashboard', compact('absensiTerbaru', 'totalHadir', 'totalIzin', 'totalTidakHadir','title'));
    }
}
