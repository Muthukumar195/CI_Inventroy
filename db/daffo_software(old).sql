-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2017 at 09:16 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `daffo_software`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_id` int(11) NOT NULL,
  `Admin_fullname` varchar(450) NOT NULL,
  `Admin_email` text NOT NULL,
  `Admin_phone` varchar(25) NOT NULL,
  `Admin_username` varchar(120) NOT NULL,
  `Admin_password` varchar(60) NOT NULL,
  `Admin_profile` text NOT NULL,
  `Admin_type` enum('A','E','M','I','AC') NOT NULL COMMENT 'A=Admin, E=Employee, M=Manager, I=Incharge, AC=Accountant',
  `Admin_user_rights` int(11) NOT NULL COMMENT 'reference id of user rights table',
  `Admin_created_dt_tme` datetime NOT NULL,
  `Admin_status` enum('A','D') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `Admin_fullname`, `Admin_email`, `Admin_phone`, `Admin_username`, `Admin_password`, `Admin_profile`, `Admin_type`, `Admin_user_rights`, `Admin_created_dt_tme`, `Admin_status`) VALUES
(1, 'Administrator', 'info@criticeye.com', '9897987322', 'admin', 'admin', 'profile_pic1.jpg', 'A', 7, '2016-06-28 17:00:12', 'A'),
(8, 'Muthu kumar', 'venommuthu@gmail.com', '9585561635', 'muthu', 'muthu', 'profile_pic8.jpg', 'A', 2, '2016-08-22 18:03:44', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_rights_details`
--

CREATE TABLE IF NOT EXISTS `admin_user_rights_details` (
  `User_rights_id` int(11) NOT NULL,
  `User_rights_name` varchar(220) NOT NULL,
  `User_rights_type_value` text NOT NULL,
  `User_rights_created_dt_time` datetime NOT NULL,
  `User_rights_status` enum('A','D') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_user_rights_details`
--

INSERT INTO `admin_user_rights_details` (`User_rights_id`, `User_rights_name`, `User_rights_type_value`, `User_rights_created_dt_time`, `User_rights_status`) VALUES
(1, 'Suresh', 'Student,User Rights', '2016-08-08 14:09:31', 'A'),
(2, 'Emplopyee', 'Student,User Rights', '2016-08-08 14:06:23', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE IF NOT EXISTS `customer_details` (
  `Customer_id` int(11) NOT NULL,
  `Customer_name` varchar(120) NOT NULL,
  `Customer_type` varchar(25) NOT NULL,
  `Customer_comp` varchar(100) NOT NULL,
  `Customer_address` text NOT NULL,
  `Customer_phone` varchar(120) NOT NULL,
  `Customer_email` varchar(120) NOT NULL,
  `Customer_city` varchar(120) NOT NULL,
  `Customer_pincode` int(11) NOT NULL,
  `Customer_state` varchar(120) NOT NULL,
  `Customer_country` varchar(120) NOT NULL,
  `Customer_status` enum('A','D') NOT NULL,
  `Customer_create_dt_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`Customer_id`, `Customer_name`, `Customer_type`, `Customer_comp`, `Customer_address`, `Customer_phone`, `Customer_email`, `Customer_city`, `Customer_pincode`, `Customer_state`, `Customer_country`, `Customer_status`, `Customer_create_dt_time`) VALUES
