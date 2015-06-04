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
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `IDsal` int(11) NOT NULL AUTO_INCREMENT,
  `oznaka` varchar(45) COLLATE latin2_croatian_ci NOT NULL,
  `lokacija` varchar(85) COLLATE latin2_croatian_ci NOT NULL,
  `brm` int(11) NOT NULL,
  `irm` int(11) NOT NULL,
  PRIMARY KEY (`IDsal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`IDsal`, `oznaka`, `lokacija`, `brm`, `irm`) VALUES
(30, 'P-25', 'Paviljon Rašović', 60, 58),
(31, 'P-26', 'Paviljon Rašović', 80, 76),
(32, '60', 'ETF', 40, 40),
(33, 'Microsoft', 'RC', 25, 25);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
