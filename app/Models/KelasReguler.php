<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasReguler extends Model
{
    protected $table = 'kelas_reguler';
    protected $fillable = ['deskripsi', 'cover', 'file', 'link'];
}
