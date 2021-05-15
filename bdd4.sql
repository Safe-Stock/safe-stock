-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage de la structure de la table filesranks. appartient_mot-cle
CREATE TABLE IF NOT EXISTS `appartient_mot-cle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_doc` int(11) NOT NULL,
  `id_keyword_1` int(11) DEFAULT NULL,
  `id_keyword_2` int(11) DEFAULT NULL,
  `id_keyword_3` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Listage des données de la table filesranks.appartient_mot-cle : ~3 rows (environ)
/*!40000 ALTER TABLE `appartient_mot-cle` DISABLE KEYS */;
INSERT INTO `appartient_mot-cle` (`id`, `id_doc`, `id_keyword_1`, `id_keyword_2`, `id_keyword_3`) VALUES
	(1, 1, 1, NULL, NULL),
	(10, 3, 3, 5, 4),
	(11, 4, 4, 6, NULL);
/*!40000 ALTER TABLE `appartient_mot-cle` ENABLE KEYS */;

-- Listage de la structure de la table filesranks. document
CREATE TABLE IF NOT EXISTS `document` (
  `IdDoc` int(11) NOT NULL AUTO_INCREMENT,
  `NomDoc` varchar(50) NOT NULL DEFAULT '0',
  `TypeDoc` varchar(15) NOT NULL DEFAULT '0',
  `DescriptionDoc` varchar(150) NOT NULL DEFAULT '0',
  `DateImportationDoc` date DEFAULT NULL,
  `ValidationDoc` date DEFAULT NULL,
  `TailleDoc` float NOT NULL DEFAULT '0',
  `IdUtil` int(11) DEFAULT NULL,
  `IdTheme` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdDoc`),
  KEY `IdUtil` (`IdUtil`),
  KEY `IdTheme` (`IdTheme`),
  CONSTRAINT `IdTheme` FOREIGN KEY (`IdTheme`) REFERENCES `theme` (`IdTheme`),
  CONSTRAINT `IdUtil` FOREIGN KEY (`IdUtil`) REFERENCES `utilisateur` (`IdUtil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table filesranks.document : ~4 rows (environ)
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
INSERT INTO `document` (`IdDoc`, `NomDoc`, `TypeDoc`, `DescriptionDoc`, `DateImportationDoc`, `ValidationDoc`, `TailleDoc`, `IdUtil`, `IdTheme`) VALUES
	(1, 'DocuTest', 'pdf', 'Un super document test 2', '2021-02-02', '2021-02-02', 50, 2, 1),
	(2, 'Cours Cyber', 'doc', 'Le dernier cours de cyber sécurité', '2021-02-26', '2021-02-26', 25, 2, 5),
	(3, 'TP Debian 10', 'pdf', 'Doc pour l\'installation de Debian', '2021-05-15', '2021-05-15', 529702, 2, 2),
	(4, 'Cours Routage VLAN', 'docx', 'Cours sur les vlan', '2021-05-15', '2021-05-15', 79410, 2, 2);
/*!40000 ALTER TABLE `document` ENABLE KEYS */;

-- Listage de la structure de la table filesranks. mot-cle
CREATE TABLE IF NOT EXISTS `mot-cle` (
  `IdMC` int(11) NOT NULL AUTO_INCREMENT,
  `NomMC` varchar(30) NOT NULL DEFAULT '0',
  `ValidationMC` date DEFAULT NULL,
  PRIMARY KEY (`IdMC`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table filesranks.mot-cle : ~6 rows (environ)
/*!40000 ALTER TABLE `mot-cle` DISABLE KEYS */;
INSERT INTO `mot-cle` (`IdMC`, `NomMC`, `ValidationMC`) VALUES
	(1, 'C#', '2021-02-02'),
	(2, 'PHP', '2020-02-01'),
	(3, 'Linux', '2021-05-15'),
	(4, 'Windows', '2021-05-15'),
	(5, 'ISO', '2021-05-15'),
	(6, 'Adressage IP', '2021-05-15');
/*!40000 ALTER TABLE `mot-cle` ENABLE KEYS */;

-- Listage de la structure de la table filesranks. parametrevolume
CREATE TABLE IF NOT EXISTS `parametrevolume` (
  `IdVolume` int(11) NOT NULL AUTO_INCREMENT,
  `NomVolume` varchar(30) NOT NULL DEFAULT '0',
  `VolumeUtiliser` float NOT NULL DEFAULT '0',
  `VolumeRestant` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdVolume`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table filesranks.parametrevolume : ~0 rows (environ)
/*!40000 ALTER TABLE `parametrevolume` DISABLE KEYS */;
/*!40000 ALTER TABLE `parametrevolume` ENABLE KEYS */;

-- Listage de la structure de la table filesranks. profil
CREATE TABLE IF NOT EXISTS `profil` (
  `IdProfil` int(11) NOT NULL AUTO_INCREMENT,
  `NomProfil` varchar(30) NOT NULL DEFAULT '0',
  `CodeProfil` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdProfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table filesranks.profil : ~3 rows (environ)
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
INSERT INTO `profil` (`IdProfil`, `NomProfil`, `CodeProfil`) VALUES
	(1, 'Admin', NULL),
	(2, 'Professeur', NULL),
	(3, 'Eleve', NULL);
/*!40000 ALTER TABLE `profil` ENABLE KEYS */;

-- Listage de la structure de la table filesranks. theme
CREATE TABLE IF NOT EXISTS `theme` (
  `IdTheme` int(11) NOT NULL AUTO_INCREMENT,
  `NomTheme` varchar(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdTheme`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table filesranks.theme : ~5 rows (environ)
/*!40000 ALTER TABLE `theme` DISABLE KEYS */;
INSERT INTO `theme` (`IdTheme`, `NomTheme`) VALUES
	(1, 'SLAM'),
	(2, 'SISR'),
	(3, 'MATH'),
	(4, 'CEJM'),
	(5, 'Cybersécurité');
/*!40000 ALTER TABLE `theme` ENABLE KEYS */;

-- Listage de la structure de la table filesranks. utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `IdUtil` int(11) NOT NULL AUTO_INCREMENT,
  `IdentifiantUtil` varchar(55) NOT NULL,
  `NomUtil` varchar(30) NOT NULL DEFAULT '0',
  `PrenomUtil` varchar(30) NOT NULL DEFAULT '0',
  `MailUtil` varchar(70) NOT NULL DEFAULT '0',
  `MdpUtil` varchar(200) NOT NULL DEFAULT '0',
  `AvatarUtil` varchar(30) NOT NULL DEFAULT 'base.png',
  `IdProfil` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdUtil`),
  KEY `IdProfil` (`IdProfil`),
  CONSTRAINT `IdProfil` FOREIGN KEY (`IdProfil`) REFERENCES `profil` (`IdProfil`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Listage des données de la table filesranks.utilisateur : ~4 rows (environ)
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` (`IdUtil`, `IdentifiantUtil`, `NomUtil`, `PrenomUtil`, `MailUtil`, `MdpUtil`, `AvatarUtil`, `IdProfil`) VALUES
	(1, 'C.Steve', 'Cube', 'Steve', 'Steve.cube@hotmail.com', '$2y$10$CXCcP0cSn2pPdZYNdMtRXuDK0zDLT9l.7dyWvXWASCjmLhd7vyJZ2', '1615372969.jpg', 3),
	(2, 'root', 'root', ' ', 'root@root.fr', '$2y$10$vtpN.O33BytMrjemPuqOF.SDgknVW6TEjja1qNZaazkVeucpF2c9C', '1615372534.png', 1),
	(35, 'Memmanuel', 'MACRON', 'Emmanuel', '0', '$2y$10$ooUxVpt2.MldUnycJss0mO.S1HvpTaQd6DTLgAyi9a.7tsjdwJljy', 'base.png', 3),
	(36, 'Volivier', 'VERAN', 'Olivier', '0', '$2y$10$TbGGABVF.nmefKWVZc5YmeteDlna5jJFg3c.yKvxzslWOBfEyAp1G', 'base.png', 3);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
