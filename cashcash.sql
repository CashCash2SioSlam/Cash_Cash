-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 04 avr. 2024 à 20:04
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cashcash`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `NumeroAgence` int NOT NULL,
  `NomAgence` varchar(50) DEFAULT NULL,
  `AdresseAgence` varchar(100) DEFAULT NULL,
  `TelAgence` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`NumeroAgence`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`NumeroAgence`, `NomAgence`, `AdresseAgence`, `TelAgence`) VALUES
(1, 'Agence Paris Centre', '5 Boulevard Haussmann, Paris', '01 23 45 67 89'),
(2, 'Agence Lyon Sud', '8 Rue de la Liberté, Lyon', '04 56 78 90 12'),
(3, 'Agence Marseille Est', '15 Rue de Marseille, Marseille', '06 12 34 56 78'),
(4, 'Agence Bordeaux Nord', '20 Avenue Victor Hugo, Bordeaux', '07 23 45 67 89'),
(0, 'Agence Marseille Est', '15 Rue de Marseille, Marseille', '06 12 34 56 78');

-- --------------------------------------------------------

--
-- Structure de la table `assistanttel`
--

DROP TABLE IF EXISTS `assistanttel`;
CREATE TABLE IF NOT EXISTS `assistanttel` (
  `Matricule` int NOT NULL,
  PRIMARY KEY (`Matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `assistanttel`
--

INSERT INTO `assistanttel` (`Matricule`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Structure de la table `client`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`NumeroClient`, `RaisonSociale`, `Siren`, `CodeAPE`, `Adresse`, `TelClient`, `Email`, `DureeDeplacement`, `DistanceKm`, `NumeroAgence`) VALUES
(1, 'Entreprise A', '123456789', '1234A', '10 Rue des Entrepreneurs, Paris', '01 23 45 67 88', 'contact@entrepriseA.com', '01:00:00', '5', 1),
(2, 'Entreprise B', '987654321', '5678B', '20 Rue de la Croix Rousse, Lyon', '04 56 78 90 12', 'contact@entrepriseB.com', '00:45:00', '3', 2),
(6, 'Entreprise E', '246802468', '1357E', '15 Rue de la Paix, Marseille', '01 23 45 67 89', 'contact@entrepriseE.com', '00:45:00', '10', 3),
(3, 'Boulanger', '0102030405', 'A210Z', '40 rue du ponchet, Roncq', '01 20 50 40 60', 'Boulanger@contact.fr', '00:20:00', '5', 1),
(4, 'Capgemini', '9865321470', 'ZZ141', '50 rue des motos, Lesquin', '05 06 08 07 40', 'capgemini@contact.fr', '00:25:00', '6', 1),
(5, 'nauroto', '9866221470', 'GH212', '50 rue des moulins, Lille', '05 06 08 12 40', 'nauroto@contact.fr', '00:25:00', '6', 2),
(7, 'Entreprise F', '135791357', '2468F', '20 Avenue du Lac, Bordeaux', '04 56 78 90 12', 'contact@entrepriseF.com', '01:30:00', '15', 4);

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
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
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`id`, `prénom`, `nom`, `mail`, `mdp`, `role`, `Matricule`) VALUES
(1, 'Lucas', 'De Sainte Maresville', 'desaintem.lucas@gmail.com', '$2y$10$utBhEFhV0zP7tGR4G5TCn.hXqWYvc/qsH1XhkCvNgzN1OthIKAnG.', '1', 1),
(2, 'Alex', 'Verhenne', 'alex.verhenne@cashcash.fr', '$2y$10$/PtmXajqeVi9LfNu7lk75.JyiDLYAagX5UgzKAAXzzYFhKXeH2b/S', '1', 3);

-- --------------------------------------------------------

--
-- Structure de la table `contrat_de_maintenance`
--

