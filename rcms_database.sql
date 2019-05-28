-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2017 at 01:57 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rcms_database`
--
CREATE DATABASE IF NOT EXISTS `rcms_database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rcms_database`;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `commentID` int(6) NOT NULL AUTO_INCREMENT,
  `content` varchar(1000) NOT NULL,
  `commentDate` datetime NOT NULL,
  `complaintNo` int(10) NOT NULL,
  `staffID` varchar(12) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`commentID`),
  KEY `complaintNo` (`complaintNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentID`, `content`, `commentDate`, `complaintNo`, `staffID`, `flag`) VALUES
(1, 'Your coursework mark is missing.\r\nIf you did my coursework please see me in my office tomorrow at 4p', '2017-06-12 13:04:01', 18, '', 0),
(2, 'Your coursework mark is missing.\r\nIf you did my coursework please see me in my office tomorrow at 4p', '2017-06-12 13:08:56', 18, '', 0),
(3, 'Your coursework mark is missing.\r\nIf you did my coursework please see me in my office tomorrow at 4p', '2017-06-12 13:12:08', 18, '', 0),
(5, 'Your registration Number on the test script does not much any in the final exam attendance', '2017-06-05 08:11:23', 11, 'SCIT03', 0),
(9, 'i didn''t see your test paper', '2017-07-03 17:25:12', 16, 'SCIT02', 0),
(10, 'have not seen your coursework 1 marks', '2017-07-03 19:19:08', 39, 'SCIT02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE IF NOT EXISTS `complaint` (
  `complaintNo` int(10) NOT NULL AUTO_INCREMENT,
  `complaint_type` varchar(120) NOT NULL,
  `complaintDate` datetime NOT NULL,
  `approvalDate` datetime NOT NULL,
  `approval_status` varchar(20) NOT NULL DEFAULT 'pending',
  `confirmation` varchar(100) NOT NULL DEFAULT 'pending',
  `confirmation_date` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `course_id` int(10) NOT NULL,
  `studentNo` int(9) NOT NULL,
  `lecturerID` varchar(12) NOT NULL,
  `hodID` varchar(12) NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`complaintNo`),
  KEY `studentNo` (`studentNo`),
  KEY `course_id` (`course_id`),
  KEY `lecturerID` (`lecturerID`),
  KEY `hodID` (`hodID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaintNo`, `complaint_type`, `complaintDate`, `approvalDate`, `approval_status`, `confirmation`, `confirmation_date`, `status`, `course_id`, `studentNo`, `lecturerID`, `hodID`, `flag`) VALUES
(4, 'Missing exam', '2017-04-30 12:34:08', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'workedon', 32, 214000120, 'SCIT03', 'SCIT01', 1),
(6, 'Missing coursework', '2017-04-30 14:44:09', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 10, 214000120, 'SCIT19', 'SCIT01', 1),
(11, 'Missing exam', '2017-05-01 17:27:17', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'commented', 11, 214000120, 'SCIT02', 'SCIT01', 1),
(15, 'Missing exam', '2017-05-01 17:44:54', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 11, 214000120, 'SCIT02', 'SCIT01', 1),
(16, 'Missing all', '2017-05-01 20:39:42', '2017-07-03 17:43:22', 'approved', 'updated', '2017-07-03 17:50:39', 'workedon', 11, 214000120, 'SCIT02', 'SCIT01', 1),
(17, 'Missing exam', '2017-05-01 20:55:16', '2017-06-28 16:46:20', 'approved', 'pending', '0000-00-00 00:00:00', 'workedon', 32, 214000120, 'SCIT03', 'SCIT01', 1),
(18, 'Missing exam', '2017-05-01 21:02:32', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'commented', 32, 214000120, 'SCIT03', 'SCIT07', 1),
(19, 'Missing exam', '2017-05-01 21:16:29', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 11, 214000120, 'SCIT02', 'SCIT01', 1),
(20, 'Missing coursework', '2017-05-02 15:41:16', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 29, 214000120, 'SCIT05', 'SCIT01', 1),
(21, 'Missing coursework', '2017-06-09 12:27:45', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'commented', 31, 214000120, 'SCIT05', 'SCIT01', 1),
(23, 'Missing coursework', '2017-06-15 15:16:42', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 7, 214000120, 'SCIT09', 'SCIT01', 1),
(25, 'Missing coursework', '2017-06-15 15:49:02', '2017-07-12 14:13:25', 'approved', 'updated', '2017-07-13 06:14:40', 'workedon', 36, 214000120, 'SCIT02', 'SCIT01', 1),
(27, 'Others', '2017-06-16 14:05:41', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'commented', 3, 214000120, 'SCIT04', 'SCIT01', 1),
(28, 'Missing exam', '2017-06-27 15:52:18', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 31, 214000120, 'SCIT05', 'SCIT01', 1),
(29, 'Missing coursework', '2017-06-28 15:47:40', '2017-06-28 16:44:14', 'approved', 'updated', '2017-07-02 23:14:09', 'workedon', 31, 214018802, 'SCIT05', 'SCIT01', 1),
(33, 'Missing exam', '2017-06-30 22:25:42', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 36, 214000120, 'SCIT02', 'SCIT01', 1),
(34, 'Not contended with the ma', '2017-07-02 19:55:07', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 10, 214000120, 'SCIT19', 'SCIT01', 1),
(35, 'under marked', '2017-07-03 12:54:52', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 15, 214024647, 'SCIT09', 'SCIT01', 1),
(36, 'under marked', '2017-07-03 12:56:40', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 15, 214024647, 'SCIT09', 'SCIT01', 1),
(37, 'Missing all', '2017-07-03 12:59:21', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 18, 214024647, 'SCIT19', 'SCIT01', 1),
(39, 'Missing all', '2017-07-03 14:33:38', '2017-07-03 19:22:10', 'approved', 'updated', '2017-07-03 19:23:11', 'workedon', 21, 214024647, 'SCIT02', 'SCIT01', 1),
(41, 'Missing all', '2017-07-03 15:51:53', '2017-07-03 17:35:25', 'approved', 'updated', '2017-07-03 17:48:56', 'workedon', 7, 214024647, 'SCIT09', 'SCIT01', 1),
(42, 'Not contended with the mark', '2017-07-03 17:04:43', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 36, 214000120, 'SCIT02', 'SCIT01', 1),
(43, 'Missing exam', '2017-07-03 19:13:28', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 24, 214024647, 'SCIT02', 'SCIT01', 1),
(44, 'Missing exam', '2017-07-03 19:15:25', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 36, 214024647, 'SCIT02', 'SCIT01', 1),
(45, 'Missing exam', '2017-07-04 03:30:44', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 10, 214018802, 'SCIT19', 'SCIT01', 1),
(46, 'Missing coursework', '2017-07-04 03:39:07', '2017-07-05 16:25:52', 'approved', 'pending', '0000-00-00 00:00:00', 'workedon', 21, 214018802, 'SCIT02', 'SCIT01', 1),
(47, 'Missing coursework', '2017-07-04 09:06:44', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 32, 214018802, 'SCIT35', 'SCIT01', 1),
(48, 'Missing all', '2017-07-04 10:16:33', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 4, 214018802, 'SCIT02', 'SCIT01', 1),
(49, 'Missing all', '2017-07-04 10:17:23', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 4, 214018802, 'SCIT02', 'SCIT01', 1),
(50, 'Not contended with the mark', '2017-07-04 10:20:26', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 4, 214020655, 'SCIT02', 'SCIT01', 1),
(51, 'Not contended with the mark', '2017-07-04 10:22:09', '0000-00-00 00:00:00', 'pending', 'pending', '0000-00-00 00:00:00', 'pending', 4, 214020655, 'SCIT02', 'SCIT01', 1);

--
-- Triggers `complaint`
--
DROP TRIGGER IF EXISTS `after_complaint_update`;
DELIMITER //
CREATE TRIGGER `after_complaint_update` AFTER UPDATE ON `complaint`
 FOR EACH ROW BEGIN

    IF (NEW.approval_status <> OLD.approval_status) THEN        
        INSERT INTO staff_logs
        SET mark_id=(SELECT markID FROM mark where complaintNo=OLD.complaintNo),
        mark_name=(SELECT markName FROM mark where complaintNo=OLD.complaintNo),
        new_mark=(SELECT mark FROM mark where complaintNo=OLD.complaintNo),
        old_complaint_status=OLD.approval_status,
        new_complaint_status=NEW.approval_status,
        operation_type='Mark approval',
        operation_date=now(),
        complaint_no=OLD.complaintNo,
        staff_id=NEW.hodID;
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(10) NOT NULL AUTO_INCREMENT,
  `short_name` varchar(8) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `dept_id` int(6) NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `short_name`, `course_name`, `dept_id`) VALUES
(1, 'BITE', 'Bachelors of Information Technology ', 1),
(2, 'BIS', 'Bachelors of Information Science', 3),
(3, 'BsCS', 'Bachelors of Science in Computer Science', 2),
(4, 'BSSE', 'Bachelor of Science in Software Engineering', 4);

-- --------------------------------------------------------

--
-- Table structure for table `courseunit`
--

CREATE TABLE IF NOT EXISTS `courseunit` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(10) NOT NULL,
  `courseunitName` varchar(55) NOT NULL,
  `semester` varchar(12) NOT NULL,
  `yearofstudy` varchar(10) NOT NULL,
  `dept_ID` int(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dept_ID` (`dept_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

--
-- Dumping data for table `courseunit`
--

INSERT INTO `courseunit` (`id`, `course_code`, `courseunitName`, `semester`, `yearofstudy`, `dept_ID`) VALUES
(1, 'BAM 2102', 'Entrepreneurship Principles', 'semester I', 'Year II', 1),
(2, 'BIS 1100', 'Foundations of Information Systems', 'semester I', 'Year II', 1),
(3, 'BIS 1104', 'Communication Skills for IT', 'Semester I', 'Year I', 1),
(4, 'BIS 1204', 'Data and Information Management I', 'semester II', 'Year I', 1),
(5, 'BIS 1206', 'Systems Analysis and Design', 'semester II', 'Year I', 1),
(6, 'BIS 2106', 'Data and Information Management II', 'semester I', 'Year II', 1),
(7, 'BIS 2107', 'Human Computer Interaction', 'semester I', 'Year III', 1),
(8, 'BIS 3105', 'Intelligent systems', 'semester I', 'Year III', 1),
(9, 'BIS 3205', 'Data Warehousing and Business Intelligence', 'semester II', 'Year III', 1),
(10, 'BIT 1105', 'Communication Technology and Internet', 'semester I', 'Year I', 1),
(11, 'BIT 1106', 'Introduction to Information Technology', 'semester I', 'Year I', 1),
(12, 'BIT 1208', 'Security Policies and Procedures', 'semester II', 'Year I', 1),
(13, 'BIT 2105', 'Electronic Media Systems and Multimedia', 'semester I', 'Year II', 1),
(14, 'BIT 2111', 'Web Systems and Technologies I', 'semester I', 'Year II', 1),
(15, 'BIT 2112', 'Electronic Commerce', 'semester I', 'Year II', 1),
(16, 'BIT 2201', 'Marketing in the IT Sector', 'semester II', 'Year II', 1),
(17, 'BIT 2207', 'Research Methodology', 'semester II', 'Year II', 1),
(18, 'BIT 2208', 'Systems Administration', 'semester II', 'Year II', 1),
(19, 'BIT 2209', 'IT Law and Ethics', 'semester II', 'Year II', 1),
(20, 'BIT 2210', 'Digital Forensics and Incident Response', 'semester II', 'Year II', 1),
(21, 'BIT 2302', 'Field Attachment', 'Internship', 'Year II', 1),
(22, 'BIT 3108', 'IT Project Management', 'semester I', 'Year III', 1),
(23, 'BIT 3109', 'Web Systems and Technologies II', 'semester I', 'Year III', 1),
(24, 'BIT 3111', 'Information Technology Project I', 'semester I', 'Year III', 1),
(25, 'BIT 3210', 'System Integration and Deployment', 'semester II', 'Year III', 1),
(26, 'BIT 3211', 'Integrative Programming and Technologies', 'semester II', 'Year III', 1),
(27, 'BIT 3212', 'Digital Libraries', 'semester II', 'Year III', 1),
(28, 'BIT 3213', 'Information Technology Project II', 'semester II', 'Year III', 1),
(29, 'BSE 2106', 'Computer Networks', 'semester I', 'Year II', 1),
(30, 'BSE 3106', 'Mobile Networks and Computing', 'semester I', 'Year III', 1),
(31, 'CSC 1100', 'Computer Literacy', 'semester I', 'Year I', 1),
(32, 'CSC 1107', 'Structured Programming', 'semester I', 'Year I', 1),
(33, 'CSC 1214', 'Object Oriented Programming', 'semester II', 'Year I', 1),
(34, 'CSC 1303', 'Cisco Certified Network Associate (Audited)', 'Recess', 'Year I', 1),
(35, 'CSC 1304', 'Practical Skills Development', 'Recess ', 'Year I', 1),
(36, 'CSC 3119', 'User Interface Design', 'semester I', 'Year III', 1),
(37, 'BIT 1208', 'Information Technology for Financial Services', 'semester II', 'Year I', 1),
(122, 'CSC 1100 ', 'Computer Literacy', 'semester I', 'Year I', 2),
(123, 'BIS 1104 ', 'Communication Skills for IT ', 'semester I', 'Year I', 2),
(124, 'CSC 1104 ', 'Computer Organization & Architecture ', 'semester I', 'Year I', 2),
(125, 'CSC 1108', 'Individual Project I ', 'semester I', 'Year I', 2),
(126, 'CSC 1107 ', 'Structured Programming', 'semester I', 'Year I', 2),
(127, 'BIS 1206 ', 'System Analysis and Design', 'semester II', 'Year I', 2),
(128, 'MTH 1203', 'Calculus I', 'semester II', 'Year I', 2),
(129, 'CSC 1214', 'Object Oriented Programming ', 'semester II', 'Year I', 2),
(130, 'MTH 2203', 'Numerical Analysis I', 'semester II', 'Year I', 2),
(131, 'BIS 1204', 'Data & Information Management I', 'semester II', 'Year I', 2),
(132, 'CSC 1304 ', 'Practical Skills Development ', 'Recess', 'Year I', 2),
(133, 'CSC 1303 ', 'Cisco Certified Network Associate ', 'Recess', 'Year I', 2),
(134, 'CSC 2100 ', 'Data Structures and Algorithms ', 'semester I', 'year II', 2),
(135, 'CSC 2114 ', 'Artificial Intelligence ', 'semester I', 'year II', 2),
(136, 'BSE 2103 ', 'Computer Networks ', 'semester I', 'year II', 2),
(137, 'MTH 3105 ', 'Discrete Mathematics ', 'semester I', 'year II', 2),
(138, 'BSE 2105 ', 'Formal Methods ', 'semester I', 'year II', 2),
(139, 'CSC 2113 ', 'Software Engineering ', 'semester I', 'year II', 2),
(140, 'CSC 2200 ', 'Operating Systems ', 'semester II', 'year II', 2),
(141, 'CSC 1209 ', 'Logic Programming ', 'semester II', 'year II', 2),
(142, 'CSC 2209 ', 'Systems Programming ', 'semester II', 'year II', 2),
(143, 'CSC 2210', ' Automata, Complexity & Computability ', 'semester II', 'year II', 2),
(144, 'BIT 2207 ', 'Research Methodology', 'semester II', 'year II', 2),
(145, 'CSC 2303 ', 'Field Attachment', 'Internship', 'year II', 2),
(146, 'CSC 3110 ', 'User Interface Design ', 'semester I', 'year III', 2),
(147, 'BAM 2102 ', 'Entrepreneurship Principles ', 'semester I', 'year III', 2),
(148, 'CSC 3112 ', 'Principles of Programming Languages ', 'semester I', 'year III', 2),
(149, 'CSC 3118 ', 'Computer Science Project I ', 'semester I', 'year III', 2),
(150, 'BIS 3104 ', 'Modeling and Simulation ', 'semester I', 'year III', 2),
(151, 'CSC 3121 ', 'Computer Graphics ', 'semester I', 'year III', 2),
(152, 'CSC 3115 ', 'Advanced Programming ', 'semester I', 'year III', 2),
(153, 'MTH 3107', ' Linear Programming ', 'semester I', 'year III', 2),
(154, 'BSE 2206 ', 'Data Communications ', 'semester II', 'year III', 2),
(155, 'CSC 3205 ', 'Compiler Design ', 'semester II', 'year III', 2),
(156, 'CSC 3211 C', 'Computer Science Project II ', 'semester II', 'year III', 2),
(157, 'CSC 3207 ', 'Computer Security ', 'semester II', 'year III', 2),
(158, 'BIS 3200', 'Data Warehousing & Business Intelligence', 'semester II', 'year III', 2),
(159, 'BSE 3202 ', 'Distributed Systems Development ', 'semester II', 'year III', 2),
(160, 'CSC 3217 ', 'Emerging Trends in Computer Science', 'semester II', 'year III', 2),
(161, 'BIS 1100', ' Foundations of Information Systems ', 'semester I', 'year I', 3),
(162, 'BIS 1104 ', 'Communication Skills for IT ', 'semester I', 'year I', 3),
(163, 'BAM 2102 ', 'Entrepreneurship Principles ', 'semester I', 'year I', 3),
(164, 'CSC 1100 ', 'Computer Literacy ', 'semester I', 'year I', 3),
(165, 'MTH1110 ', 'Basic Mathematics', 'semester I', 'year I', 3),
(166, 'BIS 1203 ', 'Management Information Systems ', 'semester II', 'year I', 3),
(167, 'BIS 1204 ', 'Management Information Systems ', 'semester II', 'year I', 3),
(168, 'BIS 1205 ', 'Business Statistics ', 'semester II', 'year I', 3),
(169, 'BIS 1206 ', 'Systems Analysis and Design ', 'semester II', 'year I', 3),
(170, 'BIS 1208 ', 'IT Infrastructure', 'semester II', 'year I', 3),
(171, 'CSC 1303 ', 'Cisco Certified Network Associate', 'Recess', 'year I', 3),
(172, 'CSC 1304 ', 'Practical Skills Development', 'Recess', 'year I', 3),
(173, 'BIS 2105 ', 'Information Systems Security and Risk Management ', 'semester I', 'year II', 3),
(174, 'BIS 2106 ', 'Data and Information Management II ', 'semester I', 'year II', 3),
(175, 'BIS 2107 ', 'Human Computer Interaction ', 'semester I', 'year II', 3),
(176, 'CSC 1107 ', 'Structured Programming ', 'semester I', 'year II', 3),
(177, 'BIS 2109 ', 'E-Services ', 'semester I', 'year II', 3),
(178, 'BIT 2111 ', 'Web Systems and Technologies I', 'semester I', 'year II', 3),
(179, 'BIS 2208 ', 'Information Systems Architecture ', 'semester II', 'year II', 3),
(180, 'BIS 2206 ', 'Information Systems ProjectManagement ', 'semester II', 'year II', 3),
(181, 'BIS 2207 ', 'Applications Development ', 'semester II', 'year II', 3),
(182, 'BIT 2207 ', 'Research Methodology ', 'semester II', 'year II', 3),
(183, 'CSC 1214 ', 'Object Oriented Programming', 'semester II', 'year II', 3),
(184, 'BIT 2208 ', 'System Administration', 'semester II', 'year II', 3),
(185, 'BIS 2302 ', 'Field Attachment', 'Internship', 'year II', 3),
(186, 'BIS 3100 ', 'Modeling and Simulation ', 'semester I', 'year III', 3),
(187, 'BIS 3101 ', 'Intelligent Systems ', 'semester I', 'year III', 3),
(188, 'BIS 3102 ', 'Business Process Management ', 'semester I', 'year III', 3),
(189, 'BIS 3103 ', 'Project in Information Systems I ', 'semester I', 'year III', 3),
(190, 'BSE 3106 ', 'Mobile Networks and Computing ', 'semester I', 'year III', 3),
(191, 'BIS 3108 ', 'Information Systems Audit', 'semester I', 'year III', 3),
(192, 'BIS 3200 ', 'Data Warehousing and Business Intelligence', 'semester II', 'year III', 3),
(193, 'BIT 2209', ' IT Law and Ethics ', 'semester II', 'year III', 3),
(194, 'BIS 3202 ', 'Project in Information Systems II ', 'semester II', 'year III', 3),
(195, 'BIS 3201', ' Information Systems Strategy,Management, and Acquisiti', 'semester II', 'year III', 3),
(196, 'BIS 3207 ', 'Emerging Trends in Information Systems', 'semester II', 'year III', 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `dept_ID` int(6) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(55) NOT NULL,
  PRIMARY KEY (`dept_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_ID`, `dept_name`) VALUES
(1, 'Department of Information Technology'),
(2, 'Department of Computer Science'),
(3, 'Department of Information Systems'),
(4, 'Department of Networks');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE IF NOT EXISTS `mark` (
  `markID` int(10) NOT NULL AUTO_INCREMENT,
  `markName` varchar(25) NOT NULL,
  `mark` int(3) NOT NULL,
  `entryDate` datetime NOT NULL,
  `complaintNo` int(10) NOT NULL,
  `staffID` varchar(12) NOT NULL,
  PRIMARY KEY (`markID`),
  KEY `complaintNo` (`complaintNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`markID`, `markName`, `mark`, `entryDate`, `complaintNo`, `staffID`) VALUES
