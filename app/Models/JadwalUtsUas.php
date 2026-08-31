<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalUtsUas extends Model
{
        protected $table = 'jadwal_uts_uas';
    protected $fillable = ['deskripsi', 'cover', 'file'];
}
