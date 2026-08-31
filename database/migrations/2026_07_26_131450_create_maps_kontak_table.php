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
    Schema::create('maps_kontak', function (Blueprint $table) {
        $table->id();
        $table->text('maps_embed')->nullable();
        $table->string('whatsapp_pmb')->nullable();
        $table->timestamps();
    });
}
public function down(): void { Schema::dropIfExists('maps_kontak'); }
};
