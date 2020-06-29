-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 08:30 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `request_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id` int(11) NOT NULL,
  `kode_guru` varchar(50) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `apakah_aktif` enum('aktif','tidak') NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id`, `kode_guru`, `nama_guru`, `email`, `password`, `apakah_aktif`, `no_hp`, `foto`) VALUES
(9, 'GR0001', 'user', 'user@gmail.com', '12dea96fec20593566ab75692c9949596833adc9', 'aktif', '08952842648', '1bed72ca3924964154c5eaa554bb490d.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lab`
--

CREATE TABLE `tb_lab` (
  `id` int(11) NOT NULL,
  `kode_lab` varchar(50) NOT NULL,
  `nama_lab` varchar(50) NOT NULL,
  `fasilitas` varchar(200) NOT NULL,
  `apakah_aktif` enum('aktif','tidak') NOT NULL,
  `foto` varchar(60) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lab`
--

INSERT INTO `tb_lab` (`id`, `kode_lab`, `nama_lab`, `fasilitas`, `apakah_aktif`, `foto`, `keterangan`) VALUES
(8, 'LAB00001', 'A7YY', 'tv, ac', 'aktif', '0329a2cbba4ca78f078fea1e71e73f16.png', 'ini lab komputer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id` int(11) NOT NULL,
  `kode_pengajuan` varchar(50) NOT NULL,
  `kode_lab` varchar(50) NOT NULL,
  `kode_guru` varchar(50) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `tanggal_pengajuan` datetime NOT NULL,
  `tanggal_pemakaian` datetime NOT NULL,
  `batas_pemakaian` datetime NOT NULL,
  `nohp_guru` varchar(20) NOT NULL,
  `foto_guru` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id`, `kode_pengajuan`, `kode_lab`, `kode_guru`, `nama_guru`, `tanggal_pengajuan`, `tanggal_pemakaian`, `batas_pemakaian`, `nohp_guru`, `foto_guru`, `keterangan`) VALUES
(51, 'PGN0001', 'LAB00001', 'GR0001', 'user', '2020-04-10 01:29:39', '2020-04-06 23:05:00', '2020-04-21 23:04:00', '08952842648', '1bed72ca3924964154c5eaa554bb490d.png', 'ok mantap');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayatpengajuan`
--

CREATE TABLE `tb_riwayatpengajuan` (
  `id` int(11) NOT NULL,
  `kode_pengajuan` varchar(50) NOT NULL,
  `kode_lab` varchar(50) NOT NULL,
  `kode_guru` varchar(50) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `tanggal_pengajuan` datetime NOT NULL,
  `tanggal_pemakaian` datetime NOT NULL,
  `batas_pemakaian` datetime NOT NULL,
  `nohp_guru` varchar(20) NOT NULL,
  `foto_guru` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_riwayatpengajuan`
--

INSERT INTO `tb_riwayatpengajuan` (`id`, `kode_pengajuan`, `kode_lab`, `kode_guru`, `nama_guru`, `tanggal_pengajuan`, `tanggal_pemakaian`, `batas_pemakaian`, `nohp_guru`, `foto_guru`, `keterangan`) VALUES
(28, 'PGN0001', 'LAB00001', 'GR0001', 'user', '2020-04-10 01:29:39', '2020-04-06 23:05:00', '2020-04-21 23:04:00', '08952842648', '1bed72ca3924964154c5eaa554bb490d.png', 'ok mantap');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `kode_user` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `level` enum('admin','guru') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `kode_user`, `nama`, `username`, `password`, `email`, `no_hp`, `level`) VALUES
(1, 'A9898', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@gamil.com', '9849958', 'admin'),
(2, 'user', 'user', 'user', '12dea96fec20593566ab75692c9949596833adc9', 'user@gmai.com', '276476', 'guru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lab`
--
ALTER TABLE `tb_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_riwayatpengajuan`
--
ALTER TABLE `tb_riwayatpengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_lab`
--
ALTER TABLE `tb_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tb_riwayatpengajuan`
--
ALTER TABLE `tb_riwayatpengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
