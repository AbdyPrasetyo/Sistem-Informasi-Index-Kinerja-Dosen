<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KritikSaran extends Model
{
    use HasFactory;
    protected $table = 'kritik_saran';
    protected $primaryKey = 'kisa_id';
    protected $fillable = ['penilaian_id', 'kritik', 'saran'];

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class, 'penilaian_id');
    }


}
