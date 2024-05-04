-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Bulan Mei 2024 pada 10.20
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ngetrash`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `idAdmin` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `userName` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`idAdmin`, `name`, `userName`, `password`) VALUES
(14, 'Admin', 'admin@gmail.com', '$2y$10$XPoJDaAVSOLtLJ044zkDHOjiAguu9ZB1dmPHXGs3za5R5RMDXP6QS'),
(17, 'Ibrahim', 'ibrahim@gmail.com', '$2y$10$ImcnMRytRFghGHvlLr1qJOe0AB5GhAtf92Nq1U192J.rAkGYTd4bm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `idBarang` int(2) NOT NULL,
  `namaBarang` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`idBarang`, `namaBarang`, `harga`) VALUES
(1, 'Sampah Organik', 10000),
(2, 'Sampah Anorganik', 15000),
(3, 'Sampah B3', 7500),
(4, 'Sampah Kertas', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_daur_ulang`
--

CREATE TABLE `tbl_daur_ulang` (
  `idDaur` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  `berat` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `idBarang` int(5) NOT NULL,
  `idUser` int(2) NOT NULL,
  `idPetugas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_daur_ulang`
--

INSERT INTO `tbl_daur_ulang` (`idDaur`, `tanggal`, `berat`, `total`, `idBarang`, `idUser`, `idPetugas`) VALUES
(66, '2024-04-24', 25, 250000, 1, 14, 21),
(67, '2024-04-25', 24, 360000, 2, 14, 21),
(68, '2024-04-26', 25, 375000, 2, 14, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_iuran_wajib`
--

CREATE TABLE `tbl_iuran_wajib` (
  `idIuran` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('Sudah Bayar','Belum Bayar') NOT NULL,
  `jenisBayar` enum('Tunai','Non Tunai') NOT NULL,
  `idUser` int(5) DEFAULT NULL,
  `idPetugas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_iuran_wajib`
--

INSERT INTO `tbl_iuran_wajib` (`idIuran`, `tanggal`, `status`, `jenisBayar`, `idUser`, `idPetugas`) VALUES
(87, '2024-04-20', 'Sudah Bayar', 'Tunai', 14, 21),
(88, '2024-04-20', 'Sudah Bayar', 'Non Tunai', 14, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `idPetugas` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `statusAktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`idPetugas`, `name`, `userName`, `password`, `statusAktif`) VALUES
(21, 'Ibrahim Aji', 'ibrahim@gmail.com', '$2y$10$6oAozlFvK4s1Gjm2ywOx9.7SKGDtHypGBEH.9xQTudOREb2mOYNhy', 'Y'),
(22, 'John Cena', 'john@gmail.com', '$2y$10$EI39AlNjRtDTLPkGKvOkO.qV2KnwcMjbwPHqS6QWChH7LiN6FypIW', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayat_transaksi`
--

CREATE TABLE `tbl_riwayat_transaksi` (
  `idTransaksi` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `jenis_transaksi` enum('masuk','keluar') NOT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_riwayat_transaksi`
--

INSERT INTO `tbl_riwayat_transaksi` (`idTransaksi`, `idUser`, `jenis_transaksi`, `jumlah`, `keterangan`, `tanggal_transaksi`) VALUES
(84, 14, 'masuk', 120000.00, 'Daur ulang', '2024-04-20 05:47:49'),
(89, 14, 'keluar', 100000.00, 'Pengeluaran Iuran Wajib', '2024-04-20 09:28:53'),
(90, 14, 'masuk', 75000.00, 'Daur ulang', '2024-04-20 11:30:16'),
(91, 14, 'masuk', 75000.00, 'Daur ulang', '2024-04-20 11:30:34'),
(92, 14, 'masuk', 115000.00, 'Daur ulang', '2024-04-20 11:30:52'),
(93, 14, 'masuk', 345000.00, 'Daur ulang', '2024-04-20 11:31:05'),
(107, 14, 'masuk', 20000.00, 'Daur ulang', '2024-04-24 13:52:19'),
(109, 14, 'masuk', 250000.00, 'Daur ulang', '2024-04-24 14:01:18'),
(111, 14, 'masuk', 360000.00, 'Daur ulang', '2024-04-25 12:20:07'),
(113, 14, 'masuk', 375000.00, 'Daur ulang', '2024-04-26 11:46:34'),
(116, 14, 'masuk', 75000.00, 'Daur ulang', '2024-04-26 12:14:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_status_pengambilan`
--

CREATE TABLE `tbl_status_pengambilan` (
  `idStatus` int(2) NOT NULL,
  `keterangan` enum('Belum Diambil','Sudah Diambil') NOT NULL,
  `tanggal` date NOT NULL,
  `idUser` int(5) NOT NULL,
  `idPetugas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_status_pengambilan`
--

INSERT INTO `tbl_status_pengambilan` (`idStatus`, `keterangan`, `tanggal`, `idUser`, `idPetugas`) VALUES
(40, 'Belum Diambil', '2024-05-04', 14, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `idUser` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `saldoMasuk` int(10) NOT NULL,
  `saldoKeluar` int(10) NOT NULL,
  `totalSaldo` int(10) NOT NULL,
  `statusAktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`idUser`, `name`, `userName`, `password`, `alamat`, `saldoMasuk`, `saldoKeluar`, `totalSaldo`, `statusAktif`) VALUES
(14, 'Lilik M', 'lilik@gmail.com', '$2y$10$e65HsZzvJrCpCgUvzbah3ei16sBSm2r25SFPI0kfpByeAaGhgGiWS', 'Jogja', 1810000, 100000, 1710000, 'Y'),
(15, 'Ibrahim Aji', 'ibrahim@gmail.com', '$2y$10$r6wq69hUrswI3to9cRD3YenWIGo2s/uxHTmDVMUED/f4yQE5FEFoC', 'Jogja', 0, 0, 0, 'Y');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`idBarang`);

--
-- Indeks untuk tabel `tbl_daur_ulang`
--
ALTER TABLE `tbl_daur_ulang`
  ADD PRIMARY KEY (`idDaur`),
  ADD KEY `idBarang` (`idBarang`),
  ADD KEY `idPetugas` (`idPetugas`) USING BTREE,
  ADD KEY `idUser` (`idUser`) USING BTREE;

--
-- Indeks untuk tabel `tbl_iuran_wajib`
--
ALTER TABLE `tbl_iuran_wajib`
  ADD PRIMARY KEY (`idIuran`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idPetugas` (`idPetugas`);

--
-- Indeks untuk tabel `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`idPetugas`);

--
-- Indeks untuk tabel `tbl_riwayat_transaksi`
--
ALTER TABLE `tbl_riwayat_transaksi`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `fk_user_id` (`idUser`);

--
-- Indeks untuk tabel `tbl_status_pengambilan`
--
ALTER TABLE `tbl_status_pengambilan`
  ADD PRIMARY KEY (`idStatus`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idPetugas` (`idPetugas`) USING BTREE;

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `idAdmin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `idBarang` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_daur_ulang`
--
ALTER TABLE `tbl_daur_ulang`
  MODIFY `idDaur` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `tbl_iuran_wajib`
--
ALTER TABLE `tbl_iuran_wajib`
  MODIFY `idIuran` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `idPetugas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tbl_riwayat_transaksi`
--
ALTER TABLE `tbl_riwayat_transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT untuk tabel `tbl_status_pengambilan`
--
ALTER TABLE `tbl_status_pengambilan`
  MODIFY `idStatus` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `idUser` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_daur_ulang`
--
ALTER TABLE `tbl_daur_ulang`
  ADD CONSTRAINT `tbl_daur_ulang_ibfk_1` FOREIGN KEY (`idPetugas`) REFERENCES `tbl_petugas` (`idPetugas`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_daur_ulang_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `tbl_user` (`idUser`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_daur_ulang_ibfk_3` FOREIGN KEY (`idBarang`) REFERENCES `tbl_barang` (`idBarang`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tbl_iuran_wajib`
--
ALTER TABLE `tbl_iuran_wajib`
  ADD CONSTRAINT `tbl_iuran_wajib_ibfk_1` FOREIGN KEY (`idPetugas`) REFERENCES `tbl_petugas` (`idPetugas`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_iuran_wajib_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `tbl_user` (`idUser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `tbl_riwayat_transaksi`
--
ALTER TABLE `tbl_riwayat_transaksi`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`idUser`) REFERENCES `tbl_user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_status_pengambilan`
--
ALTER TABLE `tbl_status_pengambilan`
  ADD CONSTRAINT `tbl_status_pengambilan_ibfk_1` FOREIGN KEY (`idPetugas`) REFERENCES `tbl_petugas` (`idPetugas`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_status_pengambilan_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `tbl_user` (`idUser`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
