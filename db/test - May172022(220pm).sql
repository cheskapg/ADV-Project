-- phpMyAdmin SQL Dump
-- version 5.1.4-dev+20220422.ea6a70037c
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 06:34 AM
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

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `date_added`) VALUES
(3, 2, 1, 1, '2022-04-23 10:52:16'),
(9, 4, 3, 1, '2022-04-24 15:43:18'),
(10, 4, 1, 1, '2022-05-17 00:48:23'),
(11, 2, 5, 1, '2022-05-17 01:12:06'),
(12, 2, 4, 1, '2022-05-17 01:13:02'),
(13, 2, 2, 1, '2022-05-17 01:18:30');

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
(22, 'streaming devices'),
(23, 'fan'),
(24, 'headset');

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
(1, 1, 'Newest 2022 HP 15.6\" FHD Micro-Edge Laptop, AMD Ryzen 5 5500U 6-core(Beat i7-1160G7, up to 4GHz), 16GB RAM, 1TB PCIe SSD, AMD Radeon Graphics, WiFi, HDMI, Fast Charge, Windows 11, w/3in1 Accessories', 'Newest 2022 HP 15.6\" FHD Micro-Edge Laptop\r\nAMD Ryzen 5 5500U 6-core(Beat i7-1160G7, up to 4GHz)\r\n16GB RAM\r\nTB PCIe SSD\r\nAMD Radeon Graphics, WiFi, HDMI, Fast Charge\r\nWindows 11, w/ 3 in 1 Accessories', 89000, 48, '1_laptop.jpg', '2022-04-22 09:47:40'),
(2, 5, 'AMD RYZEN 7 5700X 3.4-4.6GHZ 8-CORE AM4 >(MUST BE BOUGHT WITH COMPATIBLE MOTHERBOARD', '(Must be bought with compatible motherboard)\r\n\r\n# of CPU Cores: 8\r\nMultithreading (SMT): Yes\r\n# of Threads:16\r\nMax. Boost Clock: Up to 4.6GHz\r\nBase Clock: 3.4GHz\r\nL1 Cache: 512KB\r\nL2 Cache: 4MB\r\nL3 Cache: 32MB\r\nDefault TDP: 65W\r\nProcessor Technology for CPU Cores: TSMC 7nm FinFET\r\nProcessor Technology for I/O Die: 12nm (Globalfoundries)\r\nCPU Compute Die (CCD) Size: 74mm²\r\nI/O Die (IOD) Size: 125mm²\r\nPackage Die Count: 2\r\nUnlocked for Overclocking: Yes\r\nCPU Socket: AM4\r\nSocket Count: 1P\r\n', 17500, 50, 'AMD-1-removebg-preview.png', '2022-04-24 12:02:59'),
(3, 9, 'SAMSUNG T5 Portable SSD 1TB - Up to 540 MB/s - USB 3.1 External Solid State Drive MU-PA1T0B/AM', 'Superfast read write speeds: SSD with V-NAND offers ultra-fast data transfer speeds of up to 540 MB/s (up to 4.9x faster than external HDDs); Ideal for transferring large-sized data including 4K videos, high-resolution photos, games and more\r\nCompact and portable design: Top to bottom shock resistant metal design fits in the palm of your hand and easily slides in your pocket or purse to take work and entertainment on the go\r\nSecure encryption: Optional password protection and AES 256-bit hardware encryption keeps your personal and private data more secure\r\nSeamless connectivity: Includes USB type C to C and USB type C to A cables to connect to PCs, Macs, smartphones and other devices', 9194, 50, 'ssd-removebg-preview.png', '2022-04-24 13:11:31'),
(4, 2, 'ABS Legend Gaming PC - Intel i9 12900K - EVGA RTX 3090 FTW3 Ultra - Corsair Vengeance RGB Pro 32GB (2x16GB) DDR4 3200MHz - 2TB Intel M.2 NVMe SSD - Corsair iCue 5000x Gaming Case', 'CPU: Intel Core i9-12900K 3.9GHz (5.2GHz Turbo) 16-Core 24-Thread\r\nGPU: EVGA GeForce RTX 3090 FTW3 Ultra 24GB GDDR6X\r\nMotherboard: Asus TUF Z690-Plus Gaming Wifi\r\nRAM: Corsair Vengeance RGB Pro 32GB (2x16GB) DDR4 3200MHz\r\nSSD: 2TB M.2 NVMe SSD\r\nCPU Cooler: Corsair Hydro H115i Elite Capellix\r\nPSU: Corsair RM850x 850W Gold\r\nCase: Corsair iCue 5000x Black\r\nOperating System: Windows 10 Home\r\nFree Upgrade to Windows 11* (when available, see below)\r\nDimension: 20.47\" x 9.65\" x 20.47\"\r\nWiFi: Yes\r\nBluetooth: Yes\r\nVR Ready: Yes\r\nCheck out additional iCUE certified systems @ https://newegg.io/Corsair-iCUE\r\nPeripherals: EVGA Gaming Keyboard and EVGA Gaming Mouse\r\n*The Windows 11 upgrade will be delivered to qualifying devices late 2021 into 2022. Timing varies by device. Certain features require additional hardware (see aka.ms/windows11-spec)', 247572, 50, 'cpu-set-removebg-preview.png', '2022-04-24 13:11:31'),
(5, 1, 'Acer Predator Helios 300 - 15.6\" 144 Hz IPS - Intel Core i7 11th Gen 11800H (2.30GHz) - NVIDIA GeForce RTX 3050 Ti Laptop GPU - 16 GB DDR4 - 512 GB PCIe SSD - Windows 10 Home 64-bit - Gaming Laptop (PH315-54-748Y )', 'NVIDIA GeForce RTX 3050 Ti Laptop GPU 4 GB GDDR6\r\nIntel Core i7 11th Gen 11800H (2.30GHz)\r\n16GB Memory 512 GB PCIe SSD\r\n15.6\" 1920 x 1080 LED-backlit IPS display with 144Hz Refresh Rate\r\n14.31\" x 10.04\" x 0.90\" 5.07 lbs.\r\n1 x Mini DisplayPort 1.4 1 x HDMI 2.1\r\n1 x USB 3.2 Gen 2 Type-C (up to 10 Gbps) DisplayPort over USB Type-C, Thunderbolt 4 & USB Charging\r\n1 x USB 3.2 Gen 2 (Featuring Power-off Charging)\r\n2 x USB 3.2 Gen 1', 83200, 50, 'acer-pred-removebg-preview.png', '2022-04-24 13:11:31'),
(6, 6, 'ASRock Phantom Gaming B550 PG VELOCITA AM4 AMD B550 SATA 6Gb/s ATX AMD Motherboard', 'BIOS update might require for AMD Zen 3 Ryzen 5000 series CPU AMD B550\r\nSupports 3rd Gen AMD AM4 Ryzen / future AMD Ryzen Processors\r\nAMD Ryzen series CPUs (Matisse) support DDR4 4733+(OC)/ 4666(OC)/ 4600(OC)/ 4533(OC)/ 4466(OC)/ 4400(OC)/ 4333(OC)/ 4266(OC)/ 4200(OC)/ 4133(OC)/ 4000(OC)/ 3866(OC)/ 3800(OC)/ 3733(OC)/ 3600(OC)/ 3466(OC)/ 3200/ 2933/ 2667/ 2400/ 2133 ECC & non-ECC, un-buffered memory\r\nAMD Ryzen series APUs (Renoir) support DDR4 4733+(OC)/ 4666(OC)/ 4600(OC)/ 4533(OC)/ 4466(OC)/ 4400(OC)/ 4333(OC)/ 4266(OC)/ 4200(OC)/ 4133(OC)/ 4000(OC)/ 3866(OC)/ 3800(OC)/ 3733(OC)/ 3600(OC)/ 3466(OC)/ 3200/ 2933/ 2667/ 2400/ 2133 ECC & non-ECC, un-buffered memory', 11300, 50, 'ASRock_Phantom_Gaming_B550_PG_VELOCITA_AM4_AMD_B550_SATA_6G_ATX_AMD_Motherboard-removebg-preview.png', '2022-05-17 04:27:00'),
(7, 7, 'ASRock Radeon RX 6900 XT PHANTOM GAMING D Graphics Card 16GB GDDR6, AMD RDNA2 (RX6900XT PGD 16GO)', '16GB 256-Bit GDDR6\r\nCore Clock 1925 MHz\r\nBoost Clock 2340 MHz\r\n1 x HDMI 2.1 VRR 3 x DisplayPort 1.4 with DSC\r\n5120 Stream Processors\r\nPCI Express 4.0', 60861, 50, 'ASRock_Radeon_RX_6800_Phantom_Gaming_D_Gaming_Graphics_Card_with_16GB_GDDR6__AMD_RDNA_2__RX6800_PGD_16GO_-removebg-preview.png', '2022-05-17 04:28:42'),
(8, 23, 'Enermax D.F. VEGAS DUO Duo LED Light 120mm Fan Dust Free Rotation Technology High Technology PWM Speed Control, Black, UCDFVD12P', 'Patented DFR technology instantly blows away the dust to prolong the lifespan\r\nPatented Circular-type LED with 12 diodes and 5 VEGAS LED modes\r\nFocus Blades with light reflex strips to create exceptional, curved rays of light\r\nNoise Level: 16-22 dBA; Speed: 1500 RPM; Air Flow: 61.92 CFM\r\nPWM speed control keeps your system cool and silent at all time and Patented Twister Bearing technology for long lifetime and low noise', 900, 50, 'Enermax_D.F._VEGAS_DUO_Duo_LED_Light_120mm_Fan_Dust_Free_Rotation_Technology_High_Technology_PWM_Speed_Control__Black__UCDFVD12P-removebg-preview.png', '2022-05-17 04:03:34'),
(9, 12, 'Microsoft Xbox Series S Fortnite & Rocket League Midnight Drive Pack Bundle with Tomb Raider Definitive Edition Full Game and Mytrix Controller Protective Case', 'Get the the Xbox Series S - Fortnite & Rocket League Bundle with Games and Exclusive in Game COntents!\r\nWith the Midnight Drive Pack for Fortnite, you can customize your avatar with the Dark Skully outfit, Dark Skully Satchel Back Bling, Dark Splitter pickaxe, and 1,000 V-Bucks to spend on favorite items\r\nFor Rocket League add-on content, you get the standout Purple Masamune Car, Purple Virtual Wave Boost, Purple Zefram Wheels, and 1,000 Rocket League Credits\r\nAlso bundled with Tomb Raider Definitive Edition Full Game and Mytrix Controller Protective Case\r\nXbox Series S: Play at 1440P 120FPS with the supported contents; Explore rich new worlds and enjoy the action like never before with the 4 teraflops of raw graphic processing power', 20737, 50, 'Xbox_Series_S_-_Fortnite_Rocket_League_Bundle_and_Xbox_Wireless_Controller_-_20th_Anniversary_Special_Edition_for_Xbox_Seri-removebg-preview.png', '2022-05-17 04:08:50');

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
(2, 2, 'JVEILDTGWN_vtljnedwgi-27268dcf9a0.99548123', 89000, '2022-04-22 09:16:24');

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
(2, 2, 1, 1);

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
  `usertype` int(2) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `gender`, `address`, `age`, `birth`, `contno`, `email`, `username`, `password`, `usertype`, `photo`, `datecreated`) VALUES
(1, 'Jerson Ray', 'Desierto', 'Male', 'Davao Philippines', 21, '2000-08-20', 123456798, 'jerson@gmail.com', 'punpun', 'jerson', 1, '62626ffeed7d2_punpun_2022-04-22.png', '2022-04-22 08:57:34'),
(2, 'Juan', 'Tamad', 'Male', 'PH', 21, '2013-04-11', 123123, 'juan@tamad.com', 'juan', 'asd', 0, '6262702634031_juan_2022-04-22.png', '2022-04-22 09:16:34'),
(3, 'Manny', 'Pacquiao', 'Female', 'PH', 312, '2022-04-04', 123123, 'asdas@asdasd.com', 'asd', '123', 0, '626274930a7ce_asd_2022-04-22.png', '2022-04-22 09:23:35'),
(4, 'Bong Bong', 'Marcus', 'Male', 'PH', 99, '2022-04-07', 13245646, 'gnob@bong.com', 'bong', 'bong', 0, 'userplaceholder.png', '2022-04-22 09:17:58');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transacthistory`
--
ALTER TABLE `transacthistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
