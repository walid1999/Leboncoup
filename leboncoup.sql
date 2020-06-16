-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 16 juin 2020 à 04:40
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `leboncoup`
--
CREATE DATABASE IF NOT EXISTS `leboncoup` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `leboncoup`;

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id_annonces` int(3) NOT NULL,
  `titre` varchar(40) DEFAULT NULL,
  `prix` varchar(20) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `img_annonce` varchar(30) DEFAULT NULL,
  `statut` varchar(10) DEFAULT NULL,
  `date_publication` date DEFAULT NULL,
  `id_profil` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id_annonces`, `titre`, `prix`, `description`, `img_annonce`, `statut`, `date_publication`, `id_profil`) VALUES
(13, 'maison', '36', 'arerer', 'img/maison.jpg', NULL, NULL, 6),
(14, 'Voiture Renault', '9 000', 'Renault toute pourrite ', 'img/voiture.jpg', NULL, NULL, 6),
(15, 'Cage à Hamster', '45', 'Magnifique cage à hamster en parfaite étant fonctionnelle dès l\'achat.', 'img/cage hamster.jpg', NULL, NULL, 6),
(16, 'Arbre griffoir a chat', '78', 'Jolie arbre griffoir pour votre magnifique chat tout poilu.', 'img/arbre.jpg', NULL, NULL, 6),
(17, 'Gant de moto', '19', 'Gant de moto cross en parfaite état qui va vous permettre de levé en Y comme Jul.', 'img/gant.jpg', NULL, NULL, 7),
(18, 'PC gamer', '1 000', 'pc gamer pour jouer a minecraft', 'img/pc.jpg', NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(3) NOT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `mail` varchar(30) NOT NULL,
  `identifiant` varchar(30) DEFAULT NULL,
  `mot_de_passe` varchar(30) DEFAULT NULL,
  `img` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id_profil`, `prenom`, `nom`, `mail`, `identifiant`, `mot_de_passe`, `img`) VALUES
(6, 'Romain', 'Calvet', 'romaincalvet23@hotmail.fr', 'Romaain23', 'Romain1111', 'img/chien.jpg'),
(7, 'Walid', 'Ben khelfallah', 'walid.benkhelfallah@gmail.com', 'wallss92', '1111', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id_annonces`),
  ADD KEY `id_profil` (`id_profil`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id_annonces` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_ibfk_1` FOREIGN KEY (`id_profil`) REFERENCES `profil` (`id_profil`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
