
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
DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `ip` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `log` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bitacora_user` (`id_user`),
  CONSTRAINT `fk_bitacora_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
INSERT INTO `bitacora` VALUES (1,3,'::1','Inicio de Sesión','2019-10-12'),(2,3,'::1','Inicio de Sesión','2019-10-12'),(3,3,'::1','Inicio de Sesión','2019-10-12'),(4,3,'::1','Inicio de Sesión','2019-10-12'),(5,3,'::1','Inicio de Sesión','2019-10-12'),(6,3,'::1','Inicio de Sesión','2019-10-12'),(7,3,'::1','Inicio de Sesión','2019-10-12'),(8,3,'::1','Inicio de Sesión','2019-10-12'),(9,3,'::1','Se ha registrado un nuevo paciente Nelson Esteban Barrios Schleifstein','2019-10-12'),(10,3,'::1','Registro de cita para el paciente Nelson Esteban Barrios Schleifstein','2019-10-12'),(11,3,'::1','Verificar información completa de la cita paciente: Nelson Esteban Barrios Schleifstein','2019-10-12'),(12,3,'::1','Se ha registrado un nuevo paciente Yoselyn Coromoto Rojas Montilla','2019-10-12'),(13,3,'::1','Registro de cita para el paciente Yoselyn Coromoto Rojas Montilla','2019-10-12'),(14,1,'::1','Inicio de Sesión','2019-10-12'),(15,1,'::1','Se Entrego el Estudio del Paciente Yoselyn Coromoto Rojas Montilla','2019-10-12'),(16,1,'::1','Registro de cita para el paciente Nelson Esteban Barrios Schleifstein','2019-10-12'),(17,1,'::1','Registro de cita para el paciente Yoselyn Coromoto Rojas Montilla','2019-10-12'),(18,2,'::1','Inicio de Sesión','2019-10-12'),(19,2,'::1','Se Entrego el Estudio del Paciente Nelson Esteban Barrios Schleifstein','2019-10-12'),(20,2,'::1','Se Entrego el Estudio del Paciente Yoselyn Coromoto Rojas Montilla','2019-10-12'),(21,3,'::1','Inicio de Sesión','2019-10-13'),(22,3,'::1','Inicio de Sesión','2019-10-13'),(23,3,'::1','Inicio de Sesión','2019-10-13'),(24,3,'::1','Inicio de Sesión','2019-10-13'),(25,3,'::1','Inicio de Sesión','2019-10-13'),(26,3,'::1','Registro de cita para el paciente Nelson Esteban Barrios Schleifstein','2019-10-13'),(27,3,'::1','Verificar información completa de la cita paciente: Nelson Esteban Barrios Schleifstein','2019-10-13'),(28,3,'::1','Verificar información completa de la cita paciente: Nelson Esteban Barrios Schleifstein','2019-10-13'),(29,3,'::1','Verificar información completa de la cita paciente: Nelson Esteban Barrios Schleifstein','2019-10-13'),(30,3,'::1','Se Entrego el Estudio del Paciente Nelson Esteban Barrios Schleifstein','2019-10-13'),(31,3,'::1','Se Entrego el Estudio del Paciente Nelson Esteban Barrios Schleifstein','2019-10-13'),(32,3,'::1','Se Entrego el Estudio del Paciente Nelson Esteban Barrios Schleifstein','2019-10-13'),(33,3,'::1','Verificar información completa de la cita paciente: Yoselyn Coromoto Rojas Montilla','2019-10-13'),(34,3,'::1','Se Entrego el Estudio del Paciente Yoselyn Coromoto Rojas Montilla','2019-10-13'),(35,3,'::1','Se Entrego el Estudio del Paciente Yoselyn Coromoto Rojas Montilla','2019-10-13'),(36,3,'::1','Se Entrego el Estudio del Paciente Yoselyn Coromoto Rojas Montilla','2019-10-13'),(37,3,'::1','Se Entrego el Estudio del Paciente Yoselyn Coromoto Rojas Montilla','2019-10-13'),(38,3,'::1','Se Entrego el Estudio del Paciente Yoselyn Coromoto Rojas Montilla','2019-10-13'),(39,3,'::1','Se Entrego el Estudio del Paciente Yoselyn Coromoto Rojas Montilla','2019-10-13'),(40,3,'::1','Se Entrego el Estudio del Paciente Yoselyn Coromoto Rojas Montilla','2019-10-13'),(41,3,'::1','Se Entrego el Estudio del Paciente Nelson Esteban Barrios Schleifstein','2019-10-13'),(42,3,'::1','Verificar información completa de la cita paciente: Nelson Esteban Barrios Schleifstein','2019-10-13'),(43,3,'::1','Se Entrego el Estudio del Paciente Nelson Esteban Barrios Schleifstein','2019-10-13'),(44,3,'::1','Verificar información completa de la cita paciente: Nelson Esteban Barrios Schleifstein','2019-10-13'),(45,3,'::1','Se Entrego el Estudio del Paciente Nelson Esteban Barrios Schleifstein','2019-10-13'),(46,3,'::1','Verificar información completa de la cita paciente: Nelson Esteban Barrios Schleifstein','2019-10-13'),(47,3,'::1','Se Entrego el Estudio del Paciente Nelson Esteban Barrios Schleifstein','2019-10-13'),(48,3,'::1','Verificar información completa de la cita paciente: Nelson Esteban Barrios Schleifstein','2019-10-13'),(49,3,'::1','Se Entrego el Estudio del Paciente Nelson Esteban Barrios Schleifstein','2019-10-13'),(50,3,'::1','Se Entrego el Estudio del Paciente Nelson Esteban Barrios Schleifstein','2019-10-13'),(51,3,'::1','Se Entrego el Estudio del Paciente Nelson Esteban Barrios Schleifstein','2019-10-13'),(52,3,'::1','Se Entrego el Estudio del Paciente Nelson Esteban Barrios Schleifstein','2019-10-13'),(53,3,'::1','Se Entrego el Estudio del Paciente Nelson Esteban Barrios Schleifstein','2019-10-13'),(54,3,'::1','Se Entrego el Estudio del Paciente Nelson Esteban Barrios Schleifstein','2019-10-13'),(55,3,'::1','Se Entrego el Estudio del Paciente Yoselyn Coromoto Rojas Montilla','2019-10-13'),(56,3,'::1','Se Entrego el Estudio del Paciente Yoselyn Coromoto Rojas Montilla','2019-10-13'),(57,3,'::1','Se Entrego el Estudio del Paciente Yoselyn Coromoto Rojas Montilla','2019-10-13'),(58,3,'::1','Se Entrego el Estudio del Paciente Yoselyn Coromoto Rojas Montilla','2019-10-13'),(59,3,'::1','Se Entrego el Estudio del Paciente Yoselyn Coromoto Rojas Montilla','2019-10-13'),(60,3,'::1','Se Entrego el Estudio del Paciente Yoselyn Coromoto Rojas Montilla','2019-10-13'),(61,3,'::1','Se Entrego el Estudio del Paciente Yoselyn Coromoto Rojas Montilla','2019-10-13'),(62,3,'::1','Se Entrego el Estudio del Paciente Yoselyn Coromoto Rojas Montilla','2019-10-13'),(63,3,'::1','Se ha actualizado el sub-estudio: 4M.EMG','2019-10-13'),(64,3,'::1','Inicio de Sesión','2019-10-13'),(65,3,'::1','Se ha generado un archivo de respaldo en la carpeta public ','2019-10-13'),(66,3,'::1','Inicio de Sesión','2019-10-13'),(67,3,'::1','Se ha actualizado el usuario: Superadmin','2019-10-13'),(68,3,'::1','Se ha generado un archivo de respaldo en la carpeta public ','2019-10-13');
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pac` int(10) unsigned NOT NULL,
  `id_est` int(10) unsigned NOT NULL,
  `id_ref` int(10) unsigned NOT NULL,
  `id_real` int(10) unsigned NOT NULL,
  `comp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` double(8,2) NOT NULL,
  `tipo_cita` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `recibido` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_pago` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pacest_paciente` (`id_pac`),
  KEY `fk_pacest_estudio` (`id_est`),
  KEY `fk_pacest_referencia` (`id_ref`),
  KEY `fk_real_referencia` (`id_real`),
  CONSTRAINT `fk_pacest_estudio` FOREIGN KEY (`id_est`) REFERENCES `estudios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pacest_paciente` FOREIGN KEY (`id_pac`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pacest_referencia` FOREIGN KEY (`id_ref`) REFERENCES `referencias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_real_referencia` FOREIGN KEY (`id_real`) REFERENCES `referencias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` VALUES (1,1,1,4,2,'1M.EMG','Entregado',200.00,'P','2019-10-13','Luis Peña','Por Pagar'),(2,2,1,2,5,'1M.EMG','Entregado',200.00,'P','2019-10-13','Jose Manuel','Por Pagar'),(3,1,1,6,3,'2M.EMG','Entregado',250.00,'P','2019-10-10','Miguel Lara','Por Pagar'),(4,2,1,2,4,'4M.EMG','Entregado',300.00,'P','2019-10-01','nelson peña','Por Pagar'),(5,1,9,3,4,'U.AUD','Entregado',0.00,'P','2019-10-08','David Peña','Por Pagar');
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `comp_estudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comp_estudios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_est` int(10) unsigned NOT NULL,
  `subestudio` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_complemento_estudio_estudio` (`id_est`),
  CONSTRAINT `fk_complemento_estudio_estudio` FOREIGN KEY (`id_est`) REFERENCES `estudios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `comp_estudios` WRITE;
