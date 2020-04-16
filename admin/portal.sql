-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2020 at 08:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `captiveportal`
--
CREATE DATABASE IF NOT EXISTS `captiveportal` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `captiveportal`;

-- --------------------------------------------------------

--
-- Table structure for table `agroup`
--

CREATE TABLE `agroup` (
  `ID` int(11) NOT NULL,
  `gname` text NOT NULL,
  `priv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agroup`
--

INSERT INTO `agroup` (`ID`, `gname`, `priv`) VALUES
(1, 'Admin', 'yes'),
(2, 'portal', 'mod');

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `ID` int(11) NOT NULL,
  `ip` text NOT NULL,
  `MAC` text NOT NULL,
  `serial` text NOT NULL,
  `status` text NOT NULL,
  `rdate` text NOT NULL,
  `ldate` text NOT NULL,
  `pack` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pack`
--

CREATE TABLE `pack` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `uspeed` text NOT NULL,
  `dspeed` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pack`
--

INSERT INTO `pack` (`ID`, `Name`, `uspeed`, `dspeed`) VALUES
(1, 'Tier1', '2', '6'),
(2, 'Tier2', '4', '12');

-- --------------------------------------------------------

--
-- Table structure for table `padmin`
--

CREATE TABLE `padmin` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `gname` text NOT NULL,
  `phone` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `zone` text NOT NULL,
  `ipblocks` text NOT NULL,
  `routerip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `serial` text NOT NULL,
  `Name` text NOT NULL,
  `password` text NOT NULL,
  `Address` text NOT NULL,
  `Phone` text NOT NULL,
  `Email` text NOT NULL,
  `regdate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agroup`
--
ALTER TABLE `agroup`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pack`
--
ALTER TABLE `pack`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `padmin`
--
ALTER TABLE `padmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agroup`
--
ALTER TABLE `agroup`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pack`
--
ALTER TABLE `pack`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `padmin`
--
ALTER TABLE `padmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

