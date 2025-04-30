-- ----------------------------------------------------------------------------------
-- Ce fichier est une sauvegarde de la base de données "GesNotes".
-- Il contient la structure des tables ainsi que les données enregistrées.
-- ----------------------------------------------------------------------------------


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Structure de la table `crendentiels`
--

CREATE TABLE `crendentiels` (
  `Nom` varchar(100) NOT NULL,
  `Login` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Categorie` enum('admin','prof','etudiant') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `crendentiels`
--

INSERT INTO `crendentiels` (`Nom`, `Login`, `Password`, `Email`, `Categorie`) VALUES
('', 'doaa56', '4ca82782c5372a547c104929f03fe7a9', '', 'admin');

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `ID` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Informatique` float NOT NULL,
  `Maths` float NOT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notes`
--

INSERT INTO `notes` (`ID`, `Nom`, `Informatique`, `Maths`, `Image`) VALUES
(1, 'doaa', 13, 15, 'assets/1742825110_img3.jpg'),
(3, 'nouhaila', 19, 17, 'assets/1742825123_img4.jpg'),
(4, 'lamiaa', 16, 6, 'assets/1742823778_Sans titre.jpg'),
(5, 'ahmed', 17, 18, 'assets/1742824109_img2.jpg'),
(6, 'anas', 6, 4, 'assets/1742825369_img5.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `crendentiels`
--
ALTER TABLE `crendentiels`
  ADD UNIQUE KEY `Login` (`Login`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;