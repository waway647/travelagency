-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 09:13 AM
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
-- Database: `travelagency`
--

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`id`, `username`, `email`, `pass`, `created_at`, `updated_at`) VALUES
(1, 'user5', 'sherina@gmail.com', '$2y$10$DrtNHKw1t69SwowTnRt7DecmVxh8mtdXHmaYRwTgWoj7k0Oh.HlXG', '2024-09-30 04:54:03', '2024-09-30 04:54:03'),
(10, 'user6', 'ariel@gmail.com', '$2y$10$l04IDiYtTZBPyit2.FRgYeIpnH9KN1FgfwgW04ONRLeEhbmX9S7Ua', '2024-09-30 04:55:10', '2024-09-30 04:55:10'),
(12, 'user8', 'wild@gmail.com', '$2y$10$JXLpsyCTUwA0rYgMwa0Opum/3.FKoj0YiWreBCMx2B/XeMUEVfLAG', '2024-09-30 04:56:39', '2024-09-30 04:56:39'),
(14, 'user9', 'mapul123123a.pauljoshua@gmail.com', '$2y$10$aFtdWhrAC.5/iAr2Pb604../AlxiIGT39lZCBGlTeQF0i6R13CjMa', '2024-09-30 04:57:54', '2024-09-30 04:57:54'),
(16, 'user10', 'sa.pauljoshua@gmail.com', '$2y$10$TTBf8CCIGW1W219X3sNj/OvEceZRSy9oPQ6kbHmv7IPEPZ9B/CfPy', '2024-09-30 04:59:37', '2024-09-30 04:59:37'),
(17, 'user11', 'sdda.pauljoshua@gmail.com', '$2y$10$ySdtwTDQJJq4IGbRlysDz.0ms5wm1t5VUnqsmy1QvLC6furXfZ94i', '2024-09-30 05:00:50', '2024-09-30 05:00:50'),
(19, 'user12', 'sadla.pauljoshua@gmail.com', '$2y$10$BH3gaac8MqywSLEoKdbuTu6KB/hKZkvPEgceEuZ41dwfnNaevThJO', '2024-09-30 05:02:48', '2024-09-30 05:02:48'),
(20, 'user13', 'dggg.pauljoshua@gmail.com', '$2y$10$9JegdDxGLMRbUfN8crUHduz1NI4wxa7RmBH4m9MhVQ7SXBZBGqQt2', '2024-09-30 05:08:15', '2024-09-30 05:08:15'),
(21, 'user14', 'bbbb.pauljoshua@gmail.com', '$2y$10$WcmhdZf8FdxusIj9b/oIs.6VegzXqST6m7PUGoGP7ps7Ox9MXydfK', '2024-09-30 05:09:21', '2024-09-30 05:09:21'),
(22, 'user15', 'nnn.pauljoshua@gmail.com', '$2y$10$f76atJOhuuqt0C3CNoX18.UtWKVAq24SGD3oGycbJ6IoW/tLIbBy2', '2024-09-30 05:12:35', '2024-09-30 05:12:35'),
(23, 'user16', 'sddssda.pauljoshua@gmail.com', '$2y$10$Ajjob4uvpCTopMyMyg/TyeG2v1WKKSmBvthiinXq.w1YyZOn05JYW', '2024-09-30 05:27:55', '2024-09-30 05:27:55'),
(25, 'user17', 'vvva.pauljoshua@gmail.com', '$2y$10$wTkzaNuoyx/rMOG.sl39JOq0D6HFhswIEq33w9RMtyR52b1E5ByXS', '2024-09-30 05:36:53', '2024-09-30 05:36:53'),
(28, 'user18', 'vba.pauljoshua@gmail.com', '$2y$10$ac1JdvXpO0EiY/ocRtuEIui8N7umMLnagjO7n158oPDULKyuPIsIq', '2024-09-30 05:37:55', '2024-09-30 05:37:55'),
(30, 'user19', 'mauljoshua@gmail.com', '$2y$10$EW.tz439.3mP.80WG1VlBexNnfd0XW1gL61gUFGao7NQsUMZudyC.', '2024-09-30 05:42:03', '2024-09-30 05:42:03'),
(33, 'user20', 'mmula.pauljoshua@gmail.com', '$2y$10$qfNgVseg1I/VAwtxlHnHVeA99rWHzCNEy1jOAS0c.jZgk0rS6EJOC', '2024-09-30 05:43:32', '2024-09-30 05:43:32'),
(35, 'user21', 'mba.pauljoshua@gmail.com', '$2y$10$nuI1pbZFaQSdf6SEI2O7TOsB39ZrjCEhI7HT3H5JYf.Akzrjgg7ie', '2024-09-30 05:44:05', '2024-09-30 05:44:05'),
(36, 'user22', 'bmapula.pauljoshua@gmail.com', '$2y$10$26wQT6PSYjbiBVQPnsCLlusvwJC3d6cxpeykr6F0HePOhxOh.YwkK', '2024-09-30 05:44:40', '2024-09-30 05:44:40'),
(37, 'user23', 'ghapula.pauljoshua@gmail.com', '$2y$10$VyTaJ9WMQSYVdRvKBg30vuQPLJ2xsd1RtA20rL5JWYsu8cSeFYajC', '2024-09-30 05:45:22', '2024-09-30 05:45:22'),
(39, 'user24', 'ymapula.pauljoshua@gmail.com', '$2y$10$I4A3Pp9jJgb3rAST2Emp8.3YSRg4etXG7T/TAp9mN2q4ZSiB4NaBa', '2024-09-30 05:45:52', '2024-09-30 05:45:52'),
(40, 'user24', 'bbbbbula.pauljoshua@gmail.com', '$2y$10$zYir8GSBWbeWlISlvMfMjO3xv7hzkVhxfgutQVXAy3Y6L.ZJhBl4m', '2024-09-30 05:48:35', '2024-09-30 05:48:35'),
(42, 'user25', 'mbfbfpula.pauljoshua@gmail.com', '$2y$10$7M58mRDEw9dU2BYQCPN66uMKh8aUEK1iDSkFZHcE0beigmkS4nH0e', '2024-09-30 05:49:42', '2024-09-30 05:49:42'),
(43, 'user26', 'mafffpula.pauljoshua@gmail.com', '$2y$10$OtXePVZnPApagF8jnKzBlO2iXDAqfv06uydZBtCvu11gnwOMv/tNu', '2024-09-30 05:53:55', '2024-09-30 05:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `midInitial` char(1) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobileNum` varchar(15) DEFAULT NULL,
  `bday` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `loginID` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`id`, `username`, `pass`, `firstName`, `midInitial`, `lastName`, `email`, `mobileNum`, `bday`, `gender`, `nationality`, `loginID`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-29 22:17:10', '2024-09-29 22:17:10'),
(2, NULL, NULL, NULL, NULL, NULL, 'mapula.pauljoshua@gmail.com', NULL, NULL, 'Male', 'Filipino', NULL, '2024-09-29 22:19:32', '2024-09-29 22:19:32'),
(4, 'user2', 'user2', '', NULL, 'Mapula', 'aninglan.pauljoshua@gmail.com', '09958541242', '2024-09-11', 'Male', 'Filipino', NULL, '2024-09-29 22:25:03', '2024-09-29 22:25:03'),
(6, 'user3', 'user3', 'Juan', 'G', 'Dela Cruz', 'marquez.pauljoshua@gmail.com', '09958541242', '2024-09-11', 'Female', 'Filipino', NULL, '2024-09-29 22:29:20', '2024-09-29 22:29:20'),
(7, 'user4', '$2y$10$rfeLd8nwyB8aRCdo5k2h5exsf3zMs.f4DtvtmbRWrlETiP0UDZvvq', 'John', 'G', 'Doe', 'johndoe@gmail.com', '09958541242', '2024-09-17', 'Male', 'Filipino', NULL, '2024-09-29 22:31:57', '2024-09-29 22:31:57'),
(8, 'user9', '$2y$10$aFtdWhrAC.5/iAr2Pb604../AlxiIGT39lZCBGlTeQF0i6R13CjMa', 'Paul Joshua', '', 'Mapula', 'mapul123123a.pauljoshua@gmail.com', '09958541242', '2024-09-11', 'Male', 'Filipino', 14, '2024-09-29 22:57:54', '2024-09-29 22:57:54'),
(9, 'user10', '$2y$10$TTBf8CCIGW1W219X3sNj/OvEceZRSy9oPQ6kbHmv7IPEPZ9B/CfPy', 'Paul Joshua', '', 'Mapula', 'sa.pauljoshua@gmail.com', '09958541242', '2024-09-11', 'Male', 'Filipino', 16, '2024-09-29 22:59:37', '2024-09-29 22:59:37'),
(10, 'user12', '$2y$10$BH3gaac8MqywSLEoKdbuTu6KB/hKZkvPEgceEuZ41dwfnNaevThJO', 'Paul Joshua', '', 'Mapula', 'sadla.pauljoshua@gmail.com', '09958541242', '2024-09-10', 'Male', 'Filipino', 19, '2024-09-29 23:02:48', '2024-09-29 23:02:48'),
(11, 'user20', '$2y$10$qfNgVseg1I/VAwtxlHnHVeA99rWHzCNEy1jOAS0c.jZgk0rS6EJOC', 'Paul Joshua', '', 'Mapula', 'mmula.pauljoshua@gmail.com', '09958541242', '2024-09-18', 'Male', 'Filipino', 33, '2024-09-29 23:43:32', '2024-09-29 23:43:32'),
(12, 'user21', '$2y$10$nuI1pbZFaQSdf6SEI2O7TOsB39ZrjCEhI7HT3H5JYf.Akzrjgg7ie', 'Paul Joshua', '', 'Mapula', 'mba.pauljoshua@gmail.com', '09958541242', '2024-09-03', 'Male', 'Filipino', 35, '2024-09-29 23:44:05', '2024-09-29 23:44:05'),
(13, 'user22', '$2y$10$26wQT6PSYjbiBVQPnsCLlusvwJC3d6cxpeykr6F0HePOhxOh.YwkK', 'Paul Joshua', 'G', 'Mapula', 'bmapula.pauljoshua@gmail.com', '09958541242', '2024-09-10', 'Male', 'Filipino', 36, '2024-09-29 23:44:40', '2024-09-29 23:44:40'),
(14, 'user23', '$2y$10$VyTaJ9WMQSYVdRvKBg30vuQPLJ2xsd1RtA20rL5JWYsu8cSeFYajC', 'Paul Joshua', 'G', 'Mapula', 'ghapula.pauljoshua@gmail.com', '09958541242', '2024-09-11', 'Male', 'Filipino', 37, '2024-09-29 23:45:22', '2024-09-29 23:45:22'),
(15, 'user24', '$2y$10$I4A3Pp9jJgb3rAST2Emp8.3YSRg4etXG7T/TAp9mN2q4ZSiB4NaBa', 'Paul Joshua', 'G', 'Mapula', 'ymapula.pauljoshua@gmail.com', '09958541242', '2024-09-04', 'Male', 'Filipino', 39, '2024-09-29 23:45:52', '2024-09-29 23:45:52'),
(16, 'user25', '$2y$10$7M58mRDEw9dU2BYQCPN66uMKh8aUEK1iDSkFZHcE0beigmkS4nH0e', 'Paul Joshua', '', 'Mapula', 'mbfbfpula.pauljoshua@gmail.com', '09958541242', '2024-09-19', 'Male', 'Filipino', 42, '2024-09-29 23:49:42', '2024-09-29 23:49:42'),
(17, 'user26', '$2y$10$OtXePVZnPApagF8jnKzBlO2iXDAqfv06uydZBtCvu11gnwOMv/tNu', 'Paul Joshua', '', 'Mapula', 'mafffpula.pauljoshua@gmail.com', '09958541242', '2024-09-09', 'Male', 'Filipino', 43, '2024-09-29 23:53:55', '2024-09-29 23:53:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `loginID` (`loginID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD CONSTRAINT `userregistration_ibfk_1` FOREIGN KEY (`loginID`) REFERENCES `userlogin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
