-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2018 at 04:39 PM
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
  `nama_jenis` varchar(50) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `deleted`) VALUES
(1, 'praktikum', 0),
(2, 'teori', 0),
(3, 'ekstra', 1),
(4, 'ekstra', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `deleted`) VALUES
(1, 'sarpras', 0),
(2, 'dosen', 0),
(3, 'mata kuliah', 0),
(4, 'layanan informasi', 0),
(5, 'lingkungan', 0),
(6, 'toiletg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
`id_level` int(11) NOT NULL,
  `nama_level` varchar(20) NOT NULL,
  `posisi` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`, `posisi`) VALUES
(1, 'anggota', ''),
(2, 'analis', ''),
(3, 'koordinator', 'lab'),
(4, 'koordinator', 'akademik'),
(5, 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
`id_log` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('masuk','diproses','selesai') NOT NULL DEFAULT 'masuk',
  `keterangan` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `id_pengaduan`, `id_user`, `status`, `keterangan`, `timestamp`) VALUES
(1, 1, 4, 'masuk', NULL, '2018-07-03 18:41:42'),
(2, 2, 4, 'masuk', NULL, '2018-07-03 18:42:42'),
(3, 2, 3, 'diproses', 'butuh beli peralatan baru', '2018-07-03 18:44:41'),
(4, 3, 3, 'masuk', NULL, '2018-07-03 18:46:19'),
(5, 4, 2, 'masuk', NULL, '2018-07-03 18:47:33'),
(6, 3, 11, 'selesai', NULL, '2018-07-03 18:48:51'),
(7, 5, 2, 'masuk', NULL, '2018-07-03 23:32:13'),
(8, 6, 2, 'masuk', NULL, '2018-07-03 23:35:18'),
(9, 7, 9, 'masuk', NULL, '2018-07-03 23:41:36'),
(10, 8, 9, 'masuk', NULL, '2018-07-03 23:44:33'),
(11, 1, 9, 'diproses', 'butuh dana untuk mengundang tukang servis', '2018-07-03 23:56:18'),
(12, 9, 11, 'masuk', NULL, '2018-07-04 01:54:25'),
(13, 10, 11, 'masuk', NULL, '2018-07-04 01:56:33'),
(14, 9, 6, 'masuk', NULL, '2018-07-04 09:05:24'),
(15, 10, 6, 'masuk', NULL, '2018-07-04 09:06:22'),
(16, 10, 11, 'diproses', 'ga tau', '2018-07-04 09:10:42'),
(17, 4, 11, 'selesai', NULL, '2018-07-04 09:10:51'),
(18, 9, 11, 'selesai', NULL, '2018-07-04 09:11:56'),
(19, 10, 2, 'selesai', NULL, '2018-07-04 09:15:00'),
(20, 11, 3, 'masuk', NULL, '2018-07-04 12:56:43'),
(21, 11, 3, 'selesai', NULL, '2018-07-04 14:38:30');

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
  `gambar` varchar(255) DEFAULT NULL,
  `status` enum('masuk','diproses','selesai') NOT NULL DEFAULT 'masuk',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_user`, `id_jenis`, `id_ruang`, `id_kategori`, `wkt_pengaduan`, `tgl_kejadian`, `penyebab`, `efek`, `deskripsi`, `tindaklanjut`, `kejadian`, `deleted`, `gambar`, `status`, `timestamp`) VALUES
