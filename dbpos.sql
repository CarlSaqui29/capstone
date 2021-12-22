-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 06:43 AM
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
  `contact` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact`, `address`, `note`) VALUES
(1, 'John', '09876543210', 'New York', 'None');

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
  `bottles` varchar(100) NOT NULL,
  `receivecall` varchar(100) NOT NULL,
  `mop` text NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `fbname`, `concern`, `question`, `phone`, `extraphone`, `address`, `landmark`, `province`, `city`, `barangay`, `bottles`, `receivecall`, `mop`, `note`) VALUES
(1, 'DSFGSFGDSF', 'SGSFH', '123123', 'Matagal na', 123123, 123123, 'asASasAS', 'ASasAS', 'ASasASas', 'asASas', 'asASsAS', 'C.) BOTTLES: P2,700 ONLY! FREE Shipping (SAVE P1,770) - Good for 1 month + FREE one Alcohol with Spr', 'Morning (8am-11am)', '', 'ASasAS'),
(2, 'ASD', 'ASDASD', '123', 'Matagal na', 3241, 34, '234', 'ASasAS', 'ASasASas', 'asASas', 'asASsAS', 'A.) BOTTLE: P1,135 ONLY! FREE Shipping (SAVE P635) - Good for 2 weeks.', 'Morning (8am-11am)', 'CASH ON DELIVERY', 'SDF'),
(3, 'Carl Doe', 'ASDAS', 'ASD', 'Matagal na', 123123, 123, 'Blk 17 lot 4', '123', '123', 'Chicago', '123', 'A.) BOTTLE: P1,135 ONLY! FREE Shipping (SAVE P635) - Good for 2 weeks.', 'Morning (8am-11am)', 'GCASH (09656526461)', '123'),
(4, 'Carl Doe', 'SGSFH', '123123', 'Matagal na', 123, 123, 'Blk 17 lot 4', 'SDFAS', '123', 'Chicago', 'ASDF', 'A.) BOTTLE: P1,135 ONLY! FREE Shipping (SAVE P635) - Good for 2 weeks.', 'Morning (8am-11am)', 'on', 'FASFASDF'),
(5, 'sadaa', 'sd', 'asd', 'Matagal na', 123123, 123, 'sdvasv', 'ASasAS', 'ASasASas', 'asASas', '312vssav', 'A.) BOTTLE: P1,135 ONLY! FREE Shipping (SAVE P635) - Good for 2 weeks.', 'Morning (8am-11am)', 'CASH ON DELIVERY', 'savv'),
(6, 'Carl Doe', 'ASDASD', '123123', 'Matagal na', 123123, 123123, 'Blk 17 lot 4', 'SDFAS', '123', 'Chicago', 'asASsAS', 'A.) BOTTLE: P1,135 ONLY! FREE Shipping (SAVE P635) - Good for 2 weeks.', 'Morning (8am-11am)', 'CASH ON DELIVERY', 'afafasfd'),
(7, 'Carl Doe', 'ASDASD', 'ASD', 'Matagal na', 123123, 123123, 'Blk 17 lot 4', 'ASasAS', '123', 'Chicago', 'asASsAS', 'A.) BOTTLE: P1,135 ONLY! FREE Shipping (SAVE P635) - Good for 2 weeks.', 'Morning (8am-11am)', 'IMG-61c01df51f8f50.73270085.png', 'asdasdas'),
(8, 'Carl Doe', 'ASDASD', 'ASD', 'Matagal na', 123123, 123123, 'Blk 17 lot 4', 'ASasAS', '123', 'Chicago', 'ASDF', 'A.) BOTTLE: P1,135 ONLY! FREE Shipping (SAVE P635) - Good for 2 weeks.', 'Morning (8am-11am)', 'IMG-61c01e5b399b93.75716520.png', 'asdasdasd'),
(9, 'andrei adi', 'SGSFH', 'ASD', 'Matagal na', 123123, 123123, 'Blk 17 lot 4', 'SDFAS', 'ASasASas', 'Chicago', 'asASsAS', 'A.) BOTTLE: P1,135 ONLY! FREE Shipping (SAVE P635) - Good for 2 weeks.', 'Morning (8am-11am)', 'IMG-61c01ec49d20f0.06750545.png', 'svasv');

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
  `signal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `quantity`, `purchase`, `retail`, `supplier`, `img_url`, `signal`) VALUES
