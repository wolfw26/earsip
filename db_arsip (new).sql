-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Feb 2022 pada 08.52
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
-- Struktur dari tabel `rkpinjam`
--

CREATE TABLE `rkpinjam` (
  `id_pinjam` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `karsip` int(15) NOT NULL,
  `kdokumen` int(15) NOT NULL,
  `klemari` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `subyek` enum('keuangan','kepegawaian','sensus') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbklasifikasi`
--

CREATE TABLE `tbklasifikasi` (
  `id` int(15) NOT NULL,
  `kode1` varchar(50) NOT NULL,
  `kode2` int(50) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbklasifikasi`
--

INSERT INTO `tbklasifikasi` (`id`, `kode1`, `kode2`, `ket`) VALUES
(4, 'KU', 22, 'Keuangan Tahun 2022'),
(5, 'KU', 121, 'dokumen Keuangan Tahun 2021 pada bulan 1'),
(6, 'KU', 221, 'Dokumen Keuangan bulan 1 Pada Tahun 2021\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblemari`
--

CREATE TABLE `tblemari` (
  `id_lemari` int(11) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  `no_lemari` int(15) NOT NULL,
  `baris` int(20) NOT NULL,
  `box` int(20) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblemari`
--

INSERT INTO `tblemari` (`id_lemari`, `nama_ruang`, `no_lemari`, `baris`, `box`, `ket`) VALUES
(15, 'A', 1, 4, 4, 'Penyimpanan Data Tahun 2022'),
(16, '2', 2, 1, 2, 'simpan keuangan tahun 2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpegawai`
--

CREATE TABLE `tbpegawai` (
  `id` int(25) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nope` int(80) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `bagian` varchar(30) NOT NULL,
  `user_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbpegawai`
--

INSERT INTO `tbpegawai` (`id`, `nama_lengkap`, `username`, `password`, `alamat`, `tgl_lahir`, `nope`, `jk`, `bagian`, `user_id`) VALUES
(4, 'tes', 'tes', 'tes', 'tes', '2022-02-01', 899999, 'l', 'statistik sosial', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tdokumen`
--

CREATE TABLE `tdokumen` (
  `id` int(11) NOT NULL,
  `no_spm` int(20) NOT NULL,
  `tgl_spm` date NOT NULL,
  `no_spd` int(30) NOT NULL,
  `tgl_spd` date NOT NULL,
  `rincian kuitansi` varchar(255) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `klasifikasi_id` int(11) NOT NULL,
  `isi_ringkasan` varchar(100) NOT NULL,
  `map` int(15) NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'pegawai', '047aeeb234644b9e2d4138ed3bc7976a', 'pegawai', 'pak erte'),
(3, 'nanda', '5fc94f8b8eb4b98e8c3e3855551ad2ef', 'pegawai', 'ananda rizky'),
(4, 'tes', 'tes', 'pegawai', 'tes');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `rkpinjam`
--
ALTER TABLE `rkpinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `karsip` (`karsip`,`kdokumen`),
  ADD KEY `kdokumen` (`kdokumen`);

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
-- Indeks untuk tabel `tbklasifikasi`
--
ALTER TABLE `tbklasifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tblemari`
--
ALTER TABLE `tblemari`
  ADD PRIMARY KEY (`id_lemari`);

--
-- Indeks untuk tabel `tbpegawai`
--
ALTER TABLE `tbpegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `tdokumen`
--
ALTER TABLE `tdokumen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `klasifikasi_id` (`klasifikasi_id`);

--
-- Indeks untuk tabel `tuser`
--
ALTER TABLE `tuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `rkpinjam`
--
ALTER TABLE `rkpinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rksimpan`
--
ALTER TABLE `rksimpan`
  MODIFY `id_rk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbarsip`
--
ALTER TABLE `tbarsip`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60047;

--
-- AUTO_INCREMENT untuk tabel `tbklasifikasi`
--
ALTER TABLE `tbklasifikasi`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tblemari`
--
ALTER TABLE `tblemari`
  MODIFY `id_lemari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbpegawai`
--
ALTER TABLE `tbpegawai`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tdokumen`
--
ALTER TABLE `tdokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tuser`
--
ALTER TABLE `tuser`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `rkpinjam`
--
ALTER TABLE `rkpinjam`
  ADD CONSTRAINT `rkpinjam_ibfk_1` FOREIGN KEY (`karsip`) REFERENCES `tbarsip` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Ketidakleluasaan untuk tabel `tbpegawai`
--
ALTER TABLE `tbpegawai`
  ADD CONSTRAINT `tbpegawai_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tuser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tdokumen`
--
ALTER TABLE `tdokumen`
  ADD CONSTRAINT `tdokumen_ibfk_1` FOREIGN KEY (`klasifikasi_id`) REFERENCES `tbklasifikasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
