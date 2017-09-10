-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2017 at 11:39 AM
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
-- Table structure for table `accounting_entries`
--

CREATE TABLE `accounting_entries` (
  `id` int(11) NOT NULL,
  `ledger_id` int(10) NOT NULL,
  `debit` decimal(15,2) DEFAULT NULL,
  `credit` decimal(15,2) DEFAULT NULL,
  `transaction_date` date NOT NULL,
  `company_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounting_entries`
--

INSERT INTO `accounting_entries` (`id`, `ledger_id`, `debit`, `credit`, `transaction_date`, `company_id`) VALUES
(1, 2, NULL, NULL, '2017-04-01', 1),
(2, 3, NULL, NULL, '2017-04-01', 1),
(3, 4, NULL, NULL, '2017-04-01', 1),
(4, 5, NULL, NULL, '2017-04-01', 1),
(5, 8, '12.00', NULL, '2017-04-01', 1),
(6, 9, NULL, NULL, '2017-04-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `accounting_groups`
--

CREATE TABLE `accounting_groups` (
  `id` int(10) NOT NULL,
  `nature_of_group_id` int(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `company_id` int(10) NOT NULL,
  `customer` tinyint(1) DEFAULT NULL,
  `supplier` tinyint(1) DEFAULT NULL,
  `sale_invoice_party` tinyint(1) DEFAULT NULL,
  `sale_invoice_sales_acc` tinyint(1) DEFAULT NULL,
  `purchase_invoice_party` tinyint(1) DEFAULT NULL,
  `purchase_invoice_purchase_acc` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounting_groups`
--

INSERT INTO `accounting_groups` (`id`, `nature_of_group_id`, `name`, `parent_id`, `lft`, `rght`, `company_id`, `customer`, `supplier`, `sale_invoice_party`, `sale_invoice_sales_acc`, `purchase_invoice_party`, `purchase_invoice_purchase_acc`) VALUES
(32, 3, 'Branch / Divisions', NULL, 95, 96, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 2, 'Capital Account', NULL, 97, 98, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 1, 'Current Assets', NULL, 99, 100, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 2, 'Current Liabilities', NULL, 101, 102, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 4, 'Direct Expenses', NULL, 103, 104, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 3, 'Direct Incomes', NULL, 105, 106, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 1, 'Fixed Assets', NULL, 107, 108, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 4, 'Indirect Expenses', NULL, 109, 110, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 3, 'Indirect Incomes', NULL, 111, 112, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 1, 'Investments', NULL, 113, 114, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 2, 'Loans (Liability)', NULL, 115, 116, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 1, 'Misc. Expenses (ASSET)', NULL, 117, 118, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 4, 'Purchase Accounts', NULL, 119, 120, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 3, 'Sales Accounts', NULL, 121, 122, 1, NULL, NULL, NULL, 1, NULL, NULL),
(46, 2, 'Suspense A/c', NULL, 123, 124, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(47, NULL, 'Reserves & Surplus', 2, 6, 7, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(48, NULL, 'Bank Accounts', 3, 24, 25, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(49, NULL, 'Cash-in-hand', 3, 26, 27, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(50, NULL, 'Deposits (Asset)', 3, 28, 29, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(51, NULL, 'Loans & Advances (Asset)', 3, 30, 31, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(52, NULL, 'Stock-in-hand', 3, 32, 33, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(53, NULL, 'Sundry Debtors', 3, 34, 35, 1, 1, NULL, 1, NULL, NULL, NULL),
(54, NULL, 'Duties & Taxes', 4, 52, 55, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(55, NULL, 'Provisions', 4, 56, 57, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(56, NULL, 'Sundry Creditors', 4, 58, 59, 1, NULL, 1, NULL, NULL, NULL, NULL),
(57, NULL, 'Bank OD A/c', 11, 80, 81, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(58, NULL, 'Secured Loans', 11, 82, 83, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(59, NULL, 'Unsecured Loans', 11, 84, 85, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(60, NULL, 'Input GST', 23, 43, 44, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(61, NULL, 'Output GST', 23, 45, 46, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 1, 'test group', 54, 53, 54, 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `state_id` int(10) NOT NULL,
  `financial_year_begins_from` date NOT NULL,
  `books_beginning_from` date NOT NULL,
  `address` text NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `fax_no` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `gstin` varchar(20) NOT NULL,
  `pan_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `user_id`, `state_id`, `financial_year_begins_from`, `books_beginning_from`, `address`, `phone_no`, `mobile`, `fax_no`, `email`, `website`, `gstin`, `pan_no`) VALUES
(1, 'Kounty Accounting solutions Pvt. Ltd.', 1, 46, '2017-04-01', '2017-04-01', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` int(10) NOT NULL,
  `gstin` varchar(30) NOT NULL,
  `freeze` tinyint(1) NOT NULL DEFAULT '0',
  `company_id` int(10) NOT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `state_id`, `gstin`, `freeze`, `company_id`, `mobile`, `email`, `address`) VALUES
(1, 'customer 1', 46, '82878', 0, 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `financial_years`
--

CREATE TABLE `financial_years` (
  `id` int(10) NOT NULL,
  `fy_from` date NOT NULL,
  `fy_to` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `company_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financial_years`
--

INSERT INTO `financial_years` (`id`, `fy_from`, `fy_to`, `status`, `company_id`) VALUES
(1, '2017-04-01', '2018-03-31', 'open', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hsn_code` varchar(30) NOT NULL,
  `unit_id` int(10) NOT NULL,
  `stock_group_id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `hsn_code`, `unit_id`, `stock_group_id`, `company_id`) VALUES
(1, 'item 1', '', 1, 0, 1),
(2, 'item 2', '', 1, 0, 1);

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
  `supplier_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ledgers`
--

INSERT INTO `ledgers` (`id`, `name`, `accounting_group_id`, `company_id`, `customer_id`, `supplier_id`) VALUES
(1, 'test ledger 1', 32, 1, NULL, NULL),
(2, 'test ledger 1', 32, 1, NULL, NULL),
(3, 'test ledger 2', 34, 1, NULL, NULL),
(4, 'test ledger 3', 0, 1, NULL, NULL),
(5, 'test ledger 4', 32, 1, NULL, NULL),
(6, 'hello', 32, 1, NULL, NULL),
(7, 'hello', 32, 1, NULL, NULL),
(8, 'hello', 32, 1, NULL, NULL),
(9, 'Sales Acc.', 45, 1, NULL, NULL),
(10, 'customer 1', 53, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nature_of_groups`
--

CREATE TABLE `nature_of_groups` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nature_of_groups`
--

INSERT INTO `nature_of_groups` (`id`, `name`) VALUES
(1, 'Assets'),
(2, 'Liabilities'),
(3, 'Income'),
(4, 'Expenses');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoices`
--

CREATE TABLE `purchase_invoices` (
  `id` int(10) NOT NULL,
  `voucher_no` int(10) NOT NULL,
  `transaction_date` date NOT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `party_ledger_id` int(10) NOT NULL,
  `purchase_ledger_id` int(10) NOT NULL,
  `purchase_type` varchar(10) NOT NULL,
  `company_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoice_rows`
--

CREATE TABLE `purchase_invoice_rows` (
  `id` int(10) NOT NULL,
  `purchase_invoice_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `rate` decimal(15,2) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `discount_percentage` decimal(15,2) DEFAULT NULL,
  `discount_amount` decimal(15,2) DEFAULT NULL,
  `pnf_percentage` decimal(15,2) DEFAULT NULL,
  `pnf_amount` decimal(15,2) DEFAULT NULL,
  `taxable_value` decimal(15,2) DEFAULT NULL,
  `cgst_percentage` decimal(15,2) DEFAULT NULL,
  `cgst_amount` decimal(15,2) DEFAULT NULL,
  `sgst_percentage` decimal(15,2) DEFAULT NULL,
  `sgst_amount` decimal(15,2) DEFAULT NULL,
  `igst_percentage` decimal(15,2) DEFAULT NULL,
  `igst_amount` decimal(15,2) DEFAULT NULL,
  `total` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoices`
--

CREATE TABLE `sales_invoices` (
  `id` int(10) NOT NULL,
  `voucher_no` int(10) NOT NULL,
  `transaction_date` date NOT NULL,
  `reference_no` varchar(255) NOT NULL,
  `party_ledger_id` int(10) NOT NULL,
  `sales_ledger_id` int(10) NOT NULL,
  `sales_type` varchar(10) NOT NULL,
  `company_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_invoices`
--

INSERT INTO `sales_invoices` (`id`, `voucher_no`, `transaction_date`, `reference_no`, `party_ledger_id`, `sales_ledger_id`, `sales_type`, `company_id`) VALUES
(4, 1, '2017-09-10', 'ref1', 10, 0, 'Credit', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_invoice_rows`
--

CREATE TABLE `sales_invoice_rows` (
  `id` int(10) NOT NULL,
  `sales_invoice_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `rate` decimal(15,2) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `discount_percentage` decimal(5,2) DEFAULT NULL,
  `discount_amount` decimal(15,2) DEFAULT NULL,
  `pnf_percentage` decimal(5,2) DEFAULT NULL,
  `pnf_amount` decimal(15,2) DEFAULT NULL,
  `taxable_value` decimal(15,2) NOT NULL,
  `cgst_percentage` decimal(5,2) DEFAULT NULL,
  `cgst_amount` decimal(15,2) DEFAULT NULL,
  `sgst_percentage` decimal(5,2) DEFAULT NULL,
  `sgst_amount` decimal(15,2) DEFAULT NULL,
  `igst_percentage` decimal(5,2) DEFAULT NULL,
  `igst_amount` decimal(15,2) DEFAULT NULL,
  `total` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_invoice_rows`
--

INSERT INTO `sales_invoice_rows` (`id`, `sales_invoice_id`, `item_id`, `quantity`, `rate`, `amount`, `discount_percentage`, `discount_amount`, `pnf_percentage`, `pnf_amount`, `taxable_value`, `cgst_percentage`, `cgst_amount`, `sgst_percentage`, `sgst_amount`, `igst_percentage`, `igst_amount`, `total`) VALUES
(1, 4, 1, '12.00', '45.00', '540.00', NULL, NULL, NULL, NULL, '540.00', NULL, NULL, NULL, NULL, NULL, NULL, '540.00'),
(2, 4, 2, '23.00', '43.00', '989.00', NULL, NULL, NULL, NULL, '989.00', NULL, NULL, NULL, NULL, NULL, NULL, '989.00');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `state_code`) VALUES
(39, 'JAMMU AND KASHMIR', 1),
(40, 'HIMACHAL PRADESH', 2),
(41, 'PUNJAB', 3),
(42, 'CHANDIGARH', 4),
(43, 'UTTARAKHAND', 5),
(44, 'HARYANA', 6),
(45, 'DELHI', 7),
(46, 'RAJASTHAN', 8),
(47, 'UTTAR  PRADESH', 9),
(48, 'BIHAR', 10),
(49, 'SIKKIM', 11),
(50, 'ARUNACHAL PRADESH', 12),
(51, 'NAGALAND', 13),
(52, 'MANIPUR', 14),
(53, 'MIZORAM', 15),
(54, 'TRIPURA', 16),
(55, 'MEGHLAYA', 17),
(56, 'ASSAM', 18),
(57, 'WEST BENGAL', 19),
(58, 'JHARKHAND', 20),
(59, 'ODISHA', 21),
(60, 'CHATTISGARH', 22),
(61, 'MADHYA PRADESH', 23),
(62, 'GUJARAT', 24),
(63, 'DAMAN AND DIU', 25),
(64, 'DADRA AND NAGAR HAVELI', 26),
(65, 'MAHARASHTRA', 27),
(66, 'ANDHRA PRADESH(BEFORE DIVISION)', 28),
(67, 'KARNATAKA', 29),
(68, 'GOA', 30),
(69, 'LAKSHWADEEP', 31),
(70, 'KERALA', 32),
(71, 'TAMIL NADU', 33),
(72, 'PUDUCHERRY', 34),
(73, 'ANDAMAN AND NICOBAR ISLANDS', 35),
(74, 'TELANGANA', 36),
(75, 'ANDHRA PRADESH (NEW)', 37);

-- --------------------------------------------------------

--
-- Table structure for table `stock_groups`
--

CREATE TABLE `stock_groups` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  `company_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` int(10) NOT NULL,
  `gstin` varchar(30) NOT NULL,
  `freeze` tinyint(1) NOT NULL DEFAULT '0',
  `company_id` int(10) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `company_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `company_id`) VALUES
(1, 'N/A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `password`) VALUES
(1, 'Abhilash Lohar', '9636653883', 'abhilashlohar01@gmail.com', '$2y$10$ktx6o.xUn3eg5vad9EOyZuyi/rGTOreyQbNdOIbmlD/ke9Jwhz.Pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounting_entries`
--
ALTER TABLE `accounting_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounting_groups`
--
ALTER TABLE `accounting_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financial_years`
--
ALTER TABLE `financial_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledgers`
--
ALTER TABLE `ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nature_of_groups`
--
ALTER TABLE `nature_of_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_invoices`
--
ALTER TABLE `purchase_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_invoice_rows`
--
ALTER TABLE `purchase_invoice_rows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_invoices`
--
ALTER TABLE `sales_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_invoice_rows`
--
ALTER TABLE `sales_invoice_rows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_groups`
--
ALTER TABLE `stock_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounting_entries`
--
ALTER TABLE `accounting_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `accounting_groups`
--
ALTER TABLE `accounting_groups`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `financial_years`
--
ALTER TABLE `financial_years`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `nature_of_groups`
--
ALTER TABLE `nature_of_groups`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `purchase_invoices`
--
ALTER TABLE `purchase_invoices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase_invoice_rows`
--
ALTER TABLE `purchase_invoice_rows`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales_invoices`
--
ALTER TABLE `sales_invoices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sales_invoice_rows`
--
ALTER TABLE `sales_invoice_rows`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `stock_groups`
--
ALTER TABLE `stock_groups`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
