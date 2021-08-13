-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Agu 2021 pada 09.25
-- Versi server: 5.7.24
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_istanaprint`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(150) NOT NULL,
  `bidang` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `bidang`) VALUES
(1, 'Alfianoor', 'Design'),
(2, 'Bana', 'Design');

-- --------------------------------------------------------

--
-- Struktur dari tabel `katalog`
--

CREATE TABLE `katalog` (
  `id_katalog` int(11) NOT NULL,
  `nama_katalog` varchar(150) NOT NULL,
  `jenis_katalog` varchar(150) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `ukuran` varchar(150) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `harga_desain` varchar(50) NOT NULL,
  `total_harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `katalog`
--

INSERT INTO `katalog` (`id_katalog`, `nama_katalog`, `jenis_katalog`, `qty`, `ukuran`, `harga`, `harga_desain`, `total_harga`) VALUES
(1, 'X Banner', 'X Banner', '15', '10 x 25 ', '90000', '20000', '110000'),
(2, 'Spanduk', 'Spanduk', '6', '300 x 100', '90000', '20000', '11000'),
(3, 'ID Card', 'ID Card', '2000', '50 x 40', '1500', '20000', '21500'),
(4, 'Pamflet', 'Pamflet', '1000', '30 x 30', '5000', '20000', '25000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `no_wa` varchar(100) DEFAULT NULL,
  `id_katalog` int(11) DEFAULT NULL,
  `tanggal_pesan` date DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `status_pengambilan` varchar(150) DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `nama_pemesan`, `nik`, `no_wa`, `id_katalog`, `tanggal_pesan`, `file`, `status`, `status_pengambilan`, `id_karyawan`) VALUES
(1, 'Salabiah', '6371022210960004', '089579238888', 1, '2021-08-11', '78987.JPG', 'Selesai', 'Sudah Diambil', 1),
(3, 'Fakhri', '637102221210008', '089579238888', 4, '2021-08-12', '32162.jpg', 'Proses', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `no_wa` varchar(100) DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `nama_pemesan`, `nik`, `no_wa`, `tanggal_kembali`, `file`, `status`) VALUES
(4, 'Udin', '635233210960004', '089579238888', '2021-08-12', '21383.jpg', 'Menunggu Persetujuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Super Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_katalog` (`id_katalog`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id_katalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
