-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 30 déc. 2020 à 13:54
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `marieteam`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idReservation` int(10) NOT NULL AUTO_INCREMENT,
  `dateReservation` datetime DEFAULT NULL,
  `prixTotal` decimal(10,0) NOT NULL,
  `idUtilisateur` varchar(10) NOT NULL,
  `idTraverse` varchar(10) NOT NULL,
  PRIMARY KEY (`idReservation`),
  KEY `idUtilisasteur` (`idUtilisateur`),
  KEY `idTraverse` (`idTraverse`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idReservation`, `dateReservation`, `prixTotal`, `idUtilisateur`, `idTraverse`) VALUES
(9, '2020-12-29 14:56:00', '200', '2', '1'),
(8, '2020-12-29 14:55:00', '200', '2', '1'),
(7, '2020-12-29 14:54:00', '200', '2', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
