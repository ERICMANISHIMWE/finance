-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2017 at 09:08 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finance`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `timedate` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`, `timedate`, `description`, `debit`, `credit`) VALUES
(32, 'Joachim', '2017-11-13', 'Start Business', 1000000, 0),
(33, 'Eric', '2017-11-13', 'rent', 0, 200000),
(34, 'Cgi', '2017-11-14', 'fund', 200000, 0),
(35, 'eric man', '2017-11-15', 'pys his debt', 1500000, 0),
(36, 'fghy', '2017-11-24', 'paybill', 0, 500000),
(37, 'kcb', '2017-11-24', 'Got a loan from kcb', 2000000, 0),
(38, 'KCB', '2017-11-24', 'Pay 1/2 of loan', 0, 1000000),
(39, 'Offishomen', '2017-11-17', 'Bought fixed assets', 0, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `capital`
--

CREATE TABLE `capital` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `timedate` text NOT NULL,
  `description` text NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capital`
--

INSERT INTO `capital` (`id`, `name`, `timedate`, `description`, `debit`, `credit`) VALUES
(3, 'Joachim', '2017-11-13', 'Start Business', 0, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE `cash` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `balance` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `creditors`
--

CREATE TABLE `creditors` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `timedate` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creditors`
--

INSERT INTO `creditors` (`id`, `name`, `timedate`, `description`, `debit`, `credit`) VALUES
(6, 'GHj', '2017-11-24', 'bought goods', 0, 1000000),
(7, 'fghy', '2017-11-24', 'paybill', 500000, 0),
(8, 'Erty', '2017-11-24', 'putr', 0, 1000000),
(9, 'YuIOO', '2017-11-24', 'Purshases frokm yuloo', 0, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `currentasset`
--

CREATE TABLE `currentasset` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `timedate` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currentliability`
--

CREATE TABLE `currentliability` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `balance` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `debtors`
--

CREATE TABLE `debtors` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `timedate` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debtors`
--

INSERT INTO `debtors` (`id`, `name`, `timedate`, `description`, `debit`, `credit`) VALUES
(13, 'Kaigo', '2017-11-23', 'Sold goods', 1500000, 0),
(14, 'eric man', '2017-11-15', 'pys his debt', 0, 1500000),
(15, 'Ertuy', '2017-11-24', 'sales', 1000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `timedate` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `timedate`, `description`, `debit`, `credit`) VALUES
(4, 'Eric', '2017-11-13', 'rent', 200000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fixedasset`
--

CREATE TABLE `fixedasset` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `description` text NOT NULL,
  `timedate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fixedasset`
--

INSERT INTO `fixedasset` (`id`, `name`, `debit`, `credit`, `description`, `timedate`) VALUES
(1, 'Offishomen', 100000, 0, 'Bought fixed assets', '2017-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `timedate` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `name`, `timedate`, `description`, `debit`, `credit`) VALUES
(4, 'Cgi', '2017-11-14', 'fund', 0, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `timedate` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `name`, `timedate`, `description`, `debit`, `credit`) VALUES
(3, 'kcb', '2017-11-24', 'Got a loan from kcb', 0, 2000000),
(4, 'KCB', '2017-11-24', 'Pay 1/2 of loan', 1000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `returnout` int(11) NOT NULL,
  `timedate` varchar(20) NOT NULL,
  `description` int(255) NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `name`, `returnout`, `timedate`, `description`, `debit`, `credit`) VALUES
(4, 'GHj', 0, '2017-11-24', 0, 1000000, 0),
(5, 'Erty', 0, '2017-11-24', 0, 1000000, 0),
(6, 'YuIOO', 0, '2017-11-24', 0, 1000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `returnin` int(11) NOT NULL,
  `timedate` text NOT NULL,
  `description` text NOT NULL,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `name`, `returnin`, `timedate`, `description`, `debit`, `credit`) VALUES
(9, 'Kaigo', 0, '2017-11-23', 'Sold goods', 0, 1500000),
(10, 'Ertuy', 0, '2017-11-24', 'sales', 0, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `account` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `accounttype` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `capital`
--
ALTER TABLE `capital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `creditors`
--
ALTER TABLE `creditors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currentasset`
--
ALTER TABLE `currentasset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currentliability`
--
ALTER TABLE `currentliability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `debtors`
--
ALTER TABLE `debtors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixedasset`
--
ALTER TABLE `fixedasset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `capital`
--
ALTER TABLE `capital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cash`
--
ALTER TABLE `cash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `creditors`
--
ALTER TABLE `creditors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `currentasset`
--
ALTER TABLE `currentasset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currentliability`
--
ALTER TABLE `currentliability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debtors`
--
ALTER TABLE `debtors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fixedasset`
--
ALTER TABLE `fixedasset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
