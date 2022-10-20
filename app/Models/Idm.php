<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idm extends Model
{
    use HasFactory;

    protected $table = "idms";
    
    protected $fillable = ['id', 'desa_id', 'nilai_idm','status_idm','tahun'];

    public function desa()
    {
        return $this->belongsTo(Desa::class,'desa_id','kode_desa');
    }
}
