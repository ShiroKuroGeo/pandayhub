-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 10:10 AM
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
-- Database: `pandayhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `appli_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `poser_id` int(11) NOT NULL,
  `appliUser_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`appli_id`, `job_id`, `poser_id`, `appliUser_id`, `status`, `created_at`, `updated_at`) VALUES
(52, 4, 46, 45, 1, '2024-02-07 06:42:29', '2024-02-07 06:42:29');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `formapplication`
--

CREATE TABLE `formapplication` (
  `form_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `date_agreement_start` text NOT NULL,
  `date_agreement_end` text NOT NULL,
  `helperNumber` int(11) NOT NULL,
  `helpers_paid` int(11) NOT NULL,
  `form_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hireds`
--

INSERT INTO `hireds` (`hired_id`, `user_id`, `user_hired`, `status`, `created_at`, `updated_at`) VALUES
(78, 47, 45, 10, '2024-02-07 06:42:30', '2024-02-07 06:42:30');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_poser`, `picture`, `job_title`, `job_project`, `job_location`, `job_require_exp`, `projectType`, `job_payment`, `job_status`, `created_at`, `updated_at`) VALUES
(1, 45, 'roofing.jpg', 'Flooring', 'Flooring', 'Poblacion', '2 years', 'Daily', '12222', 1, '2023-12-19 16:43:41', '2023-12-19 16:43:41'),
(3, 45, '173472113_508180986867522_5999261301032980265_n.jpg', 'Mason', 'Daily', 'Camolinas', '12 years exp in masoning', 'Daily', '1122', 1, '2023-12-19 18:01:18', '2023-12-19 18:01:18'),
(4, 46, '311202075_1109981239642694_4928069177595602249_n.jpg', 'House building', 'Pakyaw', 'Basak', 'Tig hilot sa akong balay.', 'Daily', '12311', 1, '2023-12-19 18:08:11', '2023-12-19 18:08:11'),
(7, 47, '406810112_302821768801035_3765542810081729389_n.jpg', 'mason', 'Daily', 'skina japan', '2 years of existence', 'Daily', '150', 1, '2023-12-22 14:11:28', '2023-12-22 14:11:28'),
(8, 49, '406810112_302821768801035_3765542810081729389_n.jpg', 'mayor', 'Daily', 'cordova', 'mayoring', 'Daily', '80000', 1, '2023-12-22 16:15:05', '2023-12-22 16:15:05'),
(9, 45, 'dance.jpg', 'dancing', 'Pakyaw', 'poblacion', 'dancing chiou', 'Daily', '12311', 1, '2023-12-22 16:16:03', '2023-12-22 16:16:03'),
(10, 46, '123.jpg', 'panday guba', 'Daily', 'cordova', 'no experience', 'Daily', '50', 1, '2023-12-22 20:52:29', '2023-12-22 20:52:29'),
(11, 48, 'arrrrrr.webp', 'Finishing', 'Pakyaw', 'Davao', 'at least 2 years in Masonry', 'Daily', '400,000', 1, '2023-12-23 02:11:09', '2023-12-23 02:11:09'),
(13, 47, 'wiselogo.png', '123`123`', 'Daily', '123', '321132123', '', '132', 1, '2024-02-07 05:22:51', '2024-02-07 05:22:51');

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
  `panday_exp` varchar(125) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `panday`
--

INSERT INTO `panday` (`id`, `user_id`, `Panday_location`, `Panday_skill`, `Panday_level`, `panday_exp`, `status`, `created_at`, `update_at`) VALUES
(11, 45, 'Poblacion', 'Mason', 'Daily', '2 years in masonry.', 2, '2023-12-26 13:20:23', '2023-12-26 13:20:23'),
(12, 48, '132123123', '123132132', 'Pakyaw', '123213123', 2, '2024-02-07 05:23:45', '2024-02-07 05:23:45');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `user_id`, `reported_id`, `reason`, `create_at`, `updated_at`) VALUES
(3, 33, 33, 'amaw amaw', '2023-12-22 20:59:30', '2023-12-22 20:59:30'),
(5, 47, 45, 'Ambot lang trip nako boot ka?', '2024-02-07 09:08:43', '2024-02-07 09:08:43');

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
  `rating` int(11) NOT NULL,
  `no_of_rating` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `role` int(11) NOT NULL DEFAULT 1,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `profile`, `firstname`, `lastname`, `email`, `password`, `phoneNumber`, `phoneNumber2`, `rating`, `no_of_rating`, `status`, `role`, `create_at`, `updated_at`) VALUES
(45, 'logo.png', 'jovet', 'first', 'jovetfirst@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0, 3, 1, 1, 1, '2023-12-26 08:18:25', '2023-12-26 08:18:25'),
(46, 'profile.jpg', 'jovet', '1st', 'jovet1st@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0, 0, 0, 1, 2, '2023-12-26 08:18:49', '2023-12-26 08:18:49'),
(47, 'profile.jpg', '123', '123', '123@123', '202cb962ac59075b964b07152d234b70', 0, 0, 0, 0, 1, 3, '2023-12-26 08:24:55', '2023-12-26 08:24:55'),
(48, 'profile.jpg', '123123', '123', 'cliyent@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 0, 0, 0, 1, 1, '2023-12-26 08:26:20', '2023-12-26 08:26:20'),
(49, 'profile.jpg', 'ewq', 'ewq', 'qewq@12123', 'efe6398127928f1b2e9ef3207fb82663', 0, 0, 0, 0, 1, 3, '2023-12-26 08:26:53', '2023-12-26 08:26:53'),
(50, 'profile.jpg', 'jovet', 'quillan', 'jovet123@', '912ec803b2ce49e4a541068d495ab570', 0, 0, 0, 0, 1, 3, '2024-02-01 03:55:17', '2024-02-01 03:55:17'),
(51, 'profile.jpg', '123', '123', '123@123123', '202cb962ac59075b964b07152d234b70', 0, 0, 0, 0, 1, 3, '2024-02-04 07:51:01', '2024-02-04 07:51:01');

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
-- Indexes for table `formapplication`
--
ALTER TABLE `formapplication`
  ADD PRIMARY KEY (`form_id`);

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
  MODIFY `appli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `contracs_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formapplication`
--
ALTER TABLE `formapplication`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hireds`
--
ALTER TABLE `hireds`
  MODIFY `hired_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `panday`
--
ALTER TABLE `panday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