(1, 'Health and Wellness', 'milktea', 85, 20, 30, 'Mangboks Betamax', 'IMG-61b963bce0d3f5.43008005.jpg', 0),
(2, 'Health and Wellness', 'Coffee', 31, 100, 110, 'Mangboks Betamax', 'IMG-61b983d45ce753.90160732.jpg', 0);

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
(1, '2021-12-15', '', 'Health and Wellness', 'milktea', 30, 10, 300, 100, 300, 0),
(2, '2021-12-15', 'John', 'Health and Wellness', 'milktea', 30, 20, 600, 200, 1000, 400),
(3, '2021-12-15', 'John', 'Health and Wellness', 'milktea', 30, 10, 300, 100, 1000, 700),
(4, '2021-12-15', 'John', 'Health and Wellness', 'milktea', 30, 10, 0, 0, 1000, 0),
(5, '2021-12-15', 'John', 'Health and Wellness', 'milktea', 30, 10, 300, 100, 1000, 700),
(6, '2021-12-15', 'John', 'Health and Wellness', 'milktea', 30, 10, 300, 100, 1000, 700),
(7, '2021-12-15', 'John', 'Health and Wellness', 'milktea', 30, 1, 30, 10, 100, 70),
(8, '2021-12-15', 'John', 'Health and Wellness', 'milktea', 30, 1, 0, 0, 100, 0),
(9, '2021-12-15', 'John', 'Health and Wellness', 'milktea', 30, 20, 600, 200, 1000, 400),
(10, '2021-12-15', 'John', 'Health and Wellness', 'milktea', 30, 8, 240, 80, 500, 260),
(11, '2021-12-15', 'John', 'Health and Wellness', 'Coffee', 110, 10, 1100, 100, 2000, 900),
(12, '2021-12-15', 'John', 'Health and Wellness', 'Coffee', 110, 5, 550, 50, 1000, 450),
(13, '2021-12-16', 'John', 'Health and Wellness', 'Coffee', 110, 20, 2200, 200, 10000, 7800),
(14, '2021-12-16', 'John', 'Health and Wellness', 'Coffee', 110, 20, 2200, 200, 10000, 7800),
(15, '2021-12-16', 'John', 'Health and Wellness', 'milktea', 30, 1, 30, 10, 133, 103),
(16, '2021-12-16', 'John', 'Health and Wellness', 'Coffee', 110, 12, 1320, 120, 121212, 119892),
(17, '2021-12-20', 'John', 'Health and Wellness', 'milktea', 30, 12, 360, 120, 1212, 852),
(18, '2021-12-20', 'John', 'Health and Wellness', 'milktea', 30, 10, 300, 100, 1212, 912),
(19, '2021-12-20', 'John', 'Health and Wellness', 'Coffee', 110, 1, 110, 10, 1002, 892),
(20, '2021-12-20', 'John', 'Health and Wellness', 'milktea', 30, 3, 90, 30, 100, 10),
(21, '2021-12-20', 'John', 'Health and Wellness', 'Coffee', 110, 1, 110, 10, 1212, 1102);

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
(1, 'milktea', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 54),
(2, 'Coffee', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 69);

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
(1, 'milktea', 3, 0, 0, 0),
(2, 'Coffee', 2, 0, 0, 0);

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
(1, 'milktea', 3, 0, 0, 0, 0, 0, 0),
(2, 'Coffee', 1, 0, 0, 0, 0, 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dayspass`
--
ALTER TABLE `dayspass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `salesreport`
--
ALTER TABLE `salesreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salesreport1`
--
ALTER TABLE `salesreport1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salesreport2`
--
ALTER TABLE `salesreport2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
