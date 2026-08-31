<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    protected $table = 'ebooks';

    protected $fillable = [
        'judul', 'penulis', 'tahun', 'kategori', 'deskripsi',
        'cover', 'file', 'halaman', 'ukuran_bytes', 'unduhan', 'urutan',
    ];

    /**
     * Kategori tetap yang dipakai untuk filter & dropdown admin.
     * Disimpan sebagai konstanta supaya konsisten antara form admin dan filter publik.
     */
    public const KATEGORI = [
        'Kecerdasan Buatan & Machine Learning',
        'Software Engineering & Manajemen Proyek',
        'Sistem Operasi, Jaringan & Keamanan',
        'Data Science & Business Intelligence',
        'Ilmu Komputer Teoretis & Struktur Data',
        'Komputasi Kuantum',
        'Metodologi & Penulisan Akademik',
        'Aplikasi Komputasi Terapan',
        'Teknologi Informasi Umum',
    ];

    /**
     * Ukuran file dalam format terbaca (mis. "12.4 MB").
     */
    public function getUkuranFormatAttribute(): string
    {
        $bytes = $this->ukuran_bytes;

        if (!$bytes) {
            return '-';
        }

        if ($bytes >= 1048576) {
            return round($bytes / 1048576, 1) . ' MB';
        }

        return round($bytes / 1024, 1) . ' KB';
    }
}
