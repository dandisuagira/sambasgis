<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyeks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desa_id'); //relasi FK dari tabel desa 
            $table->string('nama_proyek');
            $table->integer('kode_proyek');
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('foto4')->nullable();
            $table->string('foto5')->nullable();
            $table->text('deskripsi')->nullable();
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
        Schema::dropIfExists('proyeks');
    }
}
