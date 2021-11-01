-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2021 at 01:13 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `apartment_id` int(11) NOT NULL,
  `apartment_no` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `rent` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`apartment_id`, `apartment_no`, `description`, `rent`) VALUES
(1, '101', '2 bed', 20000.00),
(2, '234', '2bed', 20000.00),
(3, '233', '3 bed', 56000.00);

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `building_id` int(11) NOT NULL,
  `building_name` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `currency` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`building_id`, `building_name`, `owner_name`, `address`, `currency`) VALUES
(1, 'Western Park', 'Nasir hossain', 'Christian cemetery road, chittagong', '$');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_cell` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_cell`, `customer_email`, `customer_address`) VALUES
(21, 'Jhonson', '8801954796214', 'jhonson@gmail.com', 'Australia'),
(10, 'Jasim Uddin', '+8855775555', 'jasim@gmail.com', 'Chittagong'),
(13, 'Rakib Uddin', '+8888558888', 'rakib@gmail.com', 'Agrabad, Ctg');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `expense_name` varchar(255) NOT NULL,
  `expense_note` varchar(255) NOT NULL,
  `expense_amount` varchar(255) NOT NULL,
  `expense_date` varchar(255) NOT NULL,
  `expense_time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `category_id`, `expense_name`, `expense_note`, `expense_amount`, `expense_date`, `expense_time`, `timestamp`) VALUES
(1, 26, 'Snacks', 'Snacks Bil', '200', '2021-10-31', '03:58 PM ', '2021-10-31 07:59:09'),
(2, 27, 'BPDB Bill', 'BPDB Electricity Bill', '1000', '2021-10-31', '02:00 PM ', '2021-10-31 08:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_category`
--

INSERT INTO `expense_category` (`category_id`, `category_name`) VALUES
(26, 'Snacks Bill'),
(27, 'Electricity Bill'),
(28, 'Wasa Bill');

-- --------------------------------------------------------

--
-- Table structure for table `guards`
--

CREATE TABLE `guards` (
  `sg_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guards`
--

INSERT INTO `guards` (`sg_id`, `name`, `phone`, `address`, `nid`) VALUES
(1, 'Rahat', '01881873060', 'Muradpur', '789567789'),
(2, 'Tanim Hasan', '01881873061', 'Muradpur', '745678');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(255) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `product_name` text NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `product_weight` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_order_date` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `invoice_id`, `product_name`, `product_quantity`, `product_weight`, `product_price`, `product_order_date`, `product_id`, `product_image`, `timestamp`) VALUES
(1, 'INV820211618944462', 'chicken eggs , hen eggs', '1', '2 g', '222', '2021-04-21', '14', '1593670631.jpg', '2021-04-20 18:47:43'),
(2, 'INV820211626446279', 'Banana', '2', '2 Kg', '70', '2021-07-16', '12', 'banana.png', '2021-07-16 14:38:00'),
(3, 'INV1220211626480417', 'Chicken Eggs', '2', '2 g', '50', '2021-07-16', '14', 'eggs.jpg', '2021-07-17 00:06:58'),
(4, 'INV820211626565374', 'Banana', '1', '2 Kg', '70', '2021-07-17', '12', 'banana.png', '2021-07-17 23:43:05'),
(5, 'INV820211626569770', 'Chicken Eggs', '1', '2 g', '50', '2021-07-18', '14', 'eggs.jpg', '2021-07-18 00:56:12'),
(6, 'INV820211626570308', 'Fruit Juice', '1', '1 pcs', '120.5', '2021-07-18', '27', 'juice.jpg', '2021-07-18 01:05:10'),
(7, 'INV820211626703842', 'lens', '1', '0.300 g', '1', '2021-07-19', '42', '1626703769.png', '2021-07-19 14:10:44'),
(8, 'INV820211626738346', 'Banana', '1', '2 Kg', '70', '2021-07-20', '12', 'banana.png', '2021-07-19 23:45:49'),
(9, 'INV820211626738346', 'Chicken Eggs', '1', '2 g', '50', '2021-07-20', '14', 'eggs.jpg', '2021-07-19 23:45:49'),
(10, 'INV820211627189601', 'Chicken Eggs', '1', '2 g', '50', '2021-07-25', '14', 'eggs.jpg', '2021-07-25 05:06:43'),
(11, 'INV820211627189601', 'Iphone XI', '1', '10 g', '546', '2021-07-25', '43', '1626929298.jpg', '2021-07-25 05:06:43'),
(12, 'INV820211627189601', 'vixol pink', '1', '12 ml', '100', '2021-07-25', '44', '1616832968.png', '2021-07-25 05:06:43'),
(13, 'INV820211627457162', 'Iphone XI', '1', '10 g', '546', '2021-07-28', '43', '1626929298.jpg', '2021-07-28 07:26:03'),
(14, 'INV820211627457162', 'Chicken Eggs', '1', '2 g', '50', '2021-07-28', '14', 'eggs.jpg', '2021-07-28 07:26:03'),
(15, 'INV820211627457162', 'lens', '1', '0.300 g', '1', '2021-07-28', '42', '1626703769.png', '2021-07-28 07:26:03'),
(16, 'INV820211627504345', 'Iphone XI', '1', '10 g', '546', '2021-07-28', '43', '1626929298.jpg', '2021-07-28 20:32:25'),
(17, 'INV820211627508876', 'Iphone XI', '10', '10 g', '546', '2021-07-28', '43', '1626929298.jpg', '2021-07-28 21:47:57'),
(18, 'INV820211627769060', 'ALcatra com Picanha', '1', '555 g', '1000000', '2021-07-31', '44', '1627008512.jpg', '2021-07-31 22:04:20'),
(19, 'INV820211628238525', 'aaa', '1', '1 pcs', '200', '2021-08-06', '45', '1628020016.png', '2021-08-06 08:28:47'),
(20, 'INV820211628364451', 'Iphone XI', '1', '10 g', '546', '2021-08-07', '43', '1626929298.jpg', '2021-08-07 19:27:34'),
(21, 'INV820211628364451', 'aaa', '1', '1 pcs', '200', '2021-08-07', '45', '1628020016.png', '2021-08-07 19:27:34'),
(22, 'INV820211628364451', 'nnn', '1', '1 pcs', '20', '2021-08-07', '46', '1628021760.png', '2021-08-07 19:27:34'),
(23, 'INV820211628380341', 'lens', '1', '0.300 g', '1', '2021-08-08', '42', '1626703769.png', '2021-08-07 23:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `order_id` int(255) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_time` varchar(255) NOT NULL,
  `order_type` varchar(255) NOT NULL,
  `order_payment_method` varchar(255) NOT NULL,
  `order_price` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `served_by` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`order_id`, `invoice_id`, `order_date`, `order_time`, `order_type`, `order_payment_method`, `order_price`, `discount`, `tax`, `customer_name`, `served_by`, `timestamp`) VALUES
