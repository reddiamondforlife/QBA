-- phpMyAdmin SQL Dump
-- version 3.3.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2012 at 04:13 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `question_id`, `username`, `answer_date`, `answer_content`, `answer_rating`) VALUES
(2, 3, 'reddiamondforlife', '2012-10-15 21:33:07', 'vierkante meter', 39),
(3, 3, 'reddiamondforlife', '2012-10-15 21:33:23', 'kubieke meter', 51),
(4, 6, 'reddiamondforlife', '2012-10-15 22:30:52', 'Een organisme kan worden gedefinieerd als een levend wezen met een eigen metabolisme, bijvoorbeeld: planten, dieren, schimmels, en bacteriën', 1),
(5, 4, 'reddiamondforlife', '2012-10-15 23:22:09', 'amsterdam', 1),
(6, 4, 'reddiamondforlife', '2012-10-15 23:25:17', 'rotterdam', 1),
(7, 4, 'reddiamondforlife', '2012-10-16 10:45:44', 'Maastricht', 1),
(8, 8, 'reddiamondforlife', '2012-10-16 10:48:31', 'Om zo goed mogelijk te leven en het beste er van te maken!', 17),
(9, 7, 'reddiamondforlife', '2012-11-09 13:01:44', '<i><b>1975</b></i><br>', 1),
(10, 7, 'reddiamondforlife', '2012-11-09 13:01:57', '<i><b>1975</b></i><br>', -1),
(11, 2, 'reddiamondforlife', '2012-11-20 15:39:46', 'this is my answer', 1),
(12, 5, 'reddiamondforlife', '2012-11-20 15:42:10', 'TEsten', 7),
(15, 3, 'reddiamondforlife', '2012-11-26 10:51:30', 'TESTER', 0),
(16, 17, 'admin', '2012-11-26 10:56:48', '<h4><font size="4" face="impact">Dit is zo goede test DUUUH&nbsp;</font></h4>', 3),
(17, 13, 'admin', '2012-11-26 11:25:43', 'Test vraag!<div><br></div>', 1),
(18, 16, 'usertest', '2012-11-26 20:50:49', 'hoi', 1),
(19, 7, 'usertest', '2012-11-27 11:37:03', 'Edddd', 1),
(20, 7, 'usertest', '2012-11-27 11:37:26', 'Q', 1),
(23, 20, 'admin', '2012-11-27 14:38:41', 'vandaag<br>', -1),
(24, 20, 'usertest', '2012-11-27 14:38:42', 'poep', -1),
(25, 20, 'admin', '2012-11-27 14:38:51', 'vandaag<br>', -1),
(26, 20, '12345678901234567890', '2012-11-27 14:40:46', 'vandaag<br>', -1),
(27, 20, '12345678901234567890', '2012-11-27 14:40:56', 'vandaag<br>', 1),
(28, 20, '12345678901234567890', '2012-11-27 14:41:25', 'vandaag<br>', -1),
(33, 22, 'usertest', '2012-11-28 16:04:11', 'Dat mag niet test test test test', 1),
(34, 21, 'usertest', '2012-11-28 16:07:03', 'Dat kan niet maar dit is een test antwoord wat weet ik nou', 1),
(35, 8, 'usertest', '2012-11-28 23:12:51', 'Werkt dit op iPadiPad', 1),
(36, 21, 'usertest', '2012-11-29 09:22:58', 'dat is geheime informatie', 1),
(37, 9, 'usertest', '2012-11-29 10:13:07', 'Hoi', 1),
(38, 15, 'usertest', '2012-11-29 10:13:59', 'Oke', -1),
(40, 15, 'usertest', '2012-11-29 10:29:38', 'e', -1),
(41, 15, 'usertest', '2012-11-29 10:29:40', 'e', -1),
(42, 15, 'usertest', '2012-11-29 10:29:43', 'e', -1),
(43, 15, 'usertest', '2012-11-29 10:29:45', 'e', -1),
(44, 15, 'usertest', '2012-11-29 10:29:47', 'e', 1),
(45, 15, 'usertest', '2012-11-29 10:29:48', '<br>', 1),
(46, 15, 'usertest', '2012-11-29 10:29:50', 'e', 1),
(47, 15, 'usertest', '2012-11-29 10:29:52', 'e', -1),
(48, 15, 'usertest', '2012-11-29 10:34:27', 'f<div>sd</div><div>sd</div><div>s</div><div><br></div>', -1),
(49, 15, 'usertest', '2012-11-29 11:15:41', 'd', 1),
(50, 15, 'usertest', '2012-11-29 11:15:44', 'adfadfad', -1),
(51, 15, 'usertest', '2012-11-29 11:15:47', 'adf', -1),
(52, 14, 'usertest', '2012-11-29 11:19:00', 'Ddgd', 1),
(53, 17, 'usertest', '2012-11-29 11:20:56', 'Ja', 1),
(54, 28, 'usertest', '2012-11-29 14:33:13', 'This is my answer<div><br></div>', 1),
(55, 24, 'Dennis Tjon A Loy', '2012-11-29 18:59:42', 'drugs', 1),
(56, 29, 'Martijn Hanenberg', '2012-11-29 19:04:31', 'de playsttion 4komt waarschijnlijk uit in <b>2013</b>, welke maand precies weet ik niet', 1),
(57, 23, 'Martijn Hanenberg', '2012-11-29 19:06:25', 'nee, studenten die in een zelfstandige woning wonen kunnen in aanmerking komen hiervoor<div>(maximaal150euro)</div>', 1),
(58, 24, 'Danytza', '2012-11-29 19:10:52', 'hij zat teveel aan de drank denk ik,sorry als dat niet juist is', -1),
(59, 24, 'usertest', '2012-11-29 19:58:25', 'Trog ipad', -1),
(60, 27, 'reddiamondforlife', '2012-11-30 08:48:09', 'test<br>', 1),
(61, 27, 'reddiamondforlife', '2012-11-30 08:48:17', 'test2<br>', 1),
(62, 27, 'reddiamondforlife', '2012-11-30 08:48:36', 'test2<br>', -1),
(63, 21, 'graham#2', '2012-11-30 23:58:18', 'bami, soi sauce, blok en chili sauce, zo kan het ook', 1),
(64, 24, 'admin', '2012-12-03 11:00:21', '<img src="http://i.imgur.com/ptESm.png" width="653"><div><br></div><div>sfdaljfkjdsalkfjasdfdsafjsdflsadkjf PEOEP</div>', 1),
(65, 24, 'admin', '2012-12-03 11:01:58', 'kjhgkjhgjhgkjgkj', 1),
(66, 24, 'admin', '2012-12-03 11:02:13', 'ygfhkjkhulk', 1),
(67, 29, 'Olger', '2012-12-04 09:49:07', 'Er is momenteel nog te veel onduidelijkheid om hier een goed antwoord op te kunnen geven.<br>', 1),
(68, 29, 'Olger', '2012-12-04 09:49:18', 'Er is momenteel nog te veel onduidelijkheid om hier een goed antwoord op te kunnen geven.<br>', 1),
(69, 33, 'Olger', '2012-12-04 09:50:59', '6% en 21%. Laag btw tarief is van toepassing op diensten.<br>', 1),
(70, 33, 'Olger', '2012-12-04 09:57:17', 'kjsdkjdskjhasd<br><br>', 1),
(71, 33, 'Olger', '2012-12-04 09:57:25', 'kjsdkjdskjhasd<br><br>', 1),
(72, 33, 'Olger', '2012-12-04 09:58:32', '<br>', 1),
(73, 30, 'Olger', '2012-12-04 10:01:45', 'jfdksahfksdhfkahf', -1),
(74, 19, 'tom', '2012-12-04 10:19:55', 'morgen<br>', 1),
(75, 19, 'tom', '2012-12-04 10:19:57', '<br>', -1),
(76, 35, 'Olger', '2012-12-04 10:55:42', 'geitenmelk@test<br>', 1),
(77, 35, 'Olger', '2012-12-04 10:55:56', 'geitenmelk@test<br>', 1),
(78, 24, 'Olger', '2012-12-04 11:31:22', 'overdosis slaapmiddel<br>', 1),
(79, 24, 'Olger', '2012-12-04 11:31:39', 'overdosis slaapmiddel<br>', -1),
(80, 35, 'Martijn2070', '2012-12-06 10:24:09', 'hoi', 1),
(81, 24, 'Olger', '2012-12-06 21:13:02', 'Test met lang antwoord:&nbsp;<span style="font-family: Arial, Helvetica, sans; font-size: 11px; line-height: 14px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span>', -1),
(82, 24, 'Olger', '2012-12-06 21:13:35', '<p><font face="arial">Test met nog langer antwoord:&nbsp;<span style="line-height: 14px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span style="line-height: 14px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span style="line-height: 14px; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></font></p>', -1),
(83, 27, 'admin ', '2012-12-10 21:00:09', 'Pietje puk!', 1),
(84, 32, 'admin', '2012-12-12 14:02:42', 'TESTER!!!', 0),
(85, 32, 'admin', '2012-12-12 14:03:09', 'test!', 0),
(86, 27, 'admin', '2012-12-12 14:05:41', 'sdfafkasdfa', 0),
(87, 27, 'admin', '2012-12-12 14:06:56', 'adfsasdklfjkalsdf', 0),
(88, 27, 'admin', '2012-12-12 14:07:38', 'sdafsdfasdfa', 0),
(89, 27, 'admin', '2012-12-12 14:07:52', 'Dit is nog een test!<div><br></div>', 0),
(90, 27, 'admin', '2012-12-12 14:11:23', 'Test nog maals tering word er moe van :P', 0),
(91, 27, 'admin', '2012-12-12 14:12:06', 'Nog een test :D', 0),
(92, 27, 'admin', '2012-12-12 14:12:45', 'WE blijven maar testen&nbsp;', 0),
(93, 27, 'admin', '2012-12-12 14:15:52', 'We blijven testen ;)<div><br></div>', 0),
(94, 27, 'admin', '2012-12-12 14:16:47', 'Pipo!<div><br></div>', 0),
(95, 37, 'reddiamondforlife', '2012-12-16 14:44:38', 'Eeen aantal testen!<div><br></div>', 0),
(96, 37, 'reddiamondforlife', '2012-12-16 14:44:42', 'test1', 0),
(97, 37, 'reddiamondforlife', '2012-12-16 14:44:48', 'test2', 0),
(98, 36, 'reddiamondforlife', '2012-12-16 16:03:38', 'kdsjfhakdhfa', 0);

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

