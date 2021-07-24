-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2021 at 06:40 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jodi_game`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'demo', '9029186750');

-- --------------------------------------------------------

--
-- Table structure for table `game_time`
--

CREATE TABLE `game_time` (
  `game_time_id` int(11) NOT NULL,
  `game_time` varchar(20) NOT NULL,
  `g_time` time NOT NULL,
  `interval` int(20) NOT NULL,
  `saving` int(20) NOT NULL DEFAULT 10,
  `cancel_ticket` int(20) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game_time`
--

INSERT INTO `game_time` (`game_time_id`, `game_time`, `g_time`, `interval`, `saving`, `cancel_ticket`) VALUES
(1, '09:00 AM', '09:00:00', 15, 10, 2),
(2, '09:15 AM', '09:15:00', 15, 10, 2),
(3, '09:30 AM', '09:30:00', 15, 10, 2),
(4, '09:45 AM', '09:45:00', 15, 10, 2),
(5, '10:00 AM', '10:00:00', 15, 10, 2),
(6, '10:15 AM', '10:15:00', 15, 10, 2),
(7, '10:30 AM', '10:30:00', 15, 10, 2),
(8, '10:45 AM', '10:45:00', 15, 10, 2),
(9, '11:00 AM', '11:00:00', 15, 10, 2),
(10, '11:15 AM', '11:15:00', 15, 10, 2),
(11, '11:30 AM', '11:30:00', 15, 10, 2),
(12, '11:45 AM', '11:45:00', 15, 10, 2),
(13, '12:00 PM', '12:00:00', 15, 10, 2),
(14, '12:15 PM', '12:15:00', 15, 10, 2),
(15, '12:30 PM', '12:30:00', 15, 10, 2),
(16, '12:45 PM', '12:45:00', 15, 10, 2),
(17, '01:00 PM', '13:00:00', 15, 10, 2),
(18, '01:15 PM', '13:15:00', 15, 10, 2),
(19, '01:30 PM', '13:30:00', 15, 10, 2),
(20, '01:45 PM', '13:45:00', 15, 10, 2),
(21, '02:00 PM', '14:00:00', 15, 10, 2),
(22, '02:15 PM', '14:15:00', 15, 10, 2),
(23, '02:30 PM', '14:30:00', 15, 10, 2),
(24, '02:45 PM', '14:45:00', 15, 10, 2),
(25, '03:00 PM', '15:00:00', 15, 10, 2),
(26, '03:15 PM', '15:15:00', 15, 10, 2),
(27, '03:30 PM', '15:30:00', 15, 10, 2),
(28, '03:45 PM', '15:45:00', 15, 10, 2),
(29, '04:00 PM', '16:00:00', 15, 10, 2),
(30, '04:15 PM', '16:15:00', 15, 10, 2),
(31, '04:30 PM', '16:30:00', 15, 10, 2),
(32, '04:45 PM', '16:45:00', 15, 10, 2),
(33, '05:00 PM', '17:00:00', 15, 10, 2),
(34, '05:15 PM', '17:15:00', 15, 10, 2),
(35, '05:30 PM', '17:30:00', 15, 10, 2),
(36, '05:45 PM', '17:45:00', 15, 10, 2),
(37, '06:00 PM', '18:00:00', 15, 10, 2),
(38, '06:15 PM', '18:15:00', 15, 10, 2),
(39, '06:30 PM', '18:30:00', 15, 10, 2),
(40, '06:45 PM', '18:45:00', 15, 10, 2),
(41, '07:00 PM', '19:00:00', 15, 10, 2),
(42, '07:15 PM', '19:15:00', 15, 10, 2),
(43, '07:30 PM', '19:30:00', 15, 10, 2),
(44, '07:45 PM', '19:45:00', 15, 10, 2),
(45, '08:00 PM', '20:00:00', 15, 10, 2),
(46, '08:15 PM', '20:15:00', 15, 10, 2),
(47, '08:30 PM', '20:30:00', 15, 10, 2),
(48, '08:45 PM', '20:45:00', 15, 10, 2),
(49, '09:00 PM', '21:00:00', 15, 10, 2),
(50, '09:15 PM', '21:15:00', 15, 10, 2),
(51, '09:30 PM', '21:30:00', 15, 10, 2),
(52, '09:45 PM', '21:45:00', 15, 10, 2),
(53, '10:00 PM', '22:00:00', 15, 10, 2),
(54, '10:15 PM', '22:15:00', 15, 10, 2),
(55, '10:30 PM', '22:30:00', 15, 10, 2),
(56, '10:45 PM', '22:45:00', 15, 10, 2),
(57, '11:00 PM', '23:00:00', 15, 10, 2),
(58, '11:15 PM', '23:15:00', 15, 10, 2),
(59, '11:30 PM', '23:30:00', 15, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `result_number_setting`
--

CREATE TABLE `result_number_setting` (
  `id` int(11) NOT NULL,
  `game_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch_0` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch_3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch_4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch_5` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch_6` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch_7` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch_8` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch_9` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ignore_number` text COLLATE utf8_unicode_ci NOT NULL,
  `added_date` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `added_time` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `test` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `welcome_msg`
--

CREATE TABLE `welcome_msg` (
  `id` int(11) NOT NULL,
  `msg` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `welcome_msg`
--

INSERT INTO `welcome_msg` (`id`, `msg`) VALUES
(1, 'Welcome To The JodiBazar Result Chart');

-- --------------------------------------------------------

--
-- Table structure for table `win_card`
--

CREATE TABLE `win_card` (
  `id` int(255) NOT NULL,
  `game_time` varchar(20) NOT NULL,
  `batch_0` varchar(255) NOT NULL,
  `batch_1` varchar(255) NOT NULL,
  `batch_2` varchar(255) NOT NULL,
  `batch_3` varchar(255) NOT NULL,
  `batch_4` varchar(255) NOT NULL,
  `batch_5` varchar(255) NOT NULL,
  `batch_6` varchar(255) NOT NULL,
  `batch_7` varchar(255) NOT NULL,
  `batch_8` varchar(255) NOT NULL,
  `batch_9` varchar(255) NOT NULL,
  `win_date` varchar(20) NOT NULL,
  `added_time` varchar(20) NOT NULL,
  `type` varchar(255) NOT NULL,
  `g_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_time`
--
ALTER TABLE `game_time`
  ADD PRIMARY KEY (`game_time_id`);

--
-- Indexes for table `result_number_setting`
--
ALTER TABLE `result_number_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `welcome_msg`
--
ALTER TABLE `welcome_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `win_card`
--
ALTER TABLE `win_card`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `game_time`
--
ALTER TABLE `game_time`
  MODIFY `game_time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `result_number_setting`
--
ALTER TABLE `result_number_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `welcome_msg`
--
ALTER TABLE `welcome_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `win_card`
--
ALTER TABLE `win_card`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
