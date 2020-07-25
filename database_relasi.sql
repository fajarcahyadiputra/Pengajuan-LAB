-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jul 2020 pada 11.05
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
-- Database: `request_lab_new`
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
(20, 'GR0001', 'fajar cahyadi putra', 'user', 'asep@tajh.jhduw', '23', 'aktif', '089528426482642', '0000-00-00 00:00:00', 'af3ba01deea63a460c662ca93fb6a533.PNG'),
(21, 'GR0002', 'fajar cahyadi putra', 'admin', 'asep@tajh.jhduw', '2323', 'aktif', '089528426482642', '0000-00-00 00:00:00', 'aa75e8c97f609ac8e36a581e07630f5b.png');

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
(15, 'abc');

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
(0, 'LAB0001', 'lab komputer', 'ac, tv, banyak', 'aktif', '9772fd66cadf3fa9f405abb6343e5ad2.png', '4444');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelajaran`
--

CREATE TABLE `tb_pelajaran` (
  `kode_matapelajaran` int(50) NOT NULL,
  `mata_pelajaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelajaran`
--

INSERT INTO `tb_pelajaran` (`kode_matapelajaran`, `mata_pelajaran`) VALUES
(61358, 'indo');

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
(94, 'PGN0001', 'LAB0001', 'GR0001', 'fajar cahyadi putra', '2020-07-02 11:45:00', '2020-07-09', '3-8', 61358, 15, '089528426482642', 'af3ba01deea63a460c662ca93fb6a533.PNG', 'ok', 'setuju');

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
(65, 'PGN0001', 'LAB0001', 'GR0001', 'fajar cahyadi putra', '2020-07-02', '2020-07-14', '4-7', 61358, 15, '089528426482642', 'af3ba01deea63a460c662ca93fb6a533.PNG', 'ok', 'setuju'),
(66, 'PGN0001', 'LAB0001', 'GR0001', 'fajar cahyadi putra', '2020-07-02', '2020-07-09', '3-8', 61358, 15, '089528426482642', 'af3ba01deea63a460c662ca93fb6a533.PNG', 'ok', 'setuju');

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
  ADD PRIMARY KEY (`kode_guru`) USING BTREE;

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indeks untuk tabel `tb_lab`
--
ALTER TABLE `tb_lab`
  ADD PRIMARY KEY (`kode_lab`) USING BTREE;

--
-- Indeks untuk tabel `tb_pelajaran`
--
ALTER TABLE `tb_pelajaran`
  ADD PRIMARY KEY (`kode_matapelajaran`);

--
-- Indeks untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_pengajuan` (`kode_pengajuan`,`kode_lab`,`kode_matapelajaran`,`kode_kelas`),
  ADD KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_lab` (`kode_lab`),
  ADD KEY `kode_matapelajaran` (`kode_matapelajaran`),
  ADD KEY `kode_guru` (`kode_guru`);

--
-- Indeks untuk tabel `tb_riwayatpengajuan`
--
ALTER TABLE `tb_riwayatpengajuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_pengajuan` (`kode_pengajuan`),
  ADD KEY `kode_lab` (`kode_lab`),
  ADD KEY `kode_guru` (`kode_guru`),
  ADD KEY `kode_matapelajaran` (`kode_matapelajaran`),
  ADD KEY `kode_kelas` (`kode_kelas`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `kode_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `tb_riwayatpengajuan`
--
ALTER TABLE `tb_riwayatpengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD CONSTRAINT `tb_pengajuan_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `tb_kelas` (`kode_kelas`),
  ADD CONSTRAINT `tb_pengajuan_ibfk_2` FOREIGN KEY (`kode_lab`) REFERENCES `tb_lab` (`kode_lab`),
  ADD CONSTRAINT `tb_pengajuan_ibfk_3` FOREIGN KEY (`kode_matapelajaran`) REFERENCES `tb_pelajaran` (`kode_matapelajaran`),
  ADD CONSTRAINT `tb_pengajuan_ibfk_4` FOREIGN KEY (`kode_guru`) REFERENCES `tb_guru` (`kode_guru`),
  ADD CONSTRAINT `tb_pengajuan_ibfk_5` FOREIGN KEY (`kode_pengajuan`) REFERENCES `tb_riwayatpengajuan` (`kode_pengajuan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
