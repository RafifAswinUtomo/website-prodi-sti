<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('berita_prodis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('kategori'); // kegiatan | prestasi | kerjasama
            $table->string('gambar')->nullable();
            $table->date('tanggal')->nullable();
            $table->text('ringkasan')->nullable(); // tampil di kartu & atas modal
            $table->text('konten')->nullable(); // isi lengkap di modal
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('berita_prodis');
    }
};
