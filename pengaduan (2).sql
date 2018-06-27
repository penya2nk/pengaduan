-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2018 at 08:10 AM
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
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'praktikum'),
(2, 'teori'),
(3, 'ekstra');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'sarpras'),
(2, 'dosen'),
(3, 'mata kuliah'),
(4, 'layanan informasi'),
(5, 'lingkungan');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
`id_level` int(11) NOT NULL,
  `nama_level` varchar(20) NOT NULL,
  `posisi` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `posisi`) VALUES
(1, 'anggota', ''),
(2, 'analis', ''),
(3, 'koordinator', 'lab'),
(4, 'koordinator', 'akademik');

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
  `penyebab` varchar(255) DEFAULT NULL,
  `efek` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tindaklanjut` varchar(255) DEFAULT NULL,
  `kejadian` enum('pertama','beberapa kali') DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_user`, `id_jenis`, `id_ruang`, `id_kategori`, `wkt_pengaduan`, `tgl_kejadian`, `penyebab`, `efek`, `deskripsi`, `tindaklanjut`, `kejadian`, `deleted`, `keterangan`) VALUES
(1, 1, 3, 13, 0, '2018-06-25 17:09:46', '2018-05-08', 'adanya orang tidak bertanggung jawab yang corat-coret di dalam toilet', 'tidak nyaman dilihat', '', NULL, 'pertama', 0, 'admin_1_1529946586.jpg'),
(2, 1, 2, 12, 0, '2018-06-25 17:13:45', '2018-06-04', 'karena dosen jarang datang', 'jadi banyak jam pengganti, dan susah mencari waktunya', '', NULL, 'beberapa kali', 0, NULL),
(3, 1, 1, 8, 0, '2018-06-25 17:17:37', '2018-06-05', 'karena software tidak update, komputer speknya tidak sesuai kebutuhan', 'harus pindah-pindah meja, kesulitan mau pakai aplikasi Android Studio', '', NULL, 'beberapa kali', 0, NULL),
(4, 1, 1, 6, 0, '2018-06-25 17:20:36', '2018-06-04', 'asprak telat datang ke kelas', 'kadang kunci dibawa sama asprak dan dosen juga harus menunggu lama kalau mau membuka kelas', '', NULL, 'beberapa kali', 0, NULL),
(5, 1, 2, 3, 0, '2018-06-25 17:22:06', '2018-06-06', '', 'tidak bisa presentasi', '', NULL, 'pertama', 0, NULL),
(6, 1, 1, 5, 0, '2018-06-26 23:34:32', '2018-06-04', 'mungkin rusak', 'harus pindah meja', '', NULL, 'beberapa kali', 0, 'admin_1_1530056071.jpg'),
(7, 3, 1, 17, 0, '2018-06-27 05:04:04', '2018-06-27', '', 'ddsdadada', '', NULL, 'beberapa kali', 0, NULL),
(8, 3, 2, 4, 0, '2018-06-27 05:04:33', '2018-06-27', '', 'dsasdadas', '', NULL, '', 0, NULL),
(9, 3, 3, 21, 0, '2018-06-27 05:13:02', '2018-06-27', '', 'jhhbh', '', NULL, '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan_level`
--

CREATE TABLE IF NOT EXISTS `pengaduan_level` (
`id_pengaduan_level` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('diproses','selesai','masuk') NOT NULL DEFAULT 'masuk',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pengaduan_level`
--

INSERT INTO `pengaduan_level` (`id_pengaduan_level`, `id_pengaduan`, `id_user`, `status`, `timestamp`) VALUES
(1, 1, 1, 'masuk', '2018-06-25 17:18:33'),
(2, 2, 1, 'masuk', '2018-06-25 17:13:45'),
(3, 3, 1, 'masuk', '2018-06-25 17:17:37'),
(4, 4, 1, 'masuk', '2018-06-25 17:20:36'),
(5, 5, 1, 'masuk', '2018-06-25 17:22:06'),
(6, 7, 3, 'masuk', '2018-06-27 05:04:04'),
(7, 8, 3, 'masuk', '2018-06-27 05:04:33'),
(8, 9, 3, 'masuk', '2018-06-27 05:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id_role` tinyint(4) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `role`) VALUES
(1, 'mahasiswa'),
(2, 'dosen'),
(3, 'karyawan'),
(4, 'admin'),
(5, 'kaprodi');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE IF NOT EXISTS `ruang` (
`id_ruang` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `nama_ruang` varchar(100) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `id_tempat`, `nama_ruang`, `deleted`) VALUES
(1, 1, 'Laboratorium RKE', 0),
(2, 1, 'Laboratorium RM', 0),
(3, 1, 'Laboratorium inovasi', 0),
(4, 1, 'Laboratorium koding', 0),
(5, 1, 'Laboratorium RPL 1', 0),
(6, 1, 'Laboratorium RPL 5', 0),
(7, 2, '204 A', 0),
(8, 2, '204 KH', 0),
(9, 2, '205 KH', 0),
(10, 2, '402', 0),
(11, 2, '412 A', 0),
(12, 2, '413 A', 0),
(13, 2, '410 B', 0),
(14, 2, 'DTS 103', 0),
(15, 2, 'DTS 104', 0),
(16, 3, 'Mushola SV', 0),
(17, 3, 'Mushola DTS', 0),
(18, 4, 'Toilet putra DTE', 0),
(19, 4, 'Toilet putri DTE', 0),
(20, 4, 'Toilet putra DTS', 0),
(21, 4, 'Toilet putri DTS', 0),
(22, 4, 'Toilet putra GP', 0),
(23, 4, 'Toilet putri GP', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE IF NOT EXISTS `tempat` (
`id_tempat` int(11) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`id_tempat`, `nama_tempat`, `deleted`) VALUES
(1, 'laboratorium', 0),
(2, 'kelas', 0),
(3, 'tempat ibadah', 0),
(4, 'toilet', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id_token`, `token`, `id_user`, `created`, `expired`) VALUES
(1, '70394585ea1d08cb6dc4246314cbf60f', 2, '2018-06-02 00:38:00', '2018-06-02 09:38:00'),
(2, '809de893e1dc2dc64845826e62cb2408', 2, '2018-06-02 07:19:00', '2018-06-02 16:19:00'),
(3, '5e37f884d1e368d35eba1645ce45e257', 1, '2018-06-06 04:00:00', '2018-06-06 13:00:00'),
(4, '45560fd1a8c6f1b8e25ca17f569974b4', 1, '2018-06-06 04:07:00', '2018-06-06 13:07:00'),
(5, 'c3fd29a921d40e41541dea6416305921', 2, '2018-06-25 01:09:00', '2018-06-25 10:09:00'),
(6, '0dd32395601bdb050f62495239ef45ea', 3, '2018-06-27 02:02:00', '2018-06-27 11:02:00'),
(7, '7e1eeba7e59811980325a55eddc2421a', 3, '2018-06-27 02:03:00', '2018-06-27 11:03:00'),
(8, 'a5fb44daecc6c0e33cfe7c243138bc4e', 2, '2018-06-27 02:03:00', '2018-06-27 11:03:00'),
(9, '36c0ce06602cba4994dbe9ac6e5f2d9c', 3, '2018-06-27 04:34:00', '2018-06-27 13:34:00'),
(10, '00304811ce4f2c7bcb6abe8cdda98ffe', 3, '2018-06-27 04:40:00', '2018-06-27 13:40:00'),
(11, '16438cab531cfe5832cd1b8533bb0cbd', 3, '2018-06-27 04:49:00', '2018-06-27 13:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_role` tinyint(4) NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_pengguna`, `email`, `password`, `status`, `id_level`, `id_role`, `deleted`, `timestamp`, `username`) VALUES
(1, 'admin', 'halodunia1980@gmail.com', '$2y$10$JT1F21208n4VciLNQhW6SO7UTvQ60DXK..xfT.hfmGNxOWrddqjEe', 1, 1, 4, 0, '2018-06-11 15:37:52', 'admin'),
(2, 'lorem ipsum', 'lorem.ipsum@mail.ugm.ac.id', '$2y$10$o5CP81qeFMBiRaY0VQiQK.lBOSwlGHGd3UqDkKel06PGqJldUG.RG', 1, 1, 1, 0, '2018-06-27 05:00:49', 'analis'),
(3, 'isnaini', 'isnaini2012@gmail.com', '$2y$10$pfId9GFNEtQqosJnj4RM5e1gS9hYkwBOX/Bo8bOQvu/hcO1vJBVp2', 1, 1, 1, 0, '2018-06-27 05:00:58', '384475'),
(4, 'abdurrahman', 'abdurrahman@gmail.com', '$2y$10$o5CP81qeFMBiRaY0VQiQK.lBOSwlGHGd3UqDkKel06PGqJldUG.RG', 1, 3, 3, 0, '2018-06-11 15:50:34', '12345'),
(5, 'aisyah', 'aisyah123@gmail.com', '$2y$10$bptw2HcQIAn1JQ79/67K1uIcaTqv95spdPQ/9qc3BOkicuzfIWtUy', 1, 4, 3, 0, '2018-06-06 05:47:51', '67890'),
(6, 'nurrahmah', 'yayan90@gmail.com', '$2y$10$ByvNaDeW2tUsN7V74SWlleO4SSedqgORJTQ9WFNlaElnYEq8ccjYu', 1, 1, 2, 0, '2018-06-10 14:24:03', '8832'),
(7, 'syarifah shofi', 'syarifahshofi@gmail.com', '$2y$10$epToi2s1nk9.fnt5uA7AO.ZTtZKI8CFyfMmNif/BfZSlLV970Ue7y', 1, 2, 0, 0, '2018-06-12 07:51:10', '8834'),
(8, 'syarifah shofi', 'syarifahshofi@gmail.com', '$2y$10$NAVrpql3PVjTVOJuhLIgLus8D6bO2JhaZw/foNeIr/7TxaX5W8Ota', 1, 2, 0, 0, '2018-06-12 07:59:52', '8834'),
(9, 'syarifah shofi', 'syarifahshofi@gmail.com', '$2y$10$9dZLOCi1QFXTzQ0pLLOYl.JnY4XEDkCY9uUnGD0i0w47HG/TkYPAu', 1, 2, 0, 0, '2018-06-12 08:02:51', '8834');

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
MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pengaduan_level`
--
ALTER TABLE `pengaduan_level`
MODIFY `id_pengaduan_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id_role` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tempat`
--
ALTER TABLE `tempat`
MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
