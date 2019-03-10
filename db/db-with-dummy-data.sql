-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2018 at 02:22 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_db`
--
CREATE DATABASE IF NOT EXISTS `store_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `store_db`;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `departmentName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `departmentName`) VALUES
(26, ''),
(5, 'Civil'),
(1, 'Computer'),
(6, 'Electronics'),
(9, 'RAC'),
(3, 'Welding');

-- --------------------------------------------------------

--
-- Table structure for table `issued`
--

CREATE TABLE `issued` (
  `id` int(100) NOT NULL,
  `timing` date NOT NULL,
  `description` varchar(240) NOT NULL,
  `category` varchar(14) NOT NULL,
  `name` varchar(100) NOT NULL,
  `issued` int(10) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `scheme` varchar(100) NOT NULL,
  `inventory` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issued`
--

INSERT INTO `issued` (`id`, `timing`, `description`, `category`, `name`, `issued`, `unit`, `department`, `scheme`, `inventory`) VALUES
(1, '2018-07-26', 'popo', 'PAINTING BRUSH', 'aman', 20, 'Pcs', 'Computer', 'stc', 'stock'),
(2, '2018-09-05', '', 'PAINTING BRUSH', '', 0, 'Pcs', '', 'PMKVY', 'stock'),
(3, '2018-09-05', '', 'PAINTING BRUSH', '', 0, 'Pcs', '', 'PMKVY', 'stock'),
(4, '2018-09-05', '', 'PAINTING BRUSH', '', 22352, 'Pcs', '', 'PMKVY', 'stock'),
(5, '2018-09-05', '', 'PEN', '', 12, 'Dozen', '', 'PMKVY', 'stationary');

-- --------------------------------------------------------

--
-- Table structure for table `items_objects`
--

CREATE TABLE `items_objects` (
  `id` int(100) NOT NULL,
  `item` varchar(150) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `inventory` varchar(150) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_objects`
--

INSERT INTO `items_objects` (`id`, `item`, `unit`, `inventory`, `balance`) VALUES
(1, 'TABLE', 'Pcs', 'assets', 537),
(6, 'PEN', 'Dozen', 'stationary', 0),
(8, 'PAINTING BRUSH', 'Pcs', 'stock', 0);

-- --------------------------------------------------------

--
-- Table structure for table `received`
--

CREATE TABLE `received` (
  `id` int(100) NOT NULL,
  `timing` date NOT NULL,
  `billNumber` int(10) NOT NULL,
  `vendor` varchar(240) NOT NULL,
  `category` varchar(108) NOT NULL,
  `amount` int(10) NOT NULL,
  `gst` varchar(10) NOT NULL,
  `taxableValue` float NOT NULL,
  `received` int(10) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `scheme` varchar(100) NOT NULL,
  `inventory` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `received`
--

INSERT INTO `received` (`id`, `timing`, `billNumber`, `vendor`, `category`, `amount`, `gst`, `taxableValue`, `received`, `unit`, `scheme`, `inventory`) VALUES
(5, '2018-07-27', 4744, '7447474', 'PAINTING BRUSH', 47474, '0%', 47474, 4444, 'Pcs', 'PMKVY', 'stock'),
(6, '2018-07-27', 4744, '7447474', 'PAINTING BRUSH', 47474, '0%', 47474, 4444, 'Pcs', 'PMKVY', 'stock'),
(7, '2018-07-27', 4744, '7447474', 'PAINTING BRUSH', 47474, '0%', 47474, 4444, 'Pcs', 'PMKVY', 'stock'),
(11, '2018-07-27', 1223, 'sad', 'TABLE', 123456, '12%', 110229, 120, 'Pcs', 'PMKVY', 'assets'),
(12, '2018-07-27', 1223, 'sad', 'TABLE', 123456, '12%', 110229, 120, 'Pcs', 'PMKVY', 'assets'),
(13, '2018-07-27', 1223, 'sad', 'TABLE', 123456, '12%', 110229, 120, 'Pcs', 'PMKVY', 'assets'),
(14, '2018-08-19', 0, '', 'TABLE', 0, '0%', 0, 0, 'Pcs', 'PMKVY', 'assets'),
(15, '2018-08-19', 0, '', 'TABLE', 0, '0%', 0, 0, 'Pcs', 'PMKVY', 'assets'),
(16, '2018-08-19', 0, '', 'TABLE', 0, '0%', 0, 0, 'Pcs', 'PMKVY', 'assets'),
(17, '2018-08-19', 0, '', 'PAINTING BRUSH', 0, '0%', 0, 0, 'Pcs', 'PMKVY', 'stock'),
(18, '2018-08-22', 0, '', 'PAINTING BRUSH', 123432, '18%', 104603, 12, 'Pcs', 'PMKVY', 'stock'),
(19, '2018-08-26', 454, 'lakd', 'TABLE', 545, '12%', 486.607, 45, 'Pcs', 'PMKVY', 'assets'),
(20, '2018-08-30', 1231, '', 'TABLE', 132, '28%', 103.125, 12, 'Pcs', 'PMKVY', 'assets'),
(21, '2018-08-30', 1235, 'gk mech', 'PEN', 1234, '28%', 964.062, 12, 'Dozen', 'PMKVY', 'stationary');

-- --------------------------------------------------------

--
-- Table structure for table `scheme`
--

CREATE TABLE `scheme` (
  `id` int(100) NOT NULL,
  `schemeName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scheme`
--

INSERT INTO `scheme` (`id`, `schemeName`) VALUES
(1, 'PMKVY'),
(2, 'RTC');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `vendorName` varchar(30) NOT NULL,
  `vendorDeal` text NOT NULL,
  `vendorAddress` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `vendorName`, `vendorDeal`, `vendorAddress`) VALUES
(3, 'gk mech', '', 'daba road, ludhiana'),
(4, '', '', ''),
(5, '', '', ''),
(6, '', '', ''),
(7, '', '', ''),
(8, '', '', ''),
(9, '', '', ''),
(10, '', '', ''),
(11, '', '', ''),
(12, '', '', ''),
(13, '', '', ''),
(14, '', '', ''),
(15, 'ANYTHING', '', 'ANYWHERE\r\n'),
(16, 'ANYTHING', '', 'ANYWHERE\r\n'),
(17, 'ANYTHING', '', 'ANYWHERE\r\n'),
(18, 'ANYTHING', '', 'ANYWHERE\r\n'),
(19, 'ADMIN', 'CELING', 'ANYWHERE          '),
(20, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(21, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(22, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(23, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(24, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(25, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(26, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(27, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(28, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(29, 'ADMIN', 'CELING', 'HOUSE NUMBER-1599'),
(30, '', '', ''),
(31, '', '', '\r\n          ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departmentName` (`departmentName`);

--
-- Indexes for table `issued`
--
ALTER TABLE `issued`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_objects`
--
ALTER TABLE `items_objects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item` (`item`);

--
-- Indexes for table `received`
--
ALTER TABLE `received`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scheme`
--
ALTER TABLE `scheme`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schemeName` (`schemeName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `issued`
--
ALTER TABLE `issued`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items_objects`
--
ALTER TABLE `items_objects`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `received`
--
ALTER TABLE `received`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `scheme`
--
ALTER TABLE `scheme`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
