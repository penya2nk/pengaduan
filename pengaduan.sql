-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2018 at 05:44 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
`id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `timestamp`) VALUES
(1, 'praktikum', '2018-05-21 15:52:12'),
(2, 'teori', '2018-05-21 15:51:54'),
(3, 'ekstra', '2018-05-21 15:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `timestamp`) VALUES
(1, 'komputer', '2018-05-21 15:40:43'),
(2, 'AC', '2018-05-21 15:40:43'),
(3, 'dosen', '2018-05-25 04:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
`id_level` int(11) NOT NULL,
  `nama_level` varchar(100) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `posisi`, `timestamp`) VALUES
(1, 'user', '', '2018-05-21 15:27:45'),
(2, 'analis', '', '2018-05-21 15:27:45'),
(3, 'koordinator', 'sarpras', '2018-05-21 15:28:31'),
(4, 'koordinator', 'dosen', '2018-05-21 15:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE IF NOT EXISTS `pengaduan` (
`id_pengaduan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `wkt_pengaduan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_kejadian` date NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `penyebab` varchar(255) DEFAULT NULL,
  `efek` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `kejadian` enum('pertama','beberapa','tidak tau') NOT NULL,
  `status` enum('diterima','diproses','selesai') NOT NULL DEFAULT 'diterima',
  `update_by` int(11) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_user`, `id_jenis`, `id_kategori`, `id_ruang`, `wkt_pengaduan`, `tgl_kejadian`, `subjek`, `penyebab`, `efek`, `deskripsi`, `kejadian`, `status`, `update_by`, `update_at`, `deleted`) VALUES
(1, 1, 1, 1, 1, '2018-05-21 15:54:24', '2018-05-16', 'PC tidak bisa nyala', 'karena kabel di belakang monitor kendor', 'harus pindah ke meja lain', 'PC nomer 17 tiba-tiba tidak bisa dinyalakan', 'tidak tau', 'diproses', 0, '2018-05-25 04:59:03', 0),
(2, 2, 1, 3, 3, '2018-05-25 04:58:28', '2018-05-10', 'Pak xyz jarang dateng ngajar mata kuliah abc', NULL, 'jadi banyak pengganti terus susah cari jadwal gantinya', 'Pak xyz sering sekali mendadak tidak bisa ngajar, padahal ini sudah hampir UAS dan kelas C baru masuk 4 kali pertemuan', 'beberapa', 'diterima', 0, '2018-05-25 04:58:50', 0),
(3, 3, 2, 2, 4, '2018-05-25 12:28:08', '2018-05-13', 'AC kelas mati', NULL, 'kepanasan', 'AC kelas mati saat kuliah berlangsung dari pukul 13-14.40', 'tidak tau', 'diterima', 0, '2018-05-25 12:28:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan_kategori`
--

CREATE TABLE IF NOT EXISTS `pengaduan_kategori` (
`id_pengaduan_kategori` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan_level`
--

CREATE TABLE IF NOT EXISTS `pengaduan_level` (
`id_pengaduan_level` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `status` enum('diproses','selesai') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id_role` tinyint(4) NOT NULL,
  `role` varchar(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `role`, `timestamp`) VALUES
(1, 'mahasiswa', '2018-05-29 07:10:30'),
(2, 'dosen', '2018-05-29 07:10:30'),
(3, 'admin', '2018-05-29 07:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE IF NOT EXISTS `ruang` (
`id_ruang` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `nama_ruang` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `id_tempat`, `nama_ruang`) VALUES
(1, 1, 'Laboratorium RPL 1'),
(2, 1, 'Laboratorium Multimedia'),
(3, 2, 'HY U-202'),
(4, 2, 'HY S-201'),
(5, 3, 'mushola TEDI');

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE IF NOT EXISTS `tempat` (
`id_tempat` int(11) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`id_tempat`, `nama_tempat`) VALUES
(1, 'laboratorium'),
(2, 'kelas'),
(3, 'tempat ibadah');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_role` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_pengguna`, `password`, `status`, `id_level`, `id_role`, `deleted`, `timestamp`, `username`) VALUES
(1, 'analis', '$2y$10$fAYVE53h6HeQNVEmwoiuCuwJp2LypPC2P274GQ6n5CgDasaRDX7hK', 1, 1, 3, 0, '2018-05-29 08:59:45', 'admin'),
(2, 'tono', '$2y$10$fAYVE53h6HeQNVEmwoiuCuwJp2LypPC2P274GQ6n5CgDasaRDX7hK', 1, 1, 1, 0, '2018-05-29 13:02:02', '384475');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
 ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
 ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
 ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `pengaduan_kategori`
--
ALTER TABLE `pengaduan_kategori`
 ADD PRIMARY KEY (`id_pengaduan_kategori`);

--
-- Indexes for table `pengaduan_level`
--
ALTER TABLE `pengaduan_level`
 ADD PRIMARY KEY (`id_pengaduan_level`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
 ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
 ADD PRIMARY KEY (`id_tempat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengaduan_kategori`
--
ALTER TABLE `pengaduan_kategori`
MODIFY `id_pengaduan_kategori` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengaduan_level`
--
ALTER TABLE `pengaduan_level`
MODIFY `id_pengaduan_level` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id_role` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tempat`
--
ALTER TABLE `tempat`
MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
