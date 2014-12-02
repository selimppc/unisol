-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2014 at 12:38 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_design_etsb`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_record`
--

CREATE TABLE IF NOT EXISTS `academic_record` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `level_of_education` varchar(64) DEFAULT NULL,
  `degree_name` varchar(64) NOT NULL,
  `institute_name` varchar(64) DEFAULT NULL,
  `board` varchar(64) DEFAULT NULL,
  `group` varchar(32) DEFAULT NULL,
  `major_subject` varchar(32) DEFAULT NULL,
  `result_type` varchar(32) DEFAULT NULL,
  `result` varchar(32) DEFAULT NULL,
  `grade` char(32) DEFAULT NULL,
  `grade_scale` char(8) DEFAULT NULL,
  `cgpa` char(8) DEFAULT NULL,
  `candidate_number` char(16) DEFAULT NULL,
  `education_medium` char(16) DEFAULT NULL,
  `study_at` char(16) DEFAULT NULL,
  `year_of_passing` decimal(4,0) DEFAULT NULL,
  `duration` decimal(1,0) DEFAULT NULL,
  `certificate` varchar(64) DEFAULT NULL,
  `transcript` varchar(64) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `academic_record`
--

INSERT INTO `academic_record` (`id`, `user_id`, `level_of_education`, `degree_name`, `institute_name`, `board`, `group`, `major_subject`, `result_type`, `result`, `grade`, `grade_scale`, `cgpa`, `candidate_number`, `education_medium`, `study_at`, `year_of_passing`, `duration`, `certificate`, `transcript`) VALUES
(1, 1, 'SSC level of edu', 'SSC degree', 'NABAKUMAR inst', 'Dhaka', 'Science', 'Physics', 'Grade', 'Grade', 'A', '4.00', '3.85', '1111', 'bangla', 'Bangla study at', '2014', '4', 'SSC certificate', 'SSc ntranscript'),
(2, 2, 'SSC', 'SSC', 'DIC', 'Dhaka', 'Science', 'Chemistry', 'Grade', '3.85', 'A', 'A', 'A', '1112', 'English', 'Madrasa', '2011', '2', 'SSC', 'SSC');

-- --------------------------------------------------------

--
-- Table structure for table `extra_curriculam_activity`
--

CREATE TABLE IF NOT EXISTS `extra_curriculam_activity` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` char(32) DEFAULT NULL,
  `achievement` char(32) DEFAULT NULL,
  `certificate_medal` char(64) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `extra_curriculam_activity`
--

INSERT INTO `extra_curriculam_activity` (`id`, `user_id`, `name`, `achievement`, `certificate_medal`) VALUES
(1, 1, 'extra xurri name', 'gold meDAL', 'GOLD EMDAL'),
(3, 2, 'Cycle', 'First Ruunerup', 'Gold Medal');

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
('2014_12_01_083728_create_supporting_doc_table', 1),
('2014_12_01_083941_create_miscellaneous_information_table', 1),
('2014_12_01_084030_create_academic_records_table', 1),
('2014_12_01_084114_create_extra_curriculam_activity_table', 1),
('2014_12_01_084201_create_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `miscellaneous_information`
--

CREATE TABLE IF NOT EXISTS `miscellaneous_information` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ever_admit_this_university` int(1) DEFAULT NULL,
  `ever_dismissed` int(1) DEFAULT NULL,
  `academic_honors_received` char(64) DEFAULT NULL,
  `ever_admit_other_uni` int(1) DEFAULT NULL,
  `admission_test_center` char(64) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `miscellaneous_information`
--

INSERT INTO `miscellaneous_information` (`id`, `user_id`, `ever_admit_this_university`, `ever_dismissed`, `academic_honors_received`, `ever_admit_other_uni`, `admission_test_center`) VALUES
(1, 1, 0, 0, 'Yes', 0, 'test center'),
(2, 2, 0, 0, 'BSC', 1, 'British Council');

-- --------------------------------------------------------

--
-- Table structure for table `supporting_doc`
--

CREATE TABLE IF NOT EXISTS `supporting_doc` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `academic_goal_statement` varchar(64) DEFAULT NULL,
  `essay` varchar(64) DEFAULT NULL,
  `letter_of_intent` varchar(64) DEFAULT NULL,
  `personal_statement` varchar(64) DEFAULT NULL,
  `research_statement` varchar(64) DEFAULT NULL,
  `portfolio` varchar(64) DEFAULT NULL,
  `writing_sample` varchar(64) DEFAULT NULL,
  `resume` varchar(64) DEFAULT NULL,
  `readmission_personal_statement` varchar(64) DEFAULT NULL,
  `other` varchar(64) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `supporting_doc`
--

INSERT INTO `supporting_doc` (`id`, `user_id`, `academic_goal_statement`, `essay`, `letter_of_intent`, `personal_statement`, `research_statement`, `portfolio`, `writing_sample`, `resume`, `readmission_personal_statement`, `other`) VALUES
(1, 1, 'academi9c goal', 'easyy', 'leeter', 'personel stts', 'research stts', 'portflio', 'writing sample', 'resume', 'readmisison personal', 'other'),
(2, 2, 'Achieve Better Result', 'Essy', 'Letter', 'Personal', 'Research', 'Portfolio', 'Writing', 'Resume', 'Readmission', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` char(32) NOT NULL,
  `password` char(64) NOT NULL,
  `email_address` char(64) NOT NULL,
  `user_type` char(32) NOT NULL,
  `target_role` varchar(32) NOT NULL,
  `security_question` varchar(64) NOT NULL,
  `security_answer` varchar(64) NOT NULL,
  `join_date` datetime NOT NULL,
  `last_visit` datetime NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email_address`, `user_type`, `target_role`, `security_question`, `security_answer`, `join_date`, `last_visit`, `ip_address`) VALUES
(1, 'username', 'pass', 'email', 'type', 'role', 'what is your name ?', 'asad', '2014-12-03 00:00:00', '2014-12-31 00:00:00', '192.1468.1.5'),
(2, 'Shafi', 'shafipassword', 'shafi@edutechsolutionsbd.com', 'developer', 'developement', 'whatr is your favourite labguage ?', 'Bangla', '2014-12-17 08:21:21', '2014-12-31 06:15:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_record`
--
ALTER TABLE `academic_record`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extra_curriculam_activity`
--
ALTER TABLE `extra_curriculam_activity`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miscellaneous_information`
--
ALTER TABLE `miscellaneous_information`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supporting_doc`
--
ALTER TABLE `supporting_doc`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique` (`username`,`email_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_record`
--
ALTER TABLE `academic_record`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `extra_curriculam_activity`
--
ALTER TABLE `extra_curriculam_activity`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `miscellaneous_information`
--
ALTER TABLE `miscellaneous_information`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `supporting_doc`
--
ALTER TABLE `supporting_doc`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
