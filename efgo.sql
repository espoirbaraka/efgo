-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 09 sep. 2021 à 09:47
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `efgo`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_agent`
--

CREATE TABLE `t_agent` (
  `CodeAgent` int(11) NOT NULL,
  `NomAgent` varchar(50) NOT NULL,
  `PostnomAgent` varchar(50) NOT NULL,
  `PrenomAgent` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `Photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_agent`
--

INSERT INTO `t_agent` (`CodeAgent`, `NomAgent`, `PostnomAgent`, `PrenomAgent`, `Username`, `Password`, `Photo`) VALUES
(1, 'Baraka', 'Bigega', 'Espoir', 'espoir', 'd033e22ae348aeb5660fc2140aec35850c4da997', '243991286881_status_a57b8e10718c43fbb707cbd1dd60f7b2.jpg'),
(3, 'Danny', 'Useni', 'Kiss', 'kiss', 'd033e22ae348aeb5660fc2140aec35850c4da997', '243991286881_status_884e809371244c45bb33fe15cbaf3e51.jpg'),
(4, 'Abio', 'Bomongoyo', 'Gaetan', 'gaetan', 'd033e22ae348aeb5660fc2140aec35850c4da997', '243991286881_status_a57b8e10718c43fbb707cbd1dd60f7b2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `t_categorie`
--

CREATE TABLE `t_categorie` (
  `CodeCategorie` int(11) NOT NULL,
  `Categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_categorie`
--

INSERT INTO `t_categorie` (`CodeCategorie`, `Categorie`) VALUES
(1, 'STANDARD'),
(2, 'VIP');

-- --------------------------------------------------------

--
-- Structure de la table `t_championnat`
--

CREATE TABLE `t_championnat` (
  `CodeChampionnat` int(11) NOT NULL,
  `Championnat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_championnat`
--

INSERT INTO `t_championnat` (`CodeChampionnat`, `Championnat`) VALUES
(2, 'LINAFOOT'),
(3, 'LIFNOKI'),
(4, 'CAF');

-- --------------------------------------------------------

--
-- Structure de la table `t_equipe`
--

CREATE TABLE `t_equipe` (
  `CodeEquipe` int(11) NOT NULL,
  `NomEquipe` varchar(100) NOT NULL,
  `SiegeEquipe` varchar(100) NOT NULL,
  `LogoEquipe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_equipe`
--

INSERT INTO `t_equipe` (`CodeEquipe`, `NomEquipe`, `SiegeEquipe`, `LogoEquipe`) VALUES
(2, 'DC VIRUNGA', 'GOMA', 'posters-ballon-de-foot.jpg.jpg'),
(3, 'AS KABASHA', 'GOMA', ''),
(4, 'OC MUUNGANO', 'BUKAVU', ''),
(5, 'DAUPHIN NOIR', 'GOMA', ''),
(6, 'VITA CLUB', 'KINSHASA', 'téléchargement (1).png'),
(7, 'TP MAZEMBE', 'LUBUMBASHI', 'téléchargement.png'),
(8, 'FC RENAISSANCE', 'KINSHASA', ''),
(9, 'MANIEMA UNION', 'KINDU', ''),
(10, 'BUKAVU DAWA', 'BUKAVU', ''),
(11, 'FC LUPOPO', 'LUBUMBASHI', ''),
(12, 'AS NYUKI', 'BUTEMBO', 'téléchargement (1).png');

-- --------------------------------------------------------

--
-- Structure de la table `t_match`
--

CREATE TABLE `t_match` (
  `CodeMatch` int(11) NOT NULL,
  `Equipe_A` int(11) NOT NULL,
  `Equipe_B` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Heure` time NOT NULL,
  `MontantStandard` float NOT NULL,
  `Status` int(11) NOT NULL,
  `Score` varchar(15) NOT NULL,
  `CodeChampionnat` int(11) NOT NULL,
  `CodeStade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_match`
--

