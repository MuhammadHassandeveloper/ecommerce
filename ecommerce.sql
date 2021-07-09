-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 07:50 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `b_id` int(5) NOT NULL,
  `b_name` varchar(100) DEFAULT NULL,
  `b_logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`b_id`, `b_name`, `b_logo`) VALUES
(20, 'Sony ', '1613485471-sony_logo_PNG2.png'),
(21, 'Rado ', '1613485493-rado-logo-vector.png'),
(22, 'Lenovo', '1613485513-Lenovo_logo_red.png'),
(23, 'Assus ', '1613485545-Asus-Logo-PNG-Download-Image.png'),
(24, 'Cannon ', '1613485566-Canon_logo_vector.png'),
(25, 'Dell ', '1613485590-Dell_Logo.png'),
(26, 'Gucci', '1613485611-gucci-png-logo-transparent-10.png'),
(27, 'Levis', '1613485634-400px-Levi\'s_logo.svg.png'),
(28, 'Nike', '1613485653-nike_PNG12.png'),
(29, 'Adidas', '1613485674-adidas_PNG7.png'),
(30, 'dell', '1623300703-agr3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(4) NOT NULL,
  `u_id` int(4) NOT NULL,
  `p_id` int(6) NOT NULL,
  `no_of_products` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `u_id`, `p_id`, `no_of_products`) VALUES
(39, 14, 14, 6),
(40, 14, 11, 8),
(41, 14, 9, 1),
(43, 14, 16, 2),
(177, 7, 29, 1),
(178, 7, 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(5) NOT NULL,
  `cat_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(9, 'Mens Fashion '),
(10, 'Womens Fashion '),
(11, ' Childs '),
(12, 'Watch '),
(14, ' Electronics '),
(18, 'Sports & Outdoor '),
(19, 'childrens'),
(20, 'laptops'),
(21, 'mobiles'),
(22, 'Shoes'),
(24, 'winter vagetables');

-- --------------------------------------------------------

--
-- Table structure for table `newslater`
--

