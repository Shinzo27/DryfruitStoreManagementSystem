-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 08:14 PM
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
  `pid` int(255) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcart`
--

INSERT INTO `tblcart` (`cid`, `uid`, `pid`, `pname`, `price`, `quantity`, `date`) VALUES
(58, 11, 4, 'Almond', 195, 1, '2022-12-09 16:47:23'),
(59, 11, 12, 'Dried Strawberry', 150, 2, '2022-12-09 16:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `fid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfeedback`
--

INSERT INTO `tblfeedback` (`fid`, `fname`, `lname`, `email`, `title`, `message`, `date`) VALUES
(2, 'pratham', 'patel', '20bmiit031@gmail.com', 'Top Quality', 'I just got best quality on affordable prices!!', '2022-12-09 23:35:52'),
(7, 'Shinzo', 'patel', '20bmiit070@gmail.com', 'Good Services', 'Happy with the service I got!!', '2022-12-09 23:41:05');

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
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  `delivery_status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`oid`, `uid`, `name`, `number`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`, `delivery_status`) VALUES
(2, 11, 'Pratham Patel', '7878435553', 'cashondelivery', 'flat no. 193, Nani Fali,Pal Gam, nr. pal prathmik school, Surat , gujarat', ', Cashew (1) ', 650, '17-Oct-2022', 'pending', 'pending'),
(3, 11, 'Pratham Patel', '7878435553', 'cashondelivery', 'flat no. 193, Nani Fali,Pal Gam, nr. pal prathmik school, surat , gujarat', ', Cashew (1) , Almond (2) ', 553, '05-Dec-2022', 'Paid', 'Delivered'),
(46, 11, 'Pratham Patel', '7878435553', 'prepaid', 'flat no. 193, Nani Fali,Pal Gam, nr. pal prathmik school, surat , gujarat', ', Cashew (1) ', 163, '06-Dec-2022', 'pending', 'pending'),
(47, 11, 'Pratham Patel', '7878435553', 'cashondelivery', 'flat no. 193, Nani Fali,Pal Gam, nr. pal prathmik school, surat , gujarat', ', Cashew (1) , Dried Strawberry (1) ', 313, '06-Dec-2022', 'Paid', 'Delivered'),
(49, 11, 'Ayush Rokad', '7878435553', 'prepaid', 'flat no. 193, Nani Fali,Pal Gam, nr. pal prathmik school, surat , gujarat', ', Cashew (1) ', 163, '08-Dec-2022', 'pending', 'pending'),
(50, 11, 'Pratham Patel', '7878435553', 'prepaid', 'flat no. 193, Nani Fali,Pal Gam, nr. pal prathmik school, surat , gujarat', ', Cashew (2) ', 326, '08-Dec-2022', 'pending', 'pending'),
(51, 11, 'Shinzo27', '1234567890', 'prepaid', 'flat no. 193, Nani Fali,Pal Gam, nr. pal prathmik school, Surat , gujarat', ', Almond (2) ', 390, '08-Dec-2022', 'pending', 'pending'),
(52, 11, 'Shinzo27', '7878435553', 'prepaid', 'flat no. 193, Nani Fali,Pal Gam, nr. pal prathmik school, surat , gujarat', ', Cashew (1) , Dried Pineapple (1) ', 293, '08-Dec-2022', 'pending', 'pending'),
(53, 11, 'Pratham Patel', '7878435553', 'prepaid', 'flat no. 193, Nani Fali,Pal Gam, nr. pal prathmik school, surat , gujarat', ', Dried Strawberry (1) ', 150, '08-Dec-2022', 'pending', 'pending'),
(54, 11, 'Rohan Vaghasiya', '7878435553', 'prepaid', 'flat no. 193, Nani Fali,Pal Gam, nr. pal prathmik school, surat , gujarat', ', Mix Driedfruit (1) ', 250, '08-Dec-2022', 'pending', 'pending'),
(55, 11, 'Rohan', '7878435553', 'prepaid', 'flat no. 193, Nani Fali,Pal Gam, nr. pal prathmik school, surat , gujarat', ', Bhatha Kani 240gm (1) ', 40, '08-Dec-2022', 'Paid', 'Delivered'),
(56, 11, 'Shinzo27', '7878435553', 'prepaid', 'flat no. 193, Nani Fali,Pal Gam, nr. pal prathmik school, surat , gujarat', ', Bhavnagari Gathiya (2) , Mix Driedfruit (1) ', 350, '08-Dec-2022', 'Paid', 'Delivered'),
(57, 11, 'Shinzo27', '7878435553', 'prepaid', 'flat no. 193, Nani Fali,Pal Gam, nr. pal prathmik school, surat , gujarat', ', Bhavnagari Gathiya (2) , Mix Driedfruit (1) ', 350, '08-Dec-2022', 'Paid', 'Delivered'),
(58, 11, 'Shinzo27', '7878435553', 'prepaid', 'flat no. 193, Nani Fali,Pal Gam, nr. pal prathmik school, surat , gujarat', ', Garam Masala (1) , RAW Coconut Water (1) ', 120, '08-Dec-2022', 'Paid', 'Delivered'),
(59, 18, 'Ayush Rokad', '7878435553', 'cashondelivery', 'flat no. a-101, ashwinikumar, katargam char rasta, surat , gujarat', ', Cashew (1) , Surti Special (1) ', 213, '09-Dec-2022', 'pending', 'pending');

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
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`pid`, `pname`, `category`, `pimage`, `price`, `status`, `date`) VALUES
(1, 'Cashew', 'dryfruit', 'images/634b9b9cae7c6.jpg', 650.00, 'activate', '2022-10-16'),
(3, 'Dried Pineapple', 'driedfruit', 'images/634b9c7e7df3f.jpg', 520.00, 'activate', '2022-10-16'),
(4, 'Almond', 'dryfruit', 'images/634bfb2d34e20.png', 780.00, 'activate', '2022-10-16'),
(5, 'Bhatha Kani 240gm', 'namkeen', 'images/634bfca223757.png', 40.00, 'activate', '2022-10-16'),
(6, 'Garam Masala', 'masala', 'images/634bfccd8dd8e.jpg', 80.00, 'activate', '2022-10-16'),
(7, 'Coke 750ml', 'colddrink', 'images/634d5d32ee159.jpg', 40.00, 'activate', '2022-10-16'),
(8, 'Bhavnagari Gathiya', 'namkeen', 'images/634d5dd63af70.png', 50.00, 'activate', '2022-10-17'),
(9, 'Plain Sev', 'namkeen', 'images/634d5e217876f.png', 40.00, 'activate', '2022-10-17'),
(10, 'Khatta Mitha', 'namkeen', 'images/634d5e40bcfd8.png', 50.00, 'activate', '2022-10-17'),
(11, 'Surti Special', 'namkeen', 'images/634d5e5d173d8.png', 50.00, 'activate', '2022-10-17'),
(12, 'Dried Strawberry', 'driedfruit', 'images/634d5e98b464a.jpg', 600.00, 'activate', '2022-10-17'),
(13, 'Dried Kiwi', 'driedfruit', 'images/634d5ebced25a.jpg', 600.00, 'activate', '2022-10-17'),
(14, 'Dried Orange', 'driedfruit', 'images/634d5ed95125e.jpg', 650.00, 'activate', '2022-10-17'),
(15, 'Pomelo Green', 'driedfruit', 'images/634d5f0152769.jpg', 680.00, 'activate', '2022-10-17'),
(16, 'Mix Driedfruit', 'driedfruit', 'images/634d5f32644df.jpg', 1000.00, 'activate', '2022-10-17'),
(17, 'Mangalori Mix', 'namkeen', 'images/634d5f7aa926f.png', 50.00, 'activate', '2022-10-17'),
(18, 'Chaat Masala', 'masala', 'images/634d606e05ca2.jpg', 30.00, 'activate', '2022-10-17'),
(19, 'Biryani Masala', 'masala', 'images/634d6088644f6.jpg', 50.00, 'activate', '2022-10-17'),
(20, 'Kasmiri Chilli Powder', 'masala', 'images/634d60a80597e.jpg', 90.00, 'activate', '2022-10-17'),
(21, 'Turmeric Powder', 'masala', 'images/634d60cae0eef.jpg', 250.00, 'activate', '2022-10-17'),
(22, 'Kitchen King Masala', 'masala', 'images/634d60e432209.jpg', 50.00, 'activate', '2022-10-17'),
(23, 'Fanta 750ml', 'colddrink', 'images/634d62f6db4f1.jpg', 40.00, 'activate', '2022-10-17'),
(24, 'Nescafe Coffee', 'colddrink', 'images/634d63165dc50.jpg', 40.00, 'activate', '2022-10-17'),
(25, 'RAW Coconut Water', 'colddrink', 'images/634d632e1b421.jpg', 40.00, 'activate', '2022-10-17');

-- --------------------------------------------------------

--
-- Table structure for table `tblstock`
--

CREATE TABLE `tblstock` (
  `StId` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstock`
