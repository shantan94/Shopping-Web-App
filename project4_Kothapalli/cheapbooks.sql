-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2016 at 06:39 PM
-- Server version: 5.6.22-log
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cheapbooks`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `ssn` varchar(20) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`ssn`, `name`, `address`, `phone`) VALUES
('01', 'Shantan', 'arlington', '4084785233'),
('02', 'Shantan', 'arlington', '4084785233'),
('03', 'Ryan', 'arlington', '4084964577'),
('04', 'Jess', 'arlington', '4084964783');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` varchar(100) NOT NULL DEFAULT '',
  `title` varchar(40) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `publisher` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `title`, `year`, `price`, `publisher`) VALUES
('101', 'Hello', '1999', '300', 'nad'),
('102', 'Life', '1998', '800', 'nady'),
('103', 'World', '2006', '500', 'nad'),
('104', 'Hello', '2008', '200', 'nady');

-- --------------------------------------------------------

--
-- Table structure for table `contains`
--

CREATE TABLE `contains` (
  `ISBN` varchar(100) DEFAULT NULL,
  `basketID` int(10) NOT NULL,
  `number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contains`
--

INSERT INTO `contains` (`ISBN`, `basketID`, `number`) VALUES
('101', 125, '5'),
('101', 126, '5'),
('103', 135, '5'),
('103', 136, '2'),
('104', 137, '7'),
('104', 138, '7'),
('104', 139, '2'),
('104', 140, '4'),
('102', 141, '1'),
('103', 142, '1'),
('103', 143, '3'),
('103', 144, '1'),
('103', 145, '2'),
('101', 146, '3'),
('102', 147, '2'),
('101', 148, '3'),
('102', 149, '3'),
('102', 150, '1'),
('101', 151, '1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(30) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `address`, `email`, `phone`, `password`) VALUES
('Dave', 'arlington', 'dave@gmail.com', '835485438', '1610838743cc90e3e4fdda748282d9b8'),
('Gale', 'arlington', 'gale@gmail.com', '4583478548', 'fdbd3cd60f63ebe9505bb7e0310a73d2'),
('shantan', 'arlington', 'shantan@gmail.com', '4699544195', '0970ab36eafb07718f2d1139a946b8a7'),
('shantan1', 'arlington', 'shantan1@gmail.com', '346827634', '30d863c725bc6fc60b24e1e255cec193'),
('shantan2', 'arlington', 'shantan2@gmail.com', '4587346587', '4f2a043819534af92ad4ae0937a5c6f6'),
('smith', 'arlington', 'smith@gmail.com', '34759874', 'a029d0df84eb5549c641e04a9ef389e5');

-- --------------------------------------------------------

--
-- Table structure for table `shippingorder`
--

CREATE TABLE `shippingorder` (
  `ISBN` varchar(100) DEFAULT NULL,
  `warehouseCode` varchar(10) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shippingorder`
--

INSERT INTO `shippingorder` (`ISBN`, `warehouseCode`, `username`, `number`) VALUES
('103', '1002', 'shantan', '3'),
('101', '1001', 'shantan', '2'),
('101', '1001', 'shantan', '3'),
('102', '1002', 'shantan', '5'),
('101', '1001', 'shantan', '2'),
('102', '1002', 'shantan', '3'),
('101', '1001', 'shantan', '2'),
('101', '1001', 'shantan', '3'),
('102', '1002', 'shantan', '2'),
('101', '1001', 'shantan', '3'),
('102', '1002', 'shantan', '5'),
('103', '1002', 'shantan', '5'),
('103', '1002', 'shantan', '2'),
('104', '1001', 'shantan', '7'),
('104', '1001', 'shantan', '7'),
('104', '1001', 'shantan', '2'),
('104', '1001', 'shantan', '4'),
('102', '1002', 'shantan', '1'),
('103', '1002', 'shantan', '1'),
('103', '1002', 'shantan', '3'),
('103', '1002', 'shantan', '1'),
('103', '1002', 'shantan', '2'),
('101', '1001', 'shantan', '3'),
('102', '1002', 'shantan', '2'),
('101', '1001', 'shantan', '3'),
('102', '1002', 'shantan', '3'),
('102', '1002', 'shantan', '1'),
('101', '1001', 'shantan', '1');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingbasket`
--

CREATE TABLE `shoppingbasket` (
  `basketID` int(10) NOT NULL,
  `username` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shoppingbasket`
--

INSERT INTO `shoppingbasket` (`basketID`, `username`) VALUES
(120, 'shantan'),
(121, 'shantan'),
(122, 'shantan'),
(123, 'shantan'),
(124, 'shantan'),
(125, 'shantan'),
(126, 'shantan'),
(127, 'shantan'),
(128, 'shantan'),
(129, 'shantan'),
(130, 'shantan'),
(131, 'shantan'),
(135, 'shantan'),
(136, 'shantan'),
(137, 'shantan'),
(138, 'shantan'),
(139, 'shantan'),
(140, 'shantan'),
(141, 'shantan'),
(142, 'shantan'),
(143, 'shantan'),
(144, 'shantan'),
(145, 'shantan'),
(146, 'shantan'),
(147, 'shantan'),
(148, 'shantan'),
(149, 'shantan'),
(150, 'shantan'),
(151, 'shantan');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `ISBN` varchar(100) DEFAULT NULL,
  `warehouseCode` varchar(10) DEFAULT NULL,
  `number` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`ISBN`, `warehouseCode`, `number`) VALUES
('101', '1001', '99'),
('102', '1002', '100'),
('104', '1001', '103'),
('103', '1002', '99');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `warehouseCode` varchar(10) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`warehouseCode`, `name`, `address`, `phone`) VALUES
('1001', 'Novels', 'arlington', '4084785233'),
('1002', 'Poems', 'arlington', '4084785233'),
('1003', 'literature', 'arlington', '678432807'),
('1004', 'history', 'arlington', '678432678');

-- --------------------------------------------------------

--
-- Table structure for table `writtenby`
--

CREATE TABLE `writtenby` (
  `ssn` varchar(20) DEFAULT NULL,
  `ISBN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `writtenby`
--

INSERT INTO `writtenby` (`ssn`, `ISBN`) VALUES
('01', '101'),
('02', '102'),
('03', '103'),
('04', '104');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`ssn`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `contains`
--
ALTER TABLE `contains`
  ADD KEY `basketID` (`basketID`),
  ADD KEY `ISBN` (`ISBN`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `shippingorder`
--
ALTER TABLE `shippingorder`
  ADD KEY `warehouseCode` (`warehouseCode`),
  ADD KEY `username` (`username`),
  ADD KEY `ISBN` (`ISBN`);

--
-- Indexes for table `shoppingbasket`
--
ALTER TABLE `shoppingbasket`
  ADD PRIMARY KEY (`basketID`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD KEY `warehouseCode` (`warehouseCode`),
  ADD KEY `ISBN` (`ISBN`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`warehouseCode`);

--
-- Indexes for table `writtenby`
--
ALTER TABLE `writtenby`
  ADD KEY `ISBN` (`ISBN`),
  ADD KEY `ssn` (`ssn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contains`
--
ALTER TABLE `contains`
  MODIFY `basketID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `shoppingbasket`
--
ALTER TABLE `shoppingbasket`
  MODIFY `basketID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contains`
--
ALTER TABLE `contains`
  ADD CONSTRAINT `contains_ibfk_2` FOREIGN KEY (`basketID`) REFERENCES `shoppingbasket` (`basketID`),
  ADD CONSTRAINT `contains_ibfk_3` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`);

--
-- Constraints for table `shippingorder`
--
ALTER TABLE `shippingorder`
  ADD CONSTRAINT `shippingorder_ibfk_2` FOREIGN KEY (`warehouseCode`) REFERENCES `warehouse` (`warehouseCode`),
  ADD CONSTRAINT `shippingorder_ibfk_3` FOREIGN KEY (`username`) REFERENCES `customer` (`username`),
  ADD CONSTRAINT `shippingorder_ibfk_4` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`);

--
-- Constraints for table `shoppingbasket`
--
ALTER TABLE `shoppingbasket`
  ADD CONSTRAINT `shoppingbasket_ibfk_1` FOREIGN KEY (`username`) REFERENCES `customer` (`username`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_ibfk_2` FOREIGN KEY (`warehouseCode`) REFERENCES `warehouse` (`warehouseCode`),
  ADD CONSTRAINT `stocks_ibfk_3` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`);

--
-- Constraints for table `writtenby`
--
ALTER TABLE `writtenby`
  ADD CONSTRAINT `writtenby_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`),
  ADD CONSTRAINT `writtenby_ibfk_2` FOREIGN KEY (`ssn`) REFERENCES `author` (`ssn`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
