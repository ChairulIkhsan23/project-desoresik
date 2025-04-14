<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tps extends Model
{
    protected $table = 'tps';

    public function jadwal()
    {
        return $this->hasMany(JadwalPengangkutan::class);
    }
}
