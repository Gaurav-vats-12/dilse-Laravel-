-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 09:10 AM
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
-- Database: `dilselaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `custumber_name` varchar(255) NOT NULL,
  `testimonial_description` text NOT NULL,
  `testonomailsImage` varchar(255) NOT NULL,
  `rating` bigint(20) NOT NULL,
  `status` enum('none','active','inactive') NOT NULL DEFAULT 'none',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `custumber_name`, `testimonial_description`, `testonomailsImage`, `rating`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Testing User 1', '<p>We visited Dil Se for our anniversary and had a wonderful meal. The food was well seasoned and flavorful. The staff was very friendly and helpful as they suggested dishes based on our preferences. For dessert, we were presented with an anniversary topper and an anniversary song. It was truly a nice touch. I will definitely visit on my next trip to Canada!</p><div><br></div>', '1691042324-user-2.png', 1, 'active', '2023-08-03 00:28:44', '2023-08-03 00:42:20', NULL),
(2, 'Testing User 2', '<p>One of the few Indian Restaurants that managed to get each and every dish right! Their food feels like home, is absolutely delicious and is served with so much warmth leading to an overall lovely experience! I’d recommend them in a heartbeat and will be a going back whenever I miss home.</p><div><br></div>', '1691042379-user-1.png', 5, 'active', '2023-08-03 00:29:39', '2023-08-03 00:29:39', NULL),
(3, 'Kalvin Ali', '<p>We visited Dil Se for our anniversary and had a wonderful meal. The food was well seasoned and flavorful. The staff was very friendly and helpful as they suggested dishes based on our preferences. For dessert, we were presented with an anniversary topper and an anniversary song. It was truly a nice touch. I will definitely visit on my next trip to Canada!<br></p>', '1691042417-user-2.png', 4, 'active', '2023-08-03 00:30:17', '2023-08-03 00:30:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
