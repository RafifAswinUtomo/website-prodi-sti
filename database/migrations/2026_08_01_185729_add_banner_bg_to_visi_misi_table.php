<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('visi_misi', function (Blueprint $table) {
            $table->string('banner_bg')->nullable()->after('peo3_desc');
        });
    }

    public function down(): void
    {
        Schema::table('visi_misi', function (Blueprint $table) {
            $table->dropColumn('banner_bg');
        });
    }
};
