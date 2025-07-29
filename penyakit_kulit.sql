-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2025 at 05:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penyakit_kulit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `basis_pengetahuan`
--

CREATE TABLE `basis_pengetahuan` (
  `id` int(11) NOT NULL,
  `id_penyakit` int(11) DEFAULT NULL,
  `id_gejala` int(11) DEFAULT NULL,
  `nilai_probabilitas` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basis_pengetahuan`
--

INSERT INTO `basis_pengetahuan` (`id`, `id_penyakit`, `id_gejala`, `nilai_probabilitas`) VALUES
(104, 1, 1, 0.9),
(105, 1, 7, 0.5),
(106, 1, 8, 0.7),
(107, 1, 10, 0.6),
(108, 2, 1, 0.8),
(110, 2, 8, 0.9),
(111, 2, 10, 0.6),
(112, 3, 1, 0.7),
(113, 3, 2, 0.6),
(114, 3, 3, 0.8),
(115, 3, 10, 0.5),
(117, 4, 2, 0.6),
(122, 4, 7, 0.5),
(123, 4, 8, 0.7),
(124, 4, 9, 0.7),
(125, 5, 1, 0.7),
(126, 5, 7, 0.8),
(128, 5, 10, 0.6),
(129, 6, 1, 0.9),
(130, 6, 2, 0.6),
(131, 6, 3, 0.8),
(133, 6, 5, 0.2),
(135, 6, 4, 0.5),
(136, 6, 8, 0.7),
(137, 6, 9, 0.7);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id` int(11) NOT NULL,
  `kode_gejala` varchar(10) DEFAULT NULL,
  `nama_gejala` varchar(100) DEFAULT NULL,
  `nilai_probabilitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id`, `kode_gejala`, `nama_gejala`, `nilai_probabilitas`) VALUES
(1, 'G01', 'Gatal', '0.9'),
(2, 'G02', 'Nyeri', '0.6'),
(3, 'G03', 'Demam', '0.8'),
(4, 'G04', 'Lelah', '0.4'),
(5, 'G05', 'Sakit Kepala', '0.2'),
(6, 'G06', 'Nyeri Sendi', '0.6'),
(7, 'G07', 'Ruam', '0.5'),
(8, 'G08', 'Kulit Sensitif', '0.7'),
(9, 'G09', 'Rasa sakit seperti terbakar', '0.7'),
(10, 'G10', 'Bagian kecil yang kasar pada kulit', '0.6');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_diagnosa`
--

CREATE TABLE `hasil_diagnosa` (
  `id` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `gejala_dipilih` text DEFAULT NULL,
  `hasil_penyakit` varchar(100) DEFAULT NULL,
  `nilai_naive` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_diagnosa`
--

INSERT INTO `hasil_diagnosa` (`id`, `tanggal`, `nama`, `umur`, `gejala_dipilih`, `hasil_penyakit`, `nilai_naive`) VALUES
(25, '2025-07-16 21:19:51', 'Heru', 22, '1,7,8', 'Kutu Air', 0.315),
(26, '2025-07-16 21:22:21', 'Gilang', 29, '1,4,7,9', 'Cacar', 0.112),
(27, '2025-07-16 21:28:30', 'Gilang', 29, '1,4,7,9', 'Cacar', 0.112),
(28, '2025-07-16 21:39:18', 'fytft', 57, '3,5,7', 'Cacar', 0.08),
(29, '2025-07-16 21:40:05', 'adi', 40, '1,3,7', 'Herpes Zoster', 0.36),
(30, '2025-07-16 21:44:52', 'Gilang P', 31, '1,4,6,7,8,9', 'Cacar', 0.000784),
(32, '2025-07-16 21:48:04', 'Rapi', 24, '4', 'Cacar', 0.4),
(33, '2025-07-16 21:48:45', 'Deden', 33, '10', 'Kutu Air', 0.6),
(34, '2025-07-16 21:49:18', 'Jek', 80, '1,3,7,10', 'Herpes Zoster', 0.0036),
(35, '2025-07-16 21:50:04', 'Rian', 400, '3,7,8', 'Cacar', 0.28),
(36, '2025-07-16 22:04:48', 'Rama', 14, '1,5,7', 'Herpes Zoster', 0.09),
(37, '2025-07-16 22:06:49', 'Jek', 32, '1,2,3,10', 'Bisul', 0.168),
(39, '2025-07-16 23:32:58', 'bebe', 16, '1,7,8,10', 'Kutu Air', 0.189),
(41, '2025-07-16 23:35:28', 'jj', 11, '1,8,10', 'Panu', 0.432),
(42, '2025-07-16 23:38:21', 'arul', 33, '1,7,10', 'Kurap', 0.336),
(43, '2025-07-16 23:48:57', 'rere', 90, '1,2,3,4,5,8,9', 'Herpes Zoster', 0.021168),
(44, '2025-07-17 00:05:27', 'gaga', 97, '1,7,8,10', 'Kutu Air', 0.189),
(45, '2025-07-17 00:06:23', 'hasdjha', 85, '1,10', 'Kutu Air', 0.54),
(46, '2025-07-17 00:06:34', 'hasdjha', 85, '1,8,10', 'Panu', 0.432),
(47, '2025-07-17 00:07:06', 'yuyu', 55, '1,2,3,10', 'Bisul', 0.168),
(48, '2025-07-17 00:07:34', 'ygyg', 42, '2,7,8,9', 'Cacar', 0.147),
(49, '2025-07-17 00:08:06', 'huh', 66, '1,7,10', 'Kurap', 0.336),
(50, '2025-07-17 00:08:41', 'ari', 41, '1,2,3,4,5,8,9', 'Herpes Zoster', 0.021168),
(51, '2025-07-17 00:09:11', 'marko', 77, '1,2,3,4,5,6,7,8,9,10', 'Herpes Zoster', 0.000000021168),
(52, '2025-07-17 00:22:29', 'haha', 29, '1,7,10', 'Kurap', 0.336);

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id` int(11) NOT NULL,
  `kode_penyakit` varchar(10) DEFAULT NULL,
  `nama_penyakit` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `solusi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id`, `kode_penyakit`, `nama_penyakit`, `deskripsi`, `solusi`) VALUES
(1, 'P01', 'Kutu Air', 'Infeksi jamur yang menyerang kaki, terutama di sela-sela jari.', 'Gunakan salep antijamur dan jaga kaki tetap kering.'),
(2, 'P02', 'Panu', 'Penyakit kulit akibat infeksi jamur Malassezia.', 'Gunakan salep antijamur dan mandi dengan sabun antiseptik.'),
(3, 'P03', 'Bisul', 'Benjolan merah berisi nanah akibat infeksi bakteri.', 'Kompres hangat dan jika parah, gunakan antibiotik.'),
(4, 'P04', 'Cacar', 'Infeksi virus yang menyebabkan ruam dan demam.', 'Istirahat cukup, minum obat penurun panas, dan hindari garukan.'),
(5, 'P05', 'Kurap', 'Infeksi jamur berbentuk lingkaran di kulit.', 'Gunakan krim antijamur dan jaga kebersihan kulit.'),
(6, 'P06', 'Herpes Zoster', 'Penyakit saraf kulit yang disebabkan virus Varicella Zoster.', 'Kompres dingin, antivirus dan penghilang nyeri.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD CONSTRAINT `basis_pengetahuan_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id`),
  ADD CONSTRAINT `basis_pengetahuan_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
