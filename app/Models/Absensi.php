<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}
