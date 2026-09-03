-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Sep 2026 pada 15.43
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_sti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_prodis`
--

CREATE TABLE `berita_prodis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `ringkasan` text DEFAULT NULL,
  `konten` text DEFAULT NULL,
  `urutan` int(11) NOT NULL DEFAULT 0,
  `tampil_beranda` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berita_prodis`
--

INSERT INTO `berita_prodis` (`id`, `judul`, `kategori`, `gambar`, `tanggal`, `ringkasan`, `konten`, `urutan`, `tampil_beranda`, `created_at`, `updated_at`) VALUES
(1, 'Mahahsiswa semester 8 sistem dan teknologi informasi,LOLOS sinta 3!', 'berita', 'berita-prodi/egqSZlYFsySULhpsikn7tnPOsMmH7M6FbNzx7uQG.png', '2026-08-06', 'LOLOS publikasi jurnal terkreditasi sinta 3!!', 'Wijayanti kususma sari mahasiswa Sistem dan teknologi informasi lolos publikasi sinta terkareditasi sinta .pencapaian yang sangat luar biasa atas pencapain mahahswa STI', 1, 1, '2026-08-06 03:03:25', '2026-08-06 03:03:25'),
(2, 'Kegiatan Pramuka', 'kegiatan', 'berita-prodi/WXyciqdRmu8BulscaNyfHArcizSyBrSYrNLeRgCo.jpg', '2026-08-06', 'Wijayanti kususma sari mahasiswa Sistem dan teknologi informasi lolos publikasi sinta terkareditasi sinta .pencapaian yang sangat luar biasa atas pencapain mahahswa STI', 'Wijayanti kususma sari mahasiswa Sistem dan teknologi informasi lolos publikasi sinta terkareditasi sinta .pencapaian yang sangat luar biasa atas pencapain mahahswa STI', 1, 0, '2026-08-06 03:05:36', '2026-08-09 11:48:55'),
(3, 'Rumah Sakit Islam Sunan Kudus', 'kerjasama', 'berita-prodi/ksnEr9lL8oOMtronhS2H1PUzPgBeIX4AeqFdoqFP.png', NULL, NULL, NULL, 1, 0, '2026-08-06 08:34:03', '2026-08-06 10:15:01'),
(4, 'PEM Akamigas', 'kerjasama', 'berita-prodi/qj74v7a7t5n5GeXIqpBD14J5YhQG4PHwzDgVcMPg.png', NULL, NULL, NULL, 2, 0, '2026-08-06 08:40:16', '2026-08-06 10:20:54'),
(5, 'PLN Icon Plus', 'kerjasama', 'berita-prodi/uO2fssQZblI6O4N0mqefwBQW4RvEzsrf117Cl3XE.png', NULL, NULL, NULL, 6, 0, '2026-08-06 08:52:49', '2026-08-06 10:24:05'),
(6, 'Infolahta Kodam Diponegoro IV', 'kerjasama', 'berita-prodi/MvUYbs17CgM7yxJJRZELzrVBABreh7uTGmKDP45d.png', NULL, NULL, NULL, 4, 0, '2026-08-06 08:56:52', '2026-08-06 10:17:58'),
(7, 'Pertamina', 'kerjasama', 'berita-prodi/VrBOhah5IdHlI0qHFZSbsUyKAEXxphGftxlYsp5x.jpg', NULL, NULL, NULL, 5, 0, '2026-08-06 08:58:26', '2026-08-06 08:58:26'),
(8, 'Dinas Lingkungan Hidup dan Kehutanan Provinsi Jawa tengah', 'kerjasama', 'berita-prodi/ahdhlXrgQ0KzfkrJIgszgCuUV3G8eNmPXkDREWtk.png', NULL, NULL, NULL, 3, 0, '2026-08-06 09:01:19', '2026-08-06 10:23:51'),
(9, 'PT Telkomsel Indonesia', 'kerjasama', 'berita-prodi/oxwl2WOly09sdwKRz8kbiofHP0smFvKLw5eEXYIx.jpg', NULL, NULL, NULL, 7, 0, '2026-08-06 09:03:40', '2026-08-06 09:03:40'),
(10, 'Kegiatan', 'kegiatan', 'berita-prodi/q0BI3uq7ZrQ1tU1MpbibbX4rpMsRyhAJwUfKRnNb.png', NULL, NULL, NULL, 2, 0, '2026-08-09 11:52:17', '2026-08-09 11:58:42'),
(11, 'Kegiatan', 'kegiatan', 'berita-prodi/4jd2zXjooGrsa3Lu3IcxnYIgxPpFtcZ94z102VUL.jpg', NULL, NULL, NULL, 3, 0, '2026-08-09 11:52:56', '2026-08-09 11:52:56'),
(12, 'Kegiatan', 'kegiatan', 'berita-prodi/jxulx9LIiEsBsTkfZ9WC4Rp1DozuZj85wvdNVKpN.jpg', NULL, NULL, NULL, 4, 0, '2026-08-09 11:53:45', '2026-08-09 11:53:45'),
(13, 'Kegiatan', 'kegiatan', 'berita-prodi/I5xOI7ThpCiPpJIuQMvUtC2IeVKMfNZLDPXzLKTz.jpg', NULL, NULL, NULL, 5, 0, '2026-08-09 11:54:20', '2026-08-09 11:54:20'),
(14, 'Kegiatan', 'kegiatan', 'berita-prodi/hA8pGe69QsCBwMBU85PSzJsrPOVJf7Hk9S76a3rl.jpg', NULL, NULL, NULL, 6, 0, '2026-08-09 11:54:49', '2026-08-09 11:54:49'),
(15, 'Kegiatan', 'kegiatan', 'berita-prodi/xNLLREwcr6PFIxFwrIDubPggGK7tzQq5fAXf0M3b.png', NULL, NULL, NULL, 7, 0, '2026-08-09 11:55:18', '2026-08-09 12:01:18'),
(16, 'Kegiatan', 'kegiatan', 'berita-prodi/AAaiF2aDTn4crCY0FXLTuyN0FKy3CisZmmu0UXqK.jpg', NULL, NULL, NULL, 8, 0, '2026-08-09 11:55:44', '2026-08-09 11:55:44'),
(17, '2 mahasiswa sistem dan teknologi informasi LOLOS TNI AD!!', 'berita', 'berita-prodi/7N8wl237YTnJFjGgF3QolrM4w73XfUexc7gjFDmb.png', '2026-08-10', 'prestasi yang gemilang 2 mahasiswa sistem dan teknologi informasi semester 6 lolos TNI AD', '2 mahasiswa sistem dan teknologi informasi semester 6 lolos TNI AD,aditiya prakoso asal semarang,dan fernanada aditiya asal semarang menorehkan prrestasi yang sangat luar biasa,dan menjadi kebanggaan program studi atas pencapaian nya', 2, 1, '2026-08-09 12:40:48', '2026-08-09 12:43:46'),
(18, 'TIM IT program studi sitem dan teknologi informasi LOLOS penanaan PKM!!', 'berita', 'berita-prodi/n8F95sitXIOpsDGaEZw4emAd7NqIEpmOxOKM8UyB.png', '2026-08-10', 'HEBAT TIM IT sistem dan teknologi informasi lolos PKM!!!', 'Tim IT STI yang beranggotakan anak anak hebat dari semester 4 meraih prestasi ,lolos pendanaan pkm,dengan membuat program kacamata pintar khusus tuna rungu,menarikkkkk!!', 3, 1, '2026-08-09 12:42:22', '2026-08-09 12:42:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1786207883),
('laravel-cache-356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1786207882;', 1786207882);
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-home_data', 'a:7:{s:7:\"sliders\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:4:{i:0;O:17:\"App\\Models\\Slider\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:7:\"sliders\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:12:{s:2:\"id\";i:1;s:5:\"judul\";s:31:\"Selamat Datang di Program Studi\";s:12:\"judul_baris2\";s:28:\"Sistem & Teknologi Informasi\";s:11:\"judul_sorot\";s:25:\"Universitas IVET Semarang\";s:8:\"subjudul\";s:110:\"Mencetak lulusan unggul di bidang rekayasa perangkat lunak, keamanan siber, sains data, dan technopreneurship.\";s:6:\"gambar\";s:52:\"sliders/HjjFq6mjjaiygC94txJW81j3gscQyA8LRpipDMBf.png\";s:11:\"tombol_teks\";s:21:\"Informasi Pendaftaran\";s:11:\"tombol_link\";s:26:\"https://pmb.unisvet.ac.id/\";s:6:\"urutan\";i:1;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-08-04 00:08:53\";s:10:\"updated_at\";s:19:\"2026-08-07 01:35:11\";}s:11:\"\0*\0original\";a:12:{s:2:\"id\";i:1;s:5:\"judul\";s:31:\"Selamat Datang di Program Studi\";s:12:\"judul_baris2\";s:28:\"Sistem & Teknologi Informasi\";s:11:\"judul_sorot\";s:25:\"Universitas IVET Semarang\";s:8:\"subjudul\";s:110:\"Mencetak lulusan unggul di bidang rekayasa perangkat lunak, keamanan siber, sains data, dan technopreneurship.\";s:6:\"gambar\";s:52:\"sliders/HjjFq6mjjaiygC94txJW81j3gscQyA8LRpipDMBf.png\";s:11:\"tombol_teks\";s:21:\"Informasi Pendaftaran\";s:11:\"tombol_link\";s:26:\"https://pmb.unisvet.ac.id/\";s:6:\"urutan\";i:1;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-08-04 00:08:53\";s:10:\"updated_at\";s:19:\"2026-08-07 01:35:11\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:9:{i:0;s:5:\"judul\";i:1;s:12:\"judul_baris2\";i:2;s:11:\"judul_sorot\";i:3;s:8:\"subjudul\";i:4;s:6:\"gambar\";i:5;s:11:\"tombol_teks\";i:6;s:11:\"tombol_link\";i:7;s:6:\"urutan\";i:8;s:9:\"is_active\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:17:\"App\\Models\\Slider\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:7:\"sliders\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:12:{s:2:\"id\";i:2;s:5:\"judul\";s:20:\"Terbukti Berprestasi\";s:12:\"judul_baris2\";N;s:11:\"judul_sorot\";s:19:\"di Tingkat Nasional\";s:8:\"subjudul\";s:113:\"Mahasiswa kami lolos program Bangkit, MSIB, juara kompetisi olahraga & desain — bukti nyata kualitas pendidikan\";s:6:\"gambar\";s:53:\"sliders/BMZQsftBqVEVgKV3dvN3PlYQ0H7rRPJ5zB9sRgKw.webp\";s:11:\"tombol_teks\";s:22:\"Lihat Prestasi Lainnya\";s:11:\"tombol_link\";s:34:\"/berita-kegiatan?kategori=prestasi\";s:6:\"urutan\";i:2;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-08-05 16:32:56\";s:10:\"updated_at\";s:19:\"2026-08-05 16:50:14\";}s:11:\"\0*\0original\";a:12:{s:2:\"id\";i:2;s:5:\"judul\";s:20:\"Terbukti Berprestasi\";s:12:\"judul_baris2\";N;s:11:\"judul_sorot\";s:19:\"di Tingkat Nasional\";s:8:\"subjudul\";s:113:\"Mahasiswa kami lolos program Bangkit, MSIB, juara kompetisi olahraga & desain — bukti nyata kualitas pendidikan\";s:6:\"gambar\";s:53:\"sliders/BMZQsftBqVEVgKV3dvN3PlYQ0H7rRPJ5zB9sRgKw.webp\";s:11:\"tombol_teks\";s:22:\"Lihat Prestasi Lainnya\";s:11:\"tombol_link\";s:34:\"/berita-kegiatan?kategori=prestasi\";s:6:\"urutan\";i:2;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-08-05 16:32:56\";s:10:\"updated_at\";s:19:\"2026-08-05 16:50:14\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:9:{i:0;s:5:\"judul\";i:1;s:12:\"judul_baris2\";i:2;s:11:\"judul_sorot\";i:3;s:8:\"subjudul\";i:4;s:6:\"gambar\";i:5;s:11:\"tombol_teks\";i:6;s:11:\"tombol_link\";i:7;s:6:\"urutan\";i:8;s:9:\"is_active\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:17:\"App\\Models\\Slider\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:7:\"sliders\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:12:{s:2:\"id\";i:3;s:5:\"judul\";s:12:\"Lulus Kuliah\";s:12:\"judul_baris2\";N;s:11:\"judul_sorot\";s:19:\"Langsung Siap Kerja\";s:8:\"subjudul\";s:107:\"Alumni kami berkarya sebagai Web Developer, IT Support, hingga Staff Quality Control di berbagai perusahaan\";s:6:\"gambar\";s:52:\"sliders/kswsrWn4NIlv3BCFZKuLaacwvkRDrDhRcED9PrEI.png\";s:11:\"tombol_teks\";s:22:\"Lihat Testimoni Alumni\";s:11:\"tombol_link\";s:17:\"/testimoni-alumni\";s:6:\"urutan\";i:3;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-08-05 16:56:33\";s:10:\"updated_at\";s:19:\"2026-08-05 16:56:33\";}s:11:\"\0*\0original\";a:12:{s:2:\"id\";i:3;s:5:\"judul\";s:12:\"Lulus Kuliah\";s:12:\"judul_baris2\";N;s:11:\"judul_sorot\";s:19:\"Langsung Siap Kerja\";s:8:\"subjudul\";s:107:\"Alumni kami berkarya sebagai Web Developer, IT Support, hingga Staff Quality Control di berbagai perusahaan\";s:6:\"gambar\";s:52:\"sliders/kswsrWn4NIlv3BCFZKuLaacwvkRDrDhRcED9PrEI.png\";s:11:\"tombol_teks\";s:22:\"Lihat Testimoni Alumni\";s:11:\"tombol_link\";s:17:\"/testimoni-alumni\";s:6:\"urutan\";i:3;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-08-05 16:56:33\";s:10:\"updated_at\";s:19:\"2026-08-05 16:56:33\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:9:{i:0;s:5:\"judul\";i:1;s:12:\"judul_baris2\";i:2;s:11:\"judul_sorot\";i:3;s:8:\"subjudul\";i:4;s:6:\"gambar\";i:5;s:11:\"tombol_teks\";i:6;s:11:\"tombol_link\";i:7;s:6:\"urutan\";i:8;s:9:\"is_active\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:17:\"App\\Models\\Slider\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:7:\"sliders\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:12:{s:2:\"id\";i:4;s:5:\"judul\";s:14:\"Belajar dengan\";s:12:\"judul_baris2\";N;s:11:\"judul_sorot\";s:32:\"Fasilitas & Sertifikasi Kompeten\";s:8:\"subjudul\";s:108:\"Lab praktik lengkap, ditunjang Lembaga Sertifikasi Profesi (LSP) untuk bekal kompetensi yang diakui industri\";s:6:\"gambar\";s:52:\"sliders/UkOVLNlxLK7Ee0IJolUgc6RFtRhzKU8qClntVQu2.jpg\";s:11:\"tombol_teks\";s:19:\"Lihat Fasilitas Lab\";s:11:\"tombol_link\";s:10:\"/fasilitas\";s:6:\"urutan\";i:4;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-08-05 17:10:31\";s:10:\"updated_at\";s:19:\"2026-08-05 17:10:31\";}s:11:\"\0*\0original\";a:12:{s:2:\"id\";i:4;s:5:\"judul\";s:14:\"Belajar dengan\";s:12:\"judul_baris2\";N;s:11:\"judul_sorot\";s:32:\"Fasilitas & Sertifikasi Kompeten\";s:8:\"subjudul\";s:108:\"Lab praktik lengkap, ditunjang Lembaga Sertifikasi Profesi (LSP) untuk bekal kompetensi yang diakui industri\";s:6:\"gambar\";s:52:\"sliders/UkOVLNlxLK7Ee0IJolUgc6RFtRhzKU8qClntVQu2.jpg\";s:11:\"tombol_teks\";s:19:\"Lihat Fasilitas Lab\";s:11:\"tombol_link\";s:10:\"/fasilitas\";s:6:\"urutan\";i:4;s:9:\"is_active\";i:1;s:10:\"created_at\";s:19:\"2026-08-05 17:10:31\";s:10:\"updated_at\";s:19:\"2026-08-05 17:10:31\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:9:{i:0;s:5:\"judul\";i:1;s:12:\"judul_baris2\";i:2;s:11:\"judul_sorot\";i:3;s:8:\"subjudul\";i:4;s:6:\"gambar\";i:5;s:11:\"tombol_teks\";i:6;s:11:\"tombol_link\";i:7;s:6:\"urutan\";i:8;s:9:\"is_active\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:7:\"tentang\";O:15:\"App\\Models\\Page\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"pages\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:14:{s:2:\"id\";i:1;s:4:\"slug\";s:7:\"tentang\";s:5:\"judul\";s:21:\"Tentang Program Studi\";s:3:\"isi\";s:345:\"Program Studi S1 Sistem dan Teknologi Informasi (STI) Universitas IVET Semarang mencetak sarjana komputer yang unggul di bidang rekayasa perangkat lunak, keamanan siber, sains data, dan technopreneurship.\n\nKurikulum kami dirancang sesuai kebutuhan industri, didukung dosen mumpuni dan praktisi berpengalaman, serta fasilitas laboratorium modern.\";s:5:\"cover\";N;s:4:\"file\";N;s:8:\"link_url\";N;s:10:\"link_label\";N;s:5:\"badge\";N;s:4:\"visi\";N;s:4:\"misi\";N;s:6:\"tujuan\";N;s:10:\"created_at\";s:19:\"2026-08-04 00:08:53\";s:10:\"updated_at\";s:19:\"2026-08-04 00:08:53\";}s:11:\"\0*\0original\";a:14:{s:2:\"id\";i:1;s:4:\"slug\";s:7:\"tentang\";s:5:\"judul\";s:21:\"Tentang Program Studi\";s:3:\"isi\";s:345:\"Program Studi S1 Sistem dan Teknologi Informasi (STI) Universitas IVET Semarang mencetak sarjana komputer yang unggul di bidang rekayasa perangkat lunak, keamanan siber, sains data, dan technopreneurship.\n\nKurikulum kami dirancang sesuai kebutuhan industri, didukung dosen mumpuni dan praktisi berpengalaman, serta fasilitas laboratorium modern.\";s:5:\"cover\";N;s:4:\"file\";N;s:8:\"link_url\";N;s:10:\"link_label\";N;s:5:\"badge\";N;s:4:\"visi\";N;s:4:\"misi\";N;s:6:\"tujuan\";N;s:10:\"created_at\";s:19:\"2026-08-04 00:08:53\";s:10:\"updated_at\";s:19:\"2026-08-04 00:08:53\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:11:{i:0;s:4:\"slug\";i:1;s:5:\"judul\";i:2;s:3:\"isi\";i:3;s:5:\"cover\";i:4;s:4:\"file\";i:5;s:5:\"badge\";i:6;s:8:\"link_url\";i:7;s:10:\"link_label\";i:8;s:4:\"visi\";i:9;s:4:\"misi\";i:10;s:6:\"tujuan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:10:\"mapsKontak\";O:21:\"App\\Models\\MapsKontak\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:11:\"maps_kontak\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:7:{s:2:\"id\";i:1;s:12:\"nama_kaprodi\";s:30:\"Dewi Purnamasari, S.T., M.Eng.\";s:16:\"whatsapp_kaprodi\";s:12:\"081325553255\";s:10:\"maps_embed\";s:283:\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.9043273622715!2d110.39553317371256!3d-7.020531368771609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b2288dc1765%3A0xd53229bc48fb4fa!2sUniversitas%20Ivet%20Semarang!5e0!3m2!1sid!2sid!4v1785945982935!5m2!1sid!2sid\";s:12:\"whatsapp_pmb\";s:13:\"6281223456789\";s:10:\"created_at\";s:19:\"2026-08-04 00:08:53\";s:10:\"updated_at\";s:19:\"2026-08-05 16:08:44\";}s:11:\"\0*\0original\";a:7:{s:2:\"id\";i:1;s:12:\"nama_kaprodi\";s:30:\"Dewi Purnamasari, S.T., M.Eng.\";s:16:\"whatsapp_kaprodi\";s:12:\"081325553255\";s:10:\"maps_embed\";s:283:\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.9043273622715!2d110.39553317371256!3d-7.020531368771609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b2288dc1765%3A0xd53229bc48fb4fa!2sUniversitas%20Ivet%20Semarang!5e0!3m2!1sid!2sid!4v1785945982935!5m2!1sid!2sid\";s:12:\"whatsapp_pmb\";s:13:\"6281223456789\";s:10:\"created_at\";s:19:\"2026-08-04 00:08:53\";s:10:\"updated_at\";s:19:\"2026-08-05 16:08:44\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:12:\"nama_kaprodi\";i:1;s:16:\"whatsapp_kaprodi\";i:2;s:10:\"maps_embed\";i:3;s:12:\"whatsapp_pmb\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:10:\"milestones\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:4:{i:0;O:27:\"App\\Models\\SejarahMilestone\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:18:\"sejarah_milestones\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:1;s:5:\"tahun\";i:2020;s:5:\"judul\";s:29:\"Inisiasi & SK Pendirian Resmi\";s:5:\"badge\";s:16:\"SK MENTERI RESMI\";s:9:\"deskripsi\";s:379:\"Universitas Ivet Semarang resmi menginisiasi pendirian program studi baru guna menjawab urgensi kebutuhan nasional akan sarjana komputer yang handal. Sejarah penting dimulai dengan turunnya Surat Keputusan Kemendikbudristek RI No. 235/M/2020 yang menandai legalitas dan hak penyelenggaraan Program Studi Sistem dan Teknologi Informasi (STI) di bawah Fakultas Sains dan Teknologi.\";s:4:\"poin\";s:169:\"SK Menteri Resmi No. 235/M/2020\r\nPenerbit SK: Kemendikbudristek RI\r\nKurikulum awal fokus ke manajemen & infrastruktur IT\r\nPenerimaan angkatan mahasiswa pertama prodi STI\";s:10:\"created_at\";s:19:\"2026-08-04 02:10:45\";s:10:\"updated_at\";s:19:\"2026-08-04 02:10:45\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:1;s:5:\"tahun\";i:2020;s:5:\"judul\";s:29:\"Inisiasi & SK Pendirian Resmi\";s:5:\"badge\";s:16:\"SK MENTERI RESMI\";s:9:\"deskripsi\";s:379:\"Universitas Ivet Semarang resmi menginisiasi pendirian program studi baru guna menjawab urgensi kebutuhan nasional akan sarjana komputer yang handal. Sejarah penting dimulai dengan turunnya Surat Keputusan Kemendikbudristek RI No. 235/M/2020 yang menandai legalitas dan hak penyelenggaraan Program Studi Sistem dan Teknologi Informasi (STI) di bawah Fakultas Sains dan Teknologi.\";s:4:\"poin\";s:169:\"SK Menteri Resmi No. 235/M/2020\r\nPenerbit SK: Kemendikbudristek RI\r\nKurikulum awal fokus ke manajemen & infrastruktur IT\r\nPenerimaan angkatan mahasiswa pertama prodi STI\";s:10:\"created_at\";s:19:\"2026-08-04 02:10:45\";s:10:\"updated_at\";s:19:\"2026-08-04 02:10:45\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:5:\"tahun\";i:1;s:5:\"judul\";i:2;s:5:\"badge\";i:3;s:9:\"deskripsi\";i:4;s:4:\"poin\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:27:\"App\\Models\\SejarahMilestone\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:18:\"sejarah_milestones\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:2;s:5:\"tahun\";i:2022;s:5:\"judul\";s:35:\"Pengembangan Kurikulum & Kolaborasi\";s:5:\"badge\";s:19:\"KOLABORASI INDUSTRI\";s:9:\"deskripsi\";s:357:\"Memasuki tahun kedua, program studi melakukan rekonstruksi kurikulum berbasis Outcome-Based Education (OBE) untuk menyelaraskan keahlian lulusan dengan kebutuhan industri digital terkini. STI Universitas Ivet juga menjalin jejaring kolaboratif dengan berbagai institusi terkemuka untuk memfasilitasi program Magang dan Studi Independen Bersertifikat (MSIB).\";s:4:\"poin\";s:214:\"Penyusunan kurikulum OBE berstandar industri\r\nKemitraan magang dengan industri software regional & nasional\r\nInisiasi kelompok mahasiswa pertama dalam program MSIB\r\nFasilitas laboratorium praktikum komputer terpadu\";s:10:\"created_at\";s:19:\"2026-08-04 02:13:19\";s:10:\"updated_at\";s:19:\"2026-08-04 02:13:19\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:2;s:5:\"tahun\";i:2022;s:5:\"judul\";s:35:\"Pengembangan Kurikulum & Kolaborasi\";s:5:\"badge\";s:19:\"KOLABORASI INDUSTRI\";s:9:\"deskripsi\";s:357:\"Memasuki tahun kedua, program studi melakukan rekonstruksi kurikulum berbasis Outcome-Based Education (OBE) untuk menyelaraskan keahlian lulusan dengan kebutuhan industri digital terkini. STI Universitas Ivet juga menjalin jejaring kolaboratif dengan berbagai institusi terkemuka untuk memfasilitasi program Magang dan Studi Independen Bersertifikat (MSIB).\";s:4:\"poin\";s:214:\"Penyusunan kurikulum OBE berstandar industri\r\nKemitraan magang dengan industri software regional & nasional\r\nInisiasi kelompok mahasiswa pertama dalam program MSIB\r\nFasilitas laboratorium praktikum komputer terpadu\";s:10:\"created_at\";s:19:\"2026-08-04 02:13:19\";s:10:\"updated_at\";s:19:\"2026-08-04 02:13:19\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:5:\"tahun\";i:1;s:5:\"judul\";i:2;s:5:\"badge\";i:3;s:9:\"deskripsi\";i:4;s:4:\"poin\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:27:\"App\\Models\\SejarahMilestone\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:18:\"sejarah_milestones\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:3;s:5:\"tahun\";i:2024;s:5:\"judul\";s:35:\"Akreditasi \'BAIK\' BAN-PT & Prestasi\";s:5:\"badge\";s:15:\"PENJAMINAN MUTU\";s:9:\"deskripsi\";s:357:\"Melalui proses evaluasi penjaminan mutu akademik, sarana prasarana, serta komitmen dosen, Program Studi STI Universitas Ivet sukses mendapatkan peringkat akreditasi \'BAIK\' dari Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT) berdasarkan keputusan resmi No. 1201/SK/BAN-PT/Akred/S/III/2026. Mahasiswa juga mulai mengukir berbagai prestasi keorganisasian.\";s:4:\"poin\";s:191:\"Akreditasi resmi \'BAIK\' dari BAN-PT\r\nPeningkatan indeks kepuasan akademik mahasiswa\r\nInisiasi riset kolaborasi dosen dan mahasiswa\r\nPengembangan kreativitas melalui himpunan mahasiswa HIMASTI\";s:10:\"created_at\";s:19:\"2026-08-04 02:17:19\";s:10:\"updated_at\";s:19:\"2026-08-04 02:17:19\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:3;s:5:\"tahun\";i:2024;s:5:\"judul\";s:35:\"Akreditasi \'BAIK\' BAN-PT & Prestasi\";s:5:\"badge\";s:15:\"PENJAMINAN MUTU\";s:9:\"deskripsi\";s:357:\"Melalui proses evaluasi penjaminan mutu akademik, sarana prasarana, serta komitmen dosen, Program Studi STI Universitas Ivet sukses mendapatkan peringkat akreditasi \'BAIK\' dari Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT) berdasarkan keputusan resmi No. 1201/SK/BAN-PT/Akred/S/III/2026. Mahasiswa juga mulai mengukir berbagai prestasi keorganisasian.\";s:4:\"poin\";s:191:\"Akreditasi resmi \'BAIK\' dari BAN-PT\r\nPeningkatan indeks kepuasan akademik mahasiswa\r\nInisiasi riset kolaborasi dosen dan mahasiswa\r\nPengembangan kreativitas melalui himpunan mahasiswa HIMASTI\";s:10:\"created_at\";s:19:\"2026-08-04 02:17:19\";s:10:\"updated_at\";s:19:\"2026-08-04 02:17:19\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:5:\"tahun\";i:1;s:5:\"judul\";i:2;s:5:\"badge\";i:3;s:9:\"deskripsi\";i:4;s:4:\"poin\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:27:\"App\\Models\\SejarahMilestone\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:18:\"sejarah_milestones\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:4;s:5:\"tahun\";i:2026;s:5:\"judul\";s:37:\"Transformasi Digital & Inovasi Global\";s:5:\"badge\";s:20:\"AKSELERASI TEKNOLOGI\";s:9:\"deskripsi\";s:357:\"Menghadapi era kecerdasan buatan, program studi STI melakukan akselerasi digital penuh. Integrasi materi mutakhir seperti Artificial Intelligence (AI), Machine Learning, dan Cybersecurity ke dalam peminatan utama prodi. Kami juga merilis sistem informasi organisasi terpadu serta memperluas kolaborasi karir bagi lulusan agar siap bersaing di kancah global.\";s:4:\"poin\";s:230:\"Kurikulum terintegrasi kecerdasan buatan & keamanan siber\r\nPeluncuran sistem pendaftaran HIMASTI digital mandiri\r\nPusat bimbingan karir alumni langsung ke industri teknologi\r\nTransformasi metode belajar blended learning interaktif\";s:10:\"created_at\";s:19:\"2026-08-04 02:19:42\";s:10:\"updated_at\";s:19:\"2026-08-04 02:19:42\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:4;s:5:\"tahun\";i:2026;s:5:\"judul\";s:37:\"Transformasi Digital & Inovasi Global\";s:5:\"badge\";s:20:\"AKSELERASI TEKNOLOGI\";s:9:\"deskripsi\";s:357:\"Menghadapi era kecerdasan buatan, program studi STI melakukan akselerasi digital penuh. Integrasi materi mutakhir seperti Artificial Intelligence (AI), Machine Learning, dan Cybersecurity ke dalam peminatan utama prodi. Kami juga merilis sistem informasi organisasi terpadu serta memperluas kolaborasi karir bagi lulusan agar siap bersaing di kancah global.\";s:4:\"poin\";s:230:\"Kurikulum terintegrasi kecerdasan buatan & keamanan siber\r\nPeluncuran sistem pendaftaran HIMASTI digital mandiri\r\nPusat bimbingan karir alumni langsung ke industri teknologi\r\nTransformasi metode belajar blended learning interaktif\";s:10:\"created_at\";s:19:\"2026-08-04 02:19:42\";s:10:\"updated_at\";s:19:\"2026-08-04 02:19:42\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:5:\"tahun\";i:1;s:5:\"judul\";i:2;s:5:\"badge\";i:3;s:9:\"deskripsi\";i:4;s:4:\"poin\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:8:\"visiMisi\";O:19:\"App\\Models\\VisiMisi\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:9:\"visi_misi\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:14:{s:2:\"id\";i:1;s:4:\"visi\";s:206:\"Visi Keilmuan\r\n\"Menjadi Program Studi Sistem dan Teknologi Informasi yang unggul, berkarakter, dan inovatif dalam menghasilkan lulusan di bidang teknologi digital yang berdaya saing global pada tahun 2035.\"\";s:4:\"misi\";s:559:\"Menyelenggarakan proses pembelajaran yang berkualitas tinggi dengan mengadopsi kurikulum yang adaptif terhadap kemajuan sains dan kecerdasan buatan.\r\nMenyelenggarakan penelitian aplikatif yang inovatif dan terpublikasi baik di tingkat nasional maupun jurnal bereputasi internasional.\r\nMelaksanakan program pengabdian masyarakat secara berkala guna mengimplementasikan inovasi teknologi informasi untuk memecahkan problematika sosial.\r\nMembina kemitraan strategis berdaya guna dengan pemerintah, pelaku industri digital kreatif, serta lembaga akademis lainnya.\";s:6:\"tujuan\";N;s:8:\"karakter\";s:121:\"Melambangkan integritas moral, akhlak mulia, disiplin, semangat patriotisme, serta menjunjung tinggi kode etik teknologi.\";s:10:\"peo1_title\";s:22:\"Kompetensi Profesional\";s:9:\"peo1_desc\";s:150:\"Menghasilkan sarjana STI yang memiliki keahlian teknis unggul dalam menguji, membangun, mendesain, serta memelihara sistem informasi skala enterprise.\";s:10:\"peo2_title\";s:19:\"Creativepreneurship\";s:9:\"peo2_desc\";s:125:\"Membentuk alumni mandiri yang berdaya saing kreatif untuk memformulasikan solusi komersial digital (startup) secara beretika.\";s:10:\"peo3_title\";s:36:\"Eksplorasi Pembelajaran Seumur Hidup\";s:9:\"peo3_desc\";s:139:\"Mendorong kecintaan belajar berkelanjutan, baik studi pascasarjana formal maupun sertifikasi keahlian global industri (AWS, CISCO, RedHat).\";s:9:\"banner_bg\";s:55:\"visi-misi/n2udsMZiYoVoml7TfPevU47fpf5ojEZs12ieLeiY.webp\";s:10:\"created_at\";s:19:\"2026-08-04 00:08:53\";s:10:\"updated_at\";s:19:\"2026-08-05 11:37:39\";}s:11:\"\0*\0original\";a:14:{s:2:\"id\";i:1;s:4:\"visi\";s:206:\"Visi Keilmuan\r\n\"Menjadi Program Studi Sistem dan Teknologi Informasi yang unggul, berkarakter, dan inovatif dalam menghasilkan lulusan di bidang teknologi digital yang berdaya saing global pada tahun 2035.\"\";s:4:\"misi\";s:559:\"Menyelenggarakan proses pembelajaran yang berkualitas tinggi dengan mengadopsi kurikulum yang adaptif terhadap kemajuan sains dan kecerdasan buatan.\r\nMenyelenggarakan penelitian aplikatif yang inovatif dan terpublikasi baik di tingkat nasional maupun jurnal bereputasi internasional.\r\nMelaksanakan program pengabdian masyarakat secara berkala guna mengimplementasikan inovasi teknologi informasi untuk memecahkan problematika sosial.\r\nMembina kemitraan strategis berdaya guna dengan pemerintah, pelaku industri digital kreatif, serta lembaga akademis lainnya.\";s:6:\"tujuan\";N;s:8:\"karakter\";s:121:\"Melambangkan integritas moral, akhlak mulia, disiplin, semangat patriotisme, serta menjunjung tinggi kode etik teknologi.\";s:10:\"peo1_title\";s:22:\"Kompetensi Profesional\";s:9:\"peo1_desc\";s:150:\"Menghasilkan sarjana STI yang memiliki keahlian teknis unggul dalam menguji, membangun, mendesain, serta memelihara sistem informasi skala enterprise.\";s:10:\"peo2_title\";s:19:\"Creativepreneurship\";s:9:\"peo2_desc\";s:125:\"Membentuk alumni mandiri yang berdaya saing kreatif untuk memformulasikan solusi komersial digital (startup) secara beretika.\";s:10:\"peo3_title\";s:36:\"Eksplorasi Pembelajaran Seumur Hidup\";s:9:\"peo3_desc\";s:139:\"Mendorong kecintaan belajar berkelanjutan, baik studi pascasarjana formal maupun sertifikasi keahlian global industri (AWS, CISCO, RedHat).\";s:9:\"banner_bg\";s:55:\"visi-misi/n2udsMZiYoVoml7TfPevU47fpf5ojEZs12ieLeiY.webp\";s:10:\"created_at\";s:19:\"2026-08-04 00:08:53\";s:10:\"updated_at\";s:19:\"2026-08-05 11:37:39\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:11:{i:0;s:4:\"visi\";i:1;s:4:\"misi\";i:2;s:6:\"tujuan\";i:3;s:8:\"karakter\";i:4;s:10:\"peo1_title\";i:5;s:9:\"peo1_desc\";i:6;s:10:\"peo2_title\";i:7;s:9:\"peo2_desc\";i:8;s:10:\"peo3_title\";i:9;s:9:\"peo3_desc\";i:10;s:9:\"banner_bg\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}s:10:\"dosenProdi\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:4:{i:0;O:21:\"App\\Models\\DosenProdi\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:12:\"dosen_prodis\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:15:{s:2:\"id\";i:1;s:4:\"nama\";s:26:\"Kurniawati, S.Kom., M.Kom.\";s:4:\"nidn\";s:10:\"0605079101\";s:7:\"jabatan\";s:19:\"DOSEN PROGRAM STUDI\";s:4:\"foto\";s:56:\"dosen-prodi/852Dp02gK3xo0bGJtllw7W9znGQXNbgKFMJqVyt7.jpg\";s:16:\"edukasi_terakhir\";s:63:\"S2 Magister Komputer - Universitas Dian Nuswantoro (Lulus 2016)\";s:8:\"keahlian\";s:78:\"Basis Data Lanjut Rekayasa Perangkat Lunak Pemrograman Web Dasar Struktur Data\";s:5:\"email\";s:24:\"kurniawati@unisvet.ac.id\";s:11:\"ruang_kerja\";s:47:\"Lab Rekayasa Perangkat Lunak, Gedung C Lantai 1\";s:18:\"riwayat_pendidikan\";s:129:\"S1 Teknik Informatika - Universitas Dian Nuswantoro (Lulus 2013)\r\nS2 Magister Komputer - Universitas Dian Nuswantoro (Lulus 2016)\";s:11:\"mata_kuliah\";s:81:\"Basis Data Lanjut, Rekayasa Perangkat Lunak, Pemrograman Web Dasar, Struktur Data\";s:15:\"riset_publikasi\";s:234:\"\"Optimasi Kueri SQL Menggunakan Indeksasi Dinamis Pada Database Terdistribusi\"\r\n\"Sistem Informasi Inventaris Lab Berbasis Web Dengan Metodologi Scrum\"\r\n\"Analisis Usabilitas Pada Antarmuka Sistem Manajemen Pembelajaran Berbasis Moodle\"\";s:6:\"urutan\";i:1;s:10:\"created_at\";s:19:\"2026-08-04 02:31:09\";s:10:\"updated_at\";s:19:\"2026-08-04 02:31:09\";}s:11:\"\0*\0original\";a:15:{s:2:\"id\";i:1;s:4:\"nama\";s:26:\"Kurniawati, S.Kom., M.Kom.\";s:4:\"nidn\";s:10:\"0605079101\";s:7:\"jabatan\";s:19:\"DOSEN PROGRAM STUDI\";s:4:\"foto\";s:56:\"dosen-prodi/852Dp02gK3xo0bGJtllw7W9znGQXNbgKFMJqVyt7.jpg\";s:16:\"edukasi_terakhir\";s:63:\"S2 Magister Komputer - Universitas Dian Nuswantoro (Lulus 2016)\";s:8:\"keahlian\";s:78:\"Basis Data Lanjut Rekayasa Perangkat Lunak Pemrograman Web Dasar Struktur Data\";s:5:\"email\";s:24:\"kurniawati@unisvet.ac.id\";s:11:\"ruang_kerja\";s:47:\"Lab Rekayasa Perangkat Lunak, Gedung C Lantai 1\";s:18:\"riwayat_pendidikan\";s:129:\"S1 Teknik Informatika - Universitas Dian Nuswantoro (Lulus 2013)\r\nS2 Magister Komputer - Universitas Dian Nuswantoro (Lulus 2016)\";s:11:\"mata_kuliah\";s:81:\"Basis Data Lanjut, Rekayasa Perangkat Lunak, Pemrograman Web Dasar, Struktur Data\";s:15:\"riset_publikasi\";s:234:\"\"Optimasi Kueri SQL Menggunakan Indeksasi Dinamis Pada Database Terdistribusi\"\r\n\"Sistem Informasi Inventaris Lab Berbasis Web Dengan Metodologi Scrum\"\r\n\"Analisis Usabilitas Pada Antarmuka Sistem Manajemen Pembelajaran Berbasis Moodle\"\";s:6:\"urutan\";i:1;s:10:\"created_at\";s:19:\"2026-08-04 02:31:09\";s:10:\"updated_at\";s:19:\"2026-08-04 02:31:09\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:12:{i:0;s:4:\"nama\";i:1;s:4:\"nidn\";i:2;s:7:\"jabatan\";i:3;s:4:\"foto\";i:4;s:16:\"edukasi_terakhir\";i:5;s:8:\"keahlian\";i:6;s:5:\"email\";i:7;s:11:\"ruang_kerja\";i:8;s:18:\"riwayat_pendidikan\";i:9;s:11:\"mata_kuliah\";i:10;s:15:\"riset_publikasi\";i:11;s:6:\"urutan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:21:\"App\\Models\\DosenProdi\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:12:\"dosen_prodis\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:15:{s:2:\"id\";i:2;s:4:\"nama\";s:32:\"Lingga kurniawan ramdhani M,kom.\";s:4:\"nidn\";s:10:\"0610119301\";s:7:\"jabatan\";s:19:\"DOSEN PROGRAM STUDI\";s:4:\"foto\";s:56:\"dosen-prodi/ZkHU4Xqpilwb5fANm8v45noJdBGfgsi5VgjKzGs0.jpg\";s:16:\"edukasi_terakhir\";s:63:\"S2 Magister Komputer - Universitas Dian Nuswantoro (Lulus 2018)\";s:8:\"keahlian\";s:97:\"Kecerdasan Buatan Pemrograman Game Dasar Data Science & Machine Learning Pengolahan Citra Digital\";s:5:\"email\";s:27:\"lingga.kurnia@unisvet.ac.id\";s:11:\"ruang_kerja\";s:36:\"Ruang Riset Dosen, Gedung C Lantai 2\";s:18:\"riwayat_pendidikan\";s:129:\"S1 Teknik Informatika - Universitas Dian Nuswantoro (Lulus 2015)\r\nS2 Magister Komputer - Universitas Dian Nuswantoro (Lulus 2018)\";s:11:\"mata_kuliah\";s:100:\"Kecerdasan Buatan, Pemrograman Game, Dasar Data Science & Machine Learning, Pengolahan Citra Digital\";s:15:\"riset_publikasi\";s:239:\"\"Klasifikasi Kematangan Buah Lokal Berdasarkan Fitur Warna HSV Menggunakan KNN\"\r\n\"Rancang Bangun Game Edukasi Sejarah Berbasis Android Menggunakan Unity Engine\"\r\n\"Prediksi Tingkat Kelulusan Tepat Waktu Mahasiswa Menggunakan Algoritma C4.5\"\";s:6:\"urutan\";i:2;s:10:\"created_at\";s:19:\"2026-08-04 02:46:01\";s:10:\"updated_at\";s:19:\"2026-08-04 02:54:23\";}s:11:\"\0*\0original\";a:15:{s:2:\"id\";i:2;s:4:\"nama\";s:32:\"Lingga kurniawan ramdhani M,kom.\";s:4:\"nidn\";s:10:\"0610119301\";s:7:\"jabatan\";s:19:\"DOSEN PROGRAM STUDI\";s:4:\"foto\";s:56:\"dosen-prodi/ZkHU4Xqpilwb5fANm8v45noJdBGfgsi5VgjKzGs0.jpg\";s:16:\"edukasi_terakhir\";s:63:\"S2 Magister Komputer - Universitas Dian Nuswantoro (Lulus 2018)\";s:8:\"keahlian\";s:97:\"Kecerdasan Buatan Pemrograman Game Dasar Data Science & Machine Learning Pengolahan Citra Digital\";s:5:\"email\";s:27:\"lingga.kurnia@unisvet.ac.id\";s:11:\"ruang_kerja\";s:36:\"Ruang Riset Dosen, Gedung C Lantai 2\";s:18:\"riwayat_pendidikan\";s:129:\"S1 Teknik Informatika - Universitas Dian Nuswantoro (Lulus 2015)\r\nS2 Magister Komputer - Universitas Dian Nuswantoro (Lulus 2018)\";s:11:\"mata_kuliah\";s:100:\"Kecerdasan Buatan, Pemrograman Game, Dasar Data Science & Machine Learning, Pengolahan Citra Digital\";s:15:\"riset_publikasi\";s:239:\"\"Klasifikasi Kematangan Buah Lokal Berdasarkan Fitur Warna HSV Menggunakan KNN\"\r\n\"Rancang Bangun Game Edukasi Sejarah Berbasis Android Menggunakan Unity Engine\"\r\n\"Prediksi Tingkat Kelulusan Tepat Waktu Mahasiswa Menggunakan Algoritma C4.5\"\";s:6:\"urutan\";i:2;s:10:\"created_at\";s:19:\"2026-08-04 02:46:01\";s:10:\"updated_at\";s:19:\"2026-08-04 02:54:23\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:12:{i:0;s:4:\"nama\";i:1;s:4:\"nidn\";i:2;s:7:\"jabatan\";i:3;s:4:\"foto\";i:4;s:16:\"edukasi_terakhir\";i:5;s:8:\"keahlian\";i:6;s:5:\"email\";i:7;s:11:\"ruang_kerja\";i:8;s:18:\"riwayat_pendidikan\";i:9;s:11:\"mata_kuliah\";i:10;s:15:\"riset_publikasi\";i:11;s:6:\"urutan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:21:\"App\\Models\\DosenProdi\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:12:\"dosen_prodis\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:15:{s:2:\"id\";i:3;s:4:\"nama\";s:33:\"Dewi Purnama Sari, S.Kom., M.Kom.\";s:4:\"nidn\";s:10:\"0612048901\";s:7:\"jabatan\";s:20:\"KEPALA PROGRAM STUDI\";s:4:\"foto\";s:56:\"dosen-prodi/ztIdX8CrzfrwNC01lCwcQoiwI5iimqatGu2fbgOp.jpg\";s:16:\"edukasi_terakhir\";s:63:\"S2 Magister Komputer - Universitas Dian Nuswantoro (Lulus 2014)\";s:8:\"keahlian\";s:105:\"Pengantar Sistem Informasi, Tata Kelola Teknologi Informasi, Manajemen Proyek TI, Sistem Informasi Bisnis\";s:5:\"email\";s:30:\"dewi.purnamasari@unisvet.ac.id\";s:11:\"ruang_kerja\";s:36:\"Ruang Kaprodi STI, Gedung C Lantai 2\";s:18:\"riwayat_pendidikan\";s:127:\"S1 Sistem Informasi - Universitas Dian Nuswantoro (Lulus 2011)\r\nS2 Magister Komputer - Universitas Dian Nuswantoro (Lulus 2014)\";s:11:\"mata_kuliah\";s:105:\"Pengantar Sistem Informasi, Tata Kelola Teknologi Informasi, Manajemen Proyek TI, Sistem Informasi Bisnis\";s:15:\"riset_publikasi\";s:235:\"\"Analisis Kesiapan Implementasi E-Government Menggunakan Model COBIT 5\"\r\n\"Evaluasi Penerapan Enterprise Resource Planning (ERP) Pada Sektor Logistik\"\r\n\"Perancangan Arsitektur Enterprise Untuk Sistem Informasi Akademik Perguruan Tinggi\"\";s:6:\"urutan\";i:3;s:10:\"created_at\";s:19:\"2026-08-04 02:51:10\";s:10:\"updated_at\";s:19:\"2026-08-04 02:54:52\";}s:11:\"\0*\0original\";a:15:{s:2:\"id\";i:3;s:4:\"nama\";s:33:\"Dewi Purnama Sari, S.Kom., M.Kom.\";s:4:\"nidn\";s:10:\"0612048901\";s:7:\"jabatan\";s:20:\"KEPALA PROGRAM STUDI\";s:4:\"foto\";s:56:\"dosen-prodi/ztIdX8CrzfrwNC01lCwcQoiwI5iimqatGu2fbgOp.jpg\";s:16:\"edukasi_terakhir\";s:63:\"S2 Magister Komputer - Universitas Dian Nuswantoro (Lulus 2014)\";s:8:\"keahlian\";s:105:\"Pengantar Sistem Informasi, Tata Kelola Teknologi Informasi, Manajemen Proyek TI, Sistem Informasi Bisnis\";s:5:\"email\";s:30:\"dewi.purnamasari@unisvet.ac.id\";s:11:\"ruang_kerja\";s:36:\"Ruang Kaprodi STI, Gedung C Lantai 2\";s:18:\"riwayat_pendidikan\";s:127:\"S1 Sistem Informasi - Universitas Dian Nuswantoro (Lulus 2011)\r\nS2 Magister Komputer - Universitas Dian Nuswantoro (Lulus 2014)\";s:11:\"mata_kuliah\";s:105:\"Pengantar Sistem Informasi, Tata Kelola Teknologi Informasi, Manajemen Proyek TI, Sistem Informasi Bisnis\";s:15:\"riset_publikasi\";s:235:\"\"Analisis Kesiapan Implementasi E-Government Menggunakan Model COBIT 5\"\r\n\"Evaluasi Penerapan Enterprise Resource Planning (ERP) Pada Sektor Logistik\"\r\n\"Perancangan Arsitektur Enterprise Untuk Sistem Informasi Akademik Perguruan Tinggi\"\";s:6:\"urutan\";i:3;s:10:\"created_at\";s:19:\"2026-08-04 02:51:10\";s:10:\"updated_at\";s:19:\"2026-08-04 02:54:52\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:12:{i:0;s:4:\"nama\";i:1;s:4:\"nidn\";i:2;s:7:\"jabatan\";i:3;s:4:\"foto\";i:4;s:16:\"edukasi_terakhir\";i:5;s:8:\"keahlian\";i:6;s:5:\"email\";i:7;s:11:\"ruang_kerja\";i:8;s:18:\"riwayat_pendidikan\";i:9;s:11:\"mata_kuliah\";i:10;s:15:\"riset_publikasi\";i:11;s:6:\"urutan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:21:\"App\\Models\\DosenProdi\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:12:\"dosen_prodis\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:15:{s:2:\"id\";i:5;s:4:\"nama\";s:21:\"Jumrianto, S.T., M.T.\";s:4:\"nidn\";N;s:7:\"jabatan\";s:19:\"DOSEN PROGRAM STUDI\";s:4:\"foto\";s:56:\"dosen-prodi/ftBd1ErZ1Ri6OCThKQ8bsKt93KyaSE1buaa7y6Af.png\";s:16:\"edukasi_terakhir\";s:34:\"S2 Universitas Diponegoro Semarang\";s:8:\"keahlian\";N;s:5:\"email\";s:23:\"jumrianto@unisvet.ac.id\";s:11:\"ruang_kerja\";N;s:18:\"riwayat_pendidikan\";s:67:\"S1 Universitas UNIMUS Semarang \r\nS2 Universitas Diponegoro Semarang\";s:11:\"mata_kuliah\";N;s:15:\"riset_publikasi\";s:597:\"Jurnal SINTA 5, Media Elektrika : Perancangan Dan Pembuatan Prototipe KwhMeter Digital 1 Fase Berbasis Microcontroller AVR ATMega32, 2016 \r\nScopus and IEEE Indeks, Presenter and Author : The 2017 4th International Conference On Information Technology, Computer, And Electrical Engineering (ICITACEE) Proceedings : Design and Development of Data Acquisition for Leakage Current at Electrical Tracking Test Semarang, Indonesia October 18-19, 2017.  \r\nScopus and IEEE Indeks, Presenter and Author : The 2018 5th International Conference On Information Technology, Computer, And Electrical Engineering\";s:6:\"urutan\";i:4;s:10:\"created_at\";s:19:\"2026-08-09 18:32:11\";s:10:\"updated_at\";s:19:\"2026-08-09 18:32:31\";}s:11:\"\0*\0original\";a:15:{s:2:\"id\";i:5;s:4:\"nama\";s:21:\"Jumrianto, S.T., M.T.\";s:4:\"nidn\";N;s:7:\"jabatan\";s:19:\"DOSEN PROGRAM STUDI\";s:4:\"foto\";s:56:\"dosen-prodi/ftBd1ErZ1Ri6OCThKQ8bsKt93KyaSE1buaa7y6Af.png\";s:16:\"edukasi_terakhir\";s:34:\"S2 Universitas Diponegoro Semarang\";s:8:\"keahlian\";N;s:5:\"email\";s:23:\"jumrianto@unisvet.ac.id\";s:11:\"ruang_kerja\";N;s:18:\"riwayat_pendidikan\";s:67:\"S1 Universitas UNIMUS Semarang \r\nS2 Universitas Diponegoro Semarang\";s:11:\"mata_kuliah\";N;s:15:\"riset_publikasi\";s:597:\"Jurnal SINTA 5, Media Elektrika : Perancangan Dan Pembuatan Prototipe KwhMeter Digital 1 Fase Berbasis Microcontroller AVR ATMega32, 2016 \r\nScopus and IEEE Indeks, Presenter and Author : The 2017 4th International Conference On Information Technology, Computer, And Electrical Engineering (ICITACEE) Proceedings : Design and Development of Data Acquisition for Leakage Current at Electrical Tracking Test Semarang, Indonesia October 18-19, 2017.  \r\nScopus and IEEE Indeks, Presenter and Author : The 2018 5th International Conference On Information Technology, Computer, And Electrical Engineering\";s:6:\"urutan\";i:4;s:10:\"created_at\";s:19:\"2026-08-09 18:32:11\";s:10:\"updated_at\";s:19:\"2026-08-09 18:32:31\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:12:{i:0;s:4:\"nama\";i:1;s:4:\"nidn\";i:2;s:7:\"jabatan\";i:3;s:4:\"foto\";i:4;s:16:\"edukasi_terakhir\";i:5;s:8:\"keahlian\";i:6;s:5:\"email\";i:7;s:11:\"ruang_kerja\";i:8;s:18:\"riwayat_pendidikan\";i:9;s:11:\"mata_kuliah\";i:10;s:15:\"riset_publikasi\";i:11;s:6:\"urutan\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"beritaList\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:3:{i:0;O:22:\"App\\Models\\BeritaProdi\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:13:\"berita_prodis\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:1;s:5:\"judul\";s:67:\"Mahahsiswa semester 8 sistem dan teknologi informasi,LOLOS sinta 3!\";s:8:\"kategori\";s:6:\"berita\";s:6:\"gambar\";s:57:\"berita-prodi/egqSZlYFsySULhpsikn7tnPOsMmH7M6FbNzx7uQG.png\";s:7:\"tanggal\";s:10:\"2026-08-06\";s:9:\"ringkasan\";s:45:\"LOLOS publikasi jurnal terkreditasi sinta 3!!\";s:6:\"konten\";s:168:\"Wijayanti kususma sari mahasiswa Sistem dan teknologi informasi lolos publikasi sinta terkareditasi sinta .pencapaian yang sangat luar biasa atas pencapain mahahswa STI\";s:6:\"urutan\";i:1;s:14:\"tampil_beranda\";i:1;s:10:\"created_at\";s:19:\"2026-08-06 10:03:25\";s:10:\"updated_at\";s:19:\"2026-08-06 10:03:25\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:1;s:5:\"judul\";s:67:\"Mahahsiswa semester 8 sistem dan teknologi informasi,LOLOS sinta 3!\";s:8:\"kategori\";s:6:\"berita\";s:6:\"gambar\";s:57:\"berita-prodi/egqSZlYFsySULhpsikn7tnPOsMmH7M6FbNzx7uQG.png\";s:7:\"tanggal\";s:10:\"2026-08-06\";s:9:\"ringkasan\";s:45:\"LOLOS publikasi jurnal terkreditasi sinta 3!!\";s:6:\"konten\";s:168:\"Wijayanti kususma sari mahasiswa Sistem dan teknologi informasi lolos publikasi sinta terkareditasi sinta .pencapaian yang sangat luar biasa atas pencapain mahahswa STI\";s:6:\"urutan\";i:1;s:14:\"tampil_beranda\";i:1;s:10:\"created_at\";s:19:\"2026-08-06 10:03:25\";s:10:\"updated_at\";s:19:\"2026-08-06 10:03:25\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:7:\"tanggal\";s:4:\"date\";s:14:\"tampil_beranda\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:5:\"judul\";i:1;s:8:\"kategori\";i:2;s:6:\"gambar\";i:3;s:7:\"tanggal\";i:4;s:9:\"ringkasan\";i:5;s:6:\"konten\";i:6;s:6:\"urutan\";i:7;s:14:\"tampil_beranda\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:22:\"App\\Models\\BeritaProdi\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:13:\"berita_prodis\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:17;s:5:\"judul\";s:57:\"2 mahasiswa sistem dan teknologi informasi LOLOS TNI AD!!\";s:8:\"kategori\";s:6:\"berita\";s:6:\"gambar\";s:57:\"berita-prodi/7N8wl237YTnJFjGgF3QolrM4w73XfUexc7gjFDmb.png\";s:7:\"tanggal\";s:10:\"2026-08-10\";s:9:\"ringkasan\";s:89:\"prestasi yang gemilang 2 mahasiswa sistem dan teknologi informasi semester 6 lolos TNI AD\";s:6:\"konten\";s:233:\"2 mahasiswa sistem dan teknologi informasi semester 6 lolos TNI AD,aditiya prakoso asal semarang,dan fernanada aditiya asal semarang menorehkan prrestasi yang sangat luar biasa,dan menjadi kebanggaan program studi atas pencapaian nya\";s:6:\"urutan\";i:2;s:14:\"tampil_beranda\";i:1;s:10:\"created_at\";s:19:\"2026-08-09 19:40:48\";s:10:\"updated_at\";s:19:\"2026-08-09 19:43:46\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:17;s:5:\"judul\";s:57:\"2 mahasiswa sistem dan teknologi informasi LOLOS TNI AD!!\";s:8:\"kategori\";s:6:\"berita\";s:6:\"gambar\";s:57:\"berita-prodi/7N8wl237YTnJFjGgF3QolrM4w73XfUexc7gjFDmb.png\";s:7:\"tanggal\";s:10:\"2026-08-10\";s:9:\"ringkasan\";s:89:\"prestasi yang gemilang 2 mahasiswa sistem dan teknologi informasi semester 6 lolos TNI AD\";s:6:\"konten\";s:233:\"2 mahasiswa sistem dan teknologi informasi semester 6 lolos TNI AD,aditiya prakoso asal semarang,dan fernanada aditiya asal semarang menorehkan prrestasi yang sangat luar biasa,dan menjadi kebanggaan program studi atas pencapaian nya\";s:6:\"urutan\";i:2;s:14:\"tampil_beranda\";i:1;s:10:\"created_at\";s:19:\"2026-08-09 19:40:48\";s:10:\"updated_at\";s:19:\"2026-08-09 19:43:46\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:7:\"tanggal\";s:4:\"date\";s:14:\"tampil_beranda\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:5:\"judul\";i:1;s:8:\"kategori\";i:2;s:6:\"gambar\";i:3;s:7:\"tanggal\";i:4;s:9:\"ringkasan\";i:5;s:6:\"konten\";i:6;s:6:\"urutan\";i:7;s:14:\"tampil_beranda\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:22:\"App\\Models\\BeritaProdi\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:13:\"berita_prodis\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:18;s:5:\"judul\";s:71:\"TIM IT program studi sitem dan teknologi informasi LOLOS penanaan PKM!!\";s:8:\"kategori\";s:6:\"berita\";s:6:\"gambar\";s:57:\"berita-prodi/n8F95sitXIOpsDGaEZw4emAd7NqIEpmOxOKM8UyB.png\";s:7:\"tanggal\";s:10:\"2026-08-10\";s:9:\"ringkasan\";s:56:\"HEBAT TIM IT sistem dan teknologi informasi lolos PKM!!!\";s:6:\"konten\";s:169:\"Tim IT STI yang beranggotakan anak anak hebat dari semester 4 meraih prestasi ,lolos pendanaan pkm,dengan membuat program kacamata pintar khusus tuna rungu,menarikkkkk!!\";s:6:\"urutan\";i:3;s:14:\"tampil_beranda\";i:1;s:10:\"created_at\";s:19:\"2026-08-09 19:42:22\";s:10:\"updated_at\";s:19:\"2026-08-09 19:42:58\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:18;s:5:\"judul\";s:71:\"TIM IT program studi sitem dan teknologi informasi LOLOS penanaan PKM!!\";s:8:\"kategori\";s:6:\"berita\";s:6:\"gambar\";s:57:\"berita-prodi/n8F95sitXIOpsDGaEZw4emAd7NqIEpmOxOKM8UyB.png\";s:7:\"tanggal\";s:10:\"2026-08-10\";s:9:\"ringkasan\";s:56:\"HEBAT TIM IT sistem dan teknologi informasi lolos PKM!!!\";s:6:\"konten\";s:169:\"Tim IT STI yang beranggotakan anak anak hebat dari semester 4 meraih prestasi ,lolos pendanaan pkm,dengan membuat program kacamata pintar khusus tuna rungu,menarikkkkk!!\";s:6:\"urutan\";i:3;s:14:\"tampil_beranda\";i:1;s:10:\"created_at\";s:19:\"2026-08-09 19:42:22\";s:10:\"updated_at\";s:19:\"2026-08-09 19:42:58\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:2:{s:7:\"tanggal\";s:4:\"date\";s:14:\"tampil_beranda\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:8:{i:0;s:5:\"judul\";i:1;s:8:\"kategori\";i:2;s:6:\"gambar\";i:3;s:7:\"tanggal\";i:4;s:9:\"ringkasan\";i:5;s:6:\"konten\";i:6;s:6:\"urutan\";i:7;s:14:\"tampil_beranda\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}', 1787990366);
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-site_settings', 'a:72:{s:16:\"total_pengunjung\";s:2:\"23\";s:10:\"nama_prodi\";s:28:\"Sistem & Teknologi Informasi\";s:11:\"nama_kampus\";s:25:\"Universitas IVET Semarang\";s:6:\"alamat\";s:95:\"Jl. Pawiyatan Luhur IV No.17, Bendan Duwur, Kec. Gajahmungkur, Kota Semarang, Jawa Tengah 50234\";s:7:\"telepon\";s:14:\"(024) 841-7020\";s:5:\"email\";s:17:\"sti@unisvet.ac.id\";s:9:\"instagram\";s:37:\"https://www.instagram.com/sti_unisvet\";s:8:\"facebook\";s:32:\"https://www.facebook.com/unisvet\";s:7:\"youtube\";s:32:\"https://www.youtube.com/@unisvet\";s:10:\"hero_badge\";s:25:\"Universitas IVET Semarang\";s:8:\"pmb_link\";s:26:\"https://pmb.unisvet.ac.id/\";s:12:\"kaprodi_nama\";s:29:\"Dewi Purnama Sari, S.T, M.ng.\";s:15:\"kaprodi_jabatan\";s:19:\"Ketua Program Studi\";s:12:\"kaprodi_nidn\";s:10:\"0612048901\";s:13:\"kaprodi_judul\";s:80:\"\"Selamat Datang di Portal Resmi Sistem dan Teknologi Informasi Universitas Ivet\"\";s:16:\"kaprodi_sambutan\";s:409:\"“Di era modern yang dipacu oleh lompatan kecerdasan buatan, komputasi awan, dan internet of things, pemahaman komprehensif mengenai Sistem dan Teknologi Informasi adalah pilar utama kemajuan bangsa. Kami di Universitas Ivet berkomitmen tidak hanya mencetak tenaga teknis, melainkan arsitek solusi digital masa depan yang memegang teguh integritas moral, moralitas yang luhur, dan kreativitas tanpa batas.”\";s:17:\"kaprodi_sambutan2\";s:253:\"Kami mengundang rekan-rekan mahasiswa sekalian untuk bergabung secara aktif dalam roda keorganisasian kemahasiswaan lewat HIMASTI (Himpunan Mahasiswa Sistem dan Teknologi Informasi) sebagai wadah inkubator bakat sains, kepemimpinan, dan inovasi bersama.\";s:11:\"rektor_nama\";N;s:14:\"rektor_jabatan\";N;s:11:\"rektor_nidn\";N;s:12:\"rektor_judul\";N;s:15:\"rektor_sambutan\";N;s:16:\"rektor_sambutan2\";N;s:12:\"kaprodi_foto\";s:53:\"settings/XHLbugqU9pnO8p0bjOAtVuBuMWY7zQyD6Y2OCz1O.jpg\";s:16:\"brosur_1_caption\";s:44:\"Profil STI, Program Unggulan & Rincian Biaya\";s:16:\"brosur_2_caption\";s:42:\"Beasiswa, Karir Lulusan & Alur Pendaftaran\";s:4:\"logo\";s:53:\"settings/SCSDZ5xto96XqcMfqyeSiy5NDBV9voBkDhGM3n8p.png\";s:8:\"brosur_1\";s:53:\"settings/bpSNDwHwLdbzG5lWNyD9TNJkaVYH1XZbxOl3cQfm.jpg\";s:8:\"brosur_2\";s:53:\"settings/HpTzeXauL4AbjxEN7Oc5N6IpfjRMysSdA1gZ27zH.jpg\";s:11:\"pilar_title\";s:26:\"Bidang Kompetensi Keilmuan\";s:10:\"pilar_desc\";s:106:\"Kami mengintegrasikan dua kutub keilmuan teknologi untuk menghasilkan pengembang sistem informasi mumpuni.\";s:12:\"pilar1_title\";s:23:\"Sistem Informasi Bisnis\";s:11:\"pilar1_desc\";s:161:\"Mempelajari cara mendesain, mengintegrasikan, dan memelihara sistem informasi guna mendukung efisiensi pengambilan keputusan bisnis korporasi maupun UMKM modern.\";s:13:\"pilar1_skills\";s:62:\"Enterprise Architecture, Data Analytics, IT Project Management\";s:12:\"pilar2_title\";s:27:\"Teknologi Informasi & Cloud\";s:11:\"pilar2_desc\";s:171:\"Membahas arsitektur infrastruktur teknologi, cloud computing (serverless/virtualisasi), administrasi server Linux, keamanan jaringan siber, serta Internet of Things (IoT).\";s:13:\"pilar2_skills\";s:47:\"Cloud Solutions, Linux Sysadmin, Cyber Security\";s:12:\"pilar3_title\";s:24:\"Rekayasa Perangkat Lunak\";s:11:\"pilar3_desc\";s:173:\"Menempa kemampuan coding aplikatif, mencakup fullstack web development, pembuatan aplikasi mobile android/iOS, integrasi kecerdasan buatan (Generative AI), dan UI/UX design.\";s:13:\"pilar3_skills\";s:49:\"React & Node.js Mobile App Dev AI SDK Integration\";s:9:\"pilar1_bg\";s:54:\"settings/LXqosaS9PTjmwdP4FgIIf9SXw70WNOJXaPbha1EO.webp\";s:9:\"pilar2_bg\";s:53:\"settings/N5lpcJYphGSXmUBDET6H1Q98VZ5DpHkoP9Yb0cv4.jpg\";s:9:\"pilar3_bg\";s:53:\"settings/bepl5x5dHPBELPGqQZoQ5vY9Ne8zUTgyXEjkn6js.jpg\";s:12:\"berita_title\";s:27:\"Berita & Kegiatan Prodi STI\";s:11:\"berita_desc\";s:144:\"Eksplorasi lini pemberitahuan kegiatan mahasiswa, event seminar nasional, pengabdian masyarakat, serta sederet prestasi mentereng program studi.\";s:9:\"berita_bg\";s:54:\"settings/pxIweecmiI69a5VS09dLKoBHxTpzdUuYYTEs02OJ.webp\";s:13:\"prospek_title\";s:42:\"Prospek Karir Lulusan STI Universitas Ivet\";s:12:\"prospek_desc\";s:219:\"Sektor digital yang terus berekspansi pesat membuka peluang karir tanpa batas bagi Sarjana Komputer lulusan prodi Sistem dan Teknologi Informasi. Kami merancang profil lulusan agar siap mengisi peran strategis industri.\";s:14:\"prospek1_title\";s:30:\"Fullstack Web/Mobile Developer\";s:13:\"prospek1_desc\";s:68:\"Membangun aplikasi website interaktif serta aplikasi seluler modern.\";s:14:\"prospek2_title\";s:30:\"System Analyst & IT Consultant\";s:13:\"prospek2_desc\";s:73:\"Menganalisis kebutuhan perangkat lunak korporat dan memberikan solusi TI.\";s:14:\"prospek3_title\";s:29:\"Network & Cloud Administrator\";s:13:\"prospek3_desc\";s:73:\"Mengelola server cloud serta menjaga reliabilitas infrastruktur komputer.\";s:14:\"prospek4_title\";s:18:\"IT Project Manager\";s:13:\"prospek4_desc\";s:88:\"Memimpin tim pengembang, merencanakan, serta memastikan kesuksesan rilis produk digital.\";s:13:\"sejarah_title\";s:32:\"Sejarah Pendirian & Perkembangan\";s:12:\"sejarah_desc\";s:125:\"Alur sejarah perjalanan pendirian program studi, SK resmi kementerian, milestone perkembangan, Sistem dan Teknologi Informasi\";s:10:\"sejarah_bg\";s:54:\"settings/MXUNFxLW4ZBrJdPWLc7vhv0WdjpbLZGP1PmJGOY0.webp\";s:19:\"repository_sti_link\";s:18:\"https://edlink.id/\";s:14:\"sosmed1_handle\";N;s:12:\"sosmed1_desc\";N;s:12:\"sosmed1_link\";s:37:\"https://www.instagram.com/sti_unisvet\";s:14:\"sosmed2_handle\";N;s:12:\"sosmed2_desc\";N;s:12:\"sosmed2_link\";s:39:\"https://www.instagram.com/himasti_ivet/\";s:14:\"sosmed3_handle\";N;s:12:\"sosmed3_desc\";N;s:12:\"sosmed3_link\";s:35:\"https://www.tiktok.com/@sti_unisvet\";s:14:\"sosmed4_handle\";N;s:12:\"sosmed4_desc\";N;s:12:\"sosmed4_link\";s:68:\"https://www.tiktok.com/@himastivet?is_from_webapp=1&sender_device=pc\";}', 1787990366),
('laravel-cache-visitor.online.85BWm4npQxtZ7xgNpfp2AKJVKN3P7ccR8BC5Coeg', 'b:1;', 1786299755),
('laravel-cache-visitor.online.9RHHruIOdiB4xG2teIcyzAke0Vr2xRdouOCGtjnX', 'b:1;', 1786264737),
('laravel-cache-visitor.online.bTROd3bWi7pcWfFxvH5fzNmnqYbEnMI3LRFeot48', 'b:1;', 1786260377),
('laravel-cache-visitor.online.HgGQSBoBWESGLoV1eDNqPh6ga8BmlOPKqaat4X4B', 'b:1;', 1787987065),
('laravel-cache-visitor.online.Ho5KcxtFA8249cBtb2PPQo9QdgrcFW5gJdSfkgag', 'b:1;', 1786304868),
('laravel-cache-visitor.online.hSCqJbobtD05ihf8LUhpL5XzzyfAwFNKCj4ekiMd', 'b:1;', 1786208123),
('laravel-cache-visitor.online.kMcNiVkeF9ikTpWcdJ3xTsVkPSh9YO1VwB2sVMgb', 'b:1;', 1787987065),
('laravel-cache-visitor.online.r4X7IwvQArFPpPE3t1IvfI9M0Z2uHGPFqhOXNsOV', 'b:1;', 1786263753),
('laravel-cache-visitor.online.SH3slHN4viwAWrV4uwNjbsCZp7AEiuFMUmC59gxO', 'b:1;', 1787987073),
('laravel-cache-visitor.online.TUzzTbbkGeUjKy3zGS25Z5qPqPSGfxLCwB2MSAjc', 'b:1;', 1786286738),
('laravel-cache-visitor.online.vlzPO80mL0Dtew63unClOWS0ly1aD7EKEBdRdF1f', 'b:1;', 1786287595),
('laravel-cache-visitor.online.YHv9RIoCQ4nR2AtSP4nqTS1h7KWAxmvNRJVBMcPx', 'b:1;', 1787987073),
('laravel-cache-visitor.online.YQ1zoHzu93co6E1NclRWHGjOvDVC1fIffhl6CNYG', 'b:1;', 1787987065),
('laravel-cache-visitor.total', 'i:23;', 1787987066);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache_locks`
--

