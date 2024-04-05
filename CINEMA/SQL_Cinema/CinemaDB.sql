-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for cinema
CREATE DATABASE IF NOT EXISTS `cinema` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinema`;

-- Dumping structure for table cinema.acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sexe` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dateNaissance` datetime NOT NULL,
  PRIMARY KEY (`id_acteur`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cinema.acteur: ~7 rows (approximately)
INSERT INTO `acteur` (`id_acteur`, `nom`, `prenom`, `sexe`, `dateNaissance`) VALUES
	(1, 'McConaughey', 'Matthew', 'H', '1969-11-04 00:00:00'),
	(2, 'Hanks', 'Tom', 'H', '1956-07-09 00:00:00'),
	(3, 'Statham', 'Jason', 'H', '1967-07-26 00:00:00'),
	(4, 'Bale', 'Christian', 'H', '1974-03-01 00:00:00'),
	(5, 'LaBeouf', 'Shia', 'H', '1986-06-11 00:00:00'),
	(6, 'Fox', 'Megan', 'F', '1986-05-16 00:00:00'),
	(7, 'Wahlberg', 'Mark', 'H', '1971-06-05 00:00:00'),
	(8, 'Dujardin', 'Jean', 'H', '1972-07-19 00:00:00'),
	(9, 'Carrey', 'Jim', 'H', '1962-01-17 00:00:00'),
	(10, 'Atkinson', 'Rowan', 'H', '1955-01-06 00:00:00'),
	(11, 'Aure', 'Atika', 'F', '1970-07-12 00:00:00'),
	(12, 'Bejo', 'Bérénice', 'F', '1976-07-07 00:00:00');

-- Dumping structure for table cinema.categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_genre` int NOT NULL,
  `id_film` int NOT NULL,
  PRIMARY KEY (`id_genre`,`id_film`),
  KEY `FK_categorie_film` (`id_film`),
  CONSTRAINT `FK_categorie_film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `FK_categorie_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cinema.categorie: ~8 rows (approximately)
INSERT INTO `categorie` (`id_genre`, `id_film`) VALUES
	(1, 1),
	(3, 2),
	(4, 2),
	(5, 3),
	(6, 3),
	(5, 4),
	(6, 4),
	(3, 5),
	(5, 5),
	(7, 6),
	(1, 7),
	(1, 8);

-- Dumping structure for table cinema.film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `anneeSortie` int NOT NULL,
  `duree` int NOT NULL,
  `resumeFilm` text,
  `noteFilm` int DEFAULT NULL,
  `afficheFilm` varchar(255) DEFAULT NULL,
  `id_realisateur` int NOT NULL,
  PRIMARY KEY (`id_film`,`id_realisateur`) USING BTREE,
  KEY `FK_film_realisateur` (`id_realisateur`),
  CONSTRAINT `FK_film_realisateur` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cinema.film: ~5 rows (approximately)
INSERT INTO `film` (`id_film`, `titre`, `anneeSortie`, `duree`, `resumeFilm`, `noteFilm`, `afficheFilm`, `id_realisateur`) VALUES
	(1, 'Forrest Gump', 1994, 142, 'L\'histoire des États-Unis des années 1950 aux années 1970 se déroule du point de vue d\'un homme de l\'Alabama au QI de 75, qui aspire à retrouver son amour de jeunesse.', 5, NULL, 1),
	(2, 'Interstellar', 2014, 189, 'When Earth becomes uninhabitable in the future, a farmer and ex-NASA pilot, Joseph Cooper, is tasked to pilot a spacecraft, along with a team of researchers, to find a new planet for humans.', 4, NULL, 2),
	(3, 'The Beekeeper', 2024, 105, 'One man\'s brutal campaign for vengeance takes on national stakes after he is revealed to be a former operative of a powerful and clandestine organization known as "Beekeepers."', 3, NULL, 3),
	(4, 'The Dark Knight Rises', 2012, 185, 'Eight years after the Joker\'s reign of chaos, Batman is coerced out of exile with the assistance of the mysterious Selina Kyle in order to defend Gotham City from the vicious guerrilla terrorist Bane.', 4, NULL, 2),
	(5, 'Transformer 1', 2007, 165, 'An ancient struggle between two Cybertronian races, the heroic Autobots and the evil Decepticons, comes to Earth, with a clue to the ultimate power held by a teenager.', 2, NULL, 4),
	(6, 'OSS117', 2006, 99, 'Secret agent OSS 117 foils Nazis, beds local beauties, and brings peace to the Middle East.', 4, NULL, 5),
	(7, 'Mr.Bean\'s Holiday', 2007, 90, 'Mr. Bean wins a trip to Cannes where he unwittingly separates a young boy from his father and must help the two reunite. On the way he discovers France, bicycling, and true love.', 5, NULL, 6),
	(8, 'Ace Ventura', 1994, 86, 'A goofy detective specializing in animals goes in search of the missing mascot of the Miami Dolphins.', 4, NULL, 7);

