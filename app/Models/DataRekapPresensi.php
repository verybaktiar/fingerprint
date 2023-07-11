<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRekapPresensi extends Model
{
    protected $table = 'data_rekap_presensi';
    protected $fillable = [
        'nama',
        'tanggal',
        'hari',
        'jam_masuk',
        'jam_pulang',
        'keterlambatan',
        'status',
    ];
}
