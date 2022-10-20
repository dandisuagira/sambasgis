<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kawasan extends Model
{
    use HasFactory;

    protected $table = "kawasans";
    
    protected $fillable = ['id', 'desa_id', 'kabkota_sehat','ksk_ekonomi','ksk_trans_sda','kawasan_lindung
    ','lokasi_desa','kawasan_agro'];

    public function desa()
    {
        return $this->belongsTo(Desa::class,'desa_id','kode_desa');
    }
}
