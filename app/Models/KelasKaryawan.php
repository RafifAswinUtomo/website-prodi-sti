<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasKaryawan extends Model
{
    protected $table = 'kelas_karyawan';
    protected $fillable = ['deskripsi', 'cover', 'file', 'link'];
}
