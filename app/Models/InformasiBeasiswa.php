<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformasiBeasiswa extends Model
{
    protected $table = 'informasi_beasiswa';
    protected $fillable = ['judul', 'foto', 'deskripsi', 'file', 'urutan'];
}
