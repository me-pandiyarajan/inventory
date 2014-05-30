-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2014 at 04:37 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory`
--
CREATE DATABASE IF NOT EXISTS `inventory` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inventory`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) DEFAULT NULL,
  `comments` varchar(45) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `last_updated_date` timestamp NULL DEFAULT NULL,
  `created_by` int(11) unsigned DEFAULT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`category_id`),
  KEY `fk_categories_users1_idx` (`created_by`),
  KEY `fk_categories_users2_idx` (`last_updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `comments`, `created_date`, `last_updated_date`, `created_by`, `last_updated_by`, `status`) VALUES
(1, 'Fabric', 'Fabric', '2014-04-21 11:45:09', '2014-04-21 11:45:09', NULL, NULL, 1),
(2, 'Tile', 'Tile', '2014-04-26 11:47:13', '2014-04-26 11:47:13', 1, NULL, 1),
(3, 'Curtains', '- ready made\r\n- raw cloth', '2014-05-20 08:14:42', '2014-05-23 09:44:53', NULL, 1, 1),
(4, 'Sample Test', 'Testing new category', '2014-05-22 02:41:47', '2014-05-23 07:38:25', NULL, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_dimensions`
--

CREATE TABLE IF NOT EXISTS `category_dimensions` (
  `dim_id` int(11) NOT NULL AUTO_INCREMENT,
  `metrics` varchar(45) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`dim_id`),
  KEY `fk_category_dimensions_categories1_idx` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `mobile_number` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `last_updated_date` timestamp NULL DEFAULT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned NOT NULL,
  `group_customer_customer_group_id` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `fk_customer_users1_idx` (`created_by`),
  KEY `fk_customer_users2_idx` (`last_updated_by`),
  KEY `fk_customer_group_customer1_idx` (`group_customer_customer_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `estimated_product`
--

CREATE TABLE IF NOT EXISTS `estimated_product` (
  `temp_product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(45) DEFAULT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `design_name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `dimensions` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_updated_date` datetime DEFAULT NULL,
  `Ifref` tinyint(1) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `Delivery_Quality` int(11) DEFAULT NULL,
  `Damaged_Quality` int(11) DEFAULT NULL,
  `Delivery_Comments` varchar(225) DEFAULT NULL,
  `estimate_id` int(10) unsigned NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  `order_product` int(20) NOT NULL,
  `delivery_status` int(20) NOT NULL,
  `product_sku` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`temp_product_id`),
  KEY `fk_estimated_product_new_estimation1_idx` (`estimate_id`),
  KEY `fk_Estimated_users1_idx1` (`created_by`),
  KEY `fk_Estimated_users2_idx2` (`last_updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `estimated_product`
--

INSERT INTO `estimated_product` (`temp_product_id`, `product_name`, `quantity`, `design_name`, `description`, `dimensions`, `created_date`, `last_updated_date`, `Ifref`, `product_id`, `Delivery_Quality`, `Damaged_Quality`, `Delivery_Comments`, `estimate_id`, `created_by`, `last_updated_by`, `order_product`, `delivery_status`, `product_sku`) VALUES
(1, 'metal foldable chair', '21 Pieces', 'design/pink', ' 	500 Piece/Pieces one color for chair', ' X 12', '2014-05-20 14:51:30', NULL, 1, NULL, 645, 0, 'vccvncv', 150, 1, NULL, 1, 1, 'INDCHE0001Fabdnpk000001'),
(2, 'metal foldable chair', '21 Pieces', 'design/pink', ' 	500 Piece/Pieces one color for chair', ' X 12', '2014-05-20 14:54:20', NULL, 1, NULL, 12, 0, 'zxx', 151, 1, NULL, 1, 1, 'INDCHE0001Fabdnpk000001'),
(3, 'metal foldable chair', '21 Pieces', 'design/pink', ' 	500 Piece/Pieces one color for chair', ' X 12', '2014-05-20 14:55:19', NULL, 1, NULL, 0, 1, 'sdds', 152, 1, NULL, 1, 1, 'INDCHE0001Fabdnpk000001'),
(4, 'metal foldable chair', '21 Pieces', 'design/pink', ' 	500 Piece/Pieces one color for chair', ' X 12', '2014-05-20 15:43:49', NULL, 1, NULL, NULL, NULL, NULL, 153, 1, NULL, 1, 0, 'INDCHE0001Fabdnpk000001'),
(5, 'metal foldable chair', '21 Box(s)', 'design/pink', ' 	500 Piece/Pieces one color for chair', ' 12H  meter', '2014-05-20 16:23:12', NULL, 1, NULL, NULL, NULL, NULL, 154, 1, NULL, 1, 0, 'INDCHE0001Fabdnpk000001'),
(6, NULL, NULL, NULL, NULL, NULL, '2014-05-22 08:30:16', NULL, 0, NULL, NULL, NULL, NULL, 155, 2, NULL, 1, 0, ''),
(7, 'metal foldable chair', '21 Pieces', 'design/pink', ' 	500 Piece/Pieces one color for chair', ' 12H  meter', '2014-05-22 08:32:33', NULL, 1, NULL, NULL, NULL, NULL, 156, 2, NULL, 1, 0, 'INDCHE0001FABDNPK000001'),
(8, 'metal foldable chair', '21 Pieces', 'design/pink', ' 	500 Piece/Pieces one color for chair', ' 12H  meter', '2014-05-22 08:58:45', NULL, 1, NULL, 12, 7, 'sfdsfsdf', 157, 2, NULL, 1, 1, 'INDCHE0001FABDNPK000001'),
(9, 'metal foldable chair', '21 ', 'design/pink', ' 	500 Piece/Pieces one color for chair', ' 12H  meter', '2014-05-22 15:36:09', NULL, 1, NULL, NULL, NULL, NULL, 158, 2, NULL, 1, 0, 'INDCHE0001FABDNPK000001'),
(10, 'metal foldable chair', '21 ', 'design/pink', ' 	500 Piece/Pieces one color for chair', ' 12H  meter', '2014-05-22 15:37:41', NULL, 1, NULL, NULL, NULL, NULL, 159, 2, NULL, 1, 0, 'INDCHE0001FABDNPK000001'),
(11, 'metal foldable chair', '21 ', 'design/pink', ' 	500 Piece/Pieces one color for chair', ' 12H  meter', '2014-05-22 15:39:07', NULL, 1, NULL, NULL, NULL, NULL, 160, 2, NULL, 1, 0, 'INDCHE0001FABDNPK000001'),
(12, 'metal foldable chair', '21 ', 'design/pink', ' 	500 Piece/Pieces one color for chair', ' 12H  meter', '2014-05-22 15:40:12', NULL, 1, NULL, NULL, NULL, NULL, 161, 2, NULL, 1, 0, 'INDCHE0001FABDNPK000001'),
(13, 'metal foldable chair', '21 ', 'design/pink', '500 Piece/Pieces one color for chair', ' 12H  meter', '2014-05-22 15:52:53', NULL, 1, NULL, 12, 0, 'jghj', 162, 2, NULL, 1, 1, 'INDCHE0001FABDNPK000001'),
(14, 'Prdt Test', '', '/', '', '', '2014-05-23 12:18:12', NULL, 0, NULL, NULL, NULL, NULL, 163, 2, NULL, 1, 0, ''),
(15, 'Prdt Test', '', '/', '', '', '2014-05-23 12:18:12', NULL, 0, NULL, NULL, NULL, NULL, 163, 2, NULL, 1, 0, ''),
(16, 'Prdt Test', '', '/', '', '', '2014-05-23 12:18:12', NULL, 0, NULL, NULL, NULL, NULL, 163, 2, NULL, 1, 0, ''),
(17, 'Test pdt', '', '/', '', '', '2014-05-23 12:39:17', NULL, 1, NULL, 12, 0, 'wewe', 164, 2, NULL, 1, 1, ''),
(18, 'deo product 2', '12 pieces', 'design/shade', 'desc', ' 2L  meter', '2014-05-28 09:27:04', NULL, 1, NULL, 12, 0, 'ada', 165, 2, 2, 1, 1, 'INDCHE0001TILDNSE000015'),
(19, 'admin product', '100 pieces', 'design/shade', 'desc', ' meter', '2014-05-28 12:01:20', NULL, 1, NULL, NULL, NULL, NULL, 166, 1, NULL, 1, 0, 'INDCHE0001FABDNSE000013'),
(20, 'product', '21', 'design/blue', 'desc', '12X12X12', '2014-05-28 12:01:20', NULL, 1, NULL, NULL, NULL, NULL, 166, 1, NULL, 1, 0, ''),
(21, 'test', '12', 'design/blue', 'desc', '12X12', '2014-05-28 12:02:22', NULL, 0, NULL, NULL, NULL, NULL, 166, 1, NULL, 1, 0, 'N/A'),
(22, 'deo product', '12 boxes', 'design/shade', 'desc', ' meter', '2014-05-29 14:42:31', NULL, 1, NULL, 12, 0, 'erete', 167, 2, 1, 1, 1, 'INDCHE0001TILDNSE000012'),
(23, 'sample deo product', '0 ', 'design/blue', 'desc', ' feet', '2014-05-30 16:07:30', NULL, 1, NULL, NULL, NULL, NULL, 168, 2, NULL, 1, 0, 'INDCHE0001FABDNBE000019');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'superadmin', 'super administrator'),
(2, 'admin', 'admin'),
(3, 'deo', 'data entry operator');

-- --------------------------------------------------------

--
-- Table structure for table `group_customer`
--

CREATE TABLE IF NOT EXISTS `group_customer` (
  `customer_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_group_name` varchar(45) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `last_updated_date` timestamp NULL DEFAULT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned NOT NULL,
  PRIMARY KEY (`customer_group_id`),
  KEY `fk_group_customer_users1_idx` (`created_by`),
  KEY `fk_group_customer_users2_idx` (`last_updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_05_26_123815_create_categories_table', 0),
('2014_05_26_123815_create_category_dimensions_table', 0),
('2014_05_26_123815_create_customer_table', 0),
('2014_05_26_123815_create_estimated_product_table', 0),
('2014_05_26_123815_create_group_customer_table', 0),
('2014_05_26_123815_create_groups_table', 0),
('2014_05_26_123815_create_login_attempts_table', 0),
('2014_05_26_123815_create_new_estimation_table', 0),
('2014_05_26_123815_create_new_order_table', 0),
('2014_05_26_123815_create_products_table', 0),
('2014_05_26_123815_create_suppliers_table', 0),
('2014_05_26_123815_create_tax_class_table', 0),
('2014_05_26_123815_create_users_table', 0),
('2014_05_26_123815_create_users_groups_table', 0),
('2014_05_26_123818_add_foreign_keys_to_categories_table', 0),
('2014_05_26_123818_add_foreign_keys_to_category_dimensions_table', 0),
('2014_05_26_123818_add_foreign_keys_to_customer_table', 0),
('2014_05_26_123818_add_foreign_keys_to_estimated_product_table', 0),
('2014_05_26_123818_add_foreign_keys_to_group_customer_table', 0),
('2014_05_26_123818_add_foreign_keys_to_new_estimation_table', 0),
('2014_05_26_123818_add_foreign_keys_to_new_order_table', 0),
('2014_05_26_123818_add_foreign_keys_to_products_table', 0),
('2014_05_26_123818_add_foreign_keys_to_users_groups_table', 0),
('2014_05_26_130142_create_products_table', 0),
('2014_05_26_130143_add_foreign_keys_to_products_table', 0),
('2014_05_27_140920_create_categories_table', 0),
('2014_05_27_140920_create_category_dimensions_table', 0),
('2014_05_27_140920_create_customer_table', 0),
('2014_05_27_140920_create_estimated_product_table', 0),
('2014_05_27_140920_create_group_customer_table', 0),
('2014_05_27_140920_create_groups_table', 0),
('2014_05_27_140920_create_login_attempts_table', 0),
('2014_05_27_140920_create_new_estimation_table', 0),
('2014_05_27_140920_create_new_order_table', 0),
('2014_05_27_140920_create_products_table', 0),
('2014_05_27_140920_create_suppliers_table', 0),
('2014_05_27_140920_create_tax_class_table', 0),
('2014_05_27_140920_create_users_table', 0),
('2014_05_27_140920_create_users_groups_table', 0),
('2014_05_27_140923_add_foreign_keys_to_categories_table', 0),
('2014_05_27_140923_add_foreign_keys_to_category_dimensions_table', 0),
('2014_05_27_140923_add_foreign_keys_to_customer_table', 0),
('2014_05_27_140923_add_foreign_keys_to_estimated_product_table', 0),
('2014_05_27_140923_add_foreign_keys_to_group_customer_table', 0),
('2014_05_27_140923_add_foreign_keys_to_new_estimation_table', 0),
('2014_05_27_140923_add_foreign_keys_to_new_order_table', 0),
('2014_05_27_140923_add_foreign_keys_to_products_table', 0),
('2014_05_27_140923_add_foreign_keys_to_users_groups_table', 0);

-- --------------------------------------------------------

--
-- Table structure for table `new_estimation`
--

CREATE TABLE IF NOT EXISTS `new_estimation` (
  `estimate_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estimate_name` varchar(225) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_updated_date` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `estimate_no_product` int(11) DEFAULT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `flag` int(10) NOT NULL,
  PRIMARY KEY (`estimate_id`),
  KEY `fk_New_Estimation_suppliers1_idx` (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=169 ;

--
-- Dumping data for table `new_estimation`
--

INSERT INTO `new_estimation` (`estimate_id`, `estimate_name`, `created_date`, `last_updated_date`, `status`, `estimate_no_product`, `created_by`, `last_updated_by`, `supplier_id`, `flag`) VALUES
(150, 'test estiamte', '2014-05-20 14:51:30', NULL, 1, 1, 1, NULL, 2, 0),
(151, 'last estimate', '2014-05-20 14:54:20', NULL, 1, 1, 1, NULL, 5, 0),
(152, 'last estimate', '2014-05-20 14:55:19', NULL, 1, 1, 1, NULL, 1, 0),
(153, 'final estimate', '2014-05-20 15:43:49', '2014-05-23 16:37:43', 2, 1, 1, 1, 1, 0),
(154, 'final estimate', '2014-05-20 16:23:12', NULL, 2, 1, 1, NULL, 1, 0),
(155, 'estimate_name', '2014-05-22 08:30:16', NULL, 2, 1, 2, NULL, 2, 0),
(156, 'estiamate_name', '2014-05-22 08:32:33', '2014-05-22 09:04:19', 2, 1, 2, 1, 2, 0),
(157, 'final estimate', '2014-05-22 08:58:45', NULL, 1, 1, 2, NULL, 1, 0),
(158, 'final estimate', '2014-05-22 15:36:09', NULL, 2, 1, 2, NULL, 1, 0),
(159, 'final estimate', '2014-05-22 15:37:41', NULL, 2, 1, 2, NULL, 1, 0),
(160, 'estiamate_name', '2014-05-22 15:39:07', NULL, 2, 1, 2, NULL, 1, 0),
(161, 'estiamate_name', '2014-05-22 15:40:12', NULL, 0, 1, 2, NULL, 2, 0),
(162, 'estiamate_name', '2014-05-22 15:52:53', NULL, 1, 1, 2, NULL, 1, 0),
(163, 'Estimate Test', '2014-05-23 12:18:12', NULL, 2, 3, 2, NULL, 1, 0),
(164, 'Testy esti', '2014-05-23 12:39:17', '2014-05-23 13:12:20', 1, 1, 2, 1, 9, 0),
(165, 'test', '2014-05-28 09:27:04', NULL, 1, 1, 2, NULL, 2, 0),
(166, 'test estimate', '2014-05-28 12:01:20', '2014-05-28 12:02:07', 2, 3, 1, 1, 2, 0),
(167, 'next_estiamte', '2014-05-29 14:42:31', NULL, 1, 1, 2, NULL, 2, 0),
(168, 'havells ', '2014-05-30 16:07:30', NULL, 1, 1, 2, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `new_order`
--

CREATE TABLE IF NOT EXISTS `new_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_name` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_updated_date` datetime DEFAULT NULL,
  `order_comments` varchar(45) DEFAULT NULL,
  `delivery_status` int(11) DEFAULT NULL,
  `estimate_id` int(10) unsigned NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `fk_new_order_New_Estimation1_idx` (`estimate_id`),
  KEY `fk_new_order_users1_idx` (`created_by`),
  KEY `fk_new_order_users2_idx` (`last_updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `new_order`
--

INSERT INTO `new_order` (`order_id`, `order_name`, `created_date`, `last_updated_date`, `order_comments`, `delivery_status`, `estimate_id`, `created_by`, `last_updated_by`) VALUES
(1, '', '2014-05-20 14:55:52', NULL, NULL, 0, 152, 1, NULL),
(2, 'order', '2014-05-20 14:56:00', '2014-05-23 11:13:11', NULL, 1, 152, 1, NULL),
(3, '', '2014-05-20 15:42:25', '2014-05-22 11:42:42', NULL, 1, 151, 1, NULL),
(4, 'final order', '2014-05-22 09:01:05', '2014-05-22 09:01:47', NULL, 1, 157, 1, NULL),
(5, '', '2014-05-23 13:35:39', '2014-05-23 14:28:00', NULL, 1, 164, 1, NULL),
(6, '', '2014-05-23 13:40:04', '2014-05-23 14:25:29', NULL, 1, 162, 1, NULL),
(7, 'order name', '2014-05-28 09:39:44', '2014-05-28 09:52:06', NULL, 1, 165, 1, NULL),
(8, 'next_order', '2014-05-29 14:43:24', '2014-05-29 14:44:15', NULL, 1, 167, 1, NULL),
(9, 'Havells', '2014-05-30 16:14:56', NULL, NULL, 2, 168, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_gen_id` int(11) NOT NULL AUTO_INCREMENT,
  `Product_ID_PLU` varchar(45) DEFAULT NULL,
  `sku` varchar(45) DEFAULT NULL,
  `barCodeImage` varchar(255) DEFAULT NULL,
  `product_name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `short_description` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT '0',
  `country_of_manufacture` varchar(45) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `group_price` float DEFAULT NULL,
  `special_price_from` timestamp NULL DEFAULT NULL,
  `special_price_to` timestamp NULL DEFAULT NULL,
  `installation_charges` mediumint(9) DEFAULT NULL,
  `total_cost` float DEFAULT NULL,
  `grand_total` float DEFAULT NULL,
  `upload_image` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  `material` varchar(225) DEFAULT NULL,
  `stock_availability` tinyint(1) DEFAULT NULL,
  `safety_stock_level` int(11) DEFAULT NULL,
  `pos_stock_level` int(100) DEFAULT NULL,
  `dimen_unit` varchar(225) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `width` float DEFAULT NULL,
  `length` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `design_name` varchar(45) DEFAULT NULL,
  `shade` varchar(45) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT NULL,
  `product_activated` timestamp NULL DEFAULT NULL,
  `approved` int(11) DEFAULT NULL,
  `approved_date` timestamp NULL DEFAULT NULL,
  `suppliers_supplier_id` int(11) DEFAULT NULL,
  `tax_class_tax_class_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `last_updated_by` int(11) DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `categories_category_id` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  PRIMARY KEY (`product_gen_id`),
  UNIQUE KEY `Product_ID_PLU` (`Product_ID_PLU`),
  UNIQUE KEY `sku` (`sku`),
  KEY `fk_products_suppliers1_idx` (`suppliers_supplier_id`),
  KEY `fk_products_tax_class1_idx` (`tax_class_tax_class_id`),
  KEY `fk_products_users1_idx` (`created_by`),
  KEY `fk_products_users2_idx` (`last_updated_by`),
  KEY `fk_products_users3_idx` (`approved_by`),
  KEY `fk_products_categories1_idx` (`categories_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_gen_id`, `Product_ID_PLU`, `sku`, `barCodeImage`, `product_name`, `description`, `short_description`, `status`, `country_of_manufacture`, `price`, `group_price`, `special_price_from`, `special_price_to`, `installation_charges`, `total_cost`, `grand_total`, `upload_image`, `quantity`, `unit`, `material`, `stock_availability`, `safety_stock_level`, `pos_stock_level`, `dimen_unit`, `weight`, `width`, `length`, `height`, `design_name`, `shade`, `created_date`, `last_updated`, `product_activated`, `approved`, `approved_date`, `suppliers_supplier_id`, `tax_class_tax_class_id`, `created_by`, `last_updated_by`, `approved_by`, `categories_category_id`, `deleted`) VALUES
(1, 'FABDNPK-000001', 'INDCHE0001FABDNPK000001', 'assets/product_bar_codes/FABDNPK-000001.jpg', 'metal foldable chair', ' 	500 Piece/Pieces one color for chair', '500 Piece/Pieces one color for chair', '', 'india', 0, 0, NULL, NULL, 0, 0, 0, '0', 21, '', 'Steel', 0, 0, 0, 'meter', 0, 0, 0, 12, 'design', 'pink', '2014-05-15 08:36:25', '2014-05-23 03:37:44', '2014-05-15 08:36:25', 6, '2014-05-15 08:36:25', 1, NULL, 1, 1, 1, 1, 1),
(2, 'FABTTTT-000002', 'INDCHE0001FABTTTT000002', 'assets/product_bar_codes/FABTTTT-000002.jpg', 'sample', 'testtesttest', 'testtest', '', 'testtest', 0, 0, NULL, NULL, 0, 0, 0, '0', 100, '', 'Lenin', 0, 0, 0, 'feet', 0, 0, 0, 0, 'test', 'test', '2014-05-20 08:18:41', '2014-05-23 03:22:51', '2014-05-20 08:18:41', 6, '2014-05-22 09:54:16', 1, NULL, 1, 2, 1, 1, 1),
(3, 'FABDNBE-000003', 'INDCHE0001FABDNBE000003', 'assets/product_bar_codes/Fabdnbe-000003.jpg', 'sample', 'desc', 'desc', '0', 'india', 0, 0, NULL, NULL, 0, 0, 0, 'http://192.168.5.19/inventory/assets/product_images/purchase1.png', 0, 'box(s)', 'fabric', 0, 0, 0, 'meter', 2, 2, 2, 2, 'design', 'blue', '2014-05-20 08:36:25', '2014-05-20 08:38:01', '2014-05-20 08:36:25', 4, '2014-05-20 08:38:01', 1, NULL, 10, 3, NULL, 1, 0),
(4, 'FABDNBE-000004', 'INDCHE0000FABDNBE000004', 'assets/product_bar_codes/FABDNBE-000004.jpg', 'zcz', 'zxzc', 'ryry', '1', '', 54, 0, NULL, NULL, 0, 0, 0, 'http://192.168.5.19/inventory/assets/product_images/shortcuts_new2.png', 35, 'Rolls', 'fabric', 0, 0, 0, 'feet', 0, 0, 0, 0, 'design', 'blue', '2014-05-21 03:20:04', '2014-05-22 09:10:26', '2014-05-21 03:20:04', 1, '2014-05-21 03:20:04', NULL, NULL, 1, 4, 1, 1, 1),
(5, 'FABLHGY-000005', 'INDCHE0001FABLHGY000005', 'assets/product_bar_codes/FABLHGY-000005.jpg', 'Fabric_test', 'here we give the description about the produc', '', '1', '', 0, 0, NULL, NULL, 0, 0, 0, '0', 13, 'pieces', 'cotton', 1, 0, 13, '', 0, 0, 100, 0, 'luxh', 'Grey', '2014-05-21 09:29:45', '2014-05-28 05:33:21', '2014-05-21 09:29:45', 1, '2014-05-22 10:33:47', 1, NULL, 10, 1, 1, 1, 0),
(6, 'FABASSD-000006', 'INDCHE0001FABASSD000006', 'assets/product_bar_codes/FABASSD-000006.jpg', 'asdad', 'a', '', '', '', 0, 0, NULL, NULL, 0, 0, 0, '0', 10, '', 'a', 0, 0, 10, '', 0, 0, 100, 100, 'as', 'sd', '2014-05-21 10:05:09', '2014-05-23 04:26:32', '2014-05-21 10:05:09', 2, '2014-05-22 06:31:11', 1, NULL, 10, 1, 2, 1, 0),
(7, 'FABTE76-000007', 'INDCHE0002FABTE76000007', 'assets/product_bar_codes/FABTE76-000007.jpg', 'Test Prdt12', 'test', '', '', '', 0, 0, NULL, NULL, 0, 0, 0, '0', 10, '', 'Test12345', 0, 0, 0, '', 0, 0, 0, 0, 'Tst de', '76', '2014-05-22 06:24:22', '2014-05-22 08:39:46', '2014-05-22 06:24:22', 2, '2014-05-22 07:44:57', 2, NULL, 2, 2, 1, 1, 0),
(8, 'CUTDFEF-000008', 'INDCHE0008CUTDFEF000008', 'assets/product_bar_codes/CUTDFEF-000008.jpg', 'test1', 'test', '', '0', '', 0, 0, NULL, NULL, 0, 0, 0, '0', 24, 'Piece(s)', 'ewr', 0, 0, 0, '', 34, 0, 0, 0, 'df', 'ef', '2014-05-22 06:27:45', NULL, '2014-05-22 06:27:45', 2, '2014-05-22 06:27:45', 8, NULL, 2, NULL, 2, 2, 0),
(9, 'FABRTRT-000009', 'INDCHE0002FABRTRT000009', 'assets/product_bar_codes/FABRTRT-000009.jpg', 'trg', 'ggtg', '', '0', '', 0, 0, NULL, NULL, 0, 0, 0, '0', 45, 'Meter', 'rgt', 0, 0, 0, '', 4, 0, 0, 0, 'ret', 'ret', '2014-05-22 06:32:57', '2014-05-23 03:04:49', '2014-05-22 06:32:57', 2, '2014-05-22 06:32:57', 2, NULL, 2, 9, 2, 1, 1),
(10, 'CUTDNBE-000010', 'INDCHE0001CUTDNBE000010', 'assets/product_bar_codes/CUTDNBE-000010.jpg', 'sample', 'esc', 'desc', '0', 'india', 0, 0, NULL, NULL, 0, 0, 0, 'http://192.168.5.19/inventory/assets/product_images/purchase2.png', 0, '', 'fabric', 0, 0, 0, 'meter', 2, 0, 0, 0, 'design', 'blue', '2014-05-22 06:35:38', '2014-05-22 07:20:21', '2014-05-22 06:35:38', 4, '2014-05-22 07:20:21', 1, NULL, 10, 10, NULL, 2, 0),
(11, 'FABDNBE-000011', 'INDCHE0001FABDNBE000011', 'assets/product_bar_codes/FABDNBE-000011.jpg', 'admin', 'desc', 'short desc', '0', 'india', 0, 0, NULL, NULL, 0, 0, 0, 'http://192.168.5.19/inventory/assets/product_images/report1.png', 12, 'Box(s)', 'fabric', 0, 0, 0, 'meter', 2, 0, 0, 0, 'design', 'blue', '2014-05-22 06:36:53', '2014-05-23 04:06:16', '2014-05-22 06:36:53', 2, '2014-05-22 06:36:53', 1, NULL, 2, 11, 2, 1, 1),
(12, 'TILDNSE-000012', 'INDCHE0001TILDNSE000012', 'assets/product_bar_codes/TILDNSE-000012.jpg', 'deo product', 'desc', 'product desc', '1', 'india', 0, 0, NULL, NULL, 0, 0, 0, '0', 12, 'boxes', 'Lenin', 0, 0, 0, 'meter', 12, 0, 0, 0, 'design', 'shade', '2014-05-22 06:46:14', '2014-05-22 10:30:15', '2014-05-22 06:46:14', 1, '2014-05-22 10:30:15', 1, NULL, 10, 1, 1, 2, 0),
(13, 'FABDNSE-000013', 'INDCHE0001FABDNSE000013', 'assets/product_bar_codes/FABDNSE-000013.jpg', 'admin product', 'desc', 'desc', '1', 'india', 0, 0, NULL, NULL, 0, 0, 0, '0', 100, 'pieces', 'Lenin', 0, 0, 0, 'meter', 12, 0, 0, 0, 'design', 'shade', '2014-05-22 06:47:50', '2014-05-22 10:32:40', '2014-05-22 06:47:50', 1, '2014-05-22 10:32:40', 1, NULL, 2, 1, 1, 1, 0),
(14, 'TILTNDF-000014', 'INDCHE0002TILTNDF000014', 'assets/product_bar_codes/TILTNDF-000014.jpg', 'Test admin11', 'scd', '', '', '', 0, 0, NULL, NULL, 0, 0, 0, '0', 34, 'boxes', 'test mater', 0, 0, 0, 'feet', 0, 0, 0, 0, 'ts design', 'df', '2014-05-22 07:15:34', '2014-05-22 08:40:49', '2014-05-22 07:15:34', 2, '2014-05-22 07:24:01', 2, NULL, 2, 2, 1, 2, 0),
(15, 'TILDNSE-000015', 'INDCHE0001TILDNSE000015', 'assets/product_bar_codes/TILDNSE-000015.jpg', 'deo product 2', 'desc', 'desc', '1', 'india', 123, 0, NULL, NULL, 0, 0, 0, '0', 12, 'pieces', 'Lenin', 0, 0, 0, 'meter', 0, 0, 2, 0, 'design', 'shade', '2014-05-22 08:11:03', '2014-05-22 10:33:37', '2014-05-22 08:11:03', 1, '2014-05-22 10:33:37', 1, NULL, 10, 1, 1, 2, 0),
(16, 'FABFGFG-000016', 'INDCHE0002FABFGFG000016', 'assets/product_bar_codes/FABFGFG-000016.jpg', 'test', 'testtest', 'test', '0', 'fsdf', 0, 0, NULL, NULL, 0, 0, 0, 'http://192.168.5.19/inventory/assets/product_images/report2.png', 0, '', 'bmbn', 0, 0, 0, 'feet', 0, 0, 0, 0, 'fg', 'fdg', '2014-05-22 08:15:04', '2014-05-22 08:15:52', '2014-05-22 08:15:04', 4, '2014-05-22 08:15:52', 2, NULL, 10, 16, NULL, 1, 0),
(17, 'SAMBMBM-000017', 'INDCHE0002SAMBMBM000017', 'assets/product_bar_codes/SAMBMBM-000017.jpg', 'test', 'nbmn', 'test', '', 'bnmbn', 0, 0, NULL, NULL, 0, 0, 0, '0', 0, '', 'bnm', 0, 0, 0, 'meter', 0, 0, 0, 0, 'bnm', 'bnm', '2014-05-22 08:17:09', '2014-05-23 04:24:03', '2014-05-22 08:17:09', 6, '2014-05-22 10:39:39', 2, NULL, 10, 17, 1, 4, 1),
(18, 'FABSSSS-000018', 'INDCHE0006FABSSSS000018', 'assets/product_bar_codes/FABSSSS-000018.jpg', 'test', 'xczx', 'testxc', '1', 'zx', 0, 0, NULL, NULL, 0, 0, 0, '0', 1, '', 'ff', 0, 0, 0, 'meter', 0, 0, 0, 0, 'ss', 'ss', '2014-05-22 08:23:09', '2014-05-23 03:04:35', '2014-05-22 08:23:09', 1, '2014-05-22 10:39:26', 6, NULL, 2, 18, 1, 1, 1),
(19, 'FABDNBE-000019', 'INDCHE0001FABDNBE000019', 'assets/product_bar_codes/FABDNBE-000019.jpg', 'sample deo product', 'desc', 'short desc', '1', 'india', 0, 0, NULL, NULL, 0, 0, 0, 'http://192.168.5.19/inventory/assets/product_images/report3.png', 0, '', 'teak', 0, 0, 0, 'feet', 12, 0, 0, 0, 'design', 'blue', '2014-05-22 09:56:59', '2014-05-22 09:58:28', '2014-05-22 09:56:59', 1, '2014-05-22 09:58:28', 1, NULL, 10, 1, 1, 1, 0),
(20, 'SAMDIDF-000020', 'INDCHE0008SAMDIDF000020', 'assets/product_bar_codes/SAMDIDF-000020.jpg', 'Test fri12', 'TEst', '', '0', '', 0, 0, NULL, NULL, 0, 0, 0, '0', 1005, 'pieces', 'dsf', 0, 0, 0, 'meter', 9, 0, 0, 0, 'desi fri', 'df', '2014-05-23 02:20:13', '2014-05-23 05:52:35', '2014-05-23 02:20:13', 6, '2014-05-23 03:52:33', 8, NULL, 2, 2, 1, 4, 0),
(21, 'TILDFER-000021', 'INDCHE0002TILDFER000021', 'assets/product_bar_codes/TILDFER-000021.jpg', 'Testttt', 'Test', '', '1', 'india', 34234, 0, NULL, NULL, 25, 0, 0, 'http://192.168.5.19/inventory/assets/product_images/Hydrangeas1.jpg', 234, 'pieces', 'f', 0, 12, 100, '', 534, 0, 0, 0, 'dsf', 'er', '2014-05-23 04:03:09', '2014-05-28 05:50:00', '2014-05-23 04:03:09', 1, '2014-05-23 08:00:53', 2, NULL, 2, 21, 1, 2, 1),
(22, 'FABDNSE-000022', 'INDCHE0001FABDNSE000022', 'assets/product_bar_codes/FABDNSE-000022.jpg', 'today product', 'dsc', 'product desc', '0', 'india', 0, 0, NULL, NULL, 0, 0, 0, 'http://192.168.5.19/inventory/assets/product_images/home12.jpg', 120, 'pieces', 'Lenin', 0, 0, 0, '', 12, 0, 0, 0, 'design', 'shade', '2014-05-23 05:38:35', '2014-05-23 07:05:59', '2014-05-23 05:38:35', 6, '2014-05-23 06:57:21', 1, NULL, 10, 2, 1, 1, 0),
(23, 'TILDD32-000023', 'INDCHE0002TILDD32000023', 'assets/product_bar_codes/TILDD32-000023.jpg', 'Test product', 'test', '', '0', '', 327632, 0, NULL, NULL, 0, 0, 0, '0', 213, 'pieces', 'iewr', 1, 7687, 0, '', 3, 0, 0, 0, 'Design dd', '32', '2014-05-27 06:00:12', '2014-05-27 06:34:05', '2014-05-27 06:00:12', 2, '2014-05-27 06:00:12', 2, NULL, 2, 1, 2, 2, 0),
(24, 'FABDNBE-000024', 'INDCHE0002FABDNBE000024', 'assets/product_bar_codes/FABDNBE-000024.jpg', 'sample', 'desc', 'short desc', '0', 'india', 0, 0, NULL, NULL, 0, 0, 0, 'http://192.168.5.19/inventory/assets/product_images/home2.jpg', 21, 'Box(s)', 'fabric', 0, 0, 0, 'feet', 2, 12, 0, 0, 'design', 'blue', '2014-05-28 03:06:38', NULL, '2014-05-28 03:06:38', 2, '2014-05-28 03:06:38', 2, NULL, 2, NULL, 2, 1, 0),
(25, 'FABDNSE-000025', 'INDCHE0001FABDNSE000025', 'assets/product_bar_codes/FABDNSE-000025.jpg', 'test product', 'desc', 'product desc', '0', 'india', 0, 0, NULL, NULL, 0, 0, 0, '0', 100, 'Bags', 'Lenin', 0, 0, 0, 'meter', 12, 0, 0, 0, 'design', 'shade', '2014-05-28 04:23:53', NULL, '2014-05-28 04:23:53', 2, '2014-05-28 04:23:53', 1, NULL, 2, NULL, 2, 1, 0),
(26, 'FABWE24-000026', 'INDCHE0002FABWE24000026', 'assets/product_bar_codes/FABWE24-000026.jpg', 'W Prdt', 'Test', '', '0', '', 0, 0, NULL, NULL, 0, 0, 0, '0', 132, 'Rolls', 'test', 0, 0, 0, '', 2, 0, 0, 0, 'W De', '234', '2014-05-28 05:56:45', NULL, '2014-05-28 05:56:45', 2, '2014-05-28 05:56:45', 2, NULL, 2, NULL, 2, 1, 0),
(28, 'FABLHWE-000028', 'INDCHE0002FABLHWE000028', 'assets_inv/product_bar_codes/FABLHWE-000028.jpg', 'Havells', 'Havells desc', 'Havells description', '0', 'india', 0, 0, NULL, NULL, 0, 0, 0, '0', 100, 'Piece(s)', 'Plastic', 0, 0, 0, '', 0, 0, 0, 0, 'luxh', 'White', '2014-05-30 09:59:10', NULL, '2014-05-30 09:59:10', 2, '2014-05-30 09:59:10', 2, NULL, 2, NULL, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `last_updated_date` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `last_updated_by` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`),
  KEY `fk_suppliers_users1_idx` (`created_by`),
  KEY `fk_suppliers_users2_idx` (`last_updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `mobile`, `email`, `street`, `state`, `zip_code`, `city`, `country`, `status`, `created_date`, `last_updated_date`, `created_by`, `last_updated_by`, `deleted`) VALUES
(1, 'Supplier3', '2147483647', 'steffjemima@gmail.com', 'neithalur', 'Tamil Nadu', 600001, 'Chennai', 'india', 1, '2014-05-02 13:53:21', '2014-05-19 10:20:25', NULL, 1, 0),
(2, 'Supplier2 ', '2147483647', 'supplier2@gmail.com', 'Coast Road', 'Maharastra', 6353435, 'Mumbai', 'india', 1, '2014-04-26 11:42:38', '2014-04-26 11:42:38', 1, NULL, 0),
(3, 'Supplier4', '2147483647', 'sample4@email.com', 'west beach road', 'Kerala', 591357, 'cochin', NULL, 1, NULL, NULL, NULL, NULL, 0),
(4, 'test', '1112345678', 'sample@email.com', 'fdgdfg', 'dfgdf', 258798, 'gdfg', NULL, 0, NULL, NULL, NULL, NULL, 0),
(5, 'test2', '1346798520', 'sample@email.com', 'address', 'state', 798132, 'city', NULL, 0, NULL, NULL, NULL, NULL, 0),
(6, 'test', '1145645645', 'fdg@dfgdf.com', 'fdgdfg', 'dfgdf', 0, 'gdfg', NULL, 0, NULL, '2014-05-19 10:22:36', NULL, 6, 1),
(7, 'test', '1145645645', 'fdg@dfgdf.com', 'fdgdfg', '0', 0, 'gdfg', NULL, 0, NULL, '2014-05-19 10:17:33', NULL, 7, 1),
(8, 'Revathi', '1234567890', 'k.revathikanagaraj@gmail.com', 'Old mahapalipuram road', 'Tamil Nadu', 42865, 'Chennai', NULL, 0, NULL, NULL, NULL, NULL, 0),
(9, 'Supplier Test', '9600055220', 'steffjemima@gmail.com', 'Himalayas', 'Tamil Nadu', 600001, 'Chennai', NULL, 0, NULL, NULL, NULL, NULL, 0),
(10, 'dfgd', '2147483647', 'fdgd@hfg.com', 'fghh', 'hfghf5645', 456666, 'fghfg', NULL, 0, NULL, NULL, NULL, NULL, 1),
(11, 'Supplier and C', '2147483647', 'newsupplier@gmail.com', 't.nagar', 'Tamil Nadu', 600001, 'Chennai', NULL, 0, NULL, NULL, NULL, NULL, 0),
(12, 'McGraw hill', '9876543213', 'Test@test.com', 'tnagar', 'Tamil Nadu', 1212121, 'Chennai', NULL, 1, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tax_class`
--

CREATE TABLE IF NOT EXISTS `tax_class` (
  `tax_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_class_name` varchar(45) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `last_updated_date` timestamp NULL DEFAULT NULL,
  `last_updated_by` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`tax_class_id`),
  KEY `fk_tax_class_users1_idx` (`last_updated_by`),
  KEY `fk_tax_class_users2_idx` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tax_class`
--

INSERT INTO `tax_class` (`tax_class_id`, `tax_class_name`, `created_date`, `last_updated_date`, `last_updated_by`, `created_by`) VALUES
(1, 'tax-able', '2014-04-22 09:42:43', '2014-04-22 09:42:43', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` int(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `deleted`) VALUES
(1, '127.0.0.1', 'super administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'superadmin@inventory.com', '', NULL, NULL, '10bd3f40a4ebb18c8e7165019d352680f5f34bc7', 1268889823, 1401460007, 1, 'super', 'admin', 'ADMIN', '1111111111', 0),
(2, '127.0.0.1', 'admin', '$2y$08$OIwt/dql8GA/4jfUu2ODK.hQAZOazVT9BfU6UKmXPZqSHy3hXp.KC', NULL, 'admin@inventory.com', NULL, NULL, NULL, NULL, 1397736034, 1401460444, 1, 'admin', 'admin', 'test', '2222222228', 0),
(10, '127.0.0.1', 'deo', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', NULL, 'deo@inventory.com', NULL, NULL, NULL, NULL, 1397746185, 1400847715, 1, 'data', 'operator', NULL, '3333333333', 0),
(11, '127.0.0.1', 'test test', '0', 'ee2d49cf50', 'test@inventory.com', NULL, NULL, NULL, NULL, 1400480761, 1400480761, 1, 'test', 'test', NULL, '123456789', 0),
(12, '127.0.0.1', 'test test1', '0', '42432baca2', 'test123@inventory.com', NULL, NULL, NULL, NULL, 1400480820, 1400480820, 1, 'test', 'test', NULL, '123456789', 1),
(13, '192.168.5.211', 'testtest testtest', '0', '0bda959066', 'testtest@test.com', NULL, NULL, NULL, NULL, 1400578517, 1400578517, 1, 'testtest', 'testtest', NULL, '1234567891', 0),
(14, '192.168.5.211', 'testtesttest testtest', '0', 'cbcc81d141', 'testtesttest@vv.com', NULL, NULL, NULL, NULL, 1400578560, 1400578560, 1, 'testtesttest', 'testtest', NULL, '1234567891', 1),
(15, '192.168.5.221', 'deo deo', '0', '51b727eb03', 'deo1@inventory.com', NULL, NULL, NULL, NULL, 1400592253, 1400592253, 0, 'deo', 'deo', NULL, '1234567890', NULL),
(16, '192.168.5.221', 'deo deo1', '0', 'e43896b924', 'deo2@inventory.com', NULL, NULL, NULL, NULL, 1400592351, 1400592351, 0, 'deo', 'deo', NULL, '1234567890', NULL),
(17, '192.168.5.202', 'first test last test', '0', '38f152cf76', 'steffjemima@gmail.com', NULL, NULL, NULL, NULL, 1400838436, 1400838436, 1, 'First Test', 'Last Test', NULL, '0', NULL),
(18, '192.168.5.202', 'first last', '0', 'bde857b6c7', 'steffjemima1@gmail.com', NULL, NULL, NULL, NULL, 1400839103, 1400839103, 1, 'First', 'Last', NULL, '0', NULL),
(19, '192.168.5.19', 'admin test', '0', 'b984dc3709', 'test@test.com', NULL, NULL, NULL, NULL, 1401261582, 1401261582, 1, 'test', 'test', NULL, '1234567890', NULL),
(20, '192.168.5.202', 'test last', '0', 'c89936b266', 'test1@gmail.com', NULL, NULL, NULL, NULL, 1401269484, 1401269484, 0, 'Test', 'Last', NULL, '1234567890', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(8, 10, 3),
(9, 11, 3),
(10, 12, 2),
(12, 13, 3),
(13, 14, 2),
(15, 15, 3),
(17, 16, 3),
(18, 17, 3),
(19, 18, 3),
(22, 19, 3),
(25, 20, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_Categories_users1_idx1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Categories_users2_idx2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `category_dimensions`
--
ALTER TABLE `category_dimensions`
  ADD CONSTRAINT `fk_category_dimensions_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_group_customer1` FOREIGN KEY (`group_customer_customer_group_id`) REFERENCES `group_customer` (`customer_group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_customer_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_customer_users2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `estimated_product`
--
ALTER TABLE `estimated_product`
  ADD CONSTRAINT `fk_estimated_product_new_estimation1_idx` FOREIGN KEY (`estimate_id`) REFERENCES `new_estimation` (`estimate_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estimated_users1_idx1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estimated_users2_idx2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `group_customer`
--
ALTER TABLE `group_customer`
  ADD CONSTRAINT `fk_group_customer_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_group_customer_users2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `new_estimation`
--
ALTER TABLE `new_estimation`
  ADD CONSTRAINT `fk_New_Estimation_suppliers1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `new_order`
--
ALTER TABLE `new_order`
  ADD CONSTRAINT `fk_new_order_New_Estimation1` FOREIGN KEY (`estimate_id`) REFERENCES `new_estimation` (`estimate_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_new_order_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_new_order_users2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories1` FOREIGN KEY (`categories_category_id`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_suppliers1` FOREIGN KEY (`suppliers_supplier_id`) REFERENCES `suppliers` (`supplier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_tax_class1` FOREIGN KEY (`tax_class_tax_class_id`) REFERENCES `tax_class` (`tax_class_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
