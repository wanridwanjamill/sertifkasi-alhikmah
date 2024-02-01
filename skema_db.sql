-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 05:05 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skema_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `kd_skema` varchar(10) DEFAULT NULL,
  `nm_peserta` varchar(50) DEFAULT NULL,
  `jekel` varchar(10) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `kd_skema`, `nm_peserta`, `jekel`, `alamat`, `no_hp`) VALUES
(5, 'SKM-001', 'dzaki', 'Laki-laki', 'abc', '08121219231'),
(6, 'SKM-001', 'amung', 'Laki-laki', 'abc', '123'),
(7, 'SKM-003', 'rizal', 'Laki-laki', 'azxc', '082120'),
(9, 'SKM-001', 'niki', 'Laki-laki', '123', '123'),
(10, 'SKM-001', 'jamil', 'Laki-laki', 'majalaya', '123'),
(11, 'SKM-001', 'martin', 'Laki-laki', '132', '1231132');

-- --------------------------------------------------------

--
-- Table structure for table `skema_pendidikan`
--

CREATE TABLE `skema_pendidikan` (
  `kd_skema` varchar(10) NOT NULL,
  `nm_skema` varchar(50) DEFAULT NULL,
  `jenis` varchar(10) DEFAULT NULL,
  `jml_unit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skema_pendidikan`
--

INSERT INTO `skema_pendidikan` (`kd_skema`, `nm_skema`, `jenis`, `jml_unit`) VALUES
('SKM-001', 'junior web developer', 'KKNI', 6),
('SKM-002', 'digital marketing', 'Klaster', 10),
('SKM-003', 'desainer multimedia muda', 'KKNI', 10),
('SKM-004', 'network administrator muda', 'KKNI', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `skema_pendidikan`
--
ALTER TABLE `skema_pendidikan`
  ADD PRIMARY KEY (`kd_skema`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
