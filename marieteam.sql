-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 14 déc. 2020 à 13:20
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
-- Structure de la table `associer`
--

DROP TABLE IF EXISTS `associer`;
CREATE TABLE IF NOT EXISTS `associer` (
  `idReservation` varchar(10) NOT NULL,
  `idType` varchar(10) NOT NULL,
  `nombrePlaces` int(11) DEFAULT NULL,
  PRIMARY KEY (`idReservation`,`idType`),
  KEY `idType` (`idType`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `avoir`
--

DROP TABLE IF EXISTS `avoir`;
CREATE TABLE IF NOT EXISTS `avoir` (
  `idBateau` varchar(10) NOT NULL,
  `idEquipement` varchar(10) NOT NULL,
  PRIMARY KEY (`idBateau`,`idEquipement`),
  KEY `idEquipement` (`idEquipement`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bateau`
--

DROP TABLE IF EXISTS `bateau`;
CREATE TABLE IF NOT EXISTS `bateau` (
  `idBateau` varchar(10) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `largeur` double DEFAULT NULL,
  `longueur` double DEFAULT NULL,
  PRIMARY KEY (`idBateau`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `bateau`
--

INSERT INTO `bateau` (`idBateau`, `nom`, `largeur`, `longueur`) VALUES
('Ba001', 'TitanicusII', 456, 654),
('Ba002', 'Posologie', 500, 750);

-- --------------------------------------------------------

--
-- Structure de la table `bateaufret`
--

DROP TABLE IF EXISTS `bateaufret`;
CREATE TABLE IF NOT EXISTS `bateaufret` (
  `idBateau` varchar(10) NOT NULL,
  `poidChargeMax` int(11) DEFAULT NULL,
  `volumeMax` double DEFAULT NULL,
  PRIMARY KEY (`idBateau`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `bateauvoyageur`
--

DROP TABLE IF EXISTS `bateauvoyageur`;
CREATE TABLE IF NOT EXISTS `bateauvoyageur` (
  `idBateau` varchar(10) NOT NULL,
  `vitesse` int(11) DEFAULT NULL,
  PRIMARY KEY (`idBateau`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `capacite`
--

DROP TABLE IF EXISTS `capacite`;
CREATE TABLE IF NOT EXISTS `capacite` (
  `idBateau` varchar(10) NOT NULL,
  `idCat` varchar(10) NOT NULL,
  `places` int(11) DEFAULT NULL,
  PRIMARY KEY (`idBateau`,`idCat`),
  KEY `idCat` (`idCat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCat` varchar(10) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

DROP TABLE IF EXISTS `equipement`;
CREATE TABLE IF NOT EXISTS `equipement` (
  `idEquipement` varchar(10) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idEquipement`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `liaison`
--

DROP TABLE IF EXISTS `liaison`;
CREATE TABLE IF NOT EXISTS `liaison` (
  `idLiaison` varchar(10) NOT NULL,
  `distanceMileMarin` double DEFAULT NULL,
  `portDepart` varchar(50) DEFAULT NULL,
  `portArrive` varchar(50) DEFAULT NULL,
  `idSecteur` varchar(10) NOT NULL,
  PRIMARY KEY (`idLiaison`),
  KEY `idSecteur` (`idSecteur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `liaison`
--

INSERT INTO `liaison` (`idLiaison`, `distanceMileMarin`, `portDepart`, `portArrive`, `idSecteur`) VALUES
('Ls-001', 159, 'douaix', 'Lille', 'Sc-001'),
('Ls-002', 45, 'Paris', 'Lyon', 'Sc-002'),
('Ls-003', 456, 'Paris', 'New York', 'Sc-002');

-- --------------------------------------------------------

--
-- Structure de la table `periode`
--

DROP TABLE IF EXISTS `periode`;
CREATE TABLE IF NOT EXISTS `periode` (
  `idPeriode` varchar(10) NOT NULL,
  `DebutPeriode` date DEFAULT NULL,
  `FinPeriode` date DEFAULT NULL,
  PRIMARY KEY (`idPeriode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `periode`
--

INSERT INTO `periode` (`idPeriode`, `DebutPeriode`, `FinPeriode`) VALUES
('2020Dec', '2020-12-01', '2020-12-31'),
('2020Nov', '2020-11-01', '2020-11-30');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idReservation` varchar(10) NOT NULL,
  `dateReservation` date DEFAULT NULL,
  `idUtilisasteur` varchar(10) NOT NULL,
  `idTraverse` varchar(10) NOT NULL,
  PRIMARY KEY (`idReservation`),
  KEY `idUtilisasteur` (`idUtilisasteur`),
  KEY `idTraverse` (`idTraverse`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

DROP TABLE IF EXISTS `secteur`;
CREATE TABLE IF NOT EXISTS `secteur` (
  `idSecteur` varchar(10) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idSecteur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `secteur`
--

INSERT INTO `secteur` (`idSecteur`, `nom`) VALUES
('Sc-001', 'Poitoux-Charente'),
('Sc-002', 'Seine-St-Denis');

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

DROP TABLE IF EXISTS `tarif`;
CREATE TABLE IF NOT EXISTS `tarif` (
  `idLiaison` varchar(10) NOT NULL,
  `idPeriode` varchar(10) NOT NULL,
  `idType` varchar(10) NOT NULL,
  `PrixUnite` double DEFAULT NULL,
  PRIMARY KEY (`idLiaison`,`idPeriode`,`idType`),
  KEY `idPeriode` (`idPeriode`),
  KEY `idType` (`idType`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tarif`
--

INSERT INTO `tarif` (`idLiaison`, `idPeriode`, `idType`, `PrixUnite`) VALUES
('Ls-001', '2020Nov', 'a1', 25),
('Ls-001', '2020Nov', 'a2', 20),
('Ls-001', '2020Nov', 'b1', 80),
('Ls-001', '2020Nov', 'a3', 15),
('Ls-001', '2020Nov', 'b2', 50),
('Ls-002', '2020Nov', 'a1', 33),
('Ls-002', '2020Nov', 'a2', 30),
('Ls-002', '2020Nov', 'b1', 60),
('Ls-002', '2020Nov', 'a3', 27),
('Ls-002', '2020Nov', 'b2', 50),
('Ls-002', '2020Dec', 'a1', 56),
('Ls-002', '2020Dec', 'a2', 50),
('Ls-002', '2020Dec', 'b1', 106),
('Ls-002', '2020Dec', 'a3', 46),
('Ls-002', '2020Dec', 'b2', 83),
('Ls-001', '2020Dec', 'a1', 30),
('Ls-001', '2020Dec', 'a2', 25),
('Ls-001', '2020Dec', 'b1', 120),
('Ls-001', '2020Dec', 'a3', 20),
('Ls-001', '2020Dec', 'b2', 80);

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
  `idPeriode` varchar(10) NOT NULL,
  PRIMARY KEY (`idTraverse`),
  KEY `idLiaison` (`idLiaison`),
  KEY `idBateau` (`idBateau`),
  KEY `FK_idPeriode` (`idPeriode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `traverse`
--

INSERT INTO `traverse` (`idTraverse`, `dateDepart`, `heureDepart`, `duree`, `idLiaison`, `idBateau`, `idPeriode`) VALUES
('Tr001', '2020-11-11', '09:41:00', 320, 'Ls-001', 'Ba001', '2020Nov'),
('Tr002', '2020-12-24', '16:06:00', 300, 'Ls-001', 'Ba001', '2020Dec'),
('Tr003', '2020-11-11', '05:55:00', 650, 'Ls-002', 'Ba002', '2020Nov'),
('Tr004', '2020-12-24', '22:18:00', 256, 'Ls-003', 'Ba002', '2020Dec');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `idType` varchar(10) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `idCat` varchar(10) NOT NULL,
  PRIMARY KEY (`idType`),
  KEY `idCat` (`idCat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`idType`, `libelle`, `idCat`) VALUES
('a1', 'Adulte', 'A1'),
('a2', 'Junior', 'A2'),
('a3', 'Enfant', 'A3'),
('b1', 'Véhicule supérieur à 2 mètres', 'B1'),
('b2', 'Véhicule inférieur à 2 mètres', 'B2');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisasteur` int(10) NOT NULL AUTO_INCREMENT,
  `estAdmin` tinyint(1) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(50) DEFAULT NULL,
  `nbPoint` int(11) DEFAULT '0',
  PRIMARY KEY (`idUtilisasteur`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisasteur`, `estAdmin`, `nom`, `prenom`, `email`, `mot_de_passe`, `nbPoint`) VALUES
(1, 0, 'paul', 'dupont', 'dupont@paul.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(2, 1, 'admin', 'default', 'admin@default.com', '21232f297a57a5a743894a0e4a801fc3', 0),
(11, 0, 'test', 'test', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', 0),
(7, 0, 'theo ', 'blampain', 'theo@imgod.com', '4b3836aecd3e9c8caf6379ac0f74e54f', 0),
(13, 0, 'desreumaux', 'thomas', 'tomdsx@mail.fr', 'dba90500a23cbc4deca1e3896c203129', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
