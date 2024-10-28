-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2024 at 05:19 PM
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
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `tourID` int(11) DEFAULT NULL,
  `contactID` int(11) NOT NULL,
  `status` enum('confirmed','pending','cancelled') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `booking_reference` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `tourID`, `contactID`, `status`, `created_at`, `updated_at`, `booking_reference`) VALUES
(26, 41, 54, 'confirmed', '2024-10-15 17:18:01', '2024-10-15 17:18:01', 'VPT0ZB');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `contact_firstName` varchar(50) NOT NULL,
  `contact_midInitial` varchar(10) NOT NULL,
  `contact_lastName` varchar(50) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_contactNumber` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `contact_firstName`, `contact_midInitial`, `contact_lastName`, `contact_email`, `contact_contactNumber`, `created_at`, `updated_at`) VALUES
(54, 'Paul Joshua', 'G', 'Mapula', 'mapula.pauljoshua@gmail.com', '09958541242', '2024-10-15 09:18:01', '2024-10-15 09:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `contact_passenger`
--

CREATE TABLE `contact_passenger` (
  `contact_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_passenger`
--

INSERT INTO `contact_passenger` (`contact_id`, `passenger_id`) VALUES
(54, 73),
(54, 74);

-- --------------------------------------------------------

--
-- Table structure for table `itinerary`
--

CREATE TABLE `itinerary` (
  `id` int(11) NOT NULL,
  `tourPackageID` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `location` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itinerary`
--

