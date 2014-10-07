-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2014 at 10:07 PM
-- Server version: 5.5.37-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `CTT_ROLLE`
--

-- --------------------------------------------------------

--
-- Table structure for table `Albums`
--

CREATE TABLE IF NOT EXISTS `Albums` (
  `albums_id` int(11) NOT NULL AUTO_INCREMENT,
  `albums_title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `albums_date` date NOT NULL,
  `albums_description` varchar(1000) CHARACTER SET utf8 NOT NULL,
  KEY `albums_id` (`albums_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Albums`
--

INSERT INTO `Albums` (`albums_id`, `albums_title`, `albums_date`, `albums_description`) VALUES
(1, 'DHS Europe 2014', '2014-02-07', 'La DHS Europe est le tournoi proposant des affrontements entre les joueurs du top 12 (hommes et femmes) d''Europe');

-- --------------------------------------------------------

--
-- Table structure for table `Articles`
--

CREATE TABLE IF NOT EXISTS `Articles` (
  `articles_id` int(11) NOT NULL AUTO_INCREMENT,
  `articles_title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `articles_date` date NOT NULL,
  KEY `articles_id` (`articles_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Articles`
--

INSERT INTO `Articles` (`articles_id`, `articles_title`, `articles_date`) VALUES
(1, 'Une championne pour entra&icirc;ner les juniors', '2013-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `News`
--

CREATE TABLE IF NOT EXISTS `News` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `news_date` date NOT NULL,
  `news_message` varchar(20000) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `News`
--

INSERT INTO `News` (`news_id`, `news_title`, `news_date`, `news_message`) VALUES
(1, 'M&eacute;daille de bronze aux Championnats Vaudois pour Th&eacute;o', '2014-03-22', 'Th&eacute;o a particip&eacute; aux Championnats vaudois en cat&eacute;gorie E et est arriv&eacute; 3&egrave;me, recevant ainsi la medaille de bronze. Un grand bravo pour lui!!'),
(2, 'S&eacute;b et Th&eacute;o sont depuis hier CHAMPIONS SUISSES', '2014-06-14', 'Dimanche dernier, les finales du Suisse Junior Challenge avaient lieu &agrave; Locarno. Les dix meilleures &eacute;quipes de deux non-licenci&eacute;es avaient pu se qualifier pour cette finale d''une cat&eacute;gorie unique U14. Presque toutes les associations r&eacute;gionales &eacute;taient repr&eacute;sent&eacute;es car des &eacute;quipes de l''AGTT, ATTT, AVVF, MTTV, NWTTV et OTTV &eacute;taient pr&eacute;sentes.<br/><br/>Les &eacute;quipes &eacute;taient divis&eacute;es en deux groupes de cinq, les deux premiers &eacute;tant qualifi&eacute;s pour les demi-finales. En finale, Rolle s''imposa contre Locarno 2. Rolle a convaincu en gagnant tous ses matchs de la journ&eacute;e &agrave; 0.<br/><br/>Les &eacute;quipes sur le podium, outre les m&eacute;dailles, re&ccedil;urent &eacute;galement de supers prix. L''entreprise Zalando a sponsoris&eacute; des bons. En plus, des sacs de sport et des t-shirs furent distribu&eacute;s.'),
(3, 'Nouvelles &eacute;quipes form&eacute;es!!', '2014-08-14', 'Les nouveaux teams ont vu le jour depuis peu de temps.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
