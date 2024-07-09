-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 08:31 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `kode_dosen` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `nama_dosen` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `telpon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(250) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`kode_dosen`, `nama_dosen`, `telpon`, `email`, `alamat`, `foto`) VALUES
('D007', 'thufail ahmad nafis', '000', 'nafis@gmail.com', '', 'visimisi.jpg'),
('D006', 'Ahmad Alfian Fadli', '081515318557', 'fadli@gmail.com', 'gresik', 'fotoku.jpg'),
('D008', 'Iwan Setiawan', '085412455544', 'iwansetiawan@gmail.com', 'CIMAHI', '192_10_Iwan Setiawan.jpeg'),
('D009', 'Yugo Winarko', '085811772588', 'yugowinarko58@guru.sma.belajar.id', '', 'f1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `id` int(9) NOT NULL,
  `kode_mk` varchar(4) COLLATE latin1_general_ci NOT NULL,
  `kode_ruang` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `kode_dosen` varchar(8) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`id`, `kode_mk`, `kode_ruang`, `tanggal`, `jam_mulai`, `jam_selesai`, `kode_dosen`) VALUES
(14, 'M003', 2, '2017-05-08', '09:00:00', '12:00:00', 'D004'),
(15, 'M005', 2, '2017-05-08', '13:00:00', '16:00:00', 'D005'),
(16, 'M004', 1, '2017-05-09', '09:00:00', '12:00:00', 'D001'),
(17, 'M006', 1, '2017-05-09', '13:00:00', '16:00:00', 'D001'),
(22, 'M002', 1, '2017-07-22', '09:00:00', '12:00:00', 'D003'),
(12, 'M001', 1, '2017-05-08', '09:00:00', '12:00:00', 'D001'),
(19, 'M008', 1, '2017-05-10', '09:00:00', '12:00:00', 'D001'),
(20, 'M009', 1, '2017-05-10', '13:00:00', '16:00:00', 'D002'),
(21, 'M010', 1, '2017-05-11', '09:00:00', '12:00:00', 'D004'),
(23, 'M001', 1, '2024-06-22', '08:00:00', '09:00:00', 'D006'),
(24, 'M012', 1, '2024-06-21', '14:00:00', '15:00:00', 'D008'),
(25, 'M002', 1, '2024-06-20', '09:15:00', '10:15:00', 'D009'),
(26, 'M005', 1, '2024-06-24', '13:30:00', '14:15:00', 'D009'),
(27, 'M003', 2, '2024-06-25', '08:30:00', '09:30:00', 'D009');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id` int(11) NOT NULL,
  `kode_jurusan` varchar(4) COLLATE latin1_general_ci NOT NULL,
  `nama_jurusan` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id`, `kode_jurusan`, `nama_jurusan`) VALUES
(1, 'TI', 'Teknik Informatika'),
(2, 'SI', 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_khs`
--

