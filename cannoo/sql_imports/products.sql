-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 05:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cannoodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `type`, `price`, `description`, `created_at`, `updated_at`, `likes`) VALUES
(6, 'Alimento', 30, 'Alimento para conejillos de india', '2020-03-09 20:55:53', '2020-03-09 21:11:11', 1),
(7, 'Alimento', 50, 'Alimento para perros en edad adulta marca Pedigree', '2020-03-09 20:56:24', '2020-03-09 21:11:18', 14),
(8, 'Juguete', 5, 'Juguete para roer para conejillos de india y hamsters', '2020-03-09 20:56:59', '2020-03-09 21:11:33', 3),
(9, 'Cobija térmica', 100, 'Cobija térmica para pinguinos recién llegados de otros hábitats', '2020-03-09 20:57:50', '2020-03-09 20:57:50', 21),
(10, 'Juguete', 30, 'Juguete para mascar para perros', '2020-03-09 20:58:23', '2020-03-09 20:58:23', 0),
(11, 'Madriguera', 200, 'Madriguera hecha en madera perfecta para hámters, ratas o conejllos de indias', '2020-03-09 20:59:00', '2020-03-09 20:59:00', 6),
(12, 'Cobija multipropósito', 45, 'Cobija para arropar cualquier tipo de animal con estampado de huellas', '2020-03-09 20:59:51', '2020-03-09 20:59:51', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
