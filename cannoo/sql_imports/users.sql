-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 05:17 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `phone`, `address`) VALUES
(3, 'Luisa Maria Vasquez Gomez', 'lmvasquezgomez@hotmail.com', NULL, '$2y$10$QQiZTeLrafj.oYnvM7bU2.pqfpD9f/GVUeGzaslYyJtav0bSvQlou', NULL, '2020-03-08 23:40:09', '2020-03-08 23:40:09', 'admin', '', ''),
(4, 'Luisa María Vásquez Gómez', 'lmvasquezg@eafit.edu.co', NULL, '$2y$10$4C329BNBzndQMtAJnuZluulXt9qWyWPR/Tj9gUh3YBDhPhSEh5CjS', NULL, '2020-03-09 00:22:16', '2020-03-09 00:42:14', 'admin', '3114024569', 'Calle 29 sur #45A-60 Apto 807'),
(5, 'Isabela Muriel', 'imurielr@eafit.edu.co', NULL, '$2y$10$kNeN47zV4ora0DZnlRjDwOConTv0XCJLglDQyhx0Vdld.pkiaqbTq', NULL, '2020-03-09 00:43:06', '2020-03-09 00:43:06', 'client', '3114024569', 'Calle 29 sur #45A-60 Apto 807'),
(6, 'Rafael Villegas', 'rvillegasm@eafit.edu.co', NULL, '$2y$10$dt3w7YH2xDT4Oep2QiVNUO5QFmvcWWf/7QBarinQkKaHCVHXmuu62', NULL, '2020-03-09 21:09:42', '2020-03-09 21:09:42', 'client', '3114024569', 'Calle 29 sur #45A-60 Apto 807');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