--

INSERT INTO `tblstock` (`StId`, `pid`, `stock`, `date`) VALUES
(1, 1, 9, '2022-12-06 18:14:14'),
(2, 3, 10, '2022-12-09 15:35:52'),
(3, 4, 8, '2022-12-06 18:16:28'),
(4, 5, 9, '2022-12-06 18:16:40'),
(5, 6, 4, '2022-12-06 18:54:13'),
(6, 7, 5, '2022-12-06 18:17:06'),
(7, 8, 6, '2022-12-06 18:17:53'),
(8, 9, 10, '2022-12-06 18:18:09'),
(9, 10, 8, '2022-12-06 18:18:35'),
(10, 11, 6, '2022-12-06 18:18:35'),
(11, 12, 7, '2022-12-06 18:20:31'),
(12, 13, 7, '2022-12-06 18:20:31'),
(13, 14, 5, '2022-12-06 18:20:31'),
(14, 15, 8, '2022-12-06 18:20:31'),
(15, 16, 8, '2022-12-06 18:20:31'),
(16, 17, 7, '2022-12-06 18:20:31'),
(17, 18, 8, '2022-12-06 18:20:31'),
(18, 19, 5, '2022-12-06 18:20:31'),
(19, 20, 8, '2022-12-06 18:21:04'),
(20, 21, 7, '2022-12-06 18:21:04'),
(21, 22, 10, '2022-12-06 18:21:25'),
(22, 23, 7, '2022-12-06 18:21:25'),
(23, 24, 8, '2022-12-06 18:21:44'),
(24, 25, 6, '2022-12-06 18:21:44');

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
(11, 'Pratham Patel', '20bmiit031@gmail.com', '$2y$10$kR5ddp8lZVI0ckAQsD.5ee6atrggW6MX41WZGJUkcGcg0JG1YVMxO', 'customer', '681355', '2022-09-22 20:24:13'),
(12, 'Rohan Vaghasiya', '5553pkp@gmail.com', '$2y$10$RmGGW94/rNs6CH.av5d.4.uEB3tU.7IzeC8umBCae.PqgHMQa/DtS', 'customer', '623468', '2022-09-22 20:48:19'),
(13, 'admin123', 'admin123@gmail.com', '$2a$04$C3BNLhyRNZLXBPvuFGPdXOfKuQrVJAzTFfM7AD70lHSGYf9Rd53kO', 'admin', '123456', '2022-09-22 22:13:44'),
(14, 'Pratham Patel', 'shinzopatel@gmail.com', '$2y$10$G/6s/eSV0bZU1iZzKwNl0O3Z40tdbts3hSl8mG9xrgeNwFxJO7o7K', 'customer', '452608', '2022-09-22 22:26:29'),
(16, 'pratham', 'pratham@gmail.com', '$2y$10$SJCyEcvRUzZ8dDl0BQCpKukWNbDWhyW.H/fG9FfUgvct65N3tCsJ6', 'admin', '', '2022-10-15 14:45:54'),
(18, 'Ayush Rokad', '20bmiit070@gmail.com', '$2y$10$hDeKYyqqpNgxp1LC2y.UJ.PslCT3uHJUEPOmNC/TT3CiUmRSuqK0W', 'customer', '919389', '2022-12-09 21:25:20'),
(22, 'Shinzo27', 'prathampatel5553@gmail.com', '$2y$10$WPx4kjG5f6/dAaNLjM/Y/uvstFW.QMlSIU.Y.8ZboDxGt9oOp8z4y', 'customer', '412035', '2022-12-10 00:42:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`fid`);

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
-- Indexes for table `tblstock`
--
ALTER TABLE `tblstock`
  ADD PRIMARY KEY (`StId`),
  ADD KEY `pid` (`pid`);

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
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblstock`
--
ALTER TABLE `tblstock`
  MODIFY `StId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `uid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblstock`
--
ALTER TABLE `tblstock`
  ADD CONSTRAINT `pid` FOREIGN KEY (`pid`) REFERENCES `tblproduct` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
