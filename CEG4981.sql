-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2016 at 05:35 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CEG4981`
--

-- --------------------------------------------------------

--
-- Table structure for table `Department`
--

CREATE TABLE `Department` (
  `Dept_ID` int(6) UNSIGNED NOT NULL,
  `Dept_Name` varchar(30) NOT NULL,
  `Dept_Description` varchar(30) NOT NULL,
  `Manager_Num` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Department`
--

INSERT INTO `Department` (`Dept_ID`, `Dept_Name`, `Dept_Description`, `Manager_Num`) VALUES
(1, 'sdfsd', 'sdfsd', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `id` int(6) UNSIGNED NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `Middlename` varchar(30) NOT NULL,
  `Lastname` varchar(30) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Status` varchar(15) DEFAULT NULL,
  `Department` varchar(15) DEFAULT NULL,
  `Group_ID` varchar(15) DEFAULT NULL,
  `reg_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Groups`
--

CREATE TABLE `Groups` (
  `Group_ID` int(6) UNSIGNED NOT NULL,
  `Group_Name` varchar(30) NOT NULL,
  `Group_Description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `Member_id` varchar(30) NOT NULL,
  `Role_Name` varchar(30) NOT NULL,
  `Role_Description` varchar(50) NOT NULL,
  `Group_Number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`Member_id`, `Role_Name`, `Role_Description`, `Group_Number`) VALUES
('werwe', 'ewr', 'wer', 'werwer'),
('werwq', 'werwqer', 'werwer', 'werwer');

-- --------------------------------------------------------

--
-- Table structure for table `Text`
--

CREATE TABLE `Text` (
  `Text_ID` int(6) UNSIGNED NOT NULL,
  `Sender_Num` varchar(30) NOT NULL,
  `Recieve_Num` varchar(30) NOT NULL,
  `Text` varchar(200) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `Date_sent` date DEFAULT NULL,
  `Date_recieved` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Text`
--

INSERT INTO `Text` (`Text_ID`, `Sender_Num`, `Recieve_Num`, `Text`, `Status`, `Date_sent`, `Date_recieved`) VALUES
(1, 'sfwer', 'werwer', 'wer', '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `TM_Member_Of_Grp`
--

CREATE TABLE `TM_Member_Of_Grp` (
  `Member_ID` varchar(30) NOT NULL,
  `Group_ID` varchar(30) NOT NULL,
  `Member_StartingDate` date DEFAULT NULL,
  `Member_EndingDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Word_Filter`
--

CREATE TABLE `Word_Filter` (
  `Word` varchar(30) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Department`
--
ALTER TABLE `Department`
  ADD PRIMARY KEY (`Dept_ID`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Groups`
--
ALTER TABLE `Groups`
  ADD PRIMARY KEY (`Group_ID`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`Member_id`);

--
-- Indexes for table `Text`
--
ALTER TABLE `Text`
  ADD PRIMARY KEY (`Text_ID`);

--
-- Indexes for table `TM_Member_Of_Grp`
--
ALTER TABLE `TM_Member_Of_Grp`
  ADD PRIMARY KEY (`Member_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Department`
--
ALTER TABLE `Department`
  MODIFY `Dept_ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Groups`
--
ALTER TABLE `Groups`
  MODIFY `Group_ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Text`
--
ALTER TABLE `Text`
  MODIFY `Text_ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
