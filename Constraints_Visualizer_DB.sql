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
  `NUM_OF_REQ_CLASSES` int(1) NOT NULL
) ENGINE=MyISAM;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`C_ID`, `Course_Code`, `Course_Number`, `Course_Name`, `Credits`, `Program`, `Course_Level`, `HAS_PRE_REQ`, `HAS_CO_REQ`, `IS_OFFERED_FALL`, `IS_OFFERED_WINTER`, `IS_TECH_OR_LAB`, `STATUS`, `NUM_OF_REQ_CLASSES`) VALUES
(1, 'CIVE', 281, 'Analytical Mechanics', 3, 'EC', '200', 'N', 'Y', 'Y', 'N', 0, 0 2),
(2, 'COMP', 202, 'Foundations of Programming', 3, 'ECSE', '200', 'N', 'N', 'Y', 'Y', 0, 0,0),
(3, 'ECSE', 200, 'Electric Circuits 1', 3, 'ECSE', '200', 'N', 'Y', 'Y', 'Y', 0, 0, 1),
(4, 'MATH', 262, 'Intermediate Calculus', 3, 'ECSE', '200', 'N', 'N', 'Y', 'Y', 0, 0, 0),
(5, 'MATH', 263, 'ODEs for Engineers', 3, 'ECSE', '200', 'N', 'Y', 'Y', 'Y', 0, 0, 1),
(6, 'ECSE', 210, 'Electric Circuits 2', 3, 'ECSE', '200', 'Y', 'N', 'Y', 'Y', 0, 0, 1),
(7, 'ECSE', 211, 'Design Principles and Methods', 3, 'ECSE', '200', 'Y', 'Y', 'Y', 'Y', 0, 0, 3),
(8, 'ECSE', 221, 'Intro to Computer Engineering', 3, 'ECSE', '200', 'Y', 'N', 'Y', 'Y', 0, 0, 1),
(9, 'ECSE', 291, 'Electrical Measurements Lab', 2, 'ECSE', '200', 'N', 'Y', 'Y', 'Y', 0, 0, 1),
(10, 'FACC', 100, 'Intro to Eng. Profession', 1, 'ECSE', '100', 'N', 'N', 'Y', 'Y', 0, 0, 0),
(11, 'MATH', 264, 'Adv Calculus for Engineers', 3, 'ECSE', '200', 'Y', 'Y', 'Y', 'Y', 0, 0, 2),
(12, 'ECSE', 322, 'Computer Engineering', 3, 'ECSE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 2),
(13, 'ECSE', 351, 'Electromagnetic Fields', 3, 'EE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 2),
(14, 'CCOM', 206, 'Communication in Engineering', 3, 'ECSE', '200', 'N', 'N', 'Y', 'Y', 0, 0, 0),
(15, 'MATH', 270, 'Applied Linear Algebra', 3, 'ECSE', '200', 'Y', 'N', 'Y', 'Y', 0, 0, 1),
(16, 'FACC', 300, 'Engineering Economy', 3, 'ECSE', '300', 'N', 'N', 'Y', 'Y', 0, 0, 0),
(17, 'ECSE', 303, 'Signals and Systems 1', 3, 'EE', '300', 'Y', 'Y', 'Y', 'Y', 0, 0, 3),
(18, 'ECSE', 330, 'Introduction to Electronics', 3, 'EC',  '300', 'Y', 'N', 'Y', 'Y', 0, 0,1),
(19, 'ECSE', 361, 'Power Engineering', 3, 'EE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 1),
(20, 'PHYS', 271, 'Intro to Quantum Physics', 3, 'EE', '200', 'Y', 'N', 'N', 'Y', 0, 0, 1),
(21, 'MATH', 381, 'Complex Variables & Transforms', 3, 'EE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 1),
(22, 'ECSE', 304, 'Signals and Systems 2', 3, 'EE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 1),
(23, 'ECSE', 305, 'Probability & Random Signals 1', 3, 'ECSE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 1),
(24, 'ECSE', 323, 'Digital System Design', 5, 'ECSE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 4),
(25, 'ECSE', 334, 'Intro. to Microelectronics', 3, 'EC', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 3),
(26, 'ECSE', 352, 'Electromagnetic Waves', 3, 'EE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 1),
(27, 'ECSE', 434, 'Microelectronics Labaratory', 2, 'EE', '400', 'Y', 'N', 'Y', 'Y', 0, 0, 2),
(28, 'ECSE', 443, 'Intro Numerical Methods in EE', 3, 'EE', '400', 'Y', 'N', 'N', 'Y', 0, 0, 3),
(29, 'ECSE', 456, 'ECSE Design Project 1', 3, 'ECSE', '400', 'Y', 'N', 'Y', 'Y', 0, 0, 4),
(30, 'XXXX', '4xx', 'Technical Complementary 1', 3, 'ECSE', '400', 'N', 'N', 'N', 'N', 0, 0, 0),
(31, 'XXXX', '4xx', 'Technical Complementary 2', 3, 'ECSE', '400', 'N', 'N', 'N', 'N', 0, 0, 0),
(32, 'MIME', 262, 'Prop. Materials in Elec. Eng.', 3, 'EE', '200', 'N', 'N', 'Y', 'Y', 0, 0, 0),
(33, 'ECSE', 457, 'ECSE Design Project 2', 3, 'ECSE', '400', 'Y', 'N', 'Y', 'Y', 0, 0,1),
(34, 'XXXX', '4xx', 'Technical Complementary 3', 3, 'EC', '400', 'N', 'N', 'N', 'N', 0, 0, 0),
(35, 'XXXX', '4xx', 'Lab Complementary', 3, 'EC', '400', 'N', 'N', 'N', 'N', 0, 0, 0),
(36, 'XXXX', 'xxx', 'Impact of Technology on Society', 3, 'ECSE', 'xxx', 'N', 'N', 'Y', 'Y', 0, 0, 0),
(37, 'FACC', 400, 'Eng Professional Practice', 1, 'ECSE', '400', 'Y', 'N', 'Y', 'Y', 0, 0, 1),
(38, 'XXXX', 'xxx', 'Humanities & Social Sciences', 3, 'ECSE', 'xxx', 'N', 'N', 'Y', 'Y', 0, 0, 0),
(39, 'COMP', 250, 'Intro to Computer Science', 3, 'CS', '200', 'Y', 'N', 'Y', 'Y', 0, 0, 0),
(40, 'ECSE', 306, 'Fund. of Signals and Systems', 3, 'CS', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 0),
(41, 'ECSE', 321, 'Intro. to Software Engineering', 3, 'CS', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 0),
(42, 'MATH', 363, 'Discrete Mathematics', 3, 'CS', '300', 'Y', 'N', 'N', 'Y', 0, 0, 0),
(43, 'COMP', 251, 'Algorithms and Data Structures', 3, 'CS', '200', 'Y', 'N', 'Y', 'Y', 0, 0, 0),
(44, 'ECSE', 353, 'Electromagnetic Fields&Waves', 3, 'CS', '300', 'Y', 'N', 'Y', 'N', 0, 0, 0),
(45, 'XXXX', 'xxx', 'Natural Science Complementary', 3, 'CE', 'xxx', 'N', 'N', 'N', 'N', 0, 0, 0),
(46, 'XXXX', 'xxx', 'Natural Science Complementary 1', 3, 'SE', 'xxx', 'N', 'N', 'N', 'N', 0, 0, 0),
(47, 'XXXX', 'xxx', 'Natural Science Complementary 2', 3, 'SE', 'xxx', 'N', 'N', 'N', 'N', 0, 0, 0),
(48, 'COMP', 206, 'Intro to Software Systems', 3, 'SE', '200', 'Y', 'N', 'Y', 'Y', 0, 0, 0),
(49, 'COMP', 302, 'Programming Lang & Paradigms', 3, 'SE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 0),
(50, 'ECSE', 404, 'Control Systems', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0),
(51, 'ECSE', 405, 'Antennas', 3, 'TC', '400', 'Y', 'N', 'N', 'N', 1, 0, 0),
(52, 'ECSE', 411, 'Communications Systems 1', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0),
(53, 'ECSE', 412, 'Discrete TimeSignal Processing', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0),
(54, 'ECSE', 413, 'Communications Systems 2', 3, 'TC', '400', 'Y', 'N', 'N', 'N', 1, 0, 0),
(55, 'ECSE', 414, 'Intro to Telecom Networks', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0),
(56, 'ECSE', 420, 'Parallel Computing', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0),
(57, 'ECSE', 421, 'Embedded Systems', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0),
(58, 'ECSE', 422, 'Fault Tolerant Computing', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0),
(59, 'ECSE', 423, 'Fundamentals of Photonics', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0),
(60, 'ECSE', 424, 'Human-Computer Interaction', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0),
(61, 'ECSE', 425, 'Computer Organization and Arch', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0),
(62, 'ECSE', 426, 'Microprocessor Systems', 3, 'TC', '400', 'Y', 'N', 'Y', 'Y', 3, 0, 0),
(63, 'ECSE', 427, 'Operating Systems', 3, 'TC', '400', 'Y', 'N', 'Y', 'Y', 3, 0, 0),
(64, 'ECSE', 430, 'Photonic Devices and Systems', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0),
(65, 'ECSE', 431, 'Introduction to VLSI CAD', 3, 'TC', '400', 'Y', 'N', 'N', 'N', 3, 0, 0),    
(66, 'ECSE', 432, 'Physical Basis: Trans Devices', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0),
(67, 'ECSE', 435, 'Mixed-Signal Test Techniques', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 3, 0, 0),
(68, 'ECSE', 436, 'Signal Processing Hardware', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 3, 0, 0),
(69, 'ECSE', 450, 'Electromagnetic Compatibility', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 3, 0, 0),
(70, 'ECSE', 451, 'EM Transmission & Radiation', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0),
(71, 'ECSE', 460, 'Appareillage électrique', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0, 0),
(72, 'ECSE', 462, 'Electromech Energy Conversion', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0),
(73, 'ECSE', 463, 'Electric Power Generation', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0),
(74, 'ECSE', 464, 'Power Systems Analysis', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0),
(75, 'ECSE', 465, 'Power Electronic Systems', 3, 'TC', '400', 'Y', 'N', 'Y', 'N', 1, 0, 0),
(76, 'ECSE', 466, 'Réseaux de distribution', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0),
(77, 'ECSE', 467, 'Comportement des réseaux élect', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0),
(78, 'ECSE', 468, 'Electricité industrielle', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0),
(79, 'ECSE', 469, 'Protection des réseaux élect', 3, 'TC', '400', 'Y', 'N', 'N', 'Y', 1, 0, 0),
(80, 'ECSE', 485, 'IC Fabrication Laboratory', 2, 'TC', '400', 'Y', 'Y', 'N', 'N', 2, 0, 0),
(81, 'ECSE', 486, 'Power Laboratory', 2, 'TC', '400', 'Y', 'N', 'N', 'Y', 2, 0, 0),
(82, 'ECSE', 487, 'Computer Architecture Lab', 2, 'TC', '400', 'Y', 'Y', 'N', 'Y', 2, 0, 0),
(83, 'ECSE', 488, 'High Frequency Laboratory', 2, 'TC', '400', 'Y', 'Y', 'N', 'N', 2, 0, 0),
(84, 'ECSE', 489, 'Telecommunication Network Lab', 2, 'TC', '400', 'Y', 'Y', 'N', 'Y', 2, 0, 0),
(85, 'ECSE', 490, 'Digital Signal Processing Lab', 2, 'TC', '400', 'Y', 'Y', 'N', 'N', 2, 0, 0),
(86, 'ECSE', 491, 'Communication Systems Lab', 2, 'TC', '400', 'Y', 'Y', 'N', 'N', 2, 0, 0),
(87, 'ECSE', 492, 'Optical Communications Lab', 2, 'TC', '400', 'Y', 'Y', 'N', 'N', 2, 0, 0),
(88, 'ECSE', 493, 'Control&Robotics Laboratory', 2, 'TC', '400', 'Y', 'Y', 'N', 'Y', 2, 0, 0),
(89, 'ECSE', 429, 'Software Validation', 3, 'SE', '400', 'Y', 'N', 'Y', 'N', 0, 0, 0),
(90, 'COMP', 241, 'Database Systems', 3, 'SE', '200', 'Y', 'N', 'N', 'Y', 0, 0, 0),
(91, 'ECSE', 428, 'Software Engineering Practice', 3, 'SE', '400', 'Y', 'N', 'N', 'Y', 0, 0, 0),
(92, 'COMP', 360, 'Algorithm Design', 3, 'SE', '300', 'Y', 'N', 'Y', 'Y', 0, 0, 0);

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
