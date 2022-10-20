<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stunting extends Model
{
    use HasFactory;

    protected $table = "stuntings";
    
    protected $fillable = ['id', 'desa_id', 'balita_stunting','persen_stunting','lokus_stunting','tahun'];

    public function desa()
    {
        return $this->belongsTo(Desa::class,'desa_id','kode_desa');
    }
}
