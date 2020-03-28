-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2020 at 02:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `check_io`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_check_io`
--

CREATE TABLE `tbl_check_io` (
  `check_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `m_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `checkdate` date NOT NULL,
  `checkin` time NOT NULL,
  `checkout` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_check_io`
--

INSERT INTO `tbl_check_io` (`check_id`, `m_id`, `checkdate`, `checkin`, `checkout`) VALUES
(0001, 002, '2020-03-26', '23:34:23', '23:34:41'),
(0002, 003, '2020-03-26', '23:35:08', '23:35:15'),
(0003, 002, '2020-03-27', '10:09:56', NULL),
(0004, 002, '2020-03-28', '07:27:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `m_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `m_username` varchar(50) NOT NULL,
  `m_password` varchar(50) NOT NULL,
  `m_title` varchar(50) NOT NULL,
  `m_firstname` varchar(100) NOT NULL,
  `m_lastname` varchar(100) NOT NULL,
  `m_position` varchar(100) NOT NULL,
  `m_img` varchar(100) NOT NULL,
  `m_phone` varchar(20) NOT NULL,
  `m_email` varchar(50) NOT NULL,
  `m_level` varchar(10) NOT NULL,
  `m_datesave` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`m_id`, `m_username`, `m_password`, `m_title`, `m_firstname`, `m_lastname`, `m_position`, `m_img`, `m_phone`, `m_email`, `m_level`, `m_datesave`) VALUES
(001, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Miss', 'Admin', 'Test', 'admin', 'm1.jpg', '0612219031', 'admin@gmail.com', 'admin', '2020-03-26 06:22:13'),
(002, 'member', '6467baa3b187373e3931422e2a8ef22f3e447d77', 'Miss', 'Member', 'Test', 'member', 'm2.jpg', '0652253621', 'member@gmail.com', 'member', '2020-03-26 06:22:30'),
(003, 'member2', 'e3070b522277c5cf015a97fb86cbaefe3df1db8f', 'Miss', 'Member2', 'Test2', 'member2', 'm3.jpg', '0652253621', 'member2@gmail.com', 'member', '2020-03-26 06:47:41'),
(004, 'member3', '527b5e9f8603c0480a71467d19536f619c9dae41', 'Miss', 'Member3', 'Test3', 'member3', 'm3.jpg', '0652253621', 'member3@gmail.com', 'member', '2020-03-26 13:15:10'),
(005, 'member4', 'e393ade38b014ccdfb97fb28947f2fec8acaf6e3', 'Miss', 'Member4', 'Test4', 'member4', 'm3.jpg', '0652253621', 'member4@gmail.com', 'member', '2020-03-26 13:15:11'),
(006, 'member5', 'f5a4e184fc0cc0682189c91ef419353d6a4e60ff', 'Miss', 'Member5', 'Test5', 'member5', 'm3.jpg', '0652253621', 'member5@gmail.com', 'member', '2020-03-26 13:15:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_check_io`
--
ALTER TABLE `tbl_check_io`
  ADD PRIMARY KEY (`check_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_check_io`
--
ALTER TABLE `tbl_check_io`
  MODIFY `check_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `m_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
