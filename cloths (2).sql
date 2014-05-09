-- phpMyAdmin SQL Dump
-- version 2.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2014 at 01:47 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `cloths`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL auto_increment,
  `group_id` int(11) NOT NULL,
  `cat_name` text collate latin1_general_ci NOT NULL,
  `cat_isactive` int(11) NOT NULL default '1',
  PRIMARY KEY  (`cat_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `group_id`, `cat_name`, `cat_isactive`) VALUES
(1, 2, 'test', 1),
(2, 2, '12', 1),
(3, 2, '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chalan`
--

CREATE TABLE `tbl_chalan` (
  `ch_no` int(11) NOT NULL,
  `bill_type` int(11) NOT NULL,
  `client_name` text collate latin1_general_ci NOT NULL,
  `ch_date` date NOT NULL,
  `pack_slip_no` int(11) NOT NULL,
  PRIMARY KEY  (`ch_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_chalan`
--

INSERT INTO `tbl_chalan` (`ch_no`, `bill_type`, `client_name`, `ch_date`, `pack_slip_no`) VALUES
(1, 0, 'tes', '2014-04-09', 6),
(2, 0, 'tes', '2014-04-09', 6),
(3, 0, 'tes', '2014-04-09', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients`
--

CREATE TABLE `tbl_clients` (
  `client_id` int(11) NOT NULL auto_increment,
  `client_name` text collate latin1_general_ci NOT NULL,
  `client_ph` varchar(11) collate latin1_general_ci NOT NULL,
  `client_mo` int(11) NOT NULL,
  `client_email` varchar(35) collate latin1_general_ci NOT NULL,
  `client_add` varchar(100) collate latin1_general_ci NOT NULL,
  `client_pin` int(11) NOT NULL,
  PRIMARY KEY  (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_clients`
--

INSERT INTO `tbl_clients` (`client_id`, `client_name`, `client_ph`, `client_mo`, `client_email`, `client_add`, `client_pin`) VALUES
(3, 'suvasa', '0141-400210', 989155552, '123@123.com', 'rajasthan', 3020),
(4, 'Test', '0141-400210', 989155552, 'bibu@gmail.com', 'raja', 302024),
(5, 'suvasa', '0141-400210', 989155552, '123@123.com', 'asda', 302024);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

CREATE TABLE `tbl_group` (
  `group_id` int(11) NOT NULL auto_increment,
  `group_name` text collate latin1_general_ci NOT NULL,
  `group_isactive` int(11) NOT NULL default '1',
  PRIMARY KEY  (`group_id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_group`
--

INSERT INTO `tbl_group` (`group_id`, `group_name`, `group_isactive`) VALUES
(2, 'test', 1),
(3, 'test o', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_to_product`
--

CREATE TABLE `tbl_invoice_to_product` (
  `itp_id` int(11) NOT NULL auto_increment,
  `ch_no` int(11) NOT NULL,
  `particulars` varchar(25) collate latin1_general_ci NOT NULL,
  `size` varchar(25) collate latin1_general_ci default NULL,
  `quantity` float NOT NULL,
  PRIMARY KEY  (`itp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_invoice_to_product`
--

INSERT INTO `tbl_invoice_to_product` (`itp_id`, `ch_no`, `particulars`, `size`, `quantity`) VALUES
(1, 1, 'asdas', '36', 21),
(2, 2, 'asdas', '36', 21),
(3, 3, 'asdas', '36', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL auto_increment,
  `client_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `order_name` varchar(25) collate latin1_general_ci NOT NULL,
  `total` float NOT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY  (`order_id`),
  UNIQUE KEY `order_name` (`order_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `client_id`, `order_date`, `delivery_date`, `order_name`, `total`, `type_id`) VALUES
(2, 3, '2014-04-10', '2014-04-17', 'art', 1980, 0),
(3, 4, '2014-04-01', '2014-04-09', 'asasda', 144, 0),
(4, 4, '2014-04-08', '2014-04-09', 'daad', 144, 0),
(5, 0, '2014-04-15', '0000-00-00', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderdetail`
--

CREATE TABLE `tbl_orderdetail` (
  `order_no` int(11) NOT NULL,
  `product_id` varchar(10) collate latin1_general_ci NOT NULL,
  `units` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_cdate` date NOT NULL,
  `order_rs` int(11) NOT NULL,
  PRIMARY KEY  (`order_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_orderdetail`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_to_product`
--

CREATE TABLE `tbl_order_to_product` (
  `otp_id` int(11) NOT NULL auto_increment,
  `order_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_size` varchar(30) collate latin1_general_ci default NULL,
  `p_color` text collate latin1_general_ci,
  `p_price` float default NULL,
  `p_design` varchar(40) collate latin1_general_ci default NULL,
  `p_quantity` float default NULL,
  `sub_total` float default NULL,
  PRIMARY KEY  (`otp_id`),
  KEY `order_id` (`order_id`,`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_order_to_product`
--

INSERT INTO `tbl_order_to_product` (`otp_id`, `order_id`, `p_id`, `p_size`, `p_color`, `p_price`, `p_design`, `p_quantity`, `sub_total`) VALUES
(1, 1, 7, '30', 'green', 15, 'xyz', 10.4, 156),
(2, 1, 8, '12', 'purpal', 78, 'new', 3, 234),
(3, 2, 7, '30*12', 'yellow', 12, 'flower', 45, 540),
(4, 2, 8, '71*2', 'red', 32, 'pipe', 45, 1440),
(5, 3, 6, '21', 'red', 12, 'sad', 12, 144),
(6, 4, 7, '21', 'red', 12, 'sad', 12, 144),
(7, 5, 7, '', '', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL auto_increment,
  `p_name` text collate latin1_general_ci NOT NULL,
  `p_color` text collate latin1_general_ci,
  `p_size` varchar(8) collate latin1_general_ci NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_price` float NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY  (`p_id`),
  KEY `u_id` (`u_id`),
  KEY `group_id` (`group_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `p_name`, `p_color`, `p_size`, `u_id`, `p_price`, `p_quantity`, `group_id`, `cat_id`) VALUES
(6, 'fabric name', 'red', '92*20', 2, 200, 20, 0, 0),
(7, 'new', NULL, '', 2, 0, 0, 2, 2),
(8, 'wire', NULL, '', 4, 0, 0, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE `tbl_purchase` (
  `product_id` varchar(10) collate latin1_general_ci NOT NULL,
  `units` int(11) NOT NULL,
  `size` varchar(8) collate latin1_general_ci NOT NULL,
  `purchase_date` date NOT NULL,
  PRIMARY KEY  (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_purchase`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `role_name` varchar(155) collate latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role_id`, `role_name`) VALUES
(1, 1, 'Admin'),
(0, 2, 'Sales'),
(0, 3, 'CA'),
(0, 4, 'Worker');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_type`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_units`
--

CREATE TABLE `tbl_units` (
  `u_id` int(11) NOT NULL auto_increment,
  `u_name` varchar(100) collate latin1_general_ci NOT NULL,
  `u_isactive` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`u_id`),
  KEY `u_id` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_units`
--

INSERT INTO `tbl_units` (`u_id`, `u_name`, `u_isactive`) VALUES
(2, 'meter', 1),
(4, 'inches', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_role` tinyint(4) default NULL,
  `fname` text collate latin1_general_ci,
  `lname` text collate latin1_general_ci,
  `mobile` bigint(11) default NULL,
  `user_email` varchar(25) collate latin1_general_ci default NULL,
  `user_password` varchar(40) collate latin1_general_ci NOT NULL,
  `user_lastlogin` date default NULL,
  `user_isactive` tinyint(4) NOT NULL default '1',
  `user_name` varchar(15) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_role`, `fname`, `lname`, `mobile`, `user_email`, `user_password`, `user_lastlogin`, `user_isactive`, `user_name`) VALUES
(1, 1, 'xyz', 'abc', 123456, 'test@admin.com', '0192023a7bbd73250516f069df18b500', '0000-00-00', 1, 'admin'),
(6, 2, 'Bharat', 'Puri', 9025256575, NULL, '3d2b6e9bd5c43af50c6888f1a697dee9', NULL, 1, 'bharat'),
(8, 3, 'demo', 'demo', 9022558899, NULL, 'fe01ce2a7fbac8fafaed7c982a04e229', NULL, 1, 'demo'),
(9, 4, 'Rishi', 'Shrivastav', 9001236239, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, 'rshri3'),
(10, 3, 'Rishi', 'Shrivastava', 9001236239, NULL, 'caf1a3dfb505ffed0d024130f58c5cfa', NULL, 1, 'rsh'),
(11, 2, 's', 'sa', 789465, NULL, 'c4ca4238a0b923820dcc509a6f75849b', NULL, 1, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tb_payment`
--

CREATE TABLE `tb_payment` (
  `order_no` int(11) NOT NULL,
  `pay_total` int(11) NOT NULL,
  `pay_rec` int(11) NOT NULL,
  PRIMARY KEY  (`order_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_payment`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `tbl_units` (`u_id`) ON UPDATE NO ACTION;
