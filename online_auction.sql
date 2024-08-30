-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 07:38 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE IF NOT EXISTS `auction` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `disc` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `price` int(225) NOT NULL,
  `s_time` datetime NOT NULL,
  `e_time` datetime NOT NULL,
  `u_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `initial_price` int(11) NOT NULL,
  `status` varchar(225) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`a_id`, `p_id`, `name`, `category`, `disc`, `image`, `price`, `s_time`, `e_time`, `u_id`, `date`, `initial_price`, `status`) VALUES
(2, 5, 'Smart Phone', 'Gadget', 'dvbc vx', 'download (4).jpg', 15000, '2023-07-14 16:27:00', '2023-07-14 16:29:00', 5, '2023-07-14', 10000, 'claimed'),
(4, 8, 'LED Light', 'Electronic ', 'figqeyufuhv', 'led.jpeg', 250, '2023-07-14 22:15:00', '2023-07-14 22:17:00', 5, '2023-07-14', 100, 'claimed');

-- --------------------------------------------------------

--
-- Table structure for table `a_payment`
--

CREATE TABLE IF NOT EXISTS `a_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `name` varchar(223) NOT NULL,
  `price` varchar(223) NOT NULL,
  `date` varchar(223) NOT NULL,
  `card` varchar(223) NOT NULL,
  `card_no` varchar(223) NOT NULL,
  `expdate` varchar(223) NOT NULL,
  `cvv` varchar(223) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `a_payment`
--

INSERT INTO `a_payment` (`id`, `p_id`, `name`, `price`, `date`, `card`, `card_no`, `expdate`, `cvv`) VALUES
(1, 2, 'Laptop', '9000', '2023-07-14', 'debit card', '1234567890123456', '12/24', '456'),
(2, 5, 'Smart Phone', '8000', '2023-07-14', 'debit card', '4562346876543234', '11/25', '456'),
(3, 8, 'LED Light', '200', '2023-07-14', 'debit card', '1234567890123456', '4/26', '567'),
(4, 9, 'Chair', '320', '2023-07-14', 'debit card', '1234567889012345', '9/25', '632');

-- --------------------------------------------------------

--
-- Table structure for table `a_sell`
--

