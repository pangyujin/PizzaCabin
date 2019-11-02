-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2019 at 12:51 AM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `f34ee`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

CREATE TABLE IF NOT EXISTS `project_user` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` int(30) NOT NULL,
  `addr` varchar(60) NOT NULL,
  `postal` int(10) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `project_user`
--

INSERT INTO `project_user` (`ID`, `email`, `password`, `name`, `phone`, `addr`, `postal`) VALUES
(13, 'user1@test.com', 'e10adc3949ba59abbe56e057f20f883e', 'user1', 12345678, 'address line 1\r\naddress line 2\r\naddress line 3', 123456),
(15, 'pang@test.com', '6b1d24d57fc43f3a5bb8570a56afbc0c', 'Pang_Yujin', 12341234, 'NTU Hall 2\r\nBlock 1-1-1\r\n41 Student Walk\r\n', 639549);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
