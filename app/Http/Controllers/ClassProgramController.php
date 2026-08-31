<?php

namespace App\Http\Controllers;

use App\Models\KelasReguler;
use App\Models\KelasKaryawan;
use App\Models\KelasTransfer;

class ClassProgramController extends Controller
{
    protected array $submenu = [
        'reguler' => 'Kelas Reguler',
        'karyawan' => 'Kelas Karyawan',
        'transfer' => 'Kelas Transfer / Alih Jenjang',
    ];

    public function index()
    {
        return view('site.class-programs.index', ['submenu' => $this->submenu]);
    }

    public function show(string $jenis)
    {
        abort_unless(array_key_exists($jenis, $this->submenu), 404);

        $judul = $this->submenu[$jenis];

        $kelas = match ($jenis) {
            'reguler' => KelasReguler::first(),
            'karyawan' => KelasKaryawan::first(),
            'transfer' => KelasTransfer::first(),
        };

        return view('site.class-programs.detail', compact('judul', 'kelas'));
    }
}
