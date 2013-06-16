-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2013 at 03:54 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vawhack`
--

-- --------------------------------------------------------

--
-- Table structure for table `a`
--

CREATE TABLE IF NOT EXISTS `a` (
  `id` int(11) NOT NULL COMMENT 'PK',
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'title',
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'short description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Actions ';

-- --------------------------------------------------------

--
-- Table structure for table `c`
--

CREATE TABLE IF NOT EXISTS `c` (
  `id` int(11) NOT NULL COMMENT 'PK',
  `parent` int(11) NOT NULL COMMENT 'parent id c.id',
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'short name',
  `description` varchar(512) COLLATE utf8_unicode_ci NOT NULL COMMENT 'description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Violence categories';

-- --------------------------------------------------------

--
-- Table structure for table `mapca`
--

CREATE TABLE IF NOT EXISTS `mapca` (
  `id` int(11) NOT NULL COMMENT 'PK',
  `cid` int(11) NOT NULL COMMENT 'c.id - category id',
  `aid` int(11) NOT NULL COMMENT 'a.id - action id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Maps Category to Actions (one to many)';

-- --------------------------------------------------------

--
-- Table structure for table `maptc`
--

CREATE TABLE IF NOT EXISTS `maptc` (
  `id` int(11) NOT NULL COMMENT 'PK',
  `tid` int(11) NOT NULL COMMENT 't.id',
  `cid` int(11) NOT NULL COMMENT 'c.id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Maps transcription and category';

-- --------------------------------------------------------

--
-- Table structure for table `o`
--

CREATE TABLE IF NOT EXISTS `o` (
  `id` int(11) NOT NULL COMMENT 'PK',
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'Full Name',
  `un` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'username',
  `pw` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'password'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Operators';

-- --------------------------------------------------------

--
-- Table structure for table `t`
--

CREATE TABLE IF NOT EXISTS `t` (
  `id` int(11) NOT NULL COMMENT 'PK',
  `vmfid` int(11) NOT NULL COMMENT 'vmf.id - vm file id',
  `oid` int(11) NOT NULL COMMENT 'operator id',
  `callername` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'name of caller',
  `callerloc` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'location of caller',
  `tlang` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'language of transcription',
  `text` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'transcription text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='transcriptions';

-- --------------------------------------------------------

--
-- Table structure for table `vmf`
--

CREATE TABLE IF NOT EXISTS `vmf` (
  `id` int(11) NOT NULL COMMENT 'PK',
  `afn` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'audio file name',
  `callerid` int(11) NOT NULL COMMENT 'caller id',
  `calltime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='voicemail files';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
