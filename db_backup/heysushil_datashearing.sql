-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 07:28 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heysushil_datashearing`
--

-- --------------------------------------------------------

--
-- Table structure for table `addstu`
--

CREATE TABLE `addstu` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addstu`
--

INSERT INTO `addstu` (`id`, `name`, `course`, `year`, `email`, `pass`, `type`) VALUES
(1, 'Chaudhary Sushil', 'null', 'null', 'heysushil@youtubecom', 'asd', 'admin'),
(15, 'Hey Sushil', 'B.Tech', '2020', 'heysushil@youtube.com', 'asd', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `doc_id` int(10) NOT NULL,
  `docName` varchar(500) NOT NULL,
  `docSize` varchar(500) NOT NULL,
  `docType` varchar(500) NOT NULL,
  `uploadDate` varchar(500) NOT NULL,
  `docPath` varchar(500) NOT NULL,
  `user_id` varchar(500) NOT NULL,
  `user_type` varchar(500) NOT NULL,
  `course_type` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`doc_id`, `docName`, `docSize`, `docType`, `uploadDate`, `docPath`, `user_id`, `user_type`, `course_type`) VALUES
(1, '260522105226larn python with hey sushil high reas.png', '757451', 'image/png', '26-05-22 10:52:26 pm', 'documents/260522105226larn python with hey sushil high reas.png', '1', 'admin', 'B.Tech'),
(2, '2605221053461519797173495.jpg', '50104', 'image/jpeg', '26-05-22 10:53:46 pm', 'documents/2605221053461519797173495.jpg', '15', 'student', 'B.Tech'),
(3, '2605221054121519797173495.jpg', '50104', 'image/jpeg', '26-05-22 10:54:12 pm', 'documents/2605221054121519797173495.jpg', '1', 'admin', 'BCA');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `per_id` int(10) NOT NULL,
  `doc_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `doc_name` varchar(500) NOT NULL,
  `user_name` varchar(500) NOT NULL,
  `user_type` varchar(500) NOT NULL,
  `user_course` varchar(500) NOT NULL,
  `request_date` varchar(500) NOT NULL,
  `permission` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`per_id`, `doc_id`, `user_id`, `doc_name`, `user_name`, `user_type`, `user_course`, `request_date`, `permission`) VALUES
(1, 2, 15, '2605221053461519797173495.jpg', 'Hey Sushil', 'student', 'B.Tech', '26-05-22 10:54:23 pm', '0');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `cource` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addstu`
--
ALTER TABLE `addstu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addstu`
--
ALTER TABLE `addstu`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `doc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `per_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
