-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: fdb18.awardspace.net
-- Generation Time: Dec 25, 2018 at 09:48 AM
-- Server version: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2701592_word`
--

-- --------------------------------------------------------

--
-- Table structure for table `expensedata`
--

CREATE TABLE `expensedata` (
  `id` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `exdate` varchar(20) NOT NULL,
  `amt` varchar(20) NOT NULL,
  `payee` varchar(20) NOT NULL,
  `excategory` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expensedata`
--

INSERT INTO `expensedata` (`id`, `email`, `exdate`, `amt`, `payee`, `excategory`, `description`) VALUES
(2, 'roop4894@gmail.com', '2018-04-06', '500', 'Neha Dholakiya', 'Utilities', ''),
(10, 'parismita@fofatt.com', '2018-04-02', '800', 'pari', 'Travel', 'vehicle, food, lodging'),
(11, 'abc@gmail.com', '2018-03-22', '7000', 'raja', 'Insurance', 'Life'),
(12, 'sudarshan@fofatt.com', '2018-04-04', '2000', 'Sudarshan', 'Rent', 'Description'),
(13, 'smitrypinder@mail.co', '2018-04-04', '5120', 'Rani B', 'Travel', 'car, train, bus'),
(14, 'smitrypinder@mail.co', '2018-04-05', '670', 'rohan', 'Maintenance', 'pipes repair'),
(17, 'sania@gmail.com', '2018-03-20', '20000', 'Mohit Shukla', 'Travel', 'My Travel '),
(20, 'sania@gmail.com', '2018-04-02', '2000', 'Sonia', 'Training', 'Training'),
(21, 'sania@gmail.com', '2018-04-05', '700', 'Yami', 'Utilities', 'Ulities'),
(22, 'riya@gmail.com', '2018-01-18', '3000', 'Rehan', 'Taxes', 'Taxes'),
(23, 'riya@gmail.com', '2018-02-15', '8000', 'Tina', 'Personal', 'Personal'),
(24, 'parismita@fofatt.com', '2018-04-03', '3100', 'Raj Traders', 'Maintenance', 'Carpentry'),
(25, 'parismita@fofatt.com', '2018-04-11', '3200', 'M & M electronics', 'Utilities', ''),
(31, 'roop4894@gmail.com', '2018-04-09', '1400', 'Martin', 'myCategory', ''),
(32, 'roop4894@gmail.com', '2018-04-25', '2300', 'Disha', 'Maintenance', 'Maintenance'),
(33, 'roop4894@gmail.com', '2018-04-23', '400', 'Lisa', 'Utilities', ''),
(34, 'roop4894@gmail.com', '2018-04-12', '1111', 'Patil', 'Rent', 'rc'),
(35, 'sudarshan2215@gmail.', '2018-05-16', '400', 'Payee', 'Education', ''),
(36, 'sumi@abc.com', '2018-05-09', '5800', 'Manoj', 'electrician', 'repairing'),
(37, 'gray@gmail.com', '2018-05-16', '90', 'p', 'tyiii', 'd'),
(38, 'xyz@gmail.com', '2018-12-25', '20000', 'Rupali', 'Wages', 'sdhdf');

-- --------------------------------------------------------

--
-- Table structure for table `incomedata`
--

CREATE TABLE `incomedata` (
  `id` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `indate` varchar(20) NOT NULL,
  `amt` varchar(20) NOT NULL,
  `incategory` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incomedata`
--

INSERT INTO `incomedata` (`id`, `email`, `indate`, `amt`, `incategory`, `description`) VALUES
(3, 'roop4894@gmail.com', '2018-04-10', '7000', 'Training', 'k'),
(4, 'roop4894@gmail.com', '2018-04-02', '60000', 'Fees', 'Fees'),
(5, 'roop4894@gmail.com', '2018-04-01', '40000', 'Taxes', 'Taxes111'),
(20, 'roop4894@gmail.com', '2018-04-02', '45000', 'Insurance', 'Insurance1'),
(21, 'parismita@fofatt.com', '2018-04-19', '5600', 'Interest', ''),
(22, 'parismita@fofatt.com', '2018-04-02', '120000', 'Fees', ''),
(23, 'roop4894@gmail.com', '2018-05-01', '60000', 'Utilities', 'kl'),
(24, 'sudarshan2215@gmail.', '2018-05-10', '45', 'Insurance', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `id` int(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `pass1` varchar(20) NOT NULL,
  `pass2` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`id`, `fname`, `pass1`, `pass2`, `email`) VALUES
(1, 'Rupali', 'Rupali12', 'Rupali12', 'roop4894@gmail.com'),
(4, 'Parismita', 'Parismita@123', 'Parismita@123', 'parismita@fofatt.com'),
(5, 'Rahul', 'Yellow@420', 'Yellow@420', 'sudarshan@fofatt.com'),
(9, 'Reshma', 'Reshma12', 'Reshma12', 'reshma@gmail.com'),
(15, 'Sudarshan S', 'Yellow', 'Yellow', 'smail@gmail.com'),
(16, 'Chandan Sonowal', 'green', 'green', 'chandan@fofatt.com'),
(17, 'Riha Patel', 'riha12345', 'riha12345', 'riha@gmail.com'),
(18, 'Sudarshan Sonowal', 'Green', 'Green', 'sudarshan2215@gmail.'),
(19, 'Sumi Borah', 'sumi@123', 'sumi@123', 'sumi@abc.com'),
(20, 'Sudars', 'green', 'green', 'green@gmail.com'),
(21, 'S', 'gray', 'gray', 'gray@gmail.com'),
(22, 'Rupali Chaughule', 'rupali12345', 'rupali12345', 'rupalic4894@gmail.co'),
(23, 'Rupali Chaughule', 'rupali12345', 'rupali12345', 'rupalic4894@gmail.co'),
(24, 'Rupali', '12345', '12345', 'dhfdh@gmail.com'),
(25, 'Rupali', '12345', '12345', 'xyz@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expensedata`
--
ALTER TABLE `expensedata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incomedata`
--
ALTER TABLE `incomedata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expensedata`
--
ALTER TABLE `expensedata`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `incomedata`
--
ALTER TABLE `incomedata`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
