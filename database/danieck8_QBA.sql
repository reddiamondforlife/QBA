-- phpMyAdmin SQL Dump
-- version 3.3.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2013 at 06:04 PM
-- Server version: 5.1.66
-- PHP Version: 5.3.3-7+squeeze14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `danieck8_QBA`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `answer_id` int(12) NOT NULL AUTO_INCREMENT,
  `question_id` int(12) NOT NULL,
  `username` varchar(60) NOT NULL,
  `answer_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `answer_content` text NOT NULL,
  `answer_rating` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `answers`
--


-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `question_id` int(11) NOT NULL,
  `contact_email` varchar(40) NOT NULL,
  UNIQUE KEY `question_id` (`question_id`,`contact_email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail`
--


-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(12) NOT NULL AUTO_INCREMENT,
  `question_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `question_title` varchar(100) NOT NULL,
  `question_content` text NOT NULL,
  `username` varchar(60) NOT NULL,
  `is_answered` int(12) NOT NULL DEFAULT '0',
  `tag` varchar(255) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `questions`
--


-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `answer_id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `rating` smallint(6) NOT NULL,
  PRIMARY KEY (`answer_id`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--


-- --------------------------------------------------------

--
-- Table structure for table `tagcloud`
--

CREATE TABLE IF NOT EXISTS `tagcloud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) NOT NULL,
  `counter` int(11) NOT NULL,
  `last_tagged` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tagcloud`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `tussenvoegsel` varchar(15) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `password` varchar(200) NOT NULL,
  `contact_email` varchar(40) NOT NULL,
  `email_hidden` tinyint(1) NOT NULL DEFAULT '1',
  `contact_facebook` varchar(40) NOT NULL,
  `facebook_hidden` tinyint(1) NOT NULL DEFAULT '1',
  `contact_twitter` varchar(40) NOT NULL,
  `twitter_hidden` tinyint(1) NOT NULL DEFAULT '1',
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `biography` varchar(300) NOT NULL,
  `user_rating` int(11) NOT NULL DEFAULT '0',
  `atoba` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

