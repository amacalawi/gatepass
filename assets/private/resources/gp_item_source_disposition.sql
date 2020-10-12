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
-- Table structure for table `gp_item_source_disposition`
--

CREATE TABLE `gp_item_source_disposition` (
  `id` int(11) NOT NULL,
  `item_source` varchar(255) NOT NULL,
  `disposition` varchar(255) NOT NULL,
  `active` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gp_item_source_disposition`
--

INSERT INTO `gp_item_source_disposition` (`id`, `item_source`, `disposition`, `active`) VALUES
(1, 'customer', 'safekeep', '1'),
(2, 'customer', 'project-use', '1'),
(3, 'customer', 're-use', '1'),
(4, 'customer', 'inclusion-in-delivery', '1'),
(5, 'customer', 'disposal', '1'),
(6, 'customer', 'refurbishment', '1'),
(7, 'personal', 'project-use', '1'),
(8, 'supplier', 'rented', '1'),
(9, 'supplier', 'rejected-delivery', '1'),
(10, 'supplier', 'wrong-materials', '1'),
(11, 'supplier', 'over-delivery', '1'),
(12, 'supplier', 'borrowed', '1'),
(13, 'supplier', 'sample', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gp_item_source_disposition`
--
ALTER TABLE `gp_item_source_disposition`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gp_item_source_disposition`
--
ALTER TABLE `gp_item_source_disposition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
