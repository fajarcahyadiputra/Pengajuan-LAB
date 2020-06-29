-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2020 pada 19.12
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

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
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id` int(11) NOT NULL,
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
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id`, `kode_guru`, `nama_guru`, `username`, `email`, `password`, `apakah_aktif`, `no_hp`, `tanggal_daftar`, `foto`) VALUES
(9, 'GR0001', 'user', 'user', 'user@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'aktif', '08952842648', '0000-00-00 00:00:00', '1bed72ca3924964154c5eaa554bb490d.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lab`
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
-- Dumping data untuk tabel `tb_lab`
--

INSERT INTO `tb_lab` (`id`, `kode_lab`, `nama_lab`, `fasilitas`, `apakah_aktif`, `foto`, `keterangan`) VALUES
(8, 'LAB00001', 'A7YY', 'tv, ac', 'aktif', '0329a2cbba4ca78f078fea1e71e73f16.png', 'ini lab komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajuan`
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
  `keterangan` text NOT NULL,
  `approve` enum('setuju','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id`, `kode_pengajuan`, `kode_lab`, `kode_guru`, `nama_guru`, `tanggal_pengajuan`, `tanggal_pemakaian`, `batas_pemakaian`, `nohp_guru`, `foto_guru`, `keterangan`, `approve`) VALUES
(74, 'PGN0001', 'LAB00001', 'GR0001', 'user', '2020-06-28 09:44:58', '2020-06-18 23:44:00', '2020-06-10 23:44:00', '08952842648', '1bed72ca3924964154c5eaa554bb490d.png', 'ok', 'setuju'),
(75, 'PGN0002', 'LAB00001', 'GR0001', 'user', '2020-06-28 09:45:16', '2020-06-17 21:48:00', '2020-06-05 23:45:00', '08952842648', '1bed72ca3924964154c5eaa554bb490d.png', 'ok', 'setuju');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_riwayatpengajuan`
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
  `keterangan` text NOT NULL,
  `approve` enum('tidak','setuju') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_riwayatpengajuan`
--

INSERT INTO `tb_riwayatpengajuan` (`id`, `kode_pengajuan`, `kode_lab`, `kode_guru`, `nama_guru`, `tanggal_pengajuan`, `tanggal_pemakaian`, `batas_pemakaian`, `nohp_guru`, `foto_guru`, `keterangan`, `approve`) VALUES
(49, 'PGN0001', 'LAB00001', 'GR0001', 'user', '2020-06-28 09:44:58', '2020-06-18 23:44:00', '2020-06-10 23:44:00', '08952842648', '1bed72ca3924964154c5eaa554bb490d.png', 'ok', 'setuju'),
(50, 'PGN0002', 'LAB00001', 'GR0001', 'user', '2020-06-28 09:45:16', '2020-06-17 21:48:00', '2020-06-05 23:45:00', '08952842648', '1bed72ca3924964154c5eaa554bb490d.png', 'ok', 'setuju');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
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
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `kode_user`, `nama`, `username`, `password`, `email`, `no_hp`, `status_aktif`, `text_password`) VALUES
(1, 'US0001', 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin@gmail.com', '9849958', 'aktif', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_lab`
--
ALTER TABLE `tb_lab`
  ADD PRIMARY KEY (`kode_lab`) USING BTREE;

--
-- Indeks untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_riwayatpengajuan`
--
ALTER TABLE `tb_riwayatpengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_lab` (`kode_lab`),
  ADD KEY `kode_guru` (`kode_guru`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `tb_riwayatpengajuan`
--
ALTER TABLE `tb_riwayatpengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
