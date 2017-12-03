-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2017 at 08:39 PM
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
-- Database: `super_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_Id` varchar(10) NOT NULL,
  `Emp_Name` varchar(30) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `DOB` date NOT NULL,
  `B_Group` varchar(3) NOT NULL,
  `Post` varchar(15) NOT NULL,
  `Adhaar_no` varchar(12) NOT NULL,
  `Phone_no` bigint(10) NOT NULL,
  `Email_Id` varchar(30) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Pin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_Id`, `Emp_Name`, `Gender`, `DOB`, `B_Group`, `Post`, `Adhaar_no`, `Phone_no`, `Email_Id`, `Address`, `Pin`) VALUES
('1', 'Payal', 'Female', '0000-00-00', 'B+', 'CLERK', '2147483647', 2147483647, 'paayalshah93@gmail.com', 'Kumarswamy Layout', 560078),
('2', 'Aditya', 'Male', '1997-09-15', 'B+', 'CLERK', '234567890123', 2147483657, 'adi1997shah@gmail.com', ' Kumarswamy Layout', 560078),
('3', 'Aranyak', 'Male', '1996-10-13', 'O+', 'HELPER', '123456789012', 9876543211, 'rnyk@gmail.com', 'Asansol,West Bengal', 987738),
('4', 'Praveen', 'Male', '1996-07-31', 'B+', 'SECURITY', '867482837572', 8726562372, 'praveen@gmail.com', 'Dhanbad,Jharkhand ', 888888),
('5', 'Dev', 'Male', '1998-01-17', 'B+', 'CLERK', '634342354364', 8756453235, 'dev@gmail.com', 'jaipur,Rajasthan ', 764364);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Mail_id` varchar(30) NOT NULL,
  `Rate` int(1) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Mail_id`, `Rate`, `Description`) VALUES
('akii@gmail.com', 5, 'Awesome...'),
('dev@gmail.com', 5, 'Accha h..'),
('satish@gmail.com', 5, 'Sirf accha nai..bohot accha h...');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `Password`) VALUES
('1', 'praveen'),
('3', 'rnyk'),
('5', 'dev'),
('Aditya', 'Aditya'),
('admin', 'admin'),
('Payal', 'Payal');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `Phno` bigint(10) NOT NULL,
  `Cus_Name` varchar(20) NOT NULL,
  `Email_Id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`Phno`, `Cus_Name`, `Email_Id`) VALUES
