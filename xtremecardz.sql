-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 25, 2019 at 06:26 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xtremecardz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` enum('guest','user','admin') NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`, `role`) VALUES
(1, 'zeoharlem@yahoo.co.uk', '$2y$08$T2piTVNWSXVRUXlIZ3FYNeE24rd51D8ewai04Zy7tqwUylAT/NBce', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `album_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date_created` timestamp NOT NULL,
  PRIMARY KEY (`album_id`),
  UNIQUE KEY `item_id` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`album_id`, `item_id`, `title`, `description`, `date_created`) VALUES
(1, 1, 'luxury card', 'pLx5ce27888b9655', '2019-05-20 09:51:04'),
(2, 2, 'black metal cards', 'pLx5ce28c180885b', '2019-05-20 11:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `album_images`
--

DROP TABLE IF EXISTS `album_images`;
CREATE TABLE IF NOT EXISTS `album_images` (
  `album_images_id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`album_images_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album_images`
--

INSERT INTO `album_images` (`album_images_id`, `album_id`, `image_id`) VALUES
(1, 2, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 5),
(6, 2, 6),
(7, 2, 7),
(8, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `cardtype`
--

DROP TABLE IF EXISTS `cardtype`;
CREATE TABLE IF NOT EXISTS `cardtype` (
  `cardtype_id` int(11) NOT NULL AUTO_INCREMENT,
  `cardtype_title` varchar(225) NOT NULL,
  PRIMARY KEY (`cardtype_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cardtype`
--

INSERT INTO `cardtype` (`cardtype_id`, `cardtype_title`) VALUES
(1, 'plastic id cards');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `description`) VALUES
(1, 'metal cards', ''),
(2, 'plastic cards', ''),
(3, 'corperate persona', ''),
(4, 'caleb kulu', '');

-- --------------------------------------------------------

--
-- Table structure for table `extractedimages`
--

DROP TABLE IF EXISTS `extractedimages`;
CREATE TABLE IF NOT EXISTS `extractedimages` (
  `extractedimages_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `staff_id` varchar(50) NOT NULL,
  `image_extracted` varchar(225) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`extractedimages_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extractedimages`
--

INSERT INTO `extractedimages` (`extractedimages_id`, `staff_id`, `image_extracted`, `user_id`) VALUES
(1, 'IKD012799', 'uploads/zips/1557493919_Picture/Picture/IKD012799.jpg', 1),
(2, 'IKD030043', 'uploads/zips/1557493919_Picture/Picture/IKD030043.jpg', 1),
(3, 'IKD032316', 'uploads/zips/1557493919_Picture/Picture/IKD032316.jpg', 1),
(4, 'IKD041502', 'uploads/zips/1557493919_Picture/Picture/IKD041502.jpg', 1),
(5, 'IKD041584', 'uploads/zips/1557493919_Picture/Picture/IKD041584.jpg', 1),
(6, 'IKD041587', 'uploads/zips/1557493919_Picture/Picture/IKD041587.jpg', 1),
(7, 'IKD041607', 'uploads/zips/1557493919_Picture/Picture/IKD041607.jpg', 1),
(8, 'IKD042320', 'uploads/zips/1557493919_Picture/Picture/IKD042320.jpg', 1),
(9, 'IKD042591', 'uploads/zips/1557493919_Picture/Picture/IKD042324.jpg', 1),
(10, 'IKD042595', 'uploads/zips/1557493919_Picture/Picture/IKD042591.jpg', 1),
(11, 'IKD042656', 'uploads/zips/1557493919_Picture/Picture/IKD042595.jpg', 1),
(12, 'IKD042802', 'uploads/zips/1557493919_Picture/Picture/IKD042656.jpg', 1),
(13, 'IKD043101', 'uploads/zips/1557493919_Picture/Picture/IKD042802.jpg', 1),
(14, 'IKD043975', 'uploads/zips/1557493919_Picture/Picture/IKD043101.jpg', 1),
(15, 'IKD051870', 'uploads/zips/1557493919_Picture/Picture/IKD043975.jpg', 1),
(16, 'IKD051954', 'uploads/zips/1557493919_Picture/Picture/IKD044179.jpg', 1),
(17, 'IKD052311', 'uploads/zips/1557493919_Picture/Picture/IKD044180.jpg', 1),
(18, 'IKD052325', 'uploads/zips/1557493919_Picture/Picture/IKD044182.jpg', 1),
(19, 'IKD053853', 'uploads/zips/1557493919_Picture/Picture/IKD051870.jpg', 1),
(20, 'IKD073147', 'uploads/zips/1557493919_Picture/Picture/IKD051954.jpg', 1),
(21, 'IKD082102', 'uploads/zips/1557493919_Picture/Picture/IKD052311.jpg', 1),
(22, 'IKD082191', 'uploads/zips/1557493919_Picture/Picture/IKD052325.jpg', 1),
(23, 'IKD092313', 'uploads/zips/1557493919_Picture/Picture/IKD053853.jpg', 1),
(24, 'IKD042324', 'uploads/zips/1557493919_Picture/Picture/IKD064171.jpg', 1),
(25, 'IKD064171', 'uploads/zips/1557493919_Picture/Picture/IKD073147.jpg', 1),
(26, 'IKD074172', 'uploads/zips/1557493919_Picture/Picture/IKD074172.jpg', 1),
(27, 'IKD074173', 'uploads/zips/1557493919_Picture/Picture/IKD074173.jpg', 1),
(28, 'IKD074174', 'uploads/zips/1557493919_Picture/Picture/IKD074174.jpg', 1),
(29, 'IKD074175', 'uploads/zips/1557493919_Picture/Picture/IKD074175.jpg', 1),
(30, 'IKD084177', 'uploads/zips/1557493919_Picture/Picture/IKD082102.jpg', 1),
(31, 'IKD084178', 'uploads/zips/1557493919_Picture/Picture/IKD082191.jpg', 1),
(32, 'IKD044179', 'uploads/zips/1557493919_Picture/Picture/IKD084176.jpg', 1),
(33, 'IKD044180', 'uploads/zips/1557493919_Picture/Picture/IKD084177.jpg', 1),
(34, 'IKD044182', 'uploads/zips/1557493919_Picture/Picture/IKD084178.jpg', 1),
(35, 'IKD094183', 'uploads/zips/1557493919_Picture/Picture/IKD092313.jpg', 1),
(36, 'IKD084176', 'uploads/zips/1557493919_Picture/Picture/IKD094183.jpg', 1),
(37, 'IKD084176', 'uploads/zips/1557493919_Picture/Picture/IKD094183.jpg', 1),
(38, 'IKD012799', 'uploads/zips/1557527188_Signature/Signature/IKD012799.jpg', 1),
(39, 'IKD030043', 'uploads/zips/1557527188_Signature/Signature/IKD030043.jpg', 1),
(40, 'IKD032316', 'uploads/zips/1557527188_Signature/Signature/IKD032316.jpg', 1),
(41, 'IKD041502', 'uploads/zips/1557527188_Signature/Signature/IKD041502.jpg', 1),
(42, 'IKD041584', 'uploads/zips/1557527188_Signature/Signature/IKD041584.jpg', 1),
(43, 'IKD041587', 'uploads/zips/1557527188_Signature/Signature/IKD041587.jpg', 1),
(44, 'IKD041607', 'uploads/zips/1557527188_Signature/Signature/IKD041607.jpg', 1),
(45, 'IKD042320', 'uploads/zips/1557527188_Signature/Signature/IKD042320.jpg', 1),
(46, 'IKD042591', 'uploads/zips/1557527188_Signature/Signature/IKD042324.jpg', 1),
(47, 'IKD042595', 'uploads/zips/1557527188_Signature/Signature/IKD042591.jpg', 1),
(48, 'IKD042656', 'uploads/zips/1557527188_Signature/Signature/IKD042595.jpg', 1),
(49, 'IKD042802', 'uploads/zips/1557527188_Signature/Signature/IKD042656.jpg', 1),
(50, 'IKD043101', 'uploads/zips/1557527188_Signature/Signature/IKD042802.jpg', 1),
(51, 'IKD043975', 'uploads/zips/1557527188_Signature/Signature/IKD043101.jpg', 1),
(52, 'IKD051870', 'uploads/zips/1557527188_Signature/Signature/IKD043975.jpg', 1),
(53, 'IKD051954', 'uploads/zips/1557527188_Signature/Signature/IKD044179.jpg', 1),
(54, 'IKD052311', 'uploads/zips/1557527188_Signature/Signature/IKD044180.jpg', 1),
(55, 'IKD052325', 'uploads/zips/1557527188_Signature/Signature/IKD044182.jpg', 1),
(56, 'IKD053853', 'uploads/zips/1557527188_Signature/Signature/IKD051870\'.jpg', 1),
(57, 'IKD073147', 'uploads/zips/1557527188_Signature/Signature/IKD051954.jpg', 1),
(58, 'IKD082102', 'uploads/zips/1557527188_Signature/Signature/IKD052311.jpg', 1),
(59, 'IKD082191', 'uploads/zips/1557527188_Signature/Signature/IKD052325.png', 1),
(60, 'IKD092313', 'uploads/zips/1557527188_Signature/Signature/IKD053853.jpg', 1),
(61, 'IKD042324', 'uploads/zips/1557527188_Signature/Signature/IKD064171.jpg', 1),
(62, 'IKD064171', 'uploads/zips/1557527188_Signature/Signature/IKD073147.jpg', 1),
(63, 'IKD074172', 'uploads/zips/1557527188_Signature/Signature/IKD074172.jpg', 1),
(64, 'IKD074173', 'uploads/zips/1557527188_Signature/Signature/IKD074173.jpg', 1),
(65, 'IKD074174', 'uploads/zips/1557527188_Signature/Signature/IKD074174.jpg', 1),
(66, 'IKD074175', 'uploads/zips/1557527188_Signature/Signature/IKD074175.jpg', 1),
(67, 'IKD084177', 'uploads/zips/1557527188_Signature/Signature/IKD082102.jpg', 1),
(68, 'IKD084178', 'uploads/zips/1557527188_Signature/Signature/IKD082191.jpg', 1),
(69, 'IKD044179', 'uploads/zips/1557527188_Signature/Signature/IKD084176.jpg', 1),
(70, 'IKD044180', 'uploads/zips/1557527188_Signature/Signature/IKD084177.jpg', 1),
(71, 'IKD044182', 'uploads/zips/1557527188_Signature/Signature/IKD084178.jpg', 1),
(72, 'IKD094183', 'uploads/zips/1557527188_Signature/Signature/IKD092313.jpg', 1),
(73, 'IKD084176', 'uploads/zips/1557527188_Signature/Signature/IKD094183.jpg', 1),
(74, 'IKD084176', 'uploads/zips/1557527188_Signature/Signature/IKD094183.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `filename` varchar(225) NOT NULL,
  `date_uploaded` timestamp NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `title`, `filename`, `date_uploaded`) VALUES
(1, 'brexit card', 'pLx5ce27888b9655/1558345945_social-business-card-o.jpg', '2019-05-20 09:52:26'),
(2, 'forte oil card', 'pLx5ce27888b9655/1558345946_Same-day-business-cards-printing-London-PRINT-IN-LONDON.png', '2019-05-20 09:52:26'),
(3, 'zenith card', 'pLx5ce27888b9655/1558345966_standard-business-cards-729.jpg', '2019-05-20 09:52:46'),
(4, 'kenoth card', 'pLx5ce27888b9655/1558345966_Ethnic_Business_Card-01.png', '2019-05-20 09:52:46'),
(5, 'dangote groups', 'pLx5ce28c180885b/1558350891_spot_uv_business_cards_printing.jpg', '2019-05-20 11:14:51'),
(6, 'breaking nums', 'pLx5ce28c180885b/1558350891_Revised-Plastic-Business-Cards_450x450[1]_450x450.jpg', '2019-05-20 11:14:51'),
(7, 'game of thrones', 'pLx5ce28c180885b/1558350895_cool.jpg', '2019-05-20 11:14:55'),
(8, 'vikings card', 'pLx5ce28c180885b/1558350895_embossed-business-cards.jpg', '2019-05-20 11:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_items`
--

DROP TABLE IF EXISTS `portfolio_items`;
CREATE TABLE IF NOT EXISTS `portfolio_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `description` mediumtext NOT NULL,
  `date_posted` timestamp NOT NULL,
  `price` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio_items`
--

INSERT INTO `portfolio_items` (`item_id`, `category_id`, `title`, `date_created`, `description`, `date_posted`, `price`) VALUES
(1, 3, 'luxury card', '2019-05-20 10:50:20', 'beautiful design with dexterity', '2019-05-20 09:50:20', '500'),
(2, 1, 'black metal cards', '2019-05-20 12:13:57', 'metal is a beautiful when innovation meets', '2019-05-20 11:13:57', '700');

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

DROP TABLE IF EXISTS `production`;
CREATE TABLE IF NOT EXISTS `production` (
  `production_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` enum('guest','user','admin') NOT NULL,
  PRIMARY KEY (`production_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`production_id`, `email`, `password`, `role`) VALUES
(1, 'chinko@yahoo.com', '$2y$08$T2piTVNWSXVRUXlIZ3FYNeE24rd51D8ewai04Zy7tqwUylAT/NBce', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `profile_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `register_id` bigint(20) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `company_address` text NOT NULL,
  `company_description` mediumtext NOT NULL,
  PRIMARY KEY (`profile_id`),
  UNIQUE KEY `register_id` (`register_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `register_id`, `firstname`, `lastname`, `phone`, `email`, `company_name`, `designation`, `company_address`, `company_description`) VALUES
(1, 1, 'theophilus', 'alamu', '08098765432', 'theophilus.alamu8@gmail.com', 'Dangote Packs', 'strategy manager', 'dangot loagoon', 'we build creatively');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_title` varchar(225) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_title`, `user_id`) VALUES
(1, 'ikeja electric', 1),
(2, 'ikeja electric zone two', 1),
(3, 'pakas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `register_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL,
  `role` enum('guest','user','admin') NOT NULL DEFAULT 'guest',
  `hash` varchar(225) NOT NULL,
  PRIMARY KEY (`register_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `hash` (`hash`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`register_id`, `company_name`, `email`, `password`, `date_created`, `role`, `hash`) VALUES
(1, 'dangote packs', 'theophilus.alamu8@gmail.com', '$2y$08$Qk8vSC9JRVVNZ0FMMTBFYuanBSG0Fb0AHv.qdHjgKcdJcoon8obXa', '2019-05-07 01:00:28', 'user', 'b337e84de8752b27eda3a12363109e80');

-- --------------------------------------------------------

--
-- Table structure for table `setprojects`
--

DROP TABLE IF EXISTS `setprojects`;
CREATE TABLE IF NOT EXISTS `setprojects` (
  `setproject_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) NOT NULL,
  `order_tag` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `type_of_card` int(11) NOT NULL,
  `card_csv_file` varchar(225) NOT NULL,
  `status` enum('uncompleted','processing','completed') NOT NULL DEFAULT 'uncompleted',
  PRIMARY KEY (`setproject_id`),
  UNIQUE KEY `order_tag` (`order_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setprojects`
--

INSERT INTO `setprojects` (`setproject_id`, `project_id`, `order_tag`, `quantity`, `user_id`, `date_created`, `type_of_card`, `card_csv_file`, `status`) VALUES
(1, 1, 'y2JITdG6xy9z', 36, 1, '2019-05-10 14:11:34', 1, '1557493894_ikejaelectric.csv', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `signatures`
--

DROP TABLE IF EXISTS `signatures`;
CREATE TABLE IF NOT EXISTS `signatures` (
  `signature_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `staff_id` varchar(50) NOT NULL,
  `image_extracted` varchar(225) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`signature_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signatures`
--

INSERT INTO `signatures` (`signature_id`, `staff_id`, `image_extracted`, `user_id`) VALUES
(1, 'IKD012799', 'uploads/signs/1557576973_Signature/Signature/IKD012799.jpg', 1),
(2, 'IKD030043', 'uploads/signs/1557576973_Signature/Signature/IKD030043.jpg', 1),
(3, 'IKD032316', 'uploads/signs/1557576973_Signature/Signature/IKD032316.jpg', 1),
(4, 'IKD041502', 'uploads/signs/1557576973_Signature/Signature/IKD041502.jpg', 1),
(5, 'IKD041584', 'uploads/signs/1557576973_Signature/Signature/IKD041584.jpg', 1),
(6, 'IKD041587', 'uploads/signs/1557576973_Signature/Signature/IKD041587.jpg', 1),
(7, 'IKD041607', 'uploads/signs/1557576973_Signature/Signature/IKD041607.jpg', 1),
(8, 'IKD042320', 'uploads/signs/1557576973_Signature/Signature/IKD042320.jpg', 1),
(9, 'IKD042324', 'uploads/signs/1557576973_Signature/Signature/IKD042324.jpg', 1),
(10, 'IKD042591', 'uploads/signs/1557576973_Signature/Signature/IKD042591.jpg', 1),
(11, 'IKD042595', 'uploads/signs/1557576973_Signature/Signature/IKD042595.jpg', 1),
(12, 'IKD042656', 'uploads/signs/1557576973_Signature/Signature/IKD042656.jpg', 1),
(13, 'IKD042802', 'uploads/signs/1557576973_Signature/Signature/IKD042802.jpg', 1),
(14, 'IKD043101', 'uploads/signs/1557576973_Signature/Signature/IKD043101.jpg', 1),
(15, 'IKD043975', 'uploads/signs/1557576973_Signature/Signature/IKD043975.jpg', 1),
(16, 'IKD044179', 'uploads/signs/1557576973_Signature/Signature/IKD044179.jpg', 1),
(17, 'IKD044180', 'uploads/signs/1557576973_Signature/Signature/IKD044180.jpg', 1),
(18, 'IKD044182', 'uploads/signs/1557576973_Signature/Signature/IKD044182.jpg', 1),
(19, 'IKD051870\'', 'uploads/signs/1557576973_Signature/Signature/IKD051870\'.jpg', 1),
(20, 'IKD051954', 'uploads/signs/1557576973_Signature/Signature/IKD051954.jpg', 1),
(21, 'IKD052311', 'uploads/signs/1557576973_Signature/Signature/IKD052311.jpg', 1),
(22, 'IKD052325', 'uploads/signs/1557576973_Signature/Signature/IKD052325.png', 1),
(23, 'IKD053853', 'uploads/signs/1557576973_Signature/Signature/IKD053853.jpg', 1),
(24, 'IKD064171', 'uploads/signs/1557576973_Signature/Signature/IKD064171.jpg', 1),
(25, 'IKD073147', 'uploads/signs/1557576973_Signature/Signature/IKD073147.jpg', 1),
(26, 'IKD074172', 'uploads/signs/1557576973_Signature/Signature/IKD074172.jpg', 1),
(27, 'IKD074173', 'uploads/signs/1557576973_Signature/Signature/IKD074173.jpg', 1),
(28, 'IKD074174', 'uploads/signs/1557576973_Signature/Signature/IKD074174.jpg', 1),
(29, 'IKD074175', 'uploads/signs/1557576973_Signature/Signature/IKD074175.jpg', 1),
(30, 'IKD082102', 'uploads/signs/1557576973_Signature/Signature/IKD082102.jpg', 1),
(31, 'IKD082191', 'uploads/signs/1557576973_Signature/Signature/IKD082191.jpg', 1),
(32, 'IKD084176', 'uploads/signs/1557576973_Signature/Signature/IKD084176.jpg', 1),
(33, 'IKD084177', 'uploads/signs/1557576973_Signature/Signature/IKD084177.jpg', 1),
(34, 'IKD084178', 'uploads/signs/1557576973_Signature/Signature/IKD084178.jpg', 1),
(35, 'IKD092313', 'uploads/signs/1557576973_Signature/Signature/IKD092313.jpg', 1),
(36, 'IKD094183', 'uploads/signs/1557576973_Signature/Signature/IKD094183.jpg', 1),
(37, 'IKD094183', 'uploads/signs/1557576973_Signature/Signature/IKD094183.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `signimages`
--

DROP TABLE IF EXISTS `signimages`;
CREATE TABLE IF NOT EXISTS `signimages` (
  `signimage_id` int(11) NOT NULL AUTO_INCREMENT,
  `signimage_url` varchar(225) NOT NULL,
  `project_id` int(11) NOT NULL,
  `setproject_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`signimage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signimages`
--

INSERT INTO `signimages` (`signimage_id`, `signimage_url`, `project_id`, `setproject_id`, `user_id`) VALUES
(1, '1557576973_Signature.zip', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staffupload`
--

DROP TABLE IF EXISTS `staffupload`;
CREATE TABLE IF NOT EXISTS `staffupload` (
  `staffupload_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `staff_id` varchar(50) NOT NULL,
  `setproject_id` bigint(20) NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`staffupload_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffupload`
--

INSERT INTO `staffupload` (`staffupload_id`, `firstname`, `lastname`, `staff_id`, `setproject_id`, `project_id`, `user_id`) VALUES
(1, 'Idemudia', 'Ekhomu', 'IKD012799', 1, 1, 1),
(2, 'Christopher', 'Isaac', 'IKD030043', 1, 1, 1),
(3, 'Ile', 'Okoh', 'IKD032316', 1, 1, 1),
(4, 'Kikelomo', 'Okebiyi', 'IKD041502', 1, 1, 1),
(5, 'Adekunle', 'Adesanwo', 'IKD041584', 1, 1, 1),
(6, 'Adeshola', 'Ajayi', 'IKD041587', 1, 1, 1),
(7, 'Esther', 'Lawal', 'IKD041607', 1, 1, 1),
(8, 'Ilesanmi', 'Adetuwo', 'IKD042320', 1, 1, 1),
(9, 'Osama', 'Osakue', 'IKD042591', 1, 1, 1),
(10, 'Gbenga', 'Adeleye', 'IKD042595', 1, 1, 1),
(11, 'Kazeem', 'Lawal', 'IKD042656', 1, 1, 1),
(12, 'Ifeanyi', 'Igbojiaku', 'IKD042802', 1, 1, 1),
(13, 'Uchenna', 'Ejim-Madu', 'IKD043101', 1, 1, 1),
(14, 'Chukwuma', 'Emeifeozor', 'IKD043975', 1, 1, 1),
(15, 'Juliana', 'Otori', 'IKD051870', 1, 1, 1),
(16, 'Juliana', 'Ani', 'IKD051954', 1, 1, 1),
(17, 'Olaitan', 'Ogunyade', 'IKD052311', 1, 1, 1),
(18, 'Olurotimi', 'Ogunmolasuyi', 'IKD052325', 1, 1, 1),
(19, 'Judith', 'Ubanzemeka', 'IKD053853', 1, 1, 1),
(20, 'Olusegun', 'Olunuga', 'IKD073147', 1, 1, 1),
(21, 'Henry', 'Ajibola', 'IKD082102', 1, 1, 1),
(22, 'Johnson', 'Noah', 'IKD082191', 1, 1, 1),
(23, 'Titilola', 'Aikhomu', 'IKD092313', 1, 1, 1),
(24, 'Adedayo', 'Gidigbi', 'IKD042324', 1, 1, 1),
(25, 'Olalomi', 'Safiu', 'IKD064171', 1, 1, 1),
(26, 'Taiwo', 'Akinyele', 'IKD074172', 1, 1, 1),
(27, 'Kamal', 'Abayomi', 'IKD074173', 1, 1, 1),
(28, 'Olumide', 'Obasa', 'IKD074174', 1, 1, 1),
(29, 'Elijah', 'Orenaike', 'IKD074175', 1, 1, 1),
(30, 'Vivian', 'Nwogu', 'IKD084177', 1, 1, 1),
(31, 'Mary ', 'Ilukhor', 'IKD084178', 1, 1, 1),
(32, 'Sharon', 'Rehoboth', 'IKD044179', 1, 1, 1),
(33, 'Funto', 'Osinowo', 'IKD044180', 1, 1, 1),
(34, 'Obianuju ', 'Ukwueze', 'IKD044182', 1, 1, 1),
(35, 'Halima', 'Shuaibu', 'IKD094183', 1, 1, 1),
(36, 'Patience', 'Ogbonnaya', 'IKD084176', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`tag_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `zipimages`
--

DROP TABLE IF EXISTS `zipimages`;
CREATE TABLE IF NOT EXISTS `zipimages` (
  `zipimage_id` int(11) NOT NULL AUTO_INCREMENT,
  `zipimage_url` varchar(225) NOT NULL,
  `project_id` int(11) NOT NULL,
  `setproject_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`zipimage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zipimages`
--

INSERT INTO `zipimages` (`zipimage_id`, `zipimage_url`, `project_id`, `setproject_id`, `user_id`) VALUES
(1, '1557493919_Picture.zip', 1, 1, 1),
(2, '1557527188_Signature.zip', 1, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
