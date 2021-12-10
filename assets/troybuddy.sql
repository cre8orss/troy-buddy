-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 07:07 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

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
  `loc_type` varchar(100) NOT NULL,
  `loc_desc` varchar(1000) NOT NULL,
  `lng` double NOT NULL,
  `lat` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `loc_name`, `loc_type`, `loc_desc`, `lng`, `lat`) VALUES
(3, 'Amante\'s Pizza', 'Restaurant', 'A broad mix of Italian, American & global comfort foods is dished out in a quaint house.', -73.67537689208984, 42.73662185668945),
(11, 'Famous Lunch', 'Restaurant', 'Narrow joint with counter seats serving hot dogs, burgers & breakfast, plus sides & pie, since 1932.', -73.68910217285156, 42.72876739501953),
(16, 'Testing', 'Restaurant', 'Very authentic hospital food', -73.67324829101562, 42.732723236083984),
(18, 'Dinosaur BBQ', 'Restaurant', 'Barbecue chain serving Southern-style meats & draft brews in a retro setting (most have live music).', -73.69567256025243, 42.72789980574481),
(19, 'Bite of Xian', 'Restaurant', 'Chinese restaurant with a solid selection.', -73.68018474480105, 42.72381838827067),
(20, 'Rensselaer Student Union', 'Student Hub', 'Student union with convenience stores and food.', -73.67663326500879, 42.72990002396216);

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
('Dinosaur BBQ', '377 River St, Troy, NY 12180', '(518) 308-0400', 'https://www.dinosaurbarbque.com'),
('La Capital Tacos', '161 4th St, Troy, NY 12180', '(518) 244-5132', 'https://www.lacapitaltacostroy.com/'),
('The Whistling Kettle', '254 Broadway, Troy, NY 12180', '(518) 874-1938', 'https://www.thewhistlingkettle.com'),
('Uncle Sam Grave', '50 101st Street Troy, NY 12180', '(518) 272-7520', 'https://www.oakwoodcemetery.org/'),
('Rensselaer Poyltechnic Institute', '110 8th Street, Troy NY 12180', '(518) 276-6000', 'https://www.rpi.edu/'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
