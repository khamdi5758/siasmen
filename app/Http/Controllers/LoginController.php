<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if ($user = Auth::user()) {
            if ($user->level == '1') {
                return redirect()->intended('admin');
            }elseif ($user->level == '2') {
                return redirect()->intended('dosen');
            }elseif ($user->level == '3') {
                return redirect()->intended('mahasiswa');
            }
        }
        return view('login.view_login');
    }

    public function proses(Request $request){
        $input = $request->all();
        dd($input);
        // $request->validate([
        //     'username' => 'required',
        //     'password' => 'required'
        // ],
        // [
        //     'username.required'=>'username tidak boleh kosong',
        // ]
        // );

        // $kredensial = $request->only('username','password');
        // if (Auth::attempt($kredensial)) {
        //     $request->session()->regenerate();
        //     $user = Auth::user();
        //     if ($user->level == '1') {
        //         return redirect()->intended('admin');
        //     }elseif ($user->level == '2') {
        //         return redirect()->intended('dosen');
        //     }elseif ($user->level == '3') {
        //         return redirect()->intended('mahasiswa');
        //     }

        //     return redirect()->intended('/login');
        // }

        // return back()->withErrors([
        //     'username' => 'maaf username anda salah',
        // ])->onlyInput('username');

    }
}
