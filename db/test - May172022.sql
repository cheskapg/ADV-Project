-- phpMyAdmin SQL Dump
-- version 5.1.4-dev+20220422.ea6a70037c
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 02:57 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'laptop'),
(2, 'desktop'),
(3, 'mouse'),
(4, 'chasis'),
(5, 'processor'),
(6, 'motherboard'),
(7, 'graphics card'),
(8, 'memory'),
(9, 'hard drive'),
(10, 'display'),
(11, 'audio'),
(12, 'gaming'),
(13, 'keyboard'),
(14, 'adaptor'),
(15, 'router'),
(16, 'switch'),
(17, 'cable'),
(18, 'bag'),
(19, 'storage devices'),
(20, 'digital camera'),
(21, 'portable media'),
(22, 'streaming devices');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `stock`, `photo`, `date_added`) VALUES
(1, 1, 'Newest 2022 HP 15.6\" FHD Micro-Edge Laptop, AMD Ryzen 5 5500U 6-core(Beat i7-1160G7, up to 4GHz), 16GB RAM, 1TB PCIe SSD, AMD Radeon Graphics, WiFi, HDMI, Fast Charge, Windows 11, w/3in1 Accessories', 'Newest 2022 HP 15.6\" FHD Micro-Edge Laptop\r\nAMD Ryzen 5 5500U 6-core(Beat i7-1160G7, up to 4GHz)\r\n16GB RAM\r\nTB PCIe SSD\r\nAMD Radeon Graphics, WiFi, HDMI, Fast Charge\r\nWindows 11, w/ 3 in 1 Accessories', 89000, 43, '1_laptop.jpg', '2022-04-22 09:47:40'),
(2, 2, 'Acer Aspire C27-1655-UA91 AIO Desktop | 27\" Full HD IPS Display | 11th Gen Intel Core i5-1135G7 | Intel Iris Xe Graphics | 12GB DDR4 | 512GB NVMe M.2 SSD | Intel Wireless Wi-Fi 6 | Windows 10 Home', 'Acer Aspire C27-1655-UA91 AIO Desktop \r\n27\" Full HD IPS Display\r\n11th Gen Intel Core i5-1135G7 \r\nIntel Iris Xe Graphics\r\n12GB DDR4\r\n512GB NVMe M.2 SSD\r\nIntel Wireless Wi-Fi 6\r\nWindows 10 Home', 50000, 45, 'product-62650aab577ef_2022-04-24.jpg', '2022-04-24 08:30:35'),
(3, 3, 'ASUS ROG Spatha X Wireless Gaming Mouse (Magnetic Charging Stand, 12 Programmable Buttons, 19,000 DPI, Push-fit Hot Swap Switch Sockets, ROG Micro Switches, ROG Paracord and Aura RGB lighting)', 'ASUS ROG Spatha X Wireless Gaming Mouse (Magnetic Charging Stand\r\n12 Programmable Buttons\r\n19,000 DPI\r\nPush-fit Hot Swap Switch Sockets\r\nROG Micro Switches\r\nROG Paracord and Aura RGB lighting)', 5000, 44, 'product-62650b52a1940_2022-04-24.jpg', '2022-04-24 08:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `receipt_id` varchar(255) NOT NULL,
  `amount_paid` int(11) NOT NULL,
  `sales_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `receipt_id`, `amount_paid`, `sales_date`) VALUES
(1, 3, '0', 89000, '2022-04-22 09:23:41'),
(2, 2, 'JVEILDTGWN_vtljnedwgi-27268dcf9a0.99548123', 89000, '2022-04-22 09:16:24'),
(3, 2, 'ODJBQNPAZC_bpcdzaoqjn-50c619517b5.03953117', 94000, '2022-04-24 08:37:53'),
(4, 2, 'LIMFEBKAYJ_lmbfieayjk-50d2167fd95.96299011', 144000, '2022-04-24 08:41:05'),
(5, 3, 'AFELKYPRIS_kyefsalipr-50dc5aa6065.99138442', 144000, '2022-04-24 08:43:49'),
(6, 3, 'YGZVDFAHNE_zhnafevygd-50ef2738cb8.72495950', 94000, '2022-04-24 08:48:50'),
(7, 3, 'WUVYQALSZR_lrqsuwzvay-50f2ec98003.89572989', 55000, '2022-04-24 08:49:50'),
(8, 4, 'VWIPNJCXHO_wnxhicjvpo-50fe327eeb7.80542623', 144000, '2022-04-24 08:52:51'),
(9, 3, 'NUMDEFHBRW_hfumndewbr-21f700bb510.56732923', 50000, '2022-05-16 09:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `transacthistory`
--

CREATE TABLE `transacthistory` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transacthistory`
--

INSERT INTO `transacthistory` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 3, 3, 1),
(5, 4, 1, 1),
(6, 4, 3, 1),
(7, 4, 2, 1),
(8, 5, 3, 1),
(9, 5, 1, 1),
(10, 5, 2, 1),
(11, 6, 1, 1),
(12, 6, 3, 1),
(13, 7, 2, 1),
(14, 7, 3, 1),
(15, 8, 1, 1),
(16, 8, 2, 1),
(17, 8, 3, 1),
(18, 9, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `age` int(4) NOT NULL,
  `birth` date NOT NULL,
  `contno` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` int(2) NOT NULL COMMENT 'user = 0, admin = 1',
  `photo` varchar(255) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `gender`, `address`, `age`, `birth`, `contno`, `email`, `username`, `password`, `usertype`, `photo`, `datecreated`) VALUES
(1, 'Jerson Ray', 'Desierto', 'Male', 'Davao Philippines', 21, '2000-08-20', 123456798, 'jerson@gmail.com', 'punpun', 'jerson', 1, '62626ffeed7d2_punpun_2022-04-22.png', '2022-04-22 08:57:34'),
(2, 'Juan', 'Tamad', 'Male', 'PH', 21, '2013-04-11', 123123, 'juan@tamad.com', 'juan', 'asd', 0, '6262702634031_juan_2022-04-22.png', '2022-04-22 09:16:34'),
(3, 'Manny', 'Pacquiao', 'Male', 'PH', 312, '2022-04-04', 123123, 'asdas@asdasd.com', 'asd', '123', 0, '626274930a7ce_asd_2022-04-22.png', '2022-04-22 09:23:35'),
(4, 'Bong Bong', 'Marcus', 'Male', 'PH', 99, '2022-04-07', 13245646, 'gnob@bong.com', 'bong', 'bong', 0, '62650fc2173a5_bong_2022-04-24.png', '2022-04-22 09:17:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user - cart` (`user_id`),
  ADD KEY `product - cart` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category - products` (`category_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user - sales` (`user_id`);

--
-- Indexes for table `transacthistory`
--
ALTER TABLE `transacthistory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales - history` (`sales_id`),
  ADD KEY `product - history` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transacthistory`
--
ALTER TABLE `transacthistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `product - cart` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user - cart` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category - products` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `user - sales` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transacthistory`
--
ALTER TABLE `transacthistory`
  ADD CONSTRAINT `product - history` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales - history` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
