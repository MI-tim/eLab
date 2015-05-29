-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2015 at 12:21 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`IDkor`, `ime`, `prezime`, `email`, `password`, `privilegija`) VALUES
(30, 'jelisaveta', 'markovic', 'mj143038m@student.etf.rs', '$2y$10$HQWozeqjkVuLZl8eZzOGtO2HnPhCB2Mx8mieHh5jfmXmnu6KKxPYG', 'Korisnik'),
(32, 'milos', 'pivic', 'pm100482d@student.etf.rs', '$2y$10$S/UAxetKbPH5z6gge/n2se6MFnNVPzMgHFM1Ku2V1dDbwukZQ8Qfy', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `login_attemps`
--

CREATE TABLE IF NOT EXISTS `login_attemps` (
  `IDuser` int(11) NOT NULL,
  `time` varchar(30) COLLATE latin2_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `IDsal` int(11) NOT NULL AUTO_INCREMENT,
  `oznaka` varchar(45) COLLATE latin2_croatian_ci NOT NULL,
  `lokacija` varchar(85) COLLATE latin2_croatian_ci NOT NULL,
  `brm` int(11) NOT NULL,
  PRIMARY KEY (`IDsal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`IDsal`, `oznaka`, `lokacija`, `brm`) VALUES
(3, 'P-80', 'Šangaj', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
