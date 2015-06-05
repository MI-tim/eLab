-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2015 at 02:51 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

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
-- Table structure for table `garancije`
--

CREATE TABLE IF NOT EXISTS `garancije` (
  `IDgar` int(11) NOT NULL,
  `IDuredj` int(11) NOT NULL,
  `datum` date NOT NULL,
  `trajanje` date NOT NULL,
  `prodavac` varchar(30) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `garancija` tinyint(1) NOT NULL,
  `donator` varchar(30) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `cena` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `izlazi`
--

CREATE TABLE IF NOT EXISTS `izlazi` (
  `IDiz` int(11) NOT NULL,
  `IDuredj` int(11) NOT NULL,
  `kategorija` varchar(20) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komponenete`
--

CREATE TABLE IF NOT EXISTS `komponenete` (
  `IDkomp` int(11) NOT NULL,
  `IDuredj` int(11) NOT NULL,
  `kategorija` varchar(20) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `IDkor` int(11) NOT NULL,
  `ime` varchar(45) COLLATE latin2_croatian_ci NOT NULL,
  `prezime` varchar(45) COLLATE latin2_croatian_ci NOT NULL,
  `email` varchar(45) COLLATE latin2_croatian_ci NOT NULL,
  `password` char(255) COLLATE latin2_croatian_ci NOT NULL,
  `privilegija` enum('Korisnik','Moderator','Administrator') COLLATE latin2_croatian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`IDkor`, `ime`, `prezime`, `email`, `password`, `privilegija`) VALUES
(30, 'jelisaveta', 'markovic', 'mj143038m@student.etf.rs', '$2y$10$HQWozeqjkVuLZl8eZzOGtO2HnPhCB2Mx8mieHh5jfmXmnu6KKxPYG', 'Korisnik'),
(32, 'milos', 'pivic', 'pm100482d@student.etf.rs', '$2y$10$S/UAxetKbPH5z6gge/n2se6MFnNVPzMgHFM1Ku2V1dDbwukZQ8Qfy', 'Administrator'),
(33, 'Isidora', 'Todosic', 'admin@etf.rs', 'admin', 'Administrator'),
(34, 'Milos', 'Teodosic', 'mod@etf.rs', 'mod', 'Moderator'),
(42, 'sonja', 'sonjic', 'laptopmoj@etf.rs', 'lap', 'Korisnik'),
(43, 'Isi', 'Ja', 'ti100332d@student.etf.rs', '$2y$10$5LyJl4J0kLd7iXxQzIVgsuvZkMxpfn1Qs/Rg5VqzJBblDHd8UktMa', 'Korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `kucista`
--

CREATE TABLE IF NOT EXISTS `kucista` (
  `IDkuc` int(11) NOT NULL,
  `IDuredj` int(11) NOT NULL,
  `IDkomp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `radna_mesta`
--

CREATE TABLE IF NOT EXISTS `radna_mesta` (
  `IDrm` int(11) NOT NULL,
  `IDsal` int(11) NOT NULL,
  `IDuredj` int(11) NOT NULL,
  `oznaka` varchar(3) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `ispravnost` tinyint(1) NOT NULL,
  `qrcode` varchar(30) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `radna_mesta`
--

INSERT INTO `radna_mesta` (`IDrm`, `IDsal`, `IDuredj`, `oznaka`, `ispravnost`, `qrcode`) VALUES
(2, 3, 1, 'RM1', 1, 'qrqrqrqrq'),
(3, 3, 2, 'RM2', 1, 'rqrqrqrq');

-- --------------------------------------------------------

--
-- Table structure for table `rashodovani`
--

CREATE TABLE IF NOT EXISTS `rashodovani` (
  `IDras` int(11) NOT NULL,
  `datum` date NOT NULL,
  `napomena` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `IDsal` int(11) NOT NULL,
  `oznaka` varchar(45) COLLATE latin2_croatian_ci NOT NULL,
  `lokacija` varchar(85) COLLATE latin2_croatian_ci NOT NULL,
  `brm` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`IDsal`, `oznaka`, `lokacija`, `brm`) VALUES
(3, 'P-80', 'Šangaj', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ulazi`
--

CREATE TABLE IF NOT EXISTS `ulazi` (
  `IDul` int(11) NOT NULL,
  `IDuredj` int(11) NOT NULL,
  `kategorija` varchar(20) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uredjaji`
--

CREATE TABLE IF NOT EXISTS `uredjaji` (
  `IDuredj` int(11) NOT NULL,
  `proizvodjac` varchar(30) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `model` varchar(20) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `oznaka` varchar(20) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `ispravnost` tinyint(1) NOT NULL,
  `testiran` tinyint(1) NOT NULL,
  `rashodovan` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uredjaji`
--

INSERT INTO `uredjaji` (`IDuredj`, `proizvodjac`, `model`, `oznaka`, `ispravnost`, `testiran`, `rashodovan`) VALUES
(1, 'Lenovo', 'Z570', 'blablabla465145', 1, 1, 0),
(2, 'Alcatel', 'OneTouch', 'IdolMini', 1, 1, 0),
(3, 'LG', 'tv', '5135135', 1, 0, 0),
(4, 'SBB', 'D3', 'digital', 1, 1, 0),
(5, 'Samsung', 'tv', 'drugi', 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `garancije`
--
ALTER TABLE `garancije`
  ADD PRIMARY KEY (`IDgar`,`IDuredj`), ADD KEY `IDuredj` (`IDuredj`);

--
-- Indexes for table `izlazi`
--
ALTER TABLE `izlazi`
  ADD PRIMARY KEY (`IDiz`,`IDuredj`), ADD KEY `IDuredj` (`IDuredj`);

--
-- Indexes for table `komponenete`
--
ALTER TABLE `komponenete`
  ADD PRIMARY KEY (`IDkomp`,`IDuredj`), ADD KEY `IDuredj` (`IDuredj`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`IDkor`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `kucista`
--
ALTER TABLE `kucista`
  ADD PRIMARY KEY (`IDkuc`,`IDuredj`,`IDkomp`), ADD KEY `IDuredj` (`IDuredj`), ADD KEY `IDkomp` (`IDkomp`);

--
-- Indexes for table `radna_mesta`
--
ALTER TABLE `radna_mesta`
  ADD PRIMARY KEY (`IDrm`,`IDsal`), ADD KEY `IDsal` (`IDsal`), ADD KEY `IDuredj` (`IDuredj`);

--
-- Indexes for table `rashodovani`
--
ALTER TABLE `rashodovani`
  ADD PRIMARY KEY (`IDras`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`IDsal`);

--
-- Indexes for table `ulazi`
--
ALTER TABLE `ulazi`
  ADD PRIMARY KEY (`IDul`,`IDuredj`), ADD KEY `IDuredj` (`IDuredj`);

--
-- Indexes for table `uredjaji`
--
ALTER TABLE `uredjaji`
  ADD PRIMARY KEY (`IDuredj`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `garancije`
--
ALTER TABLE `garancije`
  MODIFY `IDgar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `izlazi`
--
ALTER TABLE `izlazi`
  MODIFY `IDiz` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komponenete`
--
ALTER TABLE `komponenete`
  MODIFY `IDkomp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `IDkor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `kucista`
--
ALTER TABLE `kucista`
  MODIFY `IDkuc` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `radna_mesta`
--
ALTER TABLE `radna_mesta`
  MODIFY `IDrm` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rashodovani`
--
ALTER TABLE `rashodovani`
  MODIFY `IDras` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `IDsal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ulazi`
--
ALTER TABLE `ulazi`
  MODIFY `IDul` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uredjaji`
--
ALTER TABLE `uredjaji`
  MODIFY `IDuredj` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `garancije`
--
ALTER TABLE `garancije`
ADD CONSTRAINT `garancije_ibfk_1` FOREIGN KEY (`IDuredj`) REFERENCES `uredjaji` (`IDuredj`);

--
-- Constraints for table `izlazi`
--
ALTER TABLE `izlazi`
ADD CONSTRAINT `izlazi_ibfk_1` FOREIGN KEY (`IDuredj`) REFERENCES `uredjaji` (`IDuredj`);

--
-- Constraints for table `komponenete`
--
ALTER TABLE `komponenete`
ADD CONSTRAINT `komponenete_ibfk_1` FOREIGN KEY (`IDuredj`) REFERENCES `uredjaji` (`IDuredj`);

--
-- Constraints for table `kucista`
--
ALTER TABLE `kucista`
ADD CONSTRAINT `kucista_ibfk_1` FOREIGN KEY (`IDuredj`) REFERENCES `uredjaji` (`IDuredj`),
ADD CONSTRAINT `kucista_ibfk_2` FOREIGN KEY (`IDkomp`) REFERENCES `komponenete` (`IDkomp`);

--
-- Constraints for table `radna_mesta`
--
ALTER TABLE `radna_mesta`
ADD CONSTRAINT `radna_mesta_ibfk_1` FOREIGN KEY (`IDsal`) REFERENCES `sale` (`IDsal`),
ADD CONSTRAINT `radna_mesta_ibfk_2` FOREIGN KEY (`IDuredj`) REFERENCES `uredjaji` (`IDuredj`);

--
-- Constraints for table `ulazi`
--
ALTER TABLE `ulazi`
ADD CONSTRAINT `ulazi_ibfk_1` FOREIGN KEY (`IDuredj`) REFERENCES `uredjaji` (`IDuredj`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
