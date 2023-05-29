-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 29, 2023 alle 11:47
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
-- Database: `hw1`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `id` int(11) NOT NULL,
  `utente` int(11) NOT NULL,
  `pacchetti_c` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `carrello`
--

INSERT INTO `carrello` (`id`, `utente`, `pacchetti_c`) VALUES
(87, 20, 10),
(88, 20, 6),
(89, 20, 6),
(90, 20, 2),
(91, 20, 2),
(92, 20, 2),
(93, 20, 6);

-- --------------------------------------------------------

--
-- Struttura della tabella `citta`
--

CREATE TABLE `citta` (
  `id` int(11) NOT NULL,
  `titolo` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `citta`
--

INSERT INTO `citta` (`id`, `titolo`, `img`) VALUES
(1, 'Catania', 'images/catania.png'),
(2, 'Palermo', 'images/palermo.png'),
(3, 'Siracusa', 'images/siracusa.png'),
(4, 'Noto', 'images/noto.png'),
(5, 'Taormina', 'images/taormina.png'),
(6, 'Agrigento', 'images/agrigento.png'),
(7, 'Isole Eolie', 'images/eolie.png'),
(8, 'Trapani', 'images/trapani.png'),
(9, 'Isole Egadi', 'images/egadi.png');

-- --------------------------------------------------------

--
-- Struttura della tabella `pacchetti`
--

CREATE TABLE `pacchetti` (
  `id` int(11) NOT NULL,
  `citta` int(11) NOT NULL,
  `ora_partenza` varchar(255) NOT NULL,
  `prezzo` float NOT NULL,
  `giorno` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `pacchetti`
--

INSERT INTO `pacchetti` (`id`, `citta`, `ora_partenza`, `prezzo`, `giorno`) VALUES
(2, 1, '09:00', 20, '2023-06-29'),
(3, 1, '09:00', 20, '2023-11-01'),
(4, 1, '09:00', 20, '2023-10-05'),
(5, 1, '09:00', 20, '2023-08-23'),
(6, 2, '07:00', 35, '2023-08-01'),
(7, 2, '07:00', 35, '2023-09-02'),
(8, 2, '07:00', 35, '2023-10-03'),
(9, 2, '07:00', 35, '2023-11-04'),
(10, 3, '8:00', 29, '2023-08-05'),
(11, 3, '8:00', 29, '2023-09-06'),
(12, 3, '8:00', 29, '2023-10-07'),
(13, 3, '8:00', 29, '2023-11-08'),
(14, 4, '07:15', 25, '2023-08-09'),
(15, 4, '07:15', 25, '2023-09-10'),
(16, 4, '07:15', 25, '2023-10-11'),
(17, 4, '07:15', 25, '2023-11-12'),
(18, 5, '8:30', 28, '2023-08-13'),
(19, 5, '8:30', 28, '2023-09-14'),
(20, 5, '8:30', 28, '2023-10-15'),
(21, 5, '8:30', 28, '2023-11-16'),
(38, 6, '07:45', 32, '2023-08-17'),
(39, 6, '07:45', 32, '2023-09-18'),
(40, 6, '07:45', 32, '2023-10-19'),
(41, 6, '07:45', 32, '2023-11-20'),
(42, 7, '06:45', 59, '2023-08-21'),
(43, 7, '06:45', 59, '2023-09-22'),
(44, 7, '06:45', 59, '2023-10-23'),
(45, 7, '06:45', 59, '2023-11-24'),
(46, 8, '07:00', 39, '2023-08-25'),
(47, 8, '07:00', 39, '2023-09-26'),
(48, 8, '07:00', 39, '2023-10-27'),
(49, 8, '07:00', 39, '2023-11-28'),
(50, 9, '06:45', 48, '2023-08-29'),
(51, 9, '06:45', 48, '2023-09-30'),
(52, 9, '06:45', 48, '2023-10-01'),
(53, 9, '06:45', 48, '2023-11-02');

-- --------------------------------------------------------

--
-- Struttura della tabella `recensioni`
--

CREATE TABLE `recensioni` (
  `id` int(11) NOT NULL,
  `voto` int(11) NOT NULL,
  `id_recensore` int(11) DEFAULT NULL,
  `titolo` varchar(100) NOT NULL,
  `recensione` varchar(1500) NOT NULL,
  `utente` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `recensioni`
--

INSERT INTO `recensioni` (`id`, `voto`, `id_recensore`, `titolo`, `recensione`, `utente`) VALUES
(12, 5, 20, 'PACCHETTO SIRACUSA TOP!', 'Ho visitato Siracusa giorno 24/05/2023 con i ragazzi di SicilyTravel e oltre ad essere bravissimi nelle spiegazioni, il tour Ã¨ stato molto soddisfacente e loro sono molto simpatici! Vi ricontatterÃ² sicuramente per altri tour!', 'sofia');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id`, `username`, `password`, `mail`) VALUES
(20, 'sofia', 'dc49af63f6f89daf27f6c673b32930dc', 'sofia@gmail.com');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`id`),
  ADD KEY `xutente` (`utente`),
  ADD KEY `xpacchetti` (`pacchetti_c`);

--
-- Indici per le tabelle `citta`
--
ALTER TABLE `citta`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `pacchetti`
--
ALTER TABLE `pacchetti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `citta` (`citta`);

--
-- Indici per le tabelle `recensioni`
--
ALTER TABLE `recensioni`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carrello`
--
ALTER TABLE `carrello`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT per la tabella `citta`
--
ALTER TABLE `citta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `pacchetti`
--
ALTER TABLE `pacchetti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT per la tabella `recensioni`
--
ALTER TABLE `recensioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `carrello_ibfk_1` FOREIGN KEY (`utente`) REFERENCES `utente` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carrello_ibfk_2` FOREIGN KEY (`pacchetti_c`) REFERENCES `pacchetti` (`id`);

--
-- Limiti per la tabella `pacchetti`
--
ALTER TABLE `pacchetti`
  ADD CONSTRAINT `pacchetti_ibfk_1` FOREIGN KEY (`citta`) REFERENCES `citta` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