-- Dumping structure for table cinema.genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `genreFilm` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cinema.genre: ~7 rows (approximately)
INSERT INTO `genre` (`id_genre`, `genreFilm`) VALUES
	(1, 'Comedy'),
	(2, 'Romance'),
	(3, 'Sci-fi'),
	(4, 'Adventure'),
	(5, 'Action'),
	(6, 'Thriller'),
	(7, 'Detective');

-- Dumping structure for table cinema.jouerole
CREATE TABLE IF NOT EXISTS `jouerole` (
  `id_film` int NOT NULL,
  `id_acteur` int NOT NULL,
  `id_role_personnage` int NOT NULL,
  PRIMARY KEY (`id_film`,`id_acteur`,`id_role_personnage`),
  KEY `FK_jouerole_acteur` (`id_acteur`),
  KEY `FK_jouerole_roleperso` (`id_role_personnage`),
  CONSTRAINT `FK_jouerole_acteur` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `FK_jouerole_film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE CASCADE,
  CONSTRAINT `FK_jouerole_roleperso` FOREIGN KEY (`id_role_personnage`) REFERENCES `roleperso` (`id_roleperso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cinema.jouerole: ~7 rows (approximately)
INSERT INTO `jouerole` (`id_film`, `id_acteur`, `id_role_personnage`) VALUES
	(2, 1, 7),
	(1, 2, 1),
	(3, 3, 5),
	(4, 4, 6),
	(5, 5, 4),
	(5, 6, 3),
	(5, 7, 2),
	(6, 8, 8),
	(8, 9, 11),
	(7, 10, 12),
	(6, 11, 10),
	(6, 12, 9);

-- Dumping structure for table cinema.realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `nomReal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenomReal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dateNaissanceReal` date NOT NULL,
  PRIMARY KEY (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cinema.realisateur: ~4 rows (approximately)
INSERT INTO `realisateur` (`id_realisateur`, `nomReal`, `prenomReal`, `dateNaissanceReal`) VALUES
	(1, 'Zemeckis', 'Robert', '1952-05-14'),
	(2, 'Nolan', 'Christopher', '1970-07-01'),
	(3, 'Ayer', 'David', '1967-07-26'),
	(4, 'Bay', 'Michael', '1965-02-17'),
	(5, 'Hazanavicius', 'Michel', '1967-03-29'),
	(6, 'Bendelack', 'Steve', '2007-04-18'),
	(7, 'Shadyac', 'Tom', '1958-12-11');

-- Dumping structure for table cinema.roleperso
CREATE TABLE IF NOT EXISTS `roleperso` (
  `id_roleperso` int NOT NULL AUTO_INCREMENT,
  `nomPerso` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_roleperso`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cinema.roleperso: ~7 rows (approximately)
INSERT INTO `roleperso` (`id_roleperso`, `nomPerso`) VALUES
	(1, 'Forrest Gump'),
	(2, 'Cade Yeager'),
	(3, 'Mikaela Banes'),
	(4, 'Sam Witwicky'),
	(5, 'Clay'),
	(6, 'Batman'),
	(7, 'Joseph Cooper'),
	(8, 'Hubert Boniss'),
	(9, 'Larmina El Akmar Betouche'),
	(10, 'La princesse Al Tarouk'),
	(11, 'Ace Ventura'),
	(12, 'Mr.Bean');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
