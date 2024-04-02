-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 30, 2024 at 10:39 AM
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
-- Database: `cashcash_bdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `NumeroAgence` int NOT NULL,
  `NomAgence` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AdresseAgence` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TelAgence` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`NumeroAgence`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agence`
--

INSERT INTO `agence` (`NumeroAgence`, `NomAgence`, `AdresseAgence`, `TelAgence`) VALUES
(1, 'Agence1', '2 rue du potager', '1234567890'),
(2, 'Agence2', '2 rue du moulin', '9876543210');

-- --------------------------------------------------------

--
-- Table structure for table `appartenir`
--

DROP TABLE IF EXISTS `appartenir`;
CREATE TABLE IF NOT EXISTS `appartenir` (
  `NuméroSérie` int NOT NULL,
  `RefInterne` int NOT NULL,
  PRIMARY KEY (`NuméroSérie`,`RefInterne`),
  KEY `RefInterne` (`RefInterne`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appartenir`
--

INSERT INTO `appartenir` (`NuméroSérie`, `RefInterne`) VALUES
(12345, 1),
(67890, 2);

-- --------------------------------------------------------

--
-- Table structure for table `assistanttel`
--

DROP TABLE IF EXISTS `assistanttel`;
CREATE TABLE IF NOT EXISTS `assistanttel` (
  `Matricule` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`Matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assistanttel`
--

INSERT INTO `assistanttel` (`Matricule`) VALUES
('E002');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `NuméroClient` int NOT NULL,
  `NomClient` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `RaisonSocial` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Siren` int DEFAULT NULL,
  `CodeAPE` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Adresse` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TelClient` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DuréeDeplacement` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DistanceKM` decimal(15,2) DEFAULT NULL,
  `NumeroAgence` int NOT NULL,
  PRIMARY KEY (`NuméroClient`),
  KEY `NumeroAgence` (`NumeroAgence`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`NuméroClient`, `NomClient`, `RaisonSocial`, `Siren`, `CodeAPE`, `Adresse`, `TelClient`, `Email`, `DuréeDeplacement`, `DistanceKM`, `NumeroAgence`) VALUES
(1, 'AA', 'SARL', 1010101, '0111Z', '4 rue du peuple', '0102030405', 'alex.verhenne@gmail.com', '1', '1.01', 2),
(2, 'Boulanger', 'Client2', 987654321, 'APE987', '521 rue des naufragés', '0321454679', 'boulanger@email.com', '1', '30.75', 2),
(5, 'Boulanger', 'Client2', 987654321, 'APE987', '521 rue des naufragés', '0321454679', 'boulanger@email.com', '1', '30.75', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contratmaintenance`
--

DROP TABLE IF EXISTS `contratmaintenance`;
CREATE TABLE IF NOT EXISTS `contratmaintenance` (
  `NuméroContrat` int NOT NULL,
  `DateSignature` date DEFAULT NULL,
  `DateEchéance` date DEFAULT NULL,
  `NuméroClient` int NOT NULL,
  PRIMARY KEY (`NuméroContrat`),
  UNIQUE KEY `NuméroClient` (`NuméroClient`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contratmaintenance`
--

INSERT INTO `contratmaintenance` (`NuméroContrat`, `DateSignature`, `DateEchéance`, `NuméroClient`) VALUES
(1, '2022-01-15', '2023-01-15', 1),
(2, '2022-02-20', '2023-02-20', 2);

-- --------------------------------------------------------

--
-- Table structure for table `controler`
--

DROP TABLE IF EXISTS `controler`;
CREATE TABLE IF NOT EXISTS `controler` (
  `NuméroSérie` int NOT NULL,
  `NuméroIntervention` int NOT NULL,
  `TempsPassé` time DEFAULT NULL,
  `Commentaire` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`NuméroSérie`,`NuméroIntervention`),
  KEY `NuméroIntervention` (`NuméroIntervention`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `controler`
--

INSERT INTO `controler` (`NuméroSérie`, `NuméroIntervention`, `TempsPassé`, `Commentaire`) VALUES
(12345, 1, '02:10:00', 'test'),
(67890, 2, '01:30:00', 'Maintenance effectuée Test');

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `Matricule` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `NomEmploye` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PrenomEmploye` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AdresseEmploye` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DateEmbauche` date DEFAULT NULL,
  PRIMARY KEY (`Matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`Matricule`, `NomEmploye`, `PrenomEmploye`, `AdresseEmploye`, `DateEmbauche`) VALUES
('E001', 'Smith', 'John', 'AdresseEmp1', '2022-01-01'),
('E002', 'Doe', 'Jane', 'AdresseEmp2', '2022-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `NuméroIntervention` int NOT NULL,
  `DateVisite` date DEFAULT NULL,
  `HeureVisite` time DEFAULT NULL,
  `Matricule` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `NuméroClient` int NOT NULL,
  PRIMARY KEY (`NuméroIntervention`),
  KEY `Matricule` (`Matricule`),
  KEY `NuméroClient` (`NuméroClient`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intervention`
--

INSERT INTO `intervention` (`NuméroIntervention`, `DateVisite`, `HeureVisite`, `Matricule`, `NuméroClient`) VALUES
(1, '2022-03-01', '10:00:00', 'E005', 1),
(2, '2022-03-02', '14:30:00', 'E002', 2);

-- --------------------------------------------------------

--
-- Table structure for table `matériel`
--

DROP TABLE IF EXISTS `matériel`;
CREATE TABLE IF NOT EXISTS `matériel` (
  `NuméroSérie` int NOT NULL,
  `DateDeVente` date DEFAULT NULL,
  `DateInstallation` date DEFAULT NULL,
  `PrixVente` decimal(15,2) DEFAULT NULL,
  `Emplacement` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NuméroClient` int NOT NULL,
  `NuméroContrat` int NOT NULL,
  PRIMARY KEY (`NuméroSérie`),
  KEY `NuméroClient` (`NuméroClient`),
  KEY `NuméroContrat` (`NuméroContrat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matériel`
--

INSERT INTO `matériel` (`NuméroSérie`, `DateDeVente`, `DateInstallation`, `PrixVente`, `Emplacement`, `NuméroClient`, `NuméroContrat`) VALUES
(12345, '2022-01-20', '2022-01-25', '500.00', 'Emplacement1', 1, 1),
(67890, '2022-02-15', '2022-02-18', '800.00', 'Emplacement2', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `technicien`
--

DROP TABLE IF EXISTS `technicien`;
CREATE TABLE IF NOT EXISTS `technicien` (
  `Matricule` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prénom` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nom` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TelMobile` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Qualification` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DateObtention` date DEFAULT NULL,
  `NumeroAgence` int NOT NULL,
  PRIMARY KEY (`Matricule`),
  KEY `NumeroAgence` (`NumeroAgence`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `technicien`
--

INSERT INTO `technicien` (`Matricule`, `Prénom`, `Nom`, `TelMobile`, `Qualification`, `DateObtention`, `NumeroAgence`) VALUES
('E001', 'Henri', 'Durant', '0788124572', 'Ingénieur', '2022-03-02', 1),
('E002', 'Victore', 'Giat', '0603152598', 'Dev OPS', '2016-06-17', 2),
('E003', 'Julien', 'Hezer', '0609176543', 'Technicien reseaux', '2017-08-18', 1),
('E005', 'Jean', 'Lopez', '0789002175', 'Assistant Dev Web (Back-end)', '2023-07-13', 2);

-- --------------------------------------------------------

--
-- Table structure for table `type_matériel`
--

DROP TABLE IF EXISTS `type_matériel`;
CREATE TABLE IF NOT EXISTS `type_matériel` (
  `RefInterne` int NOT NULL,
  `Libelle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`RefInterne`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_matériel`
--

INSERT INTO `type_matériel` (`RefInterne`, `Libelle`) VALUES
(1, 'Ordinateur'),
(2, 'Imprimante'),
(3, 'Serveur');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
