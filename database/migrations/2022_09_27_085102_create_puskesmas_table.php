<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuskesmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puskesmas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desa_id')->nullable();
            $table->string('nama_puskesmas')->nullable()->default(NULL);;
            $table->integer('dokter')->nullable()->default(NULL);;
            $table->integer('bidan')->nullable()->default(NULL);;
            $table->integer('perawat')->nullable()->default(NULL);;
            $table->timestamps();

            $table->foreign('desa_id')->references('kode_desa')->on('desas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puskesmas');
    }
}
