<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = ['id_user', 'tanggal', 'waktu', 'status'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_user', 'nim');
    }
}

