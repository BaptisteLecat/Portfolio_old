-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 27 mai 2021 à 09:37
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `portfolio`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `INSERT_COURSE`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_COURSE` (IN `_title` VARCHAR(255), IN `_date` VARCHAR(255), IN `_picture` VARCHAR(255))  BEGIN
	DECLARE _activityId integer unsigned default null; -- valeur de retour pour connaitre l'id de l'insertion.

	INSERT INTO activity (activity_title, activity_date, activity_picture) VALUES (_title, _date, _picture); -- Insertion des valeurs dans la table mère
    set _activityId = last_insert_id(); -- récupération de l'id pour donné le meme id à la table fille
    INSERT INTO course (course_id) VALUES (_activityId); -- insertion dans la table fille

	SELECT _activityId; -- retour de l'id
END$$

DROP PROCEDURE IF EXISTS `INSERT_EXPERIENCE`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_EXPERIENCE` (IN `_title` VARCHAR(255), IN `_date` VARCHAR(255), IN `_picture` VARCHAR(255))  BEGIN
	DECLARE _activityId integer unsigned default null; -- valeur de retour pour connaitre l'id de l'insertion.

	INSERT INTO activity (activity_title, activity_date, activity_picture) VALUES (_title, _date, _picture); -- Insertion des valeurs dans la table mère
    set _activityId = last_insert_id(); -- récupération de l'id pour donné le meme id à la table fille
    INSERT INTO experience (experience_id) VALUES (_activityId); -- insertion dans la table fille

	SELECT _activityId; -- retour de l'id
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_title` varchar(255) NOT NULL,
  `activity_date` varchar(255) NOT NULL,
  `activity_picture` text NOT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `activity`
--

INSERT INTO `activity` (`activity_id`, `activity_title`, `activity_date`, `activity_picture`) VALUES
(1, 'BTS SIO', '2020-2021', 'test'),
(2, 'SUPER U', 'Juin 2020', 'yt');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_label` varchar(255) NOT NULL,
  `category_picture` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`category_id`, `category_label`, `category_picture`) VALUES
(1, 'Web', 'web');

-- --------------------------------------------------------

--
-- Structure de la table `category_technology`
--

DROP TABLE IF EXISTS `category_technology`;
CREATE TABLE IF NOT EXISTS `category_technology` (
  `category_id` int(11) NOT NULL,
  `technology_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`,`technology_id`),
  KEY `constraintCT_technology` (`technology_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category_technology`
--

INSERT INTO `category_technology` (`category_id`, `technology_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `course`
--

INSERT INTO `course` (`course_id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `discussion`
--

DROP TABLE IF EXISTS `discussion`;
CREATE TABLE IF NOT EXISTS `discussion` (
  `discussion_id` int(11) NOT NULL AUTO_INCREMENT,
  `discussion_content` text NOT NULL,
  `discussion_idsender` int(11) NOT NULL,
  PRIMARY KEY (`discussion_id`),
  KEY `constraintDiscussion_idProfile` (`discussion_idsender`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `discussion`
--

INSERT INTO `discussion` (`discussion_id`, `discussion_content`, `discussion_idsender`) VALUES
(1, 'Bonjour je suis heureux de vous rencontrer, bienvenue sur mon Portfolio !', 1),
(2, 'Passionné par l’informatique, le développement, l’UX et UI. Je souhaite vous proposez un expérience originale sur mon site.', 1),
(3, 'Bonne visite !', 1);

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `experience_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`experience_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`experience_id`) VALUES
(2);

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_name` varchar(255) NOT NULL,
  `profile_firstname` varchar(255) NOT NULL,
  `profile_birthday` date NOT NULL,
  `profile_picture` text NOT NULL,
  `profile_cv` text,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profile`
--

INSERT INTO `profile` (`profile_id`, `profile_name`, `profile_firstname`, `profile_birthday`, `profile_picture`, `profile_cv`) VALUES
(1, 'Lecat', 'Baptiste', '2001-10-26', 'ser', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_title` varchar(255) NOT NULL,
  `project_content` text NOT NULL,
  `project_picture` text NOT NULL,
  `project_startdate` date NOT NULL,
  `project_enddate` date DEFAULT NULL,
  `project_categoryId` int(11) NOT NULL,
  PRIMARY KEY (`project_id`),
  KEY `constraintProject_idCategory` (`project_categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `project`
--

INSERT INTO `project` (`project_id`, `project_title`, `project_content`, `project_picture`, `project_startdate`, `project_enddate`, `project_categoryId`) VALUES
(1, 'Todo', 'Une application Web.', 'test', '2021-05-26', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `project_technology`
--

DROP TABLE IF EXISTS `project_technology`;
CREATE TABLE IF NOT EXISTS `project_technology` (
  `project_id` int(11) NOT NULL,
  `technology_id` int(11) NOT NULL,
  PRIMARY KEY (`project_id`,`technology_id`),
  KEY `constraintPT_idTechnology` (`technology_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `project_technology`
--

INSERT INTO `project_technology` (`project_id`, `technology_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `socialnetwork`
--

DROP TABLE IF EXISTS `socialnetwork`;
CREATE TABLE IF NOT EXISTS `socialnetwork` (
  `socialnetwork_id` int(11) NOT NULL AUTO_INCREMENT,
  `socialnetwork_label` varchar(255) NOT NULL,
  `socialnetwork_picture` text NOT NULL,
  `socialnetwork_link` text NOT NULL,
  PRIMARY KEY (`socialnetwork_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `socialnetwork`
--

INSERT INTO `socialnetwork` (`socialnetwork_id`, `socialnetwork_label`, `socialnetwork_picture`, `socialnetwork_link`) VALUES
(1, 'Youtube', 'test', 'erer');

-- --------------------------------------------------------

--
-- Structure de la table `technology`
--

DROP TABLE IF EXISTS `technology`;
CREATE TABLE IF NOT EXISTS `technology` (
  `technology_id` int(11) NOT NULL AUTO_INCREMENT,
  `technology_label` varchar(255) NOT NULL,
  `technology_picture` text NOT NULL,
  PRIMARY KEY (`technology_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `technology`
--

INSERT INTO `technology` (`technology_id`, `technology_label`, `technology_picture`) VALUES
(1, 'PHP', 'php'),
(2, 'Laravel', 'Laravel');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `category_technology`
--
ALTER TABLE `category_technology`
  ADD CONSTRAINT `constraintCT_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraintCT_technology` FOREIGN KEY (`technology_id`) REFERENCES `technology` (`technology_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `constraintCourse_idCourse` FOREIGN KEY (`course_id`) REFERENCES `activity` (`activity_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `discussion`
--
ALTER TABLE `discussion`
  ADD CONSTRAINT `constraintDiscussion_idProfile` FOREIGN KEY (`discussion_idsender`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `constraintExperience_idExperience` FOREIGN KEY (`experience_id`) REFERENCES `activity` (`activity_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `constraintProject_idCategory` FOREIGN KEY (`project_categoryId`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `project_technology`
--
ALTER TABLE `project_technology`
  ADD CONSTRAINT `constraintPT_idProject` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraintPT_idTechnology` FOREIGN KEY (`technology_id`) REFERENCES `technology` (`technology_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