CREATE TABLE `tb_khs` (
  `nim` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `kode_mk` varchar(4) COLLATE latin1_general_ci NOT NULL,
  `nilai` varchar(1) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_krs`
--

CREATE TABLE `tb_krs` (
  `kode` int(9) NOT NULL,
  `kode_mk` varchar(4) COLLATE latin1_general_ci NOT NULL,
  `nim` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `kode_jurusan` varchar(4) COLLATE latin1_general_ci NOT NULL,
  `status_nilai` varchar(2) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_krs`
--

INSERT INTO `tb_krs` (`kode`, `kode_mk`, `nim`, `kode_jurusan`, `status_nilai`) VALUES
(24, 'M005', '1130001 ', 'SI', '0'),
(23, 'M003', '1130001 ', 'SI', '0'),
(19, 'M001', '1130028 ', 'TI', '0'),
(20, 'M005', '1130028 ', 'TI', '0'),
(21, 'M002', '1130028 ', 'TI', '0'),
(22, 'M003', '1130028 ', 'TI', '0'),
(18, 'M004', '1130028 ', 'TI', '0'),
(25, 'M004', '1130001 ', 'SI', '0'),
(26, 'M002', '1130001 ', 'SI', '0'),
(27, 'M001', '1130001 ', 'SI', '0'),
(28, 'M007', '1130028 ', 'TI', '1'),
(29, 'M006', '1130028 ', 'TI', '1'),
(30, 'M008', '1130028 ', 'TI', '1'),
(31, 'M009', '1130028 ', 'TI', '0'),
(32, 'M010', '1130028 ', 'TI', '1'),
(33, 'M005', '1120025 ', 'SI', '1'),
(34, 'M006', '1120025 ', 'SI', '1'),
(35, 'M002', '1120025 ', 'SI', '1'),
(36, 'M009', '1120025 ', 'SI', '1'),
(37, 'M010', '1120025 ', 'SI', '1'),
(38, 'M004', '1130003 ', 'TI', '1'),
(39, 'M002', '1130003 ', 'TI', '1'),
(40, 'M012', '1130003 ', 'TI', '0'),
(41, 'M001', '1120026 ', 'SI', '1'),
(42, 'M002', '1120026 ', 'SI', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `nim` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `kode_jurusan` varchar(4) COLLATE latin1_general_ci NOT NULL,
  `smester` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `telpon` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status_krs` varchar(2) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`nim`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kode_jurusan`, `smester`, `jenis_kelamin`, `email`, `telpon`, `foto`, `status_krs`) VALUES
('1130028', 'Parman', 'Blora', '1988-02-03', 'Blora Jaya Mustika Indonesia Raya', 'TI', '2', 'L', 'parmanp79@gmail.com', '085781480396', 'parman1.jpg', '0'),
('1120025', 'Fitri Handayani', 'Jakarta ', '1994-04-22', 'Cilandak Jakarta Selatan ', 'TI', '2', 'P', 'fitrihandayani@gmail.com', '085781480396', 'merah.jpg', '0'),
('1130001', 'agustinus', 'Jakarta', '1989-03-15', 'Jakarta', 'SI', '1', 'L', 'agustinus@gmail.com', '085781480396', 'parman.jpg', '0'),
('1130002', 'Ayu Selvia ', 'Jakarta', '1996-07-17', 'Jakarta', 'SI', '1', 'P', 'ayuselvia@gmail.com', '085781480396', 'model inggris.jpg', '1'),
('1130003', 'Budi', 'Jakarta', '1996-11-19', 'Jakarta Selatan', 'TI', '3', 'L', 'budi@gmail.com', '085781480396', 'aku2.jpg', '0'),
('1130004', 'Dedi', 'Jakarta', '2001-02-06', 'Jakarta', 'TI', '1', 'L', 'dedi@gmail.com', '085781480396', 'parman.jpg', '1'),
('1120026', 'Rosmiati Nurhasanah', 'Cimahi', '2007-11-21', 'Cimahi', 'SI', '1', 'P', 'rosmiati@gmail.com', '08541245553', 'siluet.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `kode_mk` varchar(4) COLLATE latin1_general_ci NOT NULL,
  `nama_mk` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `sks` varchar(1) COLLATE latin1_general_ci NOT NULL,
  `smester` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`kode_mk`, `nama_mk`, `sks`, `smester`) VALUES
('M001', 'Pengantar Studi AL-Qur\'an AIK 1', '2', '1'),
('M007', 'Struktur Organisasi Data', '3', '2'),
('M002', 'Alogaritma & Logika Pemograman (c++)', '3', '1'),
('M003', 'Pengantar Sistem Informasi-1(Windows)', '2', '1'),
('M004', 'Kalkulus 1', '3', '1'),
('M005', 'Praktikum 1 (Hardware&Software)', '4', '1'),
('M006', 'Aqidah Akhlaq & Syariah Al-Islam II', '2', '2'),
('M008', 'Statistik Dasar', '3', '2'),
('M009', 'Sistem Informasi Manajemen', '3', '2'),
('M010', 'Arsitektur & Orkom', '3', '2'),
('M011', 'Praktikum II (Pengenalan Website)', '4', '2'),
('M012', 'Jaringan Komputer', '4', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id` int(11) NOT NULL,
  `nim` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `kode_mk` varchar(4) COLLATE latin1_general_ci NOT NULL,
  `kode_dosen` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `smester` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `grade` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `tugas` int(11) NOT NULL,
  `uts` int(11) NOT NULL,
  `uas` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id`, `nim`, `kode_mk`, `kode_dosen`, `smester`, `grade`, `tugas`, `uts`, `uas`) VALUES
(1, '1130028', 'M002', 'D003', '1', '', 90, 90, 90),
(2, '1130001', 'M002', 'D003', '1', '', 70, 90, 85),
(3, '1130028', 'M005', 'D003', '1', '', 80, 85, 80),
(4, '1130004', 'M005', 'D003', '1', '', 60, 50, 70),
(5, '1130001', 'M005', 'D003', '1', '', 80, 80, 80),
(6, '1130028', 'M009', 'D002', '2', '', 60, 60, 60),
(7, '1130001', 'M001', 'D006', '1', '', 78, 85, 77),
(8, '1130003', 'M012', 'D008', '3', '', 90, 50, 80),
(9, '1120026', 'M002', 'D009', '1', '', 95, 90, 85);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `kode_ruang` int(5) NOT NULL,
  `nama_ruang` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_ruang`
--

INSERT INTO `tb_ruang` (`kode_ruang`, `nama_ruang`) VALUES
(1, 'Kelas A'),
(2, 'Kelas B');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(9) NOT NULL,
  `user_id` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pass` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `user_id`, `nama`, `pass`, `level`, `foto`) VALUES
(1, 'admin', 'Bejo', '123456', 'admin', 'visimisi.jpg'),
(40, 'D007', 'thufail ahmad nafis', '123456', 'dosen', 'visimisi.jpg'),
(30, '1130003', 'Budi', '12345', 'mahasiswa', 'aku2.jpg'),
(31, '1130004', 'Dedi', '12345', 'mahasiswa', 'parman.jpg'),
(29, '1130002', 'Ayu Selvia ', '12345', 'mahasiswa', 'model inggris.jpg'),
(28, '1130001', 'agustinus', '12345', 'mahasiswa', 'parman.jpg'),
(26, '1130028', 'Parman', '12345', 'mahasiswa', 'parman1.jpg'),
(27, '1120025', 'Fitri Handayani', '12345', 'mahasiswa', 'merah.jpg'),
(39, 'D006', 'Ahmad Alfian Fadli', 'faldi2008', 'dosen', 'fotoku.jpg'),
(41, 'D008', 'Iwan Setiawan', '123456', 'dosen', '192_10_Iwan Setiawan.jpeg'),
(42, 'D009', 'Yugo Winarko', '123456', 'dosen', 'f1.png'),
(43, '1120026', 'Rosmiati Nurhasanah', '123456', 'mahasiswa', 'siluet.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`kode_dosen`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_krs`
--
ALTER TABLE `tb_krs`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`kode_ruang`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_krs`
--
ALTER TABLE `tb_krs`
  MODIFY `kode` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `kode_ruang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
