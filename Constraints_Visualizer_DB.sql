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
(1, 'CIVE', 281, 'Analytical Mechanics', 3, 'EC', '200', 'N', 'Y', 'Y', 'N', 0, 0, 0, 1, '#663300', '#9669FE', '#9669FE', '#01F33E', '#01F33E'),
(2, 'COMP', 202, 'Foundations of Programming', 3, 'ECSE', '200', 'N', 'N', 'Y', 'Y', 0, 0, 0, 1, '#FF4848', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(3, 'ECSE', 200, 'Electric Circuits 1', 3, 'ECSE', '200', 'N', 'Y', 'Y', 'Y', 0, 0, 1, 1, '#FF68DD', '#01F33E', '#01F33E', '#01F33E', '#01F33E'),
(4, 'MATH', 262, 'Intermediate Calculus', 3, 'ECSE', '200', 'N', 'N', 'Y', 'Y', 0, 0, 0, 1, '#9669FE', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(5, 'MATH', 263, 'ODEs for Engineers', 3, 'ECSE', '200', 'N', 'Y', 'Y', 'Y', 0, 0, 1, 1, '#01F33E', '#9669FE', '#9669FE', '#9669FE', '#9669FE'),
(6, 'ECSE', 210, 'Electric Circuits 2', 3, 'ECSE', '200', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 2, '#B6BA18', '#FF68DD', '#FF68DD', '#FF68DD', '#FF68DD'),
(7, 'ECSE', 211, 'Design Principles and Methods', 3, 'ECSE', '200', 'Y', 'Y', 'Y', 'Y', 0, 0, 3, 2, '#FFF284', '#FF68DD', '#FF4848', '#29AFD6', '#f5f5dc'),
(8, 'ECSE', 221, 'Intro to Computer Engineering', 3, 'ECSE', '200', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 2, '#CA00CA', '#FF4848', '#FF4848', '#FF4848', '#FF4848'),
(9, 'ECSE', 291, 'Electrical Measurements Lab', 2, 'ECSE', '200', 'N', 'Y', 'Y', 'Y', 0, 0, 1, 2, '#29AFD6', '#B6BA18', '#B6BA18', '#B6BA18', '#B6BA18'),
(10, 'FACC', 100, 'Intro to Eng. Profession', 1, 'ECSE', '100', 'N', 'N', 'Y', 'Y', 0, 0, 0, 2, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(11, 'MATH', 264, 'Adv Calculus for Engineers', 3, 'ECSE', '200', 'Y', 'Y', 'Y', 'Y', 0, 0, 2, 2, '#9900CC', '#9669FE', '#9669FE', '#01F33E', '#01F33E'),
(12, 'ECSE', 322, 'Computer Engineering', 3, 'ECSE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 2, 3, '#FFFFFF', '#FF68DD', '#FF68DD', '#CA00CA', '#CA00CA'),
(13, 'ECSE', 351, 'Electromagnetic Fields', 3, 'EE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 2, 3, '#33FF00', '#FF68DD', '#FF68DD', '#9900CC', '#9900CC'),
(14, 'CCOM', 206, 'Communication in Engineering', 3, 'ECSE', '200', 'N', 'N', 'Y', 'Y', 0, 0, 0, 9, '#0000FF', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(15, 'MATH', 270, 'Applied Linear Algebra', 3, 'ECSE', '200', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 3, '#FF2626', '#01F33E', '#01F33E', '#01F33E', '#01F33E'),
(16, 'FACC', 300, 'Engineering Economy', 3, 'ECSE', '300', 'N', 'N', 'Y', 'Y', 0, 0, 0, 9, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(17, 'ECSE', 303, 'Signals and Systems 1', 3, 'EE', '300', 'Y', 'Y', 'Y', 'Y', 0, 0, 3, 4, '#FFFF00', '#B6BA18', '#FF2626', '#FE67EB', '#f5f5dc'),
(18, 'ECSE', 330, 'Introduction to Electronics', 3, 'EC',  '300', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 4, '#FFB60B', '#B6BA18', '#B6BA18', '#B6BA18', '#B6BA18'),
(19, 'ECSE', 361, 'Power Engineering', 3, 'EE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 4, '#75ECFD', '#B6BA18', '#B6BA18', '#33FF00', '#33FF00'),
(20, 'PHYS', 271, 'Intro to Quantum Physics', 3, 'EE', '200', 'Y', 'N', 'N', 'Y', 0, 0, 1, 4, '#f5f5dc', '#663300', '#663300', '#663300', '#663300'),
(21, 'MATH', 381, 'Complex Variables & Transforms', 3, 'EE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 4, '#FE67EB', '#9900CC', '#9900CC', '#9900CC', '#9900CC'),
(22, 'ECSE', 304, 'Signals and Systems 2', 3, 'EE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 5, '#D1D17A', '#FFFF00', '#FFFF00', '#FFFF00', '#FFFF00'),
(23, 'ECSE', 305, 'Probability & Random Signals 1', 3, 'ECSE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 5, '#DDB9B9', '#FFFF00', '#FFFF00', '#FFFF00', '#FFFF00'),
(24, 'ECSE', 323, 'Digital System Design', 5, 'ECSE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 4, 5, '#0000CE', '#0000FF', '#FFF284', '#CA00CA', '#29AFD6'),
(25, 'ECSE', 334, 'Intro. to Microelectronics', 3, 'EC', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 3, 5, '#59955C', '#29AFD6', '#FFFF00', '#FFB60B', '#f5f5dc'),
(26, 'ECSE', 352, 'Electromagnetic Waves', 3, 'EE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 5, '#800080', '#33FF00', '#33FF00', '#33FF00', '#33FF00'),
(27, 'ECSE', 434, 'Microelectronics Labaratory', 2, 'EE', '400', 'Y', 'N', 'Y', 'Y', 0, 0, 2, 6, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(28, 'ECSE', 443, 'Intro Numerical Methods in EE', 3, 'EE', '400', 'Y', 'N', 'N', 'Y', 0, 0, 3, 6, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(29, 'ECSE', 456, 'ECSE Design Project 1', 3, 'ECSE', '400', 'Y', 'N', 'Y', 'Y', 0, 0, 4, 6, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(30, 'XXXX', '4xx', 'Technical Complementary 1', 3, 'ECSE', '400', 'N', 'N', 'N', 'N', 0, 0, 0, 6, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(31, 'XXXX', '4xx', 'Technical Complementary 2', 3, 'ECSE', '400', 'N', 'N', 'N', 'N', 0, 0, 0, 6, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(32, 'MIME', 262, 'Prop. Materials in Elec. Eng.', 3, 'EE', '200', 'N', 'N', 'Y', 'Y', 0, 0, 0, 9, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(33, 'ECSE', 457, 'ECSE Design Project 2', 3, 'ECSE', '400', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 7, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(34, 'XXXX', '4xx', 'Technical Complementary 3', 3, 'EC', '400', 'N', 'N', 'N', 'N', 0, 0, 0, 7, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(35, 'XXXX', '4xx', 'Lab Complementary', 3, 'EC', '400', 'N', 'N', 'N', 'N', 0, 0, 0, 7, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(36, 'XXXX', 'xxx', 'Impact of Technology on Society', 3, 'ECSE', 'xxx', 'N', 'N', 'Y', 'Y', 0, 0, 0, 9, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(37, 'FACC', 400, 'Eng Professional Practice', 1, 'ECSE', '400', 'Y', 'N', 'Y', 'Y', 0, 0, 1, 7, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(38, 'XXXX', 'xxx', 'Humanities & Social Sciences', 3, 'ECSE', 'xxx', 'N', 'N', 'Y', 'Y', 0, 0, 0, 9, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(39, 'COMP', 250, 'Intro to Computer Science', 3, 'CS', '200', 'Y', 'N', 'Y', 'Y', 0, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(40, 'ECSE', 306, 'Fund. of Signals and Systems', 3, 'CS', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(41, 'ECSE', 321, 'Intro. to Software Engineering', 3, 'CS', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(42, 'MATH', 363, 'Discrete Mathematics', 3, 'CS', '300', 'Y', 'N', 'N', 'Y', 0, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(43, 'COMP', 251, 'Algorithms and Data Structures', 3, 'CS', '200', 'Y', 'N', 'Y', 'Y', 0, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(44, 'ECSE', 353, 'Electromagnetic Fields&Waves', 3, 'CS', '300', 'Y', 'N', 'Y', 'N', 0, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(45, 'XXXX', 'xxx', 'Natural Science Complementary', 3, 'CE', 'xxx', 'N', 'N', 'N', 'N', 0, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(46, 'XXXX', 'xxx', 'Natural Science Complementary 1', 3, 'SE', 'xxx', 'N', 'N', 'N', 'N', 0, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(47, 'XXXX', 'xxx', 'Natural Science Complementary 2', 3, 'SE', 'xxx', 'N', 'N', 'N', 'N', 0, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(48, 'COMP', 206, 'Intro to Software Systems', 3, 'SE', '200', 'Y', 'N', 'Y', 'Y', 0, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(49, 'COMP', 302, 'Programming Lang & Paradigms', 3, 'SE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(50, 'ECSE', 404, 'Control Systems', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(51, 'ECSE', 405, 'Antennas', 3, 'TC', '400', 'Y', 'N', 'N', 'N', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(52, 'ECSE', 411, 'Communications Systems 1', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(53, 'ECSE', 412, 'Discrete TimeSignal Processing', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(54, 'ECSE', 413, 'Communications Systems 2', 3, 'TC', '400', 'Y', 'N', 'N', 'N', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(55, 'ECSE', 414, 'Intro to Telecom Networks', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(56, 'ECSE', 420, 'Parallel Computing', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(57, 'ECSE', 421, 'Embedded Systems', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(58, 'ECSE', 422, 'Fault Tolerant Computing', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(59, 'ECSE', 423, 'Fundamentals of Photonics', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(60, 'ECSE', 424, 'Human-Computer Interaction', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(61, 'ECSE', 425, 'Computer Organization and Arch', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(62, 'ECSE', 426, 'Microprocessor Systems', 3, 'TC', '400', 'Y', 'N', 'Y', 'Y', 3, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(63, 'ECSE', 427, 'Operating Systems', 3, 'TC', '400', 'Y', 'N', 'Y', 'Y', 3, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(64, 'ECSE', 430, 'Photonic Devices and Systems', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(65, 'ECSE', 431, 'Introduction to VLSI CAD', 3, 'TC', '400', 'Y', 'N', 'N', 'N', 3, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),    
(66, 'ECSE', 432, 'Physical Basis: Trans Devices', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(67, 'ECSE', 435, 'Mixed-Signal Test Techniques', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 3, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(68, 'ECSE', 436, 'Signal Processing Hardware', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 3, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(69, 'ECSE', 450, 'Electromagnetic Compatibility', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 3, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(70, 'ECSE', 451, 'EM Transmission & Radiation', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(71, 'ECSE', 460, 'Appareillage électrique', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(72, 'ECSE', 462, 'Electromech Energy Conversion', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(73, 'ECSE', 463, 'Electric Power Generation', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(74, 'ECSE', 464, 'Power Systems Analysis', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(75, 'ECSE', 465, 'Power Electronic Systems', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(76, 'ECSE', 466, 'Réseaux de distribution', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(77, 'ECSE', 467, 'Comportement des réseaux élect', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(78, 'ECSE', 468, 'Electricité industrielle', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(79, 'ECSE', 469, 'Protection des réseaux élect', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(80, 'ECSE', 485, 'IC Fabrication Laboratory', 2, 'TC', '400', 'Y', 'Y', 'N', 'N', 2, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(81, 'ECSE', 486, 'Power Laboratory', 2, 'TC', '400', 'Y', 'N', 'N', 'Y', 2, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(82, 'ECSE', 487, 'Computer Architecture Lab', 2, 'TC', '400', 'Y', 'Y', 'N', 'Y', 2, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(83, 'ECSE', 488, 'High Frequency Laboratory', 2, 'TC', '400', 'Y', 'Y', 'N', 'N', 2, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(84, 'ECSE', 489, 'Telecommunication Network Lab', 2, 'TC', '400', 'Y', 'Y', 'N', 'Y', 2, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(85, 'ECSE', 490, 'Digital Signal Processing Lab', 2, 'TC', '400', 'Y', 'Y', 'N', 'N', 2, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(86, 'ECSE', 491, 'Communication Systems Lab', 2, 'TC', '400', 'Y', 'Y', 'N', 'N', 2, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(87, 'ECSE', 492, 'Optical Communications Lab', 2, 'TC', '400', 'Y', 'Y', 'N', 'N', 2, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(88, 'ECSE', 493, 'Control&Robotics Laboratory', 2, 'TC', '400', 'Y', 'Y', 'N', 'Y', 2, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(89, 'ECSE', 429, 'Software Validation', 3, 'SE', '400', 'Y', 'N', 'Y', 'N', 0, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(90, 'COMP', 241, 'Database Systems', 3, 'SE', '200', 'Y', 'N', 'N', 'Y', 0, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(91, 'ECSE', 428, 'Software Engineering Practice', 3, 'SE', '400', 'Y', 'N', 'N', 'Y', 0, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc'),
(92, 'COMP', 360, 'Algorithm Design', 3, 'SE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 0, 0, '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc', '#f5f5dc');

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
