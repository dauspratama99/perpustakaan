-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2018 at 05:37 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `nis` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jk` varchar(2) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`nis`, `nama`, `username`, `password`, `email`, `jk`, `ttl`, `kelas`, `image`) VALUES
('12150030', 'Arya Anugraha', 'arya03', 'e10adc3949ba59abbe56e057f20f883e', 'aryaanugrah05@gmail.com', 'L', '1997-02-03', '12.7A.11', 'elios3.jpg'),
('12150089', 'Galang', 'galang12', 'e10adc3949ba59abbe56e057f20f883e', 'galang12@gmail.com', 'L', '1996-07-18', '12.7A.11', 'galang1.jpg'),
('12150255', 'yerikho', 'yerikho123', 'e10adc3949ba59abbe56e057f20f883e', 'yerikho255@gmail.com', 'L', '1997-07-25', '12.7A.11', 'yerikho1.jpg'),
('12150297', 'Andre Ardiansyah', 'andre12', 'e10adc3949ba59abbe56e057f20f883e', 'andreardiansyah12@gmail.com', 'L', '1996-06-08', '12.7A.11', 'andre1.jpg'),
('12150341', 'Arya Anugraha', 'arya5345', '708574aadf1838a3c6bd6420bb70b4ae', 'aryaanugrah03@gmail.com', 'L', '2018-12-04', '12.7A.11', 'hatsune_miku1.jpg'),
('12150344', 'Sarah Ayu', 'sarah123', 'e10adc3949ba59abbe56e057f20f883e', 'sarahayu123@gmail.com', 'P', '1998-08-10', '12.7A.11', 'anime2.jpg'),
('12150414', 'faizal hidayat', 'faizal12', 'e10adc3949ba59abbe56e057f20f883e', 'faizalhidayat89@gmail.com', 'L', '1997-04-12', '12.7A.11', 'anime_boy1.jpg'),
('12150612', 'dewi ayu', 'ayu123', 'e10adc3949ba59abbe56e057f20f883e', 'dewiayu18@gmail.com', 'P', '2018-12-04', '12.7A.11', 'elios1.jpg'),
('12150909', 'ayu dewi', 'ayudewi12', 'e10adc3949ba59abbe56e057f20f883e', 'ayu13@gmail.com', 'P', '1998-09-04', '12.7A.11', 'hana_haru10.jpg'),
('12150919', 'kenzo', 'kenzo123', 'e10adc3949ba59abbe56e057f20f883e', 'kenzo123@gmail.com', 'L', '1996-06-08', '12.7A.11', 'anime_boy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kode_buku` varchar(5) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `pengarang` varchar(50) DEFAULT NULL,
  `klasifikasi` varchar(255) DEFAULT NULL,
  `detail` varchar(255) NOT NULL,
  `stok` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul`, `pengarang`, `klasifikasi`, `detail`, `stok`, `image`) VALUES
('0001', '101+ Pengetahuan Bikin Kamu Mahir IT', 'Feri Sulianta', '<p>Tersedia</p>', '', '10', '109234_f1.jpg'),
('0002', '12 Jurus Edit Foto Digital dengan Photoshop CC 2018', 'Jubilee Enterprise', '<p>Belum Tersedia</p>', '', '7', '108972_f1.jpg'),
('0003', 'Jurus Rahasia Menguasai Pemrograman Android', 'Muhammad Nurhidayat', '<p>Tersedia</p>', '', '5', '107227_f1.jpg'),
('0004', 'Coding Mudah dengan CodeIgniter, JQuery, Bootstrap, dan Datatable', 'Heru Sulistiono, S.Kom., M.Kom.', '<p>Tersedia</p>', '', '3', '107984_f1.jpg'),
('0005', 'Pemrograman Berorientasi Objek Menggunakan C#', 'Adi Nugroho', '<p>Tersedia</p>', '', '4', '106703_f1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_transaksi` varchar(12) DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `denda` varchar(2) DEFAULT NULL,
  `nominal` double DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_transaksi`, `tgl_pengembalian`, `denda`, `nominal`, `id_petugas`) VALUES
('KN7002', '2018-10-27', 'Y', 3000, NULL),
('KN7002', '2018-10-27', 'Y', 3000, NULL),
('KN7003', '2018-10-27', 'N', 0, NULL),
('KN7003', '2018-10-27', 'N', 0, NULL),
('20181027001', '2018-10-27', 'Y', 2000, NULL),
('20181027001', '2018-10-27', 'Y', 2000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `user` varchar(45) DEFAULT NULL,
  `password` text,
  `level` enum('administrator','petugas') NOT NULL,
  `email` varchar(50) NOT NULL,
  `jk` varchar(45) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `user`, `password`, `level`, `email`, `jk`, `image`) VALUES
(1, 'admin12', 'e10adc3949ba59abbe56e057f20f883e', 'administrator', 'admin@gmail.com', 'L', 'Image_29ac1d12.jpg'),
(2, 'faizal', 'e10adc3949ba59abbe56e057f20f883e', 'petugas', 'faizalhidayat89@gmail.com', 'L', '12088203_925831040816177_4079100194873101678_n21.jpg'),
(3, 'arya12', 'e10adc3949ba59abbe56e057f20f883e', 'petugas', 'aryaanugrah03@gmail.com', 'L', 'aoi1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tmp`
--

CREATE TABLE `tmp` (
  `kode_buku` varchar(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(12) DEFAULT NULL,
  `nis` varchar(10) DEFAULT NULL,
  `kode_buku` varchar(5) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nis`, `kode_buku`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `id_petugas`) VALUES
('20181027001', '12150419', '0001', '2018-10-27', '2018-10-29', 'Y', 3),
('KN7002', '12150089', '0001', '2018-10-27', '2018-11-03', 'Y', NULL),
('KN7003', '12150297', '0002', '2018-10-27', '2018-11-03', 'Y', NULL),
('KN7004', '12150089', '0001', '2018-10-27', '2018-11-03', 'N', NULL),
('KN7005', '12150255', '0001', '2018-10-27', '2018-11-03', 'N', NULL),
('KN7006', '12150255', '0005', '2018-10-30', '2018-11-06', 'N', NULL),
('KN7007', '12150255', '0004', '2018-10-30', '2018-11-06', 'N', NULL),
('KN7008', '12150255', '0002', '2018-11-23', '2018-11-30', 'N', NULL),
('KN7009', '12150030', '0002', '2018-11-30', '2018-12-07', 'N', NULL),
('KN7010', '12150030', '0001', '2018-12-07', '2018-12-14', 'N', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
