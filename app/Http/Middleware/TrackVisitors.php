<?php

namespace App\Http\Middleware;

use App\Models\OnlineVisitor;
use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitors
{
    /**
     * Interval minimal (detik) untuk memperbarui aktivitas di database
     * per session, supaya tidak menulis DB pada setiap request.
     */
    private const ACTIVITY_INTERVAL = 300;

    public function handle(Request $request, Closure $next): Response
    {
        $sessionId = $request->session()->getId();

        // Batasi penulisan OnlineVisitor maksimal 1x per 5 menit per session.
        $cacheKey = 'visitor.online.' . $sessionId;
        if (! Cache::has($cacheKey)) {
            OnlineVisitor::updateOrCreate(
                ['session_id' => $sessionId],
                ['last_activity' => now()]
             );
            Cache::put($cacheKey, true, self::ACTIVITY_INTERVAL);
        }

        // Hitung pengunjung unik: maksimal 1x per session (disimpan di session),
        // dan batasi penulisan DB via cache agar tidak terjadi bersamaan.
        if (! $request->session()->has('counted_visit')) {
            $request->session()->put('counted_visit', true);

            $lockKey = 'visitor.count.lock';
            if (Cache::lock($lockKey, 10)->get()) {
                try {
                    $setting = Setting::firstOrCreate(['key' => 'total_pengunjung'], ['value' => 0]);
                    $setting->increment('value');
                    Cache::forget('visitor.total');
                } finally {
                    Cache::lock($lockKey)->release();
                }
            }
        }

        return $next($request);
    }
}
