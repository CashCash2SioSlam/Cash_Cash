-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2024 at 09:05 AM
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
(1, 'Leroy Merlin', 'SA', 123456789, 'APE123', '49 rue du kiosque', '0342385498', 'contact@leroymerlin.com', '2 jours', '50.50', 1),
(2, 'Boulanger', 'SAS', 987654321, 'APE987', '521 rue des naufragés', '0321454679', 'contact@boulanger.fr', '1 jour', '30.75', 2),
(3, 'Adeo', 'SARL', 67854, 'O56RT43', '135 Rue Sadi Carnot, 59790 Ronchin', '0320324078', ' contact@adeo.fr', '3 Heures', '86.00', 2),
(4, 'Bricoman', 'SAS', 1067854, 'OS6RTX2', '133 Rue Sadi Carnot, 59790 Ronchin', '0320234678', 'contact@bricoman.fr', '5Heures', '85.90', 1),
(5, 'La Poste', 'SPAS', 984434, 'O56UIOP', '130 Rue Sadi Carnot, 59790 Ronchin', '0320324678', 'contact@laposte.fr', '5-7 Heures', '85.30', 2);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `connexion`
--

INSERT INTO `connexion` (`id`, `prénom`, `nom`, `mail`, `mdp`, `role`) VALUES
(1, 'Lucas', 'De Sainte Maresville', 'desaintem.lucas@gmail.com', '$2y$10$utBhEFhV0zP7tGR4G5TCn.hXqWYvc/qsH1XhkCvNgzN1OthIKAnG.', '1'),
(2, 'Alex', 'Verhenne', 'alex.verhenne@cashcash.fr', '$2y$10$/PtmXajqeVi9LfNu7lk75.JyiDLYAagX5UgzKAAXzzYFhKXeH2b/S', '1');

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
(12345, 1, '02:00:00', 'Installation réussie'),
(67890, 2, '01:30:00', 'Maintenance effectuée'),
(1, 3, '22:12:00', 'Ras'),
(2, 4, '02:11:00', 'Oui oui oui'),
(3, 5, '01:10:00', 'TEST ok'),
(4, 6, '10:10:00', 'TEST ok'),
(5, 7, '01:55:00', 'TEST ok');

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
(1, '2022-03-01', '10:00:00', 'EX3XPA', 1),
(2, '2022-03-02', '14:30:00', 'E001', 2),
(3, '2024-01-10', '14:30:00', 'EX3XPV', 5),
(5, '2024-01-08', '10:30:00', 'E001', 4),
(6, '2024-01-06', '09:30:00', 'EXV30XPV4', 4),
(7, '2024-01-12', '10:30:00', 'ESX3AIPA3', 2);

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
('E001', 'Henri', 'Durant', '0788124572', 'Ingénieur', '2022-03-01', 1),
('EX3XPV', 'Victore', 'Giat', '0603152598', 'Dev OPS', '2016-06-17', 2),
('EX3XPA', 'Julien', 'Hezer', '0609176543', 'Technicien reseaux', '2017-08-18', 1),
('EX3XP0', 'Charle', 'Attend', '0600174520', 'Lead Dev', '2022-06-22', 2),
('EX3X1', 'Jean', 'Lopez', '0789002175', 'Assistant Dev Web (Back-end)', '2023-07-13', 2);

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
