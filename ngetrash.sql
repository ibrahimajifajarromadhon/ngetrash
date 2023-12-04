-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 04:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `idAdmin` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `userName` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`idAdmin`, `name`, `userName`, `password`) VALUES
(7, 'Admin', 'admin', '$2y$10$YCevMzNdlblbzfczKwDOIe15RMaTBJbPTG6MoRNpTO3AjiALDQCQ.'),
(8, 'ibrahim', 'ibrahim', '$2y$10$qL.mYFRaled86rnXRQvd.O1Tpn4e3gA2Mm0iyRvK2TKny5K.L3WN2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `idBarang` int(2) NOT NULL,
  `namaBarang` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`idBarang`, `namaBarang`, `harga`) VALUES
(2, 'Plastik', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daur_ulang`
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
-- Dumping data for table `tbl_daur_ulang`
--

INSERT INTO `tbl_daur_ulang` (`idDaur`, `tanggal`, `berat`, `total`, `idBarang`, `idUser`, `idPetugas`) VALUES
(2, '2023-11-01', 1, 0, 2, 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_iuran_wajib`
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
-- Dumping data for table `tbl_iuran_wajib`
--

INSERT INTO `tbl_iuran_wajib` (`idIuran`, `tanggal`, `status`, `jenisBayar`, `idUser`, `idPetugas`) VALUES
(2, '2023-11-01', 'Sudah Bayar', 'Non Tunai', 3, 8),
(5, '2023-11-01', 'Sudah Bayar', 'Tunai', 3, 6),
(9, '2023-11-01', 'Sudah Bayar', 'Tunai', 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `idPetugas` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `statusAktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`idPetugas`, `name`, `userName`, `password`, `statusAktif`) VALUES
(6, 'ibrahim', 'ibrahim', '$2y$10$fNqgExKyjWlrEUtRvBdXJuH6oSfornb/BPXb2zJHklgPAw.g4rmE6', 'N'),
(8, 'Admin', 'admin', '$2y$10$LrYZpr2pM4UwtxzOYhQUJe3wbJHL39Ml1308z2b3tgQSTO84liVRa', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_pengambilan`
--

CREATE TABLE `tbl_status_pengambilan` (
  `idStatus` int(2) NOT NULL,
  `keterangan` enum('Belum Diambil','Sudah Diambil') NOT NULL,
  `tanggal` date NOT NULL,
  `idUser` int(5) NOT NULL,
  `idPetugas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_status_pengambilan`
--

INSERT INTO `tbl_status_pengambilan` (`idStatus`, `keterangan`, `tanggal`, `idUser`, `idPetugas`) VALUES
(2, 'Belum Diambil', '2023-11-01', 3, 8),
(4, 'Sudah Diambil', '2023-11-01', 4, 6),
(9, 'Belum Diambil', '2023-11-01', 4, 8),
(10, 'Sudah Diambil', '2023-11-01', 3, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
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
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`idUser`, `name`, `userName`, `password`, `alamat`, `saldoMasuk`, `saldoKeluar`, `totalSaldo`, `statusAktif`) VALUES
(3, 'admin', 'admin', '$2y$10$YrZqe4ylM5ekDEoTkxvIbuAHRlR5gbcgyV/YUvVlXD2S0qOAKtZxO', 'jogja', 0, 0, 10000, 'Y'),
(4, 'Ibrahim', 'ibrahim', '$2y$10$9lGNXNAAXm5TD8NF7eUsweRpc9XwgKS75itx9eQ04XZjbDMhK0S/y', 'Klaten', 0, 0, 0, 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`idBarang`);

--
-- Indexes for table `tbl_daur_ulang`
--
ALTER TABLE `tbl_daur_ulang`
  ADD PRIMARY KEY (`idDaur`),
  ADD KEY `idBarang` (`idBarang`),
  ADD KEY `idPetugas` (`idPetugas`) USING BTREE,
  ADD KEY `idUser` (`idUser`) USING BTREE;

--
-- Indexes for table `tbl_iuran_wajib`
--
ALTER TABLE `tbl_iuran_wajib`
  ADD PRIMARY KEY (`idIuran`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idPetugas` (`idPetugas`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`idPetugas`);

--
-- Indexes for table `tbl_status_pengambilan`
--
ALTER TABLE `tbl_status_pengambilan`
  ADD PRIMARY KEY (`idStatus`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idPetugas` (`idPetugas`) USING BTREE;

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `idAdmin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `idBarang` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_daur_ulang`
--
ALTER TABLE `tbl_daur_ulang`
  MODIFY `idDaur` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_iuran_wajib`
--
ALTER TABLE `tbl_iuran_wajib`
  MODIFY `idIuran` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `idPetugas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_status_pengambilan`
--
ALTER TABLE `tbl_status_pengambilan`
  MODIFY `idStatus` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `idUser` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_daur_ulang`
--
ALTER TABLE `tbl_daur_ulang`
  ADD CONSTRAINT `tbl_daur_ulang_ibfk_1` FOREIGN KEY (`idPetugas`) REFERENCES `tbl_petugas` (`idPetugas`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_daur_ulang_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `tbl_user` (`idUser`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_daur_ulang_ibfk_3` FOREIGN KEY (`idBarang`) REFERENCES `tbl_barang` (`idBarang`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_iuran_wajib`
--
ALTER TABLE `tbl_iuran_wajib`
  ADD CONSTRAINT `tbl_iuran_wajib_ibfk_1` FOREIGN KEY (`idPetugas`) REFERENCES `tbl_petugas` (`idPetugas`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_iuran_wajib_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `tbl_user` (`idUser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_status_pengambilan`
--
ALTER TABLE `tbl_status_pengambilan`
  ADD CONSTRAINT `tbl_status_pengambilan_ibfk_1` FOREIGN KEY (`idPetugas`) REFERENCES `tbl_petugas` (`idPetugas`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_status_pengambilan_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `tbl_user` (`idUser`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
