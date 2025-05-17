-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2025 at 12:23 AM
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
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `bdate` date NOT NULL,
  `contactno` varchar(22) NOT NULL,
  `country` varchar(127) NOT NULL,
  `region` varchar(127) NOT NULL,
  `email` varchar(254) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(254) NOT NULL,
  `role_id` bigint(20) NOT NULL DEFAULT 1,
  `status` varchar(254) NOT NULL DEFAULT 'Unverified',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mname`, `lname`, `gender`, `bdate`, `contactno`, `country`, `region`, `email`, `email_verified_at`, `password`, `role_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'angelo', 'E.', 'sangcap', 'Male', '2002-06-06', '09053730919', 'PHILIPPINES', '(IV-A) CALABARZON', 'sangcapangelo02@gmail.com', '2025-02-02 09:52:59', '$2y$12$4EiZCVbeZouzLkLPg5nufey7QCr/tyvRtrRDDHzco4g09ThbG6HQ2', 979, 'Verified', 'desjuP6YFfeLXz88DLs2B1vOCT8oB2MDyMGXxiGPoFvmSQkJZZ6FqoexdP8Y', '2024-12-27 06:22:37', '2025-02-02 09:52:59'),
(7, 'Nash', 'E.', 'Stephenson', 'Male', '2002-01-12', '0987654231', 'MAUBAN', '(IV-A) CALABARZON', 'nasipi3462@pofmagic.com', '2025-01-05 07:19:31', '$2y$12$qe01nTRjAZNoES277holr.us7kRHxACDSBqoVMoL.S30hJOoMI5JG', 1, 'Verified', NULL, '2024-12-27 15:03:06', '2025-01-05 07:19:31'),
(9, 'Vanessa', 'E.', 'El Mesa', 'Female', '2000-06-27', '0999999999', 'INTERNATIONAL', 'INTERNATIONAL', 'v9ozcljc4g@qejjyl.com', '2025-02-02 09:53:03', '$2y$12$Rh4zWhYCa03SgDEPYmP9IedXXawQv2C3YSKtEPG33pYbw7ASEpXZe', 1, 'Verified', NULL, '2024-12-27 15:40:08', '2025-02-02 09:53:03'),
(10, 'Jomer', 'E.', 'Simpson', 'Male', '1992-07-01', '09872346574', 'PHILIPPINES', '(XI) DAVAO', 'jomesib744@matmayer.com', '2024-12-28 03:12:01', '$2y$12$ypckYUWu.RmYBbkKGKMwMeU2IGS5K0m3jOCWcjUQ0YWNpl72E2HXm', 1, 'Active', NULL, '2024-12-28 03:11:44', '2024-12-28 03:12:01'),
(11, 'timona', 'E.', 'anoni', 'Male', '2022-12-29', '09123456789', 'PHILIPPINES', '(II) CAGAYAN', 'timona8860@pofmagic.com', '2024-12-28 04:06:39', '$2y$12$yjYuYHFpBOW2TNIEHCYME.ptZMVK.K0F7rUoElVbEEZexNGGmSsHi', 1, 'Active', NULL, '2024-12-28 04:06:13', '2024-12-28 04:06:39'),
(12, 'Olivia', 'E.', 'Rodder', 'Female', '1999-03-27', '09123748593', 'INTERNATIONAL', 'INTERNATIONAL', '0y4myanj5j@vwhins.com', '2024-12-28 04:07:33', '$2y$12$WKiEPx7BoYZyX6LQnG2I1umShPKPwhwYw62QHcP1.kFF5RC0.mQSK', 1, 'Active', NULL, '2024-12-28 04:07:14', '2024-12-28 04:07:33'),
(13, 'Kumar', 'E.', 'Anduman', 'Male', '2002-01-19', '0917485682', 'PHILIPPINES', 'NCR', 'kixekifu@azuretechtalk.net', '2024-12-28 04:10:58', '$2y$12$5hisQnbKAdDx5KNpd45mQOZy6IXUJ0edfmhQV3fFfP1Gugq9WLu1C', 1, 'Active', NULL, '2024-12-28 04:10:45', '2024-12-28 04:10:58'),
(14, 'Seira', 'E.', 'co', 'Female', '2013-02-06', '09053730919', 'PHILIPPINES', '(XIII) CARAGA', 'pejico6207@pofmagic.com', '2024-12-28 04:11:48', '$2y$12$vrDtUWLGkgIvKgqUPq4iZuylNhtzp0hs3hulnuh0q0viOY8OUMzym', 1, 'Active', NULL, '2024-12-28 04:11:29', '2024-12-28 04:15:21'),
(15, 'Farah', 'E.', 'Fina', 'Female', '2003-07-09', '091827475834', 'MAUBAN', '(IV-A) CALABARZON', 'famlalefya@gufum.com', '2024-12-28 04:16:29', '$2y$12$lYwUXRXUpKqJefku1iXlrOCo7Pk7nG.LnE5lbiUBq78ZeoxzrjVRe', 1, 'Active', NULL, '2024-12-28 04:16:13', '2024-12-28 04:16:29'),
(16, 'leira', 'E.', 'mamisa', 'Female', '2000-06-06', '563849582', 'INTERNATIONAL', 'INTERNATIONAL', 'yosepaw188@pofmagic.com', '2024-12-28 04:17:09', '$2y$12$VujQDwXDCq4JSBHQX9p44uZGD09k/hslnuiCM2AA44KKA9THrzFpi', 1, 'Active', NULL, '2024-12-28 04:16:49', '2024-12-28 04:17:09'),
(17, 'John', 'E.', 'Curtis', 'Male', '1997-09-01', '09182736453', 'MAUBAN', '(IV-A) CALABARZON', 'curlew6901@drivz.net', '2024-12-28 04:25:21', '$2y$12$uTCdUmcIFfO.S6mAXQlj8e6bm2.paVUNG4hCxn74X.73zNYjjvr3u', 1, 'Active', NULL, '2024-12-28 04:25:05', '2024-12-28 04:25:21'),
(18, 'Barbara', 'E.', 'Christie', 'Female', '2003-03-11', '09187586328', 'INTERNATIONAL', 'INTERNATIONAL', '1580birgitta@freesourcecodes.com', '2024-12-28 04:53:35', '$2y$12$D.nJv1sxj8Vhbvos3vFE7O9v.hXOMoeN.W/GUyFZC/tPpq0CW7/ly', 1, 'Active', NULL, '2024-12-28 04:39:18', '2024-12-28 04:53:35'),
(20, 'Raxx', 'E.', 'Carandang', 'Male', '2000-01-09', '09182938458', 'PHILIPPINES', '(XI) DAVAO', 'raxx109@gmail.com', '2024-12-29 23:59:54', '$2y$12$EoxU4o2hSBdny2IkqlTbUeHNbUWTHn7jBFUZFCocKRfjV01W5cDCm', 979, 'Active', NULL, '2024-12-29 23:53:13', '2025-01-14 14:33:53'),
(21, 'Shaira', 'E.', 'Sta Rosa', 'Female', '2002-02-14', '+63991032720', 'PHILIPPINES', '(IV-A) CALABARZON', 'pesiganshairamae@gmail.com', '2025-01-02 06:35:19', '$2y$12$IQ6.MrVGRqB1lxKvQ00gxuuknmfN.lcxKyhtkNqorT4h1YlTGYBe6', 1, 'Active', NULL, '2025-01-02 05:39:58', '2025-01-02 06:35:19'),
(22, 'Shaira', 'E.', 'Sta Rosa', 'Female', '2002-02-01', '+63991032720', 'PHILIPPINES', '(IV-A) CALABARZON', 'shairapstarosa@gmail.com', NULL, '$2y$12$1A29LIFSo3K3Av7dnxo8LeDSDtpXyzflHSFHgd6.y5phAlnpOj9.2', 1, 'Active', NULL, '2025-01-02 05:42:51', '2025-01-02 05:42:51'),
(23, 'angelo', 'E.', 'sangcap', 'Male', '2002-06-06', '+639053730919', 'MAUBAN', '(IV-A) CALABARZON', 'sangcapangelo03@gmail.com', NULL, '$2y$12$kRaeK.NNHISw6zVZATMX1u.KPN21g6gIV3lSaLB.N562m9aloFbAa', 1, 'Active', NULL, '2025-01-02 05:44:45', '2025-01-02 05:44:45'),
(24, 'angelo', 'E.', 'sangcap', 'Male', '2002-06-06', '+639053730919', 'MAUBAN', '(IV-A) CALABARZON', 'sangcapangelo04@gmail.com', '2025-01-02 05:47:01', '$2y$12$vsoO4SubKLDF4sYwB30XBubTvr9oWxO9dgbm5hDBRK4t3FcAAHHIi', 1, 'Active', NULL, '2025-01-02 05:45:50', '2025-01-02 05:47:01'),
(25, 'Shaira', 'E.', 'Sta Rosa', 'Female', '2002-02-01', '+63991032720', 'PHILIPPINES', '(IV-A) CALABARZON', 'shairapesiganstarosa@gmail.com', NULL, '$2y$12$DPNGNi3TIQCwySh2QFjEpO0NagJ9AAB9UkjzOQuayVvx2uWvEf5am', 1, 'Active', NULL, '2025-01-02 05:46:39', '2025-01-02 05:46:39'),
(26, 'Shaira', 'E.', 'Sta Rosa', 'Female', '2003-01-02', '+63991032720', 'PHILIPPINES', '(I) ILOCOS', 'shairamae@gmail.com', NULL, '$2y$12$Gv.1L/R0/1FGlj5bhGpSa.rL9GCXeS5Zj1qqG0vG/fhDY7Um4dB9O', 1, 'Active', NULL, '2025-01-02 06:22:41', '2025-01-02 06:22:41'),
(27, 'Test', 'O.', 'Tster', 'Male', '1992-03-05', '+6391234567892', 'PHILIPPINES', 'NCR', 'test@gmail.com', '2025-01-12 21:49:42', '$2y$12$FQwbAgSDrVuroOoq6buategkHUfdny403oAp9nJBKYdH3IkWFKSzm', 797, 'Unverified', NULL, '2025-01-10 00:25:51', '2025-01-10 00:25:51'),
(28, 'Raxx', 'R.', 'Carandang', 'Male', '1992-02-13', '+97157283252', 'PHILIPPINES', 'CAR', 'raxx@yahoo.com', NULL, '$2y$12$PGWfDbSgHiqiKQ/eqMgbluks6/AcSdRp06BFhv0acLFzo2vI.yEt.', 1, 'Unverified', NULL, '2025-05-17 18:07:52', '2025-05-17 18:07:52'),
(29, 'Raxx', 'a', 'Carandang', 'Male', '1992-02-13', '+63123456789', 'PHILIPPINES', '(I) ILOCOS', 'raxx1@yahoo.com', NULL, '$2y$12$8MBT/Kp8nuhHzptJoqJSTO48dX/xn/NIIhJm7lsiy5YEC1cP0aCu.', 1, 'Unverified', NULL, '2025-05-17 18:52:25', '2025-05-17 18:52:25');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
