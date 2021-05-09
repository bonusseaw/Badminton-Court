-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2020 at 04:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bc`
--

-- --------------------------------------------------------

--
-- Table structure for table `courts`
--

CREATE TABLE `courts` (
  `courtID` int(10) NOT NULL,
  `courtName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courts`
--

INSERT INTO `courts` (`courtID`, `courtName`) VALUES
(1, 'Court 1'),
(2, 'Court 2'),
(3, 'Court 3'),
(4, 'Court 4');

-- --------------------------------------------------------

--
-- Stand-in structure for view `findall`
-- (See below for the actual view)
--
CREATE TABLE `findall` (
`reserveID` int(10)
,`courtID` int(10)
,`courtName` varchar(20)
,`timeID` int(10)
,`datere` varchar(10)
,`timeStart` time
,`timeEnd` time
,`id` int(20)
,`name` varchar(30)
,`surname` varchar(30)
,`s` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(20) NOT NULL,
  `namepre` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `namepre`, `name`, `surname`, `username`, `passwd`, `occupation`, `faculty`, `phone`) VALUES
(0, 'นาย', 'ภาณุ', 'จิระคุณ', 'popwithap', 'poppykotic', 'อื่นๆ', 'อื่นๆ', '084-8514234'),
(1, 'นางสาว', 'แพตตี้', 'ชาร์', 'pattychar', 'p4569', 'บุคลากร', 'ประมง', '082-7974417'),
(2, 'นางสาว', 'สุพิชชา', 'วงษ์ทองแท้', 'bonus_seaw', '123456', 'นิสิต', 'วิศวกรรมศาสตร์ กำแพงแสน', '097-2599184'),
(171093773, 'เด็กหญิง', 'เคทธี่', 'โรบินสัน', 'cathydoll', 'password', 'อื่นๆ', 'อื่นๆ', '065-3214106'),
(260606504, 'เด็กชาย', 'คานธี', 'โรบินสัน', 'karnteetii', 'adminpass', 'อื่นๆ', 'อื่นๆ', '087-2107841'),
(746093237, 'นาย', 'มานะ', 'ดีใจ', 'DDDMana', 'ksdfhvjdxl', 'นิสิต', 'วิทยาศาสตร์การกีฬา', '084-7198459');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reserveID` int(10) NOT NULL,
  `courtID` int(10) NOT NULL,
  `datere` varchar(10) NOT NULL,
  `timeID` int(10) NOT NULL,
  `id` int(20) NOT NULL,
  `s` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reserveID`, `courtID`, `datere`, `timeID`, `id`, `s`) VALUES
(326056266, 1, '2020-03-31', 5, 1, 'รออนุมัติ'),
(445005834, 1, '2020-04-01', 7, 2, 'รออนุมัติ'),
(542421280, 3, '2020-03-29', 12, 2, 'รออนุมัติ'),
(558107807, 2, '2020-03-30', 9, 746093237, 'รออนุมัติ'),
(564078017, 4, '2020-03-22', 3, 2, 'รออนุมัติ'),
(944875211, 1, '2020-03-26', 5, 2, 'รออนุมัติ'),
(974549323, 4, '2020-03-28', 9, 0, 'รออนุมัติ');

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `timeID` int(10) NOT NULL,
  `timeStart` time NOT NULL,
  `timeEnd` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`timeID`, `timeStart`, `timeEnd`) VALUES
(1, '08:00:00', '09:00:00'),
(2, '09:00:00', '10:00:00'),
(3, '10:00:00', '11:00:00'),
(4, '11:00:00', '12:00:00'),
(5, '12:00:00', '13:00:00'),
(6, '13:00:00', '14:00:00'),
(7, '14:00:00', '15:00:00'),
(8, '15:00:00', '16:00:00'),
(9, '16:00:00', '17:00:00'),
(10, '17:00:00', '18:00:00'),
(11, '18:00:00', '19:00:00'),
(12, '19:00:00', '20:00:00'),
(13, '20:00:00', '21:00:00');

-- --------------------------------------------------------

--
-- Structure for view `findall`
--
DROP TABLE IF EXISTS `findall`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `findall`  AS  select `crt`.`reserveID` AS `reserveID`,`crt`.`courtID` AS `courtID`,
`crt`.`courtName` AS `courtName`,`crt`.`timeID` AS `timeID`,`crt`.`datere` AS `datere`,`crt`.`timeStart` AS `timeStart`,`crt`.`timeEnd` AS `timeEnd`,`members`.`id`
AS `id`,`members`.`name` AS `name`,`members`.`surname` AS `surname`,`crt`.`s` AS `s` from (`members` join (select `cr`.`reserveID` AS `reserveID`,`cr`.`courtID`
AS `courtID`,`cr`.`timeID` AS `timeID`,`cr`.`datere` AS `datere`,`cr`.`s` AS `s`,`cr`.`courtName` AS `courtName`,`cr`.`id` AS `id`,`times`.`timeStart` AS `timeStart`,
`times`.`timeEnd` AS `timeEnd` from (`times` join (select `reservation`.`reserveID` AS `reserveID`,`reservation`.`courtID` AS `courtID`,`reservation`.`timeID` AS `timeID`,
`reservation`.`id` AS `id`,`reservation`.`datere` AS `datere`,`reservation`.`s` AS `s`,`courts`.`courtName` AS `courtName` from (`courts` join `reservation`
on(`courts`.`courtID` = `reservation`.`courtID`))) `cr` on(`times`.`timeID` = `cr`.`timeID`))) `crt` on(`members`.`id` = `crt`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courts`
--
ALTER TABLE `courts`
  ADD PRIMARY KEY (`courtID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reserveID`),
  ADD KEY `courtID` (`courtID`),
  ADD KEY `id` (`id`),
  ADD KEY `timeID` (`timeID`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`timeID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`courtID`) REFERENCES `courts` (`courtID`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id`) REFERENCES `members` (`id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`timeID`) REFERENCES `times` (`timeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
