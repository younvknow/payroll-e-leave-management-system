-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 10:09 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myown_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applyleave`
--

CREATE TABLE `applyleave` (
  `username` varchar(30) NOT NULL,
  `annual` int(5) NOT NULL,
  `sick` int(5) NOT NULL,
  `childcare` int(5) NOT NULL,
  `unpaid` int(5) NOT NULL,
  `reservist` int(5) NOT NULL,
  `datefrom` date NOT NULL,
  `dateto` date NOT NULL,
  `leaveday` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applyleave`
--

INSERT INTO `applyleave` (`username`, `annual`, `sick`, `childcare`, `unpaid`, `reservist`, `datefrom`, `dateto`, `leaveday`, `type`) VALUES
('mylee', 21, 15, 0, 0, 20, '0000-00-00', '0000-00-00', '', ''),
('myken', 21, 15, 6, 0, 20, '0000-00-00', '0000-00-00', '', ''),
('mytee', 21, 15, 6, 0, 20, '0000-00-00', '0000-00-00', '', ''),
('mylee', 0, 0, 0, 0, 0, '2022-02-19', '2022-02-19', 'Half day', 'Reservist'),
('mytee', 0, 0, 0, 0, 0, '2022-02-22', '2022-02-22', 'Full day', 'Unpaid'),
('mygwj', 21, 15, 6, 10, 20, '0000-00-00', '0000-00-00', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
