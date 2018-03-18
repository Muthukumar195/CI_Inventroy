-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2017 at 12:45 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`Customer_id`, `Customer_name`, `Customer_type`, `Customer_comp`, `Customer_address`, `Customer_phone`, `Customer_email`, `Customer_city`, `Customer_pincode`, `Customer_state`, `Customer_country`, `Customer_status`, `Customer_create_dt_time`) VALUES
(1, 'karthick', 'Retailer', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'cbe', 0, 'tn', 'india', 'A', '2017-05-10 18:02:22'),
(2, 'muthu', 'Customer', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'coimbatore', 0, 'nad', 'india', 'A', '2017-05-10 18:02:22'),
(3, 'ram', 'Wholesaler', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'coimbatore', 0, 'tn', 'india', 'A', '2017-05-10 18:02:22'),
(4, 'john', 'Retailer', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'coimbatore', 0, 'tamil nadu', 'India', 'A', '2017-05-10 18:02:22'),
(5, 'mani', 'Retailer', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'coimbatore', 0, 'Tamil N?du', 'India', 'A', '2017-05-10 18:02:22'),
(6, 'siva', 'Retailer', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'coimbatore', 0, 'Tamil N?du', 'India', 'A', '2017-05-10 18:02:22'),
(7, 'naveen', 'Retailer', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'coimbatore', 0, 'Tamil N?du', 'India', 'A', '2017-05-10 18:02:22'),
(8, 'vasu', 'Retailer', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'coimbatore', 0, 'Tamil N?du', 'India', 'A', '2017-05-10 18:02:22'),
(9, 'samuvel', 'Retailer', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'coimbatore', 0, 'Tamil N?du', 'India', 'A', '2017-05-10 18:02:22'),
(10, 'suman', 'Customer', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'coimbatore', 0, 'Tamil N?du', 'India', 'A', '2017-05-10 18:02:22'),
(11, 'karthi', 'Customer', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'coimbatore', 0, 'Tamil N?du', 'India', 'A', '2017-05-10 18:02:22'),
(12, 'surya', 'Customer', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'coimbatore', 0, 'Tamil N?du', 'India', 'A', '2017-05-10 18:02:22'),
(13, 'thuyamani', 'Customer', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'coimbatore', 0, 'Tamil N?du', 'India', 'A', '2017-05-10 18:02:22'),
(14, 'senthil', 'Wholesaler', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'coimbatore', 0, 'Tamil N?du', 'India', 'A', '2017-05-10 18:02:22'),
(15, 'sathish', 'Wholesaler', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'coimbatore', 0, 'Tamil N?du', 'India', 'A', '2017-05-10 18:02:22'),
(16, 'babu', 'Wholesaler', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'coimbatore', 0, 'Tamil N?du', 'India', 'A', '2017-05-10 18:02:22'),
(17, 'manivasu', 'Wholesaler', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'salem', 0, 'Tamil N?du', 'India', 'A', '2017-05-10 18:02:22'),
(18, 'hari', 'Wholesaler', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'kovai', 0, 'Tamil N?du', 'India', 'A', '2017-05-10 18:02:22'),
(19, 'kumar', 'Customer', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'coimbatore', 0, 'Tamil N?du', 'India', 'A', '2017-05-10 18:02:22'),
(20, 'kumar st', 'Retailer', 'kumar st', 'ganapathi', '9790600455', 'kumar@gmail.com', 'coimbatpre', 0, 'tamil nadu', 'india', 'A', '2017-05-10 18:02:22');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_bank_details`
--

INSERT INTO `employee_bank_details` (`Employee_bank_id`, `Employee_bank_department_id`, `Employee_bank_designation_id`, `Employee_bank_emp_id`, `Employee_bank_name`, `Employee_bank_branch`, `Employee_bank_address`, `Employee_bank_phone`, `Employee_bank_ifsc`, `Employee_bank_ac_no`, `Employee_bank_dd_pay_address`, `Employee_bank_create_dt_time`) VALUES
(1, 2, 2, 1, 'Indian Overseas Bank', 'Edayrpalayam', 'Edayrpalayam', '8675752575', 'IOB21124', 2147483647, 'Edayrpalayam', '2017-03-22 14:10:03');

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
-- Table structure for table `employee_salary`
--

CREATE TABLE IF NOT EXISTS `employee_salary` (
  `Emp_salary_id` int(11) NOT NULL,
  `Emp_salary_emp_id` int(11) NOT NULL,
  `Emp_basic_salary` int(11) NOT NULL,
  `Emp_loan_amt` int(11) NOT NULL,
  `Emp_loan_months` int(11) NOT NULL,
  `Emp_loan_paid` int(11) NOT NULL,
  `Emp_loan_balance` int(11) NOT NULL,
  `Emp_salary_pf` int(11) NOT NULL,
  `Emp_salary_hra` int(11) NOT NULL,
  `Emp_net_salary` int(11) NOT NULL,
  `Emp_salary_date` date NOT NULL,
  `Emp_salary_status` enum('A','B') NOT NULL COMMENT 'Approve , Block',
  `Emp_salary_create_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expences_master`
--

CREATE TABLE IF NOT EXISTS `expences_master` (
  `Exp_mas_id` int(11) NOT NULL,
  `Exp_mas_name` varchar(120) NOT NULL,
  `Exp_mas_status` enum('A','D') NOT NULL,
  `Exp_mas_create_dt` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expences_master`
