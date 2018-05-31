-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2018 at 11:51 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `posisi`, `timestamp`) VALUES
(1, 'pengadu', '', '2018-05-31 09:27:53'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `role`, `timestamp`) VALUES
(1, 'mahasiswa', '2018-05-31 09:28:43'),
(2, 'dosen', '2018-05-31 09:28:49'),
(3, 'karyawan', '2018-05-31 09:28:58'),
(4, 'admin', '2018-05-31 09:29:10'),
(5, 'manajemen', '2018-05-31 09:42:32');

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
-- Table structure for table `token`
--

CREATE TABLE IF NOT EXISTS `token` (
`id_token` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `expired` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id_token`, `token`, `id_user`, `created`, `expired`) VALUES
(1, '430c9660679cbc553e667d2170204de3', 2, '2018-05-31 06:36:00', '2018-05-31 15:36:00'),
(2, '4d6e6985045fde1ee73521a5ab1089ca', 2, '2018-05-31 07:15:00', '2018-05-31 16:15:00'),
(3, '4d6e6985045fde1ee73521a5ab1089ca', 2, '2018-05-31 07:15:00', '2018-05-31 16:15:00'),
(4, 'e815f70b6885fcc35cc6eb88a0b1bbd7', 2, '2018-05-31 07:24:00', '2018-05-31 16:24:00'),
(5, 'f39fc5ca396ff8d84fd70fb806f26107', 2, '2018-05-31 07:35:00', '2018-05-31 16:35:00'),
(6, '13b64d3b26f72025b0099e2b66e77fbf', 2, '2018-05-31 07:38:00', '2018-05-31 16:38:00'),
(7, '4a954617fd9013c03fbbefd40b977255', 2, '2018-05-31 07:40:00', '2018-05-31 16:40:00'),
(8, '16d90c66b79cc5b11a6fbce578e97b4e', 2, '2018-05-31 07:42:00', '2018-05-31 16:42:00'),
(9, 'a74db414e0eeede57b057ba98a6e2239', 1, '2018-05-31 08:02:00', '2018-05-31 17:02:00'),
(10, '33fd211b91a16a86c6aa2636ae759483', 1, '2018-05-31 08:06:00', '2018-05-31 17:06:00'),
(11, '3fc090ad7a6ecea1119e264ce8e46e03', 2, '2018-05-31 08:17:00', '2018-05-31 17:17:00'),
(12, '3fc090ad7a6ecea1119e264ce8e46e03', 2, '2018-05-31 08:17:00', '2018-05-31 17:17:00'),
(13, 'eefd4b92e0bc35d86c663bf83eda005f', 1, '2018-05-31 08:36:00', '2018-05-31 17:36:00'),
(14, 'f5de57e6cb0a49a904652c0b1777e240', 1, '2018-05-31 08:39:00', '2018-05-31 17:39:00'),
(15, '795b7477ec9c2cc79f863fe7bfd5133d', 1, '2018-05-31 08:41:00', '2018-05-31 17:41:00'),
(16, 'e0fb9f26da54e31bc8fd8f61a8b2bf6a', 1, '2018-05-31 09:32:00', '2018-05-31 18:32:00'),
(17, 'aa685dd1e934d83ba897da296d4cfd4d', 1, '2018-05-31 09:34:00', '2018-05-31 18:34:00'),
(18, '983d53ce9d034ec79cc2fafb50278530', 2, '2018-05-31 09:35:00', '2018-05-31 18:35:00'),
(19, '0111b2fc60eb276f94d95af5ff93027d', 2, '2018-05-31 09:40:00', '2018-05-31 18:40:00'),
(20, 'ce7382f1a1e7269f078e68bd814016bf', 2, '2018-05-31 09:41:00', '2018-05-31 18:41:00'),
(21, 'e6220342f2c1721461822e154dc5b0c6', 2, '2018-05-31 09:45:00', '2018-05-31 18:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_role` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(20) NOT NULL,
  `token` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_pengguna`, `email`, `password`, `status`, `id_level`, `id_role`, `deleted`, `timestamp`, `username`, `token`) VALUES
(1, 'admin', 'isnaini2012@gmail.com', '$2y$10$DLJu3obGwfv2zxe7hJC2qu5dCpyHvlPC02XcC2phIEZz1vJ4vBYh2', 1, 1, 4, 0, '2018-05-31 09:34:57', 'admin', NULL),
(2, 'isnaini', 'isnaini.barochatun@mail.ugm.ac.id', '$2y$10$o5CP81qeFMBiRaY0VQiQK.lBOSwlGHGd3UqDkKel06PGqJldUG.RG', 1, 1, 1, 0, '2018-05-31 09:46:27', '384475', NULL);

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
-- Indexes for table `token`
--
ALTER TABLE `token`
 ADD PRIMARY KEY (`id_token`);

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
MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
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
MODIFY `id_role` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
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
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
