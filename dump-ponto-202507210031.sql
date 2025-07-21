-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: 172.24.40.71    Database: ponto
-- ------------------------------------------------------
-- Server version	9.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_07_20_223050_create_registro_pontos_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro_pontos`
--

DROP TABLE IF EXISTS `registro_pontos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registro_pontos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `registro_pontos_user_id_foreign` (`user_id`),
  CONSTRAINT `registro_pontos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_pontos`
--

LOCK TABLES `registro_pontos` WRITE;
/*!40000 ALTER TABLE `registro_pontos` DISABLE KEYS */;
INSERT INTO `registro_pontos` VALUES (1,2,'2025-07-21 01:59:57','2025-07-17 10:15:00','2025-07-21 01:59:57'),(2,2,'2025-07-21 01:59:57','2025-07-21 09:26:00','2025-07-21 01:59:57'),(3,2,'2025-07-21 01:59:57','2025-07-18 08:42:00','2025-07-21 01:59:57'),(4,2,'2025-07-21 01:59:57','2025-07-13 09:15:00','2025-07-21 01:59:57'),(5,2,'2025-07-21 01:59:57','2025-07-19 09:13:00','2025-07-21 01:59:57'),(6,5,'2025-07-21 01:59:57','2025-07-16 08:42:00','2025-07-21 01:59:57'),(7,5,'2025-07-21 01:59:57','2025-07-13 08:40:00','2025-07-21 01:59:57'),(8,5,'2025-07-21 01:59:57','2025-07-14 10:07:00','2025-07-21 01:59:57'),(9,5,'2025-07-21 01:59:57','2025-07-18 08:21:00','2025-07-21 01:59:57'),(10,5,'2025-07-21 01:59:57','2025-07-21 08:14:00','2025-07-21 01:59:57'),(11,3,'2025-07-21 01:59:57','2025-07-12 09:59:00','2025-07-21 01:59:57'),(12,3,'2025-07-21 01:59:57','2025-07-18 10:47:00','2025-07-21 01:59:57'),(13,3,'2025-07-21 01:59:57','2025-07-15 09:03:00','2025-07-21 01:59:57'),(14,3,'2025-07-21 01:59:57','2025-07-21 10:05:00','2025-07-21 01:59:57'),(15,3,'2025-07-21 01:59:57','2025-07-18 09:39:00','2025-07-21 01:59:57'),(16,4,'2025-07-21 01:59:57','2025-07-21 08:18:00','2025-07-21 01:59:57'),(17,4,'2025-07-21 01:59:57','2025-07-11 10:03:00','2025-07-21 01:59:57'),(18,4,'2025-07-21 01:59:57','2025-07-17 10:31:00','2025-07-21 01:59:57'),(19,4,'2025-07-21 01:59:57','2025-07-11 08:36:00','2025-07-21 01:59:57'),(20,4,'2025-07-21 01:59:57','2025-07-13 08:55:00','2025-07-21 01:59:57'),(21,6,'2025-07-21 01:59:57','2025-07-20 10:50:00','2025-07-21 01:59:57'),(22,6,'2025-07-21 01:59:57','2025-07-15 09:37:00','2025-07-21 01:59:57'),(23,6,'2025-07-21 01:59:57','2025-07-21 10:57:00','2025-07-21 01:59:57'),(24,6,'2025-07-21 01:59:57','2025-07-21 09:50:00','2025-07-21 01:59:57'),(25,6,'2025-07-21 01:59:57','2025-07-14 10:58:00','2025-07-21 01:59:57'),(26,7,'2025-07-21 01:59:58','2025-07-15 09:52:00','2025-07-21 01:59:58'),(27,7,'2025-07-21 01:59:58','2025-07-18 09:38:00','2025-07-21 01:59:58'),(28,7,'2025-07-21 01:59:58','2025-07-17 10:21:00','2025-07-21 01:59:58'),(29,7,'2025-07-21 01:59:58','2025-07-20 10:00:00','2025-07-21 01:59:58'),(30,7,'2025-07-21 01:59:58','2025-07-12 09:23:00','2025-07-21 01:59:58');
/*!40000 ALTER TABLE `registro_pontos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('mYmGHT7XEfWCBJs8bVyoDShvIyrzhMX1DTkigNGF',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRWVnUTZqQm5tOWhxRE9VVTJkb2RHNFVXU3c1OVdkTnhEdURCZ08yRSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9yZWxhdG9yaW8tcG9udG8iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1753065683);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `cep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gestor_id` bigint unsigned DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_cpf_unique` (`cpf`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_gestor_id_foreign` (`gestor_id`),
  CONSTRAINT `users_gestor_id_foreign` FOREIGN KEY (`gestor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrador','87533348095','Administrador','1990-01-01','00000000','---',NULL,'admin@teste.com','2025-07-21 01:59:56','$2y$12$C3vW6ahRJefxHHT0NpE8SuGVZ5C4ZMj.S14euWPhRhW52cKXJxcAa',NULL,'2025-07-21 01:59:56','2025-07-21 02:20:45'),(2,'Gerente de RH','00769342094','Gerente','1988-08-08','13000000','Rua Fictícia, 123 - Campinas/SP',1,'gerenterh@teste.com','2025-07-21 01:59:56','$2y$12$qATfDQGUnL/3q4St3AQsOOVIyhUQ/DYV3NmXzXHC3E4qYDxz6F6Im',NULL,'2025-07-21 01:59:56','2025-07-21 01:59:56'),(3,'Funcionário 1','86146024058','Funcionário','1995-05-15','13050000','Rua A, 111 - Campinas/SP',2,'funcionario1@teste.com','2025-07-21 01:59:57','$2y$12$dcNRbaEBkgfBGPj6lsHbCeQAWPJMLqM.xTDo3b4mtwa47f8lpmAn.',NULL,'2025-07-21 01:59:57','2025-07-21 01:59:57'),(4,'Funcionário 2','60287875075','Funcionário','1998-03-10','13060000','Rua B, 222 - Campinas/SP',2,'funcionario2@teste.com','2025-07-21 01:59:57','$2y$12$O1bRcRI2aFR9I1VWlzBq3.WFTjio8Cgb0YcnIK5tsunxSwmdmVZ2K',NULL,'2025-07-21 01:59:57','2025-07-21 01:59:57'),(5,'Gerente comercial','15399584000','Gerente','1988-08-08','13000000','Rua Fictícia, 123 - Campinas/SP',1,'gerentecomercial@teste.com','2025-07-21 01:59:57','$2y$12$UCKB7NSSg/8hH1/LcpV0leAE1pXtf9dgAlyw2V/LP7wHR.n598gXK',NULL,'2025-07-21 01:59:57','2025-07-21 01:59:57'),(6,'Funcionário 3','49959475077','Funcionário','1995-05-15','13050000','Rua A, 111 - Campinas/SP',5,'funcionario3@teste.com','2025-07-21 01:59:57','$2y$12$oLJ4qbZwOEkVIPW.ac01PuA4DT5TlstyorUxClDd0sarOr/t9b7bC',NULL,'2025-07-21 01:59:57','2025-07-21 01:59:57'),(7,'Funcionário 4','36287348003','Funcionário','1998-03-10','13060000','Rua B, 222 - Campinas/SP',5,'funcionario4@teste.com','2025-07-21 01:59:57','$2y$12$9QtDOxX3QxunzOtwXQ/MnOomrwQFv0abYTBXkteIGt6VAS3ht2WOG',NULL,'2025-07-21 01:59:57','2025-07-21 01:59:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'ponto'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-21  0:31:43
