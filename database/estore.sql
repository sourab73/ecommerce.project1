-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2020 at 01:50 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estore`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_information`
--

CREATE TABLE `category_information` (
  `ItemName` varchar(50) DEFAULT NULL,
  `CatID` varchar(50) NOT NULL,
  `CatName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_information`
--

INSERT INTO `category_information` (`ItemName`, `CatID`, `CatName`) VALUES
('Clothes', 'cat-001', 'Sharee'),
('Shoes', 'cat-002', 'Casual'),
('Electric', 'cat-003', 'Smart TV'),
('Clothes', 'cat-004', 'Shirt'),
('Clothes', 'cat-005', 'Jeans Pants');

-- --------------------------------------------------------

--
-- Table structure for table `item_information`
--

CREATE TABLE `item_information` (
  `ItemId` varchar(20) NOT NULL,
  `ItemName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_information`
--

INSERT INTO `item_information` (`ItemId`, `ItemName`) VALUES
('001', 'Clothes'),
('002', 'Shoes'),
('003', 'Electric');

-- --------------------------------------------------------

--
-- Table structure for table `order_form`
--

CREATE TABLE `order_form` (
  `session_id` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `pass` varchar(20) NOT NULL,
  `con_pass` varchar(20) NOT NULL,
  `shipment` varchar(50) NOT NULL,
  `order_date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_form`
--

INSERT INTO `order_form` (`session_id`, `name`, `email`, `phone`, `address`, `pass`, `con_pass`, `shipment`, `order_date`) VALUES
('123dasd', 'sourab', 's@gmail.com', '018971283', 'chittagong', '123', '123', 'bus', '12/8/2020'),
('3fmbkf3o5i3407p7hh3oquklj0', 'sumi', 'sourabcse73@gmail.com', '01858410333', 'chittagong', '2323', '2323', 'option2', '2020/09/12 09:4'),
('3fsdf', 'onnesa', 'onnesa@gmail.com', '01856443', 'feni', '123', '123', 'Courier', '13/9/2020'),
('9pov2qvj7sa2uius7skfkuj4a9', 'sourab', 'sourabcse73@gmail.com', '01858410333', 'chittagong', '222', '222', 'option2', '2020/09/13 01:5'),
('ddsad32', 'sss', 's@gmail.com', '018652765', 'feni', '444', '444', 'car', '13/9/2020'),
('eeqwewe23', 'Saima', 's@gmail.com', '09875643', 'feni', '123', '123', 'transport', '12/7/2020'),
('iacdf7ce4csregtmr0l751juk3', 'sourab', 'ff@gmail.com', '01858410333', 'fsdfgsdgs', '009', '009', 'option1', '2020/09/12 07:3'),
('sdsd4', 'karim', 'sd@gmail.com', '45634', 'sdfsdf', '444', '444', 'fddf', '12/12/2020'),
('splaop6v9ooknf5smaqmn50pdt', 'sourab', 'sourabcse73@gmail.com', '01858410333', 'dhaka', '22', '22', 'option2', '2020/09/12 09:2');

-- --------------------------------------------------------

--
-- Table structure for table `product_information`
--

CREATE TABLE `product_information` (
  `item_name` varchar(50) DEFAULT NULL,
  `catagory_name` varchar(50) DEFAULT NULL,
  `product_id` varchar(30) NOT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_price` int(20) DEFAULT NULL,
  `product_stock` int(20) DEFAULT NULL,
  `product_details` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_information`
--

INSERT INTO `product_information` (`item_name`, `catagory_name`, `product_id`, `product_name`, `product_price`, `product_stock`, `product_details`) VALUES
('Clothes', 'Sharee', '001', 'Print Sharee', 1200, 50, '100%  suti & Soft.Total 12 hat long'),
('Clothes', 'Sharee', '002', 'Jamdhani Sharee', 2000, 20, ' 100% jamdhani sharee .Very Soft '),
('Clothes', 'Sharee', '004', 'Batik Sharee', 2500, 20, ' 100% Cotton looking Good.'),
('Clothes', 'Shirt', '005', 'New Style Shirt', 1200, 20, ' Full Hata long, Soft Shirt.100% shuti'),
('Clothes', 'Shirt', '006', 'Summer Shirt', 1300, 20, ' 100% Suti, Soft and color Gurante'),
('Clothes', 'Shirt', '007', 'Formal Shirt', 1200, 100, '  100% Suti, Soft and color Gurante');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_card`
--

CREATE TABLE `shopping_card` (
  `product_id` varchar(30) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` varchar(30) NOT NULL,
  `product_quantity` varchar(20) NOT NULL,
  `session_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopping_card`
--

INSERT INTO `shopping_card` (`product_id`, `product_name`, `product_price`, `product_quantity`, `session_id`) VALUES
('001', 'Print Sharee', '1200', '1', '07s44gh2r3o1uu90rtbcqhfntm'),
('007', 'Formal Shirt', '1200', '3', 'dgbk8kker9rhhgiip8c7dvug0b'),
('006', 'Summer Shirt', '1300', '2', 'dgbk8kker9rhhgiip8c7dvug0b'),
('001', 'Print Sharee', '1200', '3', 'atmch4t2bd0682u5nb834k191k'),
('002', 'Jamdhani Sharee', '2000', '1', 'atmch4t2bd0682u5nb834k191k'),
('001', 'Print Sharee', '1200', '3', 'ghi4g72u4ike542lgjdulq0vjd'),
('002', 'Jamdhani Sharee', '2000', '1', 'iacdf7ce4csregtmr0l751juk3'),
('001', 'Print Sharee', '1200', '3', 'splaop6v9ooknf5smaqmn50pdt'),
('002', 'Jamdhani Sharee', '2000', '2', '3fmbkf3o5i3407p7hh3oquklj0'),
('001', 'Print Sharee', '1200', '3', 'f8mpbmlp4b6relt97h83e640fb'),
('006', 'Summer Shirt', '1300', '3', 'dh3j2e2cear1oeis4un73qvk76'),
('004', 'Batik Sharee', '2500', '1', 'i4ohvih2b6dqb5037ou53llc9p'),
('007', 'Formal Shirt', '1200', '1', '8qmev5j3acsk1l5esl5hcg14d8'),
('005', 'New Style Shirt', '1200', '2', '9pov2qvj7sa2uius7skfkuj4a9'),
('005', 'New Style Shirt', '1200', '1', '9pov2qvj7sa2uius7skfkuj4a9'),
('001', 'Print Sharee', '1200', '2', '9pov2qvj7sa2uius7skfkuj4a9'),
('001', 'Print Sharee', '1200', '1', 'smqd2rhl6sf11hk688udvr3u32'),
('001', 'Sharee', '1200', '1', 'g3qahscnbmlcd7asf5d5ep6000');

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` int(20) NOT NULL,
  `Confirm_Password` varchar(30) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`name`, `email`, `password`, `Confirm_Password`, `type`) VALUES
('jasim', 'fgfg@gmail.com', 222, '222', 'Sub Admin');

-- --------------------------------------------------------

--
-- Table structure for table `special_offer`
--

CREATE TABLE `special_offer` (
  `category_name` varchar(10) NOT NULL,
  `item_name` varchar(10) NOT NULL,
  `pdt_details` text NOT NULL,
  `pdt_id` int(11) NOT NULL,
  `pdt_name` varchar(10) NOT NULL,
  `pdt_price` varchar(15) NOT NULL,
  `pdt_stock` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_information`
--
ALTER TABLE `category_information`
  ADD PRIMARY KEY (`CatID`);

--
-- Indexes for table `item_information`
--
ALTER TABLE `item_information`
  ADD PRIMARY KEY (`ItemId`);

--
-- Indexes for table `order_form`
--
ALTER TABLE `order_form`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `product_information`
--
ALTER TABLE `product_information`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `special_offer`
--
ALTER TABLE `special_offer`
  ADD PRIMARY KEY (`pdt_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
