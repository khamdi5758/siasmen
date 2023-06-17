<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;


class ADMUbahPassUserController extends Controller
{
    //

    public function halubahpassdos($id)
    {   
        $data = Dosen::find($id);
        $idnip = $data->nip;
        return view('admin.ubahpassdos',['idnip'=>$idnip]);
    }
    public function halubahpassmhs($id)
    {   
        $data = Mahasiswa::find($id);
        $idnim = $data->nim;
        // echo $idnim;
        return view('admin.ubahpassmhs',['idnim'=>$idnim]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function ubahpassdosen(Request $request)
    {   
        // dd($request);
        $idnip = $request->username;
        $request->validate([
            // 'username' => 'required',
            'password'          =>  'required'
        ]);
        $datauser = User::where('username',$idnip)->first();
        $datauser->password = bcrypt($request->password);
        $datauser->save();
        return redirect()->route('admin.dftrdos')->with('success', 'password berhasil diubah.');
    }
    
    public function ubahpassmhs(Request $request)
    {   
        // dd($request);
        $idnim = $request->username;
        $request->validate([
            'password'          =>  'required'
        ]);
        $datauser = User::where('username',$idnim)->first();
        $datauser->password = bcrypt($request->password);
        $datauser->save();
        return redirect()->route('admin.dftrmhs')->with('success', 'password berhasil diubah.');
    }
}
