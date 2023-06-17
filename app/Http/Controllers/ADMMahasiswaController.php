<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ADMMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('mahasiswas')->get();
        // $mhs->dump();
        // return view('admin.daftarmhs')->with('data',$data);
        return view('admin.daftarmhs',compact('data'));

        // $data = Mahasiswa::latest()->paginate(5);
        // return view('admin.daftarmhs', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
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
            'nim'          =>  'required|numeric',
            'nama'         =>  'required',
            'jenkel'         =>  'required',
            'perguruan_tinggi'         =>  'required',
            'program_studi'         =>  'required',
            'jenjang'         =>  'required',
            'status'         =>  'required',
            'foto'         =>  'required|image'
        ]);
        $input =$request->all();
        if ($image = $request->file('foto')) {
            $destinationPath = 'images/';
            $file_name = time() . '.' . request()->foto->getClientOriginalExtension();
            $image->move($destinationPath,$file_name);
            $input['foto'] = $file_name;
        }
        Mahasiswa::create($input);

        return redirect()->route('admin.dftrmhs')->with('success', 'Data berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id=  $_GET['id'];
        // echo $id;
        $data = Mahasiswa::find($id);
		return json_encode($data);
        // dd($data);
        
    }


    // public function edit(Request $request)
    // {

        
        
    //     // $id = request()->route('get.id');
    //     // echo $id;
    //     // return $id;
    //     // $data = Mahasiswa::find($id);
	// 	// // return json_encode($data);
    //     // dd($id);
    //     echo 'ok';
        
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim'          =>  'required',
            'nama'         =>  'required',
            'jenkel'         =>  'required',
            'perguruan_tinggi'         =>  'required',
            'program_studi'         =>  'required',
            'jenjang'         =>  'required',
            'status'         =>  'required',
            'foto' => 'image'
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
        return redirect()->route('admin.dftrmhs')->with('success', 'Data berhasil diupdate');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Mahasiswa::findOrFail($id);
        // return redirect()->route('siswa.index')
        //     ->with('success', 'Data berhasil dihapus!');
        $destinationPath = 'images/';
        $pathimgold = $destinationPath.$data->foto;
        if (file_exists($pathimgold)) {
            @unlink($pathimgold);
        }
        $data->delete();

        return redirect()->route('admin.dftrmhs')->with('success', 'Data berhasil dihapus');
    }
}