(1, 'Coursework', 99, '2017-06-16 06:11:27', 25, 'SCIT02'),
(2, 'Exam', 90, '2017-06-28 13:00:24', 17, ''),
(3, 'coursework', 96, '2017-06-28 15:52:30', 29, ''),
(4, 'Exam', 98, '2017-07-03 15:32:32', 4, 'SCIT03'),
(5, 'coursework', 80, '2017-07-03 16:05:40', 41, 'SCIT09'),
(6, 'Exam', 98, '2017-07-03 16:05:40', 41, 'SCIT09'),
(7, 'coursework', 76, '2017-07-03 17:29:55', 16, 'SCIT02'),
(8, 'exam', 86, '2017-07-03 17:29:55', 16, 'SCIT02'),
(9, 'coursework', 80, '2017-07-03 19:20:51', 39, 'SCIT02'),
(10, 'exam', 97, '2017-07-03 19:20:51', 39, 'SCIT02'),
(11, 'coursework', 90, '2017-07-04 03:51:52', 46, 'SCIT02'),
(12, 'coursework', 80, '2017-07-04 09:10:03', 47, 'SCIT35'),
(13, 'coursework', 79, '2017-07-04 10:35:41', 49, 'SCIT02'),
(14, 'exam', 97, '2017-07-04 10:35:41', 49, 'SCIT02');

--
-- Triggers `mark`
--
DROP TRIGGER IF EXISTS `after_mark_insert`;
DELIMITER //
CREATE TRIGGER `after_mark_insert` AFTER INSERT ON `mark`
 FOR EACH ROW BEGIN
