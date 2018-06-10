-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2018 at 03:25 PM
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
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `timestamp`, `id_level`) VALUES
(1, 'sarpras', '2018-06-05 04:06:32', 3),
(2, 'dosen', '2018-06-05 04:06:36', 4),
(3, 'mata kuliah', '2018-06-05 04:06:40', 5),
(4, 'layanan informasi', '2018-06-05 04:06:44', 6);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
`id_level` int(11) NOT NULL,
  `nama_level` varchar(100) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `posisi`, `timestamp`) VALUES
(1, 'anggota', '', '2018-06-01 15:23:37'),
(2, 'analis', '', '2018-05-21 15:27:45'),
(3, 'koordinator', 'sarpras', '2018-05-21 15:28:31'),
(4, 'koordinator', 'dosen', '2018-05-21 15:28:31'),
(5, 'koordinator', 'akademik', '2018-06-05 03:55:45'),
(6, 'koordinator', 'humas', '2018-06-05 03:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE IF NOT EXISTS `pengaduan` (
`id_pengaduan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `wkt_pengaduan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_kejadian` date NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `penyebab` varchar(255) DEFAULT NULL,
  `efek` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `kejadian` enum('pertama','beberapa','tidak tau') NOT NULL,
  `saran` text,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_user`, `id_jenis`, `id_ruang`, `id_kategori`, `wkt_pengaduan`, `tgl_kejadian`, `subjek`, `penyebab`, `efek`, `deskripsi`, `kejadian`, `saran`, `update_at`, `deleted`) VALUES
(1, 2, 1, 8, 1, '2018-06-08 13:42:29', '2018-06-01', 'versi android udah out of date', 'versi android yang sudah out of date', 'tidak bisa maksimal dalam belajar', 'Di lab 3, versi androidnya sudah out of date. Ada masalah juga ketika di run di komputer lab jadi sangat lambat karena itu praktikum tidak berjalan efektif', '', 'tolong di upgrade android studionya', '2018-06-09 02:34:22', 0),
(2, 2, 1, 6, 2, '2018-06-08 14:08:48', '2018-05-09', 'dosen pengampu tidak sesuai dengan bidangnya', 'karena dosen mengampu matkul yang bukan bidangnya', 'materi matkul yang dibawakan jadi tidak jelas', 'matakuliah yang diberikan jadi tidak jelas karena dosen yang mengampu tidak sesuai dengan bidang matakuliah tersebut', '', 'sesuaikan antara dosen dengan matkulnya', '2018-06-09 02:34:30', 0),
(3, 2, 2, 12, 1, '2018-06-08 14:32:51', '2018-05-23', 'sarana prasarana di HY masih sangat kurang', 'sarana prasarana yang kurang', 'kepanasan, sulit untuk connect wifi', 'AC tidak bisa nyala dan Wifi di S-202 sangat lemot, membuat kondisi kelas jadi kurang kondusif', '', 'tolong diperbaiki sarana prasarananya untuk menunjang kegiatan pembelajaran', '2018-06-09 02:34:34', 0),
(4, 2, 1, 9, 1, '2018-06-08 14:44:14', '2018-05-08', 'komputer bermasalah', '', 'mahasiswa kekurangan komputer, harus bawa laptop sendiri', 'beberapa komputer di lab 2 sering bermasalah, sehingga mahasiswa harus menggunakan laptopnya sendiri untuk kegiatan praktikum', '', 'mohon segera diperbaiki', '2018-06-09 02:34:38', 0);

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
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('diproses','selesai','diterima') NOT NULL DEFAULT 'diterima',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pengaduan_level`
--

INSERT INTO `pengaduan_level` (`id_pengaduan_level`, `id_pengaduan`, `id_kategori`, `id_user`, `status`, `timestamp`) VALUES
(1, 1, 1, 2, 'diterima', '2018-06-08 13:42:29'),
(2, 2, 2, 2, 'diterima', '2018-06-08 14:08:48'),
(3, 3, 1, 2, 'diterima', '2018-06-08 14:32:51'),
(4, 4, 1, 2, 'diterima', '2018-06-08 14:44:14');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `id_tempat`, `nama_ruang`, `deleted`) VALUES
(1, 1, 'Laboratorium RPL 6', 0),
(2, 1, 'Laboratorium Multimedia', 0),
(3, 2, 'HY U-202', 0),
(4, 2, 'HY S-201', 0),
(5, 3, 'mushola TEDI', 0),
(6, 1, 'Laboratorium RPL 5', 0),
(7, 2, 'HY U-203', 0),
(8, 1, 'Laboratorium RPL 3', 0),
(9, 1, 'Laboratorium RPL 1', 0),
(10, 1, 'Laboratorium RPL 2', 0),
(11, 1, 'Laboratorium RPL 4', 0),
(12, 2, 'HY S-202', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id_token`, `token`, `id_user`, `created`, `expired`) VALUES
(1, '70394585ea1d08cb6dc4246314cbf60f', 2, '2018-06-02 00:38:00', '2018-06-02 09:38:00'),
(2, '809de893e1dc2dc64845826e62cb2408', 2, '2018-06-02 07:19:00', '2018-06-02 16:19:00'),
(3, '5e37f884d1e368d35eba1645ce45e257', 1, '2018-06-06 04:00:00', '2018-06-06 13:00:00'),
(4, '45560fd1a8c6f1b8e25ca17f569974b4', 1, '2018-06-06 04:07:00', '2018-06-06 13:07:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_pengguna`, `email`, `password`, `status`, `id_level`, `id_role`, `deleted`, `timestamp`, `username`, `token`) VALUES
(1, 'admin', 'halodunia1980@gmail.com', '$2y$10$CE9iI4DkRu1tkdugqEnCauksEyfgskmWZdYPK7C6rLxeR7z47L42u', 1, 1, 4, 0, '2018-06-06 05:47:36', 'admin', NULL),
(2, 'isnaini barochatun', 'isnaini.barochatun@mail.ugm.ac.id', '$2y$10$o5CP81qeFMBiRaY0VQiQK.lBOSwlGHGd3UqDkKel06PGqJldUG.RG', 1, 1, 1, 0, '2018-06-06 06:17:45', '384475', NULL),
(3, 'nitha', 'isnaini2012@gmail.com', '$2y$10$LpKP4K4HzuOu/E34XkFhy.Ae6nfJ9WpuMyrOvHa3ODnRejUVDybFe', 1, 2, 3, 0, '2018-06-01 07:26:21', 'analis', NULL),
(4, 'abdurrahman', 'abdurrahman@gmail.com', '$2y$10$1vLDXGG9H/QWEFTBaoSfjelJEPTmb3pV9C4gtpnyLjsqtwthOgwI2', 1, 3, 3, 0, '2018-06-06 05:47:26', '12345', NULL),
(5, 'aisyah', 'aisyah123@gmail.com', '$2y$10$bptw2HcQIAn1JQ79/67K1uIcaTqv95spdPQ/9qc3BOkicuzfIWtUy', 1, 4, 3, 0, '2018-06-06 05:47:51', '67890', NULL),
(6, 'nurrahmah', 'yayan90@gmail.com', '$2y$10$ByvNaDeW2tUsN7V74SWlleO4SSedqgORJTQ9WFNlaElnYEq8ccjYu', 1, 5, 3, 0, '2018-06-06 05:47:55', '8832', NULL);

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
MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
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
MODIFY `id_pengaduan_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id_role` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tempat`
--
ALTER TABLE `tempat`
MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
