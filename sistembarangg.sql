-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 02:38 AM
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
-- Database: `sistembarangg`
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
(12, 'Laode Muh ZulFardin Syah, S.Pd', 'laodefardin1', '6c991fe85d9fcaea917f71fbdc9e384e', 'Laki-laki', '082393448980', ''),
(14, 'Karmila, S.Pd', 'Karmila', '37b6b20c0e3c8739f3beb976114c9c63', 'Perempuan', '082337159123', ''),
(15, 'Aslan. S.Pd', 'aslan', '96de4eceb9a0c2b9b52c0b618819821b', 'Laki-laki', '085267863450', ''),
(16, 'SUHERMAN', 'suhe', '4892c15214d83bb664ed5380c6034cab', 'Laki-laki', '082393448981', ''),
(17, 'DARMAWANSAH', '1', '021c6cd3a69730ac97d0b65576a9004f', 'Laki-laki', '082393448980', '');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kodebarang` varchar(100) NOT NULL,
  `namabarang` varchar(100) NOT NULL,
  `kondisibarang` varchar(300) NOT NULL,
  `sumberdana` varchar(300) NOT NULL,
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

INSERT INTO `barang` (`id_barang`, `kodebarang`, `namabarang`, `kondisibarang`, `sumberdana`, `merek`, `stok`, `stoksisa`, `tahun`, `gambar`, `jurusan`) VALUES
(9, 'TKJ001', 'TANG CRIMPING', 'bagus', '', '-', '10', '5', '27-01-2021', 'WhatsApp Image 2021-03-12 at 3.57.07 PM.jpeg', 'TKJ'),
(11, 'TKJ002', 'Obeng Set', 'bagus', '', '-', '10', '10', '09-02-2021', 'TKJ0920211439th6c54fa3c359a7855c7b206d1660a511b.jpg', 'TKJ'),
(12, 'TKJ003', 'LAN Tester ', 'bagus', '', 'OEM', '20', '20', '03-02-2021', 'WhatsApp Image 2021-03-12 at 3.57.07 PM (1).jpeg', 'TKJ'),
(13, 'TKJ004', 'Tang Crimping 2 in 1', 'bagus', '', '-', '15', '15', '09-02-2021', 'TKJ0920211502th13836901_39dc9ddb-ce67-4e7d-9941-a04fa027a33f_1761_3689-e1488018392328-1024x489-400x191.jpg', 'TKJ'),
(14, 'TKJ005', 'Konektor RJ45 Cat 6 ', 'bagus', '', 'Belden ', '10', '10', '09-02-2021', 'TKJ0920211525th376802570cf6006fe019895923f991c8.jpg', 'TKJ'),
(15, 'TKJ006', 'Kabel BELDEN Kabel LAN UTP Cat6 Grey 305m', 'bagus', '', 'Belden ', '5', '5', '30-12-2020', 'WhatsApp Image 2021-03-12 at 3.57.06 PM.jpeg', 'TKJ'),
(16, 'TKJ007', 'Projector EB X 400 Proyektor 3300 Lumens', 'bagus', '', 'Epson', '2', '2', '09-02-2021', 'WhatsApp Image 2021-03-12 at 3.57.05 PM.jpeg', 'TKJ'),
(17, 'TKJ008', 'LAPTOP Lenovo Ideapad', 'bagus', '', 'Lenovo', '50', '45', '09-02-2021', 'WhatsApp Image 2021-03-12 at 3.57.05 PM (1).jpeg', 'TKJ'),
(18, 'TKJ009', 'Acer Intel Core i3', 'bagus', '', 'Acer', '20', '20', '04-02-2021', 'WhatsApp Image 2021-03-12 at 3.57.05 PM (2).jpeg', 'TKJ'),
(19, 'TKJ010', 'Switch 5 Port TPLINK ', 'bagus', '', 'TP-Link', '15', '15', '03-02-2021', 'WhatsApp Image 2021-03-12 at 3.57.04 PM.jpeg', 'TKJ'),
(20, 'TKJ011', 'D-Link 8-Port 10/100 Desktop Switch', 'Baik', '', 'D-Link', '5', '5', '', 'WhatsApp Image 2021-03-12 at 3.57.04 PM (1).jpeg', 'TKJ'),
(21, 'TKJ012', 'TP-LINK TL-WR840N WiFi Router ', 'bagus', '', 'TP-Link', '40', '40', '02-02-2021', 'TKJ0920211548thaf9cfa4c-6ca5-424d-bfcc-69c8b6df972f.jpg', 'TKJ'),
(23, 'TLAS001', 'Lemari alat', 'Baik', '', '', '2', '2', '10-03-2007', '1.jpg', 'TLAS'),
(24, 'TLAS002', 'Meja guru', 'Baik', '', '', '3', '3', '', '2.jpg', 'TLAS'),
(28, 'TLAS003', 'Meja praktek', 'Baik', '', '', '2', '2', '10-03-2006', 'TLAS1020211325thScreenshot_2.jpg', 'TLAS'),
(29, 'TLAS004', 'Mesin las TIG/GMAW', 'Baik', '', 'Multipro 300 G-KR', '1', '1', '10-03-2020', 'TLAS1020211326thScreenshot_3.jpg', 'TLAS'),
(30, 'TLAS005', 'Mesin Las SMAW', 'Baik', '', 'General BX1-300-2', '1', '1', '10-03-2013', 'TLAS1020211328thScreenshot_4.jpg', 'TLAS'),
(31, 'TLAS006', 'Mesin Las SMAW', 'Baik', '', 'Wipro', '1', '1', '10-03-2017', 'TLAS1020211329thScreenshot_5.jpg', 'TLAS'),
(32, 'TLAS007', 'Mesin las MIG-MAG', 'Baik', '', 'WIM MIG-MAG ES 273 Seri EN: 60974-1', '1', '1', '', 'TLAS1020211330thScreenshot_6.jpg', 'TLAS'),
(33, 'TLAS008', 'Mesin las Oksi Asetilen', 'Baik', '', '', '1', '1', '', 'TLAS1020211331thScreenshot_7.jpg', 'TLAS'),
(34, 'TLAS009', 'Mesin las karbit', 'Baik', '', 'Sumber Urip', '1', '1', '', 'TLAS1020211332thScreenshot_8.jpg', 'TLAS'),
(35, 'TLAS010', 'Brander pemotong 2014, 2015', 'Baik', '', 'Prohex, Aldo', '2', '2', '10-03-2014', 'TLAS1020211334thScreenshot_9.jpg', 'TLAS'),
(36, 'TLAS011', 'Ragum', 'Baik', '', 'Wipro, Selery', '12', '12', '', 'TLAS1020211335thScreenshot_10.jpg', 'TLAS'),
(37, 'TLAS012', 'Tool box Plat besi', 'Baik', '', 'Krisbow', '3', '3', '10-03-2010', 'TLAS1020211336thScreenshot_11.jpg', 'TLAS'),
(38, 'TPHP001', 'Wajan', 'Baik', '', '', '4', '4', '10-03-2010', 'WhatsApp Image 2021-03-18 at 10.08.43 PM (2).jpeg', 'TPHP'),
(39, 'TPHP002', 'Panci', 'Baik', '', '', '10', '10', '10-03-2010', 'TPHP1020211343thimages.jpg', 'TPHP'),
(40, 'TPHP003', 'Mangkok', 'Baik', '', '', '22', '22', '10-03-2010', 'WhatsApp Image 2021-03-18 at 10.08.43 PM.jpeg', 'TPHP'),
(41, 'TPHP004', 'Nampan', 'Baik', '', '', '9', '9', '10-03-2010', 'TPHP1020211345the17524f69de1ea20e98a6c0025e4a1ef.jpg', 'TPHP'),
(42, 'TLAS013', 'Kipas angin', 'Baik', '', 'Tornado Wall Fan', '1', '1', '11-03-2013', 'TLAS1120210413thScreenshot_2.jpg', 'TLAS'),
(43, 'TLAS014', 'Laptop', 'Baik', '', 'Acer', '1', '1', '11-03-2013', 'TLAS1120210416thScreenshot_3.jpg', 'TLAS'),
(44, 'TLAS015', 'Notebook', 'Baik', '', 'Acer', '1', '1', '11-03-2011', 'TLAS1120210417thScreenshot_4.jpg', 'TLAS'),
(45, 'TLAS016', 'Lemari dokumen', 'Baik', '', 'Krisbow', '1', '1', '11-03-2014', 'TLAS1120210419thScreenshot_5.jpg', 'TLAS'),
(46, 'TLAS017', 'Pemanas elektroda', 'Baik', '', 'Toyoda', '1', '1', '11-03-2016', 'TLAS1120210420thScreenshot_6.jpg', 'TLAS'),
(47, 'TLAS018', 'Alat pemotong besi plat', 'Baik', '', '', '1', '1', '', 'TLAS1120210422thScreenshot_7.jpg', 'TLAS'),
(48, 'TLAS019', 'Palu Konde', 'Baik', '', 'Tekiro, Krisbow', '3', '3', '11-03-2015', 'TLAS1120210426thScreenshot_8.jpg', 'TLAS'),
(49, 'TKJ013', 'Rotary Pengupas Kabel LAN Cutter Stripper Utp Punch Down Tool Modular', 'Baik', '', '', '10', '10', '', 'TKJ1220210906thWhatsApp Image 2021-03-12 at 3.57.06 PM (1).jpeg', 'TKJ'),
(50, 'TKJ014', 'LinkSys  WiFi Router', 'Baik', '', 'LinkSys', '3', '3', '', 'TKJ1220210910thWhatsApp Image 2021-03-12 at 3.57.03 PM.jpeg', 'TKJ'),
(51, 'TKJ015', 'Linksys RE1000 Wireless-N Range Extender', 'Baik', '', 'Linksys ', '4', '4', '', 'TKJ1220210911thWhatsApp Image 2021-03-12 at 3.57.03 PM (1).jpeg', 'TKJ'),
(52, 'TKJ016', 'Microtik Motherboard', 'Baik', '', 'Microtik ', '15', '15', '', 'TKJ1220210912thWhatsApp Image 2021-03-12 at 3.57.04 PM (2).jpeg', 'TKJ'),
(53, 'TKJ017', 'Portable 3g/4g Wireless N Router', 'Baik', '', 'TP-Link', '5', '5', '', 'TKJ1220210913thWhatsApp Image 2021-03-12 at 3.57.04 PM (3).jpeg', 'TKJ'),
(54, 'TKJ018', 'Portabel TPLink Wireless N Router', 'Baik', '', 'TPLink ', '5', '5', '', 'TKJ1220210914thWhatsApp Image 2021-03-12 at 3.57.04 PM (4).jpeg', 'TKJ'),
(55, 'TKJ019', 'Printer Canon ', 'Baik', '', 'Canon', '1', '1', '', 'TKJ1220210915thWhatsApp Image 2021-03-12 at 3.57.05 PM (3).jpeg', 'TKJ'),
(56, 'TKJ020', 'Komputer ', 'Baik', '', '', '7', '7', '', 'TKJ1220210915thWhatsApp Image 2021-03-12 at 3.57.05 PM (4).jpeg', 'TKJ'),
(57, 'TKJ021', 'Mouse Logitek', 'Baik', '', 'Logitek', '25', '25', '', 'TKJ1220210916thWhatsApp Image 2021-03-12 at 3.57.06 PM (2).jpeg', 'TKJ'),
(58, 'TBSM001', 'Tools set', 'Baik', '', '', '2', '2', '', 'TBSM1220210920thWhatsApp Image 2021-03-12 at 4.19.57 PM.jpeg', 'TBSM'),
(59, 'TBSM002', 'Compression Tester', 'Baik', '', 'Grip-On', '4', '4', '', 'TBSM1220210921thWhatsApp Image 2021-03-12 at 4.21.24 PM.jpeg', 'TBSM'),
(60, 'TBSM003', 'Impact', 'Baik', '', 'One', '2', '2', '', 'TBSM1220210922thWhatsApp Image 2021-03-12 at 4.22.03 PM.jpeg', 'TBSM'),
(61, 'TBSM004', 'Hand Tools Kunci Momen ', 'Baik', '', 'Tekiro', '3', '3', '', 'TBSM1220210923thWhatsApp Image 2021-03-12 at 4.22.57 PM.jpeg', 'TBSM'),
(62, 'TBSM005', 'Digital Multimeter UX 37 TR', 'Baik', '', 'Heles', '2', '2', '', 'TBSM1220210925thWhatsApp Image 2021-03-12 at 4.23.54 PM (1).jpeg', 'TBSM'),
(63, 'TBSM006', 'Mikrometer 25-50x0.01mm', 'Baik', '', '', '4', '4', '', 'TBSM1220210935thWhatsApp Image 2021-03-12 at 4.35.46 PM.jpeg', 'TBSM'),
(64, 'TBSM007', 'Mikrometer 75-100x0.01mm', 'Baik', '', '', '4', '4', '', 'TBSM1220210937thWhatsApp Image 2021-03-12 at 4.35.46 PM (1).jpeg', 'TBSM'),
(65, 'TBSM008', 'Digital Tachometer ', 'Baik', '', '', '3', '3', '', 'TBSM1220210939thWhatsApp Image 2021-03-12 at 4.38.01 PM.jpeg', 'TBSM'),
(66, 'TBSM009', 'Valve Spring Compressor', 'Baik', '', 'GarTech', '1', '1', '', 'TBSM1220210941thWhatsApp Image 2021-03-12 at 4.40.09 PM.jpeg', 'TBSM'),
(67, 'TBSM010', 'Oil Pressure Tester', 'Baik', '', 'GarTech', '1', '1', '', 'TBSM1220210942thWhatsApp Image 2021-03-12 at 4.42.03 PM.jpeg', 'TBSM'),
(68, 'TBSM011', 'Grip On', 'Baik', '', '', '1', '1', '', 'TBSM1220210943thWhatsApp Image 2021-03-12 at 4.43.03 PM.jpeg', 'TBSM'),
(69, 'TBSM012', 'Scan Tool', 'Baik', '', '', '2', '2', '', 'TBSM1220210945thWhatsApp Image 2021-03-12 at 4.45.05 PM.jpeg', 'TBSM'),
(70, 'TBSM013', 'Ragung', 'Baik', '', '', '3', '3', '', 'TBSM1220210946thWhatsApp Image 2021-03-12 at 4.45.43 PM.jpeg', 'TBSM'),
(71, 'TBSM014', 'Full Injection Sistem Trainer', 'Baik', '', '', '1', '1', '', 'TBSM1220210947thWhatsApp Image 2021-03-12 at 4.46.26 PM.jpeg', 'TBSM'),
(72, 'TBSM015', 'Compresor', 'Baik', '', '', '1', '1', '', 'TBSM1220210948thWhatsApp Image 2021-03-12 at 4.47.58 PM.jpeg', 'TBSM'),
(73, 'TBSM016', 'Engine Sepeda Motor 4 Tak On Stand (Non Live)', 'Baik', '', '', '1', '1', '', 'TBSM1220210949thWhatsApp Image 2021-03-12 at 4.48.41 PM.jpeg', 'TBSM'),
(74, 'TBSM017', 'Motor Mio', 'Baik', '', 'Yamaha', '1', '1', '', 'TBSM1220210950thWhatsApp Image 2021-03-12 at 4.50.13 PM.jpeg', 'TBSM'),
(75, 'TBSM018', 'Tool Box ', 'Baik', '', '', '2', '2', '', 'TBSM1220210951thWhatsApp Image 2021-03-12 at 4.50.48 PM.jpeg', 'TBSM'),
(76, 'TBSM019', 'Motorcycle Charging System Simulator', 'Baik', '', '', '1', '1', '', 'TBSM1220210952thWhatsApp Image 2021-03-12 at 4.51.56 PM.jpeg', 'TBSM'),
(77, 'TBSM020', 'Press Bass Elektrik', 'Baik', '', '', '1', '1', '', 'TBSM1220210953thWhatsApp Image 2021-03-12 at 4.53.33 PM.jpeg', 'TBSM'),
(78, 'TBSM021', 'Ux 78TR Multimeter', '', '', '', '7', '7', '', 'TBSM1220210959thWhatsApp Image 2021-03-12 at 4.58.51 PM.jpeg', 'TBSM'),
(79, 'TBSM022', 'Hand Tools Pressure Gauge', 'Baik', '', 'Tekiro', '3', '3', '', 'TBSM1220211000thWhatsApp Image 2021-03-12 at 4.59.34 PM.jpeg', 'TBSM'),
(80, 'TKR001', 'Trainer Toyota WT-i ', 'Baik', '', '', '1', '1', '', 'TKR1220211001thWhatsApp Image 2021-03-12 at 5.01.36 PM.jpeg', 'TKR'),
(81, 'TKR002', 'Trainer Bensin Motor Kijang 5k', 'Baik', '', '', '1', '1', '', 'TKR1220211002thWhatsApp Image 2021-03-12 at 5.02.38 PM.jpeg', 'TKR'),
(82, 'TKR003', 'Trainer Mesin Solar Isuzu Panther', 'Baik', '', '', '1', '1', '', 'TKR1220211003thWhatsApp Image 2021-03-12 at 5.03.33 PM.jpeg', 'TKR'),
(83, 'TKR004', 'Mobil Kijang 7k', 'Baik', '', '', '1', '1', '', 'TKR1220211004thWhatsApp Image 2021-03-12 at 5.04.30 PM.jpeg', 'TKR'),
(84, 'TKR005', 'Mobil Inova', 'Baik', '', '', '1', '1', '', 'TKR1220211005thWhatsApp Image 2021-03-12 at 5.05.17 PM.jpeg', 'TKR'),
(85, 'TKR006', 'Trainer Motor Stater Car Start-Charging System Test KIT-012', 'Baik', '', '', '2', '2', '', 'TKR1220211007thWhatsApp Image 2021-03-12 at 5.06.20 PM.jpeg', 'TKR'),
(86, 'TKR007', 'KIT-014 Charging System Test', 'Baik', '', '', '1', '1', '', 'TKR1220211008thWhatsApp Image 2021-03-12 at 5.07.43 PM.jpeg', 'TKR'),
(87, 'TKR008', 'Full Injection Fault Tester KIT-056', 'Baik', '', '', '1', '1', '', 'TKR1220211010thWhatsApp Image 2021-03-12 at 5.09.02 PM.jpeg', 'TKR'),
(88, 'TKR009', 'KIT-008 Automotive Sensor Measuring Test', 'Baik', '', '', '1', '1', '', 'TKR1220211011thWhatsApp Image 2021-03-12 at 5.10.44 PM.jpeg', 'TKR'),
(89, 'TKR010', 'KIT-009 Autormotive Elektric Circuit Test', 'Baik', '', '', '1', '1', '', 'TKR1220211012thWhatsApp Image 2021-03-12 at 5.11.36 PM.jpeg', 'TKR'),
(90, 'TKR011', 'CAS Aki', '', '', 'Krisbow', '1', '1', '', 'TKR1220211013thWhatsApp Image 2021-03-12 at 5.12.49 PM.jpeg', 'TKR'),
(91, 'TKR012', '5 Piece Tune-up Kit', 'Baik', '', 'Krisbow', '1', '1', '', 'TKR1220211014thWhatsApp Image 2021-03-12 at 5.14.03 PM.jpeg', 'TKR'),
(92, 'TKR013', 'Bulloks Automotive Diagnostic Tool', 'Baik', '', 'Bulloks', '1', '1', '12-10-2020', 'TKR1220211016thWhatsApp Image 2021-03-12 at 5.15.12 PM.jpeg', 'TKR'),
(93, 'TKR014', 'Tool Box ', 'Baik', '', '', '2', '2', '12-11-2019', 'TKR1220211017thWhatsApp Image 2021-03-12 at 5.17.02 PM.jpeg', 'TKR'),
(94, 'TKR015', 'Car A/C Recharge & Recovery Machine Model : ARM-280', 'Baik', '', '', '1', '1', '25-11-2020', 'TKR1220211019thWhatsApp Image 2021-03-12 at 5.18.07 PM.jpeg', 'TKR'),
(95, 'TAV001', 'Aktuator/Penyedot Timah', 'Baik', '', '', '25', '25', '', 'TAV1320211402thWhatsApp Image 2021-03-13 at 12.57.04 PM.jpeg', 'TAV'),
(96, 'TAV002', 'Obeng Plat', 'Baik', '', '', '20', '20', '', 'TAV1320211403thWhatsApp Image 2021-03-13 at 12.57.05 PM.jpeg', 'TAV'),
(97, 'TAV003', 'Obeng Bunga (+)', 'Baik', '', '', '25', '25', '', 'TAV1320211405thWhatsApp Image 2021-03-13 at 12.57.06 PM.jpeg', 'TAV'),
(98, 'TAV004', 'Solder', 'Baik', '', 'Tekiro', '26', '26', '', 'TAV1320211406thWhatsApp Image 2021-03-13 at 12.57.10 PM.jpeg', 'TAV'),
(99, 'TAV005', 'Timah Solder', 'Baik', '', '', '50', '50', '', 'TAV1320211408thWhatsApp Image 2021-03-13 at 12.57.15 PM.jpeg', 'TAV'),
(100, 'TAV006', 'Basic Electronik Trainer', 'Baik', '', '', '5', '5', '', 'TAV1320211538thWhatsApp Image 2021-03-13 at 1.36.56 PM.jpeg', 'TAV'),
(101, 'TAV007', 'Tang Lancip', 'Baik', '', '', '25', '25', '', 'TAV1320211538thWhatsApp Image 2021-03-13 at 12.57.13 PM.jpeg', 'TAV'),
(102, 'TAV008', 'Tang kombinasi', 'Baik', '', '', '25', '25', '', 'TAV1320211539thWhatsApp Image 2021-03-13 at 12.57.12 PM.jpeg', 'TAV'),
(103, 'TAV009', 'Tang Potong', 'Baik', '', '', '10', '10', '', 'TAV1320211541thWhatsApp Image 2021-03-13 at 12.57.15 PM (1).jpeg', 'TAV'),
(104, 'TAV010', 'Avometer', 'Baik', '', '', '25', '25', '', 'TAV1320211543thWhatsApp Image 2021-03-13 at 1.30.40 PM.jpeg', 'TAV'),
(105, 'TPHP005', 'Kulkas Pendingin', 'Baik', '', 'Sharp', '1', '1', '', 'TPHP1820211543thWhatsApp Image 2021-03-18 at 10.08.42 PM.jpeg', 'TPHP'),
(106, 'TPHP006', 'Kompor', 'Baik', '', 'Rinnai', '3', '3', '', 'TPHP1820211544thWhatsApp Image 2021-03-18 at 10.08.43 PM (1).jpeg', 'TPHP'),
(107, 'TPHP007', 'Ulekan', 'Baik', '', '', '3', '3', '', 'TPHP1820211548thWhatsApp Image 2021-03-18 at 10.08.43 PM (3).jpeg', 'TPHP'),
(108, 'TPHP008', 'Spatula', 'Baik', '', '', '5', '5', '', 'TPHP1820211549thWhatsApp Image 2021-03-18 at 10.08.42 PM (1).jpeg', 'TPHP'),
(109, 'TPHP009', 'Penjepit', 'Baik', '', '', '7', '7', '', 'TPHP1820211549thWhatsApp Image 2021-03-18 at 10.08.42 PM (2).jpeg', 'TPHP'),
(110, 'TPHP010', 'Ayakan tepung', 'Baik', '', '', '10', '10', '', 'TPHP1820211551thWhatsApp Image 2021-03-18 at 10.08.43 PM (4).jpeg', 'TPHP'),
(111, 'TPHP011', 'Mesin fermentasi roti', 'Baik', '', '', '1', '1', '', 'TPHP1920210123thWhatsApp Image 2021-03-18 at 10.53.19 PM.jpeg', 'TPHP'),
(112, 'TPHP012', 'Mixer', 'Baik', '', '', '1', '1', '', 'TPHP1920210123thWhatsApp Image 2021-03-18 at 10.53.46 PM.jpeg', 'TPHP'),
(113, 'TPHP013', 'Oven pengering', 'Baik', '', '', '1', '1', '', 'TPHP1920210124thWhatsApp Image 2021-03-18 at 10.54.12 PM.jpeg', 'TPHP'),
(114, 'TPHP014', 'Dispenser sirup or jus', 'Baik', '', '', '1', '1', '', 'TPHP1920210124thWhatsApp Image 2021-03-18 at 10.54.29 PM.jpeg', 'TPHP'),
(115, 'TPHP015', 'Kompor 4 mata', 'Baik', '', '', '1', '1', '', 'TPHP1920210130thWhatsApp Image 2021-03-19 at 8.25.18 AM.jpeg', 'TPHP'),
(116, 'TPHP016', 'Vaccum sealer', 'Baik', '', '', '1', '1', '', 'TPHP1920210131thWhatsApp Image 2021-03-19 at 8.25.48 AM.jpeg', 'TPHP'),
(117, 'TPHP017', 'Sealer manual', 'Baik', '', '', '1', '1', '', 'TPHP1920210131thWhatsApp Image 2021-03-19 at 8.25.48 AM (1).jpeg', 'TPHP'),
(118, 'TPHP018', 'Sealer', 'Baik', '', '', '1', '1', '', 'TPHP1920210131thWhatsApp Image 2021-03-19 at 8.25.48 AM (2).jpeg', 'TPHP');

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
(7, '9', 'TKJ', 16, 'a', 'ujian', '1', '23-03-2021', '1'),
(8, '17', 'TKJ', 15, 'as', 'as', '5', '25-03-2021', '0'),
(9, '9', 'TKJ', 12, 'z', 'a', '5', '26-03-2021', '2');

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

--
-- Dumping data for table `barangmasuk`
--

INSERT INTO `barangmasuk` (`idbarangmasuk`, `idbarangkeluar`, `id_barang`, `peminjam`, `jumlah`, `tanggal_kembali`) VALUES
(3, 7, 9, '16', '1', '23-03-2021');

-- --------------------------------------------------------

--
-- Table structure for table `datasekolah`
--

CREATE TABLE `datasekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `provinsi` text NOT NULL,
  `program` text NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datasekolah`
--

INSERT INTO `datasekolah` (`id_sekolah`, `nama_sekolah`, `provinsi`, `program`, `logo`) VALUES
(1, 'SMK Negeri 1 Papalang', 'PEMERINTAH PROVINSI SULAWESI BARAT <br> DINAS PENDIDIKAN DAN KEBUDAYAAN', 'PROGRAM KEAHLIAN: TEKNIK ELEKTRONIKA, TEKNIK MESIN,\r\n                    TEKNIK OTOMOTIF, TEKNIK KOMPUTER DAN INFORMATIKA, DAN AGRIBISNIS HASIL PERTANIAN, DESAIN PEMODELAN\r\n                    DAN INFORMASI BANGUNAN ', 'SMK-Papalang Transparan.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nama_kajur` varchar(100) NOT NULL,
  `nip_kajur` varchar(100) NOT NULL,
  `level` enum('Administrator','Jurusan') NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama_lengkap`, `nama_kajur`, `nip_kajur`, `level`, `gambar`) VALUES
(1, 'admin', '66b65567cedbc743bda3417fb813b9ba', 'Admin', '', '', 'Administrator', '1.jpg'),
(2, 'tkj', '66b65567cedbc743bda3417fb813b9ba', 'TKJ', 'Karmila', '', 'Jurusan', ''),
(3, 'tav', '66b65567cedbc743bda3417fb813b9ba', 'TAV', 'Kajur TAV', '', 'Jurusan', ''),
(4, 'tphp', '66b65567cedbc743bda3417fb813b9ba', 'TPHP', 'Kajur TPHP', '', 'Jurusan', ''),
(5, 'tbsm', '66b65567cedbc743bda3417fb813b9ba', 'TBSM', 'Kajur TBSM', '', 'Jurusan', ''),
(6, 'tkr', '66b65567cedbc743bda3417fb813b9ba', 'TKR', 'Kajur TKR', '', 'Jurusan', ''),
(7, 'dpip', '66b65567cedbc743bda3417fb813b9ba', 'DPIB', 'Kajur DPIB', '', 'Jurusan', ''),
(8, 'tlas', '66b65567cedbc743bda3417fb813b9ba', 'TLAS', 'Kajur TLAS', '', 'Jurusan', '');

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
-- Indexes for table `datasekolah`
--
ALTER TABLE `datasekolah`
  ADD PRIMARY KEY (`id_sekolah`);

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
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
  MODIFY `idbarangkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `idbarangmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `datasekolah`
--
ALTER TABLE `datasekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
