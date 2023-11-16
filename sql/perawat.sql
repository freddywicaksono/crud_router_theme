-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 16, 2023 at 01:11 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahsakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `perawat`
--

DROP TABLE IF EXISTS `perawat`;
CREATE TABLE IF NOT EXISTS `perawat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bagian` enum('pendaftaran','farmasi','poli','asisten dokter','gizi','rawat inap') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nip` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perawat`
--

INSERT INTO `perawat` (`id`, `nip`, `nama`, `bagian`) VALUES
(1, '1111', 'Siska Ernawati', 'farmasi'),
(4, '1332', 'Rahimah', 'poli'),
(6, '11167', 'Sonia', 'asisten dokter'),
(7, '55678', 'Siti', 'farmasi'),
(8, '4467', 'Tari', 'pendaftaran'),
(9, '22245', 'Rukayah', 'asisten dokter'),
(10, '55789', 'Sonja', 'pendaftaran'),
(11, '346789', 'Rahma', 'rawat inap'),
(12, '667788', 'Riska', 'pendaftaran');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
