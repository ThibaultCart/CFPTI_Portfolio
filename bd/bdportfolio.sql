-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 30 jan. 2020 à 09:28
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdportfolio`
--

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `idMedia` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `nomMedia` varchar(250) NOT NULL,
  `typeMedia` text NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `idPost` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `datePost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateDeniereModification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`idPost`, `commentaire`, `datePost`, `dateDeniereModification`) VALUES
(1, 'jjghjjgh fdgfd', '2020-01-28 09:31:01', '2020-01-28 09:31:21'),
(2, 'gfhgfhgfh bertret', '2020-01-28 09:31:51', '2020-01-28 09:32:01');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`idMedia`),
  ADD KEY `idPost` (`idPost`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPost`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `idMedia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`idPost`) REFERENCES `post` (`idPost`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
