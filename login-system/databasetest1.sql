-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2022 at 05:16 AM
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
DROP DATABASE IF EXISTS `databasetest1`;
CREATE DATABASE IF NOT EXISTS `databasetest1`;
USE `databasetest1`;

-- --------------------------------------------------------

-- Drop user
DROP USER IF EXISTS 'databasetest1'@'localhost';

-- Create Database User
CREATE USER 'databasetest1'@'localhost' IDENTIFIED BY 'databasetest1';

-- Grant privileges to the user
GRANT ALL PRIVILEGES ON *.* TO 'databasetest1'@'localhost' REQUIRE NONE WITH GRANT OPTION 
	MAX_QUERIES_PER_HOUR 0 
	MAX_CONNECTIONS_PER_HOUR 0 
	MAX_UPDATES_PER_HOUR 0 
	MAX_USER_CONNECTIONS 0;

--
-- Table structure for table `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL,
  `userid` varchar(128) NOT NULL,
  `zt` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
-- 
-- NGYIKLOK
-- table `order`
--

CREATE TABLE `order` (
  `orderId` INT  NOT NULL,
  `usersId` int(11),
  `fullname` varchar(255) NOT NULL, 
  `price`  DOUBLE(9,2)  NOT NULL,
  `orderDestination` varchar(255) NOT NULL,
  `contactNumber` VARCHAR(20)  NOT NULL,
  `state` varchar(255),
  FOREIGN KEY (`usersId`) REFERENCES `users`(`usersId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `order`
  ADD PRIMARY KEY (`orderId`);

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderId` INT NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------
-- 
-- NGYIKLOK
-- table `cart`
--

CREATE TABLE `cart_list` (
  `usersId` int(11),
  `cart_Item_Id` INT  NOT NULL ,
  `cart_Item` varchar(255) NOT NULL ,
  `price`  DOUBLE(9,2)  NOT NULL,
  `state` varchar(255)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `cart_list`
  ADD PRIMARY KEY (`cart_Item_Id`);

ALTER TABLE `cart_list`
  MODIFY `cart_Item_Id` INT NOT NULL AUTO_INCREMENT;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT;

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
) ENGINE=MyISAM AUTO_INCREMENT=160 DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `options`
--

TRUNCATE TABLE `options`;
-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `qno` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  PRIMARY KEY (`qno`),
  UNIQUE KEY `qno` (`qno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Truncate table before insert `questions`
--

TRUNCATE TABLE `questions`;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;