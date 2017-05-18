-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2017 at 10:13 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testagile1`
--

-- --------------------------------------------------------

--
-- Table structure for table `at`
--

CREATE TABLE `at` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` longtext,
  `Status` varchar(30) DEFAULT NULL,
  `Type` varchar(30) DEFAULT NULL,
  `StoryID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `at`
--

INSERT INTO `at` (`ID`, `Name`, `Description`, `Status`, `Type`, `StoryID`, `customerID`) VALUES
(1, 'at1 - us9', 'AT1 body  ', 'Fail', 'automatic', 9, 2),
(2, 'at2 - us9 new name', 'AT2 of US9 description from list  ', 'Pass', 'automatic', 9, 2),
(3, 'at2 - us9 new name', '          new descritption\r\nAT3 from list', 'waiting', 'automatic', 1, 1),
(4, 'AT #2 for US1 test from index', 'this is the second AT from index for us1 from session', 'waiting', 'manual', 1, 1),
(5, 'ss', 'dd', 'waiting', 'manual', 10, 1),
(6, 'aa', 'xx', 'waiting', 'manual', 10, 1),
(7, 'ss', '`sd', 'waiting', 'manual', 15, 1),
(8, 'at1', 'at1 body', 'Pass', 'manual', 2, 2),
(9, 'at2', 'at2 body', 'Fail', 'manual', 2, 2),
(10, 'at3', 'at3 body', 'Complete', 'manual', 2, 2),
(11, 'at for us4', 'aaa', 'waiting', 'manual', 4, 2),
(12, 'at for usus', 'aaa', 'waiting', 'manual', 19, 2),
(13, 'At for US for testing', 'AT body', 'waiting', 'manual', 25, 2),
(14, 'At 2 for US for testing', 'AT body', 'waiting', 'manual', 25, 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Tel` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Location` varchar(30) DEFAULT NULL,
  `Rank` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `Name`, `Tel`, `Email`, `Location`, `Rank`) VALUES
