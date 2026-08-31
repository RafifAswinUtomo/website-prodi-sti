<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('visi_misi', function (Blueprint $table) {
            $table->text('karakter')->nullable()->after('tujuan');
            $table->string('peo1_title')->nullable()->after('karakter');
            $table->text('peo1_desc')->nullable()->after('peo1_title');
            $table->string('peo2_title')->nullable()->after('peo1_desc');
            $table->text('peo2_desc')->nullable()->after('peo2_title');
            $table->string('peo3_title')->nullable()->after('peo2_desc');
            $table->text('peo3_desc')->nullable()->after('peo3_title');
        });
    }

    public function down(): void
    {
        Schema::table('visi_misi', function (Blueprint $table) {
            $table->dropColumn(['karakter', 'peo1_title', 'peo1_desc', 'peo2_title', 'peo2_desc', 'peo3_title', 'peo3_desc']);
        });
    }
};
