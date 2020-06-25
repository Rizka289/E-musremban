-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jun 2020 pada 08.44
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa_tamansari`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id_desa`, `username`, `image`, `password`, `alamat`, `agama`, `no_hp`) VALUES
(19, 'rizka', 'defaultP.jpg', '$2y$10$lW/ZIODAmOHpFNNChHFUxObekAFOzETJdsoE9ptJDdcGXjofyJ2fS', '2', '1', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dusun`
--

CREATE TABLE `dusun` (
  `id_dusun` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dusun`
--

INSERT INTO `dusun` (`id_dusun`, `username`, `image`, `password`, `alamat`, `agama`, `no_hp`) VALUES
(14, 'rahma', 'defaultP.jpg', '$2y$10$Lia9t.WKFfncdcwCmCKfK.6nHb2h6NwpyoKounwWDb5kFvOZXsZfW', '-', '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bidang`
--

CREATE TABLE `tbl_bidang` (
  `id_bidang` int(11) NOT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `kode_rek` varchar(11) DEFAULT NULL,
  `nama_bidang` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bidang`
--

INSERT INTO `tbl_bidang` (`id_bidang`, `id_tahun`, `kode_rek`, `nama_bidang`) VALUES
(1, 31, '23.3', 'ntahlah'),
(10, 38, '2', 'fsdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rkp`
--

CREATE TABLE `tbl_rkp` (
  `id_rkp` int(11) NOT NULL,
  `id_usulan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sub_bidang`
--

CREATE TABLE `tbl_sub_bidang` (
  `Id_sub_bidang` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `Sub_rek` varchar(11) DEFAULT '',
  `nama_sub_bidang` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sub_bidang`
--

INSERT INTO `tbl_sub_bidang` (`Id_sub_bidang`, `id_bidang`, `Sub_rek`, `nama_sub_bidang`) VALUES
(6, 1, '5667', 'iyyu'),
(7, 1, '56', 'thb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tahun`
--

CREATE TABLE `tbl_tahun` (
  `id_tahun` int(11) NOT NULL,
  `tahun` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tahun`
--

INSERT INTO `tbl_tahun` (`id_tahun`, `tahun`) VALUES
(38, 342),
(37, 587),
(40, 2000),
(28, 2015),
(29, 2016),
(30, 2017),
(31, 2018),
(32, 2019),
(33, 2021),
(45, 2067),
(43, 3242),
(42, 6556),
(39, 423432);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_usulan`
--

CREATE TABLE `tbl_usulan` (
  `id_usulan` int(11) NOT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  `id_sub_bidang` int(11) DEFAULT NULL,
  `usulan` varchar(100) DEFAULT '',
  `anggaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_usulan`
--

INSERT INTO `tbl_usulan` (`id_usulan`, `id_bidang`, `id_sub_bidang`, `usulan`, `anggaran`) VALUES
(8, 1, 6, 'Rizkaaaaa', 234),
(9, 10, 7, 'aaaaa', 12),
(10, 10, 7, '12', 1212),
(11, 10, 6, 'dsfs', 1234);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indeks untuk tabel `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`id_dusun`);

--
-- Indeks untuk tabel `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  ADD PRIMARY KEY (`id_bidang`),
  ADD KEY `fk_tahun` (`id_tahun`);

--
-- Indeks untuk tabel `tbl_rkp`
--
ALTER TABLE `tbl_rkp`
  ADD PRIMARY KEY (`id_rkp`),
  ADD KEY `fk_rkp_usulan` (`id_usulan`);

--
-- Indeks untuk tabel `tbl_sub_bidang`
--
ALTER TABLE `tbl_sub_bidang`
  ADD PRIMARY KEY (`Id_sub_bidang`),
  ADD KEY `fk_sub_bidang` (`id_bidang`);

--
-- Indeks untuk tabel `tbl_tahun`
--
ALTER TABLE `tbl_tahun`
  ADD PRIMARY KEY (`id_tahun`),
  ADD KEY `fk_tahun_kegiUta` (`tahun`);

--
-- Indeks untuk tabel `tbl_usulan`
--
ALTER TABLE `tbl_usulan`
  ADD PRIMARY KEY (`id_usulan`),
  ADD KEY `fk_usulan_sub` (`id_sub_bidang`),
  ADD KEY `fk_bid` (`id_bidang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id_dusun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_rkp`
--
ALTER TABLE `tbl_rkp`
  MODIFY `id_rkp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_sub_bidang`
--
ALTER TABLE `tbl_sub_bidang`
  MODIFY `Id_sub_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_tahun`
--
ALTER TABLE `tbl_tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tbl_usulan`
--
ALTER TABLE `tbl_usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  ADD CONSTRAINT `fk_tahun` FOREIGN KEY (`id_tahun`) REFERENCES `tbl_tahun` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_rkp`
--
ALTER TABLE `tbl_rkp`
  ADD CONSTRAINT `fk_usulan` FOREIGN KEY (`id_usulan`) REFERENCES `tbl_usulan` (`id_usulan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_sub_bidang`
--
ALTER TABLE `tbl_sub_bidang`
  ADD CONSTRAINT `fk_bidang` FOREIGN KEY (`id_bidang`) REFERENCES `tbl_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_usulan`
--
ALTER TABLE `tbl_usulan`
  ADD CONSTRAINT `fk_bid` FOREIGN KEY (`id_bidang`) REFERENCES `tbl_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_subBi` FOREIGN KEY (`id_sub_bidang`) REFERENCES `tbl_sub_bidang` (`Id_sub_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
