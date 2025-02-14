-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2024 at 03:54 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `bdate` date NOT NULL,
  `contactno` varchar(22) NOT NULL,
  `country` int(11) NOT NULL,
  `region` varchar(127) NOT NULL,
  `email` varchar(254) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(254) NOT NULL,
  `role_id` bigint(20) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `gender`, `bdate`, `contactno`, `country`, `region`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Max', 'Anderson', 'Male', '1989-04-13', '09123456789', 2, 'CALABARZON', 'max@gmail.com', NULL, '$2y$12$7KSIWC8uYkcyrcq4Cn5BPOoX.Bu/rkcEuWL/BImp82tdaRNRK.n6i', 1, NULL, '2024-07-25 08:29:18', '2024-07-25 08:29:18'),
(2, 'Raxx', 'Morenz', 'Male', '1998-02-07', '09827385392', 1, 'SOCCSKSARGEN', 'raxx@gmail.com', NULL, '$2y$12$0EoBB/riQoifFWCXh/Poz.LfX3vyXPsQjxaMKEg1EcyTowIcyLTSS', 1, NULL, '2024-08-07 05:47:45', '2024-08-07 05:47:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