CREATE TABLE `newslater` (
  `n_id` int(4) NOT NULL,
  `email` varchar(256) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newslater`
--

INSERT INTO `newslater` (`n_id`, `email`, `time`) VALUES
(2, 'faraz@gmail.com', '2021-02-15 10:32:58'),
(3, 'hakim2@gmail.com', '2021-02-15 10:45:57'),
(4, 'haroon@gmail.com', '2021-02-15 11:19:02'),
(5, 'hassan@gmail.com', '2021-02-23 16:05:33'),
(6, 'hakim@gmail.com', '2021-02-23 16:05:43');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `u_id` int(11) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `paying_amount` int(100) NOT NULL,
  `balance_transaction` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '0',
  `month` varchar(100) NOT NULL,
  `order_time` timestamp NULL DEFAULT current_timestamp(),
  `shipping_id` int(11) NOT NULL,
  `order_status` int(2) NOT NULL,
  `status_code` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `payment_type`, `u_id`, `payment_id`, `paying_amount`, `balance_transaction`, `total`, `status`, `month`, `order_time`, `shipping_id`, `order_status`, `status_code`) VALUES
(40, 'jazzcash', 7, 'T20210623171530', 57000, '5700000', 5700000, 'success', '', '2021-06-23 12:16:11', 2, 4, '12345'),
(41, 'jazzcash', 7, 'T20210623171714', 93000, '9300000', 9300000, 'success', '', '2021-06-23 12:17:55', 2, 3, '43255'),
(42, 'jazzcash', 13, 'T20210624090010', 60000, '6000000', 6000000, 'success', '', '2021-06-24 04:00:52', 3, 3, '98431'),
(43, 'jazzcash', 13, 'T20210624100401', 51400, '5140000', 5140000, 'success', '', '2021-06-24 05:04:43', 3, 1, NULL),
(45, 'jazzcash', 23, 'T20210624100905', 18000, '1800000', 1800000, 'success', '', '2021-06-24 05:09:47', 5, 4, NULL),
(46, 'jazzcash', 15, 'T20210624103253', 96000, '9600000', 9600000, 'success', '', '2021-06-24 05:33:34', 6, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` int(4) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `pro_id`, `pro_name`, `color`, `size`, `quantity`, `total`) VALUES
(4, 40, 58, 'T_shirt', 'SMALL', 'blue', 2, 24000),
(5, 40, 60, 'shirt', 'SMALL', 'pink', 2, 24000),
(6, 40, 64, 'pent', 'large', 'red', 3, 9000),
(7, 41, 60, 'shirt', 'SMALL', 'pink', 4, 48000),
(8, 41, 58, 'T_shirt', 'SMALL', 'blue', 3, 36000),
(9, 41, 66, 'pents', 'medium', 'red', 3, 9000),
(10, 42, 66, 'pents', 'medium', 'red', 1, 3000),
(11, 42, 64, 'pent', 'large', 'red', 3, 9000),
(12, 42, 60, 'shirt', 'SMALL', 'pink', 4, 48000),
(13, 43, 60, 'shirt', 'SMALL', 'pink', 1, 12000),
(14, 43, 59, 'T_shirt', 'large', 'blue', 1, 12000),
(15, 43, 65, 'pent', 'large', 'red', 1, 12000),
(16, 43, 63, 'pent', 'large', 'blue', 1, 3400),
(17, 43, 57, 'shirt', 'medium', 'blue', 1, 12000),
(18, 44, 60, 'shirt', 'SMALL', 'pink', 1, 12000),
(19, 44, 59, 'T_shirt', 'large', 'blue', 1, 12000),
(20, 44, 65, 'pent', 'large', 'red', 1, 12000),
(21, 44, 63, 'pent', 'large', 'blue', 1, 3400),
(22, 44, 57, 'shirt', 'medium', 'blue', 1, 12000),
(23, 45, 66, 'pents', 'medium', 'red', 1, 3000),
(24, 45, 64, 'pent', 'large', 'red', 1, 3000),
(25, 45, 60, 'shirt', 'SMALL', 'pink', 1, 12000),
(26, 46, 60, 'shirt', 'SMALL', 'pink', 3, 36000),
(27, 46, 34, 'b_watch', 'medium', 'blue', 3, 36000),
(28, 46, 43, 'Shirt', 'large', 'blue', 1, 12000),
(29, 46, 57, 'shirt', 'medium', 'blue', 1, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(4) NOT NULL,
  `cat_id` int(4) NOT NULL,
  `sub_id` int(4) NOT NULL,
  `b_id` int(4) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `pro_code` varchar(55) NOT NULL,
  `pro_quantity` int(11) NOT NULL,
  `pro_size` varchar(100) NOT NULL,
  `pro_details` varchar(500) NOT NULL,
  `pro_color` varchar(100) NOT NULL,
  `selling_price` int(6) NOT NULL,
  `discount_price` varchar(11) NOT NULL,
  `video_link` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL,
  `best_rated` tinyint(1) NOT NULL,
  `hot_deal` tinyint(1) NOT NULL,
  `mid_slider` tinyint(1) NOT NULL,
  `main_slider` tinyint(1) NOT NULL,
  `trend_products` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `cat_id`, `sub_id`, `b_id`, `pro_name`, `pro_code`, `pro_quantity`, `pro_size`, `pro_details`, `pro_color`, `selling_price`, `discount_price`, `video_link`, `image`, `best_rated`, `hot_deal`, `mid_slider`, `main_slider`, `trend_products`, `status`) VALUES
