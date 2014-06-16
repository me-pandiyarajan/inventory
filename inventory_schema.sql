-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2014 at 09:17 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

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
  `category_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) DEFAULT NULL,
  `comments` varchar(45) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  `last_updated_date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  KEY `fk_categories_users1_idx` (`created_by`),
  KEY `fk_categories_users2_idx` (`last_updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company_settings`
--

CREATE TABLE IF NOT EXISTS `company_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  `last_updated_date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pos_ws_contacts_users1_idx` (`created_by`),
  KEY `fk_pos_ws_contacts_users2_idx` (`last_updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `estimated_product`
--

CREATE TABLE IF NOT EXISTS `estimated_product` (
  `temp_product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `new_estimation_estimate_id` int(10) unsigned NOT NULL,
  `product_name` varchar(45) DEFAULT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `design_name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `dimensions` varchar(45) DEFAULT NULL,
  `Ifref` tinyint(1) DEFAULT NULL,
  `Delivery_Quality` int(11) DEFAULT NULL,
  `Damaged_Quality` int(11) DEFAULT NULL,
  `Delivery_Comments` varchar(225) DEFAULT NULL,
  `order_product` int(20) NOT NULL,
  `delivery_status` int(20) NOT NULL,
  `product_sku` varchar(225) DEFAULT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  `last_updated_date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`temp_product_id`),
  KEY `fk_estimated_product_users1_idx` (`created_by`),
  KEY `fk_estimated_product_users2_idx` (`last_updated_by`),
  KEY `fk_estimated_product_new_estimation1_idx` (`new_estimation_estimate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
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
-- Table structure for table `new_estimation`
--

CREATE TABLE IF NOT EXISTS `new_estimation` (
  `estimate_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estimate_name` varchar(225) DEFAULT NULL,
  `estimate_no_product` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `supplier_id` int(11) unsigned DEFAULT NULL,
  `flag` int(10) NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  `last_updated_date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`estimate_id`),
  KEY `fk_New_Estimation_suppliers1_idx` (`supplier_id`),
  KEY `fk_new_estimation_users1_idx` (`created_by`),
  KEY `fk_new_estimation_users2_idx` (`last_updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `new_order`
--

CREATE TABLE IF NOT EXISTS `new_order` (
  `order_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `estimate_id` int(10) unsigned NOT NULL,
  `order_name` varchar(45) DEFAULT NULL,
  `order_comments` varchar(45) DEFAULT NULL,
  `delivery_status` int(11) DEFAULT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  `last_updated_date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `fk_new_order_New_Estimation1_idx` (`estimate_id`),
  KEY `fk_new_order_users1_idx` (`created_by`),
  KEY `fk_new_order_users2_idx` (`last_updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_advance`
--

CREATE TABLE IF NOT EXISTS `pos_advance` (
  `pos_advance_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pos_invoices_invoiceId` int(11) unsigned NOT NULL,
  `amount` float DEFAULT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  PRIMARY KEY (`pos_advance_id`),
  KEY `fk_pos_advance_users1_idx` (`created_by`),
  KEY `fk_pos_advance_pos_invoices1_idx` (`pos_invoices_invoiceId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_customer`
--

CREATE TABLE IF NOT EXISTS `pos_customer` (
  `customer_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customername` varchar(45) DEFAULT NULL,
  `mobile_number` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `group_customer_customer_group_id` int(11) unsigned NOT NULL,
  `street` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zip_code` varchar(45) DEFAULT NULL,
  `d_street` varchar(45) DEFAULT NULL,
  `d_city` varchar(45) DEFAULT NULL,
  `d_state` varchar(45) DEFAULT NULL,
  `d_zipCode` varchar(45) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  `last_updated_date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `fk_customer_users1_idx` (`created_by`),
  KEY `fk_customer_users2_idx` (`last_updated_by`),
  KEY `fk_customer_group_customer1_idx` (`group_customer_customer_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_damaged`
--

CREATE TABLE IF NOT EXISTS `pos_damaged` (
  `pos_damaged_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `compensate_by` int(11) DEFAULT NULL,
  `comp_amount` double DEFAULT NULL,
  `comp_product_quantity` int(11) DEFAULT NULL,
  `pos_invoices_invoiceId` int(11) unsigned NOT NULL,
  `products_product_gen_id` int(11) NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  PRIMARY KEY (`pos_damaged_id`),
  KEY `fk_pos_damaged_users1_idx` (`created_by`),
  KEY `fk_pos_damaged_pos_invoices1_idx` (`pos_invoices_invoiceId`),
  KEY `fk_pos_damaged_products1_idx` (`products_product_gen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_estimates`
--

CREATE TABLE IF NOT EXISTS `pos_estimates` (
  `estimateId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `estimatename` varchar(45) DEFAULT NULL,
  `estimatedescription` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT NULL,
  `pos_projects_projectId` int(11) unsigned DEFAULT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  `last_updated_date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`estimateId`),
  KEY `fk_pos_estimates_pos_projects1_idx` (`pos_projects_projectId`),
  KEY `fk_pos_estimates_customer1_idx` (`created_by`),
  KEY `fk_pos_estimates_users1_idx` (`last_updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_estimate_products`
--

CREATE TABLE IF NOT EXISTS `pos_estimate_products` (
  `estimatedetailsId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `pos_estimates_estimateId` int(11) unsigned NOT NULL,
  `products_product_gen_id` int(11) NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  `last_updated_date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`estimatedetailsId`),
  KEY `fk_pos_estimate_products_users1_idx` (`created_by`),
  KEY `fk_pos_estimate_products_users2_idx` (`last_updated_by`),
  KEY `fk_pos_estimate_products_pos_estimates1_idx` (`pos_estimates_estimateId`),
  KEY `fk_pos_estimate_products_products1_idx` (`products_product_gen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_group_customer`
--

CREATE TABLE IF NOT EXISTS `pos_group_customer` (
  `customer_group_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_group_name` varchar(45) DEFAULT NULL,
  `discount_percent` float DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  `last_updated_date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`customer_group_id`),
  KEY `fk_group_customer_users1_idx` (`created_by`),
  KEY `fk_group_customer_users2_idx` (`last_updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_invoices`
--

CREATE TABLE IF NOT EXISTS `pos_invoices` (
  `invoiceId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pos_customer_customer_id` int(11) unsigned NOT NULL,
  `transac_mode` tinyint(4) unsigned NOT NULL COMMENT '(1)general,(2)demo,(3)gift',
  `tenderedBy` varchar(45) NOT NULL,
  `payment_status` tinyint(4) unsigned NOT NULL,
  `special_Instructions` tinyint(4) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  `last_updated_date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`invoiceId`),
  KEY `fk_pos_invoices_users1_idx` (`created_by`),
  KEY `fk_pos_invoices_users2_idx` (`last_updated_by`),
  KEY `fk_pos_invoices_pos_customer1_idx` (`pos_customer_customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_payments`
--

CREATE TABLE IF NOT EXISTS `pos_payments` (
  `paymentId` int(11) unsigned NOT NULL,
  `amount_paid` double DEFAULT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  `pos_payment_slip_paymentSlipId` int(11) unsigned NOT NULL,
  PRIMARY KEY (`paymentId`),
  KEY `fk_pos_payments_users1_idx` (`created_by`),
  KEY `fk_pos_payments_pos_payment_slip1_idx` (`pos_payment_slip_paymentSlipId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pos_paymentslip_products`
--

CREATE TABLE IF NOT EXISTS `pos_paymentslip_products` (
  `paymentslip_products_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pos_payment_slip_paymentSlipId` int(11) unsigned NOT NULL,
  `pos_product_sales_productSalesId` int(11) unsigned NOT NULL,
  PRIMARY KEY (`paymentslip_products_id`),
  KEY `fk_pos_paymentslip_products_pos_product_sales1_idx` (`pos_product_sales_productSalesId`),
  KEY `fk_pos_paymentslip_products_pos_payment_slip1_idx` (`pos_payment_slip_paymentSlipId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_payment_slip`
--

CREATE TABLE IF NOT EXISTS `pos_payment_slip` (
  `paymentSlipId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pos_projects_projectId` int(11) unsigned NOT NULL,
  `transac_mode` tinyint(4) unsigned NOT NULL COMMENT '(1)general,(2)demo,(3)gift',
  `tenderedBy` varchar(45) NOT NULL,
  `payment_status` int(11) unsigned DEFAULT NULL,
  `special_Instructions` tinytext,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  PRIMARY KEY (`paymentSlipId`),
  KEY `fk_pos_payment_slip_users1_idx` (`created_by`),
  KEY `fk_pos_payment_slip_pos_projects1_idx` (`pos_projects_projectId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_product_sales`
--

CREATE TABLE IF NOT EXISTS `pos_product_sales` (
  `productSalesId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `unit_price` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `tax` float unsigned NOT NULL,
  `amount` double NOT NULL,
  `invoices_invoiceId` int(11) unsigned NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  PRIMARY KEY (`productSalesId`),
  KEY `fk_pos_product_sales_invoices1_idx` (`invoices_invoiceId`),
  KEY `fk_pos_product_sales_users1_idx` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_projects`
--

CREATE TABLE IF NOT EXISTS `pos_projects` (
  `projectId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pos_invoices_invoiceId` int(11) unsigned NOT NULL,
  `project_name` varchar(45) DEFAULT NULL,
  `project_description` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  `last_updated_date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`projectId`),
  KEY `fk_pos_projects_users1_idx` (`created_by`),
  KEY `fk_pos_projects_users2_idx` (`last_updated_by`),
  KEY `fk_pos_projects_pos_invoices1_idx` (`pos_invoices_invoiceId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_return`
--

CREATE TABLE IF NOT EXISTS `pos_return` (
  `return_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pos_invoices_invoiceId` int(11) unsigned NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`return_id`),
  KEY `fk_pos_product_return_users1_idx` (`created_by`),
  KEY `fk_pos_return_pos_invoices1_idx` (`pos_invoices_invoiceId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_tax`
--

CREATE TABLE IF NOT EXISTS `pos_tax` (
  `tax_class_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tax_class_name` varchar(45) DEFAULT NULL,
  `tax_percent` float NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  `last_updated_date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`tax_class_id`),
  KEY `fk_pos_tax_users1_idx` (`created_by`),
  KEY `fk_pos_tax_users2_idx` (`last_updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_ws_enquiry`
--

CREATE TABLE IF NOT EXISTS `pos_ws_enquiry` (
  `enquiryId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `appointment_date` int(11) unsigned DEFAULT NULL,
  `product_type` int(11) DEFAULT NULL,
  `assigned_supervisor` int(11) unsigned NOT NULL,
  `assigned_marketing_rep` int(11) unsigned NOT NULL,
  `assigned_by` int(11) unsigned NOT NULL,
  `checkin` datetime DEFAULT NULL,
  `checkout` datetime DEFAULT NULL,
  `work_description` varchar(45) DEFAULT NULL,
  `problem` varchar(45) DEFAULT NULL,
  `customer_signature` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  `last_updated_date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`enquiryId`),
  KEY `fk_pos_ws_enquiry_users1_idx1` (`assigned_marketing_rep`),
  KEY `fk_pos_ws_enquiry_users2_idx` (`assigned_supervisor`),
  KEY `fk_pos_ws_enquiry_users3_idx` (`assigned_by`),
  KEY `fk_pos_ws_enquiry_users4_idx` (`created_by`),
  KEY `fk_pos_ws_enquiry_users5_idx` (`last_updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_ws_enquiry_products`
--

CREATE TABLE IF NOT EXISTS `pos_ws_enquiry_products` (
  `enquiry_product_Id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pos_ws_enquiry_enquiryId` int(11) unsigned NOT NULL,
  `products_product_gen_id` int(11) NOT NULL,
  PRIMARY KEY (`enquiry_product_Id`),
  KEY `fk_pos_ws_enquiry_products_pos_ws_enquiry1_idx` (`pos_ws_enquiry_enquiryId`),
  KEY `fk_pos_ws_enquiry_products_products1_idx` (`products_product_gen_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_ws_feedback`
--

CREATE TABLE IF NOT EXISTS `pos_ws_feedback` (
  `feedbackid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pos_customer_customer_id` int(11) unsigned NOT NULL,
  `comments` varchar(45) DEFAULT NULL,
  `satisfactory_level` varchar(20) NOT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  `last_updated_date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`feedbackid`),
  KEY `fk_pos_ws_feedback_users1_idx1` (`created_by`),
  KEY `fk_pos_ws_feedback_users2_idx` (`last_updated_by`),
  KEY `fk_pos_ws_feedback_pos_customer1_idx` (`pos_customer_customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_ws_image`
--

CREATE TABLE IF NOT EXISTS `pos_ws_image` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(225) NOT NULL,
  `pos_ws_enquiry_enquiryId` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pos_ws_image_pos_ws_enquiry1_idx1` (`pos_ws_enquiry_enquiryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `pos_ws_location`
--

CREATE TABLE IF NOT EXISTS `pos_ws_location` (
  `location_id` int(11) unsigned NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  PRIMARY KEY (`location_id`),
  KEY `fk_pos_ws_location_users1_idx1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_gen_id` int(11) NOT NULL AUTO_INCREMENT,
  `Product_ID_PLU` varchar(45) NOT NULL,
  `sku` varchar(45) NOT NULL,
  `barCodeImage` varchar(255) DEFAULT NULL,
  `product_name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `short_description` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT '0',
  `country_of_manufacture` varchar(45) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `special_price_from` int(11) unsigned DEFAULT NULL,
  `special_price_to` int(11) unsigned DEFAULT NULL,
  `installation_charges` mediumint(9) DEFAULT NULL,
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
  `product_activated` int(11) unsigned NOT NULL,
  `approved` int(11) DEFAULT NULL,
  `approved_by` int(11) unsigned NOT NULL,
  `approved_date` int(11) unsigned DEFAULT NULL,
  `categories_category_id` int(11) unsigned NOT NULL,
  `suppliers_supplier_id` int(11) unsigned NOT NULL,
  `pos_tax_tax_class_id` int(11) unsigned DEFAULT NULL,
  `deleted` int(11) DEFAULT '0',
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  `last_updated_date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`product_gen_id`),
  UNIQUE KEY `Product_ID_PLU` (`Product_ID_PLU`),
  UNIQUE KEY `sku` (`sku`),
  KEY `fk_products_users1_idx` (`created_by`),
  KEY `fk_products_users2_idx` (`last_updated_by`),
  KEY `fk_products_users3_idx` (`approved_by`),
  KEY `fk_products_categories1_idx` (`categories_category_id`),
  KEY `fk_products_suppliers1_idx` (`suppliers_supplier_id`),
  KEY `fk_products_pos_tax1_idx` (`pos_tax_tax_class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `supplier_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `zip_code` int(11) unsigned DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `created_by` int(11) unsigned NOT NULL,
  `created_date` int(11) unsigned NOT NULL,
  `last_updated_by` int(11) unsigned DEFAULT NULL,
  `last_updated_date` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`supplier_id`),
  KEY `fk_suppliers_users1_idx1` (`created_by`),
  KEY `fk_suppliers_users2_idx1` (`last_updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

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
-- Constraints for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD CONSTRAINT `fk_pos_ws_contacts_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_ws_contacts_users2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `estimated_product`
--
ALTER TABLE `estimated_product`
  ADD CONSTRAINT `fk_estimated_product_new_estimation1` FOREIGN KEY (`new_estimation_estimate_id`) REFERENCES `new_estimation` (`estimate_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estimated_product_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estimated_product_users2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `new_estimation`
--
ALTER TABLE `new_estimation`
  ADD CONSTRAINT `fk_New_Estimation_suppliers1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_new_estimation_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_new_estimation_users2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `new_order`
--
ALTER TABLE `new_order`
  ADD CONSTRAINT `fk_new_order_New_Estimation1` FOREIGN KEY (`estimate_id`) REFERENCES `new_estimation` (`estimate_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_new_order_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_new_order_users2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pos_advance`
--
ALTER TABLE `pos_advance`
  ADD CONSTRAINT `fk_pos_advance_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_advance_pos_invoices1` FOREIGN KEY (`pos_invoices_invoiceId`) REFERENCES `pos_invoices` (`invoiceId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pos_customer`
--
ALTER TABLE `pos_customer`
  ADD CONSTRAINT `fk_customer_group_customer1` FOREIGN KEY (`group_customer_customer_group_id`) REFERENCES `pos_group_customer` (`customer_group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_customer_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_customer_users2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pos_damaged`
--
ALTER TABLE `pos_damaged`
  ADD CONSTRAINT `fk_pos_damaged_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_damaged_pos_invoices1` FOREIGN KEY (`pos_invoices_invoiceId`) REFERENCES `pos_invoices` (`invoiceId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_damaged_products1` FOREIGN KEY (`products_product_gen_id`) REFERENCES `products` (`product_gen_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pos_estimates`
--
ALTER TABLE `pos_estimates`
  ADD CONSTRAINT `fk_pos_estimates_customer1` FOREIGN KEY (`created_by`) REFERENCES `pos_customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_estimates_pos_projects1` FOREIGN KEY (`pos_projects_projectId`) REFERENCES `pos_projects` (`projectId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_estimates_users1` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pos_estimate_products`
--
ALTER TABLE `pos_estimate_products`
  ADD CONSTRAINT `fk_pos_estimate_products_pos_estimates1` FOREIGN KEY (`pos_estimates_estimateId`) REFERENCES `pos_estimates` (`estimateId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_estimate_products_products1` FOREIGN KEY (`products_product_gen_id`) REFERENCES `products` (`product_gen_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_estimate_products_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_estimate_products_users2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pos_group_customer`
--
ALTER TABLE `pos_group_customer`
  ADD CONSTRAINT `fk_group_customer_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_group_customer_users2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pos_invoices`
--
ALTER TABLE `pos_invoices`
  ADD CONSTRAINT `fk_pos_invoices_pos_customer1` FOREIGN KEY (`pos_customer_customer_id`) REFERENCES `pos_customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_invoices_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_invoices_users2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pos_payments`
--
ALTER TABLE `pos_payments`
  ADD CONSTRAINT `fk_pos_payments_pos_payment_slip1` FOREIGN KEY (`pos_payment_slip_paymentSlipId`) REFERENCES `pos_payment_slip` (`paymentSlipId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_payments_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pos_paymentslip_products`
--
ALTER TABLE `pos_paymentslip_products`
  ADD CONSTRAINT `fk_pos_paymentslip_products_pos_product_sales1` FOREIGN KEY (`pos_product_sales_productSalesId`) REFERENCES `pos_product_sales` (`productSalesId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_paymentslip_products_pos_payment_slip1` FOREIGN KEY (`pos_payment_slip_paymentSlipId`) REFERENCES `pos_payment_slip` (`paymentSlipId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pos_payment_slip`
--
ALTER TABLE `pos_payment_slip`
  ADD CONSTRAINT `fk_pos_payment_slip_pos_projects1` FOREIGN KEY (`pos_projects_projectId`) REFERENCES `pos_projects` (`projectId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_payment_slip_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pos_product_sales`
--
ALTER TABLE `pos_product_sales`
  ADD CONSTRAINT `fk_pos_product_sales_invoices1` FOREIGN KEY (`invoices_invoiceId`) REFERENCES `pos_invoices` (`invoiceId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_product_sales_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pos_projects`
--
ALTER TABLE `pos_projects`
  ADD CONSTRAINT `fk_pos_projects_pos_invoices1` FOREIGN KEY (`pos_invoices_invoiceId`) REFERENCES `pos_invoices` (`invoiceId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_projects_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_projects_users2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pos_return`
--
ALTER TABLE `pos_return`
  ADD CONSTRAINT `fk_pos_product_return_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_return_pos_invoices1` FOREIGN KEY (`pos_invoices_invoiceId`) REFERENCES `pos_invoices` (`invoiceId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pos_tax`
--
ALTER TABLE `pos_tax`
  ADD CONSTRAINT `fk_pos_tax_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_tax_users2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pos_ws_enquiry`
--
ALTER TABLE `pos_ws_enquiry`
  ADD CONSTRAINT `fk_pos_ws_enquiry_users1` FOREIGN KEY (`assigned_marketing_rep`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_ws_enquiry_users2` FOREIGN KEY (`assigned_supervisor`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_ws_enquiry_users3` FOREIGN KEY (`assigned_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_ws_enquiry_users4` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_ws_enquiry_users5` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pos_ws_enquiry_products`
--
ALTER TABLE `pos_ws_enquiry_products`
  ADD CONSTRAINT `fk_pos_ws_enquiry_products_pos_ws_enquiry1` FOREIGN KEY (`pos_ws_enquiry_enquiryId`) REFERENCES `pos_ws_enquiry` (`enquiryId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_ws_enquiry_products_products1` FOREIGN KEY (`products_product_gen_id`) REFERENCES `products` (`product_gen_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pos_ws_feedback`
--
ALTER TABLE `pos_ws_feedback`
  ADD CONSTRAINT `fk_pos_ws_feedback_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_ws_feedback_users2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pos_ws_feedback_pos_customer1` FOREIGN KEY (`pos_customer_customer_id`) REFERENCES `pos_customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pos_ws_image`
--
ALTER TABLE `pos_ws_image`
  ADD CONSTRAINT `fk_pos_ws_image_pos_ws_enquiry1` FOREIGN KEY (`pos_ws_enquiry_enquiryId`) REFERENCES `pos_ws_enquiry` (`enquiryId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pos_ws_location`
--
ALTER TABLE `pos_ws_location`
  ADD CONSTRAINT `fk_pos_ws_location_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories1` FOREIGN KEY (`categories_category_id`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_pos_tax1` FOREIGN KEY (`pos_tax_tax_class_id`) REFERENCES `pos_tax` (`tax_class_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_suppliers1` FOREIGN KEY (`suppliers_supplier_id`) REFERENCES `suppliers` (`supplier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_users2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_users3` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `fk_suppliers_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_suppliers_users2` FOREIGN KEY (`last_updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
