-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Ven 31 Mars 2017 à 10:34
-- Version du serveur: 5.5.34
-- Version de PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `hicom-waiter`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `Id` int(11) NOT NULL,
  `Code` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` varchar(255) DEFAULT NULL COMMENT 'FOREIGN KEY (productId) REFERENCES product(Id)',
  `tableId` varchar(255) DEFAULT NULL COMMENT 'FOREIGN KEY (tableId) REFERENCES tables(Id)',
  `img` varchar(255) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `cartId` int(11) DEFAULT NULL,
  `dateCreated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=201 ;

--
-- Contenu de la table `booking`
--

INSERT INTO `booking` (`id`, `productId`, `tableId`, `img`, `productName`, `price`, `number`, `note`, `cartId`, `dateCreated`) VALUES
(73, '8', '29', '', 'Manchurian', '20.0', 3, '1', 25, 1480191603),
(74, '10', '29', '', 'Paneer Tikka', '14.0', 2, '1', 25, 1480191603),
(136, '8', '33', '', 'Manchurian', '20.0', 1, '1', 25, 1485470355),
(137, '4', '33', '', 'Pepsi', '10.0', 2, '1', 25, 1485470355),
(138, '5', '33', '', 'Sprite', '15.0', 2, '1', 25, 1485470355),
(139, '6', '33', '', 'Seven up', '10.0', 2, '1', 25, 1485470355),
(140, '7', '33', '', 'Coke', '10.0', 1, '1', 25, 1485470355),
(141, '11', '33', '', 'Pljeskavica', '120.0', 5, '1', 25, 1485470355),
(142, '12', '33', '', 'Cevapi', '30.0', 4, '1', 25, 1485470355),
(143, '10', '33', '', 'Paneer Tikka', '14.0', 1, '1', 25, 1485470355),
(147, '12', '38', '', 'Cevapi', '30.0', 5, '1', 25, 1485689932),
(148, '11', '38', '', 'Pljeskavica', '120.0', 5, '1', 25, 1485689932),
(150, '4', '32', '', 'Pepsi', '10.0', 1, '1', 25, 1487064985),
(151, '5', '32', '', 'Sprite', '15.0', 2, '1', 25, 1487064985),
(157, '8', '37', '', 'Manchurian', '20.0', 1, '1', 30, 1488035387),
(158, '5', '37', '', 'Sprite', '15.0', 2, '1', 30, 1488035387),
(162, '11', '36', '', 'Pljeskavica', '120.0', 2, '1', 30, 1488035979),
(163, '5', '36', '', 'Sprite', '15.0', 2, '1', 30, 1488035979),
(164, '6', '36', '', 'Seven up', '10.0', 2, '1', 30, 1488035979),
(169, '4', '40', '', 'Pepsi', '10.0', 2, '1', 30, 1488200472),
(170, '7', '40', '', 'Coke', '10.0', 1, '1', 30, 1488200472),
(171, '5', '40', '', 'Sprite', '15.0', 3, '1', 30, 1488200472),
(172, '4', '35', '', 'Pepsi', '10.0', 4, '1', 30, 1488200519),
(173, '10', '35', '', 'Paneer Tikka', '14.0', 1, '1', 30, 1488200519),
(174, '11', '35', '', 'Pljeskavica', '120.0', 2, '1', 30, 1488200519),
(192, '4', '40', '', 'Pepsi', '10.0', 3, '1', 25, 1489739383),
(193, '5', '40', '', 'Sprite', '15.0', 4, '1', 30, 1489739383),
(194, '6', '40', '', 'Seven up', '10.0', 6, '1', 30, 1489739383),
(195, '7', '40', '', 'Coke', '10.0', 7, '1', 30, 1489739383),
(196, '11', '33', '', 'Pljeskavica', '120.0', 2, '1', 30, 1489739418),
(197, '12', '33', '', 'Cevapi', '30.0', 1, '1', 25, 1489739418),
(198, '4', '31', '', 'Pepsi', '10.0', 2, '1', 30, 1490859913),
(199, '4', '31', '', 'Pepsi', '10.0', 1, '1', 25, 1490862333),
(200, '12', '30', '', 'Cevapi', '30.0', 2, '1', 27, 1490863005);

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `waiter` varchar(255) DEFAULT NULL COMMENT 'FOREIGN KEY (productId) REFERENCES product(Id)',
  `tableId` varchar(255) DEFAULT NULL COMMENT 'FOREIGN KEY (tableId) REFERENCES tables(Id)',
  `cartId` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0: deactive 1:active',
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Contenu de la table `cart`
--

