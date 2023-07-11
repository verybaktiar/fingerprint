<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswas';
    protected $fillable = ['nim','nama','univ','jurusan','jenis_kelamin','alamat'];
    protected $primaryKey = 'nim';

    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'siswa_id');
    }
}
