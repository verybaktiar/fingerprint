<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    protected $table = 'perizinan';

    protected $fillable = ['userfinger_id', 'tanggal', 'status'];

    public function userfinger()
    {
        return $this->belongsTo(Userfinger::class);
    }
}
