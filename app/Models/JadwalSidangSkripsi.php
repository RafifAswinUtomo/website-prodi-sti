<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalSidangSkripsi extends Model
{
        protected $table = 'jadwal_sidang_skripsi';
    protected $fillable = ['deskripsi', 'cover', 'file'];
}
