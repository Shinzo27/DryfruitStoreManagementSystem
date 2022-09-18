-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2022 at 07:11 PM
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
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `roll` enum('admin','customer') NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `username`, `email`, `password`, `roll`, `date`) VALUES
(33, 'Admin123', 'Admin@gmail.com', 'Admin123', 'admin', '2022-08-31 20:17:36'),
(34, 'Pratham27', '20bmiit031@gmail.com', 'Pratham@27', 'customer', '2022-08-31 20:18:03'),
(35, 'Rohan9998', 'rohan@gmail.com', 'Rohan123', 'customer', '2022-08-31 20:41:51'),
(37, 'Pratham5553', '20bmiit031@gmail.com', '1234', 'customer', '2022-09-02 09:56:21'),
(38, 'Shinzo', 'shinzo@gmail.com', 'shinzo27', 'customer', '2022-09-02 10:41:26'),
(41, 'virus', 'virus@gmail.com', 'virus123', 'customer', '2022-09-02 10:43:14');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
