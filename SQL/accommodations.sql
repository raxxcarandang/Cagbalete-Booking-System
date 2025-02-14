-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2024 at 09:25 PM
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
  `address` varchar(255) NOT NULL,
  `contactno` varchar(23) NOT NULL,
  `capacity` int(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accommodations`
--

INSERT INTO `accommodations` (`id`, `name`, `description`, `thumbnail`, `address`, `contactno`, `capacity`, `fee`, `created_at`, `updated_at`) VALUES
(1, 'Aquazul Hotel and Resort', 'Discover Aquazul Hotel and Resort, a luxurious retreat on the Riviera Maya coastline. Renowned for its exceptional service, stunning accommodations, and world-class facilities, Aquazul offers a perfect blend of relaxation and adventure. Enjoy gourmet dini', 'ahr.webp', '7R6C+F2P, Mauban, Quezon', '09237428368/09234782601', 0, 100, NULL, NULL),
(2, 'Dona Choleng Camping Resort', 'Discover Dona Choleng Camping Resort on Cagbalete Island, Mauban, Philippines. This nature escape offers luxurious camping tents, pristine beaches, water activities, scenic hiking trails, relaxing spa services, diverse dining options, and a commitment to ', 'dccr.webp', '7R3G+C4W Cagbalete Island, Mauban, 4330 Quezon', '09108823346/09266549958', 0, 50, '0000-00-00 00:00:00', NULL),
(3, 'Rio del Sol Beach Resort', 'Discover the unparalleled luxury and relaxation at Rio Del Sol Beach Resort, located on pristine sun-kissed shores. Enjoy spacious rooms with panoramic sea views, gourmet dining, and an array of recreational activities. With exceptional service and family', 'rsbr.webp', 'Cagbalete 1, Mauban, 4330 Quezon', '09776932453', 0, 75, NULL, NULL),
(4, 'Jovencio`s Resort', 'Discover Jovencio`s Resort, a luxurious retreat nestled in picturesque landscapes offering exceptional service and world-class amenities. Whether you`re seeking a romantic getaway, family vacation, or adventure, enjoy elegant accommodations, exquisite din', 'jr.webp', '7R5H+9X8, Mauban, Quezon', '09564135204', 0, 50, NULL, NULL),
(5, 'MVT Sto. Niño Beach Resort', 'Discover MVT Sto. Niño Beach Resort, a luxurious retreat in Mauban City`s Cagbalete Island, Philippines. Known for its pristine beaches, eco-friendly practices, and exceptional hospitality, this resort offers a perfect blend of relaxation and adventure. E', 'msnbr.webp', '7R9M+W3C, Mauban, Quezon', '09176787080', 0, 100, NULL, NULL),
(6, 'Nilandingan Cove Resort', 'Discover Nilandingan Cove Resort, a luxurious and eco-friendly haven in Cagbalete Island, Philippines. Enjoy stunning beachfront accommodations, rejuvenating spa services, exquisite dining, and a variety of recreational activities. Perfect for family vaca', 'ncr.webp', 'Cagbalete island, Mauban, Quezon', '09151443094', 0, 150, NULL, NULL),
(7, 'Villa Cleofas (Cagbalete Island Camping Resort)', 'Discover Villa Cleofas, a luxurious Mediterranean retreat epitomizing elegance and tranquility. Nestled amidst lush greenery with breathtaking sea views, this villa offers a perfect blend of historical charm and modern sophistication. Enjoy opulent accomm', 'vccicr.webp', 'Cagbalete Island, Mauban 4330', '09178143475', 0, 125, NULL, NULL),
(8, 'Villa Escaparde Camping and Beach Resort', 'Discover Villa Escaparde, a luxurious retreat in the Island of Cagbalete offering stunning facilities and world-class amenities. Just a short drive from Nice, this elegant villa features contemporary design, a private infinity pool, fitness center, and ex', 'vecbr.webp', '7RG8+GH6, Mauban 4330', '09073700888', 0, 100, NULL, NULL),
(9, 'Villa Noe Beach Resort', 'Discover Villa Noe Beach Resort, a premier destination on Cagbalete Island, known for its pristine beaches and lush landscapes. Enjoy luxurious accommodations, exceptional hospitality, and a variety of activities including snorkeling, kayaking, and island', 'vnbr.webp', '7R4H+628, Cagbalete Island, Mauban, Quezon, Philippines, Mauban, Quezon', '09065197126/09126914340', 0, 100, NULL, NULL),
(10, 'Villa Pilarosa Beach Resort', 'Discover Villa Pilarosa Beach Resort on Cagbalete Island, a hidden gem offering luxurious accommodations, stunning beachfront views, and eco-friendly practices. Enjoy a range of activities from snorkeling to island-hopping, or relax with our spa services ', 'vpbr.webp', '7RM4+GV3, Mauban, Quezon', '09496608865/09959376995', 0, 100, NULL, NULL),
(11, 'Tita Pinay Beach Resort', 'Discover the serene beauty of Tita Pinay Beach Resort on Cagbalete Island. Enjoy pristine white sand beaches, luxurious accommodations, and a variety of recreational activities. With a commitment to sustainability and exceptional service, this resort offe', 'tpbr.webp', '7R49+CRF, Mauban, Quezon', '09108070864', 0, 50, NULL, NULL),
(12, 'Aguho Playa Beach Resort', 'Discover Aguho Playa Beach Resort on Cagbalete Island, a luxury retreat that offers stunning beachfront views, eco-friendly practices, and a range of activities for families and adventure seekers. Enjoy gourmet dining, relaxing spa treatments, and luxurio', 'apbr.webp', 'Mauban, Quezon', '09670061937', 0, 100, NULL, NULL),
(13, 'Tent Place', 'Discover the serene beauty of Cagbalete Island`s Tent Place in the Philippines. This hidden gem offers pristine beaches, lush forests, and diverse wildlife. Enjoy unique tidal landscapes, tent accommodations ranging from basic to luxurious, and a variety ', 'tp.webp', '7R4H+C6F, Quezon', '09988845443 / 091009563', 0, 50, NULL, NULL),
(14, 'Orlan Beach Resort', 'Discover Orlan Beach Resort on Cagbalete Island, a haven of tranquility and eco-friendly luxury. Enjoy pristine beaches, luxurious accommodations, and a commitment to sustainability. Perfect for families, couples, and solo travelers seeking a serene and r', 'obr.webp', 'Cagbalete Island, Mauban', '09707100945', 0, 50, NULL, NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
