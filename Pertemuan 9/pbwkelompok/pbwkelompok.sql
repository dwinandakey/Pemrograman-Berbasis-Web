-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 12:30 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbwkelompok`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `goldar` varchar(5) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `goldar`, `alamat`, `kontak`, `gender`) VALUES
(12, 'Fauzan', 'A+', 'Jl H Hasbi No 23 RT9/RW9,Kelurahan Bidara cina\r\nJATINEGARA', '083190451772', 'Laki-Laki'),
(13, 'Very', 'A+', 'Jalan masjid no 9', '08310837462', 'Laki-Laki'),
(14, 'Briel', 'B+', 'Jalan Otista Tengah', '0831094756', 'Laki-Laki'),
(15, 'Frans', 'O', 'Jalan Hasbi masuk dikit', '08310098746', 'Laki-Laki'),
(16, 'Alkindi', 'AB', 'Jalan kampung melayu', '08310098364', 'Laki-Laki'),
(17, 'Dodi', 'B+', 'Jalan mekdi', '08312634345', 'Laki-Laki'),
(18, 'Trisna', 'A+', 'Jalan hj yahya no 90', '08312618263', 'Laki-Laki'),
(19, 'Ilham', 'O', 'pasar sawo', '08332535464', 'Laki-Laki'),
(20, 'Key', 'B', 'jalan tifa', '082213104552', 'Laki-Laki');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