CREATE TABLE IF NOT EXISTS `a_sell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `disc` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `price` int(225) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(225) NOT NULL,
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `a_sell`
--

INSERT INTO `a_sell` (`id`, `p_id`, `name`, `category`, `disc`, `image`, `price`, `date`, `status`, `u_id`) VALUES
(1, 2, 'Laptop', 'Gadget', 'nmjhvuyhkjbl', 'download (6).jpg', 1000, '2023-07-14', 'accepted', 6),
(2, 1, 'Table', 'furniture', 'gfytuyghvbnjk', 'download (3).jpg', 9000, '2023-07-14', 'accepted', 4),
(3, 3, 'Bed', 'furniture', ',nmkhgiuhlkn', 'download (2).jpg', 8000, '2023-07-14', 'accepted', 4),
(4, 4, 'Dress for kids', 'Cloth', 'guyihbkjnl', 'download.jpg', 20000, '0000-00-00', 'pending', 0),
(5, 9, 'Chair', 'furniture', 'jfbvekjenklv', 'download (9).jpg', 200, '0000-00-00', 'pending', 0),
(6, 7, 'Bed sheets', 'Cloth', 'hefvwi uabvger u', 'download (1).jpg', 500, '2023-07-14', 'pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE IF NOT EXISTS `bid` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `bid_amount` int(225) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`b_id`, `u_id`, `a_id`, `p_id`, `name`, `bid_amount`) VALUES
(1, 4, 2, 5, 'Smart Phone', 10015),
(2, 5, 2, 5, 'Smart Phone', 15000),
(3, 4, 4, 8, 'LED Light', 150),
(4, 5, 4, 8, 'LED Light', 250);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` varchar(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `amount` int(20) NOT NULL,
  `card_type` varchar(50) NOT NULL,
  `card_name` varchar(50) NOT NULL,
  `card_no` varchar(50) NOT NULL,
  `card_year` varchar(50) NOT NULL,
  `card_month` varchar(50) NOT NULL,
  `cvv` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `cdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `u_id`, `p_id`, `amount`, `card_type`, `card_name`, `card_no`, `card_year`, `card_month`, `cvv`, `status`, `cdate`) VALUES
(1, '5', 5, 15000, 'debit', 'Sharafu', '1234567123456789', '10', '2025', '187', 'completed', '2023-07-14'),
(2, '5', 8, 250, 'debit', 'Sharafu', '1234567890123456', '9', '2024', '378', 'completed', '2023-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` varchar(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `disc` varchar(225) NOT NULL,
  `price` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `u_id`, `name`, `category`, `disc`, `price`, `image`, `type`, `status`) VALUES
(1, '4', 'Table', 'furniture', 'gfytuyghvbnjk', '9000', 'download (3).jpg', 'Donated', 'approved'),
(2, '4', 'Laptop', 'Gadget', 'nmjhvuyhkjbl', '9000', 'download (6).jpg', 'Purchased', 'approved'),
(3, '5', 'Bed', 'furniture', ',nmkhgiuhlkn', '8000', 'download (2).jpg', 'Donated', 'approved'),
(4, '6', 'Dress for kids', 'Cloth', 'guyihbkjnl', '20000', 'download.jpg', 'Donated', 'approved'),
(5, '6', 'Smart Phone', 'Gadget', 'dvbc vx', '9000', 'download (4).jpg', 'Purchased', 'approved'),
(6, '5', 'School Bag', 'Bag', 'hfgujvcghj', '', 'download (7).jpg', 'Donated', 'approved'),
(7, '4', 'Bed sheets', 'Cloth', 'hefvwi uabvger u', '500', 'download (1).jpg', 'Donated', 'approved'),
(8, '4', 'LED Light', 'Electronic ', 'figqeyufuhv', '100', 'led.jpeg', 'Purchased', 'approved'),
(9, '6', 'Chair', 'furniture', 'jfbvekjenklv', '200', 'download (9).jpg', 'Purchased', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `u_payment`
--

CREATE TABLE IF NOT EXISTS `u_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `price` varchar(225) NOT NULL,
  `cdate` date NOT NULL,
  `card` varchar(225) NOT NULL,
  `card_no` varchar(225) NOT NULL,
  `expdate` varchar(225) NOT NULL,
  `cvv` varchar(225) NOT NULL,
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `u_payment`
--

INSERT INTO `u_payment` (`id`, `p_id`, `name`, `price`, `cdate`, `card`, `card_no`, `expdate`, `cvv`, `u_id`) VALUES
(1, 1, 'Laptop', '1000', '2023-07-14', 'debit card', '4523124687964537', '10/24', '677', 6),
(2, 2, 'Table', '9000', '2023-07-14', 'debit card', '3245167809764121', '10/28', '234', 4),
(3, 2, 'Table', '9000', '2023-07-14', 'debit card', '1234567890123456', '1/27', '123', 4),
(4, 2, 'Table', '9000', '2023-07-14', 'debit card', '1234567890123456', '2/26', '234', 4),
(5, 2, 'Table', '9000', '2023-07-14', 'debit card', '1234567890123456', '3/24', '235', 4),
(6, 3, 'Bed', '8000', '2023-07-14', 'debit card', '3456789234567890', '5/25', '678', 4);

-- --------------------------------------------------------

--
-- Table structure for table `u_register`
--

CREATE TABLE IF NOT EXISTS `u_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(223) NOT NULL,
  `email` varchar(223) NOT NULL,
  `phone` varchar(223) NOT NULL,
  `password` varchar(223) NOT NULL,
  `address` varchar(223) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `u_register`
--

INSERT INTO `u_register` (`id`, `name`, `email`, `phone`, `password`, `address`) VALUES
(1, 'Sankar', 'san@gamil.com', '987654321', '123', 'qwertyuio'),
(2, 'Anu', 'anu@gmail.com', '7764535264', '321', 'gdrvun6ttgb'),
(3, 'Anna', 'anna@gmail.com', '7864535264', 'Aa@12345', '1qwertyuio'),
(4, 'Midhun M', 'mid@gmail.com', '8756241678', 'mahima', 'hjvdgiyvbi'),
(5, 'Sharafu', 'pp@gmail.com', '8756241876', 'parrot', 'hjbcautvgy67yh'),
(6, 'Sree', 'sr@gmail.com', '8756241876', 'Sankarappan234#', 'hgtuyghbkj m,'),
(7, 'Rajeev', 'r1@gmail.com', '9678351234', 'Srajanbi12', 'fdgrthyjtukjhnfgb'),
(8, 'Sooraj', 'sj@gmail.com', '9823471077', 'Sooraj@123', 'dafsdghfjkhjgnb'),
(9, 'Bindu', 'b2r@gmail.com', '9848529013', 'Sreekutty123', 'hjcabducvgdaj');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
