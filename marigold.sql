-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2025 at 01:28 PM
-- Server version: 5.7.44
-- PHP Version: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dasouqu1_marigold`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `AdminID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `DepartmentNo` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`AdminID`, `Email`, `Password`, `DepartmentNo`) VALUES
(1, 'admin1@mail.com', 'adminpass1', 101),
(2, 'admin2@mail.com', 'adminpass2', 102),
(3, 'admin3@mail.com', 'adminpass3', 103);

-- --------------------------------------------------------

--
-- Table structure for table `DepartmentLocations`
--

CREATE TABLE `DepartmentLocations` (
  `DepartmentNo` int(11) NOT NULL,
  `DepartmentLocation` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Departments`
--

CREATE TABLE `Departments` (
  `DepartmentNumber` int(11) NOT NULL,
  `DepartmentName` varchar(100) DEFAULT NULL,
  `AdminID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Departments`
--

INSERT INTO `Departments` (`DepartmentNumber`, `DepartmentName`, `AdminID`) VALUES
(101, 'Product Management', 1),
(102, 'Sales & Marketing', 2),
(103, 'Human Resources', 3),
(104, 'Customer Support', 1),
(105, 'IT and Web Team', 2);

-- --------------------------------------------------------

--
-- Table structure for table `HR`
--

CREATE TABLE `HR` (
  `EmployeeID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `HireDate` date DEFAULT NULL,
  `Salary` decimal(10,2) DEFAULT NULL,
  `DepartmentNo` int(11) DEFAULT NULL,
  `AdminID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `MultiplePayments`
--

CREATE TABLE `MultiplePayments` (
  `PayID` int(11) NOT NULL,
  `PayMethod` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `OrderDetails`
--

CREATE TABLE `OrderDetails` (
  `OrderDetailID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `OrderConfirmationID` varchar(100) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `AdminID` int(11) DEFAULT NULL,
  `OrderDate` date DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Payments`
--

CREATE TABLE `Payments` (
  `PaymentID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `PaymentDate` date DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `PaymentMethod` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Description` text,
  `Price` decimal(10,2) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `AdminID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`ProductID`, `Name`, `Description`, `Price`, `Category`, `Image`, `AdminID`) VALUES
