-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 03:36 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apk_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `namalengkap`, `gender`, `telp`) VALUES
(3, 'LAODE MUH ZULFARDIN SYAH, SPD', 'Laki-laki', '082393448980'),
(4, 'SUHERMAN', 'Laki-laki', '082393448980');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kodebarang` varchar(100) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `kondisibarang` varchar(300) NOT NULL,
  `merek` varchar(100) NOT NULL,
  `stok` varchar(100) NOT NULL,
  `stoksisa` varchar(200) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kodebarang`, `namabarang`, `kondisibarang`, `merek`, `stok`, `stoksisa`, `tahun`, `gambar`, `jurusan`) VALUES
(9, 'TKJ001', 'TANG CRIMPING', 'bagus', '-', '60', '60', '27-01-2021', 'img3445-1562580603.jpg', 'TKJ'),
(11, 'TKJ002', 'Obeng Set', 'bagus', '-', '10', '10', '09-02-2021', 'TKJ0920211439th6c54fa3c359a7855c7b206d1660a511b.jpg', 'TKJ'),
(12, 'TKJ003', 'LAN Tester ', 'bagus', 'OEM', '40', '35', '03-02-2021', 'TKJ0920211500thoem_lan_tester_alat_cek_kabel_lan_pendeteksi_aliran_dan_jaringan_komputer_full01_is3ivbpj.jpg', 'TKJ'),
(13, 'TKJ004', 'Tang Crimping 2 in 1', 'bagus', '-', '30', '30', '09-02-2021', 'TKJ0920211502th13836901_39dc9ddb-ce67-4e7d-9941-a04fa027a33f_1761_3689-e1488018392328-1024x489-400x191.jpg', 'TKJ'),
(14, 'TKJ005', 'Konektor RJ45 Cat 6 ', 'bagus', 'Belden ', '30', '30', '09-02-2021', 'TKJ0920211525th376802570cf6006fe019895923f991c8.jpg', 'TKJ'),
(15, 'TKJ006', 'Kabel BELDEN Kabel LAN UTP Cat6 Grey 305m', 'bagus', 'Belden ', '5', '5', '30-12-2020', 'TKJ0920211528th1603792_f730718d-39ea-462a-8b80-7ae9a7547255_384_384.jpg', 'TKJ'),
(16, 'TKJ007', 'Projector EB X 400 Proyektor 3300 Lumens', 'bagus', 'Epson', '5', '5', '09-02-2021', 'TKJ0920211530thabcec85db2bf3cef98a183917217b306.jpg', 'TKJ'),
(17, 'TKJ008', 'LAPTOP Lenovo Ideapad', 'bagus', 'Lenovo', '50', '50', '09-02-2021', 'TKJ0920211537th60e8fa5e1e19bec588bc0f5a2fefa391.jpg', 'TKJ'),
(18, 'TKJ009', 'Acer Aspire 4741G Intel Core i5', 'bagus', 'Acer', '30', '30', '04-02-2021', 'TKJ0920211543thdata.jpg', 'TKJ'),
(19, 'TKJ010', 'Switch 5 Port TPLINK ', 'bagus', 'TP-Link', '40', '40', '03-02-2021', 'TKJ0920211545the06e04b8ea90a72a4c411e037ebd76ff.jpg', 'TKJ'),
(20, 'TKJ011', 'TP-LINK SWITCH HUB 24 PORT', 'bagus', 'TP-Link', '10', '10', '03-02-2021', 'TKJ0920211546th355812705_971f9554-5bf1-41d6-a11d-84d996b60edc_640_640.jpg', 'TKJ'),
(21, 'TKJ012', 'TP-LINK TL-WR840N WiFi Router ', 'bagus', 'TP-Link', '40', '40', '02-02-2021', 'TKJ0920211548thaf9cfa4c-6ca5-424d-bfcc-69c8b6df972f.jpg', 'TKJ');

-- --------------------------------------------------------

--
-- Table structure for table `barangkeluar`
--

CREATE TABLE `barangkeluar` (
  `idbarangkeluar` int(11) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `peminjam` varchar(100) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangkeluar`
--

INSERT INTO `barangkeluar` (`idbarangkeluar`, `id_barang`, `jurusan`, `peminjam`, `keterangan`, `jumlah`, `tanggal`, `status`) VALUES
(6, '9', 'TKJ', 'LAODE MUH ZULFARDIN SYAH, SPD', 'asd', '5', '02-02-2021', '1'),
(7, '9', 'TKJ', 'LAODE MUH ZULFARDIN SYAH, SPD', 'AS', '5', '04-02-2021', '1'),
(8, '12', 'TKJ', 'LAODE MUH ZULFARDIN SYAH, SPD', 'i', '5', '18-02-2021', '0');

-- --------------------------------------------------------

--
-- Table structure for table `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `idbarangmasuk` int(11) NOT NULL,
  `idbarangkeluar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `kodebarang` varchar(100) NOT NULL,
  `peminjam` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `tanggal_kembali` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangmasuk`
--

INSERT INTO `barangmasuk` (`idbarangmasuk`, `idbarangkeluar`, `id_barang`, `kodebarang`, `peminjam`, `jumlah`, `tanggal`, `tanggal_kembali`) VALUES
(2, 6, 9, '', 'LAODE MUH ZULFARDIN SYAH, SPD', '5', '', '02-02-2021'),
(3, 7, 9, '', 'LAODE MUH ZULFARDIN SYAH, SPD', '5', '', '04-02-2021');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` char(4) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `level` enum('Administrator','Sapras','TKJ','TAV','TPHP','TBSM','TKR','TLAS','DPIB') NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama_lengkap`, `level`, `gambar`) VALUES
('1', 'admin', '66b65567cedbc743bda3417fb813b9ba', 'admin', 'Administrator', '1.jpg'),
('2', 'tkj', '66b65567cedbc743bda3417fb813b9ba', 'Jurusan TKJ', 'TKJ', '090220211549011429040069.jpg'),
('3', 'tav', '66b65567cedbc743bda3417fb813b9ba', 'Jurusan TAV', 'TAV', '19102020034247703d7b3637a6ce9ea9c3f6d20996ce0c.jpg'),
('4', 'tphp', '66b65567cedbc743bda3417fb813b9ba', 'Jurusan TPHP', 'TPHP', '19102020034247703d7b3637a6ce9ea9c3f6d20996ce0c.jpg'),
('5', 'tbsm', '66b65567cedbc743bda3417fb813b9ba', 'Jurusan TBSM', 'TBSM', '19102020034247703d7b3637a6ce9ea9c3f6d20996ce0c.jpg'),
('6', 'tkr', '66b65567cedbc743bda3417fb813b9ba', 'Jurusan TKR', 'TKR', '19102020034247703d7b3637a6ce9ea9c3f6d20996ce0c.jpg'),
('7', 'dpip', '66b65567cedbc743bda3417fb813b9ba', 'Jurusan DPIB', 'DPIB', '19102020034247703d7b3637a6ce9ea9c3f6d20996ce0c.jpg'),
('8', 'tlas', '66b65567cedbc743bda3417fb813b9ba', 'Jurusan TLAS', 'TLAS', '19102020034247703d7b3637a6ce9ea9c3f6d20996ce0c.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
  ADD PRIMARY KEY (`idbarangkeluar`);

--
-- Indexes for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD PRIMARY KEY (`idbarangmasuk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
  MODIFY `idbarangkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `idbarangmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
