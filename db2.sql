-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: dbkalibrasi
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.16.04.1

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
-- Table structure for table `bidang`
--

DROP TABLE IF EXISTS `bidang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bidang` (
  `idbidang` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `deskripsi` varchar(250) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idbidang`),
  UNIQUE KEY `judul` (`judul`),
  KEY `fk_id_bidang` (`id`),
  CONSTRAINT `fk_id_bidang` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bidang`
--

LOCK TABLES `bidang` WRITE;
/*!40000 ALTER TABLE `bidang` DISABLE KEYS */;
INSERT INTO `bidang` VALUES (7,'Kalibrasi Gaya','Kalibrasi Gaya','2018-09-23 16:44:02',1),(8,'Kalibrasi Tekanan','Kalibrasi Tekanan','2018-09-23 16:44:17',1),(9,'Kalibrasi Suhu','Kalibrasi Suhu','2018-09-23 16:44:37',1),(10,'Kalibrasi Masa & Timbangan','Kalibrasi Masa dan Timbangan','2018-09-23 16:45:02',1),(11,'Kalibrasi Volumetrik','Kalibrasi Volumetrik','2018-09-23 16:45:23',1),(12,'Kalibrasi Instrumen Analisa','Kalibrasi Instrumen Analisa','2018-09-23 16:47:14',1),(13,'Kalibrasi Dimensi','Kalibrasi Kelistrikan','2018-09-23 16:47:39',1),(14,'Kalibrasi Kelistrikan','Kalibrasi Kelistrikan','2018-09-23 16:47:55',1);
/*!40000 ALTER TABLE `bidang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kalibrasi`
--

DROP TABLE IF EXISTS `kalibrasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kalibrasi` (
  `idkalibrasi` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_seri` varchar(250) NOT NULL,
  `nama_alat` varchar(250) NOT NULL,
  `rentang_ukur` varchar(250) NOT NULL,
  `interval_pengecekan` int(3) NOT NULL,
  `interval_kalibrasi` int(3) NOT NULL,
  `lembaga_kalibrasi` varchar(250) NOT NULL,
  `hasil_kalibrasi` enum('ok','x') NOT NULL DEFAULT 'x',
  `jadwal_perawatan_rutin` varchar(250) NOT NULL,
  `terakhir_perawatan` date NOT NULL,
  `pic` varchar(250) NOT NULL,
  `status` enum('baik','tidak baik') NOT NULL DEFAULT 'baik',
  `keterangan` varchar(250) DEFAULT NULL,
  `id` int(10) unsigned NOT NULL,
  `idbidang` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idkalibrasi`),
  KEY `fk_id_kalibrasi` (`id`),
  KEY `fk_idkalibrasi_bidang` (`idbidang`),
  CONSTRAINT `fk_id_kalibrasi` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_idkalibrasi_bidang` FOREIGN KEY (`idbidang`) REFERENCES `bidang` (`idbidang`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kalibrasi`
--

LOCK TABLES `kalibrasi` WRITE;
/*!40000 ALTER TABLE `kalibrasi` DISABLE KEYS */;
INSERT INTO `kalibrasi` VALUES (6,'5224','Proving Ring, MOREHOUSE','300 lbf',1,2,'Putlit Metrologi LIPI','ok','6 bulan','2016-09-01','Sudrajat','baik','-',1,7);
/*!40000 ALTER TABLE `kalibrasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@gmail.com','$2y$10$9A4mb7s7DNQ7kuxIi4pBe.nYE58zunvgLE/e4TJ8tW3MKL6pVZzC6','wtXM5Mfxt7558tTwShKFSf2i9hII7dZADZkULzeFAA33aNlnmZp7ZTlq8nH4','2018-09-03 02:31:12','2018-09-03 02:31:12'),(2,'Ahmad Apandi Mulya','aam@gmail.com','$2y$10$sVmpRI8R8pquExUs1xXVU.vSQ0dNPv1CSrSG9DyizLoACMWNxXdMa',NULL,'2018-09-16 20:18:24','2018-09-16 20:18:24');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-24  0:34:24
