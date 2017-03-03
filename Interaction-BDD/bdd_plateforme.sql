-- MySQL dump 10.10
--
-- Host: localhost    Database: bdd_plateforme
-- ------------------------------------------------------
-- Server version	5.0.22-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Patient`
--

CREATE DATABASE bdd_plateforme;
USE bdd_plateforme;
DROP TABLE IF EXISTS `Patient`;
CREATE TABLE `Patient` (
  `id_patient` int(11) NOT NULL auto_increment,
  `date_ait_p` date NOT NULL DEFAULT '1970-01-01',  
  `nom_p` varchar(250) NOT NULL DEFAULT '',
  `prenom_p` varchar(250) NOT NULL DEFAULT '',
  `civilite_p` enum('M.','Mme') NOT NULL DEFAULT 'M.',
  `date_naissance` date NOT NULL DEFAULT '1970-01-01',    
  `mail_p` varchar(255) NOT NULL DEFAULT '',      
  `telephone_p` varchar(255) NOT NULL DEFAULT '',    
  `ville_p` varchar(255) NOT NULL DEFAULT '',
  `codePostal_p` varchar(5) NOT NULL DEFAULT '',       
  `adresse_p` varchar(255) NOT NULL DEFAULT '',
  `description_p` varchar(5000) NOT NULL DEFAULT '',
  `date_creation_dossier` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  `ID_medecin_traitant` int(11) NOT NULL , 
  `ID_medecin_autre` int(11) NOT NULL ,
  PRIMARY KEY  (`id_patient`),
  KEY `ID_medecin_traitant` (`ID_medecin_traitant`),
  KEY `ID_medecin_autre` (`ID_medecin_autre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Patient`
--


/*!40000 ALTER TABLE `Patient` DISABLE KEYS */;
/*LOCK TABLES `Patient` WRITE;
INSERT INTO `Patient` VALUES (1,'Pasteur','Vincent','Mr','1995-08-25','vincent.pasteur@insa-lyon.fr','0645345654','Savigny','77176', 'rue de ...',NOW(),1,2),(2,'Bardi','Luigi','Mr','1995-09-23','luigi.bardi@insa-lyon.fr','0632123454','Lyon','69006', 'place de ...',NOW(),1,3),(3,'Benchekroun','Amine','Mr','1995-02-12','amine.benchekroun@insa-lyon.fr','0712325411','Villeurbanne','69100', 'impasse de ...',NOW(),4,2),(4,'Billet','Melanie','Mme','1995-12-12','melanie.billet@insa-lyon.fr','0642525411','Paris','75000', 'impasse de ...',NOW(),1,2);
UNLOCK TABLES;*/
/*!40000 ALTER TABLE `Patient` ENABLE KEYS */;

--
-- Table structure for table `Medecin`
--

DROP TABLE IF EXISTS `Medecin`;
CREATE TABLE `Medecin` (
    
    `id_medecin` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `id_service` int(10) unsigned NOT NULL,
    `nom_m` varchar(255) NOT NULL DEFAUlT '',
    `prenom_m` varchar(255) NOT NULL,
    `mail_m` varchar(255) DEFAULT '',
    `ville_m` varchar(255) DEFAULT '',
    `codePostal_m` varchar(5) NOT NULL ,
    `adresse_m` varchar(255) DEFAULT '' , 
    `telephone_m` varchar(255)  DEFAULT '',
    `description_m` varchar(5000) NOT NULL DEFAULT '',
  
  PRIMARY KEY  (`id_medecin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Medecin`
--


/*!40000 ALTER TABLE `Medecin` DISABLE KEYS */;
/*LOCK TABLES `Medecin` WRITE;
INSERT INTO `Medecin` VALUES (1,'Tournesol','Jacques','jacques.tournesol@free.fr','0412654587','435'),(2,'Sheperd','Derek','derek.sheperd@wanadoo.fr','0154348709','541'),(3,'Maboule','Robert','robert.maboule@orange.fr','0423656567','321'),(4,'House','Gregory','gregory.house@gmail.com','0943543412','111');
UNLOCK TABLES;*/
/*!40000 ALTER TABLE `Medecin` ENABLE KEYS */;

--
-- Table structure for table `Centre_de_sante`
--

DROP TABLE IF EXISTS `Centre_de_sante`;
CREATE TABLE `Centre_de_sante` (
  `num_siret` int(11) unsigned NOT NULL,
  `nom_c` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY  (`num_siret`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Centre_de_sante`
