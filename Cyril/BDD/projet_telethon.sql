-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 27 mars 2020 à 09:50
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

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
-- Structure de la table `administrateurs`
--

DROP TABLE IF EXISTS `administrateurs`;
CREATE TABLE IF NOT EXISTS `administrateurs` (
  `idadministrateurs` int(30) NOT NULL AUTO_INCREMENT,
  `mot_de_passe` varchar(45) NOT NULL,
  `nom_utilisateur` varchar(45) NOT NULL,
  PRIMARY KEY (`idadministrateurs`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`idadministrateurs`, `mot_de_passe`, `nom_utilisateur`) VALUES
(1, 'jhon', 'jhon');

-- --------------------------------------------------------

--
-- Structure de la table `creneaux`
--

DROP TABLE IF EXISTS `creneaux`;
CREATE TABLE IF NOT EXISTS `creneaux` (
  `Date` date NOT NULL,
  `NBPersonne` int(11) NOT NULL,
  `Nom` varchar(45) NOT NULL,
  `Num_Telephone` varchar(45) NOT NULL,
  `idcreneaux` int(100) NOT NULL AUTO_INCREMENT,
  `Time` time NOT NULL,
  PRIMARY KEY (`idcreneaux`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `creneaux`
--

INSERT INTO `creneaux` (`Date`, `NBPersonne`, `Nom`, `Num_Telephone`, `idcreneaux`, `Time`) VALUES
('2020-03-27', 3, 'DOHIN', '0670449615', 1, '00:00:00'),
('2020-03-09', 3, 'ggggg', '0652525252', 2, '19:13:00');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `end_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Block',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `title`, `start_date`, `end_date`, `status`) VALUES
(1, '9h30 - 10h30', '2020-03-27', '2020-03-27', 1);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `slog` varchar(30) NOT NULL,
  `level` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slog`, `level`) VALUES
(1, 'aministrateur', 'admin', 2),
(2, 'superviseur', 'super', 1);

-- --------------------------------------------------------

--
-- Structure de la table `superviseurs`
--

DROP TABLE IF EXISTS `superviseurs`;
CREATE TABLE IF NOT EXISTS `superviseurs` (
  `idsuperviseurs` int(30) NOT NULL AUTO_INCREMENT,
  `mot_de_passe` varchar(45) NOT NULL,
  `nom_utilisateur` varchar(45) NOT NULL,
  PRIMARY KEY (`idsuperviseurs`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `superviseurs`
--

INSERT INTO `superviseurs` (`idsuperviseurs`, `mot_de_passe`, `nom_utilisateur`) VALUES
(12, '123', 'cyril');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `address` text NOT NULL,
  `role_id` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `address`, `role_id`) VALUES
(1, 'admin', 'admin', 'je suis un admin', 1),
(2, 'superviseur', 'superviseur', 'membre superviseur', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
