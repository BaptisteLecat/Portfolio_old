-- Adminer 4.8.1 MySQL 8.3.0 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `activity_id` int NOT NULL AUTO_INCREMENT,
  `activity_title` varchar(255) NOT NULL,
  `activity_date` varchar(255) NOT NULL,
  `activity_picture` text NOT NULL,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `activity` (`activity_id`, `activity_title`, `activity_date`, `activity_picture`) VALUES
(1,	'BTS SIO',	'2020-2021',	'004-diploma.svg'),
(2,	'SUPER U',	'Juin 2020',	'014-shopping_basket.svg');

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_label` varchar(255) NOT NULL,
  `category_picture` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `category` (`category_id`, `category_label`, `category_picture`) VALUES
(1,	'Web',	'027-web_development.svg');

DROP TABLE IF EXISTS `category_technology`;
CREATE TABLE `category_technology` (
  `category_id` int NOT NULL,
  `technology_id` int NOT NULL,
  PRIMARY KEY (`category_id`,`technology_id`),
  KEY `constraintCT_technology` (`technology_id`),
  CONSTRAINT `constraintCT_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `constraintCT_technology` FOREIGN KEY (`technology_id`) REFERENCES `technology` (`technology_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `category_technology` (`category_id`, `technology_id`) VALUES
(1,	1);

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `course_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`course_id`),
  CONSTRAINT `constraintCourse_idCourse` FOREIGN KEY (`course_id`) REFERENCES `activity` (`activity_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `course` (`course_id`) VALUES
(1);

DROP TABLE IF EXISTS `discussion`;
CREATE TABLE `discussion` (
  `discussion_id` int NOT NULL AUTO_INCREMENT,
  `discussion_content` text NOT NULL,
  `discussion_idsender` int NOT NULL,
  PRIMARY KEY (`discussion_id`),
  KEY `constraintDiscussion_idProfile` (`discussion_idsender`),
  CONSTRAINT `constraintDiscussion_idProfile` FOREIGN KEY (`discussion_idsender`) REFERENCES `profile` (`profile_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `discussion` (`discussion_id`, `discussion_content`, `discussion_idsender`) VALUES
(1,	'Bonjour je suis heureux de vous rencontrer, bienvenue sur mon Portfolio !',	1),
(2,	'Passionné par l’informatique, le développement, l’UX et UI. Je souhaite vous proposez un expérience originale sur mon site.',	1),
(3,	'Bonne visite !',	1);

DROP TABLE IF EXISTS `experience`;
CREATE TABLE `experience` (
  `experience_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`experience_id`),
  CONSTRAINT `constraintExperience_idExperience` FOREIGN KEY (`experience_id`) REFERENCES `activity` (`activity_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `experience` (`experience_id`) VALUES
(2);

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `profile_id` int NOT NULL AUTO_INCREMENT,
  `profile_name` varchar(255) NOT NULL,
  `profile_firstname` varchar(255) NOT NULL,
  `profile_birthday` date NOT NULL,
  `profile_picture` text NOT NULL,
  `profile_cv` text,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `profile` (`profile_id`, `profile_name`, `profile_firstname`, `profile_birthday`, `profile_picture`, `profile_cv`) VALUES
(1,	'Lecat',	'Baptiste',	'2001-10-26',	'baptisteLecat.png',	NULL);

DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `project_id` int NOT NULL AUTO_INCREMENT,
  `project_title` varchar(255) NOT NULL,
  `project_content` text NOT NULL,
  `project_picture` text NOT NULL,
  `project_startdate` date NOT NULL,
  `project_enddate` date DEFAULT NULL,
  `project_categoryId` int NOT NULL,
  `project_thumbnail` varchar(255) NOT NULL,
  `project_mainlink` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `project_infolink` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`project_id`),
  KEY `constraintProject_idCategory` (`project_categoryId`),
  CONSTRAINT `constraintProject_idCategory` FOREIGN KEY (`project_categoryId`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `project` (`project_id`, `project_title`, `project_content`, `project_picture`, `project_startdate`, `project_enddate`, `project_categoryId`, `project_thumbnail`, `project_mainlink`, `project_infolink`) VALUES
(1,	'Todo',	'Une application Web.',	'todo.png',	'2021-05-26',	NULL,	1,	'016-user interface.svg',	'',	'');

DROP TABLE IF EXISTS `project_technology`;
CREATE TABLE `project_technology` (
  `project_id` int NOT NULL,
  `technology_id` int NOT NULL,
  PRIMARY KEY (`project_id`,`technology_id`),
  KEY `constraintPT_idTechnology` (`technology_id`),
  CONSTRAINT `constraintPT_idProject` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `constraintPT_idTechnology` FOREIGN KEY (`technology_id`) REFERENCES `technology` (`technology_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `project_technology` (`project_id`, `technology_id`) VALUES
(1,	1);

DROP TABLE IF EXISTS `socialnetwork`;
CREATE TABLE `socialnetwork` (
  `socialnetwork_id` int NOT NULL AUTO_INCREMENT,
  `socialnetwork_label` varchar(255) NOT NULL,
  `socialnetwork_picture` text NOT NULL,
  `socialnetwork_link` text NOT NULL,
  `socialnetwork_active` tinyint NOT NULL,
  PRIMARY KEY (`socialnetwork_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `socialnetwork` (`socialnetwork_id`, `socialnetwork_label`, `socialnetwork_picture`, `socialnetwork_link`, `socialnetwork_active`) VALUES
(1,	'Youtube',	'test',	'erer',	0);

DROP TABLE IF EXISTS `technology`;
CREATE TABLE `technology` (
  `technology_id` int NOT NULL AUTO_INCREMENT,
  `technology_label` varchar(255) NOT NULL,
  `technology_picture` text NOT NULL,
  PRIMARY KEY (`technology_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `technology` (`technology_id`, `technology_label`, `technology_picture`) VALUES
(1,	'PHP',	'027-php.svg'),
(2,	'Javascript',	'029-javascript.svg');

-- 2024-06-05 14:01:35
