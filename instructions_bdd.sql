Pour créer la base de donnée en local :

-- 1. Lancer le serveur sur XAMP/WAMP/MAMP 
-- 2. Taper l'URL suivant : localhost/phpmyadmin
-- 3. Créer une nouvelle base de donnée et lui donner le nom "discord_bdd"
-- 4. Remplir la base de données, via l'onglet "SQL" en exécutant ces commande : 
CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
)

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(18, 'Kiverix', 'edouard@mail.europe', 'mot_de_passe_securise_123456'),
(19, 'Skyrim', 'criminal.scum@skyrim.game', 'youHaveBrokenTheLaw'),
(0, 'le_gov_frc', 'gov@gov.gov', 'el_gobierno.gov'),
(78, 'region_idf', 'iledefrance@europe.unioneuro', 'jaimeleurope121212'),
(9, 'HorsLaLoi', 'crimedanslesang@prison.libre', 'jesuishorslaloimdr'),
(3, 'Negan', 'lemecdansTWD@oui.non', 'jaimembattedebaseball'),
(445, 'LaPireDentitionDeurope', 'dentirion.nulle@miam.com', 'jeSuisLhommeAvecLaPireDentitionDeurope'),
(798, 'Morgan_Yu', 'morgan.yu@transtar.co', 'FParad0x?'),
(1, 'michel', 'michel.saumon@gmail.com', '1_897p_sr87&&sh3_'),
(999, 'BigMan', 'big.man@huge.guy', 'ITSABIGONE');

ALTER TABLE `channels`
  ADD PRIMARY KEY (`channel_id`),
  ADD KEY `server_id` (`server_id`);
  MODIFY `channel_id` int NOT NULL AUTO_INCREMENT;
  ADD CONSTRAINT `channels_ibfk_1` FOREIGN KEY (`server_id`) REFERENCES `server` (`server_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `member`
  ADD KEY `server_id` (`server_id`),
  ADD KEY `user_id` (`user_id`);
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`server_id`) REFERENCES `server` (`server_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `channel_id` (`channel_id`),
  ADD KEY `receiver_id` (`receiver_id`),
  ADD KEY `sender_id` (`sender_id`);
  MODIFY `message_id` int NOT NULL AUTO_INCREMENT;
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`channel_id`) REFERENCES `channels` (`channel_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE `server`
  ADD PRIMARY KEY (`server_id`);
  MODIFY `server_id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

COMMIT;
