-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2021 at 05:24 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`email`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer_bill`
--

CREATE TABLE `customer_bill` (
  `id` int(6) UNSIGNED NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_qty` varchar(30) NOT NULL,
  `price` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_bill`
--

INSERT INTO `customer_bill` (`id`, `product_name`, `product_qty`, `price`) VALUES
(1, 'Chips ', '2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `not_available_items`
--

CREATE TABLE `not_available_items` (
  `product_name` varchar(200) NOT NULL,
  `product_quantity` int(200) NOT NULL,
  `product_price` int(200) NOT NULL,
  `customer_count` int(200) NOT NULL,
  `request_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `not_available_items`
--

INSERT INTO `not_available_items` (`product_name`, `product_quantity`, `product_price`, `customer_count`, `request_date`) VALUES
('FeviQuick1', 21, 5, 1, '2022-12-31'),
('ToothBrush', 20, 20, 3, '2020-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `product_cate`
--

CREATE TABLE `product_cate` (
  `product_category` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_cate`
--

INSERT INTO `product_cate` (`product_category`) VALUES
('Food'),
('Beauty'),
('Shampoo');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `product_name` varchar(200) NOT NULL,
  `product_category` varchar(200) DEFAULT NULL,
  `expiry_date` date NOT NULL,
  `product_quantity` int(200) NOT NULL,
  `product_price` int(200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`product_name`, `product_category`, `expiry_date`, `product_quantity`, `product_price`, `id`) VALUES
('Fair And Lovely', 'Hindustan', '2022-02-13', 12, 25, 4),
('Chips ', 'Balaji', '2022-02-20', 15, 5, 6),
('Good Night', 'Liquid', '2022-02-28', 4, 75, 11),
('EVEREADY ', 'Cell India', '2022-06-26', 10, 15, 12),
('Vim', 'Soap', '2021-02-21', 3, 5, 13),
('Himaliya', 'shampoo', '0230-03-02', 2, 120, 14),
('Surf excel 2', 'Detergent', '2023-02-04', 5, 5, 15),
('Clinic Plus', 'shampoo', '2022-06-25', 2, 2, 16),
('Good Day', 'Buiscuit', '2021-12-20', 30, 10, 18),
('Maggie', 'Nesly', '2022-12-25', 3, 5, 19),
('Oil', 'Food', '2202-02-22', 23, 150, 20),
('Marie Gold', 'Food', '3212-02-25', 55, 10, 21),
('Vatika Shampoo', 'Shampoo', '2231-03-15', 50, 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `regular_customer`
--

CREATE TABLE `regular_customer` (
  `customer_name` varchar(200) NOT NULL,
  `customer_address` varchar(400) NOT NULL,
  `customer_number` int(200) NOT NULL,
  `customer_bill` int(200) NOT NULL,
  `customer_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_bill`
--
ALTER TABLE `customer_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `not_available_items`
--
ALTER TABLE `not_available_items`
  ADD PRIMARY KEY (`customer_count`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regular_customer`
--
ALTER TABLE `regular_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_bill`
--
ALTER TABLE `customer_bill`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `not_available_items`
--
ALTER TABLE `not_available_items`
  MODIFY `customer_count` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `regular_customer`
--
ALTER TABLE `regular_customer`
  MODIFY `customer_id` int(200) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
