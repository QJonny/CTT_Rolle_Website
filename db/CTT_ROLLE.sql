-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le : Dim 21 Décembre 2014 à 14:50
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ctt_rolle`
--

-- --------------------------------------------------------

--
-- Structure de la table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `albums_id` int(11) NOT NULL AUTO_INCREMENT,
  `albums_title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `albums_date` date NOT NULL,
  `albums_description` varchar(1000) CHARACTER SET utf8 NOT NULL,
  KEY `albums_id` (`albums_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `albums`
--

INSERT INTO `albums` (`albums_id`, `albums_title`, `albums_date`, `albums_description`) VALUES
(1, 'DHS Europe 2014', '2014-02-07', 'La DHS Europe est le tournoi proposant des affrontements entre les joueurs du top 12 (hommes et femmes) d''Europe');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `articles_id` int(11) NOT NULL AUTO_INCREMENT,
  `articles_title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `articles_date` date NOT NULL,
  KEY `articles_id` (`articles_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`articles_id`, `articles_title`, `articles_date`) VALUES
(1, 'Une championne pour entra&icirc;ner les juniors', '2013-12-06');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `news_date` date NOT NULL,
  `news_message` varchar(20000) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_date`, `news_message`) VALUES
(1, 'M&eacute;daille de bronze aux Championnats Vaudois pour Th&eacute;o', '2014-03-22', 'Th&eacute;o a particip&eacute; aux Championnats vaudois en cat&eacute;gorie E et est arriv&eacute; 3&egrave;me, recevant ainsi la medaille de bronze. Un grand bravo pour lui!!'),
(2, 'S&eacute;b et Th&eacute;o sont depuis hier CHAMPIONS SUISSES', '2014-06-14', 'Dimanche dernier, les finales du Suisse Junior Challenge avaient lieu &agrave; Locarno. Les dix meilleures &eacute;quipes de deux non-licenci&eacute;es avaient pu se qualifier pour cette finale d''une cat&eacute;gorie unique U14. Presque toutes les associations r&eacute;gionales &eacute;taient repr&eacute;sent&eacute;es car des &eacute;quipes de l''AGTT, ATTT, AVVF, MTTV, NWTTV et OTTV &eacute;taient pr&eacute;sentes.<br/><br/>Les &eacute;quipes &eacute;taient divis&eacute;es en deux groupes de cinq, les deux premiers &eacute;tant qualifi&eacute;s pour les demi-finales. En finale, Rolle s''imposa contre Locarno 2. Rolle a convaincu en gagnant tous ses matchs de la journ&eacute;e &agrave; 0.<br/><br/>Les &eacute;quipes sur le podium, outre les m&eacute;dailles, re&ccedil;urent &eacute;galement de supers prix. L''entreprise Zalando a sponsoris&eacute; des bons. En plus, des sacs de sport et des t-shirs furent distribu&eacute;s.'),
(3, 'Nouvelles &eacute;quipes form&eacute;es!!', '2014-08-14', 'Les nouveaux teams ont vu le jour depuis peu de temps.');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(128) NOT NULL,
  `set_time` varchar(10) NOT NULL,
  `data` text NOT NULL,
  `session_key` varchar(128) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sessions`
--

INSERT INTO `sessions` (`session_id`, `set_time`, `data`, `session_key`) VALUES
('iv5pchumhgjvfgg9nbc2j23jl0o27ed6rd0jigme7a3vbsuk2cns3kt4ipeibeutnsitjiotcvcjsna2i5ods6kmjelvu4kq3730561', '1419169702', 'jmJ+Oy8lfVonBfG6DsQuDtKhq9bjZk3jctDw9Tc4WdM=', 'b0f995b7c629c5d742fdcb4634b382b80e4b9c3665add8b192af5633a46aed7802188754b39b42e45af66973110d5f259900226a0ad28db5274d3b2e45ffe328');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `is_admin` int(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `is_admin`) VALUES
(1, 'admin', 'a4712bdadc98a3e2696794af21d5cfa6', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
