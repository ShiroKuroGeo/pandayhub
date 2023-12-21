-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 01:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pandayhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `appli_id` int(11) NOT NULL,
  `poser_id` int(11) NOT NULL,
  `appliUser_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`appli_id`, `poser_id`, `appliUser_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 22, 2, '2023-12-20 01:24:19', '2023-12-20 01:24:19'),
(2, 2, 22, 1, '2023-12-20 05:08:13', '2023-12-20 05:08:13'),
(3, 2, 22, 1, '2023-12-20 05:08:23', '2023-12-20 05:08:23'),
(4, 2, 23, 1, '2023-12-21 08:58:07', '2023-12-21 08:58:07'),
(5, 2, 23, 1, '2023-12-21 08:58:15', '2023-12-21 08:58:15'),
(6, 2, 23, 1, '2023-12-21 08:58:49', '2023-12-21 08:58:49'),
(7, 2, 23, 1, '2023-12-21 08:59:00', '2023-12-21 08:59:00'),
(8, 2, 23, 1, '2023-12-21 09:14:49', '2023-12-21 09:14:49'),
(9, 2, 23, 1, '2023-12-21 09:15:55', '2023-12-21 09:15:55'),
(10, 2, 23, 1, '2023-12-21 09:15:58', '2023-12-21 09:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chatId` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `reciever` int(11) NOT NULL,
  `message` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`chatId`, `sender`, `reciever`, `message`, `created`) VALUES
