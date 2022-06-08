-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jan 2022 pada 09.11
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arsip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `rksimpan`
--

CREATE TABLE `rksimpan` (
  `id_rk` int(11) NOT NULL,
  `arsip_id` int(15) NOT NULL,
  `lemari_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbarsip`
--

CREATE TABLE `tbarsip` (
  `id` int(15) NOT NULL,
  `kode_arsip` varchar(25) NOT NULL,
  `nama_arsip` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `id_lemari` int(11) NOT NULL,
  `subyek` enum('keuangan','kepegawaian') NOT NULL,
  `asli` enum('asli','salinan','tembusan') NOT NULL,
  `sifat` enum('rahasia','penting','biasa') NOT NULL,
  `fungsi` enum('aktif','semi aktif','statis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbarsip`
--

INSERT INTO `tbarsip` (`id`, `kode_arsip`, `nama_arsip`, `tanggal`, `deskripsi`, `id_lemari`, `subyek`, `asli`, `sifat`, `fungsi`) VALUES
(60032, 'KP', 'Kepegawaian', '2022-01-15', 'Sensus', 12, 'kepegawaian', 'asli', 'rahasia', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbdokumen`
--

CREATE TABLE `tbdokumen` (
  `id_dokumen` int(15) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `dok_judul` varchar(85) NOT NULL,
  `dok_deskripsi` text NOT NULL,
  `tangal` date NOT NULL,
  `arsip_id` int(15) NOT NULL,
  `subyek` enum('keuangan','kepegawaian') NOT NULL,
  `keaslian` enum('asli','salinan','tembusan') NOT NULL,
  `sifat` enum('rahasia','penting','biasa') NOT NULL,
  `fungsi` enum('aktif','semi-aktif','statis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbdokumen`
--

INSERT INTO `tbdokumen` (`id_dokumen`, `kode`, `dok_judul`, `dok_deskripsi`, `tangal`, `arsip_id`, `subyek`, `keaslian`, `sifat`, `fungsi`) VALUES
(63, 'KP0198', 'Sensus ', 'Sensus', '2022-01-14', 60032, 'kepegawaian', 'asli', 'penting', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblemari`
--

CREATE TABLE `tblemari` (
  `id_lemari` int(11) NOT NULL,
  `no_lemari` int(15) NOT NULL,
  `kode_lemari` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblemari`
--

INSERT INTO `tblemari` (`id_lemari`, `no_lemari`, `kode_lemari`) VALUES
(1, 1, 1),
(9, 2, 1),
(10, 3, 1),
(11, 4, 1),
(12, 5, 4),
(13, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tuser`
--

CREATE TABLE `tuser` (
  `id` int(25) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','pegawai') NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tuser`
--

INSERT INTO `tuser` (`id`, `username`, `password`, `level`, `nama_lengkap`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Muhammad Faqih'),
(2, 'pegawai', '047aeeb234644b9e2d4138ed3bc7976a', 'pegawai', 'pak ndut');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `rksimpan`
--
ALTER TABLE `rksimpan`
  ADD PRIMARY KEY (`id_rk`),
  ADD KEY `arsip_id` (`arsip_id`,`lemari_id`),
  ADD KEY `lemari_id` (`lemari_id`);

--
-- Indeks untuk tabel `tbarsip`
--
ALTER TABLE `tbarsip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lemari` (`id_lemari`);

--
-- Indeks untuk tabel `tbdokumen`
--
ALTER TABLE `tbdokumen`
  ADD PRIMARY KEY (`id_dokumen`),
  ADD KEY `id_arsip` (`arsip_id`),
  ADD KEY `arsip_id` (`arsip_id`);

--
-- Indeks untuk tabel `tblemari`
--
ALTER TABLE `tblemari`
  ADD PRIMARY KEY (`id_lemari`);

--
-- Indeks untuk tabel `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `rksimpan`
--
ALTER TABLE `rksimpan`
  MODIFY `id_rk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbarsip`
--
ALTER TABLE `tbarsip`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60033;

--
-- AUTO_INCREMENT untuk tabel `tbdokumen`
--
ALTER TABLE `tbdokumen`
  MODIFY `id_dokumen` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `tblemari`
--
ALTER TABLE `tblemari`
  MODIFY `id_lemari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `rksimpan`
--
ALTER TABLE `rksimpan`
  ADD CONSTRAINT `rksimpan_ibfk_1` FOREIGN KEY (`arsip_id`) REFERENCES `tbarsip` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rksimpan_ibfk_2` FOREIGN KEY (`lemari_id`) REFERENCES `tblemari` (`id_lemari`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbarsip`
--
ALTER TABLE `tbarsip`
  ADD CONSTRAINT `tbarsip_ibfk_1` FOREIGN KEY (`id_lemari`) REFERENCES `tblemari` (`id_lemari`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbdokumen`
--
ALTER TABLE `tbdokumen`
  ADD CONSTRAINT `tbdokumen_ibfk_1` FOREIGN KEY (`arsip_id`) REFERENCES `tbarsip` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
