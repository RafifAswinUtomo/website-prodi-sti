# 🌐 Website Program Studi Sistem & Teknologi Informasi (STI)

**Universitas IVET Semarang**

Website resmi Program Studi Sistem dan Teknologi Informasi (STI) yang dibangun dengan **Laravel 12**, **Tailwind CSS**, **Alpine.js**, dan **Vite**.

---

## ✨ Fitur Utama

### 🏠 Beranda (Home)

- **Hero Slider multi-slide** dengan animasi kenburns & transisi.
- **Panel Brosur PMB** interaktif (flip + lightbox + tombol unduh per halaman).
- **Statistik Ringkas** (akreditasi, mahasiswa, mitra, alumni).
- **Sambutan Rektor & Kaprodi**.
- **Pilar Kompetensi Keilmuan** (3 bidang keilmuan).
- **Prospek Karir Lulusan** (4 peran).
- **Sejarah Pendirian** (timeline interaktif per tahun + poin legalitas).
- **Visi, Misi & Tujuan (PEO)**.
- **Dosen Program Studi** (kartu + modal biodata lengkap).
- **Berita & Kegiatan Prodi** (cuplikan 3 terbaru + modal detail).
- **Kanal Media Sosial** (Instagram & TikTok).
- **Tentang Program Studi**, **Testimoni Alumni**, **Maps & Kontak**.

### 🧭 Menu Publik

| Menu                  | Halaman                                                                                          |
| --------------------- | ------------------------------------------------------------------------------------------------ |
| **Profil**            | Profil Lulusan, Praktisi Industri                                                                |
| **Akademik**          | Kurikulum, E-learning, Jadwal Kuliah, Panduan Magang, Format Laporan Magang, Skripsi/Tugas Akhir |
| **Fasilitas**         | Laboratorium, Lembaga Sertifikasi Profesi (LSP)                                                  |
| **Kemahasiswaan**     | Lowongan Pekerjaan, Tracer Studi, Penalaran–Minat–Bakat, Informasi Beasiswa                      |
| **Berita & Kegiatan** | Kegiatan/Event, Prestasi, Kerja Sama                                                             |
| **Program Kelas**     | Kelas Reguler, Kelas Karyawan, Kelas Transfer/Alih Jenjang                                       |
| **Pengumuman**        | Kalender Akademik, Wisuda, Jadwal Sidang Skripsi, Semester Antara, Jadwal UTS/UAS, Lain-lain     |

### 🤖 Chatbot Asisten Virtual

Widget chatbot mengambang di semua halaman publik dengan **±28 kategori jawaban** yang terhubung langsung ke data database (pendaftaran, dosen, kurikulum, fasilitas, beasiswa, pengumuman, dll). Endpoint dilindungi **rate limiting** (10 request/menit/IP).

### 🔐 Panel Admin

Area admin berbasis Blade dengan menu ber-grup:

- **Beranda**: Slider, Statistik, Sambutan, Bidang Kompetensi, Prospek Karir, Sejarah, Dosen, Berita & Kegiatan, Medsos, Testimoni, Maps & Kontak, Visi-Misi.
- **Profil**: Profil Lulusan, Praktisi Industri.
- **Akademik**: Kurikulum, E-learning, Jadwal Kuliah, Panduan Magang, Format Laporan Magang, Skripsi/Tugas Akhir.
- **Fasilitas**: Kelola Fasilitas (Lab), LSP.
- **Kemahasiswaan**: Lowongan Pekerjaan, Tracer Studi, Penalaran–Minat–Bakat, Beasiswa.
- **Program Kelas**: Kelas Reguler, Karyawan, Transfer.
- **Pengumuman**: Kalender Akademik, Wisuda, Jadwal Sidang Skripsi, Semester Antara, UTS/UAS, Lain-lain.
- **Pengaturan**: Pengaturan Situs.

Dilindungi middleware `admin` (hanya user dengan role `admin`).

> Panel admin dibangun sepenuhnya dengan **Blade custom** — tidak menggunakan Filament/Livewire (dependency sudah dibersihkan).

---

## 🛠️ Teknologi

| Komponen         | Versi                                       |
| ---------------- | ------------------------------------------- |
| PHP              | ^8.2                                        |
| Laravel          | ^12.0                                       |
| Blade Components | Panel admin & publik (no Filament/Livewire) |
| Tailwind CSS     | ^4.0 (via @tailwindcss/vite)                |
| Alpine.js        | ^3.4                                        |
| Vite             | ^7.0                                        |
| Cache            | Database (tabel `cache` & `cache_locks`)    |

---

## ⚡ Optimasi Performa

