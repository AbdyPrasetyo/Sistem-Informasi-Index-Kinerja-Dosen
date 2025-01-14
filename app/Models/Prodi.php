<?php

namespace App\Models;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi';
    protected $primaryKey = 'prodi_id';
    protected $fillable = ['nama_prodi', 'fakultas_id'];




    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }


    public function matkul()
    {
        return $this->hasMany(Matakuliah::class, 'prodi_id', 'prodi_id');
    }


    public function dosen()
    {
        return $this->hasOne(Dosen::class, 'prodi_id', 'prodi_id');
    }
    public function dosens()
    {
        return $this->hasMany(Dosen::class, 'prodi_id', 'prodi_id');
    }

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'prodi_id', 'prodi_id');
    }




}
