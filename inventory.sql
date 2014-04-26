-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2014 at 03:08 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory`
--

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
  PRIMARY KEY (`category_id`),
  KEY `fk_categories_users1_idx` (`created_by`),
  KEY `fk_categories_users2_idx` (`last_updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `comments`, `created_date`, `last_updated_date`, `created_by`, `last_updated_by`) VALUES
(1, 'Fabric', 'Fabric', '2014-04-21 17:15:09', '2014-04-21 17:15:09', NULL, NULL);

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

--
-- Dumping data for table `customer`
--


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
(1, 'superadmin', 'super Administrator'),
(2, 'admin', 'admin'),
(3, 'DEO', 'data entry operator');

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

--
-- Dumping data for table `group_customer`
--


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

--
-- Dumping data for table `login_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_gen_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned DEFAULT NULL,
  `product_name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `short_description` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `country_of_manufacture` varchar(45) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `group_price` float DEFAULT NULL,
  `special_price_from` timestamp NULL DEFAULT NULL,
  `special_price_to` timestamp NULL DEFAULT NULL,
  `installation_charges` mediumint(9) DEFAULT NULL,
  `total_cost` float DEFAULT NULL,
  `grand_total` float DEFAULT NULL,
  `upload_image` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `stock_availability` tinyint(1) DEFAULT NULL,
  `safety_stock_level` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`product_gen_id`),
  KEY `fk_products_suppliers1_idx` (`suppliers_supplier_id`),
  KEY `fk_products_tax_class1_idx` (`tax_class_tax_class_id`),
  KEY `fk_products_users1_idx` (`created_by`),
  KEY `fk_products_users2_idx` (`last_updated_by`),
  KEY `fk_products_users3_idx` (`approved_by`),
  KEY `fk_products_categories1_idx` (`categories_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_gen_id`, `product_id`, `product_name`, `description`, `short_description`, `status`, `country_of_manufacture`, `price`, `group_price`, `special_price_from`, `special_price_to`, `installation_charges`, `total_cost`, `grand_total`, `upload_image`, `quantity`, `stock_availability`, `safety_stock_level`, `weight`, `width`, `length`, `height`, `design_name`, `shade`, `created_date`, `last_updated`, `product_activated`, `approved`, `approved_date`, `suppliers_supplier_id`, `tax_class_tax_class_id`, `created_by`, `last_updated_by`, `approved_by`, `categories_category_id`) VALUES
(1, NULL, 'test', 'test', 'test', NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL),
(2, NULL, 'test', 'test', 'test', NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL),
(3, NULL, '', 'test', 'test', NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(45) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address1` varchar(45) DEFAULT NULL,
  `address2` varchar(45) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `last_updated_date` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `last_updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`),
  KEY `fk_suppliers_users1_idx` (`created_by`),
  KEY `fk_suppliers_users2_idx` (`last_updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `telephone`, `email`, `address1`, `address2`, `zip_code`, `city`, `country`, `status`, `created_date`, `last_updated_date`, `created_by`, `last_updated_by`) VALUES
(1, 'supplier', 424242422, 'Test@test.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-04-21 16:24:38', NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tax_class`
--


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
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1398066615, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '127.0.0.1', 'test test', '$2y$08$CyXyq9dUI/flAyB5n..k4uSSTZxSyW3km.IghsYwNdDkPVMYvGTv2', NULL, 'test@test.com', NULL, NULL, NULL, NULL, 1397736034, 1398066290, 1, 'test', 'test', 'test', '9999999990'),
(10, '127.0.0.1', 'sample sample', '0', NULL, 'sampletest@sample.com', NULL, NULL, NULL, NULL, 1397746185, 1397746185, 1, 'sample', 'sample', NULL, '5464564564');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 2),
(3, 2, 3),
(8, 10, 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_group_customer1` FOREIGN KEY (`group_customer_customer_group_id`) REFERENCES `group_customer` (`customer_group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_customer_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_customer_users2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `group_customer`
--
ALTER TABLE `group_customer`
  ADD CONSTRAINT `fk_group_customer_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_group_customer_users2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
