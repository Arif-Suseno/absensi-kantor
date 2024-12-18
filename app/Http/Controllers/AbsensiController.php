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

    public function store(Request $request)
    {
       $dataValidate = $request->validate([
            'user_id' => 'required|exists:users,id',
            'waktu' => 'required|in:Masuk,Keluar',
            'status' => 'required|in:Hadir,Sakit,Cuti,Alpa,Izin',
        ]);

    
        // Ambil tanggal hari ini
        $tanggalHariIni = Carbon::now()->toDateString();
    
        // Cek apakah absensi sudah ada untuk user_id dan tanggal
        $absensi = Absensi::where('user_id', $dataValidate['user_id'])
                          ->where('tanggal', $tanggalHariIni)
                          ->first();
    
        if(!$dataValidate && $tanggalHariIni){
            Absensi::create(
                [
                'user_id' => $dataValidate['user_id'], 
                'tanggal' => $tanggalHariIni,
                'status' => 'Alpa',
                ]
            );
        }
        if ($dataValidate['waktu'] === 'Masuk') {
            // Cek apakah sudah ada waktu masuk untuk hari ini
            if ($absensi && $absensi->waktu_masuk) {
                return redirect()->back()->with('error', 'Anda sudah absen masuk hari ini!');
            }
    
            // Buat atau perbarui waktu masuk
            Absensi::create(
                [
                'user_id' => $dataValidate['user_id'], 
                'tanggal' => $tanggalHariIni,
                'waktu' => $dataValidate['waktu'],
                'waktu_masuk' => Carbon::now()->format('H:i:s'),
                'status' => $dataValidate['status'],
                ]
            );
        } elseif ($dataValidate['waktu'] === 'Keluar') {
            // Cek apakah absensi masuk sudah ada
            if (!$absensi || !$absensi->waktu_masuk) {
                return redirect()->back()->with('error', 'Anda belum absen masuk hari ini!');
            }
    
            // Cek apakah sudah ada waktu keluar untuk hari ini
            if ($absensi->where('waktu', 'Keluar')->exists()) {
                return redirect()->back()->with('error', 'Anda sudah absen keluar hari ini!');
            }
    
            Absensi::create([
                'user_id' => $dataValidate['user_id'], 
                'tanggal' => $tanggalHariIni,
                'waktu' => $dataValidate['waktu'],
                'waktu_masuk' => $absensi->waktu_masuk,
                'waktu_keluar' => Carbon::now()->format('H:i:s'),
                'status' => $dataValidate['status'],          
            ]);
        }
        return redirect()->route('karyawan.riwayat')->with('success', 'Absensi berhasil disimpan!');
    }
    

    public function riwayat(Request $request)
    {
        $userId = Auth::user()->id; // Ambil ID pengguna yang sedang login
          // Ambil input pencarian dari query string
          $search = $request->input('search');

        $absensi = Absensi::where('user_id', $userId)->when($search, function ($query) use ($search) {
            $query->where('tanggal', 'LIKE', "%$search%") // Filter kolom nama
                ->orWhere('waktu', 'LIKE', "%$search%") // Filter kolom role
                ->orWhere('waktu_masuk', 'LIKE', "%$search%") // Filter kolom role
                ->orWhere('waktu_keluar', 'LIKE', "%$search%") // Filter kolom role
                ->orWhere('status', 'LIKE', "%$search%"); // Filter kolom role
        })
        ->orderBy('id', 'desc') // Urutkan berdasarkan ID secara menurun
        ->paginate(10); // Batasi 10 data per halaman
; // Ambil data absensi milik pengguna
        $title = 'Riwayat Absensi';

        return view('karyawan.riwayat', ['search'=> $search], compact('absensi', 'title', ));
    }


    public function index_manajemen(Request $request)
    {
        $search = $request->input('search');

        $manajemen = Absensi::with('user')->when($search, function ($query) use ($search) {
            $query->where('tanggal', 'LIKE', "%$search%") // Filter kolom nama
                ->orWhere('waktu', 'LIKE', "%$search%") // Filter kolom role
                ->orWhere('waktu_masuk', 'LIKE', "%$search%") // Filter kolom role
                ->orWhere('waktu_keluar', 'LIKE', "%$search%") // Filter kolom role
                ->orWhere('status', 'LIKE', "%$search%"); // Filter kolom role
        })
        ->orderBy('id', 'desc') // Urutkan berdasarkan ID secara menurun
        ->paginate(10); // Batasi 10 data per halaman
        return view('admin.manajemen_absensi', ["title" => "Manajemen Absensi", 'search'=>$search], compact('manajemen'));
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
        dd($request->all());
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
