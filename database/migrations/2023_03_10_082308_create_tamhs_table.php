<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTamhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tamhs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswas_id');
            $table->foreign('mahasiswas_id')->references('id')->on('mahasiswas')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('dosens_id');
            $table->foreign('dosens_id')->references('id')->on('dosens')->onUpdate('cascade')->onDelete('cascade');
            $table->string('judul');
            $table->text('abstrak');
            $table->string('tahun');
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
        Schema::dropIfExists('tamhs');
    }
}
