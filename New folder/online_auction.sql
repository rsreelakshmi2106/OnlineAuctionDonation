-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 11:18 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `u_register`
--

INSERT INTO `u_register` (`id`, `name`, `email`, `phone`, `password`, `address`) VALUES
(1, 'davood', 'a@gamil.com', '987654321', '123', 'qwertyuio'),
(2, 'annu', 'anu@gmail.com', '07764535264', '321', 'gdrvun6ttgb'),
(3, 'annu', 'annu@gmail.com', '07764535264', 'Aa@12345', '1qwertyuio'),
(4, 'Midhun M', 'mid@gmail.com', '8756241678', 'mahima', 'hjvdgiyvbi'),
(5, 'Sharafu', 'pp@gmail.com', '8756241876', 'parrot', 'hjbcautvgy67yh');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
