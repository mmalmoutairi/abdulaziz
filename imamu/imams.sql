-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2016 at 05:15 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imams`
--

-- --------------------------------------------------------

--
-- Table structure for table `completed`
--

CREATE TABLE `completed` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `groups` int(11) NOT NULL,
  `chose` int(11) NOT NULL,
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `code` varchar(25) NOT NULL,
  `group` int(11) NOT NULL,
  `chose` int(11) NOT NULL,
  `hours` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `code`, `group`, `chose`, `hours`) VALUES
(1, 'Strategy and policy information systems', 'IS 611', 1, 0, 3),
(2, 'IT infrastructure', 'IS 621', 1, 0, 3),
(3, 'The design of the structure of institutions', 'IS 631', 1, 0, 3),
(4, 'Project Management and Change', 'IS 612', 1, 0, 3),
(5, 'Advanced Topics in the analysis, modeling and design', 'IS 641', 1, 0, 3),
(6, 'test ', 'IS 622', 1, 0, 3),
(7, 'Digital transformation and its effects', 'IS 713', 0, 0, 3),
(8, 'Methods and Research Ethics', 'IS 791', 0, 0, 2),
(9, 'The culmination of the integration of concepts', 'IS 792', 0, 0, 3),
(10, 'Research Project', 'IS 793', 0, 0, 4),
(11, 'Integration of information and business systems', 'IS 714', 0, 1, 3),
(12, 'Consulting Information Systems', 'IS 715', 0, 1, 3),
(13, 'IT governance', 'IS 723', 0, 1, 3),
(14, 'Institutional Network Management', 'IS 724', 0, 1, 3),
(15, 'Information and Requirements Engineering', 'IS 742', 0, 2, 3),
(16, 'Service-oriented IT infrastructure', 'IS 743', 0, 2, 3),
(17, 'Human interaction with computers', 'IS 751', 0, 2, 3),
(18, 'Advanced Topics in Information Systems\r\n', 'IS 752', 0, 2, 2),
(19, 'Intelligent Systems Business\r\n', 'IS 771', 0, 3, 3),
(20, 'Exploration data and information repositories\r\n', 'IS 772', 0, 3, 3),
(21, 'knowledge management\r\n', 'IS 773', 0, 3, 3),
(22, 'Advanced Web Services\r\n', 'IS 774', 0, 3, 3),
(23, 'Audit the performance of service operations\r\n', 'IS 781', 0, 4, 3),
(24, 'Improve the performance of service operations\r\n', 'IS 782', 0, 4, 3),
(25, 'Development of quality performance in information systems\r\n', 'IS 783', 0, 4, 3),
(26, 'Statistical control of processes and tools Quality', 'IS 784', 0, 4, 3),
(27, 'Risk Management', 'IS 785', 0, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `file` varchar(250) DEFAULT NULL,
  `comment` text NOT NULL,
  `sender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(100) NOT NULL,
  `student_id` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `course_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prerequisite`
--

CREATE TABLE `prerequisite` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `prerequisite_id` int(11) NOT NULL,
  `groups` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `dr_id` int(11) NOT NULL,
  `section_number` varchar(200) NOT NULL,
  `room` varchar(200) NOT NULL,
  `course_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `finish_time` time NOT NULL,
  `max_studemt` int(11) NOT NULL,
  `sun` int(11) NOT NULL,
  `mon` int(11) NOT NULL,
  `tue` int(11) NOT NULL,
  `wed` int(11) NOT NULL,
  `thu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `dr_id`, `section_number`, `room`, `course_id`, `start_time`, `finish_time`, `max_studemt`, `sun`, `mon`, `tue`, `wed`, `thu`) VALUES