INSERT INTO staff_logs(mark_id,mark_name,new_mark,operation_type,operation_date,complaint_no,staff_id)
VALUES(NEW.markID,NEW.markName,NEW.mark,'Giving a Mark',now(),NEW.complaintNo,NEW.staffID);
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notificationID` int(10) NOT NULL AUTO_INCREMENT,
  `content` varchar(500) NOT NULL,
  `notificationDate` datetime NOT NULL,
  `studentNo` int(9) DEFAULT NULL,
  `staffID` varchar(12) DEFAULT NULL,
  `flag` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`notificationID`),
  KEY `notification_ibfk_1` (`studentNo`),
  KEY `notification_ibfk_2` (`staffID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=158 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notificationID`, `content`, `notificationDate`, `studentNo`, `staffID`, `flag`) VALUES
(7, 'Your complaint to lecturer<strong> Flavia Namagembe</strong> has been received. Thanks, response is ', '2017-05-01 17:37:38', 214000120, NULL, 0),
(8, 'A student with student No<strong> 214000120</strong> has complained about a course unit you taught i', '2017-05-01 17:37:44', NULL, 'SCIT02', 0),
(9, 'Your complaint to lecturer<strong> Flavia Namagembe</strong> has been received. Thanks, response is ', '2017-05-01 17:44:54', 214000120, NULL, 0),
(10, 'A student with student No<strong> 214000120</strong> has complained about a course unit you taught i', '2017-05-01 17:44:59', NULL, 'SCIT02', 0),
(11, 'Your complaint to lecturer<strong> Flavia Namagembe</strong> has been received. Thanks, response is soon coming.', '2017-05-01 20:39:42', 214000120, NULL, 0),
(12, 'A student with student No<strong> 214000120</strong> has complained about a course unit you taught in academic year <strong>2014-2015</strong>', '2017-05-01 20:39:50', NULL, 'SCIT02', 0),
(13, 'Your student with student No<strong> 214000120</strong> has complained about a course unit taught by lecturer<strong> Flavia Namagembe</strong>', '2017-05-01 20:39:56', NULL, 'SCIT01', 0),
(14, 'Your complaint to lecturer<strong> Innocent Ndibatya</strong> has been received. Thanks, response is soon coming.', '2017-05-01 20:55:16', 214000120, NULL, 0),
(15, 'A student with student No<strong> 214000120</strong> has complained about a course unit you taught in academic year <strong>2014-2015</strong>', '2017-05-01 20:55:22', NULL, 'SCIT03', 0),
(16, 'Your student with student No<strong> 214000120</strong> has complained about a course unit taught by lecturer<strong> Innocent Ndibatya</strong>', '2017-05-01 20:55:28', NULL, 'SCIT01', 0),
(17, 'Your complaint to lecturer<strong> Innocent Ndibatya</strong> has been received. Thanks, response is soon coming.', '2017-05-01 21:02:32', 214000120, NULL, 0),
(18, 'A student with student No<strong> 214000120</strong> has complained about a course unit you taught in academic year <strong>2014-2015</strong>', '2017-05-01 21:02:39', NULL, 'SCIT03', 0),
(19, 'Your student with student No<strong> 214000120</strong> has complained about a course unit taught by lecturer<strong> Innocent Ndibatya</strong>', '2017-05-01 21:02:46', NULL, 'SCIT01', 0),
(20, 'Your complaint to lecturer<strong> Flavia Namagembe</strong> has been received. Thanks, response is soon coming.', '2017-05-01 21:16:29', 214000120, NULL, 0),
(21, 'A student with student No<strong> 214000120</strong> has complained about a course unit you taught in academic year <strong>2014-2015</strong>', '2017-05-01 21:16:35', NULL, 'SCIT02', 0),
(22, 'Your student with student No<strong> 214000120</strong> has complained about a course unit taught by lecturer<strong> Flavia Namagembe</strong>', '2017-05-01 21:16:41', NULL, 'SCIT01', 0),
(23, 'Your complaint to lecturer<strong> Henry Sserugunda</strong> has been received. Thanks, response is soon coming.', '2017-05-02 15:41:16', 214000120, NULL, 0),
(24, 'A student with student No<strong> 214000120</strong> has complained about a course unit you taught in academic year <strong>2015-2016</strong>', '2017-05-02 15:41:27', NULL, 'SCIT05', 1),
(25, 'Your student with student No<strong> 214000120</strong> has complained about a course unit taught by lecturer<strong> Henry Sserugunda</strong>', '2017-05-02 15:41:42', NULL, 'SCIT01', 0),
(26, 'Your complaint to lecturer<strong> Henry Sserugunda</strong> has been received. Thanks, response is soon coming.', '2017-06-09 12:27:45', 214000120, NULL, 0),
(27, 'A student with student No<strong> 214000120</strong> has complained about a course unit you taught in academic year <strong>2014-2015</strong>', '2017-06-09 12:27:46', NULL, 'SCIT05', 1),
(28, 'Your student with student No<strong> 214000120</strong> has complained about a course unit taught by lecturer<strong> Henry Sserugunda</strong>', '2017-06-09 12:27:46', NULL, 'SCIT01', 0),
(29, 'Your lecturer<strong> Innocent Ndibatya</strong> has commented on your complaint please check it out.', '2017-06-12 13:04:25', 214000120, NULL, 0),
(30, 'Your lecturer<strong> Innocent Ndibatya</strong> has commented on your complaint please check it out.', '2017-06-12 13:09:52', 214000120, NULL, 0),
(31, 'You have commented on a complaint from student with a Reg No <strong> 14/U/375</strong>', '2017-06-12 13:10:15', NULL, 'SCIT03', 0),
(32, 'Lecturer <strong> Innocent Ndibatya</strong> has commented on a complaint from a student with a Reg No of <strong> 14/U/375</strong>', '2017-06-12 13:10:46', NULL, 'SCIT01', 0),
(33, 'Your lecturer<strong> Innocent Ndibatya</strong> has commented on your complaint please check it out.', '2017-06-12 13:12:18', 214000120, NULL, 0),
(34, 'You have commented on a complaint from student with a Reg No <strong> 14/U/375</strong>', '2017-06-12 13:12:25', NULL, 'SCIT03', 0),
(35, 'Lecturer <strong> Innocent Ndibatya</strong> has commented on a complaint from a student with a Reg No of <strong> 14/U/375</strong>', '2017-06-12 13:12:32', NULL, 'SCIT01', 0),
(36, 'Your complaint to lecturer<strong> Flavia Namagembe</strong> has been received. Thanks, response is soon coming.', '2017-06-15 15:49:02', 214000120, NULL, 0),
(37, 'A student with student No<strong> 214000120</strong> has complained about a course unit you taught in academic year <strong>2016-2017</strong>', '2017-06-15 15:49:10', NULL, 'SCIT02', 0),
(38, 'Your student with student No<strong> 214000120</strong> has complained about a course unit taught by lecturer<strong> Flavia Namagembe</strong>', '2017-06-15 15:49:17', NULL, 'SCIT01', 0),
(39, 'Your complaint to lecturer<strong> Henry Sserugunda</strong> has been received. Thanks, response is soon coming.', '2017-06-27 15:52:18', 214000120, NULL, 0),
(40, 'A student with student No<strong> 214000120</strong> has complained about a course unit you taught in academic year <strong>2014-2015</strong>', '2017-06-27 15:52:30', NULL, 'SCIT05', 1),
(41, 'Your student with student No<strong> 214000120</strong> has complained about a course unit taught by lecturer<strong> Henry Sserugunda</strong>', '2017-06-27 15:52:37', NULL, 'SCIT01', 0),
(42, 'Your lecturer<strong> Innocent Ndibatya</strong> has given you 90 as the Exam markon your complaint please check it out.', '2017-06-28 13:00:28', 214000120, NULL, 0),
(43, 'You have given you 90 as the Exam mark on a complaint from student with a Reg No <strong> 14/U/375</strong>', '2017-06-28 13:00:43', NULL, 'SCIT03', 0),
(45, 'Your complaint to lecturer<strong> Henry Sserugunda</strong> has been received. Thanks, response is soon coming.', '2017-06-28 15:47:40', 214018802, NULL, 1),
(46, 'A student with student No<strong> 214018802</strong> has complained about a course unit you taught in academic year <strong>2014-2015</strong>', '2017-06-28 15:47:49', NULL, 'SCIT05', 1),
(47, 'Your student with student No<strong> 214018802</strong> has complained about a course unit taught by lecturer<strong> Henry Sserugunda</strong>', '2017-06-28 15:47:57', NULL, 'SCIT01', 0),
(48, 'Your lecturer<strong> Henry Sserugunda</strong> has given you 96 as the coursework Markon your complaint please check it out.', '2017-06-28 15:52:33', 214018802, NULL, 1),
(49, 'You have given you 96 as the coursework Mark on a complaint from student with a Reg No <strong> 14/u/11308/PS</strong>', '2017-06-28 15:52:48', NULL, 'SCIT05', 1),
(51, 'The head of Department <strong>  </strong> has approved the Mark 96% you were given by Lecturer <strong></strong>', '2017-06-28 16:44:16', 214018802, NULL, 1),
(52, 'The mark you gave student with <strong> 14/u/11308/PS </strong> has been approved by the Head of Department', '2017-06-28 16:44:25', NULL, 'SCIT01', 0),
(53, 'You have just approved <strong>96% of student with Reg No 14/u/11308/PS  which Lecturer  had given', '2017-06-28 16:44:25', NULL, 'SCIT01', 0),
(54, 'The head of Department <strong>  </strong> has approved the Mark 90% you were given by Lecturer <strong></strong>', '2017-06-28 16:46:20', 214000120, NULL, 0),
(55, 'The mark you gave student with <strong> 14/U/375 </strong> has been approved by the Head of Department', '2017-06-28 16:46:30', NULL, 'SCIT01', 0),
(56, 'You have just approved <strong>90% of student with Reg No 14/U/375  which Lecturer  had given', '2017-06-28 16:46:30', NULL, 'SCIT01', 0),
(57, 'Your complaint to lecturer<strong> Flavia Namagembe</strong> has been received. Thanks, response is soon coming.', '2017-06-30 22:25:43', 214000120, NULL, 0),
(58, 'A student with student No<strong> 214000120</strong> has complained about a course unit you taught in academic year <strong>2016-2017</strong>', '2017-06-30 22:25:43', NULL, 'SCIT02', 0),
(59, 'Your student with student No<strong> 214000120</strong> has complained about a course unit taught by lecturer<strong> Flavia Namagembe</strong>', '2017-06-30 22:25:43', NULL, 'SCIT01', 0),
(60, 'Your lecturer<strong> Innocent Ndibatya</strong> has given you  as the on your complaint please check it out.', '2017-07-02 15:44:51', 214000120, NULL, 0),
(61, 'You have just given you % as the  on a complaint from student with a Reg No <strong> 14/U/375</strong>', '2017-07-02 15:44:51', NULL, 'SCIT03', 0),
(62, 'Lecturer <strong> Innocent Ndibatya</strong> has given you  as the  on a complaint from a student with a Reg No of <strong> 14/U/375</strong>', '2017-07-02 15:44:51', NULL, 'SCIT01', 0),
(63, 'Your complaint to lecturer<strong> Haleem Chongomweru</strong> has been received. Thanks, response is soon coming.', '2017-07-02 19:55:08', 214000120, NULL, 0),
(64, 'A student with student No<strong> 214000120</strong> has complained about a course unit you taught in academic year <strong>2014-2015</strong>', '2017-07-02 19:55:08', NULL, 'SCIT19', 1),
(65, 'Your student with student No<strong> 214000120</strong> has complained about a course unit taught by lecturer<strong> Haleem Chongomweru</strong>', '2017-07-02 19:55:08', NULL, 'SCIT01', 0),
(66, 'The head of Department <strong>  </strong> has approved the Mark 96% you were given by Lecturer <strong></strong>', '2017-07-02 23:14:09', 214018802, NULL, 1),
(67, 'The mark 96%  you approved for student with Reg no<strong> 14/u/11308/PS </strong> has reflected on the Results, done by the Academic Registrar Edith Naluyimba', '2017-07-02 23:14:10', NULL, 'SCIT01', 0),
(68, 'You have just confirmed that update of the Results system with mark<strong> 96% for student with Reg No 14/u/11308/PS  was done', '2017-07-02 23:14:10', NULL, 'SCIT06', 0),
(69, 'Your complaint to lecturer<strong> Fiona Tulinayo</strong> has been received. Thanks, response is soon coming.', '2017-07-03 12:54:52', 214024647, NULL, 0),
(70, 'A student with student No<strong> 214024647</strong> has complained about a course unit you taught in academic year <strong>2015-2016</strong>', '2017-07-03 12:55:00', NULL, 'SCIT09', 0),
(71, 'Your student with student No<strong> 214024647</strong> has complained about a course unit taught by lecturer<strong> Fiona Tulinayo</strong>', '2017-07-03 12:55:11', NULL, 'SCIT01', 0),
(72, 'Your complaint to lecturer<strong> Fiona Tulinayo</strong> has been received. Thanks, response is soon coming.', '2017-07-03 12:56:40', 214024647, NULL, 0),
(73, 'A student with student No<strong> 214024647</strong> has complained about a course unit you taught in academic year <strong>2015-2016</strong>', '2017-07-03 12:56:52', NULL, 'SCIT09', 0),
(74, 'Your student with student No<strong> 214024647</strong> has complained about a course unit taught by lecturer<strong> Fiona Tulinayo</strong>', '2017-07-03 12:57:00', NULL, 'SCIT01', 0),
(75, 'Your complaint to lecturer<strong> Haleem Chongomweru</strong> has been received. Thanks, response is soon coming.', '2017-07-03 12:59:21', 214024647, NULL, 0),
(76, 'A student with student No<strong> 214024647</strong> has complained about a course unit you taught in academic year <strong>2015-2016</strong>', '2017-07-03 12:59:38', NULL, 'SCIT19', 1),
(77, 'Your student with student No<strong> 214024647</strong> has complained about a course unit taught by lecturer<strong> Haleem Chongomweru</strong>', '2017-07-03 12:59:44', NULL, 'SCIT01', 0),
(78, 'Your complaint to lecturer<strong> Haleem Chongomweru</strong> has been received. Thanks, response is soon coming.', '2017-07-03 12:59:44', 214024647, NULL, 0),
(79, 'Your complaint to lecturer<strong> Flavia Namagembe</strong> has been received. Thanks, response is soon coming.', '2017-07-03 14:33:38', 214024647, NULL, 0),
(80, 'A student with student No<strong> 214024647</strong> has complained about a course unit you taught in academic year <strong>2015-2016</strong>', '2017-07-03 14:33:46', NULL, 'SCIT02', 0),
(81, 'Your student with student No<strong> 214024647</strong> has complained about a course unit taught by lecturer<strong> Flavia Namagembe</strong>', '2017-07-03 14:33:55', NULL, 'SCIT01', 0),
(82, 'Your complaint to lecturer<strong> Flavia Namagembe</strong> has been received. Thanks, response is soon coming.', '2017-07-03 14:33:55', 214024647, NULL, 0),
(83, 'A student with student No<strong> 214024647</strong> has complained about a course unit you taught in academic year <strong>2015-2016</strong>', '2017-07-03 14:34:01', NULL, 'SCIT02', 0),
(84, 'Your lecturer<strong> Innocent Ndibatya</strong> has given you 98 as the examon your complaint please check it out.', '2017-07-03 15:32:35', 214000120, NULL, 0),
(85, 'You have just given you 98% as the exam on a complaint from student with a Reg No <strong> 14/U/375</strong>', '2017-07-03 15:32:43', NULL, 'SCIT03', 1),
(86, 'Lecturer <strong> Innocent Ndibatya</strong> has given 98 as the exam on a complaint from a student with a Reg No of <strong> 14/U/375</strong>', '2017-07-03 15:32:50', NULL, 'SCIT01', 0),
(87, 'Your complaint to lecturer<strong> Fiona Tulinayo</strong> has been received. Thanks, response is soon coming.', '2017-07-03 15:51:54', 214024647, NULL, 0),
(88, 'A student with student No<strong> 214024647</strong> has complained about a course unit you taught in academic year <strong>2016-2017</strong>', '2017-07-03 15:52:00', NULL, 'SCIT09', 0),
(89, 'Your student with student No<strong> 214024647</strong> has complained about a course unit taught by lecturer<strong> Fiona Tulinayo</strong>', '2017-07-03 15:52:07', NULL, 'SCIT01', 0),
(90, 'Lecturer Fiona Tulinayo has given You coursework as the coursework and examework as the examework for your complaint', '2017-07-03 16:05:43', 214024647, NULL, 0),
(91, 'You have given coursework as the coursework and examework as the examework on complaint made by student with Reg No <strong>14/U/24679</strong> ', '2017-07-03 16:06:00', NULL, 'SCIT09', 1),
(92, 'Your complaint to lecturer<strong> Flavia Namagembe</strong> has been received. Thanks, response is soon coming.', '2017-07-03 17:04:44', 214000120, NULL, 0),
(93, 'A student with student No<strong> 214000120</strong> has complained about a course unit you taught in academic year <strong>2016-2017</strong>', '2017-07-03 17:04:51', NULL, 'SCIT02', 0),
(94, 'Your student with student No<strong> 214000120</strong> has complained about a course unit taught by lecturer<strong> Flavia Namagembe</strong>', '2017-07-03 17:04:57', NULL, 'SCIT01', 0),
(95, 'Your lecturer<strong> Flavia Namagembe</strong> has commented on your complaint that, i didn''t see your test paper', '2017-07-03 17:25:13', 214000120, NULL, 0),
(96, 'You have just commented on a complaint from student with a Reg No <strong> 14/U/375</strong> that,i didn''t see your test paper', '2017-07-03 17:25:20', NULL, 'SCIT02', 0),
(97, 'Lecturer <strong> Flavia Namagembe</strong> has commented on a complaint from a student with a Reg No of <strong> 14/U/375</strong> as a response', '2017-07-03 17:25:26', NULL, 'SCIT01', 0),
(98, 'Lecturer Flavia Namagembe has given You  as the coursework and 86 as the exam for your complaint', '2017-07-03 17:29:56', 214000120, NULL, 0),
(99, 'You have given  as the coursework and 86 as the exam on complaint made by student with Reg No <strong>14/U/375</strong> ', '2017-07-03 17:30:05', NULL, 'SCIT02', 1),
(100, 'Lecturer <strong> Flavia Namagembe</strong> has given  as the coursework and 86 on a complaint from a student with a Reg No of <strong> 14/U/375</strong>', '2017-07-03 17:30:12', NULL, 'SCIT01', 0),
(101, 'The head of Department <strong> Evelyn Kahiigi</strong> has approved the Mark 80% you were given by Lecturer <strong>Fiona Tulinayo</strong>', '2017-07-03 17:35:27', 214024647, NULL, 0),
(102, 'The mark you gave student with <strong> 14/U/24679 </strong> has been approved by the Head of Department', '2017-07-03 17:35:39', NULL, 'SCIT09', 1),
(103, 'You have just approved <strong>80% of student with Reg No 14/U/24679  which Lecturer Fiona Tulinayo had given', '2017-07-03 17:35:39', NULL, 'SCIT01', 0),
(104, 'The head of Department <strong> Evelyn Kahiigi</strong> has approved the Mark 76% you were given by Lecturer <strong>Flavia Namagembe</strong>', '2017-07-03 17:37:29', 214000120, NULL, 0),
(105, 'The mark you gave student with <strong> 14/U/375 </strong> has been approved by the Head of Department', '2017-07-03 17:37:38', NULL, 'SCIT02', 1),
(106, 'You have just approved <strong>76% of student with Reg No 14/U/375  which Lecturer Flavia Namagembe had given', '2017-07-03 17:37:38', NULL, 'SCIT01', 0),
(107, 'The head of Department <strong> Evelyn Kahiigi</strong> has approved the Mark 76% you were given by Lecturer <strong>Flavia Namagembe</strong>', '2017-07-03 17:43:22', 214000120, NULL, 0),
(108, 'The mark you gave student with <strong> 14/U/375 </strong> has been approved by the Head of Department', '2017-07-03 17:43:22', NULL, 'SCIT02', 1),
(109, 'You have just approved <strong>76% of student with Reg No 14/U/375  which Lecturer Flavia Namagembe had given', '2017-07-03 17:43:22', NULL, 'SCIT01', 0),
(110, 'The Academic Registrar Edith Naluyimba of your college has confirmed that your mark 98% given to resolve your complaint on course unit BIS 2107 ', '2017-07-03 17:47:22', 214024647, NULL, 0),
(111, 'The mark 98%  you approved for student with Reg no<strong> 14/U/24679 </strong> has reflected on the Results, done by the Academic Registrar Edith Naluyimba', '2017-07-03 17:47:22', NULL, 'SCIT01', 0),
(112, 'You have just confirmed that update of the Results system with mark<strong> 98% for student with Reg No 14/U/24679  was done', '2017-07-03 17:47:22', NULL, 'SCIT06', 0),
(113, 'The Academic Registrar Edith Naluyimba of your college has confirmed that your mark 98% given to resolve your complaint on course unit BIS 2107 ', '2017-07-03 17:48:57', 214024647, NULL, 0),
(114, 'The mark 98%  you approved for student with Reg no<strong> 14/U/24679 </strong> has reflected on the Results, done by the Academic Registrar Edith Naluyimba', '2017-07-03 17:49:04', NULL, 'SCIT01', 0),
(115, 'You have just confirmed that update of the Results system with mark<strong> 98% for student with Reg No 14/U/24679  was done', '2017-07-03 17:49:04', NULL, 'SCIT06', 0),
(116, 'The Academic Registrar Edith Naluyimba of your college has confirmed that your mark 86% given to resolve your complaint on course unit BIT 1106 ', '2017-07-03 17:50:39', 214000120, NULL, 0),
(117, 'The mark 86%  you approved for student with Reg no<strong> 14/U/375 </strong> has reflected on the Results, done by the Academic Registrar Edith Naluyimba', '2017-07-03 17:50:44', NULL, 'SCIT01', 0),
(118, 'You have just confirmed that update of the Results system with mark<strong> 86% for student with Reg No 14/U/375  was done', '2017-07-03 17:50:44', NULL, 'SCIT06', 0),
(119, 'Your complaint to lecturer<strong> Flavia Namagembe</strong> has been received. Thanks, response is soon coming.', '2017-07-03 19:13:28', 214024647, NULL, 0),
(120, 'A student with student No<strong> 214024647</strong> has complained about a course unit you taught in academic year <strong>2016-2017</strong>', '2017-07-03 19:13:29', NULL, 'SCIT02', 1),
(121, 'Your student with student No<strong> 214024647</strong> has complained about a course unit taught by lecturer<strong> Flavia Namagembe</strong>', '2017-07-03 19:13:29', NULL, 'SCIT01', 0),
(122, 'Your complaint to lecturer<strong> Flavia Namagembe</strong> has been received. Thanks, response is soon coming.', '2017-07-03 19:15:25', 214024647, NULL, 0),
(123, 'A student with student No<strong> 214024647</strong> has complained about a course unit you taught in academic year <strong>2016-2017</strong>', '2017-07-03 19:15:31', NULL, 'SCIT02', 1),
(124, 'Your student with student No<strong> 214024647</strong> has complained about a course unit taught by lecturer<strong> Flavia Namagembe</strong>', '2017-07-03 19:15:39', NULL, 'SCIT01', 0),
(125, 'Your lecturer<strong> Flavia Namagembe</strong> has commented on your complaint that, have not seen your coursework 1 marks', '2017-07-03 19:19:09', 214024647, NULL, 0),
(126, 'You have just commented on a complaint from student with a Reg No <strong> 14/U/24679</strong> that,have not seen your coursework 1 marks', '2017-07-03 19:19:15', NULL, 'SCIT02', 1),
(127, 'Lecturer <strong> Flavia Namagembe</strong> has commented on a complaint from a student with a Reg No of <strong> 14/U/24679</strong> as a response', '2017-07-03 19:19:20', NULL, 'SCIT01', 0),
(128, 'Lecturer Flavia Namagembe has given You 80 as the coursework and 97 as the exam for your complaint', '2017-07-03 19:20:52', 214024647, NULL, 0),
(129, 'You have given 80 as the coursework and 97 as the exam on complaint made by student with Reg No <strong>14/U/24679</strong> ', '2017-07-03 19:20:58', NULL, 'SCIT02', 1),
(130, 'Lecturer <strong> Flavia Namagembe</strong> has given 80 as the coursework and 97 on a complaint from a student with a Reg No of <strong> 14/U/24679</strong>', '2017-07-03 19:21:04', NULL, 'SCIT01', 0),
(131, 'The head of Department <strong> Evelyn Kahiigi</strong> has approved the Mark 80% you were given by Lecturer <strong>Flavia Namagembe</strong>', '2017-07-03 19:22:11', 214024647, NULL, 0),
(132, 'The mark you gave student with <strong> 14/U/24679 </strong> has been approved by the Head of Department', '2017-07-03 19:22:15', NULL, 'SCIT02', 1),
(133, 'You have just approved <strong>80% of student with Reg No 14/U/24679  which Lecturer Flavia Namagembe had given', '2017-07-03 19:22:15', NULL, 'SCIT01', 0),
(134, 'The Academic Registrar Edith Naluyimba of your college has confirmed that your mark 97% given to resolve your complaint on course unit BIT 2302 ', '2017-07-03 19:23:12', 214024647, NULL, 0),
(135, 'The mark 97%  you approved for student with Reg no<strong> 14/U/24679 </strong> has reflected on the Results, done by the Academic Registrar Edith Naluyimba', '2017-07-03 19:23:18', NULL, 'SCIT01', 0),
(136, 'You have just confirmed that update of the Results system with mark<strong> 97% for student with Reg No 14/U/24679  was done', '2017-07-03 19:23:18', NULL, 'SCIT06', 0),
(137, 'Your complaint to lecturer<strong> Haleem Chongomweru</strong> has been received. Thanks, response is soon coming.', '2017-07-04 03:30:45', 214018802, NULL, 1),
(138, 'A student with student No<strong> 214018802</strong> has complained about a course unit you taught in academic year <strong>2014-2015</strong>', '2017-07-04 03:30:45', NULL, 'SCIT19', 1),
(139, 'Your student with student No<strong> 214018802</strong> has complained about a course unit taught by lecturer<strong> Haleem Chongomweru</strong>', '2017-07-04 03:30:45', NULL, 'SCIT01', 0),
(140, 'Your complaint to lecturer<strong> Flavia Namagembe</strong> has been received. Thanks, response is soon coming.', '2017-07-04 03:39:07', 214018802, NULL, 1),
(141, 'A student with student No<strong> 214018802</strong> has complained about a course unit you taught in academic year <strong>2015-2016</strong>', '2017-07-04 03:39:07', NULL, 'SCIT02', 1),
(142, 'Your student with student No<strong> 214018802</strong> has complained about a course unit taught by lecturer<strong> Flavia Namagembe</strong>', '2017-07-04 03:39:07', NULL, 'SCIT01', 0),
(143, 'Your lecturer<strong> Flavia Namagembe</strong> has given you 90 as the courseworkon your complaint please check it out.', '2017-07-04 03:51:52', 214018802, NULL, 1),
(144, 'You have just given you 90% as the coursework on a complaint from student with a Reg No <strong> 14/u/11308/PS</strong>', '2017-07-04 03:51:52', NULL, 'SCIT02', 1),
(145, 'Lecturer <strong> Flavia Namagembe</strong> has given 90 as the coursework on a complaint from a student with a Reg No of <strong> 14/u/11308/PS</strong>', '2017-07-04 03:51:52', NULL, 'SCIT01', 0),
(146, 'Your complaint to lecturer<strong> Emmanuel Mugejjera</strong> has been received. Thanks, response is soon coming.', '2017-07-04 09:06:45', 214018802, NULL, 1),
(147, 'A student with student No<strong> 214018802</strong> has complained about a course unit you taught in academic year <strong>2014-2015</strong>', '2017-07-04 09:06:57', NULL, 'SCIT35', 1),
(148, 'Your student with student No<strong> 214018802</strong> has complained about a course unit taught by lecturer<strong> Emmanuel Mugejjera</strong>', '2017-07-04 09:07:10', NULL, 'SCIT01', 0),
(149, 'Your lecturer<strong> Emmanuel Mugejjera</strong> has given you 80 as the courseworkon your complaint please check it out.', '2017-07-04 09:10:15', 214018802, NULL, 1),
(150, 'Your complaint to lecturer<strong> Flavia Namagembe</strong> has been received. Thanks, response is soon coming.', '2017-07-04 10:16:33', 214018802, NULL, 1),
(151, 'Your complaint to lecturer<strong> Flavia Namagembe</strong> has been received. Thanks, response is soon coming.', '2017-07-04 10:17:24', 214018802, NULL, 1),
(152, 'Your complaint to lecturer<strong> Flavia Namagembe</strong> has been received. Thanks, response is soon coming.', '2017-07-04 10:20:26', 214020655, NULL, 1),
(153, 'Your complaint to lecturer<strong> Flavia Namagembe</strong> has been received. Thanks, response is soon coming.', '2017-07-04 10:22:09', 214020655, NULL, 1),
(154, 'Lecturer Flavia Namagembe has given You 79 as the coursework and 97 as the exam for your complaint', '2017-07-04 10:36:04', 214018802, NULL, 1),
(155, 'The head of Department <strong> Evelyn Kahiigi</strong> has approved the Mark 90% you were given by Lecturer <strong>Flavia Namagembe</strong>', '2017-07-05 16:26:02', 214018802, NULL, 1),
(156, 'The mark you gave student with <strong> 14/u/11308/PS </strong> has been approved by the Head of Department', '2017-07-05 16:26:21', NULL, 'SCIT02', 1),
(157, 'You have just approved <strong>90% of student with Reg No 14/u/11308/PS  which Lecturer Flavia Namagembe had given', '2017-07-05 16:26:21', NULL, 'SCIT01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `offering`
--

CREATE TABLE IF NOT EXISTS `offering` (
  `offerID` int(10) NOT NULL AUTO_INCREMENT,
  `studentNo` int(9) NOT NULL,
  `course_id` int(10) NOT NULL,
  `academicYear` varchar(10) NOT NULL,
  `program` varchar(10) NOT NULL,
  PRIMARY KEY (`offerID`),
  KEY `course_id` (`course_id`),
  KEY `studentNo` (`studentNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `offering`
--

