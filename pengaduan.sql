-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2018 at 01:13 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `timestamp`) VALUES
(1, 'komputer', '2018-05-21 15:40:43'),
(2, 'AC', '2018-05-21 15:40:43'),
(3, 'dosen', '2018-05-25 04:55:36'),
(4, 'mata kuliah', '2018-06-02 22:07:35');

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
(1, 'anggota', '', '2018-06-01 15:23:37'),
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
  `id_level` int(11) NOT NULL DEFAULT '1',
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_user`, `id_jenis`, `id_kategori`, `id_ruang`, `wkt_pengaduan`, `tgl_kejadian`, `subjek`, `penyebab`, `efek`, `deskripsi`, `kejadian`, `status`, `id_level`, `update_at`, `deleted`) VALUES
(1, 1, 1, 1, 1, '2018-05-21 15:54:24', '2018-05-16', 'PC tidak bisa nyala', 'karena kabel di belakang monitor kendor', 'harus pindah ke meja lain', 'PC nomer 17 tiba-tiba tidak bisa dinyalakan', 'tidak tau', 'diproses', 3, '2018-06-02 22:54:19', 0),
(2, 2, 1, 3, 3, '2018-05-25 04:58:28', '2018-05-10', 'Pak xyz jarang dateng ngajar mata kuliah abc', NULL, 'jadi banyak pengganti terus susah cari jadwal gantinya', 'Pak xyz sering sekali mendadak tidak bisa ngajar, padahal ini sudah hampir UAS dan kelas C baru masuk 4 kali pertemuan', 'beberapa', 'selesai', 2, '2018-06-02 23:04:52', 0),
(3, 3, 2, 2, 4, '2018-05-25 12:28:08', '2018-05-13', 'AC kelas mati', NULL, 'kepanasan', 'AC kelas mati saat kuliah berlangsung dari pukul 13-14.40', 'tidak tau', 'diterima', 2, '2018-06-02 22:53:54', 0),
(4, 4, 2, 4, 4, '2018-05-22 17:00:00', '2018-05-23', 'kelas pengganti', 'ruangan penuh', 'harus cari jadwal baru', 'hari ini mau menngadakan kelas pengganti, karena ruangan penuh maka harus pindah hari lain, padahal sedang masa responsi', 'pertama', 'diterima', 2, '2018-06-02 22:53:59', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pengaduan_level`
--

INSERT INTO `pengaduan_level` (`id_pengaduan_level`, `id_pengaduan`, `id_level`, `status`, `timestamp`) VALUES
(1, 2, 3, 'diproses', '2018-06-02 07:45:28');

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
(5, 'kaprodi', '2018-06-01 13:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE IF NOT EXISTS `ruang` (
`id_ruang` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `nama_ruang` varchar(100) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `id_tempat`, `nama_ruang`, `deleted`) VALUES
(1, 1, 'Laboratorium RPL 6', 0),
(2, 1, 'Laboratorium Multimedia', 0),
(3, 2, 'HY U-202', 0),
(4, 2, 'HY S-201', 0),
(5, 3, 'mushola TEDI', 0),
(6, 1, 'Laboratorium RPL 5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE IF NOT EXISTS `tempat` (
`id_tempat` int(11) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`id_tempat`, `nama_tempat`, `deleted`) VALUES
(1, 'laboratorium', 0),
(2, 'kelas', 0),
(3, 'tempat ibadah', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id_token`, `token`, `id_user`, `created`, `expired`) VALUES
(1, '70394585ea1d08cb6dc4246314cbf60f', 2, '2018-06-02 00:38:00', '2018-06-02 09:38:00'),
(2, '809de893e1dc2dc64845826e62cb2408', 2, '2018-06-02 07:19:00', '2018-06-02 16:19:00');

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
(1, 'admin', 'flowerinepark1999@gmail.com', '$2y$10$7agjWwU6kEldzTgZSMD.SeUpHzIK.vLmfT84Okrco5/Q10Il.h62q', 1, 1, 4, 0, '2018-06-01 06:24:16', 'admin', NULL),
(2, 'isnaini barochatun', 'isnaini.barochatun@mail.ugm.ac.id', '$2y$10$o5CP81qeFMBiRaY0VQiQK.lBOSwlGHGd3UqDkKel06PGqJldUG.RG', 1, 1, 1, 0, '2018-06-01 06:27:03', '384475', NULL),
(3, 'nitha', 'isnaini2012@gmail.com', '$2y$10$LpKP4K4HzuOu/E34XkFhy.Ae6nfJ9WpuMyrOvHa3ODnRejUVDybFe', 1, 2, 3, 0, '2018-06-01 07:26:21', 'analis', NULL);

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
MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pengaduan_kategori`
--
ALTER TABLE `pengaduan_kategori`
MODIFY `id_pengaduan_kategori` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengaduan_level`
--
ALTER TABLE `pengaduan_level`
MODIFY `id_pengaduan_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id_role` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tempat`
--
ALTER TABLE `tempat`
MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
