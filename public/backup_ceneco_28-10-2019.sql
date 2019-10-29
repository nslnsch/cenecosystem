
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
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
INSERT INTO `bitacora` VALUES (1,3,'::1','Inicio de Sesión','2019-10-28'),(2,3,'::1','Se ha registrado un nuevo paciente Nelson Barrios','2019-10-28'),(3,3,'::1','Registro de cita para el paciente Nelson Barrios','2019-10-28'),(4,3,'::1','Cita actualizada para el paciente Nelson Barrios','2019-10-28'),(5,3,'::1','Verificar información completa de la cita paciente: Nelson Barrios','2019-10-28'),(6,3,'::1','Se Entrego el Estudio del Paciente Nelson Barrios','2019-10-28'),(7,3,'::1','Verificar información completa de la cita paciente: Nelson Barrios','2019-10-28'),(8,3,'::1','Verificar información completa de la cita paciente: Nelson Barrios','2019-10-28'),(9,3,'::1','Se Entrego el Estudio del Paciente Nelson Barrios','2019-10-28'),(10,3,'::1','Verificar información completa de la cita paciente: Nelson Barrios','2019-10-28'),(11,3,'::1','Se Entrego el Estudio del Paciente Nelson Barrios','2019-10-28'),(12,3,'::1','Verificar información completa de la cita paciente: Nelson Barrios','2019-10-28'),(13,3,'::1','Se Entrego el Estudio del Paciente Nelson Barrios','2019-10-28'),(14,3,'::1','Verificar información completa de la cita paciente: Nelson Barrios','2019-10-28'),(15,3,'::1','Se Entrego el Estudio del Paciente Nelson Barrios','2019-10-28'),(16,3,'::1','Se eliminó la cita del paciente: Nelson Barrios','2019-10-28'),(17,3,'192.168.1.100','Inicio de Sesión','2019-10-28'),(18,3,'192.168.1.100','Se ha registrado un nuevo usuario: Nelson Torres','2019-10-28'),(19,3,'192.168.1.100','Inicio de Sesión','2019-10-28'),(20,3,'192.168.1.100','Se ha actualizado el usuario: Nelson Torres','2019-10-28'),(21,4,'192.168.1.100','Inicio de Sesión','2019-10-28'),(22,3,'192.168.1.7','Inicio de Sesión','2019-10-28'),(23,3,'192.168.1.7','Se ha actualizado la referencia de : Rafael Rivas a Rafael Rivas','2019-10-28'),(24,3,'192.168.1.7','Se ha eliminado la referencia: Dr Hilarión Araujo','2019-10-28'),(25,3,'192.168.1.7','Se ha eliminado la referencia: Rafael Dugarte','2019-10-28'),(26,3,'192.168.1.7','Se ha eliminado la referencia: Dr Trino Baptista','2019-10-28'),(27,3,'192.168.1.7','Se ha eliminado la referencia: Dra Maria Espinoza','2019-10-28'),(28,3,'192.168.1.7','Se ha eliminado la referencia: Nelson Torres','2019-10-28'),(29,3,'192.168.1.7','Se ha eliminado la referencia: Dr Ziomar López','2019-10-28'),(30,4,'192.168.1.100','Se ha registrado un nuevo paciente Beiker Oviedo','2019-10-28'),(31,3,'192.168.1.7','Se ha registrado una nueva referencia: Mayda Villamizar','2019-10-28'),(32,4,'192.168.1.100','Se ha registrado un nuevo paciente Juliana Sabariego','2019-10-28'),(33,3,'192.168.1.7','Se ha registrado una nueva referencia: Sara Espinoza','2019-10-28'),(34,3,'192.168.1.7','Se ha registrado una nueva referencia: Maria Avendano','2019-10-28'),(35,3,'192.168.1.7','Se ha registrado una nueva referencia: Vilma Reinoza','2019-10-28'),(36,4,'192.168.1.100','Se ha registrado un nuevo paciente Ramon Chirinos','2019-10-28'),(37,3,'192.168.1.7','Se ha registrado una nueva referencia: Laura Baptista','2019-10-28'),(38,4,'192.168.1.100','Se ha registrado un nuevo paciente Ramon Chirinos','2019-10-28'),(39,4,'192.168.1.100','Se ha registrado un nuevo paciente Gissel Perez','2019-10-28'),(40,3,'192.168.1.7','Se ha registrado una nueva referencia: Hilarion Araujo','2019-10-28'),(41,3,'192.168.1.7','Se ha eliminado la referencia: Hilarion Araujo','2019-10-28'),(42,4,'192.168.1.100','Registro de cita para el paciente Beiker Oviedo','2019-10-28'),(43,4,'192.168.1.100','Cita actualizada para el paciente Beiker Oviedo','2019-10-28'),(44,4,'192.168.1.100','Verificar información completa de la cita paciente: Beiker Oviedo','2019-10-28'),(45,4,'192.168.1.100','Se Entrego el Estudio del Paciente Beiker Oviedo','2019-10-28'),(46,4,'192.168.1.100','Verificar información completa de la cita paciente: Beiker Oviedo','2019-10-28'),(47,3,'192.168.1.7','Se ha eliminado la referencia: Laura Baptista','2019-10-28'),(48,3,'192.168.1.7','Se ha eliminado la referencia: Maria Avendano','2019-10-28'),(49,3,'192.168.1.7','Se ha registrado una nueva referencia: Maria Avendano','2019-10-28'),(50,3,'192.168.1.7','Se ha registrado una nueva referencia: Maria Espinoza','2019-10-28'),(51,3,'192.168.1.7','Se ha registrado una nueva referencia: Sandra Contreras','2019-10-28'),(52,3,'192.168.1.7','Se ha registrado una nueva referencia: Antonio Uzcategui','2019-10-28'),(53,3,'192.168.1.7','Inicio de Sesión','2019-10-28'),(54,3,'192.168.1.7','Se ha registrado una nueva referencia: Rafael Rivas','2019-10-28'),(55,3,'192.168.1.5','Inicio de Sesión','2019-10-28'),(56,3,'192.168.1.5','Se ha registrado un nuevo usuario: Rafael Rivas','2019-10-28'),(57,3,'192.168.1.5','Inicio de Sesión','2019-10-28'),(58,3,'192.168.1.5','Se ha actualizado el usuario: Rafael Rivas','2019-10-28'),(59,5,'192.168.1.5','Inicio de Sesión','2019-10-28'),(60,5,'192.168.1.5','Se ha actualizado el Consultorio1','2019-10-28'),(61,5,'192.168.1.5','Se ha actualizado el Consultorio2','2019-10-28'),(62,5,'192.168.1.5','Se ha actualizado el Consultorio3','2019-10-28'),(63,3,'192.168.1.7','Inicio de Sesión','2019-10-28'),(64,3,'::1','Inicio de Sesión','2019-10-28'),(65,3,'::1','Se ha generado un archivo de respaldo en la carpeta public ','2019-10-28'),(66,3,'::1','Inicio de Sesión','2019-10-28'),(67,3,'::1','Se ha generado un archivo de respaldo en la carpeta public ','2019-10-28'),(68,3,'::1','Se ha generado un archivo de respaldo en la carpeta public ','2019-10-28'),(69,3,'::1','Inicio de Sesión','2019-10-28'),(70,3,'::1','Se ha generado un archivo de respaldo en la carpeta public ','2019-10-28'),(71,3,'::1','Se ha generado un archivo de respaldo en la carpeta public ','2019-10-28'),(72,3,'::1','Se ha generado un archivo de respaldo en la carpeta public ','2019-10-28'),(73,3,'::1','Se ha generado un archivo de respaldo en la carpeta public ','2019-10-28'),(74,3,'::1','Se ha generado un archivo de respaldo en la carpeta public ','2019-10-28'),(75,3,'::1','Se ha generado un archivo de respaldo en la carpeta public ','2019-10-28'),(76,3,'::1','Se ha generado un archivo de respaldo en la carpeta public ','2019-10-28'),(77,3,'::1','Se ha generado un archivo de respaldo en la carpeta public ','2019-10-28'),(78,3,'::1','Se ha generado un archivo de respaldo en la carpeta public ','2019-10-28'),(79,3,'::1','Se ha generado un archivo de respaldo en la carpeta public ','2019-10-28'),(80,3,'::1','Inicio de Sesión','2019-10-28'),(81,3,'::1','Se ha generado un archivo de respaldo en la carpeta public ','2019-10-28');
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `cita_refs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cita_refs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cita` int(10) unsigned NOT NULL,
  `id_real` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_citaref_cita` (`id_cita`),
  KEY `fk_citaref_referencia` (`id_real`),
  CONSTRAINT `fk_citaref_cita` FOREIGN KEY (`id_cita`) REFERENCES `citas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_citaref_referencia` FOREIGN KEY (`id_real`) REFERENCES `referencias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cita_refs` WRITE;
/*!40000 ALTER TABLE `cita_refs` DISABLE KEYS */;
INSERT INTO `cita_refs` VALUES (2,2,8);
/*!40000 ALTER TABLE `cita_refs` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pac` int(10) unsigned NOT NULL,
  `id_est` int(10) unsigned NOT NULL,
  `id_ref` int(10) unsigned NOT NULL,
  `comp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` decimal(10,0) NOT NULL,
  `tipo_cita` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `recibido` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_pago` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pacest_paciente` (`id_pac`),
  KEY `fk_pacest_estudio` (`id_est`),
  KEY `fk_pacest_referencia` (`id_ref`),
  CONSTRAINT `fk_pacest_estudio` FOREIGN KEY (`id_est`) REFERENCES `estudios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pacest_paciente` FOREIGN KEY (`id_pac`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_pacest_referencia` FOREIGN KEY (`id_ref`) REFERENCES `referencias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` VALUES (2,2,2,11,'U.EEG.C3','Entregado',200000,'T','2019-10-28','nelson torres','Pagado');
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `comp_estudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comp_estudios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_est` int(10) unsigned NOT NULL,
  `subestudio` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_complemento_estudio_estudio` (`id_est`),
  CONSTRAINT `fk_complemento_estudio_estudio` FOREIGN KEY (`id_est`) REFERENCES `estudios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `comp_estudios` WRITE;
/*!40000 ALTER TABLE `comp_estudios` DISABLE KEYS */;
INSERT INTO `comp_estudios` VALUES (1,1,'1M.EMG',200000,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(2,1,'2M.EMG',250000,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(3,1,'4M.EMG',300000,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(4,2,'1M.VC',200000,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(5,2,'2M.VC',250000,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(6,2,'4M.VC',300000,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(7,3,'1M.EMG.VC',400000,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(8,3,'2M.EMG.VC',500000,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(9,3,'4M.EMG.VC',600000,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(10,4,'U.PEA.C1',0,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(11,5,'U.PEV',200000,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(12,6,'U.PESS',250000,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(13,7,'U.PEM',0,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(14,8,'U.TNFB',200000,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(15,9,'U.AUD',0,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(16,10,'U.PEA.C2',0,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(17,11,'U.EEG.C3',200000,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(18,12,'U.BM',0,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(19,13,'U.ONDA.P300',200000,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(20,14,'U.EEG.ONDA.P300',0,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(21,15,'U.BM.ONDA.P300',0,'2019-10-28 13:11:08','2019-10-28 13:11:08'),(22,16,'U.EEG.C4',200000,'2019-10-28 13:11:08','2019-10-28 13:11:08');
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
INSERT INTO `consultorios` VALUES (1,'Consultorio1',8,'2019-10-28 13:11:07','2019-10-28 14:59:09'),(2,'Consultorio2',6,'2019-10-28 13:11:07','2019-10-28 14:59:20'),(3,'Consultorio3',6,'2019-10-28 13:11:07','2019-10-28 14:59:25'),(4,'Consultorio4',5,'2019-10-28 13:11:07','2019-10-28 13:11:07');
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
INSERT INTO `estudios` VALUES (1,1,'EMG','2019-10-28 13:11:07','2019-10-28 13:11:07'),(2,1,'VC','2019-10-28 13:11:07','2019-10-28 13:11:07'),(3,1,'EMG+VC','2019-10-28 13:11:07','2019-10-28 13:11:07'),(4,1,'PEA','2019-10-28 13:11:07','2019-10-28 13:11:07'),(5,1,'PEV','2019-10-28 13:11:07','2019-10-28 13:11:07'),(6,1,'PESS','2019-10-28 13:11:07','2019-10-28 13:11:07'),(7,1,'PEM','2019-10-28 13:11:07','2019-10-28 13:11:07'),(8,2,'TNFB','2019-10-28 13:11:07','2019-10-28 13:11:07'),(9,2,'AUD','2019-10-28 13:11:07','2019-10-28 13:11:07'),(10,2,'PEA','2019-10-28 13:11:07','2019-10-28 13:11:07'),(11,3,'EEG','2019-10-28 13:11:07','2019-10-28 13:11:07'),(12,3,'BM','2019-10-28 13:11:08','2019-10-28 13:11:08'),(13,3,'ONDA P300','2019-10-28 13:11:08','2019-10-28 13:11:08'),(14,3,'EEG+ONDA P300','2019-10-28 13:11:08','2019-10-28 13:11:08'),(15,3,'BM+ONDA P300','2019-10-28 13:11:08','2019-10-28 13:11:08'),(16,4,'EEG','2019-10-28 13:11:08','2019-10-28 13:11:08');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2019_05_04_150315_create_permission_tables',1),(3,'2019_05_04_150316_create_users_table',1),(4,'2019_05_07_133239_create_paciente_table',1),(5,'2019_05_09_075742_create_consultorio_table',1),(6,'2019_05_09_075743_create_estudio_table',1),(7,'2019_05_10_080236_create_complemento_estudio_table',1),(8,'2019_05_10_080856_create_referencia_table',1),(9,'2019_05_11_073020_create_pac_est_table',1),(10,'2019_07_18_185101_create_bitacora_table',1),(11,'2019_10_21_074229_create_cita_ref_table',1);
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
INSERT INTO `model_has_roles` VALUES (1,'App\\User',1),(1,'App\\User',4),(2,'App\\User',2),(2,'App\\User',5),(3,'App\\User',3);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (1,'M','V-18966006','Nelson','Barrios','0424-7683789','1989-11-19','el amparo','2019-10-28 13:16:42','2019-10-28 13:16:42'),(2,'M','V-20432473-1','Beiker','Oviedo','0414-1798388','2019-08-07','Merida','2019-10-28 13:52:32','2019-10-28 13:52:32'),(3,'F','V-61968550','Juliana','Sabariego','0416-0797073','1946-07-02','merida','2019-10-28 13:59:19','2019-10-28 13:59:19'),(4,'M','E-92037820','Ramon','Chirinos','0426-2715321','1968-08-31','Merida','2019-10-28 14:06:02','2019-10-28 14:06:02'),(6,'M','V-9203782-0','Ramon','Chirinos','0426-2715321','1966-05-04','Merida','2019-10-28 14:09:42','2019-10-28 14:09:42'),(7,'F','V-20432473','Gissel','Perez','0414-1798388','1989-04-05','merida','2019-10-28 14:11:14','2019-10-28 14:11:14');
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
INSERT INTO `password_resets` VALUES ('rafaelrivas18@gmail.com','$2y$10$oMDbH0KFNtCsfCs6EisUwu6gcMl/7ruPRNISXIMpupPY8TLJ2oY22','2019-10-28 14:56:28'),('nslnula@gmail.com','$2y$10$ge6crzNDUsqUegRWCymrc.la5228E0K9mX5yU2p6u3ltdZO7sOBXC','2019-10-28 15:14:56');
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
INSERT INTO `permissions` VALUES (1,'create','web','2019-10-28 13:11:04','2019-10-28 13:11:04'),(2,'read','web','2019-10-28 13:11:04','2019-10-28 13:11:04'),(3,'update','web','2019-10-28 13:11:04','2019-10-28 13:11:04'),(4,'delete','web','2019-10-28 13:11:04','2019-10-28 13:11:04'),(5,'create user','web','2019-10-28 13:11:04','2019-10-28 13:11:04'),(6,'read user','web','2019-10-28 13:11:04','2019-10-28 13:11:04'),(7,'update user','web','2019-10-28 13:11:04','2019-10-28 13:11:04'),(8,'delete user','web','2019-10-28 13:11:04','2019-10-28 13:11:04'),(9,'create role','web','2019-10-28 13:11:04','2019-10-28 13:11:04'),(10,'read role','web','2019-10-28 13:11:04','2019-10-28 13:11:04'),(11,'update role','web','2019-10-28 13:11:04','2019-10-28 13:11:04'),(12,'delete role','web','2019-10-28 13:11:04','2019-10-28 13:11:04'),(13,'create permission','web','2019-10-28 13:11:04','2019-10-28 13:11:04'),(14,'read permission','web','2019-10-28 13:11:04','2019-10-28 13:11:04'),(15,'update permission','web','2019-10-28 13:11:04','2019-10-28 13:11:04'),(16,'delete permission','web','2019-10-28 13:11:04','2019-10-28 13:11:04');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `referencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `referencias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_persona` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ced_rif` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_ref` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_ref` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_ref` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `referencias_ced_rif_unique` (`ced_rif`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `referencias` WRITE;
/*!40000 ALTER TABLE `referencias` DISABLE KEYS */;
INSERT INTO `referencias` VALUES (1,'N','V-21183461-3','Rafael Rivas','0426-8359798','GTE','2019-10-28 13:11:08','2019-10-28 13:50:21'),(8,'N','V-8009582-1','Mayda Villamizar','0424-7683789','TEC','2019-10-28 13:53:32','2019-10-28 13:53:32'),(9,'N','V-3992477-1','Sara Espinoza','0424-7683789','TEC','2019-10-28 14:03:13','2019-10-28 14:03:13'),(11,'N','V-3995318-4','Vilma Reinoza','0424-7683789','MED','2019-10-28 14:05:30','2019-10-28 14:05:30'),(14,'N','V-5198650-1','Maria Avendano','0424-7683789','TEC','2019-10-28 14:23:05','2019-10-28 14:23:05'),(15,'N','V-3497820-0','Maria Espinoza','0424-7683789','MED','2019-10-28 14:23:52','2019-10-28 14:23:52'),(16,'N','V-14024157-1','Sandra Contreras','0424-7683789','MED','2019-10-28 14:24:33','2019-10-28 14:24:33'),(17,'N','V-10718104-1','Antonio Uzcategui','0424-7683789','MED','2019-10-28 14:25:10','2019-10-28 14:25:10'),(18,'N','V-21183461-1','Rafael Rivas','0424-7683789','TEC','2019-10-28 14:49:20','2019-10-28 14:49:20');
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
INSERT INTO `role_has_permissions` VALUES (1,1),(1,2),(1,3),(2,1),(2,2),(2,3),(3,1),(3,3),(4,3),(5,1),(5,2),(5,3),(6,2),(6,3),(7,1),(7,2),(7,3),(8,3),(9,3),(10,3),(11,3),(12,3),(13,3),(14,3),(15,3),(16,3);
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
INSERT INTO `roles` VALUES (1,'usuario','web','2019-10-28 13:11:04','2019-10-28 13:11:04'),(2,'admin','web','2019-10-28 13:11:05','2019-10-28 13:11:05'),(3,'super-admin','web','2019-10-28 13:11:05','2019-10-28 13:11:05');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Usuario','usuario@gmail.com',NULL,'$2y$10$D6tIex8qJhBIZ4ZSIxkpZ.oN/aPcYTSGFqf2AiOQVvy2EdmpOWgie',NULL,NULL,'2019-10-28 13:11:06','2019-10-28 13:11:06'),(2,2,'Admin','admin@gmail.com',NULL,'$2y$10$zmIBwAZkodMGt1JpCOq3b.jeD8yAcmjXhbzDndu8NQmLhG0UnY8Zu',NULL,NULL,'2019-10-28 13:11:07','2019-10-28 13:11:07'),(3,3,'Superadmin','nslnula@gmail.com',NULL,'$2y$10$I5cFwoig1mwvS2l7TOsP/eyuNtSVSNGg1dZCbKArnMPqIpocZp1fu','2019-10-28 14:33:49','qJRFlnMRY6WZ4OwCRKLMk1RY1rCNz48IdVUlDwYcYnWTS03nK5qZsbkBl6Mr','2019-10-28 13:11:07','2019-10-28 19:03:49'),(4,1,'Nelson Torres','torresrangel.nelson@gmail.com',NULL,'$2y$10$iLvLlXrtgkihyDP53KYAXeIwnxii7Sp7PfBYoe2fX3gOW7tp0Z9vO','2019-10-28 10:30:54',NULL,'2019-10-28 13:36:28','2019-10-28 14:30:54'),(5,2,'Rafael Rivas','rafaelrivas18@gmail.com',NULL,'$2y$10$v/5rKXKHlOt/O.CLAL6pu.o8jr84w9ZTnL76Twm9OdhImtbk2MPKG',NULL,NULL,'2019-10-28 14:55:07','2019-10-28 14:57:35');
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

