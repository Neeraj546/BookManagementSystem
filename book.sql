-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 06:41 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

CREATE DATABASE IF NOT EXISTS `book` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci; 

USE `book`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Publisher` varchar(100) NOT NULL,
  `Stock` bigint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `Name`, `Author`, `Description`, `Publisher`, `Stock`) VALUES
(4, 'Second Chance', 'Sudeep Nagarkar', 'Second Chance by Sudeep Nagarkar is a contemporary romance novel set in a regular Indian family where the girl is expected to get married at ...', 'admin@book.com', 0),
(6, 'Half Girlfriend', 'Chetan bhagat', 'Half Girlfriend is an Indian English coming of age, young adult romance novel by Indian author Chetan Bhagat', 'admin@book.com', 4),
(7, 'All Rights Reserved for You', 'Sudeep Nagarkar', 'All Rights Reserved for You by Sudeep Nagarkar is a soothing real-life story of two lovebirds separated by distance but are never really far', 'admin@book.com', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Acctype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `Mail`, `Password`, `Acctype`) VALUES
(1, 'Book House', 'admin@book.com', '$2y$10$m9JA8dy.Laa2AypvfYpCiupGRfcz4dlkybpuCj/RCFLI7lyAxlRl2', 'publisher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