INSERT INTO `cart` (`id`, `waiter`, `tableId`, `cartId`, `status`, `time`) VALUES
(8, 'ramu', '31', 25, 0, '2016-10-21 04:34:19'),
(9, 'waiter', '33', 25, 1, '2016-10-29 21:42:14'),
(10, 'waiter', '33', 25, 1, '2016-10-31 03:23:57'),
(11, 'ramu', '31', 25, 1, '2016-10-31 08:11:44'),
(12, 'ramu', '32', 25, 1, '2016-10-31 08:12:42'),
(13, 'ramu', '29', 25, 1, '2016-11-02 08:06:51'),
(14, 'waiter', '34', 25, 1, '2016-11-02 21:04:36'),
(15, 'waiter', '33', 25, 1, '2016-11-09 10:13:13'),
(16, 'waiter', '33', 27, 0, '2016-11-27 04:00:48'),
(17, '', '30', 27, 1, '2016-12-18 19:12:52'),
(18, 'waiter', '30', 25, 1, '2016-12-20 08:23:14'),
(19, 'waiter', '30', 25, 1, '2017-01-11 15:53:43'),
(20, 'waiter', '30', 28, 0, '2017-01-20 00:33:47'),
(21, 'waiter', '30', 25, 1, '2017-01-24 11:06:42'),
(22, 'ramu', '31', 25, 1, '2017-01-24 11:28:01'),
(23, 'waiter', '40', 30, 0, '2017-02-26 02:01:00'),
(24, 'waiter', '40', 30, 1, '2017-02-26 02:01:22'),
(25, 'ramu', '31', 25, 1, '2017-03-03 02:18:58'),
(26, 'waiter', '30', 25, 1, '2017-03-17 15:29:13'),
(27, 'waiter', '40', 25, 1, '2017-03-17 15:29:43'),
(28, 'waiter', '33', 30, 1, '2017-03-17 15:30:18'),
(29, 'ramu', '31', 30, 1, '2017-03-30 14:45:13');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ImageUrl` varchar(255) DEFAULT NULL,
  `Name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `ImageUrl`, `Name`) VALUES
(8, '1473782536Cold-Drinks.jpg', 'Cold Drinks'),
(9, '1474713856starter.jpg', 'Starter'),
(10, NULL, 'Rostilj');

-- --------------------------------------------------------

