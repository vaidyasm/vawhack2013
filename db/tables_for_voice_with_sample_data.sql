-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 25, 2013 at 06:06 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Follow up notes of a voicemail.' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `followup`
--

INSERT INTO `followup` (`id`, `voicemailId`, `userId`, `editTimestamp`, `text`) VALUES
(1, 5, 1, '2013-08-24 10:25:04', 'follow up note 1'),
(2, 5, 1, '2013-08-24 10:20:22', 'follow up note 2'),
(3, 5, 1, '2013-08-24 10:22:19', 'follow up notes 3'),
(4, 5, 1, '2013-08-24 10:28:25', 'follow up notes 4'),
(5, 3, 1, '2013-08-24 15:11:12', 'follow up 1'),
(6, 2, 1, '2013-08-24 15:26:12', 'followup by admin');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Transcription of a voicemail.' AUTO_INCREMENT=10 ;

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
(9, 2, 1, '2013-08-24 15:25:45', 'Nepali', 'record message');

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
(1, 5, 1102);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Additional info about a voicemail.' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `voicemailinfo`
--

INSERT INTO `voicemailinfo` (`id`, `voicemailId`, `callerName`, `callerDistrict`, `lastFollowUp`) VALUES
(1, 3, 'Bibhusan Bista', 'Lalitpur', NULL),
(2, 7, 'Anjesh Tuladhar', 'Lalitpur', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
