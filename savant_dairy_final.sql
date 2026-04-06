-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2025 at 09:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `savantdairy`
--
CREATE DATABASE IF NOT EXISTS `savantdairy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `savantdairy`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
-- Creation: Apr 09, 2025 at 06:29 PM
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(1, 'admin', 'admin123', 'admin@gmail.com', '', '2021-04-07 03:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--
-- Creation: Apr 09, 2025 at 06:29 PM
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE `bill` (
  `billid` int(11) NOT NULL,
  `grandtotal` float NOT NULL,
  `datetime` datetime NOT NULL,
  `paymentmethod` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zipcode` int(6) NOT NULL,
  `address` text NOT NULL,
  `remarks` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `trackingid` int(6) DEFAULT NULL,
  `companyname` varchar(100) DEFAULT NULL,
  `trackingurl` varchar(300) DEFAULT NULL,
  `trackremarks` text DEFAULT NULL,
  `personreceived` varchar(100) DEFAULT NULL,
  `returnremarks` text DEFAULT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`billid`, `grandtotal`, `datetime`, `paymentmethod`, `city`, `zipcode`, `address`, `remarks`, `status`, `trackingid`, `companyname`, `trackingurl`, `trackremarks`, `personreceived`, `returnremarks`, `email`) VALUES
(16, 92.5, '2022-05-16 23:56:29', 'cash', 'Amritsar', 143001, 'new mohindra colony', 'hello', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'ps270158@gmail.com'),
(18, 59.15, '2025-03-21 07:31:19', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'smore@gmail.com'),
(19, 59.15, '2025-03-21 07:31:21', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'smore@gmail.com'),
(20, 59.15, '2025-03-21 07:35:26', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(21, 59.15, '2025-03-21 07:37:30', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(22, 59.15, '2025-03-21 07:42:35', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(23, 59.15, '2025-03-21 07:45:49', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(24, 59.15, '2025-03-21 07:46:16', 'cash', 'Washim', 400604, 'rterer', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(25, 59.15, '2025-03-21 07:50:16', 'cash', 'Washim', 400604, 'rterer', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(26, 59.15, '2025-03-21 08:06:25', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(27, 59.15, '2025-03-21 08:11:07', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(28, 59.15, '2025-03-21 08:11:09', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(29, 59.15, '2025-03-21 08:27:30', 'cash', 'Bhandara', 304209, 'vartak nagar', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(30, 59.15, '2025-03-21 08:32:29', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(31, 59.15, '2025-03-21 08:32:31', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(32, 59.15, '2025-03-21 08:32:52', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(33, 59.15, '2025-03-21 08:33:30', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(34, 59.15, '2025-03-21 08:33:31', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(35, 59.15, '2025-03-21 08:34:15', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(36, 59.15, '2025-03-21 08:34:17', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(37, 59.15, '2025-03-21 08:34:56', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(38, 59.15, '2025-03-21 08:34:58', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(39, 59.15, '2025-03-21 08:36:47', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(40, 59.15, '2025-03-21 08:37:15', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(41, 59.15, '2025-03-21 08:37:57', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(42, 59.15, '2025-03-21 08:40:38', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(43, 59.15, '2025-03-21 08:44:22', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(44, 59.15, '2025-03-21 08:44:37', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(45, 59.15, '2025-03-21 08:44:39', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(46, 59.15, '2025-03-21 08:44:47', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(47, 59.15, '2025-03-21 08:44:49', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(48, 59.15, '2025-03-21 08:45:01', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(49, 59.15, '2025-03-21 08:46:19', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(50, 0, '2025-03-21 08:46:21', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(51, 0, '2025-03-21 08:46:22', '', '', 0, '', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(52, 51.14, '2025-03-21 08:47:55', 'cash', 'Thane', 400601, 'kalwa', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(53, 58.5, '2025-03-21 09:04:01', 'cash', 'Thane', 400601, 'shreerang society h2', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'Anushka Chavan'),
(54, 189, '2025-03-21 13:29:01', 'cash', 'Thane', 400601, 'majiwada thane west', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'Heena'),
(55, 24.5, '2025-04-01 15:59:43', 'cash', 'Amravati', 400601, 'thane', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'tushar'),
(56, 125, '2025-04-03 18:30:48', 'cash', 'Sindhudurg', 400405, 'Vaibhavadi House 23', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'Jasmine'),
(57, 0, '2025-04-11 10:08:27', 'cash', 'Thane', 400601, 'thane', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'Jasmine'),
(58, 26.04, '2025-04-11 10:10:12', 'cash', 'Mumbai City', 400602, 'Andheri', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'admin'),
(59, 23.75, '2025-04-11 10:11:55', 'cash', 'Ratnagiri', 400601, 'tstc', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'admin'),
(60, 106.79, '2025-04-11 10:57:30', 'cash', 'Pune', 412306, 'baramati', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'Jasmine'),
(61, 26.04, '2025-04-11 11:23:11', 'cash', 'Thane', 400601, 'thane', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'Jasmine'),
(62, 186, '2025-04-17 12:06:56', 'cash', 'Mumbai City', 421004, 'kasarvadavali thane', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'Jasmine'),
(63, 26.04, '2025-04-29 12:03:44', 'cash', 'Thane', 412306, 'thane', '', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, 'Jasmine');

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--
-- Creation: Apr 09, 2025 at 06:29 PM
--

DROP TABLE IF EXISTS `bill_details`;
CREATE TABLE `bill_details` (
  `id` int(11) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `netprice` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `billid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`id`, `price`, `discount`, `netprice`, `quantity`, `productid`, `billid`) VALUES
(1, 25, 2, 24.5, 1, 12, 48),
(22, 70, 40, 42, 1, 58, 15),
(23, 100, 10, 90, 1, 60, 15),
(24, 60, 25, 45, 1, 65, 16),
(25, 50, 5, 47.5, 1, 66, 16),
(26, 20, 5, 19, 7, 67, 17),
(27, 60, 25, 45, 1, 65, 17),
(28, 50, 5, 47.5, 1, 66, 17),
(29, 25, 2, 24.5, 1, 12, 49),
(30, 35, 1, 34.65, 1, 13, 49),
(31, 17, 3, 16.49, 1, 22, 52),
(32, 35, 1, 34.65, 1, 13, 52),
(33, 65, 10, 58.5, 1, 16, 53),
(34, 25, 2, 24.5, 5, 12, 54),
(35, 70, 5, 66.5, 1, 17, 54),
(36, 25, 2, 24.5, 1, 12, 55),
(37, 650, 100, 0, 1, 15, 56),
(38, 65, 10, 58.5, 1, 16, 56),
(39, 70, 5, 66.5, 1, 17, 56),
(40, 650, 100, 0, 1, 15, 57),
(41, 28, 7, 26.04, 1, 11, 58),
(42, 25, 5, 23.75, 1, 20, 59),
(43, 85, 5, 80.75, 1, 10, 60),
(44, 28, 7, 26.04, 1, 11, 60),
(45, 28, 7, 26.04, 1, 11, 61),
(46, 85, 5, 80.75, 2, 10, 62),
(47, 25, 2, 24.5, 1, 12, 62),
(48, 28, 7, 26.04, 1, 11, 63);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--
-- Creation: Apr 09, 2025 at 06:29 PM
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `categories` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `catphoto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories`, `description`, `catphoto`) VALUES
('Dairy', 'Milk items', 'uploads/product-1-PARSHW.jpg'),
('Ghee', 'Contains Ghee', 'uploads/A2 Ghee.jpg'),
('Paneer and Khava', 'Contains Paneer and Khava', 'uploads/Paneer.jpg'),
('Sweet Desserts', 'Flavorful desserts ', 'uploads/Fruitkhand.jpg'),
('Beverages', 'Sweet dairy beverages', 'uploads/Lassi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--
-- Creation: Apr 09, 2025 at 06:29 PM
--

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE `contactus` (
  `queryid` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `message` varchar(300) NOT NULL,
  `return_message` varchar(300) DEFAULT 'noooo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`queryid`, `email`, `message`, `return_message`) VALUES
(10, 'ps270158@gmail.com', 'hello admin i have a problem', 'we will sort your problem ');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--
-- Creation: Apr 09, 2025 at 06:29 PM
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `productid` int(10) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `stock` int(10) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `categoryname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `productname`, `price`, `discount`, `stock`, `photo`, `description`, `categoryname`) VALUES
(10, 'A2 Milk 1L', 85, 5, 10, 'uploads/product-1-PARSHW.jpg', 'a2 milk 1 litre', 'Dairy'),
(11, 'Q.milk Half L.', 28, 7, 8, 'uploads/Q.milk.jpeg', 'q milk', 'Dairy'),
(12, 'C. milk Half L.', 25, 2, 11, 'uploads/Q.milk.jpeg', 'Cow milk half litre', 'Dairy'),
(13, 'F. milk Half L.', 35, 1, 18, 'uploads/Q.milk.jpeg', 'Buffalo Fat milk', 'Dairy'),
(14, 'A2 Ghee 1L', 1250, 250, 18, 'uploads/A2 Ghee.jpg', 'Pure Cow Ghee', 'Dairy'),
(15, 'R Ghee 1L', 650, 100, 11, 'uploads/R Ghee.jpg', 'Pure R ghee', 'Dairy'),
(16, 'Shrikhand 200gm', 65, 10, 9, 'uploads/Shrikhand.jpg', 'Sweet shrikhand', 'Dairy'),
(17, 'Amrakhand 200gm', 70, 5, 8, 'uploads/Amrakhand.jpg', 'Fresh mango amrakhand', 'Dairy'),
(18, 'Dryfruit Basundi 200gm', 70, 15, 10, 'uploads/D Basundi.jpg', 'Dryfruit Basundi', 'Dairy'),
(19, 'Fruitkhand 200gm', 70, 5, 10, 'uploads/Fruitkhand.jpg', 'Mixed fruit fruitkhand', 'Dairy'),
(20, 'Lassi 1 cup', 25, 5, 9, 'uploads/Lassi.jpg', 'Fresh sweet lassi', 'Dairy'),
(21, 'Buttermilk 1 cup', 18, 2, 10, 'uploads/Tak.jpg', 'Fresh creamy buttermilk', 'Dairy'),
(22, 'Dahi 200gm', 17, 3, 9, 'uploads/Dahi.jpg', 'Fresh curd', 'Dairy'),
(24, 'Paneer 200gm', 75, 10, 10, 'uploads/Paneer.jpg', 'Paneer full of protein', 'Dairy'),
(25, 'Khava 250gm', 80, 5, 10, 'uploads/Khava.jpg', 'Khava', 'Dairy');

-- --------------------------------------------------------

--
-- Table structure for table `productphoto`
--
-- Creation: Apr 09, 2025 at 06:29 PM
--

DROP TABLE IF EXISTS `productphoto`;
CREATE TABLE `productphoto` (
  `id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `caption` text NOT NULL,
  `productid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--
-- Creation: Apr 09, 2025 at 06:29 PM
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `stockid` int(11) NOT NULL,
  `qty` float NOT NULL,
  `expiry` date NOT NULL,
  `dateofpurchase` date NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Apr 09, 2025 at 06:29 PM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `email`, `password`, `phone`, `date`) VALUES
(1, 'Shrawani', 'shrawani.more@gmail.com', '$2y$10$f2KFpIVE7I2OnqRseduM6eOHA4qHrnlGDlH14TFtbhUvMn8S.Pyci', '96546342111', '2025-02-18 09:42:36'),
(2, 'Priti', 'priti.more@gmail.com', '$2y$10$Uha4lXILUme/OntoL2n3wu1C5oHZnJWXyKgEjau6NlczH5WpfCxAS', '2443552311', '2025-02-18 09:54:58'),
(3, 'ganesh', 'ganeshamore@hotmail.com', '$2y$10$N2ll5IQ2MCbCC0PZKiMvAeqeaSfuSV4b2eRxOX4H99VzwhVxniLtO', '43543655465', '2025-02-24 18:57:01'),
(4, 'lalita', 'lalitaukkalkar@gmail.com', '$2y$10$2ZpsTKaPVe/frSVH/mNvQ.iAL3msOHiDUU3s3lrS6XrvT8QW7TnFm', '1245436999', '2025-02-24 18:59:07'),
(5, 'durva', 'durva.more@gmail.com', '$2y$10$cOKWqjDRGPCQYjQFWLmZcOCcxwPmTLBZj/VBTeTmXI0.J/2Aamrs6', '1235648997', '2025-02-26 04:23:23'),
(6, 'john', 'johndoe@gmail.com', '$2y$10$1tF1.19o5u6LHh/lYKXrhOMWlyGtkEDtzm.mKuRIKRP66MYIvqfYK', '1233211328', '2025-02-26 07:11:07'),
(7, 'sara', 'sara123@gmail.com', '$2y$10$W9Ivikj1srcW.baGOAbfFeCrv6YAoKZhO3MpC1JUFzLzBBi1T1hlq', '3537887878', '2025-03-14 10:07:51'),
(8, 'Vedika', 'vedika19@gmail.com', '$2y$10$rltb4iFNokbPeuRIS7AM8.29hqbPBfeJCWUFRboZX1A49mehufL3y', '38766554431', '2025-03-14 14:41:05'),
(9, 'surekha', 'surekha21@gmail.com', '$2y$10$IDzkVmSMUxzDqZ0uEA1dsuVCY4dhcXmar7WogpM18H2dYma3HIRpm', '2324242201', '2025-03-14 14:48:48'),
(10, 'Sneha', 'sneha@gmail.com', '$2y$10$gfUP96s5FkjQ8E0o8DxaVuBWJdkqcDhJWJcTxa8JCYlU/xYxvRaDe', '4326665656', '2025-03-14 14:55:04'),
(11, 'anushka', 'anushka24@gmail.com', '$2y$10$nLcMkenjiLAEXJYbZEjhA./Mf3pDWeoDIfM5u2XKdYKGywqwXvAYW', '8747653221', '2025-03-14 15:30:04'),
(12, 'tushar', 'tushar@gmail.com', '$2y$10$/6SQmqMV6nKwtSajQkSLx.NlDJBzolxilshmj74OxKerPR4LZXp2S', '8393262770', '2025-03-14 16:20:51'),
(13, 'Darshita', 'darshita123@gmail.com', '$2y$10$B3OAPfFomrO6Cwne2F..Zetlrna3neNCg.8iMGQC020feIZ2gZrAW', '4346570699', '2025-03-16 04:19:35'),
(14, 'Anushka Chavan', 'anushkac@gmail.com', '$2y$10$uv5ipXhnlSxJx9gxOyP3Ze0WjtUs3daLxfPUsJxoubyQz3E8NBPMq', '9865432172', '2025-03-21 03:32:26'),
(15, 'Heena', 'heena32@gmail.com', '$2y$10$qg5mBiHQpgK7IKk26urUZu9ZsPq7FalaL2Z4tRSY5X.8iy.GG1WzS', '3827676776', '2025-03-21 07:56:24'),
(16, 'Jasmine', 'jasmine123@gmail.com', '$2y$10$i1VFoym0JQ/fJjRmFmpjeekMulKE4lWFOVcGs5oS0fcbKfnZjhHQC', '2493988866', '2025-04-03 12:56:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`billid`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `billid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
