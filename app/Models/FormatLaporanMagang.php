<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormatLaporanMagang extends Model
{
    protected $table = 'format_laporan_magang';
    protected $fillable = ['deskripsi', 'cover', 'file'];
}
