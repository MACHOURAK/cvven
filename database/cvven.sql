-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 23 sep. 2026 à 16:42
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
-- Base de données : `cvven`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambres`
--

CREATE TABLE `chambres` (
  `id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `capacite` varchar(100) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `nombre_disponible` int(11) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chambres`
--

INSERT INTO `chambres` (`id`, `village_id`, `nom`, `capacite`, `prix`, `nombre_disponible`) VALUES
(1, 1, 'Chambre individuelle', '1 personne', 50.00, 9),
(2, 1, 'Chambre double', '2 personnes', 80.00, 10),
(3, 1, 'Chambre familiale', '4 personnes', 120.00, 10),
(25, 2, 'Chambre individuelle', '1 personne', 50.00, 10),
(26, 2, 'Chambre double', '2 personnes', 80.00, 10),
(27, 2, 'Chambre familiale', '4 personnes', 120.00, 10),
(28, 3, 'Chambre individuelle', '1 personne', 50.00, 6),
(29, 3, 'Chambre double', '2 personnes', 80.00, 10),
(30, 3, 'Chambre familiale', '4 personnes', 120.00, 10),
(31, 4, 'Chambre individuelle', '1 personne', 50.00, 10),
(32, 4, 'Chambre double', '2 personnes', 80.00, 10),
(33, 4, 'Chambre familiale', '4 personnes', 120.00, 10);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `chambre_id` int(11) NOT NULL,
  `date_arrivee` date NOT NULL,
  `date_depart` date NOT NULL,
  `nombre_chambres` int(11) NOT NULL,
  `prix_total` decimal(10,2) NOT NULL,
  `statut` varchar(50) NOT NULL DEFAULT 'Confirmée',
  `nom_client` varchar(100) NOT NULL,
  `prenom_client` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `village_id`, `chambre_id`, `date_arrivee`, `date_depart`, `nombre_chambres`, `prix_total`, `statut`, `nom_client`, `prenom_client`) VALUES
(26, 2, 25, '2026-09-05', '2026-10-11', 5, 9000.00, 'Annulée', '', ''),
(27, 1, 1, '2026-09-20', '2026-09-27', 1, 350.00, 'Annulée', '', ''),
(28, 3, 28, '2026-09-20', '2026-09-23', 5, 750.00, 'Confirmée', '', ''),
(29, 1, 1, '2026-09-25', '2026-09-27', 1, 100.00, 'Confirmée', 'tt', 'tt');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `village_id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `village_id`, `nom`) VALUES
(1, 1, 'Restaurant'),
(2, 1, 'Salle de réunion'),
(3, 1, 'Parking'),
(4, 1, 'Wi-Fi'),
(5, 2, 'Restaurant'),
(6, 2, 'Parking'),
(7, 2, 'Wi-Fi'),
(8, 2, 'Salle de réunion'),
(9, 3, 'Restaurant'),
(10, 3, 'Parking'),
(11, 3, 'Wi-Fi'),
(12, 3, 'Salle de réunion'),
(13, 4, 'Restaurant'),
(14, 4, 'Parking'),
(15, 4, 'Wi-Fi'),
(16, 4, 'Salle de réunion');

-- --------------------------------------------------------

--
-- Structure de la table `villages`
--

CREATE TABLE `villages` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `departement` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `capacite` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `villages`
--

INSERT INTO `villages` (`id`, `nom`, `departement`, `image`, `slug`, `description`, `adresse`, `capacite`) VALUES
(1, 'Les Rousses', 'Jura', 'les-rousses.jpg', 'les-rousses', 'Le village de vacances Paul Émile Victor est situé dans le Jura. Il dispose de chambres, d\'un restaurant, de salles de réunion et de nombreux équipements.', 'Les Rousses, Jura', '100 personnes'),
(2, 'La Rochelle', 'Charente-Maritime', 'la-rochelle.jpg', 'la-rochelle', 'La Rochelle est une ville portuaire située dans le département de Charente-Maritime.', 'La Rochelle, Charente-Maritime', '120 personnes'),
(3, 'Saint-Anthème', 'Puy-de-Dôme', 'saint-antheme.jpg', 'saint-antheme', 'Saint-Anthème est un village de montagne situé dans le département du Puy-de-Dôme.', 'Saint-Anthème, Puy-de-Dôme', '80 personnes'),
(4, 'Villefort', 'Lozère', 'villefort.jpg', 'villefort', 'Villefort est un village situé dans le département de Lozère.', 'Villefort, Lozère', '80 personnes');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chambres`
--
ALTER TABLE `chambres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `village_id` (`village_id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `village_id` (`village_id`);

--
-- Index pour la table `villages`
--
ALTER TABLE `villages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chambres`
--
ALTER TABLE `chambres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `villages`
--
ALTER TABLE `villages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chambres`
--
ALTER TABLE `chambres`
  ADD CONSTRAINT `chambres_ibfk_1` FOREIGN KEY (`village_id`) REFERENCES `villages` (`id`);

--
-- Contraintes pour la table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`village_id`) REFERENCES `villages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
