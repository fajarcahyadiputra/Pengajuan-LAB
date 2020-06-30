-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Generation Time: Jun 30, 2020 at 09:14 AM
-- Server version: 8.0.19
-- PHP Version: 7.4.1

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
  `id` int NOT NULL,
  `kode_guru` varchar(50) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `apakah_aktif` enum('aktif','tidak') NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id`, `kode_guru`, `nama_guru`, `username`, `email`, `password`, `apakah_aktif`, `no_hp`, `tanggal_daftar`, `foto`) VALUES
(9, 'GR0001', 'user', 'user', 'user@gmail.com', 'user', 'aktif', '08952842648', '0000-00-00 00:00:00', '1bed72ca3924964154c5eaa554bb490d.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` int NOT NULL,
  `nama_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `nama_kelas`) VALUES
(2, 'I'),
(3, 'II'),
(4, 'III'),
(5, 'IV'),
(6, 'VI'),
(7, 'VII'),
(8, 'VIII'),
(9, 'IX'),
(10, 'X'),
(11, 'XI'),
(12, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lab`
--

CREATE TABLE `tb_lab` (
  `id` int NOT NULL,
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
-- Table structure for table `tb_pelajaran`
--

CREATE TABLE `tb_pelajaran` (
  `id` int NOT NULL,
  `mata_pelajaran` varchar(100) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_berakhir` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id` int NOT NULL,
  `kode_pengajuan` varchar(50) NOT NULL,
  `kode_lab` varchar(50) NOT NULL,
  `kode_guru` varchar(50) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `tanggal_pengajuan` datetime NOT NULL,
  `tanggal_pemakaian` datetime NOT NULL,
  `batas_pemakaian` datetime NOT NULL,
  `mata_pelajaran` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `nohp_guru` varchar(20) NOT NULL,
  `foto_guru` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `approve` enum('setuju','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id`, `kode_pengajuan`, `kode_lab`, `kode_guru`, `nama_guru`, `tanggal_pengajuan`, `tanggal_pemakaian`, `batas_pemakaian`, `mata_pelajaran`, `kelas`, `nohp_guru`, `foto_guru`, `keterangan`, `approve`) VALUES
(80, 'PGN0001', 'LAB0002', 'GR0001', 'user', '2020-06-30 02:32:29', '2020-06-30 10:00:00', '2020-06-30 18:00:00', 'B. Indonesia', 'I', '08952842648', '1bed72ca3924964154c5eaa554bb490d.png', 'ee', 'setuju');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayatpengajuan`
--

CREATE TABLE `tb_riwayatpengajuan` (
  `id` int NOT NULL,
  `kode_pengajuan` varchar(50) NOT NULL,
  `kode_lab` varchar(50) NOT NULL,
  `kode_guru` varchar(50) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `tanggal_pengajuan` datetime NOT NULL,
  `tanggal_pemakaian` datetime NOT NULL,
  `batas_pemakaian` datetime NOT NULL,
  `mata_pelajaran` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `nohp_guru` varchar(20) NOT NULL,
  `foto_guru` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `approve` enum('tidak','setuju') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int NOT NULL,
  `kode_user` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `status_aktif` enum('aktif','tidak') NOT NULL,
  `text_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `kode_user`, `nama`, `username`, `password`, `email`, `no_hp`, `status_aktif`, `text_password`) VALUES
(1, 'US0001', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@gmail.com', '9849958', 'aktif', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lab`
--
ALTER TABLE `tb_lab`
  ADD PRIMARY KEY (`kode_lab`) USING BTREE;

--
-- Indexes for table `tb_pelajaran`
--
ALTER TABLE `tb_pelajaran`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_lab` (`kode_lab`),
  ADD KEY `kode_guru` (`kode_guru`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=437;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_pelajaran`
--
ALTER TABLE `tb_pelajaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tb_riwayatpengajuan`
--
ALTER TABLE `tb_riwayatpengajuan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
