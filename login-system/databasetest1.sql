-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 12:23 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databasetest1`
--
CREATE DATABASE IF NOT EXISTS `databasetest1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `databasetest1`;

-- --------------------------------------------------------

--
-- Table structure for table `cart_list`
--

DROP TABLE IF EXISTS `cart_list`;
CREATE TABLE IF NOT EXISTS `cart_list` (
  `usersId` int(11) DEFAULT NULL,
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_state` varchar(255) DEFAULT NULL,
  `p_id` int(11) NOT NULL,
  `c_quantity` int(11) DEFAULT NULL,
  `c_total` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_list`
--

INSERT INTO `cart_list` (`usersId`, `c_id`, `c_state`, `p_id`, `c_quantity`, `c_total`) VALUES
(1, 45, 'paid', 2, 3, '22200.00'),
(1, 46, 'paid', 3, 1, '7800.00'),
(1, 47, 'paid', 3, 3, '23400.00'),
(1, 49, 'paid', 2, 1, '7400.00'),
(1, 50, 'paid', 4, 3, '26100.00'),
(1, 52, 'paid', 3, 3, '23400.00'),
(1, 53, 'inCart', 3, 3, '23400.00'),
(1, 54, 'inCart', 2, 1, '7400.00'),
(1, 55, 'inCart', 2, 1, '7400.00'),
(1, 56, 'inCart', 2, 1, '7400.00'),
(1, 57, 'inCart', 2, 1, '7400.00');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

DROP TABLE IF EXISTS `friend_request`;
CREATE TABLE IF NOT EXISTS `friend_request` (
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nosurvey`
--

DROP TABLE IF EXISTS `nosurvey`;
CREATE TABLE IF NOT EXISTS `nosurvey` (
  `Exitid` int(11) NOT NULL AUTO_INCREMENT,
  `usersid` int(11) NOT NULL,
  `Qid` int(11) NOT NULL,
  `leavingtime` datetime NOT NULL,
  PRIMARY KEY (`Exitid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qno` int(11) NOT NULL,
  `correct` tinyint(1) NOT NULL,
  `choices` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `qno`, `correct`, `choices`) VALUES
(1, 1, 0, 'Yes'),
(2, 1, 2, 'No'),
(3, 2, 0, 'Anime'),
(4, 2, 0, 'TV drama'),
(5, 2, 0, 'family or friends'),
(6, 2, 0, 'Youtube video'),
(7, 2, 0, 'Twitter'),
(8, 2, 0, 'others'),
(9, 3, 0, 'Yes'),
(10, 3, 2, 'No'),
(11, 4, 0, '明刻(中張)'),
(12, 4, 1, '雀頭(中張)'),
(13, 4, 0, '自摸'),
(14, 4, 0, '單吊'),
(15, 5, 0, '九種九牌'),
(16, 5, 0, '四風連打'),
(17, 5, 0, '四杠散了'),
(18, 5, 1, '荒牌流局');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `usersId` int(11) DEFAULT NULL,
  `o_name` varchar(255) NOT NULL,
  `o_price` double(9,2) NOT NULL,
  `o_destination` varchar(255) NOT NULL,
  `o_contactNumber` varchar(20) NOT NULL,
  `o_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`o_id`),
  KEY `usersId` (`usersId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`o_id`, `usersId`, `o_name`, `o_price`, `o_destination`, `o_contactNumber`, `o_datetime`) VALUES
(1, 1, '32132', 23400.00, '213321', '3213', '2022-04-25 14:29:22'),
(2, 1, '312321', 33500.00, '32132', '321312', '2022-04-26 01:15:07'),
(3, 1, '321', 23400.00, '321321', '1321321', '2022-04-30 14:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_brand` varchar(255) NOT NULL,
  `p_title` varchar(255) NOT NULL,
  `p_detail` varchar(255) NOT NULL,
  `p_size` varchar(255) DEFAULT NULL,
  `p_color` varchar(255) NOT NULL DEFAULT 'unique',
  `p_price` decimal(8,2) NOT NULL,
  `p_img` varchar(255) DEFAULT NULL,
  `p_stock` int(11) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_brand`, `p_title`, `p_detail`, `p_size`, `p_color`, `p_price`, `p_img`, `p_stock`) VALUES
(1, 'Balenciaga', 'Shopping Phone holder bag', 'A new season may be here, but the frenzy for logomania is far from over. At the helm of the trend, Balenciaga continues to offer branded styles.\r\nMade in Italy', 'One Size available', 'unique', '8000.00', 'p1.jpg', 50),
(2, 'Balenciaga', 'logo print crossbody bag', 'It is no surprise that anything Balenciaga conjures up rises to cult status. \r\nMade in Italy', 'One Size available', 'unique', '7400.00', 'p2.jpg', 35),
(3, 'Gucci', 'Gucci Off The Grid mini bag', 'Gucci knows that travelling light means leaving behind a lighter footprint too.\r\nMade in Italy', 'One Size available', 'unique', '7800.00', 'p3.jpg', 36),
(4, 'Givenchy', 'Antigona U vertical shoulder bag', 'Made in Italy', 'One Size available', 'unique', '8700.00', 'p4.jpg\n', 32),
(5, 'Salvatore Ferragamo', 'Gancini leather wallet-on-chain', 'Designed to hold a phone, this Salvatore Ferragamo mini bag is detailed with the brand\'s signature Gancini plaque in antique-gold, matched by the thin chain-link strap.\r\nMade in United Kingdom', 'One Size available', 'unique', '3600.00', 'p6.jpg\n', 50),
(6, 'Balenciaga', 'Shopping iPhone holder', 'Balenciaga downscales its iconic Shopping tote to present this iPhone holder. This compact accessory is crafted from croc-embossed leather and is detailed with a contrasting logo to the front. Made in Italy', 'One Size available', 'unique', '8500.00', 'p5.jpg', 5),
(7, 'Prada', 'hammered triangle-panel mini bag', 'Made up of an assortment of triangular panels, this hammered leather mini bag from Prada is dressed in a striking silver hue.\r\nMade in United Kingdom', 'One Size available', 'unique', '18400.00', 'p7.jpg\n', 44),
(8, 'Versace', 'La Medusa leather mini bag', 'Made in Italy', 'One Size available\r\n', 'unique', '1.00', 'p8.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--

DROP TABLE IF EXISTS `profileimg`;
CREATE TABLE IF NOT EXISTS `profileimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(128) NOT NULL,
  `zt` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

DROP TABLE IF EXISTS `pwdreset`;
CREATE TABLE IF NOT EXISTS `pwdreset` (
  `pwdResetId` int(11) NOT NULL AUTO_INCREMENT,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL,
  PRIMARY KEY (`pwdResetId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `qno` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  PRIMARY KEY (`qno`),
  UNIQUE KEY `qno` (`qno`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qno`, `question`) VALUES
(1, 'Have you ever heard of Japanese Mahjong?'),
(2, 'How do you know about it?'),
(3, 'Do you want to test your knowledge about it?'),
(4, '「2符」不包含哪個選項？'),
(5, '「特殊流局」不包含哪個選項？');

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

DROP TABLE IF EXISTS `ranking`;
CREATE TABLE IF NOT EXISTS `ranking` (
  `rankid` int(11) NOT NULL AUTO_INCREMENT,
  `usersid` int(11) NOT NULL,
  `no_of_play` int(11) DEFAULT '0',
  `score` int(11) DEFAULT '0',
  `finishedtime` datetime NOT NULL,
  PRIMARY KEY (`rankid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `usersId` int(11) NOT NULL AUTO_INCREMENT,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL,
  PRIMARY KEY (`usersId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES
(1, 'Louie9', 'Louie9@gmail.com', 'Louie9', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
