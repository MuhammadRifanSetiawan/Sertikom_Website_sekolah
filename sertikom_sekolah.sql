-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Sep 2026 pada 07.35
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
-- Database: `sertikom_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kategori` varchar(50) NOT NULL DEFAULT 'Kegiatan',
  `ringkasan` varchar(255) NOT NULL,
  `isi` longtext NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_publikasi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `slug`, `kategori`, `ringkasan`, `isi`, `gambar`, `tanggal_publikasi`, `created_at`, `updated_at`) VALUES
(1, 'Upacara Peringatan Hari Kemerdekaan RI Berlangsung Khidmat', 'upacara-peringatan-hari-kemerdekaan-ri-berlangsung-khidmat', 'Kegiatan', 'Seluruh dewan guru, staf, dan siswa mengikuti upacara bendera peringatan HUT Kemerdekaan Republik Indonesia.', 'Upacara bendera memperingati Hari Ulang Tahun Kemerdekaan Republik Indonesia berlangsung dengan penuh khidmat di lapangan utama sekolah. Bertindak sebagai pembina upacara adalah Kepala Sekolah yang dalam amanatnya menegaskan pentingnya semangat pantang menyerah, gotong royong, dan penguasaan teknologi digital bagi generasi muda penerus bangsa.', NULL, '2026-08-17', '2026-09-10 00:27:54', '2026-09-10 00:27:54'),
(2, 'Siswa Raih Juara 1 Lomba Keterampilan Siswa (LKS) Bidang Web Technologies', 'siswa-raih-juara-1-lomba-keterampilan-siswa-lks-bidang-web-technologies', 'Prestasi', 'Prestasi gemilang kembali ditorehkan oleh siswa perwakilan kejuruan dalam ajang kompetisi tingkat provinsi.', 'Prestasi membanggakan kembali diraih oleh ananda Rizky Pratama, siswa kelas XII Jurusan Rekayasa Perangkat Lunak, yang sukses meraih Medali Emas Juara 1 dalam Lomba Keterampilan Siswa (LKS) Tingkat Provinsi Bidang Web Technologies. Kompetisi ini menguji perancangan arsitektur aplikasi web fullstack, UI/UX interaktif, serta implementasi clean code berstandar industri.', NULL, '2026-08-25', '2026-09-10 00:27:54', '2026-09-10 00:27:54'),
(3, 'Kunjungan Industri dan Penandatanganan Kerjasama dengan Mitra Perusahaan Teknologi', 'kunjungan-industri-dan-penandatanganan-kerjasama-dengan-mitra-perusahaan-teknologi', 'Kerjasama', 'Sekolah memperkuat kurikulum berbasis industri melalui kemitraan strategis dengan perusahaan IT terkemuka.', 'Dalam rangka memperkuat link and match antara dunia pendidikan dan dunia kerja, sekolah menandatangani nota kesepahaman (MoU) dengan 3 perusahaan teknologi nasional terkemuka. Program kerjasama ini mencakup guru tamu dari industri, fasilitas Praktik Kerja Lapangan (PKL), serta rekrutmen lulusan langsung.', NULL, '2026-09-02', '2026-09-10 00:27:54', '2026-09-10 00:27:54'),
(4, 'Pelaksanaan Uji Sertifikasi Kompetensi Keahlian Bersama Asesor BNSP', 'pelaksanaan-uji-sertifikasi-kompetensi-keahlian-bersama-asesor-bnsp', 'Akademik', 'Ratusan siswa tingkat akhir mengikuti uji kompetensi keahlian untuk memperoleh sertifikat profesi resmi.', 'Sebanyak 250 siswa tingkat akhir mengikuti pelaksanaan Uji Kompetensi Keahlian (UKK) yang dinilai langsung oleh tim asesor bersertifikat Badan Nasional Sertifikasi Profesi (BNSP). Ujian ini meliputi demonstrasi praktik pembuatan aplikasi web, penataan berkas kode terstruktur, dan wawancara pemahaman teknis.', NULL, '2026-09-08', '2026-09-10 00:27:54', '2026-09-10 00:27:54'),
(11, 'MAHASISWA MANAJEMEN INFORMATIKA 5C FOTO BERSAMA', 'mahasiswa-manajemen-informatika-5c-foto-bersama', 'Kegiatan', 'MAHASISWA MANAJEMEN INFORMATIKA 5C FOTO BERSAMA', 'MAHASISWA MANAJEMEN INFORMATIKA 5C FOTO BERSAMAMAHASISWA MANAJEMEN INFORMATIKA 5C FOTO BERSAMAMAHASISWA MANAJEMEN INFORMATIKA 5C FOTO BERSAMAMAHASISWA MANAJEMEN INFORMATIKA 5C FOTO BERSAMAMAHASISWA MANAJEMEN INFORMATIKA 5C FOTO BERSAMAMAHASISWA MANAJEMEN INFORMATIKA 5C FOTO BERSAMAMAHASISWA MANAJEMEN INFORMATIKA 5C FOTO BERSAMAMAHASISWA MANAJEMEN INFORMATIKA 5C FOTO BERSAMA', NULL, '2026-09-12', '2026-09-12 05:42:32', '2026-09-12 05:42:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekstrakurikuler`
--

CREATE TABLE `ekstrakurikuler` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ekskul` varchar(100) NOT NULL,
  `nama_pembina` varchar(150) NOT NULL,
  `jadwal` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ekstrakurikuler`
--

INSERT INTO `ekstrakurikuler` (`id`, `nama_ekskul`, `nama_pembina`, `jadwal`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Pramuka Gugus Depan', 'Budi Santoso, S.Pd', 'Setiap Jumat, 15.00 - 17.00 WIB', 'Membina kedisiplinan, kepemimpinan, kemandirian, dan semangat gotong royong melalui kegiatan kepramukaan yang dinamis di alam terbuka.', NULL, '2026-09-10 00:27:54', '2026-09-10 00:27:54'),
(2, 'Palang Merah Remaja (PMR)', 'Siti Rahmawati, S.Kep', 'Setiap Sabtu, 08.00 - 10.00 WIB', 'Melatih keterampilan pertolongan pertama (P3K), kesiapsiagaan bencana, dan menanamkan nilai-nilai kepedulian kemanusiaan bagi sesama.', NULL, '2026-09-10 00:27:54', '2026-09-10 00:27:54'),
(3, 'Paskibra Satuan Sekolah', 'Hendra Wijaya, S.Pd', 'Selasa & Kamis, 15.30 - 17.30 WIB', 'Membentuk sikap tegap, disiplin tinggi, kekompakan baris-berbaris, dan rasa cinta tanah air sebagai pengibar bendera pusaka sekolah.', NULL, '2026-09-10 00:27:54', '2026-09-10 00:27:54'),
(4, 'Futsal & Sepak Bola', 'Ahmad Fauzi, S.Or', 'Rabu & Sabtu, 16.00 - 18.00 WIB', 'Mengasah bakat dan ketangkasan bermain bola, strategi bertanding sportif, serta kebugaran jasmani siswa.', NULL, '2026-09-10 00:27:54', '2026-09-10 00:27:54'),
(5, 'Seni Tari & Musik Tradisional', 'Dewi Lestari, S.Sn', 'Setiap Senin, 15.00 - 17.00 WIB', 'Melestarikan warisan seni budaya Nusantara melalui tari kreasi daerah, karawitan, dan aransemen musik instrumen.', NULL, '2026-09-10 00:27:54', '2026-09-10 00:27:54'),
(6, 'Coding Club & Robotika', 'Yosep Kurniawan, S.T', 'Setiap Kamis, 14.30 - 16.30 WIB', 'Eksplorasi pemrograman web, algoritma komputasi, perakitan mikrokontroler, dan Internet of Things (IoT).', NULL, '2026-09-10 00:27:54', '2026-09-10 00:27:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(150) NOT NULL,
  `kategori` varchar(50) NOT NULL DEFAULT 'Kegiatan',
  `gambar` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `judul`, `kategori`, `gambar`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Laboratorium Komputer & Rekayasa Perangkat Lunak', 'Fasilitas', 'galeri-lab-komputer.jpg', 'Laboratorium mutakhir ber-AC dengan PC spesifikasi tinggi untuk praktikum coding, basis data, dan desain grafis.', '2026-09-10 00:27:54', '2026-09-10 00:27:54'),
(2, 'Upacara Bendera Senin Pagi di Lapangan Utama', 'Kegiatan', 'galeri-upacara.jpg', 'Pembiasaan karakter dan kedisiplinan siswa melalui kegiatan upacara bendera rutin setiap hari Senin pagi.', '2026-09-10 00:27:54', '2026-09-10 00:27:54'),
(3, 'Gelar Karya Inovasi dan Expo Teknologi Siswa', 'Akademik', 'galeri-expo.jpg', 'Pameran produk teknologi, aplikasi software, dan karya kreatif hasil proyek pembelajaran berbasis industri.', '2026-09-10 00:27:54', '2026-09-10 00:27:54'),
(4, 'Turnamen Futsal Antar Kelas (Classmeeting)', 'Olahraga', 'galeri-futsal.jpg', 'Kompetisi persahabatan antar jurusan untuk menjunjung tinggi sportivitas dan rasa persaudaraan antar siswa.', '2026-09-10 00:27:54', '2026-09-10 00:27:54'),
(5, 'Latihan Pioneering dan Tenda Pramuka Penegak', 'Kegiatan', 'galeri-pramuka.jpg', 'Kegiatan luar ruangan anggota pramuka mengasah kekompakan tim dan keterampilan tali-temali.', '2026-09-10 00:27:54', '2026-09-10 00:27:54'),
(6, 'Perpustakaan Digital dan Pojok Literasi Sekolah', 'Fasilitas', 'galeri-perpustakaan.jpg', 'Ruang baca yang nyaman dengan ribuan koleksi buku fisik, majalah ilmiah, dan akses ribuan e-book digital.', '2026-09-10 00:27:54', '2026-09-10 00:27:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
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
(4, '2026_09_10_072506_create_profil_sekolah_table', 1),
(5, '2026_09_10_072507_create_berita_table', 1),
(6, '2026_09_10_072508_create_ekstrakurikuler_table', 1),
(7, '2026_09_10_072509_create_galeri_table', 1);

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
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `kata_sandi`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator Sekolah', 'admin@sekolah.sch.id', '$2y$12$iXHa/wMEEJDiIY/uZKR3Y.ZT9tEiDW3iJpu90Zy.eUzeVmNG8n4qm', NULL, '2026-09-10 00:27:54', '2026-09-12 05:42:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_sekolah`
--

CREATE TABLE `profil_sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_sekolah` varchar(150) NOT NULL,
  `npsn` varchar(20) NOT NULL,
  `akreditasi` varchar(10) NOT NULL,
  `nama_kepala_sekolah` varchar(150) NOT NULL,
  `sambutan_kepala_sekolah` text DEFAULT NULL,
  `foto_kepala_sekolah` varchar(255) DEFAULT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `sejarah` text DEFAULT NULL,
  `jumlah_guru` int(11) NOT NULL DEFAULT 0,
  `jumlah_siswa` int(11) NOT NULL DEFAULT 0,
  `jumlah_kelas` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profil_sekolah`
--

INSERT INTO `profil_sekolah` (`id`, `nama_sekolah`, `npsn`, `akreditasi`, `nama_kepala_sekolah`, `sambutan_kepala_sekolah`, `foto_kepala_sekolah`, `alamat`, `telepon`, `email`, `visi`, `misi`, `sejarah`, `jumlah_guru`, `jumlah_siswa`, `jumlah_kelas`, `created_at`, `updated_at`) VALUES
(1, 'SMK Negeri 1 Indonesia Merdeka', '20104567', 'A (Unggul)', 'Dr. H. Muhammad Arifin, M.Pd', 'Selamat datang di website resmi SMK Negeri 1 Indonesia Merdeka. Kami berkomitmen menyelenggarakan pendidikan vokasi yang berkarakter, adaptif terhadap perkembangan teknologi, dan bermitra erat dengan Dunia Industri untuk mencetak generasi muda yang kompeten serta berdaya saing global.', 'profil/1789029187_vi22Siso.jpeg', 'Jl. Pendidikan Vokasi No. 45, Kebayoran Baru, Jakarta Selatan', '(021) 78901234', 'info@smknegeri1.sch.id', 'Menjadi pusat keunggulan pendidikan vokasi yang menghasilkan lulusan beriman, bertakwa, berakhlak mulia, kompeten, dan mandiri.', '1. Menyelenggarakan pembelajaran berbasis kompetensi industri dan teknologi digital.\r\n2. Menumbuhkan budaya disiplin, integritas, dan etos kerja profesional.\r\n3. Menjalin kemitraan strategis dengan Dunia Usaha dan Dunia Industri (DUDI).\r\n4. Mendorong inovasi dan jiwa wirausaha di kalangan peserta didik.', 'SMK Negeri 1 Indonesia Merdeka didirikan pada tahun 1995. Selama lebih dari 30 tahun berdiri, sekolah ini terus bertransformasi menjadi salah satu Sekolah Menengah Kejuruan Pusat Keunggulan dengan ribuan alumni yang telah berkiprah di perusahaan multinasional maupun berwirausaha mandiri.', 50, 880, 25, '2026-09-10 00:27:54', '2026-09-10 01:33:07');

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
('eOirvd2ohjJAaQe1KR3t5ezxSc1frgJIyZne5pHF', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJrSkZ3Mzltc3p4bVBCdTBEd3haMVBGcjBWT3B6aUJ3YUswQXF3UTFjIiwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsIl9mbGFzaCI6eyJuZXciOltdLCJvbGQiOltdfSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvZ2FsZXJpIiwicm91dGUiOiJhZG1pbi5nYWxlcmkuaW5kZXgifX0=', 1789276528),
('F7btapMyJKb79KGHtlM971WBBr97o5quWWl11WiD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.136.2 Chrome/148.0.7778.280 Electron/42.10.0 Safari/537.36', 'eyJfdG9rZW4iOiJPMzJ4RGs3YmtpbnVEdmFrUW1wWnl0TFVkWDF4UUtRNkM5WlllMndmIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJiZXJhbmRhIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1789026376),
('jxT85df6WKiSCYGBr98Jpn9xtWbvy5MdPnGmg1Hs', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiI1eE02WVN6UGd3STVVdm81WmVDSWJXdlQzUW15MmFkamFFckpjamxuIiwiX2ZsYXNoIjp7Im5ldyI6W10sIm9sZCI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDAiLCJyb3V0ZSI6ImJlcmFuZGEifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9', 1789030414),
('PelGjoJxDsyTjUCdlAX2wPvfvqyRpzEIZk9UKRIz', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJwUmFnOTlCN1RTamN2UzVuNUZRZkNYaDJ5cFZEbUFVRU43ZXFEZzFKIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9tYXN1ayIsInJvdXRlIjoibWFzdWsifSwiX2ZsYXNoIjp7Im9sZCI6WyJzdWtzZXMiXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxLCJzdWtzZXMiOiJTZWxhbWF0IGRhdGFuZyBrZW1iYWxpLCBBZG1pbmlzdHJhdG9yIFNla29sYWgifQ==', 1789276520),
('R81rWVa5FrgWYIjiVHhTWMjYuTcvTDr07QRzNysn', NULL, '127.0.0.1', 'Symfony', 'eyJfdG9rZW4iOiJrMktERG5IaFBWUmZvbVQwc1VBM3IxcnhxTFRJbnBqM0dTZ0ZneTlHIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdCIsInJvdXRlIjoiYmVyYW5kYSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1789026134),
('VpbD30I7sY0517NI4P8e8Nx6OJxzbzDZpluaecof', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJmbm5BT0FtT2pSTzdRWkhlbExMRlZoSjlvUUh3UXp3S3dzM2lrdjE3IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvcHJvZmlsIiwicm91dGUiOiJhZG1pbi5wcm9maWwuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=', 1789217097);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `berita_slug_unique` (`slug`);

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
-- Indeks untuk tabel `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
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
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengguna_email_unique` (`email`);

--
-- Indeks untuk tabel `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
