<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Pnltdosen;
use App\Models\Tuam;
use App\Models\Ptuakmhs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // $mhsbimsaya = Tuam::where('dosens_id',$iduser)->get();
        $pnltsaya = Pnltdosen::where('dosens_id',$iduser)->get();
        $ptuakmhsbimsaya = Ptuakmhs::all();
        $mhsontuam = DB::table('mhabim')->where('dosenid',$iduser)->get();
        // $mhsonptuakmhs = DB::table('ptuakmhs')->where('dosens_id',$iduser)->union($mhsontuam)->get();
        $data = ['mhsbimsaya'=>count($mhsontuam),'pnltsaya'=>count($pnltsaya),'ptuakmhsbimsaya'=>count($ptuakmhsbimsaya)];
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
