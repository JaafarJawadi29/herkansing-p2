-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 jan 2023 om 22:05
-- Serverversie: 10.4.27-MariaDB
-- PHP-versie: 8.2.0

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

--
-- Gegevens worden geëxporteerd voor tabel `employee`
--

INSERT INTO `employee` (`employee_id`, `first_name`, `last_name`, `email`, `employee_type`, `password`) VALUES
(3, 'Gerjan', 'van Oenen', 'gerjan.van.oenen@nhlstenden.com', 'employee', '$2y$10$yzphsXa5kOWna8UCsgQvb.71psOSbaQiOzFti.q0BIFwIFA.5NIRK'),
(4, 'Jan', 'Alleman', 'jantje@outlook.com', 'admin', '$2y$10$yzphsXa5kOWna8UCsgQvb.71psOSbaQiOzFti.q0BIFwIFA.5NIRK');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
