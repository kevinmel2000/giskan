-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2018 at 08:38 PM
-- Server version: 5.7.21-log
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giskan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_user`, `nama`, `harga`, `foto`, `keterangan`) VALUES
(1, 8, 'x9020', 9090, '1_x9020.jpg', 'x3030'),
(2, 9, 'Y0001', 1, '2_Y0001.jpg', 'Y0001');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'waiting',
  `jumlah` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `id_barang`, `status`, `jumlah`, `tanggal`) VALUES
(3, 4, 6, 'waiting', NULL, '2018-04-14 13:48:01'),
(4, 4, 6, 'waiting', NULL, '2018-04-14 13:48:10'),
(5, 4, 6, 'waiting', NULL, '2018-04-14 13:48:19'),
(6, 3, 6, 'waiting', 6, '2018-04-14 13:55:04'),
(7, 5, 6, 'waiting', 6, '2018-04-14 13:55:08'),
(8, 6, 6, 'waiting', 4, '2018-04-14 13:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '2',
  `nama` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT 'def.png',
  `alamat` varchar(255) DEFAULT NULL,
  `no_telefon` varchar(20) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role`, `nama`, `logo`, `alamat`, `no_telefon`, `latitude`, `longitude`) VALUES
(1, 'inop123', '63a9f0ea7bb98050796b649e85481845', '8', 2, '8', '8', '8', '8', '-0.9008417889908868', '100.47941207885744'),
(4, 'rasakmarsawa', '8e933201a769ead05cad04b3fad8adbb', 'rasakmarsawa@gmail.com', 2, 'yoga', '4_yoga.jpg', '1', '4', '', ''),
(6, 'kue', '640a3ae9a93298b2784ec762368c8a39', 'kue', 2, 'kue', '6_kue.jpg', '1', '1', '', ''),
(7, '1', 'c4ca4238a0b923820dcc509a6f75849b', '1', 2, '1', NULL, NULL, NULL, NULL, NULL),
(8, 'x9090', '258c077cdc0a3eca763e8063bb0cf094', 'x9090@gmail.com', 2, 'x9090', '8_x9090.jpg', '1', '1', '', ''),
(9, 'y9090', 'fcf6f005408451b38a784decaa326ffb', 'y9090@gmail.com', 2, 'y9090', '9_y9090.jpg', 'y9090', 'y9090', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
