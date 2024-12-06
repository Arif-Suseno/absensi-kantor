<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Kontrak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Session\Session;

class UserController extends Controller
{
    // Data karyawan start
    // Menampilkan tabel data karyawan
    public function indexDataKaryawan(Request $request, User $user)
    {
        // Ambil input pencarian dari query string
        $search = $request->input('search');
    
        // Query dengan filter pencarian dan relasi
        $users = $user->with(['kontrak', 'jabatan']) // Relasi eager loading
            ->when($search, function ($query) use ($search) {
                $query->where('nama', 'LIKE', "%$search%") // Filter kolom nama
                    ->orWhere('role', 'LIKE', "%$search%") // Filter kolom role
                    ->orWhere('gender', 'LIKE', "%$search%") // Filter kolom role
                    ->orWhere('email', 'LIKE', "%$search%"); // Filter kolom role
            })
            ->orderBy('id', 'desc') // Urutkan berdasarkan ID secara menurun
            ->paginate(10); // Batasi 10 data per halaman
    
        // Kirim data ke view
        return view('admin.data_karyawan', [
            'title' => 'Data Karyawan',
            'users' => $users,
            'search' => $search,
        ]);
    }
    
    // Menampilkan Data karyawan berdasarkan id ke detail karyawan
    public function showDetailKaryawan($id){
        // Menggunakan eager loading untuk menghindari N+1 query
        $user = User::with(['kontrak', 'jabatan'])->findOrFail($id);
        $kontrak = $user->kontrak; 
        $jabatan = $user->jabatan; 
        $user->tanggal_lahir = Carbon::parse($user->tanggal_lahir)->format('d-m-Y');
        $kontrak->tanggal_mulai = Carbon::parse($kontrak->tanggal_mulai)->format('d-m-Y');
        $kontrak->tanggal_mulai = Carbon::parse($kontrak->tanggal_mulai)->format('d-m-Y');
        $kontrak->tanggal_selesai = Carbon::parse($kontrak->tanggal_selesai)->format('d-m-Y');
        // Mengembalikan view dengan data yang sudah diproses
        return view('admin.detail_karyawan', [
            'title' => 'Detail Karyawan',
            'user' => $user,
            'kontrak' => $kontrak,
            'jabatan' => $jabatan
        ]);    
    }

    // Menampilkan form tambah karyawan
    public function indexTambahKaryawan(Kontrak $kontrak, Jabatan $jabatan){
        return view('admin.tambah_karyawan', [
            'title' => 'Tambah Karyawan',
            'kontrak' => $kontrak->all(),
            'jabatan' => $jabatan->all()
        ]);
    }
    // Menambahkan data karyawan
    public function storeTambahKaryawan(Request $request){
    // Validasi dan simpan data
    $validateData = $request->validate([
        'role' => 'required|string',
        'jabatan_id' => 'required|numeric|exists:jabatan,id',
        'kontrak_id' => 'required|numeric|exists:kontrak,id',
        'nama' => 'required|string|min:3',
        'gender' => 'required|string',
        'email' => 'required|string|email|unique:users',
        'password' => 'required|string|min:6',
        'jam_kerja' => 'nullable|string'
    ],[
        // Pesan nama
        'nama.required' => 'Nama wajib diisi!!',
        'nama.min' => 'Nama harus memiliki minimal :min karakter!',
        // Pesan email
        'email.required' => 'Email wajib diisi!',
        'email.email' => 'Format email tidak valid!',
        'email.unique' => 'Email tersebut sudah terdaftar!',
        // Pesan password
        'password.required' => 'Password wajib diisi!',
        'password.min' => 'Password harus memiliki minimal :min karakter!',

    ]);
    $validateData['password'] = bcrypt($validateData['password']);
    // Simpan data
    User::create($validateData);
    // Redirect setelah data berhasil disimpan
    return redirect()->route('Data Karyawan')->with('success', 'Data berhasil ditambahkan!');
}

    // Menampilan form edit karyawan berdasarkan id
    public function showEditKaryawan($id, User $user, Kontrak $kontrak, Jabatan $jabatan){
        
        return view('admin.edit_karyawan', [
            'title'=> 'Edit Karyawan',
            'user'=> $user->findOrFail($id),
            'jabatan'=> $jabatan->all(),
            'kontrak'=> $kontrak->all()
        ]);
    }

