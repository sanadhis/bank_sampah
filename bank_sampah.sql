-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2015 at 05:46 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bank_sampah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `harga_barang`
--

CREATE TABLE IF NOT EXISTS `harga_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(20) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `harga_barang`
--

INSERT INTO `harga_barang` (`id`, `nama_barang`, `harga_barang`) VALUES
(1, 'kertas', 1500),
(2, 'plastik', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE IF NOT EXISTS `nasabah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `blok` varchar(20) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `saldo` float NOT NULL,
  `saldo_awal` float NOT NULL,
  `role` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id`, `nama`, `alamat`, `rt`, `rw`, `blok`, `tanggal_terdaftar`, `saldo`, `saldo_awal`, `role`, `password`) VALUES
(31, 'Farid', 'Prasajda', 1, 1, 'Majalengka', '2014-11-17', 10000, 10000, 'nasabah', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_user` int(11) NOT NULL,
  `tanggal` text NOT NULL,
  `id_harga_barang` varchar(100) NOT NULL,
  `item` text NOT NULL,
  `berat` varchar(100) NOT NULL,
  `jumlah` float NOT NULL,
  `saldo` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `no_user`, `tanggal`, `id_harga_barang`, `item`, `berat`, `jumlah`, `saldo`) VALUES
(63, 31, '2014-11-17', '-', 'setoran awal', '-', 10000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `password`) VALUES
(12, 'Bondan', 'admin', '', 'acaa3b2723e9789e72d81321b8328e76');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
