<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    protected $fillable = [
                            'user_id',
                            'nip',
                            'nama_lengkap',
                            'gender',
                            'tempat_lahir',
                            'tanggal_lahir',
                            'agama',
                            'status_admin',
                            'alamat',
                            'telepon',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }





}