(1, 'Marigold Plushie', 'Soft and cuddly marigold-themed plush toy.', 14.99, 'Toy', 'product1.jpg', 1),
(2, 'Marigold Puzzle', 'Challenging jigsaw puzzle of marigolds.', 12.50, 'Puzzle', 'product2.jpg', 2),
(3, 'Marigold Pinwheel', 'Colorful spinning pinwheel with marigold design.', 8.25, 'Pinwheel', 'product3.jpg', 1),
(4, 'Marigold Beachball', 'Inflatable beachball with marigold prints.', 10.99, 'Ball', 'product4.jpg', 3),
(5, 'Lego Marigold', 'Creative Lego set with marigold theme.', 19.99, 'Toy', 'product5.jpg', 2),
(6, 'Marigold Tote Bag', 'Eco-friendly tote bag with floral art.', 11.75, 'Bag', 'product6.jpg', 1),
(7, 'Marigold Hand Fan', 'Handheld fan with bright marigold pattern.', 6.50, 'Fan', 'product7.jpg', 3),
(8, 'Marigold Playdough Cutout', 'Fun marigold cutouts for playdough shapes.', 7.30, 'Cutout', 'product8.jpg', 2),
(9, 'Marigold Puzzle', 'Challenging jigsaw puzzle of marigolds.', 13.45, 'Puzzle', 'product9.jpg', 2),
(10, 'Marigold Plushie', 'Soft and cuddly marigold-themed plush toy.', 15.25, 'Toy', 'product10.jpg', 1),
(11, 'Lego Marigold', 'Creative Lego set with marigold theme.', 20.00, 'Toy', 'product11.jpg', 3),
(12, 'Marigold Hand Fan', 'Handheld fan with bright marigold pattern.', 5.99, 'Fan', 'product12.jpg', 1),
(13, 'Marigold Tote Bag', 'Eco-friendly tote bag with floral art.', 13.10, 'Bag', 'product13.jpg', 2),
(14, 'Marigold Beachball', 'Inflatable beachball with marigold prints.', 9.75, 'Ball', 'product14.jpg', 3),
(15, 'Marigold Playdough Cutout', 'Fun marigold cutouts for playdough shapes.', 6.90, 'Cutout', 'product15.jpg', 1),
(16, 'Marigold Pinwheel', 'Colorful spinning pinwheel with marigold design.', 8.99, 'Pinwheel', 'product16.jpg', 2),
(17, 'Marigold Puzzle', 'Challenging jigsaw puzzle of marigolds.', 11.60, 'Puzzle', 'product17.jpg', 3),
(18, 'Marigold Plushie', 'Soft and cuddly marigold-themed plush toy.', 16.80, 'Toy', 'product18.jpg', 1),
(19, 'Lego Marigold', 'Creative Lego set with marigold theme.', 21.49, 'Toy', 'product19.jpg', 2),
(20, 'Marigold Tote Bag', 'Eco-friendly tote bag with floral art.', 12.25, 'Bag', 'product20.jpg', 3),
(21, 'Marigold Hand Fan', 'Handheld fan with bright marigold pattern.', 7.15, 'Fan', 'product21.jpg', 1),
(22, 'Marigold Beachball', 'Inflatable beachball with marigold prints.', 10.40, 'Ball', 'product22.jpg', 2),
(23, 'Marigold Playdough Cutout', 'Fun marigold cutouts for playdough shapes.', 6.75, 'Cutout', 'product23.jpg', 3),
(24, 'Marigold Pinwheel', 'Colorful spinning pinwheel with marigold design.', 9.30, 'Pinwheel', 'product24.jpg', 1),
(25, 'Marigold Puzzle', 'Challenging jigsaw puzzle of marigolds.', 13.85, 'Puzzle', 'product25.jpg', 2),
(26, 'Lego Marigold', 'Creative Lego set with marigold theme.', 18.00, 'Toy', 'product26.jpg', 3),
(27, 'Marigold Plushie', 'Soft and cuddly marigold-themed plush toy.', 17.90, 'Toy', 'product27.jpg', 2),
(28, 'Marigold Hand Fan', 'Handheld fan with bright marigold pattern.', 6.35, 'Fan', 'product28.jpg', 1),
(29, 'Marigold Tote Bag', 'Eco-friendly tote bag with floral art.', 12.80, 'Bag', 'product29.jpg', 3),
(30, 'Marigold Beachball', 'Inflatable beachball with marigold prints.', 10.99, 'Ball', 'product30.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `StockUpdates`
--

CREATE TABLE `StockUpdates` (
  `StockUpdateID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `UpdateDate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `StockUpdates`
--

INSERT INTO `StockUpdates` (`StockUpdateID`, `ProductID`, `Quantity`, `UpdateDate`) VALUES
(1, 1, 21, '2025-04-02'),
(2, 2, 37, '2025-04-03'),
(3, 3, 51, '2025-04-04'),
(4, 4, 40, '2025-04-05'),
(5, 5, 35, '2025-04-01'),
(6, 6, 20, '2025-04-02'),
(7, 7, 51, '2025-04-03'),
(8, 8, 39, '2025-04-04'),
(9, 9, 56, '2025-04-05'),
(10, 10, 74, '2025-04-01'),
(11, 11, 23, '2025-04-02'),
(12, 12, 73, '2025-04-03'),
(13, 13, 72, '2025-04-04'),
(14, 14, 24, '2025-04-05'),
(15, 15, 37, '2025-04-01'),
(16, 16, 72, '2025-04-02'),
(17, 17, 45, '2025-04-03'),
(18, 18, 78, '2025-04-04'),
(19, 19, 77, '2025-04-05'),
(20, 20, 82, '2025-04-01'),
(21, 21, 72, '2025-04-02'),
(22, 22, 46, '2025-04-03'),
(23, 23, 56, '2025-04-04'),
(24, 24, 18, '2025-04-05'),
(25, 25, 80, '2025-04-01'),
(26, 26, 99, '2025-04-02'),
(27, 27, 58, '2025-04-03'),
(28, 28, 62, '2025-04-04'),
(29, 29, 20, '2025-04-05'),
(30, 30, 88, '2025-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Role` varchar(20) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`AdminID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `DepartmentLocations`
--
ALTER TABLE `DepartmentLocations`
  ADD PRIMARY KEY (`DepartmentNo`);

--
-- Indexes for table `Departments`
--
ALTER TABLE `Departments`
  ADD PRIMARY KEY (`DepartmentNumber`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `HR`
--
ALTER TABLE `HR`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `MultiplePayments`
--
ALTER TABLE `MultiplePayments`
  ADD PRIMARY KEY (`PayID`);

--
-- Indexes for table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  ADD PRIMARY KEY (`OrderDetailID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `Payments`
--
ALTER TABLE `Payments`
  ADD PRIMARY KEY (`PaymentID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `AdminID` (`AdminID`);

--
-- Indexes for table `StockUpdates`
--
ALTER TABLE `StockUpdates`
  ADD PRIMARY KEY (`StockUpdateID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `HR`
--
ALTER TABLE `HR`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `OrderDetails`
--
ALTER TABLE `OrderDetails`
  MODIFY `OrderDetailID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Payments`
--
ALTER TABLE `Payments`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `StockUpdates`
--
ALTER TABLE `StockUpdates`
  MODIFY `StockUpdateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
