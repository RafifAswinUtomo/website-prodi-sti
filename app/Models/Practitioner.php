<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Practitioner extends Model
{
    protected $fillable = ['nama', 'jabatan', 'instansi', 'deskripsi', 'foto', 'foto_kegiatan'];
}
