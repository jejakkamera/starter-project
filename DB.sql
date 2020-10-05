-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 05 Okt 2020 pada 15.57
-- Versi Server: 5.5.65-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_user`
--

CREATE TABLE IF NOT EXISTS `access_user` (
  `id_access` int(11) NOT NULL,
  `level` enum('s_a','staff','report') NOT NULL,
  `get` tinyint(4) NOT NULL COMMENT 'lihat',
  `post` tinyint(4) NOT NULL COMMENT 'buat',
  `put` tinyint(4) NOT NULL COMMENT 'rubah',
  `delete` tinyint(4) NOT NULL COMMENT 'hapus',
  `module` varchar(110) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `access_user`
--

INSERT INTO `access_user` (`id_access`, `level`, `get`, `post`, `put`, `delete`, `module`) VALUES
(40, 's_a', 1, 1, 1, 1, 'crud_informasi'),
(41, 's_a', 1, 1, 1, 1, 'set_user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_`
--

CREATE TABLE IF NOT EXISTS `histori_` (
  `id` int(11) NOT NULL,
  `aksi` varchar(50) NOT NULL,
  `tabel` varchar(50) NOT NULL,
  `data` varchar(500) NOT NULL,
  `detail_user` varchar(150) NOT NULL,
  `user_id` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `histori_`
--

INSERT INTO `histori_` (`id`, `aksi`, `tabel`, `data`, `detail_user`, `user_id`) VALUES
(2, 'Insert', 'log_login', '{"username":"superadmin"}', 'LAPTOP-16OAH6HP Chrome 85.0.4183.121  ::1 Windows 10 date : 2020-10-05 16:01:45 login Detail : superadmin,s_a', 'superadmin'),
(3, 'Insert', 'log_login', '{"username":"superadmin"}', 'LAPTOP-16OAH6HP Chrome 85.0.4183.121  ::1 Windows 10 date : 2020-10-05 21:23:46 login Detail : superadmin,s_a', 'superadmin'),
(4, 'Update', 'user', '{"username":"report","user_status":"disable","role":"report","update_at":"2020-10-05 22:49:53","password":"e98d2f001da5678b39482efbdf5770dc"}', 'LAPTOP-16OAH6HP Chrome 85.0.4183.121  ::1 Windows 10 date : 2020-10-05 22:53:49 login Detail : superadmin,s_a', 'superadmin'),
(5, 'Insert', 'log_login', '{"username":"superadmin"}', 'LAPTOP-16OAH6HP Chrome 85.0.4183.121  ::1 Windows 10 date : 2020-10-05 22:23:50 login Detail : superadmin,s_a', 'superadmin'),
(6, 'Update', 'user', '{"username":"report","user_status":"enable","role":"report","update_at":"2020-10-05 22:50:40","password":"e98d2f001da5678b39482efbdf5770dc"}', 'LAPTOP-16OAH6HP Chrome 85.0.4183.121  ::1 Windows 10 date : 2020-10-05 22:40:50 login Detail : superadmin,s_a', 'superadmin'),
(7, 'Insert', 'log_login', '{"username":"report"}', 'LAPTOP-16OAH6HP Chrome 85.0.4183.121  ::1 Windows 10 date : 2020-10-05 22:48:50 login Detail : report,report', 'report');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi_file`
--

CREATE TABLE IF NOT EXISTS `informasi_file` (
  `id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `informasi_file`
--

INSERT INTO `informasi_file` (`id`, `file`) VALUES
(2, 'blank.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi_gambar`
--

CREATE TABLE IF NOT EXISTS `informasi_gambar` (
  `id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `informasi_gambar`
--

INSERT INTO `informasi_gambar` (`id`, `file`) VALUES
(1, '90d84c54897489_596e41ae79f50.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi_text`
--

CREATE TABLE IF NOT EXISTS `informasi_text` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `informasi_text`
--

INSERT INTO `informasi_text` (`id`, `text`) VALUES
(1, '<p>UKT UBP Karawang. 2020</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(250) NOT NULL,
  `password` varchar(500) NOT NULL,
  `last_login` datetime NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL,
  `role` enum('s_a','staff','report') NOT NULL,
  `user_status` enum('enable','disable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `last_login`, `create_at`, `update_at`, `role`, `user_status`) VALUES
('report', 'e98d2f001da5678b39482efbdf5770dc', '2020-10-05 22:50:48', '2020-10-05 14:17:32', '2020-10-05 22:50:40', 'report', 'enable'),
('superadmin', '17c4520f6cfd1ab53d8745e84681eb49', '2020-10-05 22:50:23', '2020-07-07 15:07:09', '0000-00-00 00:00:00', 's_a', 'enable'),
('user1', '24c9e15e52afc47c225b757e7bee1f9d', '0000-00-00 00:00:00', '2020-10-05 14:17:19', '0000-00-00 00:00:00', 'staff', 'enable');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_user`
--
ALTER TABLE `access_user`
  ADD PRIMARY KEY (`id_access`),
  ADD KEY `db_name` (`module`),
  ADD KEY `level` (`level`,`module`);

--
-- Indexes for table `histori_`
--
ALTER TABLE `histori_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi_file`
--
ALTER TABLE `informasi_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi_gambar`
--
ALTER TABLE `informasi_gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi_text`
--
ALTER TABLE `informasi_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_user`
--
ALTER TABLE `access_user`
  MODIFY `id_access` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `histori_`
--
ALTER TABLE `histori_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `informasi_file`
--
ALTER TABLE `informasi_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `informasi_gambar`
--
ALTER TABLE `informasi_gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `informasi_text`
--
ALTER TABLE `informasi_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
