-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2025 at 12:24 AM
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
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) NOT NULL,
  `bookid` bigint(20) DEFAULT NULL,
  `updatemsg` varchar(512) NOT NULL,
  `remark` varchar(512) NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `userid`, `bookid`, `updatemsg`, `remark`, `read_at`, `created_at`, `updated_at`) VALUES
(12, 1, 27, 'Booking # 27 Is Now Pending.', 'Rescheduled due to the ugly storm.', '2024-12-22 10:11:14', '2024-12-22 07:02:36', '2024-12-22 10:11:14'),
(13, 3, 94, 'Booking # 94 Has New Remark.', 'Big Smoke! Remember That.', '2024-12-22 10:11:14', '2024-12-22 08:08:36', '2024-12-22 10:11:14'),
(14, 1, 24, 'Anderson\'s Booking # 24 Is Now Pending.', '2nd Chance Boi', '2024-12-22 10:11:14', '2024-12-22 08:15:59', '2024-12-22 10:11:14'),
(15, 1, 28, 'Anderson\'s Booking # 28 Has New Remark.', 'We have ARRRRIVED!', '2024-12-22 10:11:14', '2024-12-22 08:52:53', '2024-12-22 10:11:14'),
(16, 1, 27, 'Anderson\'s Booking # 27 Has New Remark.', 'Rescheduled due to your ugliness.', '2024-12-22 10:11:14', '2024-12-22 09:28:11', '2024-12-22 10:11:14'),
(17, 1, 27, 'Anderson\'s Booking # 27 Is Now Pending.', 'Rescheduled due to your ugliness.', '2024-12-22 10:11:45', '2024-12-22 10:11:30', '2024-12-22 10:11:45'),
(18, 1, 27, 'Anderson\'s Booking # 27 Is Now Pending.', 'Rescheduled due to your ugliness.', '2024-12-22 10:11:45', '2024-12-22 10:11:31', '2024-12-22 10:11:45'),
(19, 1, 24, 'Anderson\'s Booking # 24 Is Now Pending.', '2nd Chance Boi', '2024-12-22 10:24:40', '2024-12-22 10:12:55', '2024-12-22 10:24:40'),
(21, 3, 94, 'Booking # 94Rescheduled by Nigma(#3) from 2024-12-27-2024-12-31 to 2024-12-27-2024-12-31', 'Big Smoke! Remember That.', '2024-12-26 06:21:30', '2024-12-23 03:07:01', '2024-12-26 06:21:30'),
(22, 3, 94, 'Booking # 94 Confirmed by Nigma(#3)', 'Big Smoke! Remember That.', '2024-12-26 06:21:30', '2024-12-23 03:32:05', '2024-12-26 06:21:30'),
(23, 3, 94, 'Booking # 94 Confirmed by Nigma(#3)', 'Big Smoke! Remember That.', '2024-12-26 06:21:30', '2024-12-23 03:32:08', '2024-12-26 06:21:30'),
(24, 7, 96, 'Booking # 96 Rescheduled by Admin(#7) from (2024-12-27_2024-12-31) to (2024-12-27_2024-12-31)', 'N/A', '2024-12-26 06:21:30', '2024-12-26 06:10:27', '2024-12-26 06:21:30'),
(25, 7, 96, 'Booking # 96 Rescheduled by Admin(#7) from (2024-12-27_2024-12-31) to (2024-12-27_2024-12-31)', 'N/A', '2024-12-26 06:21:30', '2024-12-26 06:10:28', '2024-12-26 06:21:30'),
(26, 7, 96, 'Booking # 96 Rescheduled by Admin(#7) from (2024-12-28_2024-12-28) to (2024-12-28_2024-12-28)', 'N/A', '2024-12-26 06:45:15', '2024-12-26 06:28:48', '2024-12-26 06:45:15'),
(27, 7, 96, 'Booking # 96 Rescheduled by Admin(#7) from (2024-12-28_2024-12-28) to (2024-12-28_2024-12-28)', 'N/A', '2024-12-26 06:45:15', '2024-12-26 06:28:49', '2024-12-26 06:45:15'),
(28, 7, 96, 'Booking # 96 Rescheduled by Admin(#7) from (2025-01-01_2025-01-01) to (2025-01-01_2025-01-01)', 'N/A', '2024-12-26 06:45:15', '2024-12-26 06:29:56', '2024-12-26 06:45:15'),
(29, 7, 96, 'Booking # 96 Rescheduled by Admin(#7) from (2025-01-01_2025-01-01) to (2025-01-01_2025-01-01)', 'N/A', '2024-12-26 06:45:15', '2024-12-26 06:29:57', '2024-12-26 06:45:15'),
(30, 7, 96, 'Booking # 96 Rescheduled by Admin(#7) from (2024-12-27_2024-12-31) to (2024-12-27_2024-12-31)', 'N/A', '2024-12-26 06:45:15', '2024-12-26 06:32:16', '2024-12-26 06:45:15'),
(31, 7, 96, 'Booking # 96 Rescheduled by Admin(#7) from (2024-12-27_2024-12-31) to (2024-12-27_2024-12-31)', 'N/A', '2024-12-26 06:45:15', '2024-12-26 06:32:17', '2024-12-26 06:45:15'),
(32, 7, 96, 'Booking # 96 Rescheduled by Admin(#7) from (2024-12-28_2024-12-31) to (2024-12-28_2024-12-31)', 'N/A', '2024-12-26 06:45:15', '2024-12-26 06:42:00', '2024-12-26 06:45:15'),
(33, 7, 96, 'Booking # 96 Rescheduled by Admin(#7) from (2024-12-28_2024-12-31) to (2024-12-28_2024-12-31)', 'N/A', '2024-12-26 06:45:15', '2024-12-26 06:42:00', '2024-12-26 06:45:15'),
(34, 1, 24, 'Anderson\'s Booking # 24 Is Now Completed.', '2nd Chance Boi', '2024-12-26 08:48:06', '2024-12-26 08:45:50', '2024-12-26 08:48:06'),
(35, 2, 74, 'Morenz\'s Booking # 74 Is Now Completed.', 'Gimme Ya Best Shot!', '2024-12-26 08:55:04', '2024-12-26 08:51:56', '2024-12-26 08:55:04'),
(36, 1, 33, 'Anderson\'s Booking # 33 Is Now Pending.', 'Scheduled due to storms', '2024-12-26 08:55:04', '2024-12-26 08:53:51', '2024-12-26 08:55:04'),
(37, 1, 27, 'Anderson\'s Booking # 27 Is Now Pending.', 'Rescheduled due to your ugliness.', '2025-01-05 05:47:38', '2024-12-26 08:55:00', '2025-01-05 05:47:39'),
(38, 1, 27, 'Anderson\'s Booking # 27 Has Arrived.', 'Rescheduled due to your ugliness.', '2024-12-26 09:11:49', '2024-12-26 09:07:11', '2024-12-26 09:11:49'),
(39, 1, 19, 'A new remark has been added to Anderson\'s Booking # 19. Review the updated remark for further action.', 'BACK TO PENDING! BITCH!', '2024-12-26 10:53:41', '2024-12-26 10:07:32', '2024-12-26 10:53:41'),
(40, 1, 19, 'Anderson\'s Booking # 19 has been cancelled. We are sorry for the inconvenience. Please reach out if you need help or clarification.', 'dfsfsd', '2024-12-26 10:53:41', '2024-12-26 10:18:54', '2024-12-26 10:53:41'),
(41, 1, 13, 'Anderson\'s Booking # 13 Has Been Marked as Arrived.', '', '2024-12-29 17:09:07', '2024-12-28 23:00:55', '2024-12-29 17:09:07'),
(42, 1, 14, 'Anderson\'s Booking # 14 has been cancelled. We are sorry for the inconvenience. Please reach out if you need help or clarification.', 'Stupid Shit!', '2024-12-29 17:09:07', '2024-12-28 23:07:23', '2024-12-29 17:09:07'),
(43, 1, 15, 'Anderson\'s Booking # 15 Has Been Marked as Arrived.', '', '2024-12-29 17:09:07', '2024-12-29 00:06:44', '2024-12-29 17:09:07'),
(44, 1, 18, 'Anderson\'s Booking # 18 Has Been Marked as Arrived.', '', '2024-12-29 17:09:07', '2024-12-29 00:23:55', '2024-12-29 17:09:07'),
(45, 1, 13, 'Anderson\'s Booking # 13 Has Been Re-pended.', '', '2024-12-30 02:49:19', '2024-12-29 17:09:12', '2024-12-30 02:49:19'),
(46, 1, 15, 'Anderson\'s Booking # 15 Has Been Re-pended.', '', '2024-12-30 02:49:19', '2024-12-29 17:09:32', '2024-12-30 02:49:19'),
(47, 1, 18, 'Anderson\'s Booking # 18 Has Been Re-pended.', '', '2024-12-30 02:49:19', '2024-12-29 17:11:37', '2024-12-30 02:49:19'),
(48, 1, 13, 'A new remark has been added to Anderson\'s Booking # 13. Review the updated remark for further action.', 'Remove Color!', '2024-12-30 02:49:19', '2024-12-29 17:12:15', '2024-12-30 02:49:19'),
(49, 1, 15, 'A new remark has been added to Anderson\'s Booking # 15. Review the updated remark for further action.', 'No Color!', '2024-12-30 02:49:19', '2024-12-29 17:12:55', '2024-12-30 02:49:19'),
(50, 1, 13, 'A new remark has been added to Anderson\'s Booking # 13. Review the updated remark for further action.', 'Remove Color', '2024-12-30 02:49:19', '2024-12-29 17:13:05', '2024-12-30 02:49:19'),
(51, 1, 13, 'Anderson\'s Booking # 13 Has Been Marked as Arrived.', 'Remove Color', '2024-12-30 02:49:19', '2024-12-29 17:34:14', '2024-12-30 02:49:19'),
(52, 1, 14, 'Anderson\'s Booking # 14 Has Been Marked as Arrived.', 'N/A', '2024-12-30 02:49:19', '2024-12-30 01:20:13', '2024-12-30 02:49:19'),
(53, 1, 15, 'Anderson\'s Booking # 15 Has Been Marked as Arrived.', 'N/A', '2024-12-30 02:49:19', '2024-12-30 01:34:19', '2024-12-30 02:49:19'),
(54, 1, 13, 'Anderson\'s Booking # 13 Has Been Marked as Arrived.', 'N/A', '2024-12-30 02:49:19', '2024-12-30 01:34:24', '2024-12-30 02:49:19'),
(55, 1, 14, 'Anderson\'s Booking # 14 Has Been Marked as Arrived.', 'N/A', '2024-12-30 02:49:19', '2024-12-30 01:34:28', '2024-12-30 02:49:19'),
(56, 1, 19, 'Anderson\'s Booking # 19 Has Been Marked as Arrived.', 'N/A', '2024-12-30 03:02:05', '2024-12-30 02:54:50', '2024-12-30 03:02:05'),
(57, 1, 19, 'Anderson\'s Booking # 19 Has Been Marked as Arrived.', 'N/A', '2024-12-30 03:02:05', '2024-12-30 02:54:51', '2024-12-30 03:02:05'),
(58, 9, 99, 'Booking # 99 Rescheduled by Lack(#9) from (2025-01-02_2025-01-03) to (2025-01-02_2025-01-03)', 'N/A', '2024-12-31 05:33:59', '2024-12-31 05:30:58', '2024-12-31 05:34:00'),
(59, 9, 99, 'Booking # 99 Rescheduled by Lack(#9) from (2025-01-02_2025-01-03) to (2025-01-02_2025-01-03)', 'N/A', '2024-12-31 05:33:59', '2024-12-31 05:30:59', '2024-12-31 05:34:00'),
(63, 9, 101, 'Lack\'s Booking # 101 Has Been Re-pended.', 'N/A', '2025-01-03 13:56:19', '2025-01-01 13:34:08', '2025-01-03 13:56:19'),
(66, 9, 101, 'Lack\'s Booking # 101 has been cancelled. We are sorry for the inconvenience. Please reach out if you need help or clarification.', 'Fuck You!', '2025-01-03 13:56:19', '2025-01-01 13:34:34', '2025-01-03 13:56:19'),
(67, 1, 18, 'Anderson\'s Booking # 18 Has Been Marked as Arrived.', 'N/A', '2025-01-03 13:56:19', '2025-01-01 16:58:57', '2025-01-03 13:56:19'),
(68, 1, 18, 'Anderson\'s Booking # 18 Has Been Re-pended.', 'N/A', '2025-01-03 13:56:19', '2025-01-01 16:59:05', '2025-01-03 13:56:19'),
(69, 1, 28, 'Anderson\'s Booking # 28 Has Been Marked as Arrived.', 'We have ARRRRIVED!', '2025-01-03 13:56:19', '2025-01-03 04:49:12', '2025-01-03 13:56:19'),
(70, 1, 28, 'Anderson\'s Booking # 28 Has Been Re-pended.', 'We have ARRRRIVED!', '2025-01-03 13:56:19', '2025-01-03 04:55:02', '2025-01-03 13:56:19'),
(71, 1, 28, 'Anderson\'s Booking # 28 Has Been Marked as Arrived.', 'We have ARRRRIVED!', '2025-01-03 13:56:19', '2025-01-03 05:09:12', '2025-01-03 13:56:19'),
(72, 1, 28, 'Anderson\'s Booking # 28 Has Been Marked as Arrived.', 'We have ARRRRIVED!', '2025-01-03 13:56:19', '2025-01-03 05:09:14', '2025-01-03 13:56:19'),
(73, 1, 28, 'Anderson\'s Booking # 28 Has Been Re-pended.', 'We have ARRRRIVED!', '2025-01-03 13:56:19', '2025-01-03 05:09:25', '2025-01-03 13:56:19'),
(74, 1, 28, 'Anderson\'s Booking # 28 Has Been Re-pended.', 'We have ARRRRIVED!', '2025-01-03 13:56:19', '2025-01-03 05:09:25', '2025-01-03 13:56:19'),
(75, 9, 99, 'Lack\'s Booking # 99 Has Been Re-pended.', 'N/A', '2025-01-03 13:56:19', '2025-01-03 06:02:02', '2025-01-03 13:56:19'),
(76, 1, 33, 'Anderson\'s Booking # 33 Has Been Re-pended.', 'Bla', '2025-01-03 13:56:19', '2025-01-03 07:12:12', '2025-01-03 13:56:19'),
(77, 1, 33, 'Anderson\'s Booking # 33 has been cancelled. We are sorry for the inconvenience. Please reach out if you need help or clarification.', 'fdsfsd', '2025-01-03 13:56:19', '2025-01-03 07:26:04', '2025-01-03 13:56:19'),
(78, 1, 33, 'Anderson\'s Booking # 33 Has Been Re-pended.', 'fdsfsd', '2025-01-03 13:56:19', '2025-01-03 07:33:11', '2025-01-03 13:56:19'),
(79, 9, 99, 'Lack\'s Booking # 99 has been cancelled. We are sorry for the inconvenience. Please reach out if you need help or clarification.', 'fuck you jack', '2025-01-03 13:56:19', '2025-01-03 07:57:51', '2025-01-03 13:56:19'),
(80, 9, 99, 'Lack\'s Booking # 99 Has Been Re-pended.', 'fuck you jack', '2025-01-03 13:56:19', '2025-01-03 08:01:45', '2025-01-03 13:56:19'),
(81, 9, 99, 'Lack\'s Booking # 99 has been cancelled. We are sorry for the inconvenience. Please reach out if you need help or clarification.', 'fuck off jackk!', '2025-01-03 13:56:19', '2025-01-03 08:03:23', '2025-01-03 13:56:19'),
(82, 9, 99, 'Lack\'s Booking # 99 Has Been Re-pended.', 'fuck off jackk!', '2025-01-03 13:56:19', '2025-01-03 08:41:55', '2025-01-03 13:56:19'),
(83, 31, 3, 'Kunde\'s Booking # 3 has been cancelled. We are sorry for the inconvenience. Please reach out if you need help or clarification.', 'dasdsa', '2025-01-03 15:23:10', '2025-01-03 14:47:04', '2025-01-03 15:23:10'),
(84, 75, 5, 'Funk\'s Booking # 5 has been cancelled. We are sorry for the inconvenience. Please reach out if you need help or clarification.', 'dsadsa', '2025-01-03 15:23:10', '2025-01-03 15:19:12', '2025-01-03 15:23:10'),
(85, 31, 3, 'Kunde\'s Booking # 3 Has Been Marked as Arrived.', 'dasdsa', '2025-01-03 15:23:10', '2025-01-03 15:19:28', '2025-01-03 15:23:10'),
(86, 31, 3, 'Kunde\'s Booking # 3 Has Been Marked as Arrived.', 'dasdsa', '2025-01-03 15:23:10', '2025-01-03 15:19:29', '2025-01-03 15:23:10'),
(87, 31, 3, 'Kunde\'s Booking # 3 Has Been Re-pended.', 'dasdsa', '2025-01-03 16:10:30', '2025-01-03 16:10:25', '2025-01-03 16:10:30'),
(88, 89, 8, 'Goodwin\'s Booking # 8 Has Been Re-pended.', 'Ut voluptatem modi iste est totam.', '2025-01-03 16:12:17', '2025-01-03 16:12:13', '2025-01-03 16:12:18'),
(89, 75, 5, 'Funk\'s Booking # 5 Has Been Re-pended.', 'dsadsa', '2025-01-03 17:27:41', '2025-01-03 17:22:30', '2025-01-03 17:27:41'),
(90, 46, 1, 'Torp\'s Booking # 1 Has Been Marked as Arrived.', 'Perspiciatis earum eum voluptate accusamus et.', '2025-01-03 20:59:56', '2025-01-03 20:41:29', '2025-01-03 20:59:56'),
(91, 104, 2, 'Walter\'s Booking # 2 Has Been Marked as Arrived.', 'Deleniti aut dolorem ut hic ullam.', '2025-01-03 20:59:56', '2025-01-03 20:41:48', '2025-01-03 20:59:56'),
(92, 104, 2, 'Walter\'s Booking # 2 Has Been Re-pended.', 'Deleniti aut dolorem ut hic ullam.', '2025-01-03 20:59:56', '2025-01-03 20:47:59', '2025-01-03 20:59:56'),
(93, 104, 2, 'Walter\'s Booking # 2 Has Been Marked as Arrived.', 'Deleniti aut dolorem ut hic ullam.', '2025-01-03 20:59:56', '2025-01-03 20:48:43', '2025-01-03 20:59:56'),
(94, 104, 2, 'Walter\'s Booking # 2 Has Been Re-pended.', 'Deleniti aut dolorem ut hic ullam.', '2025-01-03 20:59:56', '2025-01-03 20:50:42', '2025-01-03 20:59:56'),
(95, 104, 2, 'Walter\'s Booking # 2 Has Been Marked as Arrived.', 'Deleniti aut dolorem ut hic ullam.', '2025-01-03 20:59:56', '2025-01-03 20:52:34', '2025-01-03 20:59:56'),
(96, 46, 1, 'Torp\'s Booking # 1 Has Been Re-pended.', 'Perspiciatis earum eum voluptate accusamus et.', '2025-01-03 20:59:56', '2025-01-03 20:54:14', '2025-01-03 20:59:56'),
(97, 73, 10, 'Schiller\'s Booking # 10 Has Been Re-pended.', 'Et minima earum ea nobis qui aut.', '2025-01-03 20:59:56', '2025-01-03 20:59:47', '2025-01-03 20:59:56'),
(98, 46, 1, 'Torp\'s Booking # 1 Has Been Marked as Arrived.', 'Perspiciatis earum eum voluptate accusamus et.', '2025-01-04 00:30:30', '2025-01-03 21:09:09', '2025-01-04 00:30:31'),
(99, 46, 1, 'Torp\'s Booking # 1 Has Been Marked as Arrived.', 'Perspiciatis earum eum voluptate accusamus et.', '2025-01-04 00:30:30', '2025-01-03 21:09:11', '2025-01-04 00:30:31'),
(100, 46, 1, 'Torp\'s Booking # 1 Has Been Marked as Arrived.', 'Perspiciatis earum eum voluptate accusamus et.', '2025-01-04 00:30:30', '2025-01-03 21:09:13', '2025-01-04 00:30:31'),
(101, 46, 1, 'Torp\'s Booking # 1 Has Been Marked as Arrived.', 'Perspiciatis earum eum voluptate accusamus et.', '2025-01-04 00:30:30', '2025-01-03 21:09:14', '2025-01-04 00:30:31'),
(102, 46, 1, 'Torp\'s Booking # 1 Has Been Marked as Arrived.', 'Perspiciatis earum eum voluptate accusamus et.', '2025-01-04 00:30:30', '2025-01-03 21:09:16', '2025-01-04 00:30:31'),
(103, 46, 1, 'Torp\'s Booking # 1 Has Been Marked as Arrived.', 'Perspiciatis earum eum voluptate accusamus et.', '2025-01-04 00:30:30', '2025-01-03 21:09:17', '2025-01-04 00:30:31'),
(104, 46, 1, 'Torp\'s Booking # 1 Has Been Marked as Arrived.', 'Perspiciatis earum eum voluptate accusamus et.', '2025-01-04 00:30:30', '2025-01-03 21:09:17', '2025-01-04 00:30:31'),
(105, 46, 1, 'Torp\'s Booking # 1 Has Been Re-pended.', 'Perspiciatis earum eum voluptate accusamus et.', '2025-01-04 00:30:30', '2025-01-03 21:11:31', '2025-01-04 00:30:31'),
(106, 46, 1, 'Torp\'s Booking # 1 Has Been Marked as Arrived.', 'Perspiciatis earum eum voluptate accusamus et.', '2025-01-04 00:30:30', '2025-01-03 21:13:01', '2025-01-04 00:30:31'),
(107, 75, 5, 'Funk\'s Booking # 5 Has Been Marked as Arrived.', 'dsadsa', '2025-01-04 00:30:30', '2025-01-03 21:13:19', '2025-01-04 00:30:31'),
(108, 46, 1, 'Torp\'s Booking # 1 Has Been Re-pended.', 'Perspiciatis earum eum voluptate accusamus et.', '2025-01-04 00:30:30', '2025-01-03 21:21:00', '2025-01-04 00:30:31'),
(109, 75, 5, 'Funk\'s Booking # 5 Has Been Re-pended.', 'dsadsa', '2025-01-04 00:30:30', '2025-01-03 21:21:04', '2025-01-04 00:30:31'),
(110, 104, 2, 'Walter\'s Booking # 2 Has Been Re-pended.', 'Deleniti aut dolorem ut hic ullam.', '2025-01-04 00:30:30', '2025-01-03 21:21:07', '2025-01-04 00:30:31'),
(111, 46, 1, 'Torp\'s Booking # 1 Has Been Marked as Arrived.', 'Perspiciatis earum eum voluptate accusamus et.', '2025-01-04 00:30:30', '2025-01-03 21:33:44', '2025-01-04 00:30:31'),
(112, 104, 2, 'Walter\'s Booking # 2 Has Been Marked as Arrived.', 'Deleniti aut dolorem ut hic ullam.', '2025-01-04 00:30:30', '2025-01-03 21:33:48', '2025-01-04 00:30:31'),
(113, 75, 5, 'Funk\'s Booking # 5 Has Been Marked as Arrived.', 'dsadsa', '2025-01-04 00:30:30', '2025-01-03 21:33:51', '2025-01-04 00:30:31'),
(114, 1, 1, 'sangcap\'s Booking # 1 Has Been Re-pended.', 'Quod consequuntur alias eum unde non sunt.', '2025-01-05 05:47:38', '2025-01-04 14:05:48', '2025-01-05 05:47:39'),
(115, 22, 4, 'Sta Rosa\'s Booking # 4 Has Been Re-pended.', 'Expedita laboriosam placeat cupiditate odit.', '2025-01-05 05:47:38', '2025-01-04 14:07:13', '2025-01-05 05:47:39'),
(116, 7, 6, 'Stephenson\'s Booking # 6 Has Been Re-pended.', 'Aut suscipit aut voluptatem quo odio.', '2025-01-05 05:47:38', '2025-01-04 14:11:04', '2025-01-05 05:47:39'),
(117, 6, NULL, 'Delmar\'s Account # 6 Has been set to Suspended.', 'N/A', '2025-01-05 05:47:38', '2025-01-05 04:27:07', '2025-01-05 05:47:39'),
(118, 6, NULL, 'Delmar\'s Account # 6 Has been set to Active.', 'N/A', '2025-01-05 05:47:38', '2025-01-05 04:27:13', '2025-01-05 05:47:39'),
(119, 6, NULL, 'User (#6) has been deleted as it was found to be in violation of our policies. If you believe this was a mistake, contact +63-951-582-2030 for assistance.', 'You suck!', '2025-01-05 05:47:38', '2025-01-05 05:05:58', '2025-01-05 05:47:39'),
(120, 11, 7, 'anoni\'s Booking # 7 Has Been Re-pended.', 'Velit et tempora quis ut repellat consequatur eaque.', '2025-01-05 05:47:38', '2025-01-05 05:21:36', '2025-01-05 05:47:39'),
(121, 22, 8, 'Sta Rosa\'s Booking # 8 Has Been Re-pended.', 'Nostrum in magni sint ut.', '2025-01-05 05:47:38', '2025-01-05 05:36:50', '2025-01-05 05:47:39'),
(122, 7, NULL, 'Stephenson\'s Account # 7 Has been set to Verified.', 'N/A', '2025-01-05 09:32:17', '2025-01-05 07:16:30', '2025-01-05 09:32:17'),
(123, 7, NULL, 'Stephenson\'s Account # 7 Has been set to Verified.', 'N/A', '2025-01-05 09:32:17', '2025-01-05 07:19:31', '2025-01-05 09:32:17'),
(124, 7, NULL, 'Stephenson\'s Account # 7 Has been updated.', 'N/A', '2025-01-05 09:32:17', '2025-01-05 09:12:05', '2025-01-05 09:32:17'),
(125, 14, 10, 'A new remark has been added to co\'s Booking # 10. Review the updated remark for further action.', 'Update Works! Along with Remarks!', '2025-01-05 09:54:55', '2025-01-05 09:38:45', '2025-01-05 09:54:55'),
(126, 11, 13, 'A new remark has been added to anoni\'s Booking # 13. Review the updated remark for further action.', 'rem', '2025-01-05 09:54:55', '2025-01-05 09:44:08', '2025-01-05 09:54:55'),
(127, 14, 43, 'A new remark has been added to co\'s Booking # 43. Review the updated remark for further action.', 'wtf', '2025-01-05 09:54:55', '2025-01-05 09:49:42', '2025-01-05 09:54:55'),
(128, 23, 769, 'sangcap\'s Booking # 769 Has Been Re-pended.', 'Sit cum ea numquam exercitationem.', '2025-01-06 15:23:07', '2025-01-06 15:11:37', '2025-01-06 15:23:07'),
(129, 26, 2, 'Sta Rosa\'s Booking # 2 Has Been Marked as Arrived.', 'Aut placeat voluptas debitis sit saepe nam inventore.', '2025-01-07 06:41:20', '2025-01-06 18:41:32', '2025-01-07 06:41:20'),
(130, 26, 2, 'Sta Rosa\'s Booking # 2 Has Been Re-pended.', 'Aut placeat voluptas debitis sit saepe nam inventore.', '2025-01-07 06:41:20', '2025-01-06 18:41:50', '2025-01-07 06:41:20'),
(131, 24, 774, 'sangcap\'s Booking # 774 Has Been Re-pended.', 'Est quo voluptatum in dolores.', NULL, '2025-01-07 12:05:29', '2025-01-07 12:05:29'),
(132, 15, 8, 'Fina\'s Booking # 8 Has Been Re-pended.', 'Et quisquam at et nisi consectetur porro voluptates.', NULL, '2025-01-14 05:29:06', '2025-01-14 05:29:06'),
(133, 26, 2, 'Sta Rosa\'s Booking # 2 Has Been Marked as Arrived.', 'Aut placeat voluptas debitis sit saepe nam inventore.', NULL, '2025-01-14 06:17:54', '2025-01-14 06:17:54'),
(134, 20, 1004, 'Booking # 1004 Rescheduled by Carandang(#20) from (2025-01-18_2025-01-22) to (2025-01-18_2025-01-22)', 'N/A', NULL, '2025-01-14 23:02:05', '2025-01-14 23:02:05'),
(135, 20, 1004, 'Booking # 1004 Rescheduled by Carandang(#20) from (2025-01-18_2025-01-22) to (2025-01-18_2025-01-22)', 'N/A', NULL, '2025-01-14 23:02:06', '2025-01-14 23:02:06'),
(136, 15, 776, 'Fina\'s Booking # 776 has been cancelled. We are sorry for the inconvenience. Please reach out if you need help or clarification.', 'dsada', NULL, '2025-01-15 02:31:12', '2025-01-15 02:31:12'),
(137, 14, 11, 'co\'s Booking # 11 has been cancelled. We are sorry for the inconvenience. Please reach out if you need help or clarification.', 'dsad', NULL, '2025-01-15 02:32:23', '2025-01-15 02:32:23'),
(138, 16, 13, 'A new remark has been added to mamisa\'s Booking # 13. Review the updated remark for further action.', 'Voluptatem et ut molestiae minima dsadsa', NULL, '2025-01-15 02:34:30', '2025-01-15 02:34:30'),
(139, 26, 2, 'Sta Rosa\'s Booking # 2 Has Been Re-pended.', 'Aut placeat voluptas debitis sit saepe nam inventore.', NULL, '2025-01-15 02:44:59', '2025-01-15 02:44:59'),
(140, 26, 530, 'A new remark has been added to Sta Rosa\'s Booking # 530. Review the updated remark for further action.', 'Sit aut ea nemo et qui voluptas sint. dsa', NULL, '2025-01-15 07:36:04', '2025-01-15 07:36:04'),
(141, 13, 786, 'Anduman\'s Booking # 786 Has Been Re-pended.', 'Autem minima consectetur excepturi eos doloremque.', NULL, '2025-01-16 09:48:20', '2025-01-16 09:48:20'),
(142, 13, 786, 'Anduman\'s Booking # 786 has been cancelled. We are sorry for the inconvenience. Please reach out if you need help or clarification.', 'Stupid Choice!', NULL, '2025-01-16 09:48:37', '2025-01-16 09:48:37'),
(143, 9, 787, 'A new remark has been added to El Mesa\'s Booking # 787. Review the updated remark for further action.', 'STUPID COLOR! STOOOPEEID!', NULL, '2025-01-16 10:12:18', '2025-01-16 10:12:18'),
(144, 20, 1005, 'Carandang\'s Booking # 1005 status has been updated to an unknown state.', 'N/A', NULL, '2025-02-01 06:43:37', '2025-02-01 06:43:37'),
(145, 20, 1005, 'Carandang\'s Booking # 1005 has been cancelled. We are sorry for the inconvenience. Please reach out if you need help or clarification.', 'Stupid Booking\r\nyes', NULL, '2025-02-01 06:43:55', '2025-02-01 06:43:55'),
(146, 20, 1006, 'Carandang\'s Booking # 1006 has been cancelled. We are sorry for the inconvenience. Please reach out if you need help or clarification.', 'dsa', NULL, '2025-02-01 12:02:23', '2025-02-01 12:02:23'),
(147, 9, NULL, 'El Mesa\'s Account # 9 Has been set to Suspended.', 'N/A', NULL, '2025-02-02 09:52:38', '2025-02-02 09:52:38'),
(148, 1, NULL, 'sangcap\'s Account # 1 Has been set to Verified.', 'N/A', NULL, '2025-02-02 09:53:01', '2025-02-02 09:53:01'),
(149, 9, NULL, 'El Mesa\'s Account # 9 Has been set to Verified.', 'N/A', NULL, '2025-02-02 09:53:03', '2025-02-02 09:53:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
