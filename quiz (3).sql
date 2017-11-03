-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 03, 2017 at 04:09 PM
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
(1, '2017', 'Brain Vita', '', '', 5, 8, 1);

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
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1509707802');

-- --------------------------------------------------------

--
-- Table structure for table `question_set`
--

CREATE TABLE `question_set` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '1:rapid fire',
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

INSERT INTO `question_set` (`id`, `type`, `question`, `answer`, `a`, `b`, `c`, `d`) VALUES
(1, 0, 'Who invented the miner''s safety-lamp?', 'd', ' Sir Frank Whittle', 'Alexander Graham Bell', 'Thomas Alva Edison', 'Sir Humphrey Davy'),
(2, 0, 'The Earth is surrounded by an insulating blanket of gases which protects it from the light and heat of the Sun. This insulating layer is called the', 'b', 'Lithosphere', 'Atmosphere', 'Hydrosphere', 'Biosphere'),
(3, 0, 'Which rare element would you associate with Marie and Pierre Curie?', 'b', 'Gold', 'Radium', 'Uranium', 'Platinum'),
(4, 0, 'Who discovered Penicillin?', 'b', 'Watson and Crick', 'Sir Alexander Fleming', 'Louis Pasteur', 'Robert Koch'),
(5, 0, 'What is known as the universal solvent?', 'c', 'Sulphuric Acid', 'Aqua Regia', 'Water', 'Hydrochloric Acid'),
(6, 0, 'Brass gets discoloured in air because of the presence of which of the following gases in air?', 'b', 'Oxygen', 'Hydrogen sulphide', 'Carbon dioxide', 'Nitrogen'),
(7, 0, 'Which of the following is a non metal that remains liquid at room temperature?', 'b', 'Phosphorous', 'Bromine', 'Chlorine', 'Helium'),
(8, 0, 'Chlorophyll is a naturally occurring chelate compound in which central metal is', 'b', 'copper', 'magnesium', 'iron', 'calcium'),
(9, 0, 'Which of the following is used in pencils?', 'a', 'Graphite', 'Silicon', 'Charcoal', 'Phosphorous'),
(10, 0, 'Which of the following metals forms an amalgam with other metals?', 'b', 'Tin', 'Mercury', 'Lead', 'Zinc'),
(11, 0, 'The lens used in a simple microscope is', 'b', 'Concave', 'Convex', 'Cylindrical', 'None'),
(12, 0, 'The elimination of toxic nitrogenous waste and excess water in man is by', 'a', 'Excretion', 'Circulation', 'Reproduction', 'Pollution'),
(13, 0, 'The S. I. unit of refractive index is', 'd', 'meter', 'cm', 'watt', 'no unit'),
(14, 0, 'The liquid metal is', 'c', 'Bismuth', 'Magnesium', 'Mercury', 'Sodium'),
(15, 0, 'Which of the following is not a primary colour', 'd', 'Red', 'Blue', 'Green', 'Yellow'),
(16, 0, 'Endothermic reactions are those in which', 'b', 'Heat is evolved', 'Heat is absorbed', 'Temperature increases', 'Light is produced'),
(17, 0, 'Which colour of light is deviated least', 'a', 'Red', 'Blue', 'Violet', 'Green'),
(18, 0, 'Acid present in gastric juice is', 'a', 'Hydrochloric Acid', 'Citric Acid', 'Sulphuric Acid', 'Acetic Acid'),
(19, 0, 'Which blood cells are called ''Soldiers'' of the body', 'a', 'WBC', 'Platelets', 'RBC', 'All of the above'),
(20, 0, 'The image formed in a compound microscope is', 'b', 'erect', 'inverted', 'sometimes erect, sometimes inv', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `round`
--

CREATE TABLE `round` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `round_no` int(11) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `round`
--

INSERT INTO `round` (`id`, `team_id`, `round_no`, `points`, `status`) VALUES
(1, 1, 1, 10, 0),
(2, 2, 1, 3, 0),
(3, 3, 1, 9, 0),
(4, 4, 1, 17, 0),
(5, 5, 1, 12, 0),
(6, 6, 1, 20, 0),
(7, 7, 1, 10, 0),
(8, 8, 1, 15, 0),
(17, 6, 2, 10, 0),
(18, 4, 2, 10, 0),
(19, 8, 2, 20, 0),
(20, 5, 2, 0, 0),
(21, 1, 2, 0, 0),
(22, 7, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `round2_question_set`
--

CREATE TABLE `round2_question_set` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(100) NOT NULL,
  `opa` varchar(100) NOT NULL,
  `opb` varchar(100) NOT NULL,
  `opc` varchar(100) NOT NULL,
  `opd` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `round2_question_set`
--

INSERT INTO `round2_question_set` (`id`, `question`, `answer`, `opa`, `opb`, `opc`, `opd`, `type`, `status`) VALUES
(1, 'The following is a type of modifications in  Radish', 'opc', 'bulb    ', 'pneumatophores   ', 'Fusiform   ', 'tuber', 1, 0),
(2, 'seedless fruits can be obtained by  followimg method', 'opc', 'Apospory      ', 'parthenogenesis      ', 'Parthenocarpy    ', 'allogamy', 1, 0),
(3, 'The portion of DNA which contains information for an entire polypeptide is called ', 'opa', 'Cistron    ', 'codon   ', 'Recon      ', 'Operon', 1, 0),
(4, 'If there is no greenhouse effect,the average temperature at surface of earth would have been', 'opb', '15°C', '-18°C', '-6°C', '10°C', 1, 0),
(5, 'In human beings, the duration of cardiac cycle is :', 'opc', '0•08 second   ', '0•5 second   ', '0•8 second   ', '8•0 second', 1, 0),
(6, 'Which statement best explains the evolutionary advantage of meiosis?', 'opa', 'Meiosis is necessary for sexual reprodcution', 'Genetic recombinations are possible from generation to generation', 'Meiosis alternates with mitosis from generation to generation', 'The same genetic system is passed on from generation to generation.', 1, 0),
(7, 'Which is the most transplanted organ in the body', 'opc', 'liver', 'ear', 'kidney', 'lung', 1, 0),
(8, 'Which of the following in not a natural fibre', 'opd', 'silk', 'wool', 'cotton', 'nylon', 1, 0),
(9, 'Pacemaker is associated with which organ of the human body', 'opa', 'Heart', 'Lungs', 'Liver', 'Kidney', 1, 0),
(10, 'Myocardium and pericardium are the parts of which organ of the body', 'opa', 'Lungs', 'brain', 'heart', 'liver', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `round3_question_set`
--

CREATE TABLE `round3_question_set` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `round3_question_set`
--

INSERT INTO `round3_question_set` (`id`, `question`, `type`, `status`) VALUES
(1, '1-SUNAMI-JAPAN.mp4', 1, 0),
(2, '2-CLOUD BURST-KEDARNATH INDIA.mp4', 1, 0),
(3, '3-CHERNOBYL-RUSSIA.mp4', 1, 0),
(4, '4-BHOPAL.mp4', 1, 0),
(5, '5-NEPAL.mp4', 1, 0),
(6, 'CHARLES DARWIN BIOLOGY.jpg', 2, 0),
(7, 'Charles_Babbage_- COMPUTER.jpg', 2, 0),
(8, 'JOHN NAPIER-MATHEMATICS.jpg', 2, 0),
(9, 'Madam Curie-CHEMISTRY.jpg', 2, 0),
(10, 'NEIL BOHR-PHYSICS.jpg', 2, 0),
(11, 'Unscramble words to form meaningful words : ALIMANINR', 3, 0),
(12, 'Unscramble words to form meaningful words : MECITINRS', 3, 0),
(13, 'Unscramble words to form meaningful words : LAPONYGOYL', 3, 0);

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
(1, 1, 'team1', 0),
(2, 1, 'team2', 0),
(3, 1, 'team3', 0),
(4, 1, 'team4', 0),
(5, 1, 'team5', 0),
(6, 1, 'team6', 0),
(7, 1, 'team7', 0),
(8, 1, 'team8', 0);

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
(1, 1, 'Veronica'),
(2, 1, 'Immam'),
(3, 2, 'Ayushi'),
(4, 2, 'Vedang'),
(5, 3, 'Kiranmai'),
(6, 3, 'Siddhaved'),
(7, 4, 'Bhavana'),
(8, 4, 'Mayank'),
(9, 5, 'Shreyas'),
(10, 5, 'Pradeep'),
(11, 6, 'Vighnesh'),
(12, 6, 'Richa'),
(13, 7, 'Ninaad'),
(14, 7, 'Saavi'),
(15, 8, 'Priyanka'),
(16, 8, 'Yash');

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
-- Indexes for table `round2_question_set`
--
ALTER TABLE `round2_question_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `round3_question_set`
--
ALTER TABLE `round3_question_set`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `round2_question_set`
--
ALTER TABLE `round2_question_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `round3_question_set`
--
ALTER TABLE `round3_question_set`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
