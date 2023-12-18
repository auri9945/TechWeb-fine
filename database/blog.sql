-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 18, 2023 alle 12:30
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
-- Struttura della tabella `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `colore` char(10) NOT NULL,
  `content` longtext NOT NULL,
  `mipiace` int(11) NOT NULL DEFAULT 0,
  `nonmipiace` int(11) NOT NULL DEFAULT 0,
  `subjectreference` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `data`
--

INSERT INTO `data` (`id`, `title`, `colore`, `content`, `mipiace`, `nonmipiace`, `subjectreference`) VALUES
(9, 'titolo post', '', 'w la gena', 0, 0, 'interazione Uomo Macchina'),
(24, 'sa', '', 'ds', 0, 0, 'Diritto delle ict'),
(25, 'f', '', 'fe', 0, 0, 'interazione Uomo Macchina'),
(26, 'gz', '', 'gs', 0, 0, 'interazione Uomo Macchina'),
(27, 'titolo', '', 'dasdadad', 0, 0, 'Metodi digitali per la ricerca-sociale');

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
(1, 'Interazione uomo e macchina: approcci avanzati'),
(2, 'Sociologia della comunicazione e delle reti'),
(3, 'Tecnologia Web: approcci avanzati'),
(4, 'Economia di internet'),
(5, 'Diritto delle ICT'),
(6, 'Marketing digitale'),
(7, 'Metodi digitali per la ricerca sociale'),
(8, 'Social Media Management'),
(9, 'Sistemi mediali'),
(10, 'Web sicuro e personalizzato'),
(11, 'Design of interactive system'),
(12, 'Programmazione mobile: Android'),
(14, 'Green Economy e tecnologie digitali'),
(15, 'Management della comunicazione');

-- --------------------------------------------------------

--
-- Struttura della tabella `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `subjects` char(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `post`
--

INSERT INTO `post` (`id`, `user`, `subjects`, `content`) VALUES
(1, '@sdupalepaolo', 'Interazione uomo e macchina: approcci avanzati', 'prova 1'),
(2, '@sdupalepaoletto', 'Interazione uomo e macchina: approcci avanzati', 'prova 2'),
(3, '@sdupalepaolettino', 'Innovazione sociale', 'torino 2023 ovunque!');

-- --------------------------------------------------------

--
-- Struttura della tabella `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `subject`
--

INSERT INTO `subject` (`id`, `name`) VALUES
(1, 'Interazione Sociale'),
(2, 'Economia di Internet');

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
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `materie`
--
ALTER TABLE `materie`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`,`name`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT per la tabella `materie`
--
ALTER TABLE `materie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
