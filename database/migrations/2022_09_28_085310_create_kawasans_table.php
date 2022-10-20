<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKawasansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kawasans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desa_id'); //relasi FK dari tabel desa 
            $table->string('kabkota_sehat')->nullable();
            $table->string('ksk_ekonomi')->nullable();
            $table->string('ksk_trans_sda')->nullable();
            $table->string('kawasan_lindung')->nullable();
            $table->string('lokasi_desa')->nullable();
            $table->string('kawasan_agro')->nullable();
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
        Schema::dropIfExists('kawasans');
    }
}
