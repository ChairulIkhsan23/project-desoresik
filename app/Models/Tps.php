<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tps extends Model
{
    protected $table = 'tps';

    protected $fillable = ['nama_tps', 'alamat', 'latitude', 'longitude'];

}
