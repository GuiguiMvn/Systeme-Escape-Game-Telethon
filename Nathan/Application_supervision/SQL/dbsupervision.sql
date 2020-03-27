-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 27 mars 2020 à 09:35
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `dbsupervision`
--
CREATE DATABASE IF NOT EXISTS `dbsupervision` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dbsupervision`;

-- --------------------------------------------------------

--
-- Structure de la table `tbequipe`
--

DROP TABLE IF EXISTS `tbequipe`;
CREATE TABLE IF NOT EXISTS `tbequipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `score` decimal(10,0) NOT NULL,
  `date` date NOT NULL,
  `heure_debut` time(6) NOT NULL,
  `heure_fin` time(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbequipe`
--

INSERT INTO `tbequipe` (`id`, `nom`, `score`, `date`, `heure_debut`, `heure_fin`) VALUES
(17, '', '0', '2020-03-27', '10:07:23.000000', '00:00:00.000000'),
(16, '', '0', '2020-03-27', '10:06:27.000000', '00:00:00.000000'),
(15, 'test4', '0', '2020-03-27', '09:47:10.000000', '00:00:00.000000'),
(12, 'test2', '0', '2020-03-27', '09:44:11.000000', '00:00:00.000000');

-- --------------------------------------------------------

--
-- Structure de la table `tbindice`
--

DROP TABLE IF EXISTS `tbindice`;
CREATE TABLE IF NOT EXISTS `tbindice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbindice`
--

INSERT INTO `tbindice` (`id`, `text`) VALUES
(1, 'Allez vers l\'est...'),
(2, 'Allez vers l\'est...'),
(3, 'Allez vers l\'est...'),
(4, 'Allez vers l\'est...'),
(5, 'Allez vers l\'ouest...');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
