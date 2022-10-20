<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $table = "proyeks";
    
    protected $fillable = ['id','nama_proyek', 'desa_id','kode_proyek', 'lat','long','foto1',
    'foto2','foto3','foto4','foto5','deskripsi','tahun'];

    public function desa()
    {
        return $this->belongsTo(Desa::class,'desa_id','kode_desa');
    }
}
