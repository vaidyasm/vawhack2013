-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2013 at 08:05 AM
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
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key.',
  `parent` int(11) NOT NULL COMMENT 'Self ref key: category.id',
  `title` varchar(32) NOT NULL COMMENT 'Very short name of this type of violence.',
  `description` text NOT NULL COMMENT 'Brief description about this type of violence.',
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Category of violence.' AUTO_INCREMENT=14 ;

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
  `voicemailId` int(11) NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (voicemailId) REFERENCES Voicemail(id). Indicates the Voicemail which this Followup message is for.',
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
  `voicemailId` int(11) NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (voicemailId) REFERENCES Voicemail(id). Indicates the Voicemail which this Transcription is for.',
  `userId` int(11) NOT NULL COMMENT 'Foreign key: users.id. Indicates the user who created this transcription.',
  `lang` text NOT NULL COMMENT 'Language of this transcription.',
  `text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Transcription text.',
  PRIMARY KEY (`id`),
  KEY `voicemailId` (`voicemailId`,`userId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Transcription of a voicemail.' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transcription`
--

INSERT INTO `transcription` (`id`, `voicemailId`, `userId`, `lang`, `text`) VALUES
(2, 3, 2, 'Nepali', 'prawesh shrestha');

-- --------------------------------------------------------

--
-- Table structure for table `voicemail`
--

CREATE TABLE IF NOT EXISTS `voicemail` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key.',
  `callTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Voicemail received at this timestamp.',
  `callerId` varchar(64) DEFAULT NULL COMMENT 'Phone number of the caller.',
  `vmFileName` text NOT NULL COMMENT 'File name on voice-mail file server.',
  PRIMARY KEY (`id`),
  KEY `callTime` (`callTime`,`callerId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Model ''Voicemail'' is persisted on this table.' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `voicemail`
--

INSERT INTO `voicemail` (`id`, `callTime`, `callerId`, `vmFileName`) VALUES
(2, '2013-07-13 10:48:51', '14461817', 'vm_1373712531-0000000d.wav'),
(3, '2013-07-15 06:18:35', '9841793522', 'vm_1373869115-0000000e.wav'),
(4, '2013-07-10 01:14:06', '014334836', 'vm_1373418846-0000000c.wav'),
(5, '2013-07-06 12:37:23', 'Unknown', 'vm_1373114243-00000000.wav'),
(6, '2013-07-08 07:08:05', '1111111111', 'vm_1373267285-00000004.wav'),
(7, '2013-07-08 12:52:49', '015009727', 'vm_1373287969-0000000b.wav');

-- --------------------------------------------------------

--
-- Table structure for table `voicemailcategory`
--

CREATE TABLE IF NOT EXISTS `voicemailcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key.',
  `voicemailId` int(11) NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (voicemailId) REFERENCES Voicemail(id)',
  `categoryId` int(11) NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (categoryId) REFERENCES Category(id)',
  PRIMARY KEY (`id`),
  KEY `voicemailId` (`voicemailId`,`categoryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Associates a Voicemail to its category.' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `voicemailcategory`
--

INSERT INTO `voicemailcategory` (`id`, `voicemailId`, `categoryId`) VALUES
(1, 5, 11);

-- --------------------------------------------------------

--
-- Table structure for table `voicemailinfo`
--

CREATE TABLE IF NOT EXISTS `voicemailinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voicemailId` int(11) NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (voicemailId) REFERENCES Voicemail(id)',
  `callerName` text NOT NULL COMMENT 'Name of the caller.',
  `callerDistrict` text NOT NULL COMMENT 'District of the caller.',
  `lastFollowUp` timestamp NULL DEFAULT NULL COMMENT 'Timestamp of last followup.',
  PRIMARY KEY (`id`),
  KEY `voicemailId` (`voicemailId`,`lastFollowUp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Additional info about a voicemail.' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `voicemailinfo`
--

INSERT INTO `voicemailinfo` (`id`, `voicemailId`, `callerName`, `callerDistrict`, `lastFollowUp`) VALUES
(1, 3, 'Bibhusan', 'Lalitpur', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
