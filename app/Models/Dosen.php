<?php

namespace App\Models;

use App\Models\Prodi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    protected $primaryKey = 'dosen_id';
    protected $fillable = [
                            'user_id',
                            'nidn',
                            'nama_lengkap',
                            'prodi_id',
                            'gender',
                            'tempat_lahir',
                            'tanggal_lahir',
                            'agama',
                            'status_dosen',
                            'alamat',
                            'telepon'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'dosen_id', 'dosen_id');
    }


    public function penilaian()
    {
        return $this->hasMany(Penilaian::class, 'dosen_id', 'dosen_id');
    }

}
