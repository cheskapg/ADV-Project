-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 05:47 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_path`) VALUES
(1, 'upload/623d0aa07ba114.88614318.jpg'),
(2, 'upload/623d0aa6c99483.64977769.jpg'),
(3, 'upload/623d0b0174ef48.70699134.png'),
(4, 'upload/623d0cc49a09e5.95928451.png'),
(5, 'upload/623ec0f0809816.60881464.png'),
(6, 'upload/623ecce8eb34e4.64841582.jpg'),
(7, 'upload/623ecd2b1e1f37.25006883.jpg'),
(8, 'upload/623ecd5bcfa249.42545701.jpg'),
(9, 'upload/623ecd9015b648.55564105.jpg'),
(10, '.../upload/623ecdcbaf7450.46773360.jpg'),
(11, './upload/623ecde573a487.00505816.jpg'),
(12, '*/upload/623ece1aae8b41.44227007.jpg'),
(13, '../.../upload/623ece32cd22f6.33662844.jpg'),
(14, 'upload/623ece46211f84.86627989.jpg'),
(15, '../upload/623ece54f41d26.98560823.jpg'),
(16, '../upload/623ed0667c87e8.40481782.jpg'),
(17, '../../user/623ed10643cab9.84927957.jpg'),
(18, '../../../user/623ed15781c963.36182788.jpg'),
(19, '../upload623ed21a584c63.48782244.jpg'),
(20, '../upload/qw/img/user/623ed248eea2a4.00628659.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'Jerson Ray', 'jerson@gmail.com', 'jerson'),
(2, 'asdasd', 'asdasd@asdasd.com', 'asdasd'),
(3, 'asd123', 'asda@asd.com', 'asdasd'),
(4, 'dasdas12asd', 'asdasd@asd.com', 'asdasdasd'),
(5, 'dasd', 'asdasd@asdasd.com', 'asd');

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
(1, 'Jerson Ray', 'Bañados', 'Male', 'Panacan, Davao City', 21, '2021-12-27', 123456789, 'jerson@gmail.com', 'Punpun', 'jerson', 1, '623f01807ea97_puns_2022-03-26.jpg', '2022-03-25 00:11:55'),
(2, 'gage', 'Tamad', 'Male', 'Manila Ph', 99, '1993-07-08', 132456789, 'juan@tamad.com', 'juan', '13', 0, '', '2022-03-25 00:47:45'),
(3, 'juan', 'tamad', 'Male', 'Taga Samal', 99, '2022-03-02', 132456789, 'tamad@juan.com', 'tamadFunny', 'funny', 0, 'userplaceholder.png', '2022-03-27 03:43:26'),
(4, 'Jose', 'Marie', 'Male', 'Taga Manila ni', 150, '2022-03-02', 132456789, 'jose@chan.com', 'jose', 'chan', 0, 'userplaceholder.png', '2022-03-27 03:44:37'),
(5, 'umay', 'lods', 'Female', '', 999, '3222-03-12', 123123, '', 'umays', '123', 0, 'userplaceholder.png', '2022-03-27 03:07:32'),
(6, 'samok', 'kaayo', 'Male', '', 121, '1211-02-21', 12312312, 'samok@kaayo.com', 'samok', '123', 0, 'userplaceholder.png', '2022-03-27 03:10:23'),
(7, 'samok', 'kaayo', 'Male', 'davao', 121, '1211-02-21', 12312312, 'samok@kaayo.com', 'samoka', '123', 0, 'userplaceholder.png', '2022-03-27 03:12:55'),
(8, 'Jerson Ray', 'Desierto', 'Male', 'davao', 21, '1211-02-21', 12312312, 'jerson@jerson.com', 'jerson', '123', 0, 'userplaceholder.png', '2022-03-27 03:18:02'),
(9, 'jeje', 'jeje', 'Male', 'jeje', 11, '0000-00-00', 123, 'awsde@asda.com', 'animal', 'asd', 0, 'userplaceholder.png', '2022-03-27 03:19:23'),
(10, '123', '123', 'Male', 'asdasd', 123, '3212-03-12', 123, 'asdasd@asdasd.com', 'gagase', 'asd', 0, 'userplaceholder.png', '2022-03-27 03:23:33'),
(11, 'Jerson', 'Ray', 'Male', 'davao', 21, '1211-02-21', 123123, 'ada@asd.omc', 'hehe', '123', 0, 'userplaceholder.png', '2022-03-27 03:29:19'),
(12, 'jerson', '123', 'Male', 'asd', 21, '1212-02-21', 2121, 'asd@asd.com', 'asddsa', 'asd', 0, 'userplaceholder.png', '2022-03-27 03:30:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
