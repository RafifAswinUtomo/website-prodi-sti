<?php

namespace App\Support;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingsCache
{
    /**
     * Key cache untuk semua pengaturan situs.
     */
    public const CACHE_KEY = 'site_settings';

    /**
     * Key cache untuk data halaman beranda (sliders, dll).
     */
    public const HOME_CACHE_KEY = 'home_data';

    /**
     * Durasi cache (detik). Default 60 menit.
     */
    public const TTL = 3600;

    /**
     * Ambil semua pengaturan situs, dengan cache.
     *
     * @return array<string, string|null>
     */
    public static function all(): array
    {
        return Cache::remember(self::CACHE_KEY, self::TTL, function () {
            return Setting::pluck('value', 'key')->all();
        });
    }

    /**
     * Hapus cache pengaturan situs.
     */
    public static function forget(): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    /**
     * Hapus cache data beranda.
     */
    public static function forgetHome(): void
    {
        Cache::forget(self::HOME_CACHE_KEY);
    }

    /**
     * Hapus semua cache terkait situs (settings + home).
     */
    public static function flush(): void
    {
        self::forget();
        self::forgetHome();
    }
}
