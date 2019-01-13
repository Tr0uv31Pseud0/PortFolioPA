-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 13, 2019 at 12:28 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogpa`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Auteur` int(11) NOT NULL,
  `ID_Cat` int(11) NOT NULL,
  `Titre` varchar(10) NOT NULL,
  `Contenu` text NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Auteur` (`ID_Auteur`),
  KEY `ID_Cat` (`ID_Cat`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`ID`, `ID_Auteur`, `ID_Cat`, `Titre`, `Contenu`, `Date`) VALUES
(27, 3, 1, 'Article 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean convallis mauris in sapien tempus, sed finibus ipsum mattis. Integer dui mi, sagittis ut sagittis eu, laoreet sit amet leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec id viverra purus. Donec aliquet tortor nec justo tincidunt dignissim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse euismod ante eu diam sollicitudin, pulvinar euismod lectus blandit. Fusce sapien orci, maximus quis accumsan ut, scelerisque vel diam. Suspendisse potenti. Integer tincidunt sit amet turpis efficitur ultrices. Aenean sed nulla eu lectus bibendum mattis et nec orci. Phasellus non convallis augue. Aenean non velit sed leo gravida tristique. Donec lacinia leo in nisi pulvinar interdum at ac sem. In nec est lectus.\r\n\r\n', '2018-12-20'),
(28, 2, 2, 'Article 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean convallis mauris in sapien tempus, sed finibus ipsum mattis. Integer dui mi, sagittis ut sagittis eu, laoreet sit amet leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec id viverra purus. Donec aliquet tortor nec justo tincidunt dignissim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse euismod ante eu diam sollicitudin, pulvinar euismod lectus blandit. Fusce sapien orci, maximus quis accumsan ut, scelerisque vel diam. Suspendisse potenti. Integer tincidunt sit amet turpis efficitur ultrices. Aenean sed nulla eu lectus bibendum mattis et nec orci. Phasellus non convallis augue. Aenean non velit sed leo gravida tristique. Donec lacinia leo in nisi pulvinar interdum at ac sem. In nec est lectus.\r\n\r\n', '2018-12-20'),
(29, 1, 3, 'Article 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean convallis mauris in sapien tempus, sed finibus ipsum mattis. Integer dui mi, sagittis ut sagittis eu, laoreet sit amet leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec id viverra purus. Donec aliquet tortor nec justo tincidunt dignissim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse euismod ante eu diam sollicitudin, pulvinar euismod lectus blandit. Fusce sapien orci, maximus quis accumsan ut, scelerisque vel diam. Suspendisse potenti. Integer tincidunt sit amet turpis efficitur ultrices. Aenean sed nulla eu lectus bibendum mattis et nec orci. Phasellus non convallis augue. Aenean non velit sed leo gravida tristique. Donec lacinia leo in nisi pulvinar interdum at ac sem. In nec est lectus.\r\n\r\n', '2018-12-20'),
(30, 1, 2, 'Article 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean convallis mauris in sapien tempus, sed finibus ipsum mattis. Integer dui mi, sagittis ut sagittis eu, laoreet sit amet leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec id viverra purus. Donec aliquet tortor nec justo tincidunt dignissim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse euismod ante eu diam sollicitudin, pulvinar euismod lectus blandit. Fusce sapien orci, maximus quis accumsan ut, scelerisque vel diam. Suspendisse potenti. Integer tincidunt sit amet turpis efficitur ultrices. Aenean sed nulla eu lectus bibendum mattis et nec orci. Phasellus non convallis augue. Aenean non velit sed leo gravida tristique. Donec lacinia leo in nisi pulvinar interdum at ac sem. In nec est lectus.\r\n\r\n', '2018-12-20'),
(31, 2, 1, 'Article 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean convallis mauris in sapien tempus, sed finibus ipsum mattis. Integer dui mi, sagittis ut sagittis eu, laoreet sit amet leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec id viverra purus. Donec aliquet tortor nec justo tincidunt dignissim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse euismod ante eu diam sollicitudin, pulvinar euismod lectus blandit. Fusce sapien orci, maximus quis accumsan ut, scelerisque vel diam. Suspendisse potenti. Integer tincidunt sit amet turpis efficitur ultrices. Aenean sed nulla eu lectus bibendum mattis et nec orci. Phasellus non convallis augue. Aenean non velit sed leo gravida tristique. Donec lacinia leo in nisi pulvinar interdum at ac sem. In nec est lectus.\r\n\r\n', '2018-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `ID_Auteur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auteur`
--

INSERT INTO `auteur` (`ID_Auteur`, `Nom`) VALUES
(1, 'Hermione Granger'),
(2, 'Harry Potter'),
(3, 'Ron Weasley');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Cat` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`ID`, `Nom_Cat`) VALUES
(1, 'Films'),
(2, 'Musique'),
(3, 'Jeux Vidéos');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `Article_id` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(10) NOT NULL,
  `Contenu_Com` text NOT NULL,
  PRIMARY KEY (`Article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`Article_id`, `Pseudo`, `Contenu_Com`) VALUES
(27, 'Qqn', 'sum primis in faucibus. Donec id viverra purus. Donec aliquet tortor nec justo tincidunt dignissim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse euismod ante eu diam '),
(28, 'Qqn', 'nte eu diam sollicitudin, pulvinar euismod lectus blandit. Fusce sapien orci, maximus quis accumsan ut, scelerisque vel diam. Suspendisse potenti. Integer tincidunt sit amet turpis efficitur ultrices. Aenean sed nulla eu lectus bibendum mattis et nec orci. Phasellus non convallis augue. Aenean non velit sed leo gravida tristique. Donec lacinia leo in nisi pulvinar interdum at ac sem. In n'),
(30, 'Moi', 'C\'est vraiment intéressant ce que tu fais !'),
(31, 'Moi', 'jhgjhhggjgjhg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`ID_Auteur`) REFERENCES `auteur` (`ID_Auteur`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`ID_Cat`) REFERENCES `categorie` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
