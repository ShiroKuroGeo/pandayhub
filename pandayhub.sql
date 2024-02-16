
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;




CREATE TABLE `applicants` (
  `appli_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `poser_id` int(11) NOT NULL,
  `appliUser_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `chats` (
  `chatId` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `reciever` int(11) NOT NULL,
  `message` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `contracts` (
  `contracs_Id` int(11) NOT NULL,
  `inferior_id` int(11) NOT NULL,
  `hireUser_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `hireds` (
  `hired_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_hired` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reported_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

ALTER TABLE `applicants`
  ADD PRIMARY KEY (`appli_id`);

ALTER TABLE `chats`
  ADD PRIMARY KEY (`chatId`);

ALTER TABLE `contracts`
  ADD PRIMARY KEY (`contracs_Id`);

ALTER TABLE `formapplication`
  ADD PRIMARY KEY (`form_id`);

ALTER TABLE `hireds`
  ADD PRIMARY KEY (`hired_id`);

ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

ALTER TABLE `panday`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);


ALTER TABLE `applicants`
  MODIFY `appli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `chats`
  MODIFY `chatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `contracts`
  MODIFY `contracs_Id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `formapplication`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `hireds`
  MODIFY `hired_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `panday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;