DROP TABLE IF EXISTS `contrat_de_maintenance`;
CREATE TABLE IF NOT EXISTS `contrat_de_maintenance` (
  `NumeroContrat` int NOT NULL,
  `DateSignature` date DEFAULT NULL,
  `DateEcheance` date DEFAULT NULL,
  `NumeroClient` int NOT NULL,
  PRIMARY KEY (`NumeroContrat`),
  UNIQUE KEY `NumeroClient` (`NumeroClient`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contrat_de_maintenance`
--

INSERT INTO `contrat_de_maintenance` (`NumeroContrat`, `DateSignature`, `DateEcheance`, `NumeroClient`) VALUES
(1, '2020-01-01', '2021-01-01', 1),
(2, '2021-02-01', '2022-02-01', 2),
(3, '2024-04-01', '2024-04-06', 3),
(4, '2024-04-01', '2024-04-19', 4),
(5, '2024-04-01', '2024-04-06', 5);

--
-- Déclencheurs `contrat_de_maintenance`
--
DROP TRIGGER IF EXISTS `before_insert_contrat_de_maintenance`;
DELIMITER $$
CREATE TRIGGER `before_insert_contrat_de_maintenance` BEFORE INSERT ON `contrat_de_maintenance` FOR EACH ROW BEGIN
    IF NEW.DateSignature >= NEW.DateEcheance THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'La date de signature doit être antérieure à la date d'échéance du contrat de maintenance.';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `controler`
--

DROP TABLE IF EXISTS `controler`;
CREATE TABLE IF NOT EXISTS `controler` (
  `NumeroSerie` int NOT NULL,
  `NumeroIntervention` int NOT NULL,
  `TempsPasse` time DEFAULT NULL,
  `Commentaire` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`NumeroSerie`,`NumeroIntervention`),
  KEY `NumeroIntervention` (`NumeroIntervention`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `controler`
--

INSERT INTO `controler` (`NumeroSerie`, `NumeroIntervention`, `TempsPasse`, `Commentaire`) VALUES
(123456, 1, '01:30:00', 'Remplacement du disque dur'),
(789012, 2, '02:00:00', 'Configuration du réseau');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `Matricule` int NOT NULL,
  `NomEmploye` varchar(50) DEFAULT NULL,
  `PrenomEmploye` varchar(50) DEFAULT NULL,
  `Adresse` varchar(100) DEFAULT NULL,
  `DateEmbauche` date DEFAULT NULL,
  PRIMARY KEY (`Matricule`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`Matricule`, `NomEmploye`, `PrenomEmploye`, `Adresse`, `DateEmbauche`) VALUES
(1, 'Dupont', 'Jean', '1 Rue de la République, Paris', '2020-05-15'),
(2, 'Martin', 'Sophie', '12 Avenue des Lilas, Lyon', '2021-02-20'),
(5, 'Garcia', 'Marcel', '5 Rue de la Liberté, Marseille', '2023-04-20'),
(6, 'Lefort', 'Sylvie', '20 Avenue du Lac, Bordeaux', '2024-01-10');

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`NumeroIntervention`, `DateVisite`, `HeureVisite`, `Matricule`, `NumeroClient`) VALUES
(1, '2022-01-10', '10:00:00', 3, 1),
(2, '2022-02-15', '14:30:00', 4, 2),
(4, '2022-04-25', '13:30:00', 6, 7),
(3, '2022-03-20', '09:00:00', 5, 6);

--
-- Déclencheurs `intervention`
--
DROP TRIGGER IF EXISTS `before_insert_technicien_intervention`;
DELIMITER $$
CREATE TRIGGER `before_insert_technicien_intervention` BEFORE INSERT ON `intervention` FOR EACH ROW BEGIN
    DECLARE agence_client INT;
    DECLARE agence_technicien INT;

    -- Récupérer l'agence du client de l'intervention
    SELECT NumeroAgence INTO agence_client
    FROM client
    WHERE NumeroClient = NEW.NumeroClient;

    -- Récupérer l'agence du technicien
    SELECT NumeroAgence INTO agence_technicien
    FROM technicien
    WHERE Matricule = NEW.Matricule;

    -- Vérifier si les agences sont différentes
    IF agence_client <> agence_technicien THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Impossible d'ajouter un technicien dont l'agence est différente de celle du client.';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`NumeroSerie`, `DateDeVente`, `DateInstallation`, `PrixDeVente`, `Emplacement`, `NumeroContrat`, `NumeroClient`, `RefInterne`) VALUES
(123456, '2020-02-01', '2020-02-02', 1500.00, 'Bureau A', 1, 1, 1),
(789012, '2021-03-01', '2021-03-02', 500.00, 'Salle de réunion', 2, 2, 2),
(246802, '2023-06-01', '2023-06-02', 2500.00, 'Bureau C', 8, 6, 1),
(135791, '2023-07-01', '2023-07-02', 1500.00, 'Salle de conférence', 9, 7, 2);

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `technicien`
--

INSERT INTO `technicien` (`Matricule`, `TelephoneMobile`, `Qualification`, `DateObtention`, `NumeroAgence`) VALUES
(3, '0675144141', 'Technicien SAV', '2020-06-01', 1),
(4, '07 98 76 54 32', 'Technicien Réseaux', '2021-01-10', 2),
(5, '06 78 90 12 34', 'Technicien Support', '2022-05-15', 3),
(6, '07 89 01 23 45', 'Technicien Réseaux', '2023-02-20', 4);

-- --------------------------------------------------------

--
-- Structure de la table `type_materiel`
--

DROP TABLE IF EXISTS `type_materiel`;
CREATE TABLE IF NOT EXISTS `type_materiel` (
  `RefInterne` int NOT NULL,
  `Libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`RefInterne`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_materiel`
--

INSERT INTO `type_materiel` (`RefInterne`, `Libelle`) VALUES
(1, 'Ordinateur'),
(2, 'Imprimante'),
(3, 'Routeur');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
