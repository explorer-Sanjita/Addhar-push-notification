-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 23, 2022 at 05:15 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addhar_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency_link`
--

DROP TABLE IF EXISTS `agency_link`;
CREATE TABLE IF NOT EXISTS `agency_link` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `agency_url` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addhar_number` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `is_deleted` enum('NO','YES') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_at` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `updated_at` int(11) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `agency_code` (`agency_code`,`addhar_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agency_notification`
--

DROP TABLE IF EXISTS `agency_notification`;
CREATE TABLE IF NOT EXISTS `agency_notification` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `agency_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addhar_number` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `is_deleted` enum('NO','YES') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_at` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `updated_at` int(11) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_eid` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Male','Female','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Male',
  `dob` date DEFAULT NULL,
  `addhar_number` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `is_deleted` enum('NO','YES') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NO',
  `created_at` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `updated_at` int(11) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_phone` (`user_phone`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `addhar_number` (`addhar_number`),
  UNIQUE KEY `user_name` (`user_name`,`middle_name`,`last_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_eid`, `user_name`, `middle_name`, `last_name`, `gender`, `dob`, `addhar_number`, `user_address`, `user_phone`, `user_email`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '20011231213344', 'rakesh', 'rajendra', 'bhatwani', 'Male', '1987-05-28', '123412341234', 'Pune Maharashtra', '1234567890', 'rakesh.bhatwani@example.com', 'ACTIVE', 'NO', 1640071758, 1661231547),
(2, '20011231181290', 'sameer', 'aman', 'tiwari', 'Male', '1992-04-14', '123123123123', '', '1234567891', 'sameer.tiwari@example.com', 'ACTIVE', 'NO', 1659151639, 1659409062),
(3, '20011231213456', 'rohit', 'hitendra', 'mistra', 'Male', '2001-10-12', '121212121212', 'Nashik,Maharashtra', '1234567892', 'rohit.mistra@example.com', 'ACTIVE', 'NO', 1659155106, 1661136603),
(4, '20011231213546', 'raghavi', 'anupam', 'khair', 'Female', '2004-08-17', '123451234512', 'Dhule, Maharashtra - 655341', '1234567894', 'raghavi.khair@example.com', 'ACTIVE', 'NO', 1659155106, 1661268005),
(5, '20011231323452', 'kalyani', 'dyaneshwar', 'mokal', 'Female', '1998-12-09', '123456123456', '', '1234567893', 'kalyani.mokal@example.com', 'ACTIVE', 'NO', 1659151639, 1659409062);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