INSERT INTO `itinerary` (`id`, `tourPackageID`, `day`, `activity`, `startTime`, `endTime`, `location`, `created_at`, `updated_at`) VALUES
(54, 29, 1, 'Tour Colosseum', '09:00:00', '11:00:00', 'Colosseum', '2024-10-01 14:30:58', '2024-10-14 01:45:02'),
(55, 29, 2, 'Visit Vatican Museums', '10:00:00', '13:00:00', 'Vatican City', '2024-10-01 14:30:58', '2024-10-01 14:30:58'),
(56, 29, 3, 'Walk through Roman Forum', '09:00:00', '11:00:00', 'Roman Forum', '2024-10-01 14:30:58', '2024-10-01 14:30:58'),
(57, 29, 4, 'Explore Pantheon', '10:00:00', '12:00:00', 'Pantheon', '2024-10-01 14:30:58', '2024-10-01 14:30:58'),
(58, 29, 5, 'Visit Trevi Fountain', '11:00:00', '13:00:00', 'Trevi Fountain', '2024-10-01 14:30:58', '2024-10-01 14:30:58'),
(59, 30, 1, 'Sydney Opera House Tour', '09:00:00', '11:00:00', 'Sydney Opera House', '2024-10-01 14:32:24', '2024-10-01 14:32:24'),
(60, 30, 2, 'Visit Taronga Zoo', '10:00:00', '12:00:00', 'Taronga Zoo', '2024-10-01 14:32:24', '2024-10-01 14:32:24'),
(61, 30, 3, 'Bondi Beach Visit', '10:00:00', '12:00:00', 'Bondi Beach', '2024-10-01 14:32:24', '2024-10-01 14:32:24'),
(62, 30, 4, 'Explore Darling Harbour', '14:00:00', '16:00:00', 'Darling Harbour', '2024-10-01 14:32:24', '2024-10-01 14:32:24'),
(63, 31, 1, 'Grand Palace Tour', '09:00:00', '11:00:00', 'Grand Palace', '2024-10-01 14:32:33', '2024-10-01 14:32:33'),
(64, 31, 2, 'Visit Wat Arun', '10:00:00', '12:00:00', 'Wat Arun', '2024-10-01 14:32:33', '2024-10-01 14:32:33'),
(65, 31, 3, 'Street Food Tour', '12:00:00', '14:00:00', 'Bangkok Streets', '2024-10-01 14:32:33', '2024-10-01 14:32:33'),
(66, 31, 4, 'Explore Chatuchak Market', '09:00:00', '11:00:00', 'Chatuchak Market', '2024-10-01 14:32:33', '2024-10-01 14:32:33'),
(67, 31, 5, 'Visit Jim Thompson House', '10:00:00', '12:00:00', 'Jim Thompson House', '2024-10-01 14:32:33', '2024-10-01 14:32:33'),
(68, 32, 1, 'Table Mountain Hike', '08:00:00', '12:00:00', 'Table Mountain', '2024-10-01 14:32:42', '2024-10-01 14:32:42'),
(69, 32, 2, 'Visit Kirstenbosch Gardens', '10:00:00', '12:00:00', 'Kirstenbosch', '2024-10-01 14:32:42', '2024-10-01 14:32:42'),
(70, 32, 3, 'Robben Island Tour', '09:00:00', '11:00:00', 'Robben Island', '2024-10-01 14:32:42', '2024-10-01 14:32:42'),
(71, 32, 4, 'Explore V&A Waterfront', '14:00:00', '16:00:00', 'V&A Waterfront', '2024-10-01 14:32:42', '2024-10-01 14:32:42'),
(72, 32, 5, 'Cape Point Tour', '09:00:00', '12:00:00', 'Cape Point', '2024-10-01 14:32:42', '2024-10-01 14:32:42'),
(73, 32, 6, 'Wine Tasting in Stellenbosch', '13:00:00', '15:00:00', 'Stellenbosch', '2024-10-01 14:32:42', '2024-10-01 14:32:42'),
(74, 33, 1, 'Christ the Redeemer Visit', '09:00:00', '11:00:00', 'Corcovado Mountain', '2024-10-01 14:34:32', '2024-10-01 14:34:32'),
(75, 33, 2, 'Copacabana Beach Visit', '10:00:00', '12:00:00', 'Copacabana', '2024-10-01 14:34:32', '2024-10-01 14:34:32'),
(76, 33, 3, 'Sugarloaf Mountain Tour', '09:00:00', '11:00:00', 'Sugarloaf Mountain', '2024-10-01 14:34:32', '2024-10-01 14:34:32'),
(77, 33, 4, 'Explore Tijuca Forest', '10:00:00', '12:00:00', 'Tijuca Forest', '2024-10-01 14:34:32', '2024-10-01 14:34:32'),
(78, 33, 5, 'Visit Maracanã Stadium', '14:00:00', '16:00:00', 'Maracanã', '2024-10-01 14:34:32', '2024-10-01 14:34:32'),
(79, 34, 1, 'Burj Khalifa Tour', '09:00:00', '11:00:00', 'Burj Khalifa', '2024-10-01 14:36:05', '2024-10-01 14:36:05'),
(80, 34, 2, 'Desert Safari', '15:00:00', '19:00:00', 'Dubai Desert', '2024-10-01 14:36:05', '2024-10-01 14:36:05'),
(81, 34, 3, 'Visit Dubai Mall', '10:00:00', '12:00:00', 'Dubai Mall', '2024-10-01 14:36:05', '2024-10-01 14:36:05'),
(82, 34, 4, 'Explore Palm Jumeirah', '14:00:00', '16:00:00', 'Palm Jumeirah', '2024-10-01 14:36:05', '2024-10-01 14:36:05'),
(83, 35, 1, 'Hagia Sophia Tour', '09:00:00', '11:00:00', 'Hagia Sophia', '2024-10-01 14:36:15', '2024-10-01 14:36:15'),
(84, 35, 2, 'Grand Bazaar Visit', '12:00:00', '14:00:00', 'Grand Bazaar', '2024-10-01 14:36:15', '2024-10-01 14:36:15'),
(85, 35, 3, 'Blue Mosque Tour', '09:00:00', '11:00:00', 'Blue Mosque', '2024-10-01 14:36:15', '2024-10-01 14:36:15'),
(86, 35, 4, 'Topkapi Palace Tour', '10:00:00', '12:00:00', 'Topkapi Palace', '2024-10-01 14:36:15', '2024-10-01 14:36:15'),
(87, 35, 5, 'Bosphorus Cruise', '14:00:00', '16:00:00', 'Bosphorus Strait', '2024-10-01 14:36:15', '2024-10-01 14:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `id` int(11) NOT NULL,
  `passengerTitle` varchar(10) NOT NULL,
  `passengerFname` varchar(50) NOT NULL,
  `passengerMinit` char(1) DEFAULT NULL,
  `passengerLname` varchar(50) NOT NULL,
  `passengerBirthday` date NOT NULL,
  `passengerGender` varchar(10) NOT NULL,
  `passengerNationality` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`id`, `passengerTitle`, `passengerFname`, `passengerMinit`, `passengerLname`, `passengerBirthday`, `passengerGender`, `passengerNationality`, `created_at`, `updated_at`) VALUES
