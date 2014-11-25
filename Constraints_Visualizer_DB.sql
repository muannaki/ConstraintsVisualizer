-- phpMyAdmin SQL Dump
	-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2014 at 10:11 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

use website_constraints;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `website constraints`
--

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
`C_ID` int(5) NOT NULL,
  `Course_Code` varchar(4) NOT NULL,
  `Course_Number` varchar(3) NOT NULL,
  `Course_Name` varchar(40) NOT NULL,
  `Credits` int(1) NOT NULL,
  `Program` varchar(4) NOT NULL,
  `Course_Level` varchar(3) NOT NULL,
  `HAS_PRE_REQ` varchar(1) NOT NULL,
  `HAS_CO_REQ` varchar(1) NOT NULL,
  `IS_OFFERED_FALL` varchar(1) NOT NULL,
  `IS_OFFERED_WINTER` varchar(1) NOT NULL,
  `IS_TECH_OR_LAB` int(2) NOT NULL,
  `STATUS` int(1) NOT NULL,
  `NUM_OF_REQ_CLASSES` int(1) NOT NULL,
  `METRIC` int(1) NOT NULL,
  `HEX_COLOR` varchar(10) NOT NULL,
  `PREQ_HEX_COLOR_1` varchar(7) NOT NULL,
  `PREQ_HEX_COLOR_2` varchar(7) NOT NULL,
  `PREQ_HEX_COLOR_3` varchar(7) NOT NULL,
  `PREQ_HEX_COLOR_4` varchar(7) NOT NULL  
) ENGINE=MyISAM;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`C_ID`, `Course_Code`, `Course_Number`, `Course_Name`, `Credits`, `Program`, `Course_Level`, `HAS_PRE_REQ`, `HAS_CO_REQ`, `IS_OFFERED_FALL`, `IS_OFFERED_WINTER`, `IS_TECH_OR_LAB`, `STATUS`, `NUM_OF_REQ_CLASSES`, `METRIC`, `HEX_COLOR`, `PREQ_HEX_COLOR_1`, `PREQ_HEX_COLOR_2`, `PREQ_HEX_COLOR_3`, `PREQ_HEX_COLOR_4`) VALUES
(1, 'CIVE', 281, 'Analytical Mechanics', 3, 'EC', '200', 'N', 'Y', 'Y', 'N', 0, 0, 0, 1, '#663300', '#000000', '#b23524', '#000000', '#FFFFFF'),
(2, 'COMP', 202, 'Foundations of Programming', 3, 'ECSE', '200', 'N', 'N', 'Y', 'Y', 0, 0, 0, 1, '#b23524', '#000000', '#000000', '#000000', '#000000'),
(3, 'ECSE', 200, 'Electric Circuits 1', 3, 'ECSE', '200', 'N', 'Y', 'Y', 'Y', 0, 0, 1, 1, '#000000', '#000000', '#000000', '#b23524', '#000000'),
(4, 'MATH', 262, 'Intermediate Calculus', 3, 'ECSE', '200', 'N', 'N', 'Y', 'Y', 0, 0, 0, 1, '#000000', '#000000', '#000000', '#000000', '#000000'),
(5, 'MATH', 263, 'ODEs for Engineers', 3, 'ECSE', '200', 'N', 'Y', 'Y', 'Y', 0, 0, 1, 1, '#000000', '#000000', '#000000', '#000000', '#000000'),
(6, 'ECSE', 210, 'Electric Circuits 2', 3, 'ECSE', '200', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 2, '#000000', '#000000', '#000000', '#000000', '#000000'),
(7, 'ECSE', 211, 'Design Principles and Methods', 3, 'ECSE', '200', 'Y', 'Y', 'Y', 'Y', 0, 0, 3, 2, '#000000', '#000000', '#000000', '#000000', '#000000'),
(8, 'ECSE', 221, 'Intro to Computer Engineering', 3, 'ECSE', '200', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 2, '#000000', '#000000', '#000000', '#000000', '#000000'),
(9, 'ECSE', 291, 'Electrical Measurements Lab', 2, 'ECSE', '200', 'N', 'Y', 'Y', 'Y', 0, 0, 1, 2, '#000000', '#000000', '#000000', '#000000', '#000000'),
(10, 'FACC', 100, 'Intro to Eng. Profession', 1, 'ECSE', '100', 'N', 'N', 'Y', 'Y', 0, 0, 0, 2, '#000000', '#000000', '#000000', '#000000', '#000000'),
(11, 'MATH', 264, 'Adv Calculus for Engineers', 3, 'ECSE', '200', 'Y', 'Y', 'Y', 'Y', 0, 0, 2, 2, '#000000', '#000000', '#000000', '#000000', '#000000'),
(12, 'ECSE', 322, 'Computer Engineering', 3, 'ECSE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 2, 3, '#000000', '#000000', '#000000', '#000000', '#000000'),
(13, 'ECSE', 351, 'Electromagnetic Fields', 3, 'EE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 2, 3, '#000000', '#000000', '#000000', '#000000', '#000000'),
(14, 'CCOM', 206, 'Communication in Engineering', 3, 'ECSE', '200', 'N', 'N', 'Y', 'Y', 0, 0, 0, 9, '#000000', '#000000', '#000000', '#000000', '#000000'),
(15, 'MATH', 270, 'Applied Linear Algebra', 3, 'ECSE', '200', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 3, '#000000', '#000000', '#000000', '#000000', '#000000'),
(16, 'FACC', 300, 'Engineering Economy', 3, 'ECSE', '300', 'N', 'N', 'Y', 'Y', 0, 0, 0, 9, '#000000', '#000000', '#000000', '#000000', '#000000'),
(17, 'ECSE', 303, 'Signals and Systems 1', 3, 'EE', '300', 'Y', 'Y', 'Y', 'Y', 0, 0, 3, 4, '#000000', '#000000', '#000000', '#000000', '#000000'),
(18, 'ECSE', 330, 'Introduction to Electronics', 3, 'EC',  '300', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 4, '#000000', '#000000', '#000000', '#000000', '#000000'),
(19, 'ECSE', 361, 'Power Engineering', 3, 'EE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 4, '#000000', '#000000', '#000000', '#000000', '#000000'),
(20, 'PHYS', 271, 'Intro to Quantum Physics', 3, 'EE', '200', 'Y', 'N', 'N', 'Y', 0, 0, 1, 4, '#000000', '#000000', '#000000', '#000000', '#000000'),
(21, 'MATH', 381, 'Complex Variables & Transforms', 3, 'EE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 4, '#000000', '#000000', '#000000', '#000000', '#000000'),
(22, 'ECSE', 304, 'Signals and Systems 2', 3, 'EE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 5, '#000000', '#000000', '#000000', '#000000', '#000000'),
(23, 'ECSE', 305, 'Probability & Random Signals 1', 3, 'ECSE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 5, '#000000', '#000000', '#000000', '#000000', '#000000'),
(24, 'ECSE', 323, 'Digital System Design', 5, 'ECSE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 4, 5, '#000000', '#000000', '#000000', '#000000', '#000000'),
(25, 'ECSE', 334, 'Intro. to Microelectronics', 3, 'EC', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 3, 5, '#000000', '#000000', '#000000', '#000000', '#000000'),
(26, 'ECSE', 352, 'Electromagnetic Waves', 3, 'EE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 5, '#000000', '#000000', '#000000', '#000000', '#000000'),
(27, 'ECSE', 434, 'Microelectronics Labaratory', 2, 'EE', '400', 'Y', 'N', 'Y', 'Y', 0, 0, 2, 6, '#000000', '#000000', '#000000', '#000000', '#000000'),
(28, 'ECSE', 443, 'Intro Numerical Methods in EE', 3, 'EE', '400', 'Y', 'N', 'N', 'Y', 0, 0, 3, 6, '#000000', '#000000', '#000000', '#000000', '#000000'),
(29, 'ECSE', 456, 'ECSE Design Project 1', 3, 'ECSE', '400', 'Y', 'N', 'Y', 'Y', 0, 0, 4, 6, '#000000', '#000000', '#000000', '#000000', '#000000'),
(30, 'XXXX', '4xx', 'Technical Complementary 1', 3, 'ECSE', '400', 'N', 'N', 'N', 'N', 0, 0, 0, 6, '#000000', '#000000', '#000000', '#000000', '#000000'),
(31, 'XXXX', '4xx', 'Technical Complementary 2', 3, 'ECSE', '400', 'N', 'N', 'N', 'N', 0, 0, 0, 6, '#000000', '#000000', '#000000', '#000000', '#000000'),
(32, 'MIME', 262, 'Prop. Materials in Elec. Eng.', 3, 'EE', '200', 'N', 'N', 'Y', 'Y', 0, 0, 0, 9, '#000000', '#000000', '#000000', '#000000', '#000000'),
(33, 'ECSE', 457, 'ECSE Design Project 2', 3, 'ECSE', '400', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 7, '#000000', '#000000', '#000000', '#000000', '#000000'),
(34, 'XXXX', '4xx', 'Technical Complementary 3', 3, 'EC', '400', 'N', 'N', 'N', 'N', 0, 0, 0, 7, '#000000', '#000000', '#000000', '#000000', '#000000'),
(35, 'XXXX', '4xx', 'Lab Complementary', 3, 'EC', '400', 'N', 'N', 'N', 'N', 0, 0, 0, 7, '#000000', '#000000', '#000000', '#000000', '#000000'),
(36, 'XXXX', 'xxx', 'Impact of Technology on Society', 3, 'ECSE', 'xxx', 'N', 'N', 'Y', 'Y', 0, 0, 0, 9, '#000000', '#000000', '#000000', '#000000', '#000000'),
(37, 'FACC', 400, 'Eng Professional Practice', 1, 'ECSE', '400', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 7, '#000000', '#000000', '#000000', '#000000', '#000000'),
(38, 'XXXX', 'xxx', 'Humanities & Social Sciences', 3, 'ECSE', 'xxx', 'N', 'N', 'Y', 'Y', 0, 0, 0, 9, '#000000', '#000000', '#000000', '#000000', '#000000'),
(39, 'COMP', 250, 'Intro to Computer Science', 3, 'CS', '200', 'Y', 'N', 'Y', 'Y', 0, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(40, 'ECSE', 306, 'Fund. of Signals and Systems', 3, 'CS', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(41, 'ECSE', 321, 'Intro. to Software Engineering', 3, 'CS', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(42, 'MATH', 363, 'Discrete Mathematics', 3, 'CS', '300', 'Y', 'N', 'N', 'Y', 0, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(43, 'COMP', 251, 'Algorithms and Data Structures', 3, 'CS', '200', 'Y', 'N', 'Y', 'Y', 0, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(44, 'ECSE', 353, 'Electromagnetic Fields&Waves', 3, 'CS', '300', 'Y', 'N', 'Y', 'N', 0, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(45, 'XXXX', 'xxx', 'Natural Science Complementary', 3, 'CE', 'xxx', 'N', 'N', 'N', 'N', 0, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(46, 'XXXX', 'xxx', 'Natural Science Complementary 1', 3, 'SE', 'xxx', 'N', 'N', 'N', 'N', 0, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(47, 'XXXX', 'xxx', 'Natural Science Complementary 2', 3, 'SE', 'xxx', 'N', 'N', 'N', 'N', 0, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(48, 'COMP', 206, 'Intro to Software Systems', 3, 'SE', '200', 'Y', 'N', 'Y', 'Y', 0, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(49, 'COMP', 302, 'Programming Lang & Paradigms', 3, 'SE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(50, 'ECSE', 404, 'Control Systems', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(51, 'ECSE', 405, 'Antennas', 3, 'TC', '400', 'Y', 'N', 'N', 'N', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(52, 'ECSE', 411, 'Communications Systems 1', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(53, 'ECSE', 412, 'Discrete TimeSignal Processing', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(54, 'ECSE', 413, 'Communications Systems 2', 3, 'TC', '400', 'Y', 'N', 'N', 'N', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(55, 'ECSE', 414, 'Intro to Telecom Networks', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(56, 'ECSE', 420, 'Parallel Computing', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(57, 'ECSE', 421, 'Embedded Systems', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(58, 'ECSE', 422, 'Fault Tolerant Computing', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(59, 'ECSE', 423, 'Fundamentals of Photonics', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(60, 'ECSE', 424, 'Human-Computer Interaction', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(61, 'ECSE', 425, 'Computer Organization and Arch', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(62, 'ECSE', 426, 'Microprocessor Systems', 3, 'TC', '400', 'Y', 'N', 'Y', 'Y', 3, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(63, 'ECSE', 427, 'Operating Systems', 3, 'TC', '400', 'Y', 'N', 'Y', 'Y', 3, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(64, 'ECSE', 430, 'Photonic Devices and Systems', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(65, 'ECSE', 431, 'Introduction to VLSI CAD', 3, 'TC', '400', 'Y', 'N', 'N', 'N', 3, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),    
(66, 'ECSE', 432, 'Physical Basis: Trans Devices', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(67, 'ECSE', 435, 'Mixed-Signal Test Techniques', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 3, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(68, 'ECSE', 436, 'Signal Processing Hardware', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 3, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(69, 'ECSE', 450, 'Electromagnetic Compatibility', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 3, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(70, 'ECSE', 451, 'EM Transmission & Radiation', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(71, 'ECSE', 460, 'Appareillage électrique', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(72, 'ECSE', 462, 'Electromech Energy Conversion', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(73, 'ECSE', 463, 'Electric Power Generation', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(74, 'ECSE', 464, 'Power Systems Analysis', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(75, 'ECSE', 465, 'Power Electronic Systems', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(76, 'ECSE', 466, 'Réseaux de distribution', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(77, 'ECSE', 467, 'Comportement des réseaux élect', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(78, 'ECSE', 468, 'Electricité industrielle', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(79, 'ECSE', 469, 'Protection des réseaux élect', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(80, 'ECSE', 485, 'IC Fabrication Laboratory', 2, 'TC', '400', 'Y', 'Y', 'N', 'N', 2, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(81, 'ECSE', 486, 'Power Laboratory', 2, 'TC', '400', 'Y', 'N', 'N', 'Y', 2, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(82, 'ECSE', 487, 'Computer Architecture Lab', 2, 'TC', '400', 'Y', 'Y', 'N', 'Y', 2, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(83, 'ECSE', 488, 'High Frequency Laboratory', 2, 'TC', '400', 'Y', 'Y', 'N', 'N', 2, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(84, 'ECSE', 489, 'Telecommunication Network Lab', 2, 'TC', '400', 'Y', 'Y', 'N', 'Y', 2, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(85, 'ECSE', 490, 'Digital Signal Processing Lab', 2, 'TC', '400', 'Y', 'Y', 'N', 'N', 2, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(86, 'ECSE', 491, 'Communication Systems Lab', 2, 'TC', '400', 'Y', 'Y', 'N', 'N', 2, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(87, 'ECSE', 492, 'Optical Communications Lab', 2, 'TC', '400', 'Y', 'Y', 'N', 'N', 2, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(88, 'ECSE', 493, 'Control&Robotics Laboratory', 2, 'TC', '400', 'Y', 'Y', 'N', 'Y', 2, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(89, 'ECSE', 429, 'Software Validation', 3, 'SE', '400', 'Y', 'N', 'Y', 'N', 0, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(90, 'COMP', 241, 'Database Systems', 3, 'SE', '200', 'Y', 'N', 'N', 'Y', 0, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(91, 'ECSE', 428, 'Software Engineering Practice', 3, 'SE', '400', 'Y', 'N', 'N', 'Y', 0, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000'),
(92, 'COMP', 360, 'Algorithm Design', 3, 'SE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 0, 0, '#000000', '#000000', '#000000', '#000000', '#000000');

CREATE TABLE IF NOT EXISTS `pre_co_requisites` (
  `LEADER_C_ID` int(2) NOT NULL,
  `FOLLOWER_C_ID` int(2) NOT NULL,
  `IS_PRE_OR_CO` varchar(1) NOT NULL
) ENGINE=MyISAM;


INSERT INTO `pre_co_requisites` (`LEADER_C_ID`, `FOLLOWER_C_ID`, `IS_PRE_OR_CO`) VALUES
(4, 1, 'C'),
(5, 1, 'C'),
(5, 3, 'C'),
(4, 5, 'C'),
(3, 6, 'P'),
(3, 7, 'P'),
(2, 7, 'P'),
(9, 7, 'C'),
(3, 8, 'P'),
(6, 9, 'C'),
(4, 11, 'P'),
(5, 11, 'C'),
(3, 12, 'P'),
(8, 12, 'P'),
(3, 13, 'P'),
(11, 13, 'P'),
(5, 15, 'P'),
(6, 17, 'P'),
(15, 17, 'P'),
(21, 17, 'C'),
(6, 18, 'P'),
(6, 19, 'P'),
(13, 19, 'P'),
(1, 20, 'P'),
(11, 21, 'P'),
(17, 22, 'P'),
(17, 23, 'P'),
(14, 24, 'P'),
(7, 24, 'P'),
(8, 24, 'P'),
(9, 24, 'P'),
(9, 25, 'P'),
(17, 25, 'P'),
(18, 25, 'P'),
(13, 26, 'P'),
(14, 27, 'P'),
(25, 27, 'P'),
(8, 28, 'P'),
(18, 28, 'P'),
(13, 28, 'P'),
(8, 29, 'P'),
(12, 29, 'P'),
(24, 29, 'P'),
(18, 29, 'P'),
(29, 30, 'P'),
(10, 32, 'P');
