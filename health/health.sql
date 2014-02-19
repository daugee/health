-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2014 at 08:03 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `health`
--
CREATE DATABASE IF NOT EXISTS `health` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `health`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor` varchar(45) NOT NULL,
  `patient` varchar(45) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

CREATE TABLE IF NOT EXISTS `bed` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `bedno` varchar(10) NOT NULL,
  `bedtype` varchar(10) NOT NULL,
  `description` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bed`
--

INSERT INTO `bed` (`id`, `bedno`, `bedtype`, `description`) VALUES
(1, '45', 'ward', 'general ward free be'),
(2, '1234', 'cabin', 'cabin free bed'),
(3, '1234', 'cabin', 'cabin free bed'),
(4, '1234', 'cabin', 'cabin free bed'),
(5, '90094', 'other', '4klefjlr'),
(6, '78', 'icu', 'icu ward');

-- --------------------------------------------------------

--
-- Table structure for table `bedallotment`
--

CREATE TABLE IF NOT EXISTS `bedallotment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bedno` varchar(10) NOT NULL,
  `patient` varchar(20) NOT NULL,
  `allotmentdate` date NOT NULL,
  `dischargedate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bedallotment`
--

INSERT INTO `bedallotment` (`id`, `bedno`, `patient`, `allotmentdate`, `dischargedate`) VALUES
(1, '45', 'Eriko', '0000-00-00', '0000-00-00'),
(2, '90094', 'daudi', '0000-00-00', '0000-00-00'),
(3, '90094', 'naomi', '2014-01-18', '2014-01-17'),
(4, '78', 'David', '2014-01-10', '2014-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank`
--

CREATE TABLE IF NOT EXISTS `blood_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(10) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  `donationdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `blood_bank`
--

INSERT INTO `blood_bank` (`id`, `name`, `email`, `address`, `phone`, `gender`, `age`, `bloodgroup`, `donationdate`) VALUES
(1, '0', 'daudierick1@gmail.co', '59 njoro', '0987654', 'female', 78, 'AB-', '2014-01-04'),
(2, 'Dau', 'diditini@yahoo.com', '45', '09308092', 'male', 89, 'B-', '2014-01-04'),
(3, 'kigen', 'kig@gmail.com', '89 keya', '00989034', 'female', 45, 'O-', '2014-04-24'),
(4, 'izoo', 'izo@gmail.com', '58 kimandura', '098787843', 'female', 90, 'AB-', '2014-01-04'),
(5, 'Njoroge', 'nj@gmail.com', '89 nairobi', '0713890890', 'female', 23, 'B-', '2014-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `nurse_report`
--

CREATE TABLE IF NOT EXISTS `nurse_report` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `doctor` varchar(10) NOT NULL,
  `patient` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `nurse_report`
--

INSERT INTO `nurse_report` (`id`, `type`, `description`, `doctor`, `patient`, `date`) VALUES
(1, 'death', 'surgery', 'kamau', 'naomi', '2014-01-24'),
(2, 'birth', 'birth', 'dau', 'daudi', '2014-01-08'),
(3, 'operation', 'surgery', 'Magoha', 'naomi', '2014-01-01'),
(4, 'other', 'maternity', 'wewe', 'naomi', '2014-01-16'),
(5, 'birth', 'birth', 'Kevin', 'naomi', '2014-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` int(15) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `birthdate` date NOT NULL,
  `age` int(10) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `email`, `password`, `address`, `phone`, `sex`, `birthdate`, `age`, `bloodgroup`) VALUES
(20, 'Eriko', 'dau@gmail.com', '123456', 'wertry', 710852751, 'female', '1990-01-01', 23, 'O+'),
(21, 'daudi', 'dauwe@gmail.com', '23452134', 'huyunday', 319490893, 'male', '1989-12-12', 22, 'A+'),
(22, 'naomi', 'admin@gmail.com', '123456789', '57 njoro', 843279043, 'female', '1997-09-09', 24, 'AB+'),
(23, 'laura', 'lau@gmail.com', '12345678', 'njoro', 717301551, 'female', '1991-06-26', 22, 'B+'),
(24, 'David', 'dau@gmail.com', 'eriko1234', '59 njoro', 710852751, 'male', '2014-01-09', 22, 'AB-');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
