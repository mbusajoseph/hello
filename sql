-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2021 at 02:48 AM
-- Server version: 10.1.48-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpletech_tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `national_parks`
--

CREATE TABLE `national_parks` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `national_parks`
--

INSERT INTO `national_parks` (`id`, `name`, `location`, `description`) VALUES
(1, 'Machizon N.P', 'Kasese', NULL),
(2, 'Queen Elizabeth', 'Kasese', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(10) NOT NULL,
  `price` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `national_park_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `price`, `name`, `national_park_id`) VALUES
(1, '100000', 'Golden', 1),
(2, '75000', 'Silver', 1);

-- --------------------------------------------------------

--
-- Table structure for table `park_orders`
--

CREATE TABLE `park_orders` (
  `id` int(10) NOT NULL,
  `package_id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `phone_number` varchar(15) NOT NULL,
  `date_ordered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `park_orders`
--

INSERT INTO `park_orders` (`id`, `package_id`, `status`, `phone_number`, `date_ordered`) VALUES
(1, 1, 'pending', '+256775445677', '2021-01-31 09:29:56'),
(2, 1, 'pending', '+256773463487', '2021-01-31 13:34:09'),
(4, 1, 'pending', '+256773463487', '2021-02-01 02:28:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `national_parks`
--
ALTER TABLE `national_parks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `national_park_id` (`national_park_id`);

--
-- Indexes for table `park_orders`
--
ALTER TABLE `park_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_id` (`package_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `national_parks`
--
ALTER TABLE `national_parks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `park_orders`
--
ALTER TABLE `park_orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
