<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTuamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuams', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('judul');
            $table->text('abstrak');
            $table->string('tahun');
            $table->string('dosen_pembimbing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tuams');
    }
}
