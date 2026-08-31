<?php

namespace App\Models;

use App\Models\Concerns\ClearsHomeCache;
use Illuminate\Database\Eloquent\Model;

class DosenProdi extends Model
{
    use ClearsHomeCache;

    protected $table = 'dosen_prodis';

    protected $fillable = [
        'nama',
        'nidn',
        'jabatan',
        'foto',
        'edukasi_terakhir',
        'keahlian',
        'email',
        'ruang_kerja',
        'riwayat_pendidikan',
        'mata_kuliah',
        'riset_publikasi',
        'urutan',
    ];
}
