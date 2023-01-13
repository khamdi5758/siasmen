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
        $validated = $request->validate([
            'nim' => 'required',
            'judul' => 'required',
            'abstrak' => 'required',
            'dosen_pembimbing' => 'required',
        ]);

        $tuam = new Tuam();
        $tuam->nim = $request->nim;
        $tuam->judul = $request->judul;
        $tuam->abstrak = $request->abstrak;
        $tuam->dosen_pembimbing = $request->dosen_pembimbing;
        $tuam->save();
        return redirect()->route('admin.tamhs')
            ->with('success', 'Data berhasil dibuat!');
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
    public function edit($id)
    {
        $data = Tuam::findOrFail($id);
        dump($data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tuam  $tuam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Tuam::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.tamhs')
            ->with('success', 'Data berhasil dihapus!');
    }
}
