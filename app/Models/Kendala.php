<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendala extends Model
{
    protected $table = 'kendala';

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }

    public function jadwal()
    {
        return $this->belongsTo(JadwalPengangkutan::class, 'jadwal_id');
    }
}
