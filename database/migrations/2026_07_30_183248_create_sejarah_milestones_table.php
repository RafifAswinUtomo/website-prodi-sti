<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sejarah_milestones', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->string('judul');
            $table->string('badge')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('poin')->nullable(); // satu poin per baris
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sejarah_milestones');
    }
};
