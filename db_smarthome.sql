-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Jul 2019 um 22:52
-- Server-Version: 10.1.38-MariaDB
-- PHP-Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `db_smarthome`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `activities`
--

CREATE TABLE `activities` (
  `ActivitiesID` int(11) NOT NULL,
  `ActivitiesName` varchar(50) NOT NULL,
  `Points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `activities`
--

INSERT INTO `activities` (`ActivitiesID`, `ActivitiesName`, `Points`) VALUES
(1, 'Staubsaugen', 15),
(2, 'Staubwischen', 10),
(3, 'Boden wischen', 20),
(4, 'Spiegel putzen', 12),
(6, 'test', 21);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ausgaben`
--

CREATE TABLE `ausgaben` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Geld` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `ausgaben`
--

INSERT INTO `ausgaben` (`ID`, `Name`, `Geld`) VALUES
(1, 'Karo', 33),
(2, 'Timo', 77);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `einkaufsliste`
--

CREATE TABLE `einkaufsliste` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `einkaufsliste`
--

INSERT INTO `einkaufsliste` (`ID`, `Name`, `Status`) VALUES
(5, 'Pizza', 'active'),
(9, 'Schokolade *-*', ''),
(10, 'Nudeln', 'active'),
(11, 'Salat', 'active');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `erreichtepunkte`
--

CREATE TABLE `erreichtepunkte` (
  `PunkteID` int(11) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `WasErledigt` varchar(100) NOT NULL,
  `Erledigt` datetime NOT NULL,
  `Punkte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `erreichtepunkte`
--

INSERT INTO `erreichtepunkte` (`PunkteID`, `UserName`, `WasErledigt`, `Erledigt`, `Punkte`) VALUES
(5, 'Karo', 'Staubsaugen', '2019-07-25 02:42:10', 15),
(6, 'Karo', 'Spiegel putzen', '2019-07-25 02:42:23', 12),
(7, 'Timo', 'Test Sache', '2019-07-25 00:00:00', 40),
(8, 'Karo', 'Staubsaugen', '2019-07-25 19:03:19', 15),
(9, 'Karo', 'Staubwischen', '2019-07-25 19:05:58', 10),
(10, 'Karo', 'Boden wischen', '2019-07-25 19:06:07', 20),
(11, 'Karo', 'test', '2019-07-27 02:51:37', 21);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `haushalt`
--

CREATE TABLE `haushalt` (
  `HaushaltID` int(11) NOT NULL,
  `f_room_ID` int(11) NOT NULL,
  `f_activites_ID` int(11) NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `haushalt`
--

INSERT INTO `haushalt` (`HaushaltID`, `f_room_ID`, `f_activites_ID`, `user`) VALUES
(41, 2, 1, ''),
(42, 2, 2, ''),
(43, 2, 3, ''),
(44, 2, 4, ''),
(65, 10, 1, ''),
(66, 10, 2, ''),
(67, 10, 3, ''),
(68, 10, 4, ''),
(69, 10, 6, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `room`
--

CREATE TABLE `room` (
  `roomID` int(11) NOT NULL,
  `roomName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `room`
--

INSERT INTO `room` (`roomID`, `roomName`) VALUES
(1, 'Staubsaugenn'),
(2, 'Schlafzimmer'),
(3, 'Badezimmer'),
(10, 'Flur');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tasks`
--

CREATE TABLE `tasks` (
  `TasksID` int(11) NOT NULL,
  `TaskName` varchar(100) NOT NULL,
  `deadline` datetime NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `tasks`
--

INSERT INTO `tasks` (`TasksID`, `TaskName`, `deadline`, `Status`) VALUES
(1, 'Einkaufen gehen', '2019-07-27 15:00:00', ' '),
(2, 'Training', '2019-07-24 18:00:00', ' '),
(3, 'GlÃ¼cklich sein', '0000-00-00 00:00:00', ' ');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`ID`, `userName`, `password`) VALUES
(1, 'Karo', 1234),
(2, 'Timo', 5678),
(8, 'Karo', 1234);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`ActivitiesID`);

--
-- Indizes für die Tabelle `ausgaben`
--
ALTER TABLE `ausgaben`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `einkaufsliste`
--
ALTER TABLE `einkaufsliste`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `erreichtepunkte`
--
ALTER TABLE `erreichtepunkte`
  ADD PRIMARY KEY (`PunkteID`);

--
-- Indizes für die Tabelle `haushalt`
--
ALTER TABLE `haushalt`
  ADD PRIMARY KEY (`HaushaltID`),
  ADD KEY `FKey_Rooms` (`f_room_ID`),
  ADD KEY `FKey_Activites` (`f_activites_ID`);

--
-- Indizes für die Tabelle `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomID`);

--
-- Indizes für die Tabelle `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`TasksID`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `activities`
--
ALTER TABLE `activities`
  MODIFY `ActivitiesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `ausgaben`
--
ALTER TABLE `ausgaben`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `einkaufsliste`
--
ALTER TABLE `einkaufsliste`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `erreichtepunkte`
--
ALTER TABLE `erreichtepunkte`
  MODIFY `PunkteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `haushalt`
--
ALTER TABLE `haushalt`
  MODIFY `HaushaltID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT für Tabelle `room`
--
ALTER TABLE `room`
  MODIFY `roomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `tasks`
--
ALTER TABLE `tasks`
  MODIFY `TasksID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `haushalt`
--
ALTER TABLE `haushalt`
  ADD CONSTRAINT `FKey_Activites` FOREIGN KEY (`f_activites_ID`) REFERENCES `activities` (`ActivitiesID`),
  ADD CONSTRAINT `FKey_Rooms` FOREIGN KEY (`f_room_ID`) REFERENCES `room` (`roomID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
