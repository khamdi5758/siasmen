<?php

namespace App\Http\Controllers;

use App\Models\Lapharian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class LapharianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = Lapharian::latest()->paginate(5);
        return view('lapharian.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function cetak()
    {
        // $data = DB::table('lapharians')->get();
        $data = Lapharian::all();
        dd($data);
        // $data = Lapharian::select('*')->get();
        // $pdf = PDF::loadView('lapharian.halcetak', ['data' => $data]);
        // return $pdf->stream('Laporan.pdf');
         return view('lapharian.halcetak', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lapharian.create');
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
            'tanggal'          =>  'required',
            'deskripsi_kegiatan'         =>  'required',
            'dokumentasi_kegiatan'         =>  'required'
        ]);
        $input =$request->all();
        if ($image = $request->file('dokumentasi_kegiatan')) {
            $destinationPath = 'images/';
            $file_name = time() . '.' . request()->dokumentasi_kegiatan->getClientOriginalExtension();
            $image->move($destinationPath,$file_name);
            $input['dokumentasi_kegiatan'] = $file_name;
        }
        Lapharian::create($input);

        return redirect()->route('lapharian.index')->with('success', 'Student Added successfully.');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lapharian  $lapharian
     * @return \Illuminate\Http\Response
     */
    public function show(Lapharian $lapharian)
    {
        return view('lapharian.show', compact('lapharian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lapharian  $lapharian
     * @return \Illuminate\Http\Response
     */
    public function edit(Lapharian $lapharian)
    {
        return view('lapharian.edit', compact('lapharian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lapharian  $lapharian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lapharian $lapharian)
    {
        $request->validate([
            'tanggal'          =>  'required',
            'deskripsi_kegiatan'         =>  'required'
        ]);
        $destinationPath = 'images/';
        $input =$request->all();
        if ($image = $request->file('dokumentasi_kegiatan')) {
            $file_name = time() . '.' . request()->dokumentasi_kegiatan->getClientOriginalExtension();
            $image->move($destinationPath,$file_name);
            $pathimgold = $destinationPath.$request->hidden_dokumentasi_kegiatan;
            if (file_exists($pathimgold)) {
                @unlink($pathimgold);
            }
            $input['dokumentasi_kegiatan'] = $file_name;
        }else{
            unset($input['image']);
        }
        $lapharian->update($input);
        return redirect()->route('lapharian.index')->with('success', 'Student Data has been updated successfully');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lapharian  $lapharian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lapharian $lapharian)
    {
        $destinationPath = 'images/';
        $pathimgold = $destinationPath.$lapharian->dokumentasi_kegiatan;
            if (file_exists($pathimgold)) {
                @unlink($pathimgold);
            }
        $lapharian->delete();
        return redirect()->route('lapharian.index')->with('success', 'Student Data deleted successfully');
    }
}
