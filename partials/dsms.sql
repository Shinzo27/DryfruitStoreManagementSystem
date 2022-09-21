-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2022 at 07:13 PM
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
(1, 'Cashew', 'dryfruit', 'images\\product1.jpg', 650.00, 'instock', 0, '2022-09-18'),
(2, 'Almond', 'dryfruit', 'images\\product2.png', 750.00, 'instock', 0, '2022-09-18'),
(3, 'Dried Strawberry', 'driedfruit', 'images\\driedfruit1.jpg', 520.00, 'instock', 0, '2022-09-18'),
(4, 'Dried Kiwi', 'driedfruit', 'images\\driedfruit2.jpg', 520.00, 'instock', 0, '2022-09-18');

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
(1, 'Pratham27', 'prathampatel5553@gmail.com', '$2y$10$Q8pRZHHNKgTqjVz9nYpEJeTJ7DPEGRYay7KB/I/DgG2fRVjdda11i', 'customer', 'd7545eb001cd', '2022-09-21 21:54:06'),
(3, 'Pratham5553', 'prathampatel@gmail.com', '$2y$10$tniksmUya5hj.oseH2OSS.QgF09Di4xTQoXrJ./XBnv2WlFnjRIj2', 'customer', '120108', '2022-09-21 21:58:22');

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
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `uid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
