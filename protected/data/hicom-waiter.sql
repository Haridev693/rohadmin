-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2018 at 02:16 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wtable`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Id` int(11) NOT NULL,
  `Code` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assigntable`
--

CREATE TABLE `assigntable` (
  `Id` int(255) NOT NULL,
  `WaiterId` text NOT NULL,
  `TablesetId` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `productId` varchar(255) DEFAULT NULL COMMENT 'FOREIGN KEY (productId) REFERENCES product(Id)',
  `tableId` varchar(255) DEFAULT NULL COMMENT 'FOREIGN KEY (tableId) REFERENCES tables(Id)',
  `img` varchar(255) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `cartId` int(11) DEFAULT NULL,
  `dateCreated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `waiter` varchar(255) DEFAULT NULL COMMENT 'FOREIGN KEY (productId) REFERENCES product(Id)',
  `tableId` varchar(255) DEFAULT NULL COMMENT 'FOREIGN KEY (tableId) REFERENCES tables(Id)',
  `cartId` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0: deactive 1:active',
  `time` datetime DEFAULT NULL,
  `month` text NOT NULL,
  `year` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `FoodcompanyId` varchar(255) NOT NULL COMMENT 'FOREIGN KEY (FoodcompanyId) REFERENCES foodcompany(Id)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `ImageUrl` varchar(255) DEFAULT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `emailID` text NOT NULL,
  `dob` text NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--
-- --------------------------------------------------------

--
-- Table structure for table `foodcompany`
--

CREATE TABLE `foodcompany` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `productId` varchar(255) DEFAULT NULL COMMENT 'FOREIGN KEY (productId) REFERENCES product(Id)',
  `tableId` varchar(255) DEFAULT NULL COMMENT 'FOREIGN KEY (tableId) REFERENCES tables(Id)',
  `img` varchar(255) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `cartId` int(11) DEFAULT NULL,
  `waiter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nameOperator` varchar(255) NOT NULL,
  `passOperator` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nameOperator`, `passOperator`) VALUES
(1, 'waiter', '1'),
(2, 'ramu', 'ramu'),
(3, 'jimmy', '1234'),
(4, 'admin', 'admin'),
(5, 'kamal', 'kamal1*');
-- --------------------------------------------------------
--
-- Table structure for table `printsetting`
--

CREATE TABLE `printsetting` (
  `id` int(255) NOT NULL,
  `rest_name` text NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `sales_invoice` text NOT NULL,
  `footer_1` text NOT NULL,
  `footer_2` text NOT NULL,
  `footer_3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Dumping data for table `printsetting`
--

INSERT INTO `printsetting` (`id`, `rest_name`, `address_1`, `address_2`, `sales_invoice`, `footer_1`, `footer_2`, `footer_3`) VALUES
(1, 'Restaurant', 'Durga Nagar Crossroads, ', 'Tel:+91812155635', 'Sales Invoice', 'Thanks for your purchase', 'Please visit again', '');


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `Code` int(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `NumberName` int(255) NOT NULL DEFAULT '0',
  `Name` varchar(255) NOT NULL,
  `CategoryId` varchar(255) NOT NULL COMMENT 'FOREIGN KEY (CategoryId) REFERENCES id(Category)',
  `Totalqty` text NOT NULL,
  `Stockstatus` text NOT NULL COMMENT 'If 0 Not Stock Add 1  Stock Add'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `Id` int(11) NOT NULL,
  `Question` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `Id` int(255) NOT NULL,
  `questionId` int(11) NOT NULL,
  `rating` text NOT NULL,
  `customerId` text NOT NULL,
  `suggestion` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Id` int(11) NOT NULL,
  `TableId` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Number` text NOT NULL,
  `Person` text NOT NULL,
  `Date` text NOT NULL,
  `Time` text NOT NULL,
  `CurrentTime` datetime NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stockhistory`
--

CREATE TABLE `stockhistory` (
  `Id` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `Qty` text NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `Id` int(11) NOT NULL,
  `operatorId` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tables`
--
-- --------------------------------------------------------

--
-- Table structure for table `tableset`
--

CREATE TABLE `tableset` (
  `Id` int(255) NOT NULL,
  `Name` text NOT NULL,
  `TableId` text NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `tax` text NOT NULL,
  `gst_no` text NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0: deactive 1:active',
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `tax` (`id`, `tax`, `gst_no`, `status`, `time`) VALUES
(1, '18', 'AKYPN31239183', 1, '0000-00-00 00:00:00');


--
-- Dumping data for table `tax`
--
-- --------------------------------------------------------

--
-- Table structure for table `tmphistory`
--

CREATE TABLE `tmphistory` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `productId` text NOT NULL,
  `productName` text NOT NULL,
  `price` text NOT NULL,
  `number` text NOT NULL,
  `FoodcompanyId` text NOT NULL,
  `tmpcartId` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `assigntable`
--
ALTER TABLE `assigntable`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodcompany`
--
ALTER TABLE `foodcompany`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `printsetting`
--
ALTER TABLE `printsetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `stockhistory`
--
ALTER TABLE `stockhistory`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tableset`
--
ALTER TABLE `tableset`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmphistory`
--
ALTER TABLE `tmphistory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigntable`
--
ALTER TABLE `assigntable`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `foodcompany`
--
ALTER TABLE `foodcompany`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `printsetting`
--
ALTER TABLE `printsetting`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `stockhistory`
--
ALTER TABLE `stockhistory`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `tableset`
--
ALTER TABLE `tableset`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `tmphistory`
--
ALTER TABLE `tmphistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

