-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 08:12 PM
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
-- Database: `sportsrus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `user_id` int(6) UNSIGNED NOT NULL,
  `product_id` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(6) UNSIGNED NOT NULL,
  `c_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `c_name`) VALUES
(200001, 'Basketball'),
(200002, 'Tennis'),
(200003, 'Yoga and Aerobics'),
(200004, 'Swimming'),
(200005, 'Track and Field'),
(200006, 'Cricket'),
(200007, 'Football'),
(200008, 'Cardio and Calisthenics');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(6) UNSIGNED NOT NULL,
  `p_name` varchar(15) NOT NULL,
  `p_image` blob NOT NULL,
  `p_details` varchar(200) NOT NULL,
  `p_price` decimal(10,2) UNSIGNED NOT NULL,
  `user_id` int(6) UNSIGNED NOT NULL,
  `category_id` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(6) UNSIGNED NOT NULL,
  `f_name` varchar(15) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `city` varchar(20) NOT NULL,
  `rating` decimal(1,1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `f_name`, `l_name`, `phno`, `email_id`, `password`, `city`, `rating`) VALUES
(100003, 'Vriksha', 'Srihari ', '9884812161', 'vriksha.ariel@gmail.com', '$2y$10$.uy7VrbY5NmN.', 'Chennai', NULL),
(100004, 'a', 'Srihari ', '9123456780', 'a@gmail.com', '$2y$10$kGQ1bHVArHu5D', 'qwe', NULL),
(100005, 'b', 'Srihari ', '9811223344', 'b@gmail.com', '$2y$10$adirfgXSd6QsW', 'dfg', NULL),
(100006, 'c', 'Srihari ', '9022334455', 'c@gmail.com', '$2y$10$ZJutGMlb2dEp3', 'c', NULL),
(100007, 'd', 'Srihari ', '9123456708', 'd@gmail.com', '$2y$10$tRgUrtIHxSJh88MA/A4eoeE0m2oREzV9G89K1W4Af6iaLI.ZiRaWG', 'd', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD KEY `buyer_fk` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_fk` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `phno` (`phno`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200009;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300001;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100008;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `buyer_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `buyer_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