(72, 'Mr.', 'Paul Joshua', 's', 'Mapula', '2024-10-09', 'Male', 'SAFSAF', '2024-10-15 09:10:44', '2024-10-15 09:10:44'),
(73, 'Mr.', 'John Ariel', 'A', 'Marquez', '2024-10-02', 'Male', 'Filipino', '2024-10-15 09:18:01', '2024-10-15 09:18:01'),
(74, 'Mr.', 'Jul-Andrei', 'T', 'Aningalan', '2024-10-02', 'Male', 'Filipino', '2024-10-15 09:18:01', '2024-10-15 09:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `passenger_bin`
--

CREATE TABLE `passenger_bin` (
  `id` int(11) NOT NULL,
  `passengerTitle` varchar(10) NOT NULL,
  `passengerFname` varchar(50) NOT NULL,
  `passengerMinit` varchar(10) NOT NULL,
  `passengerLname` varchar(50) NOT NULL,
  `passengerBirthday` date NOT NULL,
  `passengerGender` varchar(10) NOT NULL,
  `passengerNationality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `id` int(11) NOT NULL,
  `tourPackageID` int(11) DEFAULT NULL,
  `tourStartDate` date NOT NULL,
  `tourEndDate` date NOT NULL,
  `status` enum('confirmed','pending','cancelled') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`id`, `tourPackageID`, `tourStartDate`, `tourEndDate`, `status`, `created_at`, `updated_at`) VALUES
(41, 29, '2024-10-01', '2024-10-06', 'confirmed', '2024-10-15 17:18:01', '2024-10-15 17:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `tourpackage`
--

CREATE TABLE `tourpackage` (
  `tourpackage_id` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `tourDescription` mediumtext NOT NULL,
  `duration` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourpackage`
--

INSERT INTO `tourpackage` (`tourpackage_id`, `city`, `country`, `price`, `tourDescription`, `duration`, `created_at`, `updated_at`) VALUES
(29, 'Rome', 'Italy', 1700.00, 'Journey through the historic city of Rome with guided tours of ancient sites.', 5, '2024-10-01 14:27:32', '2024-10-14 02:51:49'),
(30, 'Sydney', 'Australia', 1600.00, 'Enjoy the beautiful city of Sydney with beach visits and city tours.', 4, '2024-10-01 14:27:32', '2024-10-15 05:34:21'),
(31, 'Bangkok', 'Thailand', 1400.00, 'Immerse yourself in the vibrant culture of Bangkok with temple visits and street food tours.', 5, '2024-10-01 14:27:32', '2024-10-01 14:27:32'),
(32, 'Cape Town', 'South Africa', 1900.00, 'Explore the scenic beauty of Cape Town with nature tours and city excursions.', 6, '2024-10-01 14:27:32', '2024-10-01 14:27:32'),
(33, 'Rio de Janeiro', 'Brazil', 1750.00, 'Experience the lively city of Rio with beach visits and cultural tours.', 5, '2024-10-01 14:27:32', '2024-10-01 14:27:32'),
(34, 'Dubai', 'UAE', 2100.00, 'Discover the modern marvels of Dubai with luxury tours and desert safaris.', 4, '2024-10-01 14:27:32', '2024-10-01 14:27:32'),
(35, 'Istanbul', 'Turkey', 1600.00, 'Explore the historic and cultural richness of Istanbul with guided tours.', 5, '2024-10-01 14:27:32', '2024-10-01 14:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`id`, `username`, `email`, `pass`, `created_at`, `updated_at`) VALUES
(1, 'admin1', 'admin1@gmail.com', '8e9945f44fe5d1065fc61f4510b7f6c2fbbbb8bb1bded6f8994e057a880013fc7da7fd2c64c5e3fee23a01eb98790a15c08180761d01211fd94251c537d9d2d5/Gis4CL+PmlSvTY5TqpOjM/wctIOP8afZ3sjsR/U7GQ=', '2024-10-12 18:24:16', '2024-10-13 10:24:16'),
(3, 'ushuay.admin', 'asdadadad@ada13123d', 'ca415a4d72e2bab3e7c580d83da16775ec629693d1161681bd47a320e525172755ca025910523a955a42c337504504f54183dbf39cebff81332741d323c911e7RSCaOHy587FkVxdNZ5GLV6+dxuGwi63FD8Ic/E/VRCM=', '2024-10-13 19:20:46', '2024-10-14 03:20:46');

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
(111, 'mapula', 'mapula.pauljoshua@gmail.com', '2e6c7fb3e5008fad070e3d3b816d85a7ebb130a103d920e5724c44b34361b10cb392b17e018ff3b385ec456f5c8f0c205fb1776308e2b8d2ea58298fe4a04109wdZYeGRhRAl+jDGQgjcdSRObOSIfAiF4dcvnGKTYf08=', '2024-10-15 15:14:15', '2024-10-15 15:14:15');

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
(46, 'mapula', '2e6c7fb3e5008fad070e3d3b816d85a7ebb130a103d920e5724c44b34361b10cb392b17e018ff3b385ec456f5c8f0c205fb1776308e2b8d2ea58298fe4a04109wdZYeGRhRAl+jDGQgjcdSRObOSIfAiF4dcvnGKTYf08=', 'Paul Joshua', 'G', 'Mapula', 'mapula.pauljoshua@gmail.com', '09958541242', '2024-10-10', 'Male', 'Filipino', 111, '2024-10-15 09:14:15', '2024-10-15 15:16:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tourID` (`tourID`),
  ADD KEY `contactID` (`contactID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_passenger`
--
ALTER TABLE `contact_passenger`
  ADD KEY `contact_id` (`contact_id`),
  ADD KEY `passenger_id` (`passenger_id`);

--
-- Indexes for table `itinerary`
--
ALTER TABLE `itinerary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tourPackageID` (`tourPackageID`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passenger_bin`
--
ALTER TABLE `passenger_bin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tourPackageID` (`tourPackageID`);

--
-- Indexes for table `tourpackage`
--
ALTER TABLE `tourpackage`
  ADD PRIMARY KEY (`tourpackage_id`);

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `itinerary`
--
ALTER TABLE `itinerary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `passenger_bin`
--
ALTER TABLE `passenger_bin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tourpackage`
--
ALTER TABLE `tourpackage`
  MODIFY `tourpackage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`tourID`) REFERENCES `tour` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`contactID`) REFERENCES `contact` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_passenger`
--
ALTER TABLE `contact_passenger`
  ADD CONSTRAINT `contact_passenger_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contact_passenger_ibfk_2` FOREIGN KEY (`passenger_id`) REFERENCES `passenger` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `itinerary`
--
ALTER TABLE `itinerary`
  ADD CONSTRAINT `itinerary_ibfk_1` FOREIGN KEY (`tourPackageID`) REFERENCES `tourpackage` (`tourpackage_id`);

--
-- Constraints for table `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`tourPackageID`) REFERENCES `tourpackage` (`tourpackage_id`) ON DELETE CASCADE;

--
-- Constraints for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD CONSTRAINT `userregistration_ibfk_1` FOREIGN KEY (`loginID`) REFERENCES `userlogin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
