<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPengangkutan extends Model
{
    protected $table = 'jadwal_pengangkutan';

    public function tps()
    {
        return $this->belongsTo(Tps::class);
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }

    public function laporan()
    {
        return $this->hasOne(LaporanPengangkutan::class, 'jadwal_id');
    }

    public function kendala()
    {
        return $this->hasMany(Kendala::class, 'jadwal_id');
    }
}
