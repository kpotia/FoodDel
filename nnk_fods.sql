-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2019 at 08:03 AM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nnk_fods`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `addr_name` varchar(50) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `region` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `house No` varchar(15) NOT NULL,
  `addr_description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `addr_name`, `customer_id`, `region`, `city`, `area`, `street`, `house No`, `addr_description`) VALUES
(1, 'home', 1, 'greater accra', 'accra', 'kokomlemle', 'heart av.', '14', 'benz gate \r\n'),
(2, 'work', 1, 'greater accra', 'accra', 'kokomlemle', 'heart av.', '14', 'benz gate \r\n'),
(3, 'gym', 1, 'greater accra', 'accra', 'kokomlemle', 'heart av.', '14', 'benz gate \r\n'),
(5, 'chez pat', 1, 'greater accra', 'accra', 'adabraka', 'watson', '32', 'behind the Holly spirit catedral');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2019-09-22 03:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `sname`, `email`, `password`, `phone`, `city`, `region`) VALUES
(1, 'patrick', 'ametepe', 'pa@trick.co', '81dc9bdb52d04dc20036dbd8313ed055', '990990909', 'accra', 'greater accra');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) NOT NULL,
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `address_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `rider_id` int(11) DEFAULT NULL,
  `status` enum('pending','cooking','ready for pickup','on the way','delivered') NOT NULL DEFAULT 'pending',
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customerid`, `datetime`, `address_id`, `total`, `rider_id`, `status`, `paid`) VALUES
(1, 1, '2019-09-25 18:03:33', 3, '99.00', 0, 'pending', 0),
(2, 1, '2019-09-26 01:28:00', 3, '160.00', NULL, 'pending', 0),
(3, 1, '2019-09-26 01:28:57', 3, '160.00', NULL, 'pending', 0),
(4, 1, '2019-09-26 03:40:55', 2, '30.00', NULL, 'pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `od_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` decimal(4,2) NOT NULL,
  PRIMARY KEY (`od_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`od_id`, `order_id`, `food_id`, `qty`, `subtotal`) VALUES
(1, 3, 6, 6, '90.00'),
(2, 3, 5, 4, '52.00'),
(3, 3, 7, 1, '18.00'),
(4, 4, 6, 1, '15.00'),
(5, 4, 9, 3, '15.00');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

DROP TABLE IF EXISTS `product_details`;
CREATE TABLE IF NOT EXISTS `product_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  `category` enum('dish','drink') NOT NULL,
  `photo` varchar(255) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `name`, `description`, `category`, `photo`, `price`) VALUES
(8, 'sandwish', 'weird sandwissh', 'dish', '3.jpg', '24.00'),
(7, 'cheese burger', 'cheese chicken burger', 'dish', '7.jpg', '18.00'),
(6, 'burger', 'chicken burger', 'dish', '5.jpg', '15.00'),
(5, 'try our crispy', 'crispy chicken', 'dish', '2.jpg', '13.00'),
(9, 'cripotato', 'fried potatoes', 'dish', '8.jpg', '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `rider`
--

DROP TABLE IF EXISTS `rider`;
CREATE TABLE IF NOT EXISTS `rider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rider_fname` varchar(30) NOT NULL,
  `rider_lname` varchar(30) NOT NULL,
  `rider_phone` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(90) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
