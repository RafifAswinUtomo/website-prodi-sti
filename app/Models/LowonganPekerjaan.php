<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LowonganPekerjaan extends Model
{
    protected $table = 'lowongan_pekerjaan';
    protected $fillable = ['judul', 'foto', 'kebutuhan', 'file', 'urutan'];
}
