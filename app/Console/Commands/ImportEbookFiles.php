<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Finder\Finder;

class ImportEbookFiles extends Command
{
    /**
     * php artisan ebooks:import-files "D:\Downloads\drive-download-1" "D:\Downloads\drive-download-2"
     *
     * Cari tiap file PDF asli (nama file harus SAMA PERSIS seperti waktu diunduh dari
     * Google Drive, jangan diganti nama) di dalam folder-folder yang diberikan,
     * lalu salin ke storage/app/public/ebooks/files/ dengan nama baku sesuai manifest.
     */
    protected $signature = 'ebooks:import-files {folders* : Satu atau lebih folder hasil ekstrak ZIP Google Drive}';

    protected $description = 'Salin file PDF e-book dari folder hasil ekstrak Google Drive ke storage e-library';

    public function handle(): int
    {
        $folders = $this->argument('folders');

        foreach ($folders as $folder) {
            if (!is_dir($folder)) {
                $this->error("Folder tidak ditemukan: {$folder}");
                return self::FAILURE;
            }
        }

        $manifestPath = database_path('seeders/data/ebooks_manifest.json');
        if (!file_exists($manifestPath)) {
            $this->error('File manifest tidak ditemukan di database/seeders/data/ebooks_manifest.json');
            return self::FAILURE;
        }

        $manifest = json_decode(file_get_contents($manifestPath), true);

        // Index semua PDF di dalam folder-folder yang diberikan, berdasar nama file.
        // Juga siapkan versi "dinormalisasi" (huruf kecil, tanpa simbol) untuk fallback
        // pencocokan kalau karakter khusus (é, –, →, dst) terbaca beda antar sistem operasi.
        $index = [];
        $normalizedIndex = [];
        $finder = new Finder();
        $finder->files()->in($folders)->name('*.pdf');
        foreach ($finder as $file) {
            $index[$file->getFilename()] = $file->getRealPath();
            $normalizedIndex[$this->normalize($file->getFilename())] = $file->getRealPath();
        }

        $destDir = storage_path('app/public/ebooks/files');
        if (!is_dir($destDir)) {
            mkdir($destDir, 0755, true);
        }

        $found = 0;
        $missing = [];

        $bar = $this->output->createProgressBar(count($manifest));
        $bar->start();

        foreach ($manifest as $item) {
            $original = $item['original_filename'];
            $destName = basename($item['storage_file']);

            if (isset($index[$original])) {
                copy($index[$original], $destDir . DIRECTORY_SEPARATOR . $destName);
                $found++;
            } elseif (isset($normalizedIndex[$this->normalize($original)])) {
                copy($normalizedIndex[$this->normalize($original)], $destDir . DIRECTORY_SEPARATOR . $destName);
                $found++;
            } else {
                $missing[] = $original;
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);

        $this->info("Berhasil disalin: {$found} / " . count($manifest));

        if ($missing) {
            $this->warn(count($missing) . ' file tidak ditemukan di folder yang diberikan:');
            foreach ($missing as $name) {
                $this->line("  - {$name}");
            }
        }

        return self::SUCCESS;
    }

    /**
     * Normalisasi nama file untuk fallback matching: huruf kecil semua,
     * dan buang semua karakter selain huruf/angka. Ini bikin pencocokan
     * tetap jalan walau karakter khusus (é, –, —, →, ', …) terbaca beda
     * antara sistem yang mengekstrak ZIP-nya.
     */
    private function normalize(string $filename): string
    {
        $ascii = @iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $filename) ?: $filename;

        return strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $ascii));
    }
}
