-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2024 at 11:14 AM
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
  `tourID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `tourID`, `groupID`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'confirmed', '2024-10-01 07:45:57', '2024-10-01 07:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `groupName` varchar(100) NOT NULL,
  `groupLeaderID` int(11) NOT NULL,
  `totalAmount` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `groupName`, `groupLeaderID`, `totalAmount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Doe-Smith Group', 1, 1000.00, 'confirmed', '2024-10-01 07:44:06', '2024-10-01 07:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `grouppassenger`
--

CREATE TABLE `grouppassenger` (
  `id` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `passengerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grouppassenger`
--

INSERT INTO `grouppassenger` (`id`, `groupID`, `passengerID`) VALUES
(1, 1, 1),
(2, 1, 2);

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
(32, 1, 1, 'Visit Eiffel Tower', '09:00:00', '11:00:00', 'Eiffel Tower', '2024-10-01 14:30:09', '2024-10-01 14:30:09'),
(33, 1, 1, 'Lunch at a Parisian Café', '12:00:00', '13:00:00', 'Café de Flore', '2024-10-01 14:30:09', '2024-10-01 14:30:09'),
(34, 1, 2, 'Tour Louvre Museum', '10:00:00', '13:00:00', 'Louvre Museum', '2024-10-01 14:30:09', '2024-10-01 14:30:09'),
(35, 1, 2, 'Seine River Cruise', '14:00:00', '16:00:00', 'Seine River', '2024-10-01 14:30:09', '2024-10-01 14:30:09'),
(36, 26, 1, 'Visit Senso-ji Temple', '09:00:00', '11:00:00', 'Asakusa', '2024-10-01 14:30:22', '2024-10-01 14:30:22'),
(37, 26, 2, 'Explore Shibuya Crossing', '10:00:00', '12:00:00', 'Shibuya', '2024-10-01 14:30:22', '2024-10-01 14:30:22'),
(38, 26, 3, 'Tour Meiji Shrine', '09:00:00', '11:00:00', 'Shibuya', '2024-10-01 14:30:22', '2024-10-01 14:30:22'),
(39, 26, 4, 'Visit Tokyo Tower', '10:00:00', '12:00:00', 'Minato', '2024-10-01 14:30:22', '2024-10-01 14:30:22'),
(40, 26, 5, 'Shopping in Ginza', '11:00:00', '13:00:00', 'Ginza', '2024-10-01 14:30:22', '2024-10-01 14:30:22'),
(41, 27, 1, 'Visit Eiffel Tower', '09:00:00', '11:00:00', 'Eiffel Tower', '2024-10-01 14:30:32', '2024-10-01 14:30:32'),
(42, 27, 2, 'Tour Louvre Museum', '10:00:00', '13:00:00', 'Louvre Museum', '2024-10-01 14:30:32', '2024-10-01 14:30:32'),
(43, 27, 3, 'Walk through Montmartre', '09:00:00', '11:00:00', 'Montmartre', '2024-10-01 14:30:32', '2024-10-01 14:30:32'),
(44, 27, 4, 'Visit Notre-Dame Cathedral', '10:00:00', '12:00:00', 'Notre-Dame', '2024-10-01 14:30:32', '2024-10-01 14:30:32'),
(45, 27, 5, 'Explore Champs-Élysées', '11:00:00', '13:00:00', 'Champs-Élysées', '2024-10-01 14:30:32', '2024-10-01 14:30:32'),
(46, 27, 6, 'Seine River Cruise', '14:00:00', '16:00:00', 'Seine River', '2024-10-01 14:30:32', '2024-10-01 14:30:32'),
(47, 27, 7, 'Visit Palace of Versailles', '09:00:00', '12:00:00', 'Versailles', '2024-10-01 14:30:32', '2024-10-01 14:30:32'),
(48, 28, 1, 'Walk through Central Park', '08:00:00', '10:00:00', 'Central Park', '2024-10-01 14:30:40', '2024-10-01 14:30:40'),
(49, 28, 2, 'Visit Statue of Liberty', '09:00:00', '12:00:00', 'Liberty Island', '2024-10-01 14:30:40', '2024-10-01 14:30:40'),
(50, 28, 3, 'Tour Metropolitan Museum of Art', '10:00:00', '13:00:00', 'Metropolitan Museum of Art', '2024-10-01 14:30:40', '2024-10-01 14:30:40'),
(51, 28, 4, 'Explore Times Square', '14:00:00', '16:00:00', 'Times Square', '2024-10-01 14:30:40', '2024-10-01 14:30:40'),
(52, 28, 5, 'Visit Empire State Building', '09:00:00', '11:00:00', 'Empire State Building', '2024-10-01 14:30:40', '2024-10-01 14:30:40'),
(53, 28, 6, 'Broadway Show', '19:00:00', '22:00:00', 'Broadway', '2024-10-01 14:30:40', '2024-10-01 14:30:40'),
(54, 29, 1, 'Tour Colosseum', '09:00:00', '11:00:00', 'Colosseum', '2024-10-01 14:30:58', '2024-10-01 14:30:58'),
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
(87, 35, 5, 'Bosphorus Cruise', '14:00:00', '16:00:00', 'Bosphorus Strait', '2024-10-01 14:36:15', '2024-10-01 14:36:15'),
(88, 36, 12, '1231', '12:31:00', '00:31:00', '12312', '2024-10-02 02:33:29', '2024-10-02 02:33:29');

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
  `passengerEmail` varchar(100) NOT NULL,
  `passengerMobilenumber` varchar(15) NOT NULL,
  `passengerBirthday` date NOT NULL,
  `passengerGender` varchar(10) NOT NULL,
  `passengerNationality` varchar(50) NOT NULL,
  `passengerPassport` varchar(20) DEFAULT NULL,
  `passengerValidID` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`id`, `passengerTitle`, `passengerFname`, `passengerMinit`, `passengerLname`, `passengerEmail`, `passengerMobilenumber`, `passengerBirthday`, `passengerGender`, `passengerNationality`, `passengerPassport`, `passengerValidID`, `created_at`, `updated_at`) VALUES
