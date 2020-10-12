-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2020 at 02:01 PM
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
-- Table structure for table `gp_non_company_items_line`
--

CREATE TABLE `gp_non_company_items_line` (
  `id` int(11) NOT NULL,
  `non_company_items_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `non_company_items_no` varchar(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `qty` decimal(18,5) NOT NULL,
  `unit_of_measurementc` varchar(255) NOT NULL,
  `item_source` varchar(255) NOT NULL,
  `disposition` varchar(255) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gp_non_company_items_line`
--
ALTER TABLE `gp_non_company_items_line`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gp_non_company_items_line`
--
ALTER TABLE `gp_non_company_items_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
