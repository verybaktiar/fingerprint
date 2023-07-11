<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userfinger extends Model
{
    protected $fillable = ['id', 'name'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id', 'nim');
    }
}
