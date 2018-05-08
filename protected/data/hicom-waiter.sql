-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2017 at 05:46 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `waiter`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
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
-- Table structure for table `booking`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=141 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `productId`, `tableId`, `img`, `productName`, `price`, `number`, `note`, `cartId`, `dateCreated`) VALUES
(131, '4', '30', '', 'Pepsi', '2', 2, '', 25, 1507713638),
(132, '5', '30', '', 'Sprite', '15', 2, '', 25, 1507713638),
(137, '11', '31', '', 'Poulet Roti', '120.0', 1, '1', 1507718349, 1507718203),
(139, '7', '42', '', 'Coke', '10.0', 4, '1', 1507718419, 1507718274);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `waiter` varchar(255) DEFAULT NULL COMMENT 'FOREIGN KEY (productId) REFERENCES product(Id)',
  `tableId` varchar(255) DEFAULT NULL COMMENT 'FOREIGN KEY (tableId) REFERENCES tables(Id)',
  `cartId` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0: deactive 1:active',
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `waiter`, `tableId`, `cartId`, `status`, `time`) VALUES
(1, 'jimmy', '37', 1507694807, 0, '2017-10-11 11:06:46'),
(2, 'admin', '40', 1507694955, 0, '2017-10-11 11:09:14'),
(3, 'jimmy', '37', 2537, 0, '2017-10-11 11:16:30'),
(9, 'jimmy', '37', 1507698257, 0, '2017-10-11 12:04:41'),
(10, '', '36', 1507698299, 0, '2017-10-11 12:05:19'),
(11, 'admin', '40', 1507704050, 0, '2017-10-11 13:42:52'),
(13, 'admin', '40', 1507704685, 0, '2017-10-11 13:51:44'),
(14, 'admin', '40', 1507704805, 0, '2017-10-11 13:53:24'),
(16, 'admin', '40', 1507704894, 0, '2017-10-11 13:55:16'),
(17, 'admin', '40', 1507704946, 0, '2017-10-11 13:56:15'),
(18, 'admin', '40', 1507705516, 0, '2017-10-11 14:05:16'),
(19, 'admin', '40', 1507705608, 0, '2017-10-11 14:07:04'),
(20, 'admin', '40', 1507705744, 0, '2017-10-11 14:09:08'),
(21, 'admin', '40', 1507705816, 0, '2017-10-11 14:11:07'),
(22, 'admin', '40', 1507707474, 0, '2017-10-11 14:37:55'),
(26, 'admin', '40', 1507707815, 0, '2017-10-11 14:43:44'),
(27, 'admin', '40', 1507707995, 0, '2017-10-11 14:47:27'),
(29, 'admin', '40', 1507708421, 0, '2017-10-11 14:53:41'),
(31, 'admin', '40', 1507708568, 0, '2017-10-11 14:56:08'),
(32, 'jimmy', '37', 1507710560, 0, '2017-10-11 15:29:19'),
(33, 'admin', '40', 1507710596, 0, '2017-10-11 15:29:56'),
(34, 'waiter', '43', 1507718219, 0, '2017-10-11 17:34:34'),
(35, 'ramu', '31', 1507718349, 1, '2017-10-11 17:36:43'),
(36, 'waiter', '35', 1507718397, 0, '2017-10-11 17:37:32'),
(37, 'waiter', '42', 1507718419, 1, '2017-10-11 17:37:54'),
(38, 'kamal', '45', 1507718595, 0, '2017-10-11 17:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ImageUrl` varchar(255) DEFAULT NULL,
  `Name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `ImageUrl`, `Name`) VALUES
(8, '1496391678fd.png', 'Cold Drinks'),
(9, '14968112781496391655demo2.png', 'Starter'),
(10, '1496391448img_example.png', 'Mains'),
(11, '14968114481496391981gfg.png', 'Pizza'),
(12, '1497081966dim-sum.jpg', 'Dim Sum'),
(16, '1506155161imageholder.jpg', 'try');

-- --------------------------------------------------------

--
-- Table structure for table `history`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `productId`, `tableId`, `img`, `productName`, `price`, `number`, `note`, `cartId`, `waiter`) VALUES
(1, '10', '37', '', 'Paneer Tikka', '14.0', 1, '', 1507694807, ''),
(2, '16', '37', '', 'Ramen', '5.0', 1, '', 1507694807, ''),
(3, '8', '37', '', 'Dal Makhani', '20.0', 1, '', 1507694807, ''),
(4, '11', '37', '', 'Poulet Roti', '120.0', 1, '', 1507694871, ''),
(5, '12', '37', '', 'Riz Frite', '30.0', 1, '', 1507694871, ''),
(6, '11', '37', '', 'Poulet Roti', '120.0', 1, '', 1507694902, ''),
(7, '12', '37', '', 'Riz Frite', '30.0', 1, '', 1507694902, ''),
(8, '10', '40', '', 'Paneer Tikka', '14.0', 1, '', 1507694945, ''),
(9, '4', '40', '', 'Pepsi', '2.0', 1, '', 1507694945, ''),
(10, '5', '40', '', 'Sprite', '15.0', 1, '', 1507694945, ''),
(11, '8', '40', '', 'Dal Makhani', '20.0', 1, '', 1507694945, ''),
(12, '4', '40', '', 'Pepsi', '2.0', 1, '', 1507694955, ''),
(13, '5', '40', '', 'Sprite', '15.0', 1, '', 1507694955, ''),
(31, '4', '37', '', 'Pepsi', '2.0', 1, '', 2537, ''),
(32, '5', '37', '', 'Sprite', '15.0', 1, '', 2537, ''),
(33, '10', '37', '', 'Paneer Tikka', '14.0', 1, '', 2537, ''),
(34, '4', '37', '', 'Pepsi', '2.0', 1, '', 2537, ''),
(35, '5', '37', '', 'Sprite', '15.0', 1, '', 2537, ''),
(36, '8', '37', '', 'Dal Makhani', '20.0', 1, '', 2537, ''),
(37, '10', '37', '', 'Paneer Tikka', '14.0', 1, '', 1507698257, ''),
(38, '4', '37', '', 'Pepsi', '2.0', 1, '', 1507698257, ''),
(39, '5', '37', '', 'Sprite', '15.0', 1, '', 1507698257, ''),
(40, '8', '37', '', 'Dal Makhani', '20.0', 1, '', 1507698257, ''),
(41, '10', '36', '', 'Paneer Tikka', '14.0', 2, '', 1507698299, ''),
(42, '8', '36', '', 'Dal Makhani', '20.0', 2, '', 1507698299, ''),
(43, '10', '40', '', 'Paneer Tikka', '14.0', 2, '', 1507704050, ''),
(44, '8', '40', '', 'Dal Makhani', '20.0', 2, '', 1507704050, ''),
(45, '10', '40', '', 'Paneer Tikka', '14.0', 1, '', 1507704050, ''),
(46, '11', '40', '', 'Poulet Roti', '120.0', 1, '', 1507704050, ''),
(47, '12', '40', '', 'Riz Frite', '30.0', 1, '', 1507704050, ''),
(48, '8', '40', '', 'Dal Makhani', '20.0', 1, '', 1507704050, ''),
(49, '10', '40', '', 'Paneer Tikka', '14.0', 1, '', 1507704685, ''),
(50, '11', '40', '', 'Poulet Roti', '120.0', 1, '', 1507704685, ''),
(51, '12', '40', '', 'Riz Frite', '30.0', 1, '', 1507704685, ''),
(52, '16', '40', '', 'Ramen', '5.0', 1, '', 1507704685, ''),
(53, '8', '40', '', 'Dal Makhani', '20.0', 1, '', 1507704685, ''),
(54, '10', '40', '', 'Paneer Tikka', '14.0', 1, '', 1507704805, ''),
(55, '4', '40', '', 'Pepsi', '2.0', 1, '', 1507704805, ''),
(56, '5', '40', '', 'Sprite', '15.0', 1, '', 1507704805, ''),
(57, '8', '40', '', 'Dal Makhani', '20.0', 1, '', 1507704805, ''),
(58, '10', '40', '', 'Paneer Tikka', '14.0', 2, '', 1507704894, ''),
(59, '16', '40', '', 'Ramen', '5.0', 1, '', 1507704894, ''),
(60, '8', '40', '', 'Dal Makhani', '20.0', 2, '', 1507704894, ''),
(61, '11', '40', '', 'Poulet Roti', '120.0', 1, '', 1507704946, ''),
(62, '12', '40', '', 'Riz Frite', '30.0', 1, '', 1507704946, ''),
(63, '4', '40', '', 'Pepsi', '2.0', 1, '', 1507704946, ''),
(64, '5', '40', '', 'Sprite', '15.0', 1, '', 1507704946, ''),
(65, '6', '40', '', 'Seven up', '10.0', 1, '', 1507704946, ''),
(66, '4', '40', '', 'Pepsi', '2.0', 3, '', 1507704946, ''),
(67, '5', '40', '', 'Sprite', '15.0', 3, '', 1507704946, ''),
(68, '6', '40', '', 'Seven up', '10.0', 3, '', 1507704946, ''),
(69, '10', '40', '', 'Paneer Tikka', '14.0', 1, '', 1507705516, ''),
(70, '16', '40', '', 'Ramen', '5.0', 1, '', 1507705516, ''),
(71, '8', '40', '', 'Dal Makhani', '20.0', 1, '', 1507705516, ''),
(72, '11', '40', '', 'Poulet Roti', '120.0', 2, '', 1507705608, ''),
(73, '12', '40', '', 'Riz Frite', '30.0', 1, '', 1507705608, ''),
(74, '17', '40', '', '111', '11.0', 112, '', 1507705744, ''),
(75, '17', '40', '', '111', '11.0', 112, '', 1507705816, ''),
(76, '4', '40', '', 'Pepsi', '2.0', 1, '', 1507705816, ''),
(77, '5', '40', '', 'Sprite', '15.0', 1, '', 1507705816, ''),
(78, '6', '40', '', 'Seven up', '10.0', 1, '', 1507705816, ''),
(79, '7', '40', '', 'Coke', '10.0', 1, '', 1507705816, ''),
(80, '10', '40', '', 'Paneer Tikka', '14.0', 1, '', 1507706887, ''),
(81, '16', '40', '', 'Ramen', '5.0', 1, '', 1507706887, ''),
(82, '8', '40', '', 'Dal Makhani', '20.0', 1, '', 1507706887, ''),
(83, '10', '40', '', 'Paneer Tikka', '14.0', 1, '', 1507707474, ''),
(84, '16', '40', '', 'Ramen', '5.0', 1, '', 1507707474, ''),
(85, '8', '40', '', 'Dal Makhani', '20.0', 1, '', 1507707474, ''),
(86, '10', '40', '', 'Paneer Tikka', '14.0', 1, '', 1507707667, ''),
(87, '8', '40', '', 'Dal Makhani', '20.0', 1, '', 1507707667, ''),
(88, '11', '40', '', 'Poulet Roti', '120.0', 1, '', 1507707815, ''),
(89, '12', '40', '', 'Riz Frite', '30.0', 1, '', 1507707815, ''),
(90, '4', '40', '', 'Pepsi', '2.0', 1, '', 1507707815, ''),
(91, '5', '40', '', 'Sprite', '15.0', 1, '', 1507707815, ''),
(92, '10', '40', '', 'Paneer Tikka', '14.0', 3, '', 1507707995, ''),
(93, '16', '40', '', 'Ramen', '5.0', 3, '', 1507707995, ''),
(94, '8', '40', '', 'Dal Makhani', '20.0', 3, '', 1507707995, ''),
(95, '11', '40', '', 'Poulet Roti', '120.0', 1, '', 1507708421, ''),
(96, '12', '40', '', 'Riz Frite', '30.0', 1, '', 1507708421, ''),
(97, '11', '40', '', 'Poulet Roti', '120.0', 1, '', 1507708568, ''),
(98, '12', '40', '', 'Riz Frite', '30.0', 1, '', 1507708568, ''),
(99, '16', '40', '', 'Ramen', '5.0', 1, '', 1507708568, ''),
(100, '8', '40', '', 'Dal Makhani', '20.0', 1, '', 1507708568, ''),
(101, '4', '37', '', 'Pepsi', '2.0', 1, '', 1507710560, ''),
(102, '5', '37', '', 'Sprite', '15.0', 1, '', 1507710560, ''),
(103, '7', '37', '', 'Coke', '10.0', 1, '', 1507710560, ''),
(104, '10', '40', '', 'Paneer Tikka', '14.0', 1, '', 1507710596, ''),
(105, '11', '40', '', 'Poulet Roti', '120.0', 1, '', 1507710596, ''),
(106, '12', '40', '', 'Riz Frite', '30.0', 1, '', 1507710596, ''),
(107, '16', '40', '', 'Ramen', '5.0', 1, '', 1507710596, ''),
(108, '4', '40', '', 'Pepsi', '2.0', 1, '', 1507710596, ''),
(109, '5', '40', '', 'Sprite', '15.0', 1, '', 1507710596, ''),
(110, '6', '40', '', 'Seven up', '10.0', 1, '', 1507710596, ''),
(111, '7', '40', '', 'Coke', '10.0', 1, '', 1507710596, ''),
(112, '8', '40', '', 'Dal Makhani', '20.0', 1, '', 1507710596, ''),
(113, '5', '31', '', 'Sprite', '15', 4, '', 25, ''),
(114, '6', '31', '', 'Seven up', '10', 4, '', 25, ''),
(115, '10', '43', '', 'Paneer Tikka', '14.0', 1, '', 1507718219, ''),
(116, '16', '43', '', 'Ramen', '5.0', 1, '', 1507718219, ''),
(117, '8', '45', '', 'Dal Makhani', '20.0', 1, '', 1507718595, ''),
(118, '14', '35', '', 'Sao Mai', '12.0', 1, '', 1507718397, '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameOperator` varchar(255) NOT NULL,
  `passOperator` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nameOperator`, `passOperator`) VALUES
(25, 'waiter', '1'),
(26, 'ramu', 'ramu'),
(28, 'jimmy', '1234'),
(30, 'admin', 'admin'),
(33, 'kamal', 'kamal1*'),
(34, 'agus', '123456'),
(35, 'tester', 'tester'),
(36, 'Tim', '741741'),
(37, 'sa', '123'),
(38, 'demo', 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Code` int(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `NumberName` int(255) NOT NULL DEFAULT '0',
  `Name` varchar(255) NOT NULL,
  `CategoryId` varchar(255) NOT NULL COMMENT 'FOREIGN KEY (CategoryId) REFERENCES id(Category)',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `Code`, `Price`, `NumberName`, `Name`, `CategoryId`) VALUES
(4, 1, '2', 0, 'Pepsi', '8'),
(5, 2, '15', 0, 'Sprite', '8'),
(6, 3, '10', 0, 'Seven up', '8'),
(7, 4, '10', 0, 'Coke', '8'),
(8, 10, '20', 0, 'Dal Makhani', '9'),
(10, 11, '14', 0, 'Paneer Tikka', '9'),
(11, 22, '120', 0, 'Poulet Roti', '10'),
(12, 40, '30', 0, 'Riz Frite', '10'),
(13, 81, '10', 1, 'Chouchou', '12'),
(14, 82, '12', 2, 'Sao Mai', '12'),
(15, 123789, '25000', 0, 'AYAM TIMBEL KOMPLIT', '13'),
(16, 123, '5', 0, 'Ramen', '9'),
(17, 111, '11', 111, '111', '16');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `operatorId` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`Id`, `operatorId`, `status`) VALUES
(30, 25, 1),
(31, 26, 1),
(32, 26, 2),
(33, 25, 2),
(34, 25, 2),
(35, 25, 2),
(36, 27, 2),
(37, 28, 2),
(38, 25, 2),
(39, 25, 2),
(40, 30, 2),
(41, 25, 2),
(42, 25, 1),
(43, 25, 2),
(44, 25, 2),
(45, 33, 2),
(46, 25, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
