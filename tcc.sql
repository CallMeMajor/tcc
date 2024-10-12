-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2024 at 08:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcc`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_parcel`
--

CREATE TABLE `add_parcel` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `city_of_departure` varchar(50) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `height` varchar(50) DEFAULT NULL,
  `widht` varchar(50) DEFAULT NULL,
  `length` varchar(50) DEFAULT NULL,
  `extra_services` varchar(50) DEFAULT NULL,
  `track_id` varchar(100) NOT NULL,
  `current_location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_parcel`
--

INSERT INTO `add_parcel` (`id`, `name`, `email`, `contact_number`, `city_of_departure`, `weight`, `height`, `widht`, `length`, `extra_services`, `track_id`, `current_location`) VALUES
(2, 'owais', 'ok255922@gmail.com', '03141589746', 'karachi', '56', '3', '5', '7', 'express delivery', '680971', 'lahore'),
(3, 'owais', 'ok255922@gmail.com', '03141589746', 'karachi', '56', '3', '5', '7', 'express delivery', '288083', ''),
(4, 'mahnoor', 'mahnoorkhanmk89@gmail.com', '03141589746', 'karachi', '56', '3', '5', '7', 'insurance', '561900', ''),
(5, 'mahnoor', 'mahnoorkhanmk89@gmail.com', '03141589746', 'karachi', '56', '3', '5', '7', 'insurance', '471726', ''),
(6, 'mahnoor', 'mahnoorkhanmk89@gmail.com', '03141589746', 'karachi', '56', '3', '5', '7', 'insurance', '232079', '');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `parcelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `email`, `contact`, `address`, `parcelid`) VALUES
(1, 'hamza', 'hamza@gmail.com', '03123456789', 'karachi', 680971),
(6, 'owais', 'owais@gmail.com', '12345678901', 'karachi', 101010);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `message` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `Pass` varchar(500) DEFAULT NULL,
  `con_pass` varchar(500) NOT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `Pass`, `con_pass`, `gender`, `status`) VALUES
(2, 'Hassan', 'hassan@gmail.com', '$2y$10$RqHybhwQ8/TzJrgPx6mjN.uaJhD/1/c3f0wwt664UlgW9IV.jQWJ2', '$2y$10$KwOdUJmtqrYURNlyNpmNQ.HpLiPk.hixBIOhqHFu980Ay40xnmuT2', 'male', 'admin'),
(4, 'hamza', 'hamza@gmail.com', '$2y$10$byhOb/A3X4I194RGuAExxuEt2T4Hae5FRX/FumNlw1NWg0DouXC9S', '$2y$10$wfD11xAv0b7FHwYto7SxgO39pLppt0JT0qH/JTS3GFZwKdvUd3OjW', 'male', 'user'),
(5, 'owais', 'owais@gmail.com', '$2y$10$dI0QNuGn0f207lD7sQN3hepnjoXZcq.8AdVjf3SWDpNI1hVvPtElu', '$2y$10$t60BNoEYRSDO33u59Sz2hOwOF2xHq7b8xU0837gUggcdx7riSr.mC', 'male', 'agent');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_parcel`
--
ALTER TABLE `add_parcel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
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
-- AUTO_INCREMENT for table `add_parcel`
--
ALTER TABLE `add_parcel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
