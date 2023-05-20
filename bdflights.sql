-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 20 mai 2023 à 23:09
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdflights`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `idAdmin` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`idAdmin`, `nom`, `prenom`, `email`, `motDePasse`) VALUES
(1, 'Dupont', 'Jean', 'jean.dupont@example.com', 'password123'),
(2, 'Smith', 'John', 'john.smith@example.com', 'admin123'),
(6, 'Smith', 'John', 'jo.smith@example.com', 'admin123');

-- --------------------------------------------------------

--
-- Structure de la table `administrateuraeroport`
--

CREATE TABLE `administrateuraeroport` (
  `idAdminAeroport` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `idAeroport` int(11) DEFAULT NULL,
  `PHOTO` varchar(400) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `administrateuraeroport`
--

INSERT INTO `administrateuraeroport` (`idAdminAeroport`, `nom`, `prenom`, `email`, `motDePasse`, `idAeroport`, `PHOTO`, `last_login`) VALUES
(1, 'John', 'Doe', 'john.doe@example.com', 'motdepasse123', 1, '', NULL),
(2, 'Jane', 'Smith', 'jane.smith@example.com', 'password456', 2, '', NULL),
(3, 'Alice', 'Johnson', 'alice.johnson@example.com', 'pass123word', 1, '', NULL),
(4, 'John Smith', 'John', 'john.smith@example.com', 'password123', 1, 'images/f9.jpg', NULL),
(5, 'Michael Brown', 'Michael', 'michael.brown@example.com', 'testpass', 1, 'images/f9.jpg', NULL),
(6, 'Johnson', 'Alice', 'ale.johnson@example.com', 'admin456', 2, 'chemin/vers/photo.jpg', '2023-05-17 15:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `aeroport`
--

CREATE TABLE `aeroport` (
  `idAeroport` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `codeIATA` char(3) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `aeroport`
--

INSERT INTO `aeroport` (`idAeroport`, `nom`, `codeIATA`, `ville`, `pays`) VALUES
(1, ' International Charles de Gaulle (CDG)\n ', 'CDG', 'Paris', 'France'),
(2, 'Londres Heathrow - LHR', 'LHR', 'Londres', 'Royaume-Uni'),
(3, 'Aéroport international de Madrid', 'MAD', 'Madrid', 'Espagne'),
(4, 'amelia international', 'CMN', 'casablanca', 'maroc'),
(5, 'Aéroport international de Pékin', 'PEK', 'Pékin', 'Chine'),
(6, 'Aéroport international de New York-JFK', 'JFK', 'New York', 'États-Unis'),
(7, 'Aéroport international de Dubai', 'DXB', 'Dubai', 'Émirats arabes unis'),
(12, 'Paris-Charles-de-Gaulle - CDG', 'CDG', 'PARIS', 'FRANCE'),
(44, 'Londres Luton - LTN', 'LTN', 'LONDRES GB', '	Royaume-Uni');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `nom`, `prenom`, `email`, `motDePasse`, `last_login`) VALUES
(17, 'John', 'Doe', 'john.doe@example.com', 'password', NULL),
(18, 'Dupont', 'Pierre', 'pierre.dupont@example.com', 'client123', '2023-05-17 14:45:00'),
(19, 'Robert', 'Johnson', 'robert.johnson@example.com', 'test123', NULL),
(20, 'Alice', 'Johnson', 'alice.johnson@example.com', 'pass123', NULL),
(21, 'laaraj', 'meryam', 'meryam.12laaraj@gmail.com', 'kWvuOUf4', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `compagnieaerienne`
--

CREATE TABLE `compagnieaerienne` (
  `idCompagnie` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `codeIATA` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `compagnieaerienne`
--

INSERT INTO `compagnieaerienne` (`idCompagnie`, `nom`, `codeIATA`) VALUES
(1, 'Air France', 'AF'),
(2, 'British Airways', 'BA'),
(3, 'Lufthansa', 'LH'),
(4, 'Air China', 'CA'),
(5, 'Delta Air Lines', 'DL'),
(7, 'Emirates', 'EK'),
(10, 'easyJet', 'U2');

-- --------------------------------------------------------

--
-- Structure de la table `statutvol`
--

CREATE TABLE `statutvol` (
  `idStatut` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `statutvol`
--

INSERT INTO `statutvol` (`idStatut`, `nom`) VALUES
(1, 'Terminé'),
(2, 'En cours'),
(3, 'Programmé');

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE `vol` (
  `idVol` int(11) NOT NULL,
  `numeroVol` varchar(10) NOT NULL,
  `heureDepart` datetime NOT NULL,
  `heureArrivee` datetime NOT NULL,
  `idAeroportDepart` int(11) DEFAULT NULL,
  `idAeroportArrivee` int(11) DEFAULT NULL,
  `idCompagnie` int(11) DEFAULT NULL,
  `idStatut` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vol`
--

