<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(){
        $users = User::all();
        return view('admin.data_karyawan', ['title' => 'Data Karyawan','users' => $users]);
    }

    public function index()
    {
        $user = User::first();
        return view('karyawan.profile', [
            'title' => 'Profil Karyawan',
            'user' => $user,
        ]);
    }
}
