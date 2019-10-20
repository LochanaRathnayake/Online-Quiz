-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2019 at 08:20 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `15apc2406`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `q_id` int(3) NOT NULL,
  `answers` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`q_id`, `answers`) VALUES
(14, 'scientific management '),
(14, 'classical management'),
(14, 'human relations management'),
(14, 'creative management'),
(15, 'Frederick Taylor'),
(15, 'Henri Fayol '),
(15, 'Elton Mayo '),
(15, 'Chester Barnard'),
(16, 'Chester Barnard'),
(16, 'Charles Handy '),
(16, 'Henri Fayol '),
(16, 'Victor Meldrew '),
(17, 'organising'),
(17, 'commanding'),
(17, 'controlling'),
(17, 'planning'),
(18, 'planning'),
(18, 'controlling '),
(18, 'organising '),
(18, ' co-ordinating'),
(19, 'Weber'),
(19, 'Fayol'),
(19, 'Taylor'),
(19, 'Handy '),
(20, 'the development of management functions and administrative principles'),
(20, 'a scientific study of work'),
(20, 'a shared responsibility of authority and delegation'),
(20, 'a hierarchy of command based on a rational-legal authority structure'),
(21, 'Elton Mayo '),
(21, 'Max Weber'),
(21, 'Charles Handy'),
(21, 'Henri Fayol'),
(22, 'Weber '),
(22, 'Maslow'),
(22, 'Taylor'),
(22, 'Fayol'),
(23, 'Chester Barnard'),
(23, 'Elton Mayo'),
(23, 'edwin cook'),
(23, 'anush richadson');

-- --------------------------------------------------------

--
-- Table structure for table `q_and_a`
--

CREATE TABLE IF NOT EXISTS `q_and_a` (
`question_id` int(3) NOT NULL,
  `question` varchar(400) NOT NULL,
  `answer` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `q_and_a`
--

INSERT INTO `q_and_a` (`question_id`, `question`, `answer`) VALUES
(14, 'The observation of people at work that would reveal the one best way to do a task is known as ', 'scientific management'),
(15, 'The founder of scientific management was', 'Frederick Taylor'),
(16, 'The first management principles were developed by', 'Henri Fayol '),
(17, 'Studying the future and arranging the means for dealing with it is part of the process of ', ' planning'),
(18, 'Ensuring that everything is carried out according to plan is part of the process of ', 'controlling'),
(19, 'Bureaucracy theory was proposed by', 'Weber'),
(20, 'Bureaucracy theory means', 'a hierarchy of command based on a rational-legal authority structure'),
(21, 'The Hawthorne experiments were conducted by', 'Elton Mayo'),
(22, 'Who defined human motivation as the study of ultimate human goals', 'Maslow'),
(23, 'The analysis of a manager as a social systems approach was proposed by', 'Chester Barnard');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `First_Name` varchar(40) NOT NULL,
  `Last_Name` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `First_Name`, `Last_Name`) VALUES
(11, 'lochana@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'lochana', 'rathnayake');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `q_and_a`
--
ALTER TABLE `q_and_a`
 ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `q_and_a`
--
ALTER TABLE `q_and_a`
MODIFY `question_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
