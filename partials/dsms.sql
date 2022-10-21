-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 04:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `oid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `number` varchar(12) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` bigint(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`oid`, `uid`, `name`, `number`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(2, 11, 'Pratham Patel', '7878435553', 'cashondelivery', 'flat no. 193, Nani Fali,Pal Gam, nr. pal prathmik school, Surat , gujarat', ', Cashew (1) ', 650, '17-Oct-2022', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `pid` int(10) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `category` varchar(40) NOT NULL,
  `pimage` varchar(255) NOT NULL,
  `price` float(100,2) NOT NULL,
  `stock` float(100,2) NOT NULL,
  `status` varchar(40) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`pid`, `pname`, `category`, `pimage`, `price`, `stock`, `status`, `date`) VALUES
(1, 'Cashew', 'dryfruit', 'images/634b9b9cae7c6.jpg', 650.00, 0.00, 'activate', '2022-10-16'),
(3, 'Dried Pineapple', 'driedfruit', 'images/634b9c7e7df3f.jpg', 520.00, 0.00, 'activate', '2022-10-16'),
(4, 'Almond', 'dryfruit', 'images/634bfb2d34e20.png', 780.00, 25.00, 'activate', '2022-10-16'),
(5, 'Bhatha Kani 240gm', 'namkeen', 'images/634bfca223757.png', 40.00, 20.00, 'activate', '2022-10-16'),
(6, 'Garam Masala', 'masala', 'images/634bfccd8dd8e.jpg', 80.00, 15.00, 'activate', '2022-10-16'),
(7, 'Coke 750ml', 'colddrink', 'images/634d5d32ee159.jpg', 40.00, 25.00, 'activate', '2022-10-16'),
(8, 'Bhavnagari Gathiya', 'namkeen', 'images/634d5dd63af70.png', 50.00, 20.00, 'activate', '2022-10-17'),
(9, 'Plain Sev', 'namkeen', 'images/634d5e217876f.png', 40.00, 20.00, 'activate', '2022-10-17'),
(10, 'Khatta Mitha', 'namkeen', 'images/634d5e40bcfd8.png', 50.00, 15.00, 'activate', '2022-10-17'),
(11, 'Surti Special', 'namkeen', 'images/634d5e5d173d8.png', 50.00, 20.00, 'activate', '2022-10-17'),
(12, 'Dried Strawberry', 'driedfruit', 'images/634d5e98b464a.jpg', 600.00, 20.00, 'activate', '2022-10-17'),
(13, 'Dried Kiwi', 'driedfruit', 'images/634d5ebced25a.jpg', 600.00, 20.00, 'activate', '2022-10-17'),
(14, 'Dried Orange', 'driedfruit', 'images/634d5ed95125e.jpg', 650.00, 20.00, 'activate', '2022-10-17'),
(15, 'Pomelo Green', 'driedfruit', 'images/634d5f0152769.jpg', 680.00, 20.00, 'activate', '2022-10-17'),
(16, 'Mix Driedfruit', 'driedfruit', 'images/634d5f32644df.jpg', 1000.00, 15.00, 'activate', '2022-10-17'),
(17, 'Mangalori Mix', 'namkeen', 'images/634d5f7aa926f.png', 50.00, 20.00, 'activate', '2022-10-17'),
(18, 'Chaat Masala', 'masala', 'images/634d606e05ca2.jpg', 30.00, 20.00, 'activate', '2022-10-17'),
(19, 'Biryani Masala', 'masala', 'images/634d6088644f6.jpg', 50.00, 15.00, 'activate', '2022-10-17'),
(20, 'Kasmiri Chilli Powder', 'masala', 'images/634d60a80597e.jpg', 90.00, 15.00, 'activate', '2022-10-17'),
(21, 'Turmeric Powder', 'masala', 'images/634d60cae0eef.jpg', 250.00, 20.00, 'activate', '2022-10-17'),
(22, 'Kitchen King Masala', 'masala', 'images/634d60e432209.jpg', 50.00, 20.00, 'activate', '2022-10-17'),
(23, 'Fanta 750ml', 'colddrink', 'images/634d62f6db4f1.jpg', 40.00, 20.00, 'activate', '2022-10-17'),
(24, 'Nescafe Coffee', 'colddrink', 'images/634d63165dc50.jpg', 40.00, 15.00, 'activate', '2022-10-17'),
(25, 'RAW Coconut Water', 'colddrink', 'images/634d632e1b421.jpg', 40.00, 20.00, 'activate', '2022-10-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `uid` int(40) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(20) NOT NULL,
  `otp` varchar(256) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`uid`, `username`, `email`, `password`, `role`, `otp`, `date`) VALUES
(3, 'Pratham5553', 'prathampatel@gmail.com', '$2y$10$tniksmUya5hj.oseH2OSS.QgF09Di4xTQoXrJ./XBnv2WlFnjRIj2', 'customer', '120108', '2022-09-21 21:58:22'),
(11, 'Pratham Patel', '20bmiit031@gmail.com', '$2y$10$lfOOxlsoOvIax5GMST4ORuJ9rTkRe0emxnGuuyWAQVdnHZQPWwo1m', 'customer', '681355', '2022-09-22 20:24:13'),
(12, 'Rohan Vaghasiya', '5553pkp@gmail.com', '$2y$10$RmGGW94/rNs6CH.av5d.4.uEB3tU.7IzeC8umBCae.PqgHMQa/DtS', 'customer', '623468', '2022-09-22 20:48:19'),
(13, 'admin123', 'admin123@gmail.com', '$2a$04$C3BNLhyRNZLXBPvuFGPdXOfKuQrVJAzTFfM7AD70lHSGYf9Rd53kO', 'admin', '123456', '2022-09-22 22:13:44'),
(14, 'Pratham Patel', 'shinzopatel@gmail.com', '$2y$10$G/6s/eSV0bZU1iZzKwNl0O3Z40tdbts3hSl8mG9xrgeNwFxJO7o7K', 'customer', '452608', '2022-09-22 22:26:29'),
(15, 'Pratham Patel', 'prathampatel5553@gmail.com', '$2y$10$lW/4UKmPcmrXWexNC26VH.lsFkxqrTB64MULqAchYoY4/n6dfHtw6', 'customer', '195780', '2022-09-23 00:09:54'),
(16, 'pratham', 'pratham@gmail.com', '$2y$10$SJCyEcvRUzZ8dDl0BQCpKukWNbDWhyW.H/fG9FfUgvct65N3tCsJ6', 'admin', '', '2022-10-15 14:45:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `pname` (`pname`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `uid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
