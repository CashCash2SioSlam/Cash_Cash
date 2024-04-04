-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 04, 2024 at 02:14 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cashcash`
--

-- --------------------------------------------------------

--
-- Table structure for table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `NumeroAgence` int NOT NULL,
  `NomAgence` varchar(50) DEFAULT NULL,
  `AdresseAgence` varchar(100) DEFAULT NULL,
  `TelAgence` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`NumeroAgence`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `agence`
--

INSERT INTO `agence` (`NumeroAgence`, `NomAgence`, `AdresseAgence`, `TelAgence`) VALUES
(1, 'Agence Paris Centre', '5 Boulevard Haussmann, Paris', '01 23 45 67 89'),
(2, 'Agence Lyon Sud', '8 Rue de la Liberté, Lyon', '04 56 78 90 12');

-- --------------------------------------------------------

--
-- Table structure for table `assistanttel`
--

DROP TABLE IF EXISTS `assistanttel`;
CREATE TABLE IF NOT EXISTS `assistanttel` (
  `Matricule` int NOT NULL,
  PRIMARY KEY (`Matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `assistanttel`
--

INSERT INTO `assistanttel` (`Matricule`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `NumeroClient` int NOT NULL,
  `RaisonSociale` varchar(50) DEFAULT NULL,
  `Siren` varchar(50) DEFAULT NULL,
  `CodeAPE` varchar(50) DEFAULT NULL,
  `Adresse` varchar(100) DEFAULT NULL,
  `TelClient` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `DureeDeplacement` time DEFAULT NULL,
  `DistanceKm` varchar(10) DEFAULT NULL,
  `NumeroAgence` int NOT NULL,
  PRIMARY KEY (`NumeroClient`),
  KEY `NumeroAgence` (`NumeroAgence`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`NumeroClient`, `RaisonSociale`, `Siren`, `CodeAPE`, `Adresse`, `TelClient`, `Email`, `DureeDeplacement`, `DistanceKm`, `NumeroAgence`) VALUES
(1, 'Entreprise A', '123456789', '1234A', '10 Rue des Entrepreneurs, Paris', '01 23 45 67 88', 'contact@entrepriseA.com', '01:00:00', '5', 1),
(2, 'Entreprise B', '987654321', '5678B', '20 Rue de la Croix Rousse, Lyon', '04 56 78 90 12', 'contact@entrepriseB.com', '00:45:00', '3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE IF NOT EXISTS `connexion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prénom` varchar(25) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` varchar(11) NOT NULL,
  `Matricule` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Matricule` (`Matricule`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `connexion`
--

INSERT INTO `connexion` (`id`, `prénom`, `nom`, `mail`, `mdp`, `role`, `Matricule`) VALUES
(1, 'Lucas', 'De Sainte Maresville', 'desaintem.lucas@gmail.com', '$2y$10$utBhEFhV0zP7tGR4G5TCn.hXqWYvc/qsH1XhkCvNgzN1OthIKAnG.', '1', 1),
(2, 'Alex', 'Verhenne', 'alex.verhenne@cashcash.fr', '$2y$10$/PtmXajqeVi9LfNu7lk75.JyiDLYAagX5UgzKAAXzzYFhKXeH2b/S', '1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `contrat_de_maintenance`
--

DROP TABLE IF EXISTS `contrat_de_maintenance`;
CREATE TABLE IF NOT EXISTS `contrat_de_maintenance` (
  `NumeroContrat` int NOT NULL,
  `DateSignature` date DEFAULT NULL,
  `DateEcheance` date DEFAULT NULL,
  `NumeroClient` int NOT NULL,
  PRIMARY KEY (`NumeroContrat`),
  UNIQUE KEY `NumeroClient` (`NumeroClient`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contrat_de_maintenance`
--

INSERT INTO `contrat_de_maintenance` (`NumeroContrat`, `DateSignature`, `DateEcheance`, `NumeroClient`) VALUES
(1, '2020-01-01', '2021-01-01', 1),
(2, '2021-02-01', '2022-02-01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `controler`
--

DROP TABLE IF EXISTS `controler`;
CREATE TABLE IF NOT EXISTS `controler` (
  `NumeroSerie` int NOT NULL,
  `NumeroIntervention` int NOT NULL,
  `TempsPasse` time DEFAULT NULL,
  `Commentaire` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`NumeroSerie`,`NumeroIntervention`),
  KEY `NumeroIntervention` (`NumeroIntervention`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `controler`
--

INSERT INTO `controler` (`NumeroSerie`, `NumeroIntervention`, `TempsPasse`, `Commentaire`) VALUES
(123456, 1, '01:30:00', 'Remplacement du disque dur'),
(789012, 2, '02:00:00', 'Configuration du réseau');

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `Matricule` int NOT NULL,
  `NomEmploye` varchar(50) DEFAULT NULL,
  `PrenomEmploye` varchar(50) DEFAULT NULL,
  `Adresse` varchar(100) DEFAULT NULL,
  `DateEmbauche` date DEFAULT NULL,
  PRIMARY KEY (`Matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`Matricule`, `NomEmploye`, `PrenomEmploye`, `Adresse`, `DateEmbauche`) VALUES
(1, 'Dupont', 'Jean', '1 Rue de la République, Paris', '2020-05-15'),
(2, 'Martin', 'Sophie', '12 Avenue des Lilas, Lyon', '2021-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `NumeroIntervention` int NOT NULL,
  `DateVisite` date DEFAULT NULL,
  `HeureVisite` time DEFAULT NULL,
  `Matricule` int NOT NULL,
  `NumeroClient` int DEFAULT NULL,
  PRIMARY KEY (`NumeroIntervention`),
  KEY `Matricule` (`Matricule`),
  KEY `fk_numero_client` (`NumeroClient`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `intervention`
--

INSERT INTO `intervention` (`NumeroIntervention`, `DateVisite`, `HeureVisite`, `Matricule`, `NumeroClient`) VALUES
(1, '2022-01-10', '10:00:00', 3, 1),
(2, '2022-02-15', '14:30:00', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `NumeroSerie` int NOT NULL,
  `DateDeVente` date DEFAULT NULL,
  `DateInstallation` date DEFAULT NULL,
  `PrixDeVente` decimal(15,2) DEFAULT NULL,
  `Emplacement` varchar(50) DEFAULT NULL,
  `NumeroContrat` int DEFAULT NULL,
  `NumeroClient` int NOT NULL,
  `RefInterne` int NOT NULL,
  PRIMARY KEY (`NumeroSerie`),
  KEY `NumeroContrat` (`NumeroContrat`),
  KEY `NumeroClient` (`NumeroClient`),
  KEY `RefInterne` (`RefInterne`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `materiel`
--

INSERT INTO `materiel` (`NumeroSerie`, `DateDeVente`, `DateInstallation`, `PrixDeVente`, `Emplacement`, `NumeroContrat`, `NumeroClient`, `RefInterne`) VALUES
(123456, '2020-02-01', '2020-02-02', '1500.00', 'Bureau A', 1, 1, 1),
(789012, '2021-03-01', '2021-03-02', '500.00', 'Salle de réunion', 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `technicien`
--

DROP TABLE IF EXISTS `technicien`;
CREATE TABLE IF NOT EXISTS `technicien` (
  `Matricule` int NOT NULL,
  `TelephoneMobile` varchar(20) DEFAULT NULL,
  `Qualification` varchar(50) DEFAULT NULL,
  `DateObtention` date DEFAULT NULL,
  `NumeroAgence` int NOT NULL,
  PRIMARY KEY (`Matricule`),
  KEY `NumeroAgence` (`NumeroAgence`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `technicien`
--

INSERT INTO `technicien` (`Matricule`, `TelephoneMobile`, `Qualification`, `DateObtention`, `NumeroAgence`) VALUES
(3, '0675144141', 'Technicien SAV', '2020-06-01', 1),
(4, '07 98 76 54 32', 'Technicien Réseaux', '2021-01-10', 2);

-- --------------------------------------------------------

--
-- Table structure for table `type_materiel`
--

DROP TABLE IF EXISTS `type_materiel`;
CREATE TABLE IF NOT EXISTS `type_materiel` (
  `RefInterne` int NOT NULL,
  `Libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`RefInterne`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `type_materiel`
--

INSERT INTO `type_materiel` (`RefInterne`, `Libelle`) VALUES
(1, 'Ordinateur'),
(2, 'Imprimante'),
(3, 'Routeur');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
