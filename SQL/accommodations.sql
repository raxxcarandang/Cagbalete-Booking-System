-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2025 at 12:22 AM
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
-- Table structure for table `accommodations`
--

CREATE TABLE `accommodations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(254) NOT NULL,
  `description` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `slider` varchar(254) NOT NULL,
  `type` varchar(254) NOT NULL,
  `lodge` varchar(254) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contactno` varchar(128) NOT NULL,
  `capacity` int(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `cla` varchar(254) DEFAULT NULL,
  `ornum` varchar(254) DEFAULT NULL,
  `dot` varchar(254) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accommodations`
--

INSERT INTO `accommodations` (`id`, `name`, `description`, `thumbnail`, `slider`, `type`, `lodge`, `address`, `contactno`, `capacity`, `fee`, `cla`, `ornum`, `dot`, `created_at`, `updated_at`) VALUES
(1, 'Aquazul Hotel and Resort', 'Discover Aquazul Hotel and Resort, a luxurious retreat on the Riviera Maya coastline. Renowned for its exceptional service, stunning accommodations, and world-class facilities, Aquazul offers a perfect blend of relaxation and adventure.', 'ahr.webp', '1h.webp', 'Beach & Pool Resort', 'AC Hotel Rooms', 'Brgy. CAGBALETE 1', '09237428368 / 09234782601', 192, 100, '0029-24', '5811539', 'YES', NULL, '2024-12-27 07:23:46'),
(2, 'Dona Choleng Camping Resort', 'Discover Dona Choleng Camping Resort on Cagbalete Island, Mauban, Philippines. This nature escape offers luxurious camping tents, pristine beaches, water activities, scenic hiking trails, relaxing spa services, and diverse dining options.', '2t.jpg', '2h.webp', 'Camping & Beach Resort', 'AC & Hut Cottages', 'Brgy. Cagbalete 1', '09108823346 / 09266549958', 534, 50, '0003-24', '5809032', 'YES', '0000-00-00 00:00:00', '2024-12-28 03:09:23'),
(3, 'Rio del Sol Beach Resort', 'Discover the unparalleled luxury and relaxation at Rio Del Sol Beach Resort, located on pristine sun-kissed shores. Enjoy spacious rooms with panoramic sea views, gourmet dining, and an array of recreational activities. With exceptional service and family', '3t.webp', '3h.webp', 'Beach Resort', 'AC Rooms', 'Brgy. Cagbalete 1', '09776932453', 72, 75, '0032-24', '5812710', 'YES', NULL, '2025-02-16 10:52:48'),
(4, 'Jovencio`s Resort', 'Discover Jovencio`s Resort, a luxurious retreat nestled in picturesque landscapes offering exceptional service and world-class amenities. Whether you`re seeking a romantic getaway, family vacation, or adventure, enjoy elegant accommodations, exquisite din', '4t.webp', '4h.webp', 'Beach Resort', 'Hut Cottages', 'Brgy. Cagbalete 1', '09564135204', 40, 50, '018-24', '5810822', 'YES', NULL, '2025-02-16 11:17:17'),
(5, 'MVT Sto. Niño Beach Resort', 'Discover MVT Sto. Niño Beach Resort, a luxurious retreat in Mauban City`s Cagbalete Island, Philippines. Known for its pristine beaches, eco-friendly practices, and exceptional hospitality, this resort offers a perfect blend of relaxation and adventure. E', '5t.jpg', '5h.jpg', 'Beach Resort', 'Hut Cottages', 'Brgy. Cagbalete 1', '09176787080', 12, 100, '0017-24', '9934386', 'NO', NULL, '2024-12-27 07:57:29'),
(6, 'Nilandingan Cove Resort', 'Discover Nilandingan Cove Resort, a luxurious and eco-friendly haven in Cagbalete Island, Philippines. Enjoy stunning beachfront accommodations, rejuvenating spa services, exquisite dining, and a variety of recreational activities. Perfect for family vaca', 'ncr.webp', '6h.jpg', 'Beach Cove Resort', 'Hut Cottages', 'Brgy. Cagbalete 1', '09151443094', 41, 150, '0017-24', '5810821', 'NO', NULL, '2024-12-27 08:02:24'),
(7, 'Villa Cleofas (Cagbalete Island Camping Resort)', 'Discover Villa Cleofas, a luxurious Mediterranean retreat epitomizing elegance and tranquility. Nestled amidst lush greenery with breathtaking sea views, this villa offers a perfect blend of historical charm and modern sophistication.', 'vccicr.webp', '7h.jpg', 'Beach & Camping Resort', 'Hut Cottages', 'Brgy. Cagbalete', '09178143475', 79, 125, '0019-24', '5809845', 'YES', NULL, '2024-12-27 07:34:50'),
(8, 'Villa Escaparde Camping and Beach Resort', 'Discover Villa Escaparde, a luxurious retreat in the Island of Cagbalete offering stunning facilities and world-class amenities. Just a short drive from Nice, this elegant villa features contemporary design, a private infinity pool, fitness center, and ex', 'vecbr.webp', '8h.jpg', 'Beach Resort & Hotel', 'AC Hotel Rooms', 'Bgry. Cagbalete 1', '09073700888', 55, 100, '0026-24', '5812103', 'NO', NULL, '2024-12-27 07:29:30'),
(9, 'Villa Noe Beach Resort', 'Discover Villa Noe Beach Resort, a premier destination on Cagbalete Island, known for its pristine beaches and lush landscapes. Enjoy luxurious accommodations, exceptional hospitality, and a variety of activities including snorkeling, kayaking, and island', 'vnbr.webp', '9h.jpg', 'Beach Resort', 'Hut Cottages', 'Brgy. Cagbalete I', '09065197126 / 09126914340', 110, 100, '0001-24', '5808797', 'NO', NULL, '2024-12-27 07:27:36'),
(10, 'Villa Pilarosa Beach Resort', 'Discover Villa Pilarosa Beach Resort on Cagbalete Island, a hidden gem offering luxurious accommodations, stunning beachfront views, and eco-friendly practices. Enjoy a range of activities from snorkeling to island-hopping, or relax with our spa services', '10t.jpg', '10h.jpg', 'Beach Resort', 'Hut Cottages', 'Brgy. Cagbalete 2', '09496608865 / 09959376995', 32, 100, '0021-24', '5810979', 'YES', NULL, '2024-10-24 05:55:50'),
(11, 'Tita Pinay Beach Resort', 'Discover the serene beauty of Tita Pinay Beach Resort on Cagbalete Island. Enjoy pristine white sand beaches, luxurious accommodations, and a variety of recreational activities.', 'tpbr.webp', '11h.jpg', 'Beach Resort', 'Hut Cottages', 'Cagbalete 1', '09108070864', 206, 50, '0014-24', '5809788', 'NO', NULL, '2024-10-24 06:02:23'),
(12, 'Aguho Playa Beach Resort', 'Discover Aguho Playa Beach Resort on Cagbalete Island, a luxury retreat that offers stunning beachfront views, eco-friendly practices, and a range of activities for families and adventure seekers. Enjoy gourmet dining, relaxing spa treatments, and luxurio', 'apbr.webp', '12h.jpg', 'Beach Resort', 'Hut Cottages', 'Brgy. Cagbalete 1', '09670061937', 10, 100, '0035-24', '5813292', 'YES', NULL, '2024-12-27 07:07:57'),
(13, 'Tent Place', 'Discover the serene beauty of Cagbalete Island`s Tent Place in the Philippines. This hidden gem offers pristine beaches, lush forests, and diverse wildlife. Enjoy unique tidal landscapes, tent accommodations ranging from basic to luxurious, and a variety ', 'tp.webp', '13h.jpg', 'Beach & Camping Resort', 'Hut Cottages', 'Brgy. Cagbalete 1', '09988845443 / 091009563', 112, 50, '0037-24', '5815273', 'NO', NULL, '2024-10-22 07:23:09'),
(14, 'Orlan Beach Resort', 'Discover Orlan Beach Resort on Cagbalete Island, a haven of tranquility and eco-friendly luxury. Enjoy pristine beaches, luxurious accommodations, and a commitment to sustainability. Perfect for families, couples, and solo travelers seeking a serene and r', 'obr.webp', '14h.jpg', 'Beach & Camping Resort', 'Hut Cottages', 'Cagbalete 1', '09707100945', 55, 50, '0038-24', '5814982', 'NO', NULL, '2024-10-22 07:19:22'),
(15, 'Other', 'The best way to discover these hidden gems is by connecting with locals. They are often eager to share insider tips about the best unregistered resorts. Social media groups, travel forums, and recent visitors` reviews can provide valuable insights.', 'other.webp', '', '', '', 'Cagbalete Island, Mauban', 'N/A', 0, 50, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodations`
--
ALTER TABLE `accommodations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
