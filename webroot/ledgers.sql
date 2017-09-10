-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2017 at 01:10 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kounty`
--

-- --------------------------------------------------------

--
-- Table structure for table `ledgers`
--

CREATE TABLE `ledgers` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `accounting_group_id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `supplier_id` int(10) DEFAULT NULL,
  `type_of_tax` varchar(10) DEFAULT NULL COMMENT 'GST/Others',
  `tax_type` varchar(10) DEFAULT NULL COMMENT 'CGST/SGST/IGST/CESS',
  `percentage_of_calculation` decimal(5,2) NOT NULL,
  `input_output` varchar(10) NOT NULL COMMENT 'input/output'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ledgers`
--

INSERT INTO `ledgers` (`id`, `name`, `accounting_group_id`, `company_id`, `customer_id`, `supplier_id`, `type_of_tax`, `tax_type`, `percentage_of_calculation`, `input_output`) VALUES
(1, 'test ledger 1', 32, 1, NULL, NULL, NULL, NULL, '0.00', ''),
(2, 'test ledger 1', 32, 1, NULL, NULL, NULL, NULL, '0.00', ''),
(3, 'test ledger 2', 34, 1, NULL, NULL, NULL, NULL, '0.00', ''),
(4, 'test ledger 3', 0, 1, NULL, NULL, NULL, NULL, '0.00', ''),
(5, 'test ledger 4', 32, 1, NULL, NULL, NULL, NULL, '0.00', ''),
(6, 'hello', 32, 1, NULL, NULL, NULL, NULL, '0.00', ''),
(7, 'hello', 32, 1, NULL, NULL, NULL, NULL, '0.00', ''),
(8, 'hello', 32, 1, NULL, NULL, NULL, NULL, '0.00', ''),
(9, 'Sales Acc.', 45, 1, NULL, NULL, NULL, NULL, '0.00', ''),
(10, 'customer 1', 53, 1, 1, NULL, NULL, NULL, '0.00', ''),
(11, '2.5% CGST', 54, 1, NULL, NULL, 'GST', 'CGST', '2.50', 'output'),
(12, '0% CGST', 54, 1, NULL, NULL, 'GST', 'CGST', '0.00', 'output'),
(13, '6% CGST', 54, 1, NULL, NULL, 'GST', 'CGST', '6.00', 'output'),
(14, '9% CGST', 54, 1, NULL, NULL, 'GST', 'CGST', '9.00', 'output'),
(15, '14% CGST', 54, 1, NULL, NULL, 'GST', 'CGST', '14.00', 'output'),
(16, '0% SGST', 54, 1, NULL, NULL, 'GST', 'SGST', '0.00', 'output'),
(17, '2.5% SGST', 54, 1, NULL, NULL, 'GST', 'SGST', '2.50', 'output'),
(18, '6% SGST', 54, 1, NULL, NULL, 'GST', 'SGST', '6.00', 'output'),
(19, '9% SGST', 54, 1, NULL, NULL, 'GST', 'SGST', '9.00', 'output'),
(20, '14% SGST', 54, 1, NULL, NULL, 'GST', 'SGST', '14.00', 'output'),
(21, '0% IGST', 54, 1, NULL, NULL, 'GST', 'IGST', '0.00', 'output'),
(22, '2.5% IGST', 54, 1, NULL, NULL, 'GST', 'IGST', '2.50', 'output'),
(23, '6% IGST', 54, 1, NULL, NULL, 'GST', 'IGST', '6.00', 'output'),
(24, '9% IGST', 54, 1, NULL, NULL, 'GST', 'IGST', '9.00', 'output'),
(25, '14% IGST', 54, 1, NULL, NULL, 'GST', 'IGST', '14.00', 'output'),
(26, '14% IGST', 54, 1, NULL, NULL, 'GST', 'IGST', '14.00', 'input'),
(27, '9% IGST', 54, 1, NULL, NULL, 'GST', 'IGST', '9.00', 'input'),
(28, '6% IGST', 54, 1, NULL, NULL, 'GST', 'IGST', '6.00', 'input'),
(29, '2.5% IGST', 54, 1, NULL, NULL, 'GST', 'IGST', '2.50', 'input'),
(30, '0% IGST', 54, 1, NULL, NULL, 'GST', 'IGST', '0.00', 'input'),
(31, '14% SGST', 54, 1, NULL, NULL, 'GST', 'SGST', '14.00', 'input'),
(32, '9% SGST', 54, 1, NULL, NULL, 'GST', 'SGST', '9.00', 'input'),
(33, '6% SGST', 54, 1, NULL, NULL, 'GST', 'SGST', '6.00', 'input'),
(34, '2.5% SGST', 54, 1, NULL, NULL, 'GST', 'SGST', '2.50', 'input'),
(35, '0% SGST', 54, 1, NULL, NULL, 'GST', 'SGST', '0.00', 'input'),
(36, '14% CGST', 54, 1, NULL, NULL, 'GST', 'CGST', '14.00', 'input'),
(37, '9% CGST', 54, 1, NULL, NULL, 'GST', 'CGST', '9.00', 'input'),
(38, '6% CGST', 54, 1, NULL, NULL, 'GST', 'CGST', '6.00', 'input'),
(39, '0% CGST', 54, 1, NULL, NULL, 'GST', 'CGST', '0.00', 'input'),
(40, '2.5% CGST', 54, 1, NULL, NULL, 'GST', 'CGST', '2.50', 'input');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ledgers`
--
ALTER TABLE `ledgers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