Proyek ini telah melalui optimasi performa menyeluruh — detail lengkap di [`OPTIMASI_PERFORMA.md`](OPTIMASI_PERFORMA.md). Ringkasannya:

- **Cache berlapis**: settings & data home di-cache 60 menit (`app/Support/SettingsCache.php`).
- **Auto-invalidasi cache**: trait `ClearsHomeCache` pada model yang dipakai di beranda.
- **Pengunjung dioptimalkan**: penulisan DB dibatasi (1x/5 menit/sesi) + `Cache::lock` anti race-condition.
- **Gzip + browser caching** via `.htaccess` (Apache).
- **Lazy-load gambar** di bawah fold.
- **Google Fonts non-blocking** (`display=swap`).

### Saat Deploy ke Produksi

```bash
# Hapus keraguan cache lama
php artisan optimize:clear

# Aktifkan semua cache
php artisan optimize
php artisan view:cache

# Build aset produksi
npm run build
```

---

## 🚀 Instalasi (Lokal)

```bash
# 1. Install dependency
composer install
npm install

# 2. Siapkan environment
cp .env.example .env
php artisan key:generate

# 3. Setup database (sesuaikan .env) lalu migrasi
php artisan migrate --seed

# 4. Saat pertama kali, buat pengguna & tautkan storage
php artisan storage:link
php artisan tinker --execute="App\Models\User::create(['name'=>'Admin','email'=>'admin@sti.test','password'=>bcrypt('password'),'role'=>'admin']);"

# 5. Jalankan development
composer run dev   # serve + queue + pail + vite sekaligus
# atau manual:
php artisan serve
npm run dev
```

Buka `http://localhost:8000` untuk website publik dan `/dashboard` untuk area admin.

> ⚠️ Role user di kolom `role` tabel `users` harus bernilai `admin` untuk bisa mengakses panel admin.

---

## 📁 Struktur Penting

```
app/
├── Http/Controllers/          # Controller admin & publik
│   ├── Admin/                 # CRUD panel admin
│   └── ChatbotController.php  # Logika asisten virtual
├── Http/Middleware/
│   ├── EnsureUserIsAdmin.php  # Guard role admin
│   └── TrackVisitors.php      # Statistik pengunjung
├── Models/                    # Semua model Eloquent
│   └── Concerns/
│       └── ClearsHomeCache.php
├── Providers/
│   └── AppServiceProvider.php # View composer (settings cache)
└── Support/
    └── SettingsCache.php      # Helper cache terpusat

database/migrations/           # Semua skema tabel
resources/views/
├── admin/                     # View panel admin
├── site/                      # View website publik
└── components/                # Nav, footer, chatbot, layout, UI
routes/web.php                 # Semua route publik & admin
public/.htaccess               # Gzip + browser caching (Apache)
```

---

## 🧹 Perawatan

- **Cache otomatis bersih** saat data diubah lewat admin (trait `ClearsHomeCache`).
- **Jika menambah model baru** yang dipakai di beranda, tambahkan `use App\Models\Concerns\ClearsHomeCache;` pada model tersebut.
- **Bersihkan cache manual** bila perlu:
    ```bash
    php artisan optimize:clear
    php artisan view:clear
    ```

---

## 📄 Dokumentasi Terkait

- [`OPTIMASI_PERFORMA.md`](OPTIMASI_PERFORMA.md) — detail seluruh proses optimasi performa.
- [`TODO.md`](TODO.md) — riwayat pembersihan fitur yang dihapus (Galeri, Microteaching, Dosen Pengampu).

---

## 📝 Catatan Teknis

1. **Cache store** memakai `database` (bukan `array`) karena `Cache::lock` membutuhkan store non-distributed.
2. **`.htaccess`** (gzip/expires) hanya efektif di server **Apache**. Jika pakai Nginx, sesuaikan konfigurasinya.
3. **Google Fonts** dimuat dari server eksternal — bisa di-self-host untuk mode offline penuh.
4. **Filament/Livewire** sudah **dihapus** dari `composer.json` & vendor — seluruh panel admin memakai Blade custom. Aset publik `public/{css,js,fonts}/filament` juga sudah dibersihkan.
5. Endpoint `POST /chatbot` dilindungi **rate limiting** `10,1` (10 request/menit per IP).

---

## 🛡️ Keamanan

- Middleware `admin` melindungi seluruh rute `/admin/*`.
- Otentikasi Laravel Breeze (login, register, reset password).
- Rate limiting pada endpoint chatbot.
- Validasi input pada controller.

---

## 📄 Lisensi

Proyek ini dikembangkan untuk keperluan Program Studi Sistem dan Teknologi Informasi, Universitas IVET Semarang.
