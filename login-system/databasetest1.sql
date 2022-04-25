-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2022 at 08:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databasetest1`
--
CREATE DATABASE IF NOT EXISTS `databasetest1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `databasetest1`;

-- --------------------------------------------------------

--
-- Table structure for table `cart_list`
--
-- Creation: Apr 25, 2022 at 06:21 AM
-- Last update: Apr 25, 2022 at 06:22 AM
--

CREATE TABLE IF NOT EXISTS `cart_list` (
  `usersId` int(11) DEFAULT NULL,
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_state` varchar(255) DEFAULT NULL,
  `p_id` int(11) NOT NULL,
  `c_quantity` int(11) DEFAULT NULL,
  `c_total` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `cart_list`:
--

--
-- Dumping data for table `cart_list`
--

INSERT INTO `cart_list` (`usersId`, `c_id`, `c_state`, `p_id`, `c_quantity`, `c_total`) VALUES
(1, 45, 'paid', 2, 3, '22200.00'),
(1, 46, 'paid', 3, 1, '7800.00');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--
-- Creation: Apr 25, 2022 at 06:21 AM
-- Last update: Apr 25, 2022 at 06:21 AM
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `friends`:
--

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--
-- Creation: Apr 25, 2022 at 06:21 AM
-- Last update: Apr 25, 2022 at 06:21 AM
--

CREATE TABLE IF NOT EXISTS `friend_request` (
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `friend_request`:
--

-- --------------------------------------------------------

--
-- Table structure for table `options`
--
-- Creation: Apr 25, 2022 at 06:21 AM
-- Last update: Apr 25, 2022 at 06:21 AM
-- Last check: Apr 25, 2022 at 06:21 AM
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qno` int(11) NOT NULL,
  `correct` tinyint(1) NOT NULL,
  `choices` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `options`:
--   `qno`
--       `questions` -> `qno`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--
-- Creation: Apr 25, 2022 at 06:23 AM
-- Last update: Apr 25, 2022 at 06:23 AM
-- Last check: Apr 25, 2022 at 06:23 AM
--

CREATE TABLE IF NOT EXISTS `order` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `usersId` int(11) DEFAULT NULL,
  `o_name` varchar(255) NOT NULL,
  `o_price` double(9,2) NOT NULL,
  `o_destination` varchar(255) NOT NULL,
  `o_contactNumber` varchar(20) NOT NULL,
  `o_datetime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`o_id`),
  KEY `usersId` (`usersId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `order`:
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--
-- Creation: Apr 25, 2022 at 06:21 AM
-- Last update: Apr 25, 2022 at 06:22 AM
--

CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_brand` varchar(255) NOT NULL,
  `p_title` varchar(255) NOT NULL,
  `p_detail` varchar(255) NOT NULL,
  `p_size` varchar(255) DEFAULT NULL,
  `p_price` decimal(8,2) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `p_stock` int(11) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `product`:
--

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_brand`, `p_title`, `p_detail`, `p_size`, `p_price`, `p_img`, `p_stock`) VALUES
(1, 'Balenciaga', 'Shopping Phone holder bag', 'A new season may be here, but the frenzy for logomania is far from over. At the helm of the trend, Balenciaga continues to offer branded styles.\r\nMade in Italy', 'One Size available', '7400.00', '\"images/p1.jpg\"', 0),
(2, 'Balenciaga', 'logo print crossbody bag', 'It is no surprise that anything Balenciaga conjures up rises to cult status. \r\nMade in Italy', 'One Size available', '7400.00', '\"images/p2.jpg\"', 40),
(3, 'Gucci', 'Gucci Off The Grid mini bag', 'Gucci knows that travelling light means leaving behind a lighter footprint too.\r\nMade in Italy', 'One Size available', '7800.00', '\"images/p3.jpg\"', 45),
(4, 'Givenchy', 'Antigona U vertical shoulder bag', 'Made in Italy', 'One Size available', '8700.00', '\"images/p4.jpg\"\r\n', 38),
(5, 'Salvatore Ferragamo', 'Gancini leather wallet-on-chain', 'Designed to hold a phone, this Salvatore Ferragamo mini bag is detailed with the brand\'s signature Gancini plaque in antique-gold, matched by the thin chain-link strap.\r\nMade in United Kingdom', 'One Size available', '3600.00', '\"images/p6.jpg\"\r\n', 50),
(6, 'Balenciaga', 'Shopping iPhone holder', 'Balenciaga downscales its iconic Shopping tote to present this iPhone holder. This compact accessory is crafted from croc-embossed leather and is detailed with a contrasting logo to the front. Made in Italy', 'One Size available', '8500.00', '\"images/p5.jpg\"', 5),
(7, 'Prada', 'hammered triangle-panel mini bag', 'Made up of an assortment of triangular panels, this hammered leather mini bag from Prada is dressed in a striking silver hue.\r\nMade in United Kingdom', 'One Size available', '18400.00', '\"images/p7.jpg\"\r\n', 44),
(8, 'Versace', 'La Medusa leather mini bag', 'Made in Italy', 'One Size available\r\n', '10800.00', '\"images/p8.jpg\"', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--
-- Creation: Apr 25, 2022 at 06:21 AM
-- Last update: Apr 25, 2022 at 06:21 AM
--

CREATE TABLE IF NOT EXISTS `profileimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(128) NOT NULL,
  `zt` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `profileimg`:
--   `userid`
--       `users` -> `usersId`
--

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--
-- Creation: Apr 25, 2022 at 06:21 AM
-- Last update: Apr 25, 2022 at 06:21 AM
--

CREATE TABLE IF NOT EXISTS `pwdreset` (
  `pwdResetId` int(11) NOT NULL AUTO_INCREMENT,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL,
  PRIMARY KEY (`pwdResetId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `pwdreset`:
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--
-- Creation: Apr 25, 2022 at 06:21 AM
-- Last update: Apr 25, 2022 at 06:21 AM
-- Last check: Apr 25, 2022 at 06:21 AM
--

CREATE TABLE IF NOT EXISTS `questions` (
  `qno` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  PRIMARY KEY (`qno`),
  UNIQUE KEY `qno` (`qno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `questions`:
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Apr 25, 2022 at 06:21 AM
-- Last update: Apr 25, 2022 at 06:21 AM
--

CREATE TABLE IF NOT EXISTS `users` (
  `usersId` int(11) NOT NULL AUTO_INCREMENT,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL,
  PRIMARY KEY (`usersId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES
(1, 'Louie9', 'Louie9@gmail.com', 'Louie9', '321');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
