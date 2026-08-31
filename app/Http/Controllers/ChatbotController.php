<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\DosenProdi;
use App\Models\BeritaProdi;
use App\Models\VisiMisi;
use App\Models\SejarahMilestone;
use App\Models\Facility;
use App\Models\ClassProgram;
use App\Models\KelasReguler;
use App\Models\KelasKaryawan;
use App\Models\KelasTransfer;
use App\Models\Kurikulum;
use App\Models\ELearning;
use App\Models\JadwalKuliah;
use App\Models\PanduanMagang;
use App\Models\FormatLaporanMagang;
use App\Models\SkripsiTugasAkhir;
use App\Models\Lsp;
use App\Models\TracerStudi;
use App\Models\LowonganPekerjaan;
use App\Models\InformasiBeasiswa;
use App\Models\PenalaranMinatBakat;
use App\Models\KalenderAkademik;
use App\Models\Wisuda;
use App\Models\JadwalSidangSkripsi;
use App\Models\SemesterAntara;
use App\Models\JadwalUtsUas;
use App\Models\PengumumanLain;
use App\Models\GraduateProfile;
use App\Models\Practitioner;
use App\Models\PraktisiIndustri;
use App\Models\Ebook;
use App\Models\MapsKontak;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function respond(Request $request)
    {
        $request->validate(['message' => 'required|string|max:500']);

        $pesan = mb_strtolower(trim($request->input('message')));
        $settings = Setting::pluck('value', 'key');
        $namaProdi = $settings['nama_prodi'] ?? 'S1 Sistem dan Teknologi Informasi';
        $namaKampus = $settings['nama_kampus'] ?? 'Universitas IVET Semarang';

        $reply = $this->cariJawaban($pesan, $settings, $namaProdi, $namaKampus);

        return response()->json(['reply' => $reply]);
    }

    protected function cariJawaban(string $pesan, $settings, string $namaProdi, string $namaKampus): string
    {
        // ── Kategori / Intensif ──
        $isPendaftaran = $this->mengandung($pesan, ['daftar', 'pmb', 'pendaftaran', 'gelombang', 'masuk kuliah', 'cara masuk']);
        $isKelas = $this->mengandung($pesan, ['kelas karyawan', 'kelas malam', 'kelas reguler', 'alih jenjang', 'pindah jenjang']);
        $isDosen = $this->mengandung($pesan, ['dosen', 'pengajar', 'siapa mengajar', 'kaprodi', 'ketua program studi']);
        $isTestimoniAlumni = $this->mengandung($pesan, ['testimoni', 'testimoni alumni', 'alumni bekerja', 'kisah alumni', 'cerita alumni', 'alumni']);
        $isPraktisi = $this->mengandung($pesan, ['praktisi', 'industri mengajar', 'dosen industri', 'praktisi industri']);
        $isBerita = $this->mengandung($pesan, ['berita', 'kegiatan terbaru', 'event', 'acara']);
        $isPrestasi = $this->mengandung($pesan, ['prestasi', 'juara', 'kompetisi', 'lomba']);
        $isKerjasama = $this->mengandung($pesan, ['kerjasama', 'kerja sama', 'mitra', 'dudi', 'industri']);
        $isFasilitas = $this->mengandung($pesan, ['fasilitas', 'lab', 'laboratorium']);
        $isLsp = $this->mengandung($pesan, ['lsp', 'sertifikasi', 'lembaga sertifikasi', 'kompetensi']);
        $isVisiMisi = $this->mengandung($pesan, ['visi', 'misi', 'tujuan program studi']);
        $isSejarah = $this->mengandung($pesan, ['sejarah', 'berdiri sejak', 'kapan berdiri', 'sk pendirian']);
        $isBeasiswa = $this->mengandung($pesan, ['beasiswa', 'kip', 'bantuan biaya']);
        $isLowonganKerja = $this->mengandung($pesan, ['lowongan pekerjaan', 'kerja setelah lulus', 'peluang kerja']);
        $isProspekKarir = $this->mengandung($pesan, ['prospek karir', 'prospek kerja', 'karir lulusan']);
        $isAkademik = $this->mengandung($pesan, ['jadwal kuliah', 'kalender akademik', 'kurikulum', 'mata kuliah', 'akademik']);
        $isELearning = $this->mengandung($pesan, ['e-learning', 'elearning', 'belajar online', 'online learning']);
        $isMagang = $this->mengandung($pesan, ['magang', 'pkl', 'praktek kerja']);
        $isLaporan = $this->mengandung($pesan, ['laporan magang', 'format laporan']);
        $isSkripsi = $this->mengandung($pesan, ['skripsi', 'tugas akhir', 'ta', 'sidang']);
        $isEbook = $this->mengandung($pesan, ['e-book', 'ebook', 'e-library', 'elibrary', 'perpustakaan digital', 'perpustakaan online', 'buku referensi', 'download buku', 'unduh buku', 'cari buku']);
        $isPengumuman = $this->mengandung($pesan, ['pengumuman', 'informasi terbaru', 'info']);
        $isTracer = $this->mengandung($pesan, ['tracer studi', 'lacak alumni', 'survei alumni', 'penelusuran lulusan']);
        $isPenalaran = $this->mengandung($pesan, ['penalaran', 'minat bakat', 'ukm', 'organisasi', 'bakat']);
        $isProfilLulusan = $this->mengandung($pesan, ['profil lulusan', 'kemampuan lulusan', 'skill lulusan']);
        $isKontak = $this->mengandung($pesan, ['kontak', 'alamat', 'telepon', 'nomor', 'email', 'whatsapp', 'wa', 'hubungi']);
        $isSapaan = $this->mengandung($pesan, ['halo', 'hai', 'hi', 'assalamualaikum', 'selamat pagi', 'selamat siang', 'selamat sore', 'selamat malam']);
        $isTentangWebsite = $this->mengandung($pesan, ['website apa ini', 'web apa ini', 'tentang website', 'tentang web ini', 'info website', 'situs apa ini', 'tentang situs', 'web ini apa', 'website ini apa', 'fungsi website', 'guna website', 'kegunaan website', 'apa itu web', 'apa itu website']);

        // ── 1. Pendaftaran / PMB ──
        if ($isPendaftaran) {
            $link = $settings['pmb_link'] ?? $settings['portal_pmb'] ?? 'https://pmb.unisvet.ac.id/';
            return "Untuk pendaftaran mahasiswa baru {$namaProdi}, kamu bisa langsung buka portal PMB resmi:\n{$link}\n\nAda pilihan Kelas Reguler, Kelas Karyawan, dan Kelas Transfer/Alih Jenjang. Kalau butuh info lebih detail, silakan hubungi kami lewat WhatsApp Sekretariat ya!";
        }

        // ── 2. Program Kelas ──
        if ($isKelas) {
            $items = ClassProgram::limit(3)->get();
            if ($items->isNotEmpty()) {
                $list = $items->map(fn($i) => "• {$i->nama_program} ({$i->jenis_kelas})")->implode("\n");
                return "Kami menyediakan beberapa pilihan program kelas:\n\n{$list}\n\nSelengkapnya bisa dilihat di menu Program Kelas pada website ini.";
            }
            return "Kami menyediakan Kelas Reguler, Kelas Karyawan, dan Kelas Transfer/Alih Jenjang. Cek menu Program Kelas di website untuk detail lengkapnya ya!";
        }

        // ── 3. Dosen ──
        if ($isDosen) {
            $dosen = DosenProdi::orderBy('urutan')->limit(5)->get();
            if ($dosen->isNotEmpty()) {
                $list = $dosen->map(fn($d) => "• {$d->nama}" . ($d->jabatan ? " — {$d->jabatan}" : ''))->implode("\n");
                return "Berikut sebagian dosen pengampu {$namaProdi}:\n\n{$list}\n\nUntuk profil lengkap dan biodata tiap dosen (NIDN, keahlian, riset), cek beranda bagian \"Dosen Program Studi\".";
            }
            return "Data dosen pengampu bisa dilihat lengkap di beranda website ini pada bagian \"Dosen Program Studi\".";
        }

        // ── 4. Testimoni Alumni ──
        if ($isTestimoniAlumni) {
            $alumni = Practitioner::latest()->limit(5)->get();
            if ($alumni->isNotEmpty()) {
                $list = $alumni->map(fn($p) => "• {$p->nama}" . ($p->instansi ? " — {$p->instansi}" : ''))->implode("\n");
                return "Berikut testimoni alumni {$namaProdi} yang sudah berkarya:\n\n{$list}\n\nSelengkapnya di menu Profil → Testimoni Alumni.";
            }
            return "Testimoni alumni bisa dilihat di menu Profil → Testimoni Alumni.";
        }

        // ── 4b. Praktisi Industri ──
        if ($isPraktisi) {
            $praktisi = PraktisiIndustri::orderBy('urutan')->limit(5)->get();
            if ($praktisi->isNotEmpty()) {
                $list = $praktisi->map(fn($p) => "• {$p->nama}" . ($p->instansi ? " — {$p->instansi}" : ''))->implode("\n");
                return "Praktisi industri yang terlibat dalam pengajaran di {$namaProdi}:\n\n{$list}\n\nSelengkapnya di menu Profil → Praktisi Industri.";
            }
            return "Informasi praktisi industri bisa dilihat di menu Profil → Praktisi Industri.";
        }

        // ── 5. Berita & Kegiatan ──
        if ($isBerita) {
            $berita = BeritaProdi::orderByDesc('tanggal')->limit(3)->get();
            if ($berita->isNotEmpty()) {
                $list = $berita->map(fn($b) => "• {$b->judul}")->implode("\n");
                return "Berita & kegiatan terbaru dari {$namaProdi}:\n\n{$list}\n\nSelengkapnya di menu Berita & Kegiatan pada website ini.";
            }
            return "Belum ada berita terbaru saat ini. Silakan cek menu Berita & Kegiatan secara berkala ya!";
        }

        // ── 6. Prestasi ──
        if ($isPrestasi) {
            $prestasi = BeritaProdi::where('kategori', 'prestasi')->orderByDesc('tanggal')->limit(3)->get();
            if ($prestasi->isNotEmpty()) {
                $list = $prestasi->map(fn($p) => "• {$p->judul}")->implode("\n");
                return "Torehan prestasi mahasiswa {$namaProdi}:\n\n{$list}\n\nSelengkapnya di menu Berita & Kegiatan → kategori Prestasi.";
            }
            return "Informasi prestasi mahasiswa bisa dilihat di menu Berita & Kegiatan, kategori Prestasi.";
        }

        // ── 7. Kerjasama / Mitra ──
        if ($isKerjasama) {
            $mitra = BeritaProdi::where('kategori', 'kerjasama')->orderByDesc('tanggal')->limit(3)->get();
            if ($mitra->isNotEmpty()) {
                $list = $mitra->map(fn($m) => "• {$m->judul}")->implode("\n");
                return "Kemitraan {$namaProdi} dengan dunia industri:\n\n{$list}\n\nSelengkapnya di menu Berita & Kegiatan → kategori Kerja Sama.";
            }
            return "Informasi kerjasama dan mitra industri bisa dilihat di menu Berita & Kegiatan, kategori Kerja Sama.";
        }

        // ── 8. Fasilitas / Lab ──
        if ($isFasilitas) {
            $fasilitas = Facility::limit(5)->get();
            if ($fasilitas->isNotEmpty()) {
                $list = $fasilitas->map(fn($f) => "• {$f->nama}")->implode("\n");
                return "Fasilitas laboratorium yang tersedia di {$namaProdi}:\n\n{$list}\n\nSelengkapnya di menu Fasilitas pada website ini.";
            }
            return "Informasi fasilitas & laboratorium bisa dilihat di menu Fasilitas pada website ini.";
        }

        // ── 9. LSP (Lembaga Sertifikasi Profesi) ──
        if ($isLsp) {
            $lsp = Lsp::first();
            if ($lsp && $lsp->deskripsi) {
                $reply = "Lembaga Sertifikasi Profesi (LSP) {$namaProdi}:\n\n{$lsp->deskripsi}";
                if ($lsp->link_url) {
                    $reply .= "\n\n🔗 Informasi selengkapnya: {$lsp->link_url}";
                }
                return $reply;
            }
            return "Informasi LSP {$namaProdi} bisa dilihat di menu Fasilitas → Lembaga Sertifikasi Profesi.";
        }

        // ── 10. Visi Misi ──
        if ($isVisiMisi) {
            $vm = VisiMisi::first();
            if ($vm && $vm->visi) {
                $reply = "Visi {$namaProdi}:\n\"{$vm->visi}\"\n\n";
                if ($vm->misi) {
                    $misiLines = explode("\n", $vm->misi);
                    $formattedMisi = collect($misiLines)->map(fn($m) => "• " . trim($m))->implode("\n");
                    $reply .= "Misi:\n{$formattedMisi}";
                }
                return $reply . "\n\nUntuk Tujuan dan PEO (Program Educational Objectives) lengkap, cek menu Profil → Visi, Misi & Tujuan.";
            }
            return "Visi, Misi, dan Tujuan {$namaProdi} bisa dilihat di beranda atau menu Profil.";
        }

        // ── 11. Sejarah ──
        if ($isSejarah) {
            $milestones = SejarahMilestone::orderBy('tahun')->get();
            if ($milestones->isNotEmpty()) {
                $list = $milestones->map(fn($s) => "• {$s->tahun} — {$s->judul}")->implode("\n");
                return "Sejarah pendirian & perkembangan {$namaProdi}:\n\n{$list}\n\nSelengkapnya di bagian \"Sejarah Pendirian & Perkembangan\" pada beranda.";
            }
            return "Sejarah pendirian {$namaProdi} bisa dilihat di beranda bagian \"Sejarah Pendirian & Perkembangan\".";
        }

        // ── 12. Beasiswa ──
        if ($isBeasiswa) {
            $beasiswa = InformasiBeasiswa::orderBy('urutan')->limit(5)->get();
            if ($beasiswa->isNotEmpty()) {
                $list = $beasiswa->map(fn($b) => "• {$b->judul}")->implode("\n");
                return "Informasi beasiswa yang tersedia:\n\n{$list}\n\nSelengkapnya di menu Kemahasiswaan → Informasi Beasiswa.";
            }
            return "Informasi lengkap seputar beasiswa (termasuk KIP Kuliah) bisa dilihat di menu Kemahasiswaan → Informasi Beasiswa.";
        }

        // ── 13. Lowongan Pekerjaan ──
        if ($isLowonganKerja) {
            $lowongan = LowonganPekerjaan::orderBy('urutan')->limit(5)->get();
            if ($lowongan->isNotEmpty()) {
                $list = $lowongan->map(fn($l) => "• {$l->judul}")->implode("\n");
                return "Lowongan pekerjaan terbaru:\n\n{$list}\n\nSelengkapnya di menu Kemahasiswaan → Lowongan Pekerjaan.";
            }
            return "Info lowongan pekerjaan terkini bisa dilihat di menu Kemahasiswaan → Lowongan Pekerjaan.";
        }

        // ── 14. Prospek Karir ──
        if ($isProspekKarir) {
            $prospek = [];
            for ($i = 1; $i <= 4; $i++) {
                $title = $settings["prospek{$i}_title"] ?? null;
                $desc = $settings["prospek{$i}_desc"] ?? null;
                if ($title) {
                    $prospek[] = "• {$title}" . ($desc ? ": {$desc}" : '');
                }
            }
            if (count($prospek) > 0) {
                return "Prospek karir lulusan {$namaProdi}:\n\n" . implode("\n", $prospek) . "\n\nSelengkapnya di bagian \"Prospek Karir Lulusan\" pada beranda.";
            }
            return "Lulusan {$namaProdi} disiapkan untuk berbagai peran di industri teknologi. Cek beranda bagian \"Prospek Karir Lulusan\" dan menu Kemahasiswaan → Lowongan Pekerjaan.";
        }

        // ── 15. Akademik (kurikulum, e-learning, jadwal, dll) ──
        if ($isAkademik) {
            $kurikulum = Kurikulum::first();
            $eLearning = ELearning::first();
            $jadwalKuliah = JadwalKuliah::first();
            $panduan = PanduanMagang::first();
            $formatLaporan = FormatLaporanMagang::first();
            $lines = ["Informasi akademik {$namaProdi}:"];
            if ($kurikulum && $kurikulum->deskripsi) $lines[] = "\n📚 Kurikulum: {$kurikulum->deskripsi}";
            if ($eLearning && $eLearning->deskripsi) $lines[] = "\n💻 E-Learning: {$eLearning->deskripsi}" . ($eLearning->link_url ? " ({$eLearning->link_url})" : '');
            if ($jadwalKuliah && $jadwalKuliah->deskripsi) $lines[] = "\n📅 Jadwal Kuliah: {$jadwalKuliah->deskripsi}";
            if ($panduan && $panduan->deskripsi) $lines[] = "\n📘 Panduan Magang: {$panduan->deskripsi}";
            if ($formatLaporan && $formatLaporan->deskripsi) $lines[] = "\n📄 Format Laporan Magang: {$formatLaporan->deskripsi}";
            $lines[] = "\nSelengkapnya di menu Akademik pada website ini.";
            return implode('', $lines);
        }

        // ── 16. E-Learning ──
        if ($isELearning) {
            $eLearning = ELearning::first();
            if ($eLearning && $eLearning->deskripsi) {
                $reply = "E-Learning {$namaProdi}:\n{$eLearning->deskripsi}";
                if ($eLearning->link_url) {
                    $reply .= "\n\n🔗 Akses E-Learning: {$eLearning->link_url}";
                }
                return $reply;
            }
            return "Informasi E-Learning {$namaProdi} bisa dilihat di menu Akademik → E-Learning.";
        }

        // ── 17. Magang / PKL ──
        if ($isMagang) {
            $panduan = PanduanMagang::first();
            if ($panduan && $panduan->deskripsi) {
                return "Panduan Magang:\n{$panduan->deskripsi}\n\nSelengkapnya di menu Akademik → Panduan Magang.";
            }
            return "Informasi Panduan Magang bisa dilihat di menu Akademik pada website ini.";
        }

        // ── 19. Format Laporan Magang ──
        if ($isLaporan) {
            $format = FormatLaporanMagang::first();
            if ($format && $format->deskripsi) {
                return "Format Laporan Magang:\n{$format->deskripsi}\n\nSelengkapnya di menu Akademik → Format Laporan Magang.";
            }
            return "Informasi Format Laporan Magang bisa dilihat di menu Akademik pada website ini.";
        }

        // ── 20. Skripsi / Tugas Akhir ──
        if ($isSkripsi) {
            $skripsi = SkripsiTugasAkhir::orderBy('urutan')->limit(5)->get();
            if ($skripsi->isNotEmpty()) {
                $list = $skripsi->map(fn($s) => "• {$s->judul}" . ($s->deskripsi ? ": {$s->deskripsi}" : ''))->implode("\n");
                return "Informasi Skripsi / Tugas Akhir:\n\n{$list}\n\nSelengkapnya di menu Akademik → Skripsi / Tugas Akhir.";
            }
            return "Informasi Skripsi / Tugas Akhir bisa dilihat di menu Akademik pada website ini.";
        }

        // ── 20b. E-Library ──
        if ($isEbook) {
            $total = Ebook::count();
            if ($total > 0) {
                $contoh = Ebook::inRandomOrder()->limit(3)->get();
                $list = $contoh->map(fn($e) => "• {$e->judul}" . ($e->penulis ? " — {$e->penulis}" : ''))->implode("\n");
                $kategoriCount = Ebook::distinct('kategori')->count('kategori');
                return "E-Library {$namaProdi} punya {$total} koleksi e-book dari {$kategoriCount} kategori (Kecerdasan Buatan, Software Engineering, Sistem Operasi & Jaringan, dan lainnya). Contohnya:\n\n{$list}\n\nBisa dicari & difilter per kategori di menu Akademik → E-Library.";
            }
            return "E-Library bisa diakses di menu Akademik → E-Library untuk koleksi e-book dan referensi digital.";
        }

        // ── 21. Pengumuman ──
        if ($isPengumuman) {
            $pengumuman = PengumumanLain::orderBy('urutan')->limit(5)->get();
            $kalender = KalenderAkademik::first();
            $wisuda = Wisuda::first();
            $sidang = JadwalSidangSkripsi::first();
            $semesterAntara = SemesterAntara::first();
            $utsUas = JadwalUtsUas::first();
            $lines = ["Pengumuman & informasi terkini {$namaProdi}:"];
            if ($kalender && $kalender->deskripsi) $lines[] = "\n📅 Kalender Akademik: {$kalender->deskripsi}";
            if ($wisuda && $wisuda->deskripsi) $lines[] = "\n🎓 Wisuda: {$wisuda->deskripsi}";
            if ($sidang && $sidang->deskripsi) $lines[] = "\n📋 Jadwal Sidang Skripsi: {$sidang->deskripsi}";
            if ($semesterAntara && $semesterAntara->deskripsi) $lines[] = "\n📝 Semester Antara: {$semesterAntara->deskripsi}";
            if ($utsUas && $utsUas->deskripsi) $lines[] = "\n📊 Jadwal UTS & UAS: {$utsUas->deskripsi}";
            if ($pengumuman->isNotEmpty()) {
                $lines[] = "\n\nPengumuman lain:";
                foreach ($pengumuman as $p) {
                    $lines[] = "• {$p->judul}" . ($p->deskripsi ? ": {$p->deskripsi}" : '');
                }
            }
            $lines[] = "\n\nSelengkapnya di menu Pengumuman pada website ini.";
            return implode('', $lines);
        }

        // ── 22. Tracer Studi / Alumni ──
        if ($isTracer) {
            $tracer = TracerStudi::first();
            if ($tracer && $tracer->deskripsi) {
                $reply = "Tracer Studi {$namaProdi}:\n{$tracer->deskripsi}";
                if ($tracer->link_url) {
                    $reply .= "\n\n🔗 Link: {$tracer->link_url}";
                }
                return $reply;
            }
            return "Informasi Tracer Studi bisa dilihat di menu Kemahasiswaan → Tracer Studi.";
        }

        // ── 23. Penalaran, Minat & Bakat ──
        if ($isPenalaran) {
            $penalaran = PenalaranMinatBakat::orderBy('urutan')->limit(5)->get();
            if ($penalaran->isNotEmpty()) {
                $list = $penalaran->map(fn($p) => "• {$p->judul}" . ($p->deskripsi ? ": {$p->deskripsi}" : ''))->implode("\n");
                return "Kegiatan Penalaran, Minat & Bakat:\n\n{$list}\n\nSelengkapnya di menu Kemahasiswaan → Penalaran, Minat & Bakat.";
            }
            return "Informasi kegiatan Penalaran, Minat & Bakat bisa dilihat di menu Kemahasiswaan.";
        }

        // ── 24. Profil Lulusan ──
        if ($isProfilLulusan) {
            $profiles = GraduateProfile::orderBy('urutan')->limit(5)->get();
            if ($profiles->isNotEmpty()) {
                $list = $profiles->map(fn($p) => "• {$p->judul}" . ($p->deskripsi ? ": {$p->deskripsi}" : ''))->implode("\n");
                return "Profil Lulusan {$namaProdi}:\n\n{$list}\n\nSelengkapnya di menu Profil → Profil Lulusan.";
            }

            $pilar = [];
            for ($i = 1; $i <= 3; $i++) {
                $title = $settings["pilar{$i}_title"] ?? null;
                if ($title) {
                    $pilar[] = "• {$title}";
                }
            }
            if (count($pilar) > 0) {
                return "Bidang kompetensi & kemampuan lulusan {$namaProdi}:\n\n" . implode("\n", $pilar) . "\n\nSelengkapnya di beranda bagian \"Bidang Kompetensi\", dan lihat juga kisah nyata alumni di menu Profil → Testimoni Alumni.";
            }

            return "Kemampuan lulusan {$namaProdi} bisa dilihat di beranda bagian \"Bidang Kompetensi\" dan \"Prospek Karir Lulusan\", atau lihat kisah nyata alumni di menu Profil → Testimoni Alumni.";
        }

        // ── 26. Kontak ──
        if ($isKontak) {
            $alamat = $settings['alamat'] ?? null;
            $telepon = $settings['telepon'] ?? null;
            $email = $settings['email'] ?? null;
            $maps = MapsKontak::first();
            $lines = [];
            if ($alamat) $lines[] = "📍 Alamat: {$alamat}";
            if ($telepon) $lines[] = "📞 Telepon: {$telepon}";
            if ($email) $lines[] = "✉️ Email: {$email}";
            if ($maps && $maps->kaprodi) $lines[] = "👤 Kaprodi: {$maps->kaprodi}";
            if (count($lines) > 0) {
                return "Berikut kontak resmi {$namaProdi}:\n\n" . implode("\n", $lines);
            }
            return "Untuk informasi kontak, silakan cek bagian footer pada website ini.";
        }

        // ── 27. Tentang Website Ini ──
        if ($isTentangWebsite) {
            $webUniv = $settings['web_universitas'] ?? 'https://unisvet.ac.id/';
            return "Ini adalah website resmi **{$namaProdi}** — {$namaKampus}.\n\nWebsite ini menyajikan informasi lengkap seputar program studi, mulai dari:\n\n📌 Profil Prodi (Visi Misi, Sejarah, Dosen, Testimoni Alumni, Praktisi Industri)\n📌 Akademik (Kurikulum, E-Learning, Jadwal Kuliah, Panduan Magang, Skripsi, E-Library)\n📌 Fasilitas & LSP\n📌 Kemahasiswaan (Beasiswa, Lowongan Pekerjaan, Tracer Studi, Penalaran/Bakat)\n📌 Berita & Kegiatan Terbaru\n📌 Prestasi & Kerjasama\n📌 Program Kelas (Reguler, Karyawan, Transfer)\n📌 Pengumuman Akademik\n\n💡 Kamu juga bisa mendaftar langsung melalui portal PMB atau menghubungi Sekretariat untuk informasi lebih lanjut.\n\n🌐 Website universitas: {$webUniv}";
        }

        // ── 28. Sapaan ──
        if ($isSapaan) {
            return "Halo! 👋 Saya asisten virtual {$namaProdi} {$namaKampus}. Ada yang bisa saya bantu seputar pendaftaran, dosen, kurikulum, fasilitas, beasiswa, atau prospek karir?";
        }

        // ── Fallback ──
        $telepon = $settings['telepon'] ?? null;
        $fallback = "Maaf, saya belum memahami pertanyaan itu. 🙏\n\nCoba tanyakan seputar:\n• Pendaftaran PMB\n• Dosen, Testimoni Alumni & Praktisi Industri\n• Berita, Prestasi, Kerjasama\n• Fasilitas & LSP\n• Akademik (Kurikulum, E-Learning, Jadwal, dll)\n• E-Library (koleksi e-book)\n• Beasiswa & Lowongan Kerja\n• Pengumuman (Kalender, Wisuda, Sidang)\n• Kontak & Alamat";
        if ($telepon) {
            $fallback .= "\n\nAtau hubungi langsung Sekretariat via WhatsApp: {$telepon}";
        }
        return $fallback;
    }

    protected function mengandung(string $pesan, array $katakunci): bool
    {
        foreach ($katakunci as $kata) {
            if (str_contains($pesan, $kata)) {
                return true;
            }
        }
        return false;
    }
}
