-- phpMyAdmin SQL Dump
-- version 3.3.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2012 at 11:27 AM
-- Server version: 5.1.63
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `question_id`, `username`, `answer_date`, `answer_content`, `answer_rating`) VALUES
(1, 1, 'reddiamondforlife', '2012-10-15 21:00:32', 'afdasf', 0),
(2, 3, 'reddiamondforlife', '2012-10-15 21:33:07', 'vierkante meter', 40),
(3, 3, 'reddiamondforlife', '2012-10-15 21:33:23', 'kubieke meter', 50),
(4, 6, 'reddiamondforlife', '2012-10-15 22:30:52', 'Een organisme kan worden gedefinieerd als een levend wezen met een eigen metabolisme, bijvoorbeeld: planten, dieren, schimmels, en bacteriën', 0),
(5, 4, 'reddiamondforlife', '2012-10-15 23:22:09', 'amsterdam', 0),
(6, 4, 'reddiamondforlife', '2012-10-15 23:25:17', 'rotterdam', 0),
(7, 4, 'reddiamondforlife', '2012-10-16 10:45:44', 'Maastricht', 0),
(8, 8, 'reddiamondforlife', '2012-10-16 10:48:31', 'Om zo goed mogelijk te leven en het beste er van te maken!', 17),
(9, 7, 'reddiamondforlife', '2012-11-09 13:01:44', '<i><b>1975</b></i><br>', 1),
(10, 7, 'reddiamondforlife', '2012-11-09 13:01:57', '<i><b>1975</b></i><br>', 0),
(11, 2, 'reddiamondforlife', '2012-11-20 15:39:46', 'this is my answer', 0),
(12, 5, 'reddiamondforlife', '2012-11-20 15:42:10', 'TEsten', 7),
(13, 3, '1', '2012-11-26 10:49:43', 'TEST', 0),
(14, 3, '1', '2012-11-26 10:49:57', 'sdafdfa', 0),
(15, 3, 'reddiamondforlife', '2012-11-26 10:51:30', 'TESTER', 1),
(16, 17, 'admin', '2012-11-26 10:56:48', '<h4><font size="4" face="impact">Dit is zo goede test DUUUH&nbsp;</font></h4>', 2),
(17, 13, 'admin', '2012-11-26 11:25:43', 'Test vraag!<div><br></div>', 1);

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
  `is_answered` tinyint(1) NOT NULL DEFAULT '0',
  `tag` varchar(255) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question_date`, `question_title`, `question_content`, `username`, `is_answered`, `tag`) VALUES
(1, '2012-10-15 21:00:23', 'test', 'test', 'reddiamondforlife', 0, ''),
(2, '2012-10-15 21:30:04', 'NS', 'Is Ns een NV?', 'reddiamondforlife', 0, 'daniel'),
(3, '2012-10-15 21:31:52', 'volume', 'wat is de eenheid van volume?', 'reddiamondforlife', 0, ''),
(4, '2012-10-15 22:08:50', 'wat is de hoofstad van nederland', '', 'reddiamondforlife', 0, ''),
(5, '2012-10-15 22:10:40', 'wat is de eenheid van oppervlakte', '', 'reddiamondforlife', 0, ''),
(6, '2012-10-15 22:29:45', 'wat zijn organismen', '', 'reddiamondforlife', 0, 'pieter;daniel'),
(7, '2012-10-16 09:41:11', 'onanhankelijkheid', 'wanneer werd suriname onfhakelijk van nederland', 'reddiamondforlife', 0, ''),
(8, '2012-10-16 10:47:32', 'Bestaan van het leven?', 'Wat is het bestaan van het leven?', 'reddiamondforlife', 0, ''),
(9, '2012-10-30 15:15:02', 'daniel', 'kdsjlafjdklfjalkdjf aisdf', 'reddiamondforlife', 0, ''),
(10, '2012-11-14 21:00:58', 'sdfa', 'sdafdfa', 'reddiamondforlife', 0, ''),
(11, '2012-11-14 21:01:38', 'sdfa', 'sdfadf', 'reddiamondforlife', 0, ''),
(12, '2012-11-14 21:03:47', 'sdaf', 'dfasf', 'reddiamondforlife', 0, ''),
(13, '2012-11-20 12:45:35', 'blaadjes', 'hebben blaadjes naadjes?', 'reddiamondforlife', 0, ''),
(14, '2012-11-25 21:02:08', 'Test vraag!!!', 'testeafsdfasdfasdf', 'reddiamondforlife', 0, ''),
(15, '2012-11-25 21:06:16', 'Nog een vraag', 'Ja ja Nog een vraag!', 'reddiamondforlife', 0, 'daniel;pieter;bljkl;sdfa;dsaf;sdf;'),
(16, '2012-11-26 10:53:39', 'Vraag om de functie te testen van username', 'YEAY WORKING!!', 'reddiamondforlife', 0, 'daniel;pieter;bljkl;sdfa;dsaf;sdf;'),
(17, '2012-11-26 10:56:25', 'YEAY', 'Bla bla', 'admin', 0, '');

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

INSERT INTO `rating` (`answer_id`, `username`, `rating`) VALUES
(8, 'reddiamondforlife', 1),
(9, 'reddiamondforlife', 1),
(12, 'reddiamondforlife', 1),
(17, 'admin', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tagcloud`
--

