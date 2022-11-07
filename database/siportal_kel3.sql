-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2022 at 05:51 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siportal_kel3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `nip`) VALUES
(1, 'maswid', '8888');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nip`, `nama`, `role_id`) VALUES
(1, '196710191999031001', 'Jaka Sulistya Budi, S.T', 2),
(2, '199203152019031017', 'Agus Ramelan, S.Pd., M.T', 2),
(3, '198705062019031009', 'Sutrisno, S.T., M.Sc, Ph.D.', 2),
(4, '197711162005011008', 'Dr.Eng. Faisal Rahutomo S.T.,M.Kom.', 2),
(5, '197705132009121004', 'Meiyanto Eko Sulistyo S.T., M.Eng.	', 2),
(6, '1970062520200801', 'Prof. Josaphat Tetuko Sri Sumantyo Ph.D.', 2),
(7, '196801161999031001', 'Feri Adriyanto S.Pd., M.Si., Ph.D.', 2),
(8, '197609232006041004', 'Joko Hariyono	S.T., M.Eng., Ph.D.', 2),
(9, '199104132018031001', 'Hari Maghfiroh S.T., M.Eng.', 2),
(10, '198804162015041002', 'Chico Hermanu Brillianto Apribowo S.T., M.Eng.', 2),
(11, '198904242019031013', 'Joko Slamet Saputro S.Pd., M.T.', 2),
(12, '1983032420130201', 'Dr. Miftahul Anwar S.Si., M.Eng.', 2),
(13, '198812292019031011', 'Muhammad Hamka Ibrahim S.T., M.Eng.', 2),
(14, '197007201999031001', 'Prof. Muhammad Nizam S.T, M.T, Ph.D.', 2),
(15, '198106092003121002', 'Subuh Pramono S.T., M.T.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `angkatan`, `role_id`) VALUES
(1, 'I0720013', 'Baharuddin Dias', 2020, 3),
(2, 'I0720006', 'Asri Aziziyah', 2020, 3),
(3, 'I0720037', 'Mario Alfandi Wirawan', 2020, 3),
(4, 'I0720065', 'Ridho Priambodo', 2020, 3),
(5, 'I0720003', 'Anna Mayyah Soraya', 2020, 3),
(6, 'I0720020', 'Enggar Nurcahyo', 2020, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mk`
--

