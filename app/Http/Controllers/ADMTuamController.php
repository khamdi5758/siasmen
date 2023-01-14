<?php

namespace App\Http\Controllers;

use App\Models\Tuam;
use Illuminate\Http\Request;

class ADMTuamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tuam::all();
        return view('admin.tamhs',compact('data'));
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
            'nim' => 'required',
            'judul' => 'required',
            'abstrak' => 'required',
            'dosen_pembimbing' => 'required',
        ]);
        $input = $request->all();
        Tuam::create($input);
        return redirect()->route('admin.tamhs')->with('success', 'Data berhasil dibuat');
        // $tuam = new Tuam();
        // $tuam->nim = $request->nim;
        // $tuam->judul = $request->judul;
        // $tuam->abstrak = $request->abstrak;
        // $tuam->dosen_pembimbing = $request->dosen_pembimbing;
        // $tuam->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tuam  $tuam
     * @return \Illuminate\Http\Response
     */
    public function show(Tuam $tuam)
    {
        //
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
        return json_encode($data);
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
            'nim' => 'required',
            'judul' => 'required',
            'abstrak' => 'required',
            'dosen_pembimbing' => 'required',
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
