<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ebooks', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('penulis')->nullable();
            $table->string('tahun', 4)->nullable();
            $table->string('kategori');
            $table->text('deskripsi')->nullable();
            $table->string('cover')->nullable();
            $table->string('file')->nullable();
            $table->unsignedInteger('halaman')->nullable();
            $table->unsignedBigInteger('ukuran_bytes')->nullable();
            $table->unsignedInteger('unduhan')->default(0);
            $table->integer('urutan')->default(0);
            $table->timestamps();

            $table->index('kategori');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ebooks');
    }
};
