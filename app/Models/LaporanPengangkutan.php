<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPengangkutan extends Model
{
    protected $table = 'laporan_pengangkutan';

    public function jadwal()
    {
        return $this->belongsTo(JadwalPengangkutan::class, 'jadwal_id');
    }
}
