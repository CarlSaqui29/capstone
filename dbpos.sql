-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 01:03 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

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
  `fbname` varchar(100) NOT NULL,
  `concern` varchar(100) NOT NULL,
  `question` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `extraphone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `fbname`, `concern`, `question`, `phone`, `extraphone`, `address`, `note`) VALUES
(1, 'Avor John A. Narag', 'Aj Narag', 'Wala', 'Bago pa lang', '09089637505', '', 'blk 3 lot 8 meadow park subdivision, molino 4', 'Deliver within weekdays around 1-5pm'),
(2, 'Nerissa', 'Nerissa Mae', 'Wala', 'Bago pa lang', '0921294026', '', 'Bulakin 1, Dolores, Quezon', 'Deliver within weekdays around 1-5pm'),
(3, 'Aj', 'Aj Narag', 'Wala', 'Bago pa lang', '09089637505', '', 'blk 3 lot 8 meadow park subdivision, molino 4', 'Deliver within weekdays around 1-5pm'),
(4, 'Mark Zelon Narag', 'Marky', 'Wala', 'Matagal na', '09089637505', '', 'blk 3 lot 8 meadow park subdivision, molino 4', 'Deliver within weekdays around 1-5pm'),
(5, 'Aj', 'Aj Narag', 'Wala', 'Matagal na', '09089637505', '', 'blk 3 lot 8 meadow park subdivision, molino 4', 'Deliver within weekdays around 1-5pm');

-- --------------------------------------------------------

--
-- Table structure for table `dayspass`
--

CREATE TABLE `dayspass` (
  `id` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dayspass`
--

INSERT INTO `dayspass` (`id`, `days`, `week`, `year`) VALUES
(1, 1, 1, 0);

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
  `products` varchar(100) NOT NULL,
  `bottles` int(11) NOT NULL,
  `receivecall` varchar(100) NOT NULL,
  `mop` text NOT NULL,
  `note` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `trackno` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `fbname`, `concern`, `question`, `phone`, `extraphone`, `address`, `landmark`, `province`, `city`, `barangay`, `products`, `bottles`, `receivecall`, `mop`, `note`, `status`, `trackno`) VALUES
(1, 'Avor John A. Narag', 'Aj Narag', 'Wala', 'Bago pa lang', 2147483647, 0, 'blk 3 lot 8 meadow park subdivision, molino 4', 'Molino', 'cavite', 'bacoor city', 'Molino 4', 'Coke Float', 2, 'Evening (6pm-10pm)', 'CASH ON DELIVERY', 'Deliver within weekdays around 1-5pm', 'SHIPPED', '456456'),
(2, 'Nerissa', 'Nerissa Mae', 'Wala', 'Bago pa lang', 921294026, 0, 'Bulakin 1, Dolores, Quezon', 'Batos spring ', 'Quezon', 'Dolores', 'Bulakin 1', 'Coke Float', 2, 'Morning (8am-11am)', 'CASH ON DELIVERY', 'Deliver within weekdays around 1-5pm', 'RETURNED', '456789'),
(3, 'Aj', 'Aj Narag', 'Wala', 'Bago pa lang', 2147483647, 0, 'blk 3 lot 8 meadow park subdivision, molino 4', 'Molino', 'cavite', 'bacoor city', 'Molino 4', 'Chocolate', 3, 'Morning (8am-11am)', 'CASH ON DELIVERY', 'Deliver within weekdays around 1-5pm', 'RETURNED', '78945646'),
(4, 'Mark Zelon Narag', 'Marky', 'Wala', 'Matagal na', 2147483647, 0, 'blk 3 lot 8 meadow park subdivision, molino 4', 'Molino', 'cavite', 'bacoor city', 'Molino 4', 'Chocolate', 2, 'Evening (6pm-10pm)', 'CASH ON DELIVERY', 'Deliver within weekdays around 1-5pm', 'SHIPPED', '456456456'),
(5, 'Aj', 'Aj Narag', 'Wala', 'Matagal na', 2147483647, 0, 'blk 3 lot 8 meadow park subdivision, molino 4', 'Molino', 'cavite', 'bacoor city', 'Molino 4', 'Coke Float', 2, '', 'GCASH (09656526461) IMG-61d7c9573773e1.29479934.jpg', 'Deliver within weekdays around 1-5pm', 'NEW', '');

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
  `img_url` text NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `quantity`, `purchase`, `retail`, `supplier`, `img_url`, `code`) VALUES
(1, 'Health and Wellness', 'Chocolate', 133, 150, 200, 'GFOXX', 'IMG-61d6ec31979754.40629967.png', '3DcAM01'),
(2, 'Health and Wellness', 'Coke Float', 150, 100, 120, 'GFOXX', 'IMG-61d6ec7a18a354.38204182.jpg', 'wriasef'),
(3, 'Weight Management', 'Asus Laptop', 100, 10000, 15000, 'Eyyjay', 'IMG-61ec996f1a2d79.53512477.jpg', 'jHx8ZUf');

-- --------------------------------------------------------

--
-- Table structure for table `requested`
--

