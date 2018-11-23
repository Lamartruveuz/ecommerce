-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 23 nov. 2018 à 15:50
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double DEFAULT NULL,
  `billing_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `delivery_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_user_billing_adress` (`billing_adress_id`),
  KEY `IDX_user_delivery_adress` (`delivery_adress_id`),
  KEY `IDX_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `type`, `status`, `amount`, `billing_adress_id`, `delivery_adress_id`, `created_at`, `updated_at`) VALUES
(2, 2, 'CART', 'CART', 250, 1, 2, '2018-10-07 13:11:19', '2018-10-07 13:11:19'),
(46, 3, 'ORDER', 'BILLED', 50, 1, 2, '2018-11-23 14:26:36', '2018-11-23 14:26:36'),
(49, 17, 'CART', 'CART', 142.44, 1, 2, '2018-11-23 15:25:23', '2018-11-23 15:25:23'),
(50, 3, 'CART', 'CART', 313.68, 1, 2, '2018-11-23 15:30:56', '2018-11-23 15:30:56');

-- --------------------------------------------------------

--
-- Structure de la table `order_addresses`
--

DROP TABLE IF EXISTS `order_addresses`;
CREATE TABLE IF NOT EXISTS `order_addresses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `human_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_one` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_two` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `order_addresses`
--

INSERT INTO `order_addresses` (`id`, `human_name`, `address_one`, `address_two`, `postal_code`, `city`, `country`, `created_at`, `updated_at`) VALUES
(2, 'Fred Eric', '2 impasse Duvet', '3ieme étage', '59000', 'Lille', 'FRANCE', '2018-10-07 13:11:19', '2018-10-07 13:11:19'),
(3, 'Fred Eric', '120 Boulevard Vaubant', 'B506', '59000', 'Lille', 'FRANCE', '2018-10-07 13:11:19', '2018-10-07 13:11:19'),
(4, 'Fred Eric', '2 impasse Duvet', '3ieme étage', '59000', 'Lille', 'FRANCE', '2018-10-07 13:11:19', '2018-10-07 13:11:19'),
(5, 'Fred Eric', '120 Boulevard Vaubant', 'B506', '59000', 'Lille', 'FRANCE', '2018-10-07 13:11:19', '2018-10-07 13:11:19'),
(26, 'a', 'a', 'a', 'a', 'a', 'o', '2018-10-17 21:25:15', '2018-10-17 21:25:15'),
(27, 'b', 'b', 'b', 'b', 'b', 'b', '2018-10-26 14:02:44', '2018-10-26 14:02:44'),
(28, 'Alex', '15', '', '38', 'f', 'l', '2018-11-23 15:02:59', '2018-11-23 15:02:59');

-- --------------------------------------------------------

--
-- Structure de la table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
CREATE TABLE IF NOT EXISTS `order_products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(3) UNSIGNED NOT NULL,
  `unit_price` double DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_order_product` (`order_id`),
  KEY `IDX_product_order` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, 57.08, '2018-10-07 13:11:19', '2018-10-07 13:11:19'),
(3, 1, 2, 3, 46.22, '2018-10-07 13:11:19', '2018-10-07 13:11:19'),
(4, 2, 1, 5, 50, '2018-10-07 13:11:19', '2018-10-07 13:11:19'),
(12, 7, 1, 6, 57.08, '2018-10-13 12:58:39', '2018-10-13 12:58:39'),
(13, 7, 3, 19, 46.22, '2018-10-13 13:06:28', '2018-10-13 13:06:28'),
(14, 7, 2, 1, 50, '2018-10-14 22:24:18', '2018-10-14 22:24:18'),
(48, 32, 3, 1, 46.22, '2018-11-10 14:12:45', '2018-11-10 14:12:45'),
(50, 36, 3, 1, 46.22, '2018-11-10 14:26:02', '2018-11-10 14:26:02'),
(51, 37, 3, 1, 46.22, '2018-11-10 14:28:37', '2018-11-10 14:28:37'),
(52, 38, 3, 4, 46.22, '2018-11-10 14:30:55', '2018-11-10 14:30:55'),
(53, 38, 2, 4, 50, '2018-11-10 14:31:48', '2018-11-10 14:31:48'),
(54, 38, 1, 2, 57.08, '2018-11-10 14:31:59', '2018-11-10 14:31:59'),
(59, 43, 3, 1, 46.22, '2018-11-23 14:23:49', '2018-11-23 14:23:49'),
(61, 45, 2, 1, 50, '2018-11-23 14:24:36', '2018-11-23 14:24:36'),
(63, 46, 2, 1, 50, '2018-11-23 14:26:40', '2018-11-23 14:26:40'),
(69, 49, 3, 2, 46.22, '2018-11-23 15:25:23', '2018-11-23 15:25:23'),
(70, 49, 2, 1, 50, '2018-11-23 15:25:28', '2018-11-23 15:25:28'),
(72, 50, 1, 3, 57.08, '2018-11-23 15:30:56', '2018-11-23 15:30:56'),
(73, 50, 3, 2, 46.22, '2018-11-23 15:31:04', '2018-11-23 15:31:04'),
(74, 50, 2, 1, 50, '2018-11-23 15:34:59', '2018-11-23 15:34:59');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_short` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `unit_price` double DEFAULT NULL,
  `range_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name_long` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_product_range` (`range_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name_short`, `description`, `unit_price`, `range_id`, `created_at`, `updated_at`, `name_long`) VALUES
