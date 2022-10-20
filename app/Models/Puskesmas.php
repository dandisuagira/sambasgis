<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puskesmas extends Model
{
    use HasFactory;

    protected $table = "puskesmas";

    protected $fillable = ['desa_id','nama_puskesmas','dokter', 'bidan','perawat'];

    public function desa()
    {
        return $this->belongsTo(Desa::class,'desa_id','kode_desa');
    }
}
