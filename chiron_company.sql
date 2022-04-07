-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 07, 2022 at 09:16 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chiron_company`
--

-- --------------------------------------------------------

--
-- Table structure for table `pozicija`
--

DROP TABLE IF EXISTS `pozicija`;
CREATE TABLE IF NOT EXISTS `pozicija` (
  `pozicija_id` int(11) NOT NULL AUTO_INCREMENT,
  `pozicija_name` varchar(255) COLLATE utf8mb4_slovak_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_slovak_ci,
  PRIMARY KEY (`pozicija_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;

--
-- Dumping data for table `pozicija`
--

INSERT INTO `pozicija` (`pozicija_id`, `pozicija_name`, `permissions`) VALUES
(1, 'programmer', NULL),
(2, 'designer', NULL),
(3, 'administrator', 'admin'),
(4, 'manager', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projekat`
--

DROP TABLE IF EXISTS `projekat`;
CREATE TABLE IF NOT EXISTS `projekat` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) COLLATE utf8mb4_slovak_ci NOT NULL,
  `project_description` text COLLATE utf8mb4_slovak_ci NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;

--
-- Dumping data for table `projekat`
--

INSERT INTO `projekat` (`project_id`, `project_name`, `project_description`) VALUES
(1, 'Finish website', 'Our website is almost complete! There are few finishing touches needed to be done ASAP.'),
(2, 'Install tracking code', 'Website is ready for analytics code installation. Have GDPR and its equivalents in mind!'),
(3, 'Organize party', 'We need to celebrate our new website! It will boost morale and reward everyone for hard work!'),
(4, 'Project', 'Project description');

-- --------------------------------------------------------

--
-- Table structure for table `zadatak`
--

DROP TABLE IF EXISTS `zadatak`;
CREATE TABLE IF NOT EXISTS `zadatak` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_foreign_id` int(11) NOT NULL,
  `task_description` varchar(255) COLLATE utf8mb4_slovak_ci NOT NULL,
  `employee_foreign_id` int(11) NOT NULL,
  `task_deadline` date NOT NULL,
  PRIMARY KEY (`task_id`),
  KEY `for_project` (`project_foreign_id`),
  KEY `in_charge` (`employee_foreign_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;

--
-- Dumping data for table `zadatak`
--

INSERT INTO `zadatak` (`task_id`, `project_foreign_id`, `task_description`, `employee_foreign_id`, `task_deadline`) VALUES
(1, 1, 'Create logo', 5, '2022-04-08'),
(2, 1, 'Add logo', 3, '2022-04-11'),
(4, 2, 'Install Facebook Pixel', 6, '2022-04-06'),
(5, 2, 'Install GTM', 6, '2022-04-17'),
(6, 3, 'Make invitations', 10, '2022-04-10'),
(7, 4, 'Something to do', 17, '2022-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `zaposleni`
--

DROP TABLE IF EXISTS `zaposleni`;
CREATE TABLE IF NOT EXISTS `zaposleni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_slovak_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_slovak_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_slovak_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_slovak_ci DEFAULT NULL,
  `position_id` int(11) NOT NULL DEFAULT '1',
  `salary` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `position_id` (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovak_ci;

--
-- Dumping data for table `zaposleni`
--

INSERT INTO `zaposleni` (`id`, `name`, `surname`, `email`, `password`, `position_id`, `salary`) VALUES
(3, 'Tobie', 'Gray', 'toby.gray@chiron.com', NULL, 1, 1150),
(5, 'David', 'Gilmour', 'david.gilmour@pinkfloyd.com', NULL, 2, 2000),
(6, 'Syd', 'Barrett', 'syd.berrett@pinkfloyd.com', NULL, 4, 1000),
(10, 'Grace', 'Slick', 'grace.slick@whiterabbit.com', NULL, 2, 2500),
(11, 'Admin', 'Smith', 'admin@chiron.com', 'a1d2m3i4n5', 3, 1500),
(14, 'Peter', 'Sando', 'peter.sando@gandalf.com', NULL, 2, 1500),
(15, 'Johnny', 'Lank', 'johnny.lank@theartoflovin.com', NULL, 2, 1000),
(16, 'Ringo', 'Starr', 'ringo.starr@thebeatles.com', NULL, 4, 1700),
(17, 'Ognjen', 'NediÄ‡', 'ognjen.nedic.infostud@gmail.com', NULL, 1, 2500);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `zadatak`
--
ALTER TABLE `zadatak`
  ADD CONSTRAINT `for_project` FOREIGN KEY (`project_foreign_id`) REFERENCES `projekat` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `in_charge` FOREIGN KEY (`employee_foreign_id`) REFERENCES `zaposleni` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD CONSTRAINT `position_id` FOREIGN KEY (`position_id`) REFERENCES `pozicija` (`pozicija_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
