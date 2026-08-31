<?php

namespace App\Models\Concerns;

use App\Support\SettingsCache;

trait ClearsHomeCache
{
    /**
     * Bersihkan cache beranda saat model dibuat, diperbarui, atau dihapus.
     */
    protected static function bootClearsHomeCache(): void
    {
        static::saved(function () {
            SettingsCache::forgetHome();
        });

        static::deleted(function () {
            SettingsCache::forgetHome();
        });
    }
}
