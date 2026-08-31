<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['type', 'judul', 'isi', 'gambar', 'tanggal', 'lampiran'];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
