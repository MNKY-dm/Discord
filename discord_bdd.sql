-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 12 mai 2025 à 12:19
-- Version du serveur : 8.0.40
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `discord_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `channels`
--

CREATE TABLE `channels` (
  `channel_id` int NOT NULL,
  `channel_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `server_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `channels`
--

INSERT INTO `channels` (`channel_id`, `channel_name`, `server_id`) VALUES
(1, 'general', 1),
(2, 'bienvenue', 1);

-- --------------------------------------------------------

--
-- Structure de la table `channel_messages`
--

CREATE TABLE `channel_messages` (
  `id_message` int NOT NULL,
  `sender_id` int NOT NULL,
  `channel_id` int NOT NULL,
  `timestamp` timestamp(6) NOT NULL,
  `message_content` varchar(250) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
  `server_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`server_id`, `user_id`) VALUES
(1, 1),
(2, 1),
(2, 999),
(3, 1),
(3, 999),
(4, 1),
(4, 999),
(5, 1),
(5, 999),
(6, 19),
(1, 19),
(1, 19);

-- --------------------------------------------------------

--
-- Structure de la table `private_messages`
--

CREATE TABLE `private_messages` (
  `message_id` int NOT NULL,
  `message_content` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` timestamp(6) NOT NULL,
  `sender_id` int NOT NULL,
  `receiver_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `server`
--

CREATE TABLE `server` (
  `server_id` int NOT NULL,
  `server_name` varchar(250) NOT NULL,
  `creator_id` int NOT NULL,
  `admin_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `server`
--

INSERT INTO `server` (`server_id`, `server_name`, `creator_id`, `admin_id`) VALUES
(1, 'serveur 1', 1, 1),
(2, 'serveur 1', 1, 1),
(3, 'serveur 1', 1, 1),
(4, 'serveur 1', 1, 1),
(5, 'serveur 1', 1, 1),
(6, 'serveur 1', 1, 1),
(7, 'huit', 1, 1),
(8, 'huit', 1, 1),
(9, '', 1, 1),
(10, '', 1, 1),
(11, '', 1, 1),
(12, '', 1, 1),
(13, '', 1, 1),
(14, 'kiwi', 1, 1),
(15, 'kiwi', 1, 1),
(16, 'ouiouisacrebleu', 1, 1),
(17, 'yep', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'michel', 'michel.saumon@gmail.com', '1_897p_sr87&&sh3_'),
(2, 'mnky', 'dylan.moulin@gmail.com', '$2y$10$.ER2f0/IUc4Wy7KFXPa7ZuJlIKdUXAzNI4xE6ryPDl54wkAhSYWVe'),
(3, 'Negan', 'lemecdansTWD@oui.non', 'jaimembattedebaseball'),
(9, 'HorsLaLoi', 'crimedanslesang@prison.libre', 'jesuishorslaloimdr'),
(18, 'Kiverix', 'edouard@mail.europe', 'mot_de_passe_securise_123456'),
(19, 'Skyrim', 'criminal.scum@skyrim.game', 'youHaveBrokenTheLaw'),
(20, 'le_gov_frc', 'gov@gov.gov', 'el_gobierno.gov'),
(78, 'region_idf', 'iledefrance@europe.unioneuro', 'jaimeleurope121212'),
(445, 'LaPireDentitionDeurope', 'dentirion.nulle@miam.com', 'jeSuisLhommeAvecLaPireDentitionDeurope'),
(798, 'Morgan_Yu', 'morgan.yu@transtar.co', 'FParad0x?'),
(999, 'BigMan', 'big.man@huge.guy', 'ITSABIGONE'),
(1000, 'ABOUAB', 'abouab@gmail.com', '$2y$10$y/RhsHagLojjtUhGTonXPuxoYLzOC9pIDd1RJD81RlOJiCBGqM.We'),
(1001, 'abouab2', 'abouab2@gmail.com', '$2y$10$E.QRnUlwLktyZGpWY4sGCO/302iGvABGZUmkDRz6K2QZTLfPjCIi6'),
(1002, 'abouab3', 'abouab3@gmail.com', '$2y$10$RQLLaYwO0twnO/jtqmlgx.3mJ/LfysGNRT7H5V5ixjiB2XI/MVBNu'),
(1003, 'abouab4', 'abouab4@gmail.com', '$2y$10$mmal6IRuyKnypNWf1i/qZO42kfoTuz7oqcokBpSwwALk/axCw4GNG'),
(1004, 'OOYEA', 'ooyea@yeah.com', '$2y$10$1JwUQvcvOxTvbK278lhCXerA8ZtPqIWz.wZAw/VUHO1Ahylt3skFa'),
(1005, 'mnky', 'dylan.moulin9272@gmail.com', '$2y$10$q/mYgIroTtDBJaq2bPUORu0YOShTyVx0a/3COzuqXGne0qYsp/lEO');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`channel_id`),
  ADD KEY `server_id` (`server_id`);

--
-- Index pour la table `channel_messages`
--
ALTER TABLE `channel_messages`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `channel_id` (`channel_id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Index pour la table `member`
--
ALTER TABLE `member`
  ADD KEY `server_id` (`server_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `private_messages`
--
ALTER TABLE `private_messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `receiver_id` (`receiver_id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Index pour la table `server`
--
ALTER TABLE `server`
  ADD PRIMARY KEY (`server_id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `channels`
--
ALTER TABLE `channels`
  MODIFY `channel_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `channel_messages`
--
ALTER TABLE `channel_messages`
  MODIFY `id_message` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `private_messages`
--
ALTER TABLE `private_messages`
  MODIFY `message_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `server`
--
ALTER TABLE `server`
  MODIFY `server_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `channels`
--
ALTER TABLE `channels`
  ADD CONSTRAINT `channels_ibfk_1` FOREIGN KEY (`server_id`) REFERENCES `server` (`server_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `channel_messages`
--
ALTER TABLE `channel_messages`
  ADD CONSTRAINT `channel_messages_ibfk_1` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`channel_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `channel_messages_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `member` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`server_id`) REFERENCES `server` (`server_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `private_messages`
--
ALTER TABLE `private_messages`
  ADD CONSTRAINT `private_messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `private_messages_ibfk_3` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `server`
--
ALTER TABLE `server`
  ADD CONSTRAINT `server_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