INSERT INTO `mail` (`question_id`, `contact_email`) VALUES
(3, 'info@reddiamondforlife.com'),
(3, 'reddiamondforlife@gmail.com'),
(3, 'test1@reddiamondforlife.com'),
(27, 'reddiamondforlife@gmail.com'),
(36, 'reddiamondforlife@gmail.com'),
(37, 'reddiamondforlife@gmail.com');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question_date`, `question_title`, `question_content`, `username`, `is_answered`, `tag`) VALUES
(2, '2012-10-15 21:30:04', 'NS', 'Is Ns een NV?', 'reddiamondforlife', 0, 'daniel'),
(3, '2012-10-15 21:31:52', 'volume', 'wat is de eenheid van volume?', 'reddiamondforlife', 0, ''),
(4, '2012-10-15 22:08:50', 'wat is de hoofstad van nederland', '', 'reddiamondforlife', 0, ''),
(5, '2012-10-15 22:10:40', 'wat is de eenheid van oppervlakte', '', 'reddiamondforlife', 0, ''),
(6, '2012-10-15 22:29:45', 'wat zijn organismen', '', 'reddiamondforlife', 0, 'pieter;daniel'),
(7, '2012-10-16 09:41:11', 'onanhankelijkheid', 'wanneer werd suriname onfhakelijk van nederland', 'reddiamondforlife', 0, ''),
(8, '2012-10-16 10:47:32', 'Bestaan van het leven?', 'Wat is het bestaan van het leven?', 'reddiamondforlife', 0, ''),
(13, '2012-11-20 12:45:35', 'blaadjes', 'hebben blaadjes naadjes?', 'reddiamondforlife', 0, ''),
(15, '2012-11-25 21:06:16', 'Nog een vraag', 'Ja ja Nog een vraag!', 'reddiamondforlife', 0, 'daniel;pieter;bljkl;sdfa;dsaf;sdf;'),
(19, '2012-11-27 11:43:11', ' sinterklaas', 'wanneer komt sinterklaas', 'graham#2', 0, '"sinterklaas"'),
(20, '2012-11-27 14:15:33', 'teammeeting', 'wanneer is er weer een teammeeting', 'graham#2', 0, '"teammeeting"'),
(21, '2012-11-27 14:39:41', 'bami recept ', 'Hoe maak ik bami op zn chinees?', 'jaqueline2$', 0, '"bami"'),
(22, '2012-11-27 15:29:47', 'fiets route rotterdam', 'hoe fiets ik naar rotterdam ?', 'daniel1@', 0, 'fietsen'),
(23, '2012-11-29 09:53:28', 'huurtoeslag', 'Ik ben student en woon in een onzelfstandige woning, heb ik dan recht op huurtoeslag?', 'Mark Westmaas', 0, '"huurtoeslag,onzelfstandigewoning,student"'),
(24, '2012-11-29 10:01:45', 'doodsoorzaak Micheal Jackson', 'Wat is de doodsoorzaak van micheal jackson precies geweest?', 'Doris van Kampen', 0, '"michealjackson,doorsoorzaak"'),
(25, '2012-11-29 10:06:32', 'Mac', 'Mac<br>', 'admin', 0, 'MacDonalds, Burger King, KFC'),
(26, '2012-11-29 10:13:41', 'test', '<br>', 'admin', 0, 'Tweakers KFC test'),
(27, '2012-11-29 10:18:31', 'tweakers', 'tweakers<br>', 'admin', 0, 'Tweakers'),
(28, '2012-11-29 14:30:20', 'Meaning of life', 'What is the meaning of life? I want to know why people are on earth.', 'usertest', 0, 'life;human;existance'),
(29, '2012-11-29 19:02:12', 'playstation 4', 'Wanneer komt de nieuwe playstation 4 van sony uit?', 'Dennis Tjon A Loy', 0, 'sony;playstation4'),
(30, '2012-12-04 09:38:29', 'Stadsrechten Amsterdam', 'In welk jaar kreeg Amsterdam officieel stadsrechten?<br>', 'Olger', 0, 'Amsterdam; stadsrechten; jaar; '),
(31, '2012-12-04 09:42:20', 'Carriére Willem Frederik Hermans', 'Welke activiteiten heeft Willem Frederik Hermans naast zijn bekende werken nog meer ondernomen in zijn leven?<br>', 'Olger', 0, 'Willem;Frederik;Hermans;boeken;literatuur;leven'),
(32, '2012-12-04 09:44:16', 'Literatuur Ajax Amsterdam', 'Voor een onderzoek ben ik op zoek naar de meest recente literatuur over AFC Ajax, kan iemand mij hier mee helpen?<br>', 'Olger', 0, 'Amsterdam;Nederland;AJAX;Voetbal;Club;Literatuur;Boeken'),
(33, '2012-12-04 09:47:50', 'Verschil BTW hoog- en laag tarief', 'Wanneer is er sprake van hoog en wanneer van laag tarief en waarop zijn deze van toepassing.<br>', 'Olger', 0, 'BTW;Hoog;Laag;tarief;belasting;betaling;producten'),
(34, '2012-12-04 10:18:31', 'zullen we kindervoetbal afschaffen?', '<br>', 'tom', 0, ''),
(35, '2012-12-04 10:31:32', 'twitteraccount paus', 'wat is het twitteraccount van de paus?<br>', 'tom', 0, 'paus; vaticaan; twitter'),
(36, '2012-12-06 20:38:58', 'Dit is een testvraag met een hele lange titel zodat ik kan kijken hoe dat er uit ziet in de browse v', 'Hoe heet ik?', 'Olger', 0, 'Tags; zijn; mal;'),
(37, '2012-12-16 14:44:23', 'Test vraag met antwoorden', 'Hier komen wat antwoorden en daarmee ga ik vraag beantwoord testen', 'reddiamondforlife', 95, '');

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
(17, 'admin', 1),
(16, 'admin', 1),
(18, 'usertest', 1),
(3, 'reddiamondforlife', 1),
(2, 'reddiamondforlife', -1),
(15, 'reddiamondforlife', -1),
(14, '1', 1),
(19, 'usertest', 1),
(20, 'usertest', 1),
(27, '12345678901234567890', 1),
(29, 'usertest', 1),
(32, 'usertest', 1),
(5, 'reddiamondforlife', 1),
(11, 'reddiamondforlife', 1),
(33, 'usertest', 1),
(34, 'usertest', 1),
(31, 'usertest', 1),
(35, 'usertest', 1),
(30, 'usertest', -1),
(25, 'admin', -1),
(26, '12345678901234567890', -1),
(23, 'admin', -1),
(22, 'jaqueline2$', -1),
(28, '12345678901234567890', -1),
(24, 'usertest', -1),
(36, 'usertest', 1),
(10, 'reddiamondforlife', -1),
(21, 'usertest', -1),
(37, 'usertest', 1),
(38, 'usertest', -1),
(52, 'usertest', 1),
(53, 'usertest', 1),
(54, 'usertest', 1),
(55, 'Dennis', 1),
(56, 'Martijn', 1),
(58, 'Danytza', -1),
(1, 'reddiamondforlife', 1),
(59, 'usertest', -1),
(57, 'Martijn', 1),
(60, 'reddiamondforlife', 1),
(61, 'reddiamondforlife', 1),
(62, 'reddiamondforlife', -1),
(22, 'jaqueline2', 1),
(50, 'usertest', -1),
(48, 'usertest', -1),
(40, 'usertest', -1),
(47, 'usertest', -1),
(51, 'usertest', -1),
(44, 'usertest', 1),
(42, 'usertest', -1),
(6, 'reddiamondforlife', 1),
(13, '1', 1),
(43, 'usertest', -1),
(63, 'graham', 1),
(41, 'usertest', -1),
(39, 'usertest', -1),
(7, 'reddiamondforlife', 1),
(49, 'usertest', 1),
(45, 'usertest', 1),
(46, 'usertest', 1),
(4, 'reddiamondforlife', 1),
(64, 'admin', 1),
(65, 'admin', 1),
(67, 'Olger', 1),
(69, 'Olger', 1),
(74, 'tom', 1),
(73, 'Olger', -1),
(76, 'Olger', 1),
(77, 'Olger', 1),
(68, 'Olger', 1),
(72, 'Olger', 1),
(71, 'Olger', 1),
(66, 'admin', 1),
(70, 'Olger', 1),
(80, 'Martijn2070', 1),
(75, 'tom', -1),
(78, 'Olger', 1),
(81, 'Olger', -1),
(82, 'Olger', -1),
(79, 'Olger', -1),
(83, 'admin', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `tagcloud`
--

INSERT INTO `tagcloud` (`id`, `tag`, `counter`, `last_tagged`) VALUES
(1, 'Daniël', 9, '2012-11-26 10:53:39'),
(2, 'pietje', 3, '2012-11-14 14:51:00'),
(3, 'klare', 9, '2012-11-14 14:51:00'),
(4, 'test', 4, '2012-11-14 14:51:00'),
(6, 'pieter', 3, '2012-11-26 10:53:39'),
(66, 'paus', 0, '2012-12-04 10:31:32'),
(58, 'Club', 6, '2012-12-04 09:44:16'),
(57, 'Voetbal', 0, '2012-12-04 09:44:16'),
(12, 'blaadjes', 0, '2012-11-20 12:45:35'),
(13, 'naadjes', 0, '2012-11-20 12:45:35'),
(71, ' mal', 0, '2012-12-06 20:38:58'),
(70, ' zijn', 0, '2012-12-06 20:38:58'),
(69, 'Tags', 0, '2012-12-06 20:38:58'),
(68, ' twitter', 0, '2012-12-04 10:31:32'),
(67, ' vaticaan', 0, '2012-12-04 10:31:32'),
(51, 'Hermans', 0, '2012-12-04 09:42:20'),
(50, 'Frederik', 0, '2012-12-04 09:42:20'),
(49, 'Willem', 0, '2012-12-04 09:42:20'),
(48, ' ', 3, '2012-12-16 14:44:23'),
(47, ' jaar', 0, '2012-12-04 09:38:29'),
(46, ' stadsrechten', 0, '2012-12-04 09:38:29'),
(45, 'Amsterdam', 11, '2012-12-04 09:44:16'),
(33, 'fietsen', 0, '2012-11-27 15:29:47'),
(61, 'Laag', 0, '2012-12-04 09:47:50'),
(60, 'Hoog', 0, '2012-12-04 09:47:50'),
(59, 'BTW', 0, '2012-12-04 09:47:50'),
(44, 'playstation4', 0, '2012-11-29 19:02:12'),
(43, 'sony', 0, '2012-11-29 19:02:12'),
(39, 'Tweakers', 10, '2012-11-29 10:18:31'),
(40, 'life', 0, '2012-11-29 14:30:20'),
(41, 'human', 0, '2012-11-29 14:30:20'),
(42, 'existance', 0, '2012-11-29 14:30:20'),
(62, 'tarief', 0, '2012-12-04 09:47:50'),
(63, 'belasting', 0, '2012-12-04 09:47:50'),
(64, 'betaling', 0, '2012-12-04 09:47:50'),
(65, 'producten', 0, '2012-12-04 09:47:50');

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
  `allow_contact` tinyint(1) NOT NULL DEFAULT '0',
  `allow_notification` tinyint(1) NOT NULL DEFAULT '0',
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_edit` date NOT NULL,
  `biography` varchar(300) NOT NULL,
  `user_rating` int(11) NOT NULL DEFAULT '0',
  `atoba` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `first_name`, `tussenvoegsel`, `last_name`, `password`, `contact_email`, `email_hidden`, `contact_facebook`, `facebook_hidden`, `contact_twitter`, `twitter_hidden`, `allow_contact`, `allow_notification`, `registration_date`, `last_edit`, `biography`, `user_rating`, `atoba`) VALUES
