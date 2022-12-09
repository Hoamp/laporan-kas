-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 10:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `uang` int(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id`, `hari`, `uang`, `tanggal`) VALUES
(2, 'Selasa', 2700000, '2022-11-14'),
(3, 'Jumat', 2300000, '2022-11-10'),
(4, 'Minggu', 3150000, '2022-11-09'),
(5, 'Rabu', 9000000, '2022-11-07'),
(6, 'Senin', 3400000, '2022-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'angming', '$2y$10$4hgkikV6eA4sQZPL/qgaQexfyKdapYt6mMsUDtGYzRbsrDS7B1.vq'),
(2, 'thomas', '$2y$10$kKAoEen9TdQfb/W6E7YEAei2jOit2ZBstyFMeR.ioHwohZb8fTe/O'),
(3, 'tms', '$2y$10$DtuDtcg1oO0lOxpYb1ik5uHrqQq86EVpLoCnKPCHvMIxpCJK3gi6C'),
(4, 'admin', '$2y$10$u805IuOU4GXmvVWreNLjwu9smtqndiuAS8pco0xIHHYUXtcnK63xq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
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
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
