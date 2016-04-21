-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2016 at 08:35 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `attivita`
--

CREATE TABLE `attivita` (
  `attivita_id` int(11) NOT NULL,
  `tipo_attivita` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `descrizione` text COLLATE latin1_general_ci,
  `data_inizio` date DEFAULT NULL,
  `data_fine` date DEFAULT NULL,
  `numero_ore` int(11) DEFAULT NULL,
  `docente_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `docenti`
--

CREATE TABLE `docenti` (
  `docente_id` int(11) NOT NULL,
  `username` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `nome` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `cognome` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `materia` varchar(16) COLLATE latin1_general_ci DEFAULT NULL,
  `data_nascita` date DEFAULT NULL,
  `tipo` tinyint(1) NOT NULL DEFAULT '2'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `docenti`
--

INSERT INTO `docenti` (`docente_id`, `username`, `password`, `nome`, `cognome`, `materia`, `data_nascita`, `tipo`) VALUES
(1, 'Castro', '$1$2$IOb0F2UJNr7bgs57NTZuU/', 'Adrian David', 'Castro Tenemaya', 'Informatica', '1997-04-29', 2);

-- --------------------------------------------------------

--
-- Table structure for table `studenti`
--

CREATE TABLE `studenti` (
  `matricola` int(11) NOT NULL,
  `username` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(128) COLLATE latin1_general_ci NOT NULL,
  `nome` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `cognome` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `codice_fiscale` varchar(16) COLLATE latin1_general_ci NOT NULL,
  `data_nascita` date NOT NULL,
  `anno_prima_iscrizione` year(4) DEFAULT NULL,
  `email` varchar(128) COLLATE latin1_general_ci DEFAULT NULL,
  `telefono_fisso` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `telefono_cellulare` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `indirizzo_residenza` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `comune_residenza` varchar(32) COLLATE latin1_general_ci DEFAULT NULL,
  `cap` int(6) NOT NULL,
  `tipo` tinyint(1) NOT NULL DEFAULT '1',
  `docente_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `studenti`
--

INSERT INTO `studenti` (`matricola`, `username`, `password`, `nome`, `cognome`, `codice_fiscale`, `data_nascita`, `anno_prima_iscrizione`, `email`, `telefono_fisso`, `telefono_cellulare`, `indirizzo_residenza`, `comune_residenza`, `cap`, `tipo`, `docente_id`) VALUES
(19903, 'CASTRO_19903', '$1$2$IOb0F2UJNr7bgs57NTZuU/', 'Adrian David', 'Castro Tenemaya', 'CSTDNECOSEVARIE', '1997-04-29', 2012, 'iallone32@gmail.com', '+39 038499443', '+39 3899991660', 'Via Marzotto 1', 'Mortara', 27036, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attivita`
--
ALTER TABLE `attivita`
  ADD PRIMARY KEY (`attivita_id`),
  ADD KEY `docente_id` (`docente_id`);

--
-- Indexes for table `docenti`
--
ALTER TABLE `docenti`
  ADD PRIMARY KEY (`docente_id`);

--
-- Indexes for table `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`matricola`),
  ADD KEY `docente_id` (`docente_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attivita`
--
ALTER TABLE `attivita`
  MODIFY `attivita_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `docenti`
--
ALTER TABLE `docenti`
  MODIFY `docente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `studenti`
--
ALTER TABLE `studenti`
  MODIFY `matricola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19904;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
