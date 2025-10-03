-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2025 at 08:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `madreseh`
--

CREATE TABLE `madreseh` (
  `code_madreseh` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code_modir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `madreseh`
--

INSERT INTO `madreseh` (`code_madreseh`, `name`, `code_modir`) VALUES
(141, 'دوانی', 169),
(332, 'حافظ', NULL),
(432, 'عالمان', 181),
(742, 'سعدی', NULL),
(961, 'دانشیان', 182);

-- --------------------------------------------------------

--
-- Table structure for table `modir`
--

CREATE TABLE `modir` (
  `code_meli` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modir`
--

INSERT INTO `modir` (`code_meli`, `firstname`, `lastname`) VALUES
(169, 'علی', 'کاوی'),
(177, 'حسین', 'جمیلی'),
(181, 'حسن', 'بحرانی'),
(182, 'محمد', 'درویشی'),
(914, 'خلیل', 'عزتی');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `code_meli` int(11) NOT NULL COMMENT 'کد ملی دانش آموز',
  `firstname` varchar(50) NOT NULL COMMENT 'نام',
  `lastname` varchar(100) NOT NULL COMMENT 'نام خانوادگی',
  `father` varchar(50) NOT NULL COMMENT 'پدر',
  `jenseiat` tinyint(4) NOT NULL COMMENT 'جنسیت',
  `tarikh_tavalod` date NOT NULL COMMENT 'تاریخ تولد',
  `moadel` float NOT NULL COMMENT 'معدل',
  `tozihat` text NOT NULL COMMENT 'توضیحات',
  `code_modir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`code_meli`, `firstname`, `lastname`, `father`, `jenseiat`, `tarikh_tavalod`, `moadel`, `tozihat`, `code_modir`) VALUES
(18123, 'رضا', 'بابایی', 'جمال', 1, '2010-03-06', 16.78, 'مدال برنز در کاراته', 169),
(1563142, 'بهرام', 'محسنی', 'احسان', 1, '2011-09-04', 19.59, 'شرکت در المپیاد ریاضی', 181),
(1812543697, 'علی', 'محمدی', 'محمد', 1, '2010-05-15', 19, 'مقام آور مسابقات بوکس', 181),
(1823698254, 'فریده', 'بغلانی\r\n', 'حمید', 0, '2010-08-09', 18.91, '', 181);

-- --------------------------------------------------------

--
-- Table structure for table `student_teacher`
--

CREATE TABLE `student_teacher` (
  `id` int(11) NOT NULL,
  `student_code` int(11) NOT NULL,
  `teacher_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_teacher`
--

INSERT INTO `student_teacher` (`id`, `student_code`, `teacher_code`) VALUES
(1, 1812543697, 251),
(2, 1812543697, 369),
(3, 1823698254, 251),
(4, 1823698254, 251);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `code_meli` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`code_meli`, `firstname`, `lastname`) VALUES
(251, 'قاسم', 'رحیمی'),
(369, 'خلیل', 'ابراهیمی'),
(777, 'کمال', 'غریبی');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `madreseh`
--
ALTER TABLE `madreseh`
  ADD PRIMARY KEY (`code_madreseh`),
  ADD UNIQUE KEY `NaTekrari` (`code_modir`);

--
-- Indexes for table `modir`
--
ALTER TABLE `modir`
  ADD PRIMARY KEY (`code_meli`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`code_meli`),
  ADD KEY `fk_student___modir` (`code_modir`);

--
-- Indexes for table `student_teacher`
--
ALTER TABLE `student_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_studentteacher___student` (`student_code`),
  ADD KEY `fk_studentteacher___teacher` (`teacher_code`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`code_meli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_teacher`
--
ALTER TABLE `student_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `madreseh`
--
ALTER TABLE `madreseh`
  ADD CONSTRAINT `fk_madreseh___modir` FOREIGN KEY (`code_modir`) REFERENCES `modir` (`code_meli`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_student___modir` FOREIGN KEY (`code_modir`) REFERENCES `modir` (`code_meli`);

--
-- Constraints for table `student_teacher`
--
ALTER TABLE `student_teacher`
  ADD CONSTRAINT `fk_studentteacher___student` FOREIGN KEY (`student_code`) REFERENCES `student` (`code_meli`),
  ADD CONSTRAINT `fk_studentteacher___teacher` FOREIGN KEY (`teacher_code`) REFERENCES `teacher` (`code_meli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
