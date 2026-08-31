<?php

use App\Http\Controllers\Admin\StatistikController;
use App\Http\Controllers\Admin\SambutanController;
use App\Http\Controllers\Admin\DosenProdiController;
use App\Http\Controllers\Admin\BeritaProdiController;
use App\Http\Controllers\Admin\ProspekKarirController;
use App\Http\Controllers\Admin\PilarKompetensiController;
use App\Http\Controllers\Admin\SosialMediaController;
use App\Http\Controllers\Admin\MapsKontakController;
use App\Http\Controllers\Admin\LspController;
use App\Http\Controllers\Admin\TracerStudiController;
use App\Http\Controllers\Admin\LowonganPekerjaanController;
use App\Http\Controllers\Admin\PenalaranMinatBakatController;
use App\Http\Controllers\Admin\InformasiBeasiswaController;
use App\Http\Controllers\Admin\KelasRegulerController;
use App\Http\Controllers\Admin\KelasKaryawanController;
use App\Http\Controllers\Admin\KelasTransferController;
use App\Http\Controllers\Admin\KalenderAkademikController;
use App\Http\Controllers\Admin\WisudaController;
use App\Http\Controllers\Admin\JadwalSidangSkripsiController;
use App\Http\Controllers\Admin\SemesterAntaraController;
use App\Http\Controllers\Admin\JadwalUtsUasController;
use App\Http\Controllers\Admin\PengumumanLainController;
use App\Http\Controllers\Admin\VisiMisiController;
use App\Http\Controllers\Admin\EbookController;
use App\Http\Controllers\LspController as SiteLspController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ── Controller Admin ──
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\GraduateProfileController;
use App\Http\Controllers\Admin\PractitionerController;
use App\Http\Controllers\Admin\PraktisiIndustriController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\ClassProgramController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\KurikulumController;
use App\Http\Controllers\Admin\ELearningController;
use App\Http\Controllers\Admin\JadwalKuliahController;
use App\Http\Controllers\Admin\PanduanMagangController;
use App\Http\Controllers\Admin\FormatLaporanMagangController;
use App\Http\Controllers\Admin\SkripsiTugasAkhirController;
use App\Http\Controllers\Admin\SejarahMilestoneController;

// ── Controller Publik ──
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PractitionerController as SitePractitionerController;
use App\Http\Controllers\PraktisiIndustriController as SitePraktisiIndustriController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\FacilityController as SiteFacilityController;
use App\Http\Controllers\KemahasiswaanController;
use App\Http\Controllers\BeritaKegiatanController;
use App\Http\Controllers\ClassProgramController as SiteClassProgramController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ChatbotController;


