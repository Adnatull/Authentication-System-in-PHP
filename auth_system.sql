-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2018 at 09:51 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auth_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `location` text,
  `mobile` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `firstname`, `lastname`, `birthdate`, `gender`, `location`, `mobile`, `profession`) VALUES
(1, 'masum', 'al@yahoo.com', 'c20ad4d76fe97759aa27a0c99bff6710', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'masum1', 'ala@yahoo.com', 'c20ad4d76fe97759aa27a0c99bff6710', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'masum12', 'ala2@yahoo.com', 'c20ad4d76fe97759aa27a0c99bff6710', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'aam95', 'adnaan.masum@yahoo.com', 'af8f9dffa5d420fbc249141645b962ee', 'Adnatull', 'Masum', '0000-00-00', 'Male', 'Dhaka, Bangladesh', '01996243480', 'Student'),
(7, 'aa', 'aa@a.coma', 'c20ad4d76fe97759aa27a0c99bff6710', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'asa', 'a@aaa.com', 'af8f9dffa5d420fbc249141645b962ee', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
