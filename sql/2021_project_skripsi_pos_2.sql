-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Agu 2021 pada 08.53
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2021_project_skripsi_pos_2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `id_brand` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'assets/barang/gambar/default.jpg',
  `harga_beli` double(8,2) NOT NULL,
  `harga_jual` double(8,2) NOT NULL,
  `diskon` int(11) NOT NULL DEFAULT 0,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `id_kategori`, `id_brand`, `kode_barang`, `nama_barang`, `gambar`, `harga_beli`, `harga_jual`, `diskon`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'KD001', 'Baju keren', 'assets/barang/gambar/QHrcYgFkDn2n8Q4IWRPND8b4bX6rMkkMrnwauiJU.png', 2000.00, 4000.00, 0, 18, '2021-08-08 02:58:07', '2021-08-08 04:19:14'),
(2, 1, 2, 'KD002', 'Baju Keren', 'assets/barang/gambar/default.jpg', 2000.00, 3000.00, 0, 14, '2021-08-08 03:20:43', '2021-08-08 04:19:14'),
(3, 2, 1, 'KD003', 'Celana GAP', 'assets/barang/gambar/default.jpg', 2000.00, 4000.00, 0, 10, '2021-08-08 03:21:09', '2021-08-08 03:21:09'),
(4, 2, 2, 'KD004', 'Celana Zara', 'assets/barang/gambar/default.jpg', 1000.00, 4000.00, 0, 20, '2021-08-08 03:21:59', '2021-08-08 03:21:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `brands`
--

INSERT INTO `brands` (`id`, `nama_brand`, `created_at`, `updated_at`) VALUES
(1, 'GAP', '2021-08-08 02:55:55', '2021-08-08 02:56:57'),
(2, 'Zara', '2021-08-08 02:57:13', '2021-08-08 02:57:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kasir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` int(11) NOT NULL,
  `uang_customer` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `checkouts`
--

INSERT INTO `checkouts` (`id`, `invoice`, `nama_kasir`, `grand_total`, `uang_customer`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 'BO1628421543', 'Admin', 11000, 20000, '2021-08-08', '2021-08-08 04:19:14', '2021-08-08 04:19:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_checkouts`
--

CREATE TABLE `detail_checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_checkout` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_checkouts`
--

INSERT INTO `detail_checkouts` (`id`, `id_checkout`, `kode_barang`, `nama_barang`, `kategori`, `brand`, `harga_beli`, `harga`, `jumlah`, `diskon`, `created_at`, `updated_at`) VALUES
(1, 1, 'KD001', 'Baju keren', 'Baju', 'GAP', 2000, 4000, 2, 0, '2021-08-08 04:19:14', '2021-08-08 04:19:14'),
(2, 1, 'KD002', 'Baju Keren', 'Baju', 'Zara', 2000, 3000, 1, 0, '2021-08-08 04:19:14', '2021-08-08 04:19:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Baju', '2021-08-08 02:53:04', '2021-08-08 02:55:28'),
(2, 'Celana', '2021-08-08 02:55:41', '2021-08-08 02:55:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_28_075709_add_username_to_users_table', 1),
(5, '2021_07_28_080930_create_kategoris_table', 1),
(6, '2021_07_28_081015_create_brands_table', 1),
(7, '2021_07_28_081127_create_barangs_table', 1),
(8, '2021_07_29_055959_add_gambar_to_barangs_table', 1),
(9, '2021_07_31_074657_add_stock_to_barangs_table', 1),
(10, '2021_08_01_100836_create_keranjangs_table', 1),
(11, '2021_08_01_115311_create_checkouts_table', 1),
(12, '2021_08_01_115500_create_detail_checkouts_table', 1),
(13, '2021_08_02_114136_add_harga_beli_to_detail_checkouts_table', 1),
(14, '2021_08_04_074535_add_nik_alamat_to_users_table', 1),
(15, '2021_08_04_083926_create_temp_keranjangs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_keranjangs`
--

CREATE TABLE `temp_keranjangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `alamat`, `nik`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Banjar Agung Indah Blok F17 No12', '11217052', 'admin@admin.com', 'superadmin', '2021-08-07 04:43:09', '$2y$10$wNmds1o.8T2Ba42XU7h1leFlj7.b/CPT47TMeC0zqv2752x0W2y9.', 'HofKTDjoazrKZMSvOqvC8MLS7yPJUM364oZoGzBtOoKwNhXbkB7PJfKxhV1d', '2021-08-07 04:43:09', '2021-08-07 04:43:09'),
(2, 'karyawan', 'Handoko Adji Pangestu', 'BANJAR AGUNG INDAH E 17 NO 12, RT/RW 001/009, Kel/Desa BANJAR AGUNG, Kecamatan CIPOCOK JAYA', '11217012', 'handokoadjipangestu@gmail.com', 'handokoadjip', NULL, '$2y$10$inIZHTYHerOquSsxnJSv2.c8aB1h7fyU.xbhg7JaRiH.3UrGYmhYW', NULL, '2021-08-08 02:49:33', '2021-08-08 02:52:41');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangs_id_kategori_foreign` (`id_kategori`),
  ADD KEY `barangs_id_brand_foreign` (`id_brand`);

--
-- Indeks untuk tabel `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_checkouts`
--
ALTER TABLE `detail_checkouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_checkouts_id_checkout_foreign` (`id_checkout`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `temp_keranjangs`
--
ALTER TABLE `temp_keranjangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `temp_keranjangs_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `detail_checkouts`
--
ALTER TABLE `detail_checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `temp_keranjangs`
--
ALTER TABLE `temp_keranjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_id_brand_foreign` FOREIGN KEY (`id_brand`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `barangs_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_checkouts`
--
ALTER TABLE `detail_checkouts`
  ADD CONSTRAINT `detail_checkouts_id_checkout_foreign` FOREIGN KEY (`id_checkout`) REFERENCES `checkouts` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `temp_keranjangs`
--
ALTER TABLE `temp_keranjangs`
  ADD CONSTRAINT `temp_keranjangs_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