INSERT INTO `offering` (`offerID`, `studentNo`, `course_id`, `academicYear`, `program`) VALUES
(1, 214000120, 3, '2014-2015', 'Day'),
(2, 214000120, 31, '2014-2015', 'Day'),
(3, 214000120, 10, '2014-2015', 'Day'),
(4, 214000120, 32, '2014-2015', 'Day'),
(5, 214000120, 11, '2014-2015', 'Day'),
(6, 214000120, 1, '2015-2016', 'Day'),
(7, 214000120, 6, '2015-2016', 'Day'),
(8, 214000120, 2, '2015-2016', 'Day'),
(9, 214000120, 29, '2015-2016', 'Day'),
(10, 214000120, 14, '2015-2016', 'Day'),
(11, 214000120, 7, '2016-2017', 'Day'),
(12, 214000120, 24, '2016-2017', 'Day'),
(13, 214000120, 22, '2016-2017', 'Day'),
(14, 214000120, 36, '2016-2017', 'Day'),
(15, 214000120, 23, '2016-2017', 'Day'),
(16, 214018802, 11, '2014-2015', 'Day'),
(17, 214018802, 31, '2014-2015', 'Day'),
(18, 214024647, 11, '2014-2015', 'Day'),
(19, 214024647, 31, '2014-2015', 'Day'),
(20, 214024647, 3, '2014-2015', 'Day'),
(21, 214024647, 10, '2014-2015', 'Day'),
(22, 214024647, 32, '2014-2015', 'Day'),
(23, 214024647, 12, '2014-2015', 'Day'),
(24, 214024647, 4, '2014-2015', 'Day'),
(25, 214024647, 5, '2014-2015', 'Day'),
(26, 214024647, 33, '2014-2015', 'Day'),
(27, 214024647, 37, '2014-2015', 'Day'),
(28, 214024647, 34, '2014-2015', 'Day'),
(29, 214024647, 35, '2014-2015', 'Day'),
(30, 214024647, 1, '2015-2016', 'Day'),
(31, 214024647, 6, '2015-2016', 'Day'),
(32, 214024647, 15, '2015-2016', 'Day'),
(33, 214024647, 14, '2015-2016', 'Day'),
(34, 214024647, 29, '2015-2016', 'Day'),
(35, 214024647, 16, '2015-2016', 'Day'),
(36, 214024647, 18, '2015-2016', 'Day'),
(37, 214024647, 19, '2015-2016', 'Day'),
(38, 214024647, 20, '2015-2016', 'Day'),
(39, 214024647, 21, '2015-2016', 'Day'),
(40, 214024647, 7, '2016-2017', 'Day'),
(41, 214024647, 24, '2016-2017', 'Day'),
(42, 214024647, 36, '2016-2017', 'Day'),
(43, 214020655, 11, '2014-2015', 'Day'),
(44, 214020655, 31, '2014-2015', 'Day'),
(45, 214020655, 3, '2014-2015', 'Day'),
(46, 214020655, 10, '2014-2015', 'Day'),
(47, 214020655, 32, '2014-2015', 'Day'),
(48, 214020655, 12, '2014-2015', 'Day'),
(49, 214020655, 4, '2014-2015', 'Day'),
(50, 214020655, 5, '2014-2015', 'Day'),
(51, 214020655, 33, '2014-2015', 'Day'),
(52, 214020655, 37, '2014-2015', 'Day'),
(53, 214020655, 34, '2014-2015', 'Day'),
(54, 214020655, 35, '2014-2015', 'Day'),
(55, 214020655, 1, '2015-2016', 'Day'),
(56, 214020655, 6, '2015-2016', 'Day'),
(57, 214020655, 15, '2015-2016', 'Day'),
(58, 214020655, 14, '2015-2016', 'Day'),
(59, 214020655, 29, '2015-2016', 'Day'),
(60, 214020655, 20, '2015-2016', 'Day'),
(61, 214020655, 19, '2015-2016', 'Day'),
(62, 214020655, 18, '2015-2016', 'Day'),
(63, 214020655, 21, '2015-2016', 'Day'),
(64, 214020655, 7, '2016-2017', 'Day'),
(65, 214020655, 24, '2016-2017', 'Day'),
(66, 214020655, 36, '2016-2017', 'Day'),
(67, 214018802, 3, '2014-2015', 'Day'),
(68, 214018802, 10, '2014-2015', 'Day'),
(69, 214018802, 32, '2014-2015', 'Day'),
(70, 214018802, 12, '2014-2015', 'Day'),
(71, 214018802, 4, '2014-2015', 'Day'),
(72, 214018802, 5, '2014-2015', 'Day'),
(73, 214018802, 33, '2014-2015', 'Day'),
(74, 214018802, 37, '2014-2015', 'Day'),
(75, 214018802, 34, '2014-2015', 'Day'),
(76, 214018802, 35, '2014-2015', 'Day'),
(77, 214018802, 1, '2015-2016', 'Day'),
(78, 214018802, 6, '2015-2016', 'Day'),
(79, 214018802, 13, '2015-2016', 'Day'),
(80, 214018802, 14, '2015-2016', 'Day'),
(81, 214018802, 29, '2015-2016', 'Day'),
(82, 214018802, 18, '2015-2016', 'Day'),
(83, 214018802, 19, '2015-2016', 'Day'),
(84, 214018802, 20, '2015-2016', 'Day'),
(85, 214018802, 21, '2015-2016', 'Day'),
(86, 214018802, 7, '2016-2017', 'Day'),
(87, 214018802, 24, '2016-2017', 'Day'),
(88, 214018802, 36, '2016-2017', 'Day'),
(89, 214000120, 12, '2014-2015', 'Day'),
(90, 214000120, 33, '2014-2015', 'Day'),
(91, 214000120, 4, '2014-2015', 'Day'),
(92, 214000120, 37, '2014-2015', 'Day'),
(93, 214000120, 5, '2014-2015', 'Day');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staffId` varchar(12) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `lName` varchar(25) NOT NULL,
  `DOB` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `nationality` varchar(35) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `staffType` varchar(30) NOT NULL,
  `dept_ID` int(6) NOT NULL,
  `userID` int(10) NOT NULL,
  PRIMARY KEY (`staffId`),
  KEY `staff_ibfk_1` (`userID`),
  KEY `dept_ID` (`dept_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffId`, `fName`, `lName`, `DOB`, `gender`, `nationality`, `contact`, `email`, `staffType`, `dept_ID`, `userID`) VALUES
('SCIT01', 'Evelyn', 'Kahiigi', '1987-05-02', 'F', 'Uganda', '+256703186705', 'evelynkahiigi@cit.mak.ac.ug', 'HOD', 1, 4),
('SCIT02', 'Flavia', 'Namagembe', '1975-11-12', 'F', 'Uganda', '+256706186705', 'flashina7@gmail.com', 'lecturer', 1, 7),
('SCIT03', 'Innocent', 'Ndibatya', '1985-08-12', 'M', 'Uganda', '+256706186705', 'ndibatyainnocent@yahoo.com', 'lecturer', 1, 13),
('SCIT04', 'Amina', 'Zawede', '1984-01-09', 'F', 'Uganda', '+256784240163', 'amuronruth@gmail.com', 'lecturer', 1, 39),
('SCIT05', 'Henry', 'Sserugunda', '1990-01-25', 'M', 'Uganda', '+256706186705', 'henryserugunda@gmail.com', 'lecturer', 1, 15),
('SCIT06', 'Edith', 'Naluyimba', '1978-03-02', 'M', 'Uganda', '+256756423414', 'edithnaluyimba@cis.mak.ac.ug', 'Admin', 3, 44),
('SCIT07', 'Joseph', 'Ssemwogerere', '1987-05-26', 'M', 'Uganda', '+256772345659', 'josephsemwogerere@gmail.com', 'lecturer', 2, 45),
('SCIT08', 'Paul', 'Ssemaluulu', '1983-08-03', 'M', 'Uganda', '+256772453542', 'ssemaluulupaul@yahoo.com', 'lecturer', 1, 46),
('SCIT09', 'Fiona', 'Tulinayo', '1987-05-19', 'F', 'Uganda', '+256756989832', 'tulinayofiona@gmail.com', 'lecturer', 1, 47),
('SCIT10', 'Davis', 'Rwabu', '1980-09-05', 'M', 'UGANDA', '+256789125464', 'emamugejjera@gmail.com', 'lecturer', 1, 49),
('SCIT11', 'Amon', 'Muteganda', '1980-04-05', 'F', 'UGANDA', '+256783578823', 'azawedde@mak.ac.ug', 'lecturer', 1, 50),
('SCIT12', 'Brian', 'Muchake', '1983-12-16', 'M', 'UGANDA', '+256700654521', 'hchongomeru@cis.mak.ac.ug', 'lecturer', 1, 60),
('SCIT13', 'Lillian', 'Komugisha', '1987-09-02', 'F', 'UGANDA', '+256789112235', 'fnamagembe@gmail.com', 'lecturer', 3, 51),
('SCIT14', 'Florence', 'Kivuneke', '1982-01-02', 'M', 'UGANDA', '+256758494522', 'innondibatya@gmail.com', 'lecturer', 1, 52),
('SCIT15', 'Emilly', 'Ngabirano', '1965-04-03', 'M', 'UGANDA', '+256778945645', 'paul10sem@yahoo.com', 'lecturer', 1, 53),
('SCIT16', 'Hawa ', 'Nyende', '1984-07-09', 'F', 'UGANDA', '+256714578945', 'hawany90@gmail.com', 'lecturer', 1, 54),
('SCIT17', 'Margaret ', 'Nagwovuma', '1985-07-08', 'F', 'UGANDA', '+256756423177', 'nmagaret@cis.mak.ac.ug', 'lecturer', 1, 55),
('SCIT18', 'John', 'Kizito ', '1978-09-01', 'F', 'UGANDA', '+256789425614', 'fturinayo@gmail.com', 'lecturer', 1, 56),
('SCIT19', 'Haleem', 'Chongomweru', '1983-10-20', 'M', 'Kenya', '+254774186705', 'halimkas@gmail.com ', 'lecturer', 1, 29),
('SCIT20', 'Ddaudi  ', 'Jjingo', '1980-04-08', 'M', 'UGANDA', '+256789452131', 'jingodwa5@outlook.com', 'lecturer', 1, 58),
('SCIT21', 'Mercy', 'Amiyo', '1979-10-04', 'M', 'UGANDA', '+256798464561', 'hsserugiunda@gmail.com', 'lecturer', 3, 59),
('SCIT22', ' Joseph', 'Lwomwa', '1978-06-06', 'M', 'UGANDA', '+256797562103', 'jlwomwa@yahoo.com', 'lecturer', 2, 57),
('SCIT23', 'George', 'Bitwire', '1982-02-23', 'M', 'uganda', '+256789497323', 'gbitwire@gmail.com', 'lecturer', 3, 1044),
('SCIT24', 'Emmanuel', 'Ojeke', '1985-01-20', 'M', 'uganda', '+256756790872', 'emmaojeke@gmail.com', 'lecturer', 3, 1045),
('SCIT25', 'Innocent', 'Opumar', '1978-02-15', 'M', 'uganda', '+256707898056', 'innocentopumar@gmail.com', 'lecturer', 3, 1046),
('SCIT26', 'Mercy', 'Akuku', '1988-04-23', 'F', 'kenya', '+256780567781', 'makuku@gmail.com', 'lecturer', 3, 1047),
('SCIT27', 'John', 'Mushi', '1972-03-21', 'M', 'uganda', '+256783456323', 'jmushi@yahoo.com', 'lecturer', 3, 1048),
('SCIT28', 'Engineer', 'Bainomugisha', '1979-08-25', 'M', 'uganda', '+256772334455', 'engbainomugisha@gmail.com', 'HOD', 2, 1050),
('SCIT29', 'Moses', 'Adimo', '1981-03-10', 'M', 'uganda', '+256702356780', 'mosadimo@yahoo.com', 'lecturer', 2, 1051),
('SCIT30', 'Agnes ', 'Nabubi', '1988-07-25', 'F', 'uganda', '+256706789902', 'agnabiubi@gmail.com', 'lecturer', 2, 1052),
('SCIT31', 'Sliver', 'Mutunji', '1978-06-28', 'M', 'uganda', '+256786790232', 'smutunji@gmail.com', 'lecturer', 2, 1053),
('SCIT32', 'Salima', 'nakayiru', '1972-09-27', 'F', 'uganda', '+256778945678', 'sanakayiru@yahoo.com', 'lecturer', 2, 1054),
('SCIT33', 'Winnie', 'Namboso', '1970-06-30', 'F', 'uganda', '+256709845676', 'wnamoso@gmail.com', 'lecturer', 2, 1055),
('SCIT34', 'Peter', 'Nabende', '1985-10-04', 'M', 'Uganda', '+256772554447', 'pnabende@cit.mak.ac.ug', 'HOD', 3, 1049),
('SCIT35', 'Emmanuel', 'Mugejjera', '1977-04-12', 'M', 'Uganda', '+256772765489', 'emugejjera@gmail.com', 'lecturer', 1, 1154);

-- --------------------------------------------------------

--
-- Table structure for table `staff_logs`
--

CREATE TABLE IF NOT EXISTS `staff_logs` (
  `log_id` int(100) NOT NULL AUTO_INCREMENT,
  `mark_id` int(10) NOT NULL,
  `mark_name` varchar(25) NOT NULL,
  `new_mark` int(3) NOT NULL,
  `old_complaint_status` varchar(20) NOT NULL,
  `new_complaint_status` varchar(20) NOT NULL,
  `operation_type` varchar(20) NOT NULL,
  `operation_date` datetime NOT NULL,
  `complaint_no` int(10) NOT NULL,
  `staff_id` varchar(12) NOT NULL,
  PRIMARY KEY (`log_id`),
  KEY `mark_id` (`mark_id`),
  KEY `staff_id` (`staff_id`),
  KEY `complaint_no` (`complaint_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `staff_logs`
--