(5, 2, '111', 'GR 111', 1, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(6, 2, '112', 'GR 112', 1, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(7, 2, '113', 'GR 113', 2, '10:00:00', '11:00:00', 10, 2, 1, 2, 1, 2),
(8, 2, '114', 'GR 114', 2, '11:00:00', '12:00:00', 10, 2, 1, 2, 1, 2),
(9, 2, '115', 'GR 115', 3, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(10, 2, '116', 'GR 116', 3, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(12, 2, '117', 'GR 117', 4, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(13, 2, '118', 'GR 118', 4, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(14, 2, '119', 'GR 119', 5, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(15, 2, '120', 'GR 120', 5, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(16, 2, '121', 'GR 121', 6, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(17, 2, '122', 'GR 122', 6, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(18, 2, '123', 'GR 123', 7, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(19, 2, '124', 'GR 124', 7, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(20, 2, '125', 'GR 125', 8, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(21, 2, '126', 'GR 126', 8, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(22, 2, '127', 'GR 127', 9, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(23, 2, '128', 'GR 128', 9, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(24, 2, '129', 'GR 129', 10, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(25, 2, '130', 'GR 130', 10, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(26, 2, '131', 'GR 131', 11, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(27, 2, '132', 'GR 132', 11, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(28, 2, '133', 'GR 133', 12, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(29, 2, '134', 'GR 134', 12, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(30, 2, '135', 'GR 135', 13, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(31, 2, '136', 'GR 136', 13, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(32, 2, '137', 'GR 137', 14, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(33, 2, '138', 'GR 138', 14, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(34, 2, '139', 'GR 139', 15, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(35, 2, '140', 'GR 140', 15, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(36, 2, '141', 'GR 141', 16, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(37, 2, '142', 'GR 142', 16, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(38, 2, '143', 'GR 143', 17, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(39, 2, '144', 'GR 144', 17, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(40, 2, '145', 'GR 145', 18, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(41, 2, '146', 'GR 146', 18, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(42, 2, '147', 'GR 147', 19, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(43, 2, '148', 'GR 148', 19, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(44, 2, '149', 'GR 149', 20, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(45, 2, '150', 'GR 150', 20, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(46, 2, '151', 'GR 151', 21, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(47, 2, '152', 'GR 152', 21, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(48, 2, '153', 'GR 153', 22, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(49, 2, '154', 'GR 154', 22, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(50, 2, '155', 'GR 155', 23, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(51, 2, '156', 'GR 156', 23, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(52, 2, '157', 'GR 157', 24, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(53, 2, '158', 'GR 158', 24, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(54, 2, '159', 'GR 159', 25, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(55, 2, '160', 'GR 160', 25, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(56, 2, '161', 'GR 161', 26, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(57, 2, '162', 'GR 162', 26, '11:00:00', '12:00:00', 10, 1, 2, 1, 2, 1),
(58, 2, '163', 'GR 163', 27, '10:00:00', '11:00:00', 10, 1, 2, 1, 2, 1),
(59, 2, '164', 'GR 164', 27, '11:00:00', '12:00:00', 20, 1, 2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `isActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `name`, `isActive`) VALUES
(1, 'First Semester 2016', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `middle_name` varchar(250) NOT NULL,
  `third_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `national_id` varchar(250) NOT NULL,
  `student_id` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `middle_name`, `third_name`, `last_name`, `national_id`, `student_id`, `email`, `password`, `status`, `role_id`) VALUES
(1, 'Mohammed ', 'Murayshid ', 'naqa', 'Al-Moutairi', '1079632251', '433040479', 'hamattu21@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 2),
(2, 'Majed', 'abdulaah', 'khaled', 'albrithin', '079632252', 'NULL', 'hamattu21@gmail.com2', 'e10adc3949ba59abbe56e057f20f883e', 1, 3),
(3, 'faisal', 'saad', 'mohammed', 'alkhathiri', '1079632253', 'NULL', 'faisal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 4),
(4, 'aa', 'bb', 'cc', 'dd', '1234567890', '', 'sdfsd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(5, 'Mohammed', 'MMMM', 'NNNN', 'Almoutairi', '107963333', '43304040', 'hamatt@gmail.com', '6a325e740da1b1c7a3dbf8ed061eb609', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `completed`
--
ALTER TABLE `completed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prerequisite`
--
ALTER TABLE `prerequisite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `completed`
--
ALTER TABLE `completed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prerequisite`
--
ALTER TABLE `prerequisite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
