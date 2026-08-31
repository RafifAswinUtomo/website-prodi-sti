<?php

namespace App\Http\Controllers;

use App\Models\TracerStudi;
use App\Models\LowonganPekerjaan;
use App\Models\PenalaranMinatBakat;
use App\Models\InformasiBeasiswa;

class KemahasiswaanController extends Controller
{
    protected array $submenu = [
        'lowongan-pekerjaan' => 'Lowongan Pekerjaan',
        'tracer-studi' => 'Tracer Studi',
        'penalaran-minat-bakat' => 'Penalaran, Minat & Bakat',
        'informasi-beasiswa' => 'Informasi Beasiswa',
    ];

    public function index()
    {
        return view('site.kemahasiswaan.index', ['submenu' => $this->submenu]);
    }

    public function show(string $slug)
    {
        abort_unless(array_key_exists($slug, $this->submenu), 404);

        $judul = $this->submenu[$slug];

        if ($slug === 'tracer-studi') {
            $tracerStudi = TracerStudi::first();

            return view('site.kemahasiswaan.tracer-studi', compact('judul', 'tracerStudi'));
        }

        if ($slug === 'lowongan-pekerjaan') {
            $items = LowonganPekerjaan::orderBy('urutan')->get();

            return view('site.kemahasiswaan.lowongan-pekerjaan', compact('judul', 'items'));
        }

        if ($slug === 'penalaran-minat-bakat') {
            $items = PenalaranMinatBakat::orderBy('urutan')->get();

            return view('site.kemahasiswaan.item-list', compact('judul', 'items'));
        }

        if ($slug === 'informasi-beasiswa') {
            $items = InformasiBeasiswa::orderBy('urutan')->get();

            return view('site.kemahasiswaan.informasi-beasiswa', compact('judul', 'items'));
        }

        abort(404);
    }
}