    // Mengedit Data Karyawan
    public function updateDataKaryawan(Request $request, $id){
        
         // Validasi data, termasuk file
    $validatedData = $request->validate([
        'role' => 'required|string',
        'jabatan_id' => 'required|numeric|exists:jabatan,id',
        'kontrak_id' => 'required|numeric|exists:kontrak,id',
        'nama' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users,email,'.$id,
        'password' => 'nullable|string|min:6',
        'gender' => 'string',
        'agama' => 'nullable|string',
        'tanggal_lahir' => 'nullable|string',
        'tempat_lahir' => 'nullable|string',
        'no_hp' => 'nullable|string|max:15',
        'alamat' => 'nullable|string',
        'jam_kerja' => 'string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file
    ],[
         // Pesan nama
         'nama.min' => 'Nama minimal :min karakter',
         'nama.max' => 'Nama maksimal :max karakter',
        // Pesan email
        'email.required' => 'Email wajib diisi!',
        'email.email' => 'Format email tidak valid!',
        'email.unique' => 'Email tersebut sudah terdaftar!',
        // Pesan password
        'password.required' => 'Password wajib diisi!',
        'password.min' => 'Password harus memiliki minimal :min karakter!',
         // Pesan no_hp
         'no_hp.min' => 'No minimal :min karakter',
         'no_hp.max' => 'No maksimal :max karakter',
         // Pesan image
         'image.image' => 'File harus berupa gambar.',
         'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
         'image.max' => 'Ukuran gambar maksimal 2 MB.',
    ]);
    
    // Temukan data user
    $user = User::findOrFail($id);

    // Cek apakah ada file gambar di upload
    
    if ($request->hasFile('image')) {
        // Simpan file di storage dan dapatkan path-nya
        $filePath = $request->file('image')->store('images', 'public');

        // Hapus gambar lama jika ada
        if (!empty($user->image)) {
            Storage::disk('public')->delete($user->image);
        }

        // Simpan path baru ke database
        $validatedData['image'] = $filePath;
    } else {
        // Jika tidak ada file baru, tetap gunakan yang lama
        $validatedData['image'] = $user->image;
    }
    
    // Enkripsi password jika ada input baru
       if (!empty($validatedData['password'])) {
        $validatedData['password'] = bcrypt($validatedData['password']);
    } else {
        unset($validatedData['password']);
    }
    
    // Update data user
    $update = $user->update($validatedData);
    if($update){
        return redirect()->route('Data Karyawan')->with('success', 'Data berhasil diedit!');
    }else{
        return redirect()->back()->withErrors('Data gagal dupdate');
    }
}

// Menghapus data karyawan
public function deleteDataKaryawan($id){
    User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
    // Data karyawan end
    // Profile karyawan start
    public function index()
    {
        $user = Auth::user(); 
        $user->load(['jabatan', 'kontrak']);
        return view('karyawan.profile', [
            'title' => 'Profil Karyawan',
            'user' => $user,
        ]);
    }
    
    public function updateprofile(Request $request)
    {   
          // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|min:3|max:255',
            'gender' => 'nullable|string|in:Laki-laki,Perempuan',
            'agama' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'tempat_lahir' => 'nullable|string',
            'no_hp' => 'nullable|string|min:10|max:15',
            'alamat' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],[
            // Pesan nama
            'nama.min' => 'Nama minimal :min karakter',
            'nama.max' => 'Nama maksimal :max karakter',
            // Pesan no_hp
            'no_hp.min' => 'Nomor minimal :min karakter',
            'no_hp.max' => 'Nomor maksimal :max karakter',
            // Pesan image
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'image.max' => 'Ukuran gambar maksimal 2 MB.',
            ]);

        $user = Auth::user();

        if ($request->hasFile('image')) {
            // Simpan file di storage dan dapatkan path-nya
            $filePath = $request->file('image')->store('images', 'public');
            
            // Hapus gambar lama jika ada
            if (!empty($user->image)) {
                Storage::disk('public')->delete($user->image);
            }
            
            $validatedData['image'] = $filePath;
        }else{
            $validatedData['image'] = $user->image;
        }
        $update = $user->update($validatedData);
        if ($update) {
            return redirect()->back()->with('message', 'Data berhasil diperbarui!');
        } else {
                return redirect()->back()->withErrors('message', 'Data gagal diperbarui. Silakan coba lagi!');
            }
    }
    
    // Profile karyawan end
    public function profile(User $user)
    {
        // Ambil data user pertama (atau user lain sesuai kebutuhan)
        $users = Auth::user(); 
        $user->with(['jabatan', 'karyawan'])->findOrFail($users->id);

        // Kirim data ke view
        return view('admin.profile_admin', ["title" => "Profile Admin"],compact('user'));
    }

    public function show(){
        $users = User::all();
        return view('admin.data_karyawan', ['title' => 'Data Karyawan','users' => $users]);
    }

    //UserController
    public function index_users()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            // validasi lainnya...
        ]);

        User::create($validated);
        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // validasi lainnya...
        ]);

        $user->update($validated);
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }

 
}
