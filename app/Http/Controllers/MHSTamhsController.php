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
        $request->validate([
            'judul'          =>  'required',
            'abstrak' => 'required'
        ]);
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
        $scriptPath = public_path('pyscript/simmrgpnltwtuak.py');
        $process = shell_exec("/bin/python3 {$scriptPath} $stringg");
        // $process = shell_exec("/bin/python3 {$cobapyPath}");
        // if ($process === null) {
            //     // Shell_exec gagal dijalankan
            //     echo "Error executing command.";
            // } else {
                //     // Shell_exec berhasil dijalankan
                //     echo "Command executed successfully.";
                // }
                // $process = shell_exec("python c:/xampp/htdocs/siasmen/public/pyscript/simmrgpnltwtuak.py $stringg");
        $datajson = json_decode($process,true);
        // $convjsontoexclpyPath = public_path('pyscript/convjsontoexcl.py');
        // $kenvtoexcl = shell_exec("/bin/python3 {$convjsontoexclpyPath}");
        // return $datajson;
        // return $stringg;
        return view('mahasiswa.rekomdos',['input'=>$input,'data'=> $datajson]);
        
    }

    public function coba()
    {
        
        $result = shell_exec("python c:/xampp/htdocs/siasmen/public/pyscript/simmrgpnltwtuak.py");
        $datajson = json_decode($result,true);
        return $datajson;
    }
    
    public function cobaaa()
    {
        $data = [
            'name' => 'John Doe',
            'age' => 30,
            'email' => 'johndoe@example.com'
        ];
        $jsondataen = base64_encode(json_encode($data));
        // $cob = $this->coba();
        // $process = shell_exec("C:/Python311/python.exe c:/xampp/htdocs/siasmen/public/pyscript/cobaa.py $cob");
        // return $process;
        // return $cob;
        $scriptPath = public_path('pyscript/dathash.py');
        $result = shell_exec("/bin/python3   {$scriptPath}");
        
        // $result = shell_exec("/usr/bin/python3   {$scriptPath} ");
        // $result = shell_exec("python c:/xampp/htdocs/siasmen/public/pyscript/coba.py");
        $datajson = json_decode($result,true);
        // return view('mahasiswa.atamhs',['data'=> $datajson]);
        // $keys = array("id","nim","nama","jenkel","perguruan_tinggi","program_studi","jenjang","status","foto");
        // $my_array = array_combine($keys, $datajson);

        if ($result === null) {
            // Shell_exec gagal dijalankan
            echo "Error executing command.";
        } else {
            // Shell_exec berhasil dijalankan
            echo "Command executed successfully.";
        }

        return $result;
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
        // return redirect()->route('mahasiswa');
        return redirect()->route('mahasiswa.statusta')->with('success', 'Data berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Tuam::find($id);
        return view('mahasiswa.showtamhs', ['tuam'=>$data]);
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
