-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 02 okt 2017 kl 14:30
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
-- Tabellstruktur `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `ssn` varchar(255) DEFAULT NULL,
  `birthyear` varchar(255) DEFAULT NULL,
  `author-page` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `author`
--

INSERT INTO `author` (`id`, `first_name`, `last_name`, `ssn`, `birthyear`, `author-page`) VALUES
(1, 'Soran', 'Ismail', '19871203', '1987', 'http://www.soranismail.se/'),
(2, 'Jonas', 'Magnusson', NULL, NULL, 'http://www.wwd.se/forfattare/m/jonas-magnusson/');

-- --------------------------------------------------------

--
-- Tabellstruktur `authorbookconnect`
--

CREATE TABLE `authorbookconnect` (
  `id` int(11) NOT NULL,
  `book` varchar(255) NOT NULL,
  `author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `authorbookconnect`
--

INSERT INTO `authorbookconnect` (`id`, `book`, `author`) VALUES
(1, '9789146233794', 1),
(2, '9789146233794', 2),
(3, '646154', 1),
(4, '2123903523523', 2);

-- --------------------------------------------------------

--
-- Tabellstruktur `books`
--

CREATE TABLE `books` (
  `isbn` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `ingress` text NOT NULL,
  `pages` decimal(5,0) NOT NULL,
  `edition` decimal(5,0) NOT NULL,
  `publiched` date NOT NULL,
  `publicher` varchar(255) NOT NULL,
  `numberofbooks` int(11) NOT NULL,
  `isout` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `books`
--

INSERT INTO `books` (`isbn`, `title`, `ingress`, `pages`, `edition`, `publiched`, `publicher`, `numberofbooks`, `isout`, `image`) VALUES
('2123903523523', 'the book of Bruce', 'have you heard of bruce? no not bruce the allmighty...', '2', '1', '2017-09-18', 'Max Timje', 1, 0, 'https://sites.google.com/site/corsens/Pasfoto_Bruce.JPG'),
('646154', 'max Egna', 'klcnblwisgfiöqwhbxön qod hqaipcp hsdx fhsdolöv hsjklfh sck vdlcö hfiaöz aöl.hcal', '522', '1', '2017-09-01', 'amx Ejmit', 1, 0, NULL),
('9789146233794', 'Absolut svensk : En ID-handling', 'Vad är man beredd att gå i döden för? På åttiotalet riskerade hans föräldrar livet för frihet och rättvisa. Men vad kan Soran Ismail, en konflikträdd 29-åring från Knivsta med dålig kondis, själv bidra med? Absolut svensk – En ID-handling handlar om identitet och intolerans i ett av världens mest toleranta länder.\r\n\r\nSoran växte upp i Knivsta, en medelklassort där de flesta var födda i Sverige av svenska föräldrar. Han blev kallad svartskalle redan i sandlådan och lärde sig att rasismen är en del av vardagen. Inte för att Knivstabor är ondare än andra, utan för att det är så det är. Själv ville han inget hellre än att tillhöra, vara en del av den blågula gemenskapen. Men hela tiden ställdes han inför frågan om han var kurd eller svensk.\r\n\r\nI boken reser Soran bland annat ner till den irakiska delen av Kurdistan, den region hans föräldrar en gång flydde från. Med Islamiska staten, som ett par hundra meter bort skövlar, våldtar och mördar, ställer han sig frågan om vad man egentligen lever för.\r\n\r\nBoken, som är en fortsättning och fördjupning av den internationellt hyllade tv-serien Absolut svensk, ställer frågor om identitet på sin spets – vem man är, och vad det egentligen spelar för roll.\r\n\r\nAbsolut svensk – En ID-handling är drastisk humor och tänkvärt djup signerat Sveriges allvarligaste komiker. Det är historier om identitet och tolerans, från sandlådan i Knivsta till kanten av en massgrav i Kurdistan.', '250', '1', '2017-09-01', 'Wahlström Widstrand', 1, 0, 'https://s1.adlibris.com/images/30550125/absolut-svensk-en-id-handling.jpg');

-- --------------------------------------------------------

--
-- Tabellstruktur `loand`
--

CREATE TABLE `loand` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `book` varchar(255) NOT NULL,
  `out_date` date NOT NULL,
  `in_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `loand`
--

INSERT INTO `loand` (`id`, `user`, `book`, `out_date`, `in_date`) VALUES
(37, '9405034670', '2123903523523', '2017-09-01', '2017-09-27'),
(38, '9405034670', '646154', '2017-09-22', '2017-09-27'),
(39, '9405034670', '9789146233794', '2017-09-23', '2017-09-27'),
(40, '9405034670', '2123903523523', '2017-09-25', '2017-09-27'),
(41, '9405034670', '646154', '2017-09-25', '2017-09-27'),
(42, '9405034670', '2123903523523', '2017-09-25', '2017-09-27'),
(43, '9405034670', '9789146233794', '2017-09-25', '2017-09-27'),
(44, '9405034670', '646154', '2017-09-25', '2017-09-27'),
(45, '9405034670', '2123903523523', '2017-09-25', '2017-09-27'),
(46, '9405034670', '646154', '2017-09-25', '2017-09-27'),
(47, '9405034670', '646154', '2017-09-25', '2017-09-27'),
(48, '9405034670', '9789146233794', '2017-09-25', '2017-09-27'),
(49, '9405034670', '2123903523523', '2017-09-25', '2017-09-27'),
(50, '9405034670', '2123903523523', '2017-09-25', '2017-09-27'),
(51, '9405034670', '9789146233794', '2017-09-25', '2017-09-27'),
(52, '9405034670', '646154', '2017-09-25', '2017-09-27'),
(53, '9405034670', '2123903523523', '2017-09-25', '2017-09-27'),
(54, '9405034670', '646154', '2017-09-25', '2017-09-27'),
(55, '9405034670', '9789146233794', '2017-09-26', '2017-09-27'),
(56, '156156156', '646154', '2017-09-26', '2017-09-26'),
(57, '156156156', '2123903523523', '2017-09-26', '2017-09-26'),
(58, '156156156', '646154', '2017-09-26', NULL),
(59, '9405034670', '2123903523523', '2017-09-26', '2017-09-27'),
(60, '9405034670', '646154', '2017-09-27', '2017-09-27'),
(61, '9405034670', '9789146233794', '2017-09-27', '2017-09-27'),
(62, '9405034670', '2123903523523', '2017-09-27', '2017-09-27');

-- --------------------------------------------------------

--
-- Tabellstruktur `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `book` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `stars` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE `user` (
  `ssn` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_lvl` int(3) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`ssn`, `name`, `username`, `password`, `email`, `user_lvl`, `image`) VALUES
('1466664545', 'dsmk', 'hittaNemo', '$2y$08$73PPziCm1uzZXEhtuCTEueXyrNNDuDpA8w4Q81Cw5oGhsptXu5qey', '', 0, NULL),
('156156156', 'vned', 'mrMorris', '$2y$10$xUXqjQkUoVTe4WhTA5BTMuzBddpPxvj6kXlaxE7lZXIt0Ag4FBO0C', 'morr@iste.com', 0, NULL),
('1995556156', 'test erik', 'mullamur', '$2y$10$.5vVZfPSdRBRD24ymMP05eNTYPH2jQMIL5B2BuXHC55wP4hIH5xxa', 'hittapa@max.se', 0, NULL),
('6004084242', 'håkan Timje', 'Ejmith', '$2y$08$FkBcRsppxqprHgtta2SVneEh9/qjKLYhp95EezPsMUKJIRIaBA/Py', 'hakan@timje.se', 0, NULL),
('9405034670', 'Max Timje', 'theSwedishScout', '$2y$08$Ec5D.vor0Rzh7JW6w0EKoeDaq64AgdR3cjI/tACej8Y7D22hAbsxG', 'max@timje.se', 3, NULL);

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `authorbookconnect`
--
ALTER TABLE `authorbookconnect`
  ADD PRIMARY KEY (`id`),
  ADD KEY `authorbookconnect_fk0` (`book`),
  ADD KEY `authorbookconnect_fk1` (`author`);

--
-- Index för tabell `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`isbn`);

--
-- Index för tabell `loand`
--
ALTER TABLE `loand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loand_fk1` (`book`),
  ADD KEY `borrowing_user` (`user`);

--
-- Index för tabell `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rwvievs_fk1` (`book`),
  ADD KEY `reviewer` (`user`);

--
-- Index för tabell `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ssn`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT för tabell `authorbookconnect`
--
ALTER TABLE `authorbookconnect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT för tabell `loand`
--
ALTER TABLE `loand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT för tabell `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `authorbookconnect`
--
ALTER TABLE `authorbookconnect`
  ADD CONSTRAINT `authorbookconnect_fk0` FOREIGN KEY (`book`) REFERENCES `books` (`isbn`),
  ADD CONSTRAINT `authorbookconnect_fk1` FOREIGN KEY (`author`) REFERENCES `author` (`id`);

--
-- Restriktioner för tabell `loand`
--
ALTER TABLE `loand`
  ADD CONSTRAINT `borrowing_user` FOREIGN KEY (`user`) REFERENCES `user` (`ssn`),
  ADD CONSTRAINT `loand_fk1` FOREIGN KEY (`book`) REFERENCES `books` (`isbn`);

--
-- Restriktioner för tabell `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviewer` FOREIGN KEY (`user`) REFERENCES `user` (`ssn`),
  ADD CONSTRAINT `rwvievs_fk1` FOREIGN KEY (`book`) REFERENCES `books` (`isbn`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
