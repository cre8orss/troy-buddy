-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 04:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `troybuddy`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `loc_name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `coordinates` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `search_locations`
--

CREATE TABLE `search_locations` (
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `search_locations`
--

INSERT INTO `search_locations` (`name`, `address`, `phone`, `website`) VALUES
('La Capital Tacos', '161 4th St, Troy, NY 12180', '(518) 244-5132', 'https://www.lacapitaltacostroy.com/'),
('Dinosaur BBQ', '377 River St, Troy, NY 12180', '(518) 308-0400', 'https://www.dinosaurbarbque.com'),
('The Whistling Kettle', '254 Broadway, Troy, NY 12180', '(518) 874-1938', 'https://www.thewhistlingkettle.com'),
('Uncle Sam Grave', '50 101st Street Troy, NY 12180', '(518) 272-7520', 'https://www.oakwoodcemetery.org/'),
('Rensselaer Polytechnic Institute', '110 8th Street, Troy NY 12180', '(518) 276-6000', 'https://www.rpi.edu/'),
('Russell Sage College', '65 1st St, Troy, NY 12180', '(518) 244-2000', 'https://www.sage.edu/'),
('Monument Square', '2 1st St, Troy, NY 12180', '(518) 272 2646', 'https://www.monumentsquareapts.com/'),
('Troy Savings Bank Music Hall', '30 2nd St, Troy, NY 12180', '(518) 273 0038', 'https://www.troymusichall.org/');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
