-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 10:13 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sidakgi`
--
CREATE DATABASE IF NOT EXISTS `db_sidakgi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_sidakgi`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_gigi`
--

CREATE TABLE `tbl_jenis_gigi` (
  `id_jenis_gigi` int(3) NOT NULL,
  `jenis_gigi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_gigi`
--

INSERT INTO `tbl_jenis_gigi` (`id_jenis_gigi`, `jenis_gigi`) VALUES
(1, 'Gigi 1'),
(2, 'Gigi 2'),
(3, 'Gigi 3'),
(4, 'Gigi 4'),
(5, 'Gigi 5'),
(6, 'Gigi 6'),
(7, 'Gigi 7'),
(8, 'Gigi 8'),
(9, 'Gigi 9'),
(10, 'Gigi 10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kasus`
--

CREATE TABLE `tbl_kasus` (
  `id_kasus` int(5) NOT NULL,
  `gigi` varchar(75) DEFAULT NULL,
  `gusi` varchar(75) DEFAULT NULL,
  `nyeri` varchar(75) DEFAULT NULL,
  `ngilu` varchar(75) DEFAULT NULL,
  `label` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kasus`
--

INSERT INTO `tbl_kasus` (`id_kasus`, `gigi`, `gusi`, `nyeri`, `ngilu`, `label`) VALUES
(1, 'bintik/lubang kecil', 'tidak bengkak', 'nyeri tertahankan', 'tidak ngilu', 'Superfisialis'),
(2, 'lubang besar', 'tidak bengkak', 'nyeri tidak tertahankan', 'tidak ngilu', 'Profunda'),
(3, 'lubang besar', 'bengkak', 'nyeri tidak tertahankan', 'tidak ngilu', 'Profunda'),
(4, 'lubang agak besar', 'bengkak', 'nyeri tidak tertahankan', 'tidak ngilu', 'Profunda'),
(5, 'bintik/lubang kecil', 'tidak bengkak', 'tidak nyeri', 'ngilu', 'Superfisialis'),
(6, 'lubang besar', 'bengkak', 'tidak nyeri', 'tidak ngilu', 'Profunda'),
(7, 'lubang besar', 'bengkak', 'tidak nyeri', 'tidak ngilu', 'Profunda'),
(8, 'lubang agak besar', 'tidak bengkak', 'tidak nyeri', 'tidak ngilu', 'Superfisialis'),
(9, 'lubang besar', 'tidak bengkak', 'nyeri tertahankan', 'tidak ngilu', 'Media'),
(10, 'lubang agak besar', 'bengkak', 'tidak nyeri', 'tidak ngilu', 'Media'),
(11, 'lubang agak besar', 'bengkak', 'nyeri tertahankan', 'ngilu', 'Media'),
(12, 'lubang besar', 'bengkak', 'nyeri tidak tertahankan', 'tidak ngilu', 'Profunda'),
(13, 'lubang besar', 'bengkak', 'nyeri tertahankan', 'ngilu', 'Profunda'),
(14, 'lubang besar', 'tidak bengkak', 'nyeri tertahankan', 'ngilu', 'Profunda'),
(15, 'lubang agak besar', 'tidak bengkak', 'tidak nyeri', 'tidak ngilu', 'Superfisialis'),
(16, 'bintik/lubang kecil', 'tidak bengkak', 'nyeri tertahankan', 'tidak ngilu', 'Superfisialis'),
(17, 'lubang agak besar', 'tidak bengkak', 'tidak nyeri', 'tidak ngilu', 'Superfisialis'),
(18, 'lubang agak besar', 'tidak bengkak', 'nyeri tertahankan', 'tidak ngilu', 'Superfisialis'),
(19, 'bintik/lubang kecil', 'tidak bengkak', 'nyeri tertahankan', 'tidak ngilu', 'Superfisialis'),
(20, 'lubang agak besar', 'bengkak', 'nyeri tertahankan', 'tidak ngilu', 'Media'),
(21, 'lubang besar', 'bengkak', 'tidak nyeri', 'tidak ngilu', 'Profunda'),
(22, 'bintik/lubang kecil', 'tidak bengkak', 'nyeri tertahankan', 'ngilu', 'Superfisialis'),
(23, 'lubang agak besar', 'bengkak', 'nyeri tidak tertahankan', 'tidak ngilu', 'Profunda'),
(24, 'lubang agak besar', 'tidak bengkak', 'nyeri tertahankan', 'ngilu', 'Media'),
(25, 'bintik/lubang kecil', 'tidak bengkak', 'tidak nyeri', 'tidak ngilu', 'Superfisialis'),
(26, 'bintik/lubang kecil', 'tidak bengkak', 'nyeri tertahankan', 'tidak ngilu', 'Superfisialis'),
(27, 'lubang besar', 'bengkak', 'nyeri tertahankan', 'tidak ngilu', 'Media'),
(28, 'lubang besar', 'bengkak', 'nyeri tidak tertahankan', 'ngilu', 'Profunda'),
(29, 'lubang besar', 'bengkak', 'nyeri tidak tertahankan', 'ngilu', 'Profunda'),
(30, 'lubang agak besar', 'bengkak', 'nyeri tidak tertahankan', 'tidak ngilu', 'Profunda'),
(31, 'lubang besar', 'bengkak', 'tidak nyeri', 'tidak ngilu', 'Profunda'),
(32, 'lubang agak besar', 'bengkak', 'nyeri tertahankan', 'ngilu', 'Media'),
(33, 'lubang besar', 'tidak bengkak', 'nyeri tertahankan', 'tidak ngilu', 'Media'),
(34, 'lubang agak besar', 'bengkak', 'nyeri tidak tertahankan', 'tidak ngilu', 'Profunda'),
(35, 'bintik/lubang kecil', 'tidak bengkak', 'nyeri tertahankan', 'tidak ngilu', 'Superfisialis'),
(36, 'bintik/lubang kecil', 'bengkak', 'tidak nyeri', 'tidak ngilu', 'Superfisialis'),
(37, 'lubang besar', 'tidak bengkak', 'nyeri tertahankan', 'tidak ngilu', 'Media'),
(38, 'lubang besar', 'bengkak', 'nyeri tertahankan', 'ngilu', 'Profunda'),
(39, 'lubang agak besar', 'bengkak', 'tidak nyeri', 'tidak ngilu', 'Media'),
(40, 'lubang besar', 'tidak bengkak', 'tidak nyeri', 'tidak ngilu', 'Media'),
(41, 'bintik/lubang kecil', 'bengkak', 'tidak nyeri', 'tidak ngilu', 'Superfisialis'),
(42, 'bintik/lubang kecil', 'bengkak', 'tidak nyeri', 'ngilu', 'Media'),
(43, 'lubang besar', 'bengkak', 'tidak nyeri', 'ngilu', 'Media'),
(44, 'bintik/lubang kecil', 'tidak bengkak', 'tidak nyeri', 'ngilu', 'Superfisialis'),
(45, 'bintik/lubang kecil', 'tidak bengkak', 'tidak nyeri', 'tidak ngilu', 'Superfisialis'),
(46, 'bintik/lubang kecil', 'tidak bengkak', 'nyeri tertahankan', 'tidak ngilu', 'Superfisialis'),
(47, 'lubang agak besar', 'bengkak', 'nyeri tidak tertahankan', 'ngilu', 'Media'),
(48, 'lubang agak besar', 'bengkak', 'tidak nyeri', 'tidak ngilu', 'Media'),
(49, 'lubang agak besar', 'bengkak', 'nyeri tertahankan', 'tidak ngilu', 'Media'),
(50, 'lubang agak besar', 'bengkak', 'nyeri tidak tertahankan', 'tidak ngilu', 'Profunda'),
(51, 'lubang agak besar', 'tidak bengkak', 'tidak nyeri', 'ngilu', 'Media'),
(52, 'bintik/lubang kecil', 'tidak bengkak', 'tidak nyeri', 'tidak ngilu', 'Superfisialis'),
(53, 'lubang agak besar', 'bengkak', 'tidak nyeri', 'tidak ngilu', 'Media'),
(54, 'bintik/lubang kecil', 'bengkak', 'nyeri tertahankan', 'tidak ngilu', 'Media'),
(55, 'lubang besar', 'tidak bengkak', 'tidak nyeri', 'tidak ngilu', 'Media'),
(56, 'bintik/lubang kecil', 'tidak bengkak', 'tidak nyeri', 'tidak ngilu', 'Superfisialis'),
(57, 'bintik/lubang kecil', 'bengkak', 'tidak nyeri', 'tidak ngilu', 'Superfisialis'),
(58, 'lubang agak besar', 'tidak bengkak', 'tidak nyeri', 'tidak ngilu', 'Superfisialis'),
(59, 'lubang besar', 'bengkak', 'nyeri tertahankan', 'tidak ngilu', 'Media'),
(60, 'lubang besar', 'bengkak', 'nyeri tidak tertahankan', 'tidak ngilu', 'Profunda');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keputusan`
--

CREATE TABLE `tbl_keputusan` (
  `id_keputusan` int(11) NOT NULL,
  `kondisi` text,
  `label` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keputusan`
--

INSERT INTO `tbl_keputusan` (`id_keputusan`, `kondisi`, `label`) VALUES
(1, 'gigi = bintik/lubang kecil AND gusi = bengkak AND ngilu = ngilu', 'Media'),
(2, 'gigi = bintik/lubang kecil AND gusi = bengkak AND ngilu = tidak ngilu AND nyeri = nyeri tertahankan', 'Media'),
(3, 'gigi = bintik/lubang kecil AND gusi = bengkak AND ngilu = tidak ngilu AND nyeri = tidak nyeri', 'Superfisialis'),
(4, 'gigi = bintik/lubang kecil AND gusi = tidak bengkak', 'Superfisialis'),
(5, 'gigi = lubang agak besar AND gusi = bengkak AND nyeri = nyeri tertahankan', 'Media'),
(6, 'gigi = lubang agak besar AND gusi = bengkak AND nyeri = nyeri tidak tertahankan AND ngilu = ngilu', 'Media'),
(7, 'gigi = lubang agak besar AND gusi = bengkak AND nyeri = nyeri tidak tertahankan AND ngilu = tidak ngilu', 'Profunda'),
(8, 'gigi = lubang agak besar AND gusi = bengkak AND nyeri = tidak nyeri', 'Media'),
(9, 'gigi = lubang agak besar AND gusi = tidak bengkak AND ngilu = ngilu', 'Media'),
(10, 'gigi = lubang agak besar AND gusi = tidak bengkak AND ngilu = tidak ngilu', 'Superfisialis'),
(11, 'gigi = lubang besar AND gusi = bengkak AND nyeri = nyeri tertahankan AND ngilu = ngilu', 'Profunda'),
(12, 'gigi = lubang besar AND gusi = bengkak AND nyeri = nyeri tertahankan AND ngilu = tidak ngilu', 'Media'),
(13, 'gigi = lubang besar AND gusi = bengkak AND nyeri = nyeri tidak tertahankan', 'Profunda'),
(14, 'gigi = lubang besar AND gusi = bengkak AND nyeri = tidak nyeri AND ngilu = ngilu', 'Media'),
(15, 'gigi = lubang besar AND gusi = bengkak AND nyeri = tidak nyeri AND ngilu = tidak ngilu', 'Profunda'),
(16, 'gigi = lubang besar AND gusi = tidak bengkak AND ngilu = ngilu', 'Profunda'),
(17, 'gigi = lubang besar AND gusi = tidak bengkak AND ngilu = tidak ngilu AND nyeri = nyeri tertahankan', 'Media'),
(18, 'gigi = lubang besar AND gusi = tidak bengkak AND ngilu = tidak ngilu AND nyeri = nyeri tidak tertahankan', 'Profunda'),
(19, 'gigi = lubang besar AND gusi = tidak bengkak AND ngilu = tidak ngilu AND nyeri = tidak nyeri', 'Media');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(100) DEFAULT NULL,
  `jk_pasien` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `alamat_pasien` text,
  `no_hp_pasien` varchar(13) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id_pasien`, `nama_pasien`, `jk_pasien`, `alamat_pasien`, `no_hp_pasien`, `username`, `password`) VALUES
(1, 'Sutejo', 'Laki-Laki', 'Mgl City', '0811214343242', 'sutejo', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'Sunarningsih', 'Perempuan', 'Bandongan, Mgl', '085123456789', 'sunarningsih', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'Sarimin', 'Laki-Laki', 'Underground City', '082323424234', 'sarimin', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'Kastolani', 'Laki-Laki', 'Sawitan', '085712343432', 'kastol', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekam_medik`
--

CREATE TABLE `tbl_rekam_medik` (
  `id_rm` int(11) NOT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `tgl_periksa` date DEFAULT NULL,
  `id_jenis_gigi` int(3) DEFAULT NULL,
  `gigi` varchar(75) DEFAULT NULL,
  `gusi` varchar(75) DEFAULT NULL,
  `nyeri` varchar(75) DEFAULT NULL,
  `ngilu` varchar(75) DEFAULT NULL,
  `diagnosa` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rekam_medik`
--

INSERT INTO `tbl_rekam_medik` (`id_rm`, `id_pasien`, `tgl_periksa`, `id_jenis_gigi`, `gigi`, `gusi`, `nyeri`, `ngilu`, `diagnosa`) VALUES
(1, 1, '2019-11-13', 5, 'bintik/lubang kecil', 'bengkak', 'nyeri tidak tertahankan', 'ngilu', 'Media'),
(3, 3, '2019-11-13', 8, 'lubang agak besar', 'bengkak', 'nyeri tidak tertahankan', 'tidak ngilu', 'Profunda'),
(4, 2, '2019-11-14', 9, 'bintik/lubang kecil', 'tidak bengkak', 'nyeri tertahankan', 'tidak ngilu', 'Superfisialis'),
(8, 6, '2019-11-23', 6, 'bintik/lubang kecil', 'tidak bengkak', 'nyeri tertahankan', 'tidak ngilu', 'Superfisialis'),
(9, 1, '2019-11-25', 3, 'lubang agak besar', 'tidak bengkak', 'nyeri tertahankan', 'ngilu', 'Media');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `username` varchar(75) DEFAULT NULL,
  `password` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`) VALUES
(1, 'Anonymous', 'super', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Suharti', 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jenis_gigi`
--
ALTER TABLE `tbl_jenis_gigi`
  ADD PRIMARY KEY (`id_jenis_gigi`);

--
-- Indexes for table `tbl_kasus`
--
ALTER TABLE `tbl_kasus`
  ADD PRIMARY KEY (`id_kasus`);

--
-- Indexes for table `tbl_keputusan`
--
ALTER TABLE `tbl_keputusan`
  ADD PRIMARY KEY (`id_keputusan`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tbl_rekam_medik`
--
ALTER TABLE `tbl_rekam_medik`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `tbl_diagnosa_ibfk_1` (`id_pasien`),
  ADD KEY `tbl_rekam_medik_ibfk_2` (`id_jenis_gigi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jenis_gigi`
--
ALTER TABLE `tbl_jenis_gigi`
  MODIFY `id_jenis_gigi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_kasus`
--
ALTER TABLE `tbl_kasus`
  MODIFY `id_kasus` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_keputusan`
--
ALTER TABLE `tbl_keputusan`
  MODIFY `id_keputusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_rekam_medik`
--
ALTER TABLE `tbl_rekam_medik`
  MODIFY `id_rm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_rekam_medik`
--
ALTER TABLE `tbl_rekam_medik`
  ADD CONSTRAINT `tbl_rekam_medik_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tbl_pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_rekam_medik_ibfk_2` FOREIGN KEY (`id_jenis_gigi`) REFERENCES `tbl_jenis_gigi` (`id_jenis_gigi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
