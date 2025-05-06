<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'no_hp',
        'foto',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function jadwal()
    {
        return $this->hasMany(JadwalPengangkutan::class, 'petugas_id');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'petugas_id');
    }

    public function kendala()
    {
        return $this->hasMany(Kendala::class, 'petugas_id');
    }
}
