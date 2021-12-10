-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost: 3307
-- Generation Time: Dec 10, 2021 at 10:54 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact`, `address`, `note`) VALUES
(8, 'Paolo Asoy', '09456465465', 'Quezon City', 'na'),
(9, 'Carl Moneda', '09431215641', 'Valenzuela', 'na'),
(13, 'John Wick', '10101010101', 'New York', 'Excumonicado');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fbname` varchar(50) NOT NULL,
  `concern` varchar(50) NOT NULL,
  `question` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `extraphone` int(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `bottles` varchar(100) NOT NULL,
  `receivecall` varchar(100) NOT NULL,
  `mop` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `fbname`, `concern`, `question`, `phone`, `extraphone`, `address`, `landmark`, `province`, `city`, `barangay`, `bottles`, `receivecall`, `mop`, `note`) VALUES
(5, 'Avor John A. Narag', 'Aj Narag', 'Wala', 'Matagal na', 2147483647, 0, 'blk 3 lot 8 meadow park subdivision, molino 4', 'Molino', 'cavite', 'bacoor city', 'Molino 4', 'C.) BOTTLES: P2,700 ONLY! FREE Shipping (SAVE P1,770) - Good for 1 month + FREE one Alcohol with Spr', 'Afternoon (1pm-5pm)', 'CASH ON DELIVERY', 'Deliver within weekdays around 1-2pm');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase` int(11) NOT NULL,
  `retail` int(11) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `img_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `quantity`, `purchase`, `retail`, `supplier`, `img_url`) VALUES
(29, 'Health and Wellness', 'milktea', 100, 80, 90, 'Kakanin atb.', 'IMG-619b4a493aaf32.01576486.jpg'),
(30, 'Health and Wellness', 'Milk Shake', 88, 30, 35, 'Street Quek Quek', 'IMG-619b4ac69117e9.33647496.jpg'),
(32, 'Health and Wellness', 'Coke Float', 40, 150, 200, 'Stick Fish ball', 'IMG-61ae1a2543f971.90101930.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `dates` date NOT NULL,
  `customers` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amnt` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `tendered` int(11) NOT NULL,
  `changed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `dates`, `customers`, `category`, `name`, `amnt`, `quantity`, `total`, `profit`, `tendered`, `changed`) VALUES
(54, '2021-11-24', 'AJ', 'Health and Wellness', 'milktea', 90, 80, 7200, 800, 10000, 2800),
(55, '2021-11-25', 'Paolo Asoy', 'Health and Wellness', 'Milk Shake', 35, 86, 3010, 430, 4000, 990),
(56, '2021-11-25', 'Paolo Asoy', 'Health and Wellness', 'milktea', 90, 95, 8550, 950, 10000, 1450),
(57, '2021-11-25', 'Paolo Asoy', 'Health and Wellness', 'milktea', 90, 85, 7650, 850, 8000, 350),
(58, '2021-11-25', 'Paolo Asoy', 'Health and Wellness', 'milktea', 90, 85, 7650, 850, 8000, 350),
(59, '2021-11-25', 'Paolo Asoy', 'Health and Wellness', 'milktea', 90, 85, 7650, 850, 8000, 350),
(60, '2021-11-25', 'Paolo Asoy', 'Health and Wellness', 'Milk Shake', 35, 90, 3150, 450, 4000, 850),
(61, '2021-11-25', 'Carl Moneda', 'Health and Wellness', 'milktea', 90, 95, 8550, 950, 9000, 450),
(62, '2021-11-25', 'Paolo Asoy', 'Health and Wellness', 'milktea', 90, 95, 8550, 950, 9000, 450),
(63, '2021-11-30', 'Paolo Asoy', 'Health and Wellness', 'milktea', 90, 85, 7650, 850, 10000, 2350),
(64, '2021-12-06', 'Paolo Asoy', 'Health and Wellness', 'milktea', 90, 85, 7650, 850, 10000, 2350),
(65, '2021-12-07', 'Paolo Asoy', 'Health and Wellness', 'milktea', 90, 85, 7650, 850, 100000, 92350),
(66, '2021-12-07', 'Paolo Asoy', 'Health and Wellness', 'milktea', 90, 85, 7650, 850, 100000, 92350),
(67, '2021-12-09', 'Paolo Asoy', 'Health and Wellness', 'milktea', 90, 86, 7740, 860, 10000, 2260),
(68, '2021-12-09', 'Paolo Asoy', 'Health and Wellness', 'Milk Shake', 35, 95, 3325, 475, 10000, 6675),
(69, '2021-12-09', 'Paolo Asoy', 'Health and Wellness', 'milktea', 90, 85, 7650, 850, 10000, 2350),
(70, '2021-12-09', 'Paolo Asoy', 'Health and Wellness', 'Milk Shake', 35, 94, 3290, 470, 10000, 6710),
(71, '2021-12-09', '', 'Health and Wellness', 'milktea', 90, 0, 0, 0, 0, 0),
(72, '2021-12-09', '', 'Health and Wellness', 'Milk Shake', 35, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `suppliername` varchar(100) NOT NULL,
  `contactperson` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contactno` varchar(11) NOT NULL,
  `note` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `suppliername`, `contactperson`, `address`, `contactno`, `note`) VALUES
(14, 'Siomai tbp.', 'Jezzy Jaime', 'Caloocan', '09646454564', 'NaN'),
(19, 'Eyyjay', 'Aj Narag', 'Blk 3 Lot 8 Meadow Park ', '09089637505', 'N/a');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `access` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `access`) VALUES
(1, 'admin', 'admin', 'Admin'),
(2, 'salesperson', 'salesperson', 'Salesperson');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`,`name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`,`category`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
