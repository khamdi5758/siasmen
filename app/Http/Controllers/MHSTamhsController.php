<?php

namespace App\Http\Controllers;

use App\Models\Tuam;
use App\Models\Ptuakmhs;
use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MHSTamhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tuam::all();
        // return $data;
        return view('mahasiswa.tamhs',compact('data'));
    }

    public function halstatusta()
    {
        $user = auth()->user();
        $nama = User::tampildatuser($user->username, $user->type)->id;
        $data = Ptuakmhs::where('id', $nama)->get();
        echo $data;
        // var_dump($data);
        // $konfdospil = $data[0]['konfdospil'];
        // $konfadmin = $data[0]['konfadmin'];
        // echo $konfadmin;
        // var_dump($data);
        // return $nama;
        // $dosen =  DB::table('dosens')->get();

        // return view('mahasiswa.statusta',['data' => $data]);
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

    public function rekomdos(Request $request)
    {
        // return $request;
        $input = $request->all();
        $count = count($input);
        $a = 1;
        $string = "";
        // echo $count;
        foreach ($input as $value) {
            $string .= $value;
            if($a < $count){
                $string .= ";"; 
            }
            $a++;
        }
        $stringg = escapeshellarg($string);
        $process = shell_exec("C:/Python311/python.exe c:/xampp/htdocs/siasmen/public/pyscript/simtuakmhs.py $stringg");
        $datajson = json_decode($process,true);

        return view('mahasiswa.rekomdos',['input'=>$input,'data'=> $datajson]);
        
    }

    public function coba()
    {
        $result = shell_exec("C:/Python311/python.exe c:/xampp/htdocs/siasmen/public/pyscript/datpnltdos.py");
        $datajson = json_decode($result,true);
        return $result;
    }
    
    public function cobaaa()
    {
        // $cob = $this->coba();
        // $process = shell_exec("C:/Python311/python.exe c:/xampp/htdocs/siasmen/public/pyscript/cobaa.py $cob");
        // return $process;
        // return $cob;
        $result = shell_exec("C:/Python311/python.exe c:/xampp/htdocs/siasmen/public/pyscript/coba.py");
        $datajson = json_decode($result,true);
        // return view('mahasiswa.atamhs',['data'=> $datajson]);
        // $keys = array("id","nim","nama","jenkel","perguruan_tinggi","program_studi","jenjang","status","foto");
        // $my_array = array_combine($keys, $datajson);
        return $datajson;
        // echo $datajson[0][""];
        // for ($i=0; $i < count($datajson); $i++) { 
        //     for ($j=0; $j < count($datajson[$i]); $j++) { 
        //         echo $datajson[$i][$j]."<br>";
        //     }

        //     echo "==========<br>";
        // }
    }
    public function store(Request $request)
    {
        // $input = $request->all();
        // return $input;
        $request->validate([
            'mahasiswas_id' => 'required',
            'judul' => 'required',
            'deskjudul' => 'required',
            'dosens_id' => 'required',
            // 'tahun' => 'required',
        ]);
        $input = $request->all();
        // dd($input);
        Ptuakmhs::create($input);
        return redirect()->route('mahasiswa');
        // return redirect()->route('mahasiswa.tamhs')->with('success', 'Data berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