--
-- Structure de la table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` varchar(255) DEFAULT NULL COMMENT 'FOREIGN KEY (productId) REFERENCES product(Id)',
  `tableId` varchar(255) DEFAULT NULL COMMENT 'FOREIGN KEY (tableId) REFERENCES tables(Id)',
  `img` varchar(255) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `cartId` int(11) DEFAULT NULL,
  `waiter` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=397 ;

--
-- Contenu de la table `history`
--

INSERT INTO `history` (`id`, `productId`, `tableId`, `img`, `productName`, `price`, `number`, `note`, `cartId`, `waiter`) VALUES
(1, '4', '1', '', 'Pepsi', '10.0', 1, '', 9, ''),
(6, '1', '1', '', 'Cocacola', '10.0', 1, '', 16, ''),
(7, '2', '1', '', 'Beef steak', '11.0', 1, '', 16, ''),
(8, '1', '2', '', 'Cocacola', '10.0', 3, '', 9, ''),
(9, '2', '2', '', 'Beef steak', '11.0', 4, '', 9, ''),
(10, '1', '10', '', 'Cocacola', '10.0', 1, '', 1, ''),
(11, '6', '10', '', 'Seven up', '10.0', 1, '', 1, ''),
(12, '7', '10', '', 'Orange juice', '10.0', 1, '', 1, ''),
(13, '1', '9', '', 'Cocacola', '10.0', 1, '', 9, ''),
(14, '18', '9', '', 'Steamed sugpo prawn with coco juice', '10.0', 2, '', 9, ''),
(15, '2', '9', '', 'Beef steak', '11.0', 6, '', 9, ''),
(16, '24', '9', '', 'Matcha tea', '35.0', 1, '', 9, ''),
(17, '3', '9', '', 'Sasami raw sugpo prawn & vegetable (Japan)', '12.0', 3, '', 9, ''),
(18, '6', '9', '', 'Seven up', '10.0', 1, '', 9, ''),
(19, '7', '9', '', 'Orange juice', '10.0', 1, '', 9, ''),
(20, '8', '9', '', 'Mineral water', '10.0', 1, '', 9, ''),
(26, '1', '9', '', 'Cocacola', '10.0', 1, '', 1, ''),
(27, '10', '9', '', 'Sugpo prawn dish served at table', '22.0', 1, '', 1, ''),
(28, '13', '9', '', 'Australia Stead Beef', '12.0', 1, '', 1, ''),
(29, '14', '9', '', 'Grilled Beef with chilli &citronella', '7.0', 1, '', 1, ''),
(30, '15', '9', '', 'Tu Xuyen grilled Beef', '8.0', 1, '', 1, ''),
(31, '16', '9', '', 'Beef dish seved with fried potato', '11.0', 1, '', 1, ''),
(32, '17', '9', '', 'Fried Beef with garlic&celery', '12.0', 2, '', 1, ''),
(33, '18', '9', '', 'Steamed sugpo prawn with coco juice', '10.0', 1, '', 1, ''),
(34, '2', '9', '', 'Beef steak', '11.0', 1, '', 1, ''),
(35, '3', '9', '', 'Sasami raw sugpo prawn & vegetable (Japan)', '12.0', 1, '', 1, ''),
(36, '4', '9', '', 'Pepsi', '10.0', 1, '', 1, ''),
(37, '5', '9', '', 'Sprite', '10.0', 1, '', 1, ''),
(38, '6', '9', '', 'Seven up', '10.0', 1, '', 1, ''),
(39, '7', '9', '', 'Orange juice', '10.0', 1, '', 1, ''),
(40, '1', '8', '', 'Cocacola', '10.0', 2, '', 1, ''),
(41, '2', '8', '', 'Beef steak', '11.0', 5, '', 1, ''),
(42, '3', '8', '', 'Sasami raw sugpo prawn & vegetable (Japan)', '12.0', 2, '', 1, ''),
(43, '4', '8', '', 'Pepsi', '10.0', 1, '', 1, ''),
(44, '5', '8', '', 'Sprite', '10.0', 1, '', 1, ''),
(45, '6', '8', '', 'Seven up', '10.0', 0, '', 1, ''),
(46, '7', '8', '', 'Orange juice', '10.0', 3, '', 1, ''),
(47, '9', '8', '', 'Coffee', '10.0', 1, '', 1, ''),
(48, '2', '8', '', 'Beef steak', '11.0', 4, '', 16, ''),
(55, '1', '4', '', 'Cocacola', '10.0', 2, '', 1, ''),
(56, '3', '4', '', 'Sasami raw sugpo prawn & vegetable (Japan)', '12.0', 0, '', 1, ''),
(57, '10', '3', '', 'Sugpo prawn dish served at table', '22.0', 2, '', 1, ''),
(58, '2', '3', '', 'Beef steak', '11.0', 1, '', 1, ''),
(59, '3', '3', '', 'Sasami raw sugpo prawn & vegetable (Japan)', '12.0', 2, '', 1, ''),
(60, '4', '3', '', 'Pepsi', '10.0', 2, '', 1, ''),
(61, '1', '2', '', 'Cocacola', '10.0', 3, '', 1, ''),
(62, '10', '2', '', 'Sugpo prawn dish served at table', '22.0', 3, '', 1, ''),
(63, '15', '2', '', 'Tu Xuyen grilled Beef', '8.0', 4, '', 1, ''),
(64, '2', '2', '', 'Beef steak', '11.0', 2, '', 1, ''),
(65, '3', '2', '', 'Sasami raw sugpo prawn & vegetable (Japan)', '12.0', 5, '', 1, ''),
(66, '6', '2', '', 'Seven up', '10.0', 2, '', 1, ''),
(67, '8', '2', '', 'Mineral water', '10.0', 1, '', 1, ''),
(72, '7', '1', '', 'Orange juice', '10.0', 4, '', 4, ''),
(73, '24', '17', '', 'Matcha tea', '35.0', 2, '', 4, ''),
(74, '1', '7', '', 'Cocacola', '10.0', 2, '', 17, ''),
(75, '7', '7', '', 'Orange juice', '10.0', 1, '', 17, ''),
(76, '9', '7', '', 'Coffee', '10.0', 4, '', 17, ''),
(77, '1', '1', '', 'Cocacola', '10.0', 2, '', 1, ''),
(78, '12', '1', '', 'keshta', '111.0', 0, '', 1, ''),
(79, '6', '1', '', 'Seven up', '10.0', 5, '', 1, ''),
(80, '8', '1', '', 'Mineral water', '10.0', 1, '', 1, ''),
(81, '9', '1', '', 'Coffee', '10.0', 3, '', 1, ''),
(82, '23', '14', '', 'Matcha coffe', '12.5', 2, '', 1, ''),
(83, '4', '14', '', 'Pepsi', '10.0', 4, '', 1, ''),
(84, '1', '1', '', 'Cocacola', '10.0', 1, '', 18, ''),
(85, '10', '1', '', 'Sugpo prawn dish served at table', '22.0', 2, '', 18, ''),
(86, '15', '1', '', 'Tu Xuyen grilled Beef', '8.0', 2, '', 18, ''),
(87, '16', '1', '', 'Beef dish seved with fried potato', '11.0', 1, '', 18, ''),
(88, '2', '1', '', 'Beef steak', '11.0', 2, '', 18, ''),
(89, '4', '1', '', 'Pepsi', '10.0', 2, '', 18, ''),
(90, '5', '1', '', 'Sprite', '10.0', 2, '', 18, ''),
(91, '6', '1', '', 'Seven up', '10.0', 4, '', 18, ''),
(92, '7', '1', '', 'Orange juice', '10.0', 1, '', 18, ''),
(93, '8', '1', '', 'Mineral water', '10.0', 2, '', 18, ''),
(94, '2', '18', '', 'Beef steak', '11.0', 1, '', 1, ''),
(95, '20', '18', '', 'Sugpo Prawn throung salt', '13.0', 1, '', 1, ''),
(96, '21', '18', '', 'Sugpo Prawn fried in coco sasame', '14.0', 1, '', 1, ''),
(97, '22', '18', '', 'Sườn cây', '10.0', 11, '', 1, ''),
(98, '3', '18', '', 'Sasami raw sugpo prawn & vegetable (Japan)', '12.0', 1, '', 1, ''),
(99, '4', '18', '', 'Pepsi', '10.0', 1, '', 1, ''),
(100, '2', '5', '', 'Beef steak', '11.0', 1, '', 1, ''),
(101, '3', '5', '', 'Sasami raw sugpo prawn & vegetable (Japan)', '12.0', 1, '', 1, ''),
(102, '4', '5', '', 'Pepsi', '10.0', 1, '', 1, ''),
(103, '5', '5', '', 'Sprite', '10.0', 4, '', 1, ''),
(106, '23', '21', '', 'Matcha coffe', '12.5', 1, '', 1, ''),
(107, '26', '21', '', 'Carne asada', '140.0', 1, '', 1, ''),
(108, '27', '21', '', 'تبولة ', '12.0', 3, '', 1, ''),
(109, '4', '21', '', 'Pepsi', '10.0', 6, '', 1, ''),
(110, '5', '21', '', 'Sprite', '10.0', 3, '', 1, ''),
(111, '27', '22', '', 'تبولة ', '12.0', 1, '', 1, ''),
(112, '7', '22', '', 'Orange juice', '10.0', 0, '', 1, ''),
(113, '9', '22', '', 'Coffee', '10.0', 2, '', 1, ''),
(133, '6', '19', '', 'Seven up', '10.0', 1, '', 6, ''),
(134, '7', '19', '', 'Orange juice', '10.0', 1, '', 6, ''),
(135, '8', '19', '', 'Mineral water', '10.0', 1, '', 6, ''),
(138, '2', '16', '', 'Beef steak', '11.0', 1, '', 6, ''),
(139, '27', '16', '', 'تبولة ', '12.0', 2, '', 6, ''),
(140, '1', '6', '', 'Cocacola', '10.0', 6, '', 20, ''),
(141, '2', '7', '', 'Beef steak', '11.0', 1, '', 1, ''),
(142, '21', '7', '', 'Sugpo Prawn fried in coco sasame', '14.0', 1, '', 1, ''),
(143, '2', '8', '', 'Beef steak', '11.0', 1, '', 20, ''),
(144, '2', '10', '', 'Beef steak', '11.0', 12, '', 6, ''),
(145, '3', '10', '', 'Sasami raw sugpo prawn & vegetable (Japan)', '12.0', 3, '', 6, ''),
(146, '6', '10', '', 'Seven up', '10.0', 3, '', 6, ''),
(147, '2', '6', '', 'Beef steak', '11.0', 4, '', 6, ''),
(148, '26', '6', '', 'Carne asada', '140.0', 5, '', 6, ''),
(149, '27', '6', '', 'تبولة ', '12.0', 3, '', 6, ''),
(150, '3', '6', '', 'Sasami raw sugpo prawn & vegetable (Japan)', '12.0', 5, '', 6, ''),
(151, '1', '13', '', 'Cocacola', '10.0', 1, '', 6, ''),
(152, '2', '13', '', 'Beef steak', '11.0', 1, '', 6, ''),
(153, '27', '13', '', 'تبولة ', '12.0', 1, '', 6, ''),
(182, '4', '26', '', 'Pepsi', '10.0', 3, '', 22, ''),
(183, '6', '26', '', 'Seven up', '10.0', 1, '', 22, ''),
(184, '4', '25', '', 'Pepsi', '10.0', 3, '', 21, ''),
(185, '10', '29', '', 'Panner dry', '140.0', 1, '', 22, ''),
(186, '5', '29', '', 'Sprite', '15.0', 1, '', 22, ''),
(187, '8', '29', '', 'Gobi Manchuri', '230.0', 1, '', 22, ''),
(195, '4', '29', '', 'Pepsi', '10.0', 1, '', 23, ''),
(196, '4', '32', '', 'Pepsi', '10.0', 3, '', 23, ''),
(197, '6', '32', '', 'Seven up', '10.0', 1, '', 23, ''),
(198, '10', '33', '', 'Panner dry', '140.0', 4, '', 22, ''),
(199, '8', '33', '', 'Gobi Manchuri', '230.0', 13, '', 22, ''),
(200, '9', '33', '', 'Baby Corn', '140.0', 6, '', 22, ''),
(201, '4', '29', '', 'Pepsi', '10.0', 2, '', 24, ''),
(202, '5', '29', '', 'Sprite', '15.0', 1, '', 24, ''),
(203, '6', '29', '', 'Seven up', '10.0', 1, '', 24, ''),
(204, '8', '29', '', 'Gobi Manchuri', '230.0', 1, '', 24, ''),
(205, '10', '30', '', 'Paneer Tikka', '14.0', 1, '', 26, ''),
(206, '4', '30', '', 'Pepsi', '10.0', 1, '', 26, ''),
(207, '7', '30', '', 'Coke', '10.0', 1, '', 26, ''),
(208, '8', '30', '', 'Manchurian', '20.0', 1, '', 26, ''),
(212, '10', '29', '', 'Paneer Tikka', '14.0', 2, '', 26, ''),
(213, '4', '29', '', 'Pepsi', '10.0', 1, '', 26, ''),
(214, '5', '29', '', 'Sprite', '15.0', 1, '', 26, ''),
(215, '6', '29', '', 'Seven up', '10.0', 1, '', 26, ''),
(216, '7', '29', '', 'Coke', '10.0', 1, '', 26, ''),
(217, '8', '29', '', 'Manchurian', '20.0', 2, '', 26, ''),
(268, '4', '29', '', 'Pepsi', '10.0', 1, '', 25, ''),
(269, '5', '29', '', 'Sprite', '15.0', 1, '', 25, ''),
(270, '6', '29', '', 'Seven up', '10.0', 1, '', 25, ''),
(271, '7', '29', '', 'Coke', '10.0', 4, '', 25, ''),
(292, '10', '34', '', 'Paneer Tikka', '14.0', 8, '', 25, ''),
(293, '5', '34', '', 'Sprite', '15.0', 1, '', 25, ''),
(294, '8', '34', '', 'Manchurian', '20.0', 5, '', 25, ''),
(297, '4', '36', '', 'Pepsi', '10.0', 1, '', 27, ''),
(298, '5', '36', '', 'Sprite', '15.0', 1, '', 27, ''),
(299, '7', '36', '', 'Coke', '10.0', 2, '', 27, ''),
(303, '11', '33', '', 'Pljeskavica', '120.0', 1, '', 25, ''),
(304, '12', '33', '', 'Cevapi', '30.0', 1, '', 25, ''),
(305, '4', '33', '', 'Pepsi', '10.0', 1, '', 25, ''),
(306, '5', '33', '', 'Sprite', '15.0', 1, '', 25, ''),
(307, '10', '32', '', 'Paneer Tikka', '14.0', 3, '', 25, ''),
(308, '4', '32', '', 'Pepsi', '10.0', 1, '', 25, ''),
(309, '5', '32', '', 'Sprite', '15.0', 2, '', 25, ''),
(310, '8', '32', '', 'Manchurian', '20.0', 3, '', 25, ''),
(313, '12', '33', '', 'Cevapi', '30.0', 1, '', 27, ''),
(314, '11', '35', '', 'Pljeskavica', '120.0', 1, '', 25, ''),
(315, '12', '35', '', 'Cevapi', '30.0', 2, '', 25, ''),
(316, '4', '35', '', 'Pepsi', '10.0', 1, '', 25, ''),
(317, '5', '35', '', 'Sprite', '15.0', 1, '', 25, ''),
(318, '6', '35', '', 'Seven up', '10.0', 2, '', 25, ''),
(319, '7', '35', '', 'Coke', '10.0', 2, '', 25, ''),
(334, '10', '38', '', 'Paneer Tikka', '14.0', 1, '', 25, ''),
(335, '8', '38', '', 'Manchurian', '20.0', 1, '', 25, ''),
(336, '10', '38', '', 'Paneer Tikka', '14.0', 2, '', 28, ''),
(337, '8', '38', '', 'Manchurian', '20.0', 1, '', 28, ''),
(338, '4', '37', '', 'Pepsi', '10.0', 2, '', 28, ''),
(339, '5', '37', '', 'Sprite', '15.0', 2, '', 28, ''),
(340, '6', '37', '', 'Seven up', '10.0', 1, '', 28, ''),
(341, '7', '37', '', 'Coke', '10.0', 1, '', 28, ''),
(342, '10', '39', '', 'Paneer Tikka', '14.0', 2, '', 28, ''),
(343, '8', '39', '', 'Manchurian', '20.0', 2, '', 28, ''),
(350, '4', '30', '', 'Pepsi', '10.0', 1, '', 28, ''),
(351, '5', '30', '', 'Sprite', '15.0', 1, '', 28, ''),
(352, '8', '30', '', 'Manchurian', '20.0', 2, '', 28, ''),
(353, '10', '39', '', 'Paneer Tikka', '14.0', 4, '', 25, ''),
(354, '5', '39', '', 'Sprite', '15.0', 4, '', 25, ''),
(355, '8', '39', '', 'Manchurian', '20.0', 1, '', 25, ''),
(356, '4', '35', '', 'Pepsi', '10.0', 3, '', 29, ''),
(360, '10', '40', '', 'Paneer Tikka', '14.0', 2, '', 30, ''),
(361, '11', '40', '', 'Pljeskavica', '120.0', 2, '', 30, ''),
(362, '12', '40', '', 'Cevapi', '30.0', 1, '', 30, ''),
(363, '8', '40', '', 'Manchurian', '20.0', 3, '', 30, ''),
(370, '10', '39', '', 'Paneer Tikka', '14.0', 1, '', 30, ''),
(371, '4', '39', '', 'Pepsi', '10.0', 1, '', 30, ''),
(372, '5', '39', '', 'Sprite', '15.0', 4, '', 30, ''),
(373, '6', '39', '', 'Seven up', '10.0', 1, '', 30, ''),
(374, '7', '39', '', 'Coke', '10.0', 2, '', 30, ''),
(388, '10', '30', '', 'Paneer Tikka', '14.0', 1, '', 27, ''),
(389, '4', '30', '', 'Pepsi', '10.0', 2, '', 27, ''),
(390, '8', '30', '', 'Manchurian', '20.0', 2, '', 27, ''),
(391, '8', '30', '', 'Manchurian', '20.0', 2, '', 25, ''),
(392, '10', '31', '', 'Paneer Tikka', '14.0', 1, '', 25, ''),
(393, '4', '31', '', 'Pepsi', '10.0', 3, '', 25, ''),
(394, '6', '31', '', 'Seven up', '10.0', 2, '', 25, ''),
(395, '7', '31', '', 'Coke', '10.0', 1, '', 25, ''),
(396, '8', '31', '', 'Manchurian', '20.0', 1, '', 25, '');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameOperator` varchar(255) NOT NULL,
  `passOperator` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `login`
