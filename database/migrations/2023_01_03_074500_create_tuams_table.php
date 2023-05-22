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
            $table->string('nama');
            $table->string('judul');
            $table->text('abstrak');
            $table->string('tahun');
            $table->unsignedBigInteger('dosens_id');
            $table->timestamps();
        });
        // $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onUpdate('cascade')->onDelete('cascade');
        // $table->foreign('dosens_id')->references('id')->on('dosens')->onUpdate('cascade')->onDelete('cascade');
        
        // $table->unsignedBigInteger('mahasiswa_id');
        // Schema::table('tuams', function($table){
        //     $table->foreign('mahasiswa_id')
        //          ->constrained()
        //         ->references('id')->on('mahasiswas')
        //         ->onUpdate('cascade')
        //         ->onDelete('cascade');
                
        // });
        // Schema::table('tuams', function($table){
        //     $table->foreign('dosens_id')
        //          ->constrained()
        //         ->references('id')->on('dosens')
        //         ->onUpdate('cascade')
        //         ->onDelete('cascade');

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tuams');
        // Schema::table('tuams',function (Blueprint $table) {
        //     $table->dropForeign(['mahasiswa_id','dosens_id']);
        //     $table->dropColumn('mahasiswa_id');
        //     $table->dropColumn('dosens_id');
        // });
    }
}
