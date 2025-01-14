<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    use HasFactory;
    protected $table = 'klasifikasi';
    protected $primaryKey = 'klasifikasi_id';
    protected $fillable = [
                            'nilai_min',
                            'nilai_max',
                            'hasil_klasifikasi',
                            'keterangan'
                        ];
}
