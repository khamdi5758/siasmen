<?php

namespace App\Http\Controllers;

use App\Models\Pnltdosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ADMPnltdosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $nipdosen =  DB::table('dosens')->get();
        $data = Pnltdosen::all();
        // return $data->dos();
        return view('admin.pnltdos',['data'=> $data,'dosen'=>$nipdosen]);
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
            'dosens_id' => 'required',
            'judul' => 'required',
            'abstrak' => 'required',
            'tahun' => 'required'
        ]);
        $input = $request->all();
        // dd($input);
        // $input = $request->all();
        Pnltdosen::create($input);
        return redirect()->route('admin.pnltdos')->with('success', 'Data berhasil dibuat');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pnltdosen  $pnltdosen
     * @return \Illuminate\Http\Response
     */
    public function show(Pnltdosen $pnltdosen)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pnltdosen  $pnltdosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Pnltdosen $pnltdosen)
    {
        $id = $_GET['id'];
        $data = Pnltdosen::find($id);
        $datadosen = $data->dosens;
        return json_encode([$data,$datadosen]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pnltdosen  $pnltdosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pnltdosen $pnltdosen)
    {
        $request->validate([
            'dosens_id' => 'required',
            'judul' => 'required',
            'abstrak' => 'required',
            'tahun' => 'required'
        ]);
        $id = $request->hidid;
        $input =$request->all();
        $data = Pnltdosen::find($id);
        $data->update($input);
        return redirect()->route('admin.pnltdos')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pnltdosen  $pnltdosen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pnltdosen::find($id);
        $data->delete();
        return redirect()->route('admin.pnltdos')->with('success', 'Data berhasil dihapus');
    }
}
