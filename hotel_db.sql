-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2024 at 03:36 AM
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
-- Database: `hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `role`) VALUES
(1, 'admin@admin.com', '$2y$10$JUAvr4KfA0u8UI3WWPClnOqGWE/zbzhFzrqEa.iFPkw4UQnYRYmgy', 'admin'),
(2, 'user@user.com', '$2y$10$s9IWPqq83aJm1RRpBmcF4Ordg/PS.lLHMI//CoYNp5U/DWyt/.Jlq', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `guests` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `payment_status` enum('pending','paid') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `full_name`, `email`, `phone`, `check_in`, `check_out`, `guests`, `room_id`, `total_price`, `payment_status`) VALUES
(1, 'Ronald', 'ronaldjustin260@gmail.com', '089653825303', '2024-12-20', '2024-12-23', 2, 1, 6000000, 'paid'),
(2, 'Irghy', 'imanuelirghy12@gmail.com', '082111811849', '2024-12-14', '2024-12-16', 2, 1, 4000000, 'paid'),
(4, 'Jennifer', 'jenifer12@gmail.com', '2327342354', '2024-12-11', '2024-12-13', 5, 1, 4000000, 'paid'),
(8, 'Alwin', 'alwin2@gmail.com', '432435467245', '2024-12-28', '2024-12-30', 3, 1, 4000000, 'pending'),
(10, 'Alwin', 'alwin12@gmail.com', '128324327543', '2024-12-21', '2024-12-28', 3, 1, 14000000, 'pending'),
(12, 'Alwin', 'alwin@gamil.com', '2231242', '2024-12-21', '2024-12-28', 5, 1, 14000000, 'pending'),
(14, 'Juandy', 'juandy12@gmail.com', '2314314565', '2024-12-26', '2024-12-29', 7, 4, 3000000, 'paid'),
(15, 'Saya', 'saya12@gmail.com', '2131425456', '2024-12-27', '2024-12-28', 2, 1, 2000000, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `facilities` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `description`, `price`, `facilities`) VALUES
(1, 'Deluxe ', 'Kamar dengan kualitas terbaik yang mantap', 2000000, 'AC, TV, Double Bed, Kamar mandi'),
(2, 'Superior', 'Fasilitas yang Modern tapi mempunyai kesan mewah', 1500000, 'Master Bed, Wifi, AC, TV'),
(4, 'Eksekutif', 'Menawarkan kenyamanan dan kemewahan', 1000000, 'single bed, AC, TV');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
