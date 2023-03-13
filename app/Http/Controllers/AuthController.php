<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login() {
        return view('authh.login');
    }

    public function dologin(Request $request) {
        // validasi
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($credentials)) {

            // buat ulang session login
            $request->session()->regenerate();
            
            // if (auth()->user()->type === 1) {
            //     // jika user superadmin
            //     return redirect()->intended('/superadmin');
            // } else {
            //     // jika user pegawai
            //     return redirect()->intended('/pegawai');
            // }
            if (auth()->user()->type === 1) {
                // jika user admin
                return redirect()->intended('/admin');
            } else if (auth()->user()->type === 2) {
                // jika user dosen
                return redirect()->intended('/dosen');
            } else if (auth()->user()->type === 3) {
                // jika user mahasiswa
                return redirect()->intended('/mahasiswa');
            }
        }

        // jika email atau password salah
        // kirimkan session error
        return back()->with('error', 'email atau password salah');
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
