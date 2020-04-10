-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 10 avr. 2020 à 09:55
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
  `roles_id` int(11) NOT NULL,
  `id_joueur` int(11) NOT NULL,
  `id_superviseur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_creneaux_idrole` (`roles_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `creneaux`
--

INSERT INTO `creneaux` (`id`, `Date`, `NB_joueurs`, `Nom_joueur`, `Num_joueur`, `Time`, `Statut`, `roles_id`, `id_joueur`, `id_superviseur`) VALUES
(5, '2020-03-29', '0', '', '', '20:59:00', 0, 0, 0, 0),
(12, '2020-03-31', '', '', '', '16:00:00', 0, 0, 0, 0),
(13, '2020-04-19', '', '', '', '14:00:00', 1, 0, 0, 0),
(28, '2020-03-31', '1', 'Dohin', '0670449615', '16:00:00', 1, 0, 0, 0),
(29, '2020-03-31', '1', 'Dohin', '0670449615', '16:00:00', 1, 0, 0, 0),
(36, '2020-04-19', '1', 'Dohin', '0670449615', '14:00:00', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `level` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `level`) VALUES
(1, 'aministrateur', 2),
(2, 'superviseur', 1);

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
  KEY `fk_users_idrole` (`roles_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `roles_id`) VALUES
(2, 'superviseur', 'superviseur', 2),
(9, 'admin', 'admin', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
