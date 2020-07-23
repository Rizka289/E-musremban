-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2020 at 12:19 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

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
-- Table structure for table `desa`
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
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id_desa`, `username`, `image`, `password`, `alamat`, `agama`, `no_hp`) VALUES
(20, 'rizka', '-', '$2y$10$90qNLoiDuiNkD2ne4Qa/Se4fxzkFw5mPtfCKj3k1/lnWyceLU8l9W', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `dusun`
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
-- Dumping data for table `dusun`
--

INSERT INTO `dusun` (`id_dusun`, `username`, `image`, `password`, `alamat`, `agama`, `no_hp`) VALUES
(20, 'rizka', '-', '$2y$10$fJHn0HMzxaxBSURjJIBbQuGCZpMr5IWcVk4RR5oyM8XAoCFUjLZWe', '-', '-', '-'),
(23, 'rahma', '-', '$2y$10$t4S6J0VeF8cM0wUdJ0/u.O9/BgbkkGMQnP40MnpkiM0kr/0ZFiqry', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bidang`
--

CREATE TABLE `tbl_bidang` (
  `id_bidang` int(11) NOT NULL,
  `id_tahun` int(11) DEFAULT NULL,
  `kode_rek` double DEFAULT NULL,
  `nama_bidang` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bidang`
--

INSERT INTO `tbl_bidang` (`id_bidang`, `id_tahun`, `kode_rek`, `nama_bidang`) VALUES
(46, 75, 2.2, 'Bidang Pelaksanaan Pembangunan Desa'),
(47, 75, 3.8, 'sfd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_bidang`
--

CREATE TABLE `tbl_sub_bidang` (
  `Id_sub_bidang` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `Sub_rek` varchar(11) DEFAULT '',
  `nama_sub_bidang` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_bidang`
--

INSERT INTO `tbl_sub_bidang` (`Id_sub_bidang`, `id_bidang`, `Sub_rek`, `nama_sub_bidang`) VALUES
(40, 46, '234.7', 'dsfgsd'),
(41, 46, '12.5', 'rf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tahun`
--

CREATE TABLE `tbl_tahun` (
  `id_tahun` int(11) NOT NULL,
  `tahun` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tahun`
--

INSERT INTO `tbl_tahun` (`id_tahun`, `tahun`) VALUES
(76, 434),
(70, 2015),
(71, 2016),
(72, 2017),
(73, 2018),
(74, 2019),
(75, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usulan`
--

CREATE TABLE `tbl_usulan` (
  `id_usulan` int(11) NOT NULL,
  `id_dusun` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  `id_sub_bidang` int(11) DEFAULT NULL,
  `usulan` varchar(100) DEFAULT '',
  `unit` int(11) DEFAULT NULL,
  `panjang` double DEFAULT NULL,
  `lebar` double DEFAULT NULL,
  `tinggi` double DEFAULT NULL,
  `m3` double DEFAULT NULL,
  `meter` double NOT NULL,
  `hari` int(11) NOT NULL,
  `org` int(11) NOT NULL,
  `anggaran` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `status` enum('Ya','Tidak') DEFAULT NULL,
  `is_open` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_usulan`
--

INSERT INTO `tbl_usulan` (`id_usulan`, `id_dusun`, `id_desa`, `id_bidang`, `id_sub_bidang`, `usulan`, `unit`, `panjang`, `lebar`, `tinggi`, `m3`, `meter`, `hari`, `org`, `anggaran`, `total`, `status`, `is_open`) VALUES
(1, 23, 20, 46, 40, 'pk', 9, 9, 9, 9, 9, 8, 3, 8, 34, 89, NULL, 1),
(81, 20, 20, 46, 40, 'sa', 1, NULL, NULL, NULL, NULL, 0, 0, 0, NULL, NULL, NULL, 0),
(82, 23, 20, 46, 40, 'sda', 1, 0, 0, 0, 0, 0, 0, 0, 1234, 1234, 'Ya', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`id_dusun`);

--
-- Indexes for table `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  ADD PRIMARY KEY (`id_bidang`),
  ADD KEY `fk_tahun` (`id_tahun`);

--
-- Indexes for table `tbl_sub_bidang`
--
ALTER TABLE `tbl_sub_bidang`
  ADD PRIMARY KEY (`Id_sub_bidang`),
  ADD KEY `fk_sub_bidang` (`id_bidang`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indexes for table `tbl_tahun`
--
ALTER TABLE `tbl_tahun`
  ADD PRIMARY KEY (`id_tahun`),
  ADD KEY `fk_tahun_kegiUta` (`tahun`);

--
-- Indexes for table `tbl_usulan`
--
ALTER TABLE `tbl_usulan`
  ADD PRIMARY KEY (`id_usulan`),
  ADD KEY `fk_bid` (`id_bidang`),
  ADD KEY `fk_desa` (`id_desa`),
  ADD KEY `fk_dusun` (`id_dusun`),
  ADD KEY `fk_subBi` (`id_sub_bidang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id_dusun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_sub_bidang`
--
ALTER TABLE `tbl_sub_bidang`
  MODIFY `Id_sub_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_tahun`
--
ALTER TABLE `tbl_tahun`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tbl_usulan`
--
ALTER TABLE `tbl_usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bidang`
--
ALTER TABLE `tbl_bidang`
  ADD CONSTRAINT `fk_tahun` FOREIGN KEY (`id_tahun`) REFERENCES `tbl_tahun` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sub_bidang`
--
ALTER TABLE `tbl_sub_bidang`
  ADD CONSTRAINT `fk_bidang` FOREIGN KEY (`id_bidang`) REFERENCES `tbl_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_usulan`
--
ALTER TABLE `tbl_usulan`
  ADD CONSTRAINT `fk_bid` FOREIGN KEY (`id_bidang`) REFERENCES `tbl_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_desa` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dusun` FOREIGN KEY (`id_dusun`) REFERENCES `dusun` (`id_dusun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_subBi` FOREIGN KEY (`id_sub_bidang`) REFERENCES `tbl_sub_bidang` (`Id_sub_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