('admin', 'Daniel', '', 'Koek', '9b03f294913323d34bdb37231f0729852ec2b230e07d52e01c8b3ffe4376fef4ac6caf782f0e382c1998836322f330a55abd3ab05205d432b4fbc21c526f5ec7', 'reddiamondforlife@gmail.com', 1, 'http://facebook.com/danielkoek945', 1, 'http://twitter.com/davidshadoow', 1, 0, 0, '2012-11-26 10:59:34', '0000-00-00', 'IK.', 17, 0),
('daniel1@', 'Daniël', '', 'Koek', 'b51e3c6abba34cfe3a2febf3a4964ed972ffe3c2ccfa21b1f9ef2fe255edfb9d9753b4f32061adf20f04ae30af0c96d47c3267b2f62b641018bfb393d8e899fe', 'reddiamondforlife@gmail.com', 1, '', 0, 'https://twitter.com/danielkoek', 1, 0, 0, '2012-11-27 15:25:13', '0000-00-00', '', 7, 0),
('Dennis Tjon A Loy', 'Dennis', '', 'Tjon A Loy', '73f7ca97a7520db7fb0d3d7a00e189bfb7ffd4ab57e113233db231d06f85e1ed1ea0a556ab2fbce2a6748cb9a67f3cee685fbe9a013a8cdd746815d82105f79e', 'havyboy777@hotmail.com', 1, '', 1, '', 1, 0, 0, '2012-11-29 09:34:24', '0000-00-00', '', 3, 0),
('Dijkstra', 'Odin', '', 'Dijkstra', '4e5a43ad9662db452d377bb76cb5ed127ffcc69c106900cabaa1c7f6e094b6dd22cce9df46aa28c128883d7b30fef3f766a507a7435fab3a24ecb88f27c31fdd', 'dijkstrao@hotmail.com', 1, '', 0, '', 0, 0, 0, '2012-11-29 09:38:47', '0000-00-00', '', 0, 0),
('donovan3!^          ', 'Donovan', 'van der', 'Mark', '4d08e9c259a3daba58daf29d6b024c5a3d4a84327dee604ba2c1fb1cb912da841e3103ea0d85ed2bf9edfa577839d08ff15b3cd647d707e6c6505c84873e154a', 'dvdmark@quicknet.nl', 1, 'https://www.facebook.com/donovan3', 1, 'https://twitter.com/dono!', 1, 0, 0, '2012-11-27 15:05:25', '0000-00-00', '', 45, 0),
('Doris van Kampen', 'Doris', 'van', 'Kampen', '1d037973db65337af6186ebd4e7dbf7f1258eff34a7d6cde07bda08d1f0a6a5da35812d820abe6bb34ab22d147a7d4a4c5fc73e406952d9324ed406dd99d2352', 'dorisd@hotmail.com', 1, '', 0, '', 0, 0, 0, '2012-11-29 09:33:14', '0000-00-00', '', -5, 0),
('GedyGlymn', 'Gerdy', 'van', 'Wijngaarden', '409fbdb1fcefe6784ebe95818e65a5c9a8e9bd8a840b481f71a918deec78af599243d513e1b87c3cc02c4d3ba58410ca45dc52bbbd0fee0b9cc600119fecd857', 'twsdpi@yahoo.com', 1, '', 0, 'https://twitter.com/GedyG', 1, 0, 0, '2012-10-25 00:00:00', '0000-00-00', '', 21, 0),
('graham#2', 'Graham', '', 'Tjin Liep Shie', 'b51e3c6abba34cfe3a2febf3a4964ed972ffe3c2ccfa21b1f9ef2fe255edfb9d9753b4f32061adf20f04ae30af0c96d47c3267b2f62b641018bfb393d8e899fe', 'havyboy777@hotmail.com', 1, '', 1, '', 1, 0, 0, '2012-11-27 11:40:17', '0000-00-00', '', 0, 0),
('jaqueline2$', 'Jaqueline', '', 'Rijstkip', '1d037973db65337af6186ebd4e7dbf7f1258eff34a7d6cde07bda08d1f0a6a5da35812d820abe6bb34ab22d147a7d4a4c5fc73e406952d9324ed406dd99d2352', 'jrijstkip@hotmail.com', 1, '', 0, '', 0, 0, 0, '2012-11-27 13:58:32', '0000-00-00', '', -1, 0),
('Jose', '', '', '', 'c8723ae7e41f9c756627f929fc3a3d56cc872d2fc4af5a4b3759ea6ca8c7dbf192000c36287bc6b8b0b0c986b7fb3f3ef1aa685e7b12d942a8c1616f0796dac1', 'Test@test.nl', 1, '', 1, '', 1, 0, 0, '2012-12-04 10:34:57', '0000-00-00', '', 0, 0),
('Laura Oorebeek', 'Laura', '', 'Oorebeek', '2d71f5d7d9cbac5efcf7d4b47b329ea5dc431d9a09ff17a63a3dcb5fd893d0c9f9fc17dada53fce1a47973ee19e347199659d007b74a97b012830cf7ac059449', 'oorebeek@hotmail.com', 1, '', 0, '', 0, 0, 0, '2012-11-29 09:39:50', '0000-00-00', 'Ik ben Laura Orebeek en ik studeer Biomedische Wetenschappen aan de VU in Amsterdam. Ik weet veel van biologie en scheikunde.', 7, 0),
('Mark Westmaas', 'Mark', '', 'Westmaas', 'e4af8d12048a1ff12e0f7fadb3664ac3770443b47055d2b4cea31318a213d3c47215c131e0e75a0b71a7dc14804c96d910fc0952aca1db2ea8da2f737564e7ec', 'markw@hva.nl', 1, '', 1, '', 1, 0, 0, '2012-11-29 09:40:29', '0000-00-00', '', 0, 0),
('Martijn2070', 'Martijn', '', 'van Delden', 'f4a923f3f7717889ea952aabb91265b199e97437a33b79124aba297558cae57c80c7977e463ceb4284f3567a5689720d5e233e5f909da2dba2621178022c87ad', 'martijn2070@hotmail.com', 1, 'http://facebook.com/martijnvandelden1', 1, 'Mytweets', 1, 0, 0, '2012-11-07 00:00:00', '0000-00-00', 'Ik ben martijn', 1, 0),
('MartijnH', 'Martijn', '', 'Harenberg', '2803755c12e7d02a4815ca4b310621876159f9cc26d0a3939d100aef15a510c5171ecb62389fa7bb8a1dfd95ab3a5acaf6ffddb844409ed7f7821b0de4e22568', '', 0, 'https://www.facebook.com/martijnh1987', 1, '', 0, 0, 0, '2012-11-29 09:41:25', '0000-00-00', '', 0, 0),
('Olger', '', '', '', '98224fcb7023fc2c9d0a066dee3d081310cd03c370a0a5961ab4a4a361e6e200ef367da394aa0af3647f0385760ff40d29fdfaf05123683c7bba6ed1174e08a6', 'olger01@gmail.com', 1, '', 1, '', 1, 0, 0, '2012-12-03 19:48:19', '0000-00-00', '', 5, 0),
('olger01', 'Olger', '', 'Alphenaar', '1da3d16048fbe1b001e04a27f2fc33b5e516300d57d93b8f4c0bb0efca39bbe59dbd468c37d086a1bc34363a71fa9e0fb1545f010bb5c488789267a55b5df428', 'olger01@gmail.com', 1, '', 1, '', 1, 0, 0, '2012-11-27 13:44:48', '0000-00-00', '', 9, 0),
('reddiamondforlife', 'Daniël', '', 'Koek', '1ad2c49e5766b4c68f190608679b1a7e9d7c0c6cc4484bc711552e40c5e2aa0aa8223f91b5ec5a036a39240bcd05686ac7140ff8108320d6230cc002fda9511d', 'reddiamondforlife@gmail.com', 1, '', 0, 'https://twitter.com/danielkoek', 1, 0, 0, '2012-09-11 00:00:00', '0000-00-00', '', 44, 0),
('tom', '', '', '', '2eab065fcea6ffdfbd08393e1fd028ca4c7696182df96fa487f059c657232fb1ef8244a072fbef5c42ef72620cf57d5ee1e4ae494da3b2b3f63f93db33edcffb', 'j.remijn@oba.nl', 1, '', 1, '', 1, 0, 0, '2012-12-04 10:16:32', '0000-00-00', '', 0, 1);
