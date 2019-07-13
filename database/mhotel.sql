-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2018 at 08:42 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `bio` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `username`, `email`, `bio`, `password`, `user_type`) VALUES
(1, 'Taslima Akter', 'admin', 'taslima@gmail.com', '', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(2, 'Eti Akter', 'eti', 'eti@gmail.com', '', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(11) NOT NULL,
  `usrId` int(11) NOT NULL,
  `RpacId` int(11) NOT NULL,
  `RpacName` varchar(50) NOT NULL,
  `RpacPrice` int(50) NOT NULL,
  `checkInDate` date NOT NULL,
  `checkOutDate` date NOT NULL,
  `quantity` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `usrId`, `RpacId`, `RpacName`, `RpacPrice`, `checkInDate`, `checkOutDate`, `quantity`) VALUES
(5, 1, 1, 'King Suit', 2500, '2018-04-18', '2018-04-18', '3'),
(7, 4, 1, 'King Suit', 2500, '2018-04-20', '2018-04-20', '1'),
(9, 2, 3, 'package two', 2500, '2018-04-24', '2018-04-27', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `cat_name`) VALUES
(1, 'gold'),
(2, 'silver'),
(3, 'bronge');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `resturent_id` int(11) NOT NULL,
  `pac_name` varchar(100) NOT NULL,
  `pac_desc` text NOT NULL,
  `pac_img` varchar(50) NOT NULL,
  `pac_duration` varchar(50) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `pac_price` int(50) NOT NULL,
  `pac_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`id`, `catid`, `resturent_id`, `pac_name`, `pac_desc`, `pac_img`, `pac_duration`, `startDate`, `endDate`, `pac_price`, `pac_quantity`) VALUES
(1, 1, 1, 'Silver', '<p>Fast Package</p>\r\n', 'upload/2b19fd79f1.jpg', '2 Nights', '2018-04-23', '2018-04-25', 2500, 3),
(2, 2, 3, 'package two', '<p>package two</p>\r\n', 'upload/4a1f2254e9.jpg', '3', '2018-04-24', '2018-04-27', 2500, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `usrId` int(11) NOT NULL,
  `RpacId` int(11) NOT NULL,
  `pacName` varchar(50) NOT NULL,
  `price` double(10,2) NOT NULL,
  `checkInDate` date NOT NULL,
  `checkOutDate` date NOT NULL,
  `quantity` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `usrId`, `RpacId`, `pacName`, `price`, `checkInDate`, `checkOutDate`, `quantity`) VALUES
(1, 2, 1, 'King Suit', 2550.00, '2018-04-21', '2018-04-22', ''),
(2, 2, 1, 'King Suit', 2550.00, '2018-04-27', '2018-04-27', ''),
(4, 2, 1, 'King Suit', 2550.00, '2018-04-21', '2018-04-21', ''),
(5, 2, 1, 'King Suit', 7650.00, '2018-04-21', '2018-04-24', ''),
(6, 2, 1, 'King Suit', 5100.00, '2018-04-21', '2018-04-23', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resturent`
--

CREATE TABLE `tbl_resturent` (
  `id` int(11) NOT NULL,
  `food_name` varchar(150) NOT NULL,
  `food_type` varchar(150) NOT NULL,
  `food_img` varchar(50) NOT NULL,
  `food_desc` text NOT NULL,
  `price` int(50) NOT NULL,
  `food_cat` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_resturent`
--

INSERT INTO `tbl_resturent` (`id`, `food_name`, `food_type`, `food_img`, `food_desc`, `price`, `food_cat`) VALUES
(3, 'Seafood with candle dinner', 'Sea Food', 'upload/4b38ffca1c.jpg', '<p>Some Description about the dishes you provided will be located in this section to help your guest to choose the best one.</p>\r\n', 1500, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `room_title` varchar(150) NOT NULL,
  `room_type` varchar(250) NOT NULL,
  `room_img` varchar(250) NOT NULL,
  `room_desc` text NOT NULL,
  `checkInDate` date NOT NULL,
  `checkOutDate` date NOT NULL,
  `price` int(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`id`, `cat_id`, `room_title`, `room_type`, `room_img`, `room_desc`, `checkInDate`, `checkOutDate`, `price`, `status`) VALUES
(1, 2, 'King Suit', 'Duplex', 'upload/8ac3ef5bb8.jpg', 'All details about the rooms can be added in this section. Details can be included of all details and features of the rooms like descriptive details about the view, equipments and etc. Also you can describe all the services which are included in this rooms that means that what services a guest can use by booking this room. Descriptive details can helps the guest to choose the best room and enjoy the time they will spend in this room. You can list all the highlighted features and services that guest can use by booking this room in the below list, this list helps the users to be notified about the important features of this room.\r\n', '0000-00-00', '0000-00-00', 2500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `email`, `phone`, `address`, `city`, `zip`, `password`) VALUES
(1, 'Taslima Akter', 'taslima', 'taslima@gmail.com', '01764897541', '', '', '', '202cb962ac59075b964b07152d234b70'),
(2, 'Junaki Akter', 'junaki', 'junaki@gmail.com', '01658741476', 'Uttara', 'Dhaka', '1230', '202cb962ac59075b964b07152d234b70'),
(3, 'kazi rabbi', 'kazi', 'kazirabbi1000@gmail.com', '01832457890', '', '', '', '202cb962ac59075b964b07152d234b70'),
(4, 'jaman khan', 'jaman', 'jaman@gmail.com', '016789652314', 'uttara', 'Dhaka', '1230', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_resturent`
--
ALTER TABLE `tbl_resturent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_resturent`
--
ALTER TABLE `tbl_resturent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
