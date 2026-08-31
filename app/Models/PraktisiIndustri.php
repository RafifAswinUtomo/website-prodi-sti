<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PraktisiIndustri extends Model
{
    protected $table = 'praktisi_industri';

    protected $fillable = ['nama', 'jabatan', 'instansi', 'deskripsi', 'foto', 'urutan'];
}
