-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2015 at 08:08 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sista`
--

-- --------------------------------------------------------

--
-- Table structure for table `registrasimhs`
--

CREATE TABLE IF NOT EXISTS `registrasimhs` (
  `username` int(30) NOT NULL,
  `transkrip` varchar(30) NOT NULL,
  `krs` varchar(30) NOT NULL,
  `spdp` varchar(30) NOT NULL,
  `ktm` varchar(30) NOT NULL,
  `tanggal` int(2) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `terverifikasi` int(1) NOT NULL,
  `dilihat` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrasimhs`
--

INSERT INTO `registrasimhs` (`username`, `transkrip`, `krs`, `spdp`, `ktm`, `tanggal`, `bulan`, `tahun`, `terverifikasi`, `dilihat`) VALUES
(1110963005, '1110963005.sql', '1110963005.txt', '1110963005.vpp', '1110963005.php', 19, 5, 2015, 0, '0'),
(1110962024, '1110962024.png', '1110962024.png', '1110962024.png', '1110962024.jpg', 27, 5, 2015, 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
