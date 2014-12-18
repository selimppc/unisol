-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2014 at 04:28 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `unisol`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'BCSE', 'Bachelor Of Computer Science and Engineering.', '2014-12-02 06:09:32', '2014-12-15 12:18:29'),
(2, 'BBA', 'Bachelor of business Administration', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'BSEE', 'Bachelor of Science in Electrical Engineering', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
('2014_12_14_114501_create_department_table', 1),
('2014_12_14_114959_create_subject_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `subject_department_id_index` (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `title`, `department_id`, `description`, `created_at`, `updated_at`) VALUES
(2, 'bangla', 1, 'earswtr', '2014-12-15 00:52:27', '2014-12-15 00:52:27'),
(5, 'CSE 404', 1, 'microprocessor', '2014-12-15 03:23:59', '2014-12-15 03:23:59'),
(8, 'bacholor of computer science and engineering', 2, 'description test', '2014-12-15 05:00:02', '2014-12-16 23:11:41'),
(11, 'sssss', 1, 'ffffffffffffffff', '2014-12-16 23:38:31', '2014-12-16 23:38:31'),
(13, 'bangla', 2, 'bangla 102', '2014-12-16 23:38:52', '2014-12-17 01:54:12'),
(14, 'english', 1, 'fundamental 101', '2014-12-17 00:29:38', '2014-12-17 01:53:54'),
(15, 'erwrwr', 3, 'wrtwetrewt', '2014-12-17 01:33:08', '2014-12-17 01:33:08'),
(19, '21310', 1, '13231', '2014-12-17 04:56:09', '2014-12-17 04:56:09');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
