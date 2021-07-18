-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para ganaderia
CREATE DATABASE IF NOT EXISTS `ganaderia` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ganaderia`;

-- Volcando estructura para tabla ganaderia.animales
CREATE TABLE IF NOT EXISTS `animales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `etapa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ganaderia.animales: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `animales` DISABLE KEYS */;
INSERT INTO `animales` (`id`, `nombre`, `codigo`, `sexo`, `fechaNacimiento`, `etapa`, `peso`, `observaciones`, `estado`, `created_at`, `updated_at`) VALUES
	(51, 'VA456', NULL, 'M', '2021-07-01', 'cria', '45', NULL, 1, '2021-07-14 02:23:37', '2021-07-14 02:23:37'),
	(53, 'TOR123', NULL, 'M', '2021-07-01', 'CRIA', '200', NULL, 1, '2021-07-14 02:41:11', '2021-07-14 02:41:11');
/*!40000 ALTER TABLE `animales` ENABLE KEYS */;

-- Volcando estructura para tabla ganaderia.animales_compras
CREATE TABLE IF NOT EXISTS `animales_compras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `animal_id` bigint(20) unsigned NOT NULL,
  `fechaCompra` date NOT NULL,
  `valor` double NOT NULL,
  `peso` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `vendedor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `animales_compras_animal_id_foreign` (`animal_id`),
  CONSTRAINT `animales_compras_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ganaderia.animales_compras: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `animales_compras` DISABLE KEYS */;
INSERT INTO `animales_compras` (`id`, `animal_id`, `fechaCompra`, `valor`, `peso`, `total`, `vendedor`, `ubicacion`, `tipo`, `estado`, `created_at`, `updated_at`) VALUES
	(6, 51, '2021-07-13', 5000, 45, 225000, 'LUIS ZABALA', '', NULL, 1, '2021-07-14 02:23:37', '2021-07-14 02:23:37'),
	(7, 53, '2021-07-13', 5000, 200, 1000000, 'EDUARDO ALMANZA', '', NULL, 1, '2021-07-14 02:41:11', '2021-07-14 02:41:11');
/*!40000 ALTER TABLE `animales_compras` ENABLE KEYS */;

-- Volcando estructura para tabla ganaderia.animales_potreros
CREATE TABLE IF NOT EXISTS `animales_potreros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `animal_id` bigint(20) unsigned NOT NULL,
  `potreto_id` bigint(20) unsigned NOT NULL,
  `fechaEntrada` date NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `animales_potreros_animal_id_foreign` (`animal_id`),
  KEY `animales_potreros_potreto_id_foreign` (`potreto_id`),
  CONSTRAINT `animales_potreros_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animales` (`id`),
  CONSTRAINT `animales_potreros_potreto_id_foreign` FOREIGN KEY (`potreto_id`) REFERENCES `potreros` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ganaderia.animales_potreros: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `animales_potreros` DISABLE KEYS */;
/*!40000 ALTER TABLE `animales_potreros` ENABLE KEYS */;

-- Volcando estructura para tabla ganaderia.animales_ventas
CREATE TABLE IF NOT EXISTS `animales_ventas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comprador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `documento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ganaderia.animales_ventas: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `animales_ventas` DISABLE KEYS */;
INSERT INTO `animales_ventas` (`id`, `comprador`, `codigo`, `fecha`, `documento`, `ubicacion`, `telefono`, `tipo`, `estado`, `created_at`, `updated_at`) VALUES
	(4, 'EDUARDO ALMANZA', 'FV1', '2021-07-09', '23232', NULL, NULL, NULL, 1, '2021-07-09 05:34:16', '2021-07-09 05:34:16'),
	(5, 'ROSA ALMANZA', 'FV5', '2021-07-09', '232232', NULL, NULL, NULL, 1, '2021-07-09 05:40:07', '2021-07-09 05:40:07'),
	(6, 'AA', 'FV6', '2021-07-09', '232', NULL, NULL, NULL, 1, '2021-07-09 05:41:21', '2021-07-09 05:41:21'),
	(7, 'ANGELICA PEREZ', 'FV7', '2021-07-09', '100', NULL, NULL, NULL, 1, '2021-07-09 05:42:41', '2021-07-09 05:42:41'),
	(8, 'FGHF', 'FV8', '2021-07-09', '445', NULL, NULL, NULL, 1, '2021-07-09 05:44:12', '2021-07-09 05:44:12');
/*!40000 ALTER TABLE `animales_ventas` ENABLE KEYS */;

-- Volcando estructura para tabla ganaderia.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla ganaderia.clientes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla ganaderia.detalles_ventas
CREATE TABLE IF NOT EXISTS `detalles_ventas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `animal_id` bigint(20) unsigned NOT NULL,
  `venta_id` bigint(20) unsigned NOT NULL,
  `valor` double NOT NULL,
  `valorkg` double DEFAULT NULL,
  `peso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `animales_ventas_animal_id_foreign` (`animal_id`),
  KEY `FK_detalles_ventas_animales_ventas` (`venta_id`),
  CONSTRAINT `FK_detalles_ventas_animales_ventas` FOREIGN KEY (`venta_id`) REFERENCES `animales_ventas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `detalles_ventas_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animales` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla ganaderia.detalles_ventas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `detalles_ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalles_ventas` ENABLE KEYS */;

-- Volcando estructura para tabla ganaderia.entidades
CREATE TABLE IF NOT EXISTS `entidades` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hectareas` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ganaderia.entidades: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `entidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `entidades` ENABLE KEYS */;

-- Volcando estructura para tabla ganaderia.etapas
CREATE TABLE IF NOT EXISTS `etapas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ganaderia.etapas: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `etapas` DISABLE KEYS */;
INSERT INTO `etapas` (`id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'CRIA', 1, '2021-07-08 19:41:06', '2021-07-08 19:41:16');
/*!40000 ALTER TABLE `etapas` ENABLE KEYS */;

-- Volcando estructura para tabla ganaderia.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ganaderia.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla ganaderia.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ganaderia.migrations: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1),
	(3, '2021_07_07_183707_create_fincas_table', 1),
	(4, '2021_07_08_183423_create_potreros_table', 1),
	(5, '2021_07_08_183701_create_razas_table', 1),
	(6, '2021_07_08_183802_create_animales_table', 1),
	(7, '2021_07_08_185609_create_animales_compras_table', 1),
	(8, '2021_07_08_190013_create_animales_potreros_table', 1),
	(9, '2021_07_08_191528_create_animales_ventas_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla ganaderia.potreros
CREATE TABLE IF NOT EXISTS `potreros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cercas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maleza` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ganaderia.potreros: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `potreros` DISABLE KEYS */;
INSERT INTO `potreros` (`id`, `nombre`, `area`, `cercas`, `maleza`, `observaciones`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'POTERO DE PRUEBA', '100', '2', 'uvita', 'potrero para terneros', 1, '2021-07-08 21:57:46', '2021-07-08 21:58:10');
/*!40000 ALTER TABLE `potreros` ENABLE KEYS */;

-- Volcando estructura para tabla ganaderia.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ganaderia.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `estado`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'LUIS ZABALA', 'admin', 'mailmail.com', '2021-07-09 09:09:13', '$2y$10$67okjrYhwdMaKNYcByUeYeD/PQx4TyA4as9f5Dmsl/OeZ4VzC5Qb6', 1, NULL, '2021-07-09 09:09:24', '2021-07-09 09:09:25');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