(1, 'ASUS MH-10XM', 'Elegant et performant, l\'ordinateur portable ASUS MH-10XM offre un excellent niveau de confort grace a ses composants performants, son design agreable, son clavier retroeclaire et son ecran de 15.6\" anti-reflets avec resolution Full HD. Un choix ideal pour le divertissement numerique mobile.\r\n\r\n', 57.08, 3, '2018-10-07 13:11:19', '2018-10-07 13:11:18', 'Ecran 15\", intel core i7 - Gtx 1050Ti'),
(2, 'Iphone x', 'Smartphone 4G, Systeme d\'exploitation iOS 11, GPS, GLONASS, Galileo et QZSS assistes, Appareil photo principal grand angle et teleobjectif 12 Mpx, Camera TrueDepth 7 Mpx, WiFi avec MiMo, Bluetooth 5.0, NFC, Appels video FaceTime', 50, 4, '2018-10-11 13:25:09', '2018-10-11 13:25:09', 'Ecran 5.8\", appareil photo 12 Mpixels'),
(3, 'Festina - F6835', 'Contenu du coffret:<br/>\r\n-Montre<br/>\r\n-Ecrin<br/>\r\n-Livret de garantie', 46.22, 5, '2018-10-07 13:11:18', '2018-10-07 13:11:18', 'Quartz Chronographe - Bracelet Cuir Bleu');

-- --------------------------------------------------------

--
-- Structure de la table `ranges`
--

DROP TABLE IF EXISTS `ranges`;
CREATE TABLE IF NOT EXISTS `ranges` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_range_parent` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `ranges`
--

INSERT INTO `ranges` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, 'Informatique', NULL, '2018-10-07 13:11:18', '2018-10-07 13:11:18'),
(3, 'Ordinateurs', 2, '2018-10-07 13:11:18', '2018-10-07 13:11:18'),
(4, 'Smartphones', 2, '2018-10-07 13:11:18', '2018-10-07 13:11:18'),
(5, 'Montres', NULL, '2018-11-23 13:47:02', '2018-11-23 13:47:02');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `delivery_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDX_user_billing_adress` (`billing_adress_id`),
  KEY `IDX_user_delivery_adress` (`delivery_adress_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `billing_adress_id`, `delivery_adress_id`, `created_at`, `updated_at`) VALUES
(2, 'Fred Eric', 'fred.eric@example.com', 'password', 1, 2, '2018-10-07 13:11:19', '2018-10-07 13:11:19'),
(3, 'Frederic', 'frederic@example.com', 'password', 3, 4, '2018-10-07 13:11:19', '2018-10-07 13:11:19'),
(15, 'a', 'a.i@lol.com', 'b', 26, 25, '2018-10-17 21:25:15', '2018-10-17 21:25:15'),
(16, 'b', 'b@i.com', 'b', 27, 26, '2018-10-26 14:02:44', '2018-10-26 14:02:44'),
(17, 'Alex', 'alex.andre@i.com', 'alex', 28, 27, '2018-11-23 15:02:59', '2018-11-23 15:02:59');

-- --------------------------------------------------------

--
-- Structure de la table `user_addresses`
--

DROP TABLE IF EXISTS `user_addresses`;
CREATE TABLE IF NOT EXISTS `user_addresses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `human_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_one` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_two` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `human_name`, `address_one`, `address_two`, `postal_code`, `city`, `country`, `created_at`, `updated_at`) VALUES
(2, 'Fred Eric', '2 impasse Duvet', '3ieme étage', '59000', 'Lille', 'FRANCE', '2018-10-07 13:11:19', '2018-10-07 13:11:19'),
(3, 'Eric Fred', '12 route Pleine', 'chez mon oncle', '59000', 'Lille', 'FRANCE', '2018-10-07 13:11:19', '2018-10-07 13:11:19'),
(4, 'Frederic', '239 rue de Douai', 'a', '59000', 'Lille', 'FRANCE', '2018-10-07 13:11:19', '2018-10-07 13:11:19'),
(5, 'Epicfred', '3 sans idée', 'oui oui', '59000', 'Lille', 'FRANCE', '2018-10-07 13:11:19', '2018-10-07 13:11:19'),
(25, 'a', 'a', 'a', 'a', 'a', 'a', '2018-10-17 21:25:15', '2018-10-17 21:25:15'),
(26, 'b', 'b', 'b', 'b', 'b', 'b', '2018-10-26 14:02:44', '2018-10-26 14:02:44'),
(27, 'Alex', '16', '', '38', 'f', 'l', '2018-11-23 15:02:59', '2018-11-23 15:02:59');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
