-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 05, 2015 at 05:45 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `braintree`
--

-- --------------------------------------------------------

--
-- Table structure for table `braintree_cart`
--

CREATE TABLE IF NOT EXISTS `braintree_cart` (
  `cart_id` int(11) NOT NULL,
  `product_id_fk` int(11) DEFAULT NULL,
  `user_id_fk` int(11) DEFAULT NULL,
  `order_id_fk` int(11) DEFAULT NULL,
  `cart_status` enum('0','1') DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `braintree_cart`
--

INSERT INTO `braintree_cart` (`cart_id`, `product_id_fk`, `user_id_fk`, `order_id_fk`, `cart_status`) VALUES
(2, 1, 1, 5, '1'),
(3, 1, 1, 6, '1'),
(4, 2, 1, 6, '1'),
(5, 1, 2, NULL, '0'),
(6, 2, 2, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `braintree_orders`
--

CREATE TABLE IF NOT EXISTS `braintree_orders` (
  `order_id` int(11) NOT NULL,
  `user_id_fk` int(11) DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `braintreeCode` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `braintree_orders`
--

INSERT INTO `braintree_orders` (`order_id`, `user_id_fk`, `created`, `braintreeCode`, `price`) VALUES
(1, 1, 1443544486, 'gh6cw8', 1299),
(2, 1, 1443544534, 'bdvzfp', 89),
(3, 2, 1443544725, 'k6p2wt', 89),
(5, 1, 1443545334, 'gzscyj', NULL),
(6, 1, 1443628092, '2x9dg8', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `braintree_products`
--

CREATE TABLE IF NOT EXISTS `braintree_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `product_desc` text,
  `price` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `braintree_products`
--

INSERT INTO `braintree_products` (`product_id`, `product_name`, `product_desc`, `price`) VALUES
(1, 'Fitnessity Registration', 'Fitnessity Registration Fee', 22),
(2, 'Fitnessity Membership', 'Fitnessity Membership Fee', 100);

-- --------------------------------------------------------

--
-- Table structure for table `braintree_users`
--

CREATE TABLE IF NOT EXISTS `braintree_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `braintree_users`
--

INSERT INTO `braintree_users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'exploremedia', 'e10adc3949ba59abbe56e057f20f883e', 'exploremedia.in@gmail.com'),
(2, 'manojaswal', '733d7be2196ff70efaf6913fc8bdcabf', 'manoj.aswal@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `braintree_cart`
--
ALTER TABLE `braintree_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id_fk` (`product_id_fk`),
  ADD KEY `user_id_fk` (`user_id_fk`),
  ADD KEY `order_id_fk` (`order_id_fk`);

--
-- Indexes for table `braintree_orders`
--
ALTER TABLE `braintree_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id_fk` (`user_id_fk`);

--
-- Indexes for table `braintree_products`
--
ALTER TABLE `braintree_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `braintree_users`
--
ALTER TABLE `braintree_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `braintree_cart`
--
ALTER TABLE `braintree_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `braintree_orders`
--
ALTER TABLE `braintree_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `braintree_products`
--
ALTER TABLE `braintree_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `braintree_users`
--
ALTER TABLE `braintree_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `braintree_cart`
--
ALTER TABLE `braintree_cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id_fk`) REFERENCES `braintree_products` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id_fk`) REFERENCES `braintree_users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`order_id_fk`) REFERENCES `braintree_orders` (`order_id`);

--
-- Constraints for table `braintree_orders`
--
ALTER TABLE `braintree_orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id_fk`) REFERENCES `braintree_users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
