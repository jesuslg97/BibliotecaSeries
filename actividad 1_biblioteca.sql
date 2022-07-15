-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 11, 2022 at 09:47 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `actividad_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `surnames` varchar(256) NOT NULL,
  `date` date NOT NULL,
  `nationality` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `name`, `surnames`, `date`, `nationality`) VALUES
(1, 'Úrsula', 'Corberó Delgado', '1989-08-11', '2'),
(2, 'Pedro', 'González Alonso', '1971-06-21', '2'),
(3, 'Sophie', 'Turner', '1996-02-21', '1'),
(4, 'Christopher', 'Harington', '1986-12-26', '1'),
(5, 'Vanesa', 'Romero Torres', '1978-06-04', '2'),
(6, 'Pablo', 'Chiapella Cámara', '1976-12-1', '2'),
(7, 'Gina', 'Carano', '1982-04-16', '1'),
(8, 'Pedro', 'Pascal', '1975-04-02', '2');

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `surnames` varchar(256) NOT NULL,
  `date` date NOT NULL,
  `nationality` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id`, `name`, `surnames`, `date`, `nationality`) VALUES
(1, 'Alejandro', 'Pina Calafi', '1967-06-23', '2'),
(2, 'David', 'Benioff', '1970-09-25', '1'),
(3, 'Laura', 'Caballero', '1978-02-18', '2'),
(4, 'Jonathan', 'Favreau', '1966-10-19', '1');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `ISOcode` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `ISOcode`) VALUES
(1, 'Inglés', 'EN'),
(2, 'Español', 'ES'),
(3, 'Francés', 'FR'),
(4, 'Portugués', 'PR');

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`) VALUES
(1, 'Inglesa'),
(2, 'Española'),
(3, 'Francesa'),
(4, 'Portuguesa');

-- --------------------------------------------------------

--
-- Table structure for table `platforms`
--

CREATE TABLE `platforms` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `platforms`
--

INSERT INTO `platforms` (`id`, `name`) VALUES
(1, 'Netflix'),
(2, 'Amazon prime'),
(3, 'HBO'),
(4, 'Disney+');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `platform` int(11) NOT NULL,
  `director` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `title`, `platform`, `director`) VALUES
(1, 'La casa de papel', 1, 1),
(2, 'Juego de tronos', 3, 2),
(3, 'La que se avecina', 2, 3),
(4, 'The mandalorian', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `serie_actors`
--

CREATE TABLE `serie_actors` (
  `id` int(11) NOT NULL,
  `serie_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `serie_actors`
--

INSERT INTO `serie_actors` (`id`, `serie_id`, `actor_id`) VALUES
(1, 1, 1),
(2, 2, 3),
(3, 3, 5),
(4, 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `serie_languages`
--

CREATE TABLE `serie_languages` (
  `id` int(11) NOT NULL,
  `serie_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `serie_languages`
--

INSERT INTO `serie_languages` (`id`, `serie_id`, `language_id`, `type`) VALUES
(1, 1, 2, 'audio'),
(2, 2, 4, 'subtitle'),
(3, 3, 3, 'subtitle'),
(4, 4, 1, 'audio');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ISOcode` (`ISOcode`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `platforms`
--
ALTER TABLE `platforms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serie_actors`
--
ALTER TABLE `serie_actors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serie_languages`
--
ALTER TABLE `serie_languages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `platforms`
--
ALTER TABLE `platforms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `serie_actors`
--
ALTER TABLE `serie_actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `serie_languages`
--
ALTER TABLE `serie_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;