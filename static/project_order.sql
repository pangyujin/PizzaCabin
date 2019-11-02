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
-- Table structure for table `project_order`
--

CREATE TABLE IF NOT EXISTS `project_order` (
  `user_id` int(10) NOT NULL,
  `food_id` int(10) NOT NULL,
  `order_time` datetime NOT NULL,
  `qty` int(10) NOT NULL,
  `status` varchar(30) NOT NULL,
  `option_1` tinyint(1) NOT NULL,
  `option_2` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`,`food_id`,`order_time`),
  KEY `fk_order_food` (`food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_order`
--

INSERT INTO `project_order` (`user_id`, `food_id`, `order_time`, `qty`, `status`, `option_1`, `option_2`) VALUES
(13, 21, '2019-11-01 18:55:13', 1, 'processing', 1, 1),
(13, 25, '2019-11-01 18:55:13', 1, 'processing', 1, 0),
(13, 25, '2019-11-01 22:59:37', 1, 'processing', 0, 0),
(13, 29, '2019-11-01 22:59:37', 5, 'processing', 0, 1),
(13, 33, '2019-11-01 18:55:13', 2, 'processing', 0, 0),
(13, 34, '2019-11-01 22:59:37', 1, 'processing', 0, 0),
(13, 41, '2019-11-01 18:55:13', 3, 'processing', 0, 0),
(13, 45, '2019-11-01 22:59:37', 1, 'processing', 0, 0),
(15, 21, '2019-11-02 00:46:46', 1, 'processing', 1, 0),
(15, 28, '2019-11-02 00:46:46', 2, 'processing', 0, 1),
(15, 30, '2019-11-02 00:46:46', 3, 'processing', 1, 1),
(15, 32, '2019-11-02 00:46:46', 1, 'processing', 0, 0),
(15, 38, '2019-11-02 00:46:46', 2, 'processing', 0, 0),
(15, 46, '2019-11-02 00:46:46', 3, 'processing', 0, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_order`
--
ALTER TABLE `project_order`
  ADD CONSTRAINT `fk_order_food` FOREIGN KEY (`food_id`) REFERENCES `project_food` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order_user` FOREIGN KEY (`user_id`) REFERENCES `project_user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
