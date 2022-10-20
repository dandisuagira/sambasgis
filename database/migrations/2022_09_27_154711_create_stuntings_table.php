<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStuntingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stuntings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desa_id'); //relasi FK dari tabel desa 
            $table->float('balita_stunting')->nullable();
            $table->string('persen_stunting')->nullable();
            $table->string('lokus_stunting')->nullable();
            $table->integer('tahun')->nullable();
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
        Schema::dropIfExists('stuntings');
    }
}
