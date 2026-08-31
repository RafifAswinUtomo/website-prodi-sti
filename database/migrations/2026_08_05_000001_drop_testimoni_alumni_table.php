<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Hapus tabel testimoni_alumni.
     */
    public function up(): void
    {
        Schema::dropIfExists('testimoni_alumni');
    }

    /**
     * Kembalikan tabel testimoni_alumni (jika rollback).
     */
    public function down(): void
    {
        Schema::create('testimoni_alumni', function ($table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan')->nullable();
            $table->string('foto')->nullable();
            $table->text('testimoni')->nullable();
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }
};

