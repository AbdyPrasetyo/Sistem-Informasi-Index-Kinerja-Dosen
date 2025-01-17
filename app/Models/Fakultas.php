<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prodi;

class Fakultas extends Model
{
    use HasFactory;
    protected $table = 'fakultas';
    protected $primaryKey = 'fakultas_id';
    protected $fillable = ['nama_fakultas'];



    public function prodi()
    {
        return $this->hasMany(Prodi::class, 'fakultas_id', 'fakultas_id');
    }



}
