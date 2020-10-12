-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2020 at 02:02 PM
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
-- Table structure for table `gp_user_access`
--

CREATE TABLE `gp_user_access` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `menu_sub_menu` int(11) NOT NULL,
  `active` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gp_user_access`
--

INSERT INTO `gp_user_access` (`id`, `username`, `menu_sub_menu`, `active`) VALUES
(1, 'admin', 1, '1'),
(2, 'admin', 2, '1'),
(3, 'admin', 3, '1'),
(4, 'admin', 4, '1'),
(5, 'admin', 7, '1'),
(6, 'admin', 8, '1'),
(7, 'admin', 5, '1'),
(8, 'admin', 10, '1'),
(9, 'admin', 11, '1'),
(10, 'admin', 9, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gp_user_access`
--
ALTER TABLE `gp_user_access`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gp_user_access`
--
ALTER TABLE `gp_user_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
