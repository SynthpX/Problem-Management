-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 28, 2019 at 10:07 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_managementmasalah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_incident`
--

CREATE TABLE `tb_incident` (
  `IncidentID` int(8) NOT NULL,
  `Incident_App` varchar(40) DEFAULT NULL,
  `Incident_Inc` varchar(40) DEFAULT NULL,
  `Incident_Periode` date DEFAULT NULL,
  `Incident_Source` varchar(80) DEFAULT NULL,
  `Incident_Unit` varchar(10) DEFAULT NULL,
  `Incident_PIC` varchar(120) DEFAULT NULL,
  `Incident_PName` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_known_error`
--

CREATE TABLE `tb_known_error` (
  `KnownID` int(8) NOT NULL,
  `RegID` int(8) NOT NULL,
  `Note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_problem_log`
--

CREATE TABLE `tb_problem_log` (
  `ProblemID` int(8) NOT NULL,
  `IncidentID` int(8) NOT NULL,
  `Problem_Class` varchar(30) DEFAULT NULL,
  `Problem_Ident` enum('Y','N','PENDING') DEFAULT 'PENDING',
  `Problem_Note` varchar(120) DEFAULT NULL,
  `Problem_Ket` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_problem_reg`
--

CREATE TABLE `tb_problem_reg` (
  `RegID` int(8) NOT NULL,
  `ProblemID` int(8) NOT NULL,
  `RCA` text,
  `RCA_Status` enum('OPEN','CLOSE') DEFAULT 'OPEN',
  `Problem_Status` enum('OPEN','CLOSE') DEFAULT 'OPEN',
  `Tindak_Lanjut` text,
  `Reg_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `UserID` int(8) NOT NULL,
  `User_Name` char(40) DEFAULT NULL,
  `User_Email` char(25) DEFAULT NULL,
  `User_Phone` char(13) DEFAULT NULL,
  `User_Password` char(40) DEFAULT NULL,
  `User_Position` char(40) DEFAULT NULL,
  `User_Role` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`UserID`, `User_Name`, `User_Email`, `User_Phone`, `User_Password`, `User_Position`, `User_Role`) VALUES
(1, 'admin', 'admin123@email.com', '0811111111', '7d6ca0e47676cc0b934d06402a56e2c0', 'Admin', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_incident`
--
ALTER TABLE `tb_incident`
  ADD PRIMARY KEY (`IncidentID`);

--
-- Indexes for table `tb_known_error`
--
ALTER TABLE `tb_known_error`
  ADD PRIMARY KEY (`KnownID`),
  ADD KEY `KnownID` (`KnownID`),
  ADD KEY `fk_known_reg` (`RegID`);

--
-- Indexes for table `tb_problem_log`
--
ALTER TABLE `tb_problem_log`
  ADD PRIMARY KEY (`ProblemID`),
  ADD KEY `fk_log_incident` (`IncidentID`);

--
-- Indexes for table `tb_problem_reg`
--
ALTER TABLE `tb_problem_reg`
  ADD PRIMARY KEY (`RegID`),
  ADD KEY `fk_log_reg` (`ProblemID`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_incident`
--
ALTER TABLE `tb_incident`
  MODIFY `IncidentID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_known_error`
--
ALTER TABLE `tb_known_error`
  MODIFY `KnownID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_problem_log`
--
ALTER TABLE `tb_problem_log`
  MODIFY `ProblemID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_problem_reg`
--
ALTER TABLE `tb_problem_reg`
  MODIFY `RegID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `UserID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_known_error`
--
ALTER TABLE `tb_known_error`
  ADD CONSTRAINT `fk_known_reg` FOREIGN KEY (`RegID`) REFERENCES `tb_problem_reg` (`RegID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_problem_log`
--
ALTER TABLE `tb_problem_log`
  ADD CONSTRAINT `fk_log_incident` FOREIGN KEY (`IncidentID`) REFERENCES `tb_incident` (`IncidentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_problem_reg`
--
ALTER TABLE `tb_problem_reg`
  ADD CONSTRAINT `fk_log_reg` FOREIGN KEY (`ProblemID`) REFERENCES `tb_problem_log` (`ProblemID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
