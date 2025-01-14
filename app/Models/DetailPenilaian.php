<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenilaian extends Model
{
    use HasFactory;
    protected $table = 'detail_penilaian_kinerja';
    protected $primaryKey = 'detail_penilaian_id';
    protected $fillable = ['penilaian_id','subkriteria_id', 'skala_id'];

    public function subkriteria()
    {
        return $this->belongsTo(SubKriteria::class, 'subkriteria_id');
    }

    public function skalaPenilaian()
    {
        return $this->belongsTo(SkalaPenilaian::class, 'skala_id');
    }

    public function detailPenilaian()
    {
        return $this->hasMany(DetailPenilaian::class, 'subkriteria_id', 'subkriteria_id');
    }



    public function penilaianKinerja()
    {
        return $this->belongsTo(Penilaian::class, 'penilaian_id');
    }


}
