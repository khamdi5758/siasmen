<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckFileCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
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
        } 
        
        // else {
        //     // echo "jumlah file sama ";
        // }
        // return 0;
    }
}