(1, 'INV820211618944462', '2021-04-21', '12:47 AM', 'PICK UP', 'CASH', '222.0', '3.30', '33.3', 'Rakib Uddin', 'Admin', '2021-04-20 18:47:43'),
(2, 'INV820211626446279', '2021-07-16', '09:37 PM', 'PICK UP', 'CASH', '140.0', '0.00', '14.0', 'Walk In Customer', 'Admin', '2021-07-16 14:38:00'),
(3, 'INV1220211626480417', '2021-07-16', '07:06 PM', 'PICK UP', 'CASH', '100.0', '0.00', '10.0', 'Walk In Customer', 'Testing', '2021-07-17 00:06:58'),
(4, 'INV820211626565374', '2021-07-17', '06:42 PM', 'PICK UP', 'CASH', '70.0', '0.00', '7.0', 'Jasim Uddin', 'Admin', '2021-07-17 23:43:05'),
(5, 'INV820211626569770', '2021-07-18', '02:56 AM', 'PICK UP', 'CASH', '50.0', '0.00', '5.0', 'Walk In Customer', 'Admin', '2021-07-18 00:56:12'),
(6, 'INV820211626570308', '2021-07-18', '03:05 AM', 'HOME DELIVERY', 'CASH', '120.5', '0.00', '12.05', 'Rakib Uddin', 'Admin', '2021-07-18 01:05:10'),
(7, 'INV820211626703842', '2021-07-19', '04:10 PM', 'HOME DELIVERY', 'PAYPAL', '1.0', '0.00', '0.1', 'Walk In Customer', 'Admin', '2021-07-19 14:10:44'),
(8, 'INV820211626738346', '2021-07-20', '12:45 AM', 'PICK UP', 'OM', '120.0', '0.00', '12.0', 'mfondi', 'Admin', '2021-07-19 23:45:49'),
(9, 'INV820211627189601', '2021-07-25', '10:06 AM', 'PICK UP', 'CASH', '696.0', '0.00', '69.6', 'Walk In Customer', 'Admin', '2021-07-25 05:06:43'),
(10, 'INV820211627457162', '2021-07-28', '12:26 PM', 'Table Booking', 'CASH', '597.0', '0.00', '59.7', 'Walk In Customer', 'Admin', '2021-07-28 07:26:03'),
(11, 'INV820211627504345', '2021-07-28', '03:32 PM', 'PICK UP', 'CASH', '546.0', '0.00', '54.6', 'Walk In Customer', 'Admin', '2021-07-28 20:32:25'),
(12, 'INV820211627508876', '2021-07-28', '09:47 PM', 'PERCEL', 'CASH', '5460.0', '655.9', '546.0', 'Jhonson', 'Admin', '2021-07-28 21:47:57'),
(13, 'INV820211627769060', '2021-07-31', '05:04 PM', 'PICK UP', 'CASH', '1000000.0', '0.00', '100000.0', 'Rakib Uddin', 'Admin', '2021-07-31 22:04:20'),
(14, 'INV820211628238525', '2021-08-06', '03:28 AM', 'PICK UP', 'CASH', '200.0', '0.00', '20.0', 'Walk In Customer', 'Admin', '2021-08-06 08:28:47'),
(15, 'INV820211628364451', '2021-08-07', '08:27 PM', 'PICK UP', 'CASH', '766.0', '0.00', '76.6', 'Walk In Customer', 'Admin', '2021-08-07 19:27:34'),
(16, 'INV820211628380341', '2021-08-08', '12:52 AM', 'Table Booking', 'CASH', '1.0', '0.00', '0.1', 'Walk In Customer', 'Admin', '2021-08-07 23:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` text NOT NULL,
  `product_category_id` int(5) NOT NULL,
  `product_description` text NOT NULL,
  `product_buy_price` float NOT NULL DEFAULT '0',
  `product_sell_price` float NOT NULL,
  `product_weight` varchar(255) NOT NULL,
  `product_weight_unit_id` int(11) NOT NULL,
  `product_supplier_id` int(11) NOT NULL,
  `product_image` text NOT NULL,
  `product_stock` int(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_code`, `product_category_id`, `product_description`, `product_buy_price`, `product_sell_price`, `product_weight`, `product_weight_unit_id`, `product_supplier_id`, `product_image`, `product_stock`, `timestamp`) VALUES
(1, 'Poco F1', 'RRS', 1, 'Latest smart phone', 0, 250, '1', 4, 15, 'poco_f1.jpg', 0, '2021-04-20 19:04:21'),
(45, 'aaa', 'ghh', 20, 'h', 0, 200, '1', 4, 19, '1628020016.png', 8, '2021-08-07 19:27:34'),
(7, 'Chicken Biryani', 'kochu', 21, 'wqwq', 0, 100, '2', 1, 18, 'chicken_biryani.jpg', 20, '2021-04-20 19:09:39'),
(43, 'Iphone XI', 'Iphone001', 1, 'Phone', 0, 546, '10', 1, 5, '1626929298.jpg', 6, '2021-08-07 19:27:34'),
(14, 'Chicken Eggs', 'eggs', 3, 'well & fresh', 0, 50, '2', 1, 19, 'eggs.jpg', 488, '2021-07-28 07:26:03'),
(27, 'Fruit Juice', 'juice', 3, 'well and healthy', 0, 120.5, '1', 4, 19, 'juice.jpg', 9, '2021-07-18 01:05:10'),
(41, 'stevia', '7861000213509', 21, 'estevia', 0, 23, '2', 2, 18, '1626541468.png', 60, '2021-07-17 17:04:27'),
(42, 'lens', '2099901779588', 1, 'blah blah', 0, 1, '0.300', 1, 5, '1626703769.png', 97, '2021-08-07 23:52:23'),
(44, 'ALcatra com Picanha', '12a3sd45as4d321', 9, 'Alcatra com a picanha', 0, 1000000, '555', 1, 18, '1627008512.jpg', 8, '2021-07-31 22:04:20'),
(46, 'nnn', 'nnnn', 20, '', 0, 20, '1', 4, 18, '1628021760.png', 698, '2021-08-07 19:27:34'),
(47, 'Test buy ', 'ewee', 21, 'asasas', 200, 300, '200', 2, 5, 'image_placeholder.png', 20, '2021-08-08 13:25:50'),
(48, 'Jam jam', 'vvgdx', 20, 'decs', 200, 500, '20', 2, 5, '1628433803.png', 10, '2021-08-08 14:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `renters`
--

CREATE TABLE `renters` (
  `renter_id` int(11) NOT NULL,
  `renter_name` varchar(255) NOT NULL,
  `renter_email` varchar(255) NOT NULL,
  `renter_phone` varchar(255) NOT NULL,
  `renter_nid` varchar(255) NOT NULL,
  `renter_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renters`
--

INSERT INTO `renters` (`renter_id`, `renter_name`, `renter_email`, `renter_phone`, `renter_nid`, `renter_address`) VALUES
(1, 'Rakib Hasan', 'rakib@gmail.com', '01881873060', '730879345', 'Muradpur'),
(2, 'Tanim Hasan', 'tanim@gmail.com', '01636100375', '678 345 6789', 'Dewanhat');

-- --------------------------------------------------------

--
-- Table structure for table `rent_management`
--

CREATE TABLE `rent_management` (
  `rm_id` int(11) NOT NULL,
  `renter_id` int(11) NOT NULL,
  `apartment_id` int(11) NOT NULL,
  `rent` double(10,2) NOT NULL,
  `rent_duration` varchar(255) NOT NULL,
  `rent_start_date` date NOT NULL,
  `advanced` double(10,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent_management`
--

INSERT INTO `rent_management` (`rm_id`, `renter_id`, `apartment_id`, `rent`, `rent_duration`, `rent_start_date`, `advanced`, `date`) VALUES
(2, 1, 2, 35000.00, '6 month', '2021-11-01', 40000.00, '2021-10-30 20:22:44'),
(3, 2, 1, 30000.00, '4 month', '2021-11-01', 30000.00, '2021-10-30 20:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_contact` varchar(255) NOT NULL,
  `shop_email` varchar(255) NOT NULL,
  `shop_address` varchar(255) NOT NULL,
  `tax` varchar(11) NOT NULL,
  `currency_symbol` varchar(20) NOT NULL,
  `shop_status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shop_id`, `shop_name`, `shop_contact`, `shop_email`, `shop_address`, `tax`, `currency_symbol`, `shop_status`) VALUES
(1, 'ONLINE SOFT SELL', '+812345678900', 'onlinesoftsell@gmail.com', 'New York, USA', '10', '$', 'OPEN');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `suppliers_id` int(255) NOT NULL,
  `suppliers_name` varchar(255) NOT NULL,
  `suppliers_contact_person` varchar(255) NOT NULL,
  `suppliers_cell` varchar(255) NOT NULL,
  `suppliers_email` varchar(255) NOT NULL,
  `suppliers_address` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`suppliers_id`, `suppliers_name`, `suppliers_contact_person`, `suppliers_cell`, `suppliers_email`, `suppliers_address`, `timestamp`) VALUES
(5, 'jon', 'Jamal', '01831758798', 'jamul@gmail.com', 'Iiuc', '2020-07-06 16:16:59'),
(19, 'Pepsi', 'Jhon', '88800891994', 'pepsi9@gmail.com', 'USA', '2020-07-30 06:31:14'),
(18, 'Addidas', 'Jhon due', '88085585588', 'addidas@gmail.com', 'USA', '2020-07-30 06:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cell` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `cell`, `email`, `password`, `user_type`) VALUES
(8, 'Admin', '123456789', 'admin@gmail.com', '123456', 'admin'),
(3, 'Manager', '777888', 'manager@gmail.com', '1234', 'manager'),
(4, 'Staff', '76543211', 'staff@gmail.com', '1234', 'staff'),
(5, 'Manager', '01778001401', 'noor.bd92@gmail.com', '12345', 'manager'),
(9, 'Agent', '0000000000', 'personal@perosnal.com', '123456789', 'staff'),
(10, 'saad', '0568101255', 'saad_ena2@hotmail.com', '123456', 'admin'),
(11, 'user@gmail.com', '0160010304013', 'user@gmail.com', '12345', 'staff'),
(12, 'Testing', '019645743', 'testing@gmail.com', 'test123', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `weight_unit`
--

CREATE TABLE `weight_unit` (
  `weight_unit_id` int(11) NOT NULL,
  `weight_unit_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weight_unit`
--

INSERT INTO `weight_unit` (`weight_unit_id`, `weight_unit_name`) VALUES
(1, 'g'),
(2, 'Kg'),
(3, 'L'),
(4, 'pcs'),
(5, 'ml');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`apartment_id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`building_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `guards`
--
ALTER TABLE `guards`
  ADD PRIMARY KEY (`sg_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `renters`
--
ALTER TABLE `renters`
  ADD PRIMARY KEY (`renter_id`);

--
-- Indexes for table `rent_management`
--
ALTER TABLE `rent_management`
  ADD PRIMARY KEY (`rm_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`suppliers_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weight_unit`
--
ALTER TABLE `weight_unit`
  ADD PRIMARY KEY (`weight_unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `apartment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `guards`
--
ALTER TABLE `guards`
  MODIFY `sg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `renters`
--
ALTER TABLE `renters`
  MODIFY `renter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rent_management`
--
ALTER TABLE `rent_management`
  MODIFY `rm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `suppliers_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `weight_unit`
--
ALTER TABLE `weight_unit`
  MODIFY `weight_unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
