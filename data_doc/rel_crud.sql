-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2014 at 06:40 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rel_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_11_05_051226_create_semesters_table', 1),
('2014_11_05_110742_create_degree_table', 2),
('2014_11_05_113626_create_securityq_table', 3),
('2014_11_13_045405_create_semesters_table', 4),
('2014_11_13_084516_create_photos_table', 4),
('2014_11_13_045405_create_semesters_table', 1),
('2014_11_13_084516_create_photos_table', 1),
('2014_11_25_104230_create_bears_table', 5),
('2014_11_25_104445_create_fish_table', 5),
('2014_11_25_104545_create_trees_table', 5),
('2014_11_25_104630_create_picnics_table', 5),
('2014_11_25_105438_create_bears_picnics_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(32) NOT NULL,
  `password` char(64) NOT NULL,
  `email_address` char(64) NOT NULL,
  `user_type` char(32) NOT NULL,
  `join_date` datetime NOT NULL,
  `last_visit` datetime NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`username`,`email_address`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email_address`, `user_type`, `join_date`, `last_visit`, `ip_address`) VALUES
(1, 'ratnaakter', '12313423', 'ratnaakter17@gmail.com', 'applicant', '2014-11-03 11:13:46', '2014-12-01 13:17:50', 'http://192.168.'),
(2, 'tanvirjahan', '123132213', 'tanin@gmail.com', 'applicant', '2014-11-27 04:25:38', '2014-12-01 06:24:15', 'http://192.168.'),
(3, 'shafiqulhoque', '43344356', 'shafi@gmail.com', 'applicant', '2014-11-01 18:31:15', '2014-12-01 11:14:43', 'http://192.168.');

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE IF NOT EXISTS `user_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fathers_name` char(32) NOT NULL,
  `fathers_occupation` char(32) NOT NULL,
  `fathers_phone` decimal(11,0) NOT NULL,
  `freedom_fighter` int(1) DEFAULT NULL,
  `mothers_name` char(32) NOT NULL,
  `mothers_occupation` char(32) NOT NULL,
  `mothers_phone` decimal(11,0) NOT NULL,
  `national_id` decimal(17,0) NOT NULL,
  `driving_license` decimal(17,0) DEFAULT NULL,
  `passport` varchar(16) DEFAULT NULL,
  `place_of_birth` varchar(16) NOT NULL,
  `marital_status` varchar(11) NOT NULL,
  `nationality` varchar(16) NOT NULL,
  `religion` varchar(16) NOT NULL,
  `signature` varchar(64) DEFAULT NULL,
  `present_address` text NOT NULL,
  `parmanert_address` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_meta`
--

INSERT INTO `user_meta` (`id`, `user_id`, `fathers_name`, `fathers_occupation`, `fathers_phone`, `freedom_fighter`, `mothers_name`, `mothers_occupation`, `mothers_phone`, `national_id`, `driving_license`, `passport`, `place_of_birth`, `marital_status`, `nationality`, `religion`, `signature`, `present_address`, `parmanert_address`) VALUES
(1, 1, 'Shamsul Hoque', 'S.I of police', 1819678754, 0, 'jahanara Begum', 'HouseWife', 1819987654, 99999999999999999, 0, 'pas-33243343', 'dhaka', 'unmarried', 'Bangladeshi', 'Islam', 'signature.jpg', 'Uttara,Dhaka-1230', 'Comilla'),
(2, 2, 'adadx', 'dasdds', 4243253425, NULL, 'sdasdadrs', 'HouseWife', 1819987121, 323424345345, NULL, NULL, 'dhaka', 'unmarried', 'Bangladeshi', 'Islam', NULL, 'savar', 'savar'),
(3, 3, 'rsdfdfg', 'fsdfdsf', 1519678754, NULL, 'adfsgdhg', 'HouseWife', 1719987234, 13223435345, NULL, NULL, 'dhaka', 'married', 'Bangladeshi', 'Islam', 'signature.jpg', 'khilkhet', 'khilkhet');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` char(32) NOT NULL,
  `middle_name` char(32) DEFAULT NULL,
  `last_name` char(32) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `image` varchar(64) DEFAULT NULL,
  `city` varchar(16) NOT NULL,
  `state` varchar(16) NOT NULL,
  `country` varchar(16) NOT NULL,
  `zip_code` decimal(5,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `gender`, `image`, `city`, `state`, `country`, `zip_code`) VALUES
(1, 2, 'tanvir', 'Jahan', 'tanin', '0000-11-03', 'female', 'signature.png', 'savar', 'dhaka', 'bangladesh', 1236),
(2, 1, 'ratna', NULL, 'akter', '0000-11-12', 'female', 'signature.png', 'uttara', 'dhaka', 'bangladesh', 1230),
(3, 3, 'Shafiqul', NULL, 'Hoque', '0000-12-02', 'male', 'signature.png', 'Khilkhet', 'dhaka', 'bangladesh', 1234);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_meta`
--
ALTER TABLE `user_meta`
  ADD CONSTRAINT `users_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