--

INSERT INTO `expences_master` (`Exp_mas_id`, `Exp_mas_name`, `Exp_mas_status`, `Exp_mas_create_dt`) VALUES
(1, 'Daliy Expences', 'D', '2017-03-24 18:15:26'),
(2, 'Monthly Expences', 'D', '2017-03-24 18:23:09'),
(3, 'Yearly Expences', 'A', '2017-04-06 11:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_details`
--

CREATE TABLE IF NOT EXISTS `expenses_details` (
  `Exp_id` int(11) NOT NULL,
  `Exp_master_id` int(11) NOT NULL,
  `Exp_date` date NOT NULL,
  `Exp_desc` text NOT NULL,
  `Exp_amount` int(11) NOT NULL,
  `Exp_method` varchar(120) NOT NULL,
  `Exp_ref` varchar(120) NOT NULL,
  `Exp_status` enum('A','D') NOT NULL COMMENT 'Active, deny',
  `Exp_create_dt` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses_details`
--

INSERT INTO `expenses_details` (`Exp_id`, `Exp_master_id`, `Exp_date`, `Exp_desc`, `Exp_amount`, `Exp_method`, `Exp_ref`, `Exp_status`, `Exp_create_dt`) VALUES
(1, 3, '2017-04-14', 'sdfgsdfg', 200, 'DD', 'sdfgsdfg', 'A', '2017-04-20 11:31:01');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_id`, `Product_name`, `Product_comp`, `Product_vat`, `Product_desc`, `Product_prize`, `Product_sales`, `Product_status`, `Product_create_dt`) VALUES
(1, 'Anil samiya', 'anil', 0, '', 179, 192, 'A', '2017-03-01 13:45:05'),
(2, 'iphoe', 'apple', 20, 'sdfsdf', 2000, 5000, 'A', '2017-03-17 16:46:58'),
(3, 'iphone7', 'Daffodills', 20, 'sdfsg', 2500, 5050, 'A', '2017-03-02 17:17:12'),
(4, 'HTC desire', 'HTC', 10, 'kkk', 6000, 7000, 'A', '2017-03-02 17:18:50'),
(5, 'fly', 'relience', 50, 'jio 4G', 2000, 2500, 'A', '2017-03-17 16:50:21'),
(8, 'Product_name', 'Product_comp', 0, 'Product_desc', 0, 0, '', '0000-00-00 00:00:00'),
(9, 'J7', 'samsung', 5, 'sdfgsdfgdsfgsdfgdfg', 25000, 30000, 'A', '2017-04-20 12:05:17'),
(10, 'J5', 'samsung', 2, 'sdfsdfsdfsdf', 20000, 25200, 'A', '2017-04-20 12:05:35'),
(11, 'lap', 'hp', 100, 'sdfsdf', 25000, 30000, 'A', '2017-04-20 12:20:20'),
(12, 'samsung', 'samsung', 90, 'dfcxdvsc', 10000, 11000, 'A', '2017-04-20 12:21:07'),
(13, 'laptop', 'mercury', 200, 'xzczxc', 15000, 16500, 'A', '2017-04-20 12:22:10'),
(14, 'iball', 'iball', 150, 'cfvbcv cbv', 5000, 6000, 'A', '2017-04-20 12:22:53'),
(15, 'Anil samiya', 'Anil', 0, 'dfdf', 179, 192, 'D', '2017-05-10 17:06:19'),
(16, 'Atta', 'Anil', 5, 'df', 700, 800, 'A', '2017-05-10 17:24:43'),
(17, 'graph', 'graph', 5, 'sss', 250, 300, 'A', '2017-05-12 15:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_stock`
--

CREATE TABLE IF NOT EXISTS `product_stock` (
  `Prd_stock_id` int(11) NOT NULL,
  `Prd_stock_prd_id` int(11) NOT NULL,
  `Prd_stock_qty` int(11) NOT NULL,
  `Prd_stock_create_dt` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_stock`
--

INSERT INTO `product_stock` (`Prd_stock_id`, `Prd_stock_prd_id`, `Prd_stock_qty`, `Prd_stock_create_dt`) VALUES
(1, 4, 11, '2017-04-20 12:31:36'),
(2, 3, 19, '2017-05-10 16:41:01'),
(3, 2, 14, '2017-04-20 12:30:48'),
(4, 5, 6, '2017-04-22 09:02:36'),
(5, 1, 298, '2017-05-10 18:02:22'),
(6, 10, 1, '2017-04-20 12:25:53'),
(7, 16, 15, '2017-05-11 13:50:07');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

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
(16, 2, 4, 1, 6000, 6000, '', '2017-03-21 18:42:30'),
(17, 3, 2, 5, 2000, 10000, 'll', '2017-03-23 16:34:34'),
(18, 4, 10, 1, 0, 0, '', '2017-04-20 12:25:53'),
(19, 5, 1, 2, 5000, 10000, '', '2017-05-10 16:41:00'),
(20, 5, 3, 5, 2500, 12500, 'mm', '2017-05-10 16:41:01'),
(21, 6, 1, 100, 179, 17900, '', '2017-05-10 17:13:14'),
(22, 7, 16, 2, 700, 1400, '', '2017-05-10 17:36:02'),
(23, 8, 16, 5, 700, 3500, '', '2017-05-10 17:39:07');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`Purchase_id`, `Purchase_cus_id`, `Purchase_cus_type`, `Purchase_invoice_no`, `Purchase_paid`, `Purchase_advance`, `Purchase_balance`, `Purchase_total`, `Purchase_desc`, `Purchase_dis_amt`, `Purchase_dis_type`, `Purchase_tax_id`, `Purchase_tax_type`, `Purchase_tax_amount`, `Purchase_date`, `Purchase_pay_status`, `Purchase_create_dt`) VALUES
(1, 2, 'Customer', 111, 28500, 300, 0, 10300, 'kkk', 500, 'Fixed', 5, 'Persentage', 20, '2017-03-21', 'P', '2017-03-21 18:41:20'),
(2, 2, 'Customer', 112, 6445, 445, 8000, 14445, 'he', 10, 'Persentage', 11, 'Fixed', 50, '2017-03-21', 'PP', '2017-03-21 18:42:30'),
(3, 2, 'Customer', 100, 0, 0, 10000, 10000, '', 0, NULL, 0, '', 0, '2017-03-23', 'PP', '2017-03-23 16:34:34'),
(4, 1, 'Retailer', 121121, 100, 100, -100, 0, 'hghffgh', 10, 'Persentage', 5, 'Persentage', 20, '2017-04-20', 'PP', '2017-04-20 12:25:52'),
(5, 15, 'Wholesaler', 1, 11000, 1000, 15500, 26500, 'nmnn', 500, 'Fixed', 5, 'Persentage', 20, '2017-05-10', 'PP', '2017-05-10 16:41:00'),
(6, 4, 'Retailer', 101, 0, 0, 17900, 17900, '', 0, NULL, 0, '', 0, '2017-05-10', 'U', '2017-05-10 17:13:14'),
(7, 5, 'Retailer', 102, 100, 100, 1300, 1400, '', 0, NULL, 0, '', 0, '2017-05-10', 'PP', '2017-05-10 17:36:02'),
(8, 5, 'Retailer', 113, 0, 0, 4200, 4200, 'f', 0, NULL, 5, 'Persentage', 20, '2017-05-10', 'U', '2017-05-10 17:39:07');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_payment`
--

INSERT INTO `purchase_payment` (`Pur_payment_id`, `Pur_payment_cust_id`, `Pur_payment_purchase_id`, `Pur_payment_date`, `Pur_payment_amount`, `Pur_payment_desc`, `Pur_payment_method`, `Pur_payment_ref`, `Pur_payment_create_dt`) VALUES
(1, 2, '1', '2017-03-21', 1000, 'hhh', 'Cash', '111', '2017-03-21 18:43:52'),
(2, 2, '2', '2017-03-21', 2000, 'hh', 'Cash', '001', '2017-03-21 18:44:42'),
(3, 2, '2', '2017-03-21', 8000, 'dddd', 'Cash', '110', '2017-03-21 18:45:31'),
(4, 3, '1', '2017-03-23', 8000, '', 'Cash', '', '2017-03-23 15:46:34'),
(5, 2, '3', '2017-04-17', 25000, 'erere', 'Card', '322332', '2017-04-17 16:46:09'),
(6, 15, '5', '2017-05-10', 10000, 'nnnmn', 'Card', '211', '2017-05-10 16:41:46');

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
  `Sales_dis_type` varchar(50) DEFAULT NULL,
  `Sales_tax_id` int(11) NOT NULL COMMENT 'tax table tax id',
  `Sales_tax_type` varchar(50) NOT NULL,
  `Sales_tax_amount` int(11) NOT NULL,
  `Sales_date` date NOT NULL,
  `Sales_pay_status` enum('U','PP','P') NOT NULL,
  `Sales_create_dt` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`Sales_id`, `Sales_cus_id`, `Sales_cus_type`, `Sales_invoice_no`, `Sales_paid`, `Sales_advance`, `Sales_balance`, `Sales_total`, `Sales_desc`, `Sales_dis_amt`, `Sales_dis_type`, `Sales_tax_id`, `Sales_tax_type`, `Sales_tax_amount`, `Sales_date`, `Sales_pay_status`, `Sales_create_dt`) VALUES
(2, 1, 'Retailer', 122, 10000, 1000, 0, 10000, '', 800, 'Fixed', 5, 'Persentage', 20, '2017-03-23', 'P', '2017-03-23 16:22:50'),
(3, 3, 'Wholesaler', 110, 4000, 0, 0, 4000, '', 0, NULL, 0, '', 0, '2017-03-23', 'P', '2017-03-23 16:54:57'),
(4, 1, 'Retailer', 4, 2000, 2000, 9400, 11400, 'fgdfg', 5, 'Persentage', 5, 'Persentage', 20, '2017-04-20', 'PP', '2017-04-20 12:28:18'),
(5, 10, 'Customer', 5, 500, 500, 3500, 4000, 'dcxc', 2, NULL, 0, '', 0, '2017-04-20', 'PP', '2017-04-20 12:29:18'),
(6, 15, 'Wholesaler', 6, 3000, 3000, 3000, 6000, 'fgfdg', 40, 'Persentage', 0, '', 0, '2017-04-20', 'PP', '2017-04-20 12:30:48'),
(7, 5, 'Retailer', 7, 100, 100, 9260, 9360, '', 22, 'Persentage', 0, '', 0, '2017-04-20', 'PP', '2017-04-20 12:31:35'),
(8, 11, 'Customer', 8, 100, 100, 14400, 14500, 'dfdf', 1000, 'Fixed', 1, 'Fixed', 500, '2017-04-22', 'PP', '2017-04-22 09:02:36'),
(9, 20, 'Retailer', 9, 0, 0, 1984, 1984, 'd', 0, NULL, 0, '', 0, '2017-05-10', 'U', '2017-05-10 18:02:22');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`Sales_order_id`, `Sales_order_sal_id`, `Sales_order_pro`, `Sales_order_qty`, `Sales_order_rate`, `Sales_order_amount`, `Sales_order_desc`, `Sales_order_create_dt`) VALUES
(2, 2, 2, 2, 2000, 4000, 'kk', '2017-03-23 16:22:50'),
(3, 2, 1, 1, 5000, 5000, 'kk', '2017-03-23 16:22:50'),
(4, 3, 2, 2, 2000, 4000, '', '2017-03-23 16:54:57'),
(5, 4, 1, 2, 5000, 10000, 'dgf', '2017-04-20 12:28:18'),
(6, 5, 2, 2, 2000, 4000, 'xdfgxfg', '2017-04-20 12:29:19'),
(7, 6, 2, 5, 2000, 10000, '', '2017-04-20 12:30:48'),
(8, 7, 4, 2, 6000, 12000, '', '2017-04-20 12:31:36'),
(9, 8, 5, 5, 2000, 10000, '', '2017-04-22 09:02:36'),
(10, 2, 1, 1, 5000, 5000, '', '2017-04-22 09:02:36'),
(11, 9, 1, 2, 192, 384, '', '2017-05-10 18:02:22'),
(12, 9, 16, 2, 800, 1600, '', '2017-05-10 18:02:22');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_payment`
--

INSERT INTO `sales_payment` (`Sales_payment_id`, `Sales_payment_cust_id`, `Sales_payment_sales_id`, `Sales_payment_date`, `Sales_payment_amount`, `Sales_payment_desc`, `Sales_payment_method`, `Sales_payment_ref`, `Sales_payment_create_dt`) VALUES
(1, 3, 1, '2017-03-23', 8000, 'kkk', 'Cash', '123', 2147483647),
(2, 3, 3, '2017-03-23', 4000, 'n', 'Cash', '222', 2147483647),
(3, 1, 2, '2017-03-24', 2000, 'cvcvcv', 'Cash', '12121', 2147483647),
(4, 1, 2, '2017-04-17', 7000, '200', 'Cheque', '5132112', 2147483647);

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
-- Indexes for table `employee_salary`
--
ALTER TABLE `employee_salary`
  ADD PRIMARY KEY (`Emp_salary_id`);

--
-- Indexes for table `expences_master`
--
ALTER TABLE `expences_master`
  ADD PRIMARY KEY (`Exp_mas_id`);

--
-- Indexes for table `expenses_details`
--
ALTER TABLE `expenses_details`
  ADD PRIMARY KEY (`Exp_id`);

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
  MODIFY `Customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `employee_bank_details`
--
ALTER TABLE `employee_bank_details`
  MODIFY `Employee_bank_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `employee_salary`
--
ALTER TABLE `employee_salary`
  MODIFY `Emp_salary_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expences_master`
--
ALTER TABLE `expences_master`
  MODIFY `Exp_mas_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `expenses_details`
--
ALTER TABLE `expenses_details`
  MODIFY `Exp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `product_stock`
--
ALTER TABLE `product_stock`
  MODIFY `Prd_stock_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `purcahse_order`
--
ALTER TABLE `purcahse_order`
  MODIFY `Purchase_order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `Purchase_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `purchase_payment`
--
ALTER TABLE `purchase_payment`
  MODIFY `Pur_payment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `Sales_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `Sales_order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sales_payment`
--
ALTER TABLE `sales_payment`
  MODIFY `Sales_payment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tax_details`
--
ALTER TABLE `tax_details`
  MODIFY `Tax_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
