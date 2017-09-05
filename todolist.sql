-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2017 at 12:15 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `duetime`
--

CREATE TABLE `duetime` (
  `TID` int(11) NOT NULL,
  `dueDate` varchar(10) NOT NULL,
  `taskID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duetime`
--

INSERT INTO `duetime` (`TID`, `dueDate`, `taskID`) VALUES
(3, '08/31/17', 3),
(4, '08/31/17', 4),
(28, '09/05/17', 51),
(42, '09/05/17', 65),
(43, '09/04/17', 66),
(44, '09/05/17', 67),
(45, '09/05/17', 68),
(46, '09/04/17', 69),
(47, '09/07/17', 70),
(48, '09/05/17', 71),
(49, '09/10/17', 72),
(50, '09/05/17', 73),
(56, '09/05/17', 77),
(58, '09/04/17', 79),
(59, '09/07/17', 80),
(60, '09/15/17', 81),
(61, '09/05/17', 82);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `PID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`PID`, `name`) VALUES
(3, 'mike'),
(4, 'sal'),
(34, 'kyle'),
(47, 'justin');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task` varchar(200) NOT NULL,
  `taskID` int(11) NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT 'incomplete',
  `priority` varchar(10) NOT NULL,
  `PID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task`, `taskID`, `status`, `priority`, `PID`) VALUES
('clean bedroom', 3, 'incomplete', 'normal', 3),
('clean bedroom', 4, 'incomplete', 'high', 4),
('finish documentation for to-do list', 51, 'incomplete', 'high', 47),
('dust living room', 65, 'incomplete', 'normal', 3),
('tidy up garage', 66, 'incomplete', 'high', 3),
('buy tickets to concert', 67, 'incomplete', 'low', 3),
('clean out gutters', 68, 'incomplete', 'normal', 4),
('purchase new processor', 69, 'incomplete', 'normal', 4),
('paint garage', 70, 'incomplete', 'high', 4),
('purchase new video game', 71, 'incomplete', 'low', 34),
('return purchase of projector back to costco', 72, 'incomplete', 'normal', 34),
('clean dust from computer fan', 73, 'incomplete', 'high', 34),
('purchase book or find book online for operating systems', 77, 'incomplete', 'high', 47),
('find something to eat for dinner', 79, 'incomplete', 'high', 47),
('dust and vacuum room', 80, 'incomplete', 'normal', 47),
('clean bathroom', 81, 'incomplete', 'low', 47),
('fill up on gas', 82, 'incomplete', 'low', 47);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `duetime`
--
ALTER TABLE `duetime`
  ADD PRIMARY KEY (`TID`),
  ADD KEY `taskID` (`taskID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`taskID`),
  ADD KEY `PID` (`PID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `duetime`
--
ALTER TABLE `duetime`
  MODIFY `TID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `taskID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `duetime`
--
ALTER TABLE `duetime`
  ADD CONSTRAINT `duetime_tasks_fk` FOREIGN KEY (`taskID`) REFERENCES `tasks` (`taskID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `task_person_fk` FOREIGN KEY (`PID`) REFERENCES `person` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
