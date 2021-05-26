-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2021 at 12:23 PM
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
-- Database: `iNotes_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `sno` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `uid` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`sno`, `Title`, `Description`, `uid`, `Date`) VALUES
(17, 'abhay', 'hello i am abhay wagre nikhil gardi is my close friend.\r\n', 3, '2021-04-17 16:32:52'),
(19, 'Hello', 'i am nikhil gardi. i am from wadwani.', 2, '2021-04-18 12:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `user02`
--

CREATE TABLE `user02` (
  `uid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user02`
--

INSERT INTO `user02` (`uid`, `username`, `password`, `name`, `date`) VALUES
(2, 'nik@nik.com', '$2y$10$ZjxAt7W6Zm02/6JkyntaS.ZGdvBWBhVvtO2zXhadrOCXzagRP2LZW', 'nik', '2021-04-17 15:26:30'),
(3, 'abhay@abhay.com', '$2y$10$5TBJNzDVy8JPfJqUTsbvreeIvwDtETlZB1TiPp0q5uPxNtazH8JIa', 'abhay', '2021-04-17 16:28:06'),
(4, 'aditi@aditi.com', '$2y$10$Kp4MZZ6BNYrh1pT306oyHuYWrl0QZREIe/6DlsnlcToYsXElYmFLS', 'aditi', '2021-04-18 15:16:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `foreign key` (`uid`);

--
-- Indexes for table `user02`
--
ALTER TABLE `user02`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user02`
--
ALTER TABLE `user02`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `foreign key` FOREIGN KEY (`uid`) REFERENCES `user02` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
