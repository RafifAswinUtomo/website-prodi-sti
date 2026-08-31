<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PanduanMagang extends Model
{
    protected $table = 'panduan_magang';
    protected $fillable = ['deskripsi', 'cover', 'file'];
}
