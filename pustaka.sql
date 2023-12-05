-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2023 pada 09.06
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pustaka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul_buku` varchar(128) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `pengarang` varchar(64) NOT NULL,
  `penerbit` varchar(64) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `isbn` varchar(64) NOT NULL,
  `stok` int(11) NOT NULL,
  `dipinjam` int(11) NOT NULL,
  `dibooking` int(11) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul_buku`, `id_kategori`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `stok`, `dipinjam`, `dibooking`, `image`) VALUES
(13, 'Detektif Conan', 14, 'Anton Subagia', 'Cultura', '2013', '98827187121', 2, 0, 0, 'img1699948526.jpg'),
(14, 'Hobby to Money', 4, 'Okigawa Sasuke', 'Published', '2009', '9887718886', 4, 0, 0, 'img1699697044.jpg'),
(15, 'Belajar Komputer Mudah', 1, 'Dr. Dedy Kurnia', 'Luxima', '2006', '9887718114', 2, 0, 0, 'img1699697092.jpg'),
(16, 'Bahasa Indonesia', 2, 'Nurul Ihsan', 'Pusat Perbukuan', '2006', '9887718154', 3, 0, 0, 'img1699867846.jpg'),
(17, 'Buku Saku Pramuka', 15, 'Rudi Himawan', 'Pusat Perbukuan', '2006', '9887718552', 10, 0, 0, 'img1699697319.jpg'),
(18, 'Statistika Dasar', 3, 'Ahmad Kholiqul', 'Pusat Perbukuan', '2005', '9887755722', 2, 0, 0, 'img1699788142.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(5) NOT NULL,
  `kategori` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Komputer'),
(2, 'Bahasa'),
(3, 'Sains'),
(4, 'Hobby'),
(5, 'Komunikasi'),
(6, 'Hukum'),
(7, 'Agama'),
(13, 'Kimia'),
(14, 'Komik'),
(15, 'Populer'),
(16, 'Populerrrrrr');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tanggal_input` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `tanggal_input`) VALUES
(5, 'Hilman Ramdoni', 'hilmandoni3@gmail.com', 'pro1698821134.jpg', '$2y$10$Ek62AfCTpWAdaD6A8G37k..HiK4t25Mqyj6ngGMvbJkj3SFmrDCGu', 2, 1, 1698821094),
(9, 'Hilman Doni', 'hilmandoni1@gmail.com', 'default.jpg', '$2y$10$FLhCQ0i2mFUfFtC8GC8w5.QnPeoMCLAaerX4jzG4HEfQ30KXpahGy', 2, 1, 1699710117);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
