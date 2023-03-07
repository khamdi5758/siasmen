<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePnltdosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pnltdosens', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('judul');
            $table->text('abstrak');
            $table->string('tahun');
            $table->foreign('nip')->references('nip')->on('dosens');
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
        Schema::dropIfExists('pnltdosens');
    }
}
