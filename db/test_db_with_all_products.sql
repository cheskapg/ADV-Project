-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 10:37 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

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
(3, 3, 'ASUS ROG Spatha X Wireless Gaming Mouse (Magnetic Charging Stand, 12 Programmable Buttons, 19,000 DPI, Push-fit Hot Swap Switch Sockets, ROG Micro Switches, ROG Paracord and Aura RGB lighting)', 'ASUS ROG Spatha X Wireless Gaming Mouse (Magnetic Charging Stand\r\n12 Programmable Buttons\r\n19,000 DPI\r\nPush-fit Hot Swap Switch Sockets\r\nROG Micro Switches\r\nROG Paracord and Aura RGB lighting)', 5000, 44, 'product-62650b52a1940_2022-04-24.jpg', '2022-04-24 08:33:22'),
(4, 4, 'Antec Dark League DF700 FLUX, Mid Tower ATX Gaming Case FLUX Platform 5 x 120mm Fans Included ARGB & PWM Fan Controller Tempered Glass Side Panel Three-Dimensional Wave-Shaped Mesh Front', 'F-LUX Platform: Advanced case structure for excellent airflow + 5 x 120mm fans included ARGB & PWM Fan Controller Provide massive airflow to your components with room for up to 9 x 120mm fans Supports a high-end GPU and provides the best cooling for it Ready for a radiator up to 360mm in front, 360mm on top & 120mm in rear With room for 2.5 SSDs: 3 & 3.5 HDDs/2.5 SSDs  3/2 I/O panel dust plugs included Plenty of space for clean cable management Motherboard Support: Up to ATX', 6092, 50, '11-129-272-V44-removebg-preview.png', '2022-05-17 08:21:55'),
(5, 6, 'ASUS TUF Gaming Z690-Plus WiFi D4 LGA 1700 Intel 12th Gen ATX Gaming Motherboard- PCIe 5.0, DDR4, 4xM.2/NVMe SSD, 14+2 Power Stages, WiFi 6, Intel 2.5Gb LAN', 'Intel LGA 1700 socket: Ready for 12th Gen Intel Core processors, support PCIe 5.0 and out of box Windows 11 ready Enhanced Power Solution: 14+2 DrMOS power stages, ProCool sockets, military-grade TUF components, and Digi+ VRM for maximum durability and performance\r\n', 18184, 50, '13-119-506-V01-removebg-preview.png', '2022-05-17 08:21:55'),
(6, 7, 'GIGABYTE Gaming OC Radeon RX 6750 XT 12GB GDDR6 PCI Express 4.0 ATX Video Card GV-R675XTGAMING OC-12GD', '12GB 192-Bit GDDR6 2 x HDMI 2 x DisplayPort PCI Express 4.0\r\n', 35232, 50, '14-932-519-01-removebg-preview.png', '2022-05-17 08:21:55'),
(7, 11, 'ONIKUMA Gaming Headset with Noise Canceling Mic and Light 7.1 Stereo Surround', 'Immersive gaming experience?7.1 surround channels bring the ultimate sound quality experience. Let you experience the true zero-range battlefield, accurately grasp the enemys position, and attack accurately. The cool LED lighting makes the game atmosphere more intense. One-key mute allows you to switch freely between reality and the game world.\r\n', 10379, 50, 'ONIKUMA_Gaming_Headset_with_Noise_Canceling_Mic_Over_Ear_Gaming_Headphone_for_PS5_PS4__Laptops__PC__Phones-removebg-preview.png', '2022-05-17 08:21:55'),
(8, 8, 'CORSAIR Vengeance RGB Pro 32GB (2 x 16GB) 288-Pin PC RAM DDR4 3600 (PC4 28800) Intel XMP 2.0 Desktop Memory Model CMW32GX4M2D3600C18', 'Dynamic Multi-Zone RGB Lighting: 10 Ultra-bright RGB LEDs per module. Next Generation Software: Take control in CORSAIR iCUE software and synchronize lighting with other CORSAIR RGB products, including CPU coolers, keyboards and fans.\r\n', 9796, 50, '20-236-607-01-removebg-preview.png', '2022-05-17 08:21:55'),
(9, 9, 'Seagate IronWolf Pro 4TB NAS Hard Drive 7200 RPM 256MB Cache CMR SATA 6.0Gb/s 3.5 Internal HDD ST4000NE001 - OEM', 'IronWolf Pro is designed for everything business NAS. Get used to tough, ready, and scalable 24x7 performance that can handle multidrive environments across a wide range of capacities up to 18TB.\r\n', 10379, 50, '22-184-797-V04-removebg-preview.png', '2022-05-17 08:21:55'),
(10, 4, 'Antec Dark League DF700 FLUX, Mid Tower ATX Gaming Case FLUX Platform 5 x 120mm Fans Included ARGB & PWM Fan Controller Tempered Glass Side Panel Three-Dimensional Wave-Shaped Mesh Front', 'F-LUX Platform: Advanced case structure for excellent airflow + 5 x 120mm fans included ARGB & PWM Fan Controller Provide massive airflow to your components with room for up to 9 x 120mm fans Supports a high-end GPU and provides the best cooling for it Ready for a radiator up to 360mm in front, 360mm on top & 120mm in rear With room for 2.5 SSDs: 3 & 3.5 HDDs/2.5 SSDs  3/2 I/O panel dust plugs included Plenty of space for clean cable management Motherboard Support: Up to ATX', 6092, 50, '11-129-272-V44-removebg-preview.png', '2022-05-17 08:23:25'),
(11, 6, 'ASUS TUF Gaming Z690-Plus WiFi D4 LGA 1700 Intel 12th Gen ATX Gaming Motherboard- PCIe 5.0, DDR4, 4xM.2/NVMe SSD, 14+2 Power Stages, WiFi 6, Intel 2.5Gb LAN', 'Intel LGA 1700 socket: Ready for 12th Gen Intel Core processors, support PCIe 5.0 and out of box Windows 11 ready Enhanced Power Solution: 14+2 DrMOS power stages, ProCool sockets, military-grade TUF components, and Digi+ VRM for maximum durability and performance\r\n', 18184, 50, '13-119-506-V01-removebg-preview.png', '2022-05-17 08:23:25'),
(12, 7, 'GIGABYTE Gaming OC Radeon RX 6750 XT 12GB GDDR6 PCI Express 4.0 ATX Video Card GV-R675XTGAMING OC-12GD', '12GB 192-Bit GDDR6 2 x HDMI 2 x DisplayPort PCI Express 4.0\r\n', 35232, 50, '14-932-519-01-removebg-preview.png', '2022-05-17 08:23:25'),
(13, 11, 'ONIKUMA Gaming Headset with Noise Canceling Mic and Light 7.1 Stereo Surround', 'Immersive gaming experience 7.1 surround channels bring the ultimate sound quality experience. Let you experience the true zero-range battlefield, accurately grasp the enemys position, and attack accurately. The cool LED lighting makes the game atmosphere more intense. One-key mute allows you to switch freely between reality and the game world.\r\n', 10379, 50, 'ONIKUMA_Gaming_Headset_with_Noise_Canceling_Mic_Over_Ear_Gaming_Headphone_for_PS5_PS4__Laptops__PC__Phones-removebg-preview.png', '2022-05-17 08:23:25'),
(14, 8, 'CORSAIR Vengeance RGB Pro 32GB (2 x 16GB) 288-Pin PC RAM DDR4 3600 (PC4 28800) Intel XMP 2.0 Desktop Memory Model CMW32GX4M2D3600C18', 'Dynamic Multi-Zone RGB Lighting: 10 Ultra-bright RGB LEDs per module. Next Generation Software: Take control in CORSAIR iCUE software and synchronize lighting with other CORSAIR RGB products, including CPU coolers, keyboards and fans.\r\n', 9796, 50, '20-236-607-01-removebg-preview.png', '2022-05-17 08:23:25'),
(15, 9, 'Seagate IronWolf Pro 4TB NAS Hard Drive 7200 RPM 256MB Cache CMR SATA 6.0Gb/s 3.5 Internal HDD ST4000NE001 - OEM', 'IronWolf Pro is designed for everything business NAS. Get used to tough, ready, and scalable 24x7 performance that can handle multidrive environments across a wide range of capacities up to 18TB.\r\n', 10379, 50, '22-184-797-V04-removebg-preview.png', '2022-05-17 08:23:25'),
(16, 10, 'GIGABYTE G34WQC A-SA 34 144Hz Curved Gaming Monitor, 3440 x 1440 VA 1500R Display, 1ms (MPRT), 90% DCI-P3, VESA Display HDR400', 'FreeSync Premium, 2x DisplayPort 1.4, 2x HDMI 2.0 \r\n 34 3440 x 1440 VA Display 144Hz Refresh Rate 1ms (MPRT) Response Time Immersive Ultrawide Aspect Ratio 21:9 Native 1500R Curvature', 24193, 50, '24-012-046-01-removebg-preview.png', '2022-05-17 08:23:25'),
(17, 12, '\r\nRGB Soft Gaming Mouse Pad Large, Oversized Glowing Led Extended Mousepad ,Non-Slip Rubber Base Computer Keyboard Pad Mat', '14 Lighting Modes: Super Glow Fiber provides a great RGB back lit effect. You can choose from 14 lighting modes: 7 static light modes and 4 dynamic mode.\r\n', 6490, 50, 'AP8BS200811H23U2-removebg-preview.png', '2022-05-17 08:23:25'),
(18, 4, 'Antec Dark League DF700 FLUX, Mid Tower ATX Gaming Case FLUX Platform 5 x 120mm Fans Included ARGB & PWM Fan Controller Tempered Glass Side Panel Three-Dimensional Wave-Shaped Mesh Front', 'F-LUX Platform: Advanced case structure for excellent airflow + 5 x 120mm fans included ARGB & PWM Fan Controller Provide massive airflow to your components with room for up to 9 x 120mm fans Supports a high-end GPU and provides the best cooling for it Ready for a radiator up to 360mm in front, 360mm on top & 120mm in rear With room for 2.5 SSDs: 3 & 3.5 HDDs/2.5 SSDs  3/2 I/O panel dust plugs included Plenty of space for clean cable management Motherboard Support: Up to ATX', 6092, 50, '11-129-272-V44-removebg-preview.png', '2022-05-17 08:24:03'),
(19, 6, 'ASUS TUF Gaming Z690-Plus WiFi D4 LGA 1700 Intel 12th Gen ATX Gaming Motherboard- PCIe 5.0, DDR4, 4xM.2/NVMe SSD, 14+2 Power Stages, WiFi 6, Intel 2.5Gb LAN', 'Intel LGA 1700 socket: Ready for 12th Gen Intel Core processors, support PCIe 5.0 and out of box Windows 11 ready Enhanced Power Solution: 14+2 DrMOS power stages, ProCool sockets, military-grade TUF components, and Digi+ VRM for maximum durability and performance\r\n', 18184, 50, '13-119-506-V01-removebg-preview.png', '2022-05-17 08:24:03'),
(20, 7, 'GIGABYTE Gaming OC Radeon RX 6750 XT 12GB GDDR6 PCI Express 4.0 ATX Video Card GV-R675XTGAMING OC-12GD', '12GB 192-Bit GDDR6 2 x HDMI 2 x DisplayPort PCI Express 4.0\r\n', 35232, 50, '14-932-519-01-removebg-preview.png', '2022-05-17 08:24:03'),
(21, 11, 'ONIKUMA Gaming Headset with Noise Canceling Mic and Light 7.1 Stereo Surround', 'Immersive gaming experience 7.1 surround channels bring the ultimate sound quality experience. Let you experience the true zero-range battlefield, accurately grasp the enemys position, and attack accurately. The cool LED lighting makes the game atmosphere more intense. One-key mute allows you to switch freely between reality and the game world.\r\n', 10379, 50, 'ONIKUMA_Gaming_Headset_with_Noise_Canceling_Mic_Over_Ear_Gaming_Headphone_for_PS5_PS4__Laptops__PC__Phones-removebg-preview.png', '2022-05-17 08:24:03'),
(22, 8, 'CORSAIR Vengeance RGB Pro 32GB (2 x 16GB) 288-Pin PC RAM DDR4 3600 (PC4 28800) Intel XMP 2.0 Desktop Memory Model CMW32GX4M2D3600C18', 'Dynamic Multi-Zone RGB Lighting: 10 Ultra-bright RGB LEDs per module. Next Generation Software: Take control in CORSAIR iCUE software and synchronize lighting with other CORSAIR RGB products, including CPU coolers, keyboards and fans.\r\n', 9796, 50, '20-236-607-01-removebg-preview.png', '2022-05-17 08:24:03'),
(23, 9, 'Seagate IronWolf Pro 4TB NAS Hard Drive 7200 RPM 256MB Cache CMR SATA 6.0Gb/s 3.5 Internal HDD ST4000NE001 - OEM', 'IronWolf Pro is designed for everything business NAS. Get used to tough, ready, and scalable 24x7 performance that can handle multidrive environments across a wide range of capacities up to 18TB.\r\n', 10379, 50, '22-184-797-V04-removebg-preview.png', '2022-05-17 08:24:03'),
(24, 10, 'GIGABYTE G34WQC A-SA 34 144Hz Curved Gaming Monitor, 3440 x 1440 VA 1500R Display, 1ms (MPRT), 90% DCI-P3, VESA Display HDR400', 'FreeSync Premium, 2x DisplayPort 1.4, 2x HDMI 2.0 \r\n 34 3440 x 1440 VA Display 144Hz Refresh Rate 1ms (MPRT) Response Time Immersive Ultrawide Aspect Ratio 21:9 Native 1500R Curvature', 24193, 50, '24-012-046-01-removebg-preview.png', '2022-05-17 08:24:03'),
(25, 12, '\r\nRGB Soft Gaming Mouse Pad Large, Oversized Glowing Led Extended Mousepad ,Non-Slip Rubber Base Computer Keyboard Pad Mat', '14 Lighting Modes: Super Glow Fiber provides a great RGB back lit effect. You can choose from 14 lighting modes: 7 static light modes and 4 dynamic mode.\r\n', 6490, 50, 'AP8BS200811H23U2-removebg-preview.png', '2022-05-17 08:24:03'),
(26, 13, 'CORSAIR K100 RGB Mechanical Gaming Keyboard, Backlit RGB LED, CHERRY MX SPEED Keyswitches, Black', 'The CORSAIR K100 RGB is the pinnacle of CORSAIR keyboards, offering the cutting-edge performance, style, durability, and customization that gamers need to stand above the rest.\r\n', 12658, 50, '23-816-139-10-removebg-preview.png', '2022-05-17 08:24:03'),
(27, 13, 'Rosewill NEON M59 RGB Gaming Mouse, 10000 dpi, Ergonomic Hand Grips, RGB Backlit Optical Wired Gaming Mouse', 'Ergonomic Hand Grips\r\n6 Programmable Buttons\r\nPolling Rate up to 1000 Hz\r\nCustomization via software suite\r\n11 Dynamic RGB Backlight Effects\r\n', 2562, 50, '26-193-124-02-removebg-preview.png', '2022-05-17 08:24:03'),
(28, 14, 'RIITOP 2-Port 1000M PCIe Express Network Adapter Card NIC Intel 82575 Chipset Dual RJ45 PCI Express Gigabit Ethernet Lan Card Come with Low Profile Bracket', 'Can reach the speed up to 10/100/1000Mbps\r\nIntel 82575EB chipset with 2* 10/100/1000Mbps Copper ports\r\n', 5684, 50, 'A6V8_132000333391706246zGskesiOyE-removebg-preview.png', '2022-05-17 08:24:03'),
(29, 4, 'Antec Dark League DF700 FLUX, Mid Tower ATX Gaming Case FLUX Platform 5 x 120mm Fans Included ARGB & PWM Fan Controller Tempered Glass Side Panel Three-Dimensional Wave-Shaped Mesh Front', 'F-LUX Platform: Advanced case structure for excellent airflow + 5 x 120mm fans included ARGB & PWM Fan Controller Provide massive airflow to your components with room for up to 9 x 120mm fans Supports a high-end GPU and provides the best cooling for it Ready for a radiator up to 360mm in front, 360mm on top & 120mm in rear With room for 2.5 SSDs: 3 & 3.5 HDDs/2.5 SSDs  3/2 I/O panel dust plugs included Plenty of space for clean cable management Motherboard Support: Up to ATX', 6092, 50, '11-129-272-V44-removebg-preview.png', '2022-05-17 08:25:27'),
(30, 6, 'ASUS TUF Gaming Z690-Plus WiFi D4 LGA 1700 Intel 12th Gen ATX Gaming Motherboard- PCIe 5.0, DDR4, 4xM.2/NVMe SSD, 14+2 Power Stages, WiFi 6, Intel 2.5Gb LAN', 'Intel LGA 1700 socket: Ready for 12th Gen Intel Core processors, support PCIe 5.0 and out of box Windows 11 ready Enhanced Power Solution: 14+2 DrMOS power stages, ProCool sockets, military-grade TUF components, and Digi+ VRM for maximum durability and performance\r\n', 18184, 50, '13-119-506-V01-removebg-preview.png', '2022-05-17 08:25:27'),
(31, 7, 'GIGABYTE Gaming OC Radeon RX 6750 XT 12GB GDDR6 PCI Express 4.0 ATX Video Card GV-R675XTGAMING OC-12GD', '12GB 192-Bit GDDR6 2 x HDMI 2 x DisplayPort PCI Express 4.0\r\n', 35232, 50, '14-932-519-01-removebg-preview.png', '2022-05-17 08:25:27'),
(32, 11, 'ONIKUMA Gaming Headset with Noise Canceling Mic and Light 7.1 Stereo Surround', 'Immersive gaming experience 7.1 surround channels bring the ultimate sound quality experience. Let you experience the true zero-range battlefield, accurately grasp the enemys position, and attack accurately. The cool LED lighting makes the game atmosphere more intense. One-key mute allows you to switch freely between reality and the game world.\r\n', 10379, 50, 'ONIKUMA_Gaming_Headset_with_Noise_Canceling_Mic_Over_Ear_Gaming_Headphone_for_PS5_PS4__Laptops__PC__Phones-removebg-preview.png', '2022-05-17 08:25:27'),
(33, 8, 'CORSAIR Vengeance RGB Pro 32GB (2 x 16GB) 288-Pin PC RAM DDR4 3600 (PC4 28800) Intel XMP 2.0 Desktop Memory Model CMW32GX4M2D3600C18', 'Dynamic Multi-Zone RGB Lighting: 10 Ultra-bright RGB LEDs per module. Next Generation Software: Take control in CORSAIR iCUE software and synchronize lighting with other CORSAIR RGB products, including CPU coolers, keyboards and fans.\r\n', 9796, 50, '20-236-607-01-removebg-preview.png', '2022-05-17 08:25:27'),
(34, 9, 'Seagate IronWolf Pro 4TB NAS Hard Drive 7200 RPM 256MB Cache CMR SATA 6.0Gb/s 3.5 Internal HDD ST4000NE001 - OEM', 'IronWolf Pro is designed for everything business NAS. Get used to tough, ready, and scalable 24x7 performance that can handle multidrive environments across a wide range of capacities up to 18TB.\r\n', 10379, 50, '22-184-797-V04-removebg-preview.png', '2022-05-17 08:25:27'),
(35, 10, 'GIGABYTE G34WQC A-SA 34 144Hz Curved Gaming Monitor, 3440 x 1440 VA 1500R Display, 1ms (MPRT), 90% DCI-P3, VESA Display HDR400', 'FreeSync Premium, 2x DisplayPort 1.4, 2x HDMI 2.0 \r\n 34 3440 x 1440 VA Display 144Hz Refresh Rate 1ms (MPRT) Response Time Immersive Ultrawide Aspect Ratio 21:9 Native 1500R Curvature', 24193, 50, '24-012-046-01-removebg-preview.png', '2022-05-17 08:25:27'),
(36, 12, '\r\nRGB Soft Gaming Mouse Pad Large, Oversized Glowing Led Extended Mousepad ,Non-Slip Rubber Base Computer Keyboard Pad Mat', '14 Lighting Modes: Super Glow Fiber provides a great RGB back lit effect. You can choose from 14 lighting modes: 7 static light modes and 4 dynamic mode.\r\n', 6490, 50, 'AP8BS200811H23U2-removebg-preview.png', '2022-05-17 08:25:27'),
(37, 13, 'CORSAIR K100 RGB Mechanical Gaming Keyboard, Backlit RGB LED, CHERRY MX SPEED Keyswitches, Black', 'The CORSAIR K100 RGB is the pinnacle of CORSAIR keyboards, offering the cutting-edge performance, style, durability, and customization that gamers need to stand above the rest.\r\n', 12658, 50, '23-816-139-10-removebg-preview.png', '2022-05-17 08:25:27'),
(38, 13, 'Rosewill NEON M59 RGB Gaming Mouse, 10000 dpi, Ergonomic Hand Grips, RGB Backlit Optical Wired Gaming Mouse', 'Ergonomic Hand Grips\r\n6 Programmable Buttons\r\nPolling Rate up to 1000 Hz\r\nCustomization via software suite\r\n11 Dynamic RGB Backlight Effects\r\n', 2562, 50, '26-193-124-02-removebg-preview.png', '2022-05-17 08:25:27'),
(39, 14, 'RIITOP 2-Port 1000M PCIe Express Network Adapter Card NIC Intel 82575 Chipset Dual RJ45 PCI Express Gigabit Ethernet Lan Card Come with Low Profile Bracket', 'Can reach the speed up to 10/100/1000Mbps\r\nIntel 82575EB chipset with 2* 10/100/1000Mbps Copper ports\r\n', 5684, 50, 'A6V8_132000333391706246zGskesiOyE-removebg-preview.png', '2022-05-17 08:25:27'),
(40, 15, 'ASUS WiFi 6E Gaming Router (ROG Rapture GT-AXE11000) - Tri-Band 10 Gigabit Wireless Router, World\'s First 6GHz Band for Wider Channels & Higher Capacity, 1.8GHz Quad-Core processor, 2.5G Port, Gaming & Streaming', '6GHz spectrum available - Wider channels and higher capacity to deliver higher performance, lower latency, and less interference. 2.5G LAN/WAN Port - All traffic through 2.5G port is given the top priority, and 2.5G port unlocks the full potential of WiFi 6.\r\n', 31999, 50, '33-320-478-V01-removebg-preview.png', '2022-05-17 08:25:27'),
(41, 16, 'Rosewill 5 Port Gigabit Network Switch / Ethernet Switch / Desktop Switch with 9K Jumbo Frame for Home and Small Business Users (RC-409LXv2)', 'Auto-negotiation RJ45 ports: The feature makes installation hassle-free. Auto MDI / MDIX eliminates the need for crossover cables; Full / half-duplex auto-negotiation senses the speed of a network device and intelligently adjusts for optimization.\r\n\r\n', 1562, 50, '33-166-125-07-removebg-preview.png', '2022-05-17 08:25:27'),
(42, 17, 'Athena Power CABLE-YPCIE628 7.25 in. PCIE 6pin \"Y\" Split to Two PCIE 2.0 8(6+2)pin Cable Female to Male', '3 Connector Number Female to Male\r\n', 580, 50, '12-198-016-S01-removebg-preview.png', '2022-05-17 08:25:27'),
(43, 18, 'Targus 16” Groove Laptop Backpack - CVR600', 'Easily accessible water bottle holder placed safely away from sensitive electronics and important files. \r\nQuick access mobile phone pouch keeps most standard size phones within reach.\r\n', 3056, 50, 'AH47S200723OIuC4-removebg-preview.png', '2022-05-17 08:25:27'),
(44, 20, 'Sony ZV-1 Compact 4K HD Camera, Black #DCZV1/B	', 'Vari-angle LCD screen, for selfie shooting with confidence Directional three-capsule mic and a bundled wind screen Optimized for easy and natural selfies ', 50480, 50, 'A4P0D200620XJZ7M-removebg-preview.png', '2022-05-17 08:25:27'),
(45, 22, 'Google GA01919-CA Chromecast with Google TV', 'Android TV OS\r\nWi-Fi 802.11ac (2.4 GHz/5 GHz) Bluetooth Up to 4K HDR, 60 FPS Supports resolutions up to 4K and high dynamic range (HDR) Dolby Vision, HDR10, HDR10+ for stunning picture quality HDMI to plug directly into the TV USB Type-C power\r\n', 4502, 50, '15-597-013-07-removebg-preview.png', '2022-05-17 08:25:27'),
(46, 21, 'YG300 LED Portable Projector 500LM 3.5mm 320x240 Pixel HDMI USB Mini YG-300 Projector Home Media Player', 'This projector is suitable for private theater and children education. Handhold size make it portable for outside use! A suitable child projector——YG300! Its 500 Lumens brightness and 320*240 native resolution provide exceptional display quality. Support aspect ratio between both 16:9 and 4:3. It is a good choice for home theater, and also great toy projector for kids play and education.\r\n', 8054, 50, 'A5DR_131618659791714780ywjEBxxLhK-removebg-preview.png', '2022-05-17 08:25:27');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
