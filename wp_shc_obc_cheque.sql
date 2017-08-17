-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2017 at 08:33 AM
-- Server version: 10.1.13-MariaDB


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `benvin`
--

seegan Evan hi
-- --------------------------------------------------------

--
-- Table structure for table `wp_shc_obc_cheque`
--

CREATE TABLE `wp_shc_obc_cheque` (
  `id` int(11) NOT NULL,
  `master_id` int(11) NOT NULL,
  `cheque_no` varchar(255) NOT NULL,
  `cheque_date` date NOT NULL,
  `cheque_amount` decimal(15,2) NOT NULL,
  `notes` text NOT NULL,
  `obc_date` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wp_shc_obc_cheque`
--

INSERT INTO `wp_shc_obc_cheque` (`id`, `master_id`, `cheque_no`, `cheque_date`, `cheque_amount`, `notes`, `obc_date`, `created_at`, `modified_at`, `active`) VALUES
(1, 5, '4543543', '2017-08-22', '20000.00', 'seegan', '2017-08-15 00:00:00', '2017-08-15 10:13:12', '2017-08-15 10:47:28', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_shc_obc_cheque`
--
ALTER TABLE `wp_shc_obc_cheque`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_shc_obc_cheque`
--
ALTER TABLE `wp_shc_obc_cheque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
