-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2025 at 12:26 AM
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
-- Table structure for table `notifies`
--

CREATE TABLE `notifies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `bookid` int(11) DEFAULT NULL,
  `adminid` bigint(20) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `msg` varchar(512) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifies`
--

INSERT INTO `notifies` (`id`, `userid`, `bookid`, `adminid`, `type`, `msg`, `remark`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 1, 11, NULL, NULL, 'Your booking (#11) has been deleted as it was found to be in violation of our policies. Please review our terms and conditions for more information. If you believe this was a mistake, contact our support team for assistance.', NULL, '2025-02-15 12:55:01', '2024-12-28 19:17:21', '2025-02-15 12:55:01'),
(2, 2, 99, NULL, NULL, 'Lack (#9) has created a new booking (#99). Please review.', NULL, '2025-01-03 13:56:25', '2024-12-31 05:23:06', '2025-01-03 13:56:25'),
(3, 7, 99, NULL, NULL, 'Lack (#9) has created a new booking (#99). Please review.', NULL, '2025-01-03 13:56:25', '2024-12-31 05:23:07', '2025-01-03 13:56:25'),
(4, 2, 100, NULL, NULL, 'Lack (#9) has created a new booking (#100). Please review.', NULL, '2025-01-03 13:56:25', '2024-12-31 08:33:57', '2025-01-03 13:56:25'),
(5, 7, 100, NULL, NULL, 'Lack (#9) has created a new booking (#100). Please review.', NULL, '2025-01-03 13:56:25', '2024-12-31 08:33:57', '2025-01-03 13:56:25'),
(6, 2, 101, NULL, NULL, 'Lack (#9) has created a new booking (#101). Please review.', NULL, '2025-01-03 13:56:25', '2025-01-01 06:09:43', '2025-01-03 13:56:25'),
(7, 7, 101, NULL, NULL, 'Lack (#9) has created a new booking (#101). Please review.', NULL, '2025-01-03 13:56:25', '2025-01-01 06:09:43', '2025-01-03 13:56:25'),
(8, 2, 102, NULL, NULL, 'Lack (#9) has created a new booking (#102). Please review.', NULL, '2025-01-03 13:56:25', '2025-01-01 06:26:14', '2025-01-03 13:56:25'),
(9, 7, 102, NULL, NULL, 'Lack (#9) has created a new booking (#102). Please review.', NULL, '2025-01-03 13:56:25', '2025-01-01 06:26:14', '2025-01-03 13:56:25'),
(10, 2, 106, NULL, NULL, 'Lack (#9) has created a new booking (#106). Please review.', NULL, '2025-01-03 13:56:25', '2025-01-01 07:58:10', '2025-01-03 13:56:25'),
(11, 7, 106, NULL, NULL, 'Lack (#9) has created a new booking (#106). Please review.', NULL, '2025-01-03 13:56:25', '2025-01-01 07:58:10', '2025-01-03 13:56:25'),
(12, 2, 107, NULL, NULL, 'Lack (#9) has created a new booking (#107). Please review.', NULL, '2025-01-03 13:56:25', '2025-01-01 08:22:00', '2025-01-03 13:56:25'),
(13, 7, 107, NULL, NULL, 'Lack (#9) has created a new booking (#107). Please review.', NULL, '2025-01-03 13:56:25', '2025-01-01 08:22:00', '2025-01-03 13:56:25'),
(14, 6, NULL, NULL, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:35:56', '2025-01-05 05:48:43'),
(15, 6, NULL, NULL, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:38:31', '2025-01-05 05:48:43'),
(16, 6, NULL, NULL, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:39:27', '2025-01-05 05:48:43'),
(17, 1, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:39:27', '2025-01-05 05:48:43'),
(18, 20, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:39:27', '2025-01-05 05:48:43'),
(19, 21, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:39:27', '2025-01-05 05:48:43'),
(20, 6, NULL, NULL, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:39:44', '2025-01-05 05:48:43'),
(21, 1, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:39:44', '2025-01-05 05:48:43'),
(22, 20, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:39:44', '2025-01-05 05:48:43'),
(23, 21, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:39:44', '2025-01-05 05:48:43'),
(24, 6, NULL, NULL, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-02-15 12:55:01', '2025-01-05 04:40:14', '2025-02-15 12:55:01'),
(25, 1, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:40:14', '2025-01-05 05:48:43'),
(26, 20, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:40:14', '2025-01-05 05:48:43'),
(27, 21, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:40:14', '2025-01-05 05:48:43'),
(28, 6, NULL, NULL, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:40:38', '2025-01-05 05:48:43'),
(29, 1, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:40:38', '2025-01-05 05:48:43'),
(30, 20, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:40:38', '2025-01-05 05:48:43'),
(31, 21, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:40:38', '2025-01-05 05:48:43'),
(32, 6, NULL, NULL, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:41:22', '2025-01-05 05:48:43'),
(33, 1, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:41:22', '2025-01-05 05:48:43'),
(34, 20, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:41:22', '2025-01-05 05:48:43'),
(35, 21, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:41:22', '2025-01-05 05:48:43'),
(36, 6, NULL, NULL, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:41:41', '2025-01-05 05:48:43'),
(37, 1, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:41:41', '2025-01-05 05:48:43'),
(38, 20, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:41:41', '2025-01-05 05:48:43'),
(39, 21, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to Admin.', 'dan', '2025-01-05 05:48:43', '2025-01-05 04:41:42', '2025-01-05 05:48:43'),
(40, 6, NULL, NULL, NULL, 'Delmar\'s Account # 6 Has been Changed to User .', 'yo', '2025-01-05 05:48:43', '2025-01-05 04:43:21', '2025-01-05 05:48:43'),
(41, 1, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to User .', 'yo', '2025-01-05 05:48:43', '2025-01-05 04:43:21', '2025-01-05 05:48:43'),
(42, 20, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to User .', 'yo', '2025-01-05 05:48:43', '2025-01-05 04:43:21', '2025-01-05 05:48:43'),
(43, 21, NULL, 20, NULL, 'Delmar\'s Account # 6 Has been Changed to User .', 'yo', '2025-01-05 05:48:43', '2025-01-05 04:43:21', '2025-01-05 05:48:43'),
(44, 6, 12, NULL, NULL, 'Booking (#12) has been deleted as it was found to be in violation of our policies. If you believe this was a mistake, contact +63-951-582-2030 for assistance.', NULL, '2025-01-05 05:50:57', '2025-01-05 05:49:34', '2025-01-05 05:50:57'),
(45, 1, 1001, NULL, NULL, 'Carandang (#20) has created a new booking (#1001). Please review.', NULL, '2025-02-15 12:55:01', '2025-01-11 18:20:00', '2025-02-15 12:55:01'),
(46, 20, 1001, NULL, NULL, 'Carandang (#20) has created a new booking (#1001). Please review.', NULL, '2025-02-15 12:55:01', '2025-01-11 18:20:00', '2025-02-15 12:55:01'),
(47, 21, 1001, NULL, NULL, 'Carandang (#20) has created a new booking (#1001). Please review.', NULL, '2025-02-15 12:55:01', '2025-01-11 18:20:01', '2025-02-15 12:55:01'),
(48, 20, 1001, NULL, NULL, 'Booking (#1001) has been deleted as it violates our policies. If mistaken, contact +63-951-582-2030 for assistance.', NULL, '2025-02-15 12:55:01', '2025-01-12 00:24:24', '2025-02-15 12:55:01'),
(49, 1, 1002, NULL, NULL, 'Tster (#27) has created a new booking (#1002). Please review.', NULL, '2025-02-15 12:55:01', '2025-01-12 22:56:36', '2025-02-15 12:55:01'),
(50, 20, 1002, NULL, NULL, 'Tster (#27) has created a new booking (#1002). Please review.', NULL, '2025-02-15 12:55:01', '2025-01-12 22:56:36', '2025-02-15 12:55:01'),
(51, 21, 1002, NULL, NULL, 'Tster (#27) has created a new booking (#1002). Please review.', NULL, '2025-02-15 12:55:01', '2025-01-12 22:56:36', '2025-02-15 12:55:01'),
(52, 20, NULL, NULL, NULL, 'Carandang\'s Account # 20 Has been Changed to User .', 'Get Demoted Son!', '2025-02-15 12:55:01', '2025-01-14 14:33:53', '2025-02-15 12:55:01'),
(53, 1, NULL, 20, NULL, 'Carandang\'s Account # 20 Has been Changed to User .', 'Get Demoted Son!', '2025-02-15 12:55:01', '2025-01-14 14:33:53', '2025-02-15 12:55:01'),
(54, 20, NULL, 20, NULL, 'Carandang\'s Account # 20 Has been Changed to User .', 'Get Demoted Son!', '2025-02-15 12:55:01', '2025-01-14 14:33:53', '2025-02-15 12:55:01'),
(55, 21, NULL, 20, NULL, 'Carandang\'s Account # 20 Has been Changed to User .', 'Get Demoted Son!', '2025-02-15 12:55:01', '2025-01-14 14:33:53', '2025-02-15 12:55:01'),
(56, 1, 1003, NULL, NULL, 'Carandang (#20) has created a new booking (#1003). Please review.', NULL, '2025-02-15 12:55:01', '2025-01-14 18:13:48', '2025-02-15 12:55:01'),
(57, 21, 1003, NULL, NULL, 'Carandang (#20) has created a new booking (#1003). Please review.', NULL, '2025-02-15 12:55:01', '2025-01-14 18:13:48', '2025-02-15 12:55:01'),
(58, 1, 1004, NULL, NULL, 'Carandang (#20) has created a new booking (#1004). Please review.', NULL, '2025-02-15 12:55:01', '2025-01-14 22:53:50', '2025-02-15 12:55:01'),
(59, 21, 1004, NULL, NULL, 'Carandang (#20) has created a new booking (#1004). Please review.', NULL, '2025-02-15 12:55:01', '2025-01-14 22:53:50', '2025-02-15 12:55:01'),
(60, 16, 439, NULL, NULL, 'Booking (#439) has been deleted as it violates our policies. If mistaken, contact +63-951-582-2030 for assistance.', NULL, '2025-02-15 12:55:01', '2025-01-15 02:35:52', '2025-02-15 12:55:01'),
(61, 1, 1005, NULL, NULL, 'Carandang (#20) has created a new booking (#1005). Please review.', NULL, '2025-02-15 12:55:01', '2025-01-16 06:44:18', '2025-02-15 12:55:01'),
(62, 1, 1006, NULL, NULL, 'Carandang (#20) has created a new booking (#1006). Please review.', NULL, '2025-02-15 12:55:01', '2025-02-01 11:18:08', '2025-02-15 12:55:01'),
(63, 20, 1006, NULL, NULL, 'Carandang (#20) has created a new booking (#1006). Please review.', NULL, '2025-02-15 12:55:01', '2025-02-01 11:18:08', '2025-02-15 12:55:01'),
(64, 27, 1006, NULL, NULL, 'Carandang (#20) has created a new booking (#1006). Please review.', NULL, '2025-02-15 12:55:01', '2025-02-01 11:18:08', '2025-02-15 12:55:01'),
(65, 1, 1007, NULL, NULL, 'Carandang (#29) has created a new booking (#1007). Please review.', NULL, NULL, '2025-05-17 19:08:55', '2025-05-17 19:08:55'),
(66, 20, 1007, NULL, NULL, 'Carandang (#29) has created a new booking (#1007). Please review.', NULL, NULL, '2025-05-17 19:08:55', '2025-05-17 19:08:55'),
(67, 27, 1007, NULL, NULL, 'Carandang (#29) has created a new booking (#1007). Please review.', NULL, NULL, '2025-05-17 19:08:55', '2025-05-17 19:08:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifies`
--
ALTER TABLE `notifies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifies`
--
ALTER TABLE `notifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
