-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 05:18 PM
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
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `breed` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthDate` date NOT NULL,
  `vaccinated` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `certificate` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `adopted` tinyint(1) NOT NULL DEFAULT 0,
  `likes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `type`, `breed`, `birthDate`, `vaccinated`, `created_at`, `updated_at`, `certificate`, `order`, `adopted`, `likes`) VALUES
(7, 'Perro', 'Labrador', '2019-11-06', 1, '2020-03-09 20:50:08', '2020-03-09 21:09:55', NULL, NULL, 0, 1),
(8, 'Conejillo de Indias', 'Pelo corto', '2019-01-07', 1, '2020-03-09 20:50:44', '2020-03-09 21:10:28', NULL, NULL, 0, 2),
(9, 'Erizo', 'Europeo', '2020-02-18', 1, '2020-03-09 20:51:22', '2020-03-09 21:08:13', NULL, NULL, 1, 0),
(10, 'Pinguino', 'ártico', '2015-06-24', 0, '2020-03-09 20:51:56', '2020-03-09 21:10:48', NULL, NULL, 0, 15),
(11, 'Gato', 'Bosque Noruega', '2019-07-10', 1, '2020-03-09 20:52:53', '2020-03-09 21:10:23', NULL, NULL, 0, 1),
(12, 'Cerdo', 'Mini', '2019-08-20', 1, '2020-03-09 20:53:15', '2020-03-09 21:10:09', NULL, NULL, 0, 8),
(13, 'Tigre', 'Siberiano', '2019-12-23', 1, '2020-03-09 20:54:17', '2020-03-09 21:08:26', NULL, NULL, 1, 10),
(14, 'Perezoso', 'Tres dedos', '2019-09-16', 1, '2020-03-09 20:54:44', '2020-03-09 21:10:16', NULL, NULL, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
