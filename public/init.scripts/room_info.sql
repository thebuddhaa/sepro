-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2015 at 09:47 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sepro`
--

-- --------------------------------------------------------

--
-- Table structure for table `room_info`
--

CREATE TABLE IF NOT EXISTS `room_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `room_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `capacity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facility` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `room_info_room_no_unique` (`room_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `room_info`
--

INSERT INTO `room_info` (`id`, `room_no`, `location`, `room_type`, `capacity`, `facility`, `created_at`, `updated_at`) VALUES
(1, 'sic-201', '2nd floor, C block', 'classroom', '70', 'AC, Projector', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'sic-205', '2nd floor, C block', 'classroom', '40', 'AC, Projector', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'sic-301', '3nd floor, C block', 'classroom', '70', 'AC, Projector', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'SIC-305', '3nd floor, C block', 'Classroom', '40', 'AC, Projector', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'SIC-204', '2nd floor, C block', 'Classroom', '40', 'AC, Projector', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'SIC-304', '3rd floor, C block', 'Classroom', '40', 'AC, Projector', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'SIC-106B', '1st floor, C block', 'Conference Room', '30', 'AC, Projector', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'SIB-301/201', '3rd/2nd floor, B block', 'Lecture Hall', '120', 'AC, Projector', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'SIB-302/202', '3rd/2nd floor, B block', 'Lecture Hall', '120', 'AC, Projector', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'SIA-113', '1st floor, A block', 'Meeting Room', '20', 'AC, Projector', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'SIA-221', '2nd floor, A block', 'Meeting Room', '20', 'AC, Projector', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'SIA-321', '3rd floor, A block', 'Meeting Room', '20', 'AC, Projector', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
