-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2020 at 02:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `11ftc-gatepass`
--

-- --------------------------------------------------------

--
-- Table structure for table `gp_disposition`
--

CREATE TABLE `gp_disposition` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `active` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gp_disposition`
--

INSERT INTO `gp_disposition` (`id`, `code`, `name`, `description`, `active`) VALUES
(1, 'safekeep', 'Safe Keep', 'Safe Keep', '1'),
(2, 'project-use', 'Project Use', 'Project Use', '1'),
(3, 're-use', 'Re Use', 'Re Use', '1'),
(4, 'inclusion-in-delivery', 'Inclusion In Delivery', 'Inclusion In Delivery', '1'),
(5, 'disposal', 'Disposal', 'Disposal', '1'),
(6, 'refurbishment', 'Refurbishment', 'Refurbishment', '1'),
(7, 'rented', 'Rented', 'Rented', '1'),
(8, 'rejected-delivery', 'Rejected Delivery', 'Rejected Delivery', '1'),
(9, 'wrong-materials', 'Wrong Materials', 'Wrong Materials', '1'),
(10, 'over-delivery', 'Over Delivery', 'Over Delivery', '1'),
(11, 'borrowed', 'Borrowed', 'Borrowed', '1'),
(12, 'sample', 'Sample', 'Sample', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gp_disposition`
--
ALTER TABLE `gp_disposition`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gp_disposition`
--
ALTER TABLE `gp_disposition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
