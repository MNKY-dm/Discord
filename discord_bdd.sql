-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2025 at 04:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discord_bdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
