<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    protected $primaryKey = 'kriteria_id';
    protected $fillable = ['nama_kriteria', 'bobot'];


    public function subkriteria()
    {
        return $this->hasMany(SubKriteria::class, 'kriteria_id', 'kriteria_id');
    }

    public function skalaPenilaian()
    {
        return $this->hasMany(SkalaPenilaian::class);
    }

}
