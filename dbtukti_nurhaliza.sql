-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 10:31 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtukti_nurhaliza`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_nurhaliza`
--

CREATE TABLE `daftar_nurhaliza` (
  `id_daftar` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `id_ukm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_nurhaliza`
--

INSERT INTO `daftar_nurhaliza` (`id_daftar`, `id_mhs`, `id_ukm`) VALUES
(1, 1, 1),
(3, 2, 1),
(5, 4, 2),
(7, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mhs_nurhaliza`
--

CREATE TABLE `mhs_nurhaliza` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mhs_nurhaliza`
--

INSERT INTO `mhs_nurhaliza` (`id_mhs`, `nim`, `nama`, `tanggal_lahir`, `alamat`) VALUES
(1, 'C030320129', 'Dea Ananda', '2003-08-03', 'Jl. Merdeka'),
(2, 'C030320144', 'Adinata', '2002-07-01', 'Jl. Belitung'),
(4, 'C030320192', 'Kila', '2002-08-14', 'Jl. Juana'),
(7, 'C030320122', 'Mahesa Adkhsan', '2001-06-06', 'Jl. Cendrawasih'),
(8, 'C030320012', 'Abimayu Jinendra', '2004-04-07', 'Jl. Jafri zam-zam'),
(9, 'C030320111', 'Gina Rahmadia', '2000-06-29', 'Jl. Pasir Mas');

-- --------------------------------------------------------

--
-- Table structure for table `ukm_nurhaliza`
--

CREATE TABLE `ukm_nurhaliza` (
  `id_ukm` int(11) NOT NULL,
  `nama_ukm` varchar(100) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukm_nurhaliza`
--

INSERT INTO `ukm_nurhaliza` (`id_ukm`, `nama_ukm`, `deskripsi`) VALUES
(1, 'Badminton', 'Ini adalah UKM Badminton'),
(2, 'Voli', 'Ini adalah UKM voli'),
(4, 'Basket', 'Ini adalah UKM Basket'),
(5, 'Futsal', 'Ini adalah UKM Futsal');

-- --------------------------------------------------------

--
-- Table structure for table `user_nurhaliza`
--

CREATE TABLE `user_nurhaliza` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_nurhaliza`
--

INSERT INTO `user_nurhaliza` (`id_user`, `username`, `password`, `nama`, `id_level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Nurhaliza', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_nurhaliza`
--
ALTER TABLE `daftar_nurhaliza`
  ADD PRIMARY KEY (`id_daftar`),
  ADD KEY `FK_daftar_nurhaliza_mhs_nurhaliza` (`id_mhs`),
  ADD KEY `FK_daftar_nurhaliza_ukm_nurhaliza` (`id_ukm`);

--
-- Indexes for table `mhs_nurhaliza`
--
ALTER TABLE `mhs_nurhaliza`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `ukm_nurhaliza`
--
ALTER TABLE `ukm_nurhaliza`
  ADD PRIMARY KEY (`id_ukm`);

--
-- Indexes for table `user_nurhaliza`
--
ALTER TABLE `user_nurhaliza`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_nurhaliza`
--
ALTER TABLE `daftar_nurhaliza`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mhs_nurhaliza`
--
ALTER TABLE `mhs_nurhaliza`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ukm_nurhaliza`
--
ALTER TABLE `ukm_nurhaliza`
  MODIFY `id_ukm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_nurhaliza`
--
ALTER TABLE `user_nurhaliza`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_nurhaliza`
--
ALTER TABLE `daftar_nurhaliza`
  ADD CONSTRAINT `FK_daftar_nurhaliza_mhs_nurhaliza` FOREIGN KEY (`id_mhs`) REFERENCES `mhs_nurhaliza` (`id_mhs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_daftar_nurhaliza_ukm_nurhaliza` FOREIGN KEY (`id_ukm`) REFERENCES `ukm_nurhaliza` (`id_ukm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
