<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mahasiswa;

class MHSUbahProfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $datauser = User::tampildatuser($user->username, $user->type);
        return view('mahasiswa.ubahprofile',['datauser'=>$datauser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim'          =>  'required',
            'nama'         =>  'required',
            'jenkel'         =>  'required',
            'perguruan_tinggi'         =>  'required',
            'program_studi'         =>  'required',
            'jenjang'         =>  'required',
            'status'         =>  'required'
        ]);
        $id = $request->hidid;
        $input =$request->all();
        
        $destinationPath = 'images/';
        if ($image = $request->file('foto')) {
                $file_name = time() . '.' . request()->foto->getClientOriginalExtension();
                $image->move($destinationPath,$file_name);
                $pathimgold = $destinationPath.$request->img;
                if (file_exists($pathimgold)) {
                        @unlink($pathimgold);
                    }
                    $input['foto'] = $file_name;
        }else {
                    unset($input['foto']);
        }

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update($input);
        return redirect()->route('mahasiswa.indexmhs')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
