-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2018 at 05:40 AM
-- Server version: 10.0.34-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dharmani_lyndon_marine`
--

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id` int(11) NOT NULL,
  `survey_no` varchar(255) NOT NULL,
  `last_survey_date` datetime NOT NULL,
  `postponed_date` datetime DEFAULT NULL,
  `due_date` datetime NOT NULL,
  `range_from` datetime DEFAULT NULL,
  `range_to` datetime DEFAULT NULL,
  `comments` text NOT NULL,
  `reminder_due` int(11) NOT NULL,
  `reminder_range` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`, `survey_no`, `last_survey_date`, `postponed_date`, `due_date`, `range_from`, `range_to`, `comments`, `reminder_due`, `reminder_range`, `status`, `created`, `modified`) VALUES
(2, 'test ', '2018-02-01 00:00:00', '2018-04-30 00:00:00', '2018-02-08 00:00:00', '2018-01-01 00:00:00', '2018-03-01 00:00:00', 'testing the survey ', 30, 45, 0, '2018-02-12 05:57:49', '2018-02-12 05:57:49'),
(5, 'tes4', '2018-02-02 00:00:00', '2018-02-28 00:00:00', '2018-02-14 00:00:00', '2018-03-01 00:00:00', '2018-01-01 00:00:00', 'testing the survey 3', 30, 45, 0, '2018-02-12 06:12:33', '2018-02-12 06:12:33'),
(7, 'test', '2018-07-02 00:00:00', '2018-07-02 00:00:00', '2018-07-02 00:00:00', '2018-07-09 00:00:00', '1970-01-19 00:00:00', 'test', 55, 55, 0, '2018-02-13 05:31:11', '2018-02-13 11:12:54'),
(8, 'test555', '2018-02-14 00:00:00', '2018-02-12 00:00:00', '2018-02-28 00:00:00', '2018-01-01 00:00:00', '2018-03-01 00:00:00', 'test', 6546, 6546, 0, '2018-02-13 05:37:24', '2018-02-13 12:07:15'),
(10, 'hjgh', '2018-02-12 00:00:00', '1970-01-01 00:00:00', '2018-02-13 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '', 54, 54, 0, '2018-02-13 07:14:18', '2018-02-13 07:14:18'),
(11, 'skjdh', '2018-02-13 00:00:00', '1970-01-01 00:00:00', '2018-02-12 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '', 0, 0, 0, '2018-02-13 07:21:10', '2018-02-13 07:21:10'),
(13, '143', '2018-02-12 00:00:00', '0000-00-00 00:00:00', '2018-03-21 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 0, 0, '2018-02-13 08:32:57', '2018-02-13 08:32:57'),
(14, 'survey test 15', '2018-02-01 00:00:00', '2018-03-01 00:00:00', '2018-02-28 00:00:00', '2018-02-28 00:00:00', '2018-03-31 00:00:00', 'testing the survey ', 30, 40, 0, '2018-02-13 08:35:41', '2018-02-13 08:35:41'),
(15, 'testing survey 18', '2018-02-04 00:00:00', '0000-00-00 00:00:00', '2018-02-14 00:00:00', '2018-01-01 00:00:00', '2018-02-13 00:00:00', 'testing the survey 14', 30, 40, 0, '2018-02-13 08:37:41', '2018-02-13 08:37:41'),
(16, 'testing survey 19', '2018-01-01 00:00:00', '2018-02-13 00:00:00', '2018-02-28 00:00:00', '2018-03-15 00:00:00', '2018-04-01 00:00:00', 'testing the app', 30, 45, 0, '2018-02-13 08:57:30', '2018-02-13 13:58:00'),
(17, 'testing survey 20', '2018-02-01 00:00:00', '2018-02-28 00:00:00', '2018-03-15 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'testing the survey ', 30, 45, 0, '2018-02-13 09:00:29', '2018-02-13 09:00:29'),
(18, 'testing survey 21', '2018-02-04 00:00:00', '2018-02-02 00:00:00', '2018-02-15 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'testing the survey ', 30, 45, 0, '2018-02-13 09:01:55', '2018-02-13 09:01:55'),
(19, 'testing survey 22', '2018-02-14 00:00:00', '2018-02-03 00:00:00', '2018-02-14 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'testing survey', 30, 45, 0, '2018-02-13 09:16:31', '2018-02-13 09:16:31'),
(20, 'survey1', '2018-02-01 00:00:00', '2018-03-29 00:00:00', '2018-02-09 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'gfd', 4, 5, 0, '2018-02-14 10:21:50', '2018-02-14 04:49:57'),
(21, 'survey2', '2018-02-10 00:00:00', '2018-02-28 00:00:00', '0000-00-00 00:00:00', '2018-01-11 00:00:00', '2018-02-21 00:00:00', 'comments', 4, 5, 0, '2018-02-14 10:56:20', '2018-02-14 04:50:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
