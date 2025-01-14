<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'kelas_id';
    protected $fillable = [
                            'matakuliah_id',
                            'dosen_id',
                            'tahun_ajaran'
                        ];

    public function matkul()
    {
        return $this->belongsTo(MataKuliah::class, 'matakuliah_id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function krs()
    {
    return $this->hasMany(KRS::class, 'kelas_id');
    }

}
