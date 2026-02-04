-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2026 at 11:27 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photography`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `image_name`) VALUES
(24, 'test', 'lol', 'Pic_Blog_701.png'),
(23, 'awdawd', 'wadwdw', 'Pic_Blog_537.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` mediumint(8) NOT NULL,
  `user_ID` mediumint(8) NOT NULL,
  `picture_id` mediumint(8) NOT NULL,
  `image_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 NOT NULL,
  `frame` varchar(10) CHARACTER SET utf8 NOT NULL,
  `quantity` smallint(100) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_ID`, `picture_id`, `image_name`, `type`, `frame`, `quantity`, `price`) VALUES
(4, 1, 99, 'Pic_Image_486.png', 'digital', 'no_frame', 1, '12.00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` mediumint(8) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `title`, `image_name`) VALUES
(46, 'Black and White', 'Pic_Category_552.JPG'),
(45, 'Wedding Photos', 'Pic_Category_574.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `message`) VALUES
(1, 'Hello', 'damndaniel@gmail.com', 'hello'),
(2, 'Grain of rice', 'Grain@grance', 'rice i love rice'),
(3, 'test full name', 'test@test', 'mesage');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` mediumint(8) NOT NULL,
  `delivery_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `delivery_name`) VALUES
(2, 'One Piece'),
(3, 'Naruto');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `form_id` mediumint(8) UNSIGNED NOT NULL,
  `user_ID` mediumint(8) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `email` varchar(80) NOT NULL,
  `company` varchar(20) DEFAULT NULL,
  `address1` varchar(40) NOT NULL,
  `address2` varchar(30) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(30) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `a_date` date NOT NULL,
  `a_time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`form_id`, `user_ID`, `fullname`, `email`, `company`, `address1`, `address2`, `city`, `country`, `postcode`, `phone`, `a_date`, `a_time`) VALUES
(17, 2, 'Alexander Surname', 'imaginary@gmail.com', '', 'first line', 'address2', 'New Vegas', 'MURICAAA', 'ame r1c4n', '07777777777', '2022-04-12', '12:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `likes_id` mediumint(8) UNSIGNED NOT NULL,
  `user_ID` mediumint(8) NOT NULL,
  `picture_id` mediumint(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`likes_id`, `user_ID`, `picture_id`) VALUES
(70, 1, 72),
(73, 1, 84),
(72, 2, 72);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` mediumint(8) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_num` int(12) NOT NULL,
  `user_ID` mediumint(8) NOT NULL,
  `fullname` varchar(40) CHARACTER SET utf8 NOT NULL,
  `email` varchar(80) CHARACTER SET utf8 NOT NULL,
  `address1` varchar(40) CHARACTER SET utf8 NOT NULL,
  `address2` varchar(30) CHARACTER SET utf8 NOT NULL,
  `picture_id` mediumint(8) NOT NULL,
  `quantity` smallint(100) NOT NULL,
  `frame` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `postcode` varchar(10) CHARACTER SET utf8 NOT NULL,
  `country` varchar(30) CHARACTER SET utf8 NOT NULL,
  `city` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(15) CHARACTER SET utf8 NOT NULL,
  `delivery` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `final_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `order_num`, `user_ID`, `fullname`, `email`, `address1`, `address2`, `picture_id`, `quantity`, `frame`, `type`, `price`, `postcode`, `country`, `city`, `phone`, `order_status`, `delivery`, `final_price`) VALUES
(130, '2022-04-09 16:22:19', 340724235, 1, 'Alex', 'alex@alex.com', 'final', 'proeifsf', 83, 1, 'no_frame', 'a4', '23.00', '', '', '123412312321312', '', 'not complete', 'one piece', '23.00'),
(132, '2022-04-12 00:03:34', 525517574, 1, 'Alexander Erturk', 'alex@alex.com', 'address1', 'town', 83, 1, 'no_frame', 'a3', '23.00', 'M11 8PP', 'United Kingdom', 'MANCHESTER', '07777777777', 'not complete', '', '23.00'),
(133, '2025-02-11 21:53:34', 436760021, 1, 'AlexTheGOAT', 'alex@alex.com', '', '', 99, 1, 'no_frame', 'digital', '12.00', '', '', '', '', 'not complete', 'Naruto', '12.00'),
(134, '2025-02-11 21:53:34', 436760021, 1, 'AlexTheGOAT', 'alex@alex.com', '', '', 100, 1, 'no_frame', 'digital', '56.00', '', '', '', '', 'not complete', 'Naruto', '56.00');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `picture_id` mediumint(8) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `status` smallint(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`picture_id`, `title`, `desc`, `price`, `image_name`, `category_id`, `status`) VALUES
(99, 'Woman', 'Black and white image of a woman.', '12.00', 'Pic_Image_486.png', 46, 54),
(100, 'Bridge', 'Black and white image of a bridge.', '56.00', 'Pic_Image_739.png', 46, 23),
(97, 'Flower', 'Wedding flower that gives you Gear 5 - Nika Man (Sun God)', '1.00', 'Pic_Image_89.jpg', 45, 5),
(98, 'Sculpture of Zoan', 'This picture was the legendary Zoan during the great winter war 2012', '41.00', 'Pic_Image_367.png', 46, 10),
(96, 'Zack\'s Wedding', 'A man holding cavewoman', '5555.00', 'Pic_Image_859.jpg', 45, 10),
(94, 'Zofia\'s Wedding', 'This picture was taken during Zofia\'s wedding in 2012', '100.00', 'Pic_Image_894.jpg', 45, 12),
(95, 'Wedding Ring', 'This image has a wedding ring.', '2.00', 'Pic_Image_837.jpg', 45, 1000),
(101, 'Car', 'Black and white image of a car that Elise has taken in 2016 summer.', '12.00', 'Pic_Image_469.png', 46, 20),
(102, 'the one piece', 'the one piece is real', '15856.00', 'Pic_Image_438.jpg', 46, 1905);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` mediumint(8) UNSIGNED NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `enc_pass` varchar(200) NOT NULL,
  `email` varchar(80) NOT NULL,
  `account_type` enum('customer','staff') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'customer'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `fullname`, `username`, `password`, `enc_pass`, `email`, `account_type`) VALUES
(1, 'AlexTheGOAT', 'AlexTheGoatIaM', '123', '$argon2id$v=19$m=2048,t=4,p=3$dmpMUkY0TVdSRmd5ZS5rYQ$2PTFaA8+y5ZMndNbt7Hod/MnZhCoLVA6HiOs7fxIWS0', 'alex@alex.com', 'staff'),
(2, 'notAlex', 'NOTALEX', '123', '$argon2id$v=19$m=2048,t=4,p=3$T1h5Um9jM3pjS01tdDRJSw$3ybF18t94o0UkaxC+uMHofCCDuqXpWUAHfmkglurfgs', 'notalex@notalex', 'customer'),
(14, 'dwadawawd  ', 'ytuytutuutyutyutyutyud', 'wadadwada', '$argon2id$v=19$m=2048,t=4,p=3$NWRNb0lFZVJJblJJRDA4Rw$WtFCdRljOHn7uMEZVkrS/1m+Hr/oGIVyB5cjdCFbKS0', 'dawdwad@wadwada', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likes_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `form_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `likes_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` mediumint(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `picture_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
