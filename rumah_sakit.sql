-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 02:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah_sakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_akun`
--

CREATE TABLE `data_akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `password` varchar(260) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_akun`
--

INSERT INTO `data_akun` (`id`, `nama`, `email`, `phone`, `gender`, `address`, `profile_image`, `password`) VALUES
(1, 'Admin', 'Admin@gmail.com', '', 'male', '', '', '12345'),
(10, 'Yahyan Setiadi', 'Yahyan.nesya10@gmail.com', '082140417274', 'male', 'Depok, Jawa Barat', 'uploads/profil1_(1).jpg', '123'),
(20, 'laila', 'laila@gmail.com', '082140417274', 'female', 'ciluensie', '', '123');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama_dokter` varchar(225) NOT NULL,
  `poli` varchar(128) NOT NULL,
  `jadwal` varchar(128) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `ket` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama_dokter`, `poli`, `jadwal`, `waktu`, `ket`) VALUES
(1, 'Dr. Yahyan Setiadi', 'Psychiatry\r\nClinic', 'Senin & Kamis', '08.00 WIB - Selesai', 'cuti'),
(2, 'Dr. Lailatul Qodariyah', 'Psychiatry Clinic', 'Selasa & Jumat', '14.00 WIB - Selesai', 'besok tanggal 14 praktek'),
(3, 'Dr. Fadia Izni Adani', 'Otolaryngology Clinic', 'Rabu & Jumat', '15.00 WIB - Selesai', 'cuti melahirkan\r\n'),
(4, 'Dr. ZiyadRifqi Permana', 'Cardiology Clinic', 'Selasa & Rabu', '19.00 WIB - Selesai', 'ada'),
(5, 'Dr. Ajeng Saputri', 'Ophthalmology Clinic', 'Rabu & Jumat', '16.00 WIB - Selesai', 'ada');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Male','Female') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `NIK`, `nama_pasien`, `tanggal_lahir`, `jenis_kelamin`, `no_hp`, `email`, `alamat`) VALUES
(43, '1234567890123456', 'lailatul qodariyah', '2024-06-06', 'Female', '089999888222', 'testmail@mail.com', 'cileng');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `pesan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `email`, `no_hp`, `pesan`) VALUES
(1, 'YAHYAN SETIADI', 'yahyan.nesya10@gmail.com', '082140417274', 'ngopi'),
(3, 'lailatul qodariyah', 'testmail@mail.com', '089898265', 'batal reservasi'),
(5, 'bella', 'h@gmail.com', '0898987678', 'Butuh Kopi');

-- --------------------------------------------------------

--
-- Table structure for table `record_pasien`
--

CREATE TABLE `record_pasien` (
  `id` int(11) NOT NULL,
  `NIK` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `diagnosis` text NOT NULL,
  `obat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `record_pasien`
--

INSERT INTO `record_pasien` (`id`, `NIK`, `nama`, `tanggal`, `diagnosis`, `obat`) VALUES
(3, '1821020200031211', 'YAHYAN SETIADI', '2024-06-06', 'Kurang jalan jalan', 'antidepresan'),
(6, '1721020200031211', 'Fadia Izni Adani', '2024-06-19', 'masalah pendengaran', 'cevadroxil'),
(7, '1234567890123456', 'lailatul qodariyah', '2024-06-28', 'mata sakit', 'naphazoline');

-- --------------------------------------------------------

--
-- Table structure for table `register_pasien`
--

CREATE TABLE `register_pasien` (
  `id` int(11) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal` date NOT NULL,
  `poli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_akun`
--
ALTER TABLE `data_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NIK` (`NIK`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record_pasien`
--
ALTER TABLE `record_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_pasien`
--
ALTER TABLE `register_pasien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_akun`
--
ALTER TABLE `data_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `record_pasien`
--
ALTER TABLE `record_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `register_pasien`
--
ALTER TABLE `register_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
