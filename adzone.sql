-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2020 at 12:27 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maincategoryid` int(20) DEFAULT NULL,
  `subcategoryid` int(20) DEFAULT NULL,
  `productname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yearofpurchase` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expsellprice` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` int(50) DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `maincategoryid`, `subcategoryid`, `productname`, `yearofpurchase`, `expsellprice`, `name`, `mobile`, `email`, `state`, `city`, `photo`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'Toyota', '23', '43432', 'Ahmed', 3243434, 'ali@gmail.com', '1', 'Lucknow', 'http://127.0.0.1/adzone/public/uploads/two.png-1597413101.png', '2020-08-14 08:51:41', '2020-08-14 08:51:41'),
(2, 2, 2, 'Toyota', '23', '43432', 'a', 3243434, 'fa@gmail.com', '4', 'Crossing', 'http://127.0.0.1/adzone/public/uploads/one.png-1597413438.png,http://127.0.0.1/adzone/public/uploads/three.png-1597413438.png,http://127.0.0.1/adzone/public/uploads/two.png-1597413438.png', '2020-08-14 08:57:18', '2020-08-14 08:57:18'),
(3, 2, 2, 'Honda', '2019', '900000', 'Kashif', 31134545, 'ali@gmail.com', '5', 'Islamabad', 'http://127.0.0.1/adzone/public/uploads/product12.jpg-1597606987.jpeg', '2020-08-16 14:43:08', '2020-08-16 14:43:08'),
(4, 3, 3, 'Nokia', '2011', '11000', 'Ali', 32454546, 'fa@gmail.com', '2', 'Korangi', 'http://127.0.0.1/adzone/public/uploads/product10.jpg-1597607160.jpeg', '2020-08-16 14:46:00', '2020-08-16 14:46:00'),
(5, 4, 4, 'Dell', '2010', '12000', 'Usama', 424211434, 'salman@gmail.com', '6', 'Lahore', 'http://127.0.0.1/adzone/public/uploads/product7.jpg-1597608045.jpeg,http://127.0.0.1/adzone/public/uploads/product8.jpg-1597608045.jpeg,http://127.0.0.1/adzone/public/uploads/product9.jpg-1597608045.jpeg', '2020-08-16 15:00:45', '2020-08-16 15:00:45'),
(6, 4, 4, 'Haier', '2000', '2500', 'Waqas', 34546562, 'sana@gmail.com', '4', 'PNT', 'http://127.0.0.1/adzone/public/uploads/bg-01.jpg-1597608169.jpeg', '2020-08-16 15:02:49', '2020-08-16 15:02:49'),
(7, 3, 3, 'sumsung', '2017', '8000', 'Hafsa', 343454543, 'hs@gmail.com', '1', 'Korangi', 'http://127.0.0.1/adzone/public/uploads/favicon.ico-1597673743.ico', '2020-08-17 09:15:43', '2020-08-17 09:15:43'),
(8, 2, 2, 'Bikia', '2017', '2500', 'Aafia', 34354352, 'aafia@gmail.com', '4', 'Zaman Town', 'http://localhost/adzone/public/uploads/pexels-cottonbro-4064840.jpg-1600793076.jpeg', '2020-09-22 11:44:36', '2020-09-22 11:44:36');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cityName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stateid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `cityName`, `stateid`, `created_at`, `updated_at`) VALUES
(1, 'Korangi', 1, NULL, NULL),
(2, 'Landhi', 1, NULL, NULL),
(3, 'Lucknow', 2, NULL, NULL),
(4, 'Darus Salam', 3, NULL, NULL),
(5, 'Crossing', 4, NULL, NULL),
(6, 'PNT', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icons` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `icons`
--

INSERT INTO `icons` (`id`, `icons`, `categoryId`, `created_at`, `updated_at`) VALUES
(1, '', 1, NULL, NULL),
(2, '<i class=\"fas fa-motorcycle fa-2x\"></i>', 2, NULL, NULL),
(3, '<i class=\"fas fa-mobile fa-2x\"></i>', 3, NULL, NULL),
(4, '<i class=\"fas fa-fax fa-2x\"></i>', 4, NULL, NULL),
(5, '<i class=\"fas fa-building fa-2x\"></i>', 5, NULL, NULL),
(6, '<i class=\"fas fa-suitcase fa-2x\"></i>', 6, NULL, NULL),
(7, '<i class=\"fas fa-cogs fa-2x\"></i>', 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `main_categories`
--

CREATE TABLE `main_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maincategory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`id`, `maincategory`, `created_at`, `updated_at`) VALUES
(1, 'All Categories', NULL, NULL),
(2, 'Cars&Bikes', NULL, NULL),
(3, 'Mobiles&Tablets', NULL, NULL),
(4, 'Electronics&Appliances', NULL, NULL),
(5, 'Building', NULL, NULL),
(6, 'Suitcase', NULL, NULL),
(7, 'Services', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_07_26_195928_create_main_categories_table', 2),
(4, '2020_07_26_200102_create_sub_categories_table', 2),
(5, '2020_07_26_200252_create_states_table', 2),
(6, '2020_07_26_200358_create_cities_table', 2),
(7, '2020_07_26_200503_create_advertisements_table', 2),
(8, '2020_07_26_200547_create_icons_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stateName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `stateName`, `created_at`, `updated_at`) VALUES
(1, 'Karachi', NULL, NULL),
(2, 'Lahore', NULL, NULL),
(3, 'Islamabad', NULL, NULL),
(4, 'Peshawar', NULL, NULL),
(5, 'Quetta', NULL, NULL),
(6, 'Kimari', NULL, NULL),
(7, 'Larkana', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maincategoryid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `subcategory`, `maincategoryid`, `created_at`, `updated_at`) VALUES
(1, 'Cars&Bikes', 2, NULL, NULL),
(2, 'Commercial Vehicles', 2, NULL, NULL),
(3, 'Scooters', 2, NULL, NULL),
(4, 'Spare Parts', 2, NULL, NULL),
(5, 'Other Vehicles', 2, NULL, NULL),
(6, 'Mobile Phones', 3, NULL, NULL),
(7, 'Accessories', 3, NULL, NULL),
(8, 'Tablets', 3, NULL, NULL),
(9, 'Wearables', 3, NULL, NULL),
(10, 'Home Appliances', 4, NULL, NULL),
(11, 'Refregrators & Fridges', 4, NULL, NULL),
(12, 'Washing Machines', 4, NULL, NULL),
(13, 'Air Coolers', 4, NULL, NULL),
(14, 'Air Conditioners', 4, NULL, NULL),
(15, 'Water Heaters & Geysers', 4, NULL, NULL),
(16, 'Laptops', 4, NULL, NULL),
(17, 'Desktop & Computers', 4, NULL, NULL),
(18, 'Monitors', 4, NULL, NULL),
(19, 'Scanners', 4, NULL, NULL),
(20, 'Printers', 4, NULL, NULL),
(21, 'Water Purifiers', 4, NULL, NULL),
(22, 'Kitchen Ovens', 4, NULL, NULL),
(23, 'Mixers Or Grinders', 4, NULL, NULL),
(24, 'Juicers', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'waqas', 'w@gmail.com', NULL, '$2y$10$aSLHC.G7bE6K//H6Bpm7FOlNcUDJksA5Qp/OE3BOWMY1N0iFZOteW', NULL, '2020-07-25 16:46:29', '2020-07-25 16:46:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