/*!40000 ALTER TABLE `comp_estudios` DISABLE KEYS */;
INSERT INTO `comp_estudios` VALUES (1,1,'1M.EMG',200.00,'2019-10-12 13:07:58','2019-10-12 13:07:58'),(2,1,'2M.EMG',250.00,'2019-10-12 13:07:59','2019-10-12 13:07:59'),(3,1,'4M.EMG',300.00,'2019-10-12 13:07:59','2019-10-13 21:01:16'),(4,2,'1M.VC',200.00,'2019-10-12 13:07:59','2019-10-12 13:07:59'),(5,2,'2M.VC',250.00,'2019-10-12 13:07:59','2019-10-12 13:07:59'),(6,2,'4M.VC',300.00,'2019-10-12 13:07:59','2019-10-12 13:07:59'),(7,3,'1M.EMG.VC',400.00,'2019-10-12 13:07:59','2019-10-12 13:07:59'),(8,3,'2M.EMG.VC',500.00,'2019-10-12 13:07:59','2019-10-12 13:07:59'),(9,3,'4M.EMG.VC',600.00,'2019-10-12 13:07:59','2019-10-12 13:07:59'),(10,4,'U.PEA.C1',0.00,'2019-10-12 13:07:59','2019-10-12 13:07:59'),(11,5,'U.PEV',200.00,'2019-10-12 13:07:59','2019-10-12 13:07:59'),(12,6,'U.PESS',250.00,'2019-10-12 13:07:59','2019-10-12 13:07:59'),(13,7,'U.PEM',0.00,'2019-10-12 13:07:59','2019-10-12 13:07:59'),(14,8,'U.TNFB',200.00,'2019-10-12 13:07:59','2019-10-12 13:07:59'),(15,9,'U.AUD',0.00,'2019-10-12 13:07:59','2019-10-12 13:07:59'),(16,10,'U.PEA.C2',0.00,'2019-10-12 13:07:59','2019-10-12 13:07:59'),(17,11,'U.EEG.C3',200.00,'2019-10-12 13:07:59','2019-10-12 13:07:59'),(18,12,'U.BM',0.00,'2019-10-12 13:07:59','2019-10-12 13:07:59'),(19,13,'U.ONDA.P300',200.00,'2019-10-12 13:07:59','2019-10-12 13:07:59'),(20,14,'U.EEG.ONDA.P300',0.00,'2019-10-12 13:07:59','2019-10-12 13:07:59'),(21,15,'U.BM.ONDA.P300',0.00,'2019-10-12 13:07:59','2019-10-12 13:07:59'),(22,16,'U.EEG.C4',200.00,'2019-10-12 13:07:59','2019-10-12 13:07:59');
/*!40000 ALTER TABLE `comp_estudios` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `consultorios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultorios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_consult` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limite` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `consultorios_nombre_consult_unique` (`nombre_consult`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `consultorios` WRITE;
/*!40000 ALTER TABLE `consultorios` DISABLE KEYS */;
INSERT INTO `consultorios` VALUES (1,'Consultorio1',5,'2019-10-12 13:07:58','2019-10-12 13:07:58'),(2,'Consultorio2',5,'2019-10-12 13:07:58','2019-10-12 13:07:58'),(3,'Consultorio3',5,'2019-10-12 13:07:58','2019-10-12 13:07:58'),(4,'Consultorio4',5,'2019-10-12 13:07:58','2019-10-12 13:07:58');
/*!40000 ALTER TABLE `consultorios` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `estudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_consult` int(10) unsigned NOT NULL,
  `nombre_est` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_estudio_consultorios` (`id_consult`),
  CONSTRAINT `fk_estudio_consultorios` FOREIGN KEY (`id_consult`) REFERENCES `consultorios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `estudios` WRITE;
/*!40000 ALTER TABLE `estudios` DISABLE KEYS */;
INSERT INTO `estudios` VALUES (1,1,'EMG','2019-10-12 13:07:58','2019-10-12 13:07:58'),(2,1,'VC','2019-10-12 13:07:58','2019-10-12 13:07:58'),(3,1,'EMG+VC','2019-10-12 13:07:58','2019-10-12 13:07:58'),(4,1,'PEA','2019-10-12 13:07:58','2019-10-12 13:07:58'),(5,1,'PEV','2019-10-12 13:07:58','2019-10-12 13:07:58'),(6,1,'PESS','2019-10-12 13:07:58','2019-10-12 13:07:58'),(7,1,'PEM','2019-10-12 13:07:58','2019-10-12 13:07:58'),(8,2,'TNFB','2019-10-12 13:07:58','2019-10-12 13:07:58'),(9,2,'AUD','2019-10-12 13:07:58','2019-10-12 13:07:58'),(10,2,'PEA','2019-10-12 13:07:58','2019-10-12 13:07:58'),(11,3,'EEG','2019-10-12 13:07:58','2019-10-12 13:07:58'),(12,3,'BM','2019-10-12 13:07:58','2019-10-12 13:07:58'),(13,3,'ONDA P300','2019-10-12 13:07:58','2019-10-12 13:07:58'),(14,3,'EEG+ONDA P300','2019-10-12 13:07:58','2019-10-12 13:07:58'),(15,3,'BM+ONDA P300','2019-10-12 13:07:58','2019-10-12 13:07:58'),(16,4,'EEG','2019-10-12 13:07:58','2019-10-12 13:07:58');
/*!40000 ALTER TABLE `estudios` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2019_05_04_150315_create_permission_tables',1),(3,'2019_05_04_150316_create_users_table',1),(4,'2019_05_07_133239_create_paciente_table',1),(5,'2019_05_09_075742_create_consultorio_table',1),(6,'2019_05_09_075743_create_estudio_table',1),(7,'2019_05_10_080236_create_complemento_estudio_table',1),(8,'2019_05_10_080856_create_referencia_table',1),(9,'2019_05_11_073020_create_pac_est_table',1),(10,'2019_07_18_185101_create_bitacora_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\User',1),(2,'App\\User',2),(3,'App\\User',3);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pacientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genero` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecnac` date NOT NULL,
  `dirhab` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pacientes_cedula_unique` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (1,'M','V-18966006','Nelson Esteban','Barrios Schleifstein','0424-7683789','1989-11-19','el amparo','2019-10-12 23:49:20','2019-10-12 23:49:20'),(2,'F','V-24537549','Yoselyn Coromoto','Rojas Montilla','0426-1727663','1993-05-28','el amparo','2019-10-13 00:00:57','2019-10-13 00:00:57');
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'create','web','2019-10-12 13:07:54','2019-10-12 13:07:54'),(2,'read','web','2019-10-12 13:07:55','2019-10-12 13:07:55'),(3,'update','web','2019-10-12 13:07:55','2019-10-12 13:07:55'),(4,'delete','web','2019-10-12 13:07:55','2019-10-12 13:07:55'),(5,'create user','web','2019-10-12 13:07:55','2019-10-12 13:07:55'),(6,'read user','web','2019-10-12 13:07:55','2019-10-12 13:07:55'),(7,'update user','web','2019-10-12 13:07:55','2019-10-12 13:07:55'),(8,'delete user','web','2019-10-12 13:07:55','2019-10-12 13:07:55'),(9,'create role','web','2019-10-12 13:07:55','2019-10-12 13:07:55'),(10,'read role','web','2019-10-12 13:07:55','2019-10-12 13:07:55'),(11,'update role','web','2019-10-12 13:07:55','2019-10-12 13:07:55'),(12,'delete role','web','2019-10-12 13:07:55','2019-10-12 13:07:55'),(13,'create permission','web','2019-10-12 13:07:55','2019-10-12 13:07:55'),(14,'read permission','web','2019-10-12 13:07:55','2019-10-12 13:07:55'),(15,'update permission','web','2019-10-12 13:07:55','2019-10-12 13:07:55'),(16,'delete permission','web','2019-10-12 13:07:56','2019-10-12 13:07:56');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `referencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referencias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ced_rif` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_ref` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_ref` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_ref` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `referencias_ced_rif_unique` (`ced_rif`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `referencias` WRITE;
/*!40000 ALTER TABLE `referencias` DISABLE KEYS */;
INSERT INTO `referencias` VALUES (1,'V-00000000','Por Definir','0424-7683789','GTE','2019-10-12 13:07:59','2019-10-12 13:07:59'),(2,'V-24537548','Dra Maria Espinoza','0424-7683789','MED','2019-10-12 13:07:59','2019-10-12 13:07:59'),(3,'V-19145320','Dr Hilarión Araujo','0424-7683789','MED','2019-10-12 13:07:59','2019-10-12 13:07:59'),(4,'V-18966006','Nelson Torres','0424-7683789','TEC','2019-10-12 13:07:59','2019-10-12 13:07:59'),(5,'V-14540620','Rafael Dugarte','0424-7683789','TEC','2019-10-12 13:07:59','2019-10-12 13:07:59'),(6,'V-20531624','Dr Trino Baptista','0424-7683789','EXT','2019-10-12 13:07:59','2019-10-12 13:07:59'),(7,'V-9567234','Dr Ziomar López','0424-7683789','EXT','2019-10-12 13:07:59','2019-10-12 13:07:59');
/*!40000 ALTER TABLE `referencias` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(5,1),(7,1),(1,2),(2,2),(5,2),(6,2),(7,2),(1,3),(2,3),(3,3),(4,3),(5,3),(6,3),(7,3),(8,3),(9,3),(10,3),(11,3),(12,3),(13,3),(14,3),(15,3),(16,3);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'usuario','web','2019-10-12 13:07:56','2019-10-12 13:07:56'),(2,'admin','web','2019-10-12 13:07:56','2019-10-12 13:07:56'),(3,'super-admin','web','2019-10-12 13:07:56','2019-10-12 13:07:56');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_rol` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `fk_user_rol` (`id_rol`),
  CONSTRAINT `fk_user_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Usuario','usuario@gmail.com',NULL,'$2y$10$Y390tpP36C3chiAfke0XQOlEitGFn4jRvo4lAjOuK/MVUjafeXA6m','2019-10-12 21:25:22',NULL,'2019-10-12 13:07:57','2019-10-13 01:25:22'),(2,2,'Admin','admin@gmail.com',NULL,'$2y$10$z5nPO7n6hciL9UfYJZrPL.t2rnv460dQwWu3yPIo776me4MnOgRyy','2019-10-12 21:43:53',NULL,'2019-10-12 13:07:57','2019-10-13 01:43:53'),(3,3,'Superadmin','nslnula@gmail.com',NULL,'$2y$10$00LtYXrkELx4JAvo2ryF/.JZkfsYyrA9N0xJwrAtogwMLebooq/ze','2019-10-13 17:11:34','9ZKGNiWfRSKmlt3WufTjbMGBWZET9a7NaJ4CKAimFyxAf34Te6Yo1pmvXMtj','2019-10-12 13:07:58','2019-10-14 03:44:35');
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

