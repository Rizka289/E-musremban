-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2020 pada 08.24
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
-- Struktur dari tabel `tbl_bidang`
--

CREATE TABLE `tbl_bidang` (
  `id_bidang` int(11) NOT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `kode_rek` varchar(11) DEFAULT NULL,
  `nama_bidang` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(28, 2015),
(29, 2016),
(30, 2017),
(31, 2018),
(32, 2019),
(33, 2020);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `Id_user` int(11) NOT NULL,
  `username` varchar(128) DEFAULT '',
  `email` varchar(128) NOT NULL,
  `image` varchar(128) DEFAULT '',
  `password` varchar(256) DEFAULT '',
  `role` int(2) NOT NULL,
  `is_active` int(1) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `no_hp` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`Id_user`, `username`, `email`, `image`, `password`, `role`, `is_active`, `alamat`, `agama`, `no_hp`, `date_created`) VALUES
(12, 'admin', 'admin@gmail.com', 'defaultP.jpg', '$2y$10$TVhWpHQjCksiRbSgaqPpWOowUt4bbFlGYaX77S2SUmpjoVsU9tSiG', 2, 1, '', NULL, NULL, '0000-00-00 00:00:00'),
(13, 'Rizka Rachmawati', 'superAdmin@gmail.com', 'defaultP.jpg', '$2y$10$8NZPwKVxU/NTC7NuX5GEfORxjNXwK6GQXUziOH0vQ3uZxbnOB7GBC', 1, 1, '', NULL, NULL, '2020-06-10 05:19:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_usulan`
--

CREATE TABLE `tbl_usulan` (
  `id_usulan` int(11) NOT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  `id_sub_bidang` int(11) DEFAULT NULL,
  `usulan` text DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

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
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`Id_user`),
  ADD KEY `fk_profile` (`alamat`);

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
-- AUTO_INCREMENT untuk tabel `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_rkp`
--
ALTER TABLE `tbl_rkp`
  MODIFY `id_rkp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_sub_bidang`
--
ALTER TABLE `tbl_sub_bidang`
  MODIFY `Id_sub_bidang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_tahun`
--
ALTER TABLE `tbl_tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_usulan`
--
ALTER TABLE `tbl_usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