INSERT INTO `tagcloud` (`id`, `tag`, `counter`, `last_tagged`) VALUES
(1, 'daniel', 8, '2012-11-26 10:53:39'),
(2, 'pietje', 19, '2012-11-14 14:51:00'),
(3, 'klare', 9, '2012-11-14 14:51:00'),
(4, 'test', 22, '2012-11-14 14:51:00'),
(6, 'pieter', 3, '2012-11-26 10:53:39'),
(7, 'bljkl', 3, '2012-11-26 10:53:39'),
(8, 'sdfa', 3, '2012-11-26 10:53:39'),
(9, 'dsaf', 3, '2012-11-26 10:53:39'),
(10, 'sdf', 3, '2012-11-26 10:53:39'),
(11, '', 8, '2012-11-26 10:56:25'),
(12, 'blaadjes', 0, '2012-11-20 12:45:35'),
(13, 'naadjes', 0, '2012-11-20 12:45:35'),
(14, 'sss', 0, '2012-11-20 13:57:53'),
(15, 'dag', 0, '2012-11-20 15:26:49'),
(16, 'tijd', 0, '2012-11-20 15:26:49'),
(17, 'asdfasdf', 0, '2012-11-25 20:49:03'),
(18, 'dfa', 0, '2012-11-25 20:49:03'),
(19, 's', 0, '2012-11-25 20:49:03'),
(20, 'f', 0, '2012-11-25 20:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(60) NOT NULL,
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
  `allow_contact` tinyint(1) NOT NULL DEFAULT '0',
  `allow_notification` tinyint(1) NOT NULL DEFAULT '0',
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_edit` date NOT NULL,
  `biography` varchar(300) NOT NULL,
  `user_rating` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `first_name`, `tussenvoegsel`, `last_name`, `password`, `contact_email`, `email_hidden`, `contact_facebook`, `facebook_hidden`, `contact_twitter`, `twitter_hidden`, `allow_contact`, `allow_notification`, `registration_date`, `last_edit`, `biography`, `user_rating`) VALUES
('admin', '', '', '', '9b03f294913323d34bdb37231f0729852ec2b230e07d52e01c8b3ffe4376fef4ac6caf782f0e382c1998836322f330a55abd3ab05205d432b4fbc21c526f5ec7', 'admin ', 1, '', 1, '', 1, 0, 0, '2012-11-26 10:59:34', '0000-00-00', '', 1),
('GedyGlymn', 'GedyGlymn', '', 'GedyGlymnJW', '409fbdb1fcefe6784ebe95818e65a5c9a8e9bd8a840b481f71a918deec78af599243d513e1b87c3cc02c4d3ba58410ca45dc52bbbd0fee0b9cc600119fecd857', 'twsdpi@11xz.com', 1, '', 1, '', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00', '', 0),
('Martijn2070', 'Martijn', '', 'van Delden', 'f4a923f3f7717889ea952aabb91265b199e97437a33b79124aba297558cae57c80c7977e463ceb4284f3567a5689720d5e233e5f909da2dba2621178022c87ad', 'martijn2070@hotmail.com', 1, '', 1, '', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00', '', 0),
('reddiamondforlife', 'daniel', '', 'koek', '1ad2c49e5766b4c68f190608679b1a7e9d7c0c6cc4484bc711552e40c5e2aa0aa8223f91b5ec5a036a39240bcd05686ac7140ff8108320d6230cc002fda9511d', 'reddiamondforlife@gmail.com', 1, '', 1, '', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00', '', 20005),
('sdf', 'sdf', '', 'sdf', 'f63cf4813683155d78213ffab299c4dd93891a87a59d2f6b681c22cc4b5b82dc055f5d5f9dda8d89c1920a0e093c5582bda2b12c2eb3f9711ca382b72a5770f3', 'sdf', 1, '', 1, '', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00', '', 0);