(1, 'Reem', '055555555', 'r.binhezam@gmail.com', 'RUH', 1),
(2, 'Sara', '054444444', 's@f.com', 'JED', 1),
(3, 'Ahmed', '056666666', 'a@b.c', 'USA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Tel` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Location` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Details` longtext,
  `CustomerID` int(11) DEFAULT NULL,
  `DeveloperID` int(11) DEFAULT NULL,
  `ItemType` varchar(30) DEFAULT NULL,
  `StoryID` int(11) DEFAULT NULL,
  `ATID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iteration`
--

CREATE TABLE `iteration` (
  `ID` int(11) NOT NULL,
  `ActualSart` date DEFAULT NULL,
  `ActualComplete` date DEFAULT NULL,
  `releaseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iteration`
--

INSERT INTO `iteration` (`ID`, `ActualSart`, `ActualComplete`, `releaseID`) VALUES
(1, '2017-01-01', '2017-01-07', 1),
(2, '2017-01-08', '2017-05-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projectmanager`
--

CREATE TABLE `projectmanager` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Tel` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Location` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectmanager`
--

INSERT INTO `projectmanager` (`ID`, `Name`, `Tel`, `Email`, `Location`) VALUES
(1, 'Abdullah', '05111111', 'a@b.c', 'RUH'),
(2, 'Maha', '05333333', 'm@b.c', 'JED'),
(3, 'Tom', '08888888', 't@g.c', 'USA'),
(4, 'John', '06666666', 'j@g.c', 'UK'),
(5, 'Suliman', '04444444', 's@i.c', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `projectrelease`
--

CREATE TABLE `projectrelease` (
  `ID` int(11) NOT NULL,
  `ActualStart` date DEFAULT NULL,
  `ActualComplete` date DEFAULT NULL,
  `PlannedStart` date DEFAULT NULL,
  `PlannedComplete` date DEFAULT NULL,
  `OwnerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projectrelease`
--

INSERT INTO `projectrelease` (`ID`, `ActualStart`, `ActualComplete`, `PlannedStart`, `PlannedComplete`, `OwnerID`) VALUES
(1, '2017-01-01', NULL, '2017-01-01', '2017-06-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `releasecustomer`
--

CREATE TABLE `releasecustomer` (
  `releaseID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `releasecustomer`
--

INSERT INTO `releasecustomer` (`releaseID`, `customerID`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` longtext,
  `ActualStart` date DEFAULT NULL,
  `ActualComplete` date DEFAULT NULL,
  `PlannedStart` date DEFAULT NULL,
  `PlannedComplete` date DEFAULT NULL,
  `State` varchar(255) DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `DeveloperID` int(11) DEFAULT NULL,
  `testerID` int(11) DEFAULT NULL,
  `IterationID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`ID`, `Name`, `Description`, `ActualStart`, `ActualComplete`, `PlannedStart`, `PlannedComplete`, `State`, `CustomerID`, `DeveloperID`, `testerID`, `IterationID`) VALUES
(1, 'us1', 'US1 d', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 1, 1, NULL, 1),
(2, 'us1', ' US1 d   vvvvvvvvvvvvvvvvvv             ', NULL, NULL, NULL, NULL, 'Complete', 2, 1, NULL, 1),
(3, 'US3', 'description of US3 for customer 2 by session', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 2, 1, NULL, 1),
(4, 'us2 name after edit', ' US2 description after edit user story made           ', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 2, 1, NULL, 1),
(5, 'us2 name after edit', ' US2 description after modified edit user story made     ', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 2, 1, NULL, 1),
(6, 'us333', '333', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 2, 1, NULL, 1),
(7, 'us777', '777edit from list              ', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 2, 1, NULL, 1),
(8, 'us444', '444', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 2, 1, NULL, 1),
(9, 'us5555', '555', NULL, NULL, NULL, NULL, 'Waiting for AT', 2, 1, NULL, 1),
(10, 'test date us', 'test date', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 1, 1, NULL, 1),
(11, 'aa', 'aa', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 1, 1, NULL, 1),
(12, 'aa', 'aa', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 1, 1, NULL, 1),
(13, 'timedif', 'aa', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 1, 1, NULL, 1),
(14, 'test date us', 'this to test date', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 1, 1, NULL, 1),
(15, 'test date us', 'this to test date', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 1, 1, NULL, 1),
(16, 'aa', 'aa', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 1, 1, NULL, 1),
(17, 'aa', 'aa', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 1, 1, NULL, 1),
(18, 'aa', 'aa', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 1, 1, NULL, 1),
(19, 'usus', 'aa', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 2, 1, NULL, 1),
(20, 'us test PO notification', 'aa', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 2, 1, NULL, 1),
(21, 'us test PO notification', 'aa', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 2, 1, NULL, 1),
(22, 'us test PO notification', 'aa', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 2, 1, NULL, 1),
(23, 'us test PO notification', 'aa', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 2, 1, NULL, 1),
(24, 'US for testing', 'US body', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 2, 1, NULL, 1),
(25, 'US for testing', 'US body', NULL, NULL, NULL, NULL, 'Waiting for Confirmatation', 2, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `storyrank`
--

CREATE TABLE `storyrank` (
  `ID` int(11) NOT NULL,
  `StoryID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `StoryRank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tester`
--

CREATE TABLE `tester` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Tel` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Location` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `at`
--
ALTER TABLE `at`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `iteration`
--
ALTER TABLE `iteration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `projectmanager`
--
ALTER TABLE `projectmanager`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `projectrelease`
--
ALTER TABLE `projectrelease`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `storyrank`
--
ALTER TABLE `storyrank`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tester`
--
ALTER TABLE `tester`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `at`
--
ALTER TABLE `at`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `developer`
--
ALTER TABLE `developer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `iteration`
--
ALTER TABLE `iteration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `projectmanager`
--
ALTER TABLE `projectmanager`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `projectrelease`
--
ALTER TABLE `projectrelease`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `storyrank`
--
ALTER TABLE `storyrank`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tester`
--
ALTER TABLE `tester`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
