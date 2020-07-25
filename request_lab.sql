-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jul 2020 pada 11.04
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
(26, 'GR0001', 'fajar', 'fajar', 'fajar@gmail.com', '123', 'aktif', '8989898', '2020-07-02 18:59:32', 'default.jpg'),
(27, 'GR0002', 'fajar', 'fajar', 'fajar@gmail.com', '1234', 'aktif', '8989899', '2020-07-02 18:59:32', 'default.jpg'),
(28, 'GR0003', 'fajar', 'fajar', 'fajar@gmail.com', '123456', 'aktif', '8989900', '2020-07-02 18:59:32', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kode_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`kode_kelas`, `nama_kelas`) VALUES
(15, 'abc'),
(16, 'ddd');

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
(1, 'LAB0001', 'lab komputer', 'ac, tv, banyak', 'aktif', '9772fd66cadf3fa9f405abb6343e5ad2.png', '4444');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelajaran`
--

CREATE TABLE `tb_pelajaran` (
  `kode_matapelajaran` int(8) NOT NULL,
  `mata_pelajaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelajaran`
--

INSERT INTO `tb_pelajaran` (`kode_matapelajaran`, `mata_pelajaran`) VALUES
(1, 'indo'),
(104749, 'mtk');

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
  `tanggal_pemakaian` date NOT NULL,
  `jam_pemakaian` varchar(50) NOT NULL,
  `kode_matapelajaran` int(12) NOT NULL,
  `kode_kelas` int(12) NOT NULL,
  `nohp_guru` varchar(20) NOT NULL,
  `foto_guru` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `approve` enum('setuju','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id`, `kode_pengajuan`, `kode_lab`, `kode_guru`, `nama_guru`, `tanggal_pengajuan`, `tanggal_pemakaian`, `jam_pemakaian`, `kode_matapelajaran`, `kode_kelas`, `nohp_guru`, `foto_guru`, `keterangan`, `approve`) VALUES
(96, 'PGN0001', 'LAB0001', 'GR0002', 'fajar', '2020-07-25 03:49:03', '2020-07-07', '1-3', 1, 16, '8989899', 'default.jpg', 'ok', 'setuju');

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
  `tanggal_pengajuan` date NOT NULL,
  `tanggal_pemakaian` date NOT NULL,
  `jam_pemakaian` varchar(50) NOT NULL,
  `kode_matapelajaran` int(11) NOT NULL,
  `kode_kelas` int(11) NOT NULL,
  `nohp_guru` varchar(20) NOT NULL,
  `foto_guru` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `approve` enum('tidak','setuju') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_riwayatpengajuan`
--

INSERT INTO `tb_riwayatpengajuan` (`id`, `kode_pengajuan`, `kode_lab`, `kode_guru`, `nama_guru`, `tanggal_pengajuan`, `tanggal_pemakaian`, `jam_pemakaian`, `kode_matapelajaran`, `kode_kelas`, `nohp_guru`, `foto_guru`, `keterangan`, `approve`) VALUES
(68, 'PGN0001', 'LAB0001', 'GR0002', 'fajar', '2020-07-25', '2020-07-07', '1-3', 1, 16, '8989899', 'default.jpg', 'ok', 'setuju');

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
  `status_aktif` enum('aktif','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `kode_user`, `nama`, `username`, `password`, `email`, `no_hp`, `status_aktif`) VALUES
(3, 'US0001', 'admin', 'admin', 'admin', 'admin@gmail.com', '089528426482642', 'aktif'),
(4, 'US0002', 'asep', 'admin', 'admin', 'asep@tajh.jhduw', '089528426482642', 'tidak');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indeks untuk tabel `tb_lab`
--
ALTER TABLE `tb_lab`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tb_pelajaran`
--
ALTER TABLE `tb_pelajaran`
  ADD PRIMARY KEY (`kode_matapelajaran`);

--
-- Indeks untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_riwayatpengajuan`
--
ALTER TABLE `tb_riwayatpengajuan`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `kode_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_lab`
--
ALTER TABLE `tb_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pelajaran`
--
ALTER TABLE `tb_pelajaran`
  MODIFY `kode_matapelajaran` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104750;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `tb_riwayatpengajuan`
--
ALTER TABLE `tb_riwayatpengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
