# TODO — Berita Hanya Tampil di Beranda

## Langkah

- [x] Analisis alur berita-kegiatan (controller, view, model, navbar)
- [x] Konfirmasi kebutuhan: data "Berita" dipertahankan, hanya tidak tampil di halaman Berita & Kegiatan
- [x] Update `app/Http/Controllers/BeritaKegiatanController.php` (kecualikan kategori `berita`, hapus jmlBerita)
- [x] Update `resources/views/site/berita-kegiatan/index.blade.php` (hapus toggle "Berita", hapus badge berita)
- [x] Verifikasi sintaks controller (php -l) & route list
- [x] Cache clear & verifikasi tampilan website
- [x] Jalankan test (13 passed)
