-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2018 at 06:29 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leaveapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `rollNumber` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL,
  `startDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `endDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `natureOfLeave` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `classScheduledOnLeave` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `uploadedImageName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `studentName`, `rollNumber`, `branch`, `semester`, `startDate`, `endDate`, `natureOfLeave`, `purpose`, `classScheduledOnLeave`, `address`, `mobile`, `email`, `uploadedImageName`, `status`) VALUES
(1, 'prateek', 'iec2017029', 'ece', 3, '2018-08-25 18:30:00', '2018-08-25 18:30:00', 'mood', 'mood', 'yes', '1111 bh4', 999999999, 'iec2017029@iiita.ac.in', 'cr7', 1),
(2, 'asfhgn', 'rfthjyrdgth', 'ece', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'fhrty6uh', 'ytrhg', 'rytuujhr', 'yjthgjyt', 0, 'ryjh@ghtdgh', '5b836cb74f0468.32620900.jpg', 1),
(4, 'test', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', 0, '', '', 2),
(5, 'test', '', 'ece', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '5378    BH5', 2147483647, 'iec2017029@iiita.ac.in', '', 3),
(6, 'prateek', 'iec2017029', 'ece', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ec', 'fghn', 'fdgnh', '5378    BH5', 2147483647, 'iec2017029@iiita.ac.in', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(200) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Enroll` varchar(200) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `Enroll`, `Email`, `Password`) VALUES
(7, 'John', 'IIM2017008', 'iim2017008@iiita.ac.in', '527bd5b5d689e2c32ae974c6229ff785'),
(8, 'los balancos', 'iec2017029', 'iec2017029@iiita.ac.in', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
