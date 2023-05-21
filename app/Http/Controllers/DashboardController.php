<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Pnltdosen;
use App\Models\Tuam;
use App\Models\Ptuakmhs;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admindash()
    {
        $dosen = Dosen::all();
        $mahasiswa = Mahasiswa::all();
        $pnltdos = Pnltdosen::all();
        $tuam = Tuam::all();
        $ptuakmhs = Ptuakmhs::all();
        $data = ['dosen'=>count($dosen),'mahasiswa'=>count($mahasiswa),'pnltdos'=>count($pnltdos),'tuam'=>count($tuam),'ptuakmhs'=>count($ptuakmhs)];
        return view('admin.index',$data);
    }

    public function dosendash()
    {
        $user = auth()->user();
        $iduser = User::tampildatuser($user->username, $user->type)->id;
        $mhsbimsaya = Tuam::where('dosens_id',$iduser)->get();
        $pnltsaya = Pnltdosen::where('dosens_id',$iduser)->get();
        $ptuakmhsbimsaya = Ptuakmhs::all();
        $data = ['mhsbimsaya'=>count($mhsbimsaya),'pnltsaya'=>count($pnltsaya),'ptuakmhsbimsaya'=>count($ptuakmhsbimsaya)];
        return view('dosen.index',$data);
    }

    public function mhsdash()
    {
        $dosen = Dosen::all();
        $pnltdos = Pnltdosen::all();
        $tuam = Tuam::all();
        $data = ['dosen'=>count($dosen),'pnltdos'=>count($pnltdos),'tuam'=>count($tuam)];
        return view('mahasiswa.index',$data);
    }

}
