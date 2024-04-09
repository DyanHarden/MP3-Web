-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2024 at 11:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techycomputer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(2) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admindian', 'kamikaze357'),
(2, 'adminchandra', 'c123');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(75) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `stok` varchar(20) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `vendor`, `stok`, `harga`) VALUES
('CP001', 'Intel Core i5 10400F', 'Intel', '30', '1.500.000'),
('CP002', 'Intel Core i5 11400F', 'Intel', '11', '1.200.000'),
('CP003', 'Intel Core i5 9400F', 'Intel', '7', '2.100.000'),
('CP004', 'Intel Core i3 10100F', 'Intel', '20', '990.000'),
('CP005', 'Intel Core i7 11700KF', 'Intel', '9', '4.200.000'),
('CP006', 'Ryzen 5 5600', 'AMD', '8', '1.400.000'),
('CP007', 'Ryzen 7 5800X', 'AMD', '14', '4.200.000'),
('CP008', 'Ryzen 3 4100', 'AMD', '25', '1.300.000'),
('CP009', 'Ryzen 9 5900X', 'AMD', '9', '5.600.000'),
('CP010', 'Intel Core i9 12900KF', 'Intel', '8', '6.500.000'),
('CP011', 'AMD Athlon 3000G', 'AMD', '20', '680.000'),
('GP001', 'VGA NVDIA ASUS GeForce RTX3060 12GB GDDR6', 'Asus', '15', '3.950.000'),
('GP002', 'VGA MSI GeForce RTX 4070 Ti SUPER GAMING SLIM 16GB GDDR6X', 'MSI', '20', '16.400.000'),
('GP003', 'VGA VURRION GTX 750Ti 4GB DDR5 128 BIT', 'Vurrion', '30', '1.225.000'),
('GP004', 'VGA MSI GTX 1650 4GB SUPER Ventus XS OC GDDR6 Gaming', 'MSI', '17', '1.950.000'),
('GP005', 'VGA ASUS ROG Strix GeForce RTX 4090 OC 24GB GDDR6X', 'Asus', '8', '37.700.000'),
('MB001', 'MB ASUS ROG STRIX Z690A GAMING WIFI D4 INTEL Z690 LGA1700', 'Asus', '10', '5.980.000'),
('MB002', 'MB ASUS ROG STRIX B450F GAMING II AMD AM4', 'Asus', '15', '1.910.000'),
('MB003', 'MB ASROCK H410MH DDR4 LGA1200', 'Asrock', '13', '865.000'),
('MB004', 'MSI Motherboard MAG B760M MORTAR II DDR5', 'MSI', '16', '3.185.000'),
('MB005', 'MB ASRock B760M Steel Legend WIFI DDR5 LGA 1700', 'Asrock', '17', '1.700.000'),
('PS001', 'PSU FSP HV PRO 550W 80 Bronze', 'FSP', '44', '687.000'),
('PS002', 'PSU Corsair RM Series 850W Full Modular 80 Plus Gold RM850', 'Corsair', '20', '1.900.000'),
('PS003', 'PSU Cooler Master 650 TUF 80 Masterwatt Gaming 650W', 'Asus', '34', '1.215.000'),
('PS004', 'PSU Asus TUF Gaming 550B 550 Watt 80 Bronze', 'Asus', '50', '990.000'),
('PS005', 'PSU KYO SAMA 650W 80 Bronze Modular BLACK', 'KYO', '19', '789.000'),
('RM001', 'RAM Kingston Fury RGB 16GB DDR4 3600Mhz', 'Kingston', '35', '1.100.000'),
('RM002', 'RAM HyperX Furry 16GB DDR4 3600Mhz', 'Kingston', '50', '1.425.000'),
('RM003', 'RAM Teamgroup Elite SODIM 8GB  DDR4 3200Mhz', 'Teamgroup', '37', '365.000'),
('RM004', 'RAM Teamgroup Elite SODIM 16GB DDR4 3200Mhz	', 'Teamgroup', '25', '760.000'),
('RM005', 'RAM T-Force Delta RGB DDR5 32GB (16GB x 2 ) PC 6000Mhz', 'Teamgroup', '20', '2.000.000');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(3) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `username_pelanggan` varchar(35) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `email`, `username_pelanggan`, `password_pelanggan`) VALUES
(1, 'Badrun', 'badrunanjay@gmail.com', 'badrunsaja', 'badrun123'),
(2, 'Rayhan', 'rayhanyo@yahoo.com', 'rayhanyo', 'rayhan123'),
(7, 'asdad', 'asda@gmail.com', 'loki', 'sadsad'),
(8, 'Irfan Lamuna', 'irfanlmn@gmail.com', 'irfanlamuna', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
