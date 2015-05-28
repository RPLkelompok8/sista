-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2015 at 12:03 PM
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
-- Table structure for table `jenis_user`
--

CREATE TABLE IF NOT EXISTS `jenis_user` (
  `id_jenis_user` int(2) NOT NULL,
  `jenis_user` varchar(15) NOT NULL,
  PRIMARY KEY (`id_jenis_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_user`
--

INSERT INTO `jenis_user` (`id_jenis_user`, `jenis_user`) VALUES
(1, 'admin'),
(2, 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_ta`
--

CREATE TABLE IF NOT EXISTS `kategori_ta` (
  `id_kategori` int(2) NOT NULL,
  `kategori` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_ta`
--

INSERT INTO `kategori_ta` (`id_kategori`, `kategori`) VALUES
(1, 'Enterprise Aplication'),
(2, 'Geographic Information System');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan_sidangta`
--

CREATE TABLE IF NOT EXISTS `permintaan_sidangta` (
  `id_mintasidang` int(5) NOT NULL,
  `username` int(30) NOT NULL,
  `tgl_mintasidang` int(2) NOT NULL,
  `bln_mintasidang` int(2) NOT NULL,
  `th_mintasidang` int(4) NOT NULL,
  `dapat_giliran` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan_sidangta`
--

INSERT INTO `permintaan_sidangta` (`id_mintasidang`, `username`, `tgl_mintasidang`, `bln_mintasidang`, `th_mintasidang`, `dapat_giliran`) VALUES
(1, 1110963006, 12, 5, 2015, 0);

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
(1110963005, '1110963005.sql', '1110963005.txt', '1110963005.vpp', '1110963005.php', 19, 5, 2015, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `sidangta`
--

CREATE TABLE IF NOT EXISTS `sidangta` (
  `id_sidang` int(5) NOT NULL,
  `tgl_sidang` int(2) NOT NULL,
  `bulan_sidang` int(2) NOT NULL,
  `tahun-sidang` int(4) NOT NULL,
  `jam_sidang` varchar(5) NOT NULL,
  `tempat_sidang` varchar(35) NOT NULL,
  `username` int(30) NOT NULL,
  PRIMARY KEY (`id_sidang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ta2`
--

CREATE TABLE IF NOT EXISTS `ta2` (
  `username` varchar(30) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `abstrak` varchar(10000) NOT NULL,
  `tanggal_posting` int(2) NOT NULL,
  `bulan_posting` int(2) NOT NULL,
  `tahun_posting` int(4) NOT NULL,
  `id_kategori` varchar(2) NOT NULL,
  `file_ta` varchar(30) NOT NULL,
  `bukti_seminar` varchar(30) NOT NULL,
  `bukti_sidang` varchar(30) NOT NULL,
  `ditampilkan` int(1) NOT NULL,
  `dilihat` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta2`
--

INSERT INTO `ta2` (`username`, `judul`, `abstrak`, `tanggal_posting`, `bulan_posting`, `tahun_posting`, `id_kategori`, `file_ta`, `bukti_seminar`, `bukti_sidang`, `ditampilkan`, `dilihat`) VALUES
('1110963006', 'SISTEM INFORMASI TUGAS AKHIR', 'sudah di update', 21, 5, 2015, '2', '1110963006.pdf', '1110963006.docx', '1110963006.pptx', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(30) NOT NULL,
  `name` varchar(25) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `id_jenis_user` int(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `berlaku` int(1) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `name`, `pass`, `id_jenis_user`, `email`, `berlaku`) VALUES
('1110963005', 'Ravky Dibura', '123', 2, 'ravky@gmail.com', 1),
('1110963006', 'Fandy Akbar Gusandi', '123', 2, 'fandya@yahoo.co.id', 1),
('admin', 'admin', 'admin', 1, '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
