<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desas', function (Blueprint $table) {
            $table->integer('id');
            $table->string('nama_desa');
            $table->unsignedBigInteger('kode_desa')->primary();
            $table->string('kecamatan');
            $table->string('status_desa');
            $table->string('prioritas_desa');
            $table->float('luas_desa');
            $table->float('luas_persen');
            $table->float('kepadatan_penduduk');
            $table->timestamps();
            // $table->unsignedBigInteger('id')->primary();
            //$table->foreign('kecamatan_id')->references('id')->on('kecamatans')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desas');
    }
}
