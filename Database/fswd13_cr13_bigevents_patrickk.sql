-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2021 at 12:44 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fswd13_cr13_bigevents_patrickk`
--
CREATE DATABASE IF NOT EXISTS `fswd13_cr13_bigevents_patrickk` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fswd13_cr13_bigevents_patrickk`;

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210902115503', '2021-09-02 13:55:21', 40);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `contanct_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `cityname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `datetime`, `description`, `picture`, `capacity`, `contanct_email`, `phonenumber`, `cityname`, `zip`, `address`, `url`, `fk_type_id`) VALUES
(4, 'Charlotte De Witte', '2021-10-10 22:30:00', 'Techno Music', 'https://datatransmission.co/wp-content/uploads/2017/05/charlottedewitte4.jpg', 5000, 'charlotte@mail.com', 67851822, 'Vienna', 1100, 'Schönbrunn 6', 'https://www.wien.gv.at/kultur-freizeit/', 2),
(5, 'Fast and Fruious 9', '2022-11-20 19:50:00', 'Movie about Cars', 'https://i.ytimg.com/vi/fqJiB3v5Iig/maxresdefault.jpg', 1500, 'fast@mail.com', 681155, 'Vienna', 1180, 'Stadt Museum 89', 'https://www.wien.gv.at/kultur-freizeit/', 1),
(6, 'Fk Rapid Wien', '2021-11-27 00:00:00', 'Cool football match', 'https://www.spox.com/at/sport/fussball/oesterreich/2107/Bilder/600/rapid-sparta-prag-1200_600x347.jpg', 50000, 'rapid@mail.com', 65182515, 'Vienna', 1230, 'Liesinger Straße 185', 'https://www.wien.gv.at/kultur-freizeit/', 3),
(7, 'Orphée et Eurydice', '2022-01-01 10:00:00', 'Nice', 'https://klassik-begeistert.de/wp-content/uploads/stueck-3476-original.png', 10000, 'chritoph@mail.com', 684515, 'Vienna', 1010, 'Theater wien', 'https://klassik-begeistert.de/wp-content/uploads/stueck-3476-original.png', 4),
(8, 'Amelie Lens', '2021-10-28 00:30:00', 'Techno Music', 'https://media.timeout.com/images/105585235/image.jpg', 10000, 'lens@mail.com', 684525, 'Vienna', 1180, 'Stadthalle 98', 'https://www.wien.gv.at/kultur-freizeit/', 2),
(9, 'No Time To Die', '2021-11-17 20:30:00', 'James Bond', 'https://cdn.mos.cms.futurecdn.net/eWrP8oLwn53pBYgUTQXZ6K.jpg', 1000, 'movie@mail.com', 6548524, 'Vienna', 1100, 'Schwedenplatz 8', 'https://www.wien.gv.at/kultur-freizeit/', 1),
(10, 'La concordia de\' pianeti', '2021-09-08 17:00:00', 'Antonio Caldara', 'https://www.opera-online.com/media/images/avatar/production/5000/avatar.jpg', 1500, 'theater@mail.com', 615585455, 'Vienna', 1010, 'Theater wien', 'https://www.wien.gv.at/kultur-freizeit/', 4),
(11, 'FK Austria Wien', '2021-11-10 17:30:00', 'Wien Football', 'https://www.gastronauten.at/referenzen/fk-austria-wien/austria1.jpg/@@images/b50351f5-c558-46e6-a58f-234f5a5497ef.jpeg', 45000, 'fkwien@mail.com', 665452545, 'Viena', 1220, 'Stadion Wien', 'https://www.wien.gv.at/kultur-freizeit/', 3);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `typename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `typename`) VALUES
(1, 'Movie'),
(2, 'Music'),
(3, 'Sport'),
(4, 'Theater');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5387574A3563B1BF` (`fk_type_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `FK_5387574A3563B1BF` FOREIGN KEY (`fk_type_id`) REFERENCES `type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
