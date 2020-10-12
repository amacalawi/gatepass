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
-- Table structure for table `gp_menu_sub_menu`
--

CREATE TABLE `gp_menu_sub_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `sub_menu` varchar(255) NOT NULL,
  `active` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gp_menu_sub_menu`
--

INSERT INTO `gp_menu_sub_menu` (`id`, `menu`, `sub_menu`, `active`) VALUES
(1, 'dashboard', 'dashboard', '1'),
(2, 'gatepass', 'non-company-items', '1'),
(3, 'maintenance', 'menu', '1'),
(4, 'maintenance', 'sub-menu', '1'),
(5, 'maintenance', 'menu-sub-menu', '1'),
(6, 'maintenance', 'disposition', '1'),
(7, 'maintenance', 'item-source', '1'),
(8, 'maintenance', 'item-source-disposition', '1'),
(9, 'maintenance', 'item', '1'),
(10, 'maintenance', 'unit-of-measurement', '1'),
(11, 'maintenance', 'user-access', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gp_menu_sub_menu`
--
ALTER TABLE `gp_menu_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gp_menu_sub_menu`
--
ALTER TABLE `gp_menu_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
