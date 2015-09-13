-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 13 Septembre 2015 à 17:52
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ogs_stats`
--

-- --------------------------------------------------------

--
-- Structure de la table `ostats_modules`
--

CREATE TABLE IF NOT EXISTS `ostats_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `version` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Contenu de la table `ostats_modules`
--

INSERT INTO `ostats_modules` (`id`, `name`, `version`) VALUES
(1, 'xtense', NULL),
(2, 'autoupdate', NULL),
(3, 'attaques', NULL),
(4, 'cdr', NULL),
(5, 'superapix', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ostats_ogspy`
--

CREATE TABLE IF NOT EXISTS `ostats_ogspy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ogspy_key` varchar(32) NOT NULL,
  `version` varchar(10) NOT NULL,
  `install_date` int(10) NOT NULL,
  `last_seen` int(11) DEFAULT NULL,
  `nb_users` int(11) NOT NULL,
  `db_size` int(11) NOT NULL,
  `php_version` varchar(10) NOT NULL,
  `uni` varchar(5) NOT NULL,
  `pays` varchar(5) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;


-- --------------------------------------------------------

--
-- Structure de la table `ostats_ogspy_has_modules`
--

CREATE TABLE IF NOT EXISTS `ostats_ogspy_has_modules` (
  `ogspy_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`ogspy_id`,`module_id`),
  KEY `fk_ogspy_has_modules_modules1_idx` (`module_id`),
  KEY `fk_ogspy_has_modules_ogspy_idx` (`ogspy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
