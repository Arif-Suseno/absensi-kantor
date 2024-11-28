<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function profile()
    {
        // Ambil data user pertama (atau user lain sesuai kebutuhan)
        $user = User::first(); // atau bisa menggunakan User::find(1) jika ingin ambil user dengan ID tertentu

        // Kirim data ke view
        return view('admin.profile_admin', ["title" => "Profile Admin"],compact('user'));
    }

    public function show(){
        $users = User::all();
        return view('admin.data_karyawan', ['title' => 'Data Karyawan','users' => $users]);
    }

    //UserController
    public function index()
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
