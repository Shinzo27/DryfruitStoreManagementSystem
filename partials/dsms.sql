-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 08:29 PM
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
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `pid` int(10) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `category` varchar(40) NOT NULL,
  `pimage` varchar(255) NOT NULL,
  `price` float(100,2) NOT NULL,
  `status` varchar(40) NOT NULL,
  `delete_flag` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`pid`, `pname`, `category`, `pimage`, `price`, `status`, `delete_flag`, `date`) VALUES
(1, 'Cashew', 'dryfruit', 'admin/images/632de5e5c792f.jpg', 650.00, 'activate', 0, '2022-09-23');

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
(15, 'Pratham Patel', 'prathampatel5553@gmail.com', '$2y$10$lW/4UKmPcmrXWexNC26VH.lsFkxqrTB64MULqAchYoY4/n6dfHtw6', 'customer', '195780', '2022-09-23 00:09:54');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `uid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
