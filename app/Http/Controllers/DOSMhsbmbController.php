<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Ptuakmhs;
use App\Models\User;
use App\Models\Tuam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class DOSMhsbmbController extends Controller
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
        // $data = Tuam::all();
        $user = auth()->user();
        $iddos = User::tampildatuser($user->username, $user->type)->id;
        $ptuakmhs = Ptuakmhs::where('dosens_id', $iddos)->whereNotNull('konfdospil')->whereNotNull('konfadmin')->get();
        $tamhs = Tuam::where('dosens_id', $iddos)->get();
        $query = DB::table('ptuakmhs')->join('mahasiswas', 'ptuakmhs.mahasiswas_id', '=', 'mahasiswas.id')->select('ptuakmhs.id as id','mahasiswas.nama as nama', 'ptuakmhs.judul as judul', 'ptuakmhs.deskjudul as deskjudul', DB::raw('NULL as abstrak'))->where('ptuakmhs.dosens_id', '=', $iddos)->whereNotNull('konfdospil')->whereNotNull('konfadmin');
        
        $query2 = DB::table('tamhs')->select('tamhs.id as id','tamhs.nama as nama', 'tamhs.judul as judul', DB::raw('NULL as deskjudul'), 'tamhs.abstrak as abstrak')->where('tamhs.dosens_id', '=', $iddos);
        $results = $query->union($query2)->get();
        $data = Ptuakmhs::where('dosens_id', $iddos)->whereNull('konfdospil')->get();
        // $jsonData = json_decode($data, true); // true digunakan untuk mengembalikan array asosiatif
        // for ($i=0; $i < count($jsonData); $i++) { 
        //     $konfdospil = $jsonData[$i]['konfdospil'];
        //     if ($konfdospil != null) {
        //         echo "sudah dikonfirmasi ";
        //     }else {
        //         echo "belom dikonfirmasi ";
        //     }

        // }
        // echo $data;
        // $calmhsbim = 
        return view('dosen.mhsbimm',['data' => $data, 'mhs' => $mhs,'dosens'=>$dosen,'ptuakmhs'=>$results]);
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
    // public function show(Ptuakmhs $ptuakmhs)
    // {
    //     // return $ptuakmhs;
    //     // return view('dosen.mhsbim',['data' => $ptuakmhs]);
    //     return view('dosen.mhsbim', compact('ptuakmhs'));
    // }
    public function show($id)
    {
        // $data = ptuakmhs::where('id', $id)->get();
        $data = Tuam::where('id', $id)->get();
        // $data = $results;
        return view('dosen.showmhsbim',compact('data'));
    }
    public function sptuakmhs($id)
    {
        // echo $id;
        $data = ptuakmhs::where('id', $id)->get();
        
        // $data = $results;
        return view('dosen.showmhsbimm',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $data = ptuakmhs::where('id', $id)->get();
        return view('dosen.clnmhsbim',compact('data'));
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
        $dataptuakmhs = Ptuakmhs::find($id);
        $dataptuakmhs->konfdospil = $request->status;
        $dataptuakmhs->save();
        // return redirect('dosmhsbim');
        return redirect()->route('dosen.dosmhsbim')->with('success', 'Data berhasil disimpan');
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
