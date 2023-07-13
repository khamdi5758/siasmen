<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
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
        })->daily();
        // $schedule->exec('C:/Python311/python.exe C:/xampp/htdocs/siasmen/public/pyscript/dathash.py')->everyTenMinutes();
        // $schedule->exec("/bin/python3 {$scriptPath}")->daily();
            // shell_exec("/bin/python3   {$scriptPath}");
        // $schedule->command('CheckFileCount')->everyTenMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
