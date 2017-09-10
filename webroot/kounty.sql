-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2017 at 08:01 PM
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
  `debit` decimal(15,2) NOT NULL,
  `credit` decimal(15,2) NOT NULL,
  `transaction_date` date NOT NULL,
  `company_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `supplier` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounting_groups`
--

INSERT INTO `accounting_groups` (`id`, `nature_of_group_id`, `name`, `parent_id`, `lft`, `rght`, `company_id`, `customer`, `supplier`) VALUES
(1, 2, 'Branch / Divisions', NULL, 1, 2, 1, NULL, NULL),
(2, 2, 'Capital Account', NULL, 3, 6, 1, NULL, NULL),
(3, 1, 'Current Assets', NULL, 7, 22, 1, NULL, NULL),
(4, 2, 'Current Liabilities', NULL, 23, 34, 1, NULL, NULL),
(5, 4, 'Direct Expenses', NULL, 35, 36, 1, NULL, NULL),
(6, 3, 'Direct Incomes', NULL, 37, 38, 1, NULL, NULL),
(7, 1, 'Fixed Assets', NULL, 39, 40, 1, NULL, NULL),
(8, 4, 'Indirect Expenses', NULL, 41, 42, 1, NULL, NULL),
(9, 3, 'Indirect Incomes', NULL, 43, 44, 1, NULL, NULL),
(10, 1, 'Investments', NULL, 45, 46, 1, NULL, NULL),
(11, 2, 'Loans (Liability)', NULL, 47, 54, 1, NULL, NULL),
(12, 1, 'Misc. Expenses (ASSET)', NULL, 55, 56, 1, NULL, NULL),
(13, 4, 'Purchase Accounts', NULL, 57, 58, 1, NULL, NULL),
(14, 3, 'Sales Accounts', NULL, 59, 60, 1, NULL, NULL),
(15, 2, 'Suspense A/c', NULL, 61, 62, 1, NULL, NULL),
(16, NULL, 'Reserves & Surplus', 2, 4, 5, 1, NULL, NULL),
(17, NULL, 'Bank Accounts', 3, 8, 9, 1, NULL, NULL),
(18, NULL, 'Cash-in-hand', 3, 10, 11, 1, NULL, NULL),
(19, NULL, 'Deposits (Asset)', 3, 12, 13, 1, NULL, NULL),
(20, NULL, 'Loans & Advances (Asset)', 3, 14, 15, 1, NULL, NULL),
(21, NULL, 'Stock-in-hand', 3, 16, 17, 1, NULL, NULL),
(22, NULL, 'Sundry Debtors', 3, 18, 19, 1, 1, NULL),
(23, NULL, 'Duties & Taxes', 4, 24, 29, 1, NULL, NULL),
(24, NULL, 'Provisions', 4, 30, 31, 1, NULL, NULL),
(25, NULL, 'Sundry Creditors', 4, 32, 33, 1, NULL, 1),
(26, NULL, 'Bank OD A/c', 11, 48, 49, 1, NULL, NULL),
(27, NULL, 'Secured Loans', 11, 50, 51, 1, NULL, NULL),
(28, NULL, 'Unsecured Loans', 11, 52, 53, 1, NULL, NULL),
(29, NULL, 'Input GST', 23, 25, 26, 1, NULL, NULL),
(30, NULL, 'Output GST', 23, 27, 28, 1, NULL, NULL),
(43, 2, 'Branch / Divisions', NULL, 63, 64, 6, NULL, NULL),
(44, 2, 'Capital Account', NULL, 65, 66, 6, NULL, NULL),
(45, 1, 'Current Assets', NULL, 67, 68, 6, NULL, NULL),
(46, 2, 'Current Liabilities', NULL, 69, 70, 6, NULL, NULL),
(47, 4, 'Direct Expenses', NULL, 71, 72, 6, NULL, NULL),
(48, 3, 'Direct Incomes', NULL, 73, 74, 6, NULL, NULL),
(49, 1, 'Fixed Assets', NULL, 75, 76, 6, NULL, NULL),
(50, 4, 'Indirect Expenses', NULL, 77, 78, 6, NULL, NULL),
(51, 3, 'Indirect Incomes', NULL, 79, 80, 6, NULL, NULL),
(52, 1, 'Investments', NULL, 81, 82, 6, NULL, NULL),
(53, 2, 'Loans (Liability)', NULL, 83, 84, 6, NULL, NULL),
(54, 1, 'Misc. Expenses (ASSET)', NULL, 85, 86, 6, NULL, NULL),
(55, 4, 'Purchase Accounts', NULL, 87, 88, 6, NULL, NULL),
(56, 3, 'Sales Accounts', NULL, 89, 90, 6, NULL, NULL),
(57, 2, 'Suspense A/c', NULL, 91, 92, 6, NULL, NULL),
(58, 2, 'Branch / Divisions', NULL, 93, 94, 7, NULL, NULL),
(59, 2, 'Capital Account', NULL, 95, 96, 7, NULL, NULL),
(60, 1, 'Current Assets', NULL, 97, 98, 7, NULL, NULL),
(61, 2, 'Current Liabilities', NULL, 99, 100, 7, NULL, NULL),
(62, 4, 'Direct Expenses', NULL, 101, 102, 7, NULL, NULL),
(63, 3, 'Direct Incomes', NULL, 103, 104, 7, NULL, NULL),
(64, 1, 'Fixed Assets', NULL, 105, 106, 7, NULL, NULL),
(65, 4, 'Indirect Expenses', NULL, 107, 108, 7, NULL, NULL),
(66, 3, 'Indirect Incomes', NULL, 109, 110, 7, NULL, NULL),
(67, 1, 'Investments', NULL, 111, 112, 7, NULL, NULL),
(68, 2, 'Loans (Liability)', NULL, 113, 114, 7, NULL, NULL),
(69, 1, 'Misc. Expenses (ASSET)', NULL, 115, 116, 7, NULL, NULL),
(70, 4, 'Purchase Accounts', NULL, 117, 118, 7, NULL, NULL),
(71, 3, 'Sales Accounts', NULL, 119, 120, 7, NULL, NULL),
(72, 2, 'Suspense A/c', NULL, 121, 122, 7, NULL, NULL),
(73, NULL, 'Reserves & Surplus', NULL, 123, 124, 7, NULL, NULL),
(74, 2, 'Branch / Divisions', NULL, 125, 126, 8, NULL, NULL),
(75, 2, 'Capital Account', NULL, 127, 130, 8, NULL, NULL),
(76, 1, 'Current Assets', NULL, 131, 132, 8, NULL, NULL),
(77, 2, 'Current Liabilities', NULL, 133, 134, 8, NULL, NULL),
(78, 4, 'Direct Expenses', NULL, 135, 136, 8, NULL, NULL),
(79, 3, 'Direct Incomes', NULL, 137, 138, 8, NULL, NULL),
(80, 1, 'Fixed Assets', NULL, 139, 140, 8, NULL, NULL),
(81, 4, 'Indirect Expenses', NULL, 141, 142, 8, NULL, NULL),
(82, 3, 'Indirect Incomes', NULL, 143, 144, 8, NULL, NULL),
(83, 1, 'Investments', NULL, 145, 146, 8, NULL, NULL),
(84, 2, 'Loans (Liability)', NULL, 147, 148, 8, NULL, NULL),
(85, 1, 'Misc. Expenses (ASSET)', NULL, 149, 150, 8, NULL, NULL),
(86, 4, 'Purchase Accounts', NULL, 151, 152, 8, NULL, NULL),
(87, 3, 'Sales Accounts', NULL, 153, 154, 8, NULL, NULL),
(88, 2, 'Suspense A/c', NULL, 155, 156, 8, NULL, NULL),
(89, NULL, 'Reserves & Surplus', 75, 128, 129, 8, NULL, NULL),
(90, 2, 'Branch / Divisions', NULL, 157, 158, 9, NULL, NULL),
(91, 2, 'Capital Account', NULL, 159, 162, 9, NULL, NULL),
(92, 1, 'Current Assets', NULL, 163, 176, 9, NULL, NULL),
(93, 2, 'Current Liabilities', NULL, 177, 188, 9, NULL, NULL),
(94, 4, 'Direct Expenses', NULL, 189, 190, 9, NULL, NULL),
(95, 3, 'Direct Incomes', NULL, 191, 192, 9, NULL, NULL),
(96, 1, 'Fixed Assets', NULL, 193, 194, 9, NULL, NULL),
(97, 4, 'Indirect Expenses', NULL, 195, 196, 9, NULL, NULL),
(98, 3, 'Indirect Incomes', NULL, 197, 198, 9, NULL, NULL),
(99, 1, 'Investments', NULL, 199, 200, 9, NULL, NULL),
(100, 2, 'Loans (Liability)', NULL, 201, 208, 9, NULL, NULL),
(101, 1, 'Misc. Expenses (ASSET)', NULL, 209, 210, 9, NULL, NULL),
(102, 4, 'Purchase Accounts', NULL, 211, 212, 9, NULL, NULL),
(103, 3, 'Sales Accounts', NULL, 213, 214, 9, NULL, NULL),
(104, 2, 'Suspense A/c', NULL, 215, 216, 9, NULL, NULL),
(105, NULL, 'Reserves & Surplus', 91, 160, 161, 9, NULL, NULL),
(106, NULL, 'Bank Accounts', 92, 164, 165, 9, NULL, NULL),
(107, NULL, 'Cash-in-hand', 92, 166, 167, 9, NULL, NULL),
(108, NULL, 'Deposits (Asset)', 92, 168, 169, 9, NULL, NULL),
(109, NULL, 'Loans & Advances (Asset)', 92, 170, 171, 9, NULL, NULL),
(110, NULL, 'Stock-in-hand', 92, 172, 173, 9, NULL, NULL),
(111, NULL, 'Sundry Debtors', 92, 174, 175, 9, NULL, NULL),
(112, NULL, 'Duties & Taxes', 93, 178, 183, 9, NULL, NULL),
(113, NULL, 'Provisions', 93, 184, 185, 9, NULL, NULL),
(114, NULL, 'Sundry Creditors', 93, 186, 187, 9, NULL, NULL),
(115, NULL, 'Bank OD A/c', 100, 202, 203, 9, NULL, NULL),
(116, NULL, 'Secured Loans', 100, 204, 205, 9, NULL, NULL),
(117, NULL, 'Unsecured Loans', 100, 206, 207, 9, NULL, NULL),
(118, NULL, 'Input GST', 112, 179, 180, 9, NULL, NULL),
(119, NULL, 'Output GST', 112, 181, 182, 9, NULL, NULL),
(120, 2, 'Branch / Divisions', NULL, 217, 218, 10, NULL, NULL),
(121, 2, 'Capital Account', NULL, 219, 222, 10, NULL, NULL),
(122, 1, 'Current Assets', NULL, 223, 236, 10, NULL, NULL),
(123, 2, 'Current Liabilities', NULL, 237, 248, 10, NULL, NULL),
(124, 4, 'Direct Expenses', NULL, 249, 250, 10, NULL, NULL),
(125, 3, 'Direct Incomes', NULL, 251, 252, 10, NULL, NULL),
(126, 1, 'Fixed Assets', NULL, 253, 254, 10, NULL, NULL),
(127, 4, 'Indirect Expenses', NULL, 255, 256, 10, NULL, NULL),
(128, 3, 'Indirect Incomes', NULL, 257, 258, 10, NULL, NULL),
(129, 1, 'Investments', NULL, 259, 260, 10, NULL, NULL),
(130, 2, 'Loans (Liability)', NULL, 261, 268, 10, NULL, NULL),
(131, 1, 'Misc. Expenses (ASSET)', NULL, 269, 270, 10, NULL, NULL),
(132, 4, 'Purchase Accounts', NULL, 271, 272, 10, NULL, NULL),
(133, 3, 'Sales Accounts', NULL, 273, 274, 10, NULL, NULL),
(134, 2, 'Suspense A/c', NULL, 275, 276, 10, NULL, NULL),
(135, NULL, 'Reserves & Surplus', 121, 220, 221, 10, NULL, NULL),
(136, NULL, 'Bank Accounts', 122, 224, 225, 10, NULL, NULL),
(137, NULL, 'Cash-in-hand', 122, 226, 227, 10, NULL, NULL),
(138, NULL, 'Deposits (Asset)', 122, 228, 229, 10, NULL, NULL),
(139, NULL, 'Loans & Advances (Asset)', 122, 230, 231, 10, NULL, NULL),
(140, NULL, 'Stock-in-hand', 122, 232, 233, 10, NULL, NULL),
(141, NULL, 'Sundry Debtors', 122, 234, 235, 10, NULL, NULL),
(142, NULL, 'Duties & Taxes', 123, 238, 243, 10, NULL, NULL),
(143, NULL, 'Provisions', 123, 244, 245, 10, NULL, NULL),
(144, NULL, 'Sundry Creditors', 123, 246, 247, 10, NULL, NULL),
(145, NULL, 'Bank OD A/c', 130, 262, 263, 10, NULL, NULL),
(146, NULL, 'Secured Loans', 130, 264, 265, 10, NULL, NULL),
(147, NULL, 'Unsecured Loans', 130, 266, 267, 10, NULL, NULL),
(148, NULL, 'Input GST', 142, 239, 240, 10, NULL, NULL),
(149, NULL, 'Output GST', 142, 241, 242, 10, NULL, NULL),
(150, 2, 'Branch / Divisions', NULL, 277, 278, 11, NULL, NULL),
(151, 2, 'Capital Account', NULL, 279, 282, 11, NULL, NULL),
(152, 1, 'Current Assets', NULL, 283, 296, 11, NULL, NULL),
(153, 2, 'Current Liabilities', NULL, 297, 308, 11, NULL, NULL),
(154, 4, 'Direct Expenses', NULL, 309, 310, 11, NULL, NULL),
(155, 3, 'Direct Incomes', NULL, 311, 312, 11, NULL, NULL),
(156, 1, 'Fixed Assets', NULL, 313, 314, 11, NULL, NULL),
(157, 4, 'Indirect Expenses', NULL, 315, 316, 11, NULL, NULL),
(158, 3, 'Indirect Incomes', NULL, 317, 318, 11, NULL, NULL),
(159, 1, 'Investments', NULL, 319, 320, 11, NULL, NULL),
(160, 2, 'Loans (Liability)', NULL, 321, 328, 11, NULL, NULL),
(161, 1, 'Misc. Expenses (ASSET)', NULL, 329, 330, 11, NULL, NULL),
(162, 4, 'Purchase Accounts', NULL, 331, 332, 11, NULL, NULL),
(163, 3, 'Sales Accounts', NULL, 333, 334, 11, NULL, NULL),
(164, 2, 'Suspense A/c', NULL, 335, 336, 11, NULL, NULL),
(165, NULL, 'Reserves & Surplus', 151, 280, 281, 11, NULL, NULL),
(166, NULL, 'Bank Accounts', 152, 284, 285, 11, NULL, NULL),
(167, NULL, 'Cash-in-hand', 152, 286, 287, 11, NULL, NULL),
(168, NULL, 'Deposits (Asset)', 152, 288, 289, 11, NULL, NULL),
(169, NULL, 'Loans & Advances (Asset)', 152, 290, 291, 11, NULL, NULL),
(170, NULL, 'Stock-in-hand', 152, 292, 293, 11, NULL, NULL),
(171, NULL, 'Sundry Debtors', 152, 294, 295, 11, NULL, NULL),
(172, NULL, 'Duties & Taxes', 153, 298, 303, 11, NULL, NULL),
(173, NULL, 'Provisions', 153, 304, 305, 11, NULL, NULL),
(174, NULL, 'Sundry Creditors', 153, 306, 307, 11, NULL, NULL),
(175, NULL, 'Bank OD A/c', 160, 322, 323, 11, NULL, NULL),
(176, NULL, 'Secured Loans', 160, 324, 325, 11, NULL, NULL),
(177, NULL, 'Unsecured Loans', 160, 326, 327, 11, NULL, NULL),
(178, NULL, 'Input GST', 172, 299, 300, 11, NULL, NULL),
(179, NULL, 'Output GST', 172, 301, 302, 11, NULL, NULL),
(180, 2, 'Branch / Divisions', NULL, 337, 338, 12, NULL, NULL),
(181, 2, 'Capital Account', NULL, 339, 342, 12, NULL, NULL),
(182, 1, 'Current Assets', NULL, 343, 356, 12, NULL, NULL),
(183, 2, 'Current Liabilities', NULL, 357, 368, 12, NULL, NULL),
(184, 4, 'Direct Expenses', NULL, 369, 370, 12, NULL, NULL),
(185, 3, 'Direct Incomes', NULL, 371, 372, 12, NULL, NULL),
(186, 1, 'Fixed Assets', NULL, 373, 374, 12, NULL, NULL),
(187, 4, 'Indirect Expenses', NULL, 375, 376, 12, NULL, NULL),
(188, 3, 'Indirect Incomes', NULL, 377, 378, 12, NULL, NULL),
(189, 1, 'Investments', NULL, 379, 380, 12, NULL, NULL),
(190, 2, 'Loans (Liability)', NULL, 381, 388, 12, NULL, NULL),
(191, 1, 'Misc. Expenses (ASSET)', NULL, 389, 390, 12, NULL, NULL),
(192, 4, 'Purchase Accounts', NULL, 391, 392, 12, NULL, NULL),
(193, 3, 'Sales Accounts', NULL, 393, 394, 12, NULL, NULL),
(194, 2, 'Suspense A/c', NULL, 395, 396, 12, NULL, NULL),
(195, NULL, 'Reserves & Surplus', 181, 340, 341, 12, NULL, NULL),
(196, NULL, 'Bank Accounts', 182, 344, 345, 12, NULL, NULL),
(197, NULL, 'Cash-in-hand', 182, 346, 347, 12, NULL, NULL),
(198, NULL, 'Deposits (Asset)', 182, 348, 349, 12, NULL, NULL),
(199, NULL, 'Loans & Advances (Asset)', 182, 350, 351, 12, NULL, NULL),
(200, NULL, 'Stock-in-hand', 182, 352, 353, 12, NULL, NULL),
(201, NULL, 'Sundry Debtors', 182, 354, 355, 12, NULL, NULL),
(202, NULL, 'Duties & Taxes', 183, 358, 363, 12, NULL, NULL),
(203, NULL, 'Provisions', 183, 364, 365, 12, NULL, NULL),
(204, NULL, 'Sundry Creditors', 183, 366, 367, 12, NULL, NULL),
(205, NULL, 'Bank OD A/c', 190, 382, 383, 12, NULL, NULL),
(206, NULL, 'Secured Loans', 190, 384, 385, 12, NULL, NULL),
(207, NULL, 'Unsecured Loans', 190, 386, 387, 12, NULL, NULL),
(208, NULL, 'Input GST', 202, 359, 360, 12, NULL, NULL),
(209, NULL, 'Output GST', 202, 361, 362, 12, NULL, NULL),
(210, 2, 'Branch / Divisions', NULL, 397, 398, 13, NULL, NULL),
(211, 2, 'Capital Account', NULL, 399, 402, 13, NULL, NULL),
(212, 1, 'Current Assets', NULL, 403, 416, 13, NULL, NULL),
(213, 2, 'Current Liabilities', NULL, 417, 428, 13, NULL, NULL),
(214, 4, 'Direct Expenses', NULL, 429, 430, 13, NULL, NULL),
(215, 3, 'Direct Incomes', NULL, 431, 432, 13, NULL, NULL),
(216, 1, 'Fixed Assets', NULL, 433, 434, 13, NULL, NULL),
(217, 4, 'Indirect Expenses', NULL, 435, 436, 13, NULL, NULL),
(218, 3, 'Indirect Incomes', NULL, 437, 438, 13, NULL, NULL),
(219, 1, 'Investments', NULL, 439, 440, 13, NULL, NULL),
(220, 2, 'Loans (Liability)', NULL, 441, 448, 13, NULL, NULL),
(221, 1, 'Misc. Expenses (ASSET)', NULL, 449, 450, 13, NULL, NULL),
(222, 4, 'Purchase Accounts', NULL, 451, 452, 13, NULL, NULL),
(223, 3, 'Sales Accounts', NULL, 453, 454, 13, NULL, NULL),
(224, 2, 'Suspense A/c', NULL, 455, 456, 13, NULL, NULL),
(225, NULL, 'Reserves & Surplus', 211, 400, 401, 13, NULL, NULL),
(226, NULL, 'Bank Accounts', 212, 404, 405, 13, NULL, NULL),
(227, NULL, 'Cash-in-hand', 212, 406, 407, 13, NULL, NULL),
(228, NULL, 'Deposits (Asset)', 212, 408, 409, 13, NULL, NULL),
(229, NULL, 'Loans & Advances (Asset)', 212, 410, 411, 13, NULL, NULL),
(230, NULL, 'Stock-in-hand', 212, 412, 413, 13, NULL, NULL),
(231, NULL, 'Sundry Debtors', 212, 414, 415, 13, NULL, NULL),
(232, NULL, 'Duties & Taxes', 213, 418, 423, 13, NULL, NULL),
(233, NULL, 'Provisions', 213, 424, 425, 13, NULL, NULL),
(234, NULL, 'Sundry Creditors', 213, 426, 427, 13, NULL, NULL),
(235, NULL, 'Bank OD A/c', 220, 442, 443, 13, NULL, NULL),
(236, NULL, 'Secured Loans', 220, 444, 445, 13, NULL, NULL),
(237, NULL, 'Unsecured Loans', 220, 446, 447, 13, NULL, NULL),
(238, NULL, 'Input GST', 232, 419, 420, 13, NULL, NULL),
(239, NULL, 'Output GST', 232, 421, 422, 13, NULL, NULL),
(240, 2, 'Branch / Divisions', NULL, 457, 458, 14, NULL, NULL),
(241, 2, 'Capital Account', NULL, 459, 462, 14, NULL, NULL),
(242, 1, 'Current Assets', NULL, 463, 476, 14, NULL, NULL),
(243, 2, 'Current Liabilities', NULL, 477, 488, 14, NULL, NULL),
(244, 4, 'Direct Expenses', NULL, 489, 490, 14, NULL, NULL),
(245, 3, 'Direct Incomes', NULL, 491, 492, 14, NULL, NULL),
(246, 1, 'Fixed Assets', NULL, 493, 494, 14, NULL, NULL),
(247, 4, 'Indirect Expenses', NULL, 495, 496, 14, NULL, NULL),
(248, 3, 'Indirect Incomes', NULL, 497, 498, 14, NULL, NULL),
(249, 1, 'Investments', NULL, 499, 500, 14, NULL, NULL),
(250, 2, 'Loans (Liability)', NULL, 501, 508, 14, NULL, NULL),
(251, 1, 'Misc. Expenses (ASSET)', NULL, 509, 510, 14, NULL, NULL),
(252, 4, 'Purchase Accounts', NULL, 511, 512, 14, NULL, NULL),
(253, 3, 'Sales Accounts', NULL, 513, 514, 14, NULL, NULL),
(254, 2, 'Suspense A/c', NULL, 515, 516, 14, NULL, NULL),
(255, NULL, 'Reserves & Surplus', 241, 460, 461, 14, NULL, NULL),
(256, NULL, 'Bank Accounts', 242, 464, 465, 14, NULL, NULL),
(257, NULL, 'Cash-in-hand', 242, 466, 467, 14, NULL, NULL),
(258, NULL, 'Deposits (Asset)', 242, 468, 469, 14, NULL, NULL),
(259, NULL, 'Loans & Advances (Asset)', 242, 470, 471, 14, NULL, NULL),
(260, NULL, 'Stock-in-hand', 242, 472, 473, 14, NULL, NULL),
(261, NULL, 'Sundry Debtors', 242, 474, 475, 14, NULL, NULL),
(262, NULL, 'Duties & Taxes', 243, 478, 483, 14, NULL, NULL),
(263, NULL, 'Provisions', 243, 484, 485, 14, NULL, NULL),
(264, NULL, 'Sundry Creditors', 243, 486, 487, 14, NULL, NULL),
(265, NULL, 'Bank OD A/c', 250, 502, 503, 14, NULL, NULL),
(266, NULL, 'Secured Loans', 250, 504, 505, 14, NULL, NULL),
(267, NULL, 'Unsecured Loans', 250, 506, 507, 14, NULL, NULL),
(268, NULL, 'Input GST', 262, 479, 480, 14, NULL, NULL),
(269, NULL, 'Output GST', 262, 481, 482, 14, NULL, NULL),
(270, 2, 'Branch / Divisions', NULL, 517, 518, 15, NULL, NULL),
(271, 2, 'Capital Account', NULL, 519, 522, 15, NULL, NULL),
(272, 1, 'Current Assets', NULL, 523, 536, 15, NULL, NULL),
(273, 2, 'Current Liabilities', NULL, 537, 548, 15, NULL, NULL),
(274, 4, 'Direct Expenses', NULL, 549, 550, 15, NULL, NULL),
(275, 3, 'Direct Incomes', NULL, 551, 552, 15, NULL, NULL),
(276, 1, 'Fixed Assets', NULL, 553, 554, 15, NULL, NULL),
(277, 4, 'Indirect Expenses', NULL, 555, 556, 15, NULL, NULL),
(278, 3, 'Indirect Incomes', NULL, 557, 558, 15, NULL, NULL),
(279, 1, 'Investments', NULL, 559, 560, 15, NULL, NULL),
(280, 2, 'Loans (Liability)', NULL, 561, 568, 15, NULL, NULL),
(281, 1, 'Misc. Expenses (ASSET)', NULL, 569, 570, 15, NULL, NULL),
(282, 4, 'Purchase Accounts', NULL, 571, 572, 15, NULL, NULL),
(283, 3, 'Sales Accounts', NULL, 573, 574, 15, NULL, NULL),
(284, 2, 'Suspense A/c', NULL, 575, 576, 15, NULL, NULL),
(285, NULL, 'Reserves & Surplus', 271, 520, 521, 15, NULL, NULL),
(286, NULL, 'Bank Accounts', 272, 524, 525, 15, NULL, NULL),
(287, NULL, 'Cash-in-hand', 272, 526, 527, 15, NULL, NULL),
(288, NULL, 'Deposits (Asset)', 272, 528, 529, 15, NULL, NULL),
(289, NULL, 'Loans & Advances (Asset)', 272, 530, 531, 15, NULL, NULL),
(290, NULL, 'Stock-in-hand', 272, 532, 533, 15, NULL, NULL),
(291, NULL, 'Sundry Debtors', 272, 534, 535, 15, NULL, NULL),
(292, NULL, 'Duties & Taxes', 273, 538, 543, 15, NULL, NULL),
(293, NULL, 'Provisions', 273, 544, 545, 15, NULL, NULL),
(294, NULL, 'Sundry Creditors', 273, 546, 547, 15, NULL, NULL),
(295, NULL, 'Bank OD A/c', 280, 562, 563, 15, NULL, NULL),
(296, NULL, 'Secured Loans', 280, 564, 565, 15, NULL, NULL),
(297, NULL, 'Unsecured Loans', 280, 566, 567, 15, NULL, NULL),
(298, NULL, 'Input GST', 292, 539, 540, 15, NULL, NULL),
(299, NULL, 'Output GST', 292, 541, 542, 15, NULL, NULL),
(300, 2, 'Branch / Divisions', NULL, 577, 578, 16, NULL, NULL),
(301, 2, 'Capital Account', NULL, 579, 582, 16, NULL, NULL),
(302, 1, 'Current Assets', NULL, 583, 596, 16, NULL, NULL),
(303, 2, 'Current Liabilities', NULL, 597, 608, 16, NULL, NULL),
(304, 4, 'Direct Expenses', NULL, 609, 610, 16, NULL, NULL),
(305, 3, 'Direct Incomes', NULL, 611, 612, 16, NULL, NULL),
(306, 1, 'Fixed Assets', NULL, 613, 614, 16, NULL, NULL),
(307, 4, 'Indirect Expenses', NULL, 615, 616, 16, NULL, NULL),
(308, 3, 'Indirect Incomes', NULL, 617, 618, 16, NULL, NULL),
(309, 1, 'Investments', NULL, 619, 620, 16, NULL, NULL),
(310, 2, 'Loans (Liability)', NULL, 621, 628, 16, NULL, NULL),
(311, 1, 'Misc. Expenses (ASSET)', NULL, 629, 630, 16, NULL, NULL),
(312, 4, 'Purchase Accounts', NULL, 631, 632, 16, NULL, NULL),
(313, 3, 'Sales Accounts', NULL, 633, 634, 16, NULL, NULL),
(314, 2, 'Suspense A/c', NULL, 635, 636, 16, NULL, NULL),
(315, NULL, 'Reserves & Surplus', 301, 580, 581, 16, NULL, NULL),
(316, NULL, 'Bank Accounts', 302, 584, 585, 16, NULL, NULL),
(317, NULL, 'Cash-in-hand', 302, 586, 587, 16, NULL, NULL),
(318, NULL, 'Deposits (Asset)', 302, 588, 589, 16, NULL, NULL),
(319, NULL, 'Loans & Advances (Asset)', 302, 590, 591, 16, NULL, NULL),
(320, NULL, 'Stock-in-hand', 302, 592, 593, 16, NULL, NULL),
(321, NULL, 'Sundry Debtors', 302, 594, 595, 16, NULL, NULL),
(322, NULL, 'Duties & Taxes', 303, 598, 603, 16, NULL, NULL),
(323, NULL, 'Provisions', 303, 604, 605, 16, NULL, NULL),
(324, NULL, 'Sundry Creditors', 303, 606, 607, 16, NULL, NULL),
(325, NULL, 'Bank OD A/c', 310, 622, 623, 16, NULL, NULL),
(326, NULL, 'Secured Loans', 310, 624, 625, 16, NULL, NULL),
(327, NULL, 'Unsecured Loans', 310, 626, 627, 16, NULL, NULL),
(328, NULL, 'Input GST', 322, 599, 600, 16, NULL, NULL),
(329, NULL, 'Output GST', 322, 601, 602, 16, NULL, NULL),
(330, 2, 'Branch / Divisions', NULL, 637, 638, 17, NULL, NULL),
(331, 2, 'Capital Account', NULL, 639, 642, 17, NULL, NULL),
(332, 1, 'Current Assets', NULL, 643, 656, 17, NULL, NULL),
(333, 2, 'Current Liabilities', NULL, 657, 668, 17, NULL, NULL),
(334, 4, 'Direct Expenses', NULL, 669, 670, 17, NULL, NULL),
(335, 3, 'Direct Incomes', NULL, 671, 672, 17, NULL, NULL),
(336, 1, 'Fixed Assets', NULL, 673, 674, 17, NULL, NULL),
(337, 4, 'Indirect Expenses', NULL, 675, 676, 17, NULL, NULL),
(338, 3, 'Indirect Incomes', NULL, 677, 678, 17, NULL, NULL),
(339, 1, 'Investments', NULL, 679, 680, 17, NULL, NULL),
(340, 2, 'Loans (Liability)', NULL, 681, 688, 17, NULL, NULL),
(341, 1, 'Misc. Expenses (ASSET)', NULL, 689, 690, 17, NULL, NULL),
(342, 4, 'Purchase Accounts', NULL, 691, 692, 17, NULL, NULL),
(343, 3, 'Sales Accounts', NULL, 693, 694, 17, NULL, NULL),
(344, 2, 'Suspense A/c', NULL, 695, 696, 17, NULL, NULL),
(345, NULL, 'Reserves & Surplus', 331, 640, 641, 17, NULL, NULL),
(346, NULL, 'Bank Accounts', 332, 644, 645, 17, NULL, NULL),
(347, NULL, 'Cash-in-hand', 332, 646, 647, 17, NULL, NULL),
(348, NULL, 'Deposits (Asset)', 332, 648, 649, 17, NULL, NULL),
(349, NULL, 'Loans & Advances (Asset)', 332, 650, 651, 17, NULL, NULL),
(350, NULL, 'Stock-in-hand', 332, 652, 653, 17, NULL, NULL),
(351, NULL, 'Sundry Debtors', 332, 654, 655, 17, NULL, NULL),
(352, NULL, 'Duties & Taxes', 333, 658, 663, 17, NULL, NULL),
(353, NULL, 'Provisions', 333, 664, 665, 17, NULL, NULL),
(354, NULL, 'Sundry Creditors', 333, 666, 667, 17, NULL, NULL),
(355, NULL, 'Bank OD A/c', 340, 682, 683, 17, NULL, NULL),
(356, NULL, 'Secured Loans', 340, 684, 685, 17, NULL, NULL),
(357, NULL, 'Unsecured Loans', 340, 686, 687, 17, NULL, NULL),
(358, NULL, 'Input GST', 352, 659, 660, 17, NULL, NULL),
(359, NULL, 'Output GST', 352, 661, 662, 17, NULL, NULL),
(360, 2, 'Branch / Divisions', NULL, 697, 698, 18, NULL, NULL),
(361, 2, 'Capital Account', NULL, 699, 702, 18, NULL, NULL),
(362, 1, 'Current Assets', NULL, 703, 716, 18, NULL, NULL),
(363, 2, 'Current Liabilities', NULL, 717, 728, 18, NULL, NULL),
(364, 4, 'Direct Expenses', NULL, 729, 730, 18, NULL, NULL),
(365, 3, 'Direct Incomes', NULL, 731, 732, 18, NULL, NULL),
(366, 1, 'Fixed Assets', NULL, 733, 734, 18, NULL, NULL),
(367, 4, 'Indirect Expenses', NULL, 735, 736, 18, NULL, NULL),
(368, 3, 'Indirect Incomes', NULL, 737, 738, 18, NULL, NULL),
(369, 1, 'Investments', NULL, 739, 740, 18, NULL, NULL),
(370, 2, 'Loans (Liability)', NULL, 741, 748, 18, NULL, NULL),
(371, 1, 'Misc. Expenses (ASSET)', NULL, 749, 750, 18, NULL, NULL),
(372, 4, 'Purchase Accounts', NULL, 751, 752, 18, NULL, NULL),
(373, 3, 'Sales Accounts', NULL, 753, 754, 18, NULL, NULL),
(374, 2, 'Suspense A/c', NULL, 755, 756, 18, NULL, NULL),
(375, NULL, 'Reserves & Surplus', 361, 700, 701, 18, NULL, NULL),
(376, NULL, 'Bank Accounts', 362, 704, 705, 18, NULL, NULL),
(377, NULL, 'Cash-in-hand', 362, 706, 707, 18, NULL, NULL),
(378, NULL, 'Deposits (Asset)', 362, 708, 709, 18, NULL, NULL),
(379, NULL, 'Loans & Advances (Asset)', 362, 710, 711, 18, NULL, NULL),
(380, NULL, 'Stock-in-hand', 362, 712, 713, 18, NULL, NULL),
(381, NULL, 'Sundry Debtors', 362, 714, 715, 18, NULL, NULL),
(382, NULL, 'Duties & Taxes', 363, 718, 723, 18, NULL, NULL),
(383, NULL, 'Provisions', 363, 724, 725, 18, NULL, NULL),
(384, NULL, 'Sundry Creditors', 363, 726, 727, 18, NULL, NULL),
(385, NULL, 'Bank OD A/c', 370, 742, 743, 18, NULL, NULL),
(386, NULL, 'Secured Loans', 370, 744, 745, 18, NULL, NULL),
(387, NULL, 'Unsecured Loans', 370, 746, 747, 18, NULL, NULL),
(388, NULL, 'Input GST', 382, 719, 720, 18, NULL, NULL),
(389, NULL, 'Output GST', 382, 721, 722, 18, NULL, NULL),
(390, 2, 'Branch / Divisions', NULL, 757, 758, 19, NULL, NULL),
(391, 2, 'Capital Account', NULL, 759, 762, 19, NULL, NULL),
(392, 1, 'Current Assets', NULL, 763, 776, 19, NULL, NULL),
(393, 2, 'Current Liabilities', NULL, 777, 788, 19, NULL, NULL),
(394, 4, 'Direct Expenses', NULL, 789, 790, 19, NULL, NULL),
(395, 3, 'Direct Incomes', NULL, 791, 792, 19, NULL, NULL),
(396, 1, 'Fixed Assets', NULL, 793, 794, 19, NULL, NULL),
(397, 4, 'Indirect Expenses', NULL, 795, 796, 19, NULL, NULL),
(398, 3, 'Indirect Incomes', NULL, 797, 798, 19, NULL, NULL),
(399, 1, 'Investments', NULL, 799, 800, 19, NULL, NULL),
(400, 2, 'Loans (Liability)', NULL, 801, 808, 19, NULL, NULL),
(401, 1, 'Misc. Expenses (ASSET)', NULL, 809, 810, 19, NULL, NULL),
(402, 4, 'Purchase Accounts', NULL, 811, 812, 19, NULL, NULL),
(403, 3, 'Sales Accounts', NULL, 813, 814, 19, NULL, NULL),
(404, 2, 'Suspense A/c', NULL, 815, 816, 19, NULL, NULL),
(405, NULL, 'Reserves & Surplus', 391, 760, 761, 19, NULL, NULL),
(406, NULL, 'Bank Accounts', 392, 764, 765, 19, NULL, NULL),
(407, NULL, 'Cash-in-hand', 392, 766, 767, 19, NULL, NULL),
(408, NULL, 'Deposits (Asset)', 392, 768, 769, 19, NULL, NULL),
(409, NULL, 'Loans & Advances (Asset)', 392, 770, 771, 19, NULL, NULL),
(410, NULL, 'Stock-in-hand', 392, 772, 773, 19, NULL, NULL),
(411, NULL, 'Sundry Debtors', 392, 774, 775, 19, 1, NULL),
(412, NULL, 'Duties & Taxes', 393, 778, 783, 19, NULL, NULL),
(413, NULL, 'Provisions', 393, 784, 785, 19, NULL, NULL),
(414, NULL, 'Sundry Creditors', 393, 786, 787, 19, NULL, 1),
(415, NULL, 'Bank OD A/c', 400, 802, 803, 19, NULL, NULL),
(416, NULL, 'Secured Loans', 400, 804, 805, 19, NULL, NULL),
(417, NULL, 'Unsecured Loans', 400, 806, 807, 19, NULL, NULL),
(418, NULL, 'Input GST', 412, 779, 780, 19, NULL, NULL),
(419, NULL, 'Output GST', 412, 781, 782, 19, NULL, NULL);

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
(1, 'Kounty Accounting solutions Pvt. Ltd.', 1, 1, '2017-04-01', '2017-07-01', '', '', '', '', '', '', '', ''),
(3, 'test  company', 4, 1, '2017-04-01', '2017-04-01', '', '', '', '', '', '', '', ''),
(4, 'xyz', 5, 1, '2017-04-01', '2017-04-01', '', '', '', '', '', '', '', ''),
(5, 'test', 6, 1, '2017-08-09', '2017-08-12', '', '', '', '', '', '', '', ''),
(6, 'test3', 7, 1, '2017-08-09', '2017-08-17', '', '', '', '', '', '', '', ''),
(7, 'vinu', 8, 1, '2017-08-27', '2017-08-27', '', '', '', '', '', '', '', ''),
(8, 'abhi', 9, 1, '2017-08-27', '2017-08-27', '', '', '', '', '', '', '', ''),
(9, 'hello', 10, 1, '2017-09-10', '2017-09-03', '', '', '', '', '', '', '', ''),
(10, 'hello2', 11, 1, '2017-08-27', '2017-08-27', '', '', '', '', '', '', '', ''),
(11, 'qwerty', 12, 1, '2017-04-01', '2017-07-01', '', '', '', '', '', '', '', ''),
(17, 'hello3', 13, 1, '2017-04-01', '2017-07-01', '', '', '', '', '', '', '', ''),
(18, 'hello4', 14, 1, '2017-04-01', '2017-07-01', '', '', '', '', '', '', '', ''),
(19, 'new company', 15, 1, '2017-04-01', '2017-04-01', '', '', '', '', '', '', '', '');

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
(1, 'customer 1', 1, '09283490', 0, 1, '', '', ''),
(2, 'customer 1', 1, '324324', 0, 18, '', '', ''),
(3, 'customer 1', 1, '3243', 0, 19, '', '', '');

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
(1, '2017-07-01', '2017-03-31', '', 0),
(2, '2018-01-01', '2017-03-31', '', 12),
(3, '2018-01-01', '1970-01-01', '', 13),
(4, '2018-01-01', '2018-03-31', '', 14),
(5, '2017-07-01', '2018-03-31', '', 15),
(6, '2017-07-01', '2018-03-31', '', 16),
(7, '2017-07-01', '2018-03-31', 'open', 17),
(8, '2017-07-01', '2018-03-31', 'open', 18),
(9, '2017-04-01', '2018-03-31', 'open', 19);

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
(1, 'Item 1', '2223', 1, 0, 19),
(2, 'item 2', '8789', 1, 3, 19);

