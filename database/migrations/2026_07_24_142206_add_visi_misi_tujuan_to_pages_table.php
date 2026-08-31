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
    Schema::table('pages', function (Blueprint $table) {
        $table->text('visi')->nullable()->after('isi');
        $table->text('misi')->nullable()->after('visi');
        $table->text('tujuan')->nullable()->after('misi');
    });
}

public function down(): void
{
    Schema::table('pages', function (Blueprint $table) {
        $table->dropColumn(['visi', 'misi', 'tujuan']);
    });

    }
};
