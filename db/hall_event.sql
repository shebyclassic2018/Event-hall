-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2021 at 10:32 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hall_event`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `hall_id`, `cust_id`, `start_date`, `end_date`, `created_at`, `status`) VALUES
(45, 17, 2, '2021-07-13', '2021-07-15', '2021-07-13 17:41:51', 'cancelled'),
(46, 14, 2, '2021-07-13', '2021-07-15', '2021-07-13 17:44:33', 'confirmed'),
(47, 14, 2, '2021-07-13', '2021-07-20', '2021-07-13 17:48:39', 'cancelled'),
(48, 18, 2, '2021-07-14', '2021-07-20', '2021-07-13 17:55:30', 'cancelled'),
(53, 19, 2, '2021-07-15', '2021-07-16', '2021-07-15 19:00:37', 'confirmed'),
(55, 22, 8, '2021-07-15', '2021-07-20', '2021-07-15 20:12:42', 'confirmed'),
(56, 22, 2, '2021-07-21', '2021-07-25', '2021-07-15 20:14:05', 'cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `id` int(11) NOT NULL,
  `hall_name` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(1000) NOT NULL,
  `hall_picture` varchar(255) NOT NULL,
  `manager_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`id`, `hall_name`, `capacity`, `price`, `description`, `hall_picture`, `manager_id`) VALUES
(8, 'Midland', 1000, 50000, '', '4b8dd67c88a37ad7bf32a8fdf75e9ae2.jpg', 11),
(9, 'CHERRY', 3000, 60000, '', '1295297827462-Picture098.jpg', 11),
(10, 'Serena Hotel', 4000, 700000, '', 'Olympia-Tower-278-960x820.jpg', 11),
(11, 'Cate Hotel', 2000, 70000, '', 'img_3276.jpg', 12),
(12, 'Nashera Hotel', 1000, 4000000, '', 'IMG_0777-d0777d20e3.png', 12),
(14, 'Flomi Hotel', 2000, 500000, '', 'pack_2897.jpg', 12),
(17, 'Edema Hotel', 4000, 500000, '', 'Bellagio-Tower-Red-262-960x820.jpg', 11),
(18, 'Coder', 1000, 100000, '', 'code.png', 11),
(19, 'Sheby', 2000, 200000, '', 'g6.png', 11),
(21, 'gkjgjgj', 5466, 6876870, '', 'g4.png', 11),
(22, 'gere', 121213, 12121, '', 'hd-background-images-beautiful-background-hd-wallpapers-pulse-of-background-hd.jpg', 14),
(23, 'RedCapet', 1000, 100000, '', '255768401705_status_c669ec376d8a4ff9ae01a450dcf97030.jpg', 14);

-- --------------------------------------------------------

--
-- Table structure for table `related_hall`
--

CREATE TABLE `related_hall` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `hall_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `related_hall`
--

INSERT INTO `related_hall` (`id`, `filename`, `hall_id`) VALUES
(1, 'b1.png', 10),
(2, 'g1.png', 10),
(3, 'g4.png', 17),
(4, 'hd-background-images-beautiful-background-hd-wallpapers-pulse-of-background-hd.jpg', 17),
(5, 'b2.png', 19),
(6, 'p5.png', 10),
(7, 'g5.png', 22),
(8, 'haas.png', 22);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'customer'),
(2, 'manager'),
(3, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `phone`, `email`, `address`, `sex`, `password`, `role_id`) VALUES
(2, 'Perus Masatu', '0768675423', 'perus@gmail.com', 'Moshi, Kilimanjaro', 'F', '12345', 1),
(8, 'Betty', '0768188181', 'betty@gmail.com', 'pobox21', 'F', 'betty', 1),
(9, 'ALEX', '0718800422', 'captain@gmail.com', 'pobox21', 'M', 'captain', 1),
(10, 'UPENDO ', '0743376599 ', 'upendo@gmail.com', 'Pobox. 60', 'F', 'upendo', 3),
(11, 'SHR', '0767554323', 's@gmail.com', 'po234', 'M', '12345', 2),
(12, 'HAMADI PASHUA', '0768564543', 'h@gmail.com', 'ghgbfdghdfgd', 'M', 'h12345', 2),
(13, 'SHABANI B', '0718800422', 'sh@gmail.com', 'dsdsdsf', 'M', '123', 3),
(14, 'SHEBYCLASSIC', '0718800422', 'd@gmail.com', 'ghgbfdghdfgd', 'M', 'd123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall_id` (`hall_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `related_hall`
--
ALTER TABLE `related_hall`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hall_id` (`hall_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `related_hall`
--
ALTER TABLE `related_hall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `customer_order_ibfk_1` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_order_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hall`
--
ALTER TABLE `hall`
  ADD CONSTRAINT `hall_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `related_hall`
--
ALTER TABLE `related_hall`
  ADD CONSTRAINT `related_hall_ibfk_1` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