/*
|--------------------------------------------------------------------------
| Rute Publik
|--------------------------------------------------------------------------
| Catatan: submenu Akademik (Kurikulum, E-learning, dst) SEMUA lewat satu
| route /akademik/{slug} di bawah ini. Tidak perlu route publik baru per
| menu — cukup atur logikanya di dalam AkademikController.
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil/{slug}', [ProfilController::class, 'show'])->name('profil.show');
Route::get('/testimoni-alumni', [SitePractitionerController::class, 'index'])->name('practitioners.index');
Route::get('/praktisi-industri', [SitePraktisiIndustriController::class, 'index'])->name('praktisi-industri.index');
Route::get('/akademik', [AkademikController::class, 'index'])->name('akademik.index');
Route::get('/akademik/e-library/unduh/{ebook}', [AkademikController::class, 'unduhEbook'])->name('akademik.e-library.unduh');
Route::get('/akademik/{slug}', [AkademikController::class, 'show'])->name('akademik.show');
Route::get('/fasilitas', [SiteFacilityController::class, 'index'])->name('facilities.index');
Route::get('/kemahasiswaan', [KemahasiswaanController::class, 'index'])->name('kemahasiswaan.index');
Route::get('/kemahasiswaan/{slug}', [KemahasiswaanController::class, 'show'])->name('kemahasiswaan.show');
Route::get('/fasilitas/lsp', [SiteLspController::class, 'show'])->name('lsp.show');
Route::get('/program-kelas', [SiteClassProgramController::class, 'index'])->name('class-programs.index');
Route::get('/program-kelas/{jenis}', [SiteClassProgramController::class, 'show'])->name('class-programs.show');
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
Route::get('/pengumuman/{slug}', [PengumumanController::class, 'show'])->name('pengumuman.show');
Route::get('/berita-kegiatan', [BeritaKegiatanController::class, 'index'])->name('berita-kegiatan.index');
// Endpoint chatbot: dibatasi 10 request/menit per IP agar tidak disalahgunakan
Route::post('/chatbot', [ChatbotController::class, 'respond'])->name('chatbot.respond')->middleware('throttle:10,1');
/*
|--------------------------------------------------------------------------
| Rute Admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Beranda
    Route::resource('sliders', SliderController::class);
    Route::get('statistik', [StatistikController::class, 'edit'])->name('statistik.edit');
    Route::put('statistik', [StatistikController::class, 'update'])->name('statistik.update');
    Route::get('sambutan', [SambutanController::class, 'edit'])->name('sambutan.edit');
    Route::put('sambutan', [SambutanController::class, 'update'])->name('sambutan.update');
    Route::get('prospek-karir', [ProspekKarirController::class, 'edit'])->name('prospek-karir.edit');
    Route::put('prospek-karir', [ProspekKarirController::class, 'update'])->name('prospek-karir.update');
    Route::get('pilar-kompetensi', [PilarKompetensiController::class, 'edit'])->name('pilar-kompetensi.edit');
    Route::put('pilar-kompetensi', [PilarKompetensiController::class, 'update'])->name('pilar-kompetensi.update');
    Route::get('sosial-media', [SosialMediaController::class, 'edit'])->name('sosial-media.edit');
    Route::put('sosial-media', [SosialMediaController::class, 'update'])->name('sosial-media.update');
    // Profil
    Route::get('lsp', [LspController::class, 'edit'])->name('lsp.edit');
    Route::post('lsp', [LspController::class, 'update'])->name('lsp.update');

    Route::get('visi-misi', [VisiMisiController::class, 'edit'])->name('visi-misi.edit');
    Route::post('visi-misi', [VisiMisiController::class, 'update'])->name('visi-misi.update');

    Route::put('sejarah-milestones-banner', [SejarahMilestoneController::class, 'updateBanner'])->name('sejarah-milestones.banner.update');
    Route::resource('sejarah-milestones', SejarahMilestoneController::class);
    Route::resource('dosen-prodi', DosenProdiController::class);
    Route::put('berita-prodi-banner', [BeritaProdiController::class, 'updateBanner'])->name('berita-prodi.banner.update');
    Route::resource('berita-prodi', BeritaProdiController::class);
    Route::get('tracer-studi', [TracerStudiController::class, 'edit'])->name('tracer-studi.edit');
    Route::post('tracer-studi', [TracerStudiController::class, 'update'])->name('tracer-studi.update');

    Route::resource('lowongan-pekerjaan', LowonganPekerjaanController::class);
    Route::resource('penalaran-minat-bakat', PenalaranMinatBakatController::class);
    Route::resource('informasi-beasiswa', InformasiBeasiswaController::class);
    Route::resource('graduate-profiles', GraduateProfileController::class);
    Route::resource('practitioners', PractitionerController::class);
    Route::resource('praktisi-industri', PraktisiIndustriController::class);

    // Akademik — masing-masing 1 data, pola edit langsung
    Route::get('kurikulum', [KurikulumController::class, 'edit'])->name('kurikulum.edit');
    Route::post('kurikulum', [KurikulumController::class, 'update'])->name('kurikulum.update');

    Route::get('maps-kontak', [MapsKontakController::class, 'edit'])->name('maps-kontak.edit');
    Route::post('maps-kontak', [MapsKontakController::class, 'update'])->name('maps-kontak.update');

    Route::get('e-learning', [ELearningController::class, 'edit'])->name('e-learning.edit');
    Route::post('e-learning', [ELearningController::class, 'update'])->name('e-learning.update');

    Route::get('jadwal-kuliah', [JadwalKuliahController::class, 'edit'])->name('jadwal-kuliah.edit');
    Route::post('jadwal-kuliah', [JadwalKuliahController::class, 'update'])->name('jadwal-kuliah.update');

    Route::get('panduan-magang', [PanduanMagangController::class, 'edit'])->name('panduan-magang.edit');
    Route::post('panduan-magang', [PanduanMagangController::class, 'update'])->name('panduan-magang.update');

    Route::get('format-laporan-magang', [FormatLaporanMagangController::class, 'edit'])->name('format-laporan-magang.edit');
    Route::post('format-laporan-magang', [FormatLaporanMagangController::class, 'update'])->name('format-laporan-magang.update');

    Route::resource('skripsi-tugas-akhir', SkripsiTugasAkhirController::class);
    Route::resource('ebooks', EbookController::class);

    // Fasilitas & Program Kelas
    Route::resource('facilities', FacilityController::class);
    Route::resource('class-programs', ClassProgramController::class);

    Route::get('kelas-reguler', [KelasRegulerController::class, 'edit'])->name('kelas-reguler.edit');
    Route::post('kelas-reguler', [KelasRegulerController::class, 'update'])->name('kelas-reguler.update');

    Route::get('kelas-karyawan', [KelasKaryawanController::class, 'edit'])->name('kelas-karyawan.edit');
    Route::post('kelas-karyawan', [KelasKaryawanController::class, 'update'])->name('kelas-karyawan.update');

    Route::get('kelas-transfer', [KelasTransferController::class, 'edit'])->name('kelas-transfer.edit');
    Route::post('kelas-transfer', [KelasTransferController::class, 'update'])->name('kelas-transfer.update');

    // Kemahasiswaan, Prestasi, Kerjasama (lewat tabel posts)
    Route::resource('posts', PostController::class);

    // Halaman generik (fallback untuk slug yang belum punya tabel sendiri)
    Route::get('pages/goto/{slug}', [PageController::class, 'bySlug'])->name('pages.goto');
    Route::resource('pages', PageController::class);

    // Pengumuman
    Route::get('kalender-akademik', [KalenderAkademikController::class, 'edit'])->name('kalender-akademik.edit');
    Route::post('kalender-akademik', [KalenderAkademikController::class, 'update'])->name('kalender-akademik.update');

    Route::get('wisuda', [WisudaController::class, 'edit'])->name('wisuda.edit');
    Route::post('wisuda', [WisudaController::class, 'update'])->name('wisuda.update');

    Route::get('jadwal-sidang-skripsi', [JadwalSidangSkripsiController::class, 'edit'])->name('jadwal-sidang-skripsi.edit');
    Route::post('jadwal-sidang-skripsi', [JadwalSidangSkripsiController::class, 'update'])->name('jadwal-sidang-skripsi.update');

    Route::get('semester-antara', [SemesterAntaraController::class, 'edit'])->name('semester-antara.edit');
    Route::post('semester-antara', [SemesterAntaraController::class, 'update'])->name('semester-antara.update');

    Route::get('jadwal-uts-uas', [JadwalUtsUasController::class, 'edit'])->name('jadwal-uts-uas.edit');
    Route::post('jadwal-uts-uas', [JadwalUtsUasController::class, 'update'])->name('jadwal-uts-uas.update');

    Route::resource('pengumuman-lain', PengumumanLainController::class);

    // Pengaturan Situs
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
