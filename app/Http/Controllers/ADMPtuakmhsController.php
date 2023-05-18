<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Ptuakmhs;
use App\Models\User;

class ADMPtuakmhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = Mahasiswa::all() ;
        $dosen =  Dosen::all();
        $ptuakmhs = Ptuakmhs::whereNotNull('konfdospil')->whereNotNull('konfadmin')->get();
        // $data = Tuam::all();
        // $user = auth()->user();
        // $iddos = User::tampildatuser($user->username, $user->type)->id;
        $data = Ptuakmhs::whereNotNull('konfdospil')->whereNull('konfadmin')->get();
        // echo $data;
        return view('admin.ptuakmhs',['data' => $data, 'mhs' => $mhs,'dosens'=>$dosen,'ptuakmhs'=>$ptuakmhs]);
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
        $mhs = Mahasiswa::all() ;
        $dosen =  Dosen::all();
        $data = ptuakmhs::where('id', $id)->get();
        $jsonData = json_decode($data, true); // true digunakan untuk mengembalikan array asosiatif
        $konfdospil = $jsonData[0]['konfdospil'];
        if ($konfdospil == 0 ) {
            // echo "tidak diterima ";
            return view('admin.aksiptuakmhsnoaccdos',['data' => $data, 'mhs' => $mhs,'dosens'=>$dosen]);
        }else if ($konfdospil == 1) {
            // echo "diterima ";
            return view('admin.aksiptuakmhsaccdos',['data' => $data, 'mhs' => $mhs,'dosens'=>$dosen]);
        } 
        // echo $data;
        // return view('dosen.mhsbim',compact('data'));
        // echo $id;
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
        // dd($request);
        $dataptuakmhs = Ptuakmhs::find($id);
        $dataptuakmhs->konfadmin = $request->konfadmin;
        $dataptuakmhs->dosens_id = $request->dosens_id;
        $dataptuakmhs->save();
        return redirect('admin/ptuakmhs');
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