CREATE TABLE `mk` (
  `id` int(11) NOT NULL,
  `kode_mk` varchar(255) NOT NULL,
  `nama_mk` varchar(255) NOT NULL,
  `NIP_pengampu` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk`
--

INSERT INTO `mk` (`id`, `kode_mk`, `nama_mk`, `NIP_pengampu`, `semester`) VALUES
(1, 'EE1504-19', 'Mesin Listrik Lanjut', '199203152019031017', 5),
(8, 'EE502-19', 'Mekatronika ', '198904242019031013', 5),
(9, 'EE503-19', 'Praktikum Telekomunikasi Dasar ', '197705132009121004', 5),
(10, 'EE504-19', 'Praktikum Sistem Kendali ', '197609232006041004', 5),
(11, 'EE505-19', 'Proyek Kreatif II ', '198904242019031013', 5),
(12, 'EE3501-19', 'Antena dan Propagasi ', '1970062520200801', 5),
(13, 'EE3502-19', 'Sistem Tertanam dan Periferal ', '197711162005011008', 5),
(14, 'EE3503-19', 'Pengolahan Isyarat Digital ', '197705132009121004', 5),
(15, 'EE3504-19', 'Algoritma dan Struktur Data ', '197711162005011008', 5),
(16, 'EE3505-19', 'Sistem Informasi ', '198705062019031009', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mk_diambil`
--

CREATE TABLE `mk_diambil` (
  `id` int(11) NOT NULL,
  `nim_mhs` varchar(255) NOT NULL,
  `kode_mk` varchar(255) NOT NULL,
  `nilai_mk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_diambil`
--

INSERT INTO `mk_diambil` (`id`, `nim_mhs`, `kode_mk`, `nilai_mk`) VALUES
(1, 'I0720037', 'EE301', 0),
(2, 'I0720037', 'EE502', 0),
(3, 'I0720006', 'EE302', 5),
(4, 'I0720013', 'EE505', 3),
(5, 'I0720037', 'EE506', 0),
(6, 'I0720006', 'EE601', 4),
(17, 'I0720037', 'EE401', 0),
(18, 'I0720037', 'EE3505-19', 0),
(19, 'I0720037', 'EE3504-19', 0),
(20, 'I0720037', 'EE3502-19', 0),
(21, 'I0720037', 'EE1504-19', 0),
(22, 'I0720037', 'EE505-19', 0),
(23, 'I0720006', 'EE3502-19', 0),
(24, 'I0720006', 'EE3501-19', 0),
(25, 'I0720006', 'EE3504-19', 0),
(26, 'I0720006', 'EE3503-19', 0),
(27, 'I0720006', 'EE503-19', 0),
(28, 'I0720006', 'EE504-19', 0),
(29, 'I0720006', 'EE505-19', 0),
(30, 'I0720006', 'EE3505-19', 0),
(31, 'I0720065', 'EE3502-19', 0),
(32, 'I0720065', 'EE3504-19', 0),
(33, 'I0720065', 'EE3501-19', 0),
(34, 'I0720065', 'EE1504-19', 0),
(35, 'I0720065', 'EE3503-19', 0),
(36, 'I0720065', 'EE3505-19', 0),
(37, 'I0720065', 'EE502-19', 0),
(38, 'I0720065', 'EE503-19', 0),
(39, 'I0720065', 'EE504-19', 0),
(40, 'I0720065', 'EE505-19', 0),
(41, 'I0720013', 'EE1504-19', 0),
(42, 'I0720013', 'EE3501-19', 0),
(43, 'I0720013', 'EE3502-19', 0),
(44, 'I0720013', 'EE3503-19', 0),
(45, 'I0720013', 'EE3504-19', 0),
(46, 'I0720013', 'EE3505-19', 0),
(47, 'I0720013', 'EE502-19', 0),
(48, 'I0720013', 'EE503-19', 0),
(49, 'I0720013', 'EE504-19', 0),
(50, 'I0720013', 'EE505-19', 0),
(51, 'I0720020', 'EE1504-19', 0),
(52, 'I0720020', 'EE3501-19', 0),
(53, 'I0720020', 'EE3502-19', 0),
(54, 'I0720020', 'EE3503-19', 0),
(55, 'I0720020', 'EE3504-19', 0),
(56, 'I0720020', 'EE502-19', 0),
(57, 'I0720020', 'EE503-19', 0),
(58, 'I0720020', 'EE504-19', 0),
(59, 'I0720020', 'EE505-19', 0),
(60, 'I0720003', 'EE1504-19', 0),
(61, 'I0720003', 'EE3501-19', 0),
(62, 'I0720003', 'EE3502-19', 0),
(63, 'I0720003', 'EE3503-19', 0),
(64, 'I0720003', 'EE3504-19', 0),
(65, 'I0720003', 'EE3505-19', 0),
(66, 'I0720003', 'EE502-19', 0),
(67, 'I0720003', 'EE503-19', 0),
(68, 'I0720003', 'EE504-19', 0),
(69, 'I0720003', 'EE505-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama`) VALUES
(1, 'admin'),
(2, 'dosen'),
(3, 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nim_nip` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nim_nip`, `password`, `role_id`) VALUES
(6, 'I0720006', '$2y$10$IFX7tKKkeb64Opog054atOccBaEls9TWhpxmmg/qVykxV9YKr0D5W', 3),
(7, 'maswid', '$2y$10$0tmx7Lt3X2Huii9NDtePHu.4B1yMZV5L0PnKQyO62vVDREe06DPd.', 1),
(8, 'admin', '$2y$10$CsTqlNVOOodL0pSwNTkmRutRv7Qg3GqAPaSZb8Kdtjb5lA4U3RdVq', 1),
(9, '199203152019031017', '$2y$10$.5J/urQkDZsO5/2XgNXCi.dJQM1MGs1xUA1l7PZp1caFWxGNNFTva', 2),
(10, 'I0720037', '$2y$10$856zz7I3adYiRD0fvPCg3u1/k.xuTGkXD6IclZLX7LfYTKD.fSCtu', 3),
(11, '197711162005011008', '$2y$10$N8V2zTgBfGjqp8qsL0bdpuXxdNZqYoH87.jM7b4wWA1jhyIMqd8j2', 2),
(12, 'I0720013', '$2y$10$g6vy1up9dPx4rubPG9CZ3.SY2s674CRCTgu5v0Xz/0G6ukncJjhV2', 3),
(13, 'I0720065', '$2y$10$R5vK93nnJtLxfJBmsBVmjOu7mualWJgzIbcnPubCe4Hes.wd8Ik6m', 3),
(14, 'I0720020', '$2y$10$jPvBWUySz/arDfbSpoaZbukhU89Mkl2A3b0/XiaukSD.KYR/NsES2', 3),
(15, 'I0720003', '$2y$10$nDbIOegy7RtRHVMcuvRukeFYhQ2X2kOJG/5TGz/j22FmgqTT5SdDK', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk`
--
ALTER TABLE `mk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_diambil`
--
ALTER TABLE `mk_diambil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mk`
--
ALTER TABLE `mk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mk_diambil`
--
ALTER TABLE `mk_diambil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
