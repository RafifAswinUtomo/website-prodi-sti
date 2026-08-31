<?php

use App\Models\BeritaProdi;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('berita_prodis', function (Blueprint $table) {
            $table->boolean('tampil_beranda')->default(false)->after('urutan');
        });

        // Hapus 18 data poster batch awal (kategori kegiatan/prestasi) atas
        // permintaan kaprodi — kategori ini sekarang wajib foto asli, bukan
        // poster desain. Kategori "Berita" (poster boleh) belum ada datanya
        // saat migration ini dibuat, jadi aman dihapus semua tanpa syarat.
        BeritaProdi::truncate();
    }

    public function down(): void
    {
        Schema::table('berita_prodis', function (Blueprint $table) {
            $table->dropColumn('tampil_beranda');
        });
    }
};
