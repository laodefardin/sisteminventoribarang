-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2021 at 03:10 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistembarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `namalengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `namalengkap`, `username`, `password`, `gender`, `telp`, `gambar`) VALUES
(3, 'LAODE MUH ZULFARDIN SYAH, SPD', '1', '96de4eceb9a0c2b9b52c0b618819821b', 'Laki-laki', '082393448981', ''),
(4, 'SUHERMAN', '', '', 'Laki-laki', '082393448980', ''),
(5, 'fardin', '', '', 'Laki-laki', '082393448980', ''),
(6, 'ammank', '', '', 'Laki-laki', '082132312312', ''),
(7, 'rahmat', '', '', 'Laki-laki', '1238712831923', ''),
(8, 'Muh Fadhil Supriadi', '', '', 'Laki-laki', '082393448989', ''),
(9, 'Muh Fadhil Supriadi', '', '', 'Perempuan', '082393448987', ''),
(10, 'fardin', 'gom', '96de4eceb9a0c2b9b52c0b618819821b', 'Laki-laki', '08239393123', '06032021091709Ciri Pria Setia Dilihat Dari Bentuk Wajah.jpg');

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
(12, 'TKJ003', 'LAN Tester ', 'bagus', 'OEM', '40', '40', '03-02-2021', 'TKJ0920211500thoem_lan_tester_alat_cek_kabel_lan_pendeteksi_aliran_dan_jaringan_komputer_full01_is3ivbpj.jpg', 'TKJ'),
(13, 'TKJ004', 'Tang Crimping 2 in 1', 'bagus', '-', '30', '10', '09-02-2021', 'TKJ0920211502th13836901_39dc9ddb-ce67-4e7d-9941-a04fa027a33f_1761_3689-e1488018392328-1024x489-400x191.jpg', 'TKJ'),
(14, 'TKJ005', 'Konektor RJ45 Cat 6 ', 'bagus', 'Belden ', '30', '30', '09-02-2021', 'TKJ0920211525th376802570cf6006fe019895923f991c8.jpg', 'TKJ'),
(15, 'TKJ006', 'Kabel BELDEN Kabel LAN UTP Cat6 Grey 305m', 'bagus', 'Belden ', '5', '5', '30-12-2020', 'TKJ0920211528th1603792_f730718d-39ea-462a-8b80-7ae9a7547255_384_384.jpg', 'TKJ'),
(16, 'TKJ007', 'Projector EB X 400 Proyektor 3300 Lumens', 'bagus', 'Epson', '5', '5', '09-02-2021', 'TKJ0920211530thabcec85db2bf3cef98a183917217b306.jpg', 'TKJ'),
(17, 'TKJ008', 'LAPTOP Lenovo Ideapad', 'bagus', 'Lenovo', '50', '50', '09-02-2021', 'TKJ0920211537th60e8fa5e1e19bec588bc0f5a2fefa391.jpg', 'TKJ'),
(18, 'TKJ009', 'Acer Aspire 4741G Intel Core i5', 'bagus', 'Acer', '30', '10', '04-02-2021', 'TKJ0920211543thdata.jpg', 'TKJ'),
(19, 'TKJ010', 'Switch 5 Port TPLINK ', 'bagus', 'TP-Link', '40', '40', '03-02-2021', 'TKJ0920211545the06e04b8ea90a72a4c411e037ebd76ff.jpg', 'TKJ'),
(20, 'TKJ011', 'TP-LINK SWITCH HUB 24 PORT', 'bagus', 'TP-Link', '10', '10', '03-02-2021', 'TKJ0920211546th355812705_971f9554-5bf1-41d6-a11d-84d996b60edc_640_640.jpg', 'TKJ'),
(21, 'TKJ012', 'TP-LINK TL-WR840N WiFi Router ', 'bagus', 'TP-Link', '40', '40', '02-02-2021', 'TKJ0920211548thaf9cfa4c-6ca5-424d-bfcc-69c8b6df972f.jpg', 'TKJ'),
(22, 'TAV001', 'bag', 'Bagus', 'samsung', '90', '90', '06-03-2021', 'TAV0620211324thRobertson_screwdriver_set.jpg', 'TAV');

-- --------------------------------------------------------

--
-- Table structure for table `barangkeluar`
--

CREATE TABLE `barangkeluar` (
  `idbarangkeluar` int(11) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangkeluar`
--

INSERT INTO `barangkeluar` (`idbarangkeluar`, `id_barang`, `jurusan`, `id_anggota`, `keterangan`, `tujuan`, `jumlah`, `tanggal`, `status`) VALUES
(19, '13', 'TKJ', 10, 'qwe', 'qwe', '20', '06-03-2021', '2');

-- --------------------------------------------------------

--
-- Table structure for table `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `idbarangmasuk` int(11) NOT NULL,
  `idbarangkeluar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `peminjam` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `tanggal_kembali` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `level` enum('Administrator','Sapras','TKJ','TAV','TPHP','TBSM','TKR','TLAS','DPIB','GURU') NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama_lengkap`, `level`, `gambar`) VALUES
(1, 'admin', '66b65567cedbc743bda3417fb813b9ba', 'admin', 'Administrator', '1.jpg'),
(2, 'tkj', '66b65567cedbc743bda3417fb813b9ba', 'Jurusan TKJ', 'TKJ', '090220211549011429040069.jpg'),
(3, 'tav', '66b65567cedbc743bda3417fb813b9ba', 'Jurusan TAV', 'TAV', ''),
(4, 'tphp', '66b65567cedbc743bda3417fb813b9ba', 'Jurusan TPHP', 'TPHP', ''),
(5, 'tbsm', '66b65567cedbc743bda3417fb813b9ba', 'Jurusan TBSM', 'TBSM', ''),
(6, 'tkr', '66b65567cedbc743bda3417fb813b9ba', 'Jurusan TKR', 'TKR', ''),
(7, 'dpip', '66b65567cedbc743bda3417fb813b9ba', 'Jurusan DPIB', 'DPIB', ''),
(8, 'tlas', '66b65567cedbc743bda3417fb813b9ba', 'Jurusan TLAS', 'TLAS', '');

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
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
  MODIFY `idbarangkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `idbarangmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
