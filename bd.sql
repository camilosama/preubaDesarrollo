-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 07, 2019 at 11:40 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `goodsSystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `name` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `value` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`name`, `description`, `value`) VALUES
('andres cailo ', 'BEUNA ONDA ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `goodsAdministrator`
--

CREATE TABLE `goodsAdministrator` (
  `name` varchar(8) NOT NULL,
  `password` varchar(8) NOT NULL,
  `state` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goodsAdministrator`
--

INSERT INTO `goodsAdministrator` (`name`, `password`, `state`) VALUES
('a', '1', 0),
('1', 'q', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`name`,`value`);