INSERT INTO `staff_logs` (`log_id`, `mark_id`, `mark_name`, `new_mark`, `old_complaint_status`, `new_complaint_status`, `operation_type`, `operation_date`, `complaint_no`, `staff_id`) VALUES
(1, 12, 'coursework', 80, '', '', 'Giving a Mark', '2017-07-04 09:10:03', 47, 'SCIT35'),
(2, 13, 'coursework', 79, '', '', 'Giving a Mark', '2017-07-04 10:35:41', 49, 'SCIT02'),
(3, 14, 'exam', 97, '', '', 'Giving a Mark', '2017-07-04 10:35:41', 49, 'SCIT02'),
(4, 4, 'Exam', 98, 'pending', 'approved', 'Mark approval', '2017-07-11 08:20:49', 4, 'SCIT01'),
(5, 4, 'Exam', 98, 'approved', 'pending', 'Mark approval', '2017-07-11 08:21:24', 4, 'SCIT01');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `studentNo` int(9) NOT NULL,
  `regNo` varchar(25) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `lName` varchar(25) NOT NULL,
  `program` varchar(10) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `DOB` date NOT NULL,
  `yearOfEntry` varchar(10) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `course_id` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  PRIMARY KEY (`studentNo`),
  UNIQUE KEY `regNo` (`regNo`),
  KEY `userID` (`userID`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentNo`, `regNo`, `fName`, `lName`, `program`, `gender`, `DOB`, `yearOfEntry`, `nationality`, `contact`, `email`, `course_id`, `userID`) VALUES
(21201672, '14/U/877', ' Jane ', 'MBABAZI ', 'Day', 'F', '0000-00-00', '2014-2015', 'Uganda', '+257701562348', 'jane@yahoo.com', 3, 1139),
(211004594, '14/U/7142/PS', 'Phillip ', 'ARYANYIJUKA  ', 'Day', 'M', '1992-05-23', '2014-2015', 'Uganda', '+256771235987', 'philip@gamail.com', 3, 1064),
(211012908, '14/U/11843/EVE', ' Peter Faaro ', 'MANGENI ', 'Evenning', 'M', '1995-09-15', '2014-2015', 'Uganda', '+256789362548', 'mangeni@gmail.com', 3, 1136),
(211013934, '14/U/11855/EVE', '  Wilson ', 'MATATA', 'Evenning', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256789145623', 'wilson@yahoo.com', 3, 1137),
(211025823, '11/U/24033/PS', ' SHADIAH KASULE', 'NANTABA', 'Day', 'F', '1995-09-15', '2011-2012', 'Uganda', '+256703020951', 'kasuleshadiah@gmail.com', 1, 107),
(212010384, '14/U/9605/PS', ' Simon ', 'KATO ', 'Day', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256701873652', 'simon@yahoo.com', 3, 1108),
(212013932, '14/U/7058/EVE', ' Vuciri Samson ', 'ALIKU ', 'Evenning', 'M', '1989-02-23', '2014-2015', 'Uganda', '+256701235698', 'alikusamson@yahoo.com', 3, 1063),
(212014660, '14/U/7262/PS', '  Abraham ', 'ASIIMIRWE', 'Day', 'M', '1995-04-24', '2014-2015', 'Uganda', '+256701236589', 'abraham67@gmail.com', 3, 1065),
(212017431, '14/U/25199', '  Richard ', 'KATONGOLE', 'Day', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256757592117', 'richard@yahoo.com', 3, 1110),
(212020342, '14/X/22308/PS', 'Yusufu ', 'ALI  ', 'Day', 'M', '1980-09-16', '2014-2015', 'Uganda', '+256779632548', 'aliyusuf@gmail.com', 3, 1062),
(212020377, '14/U/9560/PS', ' Samuel ', 'KATAMBA ', 'Day', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256702682974', 'samuel@yahoo.com', 3, 1107),
(212021070, '12/U/8676/PS', ' ABEL', 'MUGANZA', 'Day', 'M', '1995-08-23', '2012-2013', 'Uganda', '+256705691565', 'abel@gmail.com', 1, 108),
(212023117, '12/U/22399/EVE', ' LEAH', 'KINTU', 'Evenning', 'F', '1991-08-24', '2012-2013', 'Uganda', '+256753251822', 'leah@gmail.com', 1, 106),
(212023187, '12/U/22208/PS', 'GONZAGA', 'BAGUMA ', 'Day', 'M', '1990-12-29', '2012-2013', 'Uganda', '+256706890060', 'baguma2@yahoo.com', 1, 66),
(212026162, '14/U/337', ' Sharon ', 'AKINO ', 'Day', 'F', '1990-12-29', '2012-2013', 'Uganda', '+256701567836', 'akino@gmail.com', 3, 1061),
(213001344, '14/U/9679/EVE', ' Allan ', 'KATONGOLE ', 'Evenning', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256755315526', 'allan@yahoo.com', 3, 1109),
(213003124, '14/U/8484/PS', ' Kenneth ', 'GIZAMBA ', 'Day', 'M', '1994-01-01', '2014-2015', 'Uganda', '+256750404825', 'kenneth@yahoo.com', 3, 1086),
(213004728, '14/U/8711/PS', ' Yusuf ', 'JEMBA ', 'Day', 'M', '1995-05-19', '2014-2015', 'Uganda', '+256755958739', 'yusuf@yahoo.com', 3, 1091),
(213004853, '13/U/14756/PS', ' ENOSI', 'WAIGOLO', 'Day', 'M', '1995-06-25', '2013-2014', 'Uganda', '+256701446376', 'enosi@gmail.com', 1, 105),
(213005729, '14/U/8585/PS', ' Ahmed Dawood ', 'GULAM ', 'Day', 'M', '1995-11-17', '2014-2015', 'Uganda', '+256781698818', 'gulam@gmail.com', 3, 1088),
(213005745, '14/U/8759/PS', '  Aisha ', 'KABEDA', 'Day', 'F', '1995-06-23', '2014-2015', 'Uganda', '+256701102666', 'aisha@yahoo.com', 3, 1094),
(213006285, '14/U/8738/PS', '  Daniel Sendagire ', 'JUUKO', 'Evenning', 'M', '1997-02-26', '2014-2015', 'Uganda', '+256794102873', 'juuko@gmail.com', 3, 1092),
(213007202, '15/U/3945/EVE', ' HENRY KASANGAKI', 'ATUHAIRWE', 'Evenning', 'M', '1994-09-13', '2015-2016', 'Uganda', '+256755315526', 'atuhairehenry@gmail.com', 2, 1155),
(213007330, '15/U/367', ' AKBR', 'KANYESIGYE', 'Day', 'M', '1992-07-20', '2015-2016', 'Uganda', '+256757592117', 'kanyesieakbr@gmail.com', 2, 1156),
(213009079, '14/U/9361/PS', ' Brian Ernest ', 'KANAKULYA ', 'Day', 'M', '1995-08-23', '2012-2013', 'Uganda', '+256705337971', 'kanakulya@gmail.com', 3, 1103),
(213009102, '14/U/8747/PS', ' Armstrong ', 'KAAHWA ', 'Day', 'M', '1997-01-20', '2014-2015', 'Uganda', '+256705957431', 'armstrong@yahoo.com', 3, 1093),
(213009556, '15/U/8209/PS', 'JAMES  MREDRICK', 'MUKYINGA ', 'Day', 'M', '1995-02-09', '2015-2016', 'Uganda', '+256775681668', 'mukyingejames@gmail.com', 2, 1158),
(213009567, '14/U/9319/EVE', '  Micheal Francis ', 'KALYANGO', 'Evenning', 'M', '1991-08-24', '2012-2013', 'Uganda', '+256701662622', 'kalyango@gmail.com', 3, 1101),
(213010629, '14/U/13559/PS', ' Edgar ', 'Derrick ', 'Day', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256779632514', 'edgar@yahoo.com', 3, 1153),
(213012490, '14/U/22411/PS', 'Collin Nuwa ', 'KAJUBI  ', 'Day', 'M', '1990-02-16', '2014-2015', 'Uganda', '+256755505237', 'kajubi@gmail.com', 3, 1099),
(213012723, '14/U/8760/EVE', '  Loreen ', 'KABUGHO', 'Evenning', 'F', '1996-05-30', '2014-2015', 'Uganda', '+256706580377', 'loreen@yahoo.com', 3, 1095),
(213012917, '15/U/1083', 'GEO MREY', 'OKELLO ', 'Day', 'M', '1995-09-10', '2015-2016', 'Uganda', '+256704125477', 'okelegeomrey@gmail.com', 2, 1159),
(213012962, '14/U/8646/EVE', 'JAMES  Ambrose ', 'Odongo ', 'Evenning', 'M', '1990-08-04', '2014-2015', 'Uganda', '+256706373297', 'odongo@gmail.com', 3, 1090),
(213015085, '15/U/9601/PS', 'SHAMSA', 'NAKIBUUKA ', 'Day', ' ', '1990-12-29', '2012-2013', 'Uganda', '+256782301466', 'nakibuueshamsa@gmail.com', 2, 1160),
(213015943, '14/U/11952/EVE', '  Saul Sempa ', 'MAWANDA', 'Evenning', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256774563259', 'mawanda@gmail.com', 3, 1138),
(213016051, '14/U/8509/EVE', ' Isaac ', 'GORLYAN ', 'Evenning', 'M', '1995-10-14', '2014-2015', 'Uganda', '+256706047083', 'isaac@yahoo.com', 3, 1087),
(213016067, '15/U/4658/EVE', 'HUMPHREY', 'BUNYA ', 'Evenning', 'M', '1990-05-11', '2015-2016', 'Uganda', '+256700870810', 'bunehumphrey@gmail.com', 2, 1157),
(213017778, '14/U/8603/PS', '  Harriet ', 'ISIKO', 'Day', 'F', '1997-09-23', '2014-2015', 'Uganda', '+256759618395', 'harriet@yahoo.com', 3, 1089),
(213018793, '15/U/11270/PS', ' ANGEL', 'NERIMA', 'Day', ' ', '1980-09-16', '2015-2016', 'Uganda', '+256701446376', 'nerieangel@gmail.com', 2, 1161),
(213021216, '14/U/999', 'Kyagulanyi Isaac ', 'MUKWAYA  ', 'Day', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256772569817', 'mukwaya@gmail.com', 3, 1151),
(214000077, '14/U/10063/PS', ' Lambert ', 'KIIZA ', 'Day', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256703020951', 'lambert@yaho.com', 3, 1117),
(214000086, '14/U/11373/EVE', '  Shafiq ', 'LUTAAYA', 'Evenning', 'M', '1990-02-16', '2014-2015', 'Uganda', '+256771236598', 'shafiq@yahoo.com', 3, 1134),
(214000120, '14/U/375', 'Eric', 'Kasakya', 'Day', 'M', '1994-11-03', '2014-2015', 'Uganda', '+256784240163', 'erickasakya@gmail.com', 1, 1),
(214000186, '14/U/7375/PS', 'Grace ', 'BABIRYE  ', 'Day', 'F', '1990-04-05', '2014-2015', 'Uganda', '+256772569874', 'graceb@gmail.com', 3, 1068),
(214000196, '14/U/23285/PS', 'Judith ', 'AYAA  ', 'Day', 'F', '1991-06-25', '2014-2015', 'Uganda', '+256772458963', 'judithayaa@gmail.com', 3, 1067),
(214000230, '14/U/687', ' MARIO', 'MULEKEZI', 'Day', 'M', '1996-09-15', '2014-2015', 'Uganda', '+256701102666', 'mario@gmail.com', 1, 84),
(214000234, '15/U/9049/PS', ' ANGELLA', 'NABUNYA', 'Day', ' ', '1987-11-20', '2015-2016', 'Uganda', '+256788408956', 'nabunyaeangella@gmail.com', 2, 1180),
(214000274, '14/U/445', 'JOSEPH', 'KIGOZI ', 'Day', 'M', '1993-02-28', '2014-2015', 'Uganda', '+256775909571', 'joseph@gmail.com', 1, 74),
(214000396, '14/U/641', ' DERRICK', 'MUGANZA', 'Day', 'M', '1995-07-24', '2014-2015', 'Uganda', '+256705957431', 'derrick@gmail.com', 1, 83),
(214000473, '14/U/91', 'NORMAN', 'AMENY ', 'Day', 'M', '1990-05-11', '2014-2015', 'Uganda', '+256704501943', 'ameny@yahoo.com', 1, 63),
(214000543, '14/U/545', ' MOSES', 'LUBEGA', 'Day', 'M', '1989-05-23', '2014-2015', 'Uganda', '+256706373297', 'moses@gmail.com', 1, 80),
(214000548, '14/U/1275', 'JAMAL DIN', 'WAIBI ', 'Day', 'M', '1997-03-16', '2014-2015', 'Uganda', '+256704125477', 'dinjamal@gmail.com', 1, 103),
(214000562, '14/U/954', ' OLIVIA', 'NAWANKAMBO', 'Day', 'F', '1995-11-17', '2014-2015', 'Uganda', '+256705337971', 'olivia@gmail.com', 1, 93),
(214000964, '14/U/801', 'EDNA MARGARET', 'NAKAJUGO ', 'Day', 'F', '1987-11-20', '2014-2015', 'Uganda', '+256773102045', 'margaretedna@gmail.com', 1, 86),
(214001060, '14/U/12662/PS', ' Shafik ', 'MUBIRU ', 'Day', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256778145623', 'shafik@yahoo.com', 3, 1142),
(214001082, '14/U/8028/EVE', '  Charles ', 'BUSUULWA', 'Evenning', 'M', '1995-07-24', '2014-2015', 'Uganda', '+256750968733', 'charles@yahoo.com', 3, 1078),
(214001173, '14/U/37', 'DERICK', 'AINE ', 'Day', 'M', '1994-09-13', '2014-2015', 'Uganda', '+256701750005', 'derrickaine@gmail.com', 1, 61),
(214001253, '14/U/724', ' ISAAC', 'MUTEBI', 'Day', 'M', '1987-10-30', '2014-2015', 'Uganda', '+256706580377', 'isaac@gmail.com', 1, 85),
(214001272, '14/U/864', ' FLAVIA', 'NAMANYA', 'Day', 'F', '1993-07-18', '2014-2015', 'Uganda', '+256755505237', 'flavia@gmail.com', 1, 89),
(214001360, '15/U/3893/PS', 'SOPHIE', 'ATIM ', 'Day', ' ', '1996-09-15', '2015-2016', 'Uganda', '+256701675647', 'atesophie@gmail.com', 2, 1178),
(214001443, '14/U/494', ' Emma Echimu ', 'EMARU ', 'Day', 'M', '1989-10-23', '2014-2015', 'Uganda', '+256700138858', 'emaru@gmail.com', 3, 1082),
(214001516, '14/U/1271', ' GERALD', 'WABOMBA', 'Day', 'M', '1992-08-27', '2014-2015', 'Uganda', '+256775681668', 'gerald@gmail.com', 1, 102),
(214001701, '14/U/1825', ' REGINA', 'BAIDH', 'Day', 'F', '1980-09-16', '2014-2015', 'Uganda', '+256779253988', 'regina@yahoo.com', 1, 67),
(214001702, '14/U/1872', ' PRISCILLA', 'NAMUYONGA', 'Day', 'F', '1994-01-01', '2014-2015', 'Uganda', '+256701662622', 'priscilla@gmail.com', 1, 91),
(214002106, '14/U/7786/PS', ' MUKASA ALLAN', 'KIDDAWALIME', 'Day', 'M', '1990-04-05', '2014-2015', 'Uganda', '+256754604991', 'allanmukasa@gmail.com', 1, 73),
(214002117, '14/U/14615/PS', ' GEORGE', 'SENKATUKA', 'Day', 'M', '1992-03-29', '2014-2015', 'Uganda', '+256700870810', 'george@gmail.com', 1, 101),
(214002128, '14/U/23570/EVE', '  Francis ', 'KIYEGGA', 'Evenning', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256788408956', 'francis@yaho.com', 3, 1121),
(214002446, '14/U/8272/PS', 'EMMANUEL  Victor ', 'Kamya ', 'Day', 'M', '1998-09-30', '2014-2015', 'Uganda', '+256754604991', 'kamya@gmail.com', 3, 1083),
(214002488, '14/U/23842/PS', ' BRIAN GAD', 'OCAYA', 'Day', 'M', '1995-07-24', '2015-2016', 'Uganda', '+256705691565', 'ocaebrian@gmail.com', 2, 1177),
(214002771, '14/U/7412/PS', ' Gideon ', 'BAMULESEYO ', 'Day', 'M', '1990-12-30', '2014-2015', 'Uganda', '+256701254698', 'gideon@yahoo.com', 3, 1071),
(214002883, '14/U/13534/PS', 'Yahaya ', 'MULINDA  ', 'Day', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256772895214', 'yahaya@yahoo.com', 3, 1152),
(214002887, '14/U/9283/PS', ' HAKIM INNI', 'MPAATA', 'Day', 'M', '1999-05-12', '2014-2015', 'Uganda', '+256794102873', 'innihakim@gmail.com', 1, 82),
(214002896, '15/U/12581/PS', 'SEMUKUYE BRIAN', 'SEMUKUYE', 'Day', 'M', '1993-02-28', '2015-2016', 'Uganda', '+256772673412', 'semukuyesemukuye@gmail.com', 2, 1168),
(214002902, '15/U/8041/PS', ' CHRISTOPHER', 'MUHUMUZA', 'Day', 'M', '1989-05-23', '2015-2016', 'Uganda', '+256701446376', 'muhumuzechristopher@gmail.com', 2, 1174),
(214002918, '14/U/10810/PS', '  Barbra ', 'LAKOT', 'Day', 'F', '1997-01-20', '2014-2015', 'Uganda', '+256771235698', 'barbra@yahoo.com', 3, 1128),
(214002920, '14/U/23611/EVE', '  Anold ', 'KYEZA', 'Evenning', 'M', '1997-02-26', '2014-2015', 'Uganda', '+256701236589', 'anold@yahoo.com', 3, 1127),
(214003040, '15/U/13340/PS', ' DAVID', 'TUMWEBAZE', 'Day', 'M', '1995-06-23', '2015-2016', 'Uganda', '+256771236598', 'tumwebaedavid@gmail.com', 2, 1193),
(214003043, '15/U/10273/PS', ' NAMIREMBE NORAH', 'NAMBUULE', 'Day', 'M', '1990-02-16', '2015-2016', 'Uganda', '+256775681668', 'nambuulenamirembe@gmail.com', 2, 1198),
(214003372, '14/U/9868/PS', ' Hope ', 'KEMIGISHA ', 'Day', 'F', '0000-00-00', '2014-2015', 'Uganda', '+256782301466', 'hope@yahoo.com', 3, 1114),
(214003400, '15/U/11485/PS', 'VALERIAN', 'NSEREKO ', 'Day', 'M', '1995-06-25', '2015-2016', 'Uganda', '+256704125477', 'nserekoevalerian@gmail.com', 2, 1199),
(214003443, '14/U/8611/PS', ' JUDITH', 'LINDA', 'Day', 'F', '1996-08-13', '2014-2015', 'Uganda', '+256759618395', 'judith@gmail.com', 1, 79),
(214003505, '14/U/8967/PS', ' Mathias ', 'KAHUMA ', 'Day', 'M', '1992-08-27', '2014-2015', 'Uganda', '+256785646133', 'mathias@yahoo.com', 3, 1097),
(214003581, '14/U/13495/PS', '  K Joel ', 'MUKAMA', 'Day', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256788256945', 'mukama@gmail.com', 3, 1150),
(214003597, '15/U/12077/PS', ' GEORGE', 'OKURAPA', 'Day', 'M', '1995-02-27', '2015-2016', 'Uganda', '+256701235698', 'okurapaegeorge@gmail.com', 2, 1184),
(214003598, '15/U/4717/PS', 'JACOB BA MODA', 'BWAYO ', 'Day', 'M', '1994-01-01', '2015-2016', 'Uganda', '+256771235987', 'bwaejacob@gmail.com', 2, 1185),
(214003602, '15/U/5520/PS', 'KENNETH TOM', 'KAKOOZA ', 'Day', 'M', '1997-02-26', '2015-2016', 'Uganda', '+256772315698', 'kakoozaekenneth@gmail.com', 2, 1191),
(214003604, '15/U/7137/PS', ' SULAIMAN', 'LUKWAGO', 'Day', 'M', '1996-08-15', '2015-2016', 'Uganda', '+256773789076', 'lukwagoesulaiMan@gMail.coM', 2, 1206),
(214003646, '14/U/11025/EVE', ' Arnold Matia ', 'LUBEGA ', 'Evenning', 'M', '1996-05-30', '2014-2015', 'Uganda', '+256772569874', 'lubega@gmail.com', 3, 1130),
(214003652, '15/U/653', ' JOSHUA', 'MUGABI', 'Day', 'M', '1995-04-24', '2015-2016', 'Uganda', '+256705691565', 'mugaejoshua@gmail.com', 2, 1164),
(214003879, '14/U/11591/PS', ' CHRISTINE', 'NAKYEJJWE', 'Day', 'F', '1989-10-23', '2014-2015', 'Uganda', '+256785646133', 'christine@gmail.com', 1, 87),
(214003910, '14/U/6759/PS', ' Sandra ', 'AGAINE ', 'Day', 'F', '1994-09-13', '2014-2015', 'Uganda', '+256788987453', 'againeSandra@gmail.com', 3, 1056),
(214003915, '14/U/7750/EVE', ' Ronald ', 'BISASO ', 'Evenning', 'M', '1989-05-23', '2014-2015', 'Uganda', '+256701958020', 'ronald@yahoo.com', 3, 1075),
(214003926, '14/U/6794/PS', ' Owen ', 'AINEBYONA ', 'Day', 'M', '1990-05-11', '2014-2015', 'Uganda', '+256776789076', 'shemmymiriam@yahoo.com', 3, 1058),
(214003936, '15/U/12190/PS', ' HERBERT', 'ONYAIT', 'Day', 'M', '1997-03-16', '2015-2016', 'Uganda', '+256700870810', 'onyaeherbert@gmail.com', 2, 1197),
(214003957, '15/U/13345/PS', ' MICHEAL', 'AMANYIRE', 'Day', 'M', '1991-08-24', '2012-2016', 'Uganda', '+256782301466', 'amanyiremicheal@gmail.com', 2, 1200),
(214004013, '14/U/10273/PS', '  Denis Paul ', 'KIYINGI', 'Day', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256772673412', 'kiyingi@gmail.com', 3, 1122),
(214004024, '14/U/9032/EVE', '  Benon ', 'KAHUMUZA', 'Evenning', 'M', '1997-03-16', '2014-2015', 'Uganda', '+256706142210', 'benon@yahoo.com', 3, 1098),
(214004032, '14/U/9140/EVE', ' Elastus ', 'KAKULE ', 'Evenning', 'M', '1995-06-25', '2013-2014', 'Uganda', '+256750553277', 'elastus@yahoo.com', 3, 1100),
(214004037, '14/U/925', '  Nicholus ', 'MUDOOLA', 'Day', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256774236598', 'nicholus@yahoo.com', 3, 1143),
(214004084, '14/U/8069/PS', '  Andrew Womeraka ', 'DDAMULIRA', 'Day', 'M', '1987-10-30', '2014-2015', 'Uganda', '+256773266009', 'ddamulira@gmail.com', 3, 1080),
(214004137, '15/U/987', ' JOSHUA', 'NDOBOLI', 'Day', 'M', '1993-07-18', '2015-2016', 'Uganda', '+256779632548', 'ndoboliejoshua@gmail.com', 2, 1183),
(214004340, '15/U/216', 'JOHNNY LEONARD', 'BAZIRA ', 'Day', 'M', '1995-05-03', '2015-2016', 'Uganda', '+256703020951', 'baziejohnny@gMail.coM', 2, 1203),
(214004411, '15/U/7641/PS', ' SHAKA PATRICK', 'MINEGA', 'Day', 'M', '1997-09-23', '2015-2016', 'Uganda', '+256772458963', 'mineeshaka@gmail.com', 2, 1188),
(214004420, '14/U/13469/EVE', ' Jerald ', 'MUHWEZI ', 'Evenning', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256751256978', 'jerald@yahoo.com', 3, 1149),
(214004438, '14/U/7282/EVE', '  Joseph ', 'ASIIMWE', 'Evenning', 'M', '1990-09-14', '2014-2015', 'Uganda', '+256771235698', 'josephasaiimwe@gmail.com', 3, 1066),
(214004838, '14/U/4330/PS', 'BRENDA', 'ADONGOT', 'Day', 'F', '1994-11-03', '2014-2015', 'Uganda', '+256756425566', 'brendaadongot@gmail.com', 1, 38),
(214004939, '14/U/12850/EVE', ' Joseph ', 'MUGAMBE ', 'Evenning', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256779632548', 'odongo@yahoo.com', 3, 1144),
(214004951, '15/U/1209/PS', 'SAMSON', 'SSERWADDA ', 'Day', 'M', '1993-10-18', '2015-2016', 'Uganda', '+256775681668', 'sserwadesamson@gmail.com', 2, 1171),
(214004960, '15/U/11417/PS', ' TIMOTHY', 'NKOYOYO', 'Day', 'M', '1999-05-12', '2015-2016', 'Uganda', '+256703020951', 'nkoyoyoetimothy@gmail.com', 2, 1176),
(214004962, '14/U/11844/PS', ' JACKLINE P', 'NAMAGEMBE', 'Day', 'F', '0000-00-00', '2014-2015', 'Uganda', '+256706142210', 'pjackline@gmail.com', 1, 88),
(214004963, '15/U/5753/PS', ' BRIGHT', 'KANYANGE', 'Day', 'M', '1987-10-30', '2015-2016', 'Uganda', '+256773789076', 'kanyangebright@gmail.com', 2, 1179),
(214005098, '15/U/6460/PS', ' GLORIA', 'KIRABO', 'Day', ' ', '1989-02-23', '2015-2016', 'Uganda', '+256753251822', 'kiraegloria@gmail.com', 2, 1162),
(214005106, '14/U/8866/EVE', '  Ham ', 'KAGGWA', 'Day', 'M', '1992-03-29', '2014-2015', 'Uganda', '+256773102045', 'ham@yahoo.com', 3, 1096),
(214005207, '14/U/8112/EVE', 'Edwins ', 'DILLA  ', 'Evenning', 'M', '1987-11-20', '2014-2015', 'Uganda', '+256754538391', 'edwins@yahoo.com', 3, 1081),
(214005348, '15/U/7652/PS', 'GILDAH ABIGAIL', 'MIREMBE ', 'Day', ' ', '1996-05-30', '2015-2016', 'Uganda', '+256771253698', 'mirembeegildah@gmail.com', 2, 1194),
(214005732, '15/U/11885/PS', ' HALLAN CHARLES', 'ODONGO', 'Day', ' ', '1996-08-13', '2015-2016', 'Uganda', '+256782301466', 'odonehallan@gmail.com', 2, 1173),
(214005772, '14/U/12632/PS', ' MAJORINE', 'NANNYONGA', 'Day', 'F', '1995-10-14', '2014-2015', 'Uganda', '+256754049545', 'majorine@gmail.com', 1, 92),
(214005781, '14/U/11360/EVE', ' Joseph ', 'LUSOMA ', 'Evenning', 'M', '1997-03-16', '2014-2015', 'Uganda', '+256701254698', 'joseph@yahoo.com', 3, 1133),
(214005793, '15/U/13629/PS', 'KENNETH', 'WAKOKO ', 'Day', 'M', '1995-10-14', '2015-2016', 'Uganda', '+256701236589', 'wakoekenneth@gmail.com', 2, 1186),
(214005800, '14/U/14049/EVE', ' DANIEL PAUMA', 'OLANYA', 'Evenning', 'M', '1997-02-26', '2014-2015', 'Uganda', '+256702682974', 'paumadaniel@gmail.com', 1, 97),
(214005807, '15/U/7927/PS', 'IBRAHIM', 'MUGOYA ', 'Day', 'M', '1995-09-15', '2015-2016', 'Uganda', '+256701446376', 'MugoeibrahiM@gMail.coM', 2, 1201),
(214005905, '14/U/8036/EVE', '  Timothy ', 'BWIRE', 'Evenning', 'M', '1996-09-15', '2014-2015', 'Uganda', '+256784853630', 'timothy@yahoo.com', 3, 1079),
(214006197, '14/U/644', '  Mark Benjamin ', 'KATAMBA', 'Day', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256703994948', 'katamba@gmail.com', 3, 1106),
(214006225, '14/U/8235/PS', ' NELSON', 'KONGO', 'Day', 'M', '1993-10-18', '2014-2015', 'Uganda', '+256706047083', 'nelson@gmail.com', 1, 77),
(214006561, '14/U/691', '  Rita ', 'KEMBABAZI', 'Day', 'F', '0000-00-00', '2014-2015', 'Uganda', '+256704125477', 'rita@yahoo.com', 3, 1113),
(214006699, '15/U/6394/PS', ' ERIC', 'KIKOMEKO', 'Day', 'M', '1992-01-31', '2015-2016', 'Uganda', '+256701567836', 'kikomekeeric@gmail.com', 2, 1169),
(214006795, '15/U/5694/EVE', ' SWIZEN', 'KAMUZIBIRE', 'Evenning', 'M', '1994-08-19', '2015-2016', 'Uganda', '+256701675647', 'kaMuzibeswizen@gMail.coM', 2, 1205),
(214007094, '14/U/6653/PS', ' JULIET', 'KABASOMI', 'Day', 'F', '1995-04-24', '2014-2015', 'Uganda', '+256773266009', 'pumkin@gmail.com', 1, 70),
(214007112, '14/U/12219/EVE', '  Faizo ', 'MPUUGA', 'Evenning', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256778632514', 'faizo@yahoo.com', 3, 1140),
(214007235, '14/U/12241/PS', ' ELIZABETH', 'NAMUGGA', 'Day', 'F', '1995-02-27', '2014-2015', 'Uganda', '+256750553277', 'elizabeth@gmail.com', 1, 90),
(214007258, '14/U/7679/EVE', ' Brenda Birungi ', 'BASHEMERA ', 'Evenning', 'M', '1996-08-13', '2014-2015', 'Uganda', '+256772569841', 'bashemera@gmail.com', 3, 1074),
(214007359, '14/U/13425/EVE', '  Allelua ', 'MUHIMBISE', 'Evenning', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256775326548', 'allelua@yahoo.com', 3, 1147),
(214008119, '14/U/13443/PS', '  Denis ', 'MUHWEZI', 'Day', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256751896325', 'denis@yahoo.com', 3, 1148),
(214008146, '15/U/10509/PS', 'RAIHANA NDI MUNA', 'NAMUSISI ', 'Day', ' ', '1990-09-14', '2015-2016', 'Uganda', '+256701675647', 'namusiseraihana@gmail.com', 2, 1165),
(214008337, '15/U/8430/PS', ' MAISWAL', 'MUSISI ', 'Day', 'M', '1989-10-23', '2015-2016', 'Uganda', '+256772673412', 'musie maiswal@gmail.com', 2, 1181),
(214008341, '15/U/4396PS', ' JOHN WYCLI M M', 'BARASA', 'Day', 'M', '1992-08-27', '2015-2016', 'Uganda', '+256757592117', 'baraejohn@gmail.com', 2, 1196),
(214008370, '15/U/747', ' EDMUND JONATHAN', 'MUTUMBA', 'Day', 'M', '1991-06-25', '2015-2016', 'Uganda', '+256773789076', 'mutumbaeedmund@gmail.com', 2, 1166),
(214008372, '15/U/6754/PS', 'HERBERT ', 'KULE ', 'Day', 'M', '1995-08-23', '2015-2016', 'Uganda', '+256753251822', 'kueherbert@gMail.coM', 2, 1202),
(214008475, '14/U/23310/EVE', '  Nobert ', 'BARUGAHARE', 'Evenning', 'M', '1992-09-14', '2014-2015', 'Uganda', '+256771253698', 'nobert@yahoo.com', 3, 1073),
(214008856, '14/U/10087/PS', '  Rhitah ', 'KISEMBO', 'Day', 'F', '0000-00-00', '2014-2015', 'Uganda', '+256705691565', 'rhitah@yaho.cof', 3, 1118),
(214009743, '14/U/11439/EVE', '  Andrew Gaston ', 'LUTALO', 'Evenning', 'M', '1995-06-25', '2014-2015', 'Uganda', '+256771253698', 'lutalo@gmail.com', 3, 1135),
(214009824, '15/U/7196/PS', ' SAMSON', 'LUWANGULA', 'Day', 'M', '1992-09-14', '2015-2016', 'Uganda', '+256704125477', 'luwanguesamson@gmail.com', 2, 1172),
(214009880, '14/U/5838/PS', ' SAMUEL', 'BULIME', 'Day', 'M', '1989-02-23', '2014-2015', 'Uganda', '+256750968733', 'samuel22@gmail.com', 1, 68),
(214010144, '14/U/7378/PS', 'Protus Waiswa ', 'BADAZA  ', 'Day', 'M', '1993-02-28', '2014-2015', 'Uganda', '+256771236598', 'badaza@gmail.com', 3, 1069),
(214010670, '14/U/6884/PS', ' Isaac Jonathan ', 'AKENA ', 'Day', 'M', '1995-09-10', '2014-2015', 'Uganda', '+256772673412', 'sharon@gmail.com', 3, 1060),
(214010686, '14/U/23253/EVE', '  Martin ', 'AHIMBISIBWE', 'Evenning', 'M', '1992-07-20', '2014-2015', 'Uganda', '+256717564378', 'martin@gmail.com', 3, 1057),
(214010901, '15/U/12936/PS', ' STEPHEN', 'SSENTAMU ', 'Day', 'M', '1998-09-30', '2015-2016', 'Uganda', '+256701567836', 'ssentamestephen@gmail.com', 2, 1182),
(214011158, '14/U/10379/PS', ' Paul ', 'KYAGULANYI ', 'Day', 'M', '1990-08-04', '2014-2015', 'Uganda', '+256701235698', 'paul@yahoo.com', 3, 1125),
(214011209, '14/U/7570/PS', ' WYCLIF', 'KAYE', 'Day', 'M', '1991-06-25', '2014-2015', 'Uganda', '+256700138858', 'wyclif@gmail.com', 1, 72),
(214012240, '14/U/7390/EVE', '  Allan ', 'BALIJJAWA', 'Evenning', 'M', '1992-01-31', '2014-2015', 'Uganda', '+256772315698', 'allan@yahoo.com', 3, 1070),
(214012338, '14/U/7796/PS', '  Joan ', 'BIYINZIKA', 'Day', 'F', '1988-07-25', '2014-2015', 'Uganda', '+256706890060', 'joan@yahoo.com', 3, 1076),
(214012922, '14/U/9339/EVE', '  James Amos ', 'KAMANDA', 'Day', 'M', '1995-09-15', '2011-2012', 'Uganda', '+256754049545', 'kamanda@gmail.com', 3, 1102),
(214012927, '14/U/9996/EVE', '  Daniel Nalima ', 'KIBOMBO', 'Evenning', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256701446376', 'kibombo@gmail.com', 3, 1115),
(214012931, '15/U/13559/PS', ' JOSEPH GILBERT', 'UWAYEZU', 'Day', 'M', '1992-03-29', '2015-2016', 'Uganda', '+256755315526', 'uwayezuejoseph@gmail.com', 2, 1195),
(214012946, '14/U/3776/PS', ' CONSOLIET OCHAN', 'AYOO', 'Day', 'F', '1995-09-10', '2014-2015', 'Uganda', '+256701958020', 'ochan23@gmail.com', 1, 65),
(214013181, '15/U/9999/PS', ' SAUYA', 'NALWADDA', 'Day', ' ', '1990-08-04', '2015-2016', 'Uganda', '+256772569874', 'nalwaddesauya@gmail.com', 2, 1189),
(214013697, '14/U/9387/EVE', '  Andrew ', 'KARUMU', 'Evenning', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256755048101', 'andrew@yahoo.com', 3, 1104),
(214014202, '15/U/724', ' HILLARY', 'MUSIIMENTA', 'Day', 'M', '1997-08-23', '2015-2016', 'Uganda', '+256705691565', 'MusiiMeehillary@gMail.coM', 2, 1204),
(214014208, '14/U/7316/PS', ' MARK EDRINE', 'KATENDE', 'Day', 'M', '1990-09-14', '2014-2015', 'Uganda', '+256754538391', 'edrinemark@gmail.com', 1, 71),
(214014290, '14/U/10235/PS', ' Shadrack ', 'KITHAMA ', 'Day', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256773789076', 'shadrack@yaho.com', 3, 1120),
(214014308, '15/U/6727/PS', 'STANLEY', 'KOTUT ', 'Day', 'M', '1990-12-30', '2015-2016', 'Uganda', '+256700870810', 'kotestanley@gmail.com', 2, 1170),
(214014370, '15/U/7264/PS', ' DERRICK', 'MADIBO', 'Day', 'M', '1995-05-19', '2015-2016', 'Uganda', '+256771236598', 'madiederrick@gmail.com', 2, 1190),
(214014390, '14/U/14456/PS', ' LUCKY ANTHONY', 'RWAMUKAAGA', 'Day', 'M', '1996-05-30', '2014-2015', 'Uganda', '+256757592117', 'anthonylucky@gmail.com', 1, 100),
(214014473, '15/U/387', 'ROBERT', 'KATEEBA ', 'Day', 'M', '1997-01-20', '2015-2016', 'Uganda', '+256701254698', 'kateebaerobert@gmail.com', 2, 1192),
(214014659, '14/U/22612/EVE', '  Viola ', 'LUNKUSE', 'Evenning', 'F', '1992-08-27', '2014-2015', 'Uganda', '+256772315698', 'viola@yahoo.com', 3, 1132),
(214014669, '14/U/11047/EVE', '  John Rogers ', 'LUKWATA', 'Evenning', 'M', '1992-03-29', '2014-2015', 'Uganda', '+256771236598', 'lukwata@gmail.com', 3, 1131),
(214015413, '14/U/7839/PS', ' JOSHUA', 'KIHEMBO', 'Day', 'M', '1992-01-31', '2014-2015', 'Uganda', '+256705209945', 'joshua@gmail.com', 1, 75),
(214015433, '14/U/10303/PS', '  Diana Evarine ', 'KULABAKO', 'Day', 'M', '1995-11-17', '2014-2015', 'Uganda', '+256701567836', 'kulabako@gmail.com', 3, 1123),
(214015782, '14/U/7547/EVE', '  Solomon ', 'Mukisa ', 'Evenning', 'M', '1993-10-18', '2014-2015', 'Uganda', '+256771236598', 'solomon@yahoo.com', 3, 1072),
(214016142, '14/U/8581/PS', 'IMMACULATE', 'LAKER ', 'Day', 'F', '1992-09-14', '2014-2015', 'Uganda', '+256781698818', 'immaculate@gmail.com', 1, 78),
(214016143, '14/U/9431/EVE', '  Jesse Julius ', 'KASUMBA', 'Evenning', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256757592117', 'kasumba@gmail.com', 3, 1105),
(214016816, '14/U/4530/PS', 'KATO DEUS ', 'AINEBYOONA ', 'Day', 'M', '1992-07-20', '2014-2015', 'Uganda', '+256793727843', 'deusainebyoona@gmail.com', 1, 62),
(214018158, '14/U/9727/PS', '  Maureen ', 'KATUNGWENSI', 'Evenning', 'F', '0000-00-00', '2014-2015', 'Uganda', '+256700870810', 'maureen@yahoo.com', 3, 1111),
(214018352, '15/U/12637/PS', ' HOPE VICTORY', 'SHABA', 'Day', 'M', '1988-07-25', '2015-2016', 'Uganda', '+256753251822', 'shaehope@gmail.com', 2, 1175),
(214018801, '13/U/7848/EVE', ' JOHNSON', 'MASEREKA', 'Evenning', 'M', '1995-11-17', '2015-2016', 'Uganda', '+256771235698', 'maserekejohnson@gmail.com', 2, 1187),
(214018802, '14/u/11308/PS', 'Mildred', 'Nakayuki', 'Day', 'F', '1994-11-03', '2014-2015', 'Uganda', '+256701662622', 'mildredcax@gmail.com', 1, 35),
(214018848, '14/U/9821/EVE', ' Benedicto ', 'KAWUMA ', 'Evenning', 'M', '1993-02-20', '2014-2015', 'Uganda', '+256775681668', 'benedicto@yahoo.com', 3, 1112),
(214018864, '14/U/10879/EVE', 'Angela Jamimah ', 'LEHRU  ', 'Evenning', 'F', '1995-06-23', '2014-2015', 'Uganda', '+256772458963', 'lehru@gmail.com', 3, 1129),
(214018874, '14/U/523', ' Julius ', 'GIDUDU ', 'Day', 'M', '1995-02-27', '2014-2015', 'Uganda', '+256705209945', 'julius@yahoo.com', 3, 1085),
(214018876, '15/U/13400/PS', ' EDSON BA MAKI', 'TURYABAJE', 'Day', 'M', '1999-09-04', '2015-2016', 'Uganda', '+256788408956', 'turyabaeedson@gMail.coM', 2, 1207),
(214018882, '14/U/8343/EVE', ' Daudi ', 'GGINGO ', 'Evenning', 'M', '1993-07-18', '2014-2015', 'Uganda', '+256775909571', 'daudi@yahoo.com', 3, 1084),
(214019087, '14/U/14139/PS', ' E SAMUEL', 'ONGARIA', 'Day', 'M', '1997-01-20', '2014-2015', 'Uganda', '+256701873652', 'samuele@gmail.com', 1, 98),
(214019094, '14/U/13581/PS', ' EDGAR TIMOTHY', 'NYABONGO', 'Day', 'M', '1990-08-04', '2014-2015', 'Uganda', '+256757592117', 'timothyedgar@gmail.com', 1, 95),
(214019099, '14/U/12936/EVE', ' Emmanuel ', 'MUGENYI ', 'Evenning', 'M', '1989-03-30', '2014-2015', 'Uganda', '+256771458261', 'odongo@gmail.com', 3, 1145),
(214019373, '14/U/8094/PS', ' HERBERT', 'KIWALYA', 'Day', 'M', '1990-12-30', '2014-2015', 'Uganda', '+256750404825', 'herbert@gmail.com', 1, 76),
(214019410, '15/U/7692/PS', ' MOSES MUSISI', 'MPANGA', 'Day', ' ', '1992-05-23', '2015-2016', 'Uganda', '+256703020951', 'mpanemoses@gmail.com', 2, 1163),
(214019471, '14/U/14154/PS', ' ELVIS JOSHUA', 'ONYANGO', 'Day', 'M', '1995-06-23', '2014-2015', 'Uganda', '+256755315526', 'joshuaelvis@gmail.com', 1, 99),
(214019794, '15/U/2758/EVE', 'BOB BRUNO', 'ADUPA ', 'Evenning', 'M', '1990-04-05', '2015-2016', 'Uganda', '+256788408956', 'aduebob@gmail.com', 2, 1167),
(214020294, '14/U/10401/EVE', '  Solomon ', 'KYAZZE', 'Evenning', 'M', '1995-05-19', '2014-2015', 'Uganda', '+256771235987', 'solomon@yahoo.com', 3, 1126),
(214020295, '14/U/314', ' Mirriam Semmy ', 'AJWANG ', 'Day', 'F', '1995-02-09', '2014-2015', 'Uganda', '+256788408956', 'ajwangisaac@gmail.com', 3, 1059),
(214020297, '14/U/10207/EVE', ' Andrew Kalumba ', 'KISITU ', 'Evenning', 'M', '1992-10-20', '2014-2015', 'Uganda', '+256701675647', 'kisitu@gmail.com', 3, 1119),
(214020644, '14/X/22334/EVE', 'ATSBEHA BAHRU', 'MESERET ', 'Evenning', 'M', '1988-07-25', '2014-2015', 'Ethiopia', '+256755958739', 'bahruatsbeha@gmail.com', 1, 81),
(214020655, '14/X/22316/PS', 'Lahat', 'John', 'Day', 'M', '1991-01-07', '2014-2015', 'South Sudan', '+256781698818', 'latmayen@yahoo.com', 1, 48),
(214020787, '14/U/746', ' John Bosco ', 'KUZANYA ', 'Day', 'M', '1997-09-23', '2014-2015', 'Uganda', '+256779632548', 'kuzanya@gmail.com', 3, 1124),
(214020788, '14/U/10056/PS', ' Phillip Raymond ', 'KIGENYI ', 'Day', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256753251822', 'kigenyi@gmail.com', 3, 1116),
(214021022, '14/U/12243/EVE', '  Charles ', 'MUBIRU', 'Evenning', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256781235698', 'charles@yahoo.com', 3, 1141),
(214023040, '14/U/23839/PS', ' DENIS', 'OBURA', 'Day', 'M', '1995-05-19', '2014-2015', 'Uganda', '+256703994948', 'denis@gmail.com', 1, 96),
(214023981, '14/U/24353', ' EZEKIEL', 'WAVAMUKOZI', 'Day', 'M', '1990-02-16', '2014-2015', 'Uganda', '+256782301466', 'ezekiel@gmail.com', 1, 104),
(214023987, '14/U/24351', ' STELLA', 'NUWAHEREZA', 'Day', 'F', '1997-09-23', '2014-2015', 'Uganda', '+256755048101', 'stella@gmail.com', 1, 94),
(214024382, '14/U/13287/EVE', ' Leonalds ', 'MUGUMYA ', 'Evenning', 'M', '0000-00-00', '2014-2015', 'Uganda', '+256771236589', 'odongo@gmail.com', 3, 1146),
(214024647, '14/U/24679', 'RUTH', 'AMURON', 'Day', 'F', '1995-02-09', '2014-2015', 'Uganda', '+256789530269', 'amuronruth@gmail.com', 1, 64),
(214024732, '14/U/25157/PS', ' JOSHUA', 'EKAYU', 'Day', 'M', '1992-05-23', '2014-2015', 'Uganda', '+256784853630', 'ejoshua@yahoo.com', 1, 69),
(214070988, '14/U/7865/PS', '  Dominic ', 'BUA', 'Day', 'M', '1999-05-12', '2014-2015', 'Uganda', '+256779253988', 'dominic@yahoo.com', 3, 1077);

-- --------------------------------------------------------

--
-- Table structure for table `teaching`
--

CREATE TABLE IF NOT EXISTS `teaching` (
  `teachingID` int(10) NOT NULL AUTO_INCREMENT,
  `staffID` varchar(12) NOT NULL,
  `course_id` int(10) NOT NULL,
  `academicYear` varchar(10) NOT NULL,
  `program` varchar(10) NOT NULL,
  PRIMARY KEY (`teachingID`),
  KEY `teaching_ibfk_1` (`staffID`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `teaching`
--

INSERT INTO `teaching` (`teachingID`, `staffID`, `course_id`, `academicYear`, `program`) VALUES
(3, 'SCIT19', 11, '2014-2015', 'Both'),
(4, 'SCIT05', 31, '2014-2015', 'Both'),
(5, 'SCIT35', 12, '2014-2015', 'Both'),
(6, 'SCIT03', 1, '2015-2016', 'Both'),
(8, 'SCIT02', 4, '2016-2017', 'Both'),
(11, 'SCIT09', 7, '2016-2017', 'Both'),
(14, 'SCIT02', 24, '2016-2017', 'Day'),
(15, 'SCIT02', 36, '2016-2017', 'Both'),
(16, 'SCIT10', 3, '2014-2015', 'Both'),
(17, 'SCIT19', 10, '2014-2015', 'Both'),
(18, 'SCIT35', 32, '2014-2015', 'Both'),
(20, 'SCIT02', 4, '2014-2015', 'Both'),
(21, 'SCIT04', 5, '2014-2015', 'Both'),
(22, 'SCIT03', 33, '2014-2015', 'Both'),
(23, 'SCIT05', 37, '2014-2015', 'Both'),
(24, 'SCIT20', 34, '2014-2015', 'Both'),
(25, 'SCIT12', 35, '2014-2015', 'Both'),
(27, 'SCIT15', 2, '2015-2016', 'Both'),
(28, 'SCIT15', 6, '2015-2016', 'Both'),
(29, 'SCIT08', 13, '2015-2016', 'Both'),
(30, 'SCIT09', 15, '2015-2016', 'Both'),
(31, 'SCIT14', 14, '2015-2016', 'Both'),
(32, 'SCIT03', 29, '2015-2016', 'Both'),
(34, 'SCIT08', 16, '2015-2016', 'Both'),
(36, 'SCIT19', 18, '2015-2016', 'Both'),
(37, 'SCIT20', 19, '2015-2016', 'Both'),
(38, 'SCIT11', 20, '2015-2016', 'Both'),
(41, 'SCIT02', 21, '2015-2016', 'Both'),
(42, 'SCIT17', 22, '2016-2017', 'Both'),
(43, 'SCIT12', 23, '2016-2017', 'Both');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL,
  `profilepic` varchar(100) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `last_logOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `secret_code` varchar(32) NOT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1208 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `profilepic`, `usertype`, `last_logOn`, `secret_code`) VALUES
