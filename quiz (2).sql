-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2017 at 05:37 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `acedamic_year`
--

CREATE TABLE `acedamic_year` (
  `id` int(11) NOT NULL,
  `year` varchar(30) NOT NULL,
  `quiz_name` varchar(100) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  `report` varchar(100) NOT NULL,
  `rounds` int(11) NOT NULL DEFAULT '0',
  `teams` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acedamic_year`
--

INSERT INTO `acedamic_year` (`id`, `year`, `quiz_name`, `timestamp`, `report`, `rounds`, `teams`, `is_active`) VALUES
(1, '2017', 'science quiz', '1508536800', '', 4, 4, 1),
(2, '2017', 'science quiz 2', '1508623200', '', 3, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `timestamp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `timestamp`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1');

-- --------------------------------------------------------

--
-- Table structure for table `question_set`
--

CREATE TABLE `question_set` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(30) NOT NULL,
  `a` varchar(30) NOT NULL,
  `b` varchar(30) NOT NULL,
  `c` varchar(30) NOT NULL,
  `d` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_set`
--

INSERT INTO `question_set` (`id`, `question`, `answer`, `a`, `b`, `c`, `d`) VALUES
(1, 'Who invented the miner''s safety-lamp?', 'd', ' Sir Frank Whittle', 'Alexander Graham Bell', 'Thomas Alva Edison', 'Sir Humphrey Davy'),
(2, 'The Earth is surrounded by an insulating blanket of gases which protects it from the light and heat of the Sun. This insulating layer is called the', 'b', 'Lithosphere', 'Atmosphere', 'Hydrosphere', 'Biosphere'),
(3, 'Which rare element would you associate with Marie and Pierre Curie?', 'b', 'Gold', 'Radium', 'Uranium', 'Platinum'),
(4, 'Who discovered Penicillin?', 'b', 'Watson and Crick', 'Sir Alexander Fleming', 'Louis Pasteur', 'Robert Koch'),
(5, 'What is known as the universal solvent?', 'c', 'Sulphuric Acid', 'Aqua Regia', 'Water', 'Hydrochloric Acid'),
(6, 'Brass gets discoloured in air because of the presence of which of the following gases in air?', 'b', 'Oxygen', 'Hydrogen sulphide', 'Carbon dioxide', 'Nitrogen'),
(7, 'Which of the following is a non metal that remains liquid at room temperature?', 'b', 'Phosphorous', 'Bromine', 'Chlorine', 'Helium'),
(8, 'Chlorophyll is a naturally occurring chelate compound in which central metal is', 'b', 'copper', 'magnesium', 'iron', 'calcium'),
(9, 'Which of the following is used in pencils?', 'a', 'Graphite', 'Silicon', 'Charcoal', 'Phosphorous'),
(10, 'Which of the following metals forms an amalgam with other metals?', 'b', 'Tin', 'Mercury', 'Lead', 'Zinc'),
(11, 'The lens used in a simple microscope is', 'b', 'Concave', 'Convex', 'Cylindrical', 'None'),
(12, 'The elimination of toxic nitrogenous waste and excess water in man is by', 'a', 'Excretion', 'Circulation', 'Reproduction', 'Pollution'),
(13, 'The S. I. unit of refractive index is', 'd', 'meter', 'cm', 'watt', 'no unit'),
(14, 'The liquid metal is', 'c', 'Bismuth', 'Magnesium', 'Mercury', 'Sodium'),
(15, 'Which of the following is not a primary colour', 'd', 'Red', 'Blue', 'Green', 'Yellow'),
(16, 'Endothermic reactions are those in which', 'b', 'Heat is evolved', 'Heat is absorbed', 'Temperature increases', 'Light is produced'),
(17, 'Which colour of light is deviated least', 'a', 'Red', 'Blue', 'Violet', 'Green'),
(18, 'Acid present in gastric juice is', 'a', 'Hydrochloric Acid', 'Citric Acid', 'Sulphuric Acid', 'Acetic Acid'),
(19, 'Which blood cells are called ''Soldiers'' of the body', 'a', 'WBC', 'Platelets', 'RBC', 'All of the above'),
(20, 'The image formed in a compound microscope is', 'b', 'erect', 'inverted', 'sometimes erect, sometimes inv', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `round`
--

CREATE TABLE `round` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `round_no` int(11) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `round`
--

INSERT INTO `round` (`id`, `team_id`, `round_no`, `points`) VALUES
(1, 1, 1, 0),
(2, 1, 2, 0),
(3, 1, 3, 0),
(4, 1, 4, 0),
(5, 2, 1, 0),
(6, 2, 2, 0),
(7, 2, 3, 0),
(8, 2, 4, 0),
(9, 3, 1, 0),
(10, 3, 2, 0),
(11, 3, 3, 0),
(12, 3, 4, 0),
(13, 4, 1, 0),
(14, 4, 2, 0),
(15, 4, 3, 0),
(16, 4, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `acedamic_year_id` int(11) NOT NULL,
  `team_name` varchar(30) NOT NULL,
  `total_points` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `acedamic_year_id`, `team_name`, `total_points`) VALUES
(1, 1, 'a', 30),
(2, 1, 'b', 40),
(3, 1, 'c', 40),
(4, 1, 'd', 40);

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `member_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `team_id`, `member_name`) VALUES
(1, 1, 'a'),
(2, 1, 'a'),
(3, 2, 'b'),
(4, 2, 'b'),
(5, 3, 'c'),
(6, 3, 'c'),
(7, 4, 'd'),
(8, 4, 'd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acedamic_year`
--
ALTER TABLE `acedamic_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_set`
--
ALTER TABLE `question_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `round`
--
ALTER TABLE `round`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acedamic_year`
--
ALTER TABLE `acedamic_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `question_set`
--
ALTER TABLE `question_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `round`
--
ALTER TABLE `round`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
