-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2018 at 02:28 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `deleted`) VALUES
(1, 'praktikum', 0),
(2, 'teori', 0),
(3, 'ekstra', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `deleted`) VALUES
(1, 'sarpras', 0),
(2, 'dosen', 0),
(3, 'mata kuliah', 0),
(4, 'layanan informasi', 0),
(5, 'lingkungan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
`id_level` int(11) NOT NULL,
  `nama_level` varchar(20) NOT NULL,
  `posisi` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
`id_log` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('masuk','diproses','selesai') NOT NULL DEFAULT 'masuk',
  `keterangan` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `id_pengaduan`, `id_user`, `status`, `keterangan`, `timestamp`) VALUES
(1, 1, 2, 'masuk', NULL, '2018-06-28 08:39:58'),
(3, 2, 2, 'masuk', NULL, '2018-06-28 07:40:55'),
(5, 3, 2, 'masuk', NULL, '2018-06-28 09:43:23'),
(6, 4, 2, 'masuk', NULL, '2018-06-28 09:43:33'),
(7, 5, 1, 'masuk', NULL, '2018-06-28 13:07:15'),
(8, 6, 1, 'masuk', NULL, '2018-06-28 13:13:15'),
(9, 3, 1, 'diproses', 'Tukang servis sudah ditelpon sejak dua minggu yang lalu tapi belum didatang juga', '2018-06-28 13:16:53'),
(10, 2, 1, 'selesai', NULL, '2018-06-29 04:50:43'),
(11, 7, 1, 'masuk', NULL, '2018-06-29 06:46:28'),
(12, 8, 1, 'masuk', NULL, '2018-06-29 06:47:36'),
(13, 9, 1, 'masuk', NULL, '2018-06-29 06:48:36'),
(14, 10, 2, 'masuk', NULL, '2018-06-30 15:36:04');

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
  `status` enum('masuk','diproses','selesai') NOT NULL DEFAULT 'masuk'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_user`, `id_jenis`, `id_ruang`, `id_kategori`, `wkt_pengaduan`, `tgl_kejadian`, `penyebab`, `efek`, `deskripsi`, `tindaklanjut`, `kejadian`, `deleted`, `gambar`, `status`) VALUES
(1, 2, 2, 10, 3, '2018-01-18 07:35:04', '2018-01-28', 'karena kabel di belakang monitor kendor', 'lorem ipsum dolor sit amet', 'sdfff', '', 'beberapa kali', 0, 'lorem_ipsum_3_1530171304.jpg', 'masuk'),
(2, 2, 1, 1, 5, '2018-02-20 07:40:55', '2018-02-28', 'cc', 'ccc', 'cccc', '', 'pertama', 0, NULL, 'selesai'),
(3, 2, 1, 1, 2, '2018-03-28 09:37:55', '2018-03-28', '', 'Kepanasan di lab', 'Pagi-pagi AC mati dan kepanasan', '', 'beberapa kali', 0, 'lorem_ipsum_2_1530178675.jpg', 'diproses'),
(4, 2, 3, 20, 5, '2018-04-05 09:42:15', '2018-06-04', 'Ada coretan-coretan di dinding', 'tidak nyaman dilihat', 'pagi-pagi ngelihat ada coretan di dalem kamar mandi', '', 'pertama', 0, 'lorem_ipsum_5_1530178935.jpg', 'masuk'),
(5, 1, 3, 17, 5, '2018-05-11 13:07:15', '2018-06-04', 'tidak ada lampu', 'tempat wudhu gelap jadi nggak nyaman kalau ngaca, takut ada hewan-hewan kecil', 'tempat wudhu putri di mushola DTS karena tempatnya sempit dan lampunya mati jadi wudhunya gelap-gelapan, tidak nyaman buat wudhu takut ada hewan-hewan kecil, tidak bisa ngaca dengan baik', '', 'beberapa kali', 0, NULL, 'masuk'),
(6, 1, 0, 5, 2, '2018-06-19 13:13:15', '2017-06-15', '', 'harus pindah meja dan ganti-ganti komputer', 'komputer nomer tiba-tiba 15 mati, lalu tidak bisa nyala sama sekali', 'coba tekan tombol power dan lepas pasang kabelnya tetap tidak nyala', '', 0, NULL, 'masuk'),
(7, 1, 3, 2, 1, '2018-03-17 06:46:28', '2018-04-11', '', 'uidhsaudhasjdhas', 'dhdakudhakduhadushauda', '', '', 0, NULL, 'masuk'),
(8, 1, 3, 16, 4, '2018-01-26 06:47:36', '2018-05-29', '', 'hsuhSIUHLSAJDHASD', 'DSDADHADJADJhdahjhhs', '', 'pertama', 0, NULL, 'masuk'),
(9, 1, 3, 21, 5, '2018-02-24 06:48:36', '2018-05-25', 'mbhbhjbjbhjavhgsvx', 'dhasdnahdauidha', 'DJSADIOAJNAIOJoisdjsjdsk', '', 'pertama', 0, NULL, 'masuk'),
(10, 2, 3, 16, 5, '2018-01-26 15:36:04', '2018-01-26', 'ada pencuri', 'pulang nggak pakai sepatu', 'sewaktu sholat ashar jam 4, saya letakkan sepatu dekat pilar luar tapi pas selesai sholat dan keluar, sepatu hilang', 'sudah berusaha melapor ke ob dan satpam tapi belum nemu', 'pertama', 0, NULL, 'masuk');

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
(1, 'admin', 'sinfo.pengaduan@gmail.com', '$2y$10$JT1F21208n4VciLNQhW6SO7UTvQ60DXK..xfT.hfmGNxOWrddqjEe', 3, 1, 1, 0, '2018-06-30 00:01:22', 'admin'),
(2, 'Savitri Citra Budi', 'savitri.citra@gmail.com', '$2y$10$t1pN35ejkDLNusB0c8CLQeSLfrsKjNO1phuG8p6KblwLWrvShQyFC', 2, 1, 1, 0, '2018-06-30 13:23:58', '12345'),
(3, 'Isnaini Barochatun', 'isnaini.barochatun@mail.ugm.ac.id', '$2y$10$oT0dqVuSR.sTbgBWQmJPh./OTo9MZ7ln9vGfRqTJdn3IilJJ985wy', 3, 3, 1, 0, '2018-06-30 13:41:58', '384475'),
(4, 'Nurfillaeli', 'nurfillaeli@mail.ugm.ac.id', '$2y$10$n7huoYp5tIAgco7xHRlWfOHeEDPNSx26LphgZAsKI.X4uTCYFrmnu', 1, 1, 1, 0, '2018-06-30 13:44:53', '384474'),
(5, 'Abdurrahman', 'abdur@gmail.com', '$2y$10$awIJzYSJd1vLqKI7SDuYAueGawrMznYbN5Hopbi9aDC3OQ5KXbw9C', 3, 4, 1, 0, '2018-06-30 13:26:47', '384473'),
(6, 'Nitha Huwaida', 'hafizhahuwaida@gmail.com', '$2y$10$0cN3Se5QZ8u8OgwvZU9uce2s97umMtRpnJPH8uD8DqFso2weB6ThG', 2, 1, 1, 0, '2018-06-30 13:32:25', '384473'),
(7, 'Nurrahmah Sriwijayanti', 'Nurrahmah@gmail.com', '$2y$10$lSMSIePOxCpzj7m/LrlNJ.fGRpS0vBapdcH.7QQnXJoMlitalWt/q', 1, 1, 1, 0, '2018-06-30 14:17:23', '384472'),
(8, 'Lutfi Fitriainsani', 'Lutfifitriainsani@gmail.com', '$2y$10$prx34cYkFmeOy3mdW.5RE.4Usg673xtKG7UP/qshTcJShtFXyoU0q', 1, 1, 1, 0, '2018-06-30 14:05:51', '384471'),
(9, 'Narlysta Layus', 'Narlystalp@gmail.com', '$2y$10$3wST0ro/zpiJ5vdxJKpmxuXcDGFxGix8yXtfWEyd3cjVP1lrTZrde', 1, 1, 1, 0, '2018-06-30 14:05:52', '384469'),
(10, 'lele', 'lele@gmail.com', '$2y$10$7A6PAjjEmChZaymm0Eu8feuXWPYkAnlumHCPTQedJlc3w/KYTNcKW', 3, 1, 0, 0, '2018-06-30 14:15:13', '384468'),
(11, 'Muhammad Fakhurrifqi', 'm.rifqi@gmail.com', '$2y$10$iPwRxSqB0SRb3FSZlO1IMuNf..1DAjP7U5iKb5egS6gqE89V/HhyC', 3, 2, 1, 0, '2018-06-30 14:20:55', '384467');

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
MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
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
MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
