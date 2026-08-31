<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ubah kolom `file` (download) menjadi `link` pada tabel kelas.
     * Cover tetap menggunakan `cover` (upload gambar/file).
     */
    public function up(): void
    {
        foreach (['kelas_reguler', 'kelas_karyawan', 'kelas_transfer'] as $table) {
            Schema::table($table, function (Blueprint $t) {
                $t->string('link')->nullable()->after('cover');
            });
        }
    }

    public function down(): void
    {
        foreach (['kelas_reguler', 'kelas_karyawan', 'kelas_transfer'] as $table) {
            Schema::table($table, function (Blueprint $t) {
                $t->dropColumn('link');
            });
        }
    }
};
