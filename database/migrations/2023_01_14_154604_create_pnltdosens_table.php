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
            $table->unsignedBigInteger('dosens_id');
            $table->string('judul');
            $table->text('abstrak');
            $table->string('tahun');
            $table->foreign('dosens_id')->references('id')->on('dosens');
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
        Schema::table('pnltdosens',function (Blueprint $table) {
            $table->dropForeign(['dosens_id']);
            $table->dropColumn('dosens_id');
        });
    }
}
