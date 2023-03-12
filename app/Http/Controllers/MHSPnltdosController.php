<?php

namespace App\Http\Controllers;

use App\Models\Pnltdosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MHSPnltdosController extends Controller
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
        return view('mahasiswa.pnltdos',['data'=> $data,'dosen'=>$nipdosen]);
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
     * @param  \App\Models\Pnltdosen  $pnltdosen
     * @return \Illuminate\Http\Response
     */
    public function show(Pnltdosen $pnltdosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pnltdosen  $pnltdosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Pnltdosen $pnltdosen)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pnltdosen  $pnltdosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pnltdosen $pnltdosen)
    {
        //
    }
}
