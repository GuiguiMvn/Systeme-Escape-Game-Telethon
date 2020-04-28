-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 28 avr. 2020 à 08:12
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_telethon`
--
CREATE DATABASE IF NOT EXISTS `projet_telethon` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projet_telethon`;

-- --------------------------------------------------------

--
-- Structure de la table `creneaux`
--

DROP TABLE IF EXISTS `creneaux`;
CREATE TABLE IF NOT EXISTS `creneaux` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Date` date NOT NULL,
  `NB_joueurs` varchar(11) NOT NULL,
  `Nom_joueur` varchar(30) NOT NULL,
  `Num_joueur` varchar(30) NOT NULL,
  `Time` time NOT NULL,
  `Statut` tinyint(1) NOT NULL DEFAULT '1' COMMENT ' 1=Active, 0=Block ',
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_creneaux_users` (`users_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `creneaux`
--

INSERT INTO `creneaux` (`id`, `Date`, `NB_joueurs`, `Nom_joueur`, `Num_joueur`, `Time`, `Statut`, `users_id`) VALUES
(48, '2020-04-18', '', '', '', '04:02:00', 1, 0),
(45, '2020-04-16', '', '', '', '01:02:00', 1, 0),
(40, '2020-04-17', '1', 'Dohin', '0670449615', '00:00:00', 0, 0),
(39, '2020-04-18', '1', 'r', '0670449615', '04:00:00', 0, 0),
(46, '2020-04-09', '', '', '', '01:02:00', 1, 0),
(47, '2020-04-23', '', '', '', '04:03:00', 1, 0),
(49, '2020-04-13', '', '', '', '20:02:00', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'aministrateur'),
(2, 'superviseur');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `roles_id` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_roles` (`roles_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `roles_id`) VALUES
(2, 'superviseur', 'superviseur', 2),
(9, 'admin', 'admin', 1),
(12, 'cyril', 'dohi', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