CREATE TABLE `requested` (
  `id` int(11) NOT NULL,
  `products` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `dates` date NOT NULL,
  `customers` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amnt` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `tendered` int(11) NOT NULL,
  `changed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `dates`, `customers`, `category`, `name`, `amnt`, `quantity`, `total`, `profit`, `tendered`, `changed`) VALUES
(6, '2022-01-04', 'Avor John A. Narag', 'Health and Wellness', 'Coke Float', 100, 7, 700, 350, 5000, 4300),
(7, '2022-01-05', 'Nerissa', 'Health and Wellness', 'Coke Float', 100, 2, 200, 100, 1000, 800),
(8, '2022-01-06', 'Avor John A. Narag', 'Health and Wellness', 'Chocolate', 200, 5, 1000, 250, 5000, 4000),
(9, '2022-01-06', 'Nerissa', 'Health and Wellness', 'Chocolate', 200, 4, 800, 200, 5000, 4200),
(10, '2022-01-06', 'Nerissa', 'Health and Wellness', 'Coke Float', 100, 5, 500, 250, 5000, 4500),
(11, '0000-00-00', '', '', '', 0, 0, 0, 0, 0, 0),
(12, '0000-00-00', '', '', '', 0, 0, 0, 0, 0, 0),
(13, '0000-00-00', '', '', '', 0, 0, 0, 0, 0, 0),
(14, '0000-00-00', '', '', '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salesreport`
--

CREATE TABLE `salesreport` (
  `id` int(11) NOT NULL,
  `nameOfProduct` varchar(100) NOT NULL,
  `january` int(11) NOT NULL,
  `february` int(11) NOT NULL,
  `march` int(11) NOT NULL,
  `april` int(11) NOT NULL,
  `may` int(11) NOT NULL,
  `june` int(11) NOT NULL,
  `july` int(11) NOT NULL,
  `august` int(11) NOT NULL,
  `september` int(11) NOT NULL,
  `october` int(11) NOT NULL,
  `november` int(11) NOT NULL,
  `december` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salesreport`
--

INSERT INTO `salesreport` (`id`, `nameOfProduct`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`) VALUES
(9, 'Coke Float', 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 'Cookies & Cream Ice Cream', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 'Chocolate', 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 'Chocolate', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 'Coke Float', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 'Asus Laptop', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salesreport1`
--

CREATE TABLE `salesreport1` (
  `id` int(11) NOT NULL,
  `nameOfProduct` varchar(100) NOT NULL,
  `week1` int(11) NOT NULL,
  `week2` int(11) NOT NULL,
  `week3` int(11) NOT NULL,
  `week4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salesreport1`
--

INSERT INTO `salesreport1` (`id`, `nameOfProduct`, `week1`, `week2`, `week3`, `week4`) VALUES
(9, 'Coke Float', 14, 0, 0, 0),
(10, 'Cookies & Cream Ice Cream', 0, 0, 0, 0),
(11, 'Chocolate', 9, 0, 0, 0),
(12, 'Chocolate', 0, 0, 0, 0),
(13, 'Coke Float', 0, 0, 0, 0),
(14, 'Asus Laptop', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salesreport2`
--

CREATE TABLE `salesreport2` (
  `id` int(11) NOT NULL,
  `nameOfProduct` varchar(100) NOT NULL,
  `monday` int(11) NOT NULL,
  `tuesday` int(11) NOT NULL,
  `wednesday` int(11) NOT NULL,
  `thursday` int(11) NOT NULL,
  `friday` int(11) NOT NULL,
  `saturday` int(11) NOT NULL,
  `sunday` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salesreport2`
--

INSERT INTO `salesreport2` (`id`, `nameOfProduct`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`) VALUES
(9, 'Coke Float', 0, 7, 2, 5, 0, 0, 0),
(10, 'Cookies & Cream Ice Cream', 0, 0, 0, 0, 0, 0, 0),
(11, 'Chocolate', 0, 0, 0, 4, 0, 0, 0),
(12, 'Chocolate', 0, 0, 0, 0, 0, 0, 0),
(13, 'Coke Float', 0, 0, 0, 0, 0, 0, 0),
(14, 'Asus Laptop', 0, 0, 0, 0, 0, 0, 0);

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
(4, 'Eyyjay', 'Aj', 'Blk 3 Lot 8 Meadow Park ', '09631478571', 'N/A'),
(5, 'GFOXX', 'Mozilla Fire Fox', 'Kentucky', '09631478572', 'N/A');

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
-- Indexes for table `dayspass`
--
ALTER TABLE `dayspass`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `requested`
--
ALTER TABLE `requested`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesreport`
--
ALTER TABLE `salesreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesreport1`
--
ALTER TABLE `salesreport1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesreport2`
--
ALTER TABLE `salesreport2`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dayspass`
--
ALTER TABLE `dayspass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requested`
--
ALTER TABLE `requested`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `salesreport`
--
ALTER TABLE `salesreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `salesreport1`
--
ALTER TABLE `salesreport1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `salesreport2`
--
ALTER TABLE `salesreport2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
