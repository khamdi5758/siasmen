<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ADMDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('dosens')->get();
        return view('admin.daftardos',compact('data'));
    }
    public function indexx()
    {
        $data = DB::table('dosens')->get();
        return view('admin.daftardoss',compact('data'));
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
            'nip'          =>  'required|numeric',
            'nama'         =>  'required',
            'jenkel'         =>  'required',
            'status'         =>  'required',
            'pendidikan_terakhir'         =>  'required',
            'pangkat'         =>  'required',
            'foto'         =>  'required|image'
        ]);
        $input =$request->all();
        // dd($input);
        if ($image = $request->file('foto')) {
            $destinationPath = 'images/';
            $file_name = time() . '.' . request()->foto->getClientOriginalExtension();
            $image->move($destinationPath,$file_name);
            $input['foto'] = $file_name;
        }
        Dosen::create($input);

        return redirect()->route('admin.dftrdos')->with('success', 'data berhasil dibuat');
    }

    public function storee(Request $request)
    {
        $rules = [
            'nip'          =>  'required|numeric',
            'nama'         =>  'required',
            'jenkel'         =>  'required',
            'status'         =>  'required',
            'pendidikan_terakhir'   =>  'required',
            'pangkat'         =>  'required',
            'keahlian'         =>  'required',
            'foto'         =>  'required|image'
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'success' => false,
                'lblform' => 'tambah data dosen',
                'btnform' => 'tambah data',
                'errors' => $errors->toArray()
            ]);
        }

        $input =$request->all();
        // dd($input);
        if ($image = $request->file('foto')) {
            $destinationPath = 'images/';
            $file_name = time() . '.' . request()->foto->getClientOriginalExtension();
            $image->move($destinationPath,$file_name);
            $input['foto'] = $file_name;
        }

        Dosen::create($input);
        return response()->json([
            'success' => true,
            'pesan' => 'data berhasil dimasukkan'
        ]);





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Dosen::find($id);
        // return $data;
        return view('mahasiswa.showprofiledos',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dosen $dosen)
    {
        $id=  $_GET['id'];
        $data = Dosen::find($id);
        // $data = DB::table('dosens')->where('id',1)->get();
        
		// return json_encode($data);
        return $data->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dosen $dosen)
    {
        
        $request->validate([
            'nip'          =>  'required',
            'nama'         =>  'required',
            'jenkel'         =>  'required',
            'status'         =>  'required',
            'pendidikan_terakhir'         =>  'required',
            'pangkat'         =>  'required',
            'keahlian'         =>  'required',
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
        $data = Dosen::find($id);
        $data->update($input);
        return redirect()->route('admin.dftrdos')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Dosen::find($id);
        $destinationPath = 'images/';
        $pathimgold = $destinationPath.$data->foto;
        if (file_exists($pathimgold)) {
            @unlink($pathimgold);
        }
        $data->delete();

        return redirect()->route('admin.dftrdos')->with('success', 'Data berhasil dihapus');
        
    }
}
