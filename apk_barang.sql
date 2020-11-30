-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 04:30 PM
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
(1, 'LAODE MUH ZULFARDIN SYAH, SPD', 'Laki-laki', '082393448980');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kodebarang` varchar(100) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
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

INSERT INTO `barang` (`id_barang`, `kodebarang`, `namabarang`, `merek`, `stok`, `stoksisa`, `tahun`, `gambar`, `jurusan`) VALUES
(1, 'TKJ001', 'TANG CRIMPING1', 'SAMSUNG', '2', '2', '30-11-2020', 'TKJ3020201541th126056271_3432705066776863_9121059982631675460_o.jpg', 'TKJ');

-- --------------------------------------------------------

--
-- Table structure for table `barangkeluar`
--

CREATE TABLE `barangkeluar` (
  `idbarangkeluar` int(11) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `peminjam` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangkeluar`
--

INSERT INTO `barangkeluar` (`idbarangkeluar`, `id_barang`, `jurusan`, `peminjam`, `jumlah`, `tanggal`, `status`) VALUES
(1, '1', 'TKJ', 'LAODE MUH ZULFARDIN SYAH, SPD', '1', '30-11-2020', '1');

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
(1, 1, 1, '', 'LAODE MUH ZULFARDIN SYAH, SPD', '1', '', '30-11-2020');

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
('1', 'admin', '66b65567cedbc743bda3417fb813b9ba', 'admin', 'Administrator', '19102020034247703d7b3637a6ce9ea9c3f6d20996ce0c.jpg'),
('2', 'tkj', '66b65567cedbc743bda3417fb813b9ba', 'Jurusan TKJ', 'TKJ', '19102020034247703d7b3637a6ce9ea9c3f6d20996ce0c.jpg'),
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
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
  MODIFY `idbarangkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `idbarangmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
