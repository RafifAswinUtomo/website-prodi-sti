<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkripsiTugasAkhir extends Model
{
    protected $table = 'skripsi_tugas_akhir';
    protected $fillable = ['judul', 'deskripsi', 'file', 'urutan'];
}