INSERT INTO `t_match` (`CodeMatch`, `Equipe_A`, `Equipe_B`, `Date`, `Heure`, `MontantStandard`, `Status`, `Score`, `CodeChampionnat`, `CodeStade`) VALUES
(1, 3, 'DC VIRUNGA', '2021-10-09', '15:30:00', 1, 1, '4-2', 3, 2),
(2, 4, 'DAUPHIN NOIR', '2021-11-09', '16:30:00', 1, 1, '4-4', 3, 3),
(3, 7, 'DAUPHIN NOIR', '2021-09-15', '16:15:00', 2, 1, '3-0', 2, 2),
(4, 9, 'VITA CLUB', '2021-09-12', '13:00:00', 1, 1, '2-2', 2, 2),
(5, 7, 'DAUPHIN NOIR', '2021-09-16', '12:30:00', 2, 1, '5-0', 2, 2),
(6, 6, 'DAUPHIN NOIR', '2021-09-09', '15:30:00', 1, 1, '4-1', 2, 2),
(7, 5, 'AS KABASHA', '2021-09-08', '17:00:00', 1, 1, '2-2', 2, 2),
(8, 10, 'TP MAZEMBE', '2021-09-10', '16:30:00', 2, 0, '', 2, 4),
(9, 12, 'FC RENAISSANCE', '2021-11-04', '15:30:00', 1, 1, '4-4', 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `t_payement`
--

CREATE TABLE `t_payement` (
  `CodePayement` int(11) NOT NULL,
  `Montant` float NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `CodeReservation` int(11) NOT NULL,
  `CodeAgent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_payement`
--

INSERT INTO `t_payement` (`CodePayement`, `Montant`, `Date`, `CodeReservation`, `CodeAgent`) VALUES
(1, 4, '2021-09-08 20:12:05', 1, 1),
(2, 5, '2021-09-08 20:12:05', 2, 1),
(3, 5, '2021-09-09 07:11:11', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_reservation`
--

CREATE TABLE `t_reservation` (
  `CodeReservation` int(11) NOT NULL,
  `NomClient` varchar(50) NOT NULL,
  `PostnomClient` varchar(50) NOT NULL,
  `DateReservation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Nombre` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `CodeMatch` int(11) NOT NULL,
  `CodeCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_reservation`
--

INSERT INTO `t_reservation` (`CodeReservation`, `NomClient`, `PostnomClient`, `DateReservation`, `Nombre`, `Status`, `CodeMatch`, `CodeCategorie`) VALUES
(1, 'BARAKA', 'BIGEGA', '2021-09-08 19:57:39', 4, 1, 7, 1),
(2, 'IDI', 'USENI', '2021-09-08 20:06:31', 2, 1, 6, 2),
(3, 'MICHAEL', 'BARAKA', '2021-09-07 22:00:00', 3, 0, 8, 2),
(4, 'AKETI', 'GABIN', '2021-09-09 07:11:11', 2, 1, 9, 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_stade`
--

CREATE TABLE `t_stade` (
  `CodeStade` int(11) NOT NULL,
  `Stade` varchar(100) NOT NULL,
  `LocalisationStade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `t_stade`
--

INSERT INTO `t_stade` (`CodeStade`, `Stade`, `LocalisationStade`) VALUES
(2, 'STADE DE L\'UNITE', 'GOMA'),
(3, 'STADE DU VOLCAN', 'GOMA'),
(4, 'KAMALONDO', 'LUBUMBASHI'),
(5, 'DES MARTYRS', 'KINSHASA');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_agent`
--
ALTER TABLE `t_agent`
  ADD PRIMARY KEY (`CodeAgent`);

--
-- Index pour la table `t_categorie`
--
ALTER TABLE `t_categorie`
  ADD PRIMARY KEY (`CodeCategorie`);

--
-- Index pour la table `t_championnat`
--
ALTER TABLE `t_championnat`
  ADD PRIMARY KEY (`CodeChampionnat`);

--
-- Index pour la table `t_equipe`
--
ALTER TABLE `t_equipe`
  ADD PRIMARY KEY (`CodeEquipe`);

--
-- Index pour la table `t_match`
--
ALTER TABLE `t_match`
  ADD PRIMARY KEY (`CodeMatch`),
  ADD KEY `fk_match_equipea` (`Equipe_A`),
  ADD KEY `fk_match_championnat` (`CodeChampionnat`),
  ADD KEY `fk_match_stade` (`CodeStade`);

--
-- Index pour la table `t_payement`
--
ALTER TABLE `t_payement`
  ADD PRIMARY KEY (`CodePayement`),
  ADD KEY `fk_payement_agent` (`CodeAgent`),
  ADD KEY `fk_payement_reservation` (`CodeReservation`);

--
-- Index pour la table `t_reservation`
--
ALTER TABLE `t_reservation`
  ADD PRIMARY KEY (`CodeReservation`),
  ADD KEY `fk_reservation_match` (`CodeMatch`),
  ADD KEY `fk_reservation_categorie` (`CodeCategorie`);

--
-- Index pour la table `t_stade`
--
ALTER TABLE `t_stade`
  ADD PRIMARY KEY (`CodeStade`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_agent`
--
ALTER TABLE `t_agent`
  MODIFY `CodeAgent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_categorie`
--
ALTER TABLE `t_categorie`
  MODIFY `CodeCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_championnat`
--
ALTER TABLE `t_championnat`
  MODIFY `CodeChampionnat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_equipe`
--
ALTER TABLE `t_equipe`
  MODIFY `CodeEquipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `t_match`
--
ALTER TABLE `t_match`
  MODIFY `CodeMatch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `t_payement`
--
ALTER TABLE `t_payement`
  MODIFY `CodePayement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `t_reservation`
--
ALTER TABLE `t_reservation`
  MODIFY `CodeReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_stade`
--
ALTER TABLE `t_stade`
  MODIFY `CodeStade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_match`
--
ALTER TABLE `t_match`
  ADD CONSTRAINT `fk_match_championnat` FOREIGN KEY (`CodeChampionnat`) REFERENCES `t_championnat` (`CodeChampionnat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_match_equipea` FOREIGN KEY (`Equipe_A`) REFERENCES `t_equipe` (`CodeEquipe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_match_stade` FOREIGN KEY (`CodeStade`) REFERENCES `t_stade` (`CodeStade`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `t_payement`
--
ALTER TABLE `t_payement`
  ADD CONSTRAINT `fk_payement_agent` FOREIGN KEY (`CodeAgent`) REFERENCES `t_agent` (`CodeAgent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_payement_reservation` FOREIGN KEY (`CodeReservation`) REFERENCES `t_reservation` (`CodeReservation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `t_reservation`
--
ALTER TABLE `t_reservation`
  ADD CONSTRAINT `fk_reservation_categorie` FOREIGN KEY (`CodeCategorie`) REFERENCES `t_categorie` (`CodeCategorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reservation_match` FOREIGN KEY (`CodeMatch`) REFERENCES `t_match` (`CodeMatch`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