(11, 12, 33, 23, 'watch', 'w123', 295, 'large', '\r\n             nice watch', 'blue', 30000, '', '', '1613543342-1656191667955871.jpeg', 1, 1, 1, 1, 1, 1),
(12, 12, 33, 26, 'watch', 'w112', 106, 'medium', '\r\n             good watch', 'red', 30000, '10', '', '1613543411-1656191668102244.jpeg', 1, 1, 1, 1, 1, 1),
(13, 9, 33, 26, 'T_shirt', 't124', 118, 'medium', 'good ahirt\r\n             ', 'red', 30000, '105', '', '1613543509-1655653679365681.png', 1, 1, 1, 1, 1, 1),
(14, 12, 22, 26, 'watch', 'w111', 191, 'medium', 'good watch\r\n             ', 'blue', 30000, '1000', '', '1613543557-1656191870169712.jpeg', 1, 1, 1, 1, 1, 1),
(15, 12, 23, 21, 'watch', 'w114', 158, 'medium', '\r\n             good watch', 'pink', 30000, '1000', '', '1613543618-1656191956075914.jpeg', 1, 1, 1, 1, 1, 1),
(16, 10, 15, 24, 'T_shirt', 't123', 224, 'medium', '                                            \r\n             good shirt\r\n             \r\n             ', 'red', 30000, '', '', '1613544628-1656191297299276.jpeg', 1, 1, 1, 1, 1, 1),
(17, 20, 41, 20, 'sony mouse', 't123', 200, 'medium', '\r\n             Most software systems have installation procedures that are needed before they can be used for their main purpose. Testing these procedures to achieve an installed software system that may be used is known as installation testing. ', 'blue', 12000, '1500', '', '1614353382-new_4.jpg', 1, 1, 1, 1, 1, 1),
(18, 20, 41, 25, 'dell mouse', 't123', 200, 'medium', 'Most software systems have installation procedures that are needed before they can be used for their main purpose. Testing these procedures to achieve an installed software system that may be used is known as installation testing. \r\n             ', 'red', 3400, '100', '', '1614353492-new_7.jpg', 1, 1, 1, 1, 1, 1),
(19, 20, 41, 20, 'sony mouse', 't123', 200, 'large', 'Most software systems have installation procedures that are needed before they can be used for their main purpose. Testing these procedures to achieve an installed software system that may be used is known as installation testing. \r\n             ', 'blue', 1200, '100', '', '1614353597-new_7.jpg', 1, 1, 1, 1, 1, 1),
(20, 20, 36, 25, 'laptop', 't123', 200, 'large', 'Most software systems have installation procedures that are needed before they can be used for their main purpose. Testing these procedures to achieve an installed software system that may be used is known as installation testing. \r\n             ', 'blue', 12000, '1000', '', '1614354188-banner_2_product.png', 1, 1, 1, 1, 1, 1),
(21, 20, 37, 25, 'laptop', 'q123', 193, 'medium', '\r\n             Most software systems have installation procedures that are needed before they can be used for their main purpose. Testing these procedures to achieve an installed software system that may be used is known as installation testing. ', 'blue', 30000, '1500', '', '1614354258-featured_7.png', 1, 1, 1, 1, 1, 1),
(22, 20, 35, 25, 'laptop', 't123', 199, 'medium', '\r\n             Most software systems have installation procedures that are needed before they can be used for their main purpose. Testing these procedures to achieve an installed software system that may be used is known as installation testing. ', 'blue', 30000, '1500', '', '1614354326-blog_3.jpg', 1, 1, 1, 1, 1, 1),
(23, 21, 39, 20, 'QMobiles', 't123', 69, 'large', '\r\n             Most software systems have installation procedures that are needed before they can be used for their main purpose. Testing these procedures to achieve an installed software system that may be used is known as installation testing. ', 'blue', 30000, '100', '', '1614354376-banner_product.png', 1, 1, 0, 1, 1, 1),
(24, 21, 38, 20, 'Mobiles', 'q123', 690, 'medium', '\r\n             Most software systems have installation procedures that are needed before they can be used for their main purpose. Testing these procedures to achieve an installed software system that may be used is known as installation testing. ', 'red', 30000, '1000', '', '1614354440-best_1.png', 1, 1, 1, 1, 1, 1),
(25, 21, 39, 20, 'Sony mobiles', 't123', 200, 'medium', 'Most software systems have installation procedures that are needed before they can be used for their main purpose. Testing these procedures to achieve an installed software system that may be used is known as installation testing. \r\n             ', 'blue', 309999, '1200', '', '1614354592-best_6.png', 0, 1, 1, 1, 1, 1),
(26, 9, 12, 27, 'T_shirt', 't123', 690, 'medium', 'Most software systems have installation procedures that are needed before they can be used for their main purpose. Testing these procedures to achieve an installed software system that may be used is known as installation testing. \r\n             ', 'red', 30000, '1200', '', '1614354944-black s2.jpg', 1, 1, 1, 1, 1, 1),
(27, 9, 12, 22, 'T_shirt', 't123', 690, 'medium', 'Most software systems have installation procedures that are needed before they can be used for their main purpose. Testing these procedures to achieve an installed software system that may be used is known as installation testing. \r\n             ', 'red', 309999, '150', '', '1614354997-black s3.jpg', 1, 0, 0, 1, 1, 1),
(28, 9, 12, 20, 'T_shirt', 't123', 226, 'SMALL', 'Most software systems have installation procedures that are needed before they can be used for their main purpose. Testing these procedures to achieve an installed software system that may be used is known as installation testing. \r\n             ', 'red', 12000, '150', '', '1614355073-black s4.jpg', 1, 1, 0, 1, 1, 1),
(29, 9, 13, 23, 'shirt', 't123', 66, 'SMALL', '\r\n             Most software systems have installation procedures that are needed before they can be used for their main purpose. Testing these procedures to achieve an installed software system that may be used is known as installation testing. ', 'red', 309999, '150', '', '1614355131-download 3.jpg', 1, 1, 0, 1, 1, 1),
(30, 9, 13, 27, 'shirt', 't123', 200, 'SMALL,large', '\r\n             Most software systems have installation procedures that are needed before they can be used for their main purpose. Testing these procedures to achieve an installed software system that may be used is known as installation testing. ', 'red,green', 12000, '1000', '', '1614355300-download 4.jpg', 1, 0, 0, 1, 1, 1),
(31, 22, 42, 29, 'red Shoes', 'sh123', 693, 'medium', 'Most software systems have installation procedures that are needed before they can be used for their main purpose. Testing these procedures to achieve an installed software system that may be used is known as installation testing. \r\n             ', 'pink', 12000, '120', '', '1614355508-sho1.jpg', 1, 0, 0, 1, 1, 1),
(32, 22, 42, 29, 'black shoes', 't123', 69, 'SMALL', '\r\n             Most software systems have installation procedures that are needed before they can be used for their main purpose. Testing these procedures to achieve an installed software system that may be used is known as installation testing. ', 'pink', 3400, '120', '', '1614355582-sho4.jpg', 1, 0, 0, 1, 1, 1),
(33, 22, 42, 29, 'white shoes', 't123', 234, 'medium', '\r\n             Most software systems have installation procedures that are needed before they can be used for their main purpose. Testing these procedures to achieve an installed software system that may be used is known as installation testing. ', 'red', 12000, '1200', '', '1614355645-ws3.jpg', 1, 1, 1, 1, 0, 1),
(34, 12, 21, 21, 'b_watch', 'w111', 198, 'medium', '\r\n             Product life-cycle management is the succession of strategies by business management as a product goes through its life-cycle. The conditions in which a product is sold changes over time and must be managed as it moves through its succession of stage.', 'blue', 12000, '100', '', '1614394238-w1.jpg', 1, 1, 1, 1, 1, 1),
(35, 12, 21, 21, 'watch', 'w112', 69, 'medium', 'Product life-cycle management is the succession of strategies by business management as a product goes through its life-cycle. The conditions in which a product is sold changes over time and must be managed as it moves through its succession of stage.\r\n             ', 'blue', 12000, '150', '', '1614394327-w2.jpg', 1, 0, 0, 1, 1, 0),
(36, 12, 21, 22, 'watch', 'w114', 293, 'large', 'Product life-cycle management is the succession of strategies by business management as a product goes through its life-cycle. The conditions in which a product is sold changes over time and must be managed as it moves through its succession of stage.\r\n             ', 'red', 12000, '105', '', '1614394394-w3.jpeg', 1, 1, 1, 1, 1, 0),
(37, 12, 21, 26, 'watch', 'w123', 299, 'large', 'Product life-cycle management is the succession of strategies by business management as a product goes through its life-cycle. The conditions in which a product is sold changes over time and must be managed as it moves through its succession of stage.\r\n             ', 'red', 1200, '105', '', '1614394463-w4.jpg', 1, 1, 1, 1, 1, 1),
(38, 12, 21, 27, 'watch', 'w114', 298, 'SMALL', 'Product life-cycle management is the succession of strategies by business management as a product goes through its life-cycle. The conditions in which a product is sold changes over time and must be managed as it moves through its succession of stage.\r\n             ', 'pink', 1200, '1200', '', '1614394523-w6.jpeg', 1, 0, 0, 1, 1, 1),
(39, 9, 12, 21, 'T_shirt', 't123', 200, 'medium', 'In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customerIn marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer\r\n             ', 'red', 1200, '100', '', '1614395689-t1.jpg', 1, 0, 0, 1, 1, 1),
(40, 9, 12, 23, 'T_shirt', 't123', 200, 'medium', 'In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customerIn marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer\r\n             ', 'blue', 1200, '112', '', '1614395748-t2.jpg', 1, 0, 0, 1, 1, 0),
(41, 9, 12, 27, 'T_shirt', 't123', 300, 'large', 'In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customerIn marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer\r\n             ', 'red', 1200, '150', '', '1614395804-t3.jpg', 1, 0, 0, 1, 1, 1),
(42, 9, 13, 21, 'shirt', 't123', 690, 'SMALL', 'In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customerIn marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customerIn marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of ', 'red', 12000, '105', '', '1614395917-t5.jpg', 1, 0, 0, 1, 1, 1),
(43, 9, 13, 21, 'Shirt', 't123', 299, 'large', 'In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customerIn marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customerIn marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of ', 'blue', 12000, '150', '', '1614395970-t7.jpg', 1, 0, 0, 0, 1, 1),
(44, 9, 13, 25, 'shirt', 't123', 298, 'medium', '\r\n             In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customerIn marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer', 'pink', 3400, '150', '', '1614396046-t75.jpg', 1, 0, 0, 1, 1, 0),
(45, 9, 13, 24, 'shirt', 't123', 300, 'large', '\r\n             In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customerIn marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer', 'red', 1200, '197', '', '1614396142-t77.png', 0, 0, 0, 1, 1, 0),
(46, 9, 14, 22, 'pent', 't123', 299, 'large', 'In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customerIn marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer\r\n             ', 'blue', 1200, '105', '', '1614396332-p1.jpg', 0, 0, 0, 1, 1, 1),
(47, 9, 14, 21, 'pent', 't123', 690, 'large', 'In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customerIn marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer\r\n             ', 'red', 12000, '150', '', '1614396384-p2.jpg', 1, 0, 0, 0, 1, 1),
(48, 9, 14, 22, 'pent', 't123', 300, 'medium', 'In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customerIn marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer\r\n             ', 'blue', 3400, '100', '', '1614396439-p3.jpg', 1, 0, 0, 1, 0, 1),
(49, 9, 14, 26, 'pent', 'q123', 300, 'SMALL', 'In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customerIn marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer\r\n             ', 'blue', 3400, '150', '', '1614396485-p5.jpg', 1, 0, 0, 1, 0, 1),
(50, 9, 14, 23, 'pent', 'q123', 299, 'large', '\r\n             In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customerIn marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer', 'red', 12000, '100', '', '1614396544-p44.jpg', 1, 1, 0, 1, 1, 0),
(51, 9, 14, 23, 'pent', 'q123', 690, 'large', '\r\n             In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customerIn marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer', 'red', 1200, '154', '', '1614396601-p66.jpg', 1, 0, 0, 1, 0, 1),
(52, 10, 15, 20, 'pent', 't123', 299, 'large', 'In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. \r\n             ', 'red', 12000, '100', '', '1614397152-wmn2.jpg', 1, 0, 1, 1, 1, 0),
(53, 10, 15, 21, 'pent', 't123', 298, 'medium', 'In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. \r\n             ', 'red', 12000, '1000', '', '1614397195-wmn22.jpg', 0, 1, 0, 1, 0, 1),
(54, 10, 15, 21, 'shirt', 't123', 693, 'SMALL', '\r\nIn marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. ', 'red', 1200, '105', '', '1614397254-wmn2.jpg', 0, 1, 0, 1, 1, 1),
(55, 10, 15, 21, 'shirts', 'sonylaptop12345', 690, 'large', 'In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. \r\n             ', 'red', 3000, '120', '', '1614397319-wmn23.jpg', 1, 0, 0, 1, 1, 1),
(56, 10, 15, 20, 'pent', 't123', 688, 'large', '                      In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. \r\n             \r\n             ', 'blue', 1200, '105', '', '1614397410-wmn4.jpg', 1, 0, 0, 1, 1, 1),
(57, 10, 16, 22, 'shirt', 't123', 297, 'medium', 'In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. \r\n             ', 'blue', 12000, '100', '', '1614397470-wmnp.jpg', 0, 0, 0, 1, 1, 1),
(58, 10, 16, 23, 'T_shirt', 'q123', 646, 'SMALL', 'In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. \r\n             ', 'blue', 12000, '100', '', '1614397547-wmnp2.jpg', 1, 0, 0, 0, 1, 1),
(59, 10, 16, 23, 'T_shirt', 'q123', 678, 'large', '\r\n             In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. ', 'blue', 12000, '100', '', '1614397604-wmn33.jpg', 1, 0, 0, 1, 1, 1),
(60, 10, 16, 26, 'shirt', 't123', 646, 'SMALL', '\r\n             In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. ', 'pink', 12000, '130', '', '1614397670-wmn3.jpg', 1, 0, 0, 1, 0, 1),
(61, 10, 17, 22, 'pents', 't123', 300, 'large', 'In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. \r\n             ', 'blue', 12000, '150', '', '1614397726-wmnp.jpg', 0, 0, 0, 0, 0, 0),
(62, 10, 17, 23, 'pents', 't123', 690, 'medium', 'In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. \r\n             ', 'blue', 1200, '50', '', '1614397794-wmnp2.jpg', 0, 0, 1, 1, 1, 0),
(63, 10, 17, 24, 'pent', 't123', 288, 'large', 'In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. \r\n             ', 'blue', 3400, '150', '', '1614397843-wmnp3.jpg', 0, 0, 0, 1, 1, 1),
(64, 10, 17, 24, 'pent', 'q123', 292, 'large', '\r\n             In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. ', 'red', 3000, '100', '', '1614397894-wmnp4.jpg', 1, 0, 0, 1, 1, 1),
(65, 10, 17, 24, 'pent', 'q123', 298, 'large', '\r\n             In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. ', 'red', 12000, '100', '', '1614397944-wmnp44.jpg', 1, 1, 0, 1, 1, 1),
(66, 10, 17, 28, 'pents', 't123', 292, 'medium', '\r\n             In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. In marketing, a product is an object or system made available for consumer use; it is anything that can be offered to a market to satisfy the desire or need of a customer. ', 'red', 3000, '105', '', '1614397990-wmnp5.jpg', 1, 0, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(4) NOT NULL,
  `u_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `number` varchar(200) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `u_id`, `name`, `number`, `address`, `city`) VALUES
(2, 7, 'Hassan  ali', '03095075740', 'farid town', 'Sahiwal'),
(3, 13, 'fakhar  ali', '03429581374', 'Mirdad muafi', 'sahiwal'),
(4, 0, 'Hassan  ali', '03095075740', 'farid town', 'lahore'),
(5, 23, 'Mohsin Ali', '03429581374', 'Mirdad muafi', 'Sahiwal'),
(6, 15, 'Aroon Vicktor', '03429581323', 'town', 'Karachi');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_id`, `sub_name`, `cat_id`) VALUES
(12, 'Gents Tshirt', 9),
(13, 'Gents shirt', 9),
(14, 'Gents pent', 9),
(15, 'Womens Tshirt', 10),
(16, 'Womens shirt', 10),
(17, 'Womens Pent', 10),
(18, ' Child Dress & Footware', 11),
(19, 'Child Body Care', 11),
(20, 'Child Diaper ', 11),
(21, 'Gents Watch', 12),
(22, 'Womans Watch', 12),
(23, 'Kids Watch', 12),
(24, 'Body Spray ', 16),
(25, 'Finger Ring', 16),
(26, 'Jewelry ', 16),
(27, 'Appliances ', 17),
(28, 'Room Decoration', 17),
(29, 'Light and Lamp', 17),
(30, 'Security ', 17),
(32, 'keyboard', 20),
(33, 'screens', 20),
(34, 'Chargers', 21),
(35, 'laptop charger', 20),
(36, 'Hard Disks', 20),
(37, 'Rams', 20),
(38, 'mobile charger', 21),
(39, 'data cables', 21),
(40, 'hand frees', 21),
(41, 'muose', 20),
(42, 'Bata Shoes', 22),
(43, 'brand watch', 12),
(44, 'white cap', 23);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `name`, `phone`, `email`, `password`) VALUES
(7, 'Hassan ', '03095075729', 'hassan@gmail.com', '123456'),
(13, 'fakhar  ali', '03095075729', 'fakhar@gmail.com', '123456'),
(14, 'fakhar ali', '03095075729', 'fakharali@gmail.com', '123456'),
(15, 'haroon sahb', '03095075729', 'haroon@gmail.com', '12345'),
(23, 'aleena', '03095075729', 'aleena@gmail.com', '12345'),
(24, 'Hassan ', '03095075729', 'asfand@gmail.com', '87654321`');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `w_id` int(4) NOT NULL,
  `u_id` int(4) NOT NULL,
  `p_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`w_id`, `u_id`, `p_id`) VALUES
(132, 7, 64),
(133, 7, 58),
(134, 7, 63),
(135, 7, 59);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `newslater`
--
ALTER TABLE `newslater`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `b_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `newslater`
--
ALTER TABLE `newslater`
  MODIFY `n_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `w_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
