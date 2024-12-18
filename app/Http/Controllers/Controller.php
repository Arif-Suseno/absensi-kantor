<?php

// namespace App\Http\Controllers;
// app/Http/Controllers/Controller.php

// app/Http/Controllers/Controller.php

// app/Http/Controllers/Controller.php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Absensi;
use App\Models\Jabatan;
use App\Models\Kontrak;
use App\Models\IzinCuti;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Controller
{
    public function showDashboard()
    {
        $userId = Auth::user()->id;
            // Ambil data statistik
            $totalKaryawan = User::where('role', 'karyawan')->count();
            $totalHadir = Absensi::where('waktu', 'Masuk')->where('status', 'Hadir')->count();
            $totalSakit = Absensi::where('waktu', 'Masuk')->where('status', 'Sakit')->count();
            $totalCuti = Absensi::where('waktu', 'Masuk')->where('status', 'Cuti')->count();
            $totalIzin = Absensi::where('waktu', 'Masuk')->where('status', 'Izin')->count();
            $totalAlpa = Absensi::where('waktu', 'Masuk')->where('status', 'Alpa')->count();
            $izinPending = IzinCuti::where('status', 'Diajukan')->count();
    
            // Data untuk grafik absensi
            $absensiByStatus = Absensi::selectRaw('status, count(*) as total')
                ->groupBy('status')
                ->pluck('total', 'status')
                ->toArray();
    
            return view('admin.dashboard_admin', [
                'totalKaryawan' => $totalKaryawan,
                'totalHadir' => $totalHadir,
                'totalSakit' => $totalSakit,
                'totalCuti' => $totalCuti,
                'totalIzin' => $totalIzin,
                'totalAlpa' => $totalAlpa,
                'izinPending' => $izinPending,
                'absensiByStatus' => $absensiByStatus
            ]);
        
    }


    public function dashboard()
    {
        $userId = Auth::user()->id;
        
        // Data absensi
        $totalHadir = Absensi::where('user_id', $userId)
            ->where('status', 'Hadir')->where('waktu', 'Keluar')->count();
        $totalIzin = IzinCuti::where('user_id', $userId)
            ->whereIn('jenis', ['Izin', 'Cuti'])
            ->where('status', 'Disetujui')->count();
        $totalTidakHadir = Absensi::where('user_id', $userId)
            ->where('status', 'Alpa')->count();

        $absensiTerbaru = Absensi::where('user_id', $userId)
            ->orderBy('tanggal', 'desc')
            ->take(7)
            ->get();

        // Pengajuan izin/cuti belum disetujui
        $pengajuanPending = IzinCuti::where('user_id', $userId)
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
