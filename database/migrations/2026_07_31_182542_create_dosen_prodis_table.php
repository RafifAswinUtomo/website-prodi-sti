<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dosen_prodis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nidn')->nullable();
            $table->string('jabatan')->nullable(); // badge di kartu, mis. "Kepala Program Studi (Kaprodi)"
            $table->string('foto')->nullable();
            $table->string('edukasi_terakhir')->nullable(); // ringkas, tampil di kartu
            $table->string('keahlian')->nullable(); // ringkas, tampil di kartu
            $table->string('email')->nullable();
            $table->string('ruang_kerja')->nullable();
            $table->text('riwayat_pendidikan')->nullable(); // satu baris per item, untuk modal
            $table->text('mata_kuliah')->nullable(); // dipisah koma, untuk tag modal
            $table->text('riset_publikasi')->nullable(); // satu baris per item, untuk modal
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dosen_prodis');
    }
};
