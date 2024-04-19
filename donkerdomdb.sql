-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 apr 2024 om 23:09
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donkerdomdb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `members`
--

CREATE TABLE `members` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `members`
--

INSERT INTO `members` (`userID`, `username`, `firstname`, `lastname`, `password`, `email`, `date_joined`, `user_level`) VALUES
(1, 'Hallo', 'Hallohallo', 'Hallo', '$argon2i$v=19$m=131072,t=10,p=1$cC5pRUN4S3JvRVV2QTZzZA$DKmAm5kn28zro/stLX9hnE7BjmIgQLS60Pis4tmZSrU', 'hallohallo@yahoo.com', '2024-04-11 18:55:03', 4),
(2, 'Stan33', 'Stan', 'Stan', '$argon2i$v=19$m=131072,t=10,p=1$NDg5R25hak5XMEZOQ2l4Vw$TiQyNH1zBcHzba2Genz2Doigu0YxabkPR1ZeqkZFEzY', 'stan33@gmail.com', '2024-04-12 12:49:45', 1),
(3, 'ggggg', 'ddddd', 'dddddd', 'ddddddddddd', 'dddd@gmail.com', '2024-04-12 12:53:30', 1),
(4, 'aaaaaa', 'aaaaaa', 'aaaaaaa', 'aaaaaaaa', 'aaaaaaa@gmail.com', '2024-04-12 12:53:44', 1),
(5, 'xxxxxxxxxxxxx', 'xxxxxxxxxxxxx', 'xxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'xxxxxxxxxx@yahoo.com', '2024-04-12 12:54:41', 2),
(6, 'eeeeeeeeeee', 'eeeeeeeeeee', 'eeeeeeeeeee', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'ee32@hotmail.com', '2024-04-12 12:54:41', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_levels`
--

CREATE TABLE `user_levels` (
  `id` int(11) NOT NULL,
  `level_title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `user_levels`
--

INSERT INTO `user_levels` (`id`, `level_title`) VALUES
(1, 'guest'),
(2, 'member'),
(3, 'council'),
(4, 'admin');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `user_level` (`user_level`);

--
-- Indexen voor tabel `user_levels`
--
ALTER TABLE `user_levels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `members`
--
ALTER TABLE `members`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `user_levels`
--
ALTER TABLE `user_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
