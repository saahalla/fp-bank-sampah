-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               8.0.26 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_bank_sampah.trash_category
CREATE TABLE IF NOT EXISTS `trash_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(128) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_bank_sampah.trash_category: ~0 rows (approximately)
/*!40000 ALTER TABLE `trash_category` DISABLE KEYS */;
INSERT INTO `trash_category` (`id`, `category`, `price`) VALUES
	(2, 'Besi', 1500),
	(4, 'Minyak', 1200),
	(5, 'Baja', 1600),
	(6, 'Kardus', 800),
	(7, 'Kayu', 200),
	(8, 'Plastik', 400),
	(9, 'Kertas', 1400);
/*!40000 ALTER TABLE `trash_category` ENABLE KEYS */;

-- Dumping structure for table db_bank_sampah.trash_trx
CREATE TABLE IF NOT EXISTS `trash_trx` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `weight` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_bank_sampah.trash_trx: ~0 rows (approximately)
/*!40000 ALTER TABLE `trash_trx` DISABLE KEYS */;
INSERT INTO `trash_trx` (`id`, `user_id`, `category_id`, `weight`) VALUES
	(1, 5, 5, 10),
	(2, 5, 6, 8),
	(3, 5, 7, 30),
	(4, 5, 8, 25),
	(5, 6, 2, 100),
	(6, 5, 4, 90),
	(7, 5, 8, 1000),
	(8, 6, 5, 30),
	(9, 5, 5, 8),
	(10, 6, 7, 22);
/*!40000 ALTER TABLE `trash_trx` ENABLE KEYS */;

-- Dumping structure for table db_bank_sampah.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int DEFAULT NULL,
  `is_active` int DEFAULT NULL,
  `date_created` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table db_bank_sampah.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
	(5, 'admin', 'admin@m.c', 'default.jpg', '$2y$10$F9hp3xMbvLicQPvOa3CcMuxhM.Y3qn/T6vkih6cF2qdXnaljit5NS', 1, 1, 1637848058),
	(6, 'user', 'user@m.id', 'default.jpg', '$2y$10$mEWDSu25LouXwOyJuZxyLutXiKbuyIObzXm9D6PtlQxCjhU5XGNSW', 2, 1, 1637895707);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table db_bank_sampah.user_access_menu
CREATE TABLE IF NOT EXISTS `user_access_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `menu_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_bank_sampah.user_access_menu: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_access_menu` DISABLE KEYS */;
INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 2, 2);
/*!40000 ALTER TABLE `user_access_menu` ENABLE KEYS */;

-- Dumping structure for table db_bank_sampah.user_menu
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_bank_sampah.user_menu: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_menu` DISABLE KEYS */;
INSERT INTO `user_menu` (`id`, `menu`) VALUES
	(1, 'admin'),
	(2, 'user');
/*!40000 ALTER TABLE `user_menu` ENABLE KEYS */;

-- Dumping structure for table db_bank_sampah.user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_bank_sampah.user_role: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` (`id`, `role`) VALUES
	(1, 'Administrator'),
	(2, 'Member');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;

-- Dumping structure for table db_bank_sampah.user_sub_menu
CREATE TABLE IF NOT EXISTS `user_sub_menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `menu_id` int DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `is_active` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_bank_sampah.user_sub_menu: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_sub_menu` DISABLE KEYS */;
INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
	(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
	(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 0),
	(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 0),
	(4, 2, 'Sell Trash', 'trash/sell', 'fas fa-fw fa-dollar-sign', 1),
	(5, 2, 'Check Trash Price', 'trash/price', 'fas fa-fw fa-dollar-sign', 1),
	(6, 1, 'Trash Category', 'trash/category', 'fas fa-fw fa-table', 1),
	(7, 1, 'All Transaction', 'trash/transaction', 'fas fa-fw fa-table', 1),
	(8, 2, 'My Transaction', 'trash/user_transaction', 'fas fa-fw fa-table', 1);
/*!40000 ALTER TABLE `user_sub_menu` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