(1, 4, 1, 3, 1, '2018-07-03 18:41:42', '2018-07-03', 'tidak tersedianya sarana yang memadahi', 'sdasdaa', 'daddas', 'dsdsds', 'beberapa kali', 0, NULL, 'diproses', '2018-07-03 23:56:18'),
(2, 4, 3, 19, 5, '2018-07-03 18:42:42', '2018-06-20', 'tidak bersih', 'terpeleset', 'czxcxzccxcxccsAS', '', 'beberapa kali', 0, NULL, 'diproses', '2018-07-03 18:44:41'),
(3, 3, 3, 17, 5, '2018-07-03 18:46:19', '2018-05-15', 'ada pencuri', 'pulang tanpa sepatu', 'dhddhdhqwerrttyuaoapaa', 'dssaff', 'pertama', 0, NULL, 'selesai', '2018-07-03 18:48:51'),
(4, 2, 2, 10, 4, '2018-07-03 18:47:33', '2018-07-03', 'telat memberitahu kalau kelas jadinya kosong', 'fdfdsfsfdsf', 'fsfffsff', '', 'beberapa kali', 0, NULL, 'selesai', '2018-07-04 09:10:52'),
(5, 2, 1, 1, 3, '2018-07-03 23:32:13', '2018-07-04', '', 'tidak bisa mengerjakan soal ujian dengan baik', 'mata kuliah statistika terapan yang sulit dan cara ngajar dosen terlalu cepat', '', '', 0, NULL, 'masuk', '2018-07-03 23:32:13'),
(6, 2, 3, 17, 5, '2018-07-03 23:35:18', '2018-07-04', '', 'hape hilang, jadi tidak bisa komunikasi', 'selasa pukul 15.00 saat sholat ashar ponsel saya masukkan ke dalam tas, kemudian saat selesai sholat diperiksa.. hape saya hilang', 'sudah lapor ke ob dan yang biasa bersih-bersih mushola', 'pertama', 0, NULL, 'masuk', '2018-07-03 23:35:18'),
(7, 9, 3, 3, 1, '2018-07-03 23:41:36', '2018-05-17', 'tidak tahu', 'kelas seperti baru saja kebanjiran', 'acnya bocor di salah satu sudut ruangan. Bahaya jika kena kabel atau motherboard komputer..', '', '', 0, NULL, 'masuk', '2018-07-03 23:41:36'),
(8, 9, 3, 17, 5, '2018-07-03 23:44:33', '2018-06-22', 'lantai terlalu licin, lampu remang-remang, ruangan tempat wudhu yang kecil', 'terpeleset', 'salah seorang teman saya kemarin terpeleset di tempat wudhu mushola DTS, tolong diberi lampu yang lebih terang dan juga rajin dibersihkan', '', 'beberapa kali', 0, NULL, 'masuk', '2018-07-03 23:44:33'),
(9, 6, 1, 23, 3, '2018-07-04 09:05:24', '2018-11-04', 'air habis', 'ga jadi ke toilet', 'nn', 'belom ada', '', 0, NULL, 'selesai', '2018-07-04 09:11:56'),
(10, 6, 1, 9, 2, '2018-07-04 09:06:22', '2018-07-06', '', 'pusing kepala', 'pusing', '', 'beberapa kali', 0, NULL, 'selesai', '2018-07-04 09:15:00'),
(11, 3, 2, 2, 2, '2018-07-04 12:56:43', '2018-07-04', 'jarang datang', 'banyak kelas pengganti', 'dosen jarang datang dan sulit dihubungi', '', 'beberapa kali', 0, NULL, 'selesai', '2018-07-04 14:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id_role` tinyint(4) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_role`, `role`) VALUES
(1, 'mahasiswa'),
(2, 'dosen'),
(3, 'karyawan'),
(4, 'kaprodi');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE IF NOT EXISTS `ruang` (
`id_ruang` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `nama_ruang` varchar(100) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

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
(7, 2, '204 A', 1),
(8, 2, '204 KH', 1),
(9, 2, '205 K', 0),
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
(23, 4, 'Toilet putri GP', 0),
(24, 2, '204 KH', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE IF NOT EXISTS `tempat` (
`id_tempat` int(11) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`id_tempat`, `nama_tempat`, `deleted`) VALUES
(1, 'laboratorium', 0),
(2, 'kelas', 1),
(3, 'tempat ibadah', 0),
(4, 'toilet', 0),
(5, 'toilet', 0),
(6, 'laboratoriumm', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

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
(11, '16438cab531cfe5832cd1b8533bb0cbd', 3, '2018-06-27 04:49:00', '2018-06-27 13:49:00'),
(12, '5fcc1f240fd5ae4e7008023e29c52517', 3, '2018-06-28 02:43:00', '2018-06-28 11:43:00'),
(13, 'dae7b2b81e09d8e35ee2d8eee3d589a5', 3, '2018-06-28 09:51:00', '2018-06-28 18:51:00'),
(14, 'c990437f22b6420a970e48ebc0265eae', 3, '2018-06-28 09:56:00', '2018-06-28 18:56:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` tinyint(4) NOT NULL,
  `id_level` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_pengguna`, `email`, `password`, `id_role`, `id_level`, `status`, `deleted`, `timestamp`, `username`) VALUES
(1, 'admin', 'sinfo.pengaduan@gmail.com', '$2y$10$JT1F21208n4VciLNQhW6SO7UTvQ60DXK..xfT.hfmGNxOWrddqjEe', 3, 5, 1, 0, '2018-07-04 01:43:04', 'admin'),
(2, 'Savitri Citra Budi', 'savitri.citra@gmail.com', '$2y$10$t1pN35ejkDLNusB0c8CLQeSLfrsKjNO1phuG8p6KblwLWrvShQyFC', 3, 2, 1, 0, '2018-07-01 05:37:28', 'analis'),
(3, 'Isnaini Barochatun', 'isnaini.barochatun@mail.ugm.ac.id', '$2y$10$oT0dqVuSR.sTbgBWQmJPh./OTo9MZ7ln9vGfRqTJdn3IilJJ985wy', 3, 3, 1, 0, '2018-07-02 01:12:57', 'lab'),
(4, 'loremipsum', 'loremipsum@mail.ugm.ac.id', '$2y$10$.U/CwUSgzcp6e87SeyD.KeWSjQDAK8waJwRW9sxFmypDQexsV243q', 1, 1, 1, 1, '2018-07-04 09:21:57', '384475'),
(6, 'Nitha Huwaida', 'hafizhahuwaida@gmail.com', '$2y$10$0cN3Se5QZ8u8OgwvZU9uce2s97umMtRpnJPH8uD8DqFso2weB6ThG', 2, 1, 1, 0, '2018-07-01 07:49:30', '384476'),
(7, 'Nurrahmah Sriwijayanti', 'nurrahmah@gmail.com', '$2y$10$lSMSIePOxCpzj7m/LrlNJ.fGRpS0vBapdcH.7QQnXJoMlitalWt/q', 2, 1, 1, 0, '2018-07-02 16:18:15', '384472'),
(8, 'Lutfi Fitriainsani', 'lutfifitriainsani@gmail.com', '$2y$10$VmNA/4XYNsicPyhWrx9FOOSJmfQhzhCRVkSvcNCv0Ty15aKIQOe8u', 1, 1, 0, 0, '2018-07-04 09:22:14', '384471'),
(9, 'Narlysta Layus Pitaloka', 'narlystalp@gmail.com', '$2y$10$3wST0ro/zpiJ5vdxJKpmxuXcDGFxGix8yXtfWEyd3cjVP1lrTZrde', 1, 1, 1, 0, '2018-07-02 00:31:39', '384469'),
(10, 'lele', 'lele@gmail.com', '$2y$10$7A6PAjjEmChZaymm0Eu8feuXWPYkAnlumHCPTQedJlc3w/KYTNcKW', 3, 1, 0, 0, '2018-07-02 05:56:04', '384468'),
(11, 'Abdurrahman', 'abdur@gmail.com', '$2y$10$UBXDj8MjElzneRh4Z7euJ.rKIqcHxyAoBMd4OqZSD0R3XV2k/x.J6', 3, 4, 1, 0, '2018-07-02 01:13:03', 'akademik');

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
-- Indexes for table `log`
--
ALTER TABLE `log`
 ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
 ADD PRIMARY KEY (`id_pengaduan`);

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
MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id_role` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tempat`
--
ALTER TABLE `tempat`
MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
