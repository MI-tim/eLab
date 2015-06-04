-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2015 at 03:17 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `elab`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `IDkor` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(45) COLLATE latin2_croatian_ci NOT NULL,
  `prezime` varchar(45) COLLATE latin2_croatian_ci NOT NULL,
  `email` varchar(45) COLLATE latin2_croatian_ci NOT NULL,
  `password` char(255) COLLATE latin2_croatian_ci NOT NULL,
  `privilegija` enum('Korisnik','Moderator','Administrator') COLLATE latin2_croatian_ci NOT NULL,
  PRIMARY KEY (`IDkor`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci AUTO_INCREMENT=78 ;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`IDkor`, `ime`, `prezime`, `email`, `password`, `privilegija`) VALUES
(77, 'Miloš', 'Pivić', 'pm100482d@student.etf.rs', '$2y$10$QMqTnl1ZX8RlWF9rJU7J9uWn4AiVoAcYkGnVxGQ0g0/LDBtHdFCwy', 'Administrator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