(1, 1, 22, '123123', '2023-12-20 06:59:51'),
(2, 2, 22, 'H', '2023-12-20 06:10:35'),
(3, 22, 2, 'QWE', '2023-12-20 05:47:41'),
(4, 22, 2, 'hello world', '2023-12-20 05:52:27'),
(5, 22, 2, 'hi\r\n', '2023-12-20 05:53:04'),
(6, 22, 2, 'hello', '2023-12-20 05:53:09'),
(7, 22, 2, 'qwe', '2023-12-20 05:54:03'),
(8, 22, 2, 'oy', '2023-12-20 05:55:15'),
(9, 22, 2, 'oi', '2023-12-20 05:55:32'),
(10, 22, 2, 'qwe', '2023-12-20 05:58:04'),
(11, 22, 2, 'oi boang', '2023-12-20 06:02:22'),
(12, 22, 2, '144778825454', '2023-12-20 06:02:57'),
(13, 22, 2, '123123', '2023-12-20 06:04:39'),
(14, 22, 2, 'Hello world', '2023-12-20 06:15:56'),
(15, 2, 22, 'oh unsa man', '2023-12-20 06:16:32'),
(16, 22, 2, '154', '2023-12-20 06:17:47'),
(17, 2, 22, 'ILO', '2023-12-20 06:18:10'),
(18, 22, 2, 'qwe', '2023-12-20 06:48:57'),
(19, 22, 1, 'unsa man?', '2023-12-20 07:00:00'),
(20, 22, 1, 'vxcvxcv', '2023-12-20 12:28:59'),
(21, 23, 1, 'jhjhjk', '2023-12-20 15:52:20'),
(22, 23, 2, 'jhkjh', '2023-12-20 15:52:28'),
(23, 23, 1, 'l\r\n', '2023-12-20 15:52:37'),
(24, 23, 1, 'kjhkjh\r\n', '2023-12-20 15:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `contracs_Id` int(11) NOT NULL,
  `inferior_id` int(11) NOT NULL,
  `hireUser_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hireds`
--

CREATE TABLE `hireds` (
  `hired_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_hired` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hireds`
--

INSERT INTO `hireds` (`hired_id`, `user_id`, `user_hired`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2023-12-19 17:17:20', '2023-12-19 17:17:20'),
(4, 2, 2, 1, '2023-12-19 17:19:08', '2023-12-19 17:19:08'),
(7, 2, 22, 1, '2023-12-20 01:38:34', '2023-12-20 01:38:34'),
(12, 2, 22, 1, '2023-12-20 01:48:59', '2023-12-20 01:48:59'),
(13, 2, 22, 1, '2023-12-20 01:50:22', '2023-12-20 01:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_poser` int(11) NOT NULL,
  `picture` text NOT NULL,
  `job_title` varchar(125) NOT NULL,
  `job_project` varchar(125) NOT NULL,
  `job_location` varchar(125) NOT NULL,
  `job_require_exp` varchar(125) NOT NULL,
  `projectType` varchar(125) NOT NULL,
  `job_payment` varchar(125) NOT NULL,
  `job_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_poser`, `picture`, `job_title`, `job_project`, `job_location`, `job_require_exp`, `projectType`, `job_payment`, `job_status`, `created_at`, `updated_at`) VALUES
(1, 2, 'roofing.jpg', 'Flooring', 'Flooring', 'Poblacion', '2 years', 'Daily', '12222', 1, '2023-12-19 16:43:41', '2023-12-19 16:43:41'),
(3, 2, '173472113_508180986867522_5999261301032980265_n.jpg', 'Mason', 'Daily', 'Camolinas', '12 years exp in masoning', '', '1122', 1, '2023-12-19 18:01:18', '2023-12-19 18:01:18'),
(4, 2, '311202075_1109981239642694_4928069177595602249_n.jpg', 'House building', 'Pakyaw', 'Basak', 'Tig hilot sa akong balay.', '', '12311', 1, '2023-12-19 18:08:11', '2023-12-19 18:08:11'),
(5, 2, 'kibot.jpg', 'Roofing', 'Pakyaw', 'Cordova', 'Tig hilot sa among atop.', '', '5678', 1, '2023-12-19 18:09:42', '2023-12-19 18:09:42'),
(6, 23, '', 'tiles', 'Daily', 'cogon', '4years', '', '15000', 1, '2023-12-21 09:42:09', '2023-12-21 09:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `panday`
--

CREATE TABLE `panday` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Panday_location` varchar(125) NOT NULL,
  `Panday_skill` varchar(125) NOT NULL,
  `Panday_level` varchar(125) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panday`
--

INSERT INTO `panday` (`id`, `user_id`, `Panday_location`, `Panday_skill`, `Panday_level`, `status`, `created_at`, `update_at`) VALUES
(1, 22, 'Poblacion', 'Panday', '31 years', 2, '2023-12-19 17:14:08', '2023-12-19 17:14:08'),
(2, 1, 'Cordova', 'Pinishing', '3 years', 1, '2023-12-19 17:14:08', '2023-12-19 17:14:08'),
(3, 2, 'Lapu-Lapu', 'Mason', 'Daily', 1, '2023-12-19 18:06:20', '2023-12-19 18:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reported_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `profile` text NOT NULL DEFAULT 'profile.jpg',
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `phoneNumber2` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `role` int(11) NOT NULL DEFAULT 1,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `profile`, `firstname`, `lastname`, `email`, `password`, `phoneNumber`, `phoneNumber2`, `status`, `role`, `create_at`, `updated_at`) VALUES
(1, 'roofing.jpg', 'jovet', 'quillan', 'jovetfirst@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0, 1, 2, '2023-09-05 09:17:08', '2023-09-05 09:17:08'),
(2, 'qq.jpg', 'Jovet', 'Quillian', 'jovet@gmail.com', '202cb962ac59075b964b07152d234b70', 2147483647, 2147483647, 1, 1, '2023-09-05 09:30:24', '2023-09-05 09:30:24'),
(22, 'profile.jpg', 'Jovetshi', 'kie', 'jovetshi@gmail.com', '202cb962ac59075b964b07152d234b70', 1231123123, 123123123, 1, 1, '2023-12-20 01:22:52', '2023-12-20 01:22:52'),
(23, 'profile.jpg', 'jovet', 'quillan', 'jovet@gmail.com', '0c9f3c8a9564dceff87abc5a8fdd2d43', 0, 0, 1, 1, '2023-12-20 15:50:25', '2023-12-20 15:50:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`appli_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chatId`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`contracs_Id`);

--
-- Indexes for table `hireds`
--
ALTER TABLE `hireds`
  ADD PRIMARY KEY (`hired_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `panday`
--
ALTER TABLE `panday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `appli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `contracs_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hireds`
--
ALTER TABLE `hireds`
  MODIFY `hired_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `panday`
--
ALTER TABLE `panday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
