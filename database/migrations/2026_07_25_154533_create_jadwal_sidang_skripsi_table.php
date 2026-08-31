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
    Schema::create('jadwal_sidang_skripsi', function (Blueprint $table) {
        $table->id();
        $table->text('deskripsi')->nullable();
        $table->string('cover')->nullable();
        $table->string('file')->nullable();
        $table->timestamps();
    });
}
public function down(): void { Schema::dropIfExists('jadwal_sidang_skripsi'); }
};