--


/*!40000 ALTER TABLE `Centre_de_sante` DISABLE KEYS */;
LOCK TABLES `Centre_de_sante` WRITE;
INSERT INTO `Centre_de_sante` VALUES (967,'Hopital Lyon EST'),(334,'Hopital Lyon 6ème'),(112,'Clinique du Tonkin');
UNLOCK TABLES;
/*!40000 ALTER TABLE `Centre_de_sante` ENABLE KEYS */;

--
-- Table structure for table `Service`
--

DROP TABLE IF EXISTS `Service`;
CREATE TABLE `Service` (
  `id_service` int(11) NOT NULL auto_increment,
  `numSiret` varchar(255) NOT NULL DEFAULT '',
  `centre_s` varchar(255) NOT NULL DEFAULT '',
  `nom_s` varchar(255) NOT NULL DEFAULT '',
  `telephone_s` varchar(255) NOT NULL DEFAULT '',
  `horairesd_s` time NOT NULL DEFAULT '00:00:00',
  `horairesf_s` time NOT NULL DEFAULT '00:00:00',
  `adresse_s` varchar(255) NOT NULL DEFAULT '',  
  `codePostal_s` varchar(255) NOT NULL DEFAULT '', 
  `ville_s` varchar(255) NOT NULL DEFAULT '',
  `description_s` varchar(5000) NOT NULL DEFAULT '',
    
  PRIMARY KEY  (`id_service`),
  KEY `numSiret` (`numSiret`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Service`
--


/*!40000 ALTER TABLE `Service` DISABLE KEYS */;
/*LOCK TABLES `Service` WRITE;
INSERT INTO `Service` VALUES (1,967,'cardiologie','0423556768','10h-20h','20 rue de la fontaine','69100','Villeurbanne');
UNLOCK TABLES;*/
/*!40000 ALTER TABLE `Service` ENABLE KEYS */;

--
-- Table structure for table `Examen`
--

DROP TABLE IF EXISTS `Examen`;
CREATE TABLE `Examen` (
  `id_examen` int(11) NOT NULL auto_increment,
  `typeExamen` varchar(255) DEFAUlT '', 
  `details` varchar(255) DEFAUlT '',
  PRIMARY KEY  (`id_examen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Examen`
--


/*!40000 ALTER TABLE `Examen` DISABLE KEYS */;
/*LOCK TABLES `Examen` WRITE;
INSERT INTO `Examen` VALUES (1,'scan_cerebral',''),(2,'angioscan',''),(3,'bilanBiologique',''),(4,'bilanCardiaque','');
UNLOCK TABLES;*/
/*!40000 ALTER TABLE `Examen` ENABLE KEYS */;

--
-- Table structure for table `Examen_patient`
--

DROP TABLE IF EXISTS `Examen_patient`;
CREATE TABLE `Examen_patient` (
  `id_examen` int(11) NOT NULL,  
  `id_patient` int(11) NOT NULL,
  `num_siret` int(11) NOT NULL, 
  `date_examen` date default '0000-00-00',  
  `heure_examen` varchar(255) DEFAUlT '', 
  `planifie` enum('YES','NO') NOT NULL, 
  `effectue` enum('YES','NO') NOT NULL,
  KEY `id_examen` (`id_examen`),
  KEY `id_patient` (`id_patient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Examen_patient`
--


/*!40000 ALTER TABLE `Examen_patient` DISABLE KEYS */;
LOCK TABLES `Examen_patient` WRITE;
INSERT INTO `Examen_patient` VALUES (1,1,967,'','','NO','NO'),(2,1,967,'1995-08-25','14h','YES','NO'),(3,1,112,'1995-08-22','10h','YES','YES'),(1,2,967,'1995-03-22','17h','YES','YES');
UNLOCK TABLES;
/*!40000 ALTER TABLE `Examen_patient` ENABLE KEYS */;




/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
