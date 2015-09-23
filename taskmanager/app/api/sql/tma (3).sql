-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2015 at 02:37 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tma`
--

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(500) NOT NULL,
  `task_details` longtext NOT NULL,
  `task_byuser` int(11) NOT NULL,
  `task_status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `task_name`, `task_details`, `task_byuser`, `task_status`, `created_at`, `updated_at`) VALUES
(1, 'First Activity', 'This is the First Activity Posted directly to DB', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Sulthan', 'testtest', 'test@test.com', '2015-08-29 13:50:47', '2015-08-29 13:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address` varchar(10000) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 11, 'dindigul\r\n', '2461588', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE IF NOT EXISTS `user_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `session` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `userid`, `session`, `created_at`, `updated_at`) VALUES
(1, 10, 'AkRXQfZ5bNY39KouLey6vJIxzqFHSTWVCDM8stm0c7hpBEUgj2', '2015-09-16 10:32:58', '2015-09-16 10:32:58'),
(2, 10, 'BydkPxcN3Z4Aq2nVKmWXM7zRe6GpCL1UOlrsfHDS5hYEaboQjJ', '2015-09-16 10:55:57', '2015-09-16 10:55:57'),
(3, 10, 'IhRPdaSQFeHY4k7LbO1zlNrABDvcnfsGmptT9ywX3o6g8WqM5C', '2015-09-16 10:56:10', '2015-09-16 10:56:10'),
(4, 10, '1dBcZkeqEuxDhLGPyO6mVI27fRJ4iFX9AbMwW5nKUj0rS8opHz', '2015-09-16 12:01:58', '2015-09-16 12:01:58'),
(5, 10, 'dPTlZm48sVMHofbnG7Le0qA2uy13wCDRjBF9JzYravciSQxEkK', '2015-09-16 12:16:32', '2015-09-16 12:16:32'),
(6, 1, '1YP4uNtRQVShHsrxwX7gUne9yp32cIOqFfE0i6KWjaTBdLkCov', '2015-09-16 13:26:10', '2015-09-16 13:26:10'),
(7, 1, 'UJP07iZ6x2fYH4WFqNXptL9mgAGCvnQOkVsjM5EIwuaRecryhb', '2015-09-16 13:32:29', '2015-09-16 13:32:29'),
(8, 1, 'LxmfheGHrYWqQB0ktK5OnEls36aJVui2MUwITybzjC47A1PdNp', '2015-09-16 14:33:27', '2015-09-16 14:33:27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
