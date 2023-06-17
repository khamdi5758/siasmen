<?php

namespace App\Http\Controllers;

// use App\Models\Lapharian;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class LapharianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $mhsontuam = DB::table('tamhs')->get();
        $pnltdos = DB::table('pnltdosens')->get();
        $jmltamhspnltdos = count($mhsontuam) + count($pnltdos);
        $pathdatajson = public_path('pyscript/data.json');
        $jsonCount = count(json_decode(file_get_contents($pathdatajson), true)); 

        if ($jmltamhspnltdos !== $jsonCount) {
            $scriptPath = public_path('pyscript/dathash.py');
            shell_exec("/bin/python3   {$scriptPath}");
            // echo "jumlah file berbeda ";
        } else {
            // echo "jumlah file sama ";
            // return $jsonCount;
        }



        // echo "helloword";
    }

    // public function index()
    // {
    //     $data = Lapharian::latest()->paginate(5);
    //     return view('lapharian.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    // }

    // public function cetak()
    // {
    //     // $data = DB::table('lapharians')->get();
    //     $data = Lapharian::all();
    //     // $pdf = PDF::loadview('lapharian.halcetak',['data'=>$data]);
    //     // return $pdf->stream();
    //     return view('lapharian.halcetak',['data'=>$data] );
    //     // dd($data);
    //     // $data = Lapharian::select('*')->get();
    //     // $pdf = PDF::loadView('lapharian.halcetak', ['data' => $data]);
    //     // return $pdf->stream('Laporan.pdf');
    //     // $data = Lapharian::latest()->paginate(5);
    //     //  return view('lapharian.halcetak', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5);
    //     // $data = Lapharian::all();
    //     // foreach ($data as $row) {
    //     //     echo $row->tanggal ."<br>";
    //     //     echo $row->deskripsi_kegiatan."<br>";
    //     //     echo $row->dokumentasi_kegiatan."<br>";
    //     // }
    // }


    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     return view('lapharian.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'tanggal'          =>  'required',
    //         'deskripsi_kegiatan'         =>  'required',
    //         'dokumentasi_kegiatan'         =>  'required'
    //     ]);
    //     $input =$request->all();
    //     if ($image = $request->file('dokumentasi_kegiatan')) {
    //         $destinationPath = 'images/';
    //         $file_name = time() . '.' . request()->dokumentasi_kegiatan->getClientOriginalExtension();
    //         $image->move($destinationPath,$file_name);
    //         $input['dokumentasi_kegiatan'] = $file_name;
    //     }
    //     Lapharian::create($input);

    //     return redirect()->route('lapharian.index')->with('success', 'Student Added successfully.');
 
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Lapharian  $lapharian
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Lapharian $lapharian)
    // {
    //     return view('lapharian.show', compact('lapharian'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Lapharian  $lapharian
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Lapharian $lapharian)
    // {
    //     return view('lapharian.edit', compact('lapharian'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Lapharian  $lapharian
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Lapharian $lapharian)
    // {
    //     $request->validate([
    //         'tanggal'          =>  'required',
    //         'deskripsi_kegiatan'         =>  'required'
    //     ]);
    //     $destinationPath = 'images/';
    //     $input =$request->all();
    //     if ($image = $request->file('dokumentasi_kegiatan')) {
    //         $file_name = time() . '.' . request()->dokumentasi_kegiatan->getClientOriginalExtension();
    //         $image->move($destinationPath,$file_name);
    //         $pathimgold = $destinationPath.$request->hidden_dokumentasi_kegiatan;
    //         if (file_exists($pathimgold)) {
    //             @unlink($pathimgold);
    //         }
    //         $input['dokumentasi_kegiatan'] = $file_name;
    //     }else{
    //         unset($input['image']);
    //     }
    //     $lapharian->update($input);
    //     return redirect()->route('lapharian.index')->with('success', 'Student Data has been updated successfully');
 
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Lapharian  $lapharian
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Lapharian $lapharian)
    // {
    //     $destinationPath = 'images/';
    //     $pathimgold = $destinationPath.$lapharian->dokumentasi_kegiatan;
    //         if (file_exists($pathimgold)) {
    //             @unlink($pathimgold);
    //         }
    //     $lapharian->delete();
    //     return redirect()->route('lapharian.index')->with('success', 'Student Data deleted successfully');
    // }
}
