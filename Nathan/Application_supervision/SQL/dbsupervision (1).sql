-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 05 juin 2020 à 06:53
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

-- --------------------------------------------------------

--
-- Structure de la table `tbequipe`
--

DROP TABLE IF EXISTS `tbequipe`;
CREATE TABLE IF NOT EXISTS `tbequipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `score` decimal(10,0) NOT NULL,
  `date` datetime NOT NULL,
  `heure_debut` time(6) NOT NULL,
  `heure_fin` time(6) NOT NULL,
  `nbjoueurs` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=204 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbequipe`
--

INSERT INTO `tbequipe` (`id`, `nom`, `score`, `date`, `heure_debut`, `heure_fin`, `nbjoueurs`) VALUES
(153, 'test', '1234', '2020-04-29 11:29:55', '11:29:55.000000', '11:30:05.000000', 0),
(149, 'Nouvelle équipe', '0', '2020-04-29 10:39:46', '10:39:46.000000', '00:00:00.000000', 0),
(148, 'L\'equipe de test ! ', '0', '2020-04-29 09:18:59', '09:18:59.000000', '00:00:00.000000', 0),
(147, 'Nouvelle équipe #2904 !', '1234', '2020-04-29 08:36:17', '08:36:17.000000', '08:37:14.000000', 0),
(146, 'The best group #2', '1234', '2020-04-27 11:19:49', '11:19:49.000000', '11:20:17.000000', 0),
(144, 'La nouvelle équipe !', '0', '2020-04-27 11:18:24', '11:18:24.000000', '00:00:00.000000', 0),
(126, 'nouveau test - nouvelle équipe !?!', '1234', '2020-04-27 08:57:02', '08:57:02.000000', '08:57:37.000000', 0),
(172, 'nouveau test', '1234', '2020-06-04 09:43:13', '09:43:13.000000', '09:43:38.000000', 5),
(203, 'L\'équipe de St Félix - La Salle', '1234', '2020-06-04 10:28:05', '10:28:05.000000', '10:30:24.000000', 3),
(157, 'nouvelle equipe de 3 joueurs', '1234', '2020-05-06 10:15:37', '10:15:37.000000', '10:15:59.000000', 3),
(170, 'L\'équipe de test ! ', '1234', '2020-05-15 08:57:25', '08:57:25.000000', '08:59:26.000000', 3),
(169, 'L\'équipe du 7 mai', '1234', '2020-05-07 10:22:21', '10:22:21.000000', '10:24:01.000000', 3),
(162, 'nouveau test', '0', '2020-05-07 08:48:43', '08:48:43.000000', '00:00:00.000000', 2);

-- --------------------------------------------------------

--
-- Structure de la table `tbindice`
--

DROP TABLE IF EXISTS `tbindice`;
CREATE TABLE IF NOT EXISTS `tbindice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(60) NOT NULL,
  `date_dernier_envoi` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tbindice`
--

INSERT INTO `tbindice` (`id`, `text`, `date_dernier_envoi`) VALUES
(1, 'Allez vers l\'est...', NULL),
(6, 'Allez vers l\'ouest...', NULL),
(28, 'Nouvel indice !', NULL),
(13, 'Allez vers le nord...', NULL),
(36, 'Test avec date ok?', '2020-04-27 09:14:21'),
(37, 'Ceci est un indice', '2020-04-27 09:45:11'),
(43, 'Nouvel indice 2904', '2020-04-29 11:06:29'),
(44, 'Voici un indice qui aide beaucoup !', '2020-05-07 08:53:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
