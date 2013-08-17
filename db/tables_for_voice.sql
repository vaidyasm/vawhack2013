-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 15, 2013 at 03:32 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yii_user_module`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL COMMENT 'Primary key.',
  `parent` int(11) NOT NULL COMMENT 'Self ref key: category.id',
  `title` varchar(32) NOT NULL COMMENT 'Very short name of this type of violence.',
  `description` text NOT NULL COMMENT 'Brief description about this type of violence.',
  KEY `parent` (`parent`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Category of violence.';

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent`, `title`, `description`) VALUES
(1, 0, 'Domestic violence\r\n', 'Domestic violence\r\n'),
(2, 0, 'Social violence\r\n', 'Social violence\r\n'),
(3, 0, 'Rape\r\n', 'Rape\r\n'),
(4, 0, 'Attempt to Rape\r\n', 'Attempt to Rape\r\n'),
(5, 0, 'Murder\r\n', 'Murder\r\n'),
(6, 0, 'Attempt to Murder\r\n', 'Attempt to Murder\r\n'),
(7, 0, 'Trafficking\r\n', 'Trafficking\r\n'),
(8, 0, 'Sexual Abuse\r\n', 'Sexual Abuse\r\n'),
(9, 0, 'Other\r\n', 'Other\r\n'),
(10, 1, 'Polygamy\r\n', 'Polygamy\r\n'),
(11, 1, 'Physical Abuse\r\n', 'Physical Abuse\r\n'),
(12, 1, 'Marital Rape\r\n', 'Marital Rape\r\n'),
(13, 1, 'Threats\r\n', 'Threats\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `followup`
--

CREATE TABLE IF NOT EXISTS `followup` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key.',
  `voicemailId` int(11) NOT NULL COMMENT 'Foreign key: voicemail.id. Indicates the voicemail which this followup message is for.',
  `userId` int(11) NOT NULL COMMENT 'Foreign key: users.id. Indicates the user who created this follow up.',
  `text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Follow up notes.',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Follow up notes of a voicemail.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transcription`
--

CREATE TABLE IF NOT EXISTS `transcription` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key.',
  `voicemailId` int(11) NOT NULL COMMENT 'Foreign key: voicemail.id. Indicates the voicemail which this transcription is for.',
  `userId` int(11) NOT NULL COMMENT 'Foreign key: users.id. Indicates the user who created this transcription.',
  `callerName` text NOT NULL COMMENT 'Full name of the caller. Transcribed by the user.',
  `callerLoc` text NOT NULL COMMENT 'Location of the caller. Transcribed by user.',
  `lang` text NOT NULL COMMENT 'Language of this transcription.',
  `text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Transcription text.',
  PRIMARY KEY (`id`),
  KEY `voicemailId` (`voicemailId`,`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Transcription of a voicemail.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `voicemail`
--

CREATE TABLE IF NOT EXISTS `voicemail` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key.',
  `callTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Voicemail received at this timestamp.',
  `callerId` varchar(64) DEFAULT NULL COMMENT 'Caller''s phone number.',
  `vmFileName` text NOT NULL COMMENT 'File name on voice-mail file server.',
  PRIMARY KEY (`id`),
  KEY `callTime` (`callTime`,`callerId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Model ''Voicemail'' is persisted on this table.' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
