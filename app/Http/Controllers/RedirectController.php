<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function cek() {
        // if (auth()->user()->type === 1) {
        //     return redirect('/superadmin');
        // } else {
        //     return redirect('/pegawai');
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
}