INSERT INTO `cache_locks` (`key`, `owner`, `expiration`) VALUES
('laravel-cache-visitor.count.lock', 'VFMlIgoVzEcYslPd', 1787986775);

-- --------------------------------------------------------

--
-- Struktur dari tabel `class_programs`
--

CREATE TABLE `class_programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_program` varchar(255) NOT NULL,
  `jenis_kelas` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen_prodis`
--

CREATE TABLE `dosen_prodis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nidn` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `edukasi_terakhir` varchar(255) DEFAULT NULL,
  `keahlian` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ruang_kerja` varchar(255) DEFAULT NULL,
  `riwayat_pendidikan` text DEFAULT NULL,
  `mata_kuliah` text DEFAULT NULL,
  `riset_publikasi` text DEFAULT NULL,
  `urutan` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosen_prodis`
--

INSERT INTO `dosen_prodis` (`id`, `nama`, `nidn`, `jabatan`, `foto`, `edukasi_terakhir`, `keahlian`, `email`, `ruang_kerja`, `riwayat_pendidikan`, `mata_kuliah`, `riset_publikasi`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Kurniawati, S.Kom., M.Kom.', '0605079101', 'DOSEN PROGRAM STUDI', 'dosen-prodi/852Dp02gK3xo0bGJtllw7W9znGQXNbgKFMJqVyt7.jpg', 'S2 Magister Komputer - Universitas Dian Nuswantoro (Lulus 2016)', 'Basis Data Lanjut Rekayasa Perangkat Lunak Pemrograman Web Dasar Struktur Data', 'kurniawati@unisvet.ac.id', 'Lab Rekayasa Perangkat Lunak, Gedung C Lantai 1', 'S1 Teknik Informatika - Universitas Dian Nuswantoro (Lulus 2013)\r\nS2 Magister Komputer - Universitas Dian Nuswantoro (Lulus 2016)', 'Basis Data Lanjut, Rekayasa Perangkat Lunak, Pemrograman Web Dasar, Struktur Data', '\"Optimasi Kueri SQL Menggunakan Indeksasi Dinamis Pada Database Terdistribusi\"\r\n\"Sistem Informasi Inventaris Lab Berbasis Web Dengan Metodologi Scrum\"\r\n\"Analisis Usabilitas Pada Antarmuka Sistem Manajemen Pembelajaran Berbasis Moodle\"', 1, '2026-08-03 19:31:09', '2026-08-03 19:31:09'),
(2, 'Lingga kurniawan ramdhani M,kom.', '0610119301', 'DOSEN PROGRAM STUDI', 'dosen-prodi/ZkHU4Xqpilwb5fANm8v45noJdBGfgsi5VgjKzGs0.jpg', 'S2 Magister Komputer - Universitas Dian Nuswantoro (Lulus 2018)', 'Kecerdasan Buatan Pemrograman Game Dasar Data Science & Machine Learning Pengolahan Citra Digital', 'lingga.kurnia@unisvet.ac.id', 'Ruang Riset Dosen, Gedung C Lantai 2', 'S1 Teknik Informatika - Universitas Dian Nuswantoro (Lulus 2015)\r\nS2 Magister Komputer - Universitas Dian Nuswantoro (Lulus 2018)', 'Kecerdasan Buatan, Pemrograman Game, Dasar Data Science & Machine Learning, Pengolahan Citra Digital', '\"Klasifikasi Kematangan Buah Lokal Berdasarkan Fitur Warna HSV Menggunakan KNN\"\r\n\"Rancang Bangun Game Edukasi Sejarah Berbasis Android Menggunakan Unity Engine\"\r\n\"Prediksi Tingkat Kelulusan Tepat Waktu Mahasiswa Menggunakan Algoritma C4.5\"', 2, '2026-08-03 19:46:01', '2026-08-03 19:54:23'),
(3, 'Dewi Purnama Sari, S.Kom., M.Kom.', '0612048901', 'KEPALA PROGRAM STUDI', 'dosen-prodi/ztIdX8CrzfrwNC01lCwcQoiwI5iimqatGu2fbgOp.jpg', 'S2 Magister Komputer - Universitas Dian Nuswantoro (Lulus 2014)', 'Pengantar Sistem Informasi, Tata Kelola Teknologi Informasi, Manajemen Proyek TI, Sistem Informasi Bisnis', 'dewi.purnamasari@unisvet.ac.id', 'Ruang Kaprodi STI, Gedung C Lantai 2', 'S1 Sistem Informasi - Universitas Dian Nuswantoro (Lulus 2011)\r\nS2 Magister Komputer - Universitas Dian Nuswantoro (Lulus 2014)', 'Pengantar Sistem Informasi, Tata Kelola Teknologi Informasi, Manajemen Proyek TI, Sistem Informasi Bisnis', '\"Analisis Kesiapan Implementasi E-Government Menggunakan Model COBIT 5\"\r\n\"Evaluasi Penerapan Enterprise Resource Planning (ERP) Pada Sektor Logistik\"\r\n\"Perancangan Arsitektur Enterprise Untuk Sistem Informasi Akademik Perguruan Tinggi\"', 3, '2026-08-03 19:51:10', '2026-08-03 19:54:52'),
(5, 'Jumrianto, S.T., M.T.', NULL, 'DOSEN PROGRAM STUDI', 'dosen-prodi/ftBd1ErZ1Ri6OCThKQ8bsKt93KyaSE1buaa7y6Af.png', 'S2 Universitas Diponegoro Semarang', NULL, 'jumrianto@unisvet.ac.id', NULL, 'S1 Universitas UNIMUS Semarang \r\nS2 Universitas Diponegoro Semarang', NULL, 'Jurnal SINTA 5, Media Elektrika : Perancangan Dan Pembuatan Prototipe KwhMeter Digital 1 Fase Berbasis Microcontroller AVR ATMega32, 2016 \r\nScopus and IEEE Indeks, Presenter and Author : The 2017 4th International Conference On Information Technology, Computer, And Electrical Engineering (ICITACEE) Proceedings : Design and Development of Data Acquisition for Leakage Current at Electrical Tracking Test Semarang, Indonesia October 18-19, 2017.  \r\nScopus and IEEE Indeks, Presenter and Author : The 2018 5th International Conference On Information Technology, Computer, And Electrical Engineering', 4, '2026-08-09 11:32:11', '2026-08-09 11:32:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ebooks`
--

