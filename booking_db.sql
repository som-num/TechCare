-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2025 at 01:14 PM
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
-- Database: `booking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Reservation`
--

CREATE TABLE `Reservation` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_type` text NOT NULL,
  `date` text NOT NULL,
  `start_time` text NOT NULL,
  `end_time` text NOT NULL,
  `location` text NOT NULL,
  `status` enum('pending','completed','denied','accepted') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Reservation`
--

INSERT INTO `Reservation` (`reservation_id`, `user_id`, `service_type`, `date`, `start_time`, `end_time`, `location`, `status`, `created_at`, `updated_at`) VALUES
(10, 3, 'CCTV', '2025-01-05', '01:01', '02:01', 'siquijor', 'denied', '2025-01-04 17:01:32', '2025-01-06 15:46:39'),
(11, 2, 'COMPUTER', '2025-01-05', '02:45', '03:45', 'Larena', 'accepted', '2025-01-04 18:45:42', '2025-01-04 19:50:48'),
(12, 2, 'CCTV', '2025-01-06', '17:20', '17:21', 'Dumaguete', 'completed', '2025-01-06 09:20:29', '2025-01-06 09:25:03'),
(13, 2, 'COMPUTER', '2025-01-07', '19:25', '20:25', 'Dumaguete', 'accepted', '2025-01-06 09:26:09', '2025-01-06 16:33:11'),
(14, 2, 'SOLAR', '2024-12-27', '17:26', '18:26', 'Dumaguete', 'pending', '2025-01-06 09:27:21', '2025-01-06 09:27:21'),
(15, 3, 'SOLAR', '2025-01-08', '18:04', '19:04', 'Dumaguete', 'denied', '2025-01-06 10:04:47', '2025-01-07 06:46:49'),
(16, 3, 'CCTV', '2025-01-07', '00:32', '01:32', 'LAZI', 'denied', '2025-01-06 16:32:22', '2025-01-06 16:33:21'),
(17, 2, 'CCTV', '2025-01-07', '19:25', '20:25', 'siquijor', 'pending', '2025-01-09 08:26:06', '2025-01-09 08:26:06'),
(21, 3, 'CCTV', '2025-01-08', '18:33', '20:34', 'Dumaguete', 'pending', '2025-01-09 08:34:46', '2025-01-09 08:34:46'),
(22, 2, 'CCTV', '2025-01-09', '19:44', '20:44', 'Dumaguete', 'accepted', '2025-01-09 11:44:38', '2025-01-09 11:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `full_name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$yDXR933O/oR2LNDo0tB4r.5RhbkefLGO.bLScrraRlAsNC.wsGPoO', 'admin', '2024-12-05 16:43:19'),
(2, 'user', 'user@gmail.com', '$2y$10$5bGrtB7XFEkTz/fii5dFt.gAs6GSrYgZyvadypGMiA36BXUOrBMVW', 'user', '2024-12-05 16:46:29'),
(3, 'carlton', 'carlton@gmail.com', '$2y$10$Aj3S9Ygimfi7uErSp.Xw8u0oYfguGN3P4YNeLD.gxQxPg1MX4aI6C', 'user', '2024-12-09 11:22:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `Reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
