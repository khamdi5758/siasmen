<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddTriger5 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER upuserdos AFTER UPDATE ON `dosens` FOR EACH ROW
                    BEGIN
                        IF NEW.nip <> OLD.nip THEN
                            UPDATE users SET username = NEW.nip WHERE users.username = OLD.nip;
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
        DB::unprepared('DROP TRIGGER `upuserdos`');
    }
}
