<?php

namespace App\Models;

use App\Models\Concerns\ClearsHomeCache;
use Illuminate\Database\Eloquent\Model;

class BeritaProdi extends Model
{
    use ClearsHomeCache;

    protected $table = 'berita_prodis';

protected $fillable = ['judul', 'kategori', 'gambar', 'tanggal', 'ringkasan', 'konten', 'urutan', 'tampil_beranda'];

protected $casts = [
    'tanggal' => 'date',
    'tampil_beranda' => 'boolean',
];
}
