<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $table = "desas";
    //$timestamps = false;
    protected $primaryKey = 'kode_desa';
    public $incrementing = false;

    protected $fillable = ['id','nama_desa','kode_desa', 'kecamatan','status_desa','prioritas_desa','luas_desa','luas_persen','kepadatan_penduduk'];

    public function dusun()
    {
        return $this->hasMany(Dusun::class);
    }

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }

    //lakes FK
    public function lakes()
    {
        return $this->hasMany(Lakes::class);
    }

    //puskesmas FK
    public function puskesmas()
    {
        return $this->hasMany(Puskesmas::class);
    }
    
    //stunting FK
    public function stunting()
    {
        return $this->hasMany(Stunting::class);
    }

    //kawasan FK
    public function kawasan()
    {
        return $this->hasMany(Kawasan::class);
    }
    //idm FK
    public function idm()
    {
        return $this->hasMany(Idm::class);
    }

    public function proyek()
    {
        return $this->hasMany(Idm::class);
    }
}
