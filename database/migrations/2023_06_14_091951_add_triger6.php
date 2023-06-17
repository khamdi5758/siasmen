<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddTriger6 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER upusermhs AFTER UPDATE ON `mahasiswas` FOR EACH ROW
                    BEGIN
                        IF NEW.nim <> OLD.nim THEN
                            UPDATE users SET username = NEW.nim WHERE users.username = OLD.nim;
                        END IF;
                    END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `upusermhs`');
    }
}
