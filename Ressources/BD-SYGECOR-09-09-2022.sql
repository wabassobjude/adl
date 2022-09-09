-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 09 sep. 2022 à 21:28
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ladul`
--

-- --------------------------------------------------------

--
-- Structure de la table `fasting`
--

CREATE TABLE `fasting` (
  `id` smallint(6) NOT NULL,
  `periode` varchar(50) DEFAULT NULL,
  `jours` smallint(6) DEFAULT NULL,
  `types` varchar(50) DEFAULT NULL,
  `id_pa` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fasting`
--

INSERT INTO `fasting` (`id`, `periode`, `jours`, `types`, `id_pa`) VALUES
(1, '2022-W32', 2, 'Cpmplet', 1),
(2, '2022-W35', 7, 'Partiel', 3),
(3, '2022-W31', 10, 'Partiel', 6),
(4, '2022-W31', 12, 'Cpmplet', 1),
(5, '2022-W36', 10, 'Partiel', 10),
(6, '2022-W31', 12, 'Cpmplet', 9),
(7, '2022-W34', 12, 'Partiel', 10),
(8, '2022-W32', 0, 'Partiel', 10),
(9, '2022-W46', 10, 'Partiel', 10),
(10, '2022-W38', 5, 'Partiel', 10);

-- --------------------------------------------------------

--
-- Structure de la table `pole`
--

CREATE TABLE `pole` (
  `id` smallint(6) NOT NULL,
  `polename` varchar(50) DEFAULT NULL,
  `leader` varchar(50) DEFAULT NULL,
  `nation` varchar(100) DEFAULT NULL,
  `id_user` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pole`
--

INSERT INTO `pole` (`id`, `polename`, `leader`, `nation`, `id_user`) VALUES
(1, 'LAD1-Yde', 'Betsaleel Jude', 'Senegal', 1),
(2, 'Pole2', 'Jude', 'Cap Vert', 2),
(3, 'ABCpole', 'Albert', 'Naation', 2),
(4, 'Pole PSU Maroua', 'Betsaleel Jude', 'Cameroun', 1),
(5, 'Nom modifié', 'Betsaleel Jude', 'Canada', 2),
(6, 'Mine', 'Jude', 'Cameroun', 2),
(7, 'Mega Pole', 'Bout Tranchant', 'Senegal', 1),
(8, 'Pole Yaounde2', 'Betsaleel Jude', 'Cameroun', 1),
(9, 'Le pole du jpur', 'Moi meme', 'LA nation du pole', 1),
(10, 'Aaron Pole', 'PoleLeader', 'PoleNation', 2);

-- --------------------------------------------------------

--
-- Structure de la table `poleaccount`
--

CREATE TABLE `poleaccount` (
  `id` smallint(6) NOT NULL,
  `periode` varchar(255) DEFAULT NULL,
  `pa_date` date DEFAULT NULL,
  `id_pole` smallint(6) DEFAULT NULL,
  `effectif` smallint(6) DEFAULT NULL,
  `daddy` time DEFAULT NULL,
  `missionnaries` time DEFAULT NULL,
  `id_user` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `poleaccount`
--

INSERT INTO `poleaccount` (`id`, `periode`, `pa_date`, `id_pole`, `effectif`, `daddy`, `missionnaries`, `id_user`) VALUES
(1, '2022-W35', '2022-08-31', 3, 12, '16:37:00', '14:37:00', 1),
(2, '2022-W32', '2022-08-17', 1, 10, '15:47:00', '10:47:00', 1),
(3, '2022-W36', '2022-09-07', 2, 14, '13:52:00', '05:52:00', 1),
(4, '2022-W36', '2022-09-07', 2, 14, '13:52:00', '05:52:00', 1),
(5, '2022-W36', '2022-09-07', 2, 14, '13:52:00', '05:52:00', 1),
(6, '2022-W36', '2022-09-07', 2, 14, '13:52:00', '05:52:00', 1),
(7, '2022-W36', '2022-09-07', 2, 14, '13:52:00', '05:52:00', 1),
(8, 'Semaine 33,2022', '2022-08-26', 7, 7, '12:14:00', '10:11:00', 1),
(9, '2022-W33', '2022-08-17', 3, 2, '00:37:00', '00:37:00', 1),
(10, '2022-W46', '2022-08-10', 8, 6, '10:12:00', '12:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `singleaccount`
--

CREATE TABLE `singleaccount` (
  `id` smallint(6) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `sadate` date DEFAULT NULL,
  `daddy` time DEFAULT NULL,
  `missionnaries` time DEFAULT NULL,
  `fasting` smallint(6) DEFAULT NULL,
  `type_jeune` varchar(50) DEFAULT NULL,
  `id_user` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `singleaccount`
--

INSERT INTO `singleaccount` (`id`, `firstname`, `lastname`, `sadate`, `daddy`, `missionnaries`, `fasting`, `type_jeune`, `id_user`) VALUES
(1, 'NONG', 'Gedeon', '2022-08-23', '03:30:00', '02:30:00', 7, 'Partiel', 1),
(2, 'Betsaleel', 'Jude', '2022-08-10', '23:33:00', '04:33:00', 8, 'Partiel', 1),
(3, 'Albert', 'Jude  Betsaleel', '2022-08-03', '03:10:00', '02:05:00', 4, 'Partiel', 1),
(4, 'NONG', 'Gedeon', '2022-08-17', '13:21:00', '11:22:00', 2, 'Partiel', 1),
(5, 'NONG', 'Gedeon', '2022-08-17', '13:21:00', '11:22:00', 2, 'Partiel', 1),
(6, 'test', 'Testeur', '2022-08-27', '10:00:00', '12:00:00', 3, 'Partiel', 1),
(7, 'Alex', 'Romain', '2022-08-02', '01:32:00', '05:32:00', 3, 'Partiel', 1),
(8, 'NONG', 'Gedeon', '2022-08-03', '04:34:00', '01:36:00', 2, 'Complet', 1),
(9, 'The Lord', 'and Me', '2022-08-25', '12:00:00', '14:18:00', 3, 'Complet', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` smallint(6) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `fonction` varchar(255) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `fonction`, `login`, `pwd`) VALUES
(1, 'Jude', 'Betsaleel', 'Admin', 'Betsaleel', '123'),
(2, 'Albert', 'Jude', 'Admin', NULL, '321');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `fasting`
--
ALTER TABLE `fasting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pa` (`id_pa`);

--
-- Index pour la table `pole`
--
ALTER TABLE `pole`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user3` (`id_user`);

--
-- Index pour la table `poleaccount`
--
ALTER TABLE `poleaccount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`id_user`),
  ADD KEY `fk_p` (`id_pole`) USING BTREE;

--
-- Index pour la table `singleaccount`
--
ALTER TABLE `singleaccount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `fasting`
--
ALTER TABLE `fasting`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `pole`
--
ALTER TABLE `pole`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `poleaccount`
--
ALTER TABLE `poleaccount`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `singleaccount`
--
ALTER TABLE `singleaccount`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `fasting`
--
ALTER TABLE `fasting`
  ADD CONSTRAINT `fk_pa` FOREIGN KEY (`id_pa`) REFERENCES `poleaccount` (`id`);

--
-- Contraintes pour la table `pole`
--
ALTER TABLE `pole`
  ADD CONSTRAINT `fk_user3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `poleaccount`
--
ALTER TABLE `poleaccount`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `singleaccount`
--
ALTER TABLE `singleaccount`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
