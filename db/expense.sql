-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 05:55 PM
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
-- Database: `expense`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(17, 'Food and Dining\r\n'),
(18, 'Health and Fitness'),
(19, 'Entertainment'),
(20, 'Groceries'),
(21, 'Travelling ');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `budget` int(11) NOT NULL,
  `price` float NOT NULL,
  `details` text NOT NULL,
  `expense_date` date NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `category_id`, `item`, `budget`, `price`, `details`, `expense_date`, `added_on`, `added_by`) VALUES
(38, 19, 'Sports Equipment', 2000, 1500, 'Soccer ', '2024-04-05', '2024-04-05 12:51:30', 15),
(39, 18, 'Sports Equipment', 2000, 1500, 'Soccer Boots', '2024-04-05', '2024-04-05 01:02:44', 15),
(40, 18, 'Transportation', 2000, 200, 'h', '2024-04-26', '2024-04-26 10:28:14', 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `role`) VALUES
(4, '', 'admin', '', '$2y$10$.UBqBaQzZWNyCK.JV77lRu0TnNS7/2YrXgpRxAnJWeEGAs.vEfMJW', 'Admin'),
(8, '', 'havia', '', '$2y$10$7DxSXSwXNDdFvB4HhUG1rekK9Esz4g8VTQ8cYDhrzmtF4e2Se22kW', 'User'),
(11, '', 'havia2', '', '$2y$10$Vq4lL/O6o.KKQOHNEp0eC.YF/7Um/N/x/byasyxiXd7p7oBxubNqu', 'User'),
(15, '', 'trevor', '', '$2y$10$FQlRTptxACqVnX8Rn4Rkd.SImc15302zKqiwft6vplxwwTG30./aG', 'User'),
(17, '', 'Rita', 'jefffortune042@outlook.com', '$2y$10$879A4WGJMauJKMk0n/0SOu7/p4acYdvaDhzZ0OGOIv4o7OIpFSawm', 'User'),
(25, 'marvin', 'marvin', 'marvin@gmail.com', '$2y$10$b6zYrYi2zKuYCAseCb2vKeQz2Z/WT3KVJq4y0b1ddxHi8hfBSu.d2', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
