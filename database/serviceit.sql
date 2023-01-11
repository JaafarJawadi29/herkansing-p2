-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 dec 2022 om 14:10
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
-- Tabelstructuur voor tabel `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `is_company` tinyint(1) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `password` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `customer`
--

INSERT INTO `customer` (`email`, `first_name`, `last_name`, `is_company`, `phone_number`, `password`) VALUES
('jaafar@gmail.com', 'Jaafar', 'Jawadi', 0, 687227481, 'jajajaja');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `password` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `employee`
--

INSERT INTO `employee` (`email`, `first_name`, `last_name`, `phone_number`, `password`) VALUES
('henk@admin.com', 'Henk', 'Steen', 686227481, 'jajajaja');

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

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `warranty_service`
--

DROP TABLE IF EXISTS `warranty_service`;
CREATE TABLE `warranty_service` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`);

--
-- Indexen voor tabel `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`email`);

--
-- Indexen voor tabel `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `customer_email` (`customer_email`),
  ADD KEY `employee_email` (`employee_email`);

--
-- Indexen voor tabel `warranty_service`
--
ALTER TABLE `warranty_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `warranty_service`
--
ALTER TABLE `warranty_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`customer_email`) REFERENCES `customer` (`email`),
  ADD CONSTRAINT `service_ibfk_2` FOREIGN KEY (`employee_email`) REFERENCES `employee` (`email`);

--
-- Beperkingen voor tabel `warranty_service`
--
ALTER TABLE `warranty_service`
  ADD CONSTRAINT `warranty_service_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
