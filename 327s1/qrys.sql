-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2012 at 02:00 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `autos`
--

CREATE DATABASE `autos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `autos`;

CREATE USER 'caruser'@'localhost' IDENTIFIED BY 'driver';
GRANT SELECT , INSERT , UPDATE , DELETE ON `autos` . * TO 'caruser'@'localhost';






-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `plate` char(6) NOT NULL,
  `make` varchar(20) NOT NULL,
  `model` varchar(10) NOT NULL,
  PRIMARY KEY (`plate`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`plate`, `make`, `model`) VALUES
('U782', 'TOFAS', 'HACI MURAT'),
('2', 'Toyota', 'Camry'),
('21', 'Q', 'W');
