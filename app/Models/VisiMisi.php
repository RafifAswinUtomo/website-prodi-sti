<?php

namespace App\Models;

use App\Models\Concerns\ClearsHomeCache;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    use ClearsHomeCache;

    protected $table = 'visi_misi';

    protected $fillable = [
        'visi', 'misi', 'tujuan', 'karakter',
        'peo1_title', 'peo1_desc',
        'peo2_title', 'peo2_desc',
        'peo3_title', 'peo3_desc',
        'banner_bg',
    ];
}
