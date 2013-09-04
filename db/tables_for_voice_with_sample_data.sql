-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 04, 2013 at 04:13 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Category of violence.' AUTO_INCREMENT=100000 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent`, `title`, `description`) VALUES
(10, 1, 'Other', 'Other'),
(11, 1, 'Domestic violence', 'Domestic violence'),
(12, 1, 'Social violence', 'Social violence'),
(13, 1, 'Rape', 'Rape'),
(14, 1, 'Attempt to Rape', 'Attempt to Rape'),
(15, 1, 'Murder', 'Murder'),
(16, 1, 'Attempt to Murder', 'Attempt to Murder'),
(17, 1, 'Trafficking', 'Trafficking'),
(18, 1, 'Sexual Abuse', 'Sexual Abuse'),
(1101, 11, 'Polygamy', 'Polygamy'),
(1102, 11, 'Physical Abuse', 'Physical Abuse'),
(1103, 11, 'Marital Rape', 'Marital Rape'),
(1104, 11, 'Threats', 'Threats'),
(1, 0, 'RootCategory', 'Root category. For system use only.');

-- --------------------------------------------------------

--
-- Table structure for table `followup`
--

CREATE TABLE IF NOT EXISTS `followup` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key.',
  `voicemailId` int(11) NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (voicemailId) REFERENCES Voicemail(id). Id of related voicemail.',
  `userId` int(11) NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (userId) REFERENCES Users(id). User id of transcriber.',
  `editTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Created or edited timestamp.',
  `text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Follow up notes.',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Follow up notes of a voicemail.' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `followup`
--

INSERT INTO `followup` (`id`, `voicemailId`, `userId`, `editTimestamp`, `text`) VALUES
(1, 5, 1, '2013-08-24 10:25:04', 'follow up note 1'),
(2, 5, 1, '2013-08-24 10:20:22', 'follow up note 2'),
(3, 5, 1, '2013-08-24 10:22:19', 'follow up notes 3'),
(4, 5, 1, '2013-08-24 10:28:25', 'follow up notes 4'),
(5, 3, 1, '2013-08-24 15:11:12', 'follow up 1'),
(6, 2, 1, '2013-08-24 15:26:12', 'followup by admin'),
(7, 8, 2, '2013-08-26 12:25:42', 'aba yopolice ma khabar garne');

-- --------------------------------------------------------

--
-- Table structure for table `transcription`
--

CREATE TABLE IF NOT EXISTS `transcription` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key.',
  `voicemailId` int(11) NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (voicemailId) REFERENCES Voicemail(id). Id of related voicemail.',
  `userId` int(11) NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (userId) REFERENCES Users(id). User id of transcriber.',
  `editTimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Created or edited timestamp.',
  `lang` text NOT NULL COMMENT 'Language of this transcription.',
  `text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Transcription text.',
  PRIMARY KEY (`id`),
  KEY `voicemailId` (`voicemailId`,`userId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Transcription of a voicemail.' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `transcription`
--

INSERT INTO `transcription` (`id`, `voicemailId`, `userId`, `editTimestamp`, `lang`, `text`) VALUES
(2, 3, 2, '2013-07-15 06:20:00', 'Nepali', 'prawesh shrestha'),
(3, 5, 2, '2013-08-24 12:22:19', 'English', 'test'),
(4, 5, 2, '2013-08-24 12:22:19', 'English', 'Test 2'),
(5, 7, 2, '2013-08-24 12:21:45', 'English', 'Thank you for the recording. See you in a while.'),
(6, 5, 2, '2013-08-24 12:30:17', 'English', 'Test transcription text 3'),
(7, 7, 1, '2013-08-24 13:24:55', 'English', 'test text 2'),
(8, 3, 1, '2013-08-24 15:10:55', 'English', 'test 2'),
(9, 2, 1, '2013-08-24 15:25:45', 'Nepali', 'record message'),
(10, 8, 2, '2013-08-26 12:25:18', 'nepali', 'yonepalima ho');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'Admin', 'admin@vawhack.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Voice', 'Voice', 'voice@vawhack.com', 'b95677216e439d96ec4fba1240a3c1f8', 'voice'),
(3, 'SMS', 'sms', 'sms@vawhack.com', '18b43c6a536a8fe1362f7a3887936be6', 'sms'),
(4, 'Org', 'Org', 'org@vawhack.com', '5a445d710ae24cd276062b0c84850838', 'org'),
(5, 'news', 'news', 'news@vawhack.com', '508c75c8507a2ae5223dfd2faeb98122', 'news'),
(6, 'katha', 'katha', 'katha@vawhack.com', 'c94ed04e8d2104bce9a68bb1a0572bd7', 'katha'),
(7, 'Asterisk', 'System', 'asterisk@vawhack.com', '51e63a3da6425a39aecc045ec45f1ae8', 'asterisk');

-- --------------------------------------------------------

--
-- Table structure for table `voicemail`
--

CREATE TABLE IF NOT EXISTS `voicemail` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key.',
  `callTime` int(11) NOT NULL COMMENT 'Voicemail received at this timestamp.',
  `callerId` varchar(64) DEFAULT NULL COMMENT 'Phone number of the caller.',
  `vmFileName` text NOT NULL COMMENT 'File name on voice-mail file server.',
  PRIMARY KEY (`id`),
  KEY `callTime` (`callTime`,`callerId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Model ''Voicemail'' is persisted on this table.' AUTO_INCREMENT=29 ;

--
-- Dumping data for table `voicemail`
--

INSERT INTO `voicemail` (`id`, `callTime`, `callerId`, `vmFileName`) VALUES
(2, 1373712531, '14461817', 'vm_1373712531-0000000d.wav'),
(3, 1373869115, '9841793522', 'vm_1373869115-0000000e.wav'),
(4, 1373418846, '014334836', 'vm_1373418846-0000000c.wav'),
(5, 1373114243, 'Unknown', 'vm_1373114243-00000000.wav'),
(6, 1373267285, '1111111111', 'vm_1373267285-00000004.wav'),
(7, 1373287969, '015009727', 'vm_1373287969-0000000b.wav'),
(8, 1373287969, '015009999', 'vm_1373287969-0000000b.wav');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Associates a Voicemail to its category.' AUTO_INCREMENT=77 ;

--
-- Dumping data for table `voicemailcategory`
--

INSERT INTO `voicemailcategory` (`id`, `voicemailId`, `categoryId`) VALUES
(70, 5, 1102),
(69, 5, 10),
(76, 3, 10),
(71, 5, 1104),
(72, 5, 12);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Additional info about a voicemail.' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `voicemailinfo`
--

INSERT INTO `voicemailinfo` (`id`, `voicemailId`, `callerName`, `callerDistrict`, `lastFollowUp`) VALUES
(1, 3, 'Bibhusan Bista', 'Lalitpur', NULL),
(2, 7, 'Anjesh Tuladhar', 'Lalitpur', NULL),
(3, 8, 'Ravi Kumar', 'Lalitpur', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
