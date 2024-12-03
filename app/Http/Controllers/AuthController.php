<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login() {
        return view('login');
    }

    function autentication(Request $request){
        $credencials = $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string|min:6',
            'role' => 'required|string',
        ],[
            // Pesan email
            'email.required'=>'Email wajib diisi!',
            'email.email'=>'Email tidak valid!',
            // Pesan password
            'password.required'=>'Password wajib diisi!',
            'password.min'=>'Password minimal :min karakter',
        ]);

        if(Auth::attempt($credencials)){
            $request->session()->regenerate();
            if($credencials['role'] === 'Admin'){
                return redirect()->intended('data_karyawan');
            }elseif ($credencials['role'] === 'Karyawan') {
                return redirect()->intended('absensi');

            }

            
        }
        return back()->withErrors('Login Gagal')->onlyInput('email');
    }

    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('login');
    }
}
