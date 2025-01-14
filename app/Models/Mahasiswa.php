<?php

namespace App\Models;

use App\Models\Prodi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'mahasiswa_id';
    protected $fillable = [
                            'user_id',
                            'nim',
                            'nama_lengkap',
                            'prodi_id',
                            'gender',
                            'tempat_lahir',
                            'tanggal_lahir',
                            'agama',
                            'status_mahasiswa',
                            'alamat',
                            'angkatan',
                            'telepon',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }


    public function krs()
    {
        return $this->hasMany(KRS::class);
    }


}
