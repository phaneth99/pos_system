-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 03:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_system_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `is_ban` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=not_ban,1=ban',
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone`, `is_ban`, `created_at`) VALUES
(1, 'Phaneth99', 'muthphanith99@gmail.com', '$2y$10$rmYbqp5yTee2YI8IJSbuxOAw0yrA6fI43', '078242442', 0, '2024-06-17'),
(2, 'AminISAD', 'admin@gmail.com', '$2y$10$1KemdO1AV446Dj5CaeUfo.RliI15lxBzFcSNBnmSnFfIQ3xq2U81G', '088889999', 1, '2024-06-20'),
(3, 'admin03', 'admin03@gmail.com', '$2y$10$1e5SN7SsuqUDpFvntBUTdeGKxQfBqx/Zhi1Av/xlwK6XXfPLbLjP2', '015242442', 0, '2024-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=visible,0=hidden'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`) VALUES
(5, 'cothing', 'WIHOLL Womens Oversized Tshirts Shirts Summer Tops 2024 Fashion Short Sleeve V Neck Outfits Plus Size Clothes.', 1),
(7, 'Set Clothes', 'The uniform  come with a set', 1),
(8, 'smartwatch', 'This is the smartwatch  area', 1),
(10, 'Mens Jeans', 'MENS JEANS - LONG LENGTH', 1),
(11, 'Men T-shirt', 'សម្ភារៈយឺត ទន់ ត្រជាក់\r\n ការរចនាអាវឆើតឆាយ និងគួរសម\r\n គ្រប់ពណ៌ស្អាតៗ មានចាប់ពីទំហំ 40kg ដល់ 100kg', 0),
(12, 'Women Dress', 'Two-piece suit', 1),
(13, 'Women cotton short', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=visible,1=hidden',
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `status`, `created_at`) VALUES
(1, 'Pat Seyma', 'patseyma@gmail.com', '0966661657', 1, '2024-06-17'),
(2, 'Muth Phanith', 'muthphanith99@gmail.com', '015242442', 1, '2024-06-17'),
(3, 'Vathana', 'vathana@gmail.com', '015999777', 1, '2024-06-18'),
(4, 'Savong', 'Savong@gmail.com', '088889999', 1, '2024-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `tracking_no` int(40) NOT NULL,
  `invoice_no` varchar(40) NOT NULL,
  `total_amount` varchar(40) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(40) DEFAULT NULL,
  `payment_method` varchar(40) NOT NULL COMMENT 'cash,online',
  `order_placed_by_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `tracking_no`, `invoice_no`, `total_amount`, `order_date`, `order_status`, `payment_method`, `order_placed_by_id`) VALUES
(1, 2, 262205, 'INV827867', '395', '2024-06-20', 'booked', 'Cash Payment', 1),
(2, 3, 761177, 'INV894840', '9225', '2024-06-20', 'booked', 'Online Payment', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sale_price` varchar(11) NOT NULL,
  `quantity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `sale_price`, `quantity`) VALUES
(1, 1, 4, '35', '5'),
(2, 1, 2, '35', '5'),
(3, 1, 1, '9', '5'),
(4, 2, 6, '9', '15'),
(5, 2, 3, '889', '10'),
(6, 2, 5, '20', '10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` mediumtext NOT NULL,
  `sale_price` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(40) NOT NULL,
  `color` varchar(40) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = visible, 1=hidden',
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `supplier_id`, `admin_id`, `name`, `description`, `sale_price`, `purchase_price`, `quantity`, `size`, `color`, `image`, `status`, `created_at`) VALUES
(1, 11, 3, 1, 'T-Shirt', 'Men T-shirt available  size s-xxl', 9, 4, 45, 'S', 'Yellow', 'assets/uploads/products/1718854446.jpg', 1, '2024-06-20'),
(2, 7, 2, 2, 'Wedding set for men', 'The set for the people who like styling', 35, 15, 25, 'L', 'Black', 'assets/uploads/products/1718854798.jpg', 1, '2024-06-20'),
(3, 8, 2, 2, 'Apple Watch Ultra 2', 'Apple Watch Ultra 2 is crafted for unparalleled performance. The lightweight titanium case is rugged and corrosion resistant, and it\'s raised to protect the sapphire crystal from edge impacts. The biggest and brightest Apple Watch display ever.', 889, 800, 0, 'M', 'Gold', 'assets/uploads/products/1718855013.jpg', 1, '2024-06-20'),
(4, 7, 1, 1, 'Short Jean & T-shirt', 'Size S - XXL', 35, 15, 45, 'S', 'Black', 'assets/uploads/products/1718855305.jpg', 1, '2024-06-20'),
(5, 12, 4, 1, 'New style wear pleated design', 'New style wear pleated design A-line short skirt white skirt summer fashion temperament pleated umbrella skirt two-piec', 20, 10, 10, 'M', 'White', 'assets/uploads/products/1718891411.avif', 1, '2024-06-20'),
(6, 13, 1, 1, 'purple pure cotton short', 'Dark purple pure cotton short sleeves thick straight shoulder round neck loose versatile top combed cotton texture solid c', 9, 5, 85, 'M', 'Blue', 'assets/uploads/products/1718891431.avif', 1, '2024-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '	0=visible,1=hidden',
  `create_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `company`, `status`, `create_at`) VALUES
(1, 'Thida', 'Thida@gmail.com', '015242442', 'battambanng', 'Women fashion', 0, '2024-06-19'),
(2, 'Muth Phanith', 'muthphanith99@gmail.com', '15242442', 'BTB', 'Adidas', 1, '2024-06-19'),
(3, 'Seyma', 'Seyma99@gmail.com', '077778888', 'PP', 'Dior', 1, '2024-06-19'),
(4, 'Chet Tra', 'chettra@gmail.com', '09822224444', 'battambanng', 'Men collection store', 1, '2024-06-19'),
(5, 'Muth Phanith', 'muthphanith168@gmail.com', '096667615', 'Bangkok, Thailand', 'Fashion4U', 1, '2024-06-19'),
(6, 'user02', 'user02@gmail.com', '078242442', 'battambanng', 'Zara', 1, '2024-06-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