(9090909090, 'Ajay', 'ajay@gmail.com'),
(9809809809, 'zee', 'zash@gmail.com'),
(9876598765, 'Abrar', 'abr@gmail.com'),
(9879879879, 'Adarsh', 'adarsh@gmail.com'),
(9898767654, 'Ashish', 'ash@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `replenishment`
--

CREATE TABLE `replenishment` (
  `Request_Id` int(100) NOT NULL,
  `Supplier_ID` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Item_id` int(5) NOT NULL,
  `Qty` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replenishment`
--

INSERT INTO `replenishment` (`Request_Id`, `Supplier_ID`, `Date`, `Type`, `Item_id`, `Qty`) VALUES
(1, 's1', '2017-11-30', 'home_personal_care', 10, 10),
(2, 's2', '2017-11-30', 'dairy', 13, 15),
(3, 's3', '2017-11-30', 'grocery', 14, 15),
(4, 's4', '2017-11-30', 'bed_bath', 17, 20),
(5, 's5', '2017-11-30', 'home_appliances', 19, 10),
(6, 's6', '2017-11-30', 'Crockery', 21, 20);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `Item_id` int(5) NOT NULL,
  `Item_Name` varchar(20) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Quantity` int(4) NOT NULL,
  `Price` float NOT NULL,
  `Supplier_Id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`Item_id`, `Item_Name`, `Type`, `Quantity`, `Price`, `Supplier_Id`) VALUES
(10, 'Fair & Lovely', 'home_personal_care', 20, 50, 's1'),
(11, 'Meglow', 'home_personal_care', 20, 95, 's1'),
(12, 'Milk', 'dairy', 20, 20, 's2'),
(13, 'Paneer', 'dairy', 20, 75, 's2'),
(14, 'Masoor Dal', 'grocery', 15, 90, 's3'),
(15, 'Kabuli Chana', 'grocery', 15, 80, 's3'),
(16, 'Nirma Washing Powder', 'bed_bath', 15, 40, 's4'),
(17, 'Medimix', 'bed_bath', 20, 15, 's4'),
(18, 'TV', 'home_appliances', 20, 30000, 's5'),
(19, 'Microwave', 'home_appliances', 10, 10000, 's5'),
(20, 'Plate', 'Crockery', 20, 20, 's6'),
(21, 'Glass', 'Crockery', 20, 15, 's6');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplier_Id` varchar(20) NOT NULL,
  `Supplier_Name` varchar(30) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Contact_No` bigint(10) NOT NULL,
  `Address` text NOT NULL,
  `pin` int(11) DEFAULT NULL,
  `Mail` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_Id`, `Supplier_Name`, `Type`, `Contact_No`, `Address`, `pin`, `Mail`) VALUES
('s1', 'Adii', 'home personal care', 9898989898, 'K.S. Layout				', 560111, 'adiii@gmail.com'),
('s2', 'Akask', 'dairy', 9879879879, 'K.S. Layout,Bangaluru				', 560111, 'akii@gmail.com'),
('s3', 'Arvind', 'grocery', 9888889888, 'K.S. Layout				', 560111, 'arv@gmail.com'),
('s4', 'Zeeshan', 'bed bath', 9876543210, 'Shanti Nagar				', 560027, 'zee@gmail.com'),
('s5', 'Satish', 'home appliances', 9988776655, 'K.s. Layout				', 560111, 'satish@gmail.com'),
('s6', 'Chetan', 'Crockery', 987654398, 'Chikpete				', 560078, 'chetan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `order_date` date NOT NULL,
  `order_receiver_name` varchar(250) NOT NULL,
  `order_receiver_address` text NOT NULL,
  `order_total_before_tax` decimal(10,2) NOT NULL,
  `order_total_tax1` decimal(10,2) NOT NULL,
  `order_total_tax2` decimal(10,2) NOT NULL,
  `order_total_tax` decimal(10,2) NOT NULL,
  `order_total_after_tax` decimal(10,2) NOT NULL,
  `order_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_no`, `order_date`, `order_receiver_name`, `order_receiver_address`, `order_total_before_tax`, `order_total_tax1`, `order_total_tax2`, `order_total_tax`, `order_total_after_tax`, `order_datetime`) VALUES
(15, '111', '2017-11-30', 'Sunny', 'K.S. Layout', '305.00', '2.00', '2.68', '4.68', '309.68', '2017-11-30 00:00:00'),
(16, '112', '2017-11-30', 'Vishal', 'K.S. Layout', '30270.00', '301.13', '601.30', '902.43', '31172.43', '2017-11-30 00:00:00'),
(17, '113', '2017-12-01', 'Upender', 'Utrahalli', '30240.00', '301.68', '302.00', '603.68', '30843.68', '2017-11-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item`
--

CREATE TABLE `tbl_order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `order_item_quantity` decimal(10,2) NOT NULL,
  `order_item_price` decimal(10,2) NOT NULL,
  `order_item_actual_amount` decimal(10,2) NOT NULL,
  `order_item_tax1_rate` decimal(10,2) NOT NULL,
  `order_item_tax1_amount` decimal(10,2) NOT NULL,
  `order_item_tax2_rate` decimal(10,2) NOT NULL,
  `order_item_tax2_amount` decimal(10,2) NOT NULL,
  `order_item_final_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_item`
--

INSERT INTO `tbl_order_item` (`order_item_id`, `order_id`, `item_name`, `order_item_quantity`, `order_item_price`, `order_item_actual_amount`, `order_item_tax1_rate`, `order_item_tax1_amount`, `order_item_tax2_rate`, `order_item_tax2_amount`, `order_item_final_amount`) VALUES
(29, 15, 'Fair & Lovely', '2.00', '50.00', '100.00', '1.00', '1.00', '1.00', '1.00', '102.00'),
(30, 15, 'Milk', '2.00', '20.00', '40.00', '1.00', '0.40', '1.00', '0.40', '40.80'),
(31, 15, 'Masoor Dal', '1.00', '90.00', '90.00', '0.50', '0.45', '1.00', '0.90', '91.35'),
(32, 15, 'Medimix', '5.00', '15.00', '75.00', '0.20', '0.15', '0.50', '0.38', '75.53'),
(33, 16, 'Meglow', '1.00', '95.00', '95.00', '1.00', '0.95', '1.00', '0.95', '96.90'),
(34, 16, 'Paneer', '1.00', '75.00', '75.00', '0.10', '0.08', '0.20', '0.15', '75.23'),
(35, 16, 'TV', '1.00', '30000.00', '30000.00', '1.00', '300.00', '2.00', '600.00', '30900.00'),
(36, 16, 'Plate', '5.00', '20.00', '100.00', '0.10', '0.10', '0.20', '0.20', '100.30'),
(37, 17, 'TV', '1.00', '30000.00', '30000.00', '1.00', '300.00', '1.00', '300.00', '30600.00'),
(38, 17, 'Kabuli Chana', '2.00', '80.00', '160.00', '1.00', '1.60', '1.00', '1.60', '163.20'),
(39, 17, 'Nirma Washing Powder', '2.00', '40.00', '80.00', '0.10', '0.08', '0.50', '0.40', '80.48');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `query` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Emp_Id`),
  ADD UNIQUE KEY `Email_Id` (`Email_Id`),
  ADD UNIQUE KEY `Phone_no` (`Phone_no`),
  ADD UNIQUE KEY `Adhaar_no` (`Adhaar_no`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Mail_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Phno`),
  ADD UNIQUE KEY `Email_Id` (`Email_Id`);

--
-- Indexes for table `replenishment`
--
ALTER TABLE `replenishment`
  ADD PRIMARY KEY (`Request_Id`),
  ADD UNIQUE KEY `Supplier_ID_2` (`Supplier_ID`),
  ADD KEY `Supplier_ID` (`Supplier_ID`),
  ADD KEY `Item_id` (`Item_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`Item_id`),
  ADD KEY `Supplier_Id` (`Supplier_Id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplier_Id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `replenishment`
--
ALTER TABLE `replenishment`
  MODIFY `Request_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `Item_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `replenishment`
--
ALTER TABLE `replenishment`
  ADD CONSTRAINT `Rep_stk` FOREIGN KEY (`Item_id`) REFERENCES `stock` (`Item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `replenishment_ibfk_1` FOREIGN KEY (`Supplier_ID`) REFERENCES `supplier` (`Supplier_Id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`Supplier_Id`) REFERENCES `supplier` (`Supplier_Id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD CONSTRAINT `tbl_order_item_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
