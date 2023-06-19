-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 04:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayarzakat`
--

CREATE TABLE `bayarzakat` (
  `id_zakat` int(11) NOT NULL,
  `nama_KK` varchar(50) NOT NULL,
  `jumlah_tanggungan` int(11) NOT NULL,
  `jumlah_tanggunganyangdibayar` int(11) NOT NULL,
  `bayar_beras` float NOT NULL,
  `bayar_uang` float NOT NULL,
  `jenis_bayar` enum('beras','uang') NOT NULL,
  `id_muzakki` int(11) NOT NULL,
  `pembayaran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bayarzakat`
--

INSERT INTO `bayarzakat` (`id_zakat`, `nama_KK`, `jumlah_tanggungan`, `jumlah_tanggunganyangdibayar`, `bayar_beras`, `bayar_uang`, `jenis_bayar`, `id_muzakki`, `pembayaran`) VALUES
(22, 'gagan', 5, 3, 0, 82500, 'uang', 1, 'Sudah Bayar'),
(25, 'Dikri', 3, 2, 5, 0, 'beras', 2, 'Sudah Bayar'),
(26, 'Andriana', 4, 3, 0, 82500, 'uang', 9, 'Sudah Bayar'),
(27, 'muslim', 6, 5, 12.5, 0, 'beras', 6, 'Sudah Bayar'),
(29, 'Herlambang', 3, 2, 0, 55000, 'uang', 10, 'Sudah Bayar'),
(30, 'dikri1', 5, 4, 10, 0, 'beras', 4, 'Sudah Bayar'),
(31, 'dikri', 4, 3, 0, 135000, 'uang', 8, 'Sudah Bayar'),
(32, 'dikri12', 5, 3, 0, 135000, 'uang', 5, 'Sudah Bayar'),
(33, 'Alif Mamat', 28, 5, 0, 225000, 'uang', 7, 'Sudah Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_mustahik`
--

CREATE TABLE `kategori_mustahik` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `jumlah_hak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_mustahik`
--

INSERT INTO `kategori_mustahik` (`id_kategori`, `nama_kategori`, `jumlah_hak`) VALUES
(1, 'Amil', 3),
(3, 'Muallaf', 3),
(4, 'Ibnu Sabil', 3),
(9, 'Riqab', 2),
(10, 'Gharim', 1),
(11, 'Fisabilillah', 2),
(13, 'miskin', 2),
(14, 'fakir', 2),
(15, 'mampu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mustahik_lainnya`
--

CREATE TABLE `mustahik_lainnya` (
  `id_mustahiklainnya` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `hak` varchar(50) NOT NULL,
  `penerimaan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mustahik_lainnya`
--

INSERT INTO `mustahik_lainnya` (`id_mustahiklainnya`, `nama`, `kategori`, `hak`, `penerimaan`) VALUES
(16, 'Dikri', 'Riqab', '2', 5),
(17, 'Hifdhika', 'Riqab', '2', 5),
(18, 'Ade Salman', 'Fakir', '3', 7.5),
(19, 'Andriana', 'Muallaf', '3', 7.5),
(20, 'Herlambang', 'Fisabilillah', '2', 5),
(21, 'Gagan', 'Amil', '3', 7.5);

-- --------------------------------------------------------

--
-- Table structure for table `mustahik_warga`
--

CREATE TABLE `mustahik_warga` (
  `id_mustahikwarga` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kategori` enum('fakir','miskin','mampu') NOT NULL,
  `hak_beras` varchar(50) NOT NULL,
  `id_muzakki` int(11) NOT NULL,
  `penerimaan` varchar(20) NOT NULL,
  `hak_uang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mustahik_warga`
--

INSERT INTO `mustahik_warga` (`id_mustahikwarga`, `nama`, `kategori`, `hak_beras`, `id_muzakki`, `penerimaan`, `hak_uang`) VALUES
(114, 'Riziq', 'mampu', '2.5 Kg', 1, '', 'Rp 90.000'),
(115, 'Alif Mamat', 'mampu', '2.5 Kg', 7, 'Belum ', 'Rp 45.000'),
(118, 'Andriana', 'fakir', '5 Kg', 9, 'Sudah ', 'Rp 90.000'),
(119, 'Solihin', 'fakir', '5 Kg', 12, 'Sudah ', 'Rp 90.000'),
(120, 'dikri1', 'miskin', '5 Kg', 4, 'Sudah ', 'Rp 90.000');

-- --------------------------------------------------------

--
-- Table structure for table `muzakki`
--

CREATE TABLE `muzakki` (
  `id_muzakki` int(11) NOT NULL,
  `nama_muzakki` varchar(50) NOT NULL,
  `jumlah_tanggungan` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `muzakki`
--

INSERT INTO `muzakki` (`id_muzakki`, `nama_muzakki`, `jumlah_tanggungan`, `keterangan`) VALUES
(1, 'Riziq', 3, 'Mampu'),
(2, 'Dikri', 3, 'Fakir'),
(4, 'dikri1', 5, 'Miskin'),
(5, 'dikri12', 5, 'Fakir'),
(6, 'muslim', 6, 'Fakir'),
(7, 'Alif Mamat', 28, 'Mampu'),
(8, 'dikri', 4, 'Miskin'),
(9, 'Andriana', 4, 'Fakir'),
(10, 'Herlambang', 3, 'Miskin'),
(12, 'Solihin', 4, 'Fakir');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayarzakat`
--
ALTER TABLE `bayarzakat`
  ADD PRIMARY KEY (`id_zakat`);

--
-- Indexes for table `kategori_mustahik`
--
ALTER TABLE `kategori_mustahik`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `mustahik_lainnya`
--
ALTER TABLE `mustahik_lainnya`
  ADD PRIMARY KEY (`id_mustahiklainnya`);

--
-- Indexes for table `mustahik_warga`
--
ALTER TABLE `mustahik_warga`
  ADD PRIMARY KEY (`id_mustahikwarga`);

--
-- Indexes for table `muzakki`
--
ALTER TABLE `muzakki`
  ADD PRIMARY KEY (`id_muzakki`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayarzakat`
--
ALTER TABLE `bayarzakat`
  MODIFY `id_zakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `kategori_mustahik`
--
ALTER TABLE `kategori_mustahik`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mustahik_lainnya`
--
ALTER TABLE `mustahik_lainnya`
  MODIFY `id_mustahiklainnya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `mustahik_warga`
--
ALTER TABLE `mustahik_warga`
  MODIFY `id_mustahikwarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `muzakki`
--
ALTER TABLE `muzakki`
  MODIFY `id_muzakki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
