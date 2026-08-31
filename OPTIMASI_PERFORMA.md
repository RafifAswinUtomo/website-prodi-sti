# 📄 Dokumentasi Optimasi Performa Website

**Proyek:** Website Program Studi Sistem & Teknologi Informasi (STI) — Universitas IVET Semarang
**Framework:** Laravel 12 (PHP 8.2) + Filament 5 + Tailwind CSS + Alpine.js + Vite
**Tanggal:** Dokumen ini dibuat setelah seluruh proses optimasi selesai

---

## 📌 Daftar Isi

1. [Latar Belakang & Tujuan](#1-latar-belakang--tujuan)
2. [Analisis Awal (Identifikasi Bottleneck)](#2-analisis-awal-identifikasi-bottleneck)
3. [File yang Dibuat / Diubah](#3-file-yang-dibuat--diubah)
4. [Detail Perubahan per File](#4-detail-perubahan-per-file)
5. [Alur Kerja Cache](#5-alur-kerja-cache)
6. [Perbaikan Bug "Klik Dua Kali"](#6-perbaikan-bug-klik-dua-kali)
7. [Perintah yang Dijalankan](#7-perintah-yang-dijalankan)
8. [Hasil & Dampak](#8-hasil--dampak)
9. [Cara Menjaga / Perawatan](#9-cara-menjaga--perawatan)
10. [Catatan Penting](#10-catatan-penting)

---

## 1. Latar Belakang & Tujuan

Website awalnya lambat diakses. Tujuan optimasi adalah **mempercepat kecepatan akses web** tanpa mengubah tampilan website sama sekali. Semua optimasi murni di sisi backend/server dan teknik loading.

**Prinsip utama:**

- Mengurangi jumlah query ke database.
- Mengurangi beban penulisan ke database.
- Memanfaatkan cache di berbagai lapisan.
- Mengompresi & meng-cache aset statis.
- Tetap menjaga tampilan tetap identik.

---

## 2. Analisis Awal (Identifikasi Bottleneck)

Sebelum optimasi, ditemukan beberapa penyebab web lambat:

| #   | Masalah                                               | Lokasi                                                  | Dampak                               |
| --- | ----------------------------------------------------- | ------------------------------------------------------- | ------------------------------------ |
| 1   | `Setting::pluck()` dijalankan di **setiap request**   | `AppServiceProvider` (view composer) + `HomeController` | Query berulang, tidak ada cache      |
| 2   | Middleware menulis **2x ke database per request**     | `TrackVisitors`                                         | Beban server sangat tinggi           |
| 3   | `HomeController` menjalankan **9+ query** tanpa cache | `HomeController`                                        | Lambat saat halaman home dibuka      |
| 4   | Belum ada HTTP caching/kompresi                       | `public/.htaccess`                                      | CSS/JS/gambar tidak di-cache browser |
| 5   | Google Fonts dimuat dari server eksternal             | `layouts/public.blade.php`                              | Tambahan request eksternal           |
| 6   | Gambar di bawah fold tidak lazy-load                  | `home.blade.php` + partial                              | Render halaman pertama lambat        |

---

## 3. File yang Dibuat / Diubah

### 📁 File Baru (Dibuat)

| File                                      | Keterangan                                         |
| ----------------------------------------- | -------------------------------------------------- |
| `app/Support/SettingsCache.php`           | Helper cache pengaturan situs & data home          |
| `app/Models/Concerns/ClearsHomeCache.php` | Trait untuk auto-invalidasi cache saat data diubah |
| `OPTIMASI_PERFORMA.md`                    | Dokumen ini                                        |

### 📝 File Diubah

| File                                                  | Perubahan                                                |
| ----------------------------------------------------- | -------------------------------------------------------- |
| `app/Providers/AppServiceProvider.php`                | Pakai `SettingsCache::all()` (cache) untuk view composer |
| `app/Http/Controllers/HomeController.php`             | Cache seluruh query home + statistik pengunjung          |
| `app/Http/Middleware/TrackVisitors.php`               | Batasi penulisan DB + `Cache::lock`                      |
| `public/.htaccess`                                    | Tambah gzip + browser caching                            |
| `resources/views/components/layouts/public.blade.php` | Optimasi & perbaikan Google Fonts                        |
| `resources/views/site/home.blade.php`                 | Lazy-load gambar                                         |
| `resources/views/site/home/_galeri-card.blade.php`    | Lazy-load gambar galeri                                  |
| `resources/views/site/home/_testimoni-card.blade.php` | Lazy-load gambar testimoni                               |
| `TODO.md`                                             | Rencana langkah kerja                                    |

### 🧩 Model dengan Trait `ClearsHomeCache` (9 model)

`Slider`, `Page`, `Galeri`, `TestimoniAlumni`, `MapsKontak`, `SejarahMilestone`, `VisiMisi`, `DosenProdi`, `BeritaProdi`

### 🎛️ Controller Admin dengan Clear Cache (7 controller)

`SettingController`, `SambutanController`, `StatistikController`, `PilarKompetensiController`, `SosialMediaController`, `ProspekKarirController`, `BeritaProdiController`

---

## 4. Detail Perubahan per File

### 4.1 `app/Support/SettingsCache.php` (BARU)

Helper terpusat untuk cache pengaturan & data home.

```php
class SettingsCache
{
    public const CACHE_KEY = 'site_settings';      // key cache settings
    public const HOME_CACHE_KEY = 'home_data';     // key cache data home
    public const TTL = 3600;                        // durasi 60 menit

    public static function all(): array {
        return Cache::remember(self::CACHE_KEY, self::TTL, function () {
            return Setting::pluck('value', 'key')->all();
        });
    }

    public static function forget(): void { Cache::forget(self::CACHE_KEY); }
    public static function forgetHome(): void { Cache::forget(self::HOME_CACHE_KEY); }
    public static function flush(): void { self::forget(); self::forgetHome(); }
}
```

**Fungsi:** Mengambil settings dari database **hanya sekali lalu disimpan di cache** selama 60 menit. Semua tempat yang butuh settings memakai cache ini, sehingga tidak ada query berulang.

---

### 4.2 `app/Models/Concerns/ClearsHomeCache.php` (BARU)

Trait yang memastikan **cache data home otomatis dibersihkan** setiap kali data model diubah.

```php
trait ClearsHomeCache
{
    protected static function bootClearsHomeCache(): void
    {
        static::saved(function () { SettingsCache::forgetHome(); });
        static::deleted(function () { SettingsCache::forgetHome(); });
    }
}
```

**Fungsi:** Saat admin menambah/mengedit/menghapus data (mis. slider, galeri, berita), cache home langsung dihapus sehingga konten terbaru muncul.

---

### 4.3 `app/Providers/AppServiceProvider.php`

**Sebelum:**

```php
View::composer([...], function ($view) {
    $view->with('siteSettings', Setting::pluck('value', 'key'));  // query setiap request
});
```

**Sesudah:**

```php
View::composer([...], function ($view) {
    $view->with('siteSettings', SettingsCache::all());  // pakai cache
});
```

**Efek:** Query `Setting` tidak lagi dijalankan di setiap request — diambil dari cache.

---

### 4.4 `app/Http/Controllers/HomeController.php`

**Sebelum:** 9+ query dijalankan langsung setiap kali halaman home dibuka.

**Sesudah:** Seluruh data home dibungkus dalam `Cache::remember` (60 menit):

```php
$data = Cache::remember(SettingsCache::HOME_CACHE_KEY, SettingsCache::TTL, function () {
    return [
        'sliders'     => Slider::where('is_active', true)->orderBy('urutan')->get(),
        'tentang'     => Page::where('slug', 'tentang')->first(),
        'galeri'      => Galeri::orderBy('urutan')->take(8)->get(),
        'testimoni'   => TestimoniAlumni::orderBy('urutan')->take(5)->get(),
        'mapsKontak'  => MapsKontak::first(),
        'milestones'  => SejarahMilestone::orderBy('tahun')->get(),
        'visiMisi'    => VisiMisi::first(),
        'dosenProdi'  => DosenProdi::orderBy('urutan')->get(),
        'beritaList'  => BeritaProdi::orderByDesc('tanggal')->orderBy('urutan')->take(3)->get(),
    ];
});
```

Statistik pengunjung juga di-cache:

```php
$totalPengunjung = (int) Cache::remember('visitor.total', 300, function () {
    return (int) (Setting::where('key', 'total_pengunjung')->value('value') ?? 0);
});
```

**Efek:** Query 9+ tabel hanya dijalankan **sekali setiap 60 menit**, bukan di setiap kunjungan.

---

### 4.5 `app/Http/Middleware/TrackVisitors.php`

**Sebelum:** Menulis 2x ke DB di setiap request:

1. `OnlineVisitor::updateOrCreate(...)`
2. `Setting::increment('value')`

**Sesudah:**

```php
// 1. Batasi penulisan OnlineVisitor maksimal 1x per 5 menit per session
$cacheKey = 'visitor.online.' . $sessionId;
if (! Cache::has($cacheKey)) {
    OnlineVisitor::updateOrCreate(...);
    Cache::put($cacheKey, true, self::ACTIVITY_INTERVAL); // 300 detik
}

// 2. Hitung pengunjung unik dengan Cache::lock (anti race condition)
if (! $request->session()->has('counted_visit')) {
    $request->session()->put('counted_visit', true);
    $lockKey = 'visitor.count.lock';
    if (Cache::lock($lockKey, 10)->get()) {
        try {
            $setting = Setting::firstOrCreate(['key' => 'total_pengunjung'], ['value' => 0]);
            $setting->increment('value');
            Cache::forget('visitor.total');
        } finally {
            Cache::lock($lockKey)->release();
        }
    }
}
```

**Efek:**

- Penulisan `OnlineVisitor` berkurang drastis (dari setiap request → 1x/5 menit per session).
- Penghitungan pengunjung memakai `Cache::lock` agar tidak bertabrakan saat banyak request bersamaan.
- Angka pengunjung tetap akurat & tidak bertambah di setiap request.

> **Catatan:** `Cache::lock` memerlukan store `database` (tabel `cache` & `cache_locks`), yang sudah tersedia di proyek ini.

---

### 4.6 `public/.htaccess`

Ditambahkan 3 blok setelah aturan rewrite bawaan Laravel:

**a) Kompresi gzip (`mod_deflate`):**

```apache
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript
    AddOutputFilterByType DEFLATE application/javascript application/json font/woff2 ...
</IfModule>
```

**b) Browser caching (`mod_expires`):**

```apache
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType font/woff2 "access plus 1 year"
    ...
</IfModule>
```

**c) Header Cache-Control (`mod_headers`):**

```apache
<FilesMatch "\.(css|js|woff2?|ttf|eot|svg)$">
    Header set Cache-Control "public, max-age=2592000, immutable"
</FilesMatch>
<FilesMatch "\.(jpg|jpeg|png|gif|webp|ico)$">
    Header set Cache-Control "public, max-age=2592000, immutable"
</FilesMatch>
<FilesMatch "\.(html|json)$">
    Header set Cache-Control "no-cache, must-revalidate"
</FilesMatch>
```

**Efek:**

- File CSS/JS/font/gambar dikompresi (lebih kecil saat diunduh).
- Aset statis di-cache oleh browser (1 bulan untuk CSS/JS, 1 tahun untuk gambar/font).
- HTML/JSON tidak di-cache agar tetap selalu terbaru.

---

### 4.7 `resources/views/components/layouts/public.blade.php`

Optimasi Google Fonts dengan `preconnect` + `display=swap`:

```html
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
    rel="stylesheet"
/>
```

**Efek:**

- `preconnect` mengurangi waktu koneksi ke server Google Fonts.
- `display=swap` memastikan teks tetap tampil (pakai font fallback) sebelum font asli selesai dimuat, jadi **tidak memblokir render**.

> Lihat [Bagian 6](#6-perbaikan-bug-klik-dua-kali) untuk detail perbaikan terkait font.

---

### 4.8 Lazy-load Gambar

Ditambahkan atribut `loading="lazy"` pada gambar di bawah layar:

- `_galeri-card.blade.php`:
    ```html
    <img src="..." loading="lazy" ... />
    ```
- `_testimoni-card.blade.php`:
    ```html
    <img src="..." loading="lazy" ... />
    ```
- `home.blade.php` (gambar konten di bawah fold).

**Efek:** Gambar di bawah layar baru dimuat saat pengunjung scroll ke sana. Gambar hero (atas) tetap dimuat langsung. Render halaman pertama menjadi lebih cepat.

---

## 5. Alur Kerja Cache

```
Browser / Pengunjung
        │
        ▼
Request halaman → Middleware (TrackVisitors - dibatasi)
        │
        ▼
AppServiceProvider (view composer) → SettingsCache::all() ← CACHE settings (60 menit)
        │
        ▼
Controller → HomeController → Cache::remember(home_data) ← CACHE data home (60 menit)
        │
        ▼
View (blade) → Laravel view:cache (cache blade terkompilasi)
        │
        ▼
Output → gzip (mod_deflate) → browser caching (mod_expires)
```

**Invalidasi otomatis:**

- Saat admin mengedit settings → `SettingsCache::flush()`.
- Saat admin mengubah slider/galeri/berita/dll → trait `ClearsHomeCache` (event `saved`/`deleted`).

---

## 6. Perbaikan Bug "Klik Dua Kali"

### Gejala

Saat mengakses website, pengunjung **harus mengeklik menu dua kali** agar pindah halaman. Klik pertama seolah tidak berfungsi.

### Akar Masalah

Sebuah teknik optimasi font (yang sementara dipasang) menggunakan:

```html
<link rel="stylesheet" href="..." media="print" onload="this.media='all'" />
```

Teknik ini **memuat font secara async** setelah halaman render. Saat font selesai diunduh, terjadi **layout shift (FOUT)** — halaman bergeser karena ukuran teks berubah dari font fallback ke font asli. Pergeseran ini terjadi **tepat setelah halaman dimuat**, sehingga saat pengunjung mengeklik menu pada klik pertama, posisi link sudah bergeser dan klik tersebut tidak mengenai link yang benar.

### Solusi

Dikembalikan ke metode standar yang aman:

```html
<link
    href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
    rel="stylesheet"
/>
```

- `display=swap` tetap membuat font **tidak memblokir layout** (teks tampil pakai font fallback dulu).
- **Tidak ada layout shift** yang menelan klik pertama, karena tidak ada trik `onload` yang memicu pergeseran.

### Hasil

Setelah diperbaiki & cache view dibangun ulang, **menu dapat diklik sekali dan langsung pindah halaman**. Pengguna telah mengonfirmasi perbaikan ini berhasil.

---

### 📌 Kejadian Ulang: Race Condition Hover-Dropdown (2026)

#### Gejala

Masalah "klik dua kali" muncul kembali. Saat mencoba membuka submenu (mis. **Profil → Profil Lulusan**) di menu desktop, klik pertama **tidak berpindah halaman**, baru klik kedua yang berhasil.

#### Akar Masalah

Bukan soal font. Penyebabnya adalah **race condition antara `@mouseenter`/`@mouseleave` dan klik** pada dropdown hover di `resources/views/components/public-nav.blade.php`:

- Dropdown menggunakan `position: absolute; top-full`, sehingga **muncul di bawah kotak wrapper**.
- Kotak wrapper (untuk hit-testing mouse) **hanya menutupi area tombol induk**, bukan dropdown di bawahnya.
- Saat kursor bergeser dari tombol induk menuju item submenu, event `@mouseleave` langsung terpicu → `openMenu = null` → dropdown **menutup seketika**.
- Klik pertama kemudian mengenai area kosong (dropdown sudah hilang) → **tidak ada navigasi**.
- Klik kedua berhasil karena dropdown sempat terbuka kembali.

#### Solusi

Di `public-nav.blade.php`:

1. **Tambah delay saat menutup** (`closeTimer` 250ms) via helper `openDropdown()`, `scheduleClose()`, dan `cancelClose()` di `x-data` header.
2. **Hover hanya aktif di perangkat yang mendukung hover** (`window.matchMedia('(hover: hover)')`), sehingga di layar sentuh tidak terjadi simulasi hover yang menutup dropdown.
3. Elemen dropdown diberi `@mouseenter="cancelClose()"` / `@mouseleave="scheduleClose()"` agar saat kursor berpindah ke dalam dropdown, penutupan dibatalkan.
4. Item submenu tetap `<a>` polos — **klik pertama langsung navigasi**, tidak ada intervensi yang menelan klik.

#### Hasil

Submenu kini dapat diklik **sekali dan langsung berpindah halaman**, baik di desktop (mouse) maupun layar sentuh.

---

## 7. Perintah yang Dijalankan

### Cache Laravel

```bash
php artisan optimize                 # cache config, routes, events, views
php artisan view:cache               # kompilasi semua view blade
php artisan view:clear               # bersihkan cache view lama
php artisan optimize:clear           # hapus semua cache aplikasi
```

### Build Produksi (Vite)

```bash
npm run build
```

### Hasil Build

```
CSS  : app-DL4LqxZx.css 90.61 kB (14.71 kB gzip)
JS   : app-BfpX1doZ.js  92.32 kB (33.87 kB gzip)
Built in 13.53s (56 modules)
```

---

## 8. Hasil & Dampak

| Aspek                          | Sebelum                   | Sesudah                               |
| ------------------------------ | ------------------------- | ------------------------------------- |
| **Query settings per request** | Selalu query DB           | Cache 60 menit                        |
| **Query data home**            | 9+ query setiap kunjungan | Cache 60 menit                        |
| **Penulisan DB visitor**       | 2x per request            | 1x per 5 menit per session            |
| **Kompresi aset**              | Tidak ada                 | Gzip aktif                            |
| **Browser caching**            | Tidak ada                 | CSS/JS 1 bulan, gambar/font 1 tahun   |
| **Lazy-load gambar**           | Tidak ada                 | Gambar bawah fold lazy                |
| **Google Fonts**               | Memblokir render          | `display=swap` (tidak memblokir)      |
| **Cache Laravel**              | Tidak aktif               | Config, route, view, events ter-cache |
| **Tampilan website**           | —                         | **100% tetap sama**                   |

---

## 9. Cara Menjaga / Perawatan

### Saat Deploy ke Produksi

```bash
php artisan optimize          # aktifkan semua cache
php artisan view:cache        # cache view
npm run build                 # build aset produksi
```

### Setiap Kali Mengubah Data di Admin

Tidak perlu dilakukan apa-apa — cache **otomatis dibersihkan** oleh:

- Trait `ClearsHomeCache` pada model (untuk data home).
- `SettingsCache::flush()` pada controller admin (untuk settings).

### Jika Menambah Model Baru yang Dipakai di Home

Tambahkan `use ClearsHomeCache;` pada model tersebut agar cache otomatis dibersihkan saat data berubah.

### Jika Perlu Membersihkan Cache Manual

```bash
php artisan optimize:clear
php artisan view:clear
```

---

## 10. Catatan Penting

1. **Tampilan website tidak berubah** — semua optimasi bekerja di sisi backend/performa, bukan desain.
2. **Cache store default** = `database` (tabel `cache` & `cache_locks`). Ini sudah tersedia karena `TrackVisitors` memakai `Cache::lock`.
3. **`Cache::lock`** memerlukan store non-distributed (mis. `database` atau `file`). Jangan gunakan store `array` di produksi.
4. **`.htaccess`** hanya efektif di server **Apache**. Jika memakai Nginx, pengaturan gzip/expires harus dipindahkan ke konfigurasi Nginx.
5. **Google Fonts** tetap dari server eksternal (Google). Jika ingin sepenuhnya offline/cepat, font dapat di-self-host di server sendiri.
6. **Total pengunjung** tetap akurat (tidak bertambah di setiap request), karena pemakaian `Cache::lock` mencegah penambahan ganda.

---

## ✅ Kesimpulan

Optimasi berhasil meningkatkan kecepatan akses web dengan:

- **Mengurangi query database** (memakai cache 60 menit).
- **Mengurangi beban server** (penulisan DB dibatasi, tidak setiap request).
- **Mengompresi & meng-cache aset statis** (gzip + browser caching).
- **Lazy-load gambar** (render awal lebih cepat).
- **Memperbaiki bug "klik dua kali"** (Google Fonts tanpa layout shift).

Semua dilakukan **tanpa mengubah tampilan website**, dan pengalaman pengguna menjadi lebih cepat dan responsif.
