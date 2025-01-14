<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;

    protected $table = 'sub_kriteria';
    protected $primaryKey = 'subkriteria_id';
    protected $fillable = ['kriteria_id', 'nama_subkriteria'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }

    public function skalaPenilaian()
    {
        return $this->hasMany(SkalaPenilaian::class, 'subkriteria_id', 'subkriteria_id');
    }


}
