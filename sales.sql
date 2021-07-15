-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.19 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para ventas
CREATE DATABASE IF NOT EXISTS `ventas` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ventas`;

-- Volcando estructura para tabla ventas.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.migrations: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2021_07_13_002630_create_products_table', 1),
	(2, '2021_07_13_002734_create_sales_table', 1),
	(3, '2021_07_13_002752_create_sale_details_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `taxes` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_sku_unique` (`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.products: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `sku`, `name`, `description`, `photo`, `price`, `taxes`, `active`, `created_at`, `updated_at`) VALUES
	(1, 'SC', 'Miss Jane Walter', 'Provident ea eos sit facilis. Occaecati ut et sunt doloribus soluta est.', 'adbfc2fbe228fd82e9bf4c84e0f2e430.png', 193543.91, 19, 0, '2021-07-13 01:07:37', '2021-07-13 01:07:37'),
	(2, 'CW', 'Otilia Welch', 'Non atque modi ipsum non. Aspernatur sit quis officia nesciunt sint est ut qui. Est qui earum id.', '4f29b341ea02a3f1b6d9646c593d95dc.png', 135672.71, 10, 1, '2021-07-13 01:07:37', '2021-07-13 01:07:37'),
	(3, 'CV', 'Earline Wilderman Jr.', 'Enim temporibus nostrum sed molestiae velit eos. Qui et voluptas mollitia dolores adipisci.', '448f0974c7d980b91ce2d347bbefcb11.png', 122694.46, 10, 1, '2021-07-13 01:07:37', '2021-07-13 01:07:37'),
	(4, 'CZ', 'Arjun Durgan', 'Repellat et quam voluptate. Voluptatibus earum ratione corrupti nemo ut.', 'b6d777a4baa6f459119be993f8489d71.png', 100000.48, 0, 1, '2021-07-13 01:07:37', '2021-07-13 01:07:37'),
	(5, 'BL', 'Wilfred Nikolaus', 'Enim ipsam ipsam qui laborum. Aut sed soluta voluptatibus sit veniam vero suscipit omnis.', '119e49a9f43821bd170fe1cac5a6bba1.png', 194418.81, 19, 1, '2021-07-13 01:07:37', '2021-07-13 01:07:37'),
	(6, 'NR', 'Abigail Kunze', 'Consequatur tempora dolores non fugit. Non accusantium vero sed unde amet qui. Sed officia id quia.', 'd0812f8496449dcb5066a4d3d39c29f0.png', 185385.76, 19, 1, '2021-07-13 01:07:37', '2021-07-13 01:07:37'),
	(7, 'PS', 'Antoinette Botsford', 'Ea quis facere sit officiis. Eius sunt eum minima mollitia qui distinctio quam.', '8a50d1bc42c977e3e44e157f4660a5c7.png', 110809.81, 19, 1, '2021-07-13 01:07:37', '2021-07-13 01:07:37'),
	(8, 'MT', 'Rocky Sanford', 'Quidem totam voluptatum accusantium vel. Nostrum nisi aut aut et. Consequatur optio non ea quasi.', '75f1eb0fc771593918904ba54a16c120.png', 190291.63, 10, 1, '2021-07-13 01:07:37', '2021-07-13 01:07:37'),
	(9, 'TT', 'Johathan Heller', 'Quidem porro sint impedit enim. Aut vel recusandae commodi adipisci quia autem.', '86986cd44cb0b577fc02552ca2ec5b04.png', 5000, 19, 1, '2021-07-13 01:07:37', '2021-07-13 01:07:37'),
	(10, 'CUS-01', 'test one', 'Lorem ipsum', '0dc8cc8bb4b39efe3dcdc790b69899da.png', 10501, 0, 0, '2021-07-13 01:07:37', '2021-07-13 06:07:20'),
	(11, 'CUS-02', 'CUS-02', 'Lorem ipsum', 'images/uevtrb9qfS.png', 10500, 10, 1, '2021-07-13 14:15:24', '2021-07-13 14:15:24');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.sales
CREATE TABLE IF NOT EXISTS `sales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` double NOT NULL,
  `total_taxes` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.sales: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` (`id`, `client`, `phone`, `email`, `subtotal`, `total_taxes`, `total`, `created_at`, `updated_at`) VALUES
	(1, 'Juan Cuartas', '3000000000', 'test@test.com', 35000, 4850, 39850, '2021-07-13 05:22:20', '2021-07-13 05:22:20'),
	(2, 'Juan Cuartas', '3000000000', 'test@test.com', 77500, 10000, 87500, '2021-07-13 14:19:22', '2021-07-13 14:19:22'),
	(3, 'Juan Cuartas', '3000000000', 'test@test.com', 552503, 5250, 557753, '2021-07-13 14:20:42', '2021-07-13 14:20:42'),
	(4, 'Juan Cuartas', '3000000000', 'test@test.com', 121001, 2100, 123101, '2021-07-13 15:15:31', '2021-07-13 15:15:31'),
	(5, 'Juan Cuartas', '3000000000', 'test@test.com', 121001, 2100, 123101, '2021-07-13 15:46:51', '2021-07-13 15:46:51'),
	(6, 'Juan Cuartas', '3000000000', 'test@test.com', 121001, 2100, 123101, '2021-07-14 23:35:45', '2021-07-14 23:35:45'),
	(7, 'Juan Londoño', '3000000', 'test1@test.com', 121001, 2100, 123101, '2021-07-14 23:36:07', '2021-07-14 23:36:07'),
	(8, 'Juan Londoño', '3000000', 'test1@test.com', 4567313, 623578.364, 5190891, '2021-07-14 23:36:41', '2021-07-14 23:36:41'),
	(9, 'Juan Londoño', '3000000', 'test1@test.com', 7280768, 894923.784, 8175691, '2021-07-14 23:37:51', '2021-07-14 23:37:51');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;

-- Volcando estructura para tabla ventas.sale_details
CREATE TABLE IF NOT EXISTS `sale_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `unit_value` double NOT NULL,
  `tax` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sale_details_sale_id_foreign` (`sale_id`),
  KEY `sale_details_product_id_foreign` (`product_id`),
  CONSTRAINT `sale_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `sale_details_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla ventas.sale_details: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `sale_details` DISABLE KEYS */;
INSERT INTO `sale_details` (`id`, `sale_id`, `product_id`, `unit_value`, `tax`, `quantity`, `created_at`, `updated_at`) VALUES
	(1, 1, 9, 5000, 2850, 3, '2021-07-13 05:22:20', '2021-07-13 05:22:20'),
	(2, 1, 10, 10000, 2000, 2, '2021-07-13 05:22:20', '2021-07-13 05:22:20'),
	(3, 2, 9, 5000, 4750, 5, '2021-07-13 14:19:22', '2021-07-13 14:19:22'),
	(4, 2, 11, 10500, 5250, 5, '2021-07-13 14:19:22', '2021-07-13 14:19:22'),
	(5, 3, 4, 100000.48, 0, 5, '2021-07-13 14:20:42', '2021-07-13 14:20:42'),
	(6, 3, 11, 10500, 5250, 5, '2021-07-13 14:20:42', '2021-07-13 14:20:42'),
	(7, 4, 4, 100000.48, 0, 1, '2021-07-13 15:15:31', '2021-07-13 15:15:31'),
	(8, 4, 11, 10500, 2100, 2, '2021-07-13 15:15:31', '2021-07-13 15:15:31'),
	(9, 5, 4, 100000.48, 0, 1, '2021-07-13 15:46:51', '2021-07-13 15:46:51'),
	(10, 5, 11, 10500, 2100, 2, '2021-07-13 15:46:51', '2021-07-13 15:46:51'),
	(11, 6, 4, 100000.48, 0, 1, '2021-07-14 23:35:46', '2021-07-14 23:35:46'),
	(12, 6, 11, 10500, 2100, 2, '2021-07-14 23:35:46', '2021-07-14 23:35:46'),
	(13, 7, 4, 100000.48, 0, 1, '2021-07-14 23:36:07', '2021-07-14 23:36:07'),
	(14, 7, 11, 10500, 2100, 2, '2021-07-14 23:36:07', '2021-07-14 23:36:07'),
	(15, 8, 6, 185385.76, 352232.944, 10, '2021-07-14 23:36:41', '2021-07-14 23:36:41'),
	(16, 8, 2, 135672.71, 271345.42, 20, '2021-07-14 23:36:41', '2021-07-14 23:36:41'),
	(17, 9, 6, 185385.76, 352232.944, 10, '2021-07-14 23:37:51', '2021-07-14 23:37:51'),
	(18, 9, 2, 135672.71, 271345.42, 20, '2021-07-14 23:37:51', '2021-07-14 23:37:51'),
	(19, 9, 2, 135672.71, 271345.42, 20, '2021-07-14 23:37:51', '2021-07-14 23:37:51');
/*!40000 ALTER TABLE `sale_details` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