(1, 'Mr.', 'John', 'A', 'Doe', 'john.doe@example.com', '1234567890', '1985-05-15', 'Male', 'American', 'X1234567', 'ID123456', '2024-10-01 07:43:57', '2024-10-01 07:43:57'),
(2, 'Ms.', 'Jane', 'B', 'Smith', 'jane.smith@example.com', '0987654321', '1990-08-25', 'Female', 'British', 'Y7654321', 'ID654321', '2024-10-01 07:43:57', '2024-10-01 07:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

CREATE TABLE `tour` (
  `id` int(11) NOT NULL,
  `tourPackageID` int(11) NOT NULL,
  `tourDate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`id`, `tourPackageID`, `tourDate`, `status`, `created_at`, `updated_at`, `admin_id`) VALUES
(1, 1, '2024-10-15', 'active', '2024-10-01 07:43:45', '2024-10-01 07:45:38', 1);

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
(1, 'Paris', 'France', 500.00, 'Explore the beauty of Paris with a 2-day tour covering major attractions.', 2, '2024-10-01 07:40:15', '2024-10-01 07:40:15'),
(26, 'Tokyo', 'Japan', 1500.00, 'Explore the vibrant city of Tokyo with guided tours and cultural experiences.', 5, '2024-10-01 14:27:32', '2024-10-01 14:27:32'),
(27, 'Paris', 'France', 2000.00, 'Discover the romantic city of Paris with visits to iconic landmarks.', 7, '2024-10-01 14:27:32', '2024-10-03 07:20:01'),
(28, 'New York', 'USA', 1800.00, 'Experience the bustling city of New York with a mix of sightseeing and leisure.', 6, '2024-10-01 14:27:32', '2024-10-01 14:27:32'),
(29, 'Rome', 'Italy', 1700.00, 'Journey through the historic city of Rome with guided tours of ancient sites.', 5, '2024-10-01 14:27:32', '2024-10-01 14:27:32'),
(30, 'Sydney', 'Australia', 1600.00, 'Enjoy the beautiful city of Sydney with beach visits and city tours.', 4, '2024-10-01 14:27:32', '2024-10-01 14:27:32'),
(31, 'Bangkok', 'Thailand', 1400.00, 'Immerse yourself in the vibrant culture of Bangkok with temple visits and street food tours.', 5, '2024-10-01 14:27:32', '2024-10-01 14:27:32'),
(32, 'Cape Town', 'South Africa', 1900.00, 'Explore the scenic beauty of Cape Town with nature tours and city excursions.', 6, '2024-10-01 14:27:32', '2024-10-01 14:27:32'),
(33, 'Rio de Janeiro', 'Brazil', 1750.00, 'Experience the lively city of Rio with beach visits and cultural tours.', 5, '2024-10-01 14:27:32', '2024-10-01 14:27:32'),
(34, 'Dubai', 'UAE', 2100.00, 'Discover the modern marvels of Dubai with luxury tours and desert safaris.', 4, '2024-10-01 14:27:32', '2024-10-01 14:27:32'),
(35, 'Istanbul', 'Turkey', 1600.00, 'Explore the historic and cultural richness of Istanbul with guided tours.', 5, '2024-10-01 14:27:32', '2024-10-01 14:27:32'),
(36, 'siargao', 'philippines', 100.00, '13', 13, '2024-10-02 02:33:29', '2024-10-02 02:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin1@example.com', 'pass123', '2024-10-01 07:43:24', '2024-10-01 07:43:24');

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
(79, 'paul', 'mapula.pauljoshua@gmail.com', 'c64446e21af23681467645c4936722e806bc5269294870ad54d206a070cd0312e69f2648c462f5b101f06f21c440bc41a7a7965a63a60457a5c4f8abd4ecd449OHL4wZo+fXdOuvyJnI/pNjRt1KjhDEVo9v1uHbYpSlo=', '2024-10-01 03:50:05', '2024-10-01 03:50:05'),
(80, 'ushuay', 'mapulasd.pauljoshua@gmail.com', 'ae34ca5e7e2a9e77b63fd9fe6fed44b2c40e3449aee5133391a54643b6c98af99f64de92c8e08746adf1e0fdfe253e722c86863a398a292cd8b0bd7b2fee50edvTw1c7+jo8c+yxNzkTfRXY9OBRq/ZW0qDHyi6ky6l1w=', '2024-10-01 03:52:12', '2024-10-01 03:52:12'),
(81, '123', 'msdapula.pauljoshua@gmail.com', 'c4a35a93b9fb09bb2e9a06aa5f9f1ef1ce780579f623c83711070893a10076d394e788e917a279b637e227c9392612f0a5d854ec033a9c5ddf7271ed36a9d918HKZj0FmZqhm22k+AvcREL9uNse50Vjcg+Myz4qVjQrk=', '2024-10-01 05:43:37', '2024-10-01 05:43:37'),
(83, 'mapula', 'mapula.paudgsdggljoshua@gmail.com', '66d4aaf8aeb930dcd9de60218cc8b93c623d84c81111c7d28bf90e6d6f9d3483d607d171c9a6a15795f2afb2816d6f5ae4c600aa52175e2104674b647a4559cd2xyyC0CQSQn6ar3XU2GCX3JPN25PrxaCVgTL916txXU=', '2024-10-01 07:01:49', '2024-10-01 07:01:49');

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
(35, 'paul', 'c64446e21af23681467645c4936722e806bc5269294870ad54d206a070cd0312e69f2648c462f5b101f06f21c440bc41a7a7965a63a60457a5c4f8abd4ecd449OHL4wZo+fXdOuvyJnI/pNjRt1KjhDEVo9v1uHbYpSlo=', 'Paul Joshua', 'G', 'Mapula', 'mapula.pauljoshua@gmail.com', '09958541242', '2024-10-22', 'Male', 'Filipino', 79, '2024-09-30 21:50:05', '2024-09-30 21:50:05'),
(36, 'ushuay', 'ae34ca5e7e2a9e77b63fd9fe6fed44b2c40e3449aee5133391a54643b6c98af99f64de92c8e08746adf1e0fdfe253e722c86863a398a292cd8b0bd7b2fee50edvTw1c7+jo8c+yxNzkTfRXY9OBRq/ZW0qDHyi6ky6l1w=', 'Paul Joshua', 'G', 'Mapula', 'mapulasd.pauljoshua@gmail.com', '09958541242', '2024-10-03', 'Male', 'Filipino', 80, '2024-09-30 21:52:12', '2024-09-30 21:52:12'),
(37, '123', 'c4a35a93b9fb09bb2e9a06aa5f9f1ef1ce780579f623c83711070893a10076d394e788e917a279b637e227c9392612f0a5d854ec033a9c5ddf7271ed36a9d918HKZj0FmZqhm22k+AvcREL9uNse50Vjcg+Myz4qVjQrk=', 'Paul Joshua', 'G', 'Mapula', 'msdapula.pauljoshua@gmail.com', '09958541242', '2024-10-08', 'Male', 'Filipino', 81, '2024-09-30 23:43:37', '2024-09-30 23:43:37'),
(38, 'mapula', '66d4aaf8aeb930dcd9de60218cc8b93c623d84c81111c7d28bf90e6d6f9d3483d607d171c9a6a15795f2afb2816d6f5ae4c600aa52175e2104674b647a4559cd2xyyC0CQSQn6ar3XU2GCX3JPN25PrxaCVgTL916txXU=', 'Paul Joshua', 'F', 'Mapula', 'mapula.paudgsdggljoshua@gmail.com', '09958541242', '2024-10-08', 'Male', 'Filipino', 83, '2024-10-01 01:01:49', '2024-10-01 01:01:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tourID` (`tourID`),
  ADD KEY `groupID` (`groupID`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupLeaderID` (`groupLeaderID`);

--
-- Indexes for table `grouppassenger`
--
ALTER TABLE `grouppassenger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupID` (`groupID`),
  ADD KEY `passengerID` (`passengerID`);

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
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tourPackageID` (`tourPackageID`),
  ADD KEY `admin_id` (`admin_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grouppassenger`
--
ALTER TABLE `grouppassenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `itinerary`
--
ALTER TABLE `itinerary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tourpackage`
--
ALTER TABLE `tourpackage`
  MODIFY `tourpackage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`tourID`) REFERENCES `tour` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`groupID`) REFERENCES `group` (`id`);

--
-- Constraints for table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_ibfk_1` FOREIGN KEY (`groupLeaderID`) REFERENCES `passenger` (`id`);

--
-- Constraints for table `grouppassenger`
--
ALTER TABLE `grouppassenger`
  ADD CONSTRAINT `grouppassenger_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `group` (`id`),
  ADD CONSTRAINT `grouppassenger_ibfk_2` FOREIGN KEY (`passengerID`) REFERENCES `passenger` (`id`);

--
-- Constraints for table `itinerary`
--
ALTER TABLE `itinerary`
  ADD CONSTRAINT `itinerary_ibfk_1` FOREIGN KEY (`tourPackageID`) REFERENCES `tourpackage` (`tourpackage_id`);

--
-- Constraints for table `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`tourPackageID`) REFERENCES `tourpackage` (`tourpackage_id`),
  ADD CONSTRAINT `tour_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `useradmin` (`id`);

--
-- Constraints for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD CONSTRAINT `userregistration_ibfk_1` FOREIGN KEY (`loginID`) REFERENCES `userlogin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