CREATE TABLE `ebooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `kategori` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `halaman` int(10) UNSIGNED DEFAULT NULL,
  `ukuran_bytes` bigint(20) UNSIGNED DEFAULT NULL,
  `unduhan` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `urutan` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ebooks`
--

INSERT INTO `ebooks` (`id`, `judul`, `penulis`, `tahun`, `kategori`, `deskripsi`, `cover`, `file`, `halaman`, `ukuran_bytes`, `unduhan`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Scrum The Complete Guide to the Agile Project Management Framework', 'Josh Wright', '2020', 'Software Engineering & Manajemen Proyek', NULL, 'ebooks/covers/ebook-001.jpg', 'ebooks/files/ebook-001.pdf', 95, 736023, 0, 1, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(2, 'Engineering Software Products An Introduction to Modern Software Engineering', 'Ian Sommerville', '2021', 'Software Engineering & Manajemen Proyek', NULL, 'ebooks/covers/ebook-002.jpg', 'ebooks/files/ebook-002.pdf', 369, 8948492, 0, 2, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(3, 'Information Technology for Management, 12e', 'Efraim Turban, Carol Pollard, Gregory Wood', '2021', 'Teknologi Informasi Umum', NULL, 'ebooks/covers/ebook-003.jpg', 'ebooks/files/ebook-003.pdf', 642, 42687744, 0, 3, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(4, 'The Project Management Handbook Simplified Agile, Scrum and DevOps for Beginners by Academy, The Gross, Erik Stanley, Jack', 'Academy, The & Gross, Erik & Stanley, Jack', '2021', 'Software Engineering & Manajemen Proyek', NULL, 'ebooks/covers/ebook-004.jpg', 'ebooks/files/ebook-004.pdf', 98, 1840280, 0, 4, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(5, 'Scrum For Dummies (For Dummies (ComputerTech))', 'Mark C. Layton', '2022', 'Software Engineering & Manajemen Proyek', NULL, 'ebooks/covers/ebook-005.jpg', 'ebooks/files/ebook-005.pdf', 435, 16182074, 0, 5, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(6, 'Cryptography and Network Security Principles and Practice, Global Edition', 'William Stallings', '2023', 'Sistem Operasi, Jaringan & Keamanan', NULL, 'ebooks/covers/ebook-006.jpg', 'ebooks/files/ebook-006.pdf', 833, 24397977, 0, 6, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(7, 'Software Engineering Basic Principles and Best Practices', 'Ravi Sethi', '2023', 'Software Engineering & Manajemen Proyek', NULL, 'ebooks/covers/ebook-007.jpg', 'ebooks/files/ebook-007.pdf', 807, 7500798, 0, 7, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(8, 'Business Intelligence, Analytics, Data Science, and AI A Managerial Perspective', 'Ramesh Sharda Dursun Delen Efraim Turban', '2024', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-008.jpg', 'ebooks/files/ebook-008.pdf', 727, 15033727, 0, 8, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(9, 'Core Concepts in Computer Science Operating Systems (2nd Edition)', 'Emmanuelle Godeau', '2024', 'Sistem Operasi, Jaringan & Keamanan', NULL, 'ebooks/covers/ebook-009.jpg', 'ebooks/files/ebook-009.pdf', 306, 14303950, 0, 9, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(10, 'Illustrated Handbook of Advanced Operating Systems and Kernel Applications', 'Romina Coin', '2024', 'Sistem Operasi, Jaringan & Keamanan', NULL, 'ebooks/covers/ebook-010.jpg', 'ebooks/files/ebook-010.pdf', 316, 13623353, 0, 10, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(11, 'Illustrated Handbook of Classic Operating Systems', 'Rodrigo Padilha', '2024', 'Sistem Operasi, Jaringan & Keamanan', NULL, 'ebooks/covers/ebook-011.jpg', 'ebooks/files/ebook-011.pdf', 312, 15079154, 0, 11, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(12, 'Modern Software Engineering Guidebook', 'Dr. Shakti Kundu', '2024', 'Software Engineering & Manajemen Proyek', NULL, 'ebooks/covers/ebook-012.jpg', 'ebooks/files/ebook-012.pdf', 363, 31311917, 0, 12, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(13, 'Software Engineering, 2nd Edition', 'David C. Kung', '2024', 'Software Engineering & Manajemen Proyek', NULL, 'ebooks/covers/ebook-013.jpg', 'ebooks/files/ebook-013.pdf', 687, 25658695, 0, 13, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(14, 'The Future of Human-Computer Integration Industry 5.0 Technology, Tools, and Algorithms', 'Norliza Katuk, Roberto Vergallo dkk.', '2024', 'Ilmu Komputer Teoretis & Struktur Data', NULL, 'ebooks/covers/ebook-014.jpg', 'ebooks/files/ebook-014.pdf', 170, 7984744, 0, 14, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(15, 'The Illustrated Guide to Scrum Scrum explained through infographics', 'Peter B. Stevens', '2024', 'Software Engineering & Manajemen Proyek', NULL, 'ebooks/covers/ebook-015.jpg', 'ebooks/files/ebook-015.pdf', 61, 19080183, 0, 15, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(16, 'The Scrum Master Guide A practical guide to successfully practicing Scrum and achieving Scrum Master certifications', 'Fred Heath', '2024', 'Software Engineering & Manajemen Proyek', NULL, 'ebooks/covers/ebook-016.jpg', 'ebooks/files/ebook-016.pdf', 206, 1906089, 0, 16, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(17, 'Computational Intelligence and Human–Computer Interaction Modern Methods and Applications, Second Edition', 'Grigoreta-Sofia Cojocar dkk.', '2025', 'Ilmu Komputer Teoretis & Struktur Data', NULL, 'ebooks/covers/ebook-017.jpg', 'ebooks/files/ebook-017.pdf', 218, 16566583, 0, 17, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(18, 'Human-Computer Interaction and Augmented Intelligence The Paradigm of Interactive Machine Learning in Educational Software', 'Christos Troussas, Akrivi Krouska dkk.', '2025', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-018.jpg', 'ebooks/files/ebook-018.pdf', 443, 7381032, 0, 18, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(19, 'Quantum Computing and Quantum Machine Learning for Engineers and Developers', 'Jesse Van Griensven Thé, Roydon Andrew Fraser dkk.', '2025', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-019.jpg', 'ebooks/files/ebook-019.pdf', 705, 5677371, 0, 19, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(20, 'Quantum Machine Learning in Industrial Automation', 'Anupam Ghosh, Soumi Dutta, Asit Kumar Das dkk.', '2025', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-020.jpg', 'ebooks/files/ebook-020.pdf', 458, 6376237, 0, 20, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(21, 'Software Engineering Made Easy A Comprehensive Reference Guide for Writing Good Code', 'Marco Gähler', '2025', 'Software Engineering & Manajemen Proyek', NULL, 'ebooks/covers/ebook-021.jpg', 'ebooks/files/ebook-021.pdf', 299, 2693801, 0, 21, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(22, '30 Agents Every AI Engineer Must Build Build production-ready agent systems using proven architectures and patterns', 'Imran Ahmad', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-022.jpg', 'ebooks/files/ebook-022.pdf', 542, 6065937, 0, 22, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(23, '50 ML Projects To Understand LLMs Investigate transformer mechanisms through data analysis, visualization, and experimentation', 'Mike X Cohen', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-023.jpg', 'ebooks/files/ebook-023.pdf', 520, 12152884, 0, 23, '2026-08-04 10:50:25', '2026-08-04 10:50:25'),
(24, 'AI Agents on AWS Beginners guide to building agents on AWS', 'Bunny Kaushik, Mona M', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-024.jpg', 'ebooks/files/ebook-024.pdf', 290, 29053325, 0, 24, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(25, 'Advances in Software Startups Generative AI, Product Engineering and Business Development', 'Nirnaya Tripathi, Henry Edison dkk.', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-025.jpg', 'ebooks/files/ebook-025.pdf', 320, 4629095, 0, 25, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(26, 'Agentic AI for Engineers Architecting Goal-Driven Systems', 'Dhivya Nagasubramanian', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-026.jpg', 'ebooks/files/ebook-026.pdf', 460, 5540664, 0, 26, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(27, 'Agentic AI with Microsoft Foundry Design and develop intelligent AI solutions and autonomous agents with Microsofts Agent…', 'Balamurugan Balakrishnan, Sina Fakhraee dkk.', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-027.jpg', 'ebooks/files/ebook-027.pdf', 358, 24719629, 0, 27, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(28, 'Architecture And AI', 'Mustapha El Moussaoui', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-028.jpg', 'ebooks/files/ebook-028.pdf', 224, 4193194, 0, 28, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(29, 'Building Agent-Powered Applications Your guide to generative AI, RAG, fine-tuning, and orchestration for production use', 'Vasyl Zvarydchuk', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-029.jpg', 'ebooks/files/ebook-029.pdf', 490, 17666676, 0, 29, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(30, 'Claude AI in One Weekend The Practical Guide for Busy Professionals — Automate Emails, Reports  Documents, Save 10+ Hours a…', 'Michael Stavros', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-030.jpg', 'ebooks/files/ebook-030.pdf', 189, 5171684, 0, 30, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(31, 'Claude Code Architect Master SKILL.md, Subagents, and Hooks That Transform Claude Code Into a Fully Engineered, Production…', 'Andrei, Patrick', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-031.jpg', 'ebooks/files/ebook-031.pdf', 242, 5063669, 0, 31, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(32, 'Computational Intelligence and Image Processing in Agriculture Applications and Innovations', 'Jay Kumar Pandey, Mritunjay Rai dkk.', '2026', 'Ilmu Komputer Teoretis & Struktur Data', NULL, 'ebooks/covers/ebook-032.jpg', 'ebooks/files/ebook-032.pdf', 273, 4960613, 0, 32, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(33, 'Computational Intelligence Solutions for Real-Life Problems Theories, Applications, and Advances', 'Tidak diketahui', '2026', 'Ilmu Komputer Teoretis & Struktur Data', NULL, 'ebooks/covers/ebook-033.jpg', 'ebooks/files/ebook-033.pdf', 471, 4301124, 0, 33, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(34, 'Computational Intelligence in Surveillance Systems Using Image Processing', 'Tidak diketahui', '2026', 'Ilmu Komputer Teoretis & Struktur Data', NULL, 'ebooks/covers/ebook-034.jpg', 'ebooks/files/ebook-034.pdf', 346, 41560836, 0, 34, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(35, 'Computational Techniques in Precision Agriculture Advances and Applications', 'Bhoomika Batra, Vinod Kumar Shukla dkk.', '2026', 'Aplikasi Komputasi Terapan', NULL, 'ebooks/covers/ebook-035.jpg', 'ebooks/files/ebook-035.pdf', 306, 3537590, 3, 35, '2026-08-04 10:50:26', '2026-08-05 05:42:59'),
(36, 'Creating Custom GPT with OpenAI GPT Builder Create, deploy and ethically scale production-ready conversational AI agents at an…', 'Noelle Russell, Padmini Soni, Uvika Sharma', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-036.jpg', 'ebooks/files/ebook-036.pdf', 386, 3858386, 0, 36, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(37, 'Engineering Generative AI-Based Software', 'Miroslaw Staron', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-037.jpg', 'ebooks/files/ebook-037.pdf', 208, 9608890, 0, 37, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(38, 'Engineering Swarms of Cyber-Physical Systems', 'Melanie Schranz, Wilfried Elmenreich dkk.', '2026', 'Aplikasi Komputasi Terapan', NULL, 'ebooks/covers/ebook-038.jpg', 'ebooks/files/ebook-038.pdf', 185, 30613369, 0, 38, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(39, 'Federated Learning for Smart Agriculture and Food Quality Enhancement', 'Tidak diketahui', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-039.jpg', 'ebooks/files/ebook-039.pdf', 412, 3568497, 0, 39, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(40, 'From Classical to Quantum Coding', 'Zunaira Babar, Daryus Chandra, Soon Xin Ng dkk.', '2026', 'Komputasi Kuantum', NULL, 'ebooks/covers/ebook-040.jpg', 'ebooks/files/ebook-040.pdf', 419, 5116356, 0, 40, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(41, 'Fundamentals of Software Engineering From Coder to Engineer', 'Nathaniel Schutta, Dan Vega', '2026', 'Software Engineering & Manajemen Proyek', NULL, 'ebooks/covers/ebook-041.jpg', 'ebooks/files/ebook-041.pdf', 405, 12193821, 0, 41, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(42, 'Generative AI 2. 0 and Data Analytics', 'Adarsh Garg, Fadi Al-Turjman, John Walsh', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-042.jpg', 'ebooks/files/ebook-042.pdf', 249, 10253045, 0, 42, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(43, 'Generative AI on Microsoft Azure From Large Language Models to Advanced Multi-Agent Systems', 'Adrián González Sánchez, Jaime De Mora dkk.', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-043.jpg', 'ebooks/files/ebook-043.pdf', 323, 11583988, 0, 43, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(44, 'Graph Theory Connectivity, Software Engineering and Bioinformatics', 'Aiman Gannous', '2026', 'Software Engineering & Manajemen Proyek', NULL, 'ebooks/covers/ebook-044.jpg', 'ebooks/files/ebook-044.pdf', 145, 12548105, 0, 44, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(45, 'Graph Theory for Computer Science', 'Tidak diketahui', '2026', 'Ilmu Komputer Teoretis & Struktur Data', NULL, 'ebooks/covers/ebook-045.jpg', 'ebooks/files/ebook-045.pdf', 552, 5222893, 0, 45, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(46, 'Guide to Teaching Computer Science An Activity-Based Approach', 'Orit Hazzan, Noa Ragonis, Tami Lapidot', '2026', 'Metodologi & Penulisan Akademik', NULL, 'ebooks/covers/ebook-046.jpg', 'ebooks/files/ebook-046.pdf', 562, 5552279, 0, 46, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(47, 'Large Language Models in Finance A hands-on guide to LLM architectures, agents, RAG, governance, and evaluation in finance', 'Miquel Noguer i Alonso', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-047.jpg', 'ebooks/files/ebook-047.pdf', 554, 7514712, 0, 47, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(48, 'Mastering the Academic Writing Mindset A Guide to Crafting Computer Science Papers', 'Tsz Nam Chan, Dingming Wu', '2026', 'Metodologi & Penulisan Akademik', NULL, 'ebooks/covers/ebook-048.jpg', 'ebooks/files/ebook-048.pdf', 121, 18890768, 0, 48, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(49, 'Microsoft Agent Framework in Practice Build, orchestrate, and scale production-grade AI agents with Python, .NET, MCP tools,…', 'Scott, Daniel S', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-049.jpg', 'ebooks/files/ebook-049.pdf', 327, 6479283, 0, 49, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(50, 'Military Applications of Internet of Things Architectures, Security, Reliability, and Interoperability for MIoT', 'Niranjan Suri, Konrad Wrona dkk.', '2026', 'Sistem Operasi, Jaringan & Keamanan', NULL, 'ebooks/covers/ebook-050.jpg', 'ebooks/files/ebook-050.pdf', 248, 44629436, 0, 50, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(51, 'Practical Salesforce Agentforce Playbook Design, build, and deploy enterprise-grade AI agents with Salesforce Agentforce and…', 'Lars Malmqvist', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-051.jpg', 'ebooks/files/ebook-051.pdf', 298, 26901144, 0, 51, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(52, 'Python Automation Cookbook 100+ new and updated recipes for scalable workflows, MCP integrations, and AI-powered automation', 'Jaime Buelta', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-052.jpg', 'ebooks/files/ebook-052.pdf', 676, 33446545, 0, 52, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(53, 'Python Data Analysis An end-to-end guide covering data processing, data manipulation and data visualization', 'Avinash Navlani, Cornellius Yudha Wijaya', '2026', 'Data Science & Business Intelligence', NULL, 'ebooks/covers/ebook-053.jpg', 'ebooks/files/ebook-053.pdf', 767, 27158377, 0, 53, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(54, 'Quantum Computational AI. Algorithms, Systems, and Applications ((Eds) Long Cheng, Nishant Saurabh, Ying Mao)', 'Tidak diketahui', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-054.jpg', 'ebooks/files/ebook-054.pdf', 306, 18364139, 0, 54, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(55, 'Quantum Computing Research, Applications, and Advances', 'Tidak diketahui', '2026', 'Komputasi Kuantum', NULL, 'ebooks/covers/ebook-055.jpg', 'ebooks/files/ebook-055.pdf', 349, 9405649, 0, 55, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(56, 'Quantum Learning - Bridging Artificial Intelligence, Quantum Computing, and Data Science in Education', 'Pawan Whig, Pavika Sharma, Ahmad A Elngar dkk.', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-056.jpg', 'ebooks/files/ebook-056.pdf', 201, 4155144, 0, 56, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(57, 'Quantum Technologies Trends and Implications for Cyber Defense', 'Julian Jang-Jaccard, Philippe Caroff dkk.', '2026', 'Komputasi Kuantum', NULL, 'ebooks/covers/ebook-057.jpg', 'ebooks/files/ebook-057.pdf', 243, 3233408, 0, 57, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(58, 'RAG Made Simple The Complete Visual Guide to Retrieval-Augmented Generation', 'Nir Diamant', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-058.jpg', 'ebooks/files/ebook-058.pdf', 319, 5340492, 0, 58, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(59, 'Smart Agriculture Concepts, Strategies, and Case Studies', 'Tidak diketahui', '2026', 'Aplikasi Komputasi Terapan', NULL, 'ebooks/covers/ebook-059.jpg', 'ebooks/files/ebook-059.pdf', 254, 10580685, 0, 59, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(60, 'Software-Defined Networking for IoT Systems Architecture, Integration, and Applications', 'Rohit Kumar Das  Goutam Saha', '2026', 'Sistem Operasi, Jaringan & Keamanan', NULL, 'ebooks/covers/ebook-060.jpg', 'ebooks/files/ebook-060.pdf', 207, 34598789, 0, 60, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(61, 'The 0→1 Loop Engineering Playbook (2026 Edition) An AI Agent Engineering System for Building Production-Ready Agents with…', 'Press, Valenx', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-061.jpg', 'ebooks/files/ebook-061.pdf', 335, 1140849, 0, 61, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(62, 'The Developer\'s Field Guide to Modern Software Engineering Methods, Tools and Best Practices', 'Nico Loubser', '2026', 'Software Engineering & Manajemen Proyek', NULL, 'ebooks/covers/ebook-062.jpg', 'ebooks/files/ebook-062.pdf', 271, 8209582, 0, 62, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(63, 'The Spectrum of Computer Science Emerging Technologies and Trends', 'Tanvir Habib Sardar', '2026', 'Ilmu Komputer Teoretis & Struktur Data', NULL, 'ebooks/covers/ebook-063.jpg', 'ebooks/files/ebook-063.pdf', 273, 12452012, 0, 63, '2026-08-04 10:50:26', '2026-08-04 10:50:26'),
(64, 'Vibe Coding Made Easy Build Apps Faster with AI Assistants, Prompt Engineering, Debugging, Testing, and Real-World Projects', 'Liew, Voon Kiong', '2026', 'Kecerdasan Buatan & Machine Learning', NULL, 'ebooks/covers/ebook-064.jpg', 'ebooks/files/ebook-064.pdf', 331, 4428807, 0, 64, '2026-08-04 10:50:26', '2026-08-04 10:50:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `e_learning`
--

CREATE TABLE `e_learning` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `link_label` varchar(255) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `e_learning`
--

INSERT INTO `e_learning` (`id`, `deskripsi`, `cover`, `link_label`, `link_url`, `created_at`, `updated_at`) VALUES
(1, 'Fasilitas E-Learning disiapkan untuk menunjang proses pembelajaran secara daring bagi mahasiswa S1 Sistem dan Teknologi Informasi UNISVET. Mahasiswa dapat mengakses materi perkuliahan, tugas, modul pemrograman, serta forum diskusi interaktif.', 'e-learning/teSZqAqcrmmwsqfwWGRdVHVUbvyJRsnGhxlDvSMC.png', 'AKSES EDlink', 'https://edlink.id/login?r=%2Fpanel&sso_attempt=1', '2026-08-03 23:24:48', '2026-08-03 23:24:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `perlengkapan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `format_laporan_magang`
--

CREATE TABLE `format_laporan_magang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `graduate_profiles`
--

CREATE TABLE `graduate_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `urutan` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi_beasiswa`
--

CREATE TABLE `informasi_beasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `urutan` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `informasi_beasiswa`
--

INSERT INTO `informasi_beasiswa` (`id`, `judul`, `foto`, `deskripsi`, `file`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Beasiswa KIP-K', 'informasi-beasiswa/h8JMIKAIArmo7xhnIxrp9FLagFMPnsQEDDH124KG.jpg', 'Beasiswa KIP-K Gelombang 2', NULL, 1, '2026-08-06 13:49:41', '2026-08-06 13:49:41'),
(2, 'Alur Pendaftaran Beasiswa KIP-K', 'informasi-beasiswa/AF3DJguNRSLxrnh54ZCqOtgX1t2pYIU6DrafbF6v.jpg', 'Alur Pnedafataran', NULL, 2, '2026-08-06 13:50:24', '2026-08-06 13:50:24'),
(3, 'Persyaratan Besiswa KIP-K', 'informasi-beasiswa/AnqoAtRdN2diL4P2OxS0BdTi7Q0o5WJSY174JXhI.jpg', 'Persayaratan', NULL, 3, '2026-08-06 13:51:08', '2026-08-06 13:51:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_kuliah`
--

CREATE TABLE `jadwal_kuliah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_sidang_skripsi`
--

CREATE TABLE `jadwal_sidang_skripsi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_sidang_skripsi`
--

INSERT INTO `jadwal_sidang_skripsi` (`id`, `deskripsi`, `cover`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Berdasarkan kalender akadmik, BATAS AKHIR Ujian Skripsi diselenggarakan pada tanggal 22 Agustus 2026. Dimohon untuk semua mahasiswa STI bisa diselesaikan *SEBELUM* tanggal 22 Agustus 2026.', 'jadwal-sidang-skripsi/fsyDRXoS7OFv2fNwg2ECcFOXG5pWNC2GxbeaUm8R.png', 'jadwal-sidang-skripsi/5PBjjUMLsdn0CuyhFQfzasVILyr79alN5gokglHS.png', '2026-08-06 10:47:33', '2026-08-06 10:47:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_uts_uas`
--

CREATE TABLE `jadwal_uts_uas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal_uts_uas`
--

INSERT INTO `jadwal_uts_uas` (`id`, `deskripsi`, `cover`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Berdasarkan kalender akadmik, Ujian Akhir Semester (UAS) akan diselenggarakan pada tanggal 03 - 08 Agustus 2026', 'jadwal-uts-uas/1TKJeCS3SYN1u9HyEe4h6Mb3YyWRnMJ0Z1QtW38d.png', 'jadwal-uts-uas/mfM7iSPiyps50RfzGCxs46qVughLJcdhJmbOIy5F.pdf', '2026-08-06 14:01:13', '2026-08-06 14:01:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kalender_akademik`
--

CREATE TABLE `kalender_akademik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kalender_akademik`
--

INSERT INTO `kalender_akademik` (`id`, `deskripsi`, `cover`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Informasi mengenai jadwal kegiatan akademik Tahun Akademik 2025/2026', 'kalender-akademik/Gsa07QVZbcemCsPzOwLpNKGL4Ysb1ANBZi7VkksW.png', 'kalender-akademik/P8dwQfBDAKjIci7LULAGQX2lc9XTwGNNlKLN3fLF.png', '2026-08-03 23:33:20', '2026-08-06 10:48:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_karyawan`
--

CREATE TABLE `kelas_karyawan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas_karyawan`
--

INSERT INTO `kelas_karyawan` (`id`, `deskripsi`, `cover`, `link`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Program Kelas Karyawan didesain khusus bagi Anda yang sudah bekerja. Waktu perkuliahan sangat fleksibel pada sore/malam hari atau akhir pekan tanpa mengurangi kualitas akademik. Syarat Pendaftaran : 1. FC KTP 2. FC Ijazah Terakhir 3. FC KK', 'kelas-karyawan/qZlldconDaqamu2qEdps9P3USCx12vSJwaoXTtE5.jpg', 'https://pmb.unisvet.ac.id/program-studi-detail/detail/57201', 'kelas-karyawan/7JR9s12Q6QDlTqkBUgEnqlidBHYL4K2XkF6KRHbQ.jpg', '2026-08-06 08:13:21', '2026-08-06 13:38:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_reguler`
--

CREATE TABLE `kelas_reguler` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas_reguler`
--

INSERT INTO `kelas_reguler` (`id`, `deskripsi`, `cover`, `link`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Program Kelas Reguler ditujukan bagi lulusan SMA/SMK/MA yang ingin menempuh pendidikan secara penuh waktu. Pembelajaran dilakukan di kampus dengan fasilitas laboratorium dan bengkel secara intensif. Syarat Pendaftaran : 1. FC Ijazah Terakhir atau Keterang LULUS 2. FC KTP / FC KK', 'kelas-reguler/YE819cTuGEfkP7B4a0dmthGUaejGWYlyURdJa6B0.jpg', 'https://pmb.unisvet.ac.id/program-studi-detail/detail/57201', 'kelas-reguler/wT2G26lQVPBPF89BZifUe3aZxcYycIj2EkHXZ9YZ.jpg', '2026-08-06 08:17:18', '2026-08-06 13:38:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_transfer`
--

CREATE TABLE `kelas_transfer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas_transfer`
--

INSERT INTO `kelas_transfer` (`id`, `deskripsi`, `cover`, `link`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Program Kelas Reguler ditujukan bagi lulusan SMA/SMK/MA yang ingin menempuh pendidikan secara penuh waktu. Pembelajaran dilakukan di kampus dengan fasilitas laboratorium dan bengkel secara intensif. Syarat Pendaftaran : 1. FC Ijazah Terakhir atau Keterang LULUS 2. FC KTP / FC KK', 'kelas-transfer/GPhs2eucocWVkjZ3u8Nuy4d6VYql8MRZQDpiHJ9J.jpg', 'https://pmb.unisvet.ac.id/program-studi-detail/detail/57201', NULL, '2026-08-06 13:40:08', '2026-08-06 13:43:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurikulum`
--

CREATE TABLE `kurikulum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `badge` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongan_pekerjaan`
--

CREATE TABLE `lowongan_pekerjaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `kebutuhan` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `urutan` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lsp`
--

CREATE TABLE `lsp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `link_label` varchar(255) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lsp`
--

INSERT INTO `lsp` (`id`, `deskripsi`, `cover`, `link_label`, `link_url`, `created_at`, `updated_at`) VALUES
(1, 'Lembaga Sertifikasi Profesi (LSP) merupakan fasilitas penyelenggaraan uji kompetensi bagi mahasiswa tingkat akhir bekerja sama dengan BNSP (Badan Nasional Sertifikasi Profesi).', 'lsp/wN8NqIAOVyw1yOGO3b0NfqWLRtHbWb9xop5afUNT.png', 'Buka Website LSP', 'https://lsp.unisvet.ac.id/', '2026-08-09 11:19:19', '2026-08-09 11:19:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `maps_kontak`
--

CREATE TABLE `maps_kontak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kaprodi` varchar(255) DEFAULT NULL,
  `whatsapp_kaprodi` varchar(255) DEFAULT NULL,
  `maps_embed` text DEFAULT NULL,
  `whatsapp_pmb` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `maps_kontak`
--

INSERT INTO `maps_kontak` (`id`, `nama_kaprodi`, `whatsapp_kaprodi`, `maps_embed`, `whatsapp_pmb`, `created_at`, `updated_at`) VALUES
(1, 'Dewi Purnamasari, S.T., M.Eng.', '081325553255', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.9043273622715!2d110.39553317371256!3d-7.020531368771609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b2288dc1765%3A0xd53229bc48fb4fa!2sUniversitas%20Ivet%20Semarang!5e0!3m2!1sid!2sid!4v1785945982935!5m2!1sid!2sid', '6281223456789', '2026-08-03 17:08:53', '2026-08-05 09:08:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_07_23_094650_create_pages_table', 1),
(5, '2026_07_23_094650_create_sliders_table', 1),
(6, '2026_07_23_094652_create_facilities_table', 1),
(7, '2026_07_23_094652_create_practitioners_table', 1),
(8, '2026_07_23_094653_create_class_programs_table', 1),
(9, '2026_07_23_094654_create_posts_table', 1),
(10, '2026_07_23_094654_create_settings_table', 1),
(11, '2026_07_23_102137_add_role_to_users_table', 1),
(12, '2026_07_23_130542_add_kategori_to_facilities_and_posts_table', 1),
(13, '2026_07_24_142206_add_visi_misi_tujuan_to_pages_table', 1),
(14, '2026_07_24_145645_create_graduate_profiles_table', 1),
(15, '2026_07_24_160401_add_jabatan_deskripsi_to_practitioners_table', 1),
(16, '2026_07_24_162004_add_cover_file_badge_to_pages_table', 1),
(17, '2026_07_24_164441_add_link_to_pages_table', 1),
(18, '2026_07_24_185706_create_kurikulum_table', 1),
(19, '2026_07_24_191057_create_e_learning_table', 1),
(20, '2026_07_24_192027_create_jadwal_kuliah_table', 1),
(21, '2026_07_24_195357_create_panduan_magang_table', 1),
(22, '2026_07_24_195358_create_format_laporan_magang_table', 1),
(23, '2026_07_24_195954_create_skripsi_tugas_akhir_table', 1),
(24, '2026_07_24_202812_add_perlengkapan_to_facilities_table', 1),
(25, '2026_07_24_203937_create_lsp_table', 1),
(26, '2026_07_24_205116_create_tracer_studi_table', 1),
(27, '2026_07_24_205438_create_lowongan_pekerjaan_table', 1),
(28, '2026_07_24_205909_create_penalaran_minat_bakat_table', 1),
(29, '2026_07_24_205910_create_informasi_beasiswa_table', 1),
(30, '2026_07_25_141545_create_kelas_reguler_table', 1),
(31, '2026_07_25_141550_create_kelas_karyawan_table', 1),
(32, '2026_07_25_141553_create_kelas_transfer_table', 1),
(33, '2026_07_25_154531_create_kalender_akademik_table', 1),
(34, '2026_07_25_154532_create_wisuda_table', 1),
(35, '2026_07_25_154533_create_jadwal_sidang_skripsi_table', 1),
(36, '2026_07_25_154533_create_semester_antara_table', 1),
(37, '2026_07_25_154535_create_jadwal_uts_uas_table', 1),
(38, '2026_07_25_154535_create_pengumuman_lain_table', 1),
(39, '2026_07_26_095406_create_testimoni_alumni_table', 1),
(40, '2026_07_26_131450_create_maps_kontak_table', 1),
(41, '2026_07_26_133429_add_kaprodi_to_maps_kontak_table', 1),
(42, '2026_07_26_142234_create_visi_misi_table', 1),
(43, '2026_07_27_055350_create_online_visitors_table', 1),
(44, '2026_07_29_045111_add_judul_baris2_and_sorot_to_sliders_table', 1),
(45, '2026_07_30_183248_create_sejarah_milestones_table', 1),
(46, '2026_07_30_194626_add_peo_fields_to_visi_misis_table', 1),
(47, '2026_07_31_182542_create_dosen_prodis_table', 1),
(48, '2026_07_31_193153_create_berita_prodis_table', 1),
(49, '2026_08_01_185729_add_banner_bg_to_visi_misi_table', 1),
(50, '2026_08_05_000001_drop_testimoni_alumni_table', 1),
(51, '2026_08_04_120000_create_ebooks_table', 2),
(52, '2026_08_04_130000_add_foto_kegiatan_to_practitioners_table', 2),
(53, '2026_08_04_140000_create_praktisi_industri_table', 3),
(54, '2026_08_05_150000_add_tampil_beranda_to_berita_prodis_table', 4),
(55, '2026_08_05_160000_add_link_to_kelas_tables', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `online_visitors`
--

CREATE TABLE `online_visitors` (
  `session_id` varchar(255) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `online_visitors`
--

INSERT INTO `online_visitors` (`session_id`, `last_activity`) VALUES
('0E7dLDwpvB5oUSn4oqeHcqdnrmvoYL5t5MhpARgQ', '2026-08-06 14:32:55'),
('1JD2r7doUkbGqTkrpGSOoiYefZxoyepIQMj2YS9Z', '2026-08-06 13:32:40'),
('2jJCgO8RtYfKtrLMAASu1ats1qmeCBW2hVwAjqYD', '2026-08-06 23:03:50'),
('2qfiqTvvOYAdZYTIhjHhJcEKEwilo4Z5abXjSpRE', '2026-08-05 13:05:07'),
('3SC1do8tHHzWM1OtapuVneAvwSW4l0w8sW9E3dmi', '2026-08-04 11:04:15'),
('41tD5CBypXJQnaJr612dmaCkdxBmso7IrYYByCky', '2026-08-04 00:34:42'),
('4q0W37duuojUVUncK27dHi8LfolT626F5XMbM7Ye', '2026-08-06 06:00:06'),
('4WyvFuJBBVCBDWvzI3FyQt7nZTd1dolNW9mhUsde', '2026-08-08 08:35:13'),
('5Q0PWwfJYMtXRgt34qJ4iVVlUoKd1vwClhifONT2', '2026-08-03 23:16:33'),
('85BWm4npQxtZ7xgNpfp2AKJVKN3P7ccR8BC5Coeg', '2026-08-09 11:17:35'),
('9hRiNLAWC0uBmDEtUwfA5Y9mT708dtdGBeLwIZlM', '2026-08-03 19:56:09'),
('9RHHruIOdiB4xG2teIcyzAke0Vr2xRdouOCGtjnX', '2026-08-09 01:33:55'),
('bE3GzYYmnkM87mjaiRJJQ9K3DqM9cD088Pl28X8z', '2026-08-06 03:23:06'),
('bTROd3bWi7pcWfFxvH5fzNmnqYbEnMI3LRFeot48', '2026-08-09 00:21:17'),
('DduTVytOCYHSxPH6Qq0A0Ug3B833fcf8y06aLJqF', '2026-08-03 17:18:03'),
('diRkKcXDNs7wSc4Dj5ylA8h5EY3m11dcP84wScs3', '2026-08-06 18:34:09'),
('DjW1wq566ykdznbOaqAIHAF7GuqvVnlJCvJZ3AfA', '2026-08-05 01:12:09'),
('eBdl7nli58JlcOEQxgg7VcxtYzYxU23r0Ucpyhac', '2026-08-06 02:34:36'),
('ElPY42Q6WmFMPCAo5qXle2kDgIzlaXYvwHn8zQoT', '2026-08-04 07:09:44'),
('HgGQSBoBWESGLoV1eDNqPh6ga8BmlOPKqaat4X4B', '2026-08-28 23:59:25'),
('Ho5KcxtFA8249cBtb2PPQo9QdgrcFW5gJdSfkgag', '2026-08-09 12:42:48'),
('hSCqJbobtD05ihf8LUhpL5XzzyfAwFNKCj4ekiMd', '2026-08-08 09:50:23'),
('hsllPwc24TXoTbAeQ1mhxaL6ExitMxHdfri2X8Ie', '2026-08-06 13:34:15'),
('hYL5bEydwwRMxvlEWy0UlcHHwrxJt2o0qxTUzYYr', '2026-08-03 23:10:12'),
('iP2EodGaph2fbpJpyd7rMfrmIvTo0cZnjVtNbJCM', '2026-08-04 13:33:10'),
('K7luVmMq59OyQiyQJPFY7V7KJsFB2ITjiA1s3n3n', '2026-08-08 08:29:49'),
('kMcNiVkeF9ikTpWcdJ3xTsVkPSh9YO1VwB2sVMgb', '2026-08-28 23:59:25'),
('min4a2Lfyf6Z1QeQbuwXYGXWJ1sTumRSpVW2HRH4', '2026-08-06 11:01:21'),
('pKxbvRdfSRf2170xJtM7UpveA3ySTZDtJi9Katho', '2026-08-04 23:19:56'),
('Qld8kLFe8nUxwEFVof0voeNqxAlbPkwtyeUFzTS7', '2026-08-05 04:35:38'),
('QNwibRO20xDG7KdI5rzDWNBIYChmEiraxWprUGPA', '2026-08-05 21:00:43'),
('r4X7IwvQArFPpPE3t1IvfI9M0Z2uHGPFqhOXNsOV', '2026-08-09 01:17:33'),
('SH3slHN4viwAWrV4uwNjbsCZp7AEiuFMUmC59gxO', '2026-08-28 23:59:33'),
('sudclwerdhDfeavu3sU2EhlTEHBR3t7xi39TgvSq', '2026-08-06 18:34:35'),
('TUzzTbbkGeUjKy3zGS25Z5qPqPSGfxLCwB2MSAjc', '2026-08-09 07:40:38'),
('vlzPO80mL0Dtew63unClOWS0ly1aD7EKEBdRdF1f', '2026-08-09 07:54:55'),
('YHv9RIoCQ4nR2AtSP4nqTS1h7KWAxmvNRJVBMcPx', '2026-08-28 23:59:33'),
('YQ1zoHzu93co6E1NclRWHGjOvDVC1fIffhl6CNYG', '2026-08-28 23:59:25'),
('YWLELfSMlOdVSibasZq9GGetMaUpQFpmi76W5kLj', '2026-08-08 08:35:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` longtext DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `link_label` varchar(255) DEFAULT NULL,
  `badge` varchar(255) DEFAULT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pages`
--

INSERT INTO `pages` (`id`, `slug`, `judul`, `isi`, `cover`, `file`, `link_url`, `link_label`, `badge`, `visi`, `misi`, `tujuan`, `created_at`, `updated_at`) VALUES
(1, 'tentang', 'Tentang Program Studi', 'Program Studi S1 Sistem dan Teknologi Informasi (STI) Universitas IVET Semarang mencetak sarjana komputer yang unggul di bidang rekayasa perangkat lunak, keamanan siber, sains data, dan technopreneurship.\n\nKurikulum kami dirancang sesuai kebutuhan industri, didukung dosen mumpuni dan praktisi berpengalaman, serta fasilitas laboratorium modern.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-08-03 17:08:53', '2026-08-03 17:08:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `panduan_magang`
--

CREATE TABLE `panduan_magang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penalaran_minat_bakat`
--

CREATE TABLE `penalaran_minat_bakat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `urutan` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman_lain`
--

CREATE TABLE `pengumuman_lain` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `urutan` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengumuman_lain`
--

INSERT INTO `pengumuman_lain` (`id`, `judul`, `deskripsi`, `file`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Program Kkn Kolaborasi Desa Binaan Tahun 2026', 'Program ini merupakan bagian dari Program Desa Binaan yang didanai oleh Kementerian\r\nPendidikan Tinggi, Sains, dan Teknologi Tahun Anggaran 2026 dengan tema:\r\n\"Pengembangan Potensi Wisata Desa Punjulharjo Sebagai Niche Market Destination Berbasis\r\nSejarah, Kesenian, dan Lingkungan Bahari Melalui Penerapan S.A.T (Strategi-AksiTeknologi). \r\nMahasiswa yang berminat dapat mendaftarkan diri melalui formulir dibawah ini paling lambat\r\nHari Kamis, 11 Juni 2026', NULL, 1, '2026-08-06 14:04:32', '2026-08-06 14:04:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('pengumuman','prestasi','kerjasama','kegiatan') NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` longtext DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `practitioners`
--

CREATE TABLE `practitioners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `foto_kegiatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `practitioners`
--

INSERT INTO `practitioners` (`id`, `nama`, `jabatan`, `instansi`, `deskripsi`, `foto`, `foto_kegiatan`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Safrizal', 'Web Developer', 'PT Holi Karya Sakti', 'Halo semuanya! Saya Ahmad Safrizal. Saat ini saya bekerja sebagai Web Developer di PT Holi Karya Sakti, dan kesibukan sehari-hari saya adalah membangun serta mengembangkan sistem ERP untuk mendukung operasional perusahaan.\r\n​Pekerjaan ini tentu butuh logika koding, pemahaman database, dan arsitektur sistem yang kuat. Nah, semua pondasi penting ini saya dapatkan waktu kuliah di Prodi Sistem dan Teknologi Informasi (STI) Universitas IVET Semarang.\r\n​Buat kamu yang ingin punya skill digital, paham dunia software development, dan siap bersaing di industri teknologi masa kini, Prodi STI Universitas IVET Semarang adalah tempat yang sangat tepat!\r\n​Yuk, bergabung dan wujudkan masa depanmu bersama STI Universitas IVET.', 'practitioners/hY1x4rmziKLkNNQF3HHKjEivF3TSFkax60bhZOex.png', 'practitioners/kegiatan/22zCK2rp8oDtm2zkZ7hYEkT1nvDLKzI3LpXvxGDZ.jpg', '2026-08-04 11:32:39', '2026-08-04 23:23:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `praktisi_industri`
--

CREATE TABLE `praktisi_industri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `urutan` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sejarah_milestones`
--

CREATE TABLE `sejarah_milestones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `badge` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `poin` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sejarah_milestones`
--

INSERT INTO `sejarah_milestones` (`id`, `tahun`, `judul`, `badge`, `deskripsi`, `poin`, `created_at`, `updated_at`) VALUES
(1, 2020, 'Inisiasi & SK Pendirian Resmi', 'SK MENTERI RESMI', 'Universitas Ivet Semarang resmi menginisiasi pendirian program studi baru guna menjawab urgensi kebutuhan nasional akan sarjana komputer yang handal. Sejarah penting dimulai dengan turunnya Surat Keputusan Kemendikbudristek RI No. 235/M/2020 yang menandai legalitas dan hak penyelenggaraan Program Studi Sistem dan Teknologi Informasi (STI) di bawah Fakultas Sains dan Teknologi.', 'SK Menteri Resmi No. 235/M/2020\r\nPenerbit SK: Kemendikbudristek RI\r\nKurikulum awal fokus ke manajemen & infrastruktur IT\r\nPenerimaan angkatan mahasiswa pertama prodi STI', '2026-08-03 19:10:45', '2026-08-03 19:10:45'),
(2, 2022, 'Pengembangan Kurikulum & Kolaborasi', 'KOLABORASI INDUSTRI', 'Memasuki tahun kedua, program studi melakukan rekonstruksi kurikulum berbasis Outcome-Based Education (OBE) untuk menyelaraskan keahlian lulusan dengan kebutuhan industri digital terkini. STI Universitas Ivet juga menjalin jejaring kolaboratif dengan berbagai institusi terkemuka untuk memfasilitasi program Magang dan Studi Independen Bersertifikat (MSIB).', 'Penyusunan kurikulum OBE berstandar industri\r\nKemitraan magang dengan industri software regional & nasional\r\nInisiasi kelompok mahasiswa pertama dalam program MSIB\r\nFasilitas laboratorium praktikum komputer terpadu', '2026-08-03 19:13:19', '2026-08-03 19:13:19'),
(3, 2024, 'Akreditasi \'BAIK\' BAN-PT & Prestasi', 'PENJAMINAN MUTU', 'Melalui proses evaluasi penjaminan mutu akademik, sarana prasarana, serta komitmen dosen, Program Studi STI Universitas Ivet sukses mendapatkan peringkat akreditasi \'BAIK\' dari Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT) berdasarkan keputusan resmi No. 1201/SK/BAN-PT/Akred/S/III/2026. Mahasiswa juga mulai mengukir berbagai prestasi keorganisasian.', 'Akreditasi resmi \'BAIK\' dari BAN-PT\r\nPeningkatan indeks kepuasan akademik mahasiswa\r\nInisiasi riset kolaborasi dosen dan mahasiswa\r\nPengembangan kreativitas melalui himpunan mahasiswa HIMASTI', '2026-08-03 19:17:19', '2026-08-03 19:17:19'),
(4, 2026, 'Transformasi Digital & Inovasi Global', 'AKSELERASI TEKNOLOGI', 'Menghadapi era kecerdasan buatan, program studi STI melakukan akselerasi digital penuh. Integrasi materi mutakhir seperti Artificial Intelligence (AI), Machine Learning, dan Cybersecurity ke dalam peminatan utama prodi. Kami juga merilis sistem informasi organisasi terpadu serta memperluas kolaborasi karir bagi lulusan agar siap bersaing di kancah global.', 'Kurikulum terintegrasi kecerdasan buatan & keamanan siber\r\nPeluncuran sistem pendaftaran HIMASTI digital mandiri\r\nPusat bimbingan karir alumni langsung ke industri teknologi\r\nTransformasi metode belajar blended learning interaktif', '2026-08-03 19:19:42', '2026-08-03 19:19:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester_antara`
--

CREATE TABLE `semester_antara` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `semester_antara`
--

INSERT INTO `semester_antara` (`id`, `deskripsi`, `cover`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Berdasarkan kalender akadmik, Semester antara akan diselenggarakan pada tanggal 24 Agustus 2026 - 19 September 2026', 'semester-antara/iwMslg3zVIMbebT2LJsONJQOj7HMsNiNG9Iz8IVo.png', 'semester-antara/Kt1c9idFAv4ccxTweqzGzDpFFvyJ9Cvggdt1AVGw.pdf', '2026-08-06 13:59:17', '2026-08-06 13:59:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('HgGQSBoBWESGLoV1eDNqPh6ga8BmlOPKqaat4X4B', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibW9wS0c2MjZUdXF1OW1OY2U0ZHBvaERMcnJDdWoyamFOUlNsR1NGRSI7czoxMzoiY291bnRlZF92aXNpdCI7YjoxO3M6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjIwOiJodHRwczovL3dlYi1zdGkudGVzdCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787986772),
('Ho5KcxtFA8249cBtb2PPQo9QdgrcFW5gJdSfkgag', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWHRvR2llMnJXbnRNSjFzVG5WMHBaeW9aQ3NLeU15em5hZXg4RDhxNyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vbG9jYWxob3N0OjgwMDAiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTM6ImNvdW50ZWRfdmlzaXQiO2I6MTtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1786304632),
('SH3slHN4viwAWrV4uwNjbsCZp7AEiuFMUmC59gxO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNkVsaW9LanF6bzhoUEhHT2FJMHhBVFFtbnRnVTloWFNjcWo5a0VEUyI7czoxMzoiY291bnRlZF92aXNpdCI7YjoxO3M6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjIwOiJodHRwczovL3dlYi1zdGkudGVzdCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1787986773),
('YHv9RIoCQ4nR2AtSP4nqTS1h7KWAxmvNRJVBMcPx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQjRlSWJFV045SGJvcVBZOVJFOWJkTUZuM2ZrdU5KekRJMDNQZnM1ayI7czoxMzoiY291bnRlZF92aXNpdCI7YjoxO3M6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjM5OiJodHRwczovL3dlYi1zdGkudGVzdC9ha2FkZW1pay9lLWxpYnJhcnkiO3M6NToicm91dGUiO3M6MTM6ImFrYWRlbWlrLnNob3ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1787987044);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(7, 'total_pengunjung', '23', '2026-08-03 17:04:30', '2026-08-28 23:59:26'),
(8, 'nama_prodi', 'Sistem & Teknologi Informasi', '2026-08-03 17:08:53', '2026-08-05 06:37:29'),
(9, 'nama_kampus', 'Universitas IVET Semarang', '2026-08-03 17:08:53', '2026-08-03 17:08:53'),
(10, 'alamat', 'Jl. Pawiyatan Luhur IV No.17, Bendan Duwur, Kec. Gajahmungkur, Kota Semarang, Jawa Tengah 50234', '2026-08-03 17:08:53', '2026-08-03 17:08:53'),
(11, 'telepon', '(024) 841-7020', '2026-08-03 17:08:53', '2026-08-03 17:08:53'),
(12, 'email', 'sti@unisvet.ac.id', '2026-08-03 17:08:53', '2026-08-03 17:08:53'),
(13, 'instagram', 'https://www.instagram.com/sti_unisvet', '2026-08-03 17:08:53', '2026-08-03 17:08:53'),
(14, 'facebook', 'https://www.facebook.com/unisvet', '2026-08-03 17:08:53', '2026-08-03 17:08:53'),
(15, 'youtube', 'https://www.youtube.com/@unisvet', '2026-08-03 17:08:53', '2026-08-03 17:08:53'),
(16, 'hero_badge', 'Universitas IVET Semarang', '2026-08-03 17:08:53', '2026-08-03 17:08:53'),
(17, 'pmb_link', 'https://pmb.unisvet.ac.id/', '2026-08-03 17:08:53', '2026-08-03 17:08:53'),
(18, 'kaprodi_nama', 'Dewi Purnama Sari, S.T, M.ng.', '2026-08-03 17:33:05', '2026-08-06 06:02:01'),
(19, 'kaprodi_jabatan', 'Ketua Program Studi', '2026-08-03 17:33:05', '2026-08-06 06:02:01'),
(20, 'kaprodi_nidn', '0612048901', '2026-08-03 17:33:05', '2026-08-06 06:02:01'),
(21, 'kaprodi_judul', '\"Selamat Datang di Portal Resmi Sistem dan Teknologi Informasi Universitas Ivet\"', '2026-08-03 17:33:05', '2026-08-06 06:02:01'),
(22, 'kaprodi_sambutan', '“Di era modern yang dipacu oleh lompatan kecerdasan buatan, komputasi awan, dan internet of things, pemahaman komprehensif mengenai Sistem dan Teknologi Informasi adalah pilar utama kemajuan bangsa. Kami di Universitas Ivet berkomitmen tidak hanya mencetak tenaga teknis, melainkan arsitek solusi digital masa depan yang memegang teguh integritas moral, moralitas yang luhur, dan kreativitas tanpa batas.”', '2026-08-03 17:33:05', '2026-08-06 06:02:01'),
(23, 'kaprodi_sambutan2', 'Kami mengundang rekan-rekan mahasiswa sekalian untuk bergabung secara aktif dalam roda keorganisasian kemahasiswaan lewat HIMASTI (Himpunan Mahasiswa Sistem dan Teknologi Informasi) sebagai wadah inkubator bakat sains, kepemimpinan, dan inovasi bersama.', '2026-08-03 17:33:05', '2026-08-06 06:02:01'),
(24, 'rektor_nama', NULL, '2026-08-03 17:33:05', '2026-08-03 17:33:05'),
(25, 'rektor_jabatan', NULL, '2026-08-03 17:33:05', '2026-08-03 17:33:05'),
(26, 'rektor_nidn', NULL, '2026-08-03 17:33:05', '2026-08-03 17:33:05'),
(27, 'rektor_judul', NULL, '2026-08-03 17:33:05', '2026-08-03 17:33:05'),
(28, 'rektor_sambutan', NULL, '2026-08-03 17:33:05', '2026-08-03 17:33:05'),
(29, 'rektor_sambutan2', NULL, '2026-08-03 17:33:05', '2026-08-03 17:33:05'),
(30, 'kaprodi_foto', 'settings/XHLbugqU9pnO8p0bjOAtVuBuMWY7zQyD6Y2OCz1O.jpg', '2026-08-03 17:33:30', '2026-08-03 17:33:30'),
(31, 'brosur_1_caption', 'Profil STI, Program Unggulan & Rincian Biaya', '2026-08-03 17:37:37', '2026-08-03 17:37:37'),
(32, 'brosur_2_caption', 'Beasiswa, Karir Lulusan & Alur Pendaftaran', '2026-08-03 17:37:37', '2026-08-03 17:37:37'),
(33, 'logo', 'settings/SCSDZ5xto96XqcMfqyeSiy5NDBV9voBkDhGM3n8p.png', '2026-08-03 17:37:38', '2026-08-05 06:48:31'),
(34, 'brosur_1', 'settings/bpSNDwHwLdbzG5lWNyD9TNJkaVYH1XZbxOl3cQfm.jpg', '2026-08-03 17:37:38', '2026-08-03 17:37:38'),
(35, 'brosur_2', 'settings/HpTzeXauL4AbjxEN7Oc5N6IpfjRMysSdA1gZ27zH.jpg', '2026-08-03 17:37:38', '2026-08-03 17:37:38'),
(36, 'pilar_title', 'Bidang Kompetensi Keilmuan', '2026-08-03 17:42:37', '2026-08-03 17:42:37'),
(37, 'pilar_desc', 'Kami mengintegrasikan dua kutub keilmuan teknologi untuk menghasilkan pengembang sistem informasi mumpuni.', '2026-08-03 17:42:37', '2026-08-03 17:42:37'),
(38, 'pilar1_title', 'Sistem Informasi Bisnis', '2026-08-03 17:42:37', '2026-08-03 17:42:37'),
(39, 'pilar1_desc', 'Mempelajari cara mendesain, mengintegrasikan, dan memelihara sistem informasi guna mendukung efisiensi pengambilan keputusan bisnis korporasi maupun UMKM modern.', '2026-08-03 17:42:37', '2026-08-03 17:42:37'),
(40, 'pilar1_skills', 'Enterprise Architecture, Data Analytics, IT Project Management', '2026-08-03 17:42:37', '2026-08-03 17:42:37'),
(41, 'pilar2_title', 'Teknologi Informasi & Cloud', '2026-08-03 17:42:37', '2026-08-03 17:42:37'),
(42, 'pilar2_desc', 'Membahas arsitektur infrastruktur teknologi, cloud computing (serverless/virtualisasi), administrasi server Linux, keamanan jaringan siber, serta Internet of Things (IoT).', '2026-08-03 17:42:37', '2026-08-03 17:42:37'),
(43, 'pilar2_skills', 'Cloud Solutions, Linux Sysadmin, Cyber Security', '2026-08-03 17:42:37', '2026-08-03 17:42:37'),
(44, 'pilar3_title', 'Rekayasa Perangkat Lunak', '2026-08-03 17:42:37', '2026-08-03 17:42:37'),
(45, 'pilar3_desc', 'Menempa kemampuan coding aplikatif, mencakup fullstack web development, pembuatan aplikasi mobile android/iOS, integrasi kecerdasan buatan (Generative AI), dan UI/UX design.', '2026-08-03 17:42:37', '2026-08-03 17:42:37'),
(46, 'pilar3_skills', 'React & Node.js Mobile App Dev AI SDK Integration', '2026-08-03 17:42:37', '2026-08-03 17:42:37'),
(47, 'pilar1_bg', 'settings/LXqosaS9PTjmwdP4FgIIf9SXw70WNOJXaPbha1EO.webp', '2026-08-03 17:42:37', '2026-08-03 17:42:37'),
(48, 'pilar2_bg', 'settings/N5lpcJYphGSXmUBDET6H1Q98VZ5DpHkoP9Yb0cv4.jpg', '2026-08-03 17:42:37', '2026-08-03 17:42:37'),
(49, 'pilar3_bg', 'settings/bepl5x5dHPBELPGqQZoQ5vY9Ne8zUTgyXEjkn6js.jpg', '2026-08-03 17:42:37', '2026-08-03 17:42:37'),
(50, 'berita_title', 'Berita & Kegiatan Prodi STI', '2026-08-03 17:49:33', '2026-08-03 17:49:33'),
(51, 'berita_desc', 'Eksplorasi lini pemberitahuan kegiatan mahasiswa, event seminar nasional, pengabdian masyarakat, serta sederet prestasi mentereng program studi.', '2026-08-03 17:49:33', '2026-08-03 17:49:33'),
(52, 'berita_bg', 'settings/pxIweecmiI69a5VS09dLKoBHxTpzdUuYYTEs02OJ.webp', '2026-08-03 17:49:34', '2026-08-03 19:32:43'),
(53, 'prospek_title', 'Prospek Karir Lulusan STI Universitas Ivet', '2026-08-03 18:57:36', '2026-08-03 18:57:36'),
(54, 'prospek_desc', 'Sektor digital yang terus berekspansi pesat membuka peluang karir tanpa batas bagi Sarjana Komputer lulusan prodi Sistem dan Teknologi Informasi. Kami merancang profil lulusan agar siap mengisi peran strategis industri.', '2026-08-03 18:57:36', '2026-08-03 18:57:36'),
(55, 'prospek1_title', 'Fullstack Web/Mobile Developer', '2026-08-03 18:57:36', '2026-08-03 18:57:36'),
(56, 'prospek1_desc', 'Membangun aplikasi website interaktif serta aplikasi seluler modern.', '2026-08-03 18:57:36', '2026-08-03 18:57:36'),
(57, 'prospek2_title', 'System Analyst & IT Consultant', '2026-08-03 18:57:36', '2026-08-03 18:57:36'),
(58, 'prospek2_desc', 'Menganalisis kebutuhan perangkat lunak korporat dan memberikan solusi TI.', '2026-08-03 18:57:36', '2026-08-03 18:57:36'),
(59, 'prospek3_title', 'Network & Cloud Administrator', '2026-08-03 18:57:36', '2026-08-03 18:57:36'),
(60, 'prospek3_desc', 'Mengelola server cloud serta menjaga reliabilitas infrastruktur komputer.', '2026-08-03 18:57:36', '2026-08-03 18:57:36'),
(61, 'prospek4_title', 'IT Project Manager', '2026-08-03 18:57:36', '2026-08-03 18:57:36'),
(62, 'prospek4_desc', 'Memimpin tim pengembang, merencanakan, serta memastikan kesuksesan rilis produk digital.', '2026-08-03 18:57:36', '2026-08-03 18:57:36'),
(63, 'sejarah_title', 'Sejarah Pendirian & Perkembangan', '2026-08-03 19:04:28', '2026-08-03 19:04:28'),
(64, 'sejarah_desc', 'Alur sejarah perjalanan pendirian program studi, SK resmi kementerian, milestone perkembangan, Sistem dan Teknologi Informasi', '2026-08-03 19:04:28', '2026-08-03 19:04:28'),
(65, 'sejarah_bg', 'settings/MXUNFxLW4ZBrJdPWLc7vhv0WdjpbLZGP1PmJGOY0.webp', '2026-08-03 19:04:29', '2026-08-03 19:36:48'),
(66, 'repository_sti_link', 'https://edlink.id/', '2026-08-05 09:02:17', '2026-08-05 09:02:17'),
(67, 'sosmed1_handle', NULL, '2026-08-05 10:26:06', '2026-08-05 10:26:06'),
(68, 'sosmed1_desc', NULL, '2026-08-05 10:26:06', '2026-08-05 10:26:06'),
(69, 'sosmed1_link', 'https://www.instagram.com/sti_unisvet', '2026-08-05 10:26:06', '2026-08-05 10:26:06'),
(70, 'sosmed2_handle', NULL, '2026-08-05 10:26:06', '2026-08-05 10:26:06'),
(71, 'sosmed2_desc', NULL, '2026-08-05 10:26:06', '2026-08-05 10:26:06'),
(72, 'sosmed2_link', 'https://www.instagram.com/himasti_ivet/', '2026-08-05 10:26:06', '2026-08-05 10:26:06'),
(73, 'sosmed3_handle', NULL, '2026-08-05 10:26:06', '2026-08-05 10:26:06'),
(74, 'sosmed3_desc', NULL, '2026-08-05 10:26:06', '2026-08-05 10:26:06'),
(75, 'sosmed3_link', 'https://www.tiktok.com/@sti_unisvet', '2026-08-05 10:26:06', '2026-08-05 10:26:06'),
(76, 'sosmed4_handle', NULL, '2026-08-05 10:26:06', '2026-08-05 10:26:06'),
(77, 'sosmed4_desc', NULL, '2026-08-05 10:26:06', '2026-08-05 10:26:06'),
(78, 'sosmed4_link', 'https://www.tiktok.com/@himastivet?is_from_webapp=1&sender_device=pc', '2026-08-05 10:26:06', '2026-08-05 10:26:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsi_tugas_akhir`
--

CREATE TABLE `skripsi_tugas_akhir` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `urutan` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `judul_baris2` varchar(255) DEFAULT NULL,
  `judul_sorot` varchar(255) DEFAULT NULL,
  `subjudul` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tombol_teks` varchar(255) DEFAULT NULL,
  `tombol_link` varchar(255) DEFAULT NULL,
  `urutan` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sliders`
--

INSERT INTO `sliders` (`id`, `judul`, `judul_baris2`, `judul_sorot`, `subjudul`, `gambar`, `tombol_teks`, `tombol_link`, `urutan`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Selamat Datang di Program Studi', 'Sistem & Teknologi Informasi', 'Universitas IVET Semarang', 'Mencetak lulusan unggul di bidang rekayasa perangkat lunak, keamanan siber, sains data, dan technopreneurship.', 'sliders/HjjFq6mjjaiygC94txJW81j3gscQyA8LRpipDMBf.png', 'Informasi Pendaftaran', 'https://pmb.unisvet.ac.id/', 1, 1, '2026-08-03 17:08:53', '2026-08-06 18:35:11'),
(2, 'Terbukti Berprestasi', NULL, 'di Tingkat Nasional', 'Mahasiswa kami lolos program Bangkit, MSIB, juara kompetisi olahraga & desain — bukti nyata kualitas pendidikan', 'sliders/BMZQsftBqVEVgKV3dvN3PlYQ0H7rRPJ5zB9sRgKw.webp', 'Lihat Prestasi Lainnya', '/berita-kegiatan?kategori=prestasi', 2, 1, '2026-08-05 09:32:56', '2026-08-05 09:50:14'),
(3, 'Lulus Kuliah', NULL, 'Langsung Siap Kerja', 'Alumni kami berkarya sebagai Web Developer, IT Support, hingga Staff Quality Control di berbagai perusahaan', 'sliders/kswsrWn4NIlv3BCFZKuLaacwvkRDrDhRcED9PrEI.png', 'Lihat Testimoni Alumni', '/testimoni-alumni', 3, 1, '2026-08-05 09:56:33', '2026-08-05 09:56:33'),
(4, 'Belajar dengan', NULL, 'Fasilitas & Sertifikasi Kompeten', 'Lab praktik lengkap, ditunjang Lembaga Sertifikasi Profesi (LSP) untuk bekal kompetensi yang diakui industri', 'sliders/UkOVLNlxLK7Ee0IJolUgc6RFtRhzKU8qClntVQu2.jpg', 'Lihat Fasilitas Lab', '/fasilitas', 4, 1, '2026-08-05 10:10:31', '2026-08-05 10:10:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tracer_studi`
--

CREATE TABLE `tracer_studi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `link_label` varchar(255) DEFAULT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tracer_studi`
--

INSERT INTO `tracer_studi` (`id`, `deskripsi`, `cover`, `link_label`, `link_url`, `created_at`, `updated_at`) VALUES
(1, 'Tracer Studi merupakan survei yang dilakukan untuk mendata sebaran lulusan PVTO.', 'tracer-studi/iV01rkr41i5c7RSQuSRBpycOZhOyBwRIiEMPWpza.png', 'Isi Form Tracer Studi', 'https://tracerstudy.kemdiktisaintek.go.id/kuesioner', '2026-08-06 09:19:24', '2026-08-06 09:19:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin', NULL, '$2y$12$pthcY7ZGsBX6MjJCdyzL.uwVVL9prLIKtNWTnXpzSeP99CNGXMmSq', NULL, '2026-08-03 17:08:53', '2026-08-03 17:12:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `visi_misi`
--

CREATE TABLE `visi_misi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `tujuan` text DEFAULT NULL,
  `karakter` text DEFAULT NULL,
  `peo1_title` varchar(255) DEFAULT NULL,
  `peo1_desc` text DEFAULT NULL,
  `peo2_title` varchar(255) DEFAULT NULL,
  `peo2_desc` text DEFAULT NULL,
  `peo3_title` varchar(255) DEFAULT NULL,
  `peo3_desc` text DEFAULT NULL,
  `banner_bg` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `visi_misi`
--

INSERT INTO `visi_misi` (`id`, `visi`, `misi`, `tujuan`, `karakter`, `peo1_title`, `peo1_desc`, `peo2_title`, `peo2_desc`, `peo3_title`, `peo3_desc`, `banner_bg`, `created_at`, `updated_at`) VALUES
(1, 'Visi Keilmuan\r\n\"Menjadi Program Studi Sistem dan Teknologi Informasi yang unggul, berkarakter, dan inovatif dalam menghasilkan lulusan di bidang teknologi digital yang berdaya saing global pada tahun 2035.\"', 'Menyelenggarakan proses pembelajaran yang berkualitas tinggi dengan mengadopsi kurikulum yang adaptif terhadap kemajuan sains dan kecerdasan buatan.\r\nMenyelenggarakan penelitian aplikatif yang inovatif dan terpublikasi baik di tingkat nasional maupun jurnal bereputasi internasional.\r\nMelaksanakan program pengabdian masyarakat secara berkala guna mengimplementasikan inovasi teknologi informasi untuk memecahkan problematika sosial.\r\nMembina kemitraan strategis berdaya guna dengan pemerintah, pelaku industri digital kreatif, serta lembaga akademis lainnya.', NULL, 'Melambangkan integritas moral, akhlak mulia, disiplin, semangat patriotisme, serta menjunjung tinggi kode etik teknologi.', 'Kompetensi Profesional', 'Menghasilkan sarjana STI yang memiliki keahlian teknis unggul dalam menguji, membangun, mendesain, serta memelihara sistem informasi skala enterprise.', 'Creativepreneurship', 'Membentuk alumni mandiri yang berdaya saing kreatif untuk memformulasikan solusi komersial digital (startup) secara beretika.', 'Eksplorasi Pembelajaran Seumur Hidup', 'Mendorong kecintaan belajar berkelanjutan, baik studi pascasarjana formal maupun sertifikasi keahlian global industri (AWS, CISCO, RedHat).', 'visi-misi/n2udsMZiYoVoml7TfPevU47fpf5ojEZs12ieLeiY.webp', '2026-08-03 17:08:53', '2026-08-05 04:37:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wisuda`
--

CREATE TABLE `wisuda` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wisuda`
--

INSERT INTO `wisuda` (`id`, `deskripsi`, `cover`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Pemberitahuan terkait pelaksanaan wisuda, persyaratan pendaftaran, jadwal gladi bersih, dan ketentuan toga bagi calon wisudawan/wisudawati.', 'wisuda/AWv8GuEpLVpbYmunvRJeeZXtyt3B7DuCPv9IfK9I.png', NULL, '2026-08-06 14:06:00', '2026-08-06 14:06:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita_prodis`
--
ALTER TABLE `berita_prodis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `class_programs`
--
ALTER TABLE `class_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen_prodis`
--
ALTER TABLE `dosen_prodis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ebooks_kategori_index` (`kategori`);

--
-- Indeks untuk tabel `e_learning`
--
ALTER TABLE `e_learning`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `format_laporan_magang`
--
ALTER TABLE `format_laporan_magang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `graduate_profiles`
--
ALTER TABLE `graduate_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `informasi_beasiswa`
--
ALTER TABLE `informasi_beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_sidang_skripsi`
--
ALTER TABLE `jadwal_sidang_skripsi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_uts_uas`
--
ALTER TABLE `jadwal_uts_uas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas_karyawan`
--
ALTER TABLE `kelas_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas_reguler`
--
ALTER TABLE `kelas_reguler`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas_transfer`
--
ALTER TABLE `kelas_transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lowongan_pekerjaan`
--
ALTER TABLE `lowongan_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lsp`
--
ALTER TABLE `lsp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `maps_kontak`
--
ALTER TABLE `maps_kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `online_visitors`
--
ALTER TABLE `online_visitors`
  ADD PRIMARY KEY (`session_id`);

--
-- Indeks untuk tabel `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indeks untuk tabel `panduan_magang`
--
ALTER TABLE `panduan_magang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penalaran_minat_bakat`
--
ALTER TABLE `penalaran_minat_bakat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengumuman_lain`
--
ALTER TABLE `pengumuman_lain`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `practitioners`
--
ALTER TABLE `practitioners`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `praktisi_industri`
--
ALTER TABLE `praktisi_industri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sejarah_milestones`
--
ALTER TABLE `sejarah_milestones`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `semester_antara`
--
ALTER TABLE `semester_antara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indeks untuk tabel `skripsi_tugas_akhir`
--
ALTER TABLE `skripsi_tugas_akhir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tracer_studi`
--
ALTER TABLE `tracer_studi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wisuda`
--
ALTER TABLE `wisuda`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita_prodis`
--
ALTER TABLE `berita_prodis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `class_programs`
--
ALTER TABLE `class_programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `dosen_prodis`
--
ALTER TABLE `dosen_prodis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ebooks`
--
ALTER TABLE `ebooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `e_learning`
--
ALTER TABLE `e_learning`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `format_laporan_magang`
--
ALTER TABLE `format_laporan_magang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `graduate_profiles`
--
ALTER TABLE `graduate_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `informasi_beasiswa`
--
ALTER TABLE `informasi_beasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jadwal_kuliah`
--
ALTER TABLE `jadwal_kuliah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal_sidang_skripsi`
--
ALTER TABLE `jadwal_sidang_skripsi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jadwal_uts_uas`
--
ALTER TABLE `jadwal_uts_uas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kelas_karyawan`
--
ALTER TABLE `kelas_karyawan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kelas_reguler`
--
ALTER TABLE `kelas_reguler`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kelas_transfer`
--
ALTER TABLE `kelas_transfer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lowongan_pekerjaan`
--
ALTER TABLE `lowongan_pekerjaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lsp`
--
ALTER TABLE `lsp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `maps_kontak`
--
ALTER TABLE `maps_kontak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `panduan_magang`
--
ALTER TABLE `panduan_magang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penalaran_minat_bakat`
--
ALTER TABLE `penalaran_minat_bakat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengumuman_lain`
--
ALTER TABLE `pengumuman_lain`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `practitioners`
--
ALTER TABLE `practitioners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `praktisi_industri`
--
ALTER TABLE `praktisi_industri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sejarah_milestones`
--
ALTER TABLE `sejarah_milestones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `semester_antara`
--
ALTER TABLE `semester_antara`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `skripsi_tugas_akhir`
--
ALTER TABLE `skripsi_tugas_akhir`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tracer_studi`
--
ALTER TABLE `tracer_studi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `visi_misi`
--
ALTER TABLE `visi_misi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `wisuda`
--
ALTER TABLE `wisuda`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
