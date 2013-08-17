-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 14, 2013 at 03:14 PM
-- Server version: 5.1.49
-- PHP Version: 5.3.3-1ubuntu9.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii_user_module`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'Admin', 'admin@vawhack.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Voice', 'Voice', 'voice@vawhack.com', 'b95677216e439d96ec4fba1240a3c1f8', 'voice'),
(3, 'SMS', 'sms', 'sms@vawhack.com', '18b43c6a536a8fe1362f7a3887936be6', 'sms'),
(4, 'Org', 'Org', 'org@vawhack.com', '5a445d710ae24cd276062b0c84850838', 'org'),
(5, 'news', 'news', 'news@vawhack.com', '508c75c8507a2ae5223dfd2faeb98122', 'news'),
(6, 'katha', 'katha', 'katha@vawhack.com', 'c94ed04e8d2104bce9a68bb1a0572bd7', 'katha');
