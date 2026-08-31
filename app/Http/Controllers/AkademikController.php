<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Kurikulum;
use App\Models\ELearning;
use App\Models\JadwalKuliah;
use App\Models\PanduanMagang;
use App\Models\FormatLaporanMagang;
use App\Models\SkripsiTugasAkhir;
use App\Models\Ebook;
use Illuminate\Support\Facades\Storage;

class AkademikController extends Controller
{
    protected array $submenu = [
        'kurikulum' => 'Kurikulum',
        'e-library' => 'E-Library',
        'e-learning' => 'E-learning',
        'jadwal-kuliah' => 'Jadwal Kuliah',
        'panduan-magang' => 'Panduan Magang',
        'format-laporan-magang' => 'Format Laporan Magang',
        'skripsi-tugas-akhir' => 'Skripsi/Tugas Akhir',
    ];

    public function index()
    {
        return view('site.akademik.index', ['submenu' => $this->submenu]);
    }

    public function show(string $slug)
    {
        abort_unless(array_key_exists($slug, $this->submenu), 404);

        $judul = $this->submenu[$slug];

        if ($slug === 'kurikulum') {
            $kurikulum = Kurikulum::first();

            return view('site.akademik.kurikulum', compact('judul', 'kurikulum'));
        }

        if ($slug === 'e-learning') {
            $eLearning = ELearning::first();

            return view('site.akademik.e-learning', compact('judul', 'eLearning'));
        }

        if ($slug === 'jadwal-kuliah') {
            $jadwalKuliah = JadwalKuliah::first();

            return view('site.akademik.jadwal-kuliah', compact('judul', 'jadwalKuliah'));
        }

        if ($slug === 'panduan-magang') {
            $dokumen = PanduanMagang::first();

            return view('site.akademik.dokumen-generik', compact('judul', 'dokumen'));
        }

        if ($slug === 'format-laporan-magang') {
            $dokumen = FormatLaporanMagang::first();

            return view('site.akademik.dokumen-generik', compact('judul', 'dokumen'));
        }

        if ($slug === 'skripsi-tugas-akhir') {
            $items = SkripsiTugasAkhir::orderBy('urutan')->get();

            return view('site.akademik.skripsi-tugas-akhir', compact('judul', 'items'));
        }

        if ($slug === 'e-library') {
       $query = Ebook::orderBy('kategori')->orderBy('urutan')->orderBy('judul');

if (request()->filled('kategori')) {
    $query->where('kategori', request()->input('kategori'));
}

if (request()->filled('tahun')) {
    $query->where('tahun', request()->input('tahun'));
}

if (request()->filled('q')) {
    $keyword = request()->input('q');
    $query->where(function ($q) use ($keyword) {
        $q->where('judul', 'like', "%{$keyword}%")
          ->orWhere('penulis', 'like', "%{$keyword}%");
    });
}

$ebooks = $query->paginate(12)->withQueryString();
$kategoriList = Ebook::where('kategori', '!=', '')
    ->distinct()
    ->orderBy('kategori')
    ->pluck('kategori');
$tahunList = Ebook::whereNotNull('tahun')
    ->where('tahun', '!=', '')
    ->distinct()
    ->orderByDesc('tahun')
    ->pluck('tahun');

return view('site.akademik.e-library', compact('judul', 'ebooks', 'kategoriList', 'tahunList'));
        }

        $page = Page::where('slug', $slug)->first();

        return view('site.akademik.show', compact('page', 'judul'));
    }

    public function unduhEbook(Ebook $ebook)
    {
        abort_unless($ebook->file, 404);

        $ebook->increment('unduhan');

        return Storage::disk('public')->download($ebook->file, $ebook->judul . '.pdf');
    }
}
