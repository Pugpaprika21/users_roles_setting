-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2024 at 04:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users_roles_setting_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `deleted_at`, `username`, `email`, `password_hash`, `first_name`, `last_name`, `date_of_birth`, `address`, `phone_number`) VALUES
(2, '2024-07-04 11:18:47', '2024-07-04 11:18:47', NULL, 'rq2', 'pugpaprika1@gmail.com', '$2y$12$YJosF2LFZz1/7qa.ZRXyBuxJpqVDI2NghtCEvyxNax4q20mL0aQ9u', 'erreq', 'reqerqeeqr', '2024-07-04', 'werw', '0850004xxx'),
(4, '2024-07-04 11:35:24', '2024-07-04 11:35:24', NULL, 'pug', 'qq@gmail.com', '$2y$12$EWYxw1jLcuNqYhA3wjCyp.Fke6iqXq769gwb5Esozp64LOSBHREDq', 'satit', 'ssss', '2024-07-04', 'erqerqer', '22222'),
(5, '2024-07-05 19:00:00', '2024-07-05 19:00:00', '0000-00-00 00:00:00', 'john_doe', 'john@example.com', '$2y$10$nrHq8vFRF.uNTPx0Tf/Vk.ax4Z47Ix5puJenT.ctDk2sAhLfaSi0e', 'John', 'Doe', '1990-01-01', '123 Main St', '1234567890'),
(6, '2024-07-05 19:00:00', '2024-07-05 19:00:00', '0000-00-00 00:00:00', 'john_doe', 'john@example.com', '$2y$10$/3RkiTgIpwCtoAjgg8QHTuFmIsYECuw2EQuO5EKQzjIt69M/3Xg8a', 'John', 'Doe', '1990-01-01', '123 Main St', '1234567890'),
(7, '2024-07-06 02:23:56', '2024-07-06 02:23:56', NULL, 'john_doe', 'john@example.com', '$2y$10$lqqwwfmxME7xydTYCebKgeyOAvck/uQcRVbpMONvLknT0TQ0blXse', 'John', 'Doe', '1990-01-01', '123 Main St', '1234567890'),
(8, '2024-07-06 02:25:03', '2024-07-06 02:25:03', NULL, 'john_doe', 'john@example.com', '$2y$10$aw/mHl1UwTKKh/58j3YDQ..PJtsCOwnmAG9wu5AJNIV32w/HMlgXu', 'John', 'Doe', '1990-01-01', '123 Main St', '1234567890'),
(9, '2024-07-06 02:25:03', '2024-07-06 02:25:03', NULL, 'john_doe', 'john@example.com', '$2y$10$BXgc7tBCv579PYpxXQtJOOrcX8UiPzG6PEzHyiVt0mrwCLoq4bSKi', 'John', 'Doe', '1990-01-01', '123 Main St', '1234567890'),
(10, '2024-07-06 02:25:49', '2024-07-06 02:25:49', NULL, 'john_doe', 'john@example.com', '$2y$10$qOu7DSSacqsiNixXD.PyuuTLxj14kdsG8cGJRZgBlZmHodLeVS/Tm', 'John', 'Doe', '1990-01-01', '123 Main St', '1234567890'),
(11, '2024-07-06 02:26:56', '2024-07-06 02:26:56', NULL, 'john_doe', 'john@example.com', '$2y$10$n1ZbfbLotx93xejMRGnxgOnn0a62iqT1Sku3U81gqFMr/YvSrptdi', 'John', 'Doe', '1990-01-01', '123 Main St', '1234567890'),
(12, '2024-07-06 02:26:56', '2024-07-06 02:26:56', NULL, 'john_doe', 'john@example.com', '$2y$10$srJtEMYXjkwXHzPMqC07DuPg9Oqku8mGvR6wf/2YPS1Qu5NVTL08i', 'John', 'Doe', '1990-01-01', '123 Main St', '1234567890'),
(16, '2024-07-06 02:30:23', '2024-07-06 02:30:23', NULL, 'john_doe', 'john@example.com', '$2y$10$9C7/RZIsg4ijLpv.Dnt8P.g3Auqx7snrtqaE59ZUhN3cPrk/sl.Qi', 'John', 'Doe', '1990-01-01', '123 Main St', '1234567890'),
(17, '2024-07-06 02:30:29', '2024-07-06 02:30:29', NULL, 'john_doe', 'john@example.com', '$2y$10$u2H4ZyGuFgbwb5vGBrGhMOXShkUGaFvtCfDll26ZzQvkHBpWf6iY2', 'John', 'Doe', '1990-01-01', '123 Main St', '1234567890'),
(18, '2024-07-06 02:30:51', '2024-07-06 02:30:51', NULL, 'john_doe', 'john@example.com', '$2y$10$iNF0A3EL57vPjT2LBcL2HeENRSchawQ.5MJn/aLIcFRLNxiu1Kt1W', 'John', 'Doe', '1990-01-01', '123 Main St', '1234567890'),
(19, '2024-07-06 02:30:51', '2024-07-06 02:30:51', NULL, 'john_doe', 'john@example.com', '$2y$10$zBdyq0WDdWWaRz.3vHYX6OtQuMcyKJBErKTfvsqEkQzIObHbpgE3i', 'John', 'Doe', '1990-01-01', '123 Main St', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `users_group`
--

CREATE TABLE `users_group` (
  `id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `group_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_group`
--

INSERT INTO `users_group` (`id`, `created_at`, `updated_at`, `deleted_at`, `group_name`, `description`) VALUES
(1, '2024-07-06 03:01:30', '2024-07-06 03:01:30', NULL, 'admin', 'admin sys'),
(2, '2024-07-06 03:01:38', '2024-07-06 03:01:38', NULL, 'user', 'user sys'),
(3, '2024-07-06 03:01:53', '2024-07-06 03:01:53', NULL, 'super admin', 'super admin'),
(4, '2024-07-06 04:34:57', '2024-07-06 04:35:09', NULL, 'ผู้อำนวยการ', 'ผู้อำนวยการ รร.');

-- --------------------------------------------------------

--
-- Table structure for table `users_group_setting`
--

CREATE TABLE `users_group_setting` (
  `id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `group_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_group_setting`
--

INSERT INTO `users_group_setting` (`id`, `created_at`, `updated_at`, `deleted_at`, `group_id`, `user_id`) VALUES
(143, '2024-07-06 13:59:18', '2024-07-06 13:59:18', NULL, 2, 2),
(144, '2024-07-06 13:59:18', '2024-07-06 13:59:18', NULL, 1, 2),
(145, '2024-07-06 13:59:40', '2024-07-06 13:59:40', NULL, 2, 2),
(146, '2024-07-06 13:59:40', '2024-07-06 13:59:40', NULL, 1, 2),
(148, '2024-07-06 13:59:40', '2024-07-06 13:59:40', NULL, 3, 2),
(149, '2024-07-06 13:59:53', '2024-07-06 13:59:53', NULL, 3, 2),
(150, '2024-07-06 13:59:53', '2024-07-06 13:59:53', NULL, 2, 2),
(151, '2024-07-06 13:59:53', '2024-07-06 13:59:53', NULL, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_group`
--
ALTER TABLE `users_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_group_setting`
--
ALTER TABLE `users_group_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users_group`
--
ALTER TABLE `users_group`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_group_setting`
--
ALTER TABLE `users_group_setting`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