(1, 'karthick', 'Retailer', 'daffo', 'cbe', '6633225588', 'karthickvcy7@gmail.com', 'cbe', 0, 'tn', 'india', 'A', '2017-03-21 18:42:30'),
(2, 'muthu', 'Customer', 'daffo', 'cbe', '6633225588', 'karthickvcy7@gmail.com', 'coimbatore', 0, 'nad', 'india', 'A', '2017-03-21 18:42:30'),
(3, 'ram', 'Wholesaler', 'daffo', 'cbe', '6633225588', 'karthickvcy7@gmail.com', 'coimbatore', 0, 'tn', 'india', 'A', '2017-03-21 18:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `employee_bank_details`
--

CREATE TABLE IF NOT EXISTS `employee_bank_details` (
  `Employee_bank_id` int(11) NOT NULL,
  `Employee_bank_department_id` int(11) NOT NULL,
  `Employee_bank_designation_id` int(11) NOT NULL,
  `Employee_bank_emp_id` int(11) NOT NULL,
  `Employee_bank_name` varchar(50) NOT NULL,
  `Employee_bank_branch` varchar(25) NOT NULL,
  `Employee_bank_address` text NOT NULL,
  `Employee_bank_phone` varchar(12) NOT NULL,
  `Employee_bank_ifsc` varchar(15) NOT NULL,
  `Employee_bank_ac_no` int(11) NOT NULL,
  `Employee_bank_dd_pay_address` text NOT NULL,
  `Employee_bank_create_dt_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_department_details`
--

CREATE TABLE IF NOT EXISTS `employee_department_details` (
  `Employee_department_id` int(11) NOT NULL,
  `Employee_department_name` text NOT NULL,
  `Employee_department_created_dt_time` datetime NOT NULL,
  `Employee_department_status` enum('A','D') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_department_details`
--

INSERT INTO `employee_department_details` (`Employee_department_id`, `Employee_department_name`, `Employee_department_created_dt_time`, `Employee_department_status`) VALUES
(1, 'Staffs', '2016-05-13 00:00:00', 'A'),
(2, 'Test department', '2016-05-19 17:33:47', 'A'),
(3, 'staff 3', '2016-07-27 13:36:28', 'A'),
(4, 'demasprfdgsfg', '2016-08-23 12:47:48', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `employee_designation_details`
--

CREATE TABLE IF NOT EXISTS `employee_designation_details` (
  `Employee_designation_id` int(11) NOT NULL,
  `Employee_designation_name` text NOT NULL,
  `Employee_designation_created_dt_time` datetime NOT NULL,
  `Employee_designation_status` enum('A','D') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_designation_details`
--

INSERT INTO `employee_designation_details` (`Employee_designation_id`, `Employee_designation_name`, `Employee_designation_created_dt_time`, `Employee_designation_status`) VALUES
(2, 'Maths', '2016-08-26 12:21:53', 'A'),
(3, 'English', '2016-08-26 12:22:00', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE IF NOT EXISTS `employee_details` (
  `Employee_id` int(11) NOT NULL,
  `Employee_code` varchar(120) NOT NULL,
  `Employee_joining_date` date NOT NULL,
  `Employee_department_id` int(11) NOT NULL COMMENT 'refered by department table id',
  `Employee_designation_id` int(11) NOT NULL COMMENT 'refered by designation table id',
  `Employee_qualification` varchar(120) NOT NULL,
  `Employee_total_experiences` varchar(120) NOT NULL,
  `Employee_experiences_details` text NOT NULL,
  `Employee_first_name` varchar(120) NOT NULL,
  `Employee_middle_name` varchar(120) NOT NULL,
  `Employee_last_name` varchar(120) NOT NULL,
  `Employee_dob` date NOT NULL,
  `Employee_gender` varchar(50) NOT NULL,
  `Employee_father_name` varchar(120) NOT NULL,
  `Employee_mother_name` varchar(120) NOT NULL,
  `Employee_marital_status` enum('S','M','D') NOT NULL COMMENT 's= single, m=married,D= divorse',
  `Employee_photo` varchar(120) NOT NULL,
  `Employee_persent_address` text NOT NULL,
  `Employee_premanent_address` text NOT NULL,
  `Employee_city` varchar(120) NOT NULL,
  `Employee_pin` varchar(120) NOT NULL,
  `Employee_country` varchar(120) NOT NULL,
  `Employee_state` varchar(120) NOT NULL,
  `Employee_mobile` varchar(20) NOT NULL,
  `Employee_email` varchar(120) NOT NULL,
  `Employee_status` enum('A','D') NOT NULL,
  `Employee_create_dt_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`Employee_id`, `Employee_code`, `Employee_joining_date`, `Employee_department_id`, `Employee_designation_id`, `Employee_qualification`, `Employee_total_experiences`, `Employee_experiences_details`, `Employee_first_name`, `Employee_middle_name`, `Employee_last_name`, `Employee_dob`, `Employee_gender`, `Employee_father_name`, `Employee_mother_name`, `Employee_marital_status`, `Employee_photo`, `Employee_persent_address`, `Employee_premanent_address`, `Employee_city`, `Employee_pin`, `Employee_country`, `Employee_state`, `Employee_mobile`, `Employee_email`, `Employee_status`, `Employee_create_dt_time`) VALUES
(1, 'EM1', '2016-08-26', 2, 2, 'm.phil', '2years', 'Experiences Details :', 'Muthu', 'Kumar', 'K', '1995-05-29', 'Male', 'AKS', 'Gnana Selvi', 'S', 'employee_pic1.jpg', '14 lic colony', '14 Lic Colony', 'Coimbatore', '632013', 'India', 'Tamil nadu', '08675752575', 'venommuthu@gmail.com', 'D', '2016-08-26 14:14:08'),
(3, '302', '2016-08-01', 2, 2, 'bcom', '5', 'dgdfjgdfgdfg', 'th', 'mo', 'hy', '2016-08-31', 'Male', 'thirumoorthy', 'athilaksmi', 'S', 'employee_pic3.jpg', 'sdfsdf', 'erw', 'covai', '25', 'India', 'Tamil Nadu', '22222222222', 'cxvxcfxc', 'A', '2016-09-30 15:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `Product_id` int(11) NOT NULL,
  `Product_name` varchar(100) NOT NULL,
  `Product_comp` varchar(100) NOT NULL,
  `Product_vat` int(11) NOT NULL,
  `Product_desc` text NOT NULL,
  `Product_prize` int(11) NOT NULL,
  `Product_sales` int(11) NOT NULL,
  `Product_status` enum('A','D') NOT NULL,
  `Product_create_dt` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_id`, `Product_name`, `Product_comp`, `Product_vat`, `Product_desc`, `Product_prize`, `Product_sales`, `Product_status`, `Product_create_dt`) VALUES
(1, 'lumia 525', 'nokia', 500, 'hhhhhh', 5000, 6000, 'A', '2017-03-01 13:45:05'),
(2, 'iphoe', 'apple', 20, 'sdfsdf', 2000, 5000, 'A', '2017-03-17 16:46:58'),
(3, 'iphone7', 'Daffodills', 20, 'sdfsg', 2500, 5050, 'A', '2017-03-02 17:17:12'),
(4, 'HTC desire', 'HTC', 10, 'kkk', 6000, 7000, 'A', '2017-03-02 17:18:50'),
(5, 'fly', 'relience', 50, 'jio 4G', 2000, 2500, 'A', '2017-03-17 16:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_stock`
--

CREATE TABLE IF NOT EXISTS `product_stock` (
  `Prd_stock_id` int(11) NOT NULL,
  `Prd_stock_prd_id` int(11) NOT NULL,
  `Prd_stock_qty` int(11) NOT NULL,
  `Prd_stock_create_dt` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_stock`
--

INSERT INTO `product_stock` (`Prd_stock_id`, `Prd_stock_prd_id`, `Prd_stock_qty`, `Prd_stock_create_dt`) VALUES
(1, 4, 6, '2017-03-21 18:42:30'),
(2, 3, 14, '2017-03-21 18:41:20'),
(3, 2, 20, '2017-03-21 18:41:20'),
(4, 5, 11, '2017-03-21 18:42:30'),
(5, 1, 4, '2017-03-20 17:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `purcahse_order`
--

CREATE TABLE IF NOT EXISTS `purcahse_order` (
  `Purchase_order_id` int(11) NOT NULL,
  `Purchase_order_pur_id` int(11) NOT NULL COMMENT 'purchase table id',
  `Purchase_order_pro` int(11) NOT NULL,
  `Purchase_prd_qty` int(11) NOT NULL,
  `Purchase_prd_rate` int(11) NOT NULL,
  `Purchase_prd_amount` int(11) NOT NULL,
  `Purchase_prd_desc` text NOT NULL,
  `Purchase_prd_create_dt` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purcahse_order`
--

INSERT INTO `purcahse_order` (`Purchase_order_id`, `Purchase_order_pur_id`, `Purchase_order_pro`, `Purchase_prd_qty`, `Purchase_prd_rate`, `Purchase_prd_amount`, `Purchase_prd_desc`, `Purchase_prd_create_dt`) VALUES
(1, 1, 1, 2, 5000, 10000, '2 peace', '2017-03-17 17:00:37'),
(4, 3, 3, 7, 2500, 17500, 'iphone boy 7', '2017-03-17 17:11:06'),
(5, 3, 2, 4, 2000, 8000, '4', '2017-03-17 17:11:06'),
(8, 5, 2, 1, 2000, 2000, '', '2017-03-20 17:33:59'),
(9, 6, 5, 2, 2000, 4000, '', '2017-03-20 17:34:22'),
(10, 7, 3, 2, 2500, 5000, '', '2017-03-20 17:34:55'),
(11, 8, 1, 2, 5000, 10000, '', '2017-03-20 17:35:20'),
(12, 9, 2, 3, 2000, 6000, '', '2017-03-20 17:35:41'),
(13, 1, 2, 2, 2000, 4000, '', '2017-03-21 18:41:20'),
(14, 1, 3, 2, 2500, 5000, '', '2017-03-21 18:41:20'),
(15, 2, 5, 5, 2000, 10000, '', '2017-03-21 18:42:30'),
(16, 2, 4, 1, 6000, 6000, '', '2017-03-21 18:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `Purchase_id` int(11) NOT NULL,
  `Purchase_cus_id` int(11) NOT NULL,
  `Purchase_cus_type` varchar(50) NOT NULL,
  `Purchase_invoice_no` int(11) NOT NULL,
  `Purchase_paid` int(11) NOT NULL,
  `Purchase_advance` int(11) NOT NULL,
  `Purchase_balance` int(11) NOT NULL,
  `Purchase_total` int(11) NOT NULL,
  `Purchase_desc` text NOT NULL,
  `Purchase_dis_amt` int(11) NOT NULL,
  `Purchase_dis_type` varchar(20) DEFAULT NULL,
  `Purchase_tax_id` int(11) NOT NULL,
  `Purchase_tax_type` varchar(15) NOT NULL,
  `Purchase_tax_amount` int(11) NOT NULL,
  `Purchase_date` date NOT NULL,
  `Purchase_pay_status` enum('U','PP','P') NOT NULL,
  `Purchase_create_dt` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`Purchase_id`, `Purchase_cus_id`, `Purchase_cus_type`, `Purchase_invoice_no`, `Purchase_paid`, `Purchase_advance`, `Purchase_balance`, `Purchase_total`, `Purchase_desc`, `Purchase_dis_amt`, `Purchase_dis_type`, `Purchase_tax_id`, `Purchase_tax_type`, `Purchase_tax_amount`, `Purchase_date`, `Purchase_pay_status`, `Purchase_create_dt`) VALUES
(1, 2, 'Customer', 111, 10300, 300, 0, 10300, 'kkk', 500, 'Fixed', 5, 'Persentage', 20, '2017-03-21', 'P', '2017-03-21 18:41:20'),
(2, 2, 'Customer', 112, 1445, 445, 13000, 14445, 'he', 10, 'Persentage', 11, 'Fixed', 50, '2017-03-21', 'PP', '2017-03-21 18:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_payment`
--

CREATE TABLE IF NOT EXISTS `purchase_payment` (
  `Pur_payment_id` int(11) NOT NULL,
  `Pur_payment_cust_id` int(11) NOT NULL COMMENT 'customer id',
  `Pur_payment_purchase_id` text NOT NULL COMMENT 'purchase id ',
  `Pur_payment_date` date NOT NULL,
  `Pur_payment_amount` int(11) NOT NULL,
  `Pur_payment_desc` text NOT NULL,
  `Pur_payment_method` varchar(25) NOT NULL,
  `Pur_payment_ref` varchar(25) NOT NULL,
  `Pur_payment_create_dt` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_payment`
--

INSERT INTO `purchase_payment` (`Pur_payment_id`, `Pur_payment_cust_id`, `Pur_payment_purchase_id`, `Pur_payment_date`, `Pur_payment_amount`, `Pur_payment_desc`, `Pur_payment_method`, `Pur_payment_ref`, `Pur_payment_create_dt`) VALUES
(1, 2, '1', '2017-03-21', 1000, 'hhh', 'Cash', '111', '2017-03-21 18:43:52'),
(2, 2, '2', '2017-03-21', 2000, 'hh', 'Cash', '001', '2017-03-21 18:44:42'),
(3, 2, '2', '2017-03-21', 8000, 'dddd', 'Cash', '110', '2017-03-21 18:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `Sales_id` int(11) NOT NULL,
  `Sales_cus_id` int(11) NOT NULL COMMENT 'customer table id',
  `Sales_cus_type` varchar(50) NOT NULL COMMENT 'customer type',
  `Sales_invoice_no` int(11) NOT NULL,
  `Sales_paid` int(11) NOT NULL,
  `Sales_advance` int(11) NOT NULL,
  `Sales_balance` int(11) NOT NULL,
  `Sales_total` int(11) NOT NULL,
  `Sales_desc` text NOT NULL,
  `Sales_dis_amt` int(11) NOT NULL,
  `Sales_dis_type` varchar(50) NOT NULL,
  `Sales_tax_id` int(11) NOT NULL COMMENT 'tax table tax id',
  `Sales_tax_type` varchar(50) NOT NULL,
  `Sales_tax_amount` int(11) NOT NULL,
  `Sales_date` date NOT NULL,
  `Sales_pay_status` enum('U','PP','P') NOT NULL,
  `Sales_create_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE IF NOT EXISTS `sales_order` (
  `Sales_order_id` int(11) NOT NULL,
  `Sales_order_sal_id` int(11) NOT NULL COMMENT 'sales table id',
  `Sales_order_pro` int(11) NOT NULL COMMENT 'product table id',
  `Sales_order_qty` int(11) NOT NULL,
  `Sales_order_rate` int(11) NOT NULL,
  `Sales_order_amount` int(11) NOT NULL,
  `Sales_order_desc` text NOT NULL,
  `Sales_order_create_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_payment`
--

CREATE TABLE IF NOT EXISTS `sales_payment` (
  `Sales_payment_id` int(11) NOT NULL,
  `Sales_payment_cust_id` int(11) NOT NULL COMMENT 'customer table id',
  `Sales_payment_sales_id` int(11) NOT NULL COMMENT 'SAles table id',
  `Sales_payment_date` date NOT NULL,
  `Sales_payment_amount` int(11) NOT NULL,
  `Sales_payment_desc` text NOT NULL,
  `Sales_payment_method` varchar(50) NOT NULL,
  `Sales_payment_ref` text NOT NULL,
  `Sales_payment_create_dt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tax_details`
--

CREATE TABLE IF NOT EXISTS `tax_details` (
  `Tax_id` int(11) NOT NULL,
  `Tax_type` enum('Fixed','Persentage') NOT NULL,
  `Tax_name` varchar(100) NOT NULL,
  `Tax_amount` int(11) NOT NULL,
  `Tax_status` enum('A','D') NOT NULL,
  `Tax_create_dt` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax_details`
--

INSERT INTO `tax_details` (`Tax_id`, `Tax_type`, `Tax_name`, `Tax_amount`, `Tax_status`, `Tax_create_dt`) VALUES
(1, 'Fixed', 'services tax', 500, 'A', '2017-03-02 18:24:18'),
(5, 'Persentage', 'low', 20, 'A', '2017-03-13 17:02:32'),
(6, 'Fixed', 'test', 200, 'D', '2017-03-13 12:38:16'),
(7, 'Fixed', 'test', 200, 'A', '2017-03-13 12:41:03'),
(8, 'Persentage', 'fdd', 0, 'D', '2017-03-13 12:41:17'),
(9, 'Persentage', 'fdd', 0, 'D', '2017-03-13 13:05:07'),
(10, 'Persentage', 'sample', 200, 'A', '2017-03-13 16:46:13'),
(11, 'Fixed', 'cart', 50, 'A', '2017-03-13 13:09:23'),
(12, 'Fixed', 'karthi', 888, 'D', '2017-03-13 13:13:23'),
(13, 'Fixed', 'sample', 90, 'D', '2017-03-13 13:14:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `admin_user_rights_details`
--
ALTER TABLE `admin_user_rights_details`
  ADD PRIMARY KEY (`User_rights_id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `employee_bank_details`
--
ALTER TABLE `employee_bank_details`
  ADD PRIMARY KEY (`Employee_bank_id`);

--
-- Indexes for table `employee_department_details`
--
ALTER TABLE `employee_department_details`
  ADD PRIMARY KEY (`Employee_department_id`);

--
-- Indexes for table `employee_designation_details`
--
ALTER TABLE `employee_designation_details`
  ADD PRIMARY KEY (`Employee_designation_id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`Employee_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_id`);

--
-- Indexes for table `product_stock`
--
ALTER TABLE `product_stock`
  ADD PRIMARY KEY (`Prd_stock_id`);

--
-- Indexes for table `purcahse_order`
--
ALTER TABLE `purcahse_order`
  ADD PRIMARY KEY (`Purchase_order_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`Purchase_id`);

--
-- Indexes for table `purchase_payment`
--
ALTER TABLE `purchase_payment`
  ADD PRIMARY KEY (`Pur_payment_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`Sales_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`Sales_order_id`);

--
-- Indexes for table `sales_payment`
--
ALTER TABLE `sales_payment`
  ADD PRIMARY KEY (`Sales_payment_id`);

--
-- Indexes for table `tax_details`
--
ALTER TABLE `tax_details`
  ADD PRIMARY KEY (`Tax_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `admin_user_rights_details`
--
ALTER TABLE `admin_user_rights_details`
  MODIFY `User_rights_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `Customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee_bank_details`
--
ALTER TABLE `employee_bank_details`
  MODIFY `Employee_bank_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee_department_details`
--
ALTER TABLE `employee_department_details`
  MODIFY `Employee_department_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employee_designation_details`
--
ALTER TABLE `employee_designation_details`
  MODIFY `Employee_designation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `Employee_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product_stock`
--
ALTER TABLE `product_stock`
  MODIFY `Prd_stock_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `purcahse_order`
--
ALTER TABLE `purcahse_order`
  MODIFY `Purchase_order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `Purchase_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `purchase_payment`
--
ALTER TABLE `purchase_payment`
  MODIFY `Pur_payment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `Sales_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `Sales_order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales_payment`
--
ALTER TABLE `sales_payment`
  MODIFY `Sales_payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tax_details`
--
ALTER TABLE `tax_details`
  MODIFY `Tax_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
