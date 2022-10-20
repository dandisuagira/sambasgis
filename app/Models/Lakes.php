<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lakes extends Model
{
    use HasFactory;

    protected $table = "lakes";

    protected $fillable = ['desa_id','nama_lakes','dokter', 'bidan','perawat'];

    public function desa()
    {
        return $this->belongsTo(Desa::class,'desa_id','kode_desa');
    }
}
