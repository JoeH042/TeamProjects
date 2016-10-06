-- create and select the database
DROP DATABASE IF EXISTS rhodes;
CREATE DATABASE rhodes;
USE rhodes;  

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
  `Dept_ID` int(9) UNSIGNED NOT NULL,
  `Dept_Name` varchar(30) NOT NULL,
  `Dept_Description` text NOT NULL,
  `Manager_Num` int(9) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Department`
--

INSERT INTO `Department` (`Dept_ID`, `Dept_Name`, `Dept_Description`, `Manager_Num`) VALUES
(1, 'CEG', 'Computer Engineering', 3),
(2, 'CS', 'COMPUTER SCIENCE', 2),
(3, 'Mth', 'Mathmatics', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `id` int(9) UNSIGNED NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `Middlename` varchar(30) NOT NULL,
  `Lastname` varchar(30) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Phone` int(10) UNSIGNED DEFAULT NULL,
  `Status` set('Active','Inactive') DEFAULT NULL,
  `Department` int(9) UNSIGNED DEFAULT NULL,
  `Group_ID` int(9) UNSIGNED DEFAULT NULL,
  `Date_Start` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`id`, `Firstname`, `Middlename`, `Lastname`, `Email`, `Phone`, `Status`, `Department`, `Group_ID`, `Date_Start`) VALUES
(1, 'Mary', 'M', 'Brown', 'm.123@wright.edu', 937123456, 'Active', 1, 12, '2016-09-29 23:29:31'),
(2, 'Anna', '', 'Lee', 'A321@wright.edu', 937654321, 'Inactive', 1, 3, '2016-09-29 23:30:04'),
(3, 'Wendy', '', 'Meyer', 'W.156@wright.edu', 4294967295, 'Active', 1, 2, '2016-09-29 23:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `Groups`
--

CREATE TABLE `Groups` (
  `Group_ID` int(9) UNSIGNED NOT NULL,
  `Group_Name` varchar(30) NOT NULL,
  `Group_Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Groups`
--

INSERT INTO `Groups` (`Group_ID`, `Group_Name`, `Group_Description`) VALUES
(1, 'Fire', 'first responder of fire scene'),
(2, 'Chemecial', 'First responder of chemical scene');

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--


CREATE TABLE Login (
  User_ID       INT(8)         NOT NULL   AUTO_INCREMENT,
  User_Name     VARCHAR(80)    NOT NULL,
  User_Password	   	 VARCHAR(80),
  EM_ID       INT(8)         NOT NULL,
  PRIMARY KEY (User_ID),
  CONSTRAINT FOREIGN KEY (EM_ID) references Employee (id)
);
--
-- Dumping data for table `Login`
--



-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `Role_ID` int(9) UNSIGNED NOT NULL,
  `Role_Name` varchar(30) NOT NULL,
  `Role_Description` text,
  `Group_Number` int(9) UNSIGNED DEFAULT NULL,
  `Member_id` int(9) UNSIGNED DEFAULT NULL,
  `Role_Report_To` int(9) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`Role_ID`, `Role_Name`, `Role_Description`, `Group_Number`, `Member_id`, `Role_Report_To`) VALUES
(1, 'account', 'founding management', 1, 3, 5),
(2, 'Customer Service', 'Front end customer issue addressing', 3, 6, 9);

-- --------------------------------------------------------

--
-- Table structure for table `Text`
--

CREATE TABLE `Text` (
  `Text_ID` int(9) UNSIGNED NOT NULL,
  `Sender_Num` int(10) UNSIGNED NOT NULL,
  `Recieve_Num` int(10) UNSIGNED NOT NULL,
  `Text` text NOT NULL,
  `Status` set('Active','Inactive') DEFAULT NULL,
  `Date_sent` datetime DEFAULT NULL,
  `Date_recieved` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Text`
--

INSERT INTO `Text` (`Text_ID`, `Sender_Num`, `Recieve_Num`, `Text`, `Status`, `Date_sent`, `Date_recieved`) VALUES
(1, 937123456, 937654321, 'Hello. Need to meet up @ 10 pm in lobby.', 'Active', '2012-12-16 21:13:22', '2012-12-16 21:16:23'),
(2, 93745678, 45678937, 'Time to eat, urgent!!', 'Inactive', '2016-09-11 10:11:12', '2016-09-11 10:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `TM_Member_Of_Grp`
--

CREATE TABLE `TM_Member_Of_Grp` (
  `Member_ID` int(9) UNSIGNED NOT NULL,
  `Group_ID` int(9) UNSIGNED NOT NULL,
  `Member_StartingDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `Member_EndingDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TM_Member_Of_Grp`
--

INSERT INTO `TM_Member_Of_Grp` (`Member_ID`, `Group_ID`, `Member_StartingDate`, `Member_EndingDate`) VALUES
(3, 7, '2016-09-29 23:33:48', NULL),
(8, 3, '2016-09-29 23:33:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Word_Filter`
--

CREATE TABLE `Word_Filter` (
  `Word_ID` int(9) UNSIGNED NOT NULL,
  `Word` varchar(30) NOT NULL,
  `Status` set('Active','Inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Word_Filter`
--

INSERT INTO `Word_Filter` (`Word_ID`, `Word`, `Status`) VALUES
(1, 'a', 'Active'),
(2, 'the ', 'Active'),
(3, 'copy', 'Active'),
(4, 'roger', 'Active'),
(5, 'fire', 'Active'),
(6, 'move', 'Inactive'),
(7, 'find', 'Active'),
(8, 'chemical', 'Active'),
(9, 'dangerous', ''),
(10, 'dangerous', 'Active');

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
-- Indexes for table `Login`
--

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`Role_ID`);

--
-- Indexes for table `Text`
--
ALTER TABLE `Text`
  ADD PRIMARY KEY (`Text_ID`);

--
-- Indexes for table `TM_Member_Of_Grp`
--
ALTER TABLE `TM_Member_Of_Grp`
  ADD PRIMARY KEY (`Member_ID`,`Group_ID`);

--
-- Indexes for table `Word_Filter`
--
ALTER TABLE `Word_Filter`
  ADD PRIMARY KEY (`Word_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Department`
--
ALTER TABLE `Department`
  MODIFY `Dept_ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Groups`
--
ALTER TABLE `Groups`
  MODIFY `Group_ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `Role_ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Text`
--
ALTER TABLE `Text`
  MODIFY `Text_ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Word_Filter`
--
ALTER TABLE `Word_Filter`
  MODIFY `Word_ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
