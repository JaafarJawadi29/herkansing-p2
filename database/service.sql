-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 15 dec 2022 om 13:15
-- Serverversie: 10.4.27-MariaDB
-- PHP-versie: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serviceit`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `employee_email` varchar(255) NOT NULL,
  `type` enum('webhosting','webdesign','repair','server space','server service') NOT NULL,
  `description` varchar(255) NOT NULL,
  `hardware_description` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('open','closed','in progress') NOT NULL,
  `contract` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `service`
--

INSERT INTO `service` (`service_id`, `customer_email`, `employee_email`, `type`, `description`, `hardware_description`, `date`, `status`, `contract`) VALUES
(1, 'jaafar@gmail.com', 'henk@admin.com', 'webdesign', 'design', 'none', '2022-12-15 12:55:00', 'open', 'contract');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `customer_email` (`customer_email`),
  ADD KEY `employee_email` (`employee_email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`customer_email`) REFERENCES `customer` (`email`),
  ADD CONSTRAINT `service_ibfk_2` FOREIGN KEY (`employee_email`) REFERENCES `employee` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
