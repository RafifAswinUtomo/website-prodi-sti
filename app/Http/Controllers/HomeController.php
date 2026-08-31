<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Page;
use App\Models\MapsKontak;
use App\Models\Setting;
use App\Models\OnlineVisitor;
use App\Models\SejarahMilestone;
use App\Models\VisiMisi;
use App\Models\DosenProdi;
use App\Models\BeritaProdi;
use App\Support\SettingsCache;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman beranda.
     */
    public function index()
    {
        $data = Cache::remember(SettingsCache::HOME_CACHE_KEY, SettingsCache::TTL, function () {
            return [
                'sliders' => Slider::where('is_active', true)->orderBy('urutan')->get(),
                'tentang' => Page::where('slug', 'tentang')->first(),
                'mapsKontak' => MapsKontak::first(),
                'milestones' => SejarahMilestone::orderBy('tahun')->get(),
                'visiMisi' => VisiMisi::first(),
                'dosenProdi' => DosenProdi::orderBy('urutan')->get(),
               'beritaList' => BeritaProdi::where('tampil_beranda', true)->orderBy('urutan')->orderByDesc('tanggal')->get(),
            ];
        });

        $siteSettings = SettingsCache::all();

        $totalPengunjung = (int) Cache::remember('visitor.total', 300, function () {
            return (int) (Setting::where('key', 'total_pengunjung')->value('value') ?? 0);
        });

        $onlineSekarang = OnlineVisitor::where('last_activity', '>=', now()->subMinutes(5))->count();

        return view('site.home', array_merge($data, [
            'totalPengunjung' => $totalPengunjung,
            'onlineSekarang' => $onlineSekarang,
            'siteSettings' => $siteSettings,
        ]));
    }
}
