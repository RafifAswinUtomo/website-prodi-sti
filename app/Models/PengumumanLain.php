<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengumumanLain extends Model
{
    protected $table = 'pengumuman_lain';
    protected $fillable = ['judul', 'deskripsi', 'file', 'urutan'];
}
