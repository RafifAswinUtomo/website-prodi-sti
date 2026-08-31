<?php

namespace App\Models;

use App\Models\Concerns\ClearsHomeCache;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use ClearsHomeCache;

    protected $fillable = [
        'judul',
        'judul_baris2',
        'judul_sorot',
        'subjudul',
        'gambar',
        'tombol_teks',
        'tombol_link',
        'urutan',
        'is_active',
    ];
}