--

INSERT INTO `login` (`id`, `nameOperator`, `passOperator`) VALUES
(25, 'waiter', 'waiter'),
(26, 'ramu', 'ramu'),
(27, 'Pera', 'pera'),
(28, 'jimmy', '1234'),
(29, 'habn', '123456'),
(30, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Code` int(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `NumberName` int(255) NOT NULL DEFAULT '0',
  `Name` varchar(255) NOT NULL,
  `CategoryId` varchar(255) NOT NULL COMMENT 'FOREIGN KEY (CategoryId) REFERENCES id(Category)',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`Id`, `Code`, `Price`, `NumberName`, `Name`, `CategoryId`) VALUES
(4, 1, '10', 0, 'Pepsi', '8'),
(5, 2, '15', 0, 'Sprite', '8'),
(6, 3, '10', 0, 'Seven up', '8'),
(7, 4, '10', 0, 'Coke', '8'),
(8, 10, '20', 0, 'Manchurian', '9'),
(10, 11, '14', 0, 'Paneer Tikka', '9'),
(11, 22, '120', 0, 'Pljeskavica', '10'),
(12, 40, '30', 0, 'Cevapi', '10');

-- --------------------------------------------------------

--
-- Structure de la table `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `operatorId` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `tables`
--

INSERT INTO `tables` (`Id`, `operatorId`, `status`) VALUES
(30, 25, 1),
(31, 26, 1),
(32, 26, 1),
(33, 25, 1),
(34, 25, 2),
(35, 25, 1),
(36, 27, 1),
(37, 28, 1),
(38, 25, 1),
(39, 25, 2),
(40, 25, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
