-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 08:04 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si-uas`
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
(5, '197705132009121004', 'Ir. Meiyanto Eko Sulistyo S.T., M.Eng.	 ', 2),
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
  `semester` int(3) NOT NULL,
  `kbk` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `semester`, `kbk`, `role_id`) VALUES
(17, 'I0720001', 'Adhitya Fajar Rachmadi', 5, 'KM', 3),
(18, 'I0720002', 'Anas Hibatullah', 5, 'KM', 3),
(19, 'I0720003', 'Anna Mayyah Soraya', 5, 'TKT', 3),
(20, 'I0720005', 'Arya Zifa Muharman', 5, 'TKT', 3),
(21, 'I0720006', 'Asri Aziziyah', 5, 'TKT', 3),
(22, 'I0720012', 'Bagus Putra Nugraha', 5, 'TKT', 3),
(23, 'I0720020', 'Enggar Nurcahyo', 5, 'TKT', 3),
(24, 'I0720021', 'Fauzan Wakhid Mukhtarom', 5, 'TKT', 3),
(25, 'I0720026', 'Hendrawan Purnomoaji', 5, 'TTL', 3),
(26, 'I0720037', 'Mario Alfandi Wirawan ', 5, 'TKT', 3),
(27, 'I0721001', 'Affan Islahuddin', 3, '', 3),
(28, 'I0721002', 'Aflahal Fahmi', 3, '', 3),
(29, 'I0722001', 'Abdee Ridho Pramono', 1, '', 3),
(30, 'I0722002', 'Abimanyu Putra Akbar', 1, '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mk`
--

CREATE TABLE `mk` (
  `id` int(11) NOT NULL,
  `kode_mk` varchar(255) NOT NULL,
  `nama_mk` varchar(255) NOT NULL,
  `NIP_pengampu` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `bobot_sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk`
--

INSERT INTO `mk` (`id`, `kode_mk`, `nama_mk`, `NIP_pengampu`, `semester`, `kategori`, `bobot_sks`) VALUES
(20, 'EE501-19', 'Jaringan Komunikasi Data ', '197711162005011008', 5, '', 2),
(22, 'EE503-19', 'Praktikum Telekomunikasi Dasar', '197705132009121004', 5, '', 1),
(24, 'EE1501-19', 'Pembangkitan Tenaga Listrik ', '197007201999031001', 5, 'TTL', 3),
(25, 'EE1502-19', 'Transmisi dan Distribusi Tenaga Listrik ', '1983032420130201', 5, 'TTL', 3),
(26, 'EE2501-19', 'Sistem Otomasi dan PLC ', '198904242019031013', 5, 'KM', 3),
(27, 'EE2502-19', 'Teknik Robot ', '198904242019031013', 5, 'KM', 2),
(28, 'EE3501-19', 'Antena dan Propagasi ', '1970062520200801', 5, 'TKT', 3),
(29, 'EE3505-19', 'Sistem Informasi ', '198705062019031009', 5, 'TKT', 2),
(30, 'EE3601-19', 'Telekomunikasi Lanjut ', '197705132009121004', 6, 'TKT', 3),
(31, 'EE0301-19', 'Metode Numerik', '198705062019031009', 3, '', 3),
(32, 'EE0101-19', 'Kalkulus I', '197711162005011008', 1, '', 3);

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
(76, 'I0720037', 'EE503-19', 0),
(77, 'I0720037', 'EE501-19', 4),
(78, 'I0720037', 'EE3505-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pa`
--

CREATE TABLE `pa` (
  `id` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `status_krs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pa`
--

INSERT INTO `pa` (`id`, `nip`, `nim`, `status_krs`) VALUES
(13, '197711162005011008', 'I0720001', ''),
(14, '197711162005011008', 'I0720002', ''),
(15, '197711162005011008', 'I0720003', ''),
(16, '197711162005011008', 'I0720005', ''),
(17, '197711162005011008', 'I0720006', ''),
(18, '197711162005011008', 'I0720012', ''),
(19, '197007201999031001', 'I0720020', ''),
(20, '197007201999031001', 'I0720021', ''),
(21, '199203152019031017', 'I0720026', ''),
(22, '197711162005011008', 'I0720037', 'VALID'),
(23, '196801161999031001', 'I0721001', ''),
(24, '196801161999031001', 'I0721002', ''),
(25, '196801161999031001', 'I0722001', ''),
(26, '196801161999031001', 'I0722002', '');

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
(15, 'I0720003', '$2y$10$nDbIOegy7RtRHVMcuvRukeFYhQ2X2kOJG/5TGz/j22FmgqTT5SdDK', 3),
(16, 'I0720002', '$2y$10$xMHjARvvHn6WqZQsUNsqUOSrJjePHShV1WvELixe0M/.u6wFhGTm6', 3);

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
-- Indexes for table `pa`
--
ALTER TABLE `pa`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `mk`
--
ALTER TABLE `mk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `mk_diambil`
--
ALTER TABLE `mk_diambil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `pa`
--
ALTER TABLE `pa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
