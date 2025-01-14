<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';
    protected $primaryKey = 'matakuliah_id';
    protected $fillable = [
                            'kode_matakuliah',
                            'nama_matakuliah',
                            'sks',
                            'semester',
                            'prodi_id'
                        ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }


    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'matakuliah_id', 'matakuliah_id');
    }
}
