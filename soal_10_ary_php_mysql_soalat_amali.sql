-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2025 at 06:49 PM
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
-- Database: `soal_10_ary_php_mysql_soalat_amali`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `code_meli` int(11) NOT NULL COMMENT 'کد ملی',
  `firstname` varchar(50) NOT NULL COMMENT 'نام',
  `lastname` varchar(50) NOT NULL COMMENT 'نام خانوادگی',
  `father` varchar(50) NOT NULL COMMENT 'نام پدر',
  `HTML` float NOT NULL COMMENT 'نمره HTML',
  `CSS` float NOT NULL COMMENT 'نمره CSS',
  `JS` float NOT NULL COMMENT 'نمره JS',
  `PHP` float NOT NULL COMMENT 'نمره PHP',
  `MYSQL` float NOT NULL COMMENT 'نمره MYSQL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`code_meli`, `firstname`, `lastname`, `father`, `HTML`, `CSS`, `JS`, `PHP`, `MYSQL`) VALUES
(1305264895, 'امیرحسین', 'قربانی', 'سامان', 20, 19.5, 13.25, 15.5, 17),
(1326542031, 'آرمان', 'رضایی', 'ساسان', 18, 13.75, 5, 18, 19),
(1382645021, 'میلاد', 'کریمی', 'مهدی', 9.75, 20, 14.5, 17.25, 16),
(1569532651, 'ماهان', 'حسینی', 'نیما', 17.5, 16.75, 13.5, 18, 19.5),
(1803265152, 'کیان', 'شریفی', 'پارسا', 14.75, 9, 18.5, 17.75, 16.25),
(1826459823, 'علی', 'احمدی', 'محمد', 13.25, 18, 16.25, 14, 17.5),
(1845623516, 'رهام', 'جعفری', 'پوریا', 7.5, 13.25, 16, 17.25, 13.75),
(1845629465, 'آرش', 'احمدی', 'کامران', 15.25, 19, 16.25, 12.25, 10.5),
(1879652345, 'کسری', 'نادری', 'بردیا', 19.5, 7.5, 16.75, 18, 17.25),
(1892654312, 'کیان', 'محمدی', 'ایمان', 16.25, 19.75, 13, 16, 14.25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`code_meli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
