-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 22 oct. 2020 à 17:28
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
-- Base de données :  `foad_ticket`
--

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `id_reponse` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `random_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`id`, `id_categorie`, `id_reponse`, `date`, `email`, `random_id`, `message`) VALUES
(1, NULL, NULL, '2020-10-22', 'toto@to.com', 30000000, ''),
(2, NULL, NULL, '2020-10-22', '', 94315537, ''),
(4, NULL, NULL, '2020-10-22', 'no@no.com', 10000000, ''),
(5, NULL, NULL, '2020-10-22', 'nono@no.no', 46262245, ''),
(6, 1, NULL, '2020-10-22', 'soso@so.so', 71861680, 'QSDfsqvqv');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_reponse` (`id_reponse`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`id_reponse`) REFERENCES `reponse` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
