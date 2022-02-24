-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 10:13 AM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `full_name` varchar(30) NOT NULL,
  `nric` varchar(15) NOT NULL,
  `hpnum` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `salary` int(10) NOT NULL,
  `admin_rights` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`full_name`, `nric`, `hpnum`, `username`, `password`, `email`, `dob`, `salary`, `admin_rights`) VALUES
('Daryl Tee', 'S9125878E', 95578825, 'mytee', '$2y$10$kCcS/40SOuCg2wBCzgrHdOFbRNo/NrIYByej8IbIX4YfSb88lO9US', 'daryltee@myown.com.sg', '1991-11-05', 7000, 1),
('Ivy Hoo', 'S8552565B', 88526896, 'myhoo', '$2y$10$t8v9.I9DtzagLKJYkkLfG.4mNMPm/yZJJftc08zaiDWcJi2Bkz/qO', 'ivyhoo@myown.com.sg', '1985-06-22', 3000, 0),
('Ken Tan Ming Jie', 'S8748894J', 96363528, 'myken', '$2y$10$Cp0z5PZXcDPqMbZrxf6Tg.UN9hi7C22Oxkkai2fmlf1oqHUOsLwum', 'kentan@myown.com.sg', '1987-05-18', 5000, 1),
('Kenneth Goh Wei Jie', 'S9578211E', 99852156, 'mygwj', '$2y$10$GRhnYsEbxUoj2y4s.Gb4leJYafPDgvJGO4/qzmUOcd0t6xcNx1qre', 'kennethgoh@myown.com.sg', '1995-09-15', 3800, 0),
('Lee Ming', 'S9283188L', 98874585, 'mylee', '$2y$10$eppOENjOD87p/pKAotFEEeHwomrf.ucOBzJYFfPpEu16dLYp01/gW', 'leeming@myown.com.sg', '1992-02-16', 2800, 1),
('Sam Lee', 'S9716485M', 96335882, 'mysam', '$2y$10$lj0NEs69ukpeLtRYbXWcOO/zoXILfFmtJBOF5SrBet5zZ0teVLtIC', 'samlee@myown.com.sg', '1997-10-10', 7000, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
