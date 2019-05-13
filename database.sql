-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Bulan Mei 2019 pada 05.05
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `pengarang` varchar(128) NOT NULL,
  `penerbit` varchar(128) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `jumlah_halaman` int(11) NOT NULL,
  `jumlah_bab` int(11) NOT NULL,
  `tanggal_masuk` int(11) NOT NULL,
  `status` int(3) NOT NULL,
  `jumlah_peminjam` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `pengarang`, `penerbit`, `kategori`, `jumlah_halaman`, `jumlah_bab`, `tanggal_masuk`, `status`, `jumlah_peminjam`, `deskripsi`, `type`) VALUES
(1, 'Belajar Pemrograman', 'Lorem Ipsum', 'Lorem Ipsum', 'pendidikan', 320, 12, 0, 0, 15, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.', 0),
(2, 'Belajar Marketing', 'Lorem Ipsum', 'Lorem Ipsum', 'pendidikan', 320, 12, 1, 0, 7, '', 0),
(3, 'PHP For Dummies', 'Lorem Ipsum', 'Lorem Ipsum', 'Pendidikan', 230, 10, 0, 0, 16, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.', 0),
(4, 'Belajar Mekanik', 'Lorem Ipsum', 'Lorem Ipsum', 'Pendidikan', 190, 8, 0, 0, 25, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.', 0),
(5, 'The Greates', 'lorem ipsum', 'lorem ipsum', 'Islam', 210, 12, 0, 0, 10, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.', 0),
(6, 'Belajar Git', 'lorem ipsum', 'lorem ipsum', 'Pendidikan', 291, 14, 2019, 1, 1, 'Buku tentang pembelajaran bahasa pemrogramman git.', 1),
(8, 'Belajar NodeJS', 'lorem ipsum', 'lorem ipsum', 'Pendidikan', 309, 20, 2019, 1, 1, 'Buku tentang belajar NodeJS', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_peminjam`
--

CREATE TABLE `daftar_peminjam` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `buku` varchar(128) NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `atribut` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_peminjam`
--

INSERT INTO `daftar_peminjam` (`id`, `nama`, `email`, `buku`, `lama_pinjam`, `atribut`) VALUES
(3, 'John Jaya', 'johndoe@gmail.com', 'Belajar NodeJS', 9, 'jam'),
(4, 'John Jaya', 'johndoe@gmail.com', 'Belajar Git', 11, 'jam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `donasi`
--

INSERT INTO `donasi` (`id`, `nama`, `email`, `pesan`) VALUES
(1, 'John Jaya', 'johndoe@gmail.com', 'Selamat membaca!'),
(2, 'John Jaya', 'johndoe@gmail.com', 'Good Luck!');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `profile_image` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `profile_image`) VALUES
(2, 'John Jaya', 'johndoe@gmail.com', NULL, '$2y$10$3.PDTqxi1ufe.bScm8yOF.bf0W.8iJ/Qp5I6g6Ol9JcIQ3q8XHB2q', 'bvEkD0PH9H0wPGB6rbRwkS6GelriR2sq6sB6Ml9fg6BRvjhmWDPVGRQoafgf', '2019-04-28 20:04:12', '2019-04-28 20:04:12', 'dv6y2018108582018-12-234697781Rocket-Launch-Logo.jpg'),
(3, 'Salung Prastyo', 'salungprastyo@gmail.com', NULL, '$2y$10$nuKtzbUhqAjhmC1YMcio/.ENtBgl6An5P4.lWqn0RstMst6Wjt3xC', 'BeuDISJMQgZsKyN7udK4vrCB8ZNO8824f74NbEWTtdElFNxANiSsD9YeayXN', '2019-04-28 20:23:55', '2019-04-28 20:23:55', 'watermelon1.jpg'),
(6, 'Fahrul Junies', 'fahrul@gmail.com', '0000-00-00 00:00:00', '$2y$10$G1xOnAAt/J38fCEeMfce/.cUhsZjPUIRRSfUs48BEV3JZP9hah022', '$2y$10$G1xOnAAt/J38fCEeMfce/.cUhsZjPUIRRSfUs48BEV3JZP9hah022', '2019-05-05 11:03:43', '0000-00-00 00:00:00', 'watermelon.jpg'),
(7, 'Albert Eisntein', 'albert@yahoo.com', '0000-00-00 00:00:00', '$2y$10$d1vN4hFmp3A7QL79P5Yh5elyDRE3SeCNJz7nVmetm3KlPKKTtOkgq', '$2y$10$d1vN4hFmp3A7QL79P5Yh5elyDRE3SeCNJz7nVmetm3KlPKKTtOkgq', '2019-05-05 11:23:59', '0000-00-00 00:00:00', 'pigeon_logo.jpg'),
(8, 'Nicola Tesla', 'nicola@yahoo.com', '0000-00-00 00:00:00', '$2y$10$IJ7D1OLHT5VO62mgq52skeYuz379Lg3NUsd1MUirB.NfbvEJcUYpW', '$2y$10$IJ7D1OLHT5VO62mgq52skeYuz379Lg3NUsd1MUirB.NfbvEJcUYpW', '2019-05-06 21:48:29', '0000-00-00 00:00:00', 'salad_2x.jpg'),
(9, 'Romadhon', 'romadhon@gmail.com', '0000-00-00 00:00:00', '$2y$10$cZYuci/MnDc7/cuRiThSBO/t0t44RnW32HW8Iuzo4N1.n3u8pRzqW', '$2y$10$cZYuci/MnDc7/cuRiThSBO/t0t44RnW32HW8Iuzo4N1.n3u8pRzqW', '2019-05-07 19:16:52', '0000-00-00 00:00:00', 'salad_2x1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar_peminjam`
--
ALTER TABLE `daftar_peminjam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
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
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `daftar_peminjam`
--
ALTER TABLE `daftar_peminjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