(1, '14/U/375', '0f2dfab78133702e6014b73de5bf8eb1', '../images/IMG_20160908_004123.jpg', 'student', '2017-07-14 11:30:15', 'b59c67bf196a4758191e42f76670ceba'),
(4, 'evelynkahiigi@cit.mak.ac.ug', 'da47166cc95b26761c7460ceb2e3a7ba', '../images/in4.jpg', 'H.O.D', '2017-07-11 17:12:16', '3b712de48137572f3849aabd5666a4e3'),
(7, 'flashina7@gmail.com', '064d492271a60cfd5b35efd290100160', '../images/in6.jpg', 'lecturer', '2017-07-04 07:38:26', '81dc9bdb52d04dc20036dbd8313ed055'),
(13, 'ndibatyainnocent@yahoo.com', '57bcf2a52aa67fe051519da4762f6d5f', '', 'lecturer', '2017-07-11 17:59:42', '3b712de48137572f3849aabd5666a4e3'),
(15, 'henryserugunda@gmail.com', '54c87bea342ad07aca1009be14af69e0', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(29, 'halimkas@gmail.com ', '7ba92a4fa79047cb21314290a63b15e1', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(35, '14/U/11308/PS', '71076474b095aa8c60029926922c851b', '../images/DSC_2180.JPG', 'student', '2017-07-05 12:42:43', 'b59c67bf196a4758191e42f76670ceba'),
(38, '14/U/4330/PS', '721a55b5dd86849f8613cfc6ba1497c2', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(39, 'amuronruth@gmail.com', 'e7d0aae7f2fc6dba27ff665d22b67530', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(44, 'edithnaluyimba@cis.mak.ac.ug', 'aa3ccd65909dad3b8a45e9fa5fd7dd12', '../images/IMG_20170126_163051', 'Admin', '2017-07-14 04:22:04', 'fd06b8ea02fe5b1c2496fe1700e9d16c'),
(45, 'josephsemwogerere@gmail.com', 'bff1efa0b147c4c1769347f7ebcce1f4', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(46, 'ssemaluulupaul@yahoo.com', 'b9d2e63234d94e20e6d3cbfb378165c9', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(47, 'tulinayofiona@gmail.com', '85ab26620f44ffb1c815e3446e49b34b', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(48, '14/X/22316/PS', 'e9abd1b5944c52ebb7c86e26f599a9e2', '../images/IMG-20170703-WA0000.jpg', 'student', '2017-07-04 07:27:58', 'b59c67bf196a4758191e42f76670ceba'),
(49, 'emamugejjera@gmail.com', '3cf71b1f95c61522e8b65b9411a35f2c', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(50, 'azawedde@mak.ac.ug', '73133274652687f6f0d7cf8b1f24d1b5', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(51, 'fnamagembe@gmail.com', 'ea7f530417b885fe626ed8e0c8f7255c', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(52, 'innondibatya@gmail.com', '191d955cbb354f13d201f7ffa4e10113', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(53, 'paul10sem@yahoo.com', 'c8d3fe990cc15a4979e7b1ad44c4754f', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(54, 'hawany90@gmail.com', '7bb77a3f78f8c7df6680d021e4cfbb44', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(55, 'nmagaret@cis.mak.ac.ug', '677dcd7eefc9806f9d10b49de5c7e3be', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(56, 'fturinayo@gmail.com', 'a4a9a712765ef632f345d13c45c915a7', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(57, 'jlwomwa@yahoo.com', '45ac47b261d378a7fe4c8e3252146ee6', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(58, 'jingodwa5@outlook.com', 'd896c872518ae6009e121ff6f5eeec39', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(59, 'hsserugiunda@gmail.com', '25c4e22bb57d5dc8622a2874c1551a60', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(60, 'hchongomeru@cis.mak.ac.ug', 'ceab2a45e682212fd4960ba29f39d381', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(61, '14/U/37', '2ef3610e8b736bff4fa23ab1aa1ffa8f', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(62, '14/U/4530/PS', '5b57bcea281c6c1a85831929144b3971', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(63, '14/U/91', '49d69aa2c2632083e70c56244908bc85', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(64, '14/U/24679', 'e0adbbcefde8456e401c3d597fc07067', '../images/Ruth.jpg', 'student', '2017-07-04 05:36:17', 'b59c67bf196a4758191e42f76670ceba'),
(65, '14/U/3776/PS', '77370e267916aeaa0843a48be94a3441', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(66, '12/U/22208/PS', 'd71d66949f9663f9e0737025b8ea3b67', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(67, '14/U/1825', '051009358a412103e522672b25d599bf', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(68, '14/U/5838/PS', '1ae59810e325c62e0030f09e4ec57970', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(69, '14/U/25157/PS', '7df72522c4ec68fb1365bde468c76c21', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(70, '14/U/6653/PS', 'bb0063151f3853deb5745c15e19f5e43', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(71, '14/U/7316/PS', '76d9656ae1d6aff1eb49b0162ad76b51', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(72, '14/U/7570/PS', '4f947545542b7701e67e859a314655ad', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(73, '14/U/7786/PS', '6db948ef336a714f81b7c2d83c284173', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(74, '14/U/445', '93e2440b3de041e456a7df10624c5898', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(75, '14/U/7839/PS', '3630844c7a2ebbd5fad14972f2385ca5', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(76, '14/U/8094/PS', '72f55fcb9215d56b4cf8041594550de0', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(77, '14/U/8235/PS', '1ff9f389176616a82c55ccc6bc14d930', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(78, '14/U/8581/PS', '78eb8c8b93a4d1fa6c2f72644c094858', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(79, '14/U/8611/PS', '726a79a6b0dd8ed0afdd651ca3a20012', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(80, '14/U/545', 'f7ab4703c7f6bbb5ce40d7de742845e8', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(81, '14/X/22334/EVE', '2dd4f41456d3a783a5989e163f52245a', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(82, '14/U/9283/PS', '4a928f3d4a04069a40df69611f093823', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(83, '14/U/641', 'f5a25dbdc62b78a70b5331d342c11e91', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(84, '14/U/687', 'fd9be33a5b09aa93daddbdbe147045fb', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(85, '14/U/724', '8fffc94bbdbc10335c7f1ff6cacf1270', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(86, '14/U/801', '39bef6d2864be7b2ac8c314fd15ea431', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(87, '14/U/11591/PS', '9dacbb7f16cea45be43e92442bd511fc', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(88, '14/U/11844/PS', '38aefd055847e936f69abc976c10dfaa', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(89, '14/U/864', 'f48f5dc1b0a6a39e33ff057887ac0091', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(90, '14/U/12241/PS', 'c2291bef7fc46663f7dd2ba351bea049', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(91, '14/U/1872', '10a3ad6a4bd3939df4e9d565ecc49ae4', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(92, '14/U/12632/PS', 'efba41213a642cd98c08f47666e0a8c0', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(93, '14/U/954', '5cf6fe960f516ec007fa07bcdf81294b', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(94, '14/U/24351', '1b9e26b3ee162cb51827194eae7ee0fb', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(95, '14/U/13581/PS', '498acbddca81f5ba6044af798f78a35f', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(96, '14/U/23839/PS', '38d6d25d43e0e4a5f1de27f1ee5511e0', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(97, '14/U/14049/EVE', '8564e6bd9d105b225e01abd048666c30', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(98, '14/U/14139/PS', '7146503f26e90e7453fc03224e3589f3', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(99, '14/U/14154/PS', 'cfd1d761e4059aa1aeb89d03f43a80bf', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(100, '14/U/14456/PS', '9ba1ad8b8177472de5722350cf6f1989', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(101, '14/U/14615/PS', '0623fd933c5b3023a4774c50e0e9947d', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(102, '14/U/1271', '00b971534ed31a787a0bf427604672ef', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(103, '14/U/1275', '1d0fb53f16b03f303713369a8ba32b4d', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(104, '14/U/24353', 'a9d9f4dca7a8c6185048d84540a58aa0', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(105, '13/U/14756/PS', 'bc55d01e9045f461730811112c772fb9', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(106, '12/U/22399/EVE', 'f55507a6410af1f179d1d16a123c02b4', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(107, '11/U/24033/PS', '7b385b87cfd2678b71eb41150aa0bf73', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(108, '12/U/8676/PS', 'a2baa5be9cc7a2b5f6c94ea95390c420', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1044, 'gbitwire@gmail.com', '017f921ae81b20daf2c9762b73fb949c', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1045, 'emmaojeke@gmail.com', 'edb51fe096dc5f530420912cf8ea0196', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1046, 'innocentopumar@gmail.com', 'ce02aba950befa89753940bf1dd3ef3a', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1047, 'makuku@gmail.com', '8d32fcb90506774a1962d53927181e89', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1048, 'jmushi@yahoo.com', '6d1ff6e22870d06fd2d0f4321233867d', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1049, 'pnabende@cit.mak.ac.ug', '3813f22467919dbcb3a37bee17097987', '', 'H.O.D', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1050, 'engbainomugisha@gmail.com', '06f183dbf4bf2b9a43e2b9bc68dd3b2b', '', 'H.O.D', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1051, 'mosadimo@yahoo.com', 'df10e2af093544f8c34ff885196cc137', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1052, 'agnabiubi@gmail.com', 'c7a79c36efe258758f590ee794230478', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1053, 'smutunji@gmail.com', '6715ed8c74c514a2d3e5624195d963e1', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1054, 'sanakayiru@yahoo.com', '33d80658b2832aa19feaca304f8d86d7', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1055, 'wnamoso@gmail.com', '3f7eb59c4268890b767cb65e15790fce', '', 'lecturer', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1056, '14/U/6759/PS', 'ab5377359e28a8bcf9730146867e01c1', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1057, '14/U/23253/EVE', 'd9f6bc11720138cf97ba733cb6b796b9', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1058, '14/U/6794/PS', '78fea00c7d85d5a4b52aede6bdc1afcc', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1059, '14/U/314', 'df3688ff6cfc57dfb21ad991f87150d3', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1060, '14/U/6884/PS', 'bf39ed9596b65f44046e1e5cf30bfef3', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1061, '14/U/337', '1bb72f8c1e1ccd4a583da4c58ff5cf7b', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1062, '14/X/22308/PS', 'c1672be24ede5c45df14599ac4abee0e', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1063, '14/U/7058/EVE', '000cd2048c47c5089bb7608cb494859c', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1064, '14/U/7142/PS', '4ee7e5b2398dd442dd83e478ce294812', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1065, '14/U/7262/PS', '59568972e60c48fe3b304c1d22ea23b8', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1066, '14/U/7282/EVE', 'd872eb5a817e94ab4002bf7d4b80a655', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1067, '14/U/23285/PS', '1172d85c8e43ed5749cb77afabeb8e5c', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1068, '14/U/7375/PS', '9957553a6495e6c3698c3f7c1ca80f1e', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1069, '14/U/7378/PS', '03deefe4b3860615c5370fafba621ef9', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1070, '14/U/7390/EVE', '497c6e60b684c12573c95bde4bb1874e', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1071, '14/U/7412/PS', '66f4c12a6db4912b431aa8bd984a7439', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1072, '14/U/7547/EVE', '966217fdcd9ebec8e0884fe9372b8ac5', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1073, '14/U/23310/EVE', '68a96273b2efa9bfd0f90d2417d2fac5', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1074, '14/U/7679/EVE', '2bfe485af204582448a5bd0b8eb1d7df', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1075, '14/U/7750/EVE', '9f383af4c2c1dbde3da6fe6f04f523fb', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1076, '14/U/7796/PS', '06d5405fa5165fd9bd2dac0ed0d0f71a', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1077, '14/U/7865/PS', 'df3bd3b5ae62256745067ea2e472ba11', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1078, '14/U/8028/EVE', '319ee096fd30dc2f7e4e511e8fdec8db', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1079, '14/U/8036/EVE', '6dd7484a31ae69ef4dfa4d2551498842', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1080, '14/U/8069/PS', '761ecd397a9be4278cdc706b181e6078', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1081, '14/U/8112/EVE', '6816d59a793af9209564030c2012b32e', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1082, '14/U/494', '047f30a7bbe1744d583ad0d1006e483e', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1083, '14/U/8272/PS', 'd2c1cc300a096d1c85fbe9060d46c725', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1084, '14/U/8343/EVE', '20917b53fe5c89ff12fc657569dfe1db', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1085, '14/U/523', 'd10d6512b57c0b0c99ffb9340899b66f', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1086, '14/U/8484/PS', '800afb2ed053363b6c24a0a3beac2d27', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1087, '14/U/8509/EVE', '7a6af74ec975d625c279eb3e604f5042', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1088, '14/U/8585/PS', '8514a103560dfed8bc3e1ffb0b908976', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1089, '14/U/8603/PS', 'b0aa1a3bb1cb83525e1c7dd6f0642731', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1090, '14/U/8646/EVE', '5997c46c3b709a66cc1d4f8fc4b0e82d', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1091, '14/U/8711/PS', '902c4d995d3889df5b49cfa7a7e2f2ae', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1092, '14/U/8738/PS', 'e08605b2380f1c284e39c0799fb36d14', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1093, '14/U/8747/PS', '2e8601675db634bd7cc92c0daf1555ed', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1094, '14/U/8759/PS', 'fc05f8b442d326da1ba9b7f6a60415eb', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1095, '14/U/8760/EVE', '141691327e01292d42fb8a003d9440eb', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1096, '14/U/8866/EVE', 'c2ef9724f2ef223519c19d4178678b1d', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1097, '14/U/8967/PS', '60ec7ac92e3ea8d0cf901d864032101a', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1098, '14/U/9032/EVE', 'cfde2dfafee18907894db7781a46422e', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1099, '14/U/22411/PS', '826292fbc1e8bb31979b2021a3310e61', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1100, '14/U/9140/EVE', 'c45153cdce1aca4408bab684831ef61c', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1101, '14/U/9319/EVE', '16783d8c0a05c098cbfe4a14d680ad4b', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1102, '14/U/9339/EVE', '2c34414d0487b351fdbfddab52d406d7', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1103, '14/U/9361/PS', '63b10770565479a7726a932077ab70da', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1104, '14/U/9387/EVE', 'b9a97bc7916f71c1c3cd9f4ff4d2edd2', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1105, '14/U/9431/EVE', 'cb7793d90b371b81322f8f524aa39aa9', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1106, '14/U/644', '76a802f02985897965eae189b12f6dad', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1107, '14/U/9560/PS', 'b904697e76a2108c796b27059777fcdc', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1108, '14/U/9605/PS', 'a255c0c7c36e90c0b6a4c544abee7671', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1109, '14/U/9679/EVE', 'ff2a96a5179645829f65b916fc688f05', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1110, '14/U/25199', '4a04150e03e7d2bf451a98c7eb1af655', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1111, '14/U/9727/PS', 'f1fd3a10a7f0624a65ae6dedcb387222', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1112, '14/U/9821/EVE', '15b1fc83f1383ef8215966b62906a4db', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1113, '14/U/691', '3f473d83f4d313b3780d3d3ac60c3b6e', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1114, '14/U/9868/PS', '6b4aeee63dc7f7ac85ef840df8c89f13', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1115, '14/U/9996/EVE', '6f808695b00cfa6d036c680a43f2eaf7', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1116, '14/U/10056/PS', '5a839e0916d904c452577d0a1e01d149', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1117, '14/U/10063/PS', '3fee6c4d9798d40f9cc89eec083a4040', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1118, '14/U/10087/PS', '57f76f579d05c9fc6d846e5fc9d6f332', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1119, '14/U/10207/EVE', '816f2a162a01a6972025a9e613df7d37', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1120, '14/U/10235/PS', 'a44f2ad41677616b2d634507b5983b2b', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1121, '14/U/23570/EVE', '763de8f54c115f4a41ec8a391dc769e6', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1122, '14/U/10273/PS', '29691d2c5351a96e83385146310c8469', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1123, '14/U/10303/PS', '630d5b866b4565ffd3614a918381b87d', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1124, '14/U/746', 'a9df87bf8fa5c8b3ec1dc95159bd653c', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1125, '14/U/10379/PS', '70a6392bfa713d5bdfceb44be1d543cb', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1126, '14/U/10401/EVE', 'f15a9fb830b1a52368bf3d58edb88cea', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1127, '14/U/23611/EVE', 'c667820b73b59f92dbf7b36880a1bd97', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1128, '14/U/10810/PS', '0a6c733e048a1a1ea914dc1e7b366308', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1129, '14/U/10879/EVE', '2afd361581b9b3379a1b95a0dac6c353', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1130, '14/U/11025/EVE', '10ad5888ea1b476811b9864b1c7002c8', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1131, '14/U/11047/EVE', 'dc805d86430ae1a74f7c208a8c29bec5', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1132, '14/U/22612/EVE', 'd3ef69e42aaf122123e41a7025e0a123', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1133, '14/U/11360/EVE', '422d73aca91587dff3b4b79cb6585b60', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1134, '14/U/11373/EVE', 'c72d8eccf5d7f0bdbdbc6cd1c3db1105', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1135, '14/U/11439/EVE', '00953b8c6bd4fbd570efe2d384f2e2ab', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1136, '14/U/11843/EVE', '6ac9df8da0dc54ef5a48feff7a449d80', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1137, '14/U/11855/EVE', 'a07234c34182afdff4811b01c991ef2f', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1138, '14/U/11952/EVE', '1cd4fce323a051bc7d9b31f6c6891103', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1139, '14/U/877', 'aba7619182a5180a7da369d5771b82d4', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1140, '14/U/12219/EVE', '832055fc881006b9c470225d912f2633', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1141, '14/U/12243/EVE', '99d1a1fa44ab7fbfd02061ec29d42eca', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1142, '14/U/12662/PS', '30365356d192092c30d72fb5c327a751', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1143, '14/U/925', '69503ab80a9265fdf681ab8e3b86e832', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1144, '14/U/12850/EVE', '046fd27812aec780e5815e059c574a61', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1145, '14/U/12936/EVE', 'b57fe078108c0030081199d629e3307b', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1146, '14/U/13287/EVE', 'dffe655269123f88e93a739a611c0509', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1147, '14/U/13425/EVE', '63a32159d2917b2dc05fc6cabab99526', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1148, '14/U/13443/PS', '0af869b794b0d196d0386d41b68dc7d0', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1149, '14/U/13469/EVE', '5d911d20979bfc3a829763c6fd3a7ecf', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1150, '14/U/13495/PS', 'dabd580beda7b667cef2ef1180d2022f', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1151, '14/U/999', 'd480d299dc1764d9c71fd8e77ffffdfc', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1152, '14/U/13534/PS', '63a3920da821d041c29a47704cfdad65', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1153, '14/U/13559/PS', '752a0c5621f0d0dda58d8d2a175ab71a', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1154, 'emugejjera@gmail.com', '034973c8554997da2aa3cffcd74c188e', '', 'lecturer', '2017-07-04 06:27:30', '81dc9bdb52d04dc20036dbd8313ed055'),
(1155, '15/U/3945/EVE', '72c98992e8e40abd5f8a68720a957ddb', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1156, '15/U/367', 'f6d1b347495f68af71fb44e5797220e4', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1157, '15/U/4658/EVE', 'daf9d9d5f05d60c3a8b63501cdc9096e', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1158, '15/U/8209/PS', '680aeee8d95e749e71cd0db7c62a428a', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1159, '15/U/1083', '4e02a7f08c7fc6b0a340f15e96c5bd19', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1160, '15/U/9601/PS', 'b1df4ea165db8f0444a2c9e22e8db01b', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1161, '15/U/11270/PS', '1ee90f90f1479255c51497dcdc7cea31', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1162, '15/U/6460/PS', '8dfa43a7922bea047a524fc3d648256e', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1163, '15/U/7692/PS', 'd6af746245dd69e26611e89bde4f1d55', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1164, '15/U/653', 'acf5e3ffe893964ff7ba6553a87b2d8a', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1165, '15/U/10509/PS', '2b65a92cc9a7cc89656b265dd95bd4a0', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1166, '15/U/747', '4d6544ec3e91725093092e64d29d1d92', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1167, '15/U/2758/EVE', '61a52946cec6a4ef94a2957a1598af9a', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1168, '15/U/12581/PS', 'f2a78376cc9b364fa91d60e80533afab', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1169, '15/U/6394/PS', 'a6ecc4a834a084d990734f23375b7db3', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1170, '15/U/6727/PS', 'd50c97a772a5adef82e6545296a55ca9', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1171, '15/U/1209/PS', '6b694efb8db24892dabaea2b4e090083', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1172, '15/U/7196/PS', '25f15fe542e512031dd7f613e3352795', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1173, '15/U/11885/PS', '8a59ce625a4e523c8b0e7b1cc591ff9f', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1174, '15/U/8041/PS', '24af08c33edc911f9ba503ef51429bbd', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1175, '15/U/12637/PS', '683affcee38737877f348e0bff1a254c', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1176, '15/U/11417/PS', '6e85b4efddf5220391551fa1a3c3e183', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1177, '14/U/23842/PS', '6e131c78670c6d57deeaf06b99af628a', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1178, '15/U/3893/PS', '28ae22277d151fbf90ae2cc500c3d514', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1179, '15/U/5753/PS', 'af81b0e0142002ed4c82023e2ec7f959', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1180, '15/U/9049/PS', '8a88799926c9e17b5378201dbaf39218', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1181, '15/U/8430/PS', '766b087e73464fe2a6d7e0e98e838da0', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1182, '15/U/12936/PS', '1caaf478d063cfcc78ab4589e8e28658', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1183, '15/U/987', '427420f09e51dd72d3184ec6d4d10fe1', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1184, '15/U/12077/PS', '274f7127977df18a8c5fdd4fa38e70a7', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1185, '15/U/4717/PS', '8ae85de7361c521fd3d73dcb33fd36ae', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1186, '15/U/13629/PS', 'd69f7dc14b2913d7cc2ec067b9716cdc', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1187, '13/U/7848/EVE', 'd49b30384f35361e36f4b6ae9b7e313d', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1188, '15/U/7641/PS', 'e206eb1105dffa483fa3e44dfee41707', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1189, '15/U/9999/PS', '44cf39ffa679070f20585a8ce1eede8d', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1190, '15/U/7264/PS', 'c372b42d0aecb92f1bbb26a3614ea4c9', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1191, '15/U/5520/PS', '002b44ad0d82b4639575cee534c84994', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1192, '15/U/387', '829a622ab205b9aa05b72504e355163a', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1193, '15/U/13340/PS', 'ad2cbd7b3e3193f7bb124678426b8cdf', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1194, '15/U/7652/PS', '89c7bd4125107228536ce02e068a2c27', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1195, '15/U/13559/PS', '69b1dcf88753ea9e99f9472630a03362', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1196, '15/U/4396PS', '60cd73a1455baed1d239bcc8ebca40ed', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1197, '15/U/12190/PS', '42950fc2654386f03c8e54d7e180c9b4', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1198, '15/U/10273/PS', '275e9d3427c8ab4ae15709ee85669beb', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1199, '15/U/11485/PS', 'ca0b87ec1c6c05d819a35de019fad60f', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1200, '15/U/13345/PS', '12772bae189e194590eaf2afc89ff477', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1201, '15/U/7927/PS', '1b6b839e473699e33ef736e7a00a7355', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1202, '15/U/6754/PS', '2d02182a3e0ed4c2791854de4b7bfdb5', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1203, '15/U/216', 'abc9a2f93bfc3047061fc0fcc5134cd2', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1204, '15/U/724', '8c4869e88ee2ad96d1a1d2d363006066', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1205, '15/U/5694/EVE', 'e9707a4cfc24589350be3920a5d65c66', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1206, '15/U/7137/PS', 'b0d40375461f14ec81ff2c0c07851e74', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba'),
(1207, '15/U/13400/PS', '8679dee338b250bb2b73bf30cf7f82dd', '', 'student', '2017-07-04 05:27:05', 'b59c67bf196a4758191e42f76670ceba');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`complaintNo`) REFERENCES `complaint` (`complaintNo`);

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`studentNo`) REFERENCES `student` (`studentNo`),
  ADD CONSTRAINT `complaint_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `courseunit` (`id`),
  ADD CONSTRAINT `complaint_ibfk_4` FOREIGN KEY (`lecturerID`) REFERENCES `staff` (`staffId`),
  ADD CONSTRAINT `complaint_ibfk_5` FOREIGN KEY (`hodID`) REFERENCES `staff` (`staffId`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_ID`);

--
-- Constraints for table `courseunit`
--
ALTER TABLE `courseunit`
  ADD CONSTRAINT `courseunit_ibfk_1` FOREIGN KEY (`dept_ID`) REFERENCES `department` (`dept_ID`);

--
-- Constraints for table `mark`
--
ALTER TABLE `mark`
  ADD CONSTRAINT `mark_ibfk_1` FOREIGN KEY (`complaintNo`) REFERENCES `complaint` (`complaintNo`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`studentNo`) REFERENCES `student` (`studentNo`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffId`);

--
-- Constraints for table `offering`
--
ALTER TABLE `offering`
  ADD CONSTRAINT `offering_ibfk_1` FOREIGN KEY (`studentNo`) REFERENCES `student` (`studentNo`),
  ADD CONSTRAINT `offering_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courseunit` (`id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`dept_ID`) REFERENCES `department` (`dept_ID`);

--
-- Constraints for table `staff_logs`
--
ALTER TABLE `staff_logs`
  ADD CONSTRAINT `staff_logs_ibfk_1` FOREIGN KEY (`mark_id`) REFERENCES `mark` (`markID`),
  ADD CONSTRAINT `staff_logs_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staffId`),
  ADD CONSTRAINT `staff_logs_ibfk_3` FOREIGN KEY (`complaint_no`) REFERENCES `complaint` (`complaintNo`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `teaching`
--
ALTER TABLE `teaching`
  ADD CONSTRAINT `teaching_ibfk_1` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffId`),
  ADD CONSTRAINT `teaching_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courseunit` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
