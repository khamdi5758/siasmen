<?php

namespace App\Http\Controllers;

use App\Models\Tuam;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ADMTuamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $mhs =  DB::table('mahasiswas')->get();
        // $dosen =  DB::table('dosens')->get();
        $mhs = Mahasiswa::all() ;
        $dosen =  Dosen::all();
        $data = Tuam::all();
        return view('admin.tamhss',['data' => $data, 'mhs' => $mhs,'dosens'=>$dosen]);
    }

    public function index2()
    {
        // $mhs =  DB::table('mahasiswas')->get();
        // $dosen =  DB::table('dosens')->get();
        $mhs = Mahasiswa::all() ;
        $dosen =  Dosen::all();
        $data = Tuam::all();
        return view('admin.tamhs',['data' => $data, 'mhs' => $mhs,'dosens'=>$dosen]);
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
        $request->validate([
            'mahasiswas_id' => 'required',
            'dosens_id' => 'required',
            'judul' => 'required',
            'abstrak' => 'required',
            'tahun' => 'required',
        ]);
        $input = $request->all();
        // dd($input);
        Tuam::create($input);
        return redirect()->route('admin.tamhs')->with('success', 'Data berhasil dibuat');
        // $tuam = new Tuam();
        // $tuam->nim = $request->nim;
        // $tuam->judul = $request->judul;
        // $tuam->abstrak = $request->abstrak;
        // $tuam->dosen_pembimbing = $request->dosen_pembimbing;
        // $tuam->save();
    }

    public function store2(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'dosens_id' => 'required',
            'judul' => 'required',
            'abstrak' => 'required',
            'tahun' => 'required',
            
        ]);
        $input = $request->all();
        // dd($input);
        Tuam::create($input);
        return redirect()->route('admin.tamhs')->with('success', 'Data berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tuam  $tuam
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Tuam::find($id);
        return view('admin.showtamhs', ['tuam'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tuam  $tuam
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id = $_GET['id'];
        $data = Tuam::find($id);
        $datamahasiswa = $data->mahasiswas;
        $datadosen = $data->dosens;
        return json_encode([$data,$datamahasiswa,$datadosen]);
        // dump($data);
        // return view('tuam.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tuam  $tuam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tuam $tuam)
    {
        $request->validate([
            // 'mahasiswas_id' => 'required',
            'dosens_id' => 'required',
            'judul' => 'required',
            'abstrak' => 'required',
            'tahun' => 'required',
        ]);
        $id = $request->hidid;
        $input =$request->all();


        $tuam = Tuam::find($id);
        $tuam->update($input);
        return redirect()->route('admin.tamhs')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tuam  $tuam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Tuam::find($id);
        $data->delete();
        return redirect()->route('admin.tamhs')->with('success', 'Data berhasil dihapus');
    }
}
