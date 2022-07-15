-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2022 pada 10.40
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.23

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
(6, 3, 3, 'CBT1', 'Cotton Bell (Tunik)', 'assets/barang/gambar/ZizqrwNA0h0WEb0C899lX36jsrRhoSaQCoNmvx63.jpg', 116000.00, 145000.00, 0, 46, '2021-08-12 10:06:39', '2021-04-11 23:45:43'),
(7, 4, 3, 'CBT2', 'Cotton Bell (Kemeja)', 'assets/barang/gambar/7bpshK70cGTh8ApE631YkO1GzDGainPOiucIn29v.jpg', 106400.00, 133000.00, 0, 3, '2021-08-15 08:51:34', '2021-04-22 13:45:15'),
(8, 5, 3, 'CBT3', 'Cotton Bell (Outer)', 'assets/barang/gambar/aYpyFA6wh5Kllx8Qp0TwagG39z9xA2fTpp0WRhJ4.jpg', 116000.00, 145000.00, 0, 63, '2021-08-15 08:53:27', '2021-04-15 08:02:28'),
(9, 5, 4, 'CI1', 'Chifon Import (Outer)', 'assets/barang/gambar/MbBYfwxzX8SARqpFRgwUy7IxulfmE1VbY2sjlDdo.jpg', 132000.00, 165000.00, 0, 78, '2021-08-15 08:54:59', '2021-04-06 23:23:56'),
(10, 6, 4, 'DI1', 'Dress Import Flower Red', 'assets/barang/gambar/g7MDBIpGynbMutjY4pbHBnjOoUOTHMpPnBxp83wk.jpg', 156000.00, 195000.00, 0, 67, '2021-08-15 08:57:24', '2021-04-23 13:47:31'),
(11, 6, 4, 'DI2', 'Dress import Flower Green', 'assets/barang/gambar/zWq7XoA7wZKC1mggtb0tca6etCV2TceV5cXa0ytE.jpg', 164000.00, 205000.00, 0, 56, '2021-08-15 08:59:19', '2021-08-15 08:59:19'),
(12, 4, 5, 'KI1', 'Kemeja Import (Mickey Mouse)', 'assets/barang/gambar/YfrzzKoEtHhOsaFHpfM1e2x1DqsTsuy0fw8XlKgA.jpg', 118400.00, 148000.00, 0, 73, '2021-08-15 09:00:22', '2021-05-01 14:04:47'),
(13, 4, 5, 'KI2', 'kemeja Import (Red)', 'assets/barang/gambar/w6kUH6u8hHUn2pCuncsbZg6Woe9lSo4hEVkLreXG.jpg', 118400.00, 148000.00, 0, 84, '2021-08-15 09:01:23', '2021-09-08 00:36:15'),
(14, 4, 5, 'KI3', 'Kemeja Import (Flower)', 'assets/barang/gambar/NLu15DSZyAvSWgdjqbjk9v5HrPnVqYjGPnk3QE1W.jpg', 118400.00, 148000.00, 0, 3, '2021-08-15 09:02:50', '2021-04-11 23:47:23'),
(15, 4, 5, 'KI4', 'Kemeja Import (White)', 'assets/barang/gambar/9wV4bfkjZGUm3OGJZVEsKwanDMkoiTRk9JkrT4lP.jpg', 118400.00, 148000.00, 0, 78, '2021-08-15 09:04:55', '2021-08-16 22:02:14'),
(16, 4, 5, 'KI5', 'Kemeja Import (Jeans)', 'assets/barang/gambar/dfWjs51d07vYfWFAM7Ck4oQl5JOeEt9D5k0OqTqZ.jpg', 100000.00, 125000.00, 0, 76, '2021-08-15 09:06:18', '2021-08-15 09:06:18'),
(17, 7, 3, 'CBT4', 'Cotton Bell (Blouse)', 'assets/barang/gambar/7vOY17JuObRulO34Xfn0hMC7wyPF6vf4ZkAyN0Ew.jpg', 94400.00, 118000.00, 0, 47, '2021-08-15 09:07:52', '2021-05-01 14:04:47'),
(18, 4, 3, 'CBT5', 'Cotton Bell (Kemeja Mix Organza)', 'assets/barang/gambar/yvOiXKKAIyEHRrz4LgWB2mthuwBP5gtgSo8QbfE4.jpg', 80000.00, 100000.00, 0, 49, '2021-08-15 09:08:56', '2021-04-08 23:31:10'),
(19, 8, 6, 'JM1', 'Jumsuit Muslim (Jumsuit)', 'assets/barang/gambar/5iOS0x2Y82XFd3WmFHq0cHeWghDR9bQ2AVn92TtF.jpg', 108000.00, 135000.00, 0, 46, '2021-08-15 09:09:51', '2021-04-19 13:39:27'),
(20, 6, 4, 'DI3', 'Dress Import (Yellow)', 'assets/barang/gambar/srYfpgVYXTyDjzFnQot8rFhcJkP3QhXYPNYWI6a5.jpg', 164000.00, 205000.00, 0, 50, '2021-08-15 09:11:01', '2021-08-15 09:11:01'),
(21, 6, 4, 'DI4', 'Dress Import (Abstrak)', 'assets/barang/gambar/c1VEP57fZC3qS155fDqZIN3v7DlQh80qUesGE7rZ.jpg', 172000.00, 215000.00, 0, 49, '2021-08-15 09:12:21', '2021-04-06 23:23:56'),
(22, 6, 4, 'DI5', 'Dress Import (Vintage)', 'assets/barang/gambar/3MNqqyx7w6tMibJ2aaNe1hNuDdk7xfykIiXgX19h.jpg', 156000.00, 195000.00, 0, 47, '2021-08-15 09:13:33', '2021-05-01 14:04:48'),
(23, 6, 4, 'DI6', 'Dress Import (Black)', 'assets/barang/gambar/AwyAaA8Ui1zqo0BGeQ8Ce11nDoYkVue1LGUhd5bC.jpg', 172000.00, 215000.00, 0, 50, '2021-08-15 09:14:42', '2021-08-15 09:14:42'),
(24, 6, 4, 'DI7', 'Dress Import (Blue)', 'assets/barang/gambar/H5aVFceO7LirzUntxMKNP0oiAHjepRidJapmNpv6.jpg', 160000.00, 200000.00, 0, 49, '2021-08-15 09:15:51', '2021-04-08 23:31:10'),
(25, 6, 4, 'DI8', 'Dress Import (Long Dress Outer)', 'assets/barang/gambar/JylDfwh1OROjpF2zTxKu93FpU3qy2AvZuBpJBhLH.jpg', 172000.00, 215000.00, 0, 50, '2021-08-15 09:16:38', '2021-08-15 09:16:38'),
(26, 6, 4, 'DI9', 'Dress Import (Sabrina)', 'assets/barang/gambar/tPHHxnUvftVx3OyD6vsPC7Ohk5LtxUSB902ZekV2.jpg', 150400.00, 188000.00, 0, 44, '2021-08-15 09:18:13', '2021-04-28 13:54:07'),
(27, 6, 4, 'DI10', 'Dress Import (luna)', 'assets/barang/gambar/lIw6lxOD96hR9AXS2zsi3URhTk1VUHDtzZUIbhos.jpg', 158400.00, 198000.00, 0, 56, '2021-08-15 09:19:14', '2021-04-06 23:23:56'),
(28, 6, 4, 'DI11', 'Dress Import (Balen)', 'assets/barang/gambar/eUXiHZ4iL1X9LEuXpVsSw0GH74SSPGHE0a8E6lGn.jpg', 158400.00, 198000.00, 0, 85, '2021-08-15 09:20:09', '2021-04-13 07:53:24'),
(29, 6, 6, 'DM1', 'Dress maxi import (Green)', 'assets/barang/gambar/VVbBKslIBoatcHbIhjENDWRtSVOiOS7YZqwZgogs.jpg', 148000.00, 185000.00, 0, 65, '2021-08-15 09:21:47', '2021-04-14 07:57:11'),
(30, 6, 6, 'DM2', 'Dress maxi import (Brown)', 'assets/barang/gambar/tFWTj8Ki7SZ0ATEYsDJGjMGjtfVal6e2WK5aA7uY.jpg', 156000.00, 195000.00, 0, 75, '2021-08-15 09:22:39', '2021-04-24 13:48:52'),
(31, 4, 5, 'KI6', 'Kemeja Import (Black)', 'assets/barang/gambar/DmBmCJMpdJpPfCdIjX0JBXSckMVQMhX5WXi6s5bC.jpg', 116000.00, 145000.00, 0, 74, '2021-08-15 09:23:34', '2021-04-28 13:54:07'),
(32, 4, 5, 'KI7', 'Kemeja Import (Dior)', 'assets/barang/gambar/DJg3153SDy0hz7Eteu73HUSYzeQv8WoJpytODNPV.jpg', 116000.00, 145000.00, 0, 62, '2021-08-15 09:24:36', '2021-04-15 08:02:28'),
(33, 4, 5, 'KI8', 'Kemeja Import (Mocca)', 'assets/barang/gambar/3CRjkkg4F1zzBXD2s1UZckVhezaS29k6YyXaB6wJ.jpg', 108000.00, 135000.00, 0, 55, '2021-08-15 09:25:41', '2021-08-15 09:25:41'),
(34, 6, 4, 'DI12', 'Dress Import (Purple)', 'assets/barang/gambar/COVkElQZ89TW9fFWicLKQJxVi89CZ95o4Mbfcr1N.jpg', 156000.00, 195000.00, 0, 57, '2021-08-15 09:26:46', '2021-04-27 13:52:03'),
(35, 6, 4, 'DI13', 'Dress Import (Twiscone)', 'assets/barang/gambar/W3YhgN5P1Dp57et5PVABpmwRubBUOJw6MND6wyyy.jpg', 172000.00, 215000.00, 0, 56, '2021-08-15 09:28:16', '2021-04-29 13:56:47'),
(36, 6, 7, 'TB1', 'Tangtop Bludru dan Rok', 'assets/barang/gambar/NCq8Rx5qJuzbqm51CpnW3G5EWsjHv7N2BRtPSx1M.jpg', 150400.00, 188000.00, 0, 71, '2021-08-15 09:29:14', '2021-04-28 13:54:07'),
(37, 9, 5, 'OS1', 'One set claudy (Busui)', 'assets/barang/gambar/eyANqUlVK4t01bBVupqPikT3MA7qVl2POXkptI24.jpg', 120000.00, 150000.00, 0, 72, '2021-08-15 09:30:39', '2021-04-26 13:50:48'),
(38, 9, 5, 'OS2', 'One set  (Sporty)', 'assets/barang/gambar/M0lOJyhmUGxg1eOCQeFIpXgiG7RGR5TN6GHkNW0B.jpg', 116000.00, 145000.00, 0, 49, '2021-08-15 09:31:33', '2021-05-01 14:04:47'),
(39, 9, 5, 'OS3', 'One Set (Sporty Parasut)', 'assets/barang/gambar/RdPLXYQwwsFnoGhuyRd4iY6FXN8sp9cFNHUovWTT.jpg', 116000.00, 145000.00, 0, 53, '2021-08-15 09:32:23', '2021-04-30 13:57:39'),
(40, 9, 2, 'OS4', 'One Set (Zara)', 'assets/barang/gambar/20UfiRkx1vph3p75A3oBACd2QN9B7fXMQKjPVyYW.jpg', 120000.00, 150000.00, 0, 49, '2021-08-15 09:33:14', '2021-04-29 13:56:48'),
(41, 3, 4, 'ET1', 'Erin Tunik', 'assets/barang/gambar/zUXVg9QRxLjAhRUfciUPVP3mBKio6B5XkbzVa2cr.jpg', 88000.00, 110000.00, 0, 51, '2021-08-15 09:34:19', '2021-04-27 13:52:03'),
(42, 3, 4, 'ET2', 'Erin Tunik (Moscrape)', 'assets/barang/gambar/Nzy31aB252mkon9nrzDRCQaOVyl7hyUvJ69uUEnl.jpg', 96000.00, 120000.00, 0, 69, '2021-08-15 09:35:17', '2021-04-26 13:50:49'),
(43, 3, 4, 'ET3', 'Erin Tunik (Ana Tunik)', 'assets/barang/gambar/5736e9Eh8KdMFR1lY2biS09s3myeiAvNHHWRC30Y.jpg', 88000.00, 110000.00, 0, 74, '2021-08-15 09:37:26', '2021-04-26 13:50:49'),
(44, 9, 5, 'OS5', 'One Set Black', 'assets/barang/gambar/7hDGmYEgri8kdWhVjOdZKrpW0WIYvO6d38XBvhih.jpg', 120000.00, 150000.00, 0, 56, '2021-08-15 09:38:24', '2021-04-28 13:54:07'),
(45, 10, 8, 'JR1', 'Jeans Riped (Pants)', 'assets/barang/gambar/rf66ZxSMmp7t5YQDRrRFhy83WiESN8Jt6j8WDFOF.jpg', 88000.00, 110000.00, 0, 59, '2021-08-15 09:39:17', '2021-04-11 23:42:39'),
(46, 6, 6, 'SRP1', 'Syari Polkadut Yellow', 'assets/barang/gambar/3zysLgV3Y2zvnFIQT0z9McdzrAazKkcIwTbWFRfB.jpg', 176000.00, 220000.00, 0, 75, '2021-08-15 09:41:20', '2021-08-15 09:41:20'),
(47, 6, 6, 'SRP2', 'Syari Polkadut Pink', 'assets/barang/gambar/u3N3HMQmCtGBhjEyWItyfFoBT0RdITZhXgY24rXJ.jpg', 176000.00, 220000.00, 0, 68, '2021-08-15 09:42:36', '2021-08-15 09:42:36'),
(48, 6, 6, 'SRL1', 'Syari Layer Black&Mocca', 'assets/barang/gambar/Vu4CRAoIJGEzdpKJlCNsEFlk1nT7JoJ8B5T7Xknb.jpg', 184000.00, 230000.00, 0, 56, '2021-08-15 09:43:33', '2021-08-15 09:43:33'),
(49, 6, 6, 'SRL2', 'Syari Layer Black&Green', 'assets/barang/gambar/C77PZ9g2fFrvAddncy6R6bfJPnPwrHGOpfvsRNJ9.jpg', 208000.00, 260000.00, 0, 68, '2021-08-15 09:44:30', '2021-08-15 09:44:30'),
(50, 6, 6, 'SRL3', 'Syari Layer Mocca&Red', 'assets/barang/gambar/oQgnrbxKbHDDTZn0QK4FKTNWCNzGyEPyseVfM8Yi.jpg', 208000.00, 260000.00, 0, 69, '2021-08-15 09:45:17', '2021-08-15 09:45:17'),
(51, 11, 3, 'KS1', 'Kulot Scuba Cutbray Black', 'assets/barang/gambar/RczuOGPNGN6NilXu6m7uk9cz3cOb8FP8d0Dp1sWt.jpg', 84000.00, 105000.00, 0, 68, '2021-08-15 09:46:29', '2021-08-15 09:46:29'),
(52, 11, 3, 'KS2', 'Kulot Scuba Cutbray White', 'assets/barang/gambar/VWBR0eBzxyG8ChCy0hYxFlFHDEtel5pN0BXdRuu6.jpg', 84000.00, 105000.00, 0, 68, '2021-08-15 09:47:24', '2021-08-15 09:47:24'),
(53, 11, 3, 'KH1', 'Kulot Haight West White', 'assets/barang/gambar/8MidHwejl9IA0QsOHgBHXo9qEqmuLWh5V2pPVg6y.jpg', 84000.00, 105000.00, 0, 67, '2021-08-15 09:48:36', '2021-08-15 09:48:36'),
(54, 11, 3, 'KH2', 'Kulot Haight West Black', 'assets/barang/gambar/MkQzzoF0w5Ij3swoVvb7hBErFImq9ALrkE3Zu7BC.jpg', 100000.00, 125000.00, 0, 68, '2021-08-15 09:49:32', '2021-08-15 09:49:32'),
(55, 11, 3, 'KH3', 'Kulot Haight West Mocca', 'assets/barang/gambar/TdE1fVxIlEF1B87gZX3SpMu7kf0bNLagqRkTBIie.jpg', 100000.00, 125000.00, 0, 60, '2021-08-15 09:50:34', '2021-08-15 09:50:34');

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
(2, 'Zara', '2021-08-08 02:57:13', '2021-08-08 02:57:13'),
(3, 'Cotton Bell', '2021-08-12 10:04:35', '2021-08-12 10:04:35'),
(4, 'Erin Butik', '2021-08-15 08:48:34', '2021-08-15 08:48:34'),
(5, 'Aleacarista', '2021-08-15 08:48:44', '2021-08-15 08:48:44'),
(6, 'Hoppylovy', '2021-08-15 08:48:55', '2021-08-15 08:48:55'),
(7, 'Heelsaddict', '2021-08-15 08:49:07', '2021-08-15 08:49:07'),
(8, 'Drico Jeans', '2021-08-15 08:49:22', '2021-08-15 08:49:22');

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
(4, 'BO1617296997', 'Firda', 808000, 809000, '2021-04-01', '2021-04-01 10:10:21', '2021-04-01 10:10:21'),
(5, 'BO1617383866', 'Aldi Putra Nawasta', 1559000, 1600000, '2021-04-02', '2021-04-02 10:18:07', '2021-04-02 10:18:07'),
(6, 'BO1617430352', 'Aldi Putra Nawasta', 783000, 800000, '2021-04-03', '2021-04-02 23:13:20', '2021-04-02 23:13:20'),
(7, 'BO1617603488', 'Ajeng Kartini', 340000, 350000, '2021-04-05', '2021-04-04 23:18:20', '2021-04-04 23:18:20'),
(8, 'BO1617689989', 'Ajeng Kartini', 698000, 700000, '2021-04-06', '2021-04-05 23:20:09', '2021-04-05 23:20:09'),
(9, 'BO1617776510', 'Ajeng Kartini', 593000, 600000, '2021-04-07', '2021-04-06 23:21:59', '2021-04-06 23:21:59'),
(10, 'BO1617776625', 'Ajeng Kartini', 726000, 730000, '2021-04-07', '2021-04-06 23:23:55', '2021-04-06 23:23:55'),
(11, 'BO1617863369', 'Ajeng Kartini', 416000, 416000, '2021-04-08', '2021-04-07 23:29:47', '2021-04-07 23:29:47'),
(12, 'BO1617949856', 'Ajeng Kartini', 640000, 640000, '2021-04-09', '2021-04-08 23:31:10', '2021-04-08 23:31:10'),
(13, 'BO1618036401', 'Ajeng Kartini', 405000, 405000, '2021-04-10', '2021-04-09 23:33:34', '2021-04-09 23:33:34'),
(14, 'BO1618209748', 'Firda', 1046000, 1046000, '2021-04-12', '2021-04-11 23:42:38', '2021-04-11 23:42:38'),
(15, 'BO1618325535', 'Ajeng Kartini', 498000, 500000, '2021-04-13', '2021-04-13 07:52:23', '2021-04-13 07:52:23'),
(16, 'BO1618325596', 'Ajeng Kartini', 498000, 500000, '2021-04-13', '2021-04-13 07:53:24', '2021-04-13 07:53:24'),
(17, 'BO1618412219', 'Ajeng Kartini', 1466000, 1500000, '2021-04-14', '2021-04-14 07:57:11', '2021-04-14 07:57:11'),
(18, 'BO1618498928', 'Ajeng Kartini', 2165000, 2200000, '2021-04-15', '2021-04-15 08:02:27', '2021-04-15 08:02:27'),
(19, 'BO1618585511', 'Ajeng Kartini', 548000, 600000, '2021-04-16', '2021-04-16 08:05:33', '2021-04-16 08:05:33'),
(20, 'BO1618691820', 'Ajeng Kartini', 405000, 405000, '2021-04-17', '2021-04-17 13:37:12', '2021-04-17 13:37:12'),
(21, 'BO1618864758', 'Ajeng Kartini', 626000, 626000, '2021-04-19', '2021-04-19 13:39:27', '2021-04-19 13:39:27'),
(22, 'BO1618951264', 'Ajeng Kartini', 761000, 761000, '2021-04-20', '2021-04-20 13:41:53', '2021-04-20 13:41:53'),
(23, 'BO1619037821', 'Ajeng Kartini', 548000, 548000, '2021-04-21', '2021-04-21 13:43:52', '2021-04-21 13:43:52'),
(24, 'BO1619124300', 'Ajeng Kartini', 281000, 281000, '2021-04-22', '2021-04-22 13:45:15', '2021-04-22 13:45:15'),
(25, 'BO1619210842', 'Ajeng Kartini', 1019000, 1019000, '2021-04-23', '2021-04-23 13:47:31', '2021-04-23 13:47:31'),
(26, 'BO1619297324', 'Ajeng Kartini', 670000, 670000, '2021-04-24', '2021-04-24 13:48:52', '2021-04-24 13:48:52'),
(27, 'BO1619470238', 'Ajeng Kartini', 835000, 835000, '2021-04-26', '2021-04-26 13:50:48', '2021-04-26 13:50:48'),
(28, 'BO1619556715', 'Ajeng Kartini', 450000, 450000, '2021-04-27', '2021-04-27 13:52:02', '2021-04-27 13:52:02'),
(29, 'BO1619643230', 'Ajeng Kartini', 1031000, 1031000, '2021-04-28', '2021-04-28 13:54:07', '2021-04-28 13:54:07'),
(30, 'BO1619729800', 'Ajeng Kartini', 365000, 365000, '2021-04-29', '2021-04-29 13:56:47', '2021-04-29 13:56:47'),
(31, 'BO1619816253', 'Ajeng Kartini', 145000, 145000, '2021-04-30', '2021-04-30 13:57:39', '2021-04-30 13:57:39'),
(32, 'BO1619903059', 'Ajeng Kartini', 606000, 606000, '2021-05-01', '2021-05-01 14:04:47', '2021-05-01 14:04:47'),
(33, 'BO1631086537', 'Firda', 148000, 150000, '2021-09-08', '2021-09-08 00:36:15', '2021-09-08 00:36:15');

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
(6, 4, 'DI1', 'Dress Import Flower Red', 'Dress', 'Erin Butik', 156000, 195000, 1, 0, '2021-04-01 10:10:21', '2021-04-01 10:10:21'),
(7, 4, 'KI1', 'Kemeja Import (Mickey Mouse)', 'Kemeja', 'Aleacarista', 118400, 148000, 1, 0, '2021-04-01 10:10:21', '2021-04-01 10:10:21'),
(8, 4, 'OS4', 'One Set (Zara)', 'One Set', 'Zara', 120000, 150000, 1, 0, '2021-04-01 10:10:21', '2021-04-01 10:10:21'),
(9, 4, 'ET2', 'Erin Tunik (Moscrape)', 'Tunik', 'Erin Butik', 96000, 120000, 1, 0, '2021-04-01 10:10:21', '2021-04-01 10:10:21'),
(10, 4, 'DI12', 'Dress Import (Purple)', 'Dress', 'Erin Butik', 156000, 195000, 1, 0, '2021-04-01 10:10:21', '2021-04-01 10:10:21'),
(11, 5, 'OS3', 'One Set (Sporty Parasut)', 'One Set', 'Aleacarista', 116000, 145000, 1, 0, '2021-04-02 10:18:07', '2021-04-02 10:18:07'),
(12, 5, 'ET1', 'Erin Tunik', 'Tunik', 'Erin Butik', 88000, 110000, 1, 0, '2021-04-02 10:18:08', '2021-04-02 10:18:08'),
(13, 5, 'ET3', 'Erin Tunik (Ana Tunik)', 'Tunik', 'Erin Butik', 88000, 110000, 1, 0, '2021-04-02 10:18:08', '2021-04-02 10:18:08'),
(14, 5, 'TB1', 'Tangtop Bludru dan Rok', 'Dress', 'Heelsaddict', 150400, 188000, 1, 0, '2021-04-02 10:18:08', '2021-04-02 10:18:08'),
(15, 5, 'KI1', 'Kemeja Import (Mickey Mouse)', 'Kemeja', 'Aleacarista', 118400, 148000, 1, 0, '2021-04-02 10:18:08', '2021-04-02 10:18:08'),
(16, 5, 'DI10', 'Dress Import (luna)', 'Dress', 'Erin Butik', 158400, 198000, 1, 0, '2021-04-02 10:18:08', '2021-04-02 10:18:08'),
(17, 5, 'DI12', 'Dress Import (Purple)', 'Dress', 'Erin Butik', 156000, 195000, 2, 0, '2021-04-02 10:18:08', '2021-04-02 10:18:08'),
(18, 5, 'OS4', 'One Set (Zara)', 'One Set', 'Zara', 120000, 150000, 1, 0, '2021-04-02 10:18:08', '2021-04-02 10:18:08'),
(19, 5, 'ET2', 'Erin Tunik (Moscrape)', 'Tunik', 'Erin Butik', 96000, 120000, 1, 0, '2021-04-02 10:18:08', '2021-04-02 10:18:08'),
(20, 6, 'OS3', 'One Set (Sporty Parasut)', 'One Set', 'Aleacarista', 116000, 145000, 1, 0, '2021-04-02 23:13:20', '2021-04-02 23:13:20'),
(21, 6, 'DI12', 'Dress Import (Purple)', 'Dress', 'Erin Butik', 156000, 195000, 1, 0, '2021-04-02 23:13:20', '2021-04-02 23:13:20'),
(22, 6, 'ET1', 'Erin Tunik', 'Tunik', 'Erin Butik', 88000, 110000, 1, 0, '2021-04-02 23:13:20', '2021-04-02 23:13:20'),
(23, 6, 'TB1', 'Tangtop Bludru dan Rok', 'Dress', 'Heelsaddict', 150400, 188000, 1, 0, '2021-04-02 23:13:20', '2021-04-02 23:13:20'),
(24, 6, 'OS2', 'One set  (Sporty)', 'One Set', 'Aleacarista', 116000, 145000, 1, 0, '2021-04-02 23:13:21', '2021-04-02 23:13:21'),
(25, 7, 'KI7', 'Kemeja Import (Dior)', 'Kemeja', 'Aleacarista', 116000, 145000, 1, 0, '2021-04-04 23:18:20', '2021-04-04 23:18:20'),
(26, 7, 'DI12', 'Dress Import (Purple)', 'Dress', 'Erin Butik', 156000, 195000, 1, 0, '2021-04-04 23:18:21', '2021-04-04 23:18:21'),
(27, 8, 'DI9', 'Dress Import (Sabrina)', 'Dress', 'Erin Butik', 150400, 188000, 1, 0, '2021-04-05 23:20:09', '2021-04-05 23:20:09'),
(28, 8, 'KI6', 'Kemeja Import (Black)', 'Kemeja', 'Aleacarista', 116000, 145000, 1, 0, '2021-04-05 23:20:09', '2021-04-05 23:20:09'),
(29, 8, 'DI13', 'Dress Import (Twiscone)', 'Dress', 'Erin Butik', 172000, 215000, 1, 0, '2021-04-05 23:20:09', '2021-04-05 23:20:09'),
(30, 8, 'OS5', 'One Set Black', 'One Set', 'Aleacarista', 120000, 150000, 1, 0, '2021-04-05 23:20:09', '2021-04-05 23:20:09'),
(31, 9, 'CBT1', 'Cotton Bell (Tunik)', 'Tunik', 'Cotton Bell', 116000, 145000, 1, 0, '2021-04-06 23:21:59', '2021-04-06 23:21:59'),
(32, 9, 'CI1', 'Chifon Import (Outer)', 'Outer', 'Erin Butik', 132000, 165000, 1, 0, '2021-04-06 23:21:59', '2021-04-06 23:21:59'),
(33, 9, 'KI3', 'Kemeja Import (Flower)', 'Kemeja', 'Aleacarista', 118400, 148000, 1, 0, '2021-04-06 23:21:59', '2021-04-06 23:21:59'),
(34, 9, 'JM1', 'Jumsuit Muslim (Jumsuit)', 'Jumsuit', 'Hoppylovy', 108000, 135000, 1, 0, '2021-04-06 23:21:59', '2021-04-06 23:21:59'),
(35, 10, 'DI10', 'Dress Import (luna)', 'Dress', 'Erin Butik', 158400, 198000, 1, 0, '2021-04-06 23:23:56', '2021-04-06 23:23:56'),
(36, 10, 'CI1', 'Chifon Import (Outer)', 'Outer', 'Erin Butik', 132000, 165000, 1, 0, '2021-04-06 23:23:56', '2021-04-06 23:23:56'),
(37, 10, 'KI3', 'Kemeja Import (Flower)', 'Kemeja', 'Aleacarista', 118400, 148000, 1, 0, '2021-04-06 23:23:56', '2021-04-06 23:23:56'),
(38, 10, 'DI4', 'Dress Import (Abstrak)', 'Dress', 'Erin Butik', 172000, 215000, 1, 0, '2021-04-06 23:23:56', '2021-04-06 23:23:56'),
(39, 11, 'CBT2', 'Cotton Bell (Kemeja)', 'Kemeja', 'Cotton Bell', 106400, 133000, 1, 0, '2021-04-07 23:29:48', '2021-04-07 23:29:48'),
(40, 11, 'KI2', 'kemeja Import (Red)', 'Kemeja', 'Aleacarista', 118400, 148000, 1, 0, '2021-04-07 23:29:48', '2021-04-07 23:29:48'),
(41, 11, 'JM1', 'Jumsuit Muslim (Jumsuit)', 'Jumsuit', 'Hoppylovy', 108000, 135000, 1, 0, '2021-04-07 23:29:48', '2021-04-07 23:29:48'),
(42, 12, 'DI5', 'Dress Import (Vintage)', 'Dress', 'Erin Butik', 156000, 195000, 1, 0, '2021-04-08 23:31:10', '2021-04-08 23:31:10'),
(43, 12, 'DI7', 'Dress Import (Blue)', 'Dress', 'Erin Butik', 160000, 200000, 1, 0, '2021-04-08 23:31:10', '2021-04-08 23:31:10'),
(44, 12, 'CBT5', 'Cotton Bell (Kemeja Mix Organza)', 'Kemeja', 'Cotton Bell', 80000, 100000, 1, 0, '2021-04-08 23:31:10', '2021-04-08 23:31:10'),
(45, 12, 'OS2', 'One set  (Sporty)', 'One Set', 'Aleacarista', 116000, 145000, 1, 0, '2021-04-08 23:31:10', '2021-04-08 23:31:10'),
(46, 13, 'OS5', 'One Set Black', 'One Set', 'Aleacarista', 120000, 150000, 1, 0, '2021-04-09 23:33:34', '2021-04-09 23:33:34'),
(47, 13, 'OS2', 'One set  (Sporty)', 'One Set', 'Aleacarista', 116000, 145000, 1, 0, '2021-04-09 23:33:34', '2021-04-09 23:33:34'),
(48, 13, 'ET1', 'Erin Tunik', 'Tunik', 'Erin Butik', 88000, 110000, 1, 0, '2021-04-09 23:33:34', '2021-04-09 23:33:34'),
(49, 14, 'KI2', 'kemeja Import (Red)', 'Kemeja', 'Aleacarista', 118400, 148000, 1, 0, '2021-04-11 23:42:39', '2021-04-11 23:42:39'),
(50, 14, 'JM1', 'Jumsuit Muslim (Jumsuit)', 'Jumsuit', 'Hoppylovy', 108000, 135000, 1, 0, '2021-04-11 23:42:39', '2021-04-11 23:42:39'),
(51, 14, 'DI9', 'Dress Import (Sabrina)', 'Dress', 'Erin Butik', 150400, 188000, 1, 0, '2021-04-11 23:42:39', '2021-04-11 23:42:39'),
(52, 14, 'JR1', 'Jeans Riped (Pants)', 'Celana', 'Drico Jeans', 88000, 110000, 1, 0, '2021-04-11 23:42:39', '2021-04-11 23:42:39'),
(53, 14, 'OS1', 'One set claudy (Busui)', 'One Set', 'Aleacarista', 120000, 150000, 1, 0, '2021-04-11 23:42:39', '2021-04-11 23:42:39'),
(54, 14, 'ET2', 'Erin Tunik (Moscrape)', 'Tunik', 'Erin Butik', 96000, 120000, 1, 0, '2021-04-11 23:42:39', '2021-04-11 23:42:39'),
(55, 14, 'DM2', 'Dress maxi import (Brown)', 'Dress', 'Hoppylovy', 156000, 195000, 1, 0, '2021-04-11 23:42:39', '2021-04-11 23:42:39'),
(56, 15, 'DI11', 'Dress Import (Balen)', 'Dress', 'Erin Butik', 158400, 198000, 1, 0, '2021-04-13 07:52:23', '2021-04-13 07:52:23'),
(57, 15, 'OS1', 'One set claudy (Busui)', 'One Set', 'Aleacarista', 120000, 150000, 1, 0, '2021-04-13 07:52:23', '2021-04-13 07:52:23'),
(58, 15, 'OS4', 'One Set (Zara)', 'One Set', 'Zara', 120000, 150000, 1, 0, '2021-04-13 07:52:23', '2021-04-13 07:52:23'),
(59, 16, 'DI11', 'Dress Import (Balen)', 'Dress', 'Erin Butik', 158400, 198000, 1, 0, '2021-04-13 07:53:24', '2021-04-13 07:53:24'),
(60, 16, 'OS1', 'One set claudy (Busui)', 'One Set', 'Aleacarista', 120000, 150000, 1, 0, '2021-04-13 07:53:24', '2021-04-13 07:53:24'),
(61, 16, 'OS4', 'One Set (Zara)', 'One Set', 'Zara', 120000, 150000, 1, 0, '2021-04-13 07:53:24', '2021-04-13 07:53:24'),
(62, 17, 'DI13', 'Dress Import (Twiscone)', 'Dress', 'Erin Butik', 172000, 215000, 2, 0, '2021-04-14 07:57:11', '2021-04-14 07:57:11'),
(63, 17, 'DM1', 'Dress maxi import (Green)', 'Dress', 'Hoppylovy', 148000, 185000, 2, 0, '2021-04-14 07:57:11', '2021-04-14 07:57:11'),
(64, 17, 'TB1', 'Tangtop Bludru dan Rok', 'Dress', 'Heelsaddict', 150400, 188000, 2, 0, '2021-04-14 07:57:11', '2021-04-14 07:57:11'),
(65, 17, 'OS2', 'One set  (Sporty)', 'One Set', 'Aleacarista', 116000, 145000, 2, 0, '2021-04-14 07:57:12', '2021-04-14 07:57:12'),
(66, 18, 'DI13', 'Dress Import (Twiscone)', 'Dress', 'Erin Butik', 172000, 215000, 2, 0, '2021-04-15 08:02:28', '2021-04-15 08:02:28'),
(67, 18, 'OS4', 'One Set (Zara)', 'One Set', 'Zara', 120000, 150000, 2, 0, '2021-04-15 08:02:28', '2021-04-15 08:02:28'),
(68, 18, 'ET3', 'Erin Tunik (Ana Tunik)', 'Tunik', 'Erin Butik', 88000, 110000, 2, 0, '2021-04-15 08:02:28', '2021-04-15 08:02:28'),
(69, 18, 'DM2', 'Dress maxi import (Brown)', 'Dress', 'Hoppylovy', 156000, 195000, 3, 0, '2021-04-15 08:02:28', '2021-04-15 08:02:28'),
(70, 18, 'CBT3', 'Cotton Bell (Outer)', 'Outer', 'Cotton Bell', 116000, 145000, 2, 0, '2021-04-15 08:02:28', '2021-04-15 08:02:28'),
(71, 18, 'KI7', 'Kemeja Import (Dior)', 'Kemeja', 'Aleacarista', 116000, 145000, 1, 0, '2021-04-15 08:02:28', '2021-04-15 08:02:28'),
(72, 18, 'DI12', 'Dress Import (Purple)', 'Dress', 'Erin Butik', 156000, 195000, 1, 0, '2021-04-15 08:02:28', '2021-04-15 08:02:28'),
(73, 19, 'DI9', 'Dress Import (Sabrina)', 'Dress', 'Erin Butik', 150400, 188000, 1, 0, '2021-04-16 08:05:33', '2021-04-16 08:05:33'),
(74, 19, 'KI6', 'Kemeja Import (Black)', 'Kemeja', 'Aleacarista', 116000, 145000, 1, 0, '2021-04-16 08:05:33', '2021-04-16 08:05:33'),
(75, 19, 'DI13', 'Dress Import (Twiscone)', 'Dress', 'Erin Butik', 172000, 215000, 1, 0, '2021-04-16 08:05:33', '2021-04-16 08:05:33'),
(76, 20, 'OS5', 'One Set Black', 'One Set', 'Aleacarista', 120000, 150000, 1, 0, '2021-04-17 13:37:12', '2021-04-17 13:37:12'),
(77, 20, 'OS2', 'One set  (Sporty)', 'One Set', 'Aleacarista', 116000, 145000, 1, 0, '2021-04-17 13:37:12', '2021-04-17 13:37:12'),
(78, 20, 'ET1', 'Erin Tunik', 'Tunik', 'Erin Butik', 88000, 110000, 1, 0, '2021-04-17 13:37:12', '2021-04-17 13:37:12'),
(79, 21, 'KI2', 'kemeja Import (Red)', 'Kemeja', 'Aleacarista', 118400, 148000, 1, 0, '2021-04-19 13:39:27', '2021-04-19 13:39:27'),
(80, 21, 'JM1', 'Jumsuit Muslim (Jumsuit)', 'Jumsuit', 'Hoppylovy', 108000, 135000, 1, 0, '2021-04-19 13:39:27', '2021-04-19 13:39:27'),
(81, 21, 'DI1', 'Dress Import Flower Red', 'Dress', 'Erin Butik', 156000, 195000, 1, 0, '2021-04-19 13:39:27', '2021-04-19 13:39:27'),
(82, 21, 'KI1', 'Kemeja Import (Mickey Mouse)', 'Kemeja', 'Aleacarista', 118400, 148000, 1, 0, '2021-04-19 13:39:28', '2021-04-19 13:39:28'),
(83, 22, 'CBT4', 'Cotton Bell (Blouse)', 'Blouse', 'Cotton Bell', 94400, 118000, 1, 0, '2021-04-20 13:41:53', '2021-04-20 13:41:53'),
(84, 22, 'DI5', 'Dress Import (Vintage)', 'Dress', 'Erin Butik', 156000, 195000, 1, 0, '2021-04-20 13:41:54', '2021-04-20 13:41:54'),
(85, 22, 'DI9', 'Dress Import (Sabrina)', 'Dress', 'Erin Butik', 150400, 188000, 1, 0, '2021-04-20 13:41:54', '2021-04-20 13:41:54'),
(86, 22, 'OS1', 'One set claudy (Busui)', 'One Set', 'Aleacarista', 120000, 150000, 1, 0, '2021-04-20 13:41:54', '2021-04-20 13:41:54'),
(87, 22, 'ET1', 'Erin Tunik', 'Tunik', 'Erin Butik', 88000, 110000, 1, 0, '2021-04-20 13:41:54', '2021-04-20 13:41:54'),
(88, 23, 'DI9', 'Dress Import (Sabrina)', 'Dress', 'Erin Butik', 150400, 188000, 1, 0, '2021-04-21 13:43:52', '2021-04-21 13:43:52'),
(89, 23, 'KI6', 'Kemeja Import (Black)', 'Kemeja', 'Aleacarista', 116000, 145000, 1, 0, '2021-04-21 13:43:52', '2021-04-21 13:43:52'),
(90, 23, 'DI13', 'Dress Import (Twiscone)', 'Dress', 'Erin Butik', 172000, 215000, 1, 0, '2021-04-21 13:43:52', '2021-04-21 13:43:52'),
(91, 24, 'CBT2', 'Cotton Bell (Kemeja)', 'Kemeja', 'Cotton Bell', 106400, 133000, 1, 0, '2021-04-22 13:45:15', '2021-04-22 13:45:15'),
(92, 24, 'KI2', 'kemeja Import (Red)', 'Kemeja', 'Aleacarista', 118400, 148000, 1, 0, '2021-04-22 13:45:15', '2021-04-22 13:45:15'),
(93, 25, 'DI1', 'Dress Import Flower Red', 'Dress', 'Erin Butik', 156000, 195000, 1, 0, '2021-04-23 13:47:31', '2021-04-23 13:47:31'),
(94, 25, 'CBT4', 'Cotton Bell (Blouse)', 'Blouse', 'Cotton Bell', 94400, 118000, 1, 0, '2021-04-23 13:47:31', '2021-04-23 13:47:31'),
(95, 25, 'KI1', 'Kemeja Import (Mickey Mouse)', 'Kemeja', 'Aleacarista', 118400, 148000, 1, 0, '2021-04-23 13:47:31', '2021-04-23 13:47:31'),
(96, 25, 'OS1', 'One set claudy (Busui)', 'One Set', 'Aleacarista', 120000, 150000, 1, 0, '2021-04-23 13:47:31', '2021-04-23 13:47:31'),
(97, 25, 'ET1', 'Erin Tunik', 'Tunik', 'Erin Butik', 88000, 110000, 1, 0, '2021-04-23 13:47:31', '2021-04-23 13:47:31'),
(98, 25, 'ET3', 'Erin Tunik (Ana Tunik)', 'Tunik', 'Erin Butik', 88000, 110000, 1, 0, '2021-04-23 13:47:31', '2021-04-23 13:47:31'),
(99, 25, 'TB1', 'Tangtop Bludru dan Rok', 'Dress', 'Heelsaddict', 150400, 188000, 1, 0, '2021-04-23 13:47:31', '2021-04-23 13:47:31'),
(100, 26, 'DI13', 'Dress Import (Twiscone)', 'Dress', 'Erin Butik', 172000, 215000, 1, 0, '2021-04-24 13:48:52', '2021-04-24 13:48:52'),
(101, 26, 'OS4', 'One Set (Zara)', 'One Set', 'Zara', 120000, 150000, 1, 0, '2021-04-24 13:48:52', '2021-04-24 13:48:52'),
(102, 26, 'ET3', 'Erin Tunik (Ana Tunik)', 'Tunik', 'Erin Butik', 88000, 110000, 1, 0, '2021-04-24 13:48:52', '2021-04-24 13:48:52'),
(103, 26, 'DM2', 'Dress maxi import (Brown)', 'Dress', 'Hoppylovy', 156000, 195000, 1, 0, '2021-04-24 13:48:52', '2021-04-24 13:48:52'),
(104, 27, 'OS1', 'One set claudy (Busui)', 'One Set', 'Aleacarista', 120000, 150000, 1, 0, '2021-04-26 13:50:48', '2021-04-26 13:50:48'),
(105, 27, 'ET1', 'Erin Tunik', 'Tunik', 'Erin Butik', 88000, 110000, 1, 0, '2021-04-26 13:50:48', '2021-04-26 13:50:48'),
(106, 27, 'ET3', 'Erin Tunik (Ana Tunik)', 'Tunik', 'Erin Butik', 88000, 110000, 1, 0, '2021-04-26 13:50:49', '2021-04-26 13:50:49'),
(107, 27, 'OS4', 'One Set (Zara)', 'One Set', 'Zara', 120000, 150000, 1, 0, '2021-04-26 13:50:49', '2021-04-26 13:50:49'),
(108, 27, 'ET2', 'Erin Tunik (Moscrape)', 'Tunik', 'Erin Butik', 96000, 120000, 1, 0, '2021-04-26 13:50:49', '2021-04-26 13:50:49'),
(109, 27, 'DI12', 'Dress Import (Purple)', 'Dress', 'Erin Butik', 156000, 195000, 1, 0, '2021-04-26 13:50:49', '2021-04-26 13:50:49'),
(110, 28, 'OS3', 'One Set (Sporty Parasut)', 'One Set', 'Aleacarista', 116000, 145000, 1, 0, '2021-04-27 13:52:02', '2021-04-27 13:52:02'),
(111, 28, 'DI12', 'Dress Import (Purple)', 'Dress', 'Erin Butik', 156000, 195000, 1, 0, '2021-04-27 13:52:03', '2021-04-27 13:52:03'),
(112, 28, 'ET1', 'Erin Tunik', 'Tunik', 'Erin Butik', 88000, 110000, 1, 0, '2021-04-27 13:52:03', '2021-04-27 13:52:03'),
(113, 29, 'DI9', 'Dress Import (Sabrina)', 'Dress', 'Erin Butik', 150400, 188000, 1, 0, '2021-04-28 13:54:07', '2021-04-28 13:54:07'),
(114, 29, 'KI6', 'Kemeja Import (Black)', 'Kemeja', 'Aleacarista', 116000, 145000, 1, 0, '2021-04-28 13:54:07', '2021-04-28 13:54:07'),
(115, 29, 'DI13', 'Dress Import (Twiscone)', 'Dress', 'Erin Butik', 172000, 215000, 1, 0, '2021-04-28 13:54:07', '2021-04-28 13:54:07'),
(116, 29, 'OS5', 'One Set Black', 'One Set', 'Aleacarista', 120000, 150000, 1, 0, '2021-04-28 13:54:07', '2021-04-28 13:54:07'),
(117, 29, 'TB1', 'Tangtop Bludru dan Rok', 'Dress', 'Heelsaddict', 150400, 188000, 1, 0, '2021-04-28 13:54:07', '2021-04-28 13:54:07'),
(118, 29, 'OS2', 'One set  (Sporty)', 'One Set', 'Aleacarista', 116000, 145000, 1, 0, '2021-04-28 13:54:07', '2021-04-28 13:54:07'),
(119, 30, 'DI13', 'Dress Import (Twiscone)', 'Dress', 'Erin Butik', 172000, 215000, 1, 0, '2021-04-29 13:56:47', '2021-04-29 13:56:47'),
(120, 30, 'OS4', 'One Set (Zara)', 'One Set', 'Zara', 120000, 150000, 1, 0, '2021-04-29 13:56:47', '2021-04-29 13:56:47'),
(121, 31, 'OS3', 'One Set (Sporty Parasut)', 'One Set', 'Aleacarista', 116000, 145000, 1, 0, '2021-04-30 13:57:39', '2021-04-30 13:57:39'),
(122, 32, 'OS2', 'One set  (Sporty)', 'One Set', 'Aleacarista', 116000, 145000, 1, 0, '2021-05-01 14:04:47', '2021-05-01 14:04:47'),
(123, 32, 'KI1', 'Kemeja Import (Mickey Mouse)', 'Kemeja', 'Aleacarista', 118400, 148000, 1, 0, '2021-05-01 14:04:47', '2021-05-01 14:04:47'),
(124, 32, 'CBT4', 'Cotton Bell (Blouse)', 'Blouse', 'Cotton Bell', 94400, 118000, 1, 0, '2021-05-01 14:04:47', '2021-05-01 14:04:47'),
(125, 32, 'DI5', 'Dress Import (Vintage)', 'Dress', 'Erin Butik', 156000, 195000, 1, 0, '2021-05-01 14:04:47', '2021-05-01 14:04:47'),
(126, 33, 'KI2', 'kemeja Import (Red)', 'Kemeja', 'Aleacarista', 118400, 148000, 1, 0, '2021-09-08 00:36:15', '2021-09-08 00:36:15');

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
(3, 'Tunik', '2021-08-12 10:02:23', '2021-08-12 10:02:23'),
(4, 'Kemeja', '2021-08-15 08:46:39', '2021-08-15 08:46:39'),
(5, 'Outer', '2021-08-15 08:46:49', '2021-08-15 08:46:49'),
(6, 'Dress', '2021-08-15 08:46:57', '2021-08-15 08:46:57'),
(7, 'Blouse', '2021-08-15 08:47:10', '2021-08-15 08:47:10'),
(8, 'Jumsuit', '2021-08-15 08:47:29', '2021-08-15 08:47:29'),
(9, 'One Set', '2021-08-15 08:47:41', '2021-08-15 08:47:41'),
(10, 'Celana', '2021-08-15 08:48:04', '2021-08-15 08:48:04'),
(11, 'Kulot', '2021-08-15 08:48:15', '2021-08-15 08:48:15');

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
(1, 'admin', 'Firda', 'Kp. Lebak jero', '11217052', 'admin@admin.com', 'superadmin', '2021-08-07 04:43:09', '$2y$10$wNmds1o.8T2Ba42XU7h1leFlj7.b/CPT47TMeC0zqv2752x0W2y9.', 'GcOyY4EHxcWKNWbWUaXjX6oxJxWSQYKnfysU5MAETaD6JLrL67bWC2eSQs0a', '2021-08-07 04:43:09', '2021-08-07 04:43:09'),
(3, 'karyawan', 'Aldi Putra Nawasta', 'Link. Karotek RT.01/RW.02 No.036, Desa/Kelurahan: Kalitimbang, Kecamatan : Cibeber', '11117052', 'aldistate@yahoo.com', 'Aldi', NULL, '$2y$10$rTpvbCD9JZX0cJYqaoM7juu9/ixUo61ybGE/d7EAHwqt.vAHXE2gy', NULL, '2021-08-12 03:09:11', '2021-08-12 03:09:11'),
(4, 'karyawan', 'Ajeng Kartini', 'kp lebak jero', '11117021', 'ajengkartini@yahoo.com', 'Ajeng', NULL, '$2y$10$DMlg.CVS9/d8Kcx/qwWCA.q3DsWJ37gvfOdP/UFZQqM2xKQdVERE2', NULL, '2021-04-02 23:16:27', '2021-04-02 23:16:27');

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
  ADD KEY `password_resets_email_index` (`email`(191));

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `detail_checkouts`
--
ALTER TABLE `detail_checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
