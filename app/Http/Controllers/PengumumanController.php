<?php

namespace App\Http\Controllers;

use App\Models\KalenderAkademik;
use App\Models\Wisuda;
use App\Models\JadwalSidangSkripsi;
use App\Models\SemesterAntara;
use App\Models\JadwalUtsUas;
use App\Models\PengumumanLain;

class PengumumanController extends Controller
{
    protected array $submenu = [
        'kalender-akademik' => 'Kalender Akademik',
        'wisuda' => 'Wisuda',
        'jadwal-sidang-skripsi' => 'Jadwal Sidang Skripsi',
        'semester-antara' => 'Semester Antara',
        'jadwal-uts-uas' => 'Jadwal UTS dan UAS',
        'lain-lain' => 'Lain-lain',
    ];

    public function index()
    {
        return view('site.pengumuman.index', ['submenu' => $this->submenu]);
    }

    public function show(string $slug)
    {
        abort_unless(array_key_exists($slug, $this->submenu), 404);

        $judul = $this->submenu[$slug];

        if ($slug === 'lain-lain') {
            $items = PengumumanLain::orderBy('urutan')->get();

            return view('site.pengumuman.lain-lain', compact('judul', 'items'));
        }

        $dokumen = match ($slug) {
            'kalender-akademik' => KalenderAkademik::first(),
            'wisuda' => Wisuda::first(),
            'jadwal-sidang-skripsi' => JadwalSidangSkripsi::first(),
            'semester-antara' => SemesterAntara::first(),
            'jadwal-uts-uas' => JadwalUtsUas::first(),
        };

        return view('site.pengumuman.dokumen', compact('judul', 'dokumen'));
    }
}
