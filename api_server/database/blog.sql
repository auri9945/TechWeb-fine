-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 20, 2024 alle 01:56
-- Versione del server: 10.4.25-MariaDB
-- Versione PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `materie`
--

CREATE TABLE `materie` (
  `id` int(11) NOT NULL,
  `materia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `materie`
--

INSERT INTO `materie` (`id`, `materia`) VALUES
(1, 'Interazione uomo-macchina: approcci avanzati'),
(2, 'Sociologia della conoscenza e delle reti'),
(3, 'Tecnologie Web: approcci avanzati'),
(4, 'Economia di internet'),
(5, 'Diritto delle ICT e dei media'),
(6, 'Marketing digitale'),
(7, 'Metodi digitali per la ricerca sociale'),
(8, 'Social Media Management'),
(9, 'Sistemi mediali e ICT'),
(10, 'Web sicuro e personalizzato'),
(11, 'Design of interactive system'),
(12, 'Programmazione mobile: Android'),
(14, 'Green Economy e tecnologie digitali'),
(15, 'Management della comunicazione'),
(16, 'Psicologia cognitiva e del lavoro'),
(17, 'Innovazione sociale');

-- --------------------------------------------------------

--
-- Struttura della tabella `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `subject` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `post`
--

INSERT INTO `post` (`id`, `user`, `subject`, `content`, `title`) VALUES
(48, 'Ilaria', 4, 'Ciao a tutti ragazzi! Oggi sono molto combattuto.. l\'esame di economia non è andato come mi aspettavo. Lo ridarò nel prossimo appello ma nel frattempo mandatemi tante vibes positive :)', 'Economia'),
(49, 'Ilaria', 3, 'Salve :)\nVi ricordo che la lezione di domani si terrà in aula C1.\nBuona serata ragazzi', 'Info corso Tecnologie Web'),
(53, 'Ilaria', 2, 'Tra qualche giorno ho l\'esame di sociologia... sono in ansia siccome non so cosa aspettarmi :(\nSpero vada tutto bene.\nUn saluto a voi tutti', 'Esameeeee');

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`id`, `nickname`, `password`, `email`) VALUES
(2, 'Ilaria', '1234', 'test@test.com');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `materie`
--
ALTER TABLE `materie`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indici per le tabelle `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`),
  ADD UNIQUE KEY `AK_User_email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `materie`
--
ALTER TABLE `materie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
