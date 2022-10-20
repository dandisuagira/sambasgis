<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desa_id'); //relasi FK dari tabel desa 
            $table->float('nilai_idm',8,2);
            $table->string('status_idm');
            $table->string('tahun');
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
        Schema::dropIfExists('idms');
    }
}
