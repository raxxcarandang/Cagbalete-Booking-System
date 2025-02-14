-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2024 at 03:49 AM
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
-- Database: `u101594241_rja8e`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `accommodation` varchar(254) NOT NULL,
  `arrival` date NOT NULL,
  `departure` date NOT NULL,
  `foreigners` int(11) NOT NULL,
  `filipinos` int(11) NOT NULL,
  `maubanins` int(11) NOT NULL,
  `totalmale` int(11) NOT NULL,
  `totalfemale` int(11) NOT NULL,
  `totalvisitors` int(11) NOT NULL,
  `specialneeds` int(11) NOT NULL,
  `zeroto7yold` int(11) NOT NULL,
  `thirteento50yold` int(11) NOT NULL,
  `above60yold` int(11) NOT NULL,
  `travelmeans` int(11) NOT NULL,
  `parking` varchar(254) NOT NULL,
  `boating` varchar(254) NOT NULL,
  `purpose` varchar(254) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `userid`, `accommodation`, `arrival`, `departure`, `foreigners`, `filipinos`, `maubanins`, `totalmale`, `totalfemale`, `totalvisitors`, `specialneeds`, `zeroto7yold`, `thirteento50yold`, `above60yold`, `travelmeans`, `parking`, `boating`, `purpose`, `status`, `created_at`, `updated_at`) VALUES
