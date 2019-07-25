-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2019 at 04:41 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classroombooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `academicyears`
--

CREATE TABLE `academicyears` (
  `date_start` date NOT NULL,
  `date_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(6) UNSIGNED NOT NULL,
  `period_id` int(6) UNSIGNED NOT NULL,
  `week_id` int(6) UNSIGNED DEFAULT NULL,
  `day_num` tinyint(1) UNSIGNED DEFAULT NULL,
  `room_id` int(6) UNSIGNED NOT NULL,
  `user_id` int(6) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `notes` varchar(100) DEFAULT NULL,
  `cancelled` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `holiday_id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(20190124174600);

-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE `periods` (
  `period_id` int(6) UNSIGNED NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `name` varchar(30) NOT NULL,
  `days` int(2) UNSIGNED NOT NULL,
  `bookable` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `day_1` tinyint(1) UNSIGNED DEFAULT 0,
  `day_2` tinyint(1) UNSIGNED DEFAULT 0,
  `day_3` tinyint(1) UNSIGNED DEFAULT 0,
  `day_4` tinyint(1) UNSIGNED DEFAULT 0,
  `day_5` tinyint(1) UNSIGNED DEFAULT 0,
  `day_6` tinyint(1) UNSIGNED DEFAULT 0,
  `day_7` tinyint(1) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roomfields`
--

CREATE TABLE `roomfields` (
  `field_id` int(6) UNSIGNED NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roomoptions`
--

CREATE TABLE `roomoptions` (
  `option_id` int(6) UNSIGNED NOT NULL,
  `field_id` int(6) UNSIGNED NOT NULL,
  `value` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(6) UNSIGNED NOT NULL,
  `user_id` int(6) UNSIGNED DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `location` varchar(40) DEFAULT NULL,
  `bookable` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `icon` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roomvalues`
--

CREATE TABLE `roomvalues` (
  `value_id` int(6) UNSIGNED NOT NULL,
  `room_id` int(6) UNSIGNED NOT NULL,
  `field_id` int(6) UNSIGNED NOT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `group` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`group`, `name`, `value`) VALUES
('crbs', 'bia', '0'),
('crbs', 'colour', '468ED8'),
('crbs', 'displaytype', 'day'),
('crbs', 'd_columns', 'periods'),
('crbs', 'logo', ''),
('crbs', 'name', 'YBPMMD'),
('crbs', 'website', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) UNSIGNED NOT NULL,
  `department_id` int(6) UNSIGNED DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `authlevel` tinyint(1) UNSIGNED NOT NULL,
  `displayname` varchar(255) DEFAULT NULL,
  `ext` varchar(255) DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `enabled` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `department_id`, `username`, `firstname`, `lastname`, `email`, `password`, `authlevel`, `displayname`, `ext`, `lastlogin`, `enabled`, `created`) VALUES
(1, NULL, 'admin', NULL, NULL, NULL, '$2y$10$RMIBoa16rM1Fki/syNEG4emhHXvaXAfNz5nLOhkc5WZ6nlyPO3gUS', 1, NULL, NULL, '2019-07-25 04:35:51', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `weekdates`
--

CREATE TABLE `weekdates` (
  `week_id` int(6) UNSIGNED NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `weeks`
--

CREATE TABLE `weeks` (
  `week_id` int(6) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `fgcol` char(6) DEFAULT NULL,
  `bgcol` char(6) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `period_id_room_id_user_id` (`period_id`,`room_id`,`user_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`holiday_id`);

--
-- Indexes for table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`period_id`);

--
-- Indexes for table `roomfields`
--
ALTER TABLE `roomfields`
  ADD PRIMARY KEY (`field_id`);

--
-- Indexes for table `roomoptions`
--
ALTER TABLE `roomoptions`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roomvalues`
--
ALTER TABLE `roomvalues`
  ADD PRIMARY KEY (`value_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD UNIQUE KEY `group_name` (`group`,`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `authlevel` (`authlevel`),
  ADD KEY `enabled` (`enabled`);

--
-- Indexes for table `weekdates`
--
ALTER TABLE `weekdates`
  ADD KEY `week_id` (`week_id`);

--
-- Indexes for table `weeks`
--
ALTER TABLE `weeks`
  ADD PRIMARY KEY (`week_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `holiday_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `period_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roomfields`
--
ALTER TABLE `roomfields`
  MODIFY `field_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roomoptions`
--
ALTER TABLE `roomoptions`
  MODIFY `option_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roomvalues`
--
ALTER TABLE `roomvalues`
  MODIFY `value_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `weeks`
--
ALTER TABLE `weeks`
  MODIFY `week_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
