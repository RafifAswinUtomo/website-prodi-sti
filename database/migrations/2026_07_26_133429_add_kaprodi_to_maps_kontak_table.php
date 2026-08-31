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
    Schema::table('maps_kontak', function (Blueprint $table) {
        $table->string('nama_kaprodi')->nullable()->after('id');
        $table->string('whatsapp_kaprodi')->nullable()->after('nama_kaprodi');
    });
}
public function down(): void
{
    Schema::table('maps_kontak', function (Blueprint $table) {
        $table->dropColumn(['nama_kaprodi', 'whatsapp_kaprodi']);
    });
}
};
