<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('sekolah', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('namasekolah');
        //     $table->string('npsn');
        //     $table->string('jenjang');
        //     $table->string('status');
        //     $table->string('alamat');
        //     $table->string('fotologo');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('sekolah');
    }
}
