-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 08 sep 2017 kl 13:48
-- Serverversion: 5.7.11
-- PHP-version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `book-club`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `description`, `image`) VALUES
(1, 'Harry potter', 'J. K Rowling', 'its about a boy', 'https://ewedit.files.wordpress.com/2016/09/hpsorcstone.jpg'),
(2, 'Änglar och demoner', 'Dan Brown', 'Robert Langdon, professor i religiös symbolik, väcks mitt i natten av ett mystiskt telefonsamtal från en schweizisk forskare och kallas till CERN (världens största naturvetenskapliga anläggning) i Schweiz där Leonardo Vetra, en framstående forskare, har blivit bestialiskt mördad i sitt laboratorium och mördaren har inbränt på hans kropp lämnat efter sig ett 400 år gammalt märke (ett ambigram) som symboliserar Illuminati, den katolska kyrkans urgamla, mytomspunna fiende och den mäktigaste underjordiska organisation som existerat.', 'https://upload.wikimedia.org/wikipedia/en/thumb/5/5f/AngelsAndDemons.jpg/220px-AngelsAndDemons.jpg');

-- --------------------------------------------------------

--
-- Tabellstruktur `loandbooks`
--

CREATE TABLE `loandbooks` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `book` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `loandbooks`
--

INSERT INTO `loandbooks` (`id`, `user`, `book`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `booksread` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `name`, `booksread`) VALUES
(1, 'Max Timje', 0);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `loandbooks`
--
ALTER TABLE `loandbooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `book` (`book`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT för tabell `loandbooks`
--
ALTER TABLE `loandbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `loandbooks`
--
ALTER TABLE `loandbooks`
  ADD CONSTRAINT `loandbooks_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loandbooks_ibfk_2` FOREIGN KEY (`book`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