INSERT INTO `vol` (`idVol`, `numeroVol`, `heureDepart`, `heureArrivee`, `idAeroportDepart`, `idAeroportArrivee`, `idCompagnie`, `idStatut`) VALUES
(3, 'GHI789', '2023-05-18 20:30:00', '2023-05-18 22:45:00', 2, 1, 2, 2),
(4, 'LS9', '2023-05-11 11:03:00', '2023-05-12 11:03:00', 2, 1, 2, 1),
(5, 'ABC123', '2023-05-19 09:00:00', '2023-05-19 11:30:00', 1, 3, 1, 2),
(6, 'AF123', '2023-05-20 08:30:00', '2023-05-20 10:45:00', 1, 2, 1, 3),
(7, 'BA456', '2023-05-21 12:15:00', '2023-05-21 14:30:00', 2, 3, 2, 3),
(8, 'LH789', '2023-05-22 14:00:00', '2023-05-22 16:30:00', 3, 1, 3, 3),
(11, 'LA9', '2023-05-19 06:45:00', '2023-05-19 07:45:00', 1, 2, 2, 2),
(13, 'EZY2437', '2023-05-18 15:24:00', '2023-05-18 17:37:00', 44, 12, 10, 3),
(19, 'AFR1181', '2023-05-19 19:45:00', '2023-05-19 22:00:00', 2, 12, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `vol_annule`
--

CREATE TABLE `vol_annule` (
  `id_vol_annule` int(11) NOT NULL,
  `idVol` int(11) NOT NULL,
  `raison_annulation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vol_annule`
--

INSERT INTO `vol_annule` (`id_vol_annule`, `idVol`, `raison_annulation`) VALUES
(1, 4, 'Mauvaises conditions météorologiques');

-- --------------------------------------------------------

--
-- Structure de la table `vol_retarde`
--

CREATE TABLE `vol_retarde` (
  `id_vol_retarde` int(11) NOT NULL,
  `idVol` int(11) NOT NULL,
  `duree_retard` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vol_retarde`
--

INSERT INTO `vol_retarde` (`id_vol_retarde`, `idVol`, `duree_retard`) VALUES
(1, 3, 60);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`idAdmin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `administrateuraeroport`
--
ALTER TABLE `administrateuraeroport`
  ADD PRIMARY KEY (`idAdminAeroport`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idAeroport` (`idAeroport`);

--
-- Index pour la table `aeroport`
--
ALTER TABLE `aeroport`
  ADD PRIMARY KEY (`idAeroport`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `compagnieaerienne`
--
ALTER TABLE `compagnieaerienne`
  ADD PRIMARY KEY (`idCompagnie`);

--
-- Index pour la table `statutvol`
--
ALTER TABLE `statutvol`
  ADD PRIMARY KEY (`idStatut`);

--
-- Index pour la table `vol`
--
ALTER TABLE `vol`
  ADD PRIMARY KEY (`idVol`),
  ADD KEY `idAeroportDepart` (`idAeroportDepart`),
  ADD KEY `idAeroportArrivee` (`idAeroportArrivee`),
  ADD KEY `idCompagnie` (`idCompagnie`),
  ADD KEY `idStatut` (`idStatut`);

--
-- Index pour la table `vol_annule`
--
ALTER TABLE `vol_annule`
  ADD PRIMARY KEY (`id_vol_annule`),
  ADD KEY `idVol` (`idVol`);

--
-- Index pour la table `vol_retarde`
--
ALTER TABLE `vol_retarde`
  ADD PRIMARY KEY (`id_vol_retarde`),
  ADD KEY `idVol` (`idVol`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateuraeroport`
--
ALTER TABLE `administrateuraeroport`
  MODIFY `idAdminAeroport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `vol`
--
ALTER TABLE `vol`
  MODIFY `idVol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateuraeroport`
--
ALTER TABLE `administrateuraeroport`
  ADD CONSTRAINT `administrateuraeroport_ibfk_1` FOREIGN KEY (`idAeroport`) REFERENCES `aeroport` (`idAeroport`);

--
-- Contraintes pour la table `vol`
--
ALTER TABLE `vol`
  ADD CONSTRAINT `vol_ibfk_1` FOREIGN KEY (`idAeroportDepart`) REFERENCES `aeroport` (`idAeroport`),
  ADD CONSTRAINT `vol_ibfk_2` FOREIGN KEY (`idAeroportArrivee`) REFERENCES `aeroport` (`idAeroport`),
  ADD CONSTRAINT `vol_ibfk_3` FOREIGN KEY (`idCompagnie`) REFERENCES `compagnieaerienne` (`idCompagnie`),
  ADD CONSTRAINT `vol_ibfk_4` FOREIGN KEY (`idStatut`) REFERENCES `statutvol` (`idStatut`);

--
-- Contraintes pour la table `vol_annule`
--
ALTER TABLE `vol_annule`
  ADD CONSTRAINT `volannele` FOREIGN KEY (`idVol`) REFERENCES `vol` (`idVol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `vol_retarde`
--
ALTER TABLE `vol_retarde`
  ADD CONSTRAINT `volretard` FOREIGN KEY (`idVol`) REFERENCES `vol` (`idVol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
