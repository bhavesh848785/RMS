-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2022 at 05:33 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `billingaddress`
--

CREATE TABLE `billingaddress` (
  `address_id` int(11) NOT NULL,
  `fname` varchar(222) NOT NULL,
  `lname` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `contact` varchar(222) NOT NULL,
  `address` varchar(222) NOT NULL,
  `city` varchar(222) NOT NULL,
  `state` varchar(222) NOT NULL,
  `country` varchar(222) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `table_id` int(10) NOT NULL,
  `create_date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billingaddress`
--

INSERT INTO `billingaddress` (`address_id`, `fname`, `lname`, `email`, `contact`, `address`, `city`, `state`, `country`, `customer_id`, `order_id`, `table_id`, `create_date_time`) VALUES
(1, 'Ajay', 'Koshti', 'abkoshti93@gmail.com', '9898184847', 'Isanpur Ahmedabad', 'Ahmedabad', 'Gujrat', 'IN', 1, 1, 0, '2022-02-12 20:49:13'),
(2, 'Ajay', 'Koshti', 'abkoshti93@gmail.com', '9898184847', 'Isanpur Ahmedabad', 'Ahmedabad', 'Gujrat', 'IN', 2, 1, 0, '2022-02-13 11:13:28'),
(3, 'Alkesh', 'Kaba', 'Alkesh@gmail.com', '9016647480', 'Bhaktinagar,Ahmedabad', 'Ahmedabad', 'Gujrat', 'IN', 3, 1, 0, '2022-02-13 11:16:44'),
(4, 'nainesh', 'vaghela', 'nainesh@gmail.com', '8140551111', 'nadiad', 'nadiad', 'gujrat', 'IN', 4, 2, 0, '2022-02-19 12:11:50'),
(5, 'nainesh', 'vaghela', 'nainesh@gmail.com', '6353805608', 'Abd', 'Ahmedabad', 'gujrat', 'IN', 5, 2, 0, '2022-02-19 15:50:35'),
(6, 'nainesh', 'vaghela', 'nainesh@gmail.com', '1234567890', 'abd', 'Ahmedabad', 'gujrat', 'IN', 6, 2, 0, '2022-02-19 20:12:13'),
(7, 'nainesh', 'vaghela', 'nainesh@gmail.com', '1234567890', 'abd', 'Ahmedabad', 'gujrat', 'IN', 7, 2, 0, '2022-02-19 20:12:40'),
(8, 'nainesh', 'vaghela', 'nainesh@gmail.com', '1234567809', 'abd', 'Ahmedabad', 'gujrat', 'IN', 8, 2, 0, '2022-02-19 20:13:26'),
(9, 'nainesh', 'vaghela', 'nainesh@gmail.com', '6353805608', 'Abd', 'Ahmedabad', 'gujrat', 'IN', 9, 2, 0, '2022-02-19 20:25:59'),
(10, 'nainesh', 'vaghela', 'nainesh@gmail.com', '6353805608', 'Abd', 'Ahmedabad', 'gujrat', 'IN', 10, 2, 0, '2022-02-19 20:26:11'),
(11, 'nainesh', 'vaghela', 'nainesh@gmail.com', '6353805608', 'Abd', 'Ahmedabad', 'gujrat', 'IN', 11, 2, 0, '2022-02-19 20:38:21'),
(12, 'Harsh', 'Parmar', 'parmarharsh901@gmail.com', '6353805608', 'Ahmedabad', 'Ahmedabad', 'Gujarat', 'IN', 12, 3, 0, '2022-02-19 21:28:15'),
(13, 'Harsh', 'Parmar', 'parmarharsh901@gmail.com', '6353805608', 'Abd', 'Ahmedabad', 'Gujarat', 'IN', 13, 3, 0, '2022-02-19 21:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `price` varchar(123) NOT NULL,
  `qty` varchar(123) NOT NULL,
  `pimg` varchar(156) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `pname`, `price`, `qty`, `pimg`, `customer_id`) VALUES
(21, 13, 'Masala-chaas', '40', '1', 'masala-chaas-1.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `create_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `modify_date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `create_date_time`, `modify_date_time`) VALUES
(1, 'Punjabi', '2022-02-07 21:20:21', NULL),
(2, 'Gujarati', '2022-02-07 21:20:28', NULL),
(3, 'rajsthan', '2022-02-19 12:06:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `email`, `contact`, `address`, `gender`, `password`, `create_date`) VALUES
(1, 'Ajay', 'abkoshti93@gmail.com', '9898184847', 'Isanpur Maninagar Ahmedabad', 'male', '123456', '2022-02-07 22:27:59'),
(2, 'nainesh1', 'nainesh@gmail.com', '8140551111', 'nadiadbvbs ', 'male', '1234', '2022-02-19 12:09:55'),
(3, 'Harsh', 'parmarharsh901@gmail.com', '6353805608', 'Shahibaag, Ahmedabad', 'male', 'Harsh@2064', '2022-02-19 21:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `message`, `date`) VALUES
(1, 2, 'helo', '2022-02-19 12:25:21'),
(2, 2, 'Nice', '2022-02-19 13:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(11) NOT NULL,
  `category_id` int(10) NOT NULL,
  `dish_name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `create_date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `category_id`, `dish_name`, `description`, `image`, `price`, `create_date_time`) VALUES
(1, 1, 'Achari-bhindi', 'achari bhindi Subji', 'achari-bhindi-2.jpg', 210, '2022-02-07 21:21:18'),
(2, 1, 'Aloo-chana', 'aloo-chana sabji', 'aloo-chana-recipe-2.jpg', 120, '2022-02-07 21:22:00'),
(3, 1, 'Chole-recipe', 'Chole Sabji', 'chole-recipe-1.jpg', 100, '2022-02-07 21:22:52'),
(4, 1, 'Dahi-vada', 'Dahi-vada', 'dahi-vada-2.jpg', 240, '2022-02-07 21:23:24'),
(5, 1, 'instant-pot-kala-chana', 'instant-pot-kala-chana', 'instant-pot-kala-chana-2.jpg', 210, '2022-02-07 21:23:58'),
(6, 1, 'kadai-paneer', 'kadai-paneer Sabji', 'kadai-paneer-2.jpg', 210, '2022-02-07 21:24:36'),
(7, 1, 'malai-kofta', 'malai-kofta Sabji', 'malai-kofta-1.jpg', 310, '2022-02-07 21:25:02'),
(8, 2, 'Basundi-recipe', 'basundi-recipe-1', 'basundi-recipe-1.jpg', 350, '2022-02-07 21:26:24'),
(9, 2, 'Dal-vada', 'dal-vada', 'dal-vada-recipe-2.jpg', 110, '2022-02-07 21:26:49'),
(10, 2, 'Gujarati-dal', 'Gujarati-dal', 'Gujarati-dal-1.jpg', 210, '2022-02-07 21:27:11'),
(11, 2, 'Gujarati-kadhi', 'gujarati-kadhi', 'gujarati-kadhi-recipe-1.jpg', 410, '2022-02-07 21:27:38'),
(12, 2, 'Mango-pickle', 'mango-pickle', 'mango-pickle-2.jpg', 300, '2022-02-07 21:28:12'),
(13, 2, 'Masala-chaas', 'masala-chaas', 'masala-chaas-1.jpg', 40, '2022-02-07 21:28:58'),
(14, 2, 'Sabudana-khichdi', 'sabudana-khichdi', 'sabudana-khichdi-2.jpg', 210, '2022-02-07 21:29:34'),
(15, 3, 'rajsthan 1', 'hello', 'bg-5.png', 123, '2022-02-19 12:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `login_history_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `start_date_time` datetime NOT NULL,
  `create_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `logout_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`login_history_id`, `login_id`, `start_date_time`, `create_date_time`, `logout_date_time`) VALUES
(1, 1, '2022-01-28 22:52:42', '2022-01-28 22:52:42', '2022-02-06 22:38:01'),
(2, 1, '2022-01-28 22:57:34', '2022-01-28 22:57:34', '2022-01-28 22:58:03'),
(3, 1, '2022-01-28 23:04:58', '2022-01-28 23:04:58', '0000-00-00 00:00:00'),
(4, 1, '2022-01-30 17:09:58', '2022-01-30 17:09:58', '0000-00-00 00:00:00'),
(5, 1, '2022-01-30 17:45:21', '2022-01-30 17:45:21', '2022-01-30 19:29:48'),
(6, 1, '2022-01-30 19:29:57', '2022-01-30 19:29:57', '2022-01-30 20:23:23'),
(7, 1, '2022-01-30 20:23:30', '2022-01-30 20:23:30', '0000-00-00 00:00:00'),
(8, 1, '2022-01-30 20:58:01', '2022-01-30 20:58:01', '0000-00-00 00:00:00'),
(9, 1, '2022-01-30 21:02:40', '2022-01-30 21:02:40', '2022-01-30 21:06:32'),
(10, 1, '2022-01-30 21:06:40', '2022-01-30 21:06:40', '0000-00-00 00:00:00'),
(11, 1, '2022-01-30 22:06:07', '2022-01-30 22:06:07', '0000-00-00 00:00:00'),
(12, 1, '2022-01-30 22:30:54', '2022-01-30 22:30:54', '0000-00-00 00:00:00'),
(13, 1, '2022-01-30 22:32:07', '2022-01-30 22:32:07', '0000-00-00 00:00:00'),
(14, 1, '2022-01-30 22:45:50', '2022-01-30 22:45:50', '0000-00-00 00:00:00'),
(15, 1, '2022-01-31 21:32:45', '2022-01-31 21:32:45', '0000-00-00 00:00:00'),
(16, 1, '2022-01-31 21:34:17', '2022-01-31 21:34:17', '0000-00-00 00:00:00'),
(17, 1, '2022-01-31 22:41:53', '2022-01-31 22:41:53', '0000-00-00 00:00:00'),
(18, 1, '2022-01-31 22:47:03', '2022-01-31 22:47:03', '0000-00-00 00:00:00'),
(19, 1, '2022-01-31 23:03:24', '2022-01-31 23:03:24', '0000-00-00 00:00:00'),
(20, 1, '2022-02-01 20:52:26', '2022-02-01 20:52:26', '0000-00-00 00:00:00'),
(21, 1, '2022-02-03 22:27:57', '2022-02-03 22:27:57', '0000-00-00 00:00:00'),
(22, 1, '2022-02-04 20:37:40', '2022-02-04 20:37:40', '0000-00-00 00:00:00'),
(23, 1, '2022-02-04 21:11:59', '2022-02-04 21:11:59', '0000-00-00 00:00:00'),
(24, 1, '2022-02-04 21:26:11', '2022-02-04 21:26:11', '0000-00-00 00:00:00'),
(25, 1, '2022-02-04 21:37:46', '2022-02-04 21:37:46', '0000-00-00 00:00:00'),
(26, 1, '2022-02-04 23:03:56', '2022-02-04 23:03:56', '0000-00-00 00:00:00'),
(27, 1, '2022-02-06 09:49:40', '2022-02-06 09:49:40', '0000-00-00 00:00:00'),
(28, 1, '2022-02-06 09:53:04', '2022-02-06 09:53:04', '0000-00-00 00:00:00'),
(29, 1, '2022-02-06 10:04:35', '2022-02-06 10:04:35', '0000-00-00 00:00:00'),
(30, 1, '2022-02-06 10:50:46', '2022-02-06 10:50:46', '0000-00-00 00:00:00'),
(31, 1, '2022-02-06 21:38:16', '2022-02-06 21:38:16', '0000-00-00 00:00:00'),
(32, 1, '2022-02-06 22:27:21', '2022-02-06 22:27:21', '0000-00-00 00:00:00'),
(33, 1, '2022-02-06 22:29:59', '2022-02-06 22:29:59', '0000-00-00 00:00:00'),
(34, 1, '2022-02-07 21:06:26', '2022-02-07 21:06:26', '0000-00-00 00:00:00'),
(35, 1, '2022-02-12 20:40:01', '2022-02-12 20:40:01', '0000-00-00 00:00:00'),
(36, 1, '2022-02-13 11:30:45', '2022-02-13 11:30:45', '0000-00-00 00:00:00'),
(37, 1, '2022-02-14 22:57:56', '2022-02-14 22:57:56', '0000-00-00 00:00:00'),
(38, 1, '2022-02-19 12:05:42', '2022-02-19 12:05:42', '0000-00-00 00:00:00'),
(39, 1, '2022-02-19 12:25:58', '2022-02-19 12:25:58', '0000-00-00 00:00:00'),
(40, 1, '2022-02-19 13:06:04', '2022-02-19 13:06:04', '0000-00-00 00:00:00'),
(41, 1, '2022-02-19 15:49:00', '2022-02-19 15:49:00', '0000-00-00 00:00:00'),
(42, 1, '2022-02-19 20:26:31', '2022-02-19 20:26:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `date`, `customer_id`, `total_amount`, `status`) VALUES
(1, '2022-02-12', 1, '740', 'pending'),
(2, '2022-02-13', 1, '1170', 'completed'),
(3, '2022-02-13', 1, '1960', 'completed'),
(4, '2022-02-19', 2, '210', 'pending'),
(5, '2022-02-19', 2, '543', 'pending'),
(6, '2022-02-19', 2, '210', 'pending'),
(7, '2022-02-19', 2, '210', 'pending'),
(8, '2022-02-19', 2, '210', 'pending'),
(9, '2022-02-19', 2, '210', 'pending'),
(10, '2022-02-19', 2, '210', 'completed'),
(11, '2022-02-19', 2, '40', 'pending'),
(12, '2022-02-19', 3, '40', 'pending'),
(13, '2022-02-19', 3, '40', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_items_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_items_id`, `product_id`, `quantity`, `order_id`, `pname`, `price`) VALUES
(1, 1, 3, 1, 'Achari-bhindi', '630.00'),
(2, 9, 1, 1, 'Dal-vada', '110.00'),
(3, 13, 1, 2, 'Masala-chaas', '40.00'),
(4, 14, 2, 2, 'Sabudana-khichdi', '420.00'),
(5, 10, 1, 2, 'Gujarati-dal', '210.00'),
(6, 14, 2, 3, 'Sabudana-khichdi', '420.00'),
(7, 13, 5, 3, 'Masala-chaas', '200.00'),
(8, 12, 1, 3, 'Mango-pickle', '300.00'),
(9, 6, 1, 4, 'kadai-paneer', '210.00'),
(10, 6, 1, 5, 'kadai-paneer', '210.00'),
(11, 15, 1, 5, 'rajsthan 1', '123.00'),
(12, 6, 1, 6, 'kadai-paneer', '210.00'),
(13, 6, 1, 7, 'kadai-paneer', '210.00'),
(14, 1, 1, 8, 'Achari-bhindi', '210.00'),
(15, 1, 1, 9, 'Achari-bhindi', '210.00'),
(16, 1, 1, 10, 'Achari-bhindi', '210.00'),
(17, 13, 1, 11, 'Masala-chaas', '40.00'),
(18, 13, 1, 12, 'Masala-chaas', '40.00'),
(19, 13, 1, 13, 'Masala-chaas', '40.00');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registration_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `user_type` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `create_date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registration_id`, `first_name`, `last_name`, `emailid`, `user_type`, `password`, `create_date_time`) VALUES
(1, 'Ajay', 'Koshti', 'abkoshti93@gmail.com', 'Admin', '123', '2022-01-28 23:13:02'),
(2, 'Abkoshti', 'abkoshti', 'abkoshti@gmail.com', 'Executive', '1234', '2022-01-28 23:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_id` int(11) NOT NULL,
  `table_no` int(5) NOT NULL,
  `capacity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `table_no`, `capacity`) VALUES
(1, 1, 10),
(2, 2, 12),
(3, 3, 8),
(4, 4, 16),
(5, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `table_booking`
--

CREATE TABLE `table_booking` (
  `booking_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` tinyint(1) NOT NULL,
  `table_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_booking`
--

INSERT INTO `table_booking` (`booking_id`, `userid`, `date`, `time`, `status`, `table_id`) VALUES
(1, 2, '2022-02-25', '14:19:00', 0, 2),
(2, 2, '2022-02-25', '14:19:00', 0, 2),
(3, 2, '2022-02-24', '12:22:00', 0, 4),
(4, 2, '2022-02-23', '12:25:00', 0, 5),
(5, 2, '2022-02-23', '14:12:00', 0, 3),
(6, 2, '2022-02-24', '14:12:00', 0, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billingaddress`
--
ALTER TABLE `billingaddress`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`login_history_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_items_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`registration_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `table_booking`
--
ALTER TABLE `table_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billingaddress`
--
ALTER TABLE `billingaddress`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `login_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_booking`
--
ALTER TABLE `table_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