(7, 1, 'Rio del Sol Beach Resort', '2024-07-17', '2024-07-19', 5, 10, 5, 7, 8, 15, 10, 5, 5, 5, 0, 'Don\'s Parking Rental', '1', 'Leisure', 1, '2024-07-28 16:47:23', '2024-08-09 12:50:55'),
(8, 1, 'Yey Resort', '2024-07-30', '2024-07-31', 5, 5, 5, 7, 8, 15, 10, 5, 5, 5, 0, 'Metro Park Cagbalete Island Parking', '2', 'YehEy!', 1, '2024-07-28 16:55:08', '2024-08-08 06:23:55'),
(10, 1, 'Dona Choleng Camping Resort', '2024-08-01', '2024-08-03', 7, 6, 5, 23, 4, 1, 4, 8, 2, 3, 0, 'Metro Park Cagbalete Island Parking', '1', 'Leisure', 1, '2024-08-01 08:20:50', '2024-08-09 14:08:02'),
(11, 1, 'Kimochi', '2024-08-03', '2024-08-03', 6, 5, 4, 2, 3, 1, 10, 7, 8, 9, 1, 'Metro Park Cagbalete Island Parking', '1', 'Monster Grenade', 2, '2024-08-03 09:29:29', '2024-08-09 14:08:40'),
(12, 1, 'Aquazul Hotel and Resort', '2024-08-03', '2024-08-08', 6, 5, 4, 2, 3, 1, 1, 7, 8, 9, 0, 'Metro Park Cagbalete Island Parking', '1', 'Business', 2, '2024-08-03 09:40:56', '2024-08-08 06:13:41'),
(13, 1, 'Aquazul Hotel and Resort', '2024-08-03', '2024-08-03', 5, 5, 3, 6, 4, 10, 6, 4, 4, 2, 0, 'Metro Park Cagbalete Island Parking', '1', 'Leisure', 0, '2024-08-03 10:53:28', '2024-08-03 10:53:28'),
(14, 1, 'Nilandingan Cove Resort', '2024-08-03', '2024-08-05', 6, 5, 4, 2, 3, 1, 1, 7, 8, 9, 0, 'Metro Park Cagbalete Island Parking', '1', 'Leisure', 2, '2024-08-03 11:33:21', '2024-08-08 09:45:52'),
(15, 1, 'Rio del Sol Beach Resort', '2024-08-05', '2024-08-14', 6, 5, 4, 2, 3, 1, 2, 7, 8, 8, 0, 'Metro Park Cagbalete Island Parking', '1', 'Leisure', 0, '2024-08-05 15:43:14', '2024-08-05 15:43:14'),
(17, 1, 'Aquazul Hotel and Resort', '2024-08-05', '2024-08-07', 6, 5, 4, 2, 3, 1, 1, 7, 8, 8, 0, 'Metro Park Cagbalete Island Parking', '1', 'Business', 0, '2024-08-05 15:52:08', '2024-08-05 15:52:08'),
(18, 1, 'Dona Choleng Camping Resort', '2024-08-05', '2024-08-07', 6, 5, 4, 2, 3, 1, 1, 7, 8, 9, 1, 'Metro Park Cagbalete Island Parking', '1', 'Leisure', 0, '2024-08-05 15:55:05', '2024-08-05 15:55:05'),
(19, 1, 'Aquazul Hotel and Resort', '2024-08-05', '2024-08-07', 6, 5, 4, 2, 3, 1, 1, 7, 8, 9, 0, 'Metro Park Cagbalete Island Parking', '1', 'Leisure', 0, '2024-08-05 15:59:27', '2024-08-05 15:59:27'),
(20, 1, 'Aquazul Hotel and Resort', '2024-08-06', '2024-08-07', 6, 5, 4, 2, 3, 1, 62, 62, 62, 62, 0, 'Metro Park Cagbalete Island Parking', '1', 'Leisure', 0, '2024-08-05 16:05:41', '2024-08-05 16:05:41'),
(21, 1, 'Aquazul Hotel and Resort', '2024-08-06', '2024-08-07', 6, 5, 4, 2, 3, 1, 10, 7, 8, 9, 0, 'Metro Park Cagbalete Island Parking', '1', 'Leisure', 0, '2024-08-05 16:15:52', '2024-08-05 16:15:52'),
(22, 1, 'Dona Choleng Camping Resort', '2024-08-06', '2024-08-07', 6, 5, 4, 2, 3, 1, 1, 7, 89, 9, 0, 'Metro Park Cagbalete Island Parking', '1', 'Leisure', 0, '2024-08-05 16:18:01', '2024-08-05 16:18:01'),
(23, 1, 'Aquazul Hotel and Resort', '2024-08-06', '2024-08-07', 6, 5, 4, 2, 3, 1, 10, 7, 8, 9, 0, 'Metro Park Cagbalete Island Parking', '1', 'Leisure', 0, '2024-08-05 16:18:48', '2024-08-05 16:18:48'),
(24, 1, 'Aquazul Hotel and Resort', '2024-08-07', '2024-08-05', 6, 5, 4, 2, 3, 1, 10, 7, 8, 9, 0, 'Metro Park Cagbalete Island Parking', '1', 'Business', 0, '2024-08-05 17:35:23', '2024-08-05 17:35:23'),
(25, 1, 'Dona Choleng Camping Resort', '2024-08-06', '2024-08-07', 6, 5, 4, 2, 3, 1, 1, 7, 8, 9, 1, 'Metro Park Cagbalete Island Parking', '1', 'Business', 0, '2024-08-05 18:48:59', '2024-08-05 18:48:59'),
(26, 1, 'Dona Choleng Camping Resort', '2024-08-06', '2024-08-07', 6, 5, 4, 2, 3, 1, 1, 7, 8, 9, 1, 'Metro Park Cagbalete Island Parking', '1', 'Business', 0, '2024-08-05 18:49:07', '2024-08-05 18:49:07'),
(27, 1, 'Dona Choleng Camping Resort', '2024-08-06', '2024-08-07', 6, 5, 4, 2, 3, 1, 1, 7, 8, 9, 1, 'Metro Park Cagbalete Island Parking', '1', 'Business', 2, '2024-08-05 18:50:05', '2024-08-08 09:46:01'),
(28, 1, 'Aquazul Hotel and Resort', '2024-08-06', '2024-08-07', 6, 5, 4, 2, 3, 1, 32, 7, 8, 83, 0, 'Metro Park Cagbalete Island Parking', '1', 'Leisure', 0, '2024-08-05 19:12:47', '2024-08-05 19:12:47'),
(29, 1, 'Dona Choleng Camping Resort', '2024-08-06', '2024-09-06', 354, 252, 4, 2, 32, 1, 643, 5, 34, 643, 0, 'Metro Park Cagbalete Island Parking', '1', 'Leisure', 0, '2024-08-05 19:13:54', '2024-08-05 19:13:54'),
(30, 1, 'Jovencio`s Resort', '2024-08-06', '2024-08-07', 3, 5, 7, 2, 8, 10, 5, 1, 5, 4, 1, 'Metro Park Cagbalete Island Parking', '1', 'Leisure', 0, '2024-08-05 19:20:05', '2024-08-05 19:20:05'),
(31, 1, 'Dona Choleng Camping Resort', '2024-08-06', '2024-08-07', 6, 5, 4, 2, 3, 1, 2, 7, 8, 1, 0, 'dsad', '1', 'dsdsa', 0, '2024-08-05 19:29:39', '2024-08-05 19:29:39'),
(32, 1, 'Dona Choleng Camping Resort', '2024-08-06', '2024-08-07', 6, 5, 4, 2, 3, 1, 10, 7, 8, 9, 1, 'Metro Park Cagbalete Island Parking', '2', 'Leisure', 0, '2024-08-05 19:53:09', '2024-08-05 19:53:09'),
(33, 1, 'Aquazul Hotel and Resort', '2024-08-06', '2024-08-08', 6, 5, 4, 2, 3, 1, 1, 7, 8, 9, 0, 'Metro Park Cagbalete Island Parking', '1', 'hamburg', 0, '2024-08-06 11:21:18', '2024-08-06 11:21:18'),
(34, 1, 'Bombing Resort', '2024-08-06', '2024-08-07', 6, 5, 4, 2, 3, 1, 1, 7, 8, 9, 0, 'Chorizo Parking', '1', 'Magic Purpose', 0, '2024-08-06 11:39:00', '2024-08-06 11:39:00'),
(35, 1, 'Chinko Resort', '2024-08-06', '2024-08-07', 7, 6, 45, 2, 3, 1, 0, 8, 9, 1, 0, 'Metro Park Cagbalete Island Parking', '1', 'Business', 0, '2024-08-06 12:23:44', '2024-08-06 12:23:44'),
(36, 1, 'Testing Accommodation', '2024-08-06', '2024-08-07', 6, 5, 4, 2, 3, 1, 8, 7, 8, 1, 1, 'Metro Park Cagbalete Island Parking', '1', 'Business', 0, '2024-08-06 12:27:25', '2024-08-06 12:27:25'),
(37, 1, 'Aquazul Hotel and Resort', '2024-08-06', '2024-08-06', 6, 5, 4, 2, 3, 1, 1, 7, 8, 9, 0, 'Metro Park Cagbalete Island Parking', '1', 'Leisure', 0, '2024-08-06 13:56:02', '2024-08-06 13:56:02'),
(38, 1, 'Aquazul Hotel and Resort', '2024-08-05', '2024-08-07', 6, 5, 4, 2, 3, 1, 1, 7, 8, 8, 0, 'Metro Park Cagbalete Island Parking', '1', 'Business', 0, '2024-08-05 15:52:08', '2024-08-09 13:55:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_userid_foreign` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_userid_foreign` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
