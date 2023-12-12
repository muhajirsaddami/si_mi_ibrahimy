-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 06:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laporan_pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `no_reg` int(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`no_reg`, `nama_siswa`, `tanggal_daftar`, `alamat`, `keterangan`, `jk`) VALUES
(202301, 'MUHAMMAD MUHAJIR SADDAMI', '2023-12-08', 'GERUNG, LOBAR', 'LENGKAP', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `kepala_sekolah`
--

CREATE TABLE `kepala_sekolah` (
  `no_reg` int(30) NOT NULL,
  `nisn` int(50) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kepala_sekolah`
--

INSERT INTO `kepala_sekolah` (`no_reg`, `nisn`, `nama_siswa`, `tanggal_daftar`, `keterangan`, `jk`) VALUES
(202301, 2123322, 'MUHAMMAD MUHAJIR SADDAMI', '2023-12-14', 'LENGKAP', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nik` int(30) NOT NULL,
  `no_kk` int(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nik`, `no_kk`, `nama`, `nama_ayah`, `nama_ibu`, `alamat`, `jk`) VALUES
(2021503035, 2147483647, 'Muhajir geg', 'Supandi', 'Aulia', 'Secang, Kalipuro', 'L'),
(2021503036, 2147483647, 'Muhajir Soleh q', 'tyjvjhc', 'hwfkwfjc', 'asdadfa', 'P'),
(2147483647, 2147483647, 'Muhammad Saladin', 'frfgregergr', 'rwretttee', 'fwfrttgeger', 'L');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`no_reg`);

--
-- Indexes for table `kepala_sekolah`
--
ALTER TABLE `kepala_sekolah`
  ADD PRIMARY KEY (`no_reg`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
