-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 01:32 PM
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
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_slug` varchar(255) NOT NULL,
  `status` enum('none','active','inactive') NOT NULL DEFAULT 'none',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_name`, `menu_slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'APPETIZERS', 'appetizers', 'active', '2023-08-04 05:38:27', '2023-08-04 05:38:27', NULL),
(2, 'TANDOORI', 'tandoori', 'active', '2023-08-04 05:38:27', '2023-08-04 05:38:27', NULL),
(3, 'VEGETERIAN', 'vegeterian', 'active', '2023-08-04 05:38:27', '2023-08-04 05:38:27', NULL),
(4, 'NON VEG', 'non-veg', 'active', '2023-08-04 05:38:27', '2023-08-04 05:38:27', NULL),
(5, 'BASMATI RICE', 'basmati-rice', 'active', '2023-08-04 05:38:27', '2023-08-04 05:38:27', NULL),
(6, 'BREADS', 'breads', 'active', '2023-08-04 05:38:27', '2023-08-04 05:38:27', NULL),
(7, 'SIDE ORDERS/ SALAD', 'side-orders/-salad', 'active', '2023-08-04 05:38:27', '2023-08-04 05:38:27', NULL),
(8, 'DESSERTS', 'desserts', 'active', '2023-08-04 05:38:27', '2023-08-04 05:38:27', NULL),
(9, 'DRINKS', 'drinks', 'active', '2023-08-04 05:38:27', '2023-08-04 05:38:27', NULL),
(10, 'LUNCH SPECIAL COMBO', 'lunch-special-combo', 'active', '2023-08-04 05:38:27', '2023-08-04 05:38:27', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
