-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 05 Décembre 2016 à 08:17
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ptut`
--
CREATE DATABASE IF NOT EXISTS `ptut` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ptut`;

-- --------------------------------------------------------

--
-- Structure de la table `filematchmaking`
--

CREATE TABLE `filematchmaking` (
  `positionFile` int(3) NOT NULL,
  `noJoueur` varchar(8) NOT NULL,
  `niveauJoueur` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `noJoueur` int(8) NOT NULL,
  `pseudo` varchar(24) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `salt` char(4) NOT NULL,
  `adresseMail` varchar(128) NOT NULL,
  `dateInscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tempsdeJeu` time DEFAULT NULL,
  `niveau` int(3) DEFAULT NULL,
  `Statut` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `joueur`
--

INSERT INTO `joueur` (`noJoueur`, `pseudo`, `mdp`, `salt`, `adresseMail`, `dateInscription`, `tempsdeJeu`, `niveau`, `Statut`) VALUES
(1, 'Kinder', 'ebc58ab2cb4848d04ec23d83f7ddf985', '', 'ex@gmail.com', '2016-10-26 19:09:45', '00:00:00', 1, 0),
(2, 'test', '35saZ1IJNhQ8Y', '3550', 'exemple@gmail.com', '2016-12-03 17:21:24', '00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `listeamis`
--

CREATE TABLE `listeamis` (
  `noJoueur1` varchar(8) NOT NULL,
  `noJoueur2` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `filematchmaking`
--
ALTER TABLE `filematchmaking`
  ADD PRIMARY KEY (`positionFile`),
  ADD KEY `fk_nojoueur` (`noJoueur`),
  ADD KEY `fk_niveauJoueur` (`niveauJoueur`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`noJoueur`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Index pour la table `listeamis`
--
ALTER TABLE `listeamis`
  ADD PRIMARY KEY (`noJoueur1`,`noJoueur2`),
  ADD KEY `fk_nojoueur2` (`noJoueur2`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `noJoueur` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
