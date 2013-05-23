-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 22, 2013 at 07:05 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sikdes`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int(3) NOT NULL,
  `nama_anggota` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `password`, `alamat`, `telepon`) VALUES
(1, 'Agung Budianto', 'ccb7d2ec9061332503319e5ae97afde0', 'Mandungan RT 2  RW 1 No.35 Srimartani Piyungan Bantul Yogyakarta', '02741234123');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(3) NOT NULL DEFAULT '0',
  `nama_barang` varchar(30) NOT NULL,
  `jumlah_barang` varchar(3000) NOT NULL,
  `harga_jual` int(7) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jumlah_barang`, `harga_jual`) VALUES
(1, '22 Mei 2013', 'diumumukan untuk semua warga pada hari minggu tanggal 26 mei 2013 akan diadakan kerja bakti dimakam.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE IF NOT EXISTS `kasir` (
  `id_kasir` int(3) NOT NULL,
  `nama_kasir` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  PRIMARY KEY (`id_kasir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama_kasir`, `password`, `alamat`, `telepon`) VALUES
(123, 'Petugas', '202cb962ac59075b964b07152d234b70', 'Papringan', '087656367XXX');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE IF NOT EXISTS `pengurus` (
  `id_pengurus` int(3) NOT NULL,
  `id_anggota` int(3) NOT NULL,
  `nama_pengurus` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `alamat` varchar(3000) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  PRIMARY KEY (`id_pengurus`),
  KEY `id_anggota` (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `id_anggota`, `nama_pengurus`, `password`, `alamat`, `telepon`) VALUES
(2, 1, 'Agung Budianto', 'ccb7d2ec9061332503319e5ae97afde0', 'Mandungan RT 2  RW 1 No.35 Srimartani Piyungan Bantul Yogyakarta', '02741234123');

-- --------------------------------------------------------

--
-- Table structure for table `titip_barang`
--

CREATE TABLE IF NOT EXISTS `titip_barang` (
  `id_titipbarang` int(3) NOT NULL AUTO_INCREMENT,
  `id_pengurus` int(3) NOT NULL,
  `id_anggota` int(3) NOT NULL,
  `id_barang` int(3) NOT NULL,
  `jml_barang` int(2) NOT NULL,
  `tgl_titip` datetime NOT NULL,
  `harga_beli` int(7) NOT NULL,
  PRIMARY KEY (`id_titipbarang`),
  UNIQUE KEY `id_anggota` (`id_anggota`,`id_barang`),
  KEY `id_pengurus` (`id_pengurus`,`id_anggota`,`id_barang`),
  KEY `id_barang` (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `no` int(5) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(3) NOT NULL,
  `id_barang` int(3) NOT NULL,
  `id_kasir` int(3) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  PRIMARY KEY (`no`),
  KEY `id_barang` (`id_barang`,`id_kasir`),
  KEY `id_kasir` (`id_kasir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `pengurus_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `titip_barang`
--
ALTER TABLE `titip_barang`
  ADD CONSTRAINT `titip_barang_ibfk_1` FOREIGN KEY (`id_pengurus`) REFERENCES `pengurus` (`id_pengurus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `titip_barang_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `titip_barang_ibfk_3` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
