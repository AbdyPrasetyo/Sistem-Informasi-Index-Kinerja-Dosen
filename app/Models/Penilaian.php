<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = 'penilaian_kinerja';
    protected $primaryKey = 'penilaian_id';
    protected $fillable = ['mahasiswa_id', 'dosen_id', 'krs_id'];


    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }
    public function krs()
    {
        return $this->belongsTo(KRS::class, 'krs_id', 'krs_id');
    }

    public function kritiksaran()
    {
        return $this->hasOne(KritikSaran::class, 'penilaian_id', 'penilaian_id');
    }

    public function detailPenilaianKinerja()
    {
        return $this->hasMany(DetailPenilaian::class, 'penilaian_id');
    }
}
