-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2022 at 08:44 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `databasetest1`
--
DROP DATABASE IF EXISTS `databasetest1`;

CREATE DATABASE IF NOT EXISTS `databasetest1`;

USE `databasetest1`;

-- --------------------------------------------------------
--
-- Table structure for table `cart_list`
--
CREATE TABLE `cart_list` (
  `usersId` int(11) DEFAULT NULL,
  `cart_Item_Id` int(11) NOT NULL,
  `cart_Item` varchar(255) NOT NULL,
  `price` double(9, 2) NOT NULL,
  `state` varchar(255) DEFAULT NULL
) ENGINE = MyISAM DEFAULT CHARSET = latin1;

-- --------------------------------------------------------
--
-- Table structure for table `friends`
--
CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_one` int(11) NOT NULL,
  `user_two` int(11) NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = latin1;

-- --------------------------------------------------------
--
-- Table structure for table `friend_request`
--
CREATE TABLE `friend_request` (
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = latin1;

-- --------------------------------------------------------
--
-- Table structure for table `options`
--
CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `qno` int(11) NOT NULL,
  `correct` tinyint(1) NOT NULL,
  `choices` varchar(255) NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8;

-- --------------------------------------------------------
--
-- Table structure for table `order`
--
CREATE TABLE `order` (
  `orderId` int(11) NOT NULL,
  `usersId` int(11) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `price` double(9, 2) NOT NULL,
  `orderDestination` varchar(255) NOT NULL,
  `contactNumber` varchar(20) NOT NULL,
  `state` varchar(255) DEFAULT NULL
) ENGINE = MyISAM DEFAULT CHARSET = latin1;

-- --------------------------------------------------------
--
-- Table structure for table `profileimg`
--
CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL,
  `userid` varchar(128) NOT NULL,
  `zt` varchar(128) NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = latin1;

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
) ENGINE = MyISAM DEFAULT CHARSET = latin1;

-- --------------------------------------------------------
--
-- Table structure for table `questions`
--
CREATE TABLE `questions` (
  `qno` int(11) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE = MyISAM DEFAULT CHARSET = utf8;

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
) ENGINE = MyISAM DEFAULT CHARSET = latin1;

--
-- Indexes for dumped tables
--
--
-- Indexes for table `cart_list`
--
ALTER TABLE
  `cart_list`
ADD
  PRIMARY KEY (`cart_Item_Id`);

--
-- Indexes for table `friends`
--
ALTER TABLE
  `friends`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `friend_request`
--
ALTER TABLE
  `friend_request`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE
  `options`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `id` (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE
  `order`
ADD
  PRIMARY KEY (`orderId`),
ADD
  KEY `usersId` (`usersId`);

--
-- Indexes for table `profileimg`
--
ALTER TABLE
  `profileimg`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE
  `pwdreset`
ADD
  PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `questions`
--
ALTER TABLE
  `questions`
ADD
  PRIMARY KEY (`qno`),
ADD
  UNIQUE KEY `qno` (`qno`);

--
-- Indexes for table `users`
--
ALTER TABLE
  `users`
ADD
  PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `cart_list`
--
ALTER TABLE
  `cart_list`
MODIFY
  `cart_Item_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE
  `friends`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friend_request`
--
ALTER TABLE
  `friend_request`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE
  `options`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE
  `order`
MODIFY
  `orderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profileimg`
--
ALTER TABLE
  `profileimg`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE
  `pwdreset`
MODIFY
  `pwdResetId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE
  `users`
MODIFY
  `usersId` int(11) NOT NULL AUTO_INCREMENT;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;