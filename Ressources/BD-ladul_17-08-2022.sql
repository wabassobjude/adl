-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 17 août 2022 à 14:36
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
  `jours` smallint(6) DEFAULT NULL,
  `types` varchar(50) DEFAULT NULL,
  `id_pa` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Structure de la table `poleaccount`
--

CREATE TABLE `poleaccount` (
  `id` smallint(6) NOT NULL,
  `periode` varchar(255) DEFAULT NULL,
  `pa_date` date DEFAULT NULL,
  `effectif` smallint(6) DEFAULT NULL,
  `daddy` time DEFAULT NULL,
  `missionnaries` time DEFAULT NULL,
  `id_user` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `singleaccount`
--

CREATE TABLE `singleaccount` (
  `id` smallint(6) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `sa_date` date DEFAULT NULL,
  `daddy` time DEFAULT NULL,
  `missionnaries` time DEFAULT NULL,
  `fasting` smallint(6) DEFAULT NULL,
  `type_jeune` varchar(50) DEFAULT NULL,
  `id_user` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `fk_user` (`id_user`);

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
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pole`
--
ALTER TABLE `pole`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `poleaccount`
--
ALTER TABLE `poleaccount`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `singleaccount`
--
ALTER TABLE `singleaccount`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;

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
