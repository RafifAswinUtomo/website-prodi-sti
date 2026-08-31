<?php

namespace Database\Seeders;

use App\Models\Ebook;
use Illuminate\Database\Seeder;

class EbookSeeder extends Seeder
{
    /**
     * Isi tabel ebooks dari data/ebooks_manifest.json.
     * File PDF & cover sudah ditaruh di storage/app/public/ebooks/{files,covers}
     * sebelum seeder ini dijalankan — jalankan `php artisan storage:link` dulu
     * kalau symlink storage belum ada.
     */
    public function run(): void
    {
        $path = database_path('seeders/data/ebooks_manifest.json');

        if (!file_exists($path)) {
            $this->command->warn('File manifest ebooks_manifest.json tidak ditemukan, seeder dilewati.');
            return;
        }

        $manifest = json_decode(file_get_contents($path), true);

        foreach ($manifest as $item) {
            Ebook::updateOrCreate(
                ['judul' => $item['title']],
                [
                    'penulis' => $item['author'] ?: null,
                    'tahun' => $item['year'] ?: null,
                    'kategori' => $item['kategori'],
                    'cover' => $item['storage_cover'],
                    'file' => $item['storage_file'],
                    'halaman' => $item['pages'] ?: null,
                    'ukuran_bytes' => $item['filesize_bytes'] ?: null,
                    'urutan' => $item['id'],
                ]
            );
        }

        $this->command->info(count($manifest) . ' e-book berhasil diseed ke tabel ebooks.');
    }
}