-- --------------------------------------------------------

--
-- Table structure for table `ledgers`
--

CREATE TABLE `ledgers` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `accounting_group_id` int(10) NOT NULL,
  `freeze` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0==unfreezed 1==freezed',
  `company_id` int(10) NOT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `supplier_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ledgers`
--

INSERT INTO `ledgers` (`id`, `name`, `accounting_group_id`, `freeze`, `company_id`, `customer_id`, `supplier_id`) VALUES
(1, 'customer 1', 22, 0, 1, 1, 0),
(5, 'supplier 1', 25, 0, 1, NULL, 3),
(6, 'customer 1', 411, 0, 19, 3, NULL),
(7, 'supplier 1 weewr', 414, 0, 19, NULL, 4);

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
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Rajasthan');

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

--
-- Dumping data for table `stock_groups`
--

INSERT INTO `stock_groups` (`id`, `name`, `parent_id`, `lft`, `rght`, `company_id`) VALUES
(2, 'group 1', NULL, 1, 6, 1),
(3, 'sub group 1', 2, 2, 5, 19),
(4, 'sub group 2', 3, 3, 4, 19);

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

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `state_id`, `gstin`, `freeze`, `company_id`, `mobile`, `email`, `address`) VALUES
(3, 'supplier 1', 1, '08HBVH457G', 0, 1, '', '', ''),
(4, 'supplier 1 weewr', 1, '08HBVH457G', 0, 19, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`) VALUES
(1, 'N/A'),
(2, 'Pcs');

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
(1, 'Abhilash Lohar', '9636653883', 'abhilashlohar01@gmail.com', '$2y$10$Y.mH/W5XkXuWF6ZeTQV4dO3QUz1pseZvrq9fLl3ixr9rXhpagn3t2'),
(2, 'mahendra kumar darji', '7891970769', 'mahitailor6@gmail.com', '$2y$10$inJpX8Egx0pcq53s/J1Qdeb8uBE5/GdQ1J58xf7ngh1t77ZthT0ES'),
(3, 'Manoj', '9571649341', 'manoj@gmail.com', '$2y$10$4pbG4uvvNiBMouuXKAtCiuUd3z95wNMDeIO5knsbeFIW.PFqsCz/a'),
(4, 'test', '9636653883', 'test@gmail.com', '$2y$10$vNrjTzI9mcecxQTv39P3kuCFlVUWyRsknnuS/hEgawS4AD3Em29S.'),
(5, 'xyz', '86878', 'xyz@gmail.com', '$2y$10$xLb7C4sTF2CdDmhcwzXsaue8m7iMVGKzdcOiazV8z/T6H0yUkBYsG'),
(6, 'test', '8789797', 'test2@gmail.com', '$2y$10$DYsC2PHIERyQPIdnQeO52eN4S3xoJjHgR59hgWtYp/pDhzBkjbWPi'),
(7, 'test3', '87897', 'test3@gmail.com', '$2y$10$lagiIkpWf4MX46au0XZM6ufNtVNaMQQ9IyMjB6mmRwAK/52FzQlT2'),
(8, 'vinu', '78678', 'vinu@gmail.com', '$2y$10$7B3YgJF/FVEdbVUd7twTsObscL1H5oOzsKy5I54lfl4LIpLhl3pDG'),
(9, 'abhi', '8767868', 'abhi@phppoets.com', '$2y$10$JuYwkvVuiDOuPAaacPOuBu33yJ0V74N69SNY8UbBfoOYu7YzqrEpG'),
(10, 'hello', '8767867', 'hello@gmail.com', '$2y$10$7kMT.ntoBjOz4U3GTatf7.YjyxH4FLeuOVlizmLx.AD8C7OriRBc.'),
(11, 'kjhjk', '98789', 'hello2@gmail.com', '$2y$10$6Y1zTy5UqfovuvJwSqeUQ.cUsLEX805b3AhlcBynmOxfZjn1hI/2e'),
(12, 'ef', '87687', 'q@gmail.com', '$2y$10$6Y1zTy5UqfovuvJwSqeUQ.cUsLEX805b3AhlcBynmOxfZjn1hI/2e'),
(13, 'dsfds', '325325', 'hello3@gmail.com', '$2y$10$kusiC5HE6ecFmzbFliS2V.MPe03/1180mRaAOjYrVWx5PH0BroDSS'),
(14, 'kjhjk', '87678', 'hello4@gmail.com', '$2y$10$/j0ISLfB4IBrnrvcwjc.JubpXf8tz1yLbLEoan7Lejc0AS7HDeDw2'),
(15, 'new', '9889', 'new@gmail.com', '$2y$10$EAhtHEjwSpsJLmnwv5WQcOM3m73/QkyUBi392lxGngsCSqqj0oi0a');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `accounting_groups`
--
ALTER TABLE `accounting_groups`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=420;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `financial_years`
--
ALTER TABLE `financial_years`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `nature_of_groups`
--
ALTER TABLE `nature_of_groups`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stock_groups`
--
ALTER TABLE `stock_groups`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
