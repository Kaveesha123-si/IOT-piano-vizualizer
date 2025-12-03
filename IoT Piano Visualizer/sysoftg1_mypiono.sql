-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2024 at 09:54 AM
-- Server version: 10.6.17-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sysoftg1_mypiono`
--

-- --------------------------------------------------------

--
-- Table structure for table `esp32_status`
--

CREATE TABLE `esp32_status` (
  `id` int(6) UNSIGNED NOT NULL,
  `status` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `esp32_status`
--

INSERT INTO `esp32_status` (`id`, `status`, `timestamp`) VALUES
(1, 'on', '2024-09-20 21:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `fetch_flag`
--

CREATE TABLE `fetch_flag` (
  `id` int(6) UNSIGNED NOT NULL,
  `flag` tinyint(1) DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fetch_flag`
--

INSERT INTO `fetch_flag` (`id`, `flag`, `timestamp`) VALUES
(1, 1, '2024-09-21 00:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `performance_data`
--

CREATE TABLE `performance_data` (
  `id` int(6) UNSIGNED NOT NULL,
  `song_name` varchar(255) NOT NULL,
  `mode` varchar(50) NOT NULL,
  `score` float NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `performance_data`
--

INSERT INTO `performance_data` (`id`, `song_name`, `mode`, `score`, `timestamp`) VALUES
(15, 'Twinkle Twinkle Little Star', 'Play', 90, '2024-08-28 18:00:00'),
(16, 'Jingle Bells', 'Tutorial', 80, '2024-08-31 18:00:00'),
(17, 'Mary Had a Little Lamb', 'Play', 75, '2024-09-01 18:00:00'),
(18, 'Old MacDonald', 'Tutorial', 88, '2024-09-02 18:00:00'),
(19, 'Row Row Row Your Boat', 'Play', 95, '2024-09-03 18:00:00'),
(20, 'Baa Baa Black Sheep', 'Tutorial', 78, '2024-09-04 18:00:00'),
(21, 'Wheels on the Bus', 'Play', 82, '2024-09-05 18:00:00'),
(22, 'London Bridge', 'Tutorial', 91, '2024-09-06 18:00:00'),
(23, 'Itsy Bitsy Spider', 'Play', 85, '2024-09-07 18:00:00'),
(24, 'Happy Birthday', 'Tutorial', 85, '2024-08-29 18:00:00'),
(25, 'Twinkle Twinkle Little Star', 'Play', 90, '2024-08-28 18:00:00'),
(26, 'Jingle Bells', 'Tutorial', 80, '2024-08-31 18:00:00'),
(27, 'Mary Had a Little Lamb', 'Play', 75, '2024-09-01 18:00:00'),
(28, 'Old MacDonald', 'Tutorial', 88, '2024-09-02 18:00:00'),
(29, 'Row Row Row Your Boat', 'Play', 95, '2024-09-03 18:00:00'),
(30, 'Baa Baa Black Sheep', 'Tutorial', 78, '2024-09-04 18:00:00'),
(31, 'Wheels on the Bus', 'Play', 82, '2024-09-05 18:00:00'),
(32, 'London Bridge', 'Tutorial', 91, '2024-09-06 18:00:00'),
(33, 'Itsy Bitsy Spider', 'Play', 85, '2024-09-07 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `played_songs`
--

CREATE TABLE `played_songs` (
  `id` int(11) NOT NULL,
  `song_id` int(11) DEFAULT NULL,
  `mode` varchar(50) DEFAULT NULL,
  `played_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `played_songs`
--

INSERT INTO `played_songs` (`id`, `song_id`, `mode`, `played_at`) VALUES
(5, 0, '', '2024-09-21 00:36:45'),
(6, 3, 'play', '2024-09-21 00:36:46'),
(7, 0, '', '2024-09-21 00:36:58'),
(8, 0, '', '2024-09-21 00:36:58'),
(9, 3, 'tutorial', '2024-09-21 00:36:58'),
(10, 3, 'tutorial', '2024-09-21 00:36:58'),
(11, 0, '', '2024-09-21 00:37:32'),
(12, 3, 'play', '2024-09-21 00:37:32'),
(13, 0, '', '2024-09-21 00:41:17'),
(14, 3, 'tutorial', '2024-09-21 00:41:17'),
(15, 0, '', '2024-09-21 00:41:45'),
(16, 3, 'tutorial', '2024-09-21 00:41:45'),
(17, 0, '', '2024-09-21 00:46:39'),
(18, 0, '', '2024-09-21 00:46:39'),
(19, 3, 'tutorial', '2024-09-21 00:46:39'),
(20, 3, 'tutorial', '2024-09-21 00:46:39'),
(21, 0, '', '2024-09-21 00:46:53'),
(22, 3, 'tutorial', '2024-09-21 00:46:53'),
(23, 0, '', '2024-09-21 00:47:20'),
(24, 3, 'play', '2024-09-21 00:47:20'),
(25, 0, '', '2024-09-21 00:53:08'),
(26, 0, '', '2024-09-21 00:53:08'),
(27, 3, 'tutorial', '2024-09-21 00:53:08'),
(28, 3, 'tutorial', '2024-09-21 00:53:08');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `song_name` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `durations` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `song_name`, `notes`, `durations`) VALUES
(3, 'Happy Birthday', '[0,2,4,7,9,11]', '[400,400,400,400,400,400]'),
(4, '', 'null', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(6, 'Anjana Wijekoon', 'anjanainduwara.123@gmail.com', '$2y$10$2/09WToP6/D4HVcMd2dfR.EGDHkI266O5Oy6vQFIsSnAlQ14WbJJK', '2024-09-21 03:21:33'),
(7, 'Ananda Wijekoon', 'anandawijekoon533@gmail.com', '$2y$10$gWj2EfpqEjLNXcXIhPiUbOIaoKxfYgSwnaXmOljouZ8brcRRe9Mne', '2024-09-21 03:23:54'),
(8, 'Pasan Wijekoon', 'pasanwijekoon673@gmail.com', '$2y$10$yp.IPmMFEDHUKOiCxOkBMOQ/NtGWyoynk3HNARqQA/qjfP1gddmsW', '2024-09-21 03:38:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `esp32_status`
--
ALTER TABLE `esp32_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fetch_flag`
--
ALTER TABLE `fetch_flag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance_data`
--
ALTER TABLE `performance_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `played_songs`
--
ALTER TABLE `played_songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `esp32_status`
--
ALTER TABLE `esp32_status`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fetch_flag`
--
ALTER TABLE `fetch_flag`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `performance_data`
--
ALTER TABLE `performance_data`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `played_songs`
--
ALTER TABLE `played_songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
