-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 16 nov. 2020 à 14:17
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
-- Base de données :  `marieteam`
--

-- --------------------------------------------------------

--
-- Structure de la table `traverse`
--

DROP TABLE IF EXISTS `traverse`;
CREATE TABLE IF NOT EXISTS `traverse` (
  `idTraverse` varchar(10) NOT NULL,
  `dateDepart` date DEFAULT NULL,
  `heureDepart` time DEFAULT NULL,
  `duree` double DEFAULT NULL,
  `idLiaison` varchar(10) NOT NULL,
  `idBateau` varchar(10) NOT NULL,
  PRIMARY KEY (`idTraverse`),
  KEY `idLiaison` (`idLiaison`),
  KEY `idBateau` (`idBateau`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `traverse`
--

INSERT INTO `traverse` (`idTraverse`, `dateDepart`, `heureDepart`, `duree`, `idLiaison`, `idBateau`) VALUES
('Tr001', '2020-11-11', '09:41:00', 320, 'Ls001', 'Ba001'),
('Tr002', '2020-12-24', '16:06:00', 300, 'Ls001', 'Ba001'),
('Tr003', '2020-11-11', '05:55:00', 650, 'Ls002', 'Ba002'),
('Tr004', '2020-12-24', '22:18:00', 256, 'Ls003', 'Ba002');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
