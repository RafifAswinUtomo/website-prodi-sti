<?php

namespace App\Http\Controllers;

use App\Models\BeritaProdi;

class BeritaKegiatanController extends Controller
{
    public function index()
    {
        $kategori = request()->query('kategori'); // null = tampilkan semua kategori

        // Kategori "berita" hanya tampil di beranda, jadi dikecualikan dari halaman ini.
        // Halaman ini hanya menampilkan Kegiatan/Event, Prestasi, dan Kerja Sama.
        $beritaList = BeritaProdi::where('kategori', '!=', 'berita')
            ->when($kategori, fn($q) => $q->where('kategori', $kategori))
            ->orderBy('urutan')
            ->orderByDesc('tanggal')
            ->get();

        $semuaBerita = BeritaProdi::where('kategori', '!=', 'berita')->get(); // untuk hitung jumlah tiap kategori di tombol toggle
        $jmlKegiatan  = $semuaBerita->where('kategori', 'kegiatan')->count();
        $jmlPrestasi  = $semuaBerita->where('kategori', 'prestasi')->count();
        $jmlKerjasama = $semuaBerita->where('kategori', 'kerjasama')->count();
        $jmlSemua     = $semuaBerita->count();

        return view('site.berita-kegiatan.index', compact(
            'beritaList',
            'kategori',
            'jmlKegiatan',
            'jmlPrestasi',
            'jmlKerjasama',
            'jmlSemua'
        ));
    }
}
