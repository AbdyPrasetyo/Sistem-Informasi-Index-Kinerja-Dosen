<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkalaPenilaian extends Model
{
    use HasFactory;

    protected $table = 'skala_penilaian';
    protected $primaryKey = 'skala_id';
    protected $fillable = ['kategori', 'nilai'];


}
