-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Agu 2020 pada 08.41
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpethotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'adminari', 'ariardiansyah@gmail.com', '$2y$10$gYe3iQ6onFj8R8rnazEt.OfEvAgNFHf.5X3KvI8dNcpIGeYTW0aXG', '2020-07-28 12:34:28', '2020-07-28 12:34:28'),
(2, 'adminjeki', 'priyazakharias@gmail.com', '$2y$10$Vwd4w8Se/Y07z60w758dxuQmc8QeqUvaZWtEY.Tf5.A7Tdt.lOdo.', '2020-08-07 21:05:54', '2020-08-07 14:05:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `kode_booking` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `kandang_id` int(11) NOT NULL,
  `tgl_checkin` datetime NOT NULL,
  `lama_inap` int(3) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandangs`
--

CREATE TABLE `kandangs` (
  `id` int(11) NOT NULL,
  `pethotel_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `jumlah_kandang` int(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kandangs`
--

INSERT INTO `kandangs` (`id`, `pethotel_id`, `type_id`, `deskripsi`, `harga`, `jumlah_kandang`, `created_at`, `updated_at`) VALUES
(1, 2, 10, 'ajjbciscjbsciwcisjb', 50000, 10, '2020-08-11 00:00:00', '2020-08-11 00:00:00'),
(2, 2, 12, 'sojhdcwjjcwiscjgijds', 70000, 10, '2020-08-11 00:00:00', '2020-08-11 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pethotels`
--

CREATE TABLE `pethotels` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(40) NOT NULL,
  `foto_ktp` varchar(255) NOT NULL,
  `nama_pethotel` varchar(50) NOT NULL,
  `alamat_pethotel` text NOT NULL,
  `telp` varchar(25) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `foto2` varchar(255) NOT NULL,
  `kategori_pethotel` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pethotels`
--

INSERT INTO `pethotels` (`id`, `email`, `password`, `nama_pemilik`, `jenis_kelamin`, `foto_ktp`, `nama_pethotel`, `alamat_pethotel`, `telp`, `foto`, `foto2`, `kategori_pethotel`, `created_at`, `updated_at`) VALUES
(2, 'coko@gmail.com', '$2y$10$MxV8Istqd4G9xv4IjFgbGerUCb/gKQlhsFhhvqlYm3fO4LziR06GC', 'Teddy', 'L', 'public/gambar/VUjbqaN3QH0Wiaq8dfQR2cLnbnmIvIKjudxSzMOm.jpeg', 'Coko PetShop', 'Paal Merah', '081280107534', 'public/gambar/VUjbqaN3QH0Wiaq8dfQR2cLnbnmIvIKjudxSzMOm.jpeg', 'public/gambar/VUjbqaN3QH0Wiaq8dfQR2cLnbnmIvIKjudxSzMOm.jpeg', 'Pet Hotel Anjing&Kucing', '2020-08-09 15:43:47', '2020-08-11 06:22:07'),
(3, 'kimby@gmail.com', '$2y$10$K2IiTXwsYNnRAmE.Cmi8XeYy6SHTNDBotWUMx6frmkBgPN/b4zoQq', 'Coko', 'L', 'public/gambar/66Dpaq9anSlKE1AbRNQfW9xbERmMcadP4Bnzf0K2.jpeg', 'Teddy PetShop', 'Tehok', '0812123456', 'public/gambar/66Dpaq9anSlKE1AbRNQfW9xbERmMcadP4Bnzf0K2.jpeg', 'public/gambar/66Dpaq9anSlKE1AbRNQfW9xbERmMcadP4Bnzf0K2.jpeg', 'Pet Hotel Anjing', '2020-08-09 15:45:47', '2020-08-09 15:45:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profils`
--

CREATE TABLE `profils` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `nama_type` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `types`
--

INSERT INTO `types` (`id`, `nama_type`, `created_at`, `updated_at`) VALUES
(10, 'Anjing Ras Kecil', '2020-08-04 00:00:00', '2020-08-04 00:00:00'),
(12, 'Anjing Ras Besar', '2020-08-04 00:00:00', '2020-08-04 00:00:00'),
(13, 'Kucing All Ras', '2020-08-04 00:00:00', '2020-08-04 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$LlACb5nrAYV5Uhx/wBp9NeH3ZALfl9vDrD4WpdN3iIkSQGkt5EkIa', NULL, '2020-07-20 22:38:44', '2020-07-20 22:38:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `kandang_id` (`kandang_id`);

--
-- Indeks untuk tabel `kandangs`
--
ALTER TABLE `kandangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`pethotel_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pethotels`
--
ALTER TABLE `pethotels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kandangs`
--
ALTER TABLE `kandangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pethotels`
--
ALTER TABLE `pethotels`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `profils`
--
ALTER TABLE `profils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_kandang_booking` FOREIGN KEY (`kandang_id`) REFERENCES `kandangs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_member_booking` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kandangs`
--
ALTER TABLE `kandangs`
  ADD CONSTRAINT `fk_kandang_pethotel` FOREIGN KEY (`pethotel_id`) REFERENCES `pethotels` (`id`),
  ADD CONSTRAINT `fk_kandang_type` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
