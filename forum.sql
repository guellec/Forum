-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 10 Février 2014 à 16:25
-- Version du serveur: 5.5.34-0ubuntu0.13.04.1
-- Version de PHP: 5.4.9-4ubuntu2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(1024) COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_sujet` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `contenu`, `date`, `id_sujet`, `id_user`) VALUES
(1, 'Salut, c''est cool, je suis vraiment heureuse de savoir que je peux compter sur toi en cas de soucis...', '2014-02-07 12:00:51', 1, 3),
(2, 'Nouvelle reponse', '2014-02-10 13:51:57', 1, 3),
(3, 'Troisiem reponse Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, ipsum, aspernatur eaque molestiae necessitatibus dignissimos quaerat maiores voluptates debitis beatae nulla optio modi soluta quia fugiat accusantium repellendus voluptas ratione.', '2014-02-10 13:52:49', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `sujets`
--

CREATE TABLE IF NOT EXISTS `sujets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(64) COLLATE utf8_bin NOT NULL,
  `contenu` varchar(1024) COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_theme` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Contenu de la table `sujets`
--

INSERT INTO `sujets` (`id`, `titre`, `contenu`, `date`, `id_theme`, `id_user`) VALUES
(1, 'Salut, je suis l''administrateur du forum de Docteur Love', 'Salut, je suis l''administrateur du forum de Docteur Love, n''hésitez pas à me poser vos questions pour tout ce qui concerne le fonctionnement de ce forum', '2014-02-07 11:55:59', 1, 17),
(2, 'Nouveau sujet', 'Nouveau contenu', '2014-02-10 09:46:50', 2, 1),
(3, 'Test', 'tesdt', '2014-02-10 10:23:18', 3, 1),
(4, 'Test', 'tesdt', '2014-02-10 10:23:20', 4, 1),
(5, 'zaerty', 'toto', '2014-02-10 11:04:23', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(64) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Contenu de la table `themes`
--

INSERT INTO `themes` (`id`, `nom`) VALUES
(1, 'Presentation'),
(2, 'Profil du jour'),
(3, 'Les conseils de Dr. Love'),
(4, 'Coin detente');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(32) COLLATE utf8_bin NOT NULL,
  `pass` varchar(64) COLLATE utf8_bin NOT NULL,
  `avatar` varchar(32) COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=38 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `avatar`, `date`, `admin`) VALUES
(1, 'Laurence', 'Laurence', 'woman1.png', '2014-02-07 01:22:16', 0),
(2, 'Julie', 'Julie', 'woman2.png', '2014-02-07 01:22:16', 0),
(3, 'Sarah', 'Sarah', 'woman3.png', '2014-02-07 01:22:16', 0),
(4, 'Morgan', 'Morgan', 'woman4.png', '2014-02-07 01:22:16', 0),
(5, 'Juliette', 'Juliette', 'woman5.png', '2014-02-07 01:22:16', 0),
(6, 'Bernadette', 'Bernadette', 'woman6.png', '2014-02-07 01:22:16', 0),
(7, 'Gwenaelle', 'Gwenaelle', 'woman7.png', '2014-02-07 01:22:16', 0),
(8, 'Jennifer', 'Jennifer', 'woman8.png', '2014-02-07 01:22:16', 0),
(9, 'Cindy', 'Cindy', 'woman9.png', '2014-02-07 01:22:16', 0),
(10, 'Jenny', 'Jenny', 'woman10.png', '2014-02-07 01:22:16', 0),
(11, 'Cathy', 'Cathy', 'woman11.png', '2014-02-07 11:20:46', 0),
(12, 'Xenda', 'Xenda', 'woman12.png', '2014-02-07 11:20:46', 0),
(13, 'Petula', 'Petula', 'woman13.png', '2014-02-07 11:26:11', 0),
(14, 'Mercedes', 'Mercedes', 'woman14.png', '2014-02-07 11:26:11', 0),
(15, 'Madeleine', 'Madeleine', 'woman15.png', '2014-02-07 11:26:11', 0),
(16, 'DocteurLove', 'DocteurLove', '1-DocteurLove.png', '2014-02-07 11:26:11', 0),
(17, 'Admin', 'truelove', '0-admin.png', '2014-02-07 11:26:11', 1),
(18, 'PsyLove', 'PsyLove', '2-PsyLove.png', '2014-02-07 11:27:28', 0),
(19, 'manDefault', 'manDefault', '4-manDefault.png', '2014-02-07 11:27:28', 0),
(20, 'womanDefault', 'womanDefault', '5-womanDefault.png', '2014-02-07 11:28:19', 0),
(21, 'James', 'James', 'man1.png', '2014-02-07 11:36:06', 0),
(22, 'Joseph', 'Joseph', 'man2.png', '2014-02-07 11:36:06', 0),
(23, 'Robert', 'Robert', 'man3.png', '2014-02-07 11:36:06', 0),
(24, 'Yekapharoa', 'Yekapharoa', 'man4.png', '2014-02-07 11:36:06', 0),
(25, 'Henry', 'Henry', 'man5.png', '2014-02-07 11:36:06', 0),
(26, 'Bobby', 'Bobby', 'man6.png', '2014-02-07 11:36:06', 0),
(27, 'Bonz', 'Bonz', 'man7.png', '2014-02-07 11:36:06', 0),
(28, 'Max', 'Max', 'man8.png', '2014-02-07 11:36:06', 0),
(29, 'Pascal', 'Pascal', 'man9.png', '2014-02-07 11:36:06', 0),
(30, 'Roland', 'Roland', 'man10.png', '2014-02-07 11:36:06', 0),
(31, 'Jeff', 'Jeff', 'man11.png', '2014-02-07 11:36:06', 0),
(32, 'Romain', 'Romain', 'man12.png', '2014-02-07 11:36:06', 0),
(33, 'Dom', 'Dom', 'man13.png', '2014-02-07 11:36:06', 0),
(34, 'Archimede', 'Archimede', 'man14.png', '2014-02-07 11:36:06', 0),
(35, 'Steven', 'Steven', 'man15.png', '2014-02-07 11:36:06', 0),
(36, 'Newone', 'mdp', '4-manDefault.png', '2014-02-07 16:28:09', 0),
(37, 'Newtwo', 'toto', '4-manDefault.png', '2014-02-10 15:04:54', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
