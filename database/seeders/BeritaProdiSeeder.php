<?php

namespace Database\Seeders;

use App\Models\BeritaProdi;
use Illuminate\Database\Seeder;

class BeritaProdiSeeder extends Seeder
{
    /**
     * Isi tabel berita_prodis dari data/berita_prodi_manifest.json.
     * Gambar sudah ditaruh di storage/app/public/berita-prodi/ sebelum
     * seeder ini dijalankan — jalankan `php artisan storage:link` dulu
     * kalau symlink storage belum ada.
     *
     * Catatan: field 'tanggal', 'ringkasan', dan 'konten' sengaja dikosongkan
     * karena tidak bisa ditentukan otomatis dari nama file/gambar saja —
     * lengkapi manual lewat admin panel setelah data ini masuk.
     */
    public function run(): void
    {
        $path = database_path('seeders/data/berita_prodi_manifest.json');

        if (!file_exists($path)) {
            $this->command->warn('File manifest berita_prodi_manifest.json tidak ditemukan, seeder dilewati.');
            return;
        }

        $manifest = json_decode(file_get_contents($path), true);

        foreach ($manifest as $item) {
            BeritaProdi::updateOrCreate(
                ['judul' => $item['judul']],
                [
                    'kategori' => $item['kategori'],
                    'gambar' => $item['gambar'],
                    'urutan' => $item['urutan'],
                ]
            );
        }

        $this->command->info(count($manifest) . ' berita/kegiatan berhasil diseed ke tabel berita_prodis.');
    }
}
