/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.20-13.0.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: exploresaudi
-- ------------------------------------------------------
-- Server version	13.0.2-MariaDB-ubu2604

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES
(1,'admin','$2y$12$.ILexKhbGwipHkXHDNDpTO7xsxK/jaOqTV.rY1ddo57Nr0eQqlNSW');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES
(1,'مدينة الرياض','تعتبر الرياض العاصمة الإدارية والاقتصادية للمملكة. تجمع المدينة بين الأبراج الحديثة والمراكز التجارية الكبرى وبين المعالم التاريخية العريقة مثل حي الطريف في الدرعية، وتقدم فعاليات ومواسم ترفيهية متنوعة طوال العام.','images/مدينة الرياضHEAD.jpg'),
(2,'مدينة جدة','ثاني أكبر مدن المملكة العربية السعودية، وواحدةً من أهم مراكزها الاقتصادية والسياحية وثاني عواصمها التجارية. تقع في غرب المملكة على ساحل البحر الأحمر، وتلعب دوراً تاريخياً وحضارياً كبيراً كونها البوابة الرئيسية للحرمين الشريفين وقاصدي مكة المكرمة','images/مدينة جدةHEAD.jpg'),
(7,'ssss','hhhhhhhhhhhh','images/ssssHEAD.jpg'),
(11,'wow','huh','images/wowHEAD.jpg');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `famous`
--

DROP TABLE IF EXISTS `famous`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `famous` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(10) unsigned NOT NULL,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_famous_city` (`city_id`),
  CONSTRAINT `fk_famous_city` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `famous`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `famous` WRITE;
/*!40000 ALTER TABLE `famous` DISABLE KEYS */;
INSERT INTO `famous` VALUES
(1,1,'برج المملكة'),
(2,1,'الدرعية'),
(3,1,'المعيقلية'),
(4,2,'نافورة الملك فهد'),
(5,2,'جدة التاريخية (البلد)'),
(6,2,'كورنيش جدة'),
(7,2,'مسجد الرحمة (المسجد العائم)'),
(28,7,'ج'),
(29,7,'ح'),
(30,7,'خ'),
(35,11,'رحمة، بركات');
/*!40000 ALTER TABLE `famous` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(10) unsigned NOT NULL,
  `image_path` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gallery_city` (`city_id`),
  CONSTRAINT `fk_gallery_city` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
INSERT INTO `gallery` VALUES
(1,1,'images/مدينة الرياض/almuaqliah.png'),
(2,1,'images/مدينة الرياض/diryah.png'),
(3,1,'images/مدينة الرياض/Tower.jpg'),
(4,2,'images/مدينة جدة/alblad.jpg'),
(5,2,'images/مدينة جدة/cornicheJeddah.jpg'),
(6,2,'images/مدينة جدة/kingFN.jpg'),
(7,2,'images/مدينة جدة/rahmaM.jpg'),
(8,7,'images/ssss/solder-fumes-v0-oynef8kxbdeh1.webp'),
(14,11,'images/wow/Wu_cover.webp.webp'),
(15,11,'images/wow/Screenshot 2026-10-12 at 15-22-57 Class Collaborate.png.png');
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Table structure for table `general`
--

DROP TABLE IF EXISTS `general`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `general` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(10) unsigned NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_general_city` (`city_id`),
  CONSTRAINT `fk_general_city` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general`
--

SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT, @@AUTOCOMMIT=0;
LOCK TABLES `general` WRITE;
/*!40000 ALTER TABLE `general` DISABLE KEYS */;
INSERT INTO `general` VALUES
(1,1,'مدينة سياحية'),
(2,1,'تحوي فعاليات عديدة'),
(3,1,'تتواجد بها معظم الشركات الكبرى'),
(4,2,'بوابة الحرمين الشريفين'),
(5,2,'تلقب بعروس البحر الأحمر'),
(6,2,'تتميز بتاريخها العريق والحديث'),
(32,7,'أ'),
(33,7,'ب'),
(34,7,'ت'),
(39,11,'السلام'),
(40,11,'عليكم');
/*!40000 ALTER TABLE `general` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;
SET AUTOCOMMIT=@OLD_AUTOCOMMIT;

--
-- Dumping routines for database 'exploresaudi'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-11-07 19:31:54
