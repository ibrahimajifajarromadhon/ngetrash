-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2023 pada 15.05
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
(11, 'Admin', 'admin@gmail.com', '$2y$10$bWXUyySPqsKaL7VV8UkjRu/LJ8V/xrPCKjFfck335kFe.XAgV58ta');

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
(46, '2023-12-04', 1, 10000, 1, 6, 14),
(47, '2023-12-07', 2, 30000, 2, 8, 14),
(48, '2023-12-11', 1, 7500, 3, 9, 14),
(49, '2023-12-11', 3, 45000, 2, 6, 14),
(50, '2023-12-11', 1, 15000, 2, 8, 14);

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
(49, '2023-12-10', 'Sudah Bayar', 'Tunai', 6, 14),
(50, '2023-12-10', 'Belum Bayar', 'Tunai', 9, 14),
(51, '2023-12-10', 'Sudah Bayar', 'Tunai', 10, 14),
(52, '2023-12-10', 'Sudah Bayar', 'Tunai', 8, 14);

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
(14, 'Ibrahim', 'ibrahim@gmail.com', '$2y$10$DaoWg8rvEAKHehaUIX3GIe5JQ1y4U2k.ZkXCLEiBaLp9cgvl5UZaq', 'Y'),
(15, 'Naufal', 'naufal@gmail.com', '$2y$10$4y/q2lSstXDE3InhxriIGOG7fYFp/PoMAiRbLMQfeLwSS50pAD/Y6', 'Y'),
(16, 'Iqbal', 'iqbal@gmail.com', '$2y$10$iqQKHnI3tlDJPGau.xivR.hwlSAYvxpCHehcyv14uMjp8pAE4dNo.', 'Y'),
(17, 'Samuel', 'samuel@gmail.com', '$2y$10$2SVR4JHVi314agCteZPnHONbqX.n1zdducswR2i74Y3WeIJc1JT2.', 'N'),
(18, 'Bambang', 'bambang@gmail.com', '$2y$10$73pwWOT/AtTm9cxJJQYgv.xxFsbVJICzr.gUrom9GC5r/dRoA/xtC', 'N');

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
(35, 6, 'masuk', 80000.00, 'Daur ulang', '2023-12-11 09:55:16'),
(37, 8, 'masuk', 60000.00, 'Daur ulang', '2023-12-11 09:56:17'),
(38, 9, 'masuk', 70000.00, 'Daur ulang', '2023-12-11 09:56:41'),
(39, 10, 'masuk', 75000.00, 'Daur ulang', '2023-12-11 09:57:07'),
(40, 6, 'masuk', 10000.00, 'Daur ulang', '2023-12-11 10:45:45'),
(41, 8, 'masuk', 30000.00, 'Daur ulang', '2023-12-11 10:46:03'),
(42, 9, 'masuk', 10000.00, 'Daur ulang', '2023-12-11 10:46:17'),
(43, 9, 'masuk', 7500.00, 'Daur ulang', '2023-12-11 10:46:28'),
(44, 6, 'masuk', 45000.00, 'Daur ulang', '2023-12-11 10:46:45'),
(45, 8, 'masuk', 15000.00, 'Daur ulang', '2023-12-11 10:47:13');

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
(21, 'Sudah Diambil', '2023-12-11', 6, 14),
(22, 'Belum Diambil', '2023-12-14', 6, 15),
(23, 'Belum Diambil', '2023-12-14', 10, 15),
(25, 'Belum Diambil', '2023-12-14', 8, 15),
(26, 'Belum Diambil', '2023-12-18', 8, 14);

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
(6, 'Alfian Iqbal Ramadhan', 'alfian@gmail.com', '$2y$10$vk9hFpWgCiC0BGJK9fmHeOb6hnaJSU/ygA6j.gtXH3lWILT9yyzDi', 'Magelang', 135000, 0, 135000, 'Y'),
(8, 'Naufal Rafif Wirasena', 'naufal@gmail.com', '$2y$10$VhlMn7EIqXwXUgkGMu7a.eUDBC6NQcO9tv5rspPNo1K9oXi5Wtxn6', 'Sleman', 105000, 0, 105000, 'Y'),
(9, 'Gatot Subroto', 'gatot@gmail.com', '$2y$10$iim/jl2OTqxX5cB95TAg.untVsANh1UkigccSoPP9UQq6x8m/iT9O', 'Sleman', 87500, 0, 87500, 'Y'),
(10, 'Fulan Al-Kazab', 'fulan@gmail.com', '$2y$10$Ns.59nHVOXP2tDMqXWi3VeAXoenS7uMm/NK6BGeDiNbf/rGXkXhPq', 'Sleman', 75000, 0, 75000, 'N');

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
  MODIFY `idAdmin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `idBarang` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_daur_ulang`
--
ALTER TABLE `tbl_daur_ulang`
  MODIFY `idDaur` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `tbl_iuran_wajib`
--
ALTER TABLE `tbl_iuran_wajib`
  MODIFY `idIuran` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `idPetugas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_riwayat_transaksi`
--
ALTER TABLE `tbl_riwayat_transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tbl_status_pengambilan`
--
ALTER TABLE `tbl_status_pengambilan`
  MODIFY `idStatus` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `idUser` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
