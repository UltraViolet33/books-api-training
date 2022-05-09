-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour api-php
CREATE DATABASE IF NOT EXISTS `api-php` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `api-php`;

-- Listage de la structure de la table api-php. books
CREATE TABLE IF NOT EXISTS `books` (
  `id_books` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `isRead` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_books`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table api-php.books : ~0 rows (environ)
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` (`id_books`, `title`, `author`, `isRead`) VALUES
	(1, 'test', 'test1', 0),
	(2, 'test2', 'test2', 0);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;

-- Listage de la structure de la table api-php. books_categories
CREATE TABLE IF NOT EXISTS `books_categories` (
  `id_books` int(11) NOT NULL,
  `id_categories` int(11) NOT NULL,
  PRIMARY KEY (`id_books`,`id_categories`),
  KEY `id_categories` (`id_categories`),
  CONSTRAINT `books_categories_ibfk_1` FOREIGN KEY (`id_books`) REFERENCES `books` (`id_books`),
  CONSTRAINT `books_categories_ibfk_2` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id_categories`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table api-php.books_categories : ~0 rows (environ)
/*!40000 ALTER TABLE `books_categories` DISABLE KEYS */;
INSERT INTO `books_categories` (`id_books`, `id_categories`) VALUES
	(1, 1),
	(2, 1),
	(2, 2);
/*!40000 ALTER TABLE `books_categories` ENABLE KEYS */;

-- Listage de la structure de la table api-php. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categories` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categories`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table api-php.categories : ~0 rows (environ)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id_categories`, `name`) VALUES
	(1, 'cat1'),
	(2, 'cat2');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
