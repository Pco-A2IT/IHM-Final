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
  `date_ait_p` date,  
  `nom_p` varchar(250) NOT NULL DEFAULT '',
  `prenom_p` varchar(250) NOT NULL DEFAULT '',
  `civilite_p` enum('M.','Mme') NOT NULL DEFAULT 'M.',
  `date_naissance` date,    
  `mail_p` varchar(255) DEFAULT '',      
  `telephone_p` varchar(255) DEFAULT '',    
  `adresse_p` varchar(255)  DEFAULT '',
  `codePostal_p` varchar(5) DEFAULT '',
  `ville_p` varchar(255) NOT NULL DEFAULT '',     
  `description_p` varchar(5000) NOT NULL DEFAULT '',
  `date_creation_dossier` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  `ID_medecin_traitant` int(11) NOT NULL , 
  `ID_medecin_autre` int(11) NOT NULL ,
  `recap1` enum('YES','NO') NOT NULL DEFAULT 'YES',
  `recap2` enum('YES','NO') NOT NULL DEFAULT 'YES',
  PRIMARY KEY  (`id_patient`),
  KEY `ID_medecin_traitant` (`ID_medecin_traitant`),
  KEY `ID_medecin_autre` (`ID_medecin_autre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Patient`
--


/*!40000 ALTER TABLE `Patient` DISABLE KEYS */;
/*LOCK TABLES `Patient` WRITE;
INSERT INTO `Patient` VALUES (1,'2017-04-09','Pasteur','Vincent','M.','1995-08-25','vincent.pasteur@insa-lyon.fr','0645345654','85 rue étoile','77176','Savigny','',NOW(),1,1,"YES","YES"),(2,'2017-03-09','Billet','Mélanie','Mme','1995-09-25','billet.melanie@insa-lyon.fr','0648545654','75 rue Alsace','69100','Villeurbanne','',NOW(),1,1,"YES","YES"), (3,'2017-03-28','Benchekroun','Amine','M.','1995-02-12','amine.benchekroun@insa-lyon.fr','0712325411','10 impasse Million','69100','Villeurbanne','',NOW(),2,2,"YES","YES"),(4,'2017-04-05','Combe','Eliot','M.','1996-02-12','eliot.combe@insa-lyon.fr','0717425411','12 cours zola','69100','Villeurbanne','',NOW(),2,2,"YES","YES");
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
    `specialite_m` varchar(255) DEFAULT '',
    `mail_m` varchar(255) DEFAULT '',
    `adresse_m` varchar(255) DEFAULT '' ,
    `codePostal_m` varchar(5) NOT NULL ,
    `ville_m` varchar(255) DEFAULT '',     
    `telephone_m` varchar(255)  DEFAULT '',
    `description_m` varchar(5000) DEFAULT '',
  
  PRIMARY KEY  (`id_medecin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Medecin`
--


/*!40000 ALTER TABLE `Medecin` DISABLE KEYS */;
LOCK TABLES `Medecin` WRITE;
INSERT INTO `Medecin` VALUES (1,0,'Tournesol','Jacques','Traitant','jacques.tournesol@free.fr','20 avenue Albert Einstein','69100','Villeurbanne','0412654587',''),(2,0,'Forestier','Benoît','Traitant','benoit.forestier@free.fr',' 1 Rue Constantine','69001','Lyon','0478695116',''),(3,0,'Godinot','Matthieu','Traitant','matthieu.godinot@free.fr','  35 Rue du Président Edouard Herriot','69002','Lyon','0478387690',''),(4,0,'Trouchet','Thomas','Traitant','thomas.trouchet@gmail.com','  35 cours Emile Zola','69100','Villeurbanne','0478387690','');
UNLOCK TABLES;
/*!40000 ALTER TABLE `Medecin` ENABLE KEYS */;


--
-- Table structure for table `Service`
--

DROP TABLE IF EXISTS `Service`;
CREATE TABLE `Service` (
  `id_service` int(11) NOT NULL auto_increment,
  `centre_s` varchar(255) NOT NULL DEFAULT '',
  `nom_s` varchar(255) NOT NULL DEFAULT '',
  `telephone_s` varchar(255) NOT NULL DEFAULT '',
  `horairesd_s` time NOT NULL DEFAULT '00:00',
  `horairesf_s` time NOT NULL DEFAULT '00:00',
  `adresse_s` varchar(255) NOT NULL DEFAULT '',  
  `codePostal_s` varchar(255) NOT NULL DEFAULT '', 
  `ville_s` varchar(255) NOT NULL DEFAULT '',
  `description_s` varchar(5000) NOT NULL DEFAULT '',
    `Hospitalisation de jour` enum('YES','NO') NOT NULL,
    `Angioscan` enum('YES','NO') NOT NULL,
    `IRM` enum('YES','NO') NOT NULL,
    `RDV Neurologique` enum('YES','NO') NOT NULL,
    `Scanner Cerebral` enum('YES','NO') NOT NULL,
    
  PRIMARY KEY  (`id_service`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Service`
--


/*!40000 ALTER TABLE `Service` DISABLE KEYS */;
LOCK TABLES `Service` WRITE;
INSERT INTO `Service` VALUES (1,"Hôpital Neurologique Pierre Wertheimer","Unité neurovasculaire",'0472112563','09:00', '17:00','59 Boulevard Pinel','69500 ','Bron','', 'YES','NO','NO','NO', 'NO');
INSERT INTO `Service` VALUES (2,"I.R.M Lyon-Villeurbanne","Unité neurovasculaire",'0472112563','09:00', '18:00','75 Rue Francis de Pressensé','69100 ','Villeurbanne','', 'NO', 'NO','NO','NO', 'NO');
INSERT INTO `Service` VALUES (3,"Hôpital de Bron","Hôpital Cardio-Vasculaire et Neurologique",'0472357862','09:00', '18:00','8 boulevard Pinel','69500 ','Bron','','NO', 'NO','NO','NO', 'NO');
INSERT INTO `Service` VALUES (4,"Centre de Radiologie","IRM Lyon Nord",'0472001234','07:00', '20:00','1-3 Chemin du Penthod ','69300 ','Caluire-et-Cuire','', 'NO','NO','NO','NO', 'NO');
INSERT INTO `Service` VALUES (5,"Clinique du Tonkin","Neurologie",'0472826702','07:00', '17:00','Bâtiment C 2ème étage 3 rue Phélypeaux ','69100 ','Villeurbanne','', 'NO','NO','NO','NO', 'NO');

UNLOCK TABLES;
/*!40000 ALTER TABLE `Service` ENABLE KEYS*/ ;

--
-- Table structure for table `Examen`
--

DROP TABLE IF EXISTS `Examen`;
CREATE TABLE `Examen` (
  `id_examen` int(11) NOT NULL auto_increment,
  `typeExamen` varchar(255) DEFAUlT '', 
  `details` varchar(255) DEFAUlT '',
  `neuro` ENUM("YES","NO") DEFAULT "NO",
  PRIMARY KEY  (`id_examen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Examen`
--


/*!40000 ALTER TABLE `Examen` DISABLE KEYS*/ ;
LOCK TABLES `Examen` WRITE;
INSERT INTO `Examen` VALUES (1,'Hospitalisation de jour','Prioritaire',"NO");
INSERT INTO `Examen` VALUES (2,'Angioscan','',"NO");
INSERT INTO `Examen` VALUES (3,'IRM','',"NO");
INSERT INTO `Examen` VALUES (4,'RDV Neurologique','Examen neurologique',"YES");
INSERT INTO `Examen` VALUES (5,'Scanner Cerebral','',"NO");

UNLOCK TABLES;
/*!40000 ALTER TABLE `Examen` ENABLE KEYS */;

--
-- Table structure for table `Examen_patient`
--

DROP TABLE IF EXISTS `Examen_patient`;
CREATE TABLE `Examen_patient` (
  `id_examen` int(11) NOT NULL,  
  `id_patient` int(11) NOT NULL,
    `id_service` int(11) NOT NULL,
  `date_examen` date NOT NULL default '0000-00-00',  
  `heure_examen` time NOT NULL DEFAULT '00:00',
  `effectue` enum('YES','NO') NOT NULL,
   `planifie_avant` enum('YES','NO') NOT NULL, 
    PRIMARY KEY  (`id_examen`, `id_patient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Examen_patient`
--


/*!40000 ALTER TABLE `Examen_patient` DISABLE KEYS */;

LOCK TABLES `Examen_patient` WRITE;
UNLOCK TABLES;




/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(255) DEFAUlT '', 
  `email` varchar(255) DEFAUlT '',
  `password` varchar(255) DEFAUlT '',
  `confirmation_token` varchar(60) DEFAUlT '',
  `confirmed_at` DATETIME,
  `last_connection` DATETIME,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;