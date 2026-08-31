# 📚 Dokumentasi Website Program Studi Sistem & Teknologi Informasi (STI)

**Universitas IVET Semarang**

Dokumen ini menjelaskan secara lengkap tentang **website program studi**, mulai dari gambaran umum, teknologi, fitur-fitur, cara penggunaan, hingga peta situs (site map). Panduan ini ditujukan untuk **pengunjung umum**, **calon mahasiswa (PMB)**, maupun **admin pengelola konten**.

---

## 📑 Daftar Isi

1. [Gambaran Umum](#1-gambaran-umum)
2. [Teknologi yang Digunakan](#2-teknologi-yang-digunakan)
3. [Cara Akses Website](#3-cara-akses-website)
4. [Peta Situs (Site Map)](#4-peta-situs-site-map)
5. [Fitur Halaman Publik](#5-fitur-halaman-publik)
6. [Fitur Chatbot Asisten Virtual](#6-fitur-chatbot-asisten-virtual)
7. [Panel Admin](#7-panel-admin)
8. [Cara Menggunakan untuk Pengunjung](#8-cara-menggunakan-untuk-pengunjung)
9. [Cara Menggunakan untuk Admin](#9-cara-menggunakan-untuk-admin)
10. [Cara Install & Menjalankan](#10-cara-install--menjalankan)
11. [Optimasi Performa](#11-optimasi-performa)
12. [Struktur Proyek](#12-struktur-proyek)
13. [FAQ](#13-faq)

---

## 1. Gambaran Umum

Website ini adalah **situs resmi Program Studi S1 Sistem dan Teknologi Informasi (STI)** di bawah **Universitas IVET Semarang**. Website dirancang untuk menjadi **pusat informasi satu pintu** bagi:

- **Calon mahasiswa** — melihat profil prodi, prospek karir, program kelas, dan mendaftar PMB.
- **Mahasiswa aktif** — mengakses informasi akademik, jadwal, e-learning, pengumuman, dan e-library.
- **Alumni** — melihat tracer studi, lowongan pekerjaan, dan berita prodi.
- **Masyarakat umum** — melihat berita, kegiatan, prestasi, dan kontak prodi.

Website terdiri dari **dua area utama**:

| Area               | Fungsi                                                                           |
| ------------------ | -------------------------------------------------------------------------------- |
| **Halaman Publik** | Dapat diakses siapa saja tanpa login. Menampilkan seluruh informasi prodi.       |
| **Panel Admin**    | Khusus admin (login dengan role `admin`) untuk mengelola seluruh konten website. |

---

## 2. Teknologi yang Digunakan

| Komponen             | Versi        | Keterangan                                                |
| -------------------- | ------------ | --------------------------------------------------------- |
| **PHP**              | ^8.2         | Bahasa pemrograman backend                                |
| **Laravel**          | ^12.0        | Framework PHP utama                                       |
| **Blade Components** | —            | Template engine (admin & publik, tanpa Filament/Livewire) |
| **Tailwind CSS**     | ^4.0         | Framework CSS untuk styling                               |
| **Alpine.js**        | ^3.4         | Interaktivitas frontend (slider, modal, dropdown)         |
| **Vite**             | ^7.0         | Build tool untuk aset                                     |
| **Database**         | MySQL/SQLite | Menyimpan seluruh data konten                             |
| **Cache**            | Database     | Store cache (`cache` & `cache_locks`)                     |

> **Catatan:** Panel admin dibangun sepenuhnya dengan **Blade custom**, tidak menggunakan Filament atau Livewire.

---

## 3. Cara Akses Website

### Lokal (Development)

```bash
# Jalankan server Laravel
php artisan serve
npm run dev
```

Buka **http://localhost:8000** untuk halaman publik, dan **http://localhost:8000/dashboard** untuk admin.

### Produksi

Website diakses melalui domain resmi kampus/prodi. Halaman publik dapat diakses langsung tanpa login.

---

## 4. Peta Situs (Site Map)

Diagram berikut menunjukkan struktur lengkap navigasi website.

```
┌────────────────────────────────────────────────────────────────────────────┐
│                              WEBSITE PRODI STI                              │
└────────────────────────────────────────────────────────────────────────────┘
        │
        ▼
═══════════════════ H A L A M A N   P U B L I K ═══════════════════
│
├─ 🏠 BERANDA (/)  ────────────────────────────────────────────────────────┐
│   ├─ Hero Slider (multi-slide)                                          │
│   ├─ Brosur PMB (flip + lightbox + unduh)                              │
│   ├─ Statistik Ringkas (akreditasi, mahasiswa, mitra, alumni)          │
│   ├─ Sambutan Rektor & Kaprodi                                         │
│   ├─ Bidang Kompetensi Keilmuan (3 pilar)                              │
│   ├─ Prospek Karir Lulusan (4 peran)                                   │
│   ├─ Sejarah Pendirian (timeline interaktif)                           │
│   ├─ Visi, Misi & Tujuan (PEO)                                         │
│   ├─ Dosen Program Studi (kartu + modal biodata)                       │
│   ├─ Berita & Kegiatan Prodi (3 terbaru + modal detail)                │
│   ├─ Kanal Media Sosial (Instagram & TikTok)                           │
│   └─ Maps & Kontak                                                     │
└─────────────────────────────────────────────────────────────────────────┘
│
├─ 👤 PROFIL
│   ├─ Testimoni Alumni          → /testimoni-alumni
│   ├─ Praktisi Industri         → /praktisi-industri
│   └─ (Profil Lulusan, Visi Misi via slug)
│
├─ 🎓 AKADEMIK
│   ├─ Kurikulum                 → /akademik/kurikulum
│   ├─ E-Library                 → /akademik/e-library
│   ├─ E-learning                → /akademik/e-learning
│   ├─ Jadwal Kuliah             → /akademik/jadwal-kuliah
│   ├─ Panduan Magang            → /akademik/panduan-magang
│   ├─ Format Laporan Magang     → /akademik/format-laporan-magang
│   ├─ Skripsi/Tugas Akhir       → /akademik/skripsi-tugas-akhir
│   └─ Repository STI            → (link eksternal)
│
├─ 🏢 FASILITAS
│   ├─ Laboratorium              → /fasilitas (kategori laboratorium)
│   └─ LSP (Lembaga Sertifikasi) → /fasilitas/lsp
│
├─ 🎗️ KEMAHASISWAAN
│   ├─ Lowongan Pekerjaan        → /kemahasiswaan/lowongan-pekerjaan
│   ├─ Tracer Studi              → /kemahasiswaan/tracer-studi
│   ├─ Penalaran, Minat & Bakat  → /kemahasiswaan/penalaran-minat-bakat
│   └─ Informasi Beasiswa        → /kemahasiswaan/informasi-beasiswa
│
├─ 📰 BERITA & KEGIATAN          → /berita-kegiatan
│   ├─ Kegiatan / Event          → ?kategori=kegiatan
│   ├─ Prestasi                  → ?kategori=prestasi
│   └─ Kerja Sama                → ?kategori=kerjasama
│
├─ 🎯 PROGRAM KELAS
│   ├─ Kelas Reguler             → /program-kelas/reguler
│   ├─ Kelas Karyawan            → /program-kelas/karyawan
│   └─ Kelas Transfer/Alih Jenjang → /program-kelas/transfer
│
└─ 📢 PENGUMUMAN
    ├─ Kalender Akademik         → /pengumuman/kalender-akademik
    ├─ Wisuda                    → /pengumuman/wisuda
    ├─ Jadwal Sidang Skripsi     → /pengumuman/jadwal-sidang-skripsi
    ├─ Semester Antara           → /pengumuman/semester-antara
    ├─ Jadwal UTS dan UAS        → /pengumuman/jadwal-uts-uas
    └─ Lain-lain                 → /pengumuman/lain-lain

═══════════════════ P A N E L   A D M I N ═══════════════════
│
├─ 📊 DASHBOARD                  → /dashboard
│
├─ 🏠 GRUP BERANDA
│   ├─ Slider Beranda
│   ├─ Statistik Ringkas
│   ├─ Sambutan Pimpinan
│   ├─ Bidang Kompetensi
│   ├─ Prospek Karir Lulusan
│   ├─ Sejarah Pendirian
│   ├─ Dosen Program Studi
│   ├─ Berita & Kegiatan Prodi
│   ├─ Kanal Media Sosial
│   ├─ Maps & Kontak PMB
│   └─ Visi, Misi & Tujuan
│
├─ 👤 GRUP PROFIL
│   ├─ Testimoni Alumni
│   └─ Praktisi Industri
│
├─ 🎓 GRUP AKADEMIK
│   ├─ Kurikulum
│   ├─ E-learning
│   ├─ Jadwal Kuliah
│   ├─ Panduan Magang
│   ├─ Format Laporan Magang
│   ├─ Skripsi/Tugas Akhir
│   └─ E-Library
│
├─ 🏢 GRUP FASILITAS
│   ├─ Kelola Fasilitas (Laboratorium)
│   └─ LSP
│
├─ 🎗️ GRUP KEMAHASISWAAN
│   ├─ Lowongan Pekerjaan
│   ├─ Tracer Studi
│   ├─ Penalaran, Minat & Bakat
│   └─ Informasi Beasiswa
│
├─ 🎯 GRUP PROGRAM KELAS
│   ├─ Kelas Reguler
│   ├─ Kelas Karyawan
│   └─ Kelas Transfer
│
├─ 📢 GRUP PENGUMUMAN
│   ├─ Kalender Akademik
│   ├─ Wisuda
│   ├─ Jadwal Sidang Skripsi
│   ├─ Semester Antara
│   ├─ Jadwal UTS dan UAS
│   └─ Lain-lain
│
└─ ⚙️ GRUP PENGATURAN
    └─ Pengaturan Situs
```

---

## 5. Fitur Halaman Publik

### 5.1 Beranda

Beranda merupakan halaman utama yang menampilkan keseluruhan profil prodi dalam satu halaman (one-page landing):

| Fitur                     | Deskripsi                                                                                                               |
| ------------------------- | ----------------------------------------------------------------------------------------------------------------------- |
| **Hero Slider**           | Slide bergambar dengan animasi kenburns & transisi, judul, subjudul, dan tombol CTA.                                    |
| **Brosur PMB**            | Panel interaktif menampilkan brosur, bisa flip antar halaman, diperbesar (lightbox), dan diunduh per halaman.           |
| **Statistik Ringkas**     | 4 kartu statistik (Akreditasi, Mahasiswa, Mitra, Alumni).                                                               |
| **Sambutan Pimpinan**     | Sambutan Rektor dan Kaprodi dengan foto, nama, NIDN.                                                                    |
| **Bidang Kompetensi**     | 3 pilar keilmuan dengan daftar skill.                                                                                   |
| **Prospek Karir**         | 4 kartu peran karir lulusan.                                                                                            |
| **Sejarah Pendirian**     | Timeline interaktif per tahun dengan poin legalitas & capaian.                                                          |
| **Visi, Misi & Tujuan**   | Visi, Misi, dan PEO (Program Educational Objectives).                                                                   |
| **Dosen Program Studi**   | Kartu dosen yang bisa diklik untuk membuka modal biodata lengkap (NIDN, email, riwayat pendidikan, mata kuliah, riset). |
| **Berita & Kegiatan**     | 3 berita terbaru dengan modal detail.                                                                                   |
| **Kanal Media Sosial**    | Kartu Instagram & TikTok resmi STI & HIMASTI.                                                                           |
| **Maps & Kontak**         | Peta lokasi, kontak program studi, WhatsApp Kaprodi & PMB.                                                              |
| **Penghitung Pengunjung** | Menampilkan total pengunjung & jumlah online sekarang.                                                                  |

### 5.2 Profil

- **Testimoni Alumni** — Kisah & testimoni lulusan yang sudah bekerja.
- **Praktisi Industri** — Profil praktisi industri yang terlibat dalam pengajaran.

### 5.3 Akademik

- **Kurikulum** — Struktur kurikulum program studi.
- **E-Library** — Koleksi e-book digital. Mendukung **pencarian** (judul/penulis), **filter kategori**, **filter tahun**, pagination, tombol **Lihat** & **Unduh** per buku.
- **E-learning** — Informasi platform pembelajaran online.
- **Jadwal Kuliah** — Jadwal perkuliahan.
- **Panduan Magang** — Dokumen panduan magang.
- **Format Laporan Magang** — Template format laporan magang.
- **Skripsi/Tugas Akhir** — Informasi & daftar skripsi/tugas akhir.
- **Repository STI** — Link eksternal ke repository ilmiah.

### 5.4 Fasilitas

- **Laboratorium** — Daftar laboratorium yang tersedia (filter per kategori).
- **LSP** — Lembaga Sertifikasi Profesi beserta deskripsi & link.

### 5.5 Kemahasiswaan

- **Lowongan Pekerjaan** — Info lowongan kerja terbaru.
- **Tracer Studi** — Survei/lacak alumni.
- **Penalaran, Minat & Bakat** — Kegiatan UKM & pengembangan bakat.
- **Informasi Beasiswa** — Info beasiswa (termasuk KIP Kuliah).

### 5.6 Berita & Kegiatan

Halaman berita dengan **tombol toggle kategori**: Semua, Berita, Kegiatan/Event, Prestasi, Kerja Sama. Setiap berita menampilkan tanggal, kategori, ringkasan, dan bisa dibuka detailnya.

### 5.7 Program Kelas

- **Kelas Reguler** — Program kelas reguler.
- **Kelas Karyawan** — Program untuk karyawan.
- **Kelas Transfer/Alih Jenjang** — Program transfer.

### 5.8 Pengumuman

- **Kalender Akademik**, **Wisuda**, **Jadwal Sidang Skripsi**, **Semester Antara**, **Jadwal UTS/UAS** (dengan dokumen), dan **Lain-lain** (daftar pengumuman).

### 5.9 Navigasi Responsif

- **Desktop:** Navbar atas dengan dropdown hover.
- **Mobile:** Bottom tab bar dengan 5 tab (Beranda, Profil, Akademik, Info, Menu) yang membuka bottom sheet.

---

## 6. Fitur Chatbot Asisten Virtual

Chatbot mengambang tersedia di **semua halaman publik** (tombol bulat di pojok kanan bawah). Fitur:

- **±28 kategori jawaban** terhubung langsung ke data database.
- Contoh pertanyaan cepat: _Info pendaftaran PMB_, _Siapa saja dosennya?_, _Fasilitas lab apa saja?_, _Info beasiswa_, _Kontak sekretariat_.
- Dapat menjawab soal: pendaftaran, program kelas, dosen, testimoni alumni, praktisi industri, berita, prestasi, kerjasama, fasilitas/LSP, visi misi, sejarah, beasiswa, lowongan kerja, prospek karir, akademik, e-learning, magang, laporan magang, skripsi, e-library, pengumuman, tracer studi, penalaran, profil lulusan, kontak, dan info website.
- **Rate limiting** 10 request/menit per IP untuk mencegah penyalahgunaan.

---

## 7. Panel Admin

Panel admin hanya bisa diakses oleh user dengan **role `admin`**. Menu admin dikelompokkan dalam tab:

### Grup Beranda

| Menu                        | Fungsi                                                                                                   |
| --------------------------- | -------------------------------------------------------------------------------------------------------- |
| **Dashboard**               | Ringkasan statistik konten (slider, praktisi, fasilitas, program kelas, pengumuman, prestasi, kegiatan). |
| **Slider Beranda**          | Kelola slider (tambah/edit/hapus), aktifkan, atur urutan, judul, gambar, tombol.                         |
| **Statistik Ringkas**       | Edit 4 kartu statistik (label, nilai, subteks).                                                          |
| **Sambutan Pimpinan**       | Edit sambutan Rektor & Kaprodi (nama, jabatan, NIDN, foto, teks).                                        |
| **Bidang Kompetensi**       | Edit 3 pilar kompetensi (judul, deskripsi, skill, background).                                           |
| **Prospek Karir Lulusan**   | Edit 4 peran prospek karir.                                                                              |
| **Sejarah Pendirian**       | Kelola milestone sejarah (tahun, judul, deskripsi, poin, badge) + banner.                                |
| **Dosen Program Studi**     | CRUD data dosen (nama, NIDN, jabatan, foto, email, riwayat, mata kuliah, riset).                         |
| **Berita & Kegiatan Prodi** | CRUD berita (judul, kategori, gambar, tanggal, ringkasan, konten, urutan, tampil beranda) + banner.      |
| **Kanal Media Sosial**      | Kelola 4 kartu media sosial (handle, deskripsi, link).                                                   |
| **Maps & Kontak PMB**       | Atur peta (embed), nama kaprodi, WhatsApp kaprodi & PMB.                                                 |
| **Visi, Misi & Tujuan**     | Edit visi, misi, karakter, 3 PEO, banner.                                                                |

### Grup Profil

- **Testimoni Alumni** — CRUD testimoni lulusan.
- **Praktisi Industri** — CRUD praktisi industri.

### Grup Akademik

- **Kurikulum**, **E-learning**, **Jadwal Kuliah**, **Panduan Magang**, **Format Laporan Magang** (masing-masing 1 data, pola edit langsung).
- **Skripsi/Tugas Akhir** — CRUD.
- **E-Library** — CRUD e-book (judul, penulis, tahun, kategori, cover, file PDF, halaman, ukuran, urutan).

### Grup Fasilitas

- **Kelola Fasilitas (Laboratorium)** — CRUD fasilitas.
- **LSP** — Edit deskripsi & link LSP.

### Grup Kemahasiswaan

- **Lowongan Pekerjaan** — CRUD.
- **Tracer Studi** — Edit.
- **Penalaran, Minat & Bakat** — CRUD.
- **Informasi Beasiswa** — CRUD.

### Grup Program Kelas

- **Kelas Reguler**, **Kelas Karyawan**, **Kelas Transfer** (masing-masing edit langsung).

### Grup Pengumuman

- **Kalender Akademik**, **Wisuda**, **Jadwal Sidang Skripsi**, **Semester Antara**, **Jadwal UTS/UAS** (edit langsung), **Lain-lain** (CRUD).

### Grup Pengaturan

- **Pengaturan Situs** — Pengaturan global: logo, nama prodi, nama kampus, alamat, telepon, email, media sosial, hero (badge, background, link PMB, link repository), brosur PMB.

---

## 8. Cara Menggunakan untuk Pengunjung

### 8.1 Membuka Website

1. Buka URL website prodi (atau `http://localhost:8000` untuk lokal).
2. Halaman **Beranda** akan tampil. Jelajahi menu di **navbar atas** (desktop) atau **tab bar bawah** (mobile).

### 8.2 Menjelajahi Menu

- **Hover** (desktop) atau **klik** menu untuk membuka dropdown submenu.
- Klik submenu untuk membuka halaman yang diinginkan.

### 8.3 Menggunakan E-Library

1. Buka menu **Akademik → E-Library**.
2. Gunakan **kotak pencarian** untuk mencari judul/penulis.
3. Gunakan **dropdown tahun** dan **filter kategori** untuk mempersempit hasil.
4. Klik **Lihat** untuk membuka buku, atau **Unduh** untuk mengunduh PDF.

### 8.4 Menggunakan Chatbot

1. Klik tombol **bulat** di pojok kanan bawah.
2. Pilih **pertanyaan cepat** atau ketik pertanyaan sendiri.
3. Bot akan menjawab berdasarkan data website.

### 8.5 Melihat Berita & Kegiatan

1. Buka menu **Berita & Kegiatan**.
2. Gunakan **tombol toggle** untuk memfilter per kategori (Semua, Berita, Kegiatan, Prestasi, Kerja Sama).
3. Klik judul berita untuk membaca **detail** (modal).

### 8.6 Mendaftar PMB

1. Klik tombol **"Daftar Sekarang"** atau **"Informasi Pendaftaran"** di hero beranda.
2. Anda akan diarahkan ke **portal PMB** eksternal.
3. Atau klik tombol **"Informasi Pendaftaran PMB"** di tab Menu mobile.

### 8.7 Menghubungi Prodi

- Lihat bagian **Maps & Kontak** di beranda, atau scroll ke **footer**.
- Gunakan tombol **Chat WhatsApp Prodi** atau **Chat WhatsApp Kaprodi** untuk menghubungi langsung.

---

## 9. Cara Menggunakan untuk Admin

### 9.1 Login

1. Buka **http://localhost:8000/login** (atau `/dashboard`).
2. Masukkan email & password akun dengan **role `admin`**.
3. Setelah login, Anda akan diarahkan ke **Dashboard**.

### 9.2 Navigasi Panel Admin

- Gunakan **sidebar kiri** untuk menelusuri grup menu.
- Klik label grup untuk **expand/collapse** submenu.
- Setiap menu membuka halaman form untuk mengelola data.

### 9.3 Mengelola Konten (Pola CRUD)

- **Tambah** — Klik tombol "Tambah"/"Buat" lalu isi form & simpan.
- **Edit** — Klik tombol edit pada data, ubah, lalu simpan.
- **Hapus** — Klik tombol hapus pada data (hati-hati, data terhapus permanen).
- **Urutan** — Atur angka urutan untuk menentukan posisi tampil.

### 9.4 Menambah Dosen

Menu **Beranda → Dosen Program Studi**:

1. Klik "Tambah Dosen".
2. Isi nama, NIDN, jabatan, foto, email, ruang kerja, edukasi, keahlian, riwayat pendidikan, mata kuliah, riset.
3. Simpan. Dosen akan tampil di beranda.

### 9.5 Menambah Berita

Menu **Beranda → Berita & Kegiatan Prodi**:

1. Klik "Tambah Berita".
2. Isi judul, kategori (berita/kegiatan/prestasi/kerjasama), gambar, tanggal, ringkasan, konten.
3. Aktifkan **"Tampil di Beranda"** jika ingin muncul di beranda.
4. Simpan.

### 9.6 Menambah E-Book

Menu **Akademik → E-Library**:

1. Klik "Tambah E-Book".
2. Isi judul, penulis, tahun, kategori, cover, file PDF, halaman, urutan.
3. Simpan. Buku akan tampil di E-Library publik.

### 9.7 Mengubah Pengaturan Situs

Menu **Pengaturan → Pengaturan Situs**:

- Ubah logo, nama prodi, nama kampus, alamat, telepon, email, media sosial.
- Atur hero beranda (badge, background, link PMB, link repository).
- Unggah brosur PMB (maks 2 halaman) beserta caption.
- Klik **"Simpan Pengaturan"**.

### 9.8 Logout

Klik **"Log Out"** di bagian bawah sidebar.

---

## 10. Cara Install & Menjalankan

### Prasyarat

- PHP ^8.2
- Composer
- Node.js & npm
- MySQL / SQLite

### Langkah Instalasi Lokal

```bash
# 1. Install dependency
composer install
npm install

# 2. Siapkan environment
cp .env.example .env
php artisan key:generate

# 3. Setup database (sesuaikan .env) lalu migrasi
php artisan migrate --seed

# 4. Buat user admin & tautkan storage
php artisan storage:link
php artisan tinker --execute="App\Models\User::create(['name'=>'Admin','email'=>'admin@sti.test','password'=>bcrypt('password'),'role'=>'admin']);"

# 5. Jalankan development
composer run dev
# atau manual:
php artisan serve
npm run dev
```

### Yang Perlu Diperhatikan

- Buka `http://localhost:8000` untuk website publik.
- Buka `http://localhost:8000/dashboard` untuk area admin.
- Role user di kolom `role` tabel `users` harus `admin` untuk akses panel admin.

### Deploy Produksi

```bash
php artisan optimize:clear
php artisan optimize
php artisan view:cache
npm run build
```

---

## 11. Optimasi Performa

Proyek telah dioptimasi untuk kecepatan akses (detail di `OPTIMASI_PERFORMA.md`):

- **Cache berlapis** — settings & data home di-cache 60 menit (`SettingsCache`).
- **Auto-invalidasi cache** — trait `ClearsHomeCache` membersihkan cache saat data diubah.
- **Pengunjung dioptimalkan** — penulisan DB dibatasi (1x/5 menit/sesi) + `Cache::lock`.
- **Gzip + browser caching** via `.htaccess` (Apache).
- **Lazy-load gambar** di bawah fold.
- **Google Fonts non-blocking** (`display=swap`).

---

## 12. Struktur Proyek

```
app/
├── Http/
│   ├── Controllers/          # Controller admin & publik
│   │   ├── Admin/            # CRUD panel admin
│   │   ├── Auth/             # Autentikasi
│   │   ├── AkademikController.php   # Halaman akademik
│   │   ├── ChatbotController.php    # Logika asisten virtual
│   │   └── ... publik lainnya
│   └── Middleware/
│       ├── EnsureUserIsAdmin.php   # Guard role admin
│       └── TrackVisitors.php       # Statistik pengunjung
├── Models/                   # Model Eloquent
│   └── Concerns/ClearsHomeCache.php
├── Providers/AppServiceProvider.php
└── Support/SettingsCache.php # Helper cache terpusat

database/
├── migrations/               # Skema semua tabel
└── seeders/                  # Data awal

resources/views/
├── admin/                    # View panel admin
├── site/                     # View website publik
├── components/               # Nav, footer, chatbot, layout, UI
└── layouts/                  # Layout dasar

routes/
└── web.php                   # Semua route publik & admin

public/
├── .htaccess                 # Gzip + browser caching (Apache)
└── storage/                  # File upload (logo, gambar, e-book)
```

---

## 13. FAQ

**Q1: Bagaimana cara mengakses panel admin?**
Login dengan akun ber-role `admin` lalu buka `/dashboard`, atau klik menu dashboard setelah login.

**Q2: Apakah pengunjung umum perlu login?**
Tidak. Seluruh halaman publik dapat diakses tanpa login.

**Q3: Bagaimana menambahkan dosen baru?**
Masuk panel admin → **Beranda → Dosen Program Studi → Tambah Dosen**.

**Q4: Bagaimana mengubah logo / nama prodi?**
Masuk panel admin → **Pengaturan → Pengaturan Situs**.

**Q5: Bagaimana caranya e-book muncul di E-Library?**
Masuk panel admin → **Akademik → E-Library → Tambah E-Book**, lalu unggah file PDF.

**Q6: Apakah perubahan konten langsung tampil?**
Ya. Cache di-invalidasi otomatis saat data diubah lewat admin, sehingga perubahan langsung tampil.

**Q7: Bagaimana jika lupa password admin?**
Gunakan fitur reset password Laravel, atau reset via `php artisan tinker`.

**Q8: Apakah chatbot bisa menjawab semua pertanyaan?**
Chatbot menjawab berdasarkan ±28 kategori data yang sudah disiapkan. Jika pertanyaan di luar kategori, bot akan memberi arahan untuk menghubungi sekretariat.

---

## ✅ Penutup

Dokumentasi ini mencakup seluruh aspek website Program Studi STI Universitas IVET Semarang. Website dirancang untuk menjadi **representasi digital resmi** prodi dengan menyajikan informasi lengkap, fitur interaktif (chatbot, e-library, timeline), panel admin yang mudah dikelola, serta performa yang dioptimalkan.

Untuk detail teknis optimasi, lihat [`OPTIMASI_PERFORMA.md`](OPTIMASI_PERFORMA.md). Untuk informasi pengembangan & fitur, lihat [`README.md`](README.md).
