<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = "penduduks";
    
    protected $fillable = ['id', 'desa_id', 'laki_laki','perempuan','jumlah','sex_ratio'];

    public function desa()
    {
        return $this->belongsTo(Desa::class,'desa_id','kode_desa');
    }
}
